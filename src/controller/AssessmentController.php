<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\User;

class AssessmentController
{
    const ASSIGNMENT = "assessment_assignment";
    const GROUP = "assessment_group";
    const SPORT = "assessment_sport";

    public function getAllNotAssessed(string $p_sSubject) : array
    {
        $l_oUserController = new UserController();
        $l_aStudentArray = array();

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
            case 'sport' :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare('SELECT `user_id` FROM `assessment_sport`');
                $l_oPreparedStatement->execute();
                $l_aAssessedStudentArray = $l_oPreparedStatement->fetchAll();
                break;
            case 'assignment' :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare('SELECT `user_id` FROM `assessment_assignment`');
                $l_oPreparedStatement->execute();
                $l_aAssessedStudentArray = $l_oPreparedStatement->fetchAll();
                break;
            case 'group' :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare('SELECT `user_id` FROM `assessment_group`');
                $l_oPreparedStatement->execute();
                $l_aAssessedStudentArray = $l_oPreparedStatement->fetchAll();
                break;
        }

        //If empty, this means that no students have been assessed yet, so we can safely return all of them
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

        return $l_aStudentArray;
    }

    public function getAllResultsSingleStudents(int $p_iUserId, string $p_iAssessmentType) : array
    {
        $l_oPreparedStatement =  HtvDb::getInstance()
            ->prepare("SELECT * FROM " . "`" . $p_iAssessmentType . "`" . "WHERE `user_id` = " . $p_iUserId);
        $l_oPreparedStatement->execute();
        return $l_oPreparedStatement->fetchAll();
    }

    public function postAssessmentResults(int $p_iUserId, string $p_sSubject, array $p_aPost) : void
    {
        switch($p_sSubject)
        {
            case 'sport' :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare("INSERT INTO `assessment_sport` 
                                (`user_id`, `km_time`, `km_grade`, `push_up_time`, `push_up_grade`, `sit_up_time`, `sit_up_grade`) 
                                VALUES
                                (:user_id, :km_time, :km_grade, :push_up_time, :push_up_grade, :sit_up_time, :sit_up_grade) ");
                $l_aBindings = array(
                    'user_id' => $p_iUserId,
                    'km_time' => $p_aPost['km-time'],
                    'km_grade' => $p_aPost['km-grade'],
                    'push_up_time' => $p_aPost['push-up-time'],
                    'push_up_grade' => $p_aPost['push-up-grade'],
                    'sit_up_time' => $p_aPost['sit-up-time'],
                    'sit_up_grade' => $p_aPost['sit-up-grade']
                );
                $l_oPreparedStatement->execute($l_aBindings);
                break;
            case 'assignment' :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare("INSERT INTO `assessment_assignment`
                            (`user_id`, `grade1`, `grade2`, `grade3`, `grade4`, `grade5`, `grade6`, `grade7`, `grade8`)
                            VALUES
                            (:user_id, :grade1, :grade2, :grade3, :grade4, :grade5, :grade6, :grade7, :grade8)");
                $l_aBindings = array(
                    'user_id' => $p_iUserId,
                    'grade1' => $p_aPost['grade1'],
                    'grade2' => $p_aPost['grade2'],
                    'grade3' => $p_aPost['grade3'],
                    'grade4' => $p_aPost['grade4'],
                    'grade5' => $p_aPost['grade5'],
                    'grade6' => $p_aPost['grade6'],
                    'grade7' => $p_aPost['grade7'],
                    'grade8' => $p_aPost['grade8'],
                );
                $l_oPreparedStatement->execute($l_aBindings);
                break;
            case 'group' :
                $l_oPreparedStatement = HtvDb::getInstance()
                    ->prepare("INSERT INTO `assessment_group`
                            (`user_id`, `grade1`, `grade2`, `grade3`, `grade4`)
                            VALUES
                            (:user_id, :grade1, :grade2, :grade3, :grade4)");
                $l_aBindings = array(
                    'user_id' => $p_iUserId,
                    'grade1' => $p_aPost['grade1'],
                    'grade2' => $p_aPost['grade2'],
                    'grade3' => $p_aPost['grade3'],
                    'grade4' => $p_aPost['grade4']
                );
                $l_oPreparedStatement->execute($l_aBindings);
                break;
        }

        header('Location: index.php?p=assessment');
    }
}