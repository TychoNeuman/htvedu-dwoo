<?php

// TODO : Set hashing algo to sha512 with custom secret key

declare(strict_types=1);

namespace App\Authentication;

use App\Controller\UserController;
require "src/database/HtvDb.php";

use App\Database\HtvDb;
use App\System\HtvConfig;

class Authentication
{
    public function authenticate(array $p_aPost) : void
    {
        $l_sInsertedUsername = $p_aPost['username'];
        $l_sInsertedPassword = $p_aPost['password'];
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare("SELECT 
                                    `password`, `id`
                                 FROM 
                                     `users` 
                                 WHERE 
                                    `username` = :username");
        $l_aBindings = array(
            'username' => $l_sInsertedUsername
        );
        $l_oPreparedStatement->execute($l_aBindings);
        $l_aResult = $l_oPreparedStatement->fetch();

        if(hash_hmac('sha256', $l_sInsertedPassword, HtvConfig::get('secretkey')) === $l_aResult['password']){
            $l_oUserController = new UserController();
            $l_oUser = $l_oUserController->getUser((int)$l_aResult['id']);
            $_SESSION['id'] = $l_oUser->getId();
            $_SESSION['username'] = $l_oUser->getUsername();
            $_SESSION['firstname'] = $l_oUser->getFirstName();
            $_SESSION['lastname'] = $l_oUser->getLastName();
            $_SESSION['role'] = $l_oUser->getRole();
        }

        header("Location: index.php");
    }

    public function logOut()
    {
        session_destroy();
        header("Location: index.php");
    }
}