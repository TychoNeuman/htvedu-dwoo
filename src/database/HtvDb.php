<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

class HtvDb
{
    protected static $l_oConnection;

    //Let's get the Db using singleton pattern
    public static function getInstance() : PDO
    {
        if(!self::$l_oConnection){
            self::$l_oConnection = new PDO(
                'mysql:host=localhost;dbname=htvedu-dwoo',
                'root',
                '');
            self::$l_oConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::$l_oConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$l_oConnection;
    }

}