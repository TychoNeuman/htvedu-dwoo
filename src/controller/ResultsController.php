<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\Quiz\IQuiz;

class ResultsController
{
    private function _hasPassed(iQuiz $p_oQuiz, int $p_iPercentage) : bool
    {
        $l_oSettingsController = new SettingsController();
        $l_aPercentages = $l_oSettingsController->fetchPercentageSettings();

        switch ($p_oQuiz->getType())
        {
            case 1 :
                if($p_iPercentage >= $l_aPercentages[0]['percentage']){
                    return true;
                }else{
                    return false;
                }
                break;
        }
    }

    public function getStatsPerStudent() : array
    {
        // Amount of people passed
        // Amount of people failed

        $l_aStatsArray = array();

        //Amount of people that took a quiz
        $l_oAmountOfPeopleQuery = HtvDb::getInstance()
            ->prepare("SELECT DISTINCT(`user_id`)  FROM `quiz_submitted_answers`");
        $l_oAmountOfPeopleQuery->execute();

        // Amount of people not taken quiz
        $l_oNotTakenQuizQuery = HtvDb::getInstance()
            ->prepare("SELECT * FROM `users` WHERE `role` = 'Student'");
        $l_oNotTakenQuizQuery->execute();
        $l_iNotTakenQuiz = ($l_oNotTakenQuizQuery->rowCount() - $l_oAmountOfPeopleQuery->rowCount());
        if($l_iNotTakenQuiz < 0){
            $l_iNotTakenQuiz = 0;
        }

        $l_aStatsArray['amount_of_taken_quizes'] = $l_oAmountOfPeopleQuery->rowCount();
        $l_aStatsArray['amount_of_not_taken_quiz'] = $l_iNotTakenQuiz;

        return $l_aStatsArray;
    }

    public function fetchResultsSingleStudent(int $p_iId) : array
    {
        $l_oQuizController = new QuizController();

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare('SELECT DISTINCT `quiz_id` FROM `quiz_submitted_answers` WHERE `user_id` = :id');
        $l_aBindings = array(
            'id' => $p_iId
        );
        $l_oPreparedStatement->execute($l_aBindings);
        $l_aQuizIds = $l_oPreparedStatement->fetchAll();

        $i = 0;
        foreach ($l_aQuizIds as $l_iQuizId){
            $l_aQuizInfo[$i] =  $l_oQuizController->_toArray($l_oQuizController->getQuiz((int)$l_iQuizId['quiz_id']));
            $l_aQuizInfo[$i]['result'] = $this->gradeExam($p_iId, (int)$l_iQuizId['quiz_id']);
            $i++;
        }

        return $l_aQuizInfo;
    }

    public function fetchResultsAllStudents() : array
    {
        $l_oUserController = new UserController();
        $l_oQuizController = new QuizController();

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
                $l_aQuizInfo[$i] =  $l_oQuizController->_toArray($l_oQuizController->getQuiz((int)$l_iQuizId['quiz_id']));
                $l_aQuizInfo[$i]['result'] = $this->gradeExam((int)$l_iUserId['user_id'], (int)$l_iQuizId['quiz_id']);
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

    //Maybe move this to a grade controller
    public function gradeExam(int $p_iUserId, int $p_iQuizId) : array
    {
        $l_iTotalScore = 0;
        $l_iResultScore = 0;
        $l_iAmountOfCorrectAnswers = 0;
        $l_iAmountOfIncorrectAnswers = 0;

        $l_oPreparedStatement = HtvDb::getInstance()
        ->prepare('SELECT * FROM `quiz_submitted_answers` WHERE `user_id` = :user_id AND `quiz_id` = :quiz_id');
        $l_aBindings = array(
            'user_id' => $p_iUserId,
            'quiz_id' => $p_iQuizId
        );
        $l_oPreparedStatement->execute($l_aBindings);
        $l_aResults = $l_oPreparedStatement->fetchAll();

        $l_oQuizController = new QuizController();
        $l_oQuiz = $l_oQuizController->getQuiz((int)$l_aResults[0]['quiz_id']);

        switch($l_oQuiz->getType())
        {
            case '1' :
                foreach($l_aResults as $l_aResult){
                    $l_oPreparedStatement = HtvDb::getInstance()
                        ->prepare("SELECT * FROM `questions_numberseries` WHERE `id` = :id");
                    $l_aBindings = array(
                        'id' => $l_aResult['question_id']
                    );
                    $l_oPreparedStatement->execute($l_aBindings);
                    $l_sAnswers = $l_oPreparedStatement->fetch();

                    $l_iTotalScore += $l_sAnswers['score'];

                    if($l_aResult['answer'] === $l_sAnswers['answer']){
                        $l_iAmountOfCorrectAnswers++;
                        $l_iResultScore += $l_sAnswers['score'];
                    }else{
                        $l_iAmountOfIncorrectAnswers++;
                    }
                }
                break;
        }

        $l_iPercentage = $l_iResultScore/$l_iTotalScore * 100;
        $l_bHasPassed = $this->_hasPassed($l_oQuiz, $l_iPercentage);

        return array(
            'amountOfCorrectAnswers' => $l_iAmountOfCorrectAnswers,
            'amountOfIncorrectAnswers' => $l_iAmountOfIncorrectAnswers,
            'totalScore' => $l_iTotalScore,
            'resultScore' => $l_iResultScore,
            'hasPassed' => $l_bHasPassed
        );
    }
}