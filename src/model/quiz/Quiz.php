<?php

declare(strict_types=1);

namespace App\Model\Quiz;

use App\Database\HtvDb;

abstract class Quiz
{
    public function deleteSelf(IQuiz $p_oQuiz) : void
    {
        $l_oDb = HtvDb::getInstance();
        $l_oPreparedStatement = $l_oDb->prepare("DELETE FROM `quiz` WHERE `id` = " . $p_oQuiz->getId());
        $l_oPreparedStatement->execute();
    }

    public function deleteAssigned(IQuiz $p_oQuiz) : void
    {
        $l_oHtvDb = HtvDb::getInstance();
        $l_oPreparedStatement = $l_oHtvDb
            ->prepare("SELECT count(id) as `count` FROM `assigned_quiz` WHERE `quiz_id` = " . $p_oQuiz->getId());
        $l_oPreparedStatement->execute();
        $l_iCount = $l_oPreparedStatement->fetchObject();

        if($l_iCount->count > 0){
            $l_oPreparedStatement = $l_oHtvDb
                ->prepare("DELETE FROM `assigned_quiz` WHERE `quiz_id` = " . $p_oQuiz->getId());
            $l_oPreparedStatement->execute();
        }
    }
}