<?php

/*
 * TODO :
 * - Maybe move the fetch quiz submitted answers to a user controller
 */

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\Quiz\IQuiz;

class ResultsController
{
    const INADEQUATE = "Onvoldoende";
    const SUFFICIENT = "Voldoende";
    const EXCELLENT = "Goed";

    private function _hasPassed(iQuiz $p_oQuiz, int $p_iPercentage) : string
    {
        $l_oSettingsController = new SettingsController();
        $l_aPercentages = $l_oSettingsController->fetchPercentageSettings();
        $l_sResult = "";

        switch ($p_oQuiz->getType())
        {
            case iQuiz::NUMBERSERIES :
                if($p_iPercentage < $l_aPercentages[0]['percentage_low']){
                    $l_sResult = self::INADEQUATE;
                }else if($p_iPercentage >= $l_aPercentages[0]['percentage_low'] && $p_iPercentage < $p_iPercentage[0]['percentage_high']){
                    $l_sResult = self::SUFFICIENT;
                }else{
                    $l_sResult = self::EXCELLENT;
                }
                break;
            case iQuiz::WORDPAIR :
                if($p_iPercentage < $l_aPercentages[1]['percentage_low']){
                    $l_sResult = self::INADEQUATE;
                }else if($p_iPercentage >= $l_aPercentages[1]['percentage_low'] && $p_iPercentage < $p_iPercentage[1]['percentage_high']){
                    $l_sResult = self::SUFFICIENT;
                }else{
                    $l_sResult = self::EXCELLENT;
                }
                break;
            case iQuiz::LETTERPAIR :
                if($p_iPercentage < $l_aPercentages[2]['percentage_low']){
                    $l_sResult = self::INADEQUATE;
                }else if($p_iPercentage >= $l_aPercentages[2]['percentage_low'] && $p_iPercentage < $p_iPercentage[2]['percentage_high']){
                    $l_sResult = self::SUFFICIENT;
                }else{
                    $l_sResult = self::EXCELLENT;
                }
                break;
        }

        return $l_sResult;
    }

    public function getResultOverviewStudents() : array
    {
        //TODO :
        // Amount of people passed
        // Amount of people failed
        // Amount of people assessed/ not assessed (sport, assignment, group assignment)

        $l_aStatsArray = array();

        //Amount of people that took a quiz
        $l_oAmountOfPeopleQuery = HtvDb::getInstance()
            ->prepare("SELECT DISTINCT(`user_id`)  FROM `quiz_submitted_answers`");
        $l_oAmountOfPeopleQuery->execute();

        $l_iAmountOfPeopleTakenQuiz = $l_oAmountOfPeopleQuery->rowCount();

        // Amount of people not taken quiz
        $l_oAllUsersQuery = HtvDb::getInstance()
            ->prepare("SELECT * FROM `users` WHERE `role` = 'Student'");
        $l_oAllUsersQuery->execute();

        $l_iAmountOfPeopleNotTakenQuiz = $l_oAllUsersQuery->rowCount() - $l_iAmountOfPeopleTakenQuiz;
        if($l_iAmountOfPeopleNotTakenQuiz < 0){
            $l_iAmountOfPeopleNotTakenQuiz = 0;
        }

        $l_aStatsArray['amount_of_taken_quizes'] = $l_iAmountOfPeopleTakenQuiz;
        $l_aStatsArray['amount_of_not_taken_quiz'] = $l_iAmountOfPeopleNotTakenQuiz;

        if($l_iAmountOfPeopleTakenQuiz + $l_iAmountOfPeopleNotTakenQuiz === 0){
            $l_aStatsArray['percentageMadeQuiz'] = 0;
            $l_aStatsArray['percentageNotMadeQuiz'] = 0;
        }else{
            $l_aStatsArray['percentageMadeQuiz'] = round($l_iAmountOfPeopleTakenQuiz/($l_iAmountOfPeopleTakenQuiz + $l_iAmountOfPeopleNotTakenQuiz) * 100, 1);
            $l_aStatsArray['percentageNotMadeQuiz'] = round($l_iAmountOfPeopleNotTakenQuiz/($l_iAmountOfPeopleTakenQuiz + $l_iAmountOfPeopleNotTakenQuiz) * 100, 1);
        }

        return $l_aStatsArray;
    }

    public function fetchResultsSingleStudent(int $p_iId) : array
    {
        $l_oQuizController = new QuizController();
        $l_aQuizInfo = array();

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare('SELECT DISTINCT `quiz_id` FROM `quiz_submitted_answers` WHERE `user_id` = :id');
        $l_aBindings = array(
            'id' => $p_iId
        );
        $l_oPreparedStatement->execute($l_aBindings);
        $l_aQuizIds = $l_oPreparedStatement->fetchAll();

        $i = 0;
        foreach ($l_aQuizIds as $l_iQuizId){
            $l_oQuiz = $l_oQuizController->getQuiz((int)$l_iQuizId['quiz_id']);
            $l_aQuizInfo[$i] =  $l_oQuizController->_toArray($l_oQuiz);
            $l_aQuizInfo[$i]['result'] = $this->gradeExam($p_iId, $l_oQuiz);
            $i++;
        }

        return $l_aQuizInfo;
    }

    public function fetchResultsAllStudents() : array
    {
        $l_oUserController = new UserController();
        $l_oQuizController = new QuizController();
        $l_aQuizArray = array();
        $l_aQuizInfo= array();

        //Fetch id's from users that made quiz
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare('SELECT DISTINCT `user_id` FROM `quiz_submitted_answers`');
        $l_oPreparedStatement->execute();
        $l_aUserIds = $l_oPreparedStatement->fetchAll();

        //Then fetch all quizes assigned to that user
        foreach ($l_aUserIds as $l_iUserId){
            $l_oPreparedStatement = HtvDb::getInstance()
                ->prepare("SELECT DISTINCT `quiz_id` FROM `quiz_submitted_answers` WHERE `user_id` = :user_id");
            $l_aBindings = array(
                'user_id' => $l_iUserId['user_id']
            );
            $l_oPreparedStatement->execute($l_aBindings);
            $l_aQuizIds = $l_oPreparedStatement->fetchAll();

            $i = 0;
            foreach ($l_aQuizIds as $l_iQuizId){
                $l_oQuiz = $l_oQuizController->getQuiz((int)$l_iQuizId['quiz_id']);
                $l_aQuizInfo[$i] =  $l_oQuizController->_toArray($l_oQuiz);
                $l_aQuizInfo[$i]['result'] = $this->gradeExam((int)$l_iUserId['user_id'], $l_oQuiz);
                $i++;
            }

            $l_aQuizArray[] = array(
                'user' => $l_oUserController->getUserProjector((int)$l_iUserId['user_id']),
                'quiz' => $l_aQuizInfo
            );

            unset($l_aQuizInfo);
        }
        return $l_aQuizArray;
    }

    //TODO : The check for wordpair or letterpair could be written a bit more effeciently
    public function fetchQuizResults(iQuiz $p_oQuiz, int $p_iUserId) : array
    {
        $l_aCompareAnswersArray = array();
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("SELECT * FROM `quiz_submitted_answers` WHERE `quiz_id` = '" . $p_oQuiz->getId() . "' AND `user_id` = '" . $p_iUserId . "'");
        $l_oPreparedStatement->execute();
        $l_aSubmittedAnswers =  $l_oPreparedStatement->fetchAll();

        for($i = 0; $i < count($p_oQuiz->getQuestions()); $i++){
            foreach($l_aSubmittedAnswers as $l_aSubmittedAnswer){
                if($p_oQuiz->getType() !== iQuiz::WORDPAIR && $p_oQuiz->getType() !== iQuiz::LETTERPAIR){
                    if($p_oQuiz->getQuestions()[$i]['id'] === $l_aSubmittedAnswer['question_id']){
                        $l_aCompareAnswersArray[$i] = array(
                            'question_id' => $p_oQuiz->getQuestions()[$i]['id'],
                            'correct_answer' => $p_oQuiz->getQuestions()[$i]['answer'],
                            'submitted_answer' => $l_aSubmittedAnswer['answer'],
                            'is_correct' => $p_oQuiz->getQuestions()[$i]['answer'] === $l_aSubmittedAnswer['answer'] ? true : false
                        );
                        continue 2;
                    }else{
                        $l_aCompareAnswersArray[$i] = array(
                            'question_id' => $p_oQuiz->getQuestions()[$i]['id'] ,
                            'correct_answer' => $p_oQuiz->getQuestions()[$i]['answer'],
                            'submitted_answer' => "Niet ingevuld",
                            'is_correct' => false
                        );
                    }
                }else{
                    if($p_oQuiz->getQuestions()[$i]['id'] === $l_aSubmittedAnswer['question_id']){
                        $l_aCompareAnswersArray[$i] = array(
                            'question_id' => $p_oQuiz->getQuestions()[$i]['id'],
                            'correct_answer' => $p_oQuiz->getQuestions()[$i]['answer1'] . " " . $p_oQuiz->getQuestions()[$i]['answer2'],
                            'submitted_answer' => $l_aSubmittedAnswer['answer'],
                            'is_correct' => $p_oQuiz->getQuestions()[$i]['answer1'] . " " . $p_oQuiz->getQuestions()[$i]['answer2'] === $l_aSubmittedAnswer['answer'] ? true : false
                        );
                        continue 2;
                    }else{
                        $l_aCompareAnswersArray[$i] = array(
                            'question_id' => $p_oQuiz->getQuestions()[$i]['id'] ,
                            'correct_answer' => $p_oQuiz->getQuestions()[$i]['answer1'] . " " . $p_oQuiz->getQuestions()[$i]['answer2'],
                            'submitted_answer' => "Niet ingevuld",
                            'is_correct' => false
                        );
                    }
                }
            }
        }

        return $l_aCompareAnswersArray;
    }

    public function fetchFinalResultQuiz(array $p_aQuizResults)
    {
        $l_iInadequate = 0;
        $l_iSufficient = 0;
        $l_iExcellent = 0;
        $l_iTotalQuizes = count($p_aQuizResults);

        foreach($p_aQuizResults as $l_aQuizResult){
            if($l_aQuizResult['result']['hasPassed'] === self::INADEQUATE){
                $l_iInadequate++;
            }elseif( $l_aQuizResult['result']['hasPassed'] === self::SUFFICIENT){
                $l_iSufficient++;
            }elseif( $l_aQuizResult['result']['hasPassed'] === self::EXCELLENT){
                $l_iExcellent++;
            }
        }

        return self::EXCELLENT;
    }

    //Maybe move this to a grade controller
    public function gradeExam(int $p_iUserId, IQuiz $p_iQuiz) : array
    {
        $l_iTotalScore = 0;
        $l_iResultScore = 0;
        $l_iAmountOfCorrectAnswers = 0;

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare('SELECT * FROM `quiz_submitted_answers` WHERE `user_id` = ' . $p_iUserId . ' AND `quiz_id` = ' . $p_iQuiz->getId());
        $l_oPreparedStatement->execute();
        $l_aResults = $l_oPreparedStatement->fetchAll();

        $l_oQuizController = new QuizController();
        $l_oQuiz = $l_oQuizController->getQuiz((int)$l_aResults[0]['quiz_id']);

        $l_iTotalAmountOfQuestions = count($l_oQuiz->getQuestions());
        foreach($l_oQuiz->getQuestions() as $l_aQuestion){
            $l_iTotalScore += $l_aQuestion['score'];
        }

        foreach($l_aResults as $l_aResult){
            foreach($l_oQuiz->getQuestions() as $l_aQuestion){
                if($l_oQuiz->getType() !== iQuiz::WORDPAIR && $l_oQuiz->getType() !== iQuiz::LETTERPAIR){
                    if($l_aResult['question_id'] === $l_aQuestion['id'] && $l_aResult['answer'] === $l_aQuestion['answer']){
                        $l_iAmountOfCorrectAnswers++;
                        $l_iResultScore += $l_aQuestion['score'];
                    }
                }else{
                    $l_aAnswer = $l_aQuestion['answer1'] . " " . $l_aQuestion['answer2'];
                    if($l_aResult['question_id'] === $l_aQuestion['id'] && $l_aResult['answer'] === $l_aAnswer){
                        $l_iAmountOfCorrectAnswers++;
                        $l_iResultScore += $l_aQuestion['score'];
                    }
                }
            }
        }

        $l_iAmountOfIncorrectAnswers = $l_iTotalAmountOfQuestions - $l_iAmountOfCorrectAnswers;
        $l_iPercentage = (int)$l_iResultScore/$l_iTotalScore * 100;
        $l_sResult = $this->_hasPassed($l_oQuiz, (int)$l_iPercentage);

        return array(
            'amountOfCorrectAnswers' => $l_iAmountOfCorrectAnswers,
            'amountOfIncorrectAnswers' => $l_iAmountOfIncorrectAnswers,
            'totalAmountOfQuestions' => $l_iTotalAmountOfQuestions,
            'totalScore' => $l_iTotalScore,
            'resultScore' => $l_iResultScore,
            'resultPercentage' => round($l_iPercentage, 1),
            'hasPassed' => $l_sResult
        );
    }
}