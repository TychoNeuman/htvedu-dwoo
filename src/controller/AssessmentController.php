<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;

class AssessmentController
{
    public function getAllNotAssessed(string $p_sSubject) : ?array
    {
        $l_oUserController = new UserController();

        //First, fetch all the students
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare('SELECT `id` FROM `users` WHERE `role` = "Student"');
        $l_oPreparedStatement->execute();
        $l_aStudentIds = $l_oPreparedStatement->fetchAll();

        foreach($l_aStudentIds as $l_aStudentId){
            $l_aStudentArray[] = $l_oUserController->getUserProjector((int)$l_aStudentId['id']);
        }

        switch($p_sSubject)
        {
            case 'Sport' :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare('SELECT `user_id` FROM `assessment-sport`');
                $l_oPreparedStatement->execute();
                $l_aAssessedStudentArray = $l_oPreparedStatement->fetchAll();
                break;
            case 'Assignment' :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare('SELECT `user_id` FROM `assessment-assignment`');
                $l_oPreparedStatement->execute();
                $l_aAssessedStudentArray = $l_oPreparedStatement->fetchAll();
                break;
        }

        //If empty, this means that no students has been assessed yet, so we can safely return all of them
        if(empty($l_aAssessedStudentArray)){
            return $l_aStudentArray;
        }

        //Now, unset all the students that are already assessed
        for($l_iCounter = 0; $l_iCounter < count($l_aStudentArray); $l_iCounter++){
            foreach($l_aAssessedStudentArray as $l_aAssessedStudent){
                if($l_aStudentArray[$l_iCounter]['id'] == $l_aAssessedStudent['user_id']){
                    unset($l_aStudentArray[$l_iCounter]);
                }
            }
        }

        if(!empty($l_aStudentArray)){
            return $l_aStudentArray;
        }else{
            return null;
        }

    }
}