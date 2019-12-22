<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\Quiz\IQuiz;
use App\Model\Quiz\NumberSeries;
use App\Model\User;
use App\System\Validator;

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

    public function getQuiz(int $p_iQuizId) : IQuiz
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
            case '1' :
                $l_oQuiz = self::_setQuiz(new NumberSeries(), $l_aResult);
                break;
        }

        return $l_oQuiz;
    }

    public function addQuizInfo(array $p_aPost)
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

    // TODO : Dont forget question score
    public function addQuizQuestions(IQuiz $l_oQuiz, array $l_aPost)
    {
        switch($l_oQuiz->getType())
        {
            case '1' :
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


    public function submitQuizAnswers(iQuiz $p_oQuiz, array $p_aAnswers, User $p_oUser)
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
    }

}