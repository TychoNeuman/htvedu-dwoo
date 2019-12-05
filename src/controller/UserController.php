<?php

declare(strict_types=1);

// TODO : Don't forget to throw NoNecordExceptions

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\User;

class UserController
{
    //Fetches all users
    public function getAllUsers() : array
    {
        $l_aUserArray = array();
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "SELECT * FROM `users`");
        $l_oPreparedStatement->execute();
        $l_aResult = $l_oPreparedStatement->fetchAll();

        foreach($l_aResult as $p_oUser){
            $l_oUser = new User();
            $l_oUser->setId((int)$p_oUser['id']);
            $l_oUser->setUsername($p_oUser['username']);
            $l_oUser->setFirstLetter($p_oUser['firstletter']);
            $l_oUser->setFirstName($p_oUser['firstname']);
            $l_oUser->setLastName($p_oUser['lastname']);
            $l_oUser->setRole($p_oUser['role']);
            $l_aUserArray[] = $l_oUser;
        }
        return $l_aUserArray;
    }

    public function getUser(int $p_iUserId) : User
    {
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "SELECT * FROM `users` WHERE `id` = :id");
        $l_aBindings = array(
            'id' => $p_iUserId
        );
        $l_oPreparedStatement->execute($l_aBindings);
        $l_aResult = $l_oPreparedStatement->fetch();

        $l_oUser = new User();
        $l_oUser->setId((int)$l_aResult['id']);
        $l_oUser->setUsername($l_aResult['username']);
        $l_oUser->setFirstLetter($l_aResult['firstletter']);
        $l_oUser->setFirstName($l_aResult['firstname']);
        $l_oUser->setLastName($l_aResult['lastname']);
        $l_oUser->setRole($l_aResult['role']);

        return $l_oUser;
    }

    public function getUserProjector(int $p_iUserId) : array
    {
        $l_oUser = self::getUser($p_iUserId);

        return array(
            'id' => $l_oUser->getId(),
            'username' => $l_oUser->getUsername(),
            'firstletter' => $l_oUser->getFirstLetter(),
            'firstname' => $l_oUser->getFirstName(),
            'lastname' => $l_oUser->getLastName(),
            'role' => $l_oUser->getRole()
        );
    }

    //Returns all relevant information for the user overview page
    public function getUsersOverviewProjector() : array
    {
        $l_aUserArray = array();
        $l_aUsers = self::getAllUsers();

        foreach($l_aUsers as $l_oUser) {
            $l_aUserArray[] = [
                'id' => $l_oUser->getId(),
                'username' => $l_oUser->getUsername(),
                'firstname' => $l_oUser->getFirstName(),
                'lastname' => $l_oUser->getLastName(),
                'role' => $l_oUser->getRole()
            ];
        }
        return $l_aUserArray;
    }

    public function addUser(array $p_aPost)
    {
        $l_sHashedPassword = hash_hmac('sha256', $_POST['password'], 'secretKey');

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "INSERT INTO 
                            `users` (`username`, `firstname`, `password`)
                            VALUES 
                            (:username, :firstname, :password)");
        $l_aBindings = array(
            'username' => $p_aPost['username'],
            'firstname' => $p_aPost['firstname'],
            'password' => $l_sHashedPassword
        );
        $l_oPreparedStatement->execute($l_aBindings);

        header("Location: index.php?p=users");
    }
}