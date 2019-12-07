<?php

declare(strict_types=1);

namespace App\System;

class HtvConfig
{
    public static function get(string $p_sConfigContent)
    {
        $l_ainiFile = parse_ini_file('src/config/config.ini');

        if(array_key_exists($p_sConfigContent, $l_ainiFile)){
            return $l_ainiFile[$p_sConfigContent];
        }
    }
}