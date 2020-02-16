<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\Quiz\IQuiz;
use App\Model\Quiz\Letterpair;
use App\Model\Quiz\NumberSeries;
use App\Model\Quiz\Wordpair;
use App\Model\User;

class QuizController
{
    private function _setQuiz(IQuiz $p_oQuiz, array $p_aResult) : IQuiz
    {
        $p_oQuiz->setId((int)$p_aResult['id']);
        $p_oQuiz->setType((int)$p_aResult['type']);
        $p_oQuiz->setName($p_aResult['name']);
        $p_oQuiz->setTime((int)$p_aResult['time']);
        $p_oQuiz->setScore((int)$p_aResult['score']);
        $p_oQuiz->setQuestions($p_oQuiz->fetchQuestionsToArray());

        return $p_oQuiz;
    }

    public function _toArray(IQuiz $p_oQuiz) : array
    {
        $l_aQuizArray = array();

        $l_aQuizArray['id'] = $p_oQuiz->getId();
        $l_aQuizArray['name'] = $p_oQuiz->getName();
        $l_aQuizArray['type'] = $p_oQuiz->getType();
        $l_aQuizArray['time'] = $p_oQuiz->getTime();
        $l_aQuizArray['score'] = $p_oQuiz->getScore();
        $l_aQuizArray['questions'] = $p_oQuiz->getQuestions();

        return $l_aQuizArray;
    }

    public function getQuizNameById(int $p_iId) : string
    {
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("SELECT `name` FROM `quiz` WHERE `id` = : id");
        $l_aBindings = array(
            'id' => $p_iId
        );
        $l_oPreparedStatement->execute($l_aBindings);

        return $l_oPreparedStatement->fetch();

    }

    public function determineQuizType(int $p_iQuizType) : string
    {
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("SELECT 
                                    `quiz_type` 
                                FROM 
                                     `quiz_types` 
                                WHERE 
                                      `id` = :id");
        $l_aBindings = array(
            'id' => $p_iQuizType
        );
        $l_oPreparedStatement->execute($l_aBindings);

        return $l_oPreparedStatement->fetch()['quiz_type'];
    }

    public function getQuiz(int $p_iQuizId) : ?IQuiz
    {
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("SELECT 
                                        * 
                                 FROM 
                                      `quiz` 
                                 WHERE 
                                       `id` = :id");
        $l_aBindings = array(
            'id' => $p_iQuizId
        );
        $l_oPreparedStatement->execute($l_aBindings);
        $l_aResult = $l_oPreparedStatement->fetch();

        switch($l_aResult['type'])
        {
            case iQuiz::NUMBERSERIES :
                $l_oQuiz = self::_setQuiz(new NumberSeries(), $l_aResult);
                break;
            case iQuiz::WORDPAIR :
                $l_oQuiz = self::_setQuiz(new Wordpair(), $l_aResult);
                break;
            case iQuiz::LETTERPAIR :
                $l_oQuiz = self::_setQuiz(new Letterpair(), $l_aResult);
                break;
        }

        return $l_oQuiz;
    }

    public function addQuizInfo(array $p_aPost) : void
    {
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("INSERT INTO 
                                    `quiz` 
                                    (`type`, `name`, `time`, `score`) 
                                VALUES 
                                    (:quiz_type, :name, :time, :score)");
        $l_aBindings = array(
            'quiz_type' => (int)$p_aPost['quiz-type'],
            'name' => $p_aPost['quiz-name'],
            'time' => $p_aPost['time'],
            'score' => $p_aPost['score']
        );
        $l_oPreparedStatement->execute($l_aBindings);

        $l_iLastId = HtvDb::getInstance()->lastInsertId();

        header("Location: index.php?p=quizaddquestions&id=" . $l_iLastId);
    }

    public function addQuizQuestions(IQuiz $l_oQuiz, array $l_aPost) : void
    {
        switch($l_oQuiz->getType())
        {
            case iQuiz::NUMBERSERIES :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare("INSERT INTO 
                                                `questions_numberseries` 
                                                (`quiz_id`, `num1`, `num2`, `num3`, `num4`, `num5`, `num6`,
                                                `incorrect_num1`, `incorrect_num2`, `incorrect_num3`,
                                                 `answer`, `score`) 
                                        VALUES 
                                               (:quiz_id, :num1, :num2, :num3, :num4, :num5, :num6,
                                                :incorrect_num1, :incorrect_num2, :incorrect_num3,
                                                :answer, :score)");
                $l_aBindings = array(
                    'quiz_id' => $l_oQuiz->getId(),
                    'num1' => $l_aPost['num1'],
                    'num2' => $l_aPost['num2'],
                    'num3' => $l_aPost['num3'],
                    'num4' => $l_aPost['num4'],
                    'num5' => $l_aPost['num5'],
                    'num6' => $l_aPost['num6'],
                    'incorrect_num1' => $l_aPost['incorrect_num1'],
                    'incorrect_num2' => $l_aPost['incorrect_num2'],
                    'incorrect_num3' => $l_aPost['incorrect_num3'],
                    'answer' => $l_aPost['answer'],
                    'score' => $l_aPost['score']
                );
                $l_oPreparedStatement->execute($l_aBindings);
                break;
            case iQuiz::WORDPAIR :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare("INSERT INTO 
                                                `questions_wordpair` 
                                                (`quiz_id`, `answer1`, `answer2`, `word1`, `word2`,
                                                `incorrect_answer1`, `incorrect_answer2`, `incorrect_answer3`, `incorrect_answer4`,
                                                 `score`) 
                                        VALUES 
                                               (:quiz_id, :answer1, :answer2, :word1, :word2,
                                                :incorrect_answer1, :incorrect_answer2, :incorrect_answer3, :incorrect_answer4,
                                                :score)");
                $l_aBindings = array(
                    'quiz_id' => $l_oQuiz->getId(),
                    'answer1' => $l_aPost['answer1'],
                    'answer2' => $l_aPost['answer2'],
                    'word1' => $l_aPost['word1'],
                    'word2' => $l_aPost['word2'],
                    'incorrect_answer1' => $l_aPost['incorrect_answer1-1'] . " " .$l_aPost['incorrect_answer1-2'],
                    'incorrect_answer2' => $l_aPost['incorrect_answer2-1'] . " " . $l_aPost['incorrect_answer2-2'],
                    'incorrect_answer3' => $l_aPost['incorrect_answer3-1'] . " " . $l_aPost['incorrect_answer3-2'],
                    'incorrect_answer4' => $l_aPost['incorrect_answer4-1'] . " " . $l_aPost['incorrect_answer4-2'],
                    'score' => $l_aPost['score']
                );
                $l_oPreparedStatement->execute($l_aBindings);
                break;
            case iQuiz::LETTERPAIR :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare("INSERT INTO 
                                                `questions_letterpair` 
                                                (`quiz_id`, `pair1a`, `pair1b`, `pair2a`, `pair2b`, `pair3a`, `pair3b`,
                                                `answer1`, `answer2`, `incorrect_answer1`, `incorrect_answer2`, `incorrect_answer3`, `incorrect_answer4`, `incorrect_answer5`, `incorrect_answer6`,
                                                 `score`) 
                                        VALUES 
                                               (:quiz_id, :pair1a, :pair1b, :pair2a, :pair2b, :pair3a, :pair3b, 
                                                :answer1, :answer2, :incorrect_answer1, :incorrect_answer2, :incorrect_answer3, :incorrect_answer4, :incorrect_answer5, :incorrect_answer6, 
                                                :score)");
                $l_aBindings = array(
                    'quiz_id' => $l_oQuiz->getId(),
                    'pair1a' => $l_aPost['pair1a'],
                    'pair1b' => $l_aPost['pair1b'],
                    'pair2a' => $l_aPost['pair2a'],
                    'pair2b' => $l_aPost['pair2b'],
                    'pair3a' => $l_aPost['pair3a'],
                    'pair3b' => $l_aPost['pair3b'],
                    'answer1' => $l_aPost['answer1'],
                    'answer2' => $l_aPost['answer2'],
                    'incorrect_answer1' => $l_aPost['incorrect-answer1'],
                    'incorrect_answer2' => $l_aPost['incorrect-answer2'],
                    'incorrect_answer3' => $l_aPost['incorrect-answer3'],
                    'incorrect_answer4' => $l_aPost['incorrect-answer4'],
                    'incorrect_answer5' => $l_aPost['incorrect-answer5'],
                    'incorrect_answer6' => $l_aPost['incorrect-answer6'],
                    'score' => $l_aPost['score']
                );
                $l_oPreparedStatement->execute($l_aBindings);
                break;
        }

        header("Refresh: 0");
    }

    public function getQuizOverviewProjector() : array
    {
        $l_aConvertedResult = array();
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("SELECT 
                                      * 
                                FROM 
                                     `quiz` ");
        $l_oPreparedStatement->execute();
        $l_aResult = $l_oPreparedStatement->fetchAll();

        //Let's add the full name of the quiz type for readability later on
        foreach($l_aResult as $l_aSingleResult){
            $l_aSingleResult['typeName'] = self::determineQuizType((int)$l_aSingleResult['type']);
            $l_aConvertedResult[] = $l_aSingleResult;
        }

        return $l_aConvertedResult;
    }


    public function submitQuizAnswers(iQuiz $p_oQuiz, array $p_aAnswers, User $p_oUser) : void
    {
        $l_oHtvDb = HtvDb::getInstance();

        //The last item in the post array is 'submit', so let's remove that.
        array_pop($p_aAnswers);

        foreach($p_aAnswers as $l_mQuestionId=>$l_mAnswer)
        {
            $l_oPreparedStatement = $l_oHtvDb->prepare(
                "INSERT INTO
                                `quiz_submitted_answers`
                                (`quiz_id`, `user_id`, `question_id`, `answer`)
                            VALUES
                                (:quiz_id, :user_id, :question_id, :answer)");
            $l_aBindings = array(
                'quiz_id' => $p_oQuiz->getId(),
                'user_id' => $p_oUser->getId(),
                'question_id' => $l_mQuestionId,
                'answer' => $l_mAnswer
            );
            $l_oPreparedStatement->execute($l_aBindings);
        }

        header('Location: index.php?p=quiz');
    }

    public function deleteQuiz(int $p_iQuizId)
    {
        $l_oUserController = new UserController();
        $l_oQuiz =  $this->getQuiz($p_iQuizId);
        $l_oUserController->deleteSubmittedAnswers($l_oQuiz);
        $l_oQuiz->deleteQuestions();
        $l_oQuiz->deleteMe();
    }
}