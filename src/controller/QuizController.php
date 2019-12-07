<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\Quiz\IQuiz;
use App\Model\Quiz\NumberSeries;

class QuizController
{
    private function _setQuiz(IQuiz $p_oQuiz, array $p_aResult) : IQuiz
    {
        $p_oQuiz->setId((int)$p_aResult['id']);
        $p_oQuiz->setType($p_aResult['type']);
        $p_oQuiz->setName($p_aResult['name']);
        $p_oQuiz->setTime($p_aResult['time']);
        $p_oQuiz->setScore($p_aResult['score']);
        $p_oQuiz->setQuestions($p_aResult['questions']);

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
                                 FROM `quiz` 
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

    public function addQuizTitle(array $p_aPost)
    {
        $l_iType = (int)$p_aPost['quiz-type'];
        $l_sName = $p_aPost['quiz-name'];

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("INSERT INTO 
                                    `quiz` (`type`, `name`) 
                                VALUES 
                                    (:quiz_type, :name)");
        $l_aBindings = array(
            'quiz_type' => $l_iType,
            'name' => $l_sName
        );
        $l_oPreparedStatement->execute($l_aBindings);

        $l_iLastId = HtvDb::getInstance()->lastInsertId();

        header("Location: index.php?p=quizaddquestions&type=" . $l_iType . "&id=" . $l_iLastId);
    }

    public function addQuizQuestions(IQuiz $l_oQuiz)
    {
        switch($l_oQuiz->getType())
        {
            case '1' :
                //Insert into questions_numberseries
                break;
        }
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

}