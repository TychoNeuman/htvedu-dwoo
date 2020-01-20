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
        /**
         * Percentage Numberseries
         */
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage_low` = :percentage_low_1
                           WHERE
                                 `quiz_type_id` =  1"
            );
        $l_aBindings = array(
            'percentage_low_1' => $p_aPost['percentage-low-1']
        );
        $l_oPreparedStatement->execute($l_aBindings);

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage_high` = :percentage_high_1
                           WHERE
                                 `quiz_type_id` =  1"
            );
        $l_aBindings = array(
            'percentage_high_1' => $p_aPost['percentage-high-1']
        );
        $l_oPreparedStatement->execute($l_aBindings);


        /**
         * Percentage Wordpair
         */
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage_low` = :percentage_low_2
                           WHERE
                                 `quiz_type_id` =  2"
            );
        $l_aBindings = array(
            'percentage_low_2' => $p_aPost['percentage-low-2']
        );
        $l_oPreparedStatement->execute($l_aBindings);

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage_high` = :percentage_high_2
                           WHERE
                                 `quiz_type_id` =  2"
            );
        $l_aBindings = array(
            'percentage_high_2' => $p_aPost['percentage-high-2']
        );
        $l_oPreparedStatement->execute($l_aBindings);

        /**
         * Percentage Letterpair
         */
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage_low` = :percentage_low_3
                           WHERE
                                 `quiz_type_id` =  3"
            );
        $l_aBindings = array(
            'percentage_low_3' => $p_aPost['percentage-low-3']
        );
        $l_oPreparedStatement->execute($l_aBindings);

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "UPDATE 
                                `settings_quiz_pass_percentage`
                           SET 
                                `percentage_high` = :percentage_high_3
                           WHERE
                                 `quiz_type_id` =  3"
            );
        $l_aBindings = array(
            'percentage_high_3' => $p_aPost['percentage-high-3']
        );
        $l_oPreparedStatement->execute($l_aBindings);

        header("Refresh: 0");
    }
}