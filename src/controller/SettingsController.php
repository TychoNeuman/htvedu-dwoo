<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\HtvDb;

class SettingsController
{
    public function fetchPercentageSettings() : array
    {
        $l_oQuizController = new QuizController();

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("SELECT * FROM `settings_quiz_pass_percentage`");
        $l_oPreparedStatement->execute();
        $l_aResult = $l_oPreparedStatement->fetchAll();

        $i = 0;
        foreach($l_aResult as $l_aSetting){
            $l_aResult[$i]['type_name'] = $l_oQuizController->determineQuizType((int)$l_aSetting['quiz_type_id']);
            $i++;
        }

        return $l_aResult;
    }

    //TODO: This should be refactored to a loop
    public function postPercentageSettings(array $p_aPost) : void
    {
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage` = :percentage_1
                           WHERE
                                 `quiz_type_id` =  1"
            );
        $l_aBindings = array(
            'percentage_1' => $p_aPost['percentage_1']
        );
        $l_oPreparedStatement->execute($l_aBindings);


        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage` = :percentage_2
                           WHERE
                                 `quiz_type_id` =  2"
            );
        $l_aBindings = array(
            'percentage_2' => $p_aPost['percentage_2']
        );
        $l_oPreparedStatement->execute($l_aBindings);


        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage` = :percentage_3
                           WHERE
                                 `quiz_type_id` =  3"
            );
        $l_aBindings = array(
            'percentage_3' => $p_aPost['percentage_3']
        );
        $l_oPreparedStatement->execute($l_aBindings);


        header("Refresh: 0");
    }
}