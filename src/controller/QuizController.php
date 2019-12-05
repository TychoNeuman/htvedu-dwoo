<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\Quiz\IQuiz;
use App\Model\Quiz\NumberSeries;

class QuizController
{
    private $m_iQuizType;

    public function determineQuizType(int $p_iQuizType) : array
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

        return $l_oPreparedStatement->fetch();
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

        switch ($l_aResult['type'])
        {
            case '1' :
                $l_oNumberSeries = new NumberSeries();
                return $l_oNumberSeries;
                break;

        }


    }

    public function addQuiz(array $p_aPost)
    {
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("INSERT INTO 
                                    `quiz` (`type`) 
                                VALUES 
                                    (:quiz_type)");
        $l_aBindings = array(
            'quiz_type' => (int)$p_aPost['quiz-type']
        );
        $l_oPreparedStatement->execute($l_aBindings);

        $l_iLastId = HtvDb::getInstance()->lastInsertId();

        switch($_POST['quiz-type'])
        {
            case "1" :
                header("Location: index.php?p=quizcreate&id=" . $l_iLastId);
                break;
            case "2" :
                header("Location: index.php?p=dashboard");
                break;
        }
    }
}