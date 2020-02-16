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
}