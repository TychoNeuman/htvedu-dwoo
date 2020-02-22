<?php

declare(strict_types=1);

// TODO : Don't forget to throw NoNecordExceptions

namespace App\Controller;

use App\Database\HtvDb;
use App\Model\Quiz\IQuiz;
use App\Model\User;
use App\System\HtvConfig;

class UserController
{
    private function _setUser(User $p_oUser, array $p_aResult) : User
    {
        $p_oUser->setId((int)$p_aResult['id']);
        $p_oUser->setUsername($p_aResult['username']);
        $p_oUser->setFirstName($p_aResult['firstname']);
        $p_oUser->setLastName($p_aResult['lastname']);
        $p_oUser->setDateOfBirth($p_aResult['date_of_birth']);
        $p_oUser->setAddress($p_aResult['address']);
        $p_oUser->setPostcode($p_aResult['postcode']);
        $p_oUser->setResidence($p_aResult['residence']);
        $p_oUser->setPassword($p_aResult['password']);
        $p_oUser->setPhoneNumber($p_aResult['phonenumber']);
        $p_oUser->setEmail($p_aResult['email']);
        $p_oUser->setSecondEmail($p_aResult['second_email']);
        $p_oUser->setRole($p_aResult['role']);

        return $p_oUser;
    }
    //Fetches all users
    public function getAllUsers() : array
    {
        $l_aUserArray = array();
        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "SELECT * FROM `users` ORDER BY `role`");
        $l_oPreparedStatement->execute();
        $l_aResult = $l_oPreparedStatement->fetchAll();

        foreach($l_aResult as $l_aUser){
            $l_oUser = self::_setUser(new User(), $l_aUser);
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

        return self::_setUser(new User(), $l_aResult);
    }

    public function getUserProjector(int $p_iUserId) : array
    {
        $l_oUser = self::getUser($p_iUserId);

        return array(
            'id' => $l_oUser->getId(),
            'username' => $l_oUser->getUsername(),
            'firstname' => $l_oUser->getFirstName(),
            'lastname' => $l_oUser->getLastName(),
            'dateOfBirth' => $l_oUser->getDateOfBirth(),
            'address' => $l_oUser->getAddress(),
            'postcode' => $l_oUser->getPostcode(),
            'residence' => $l_oUser->getResidence(),
            'phoneNumber' => $l_oUser->getPhoneNumber(),
            'firstEmail' => $l_oUser->getEmail(),
            'secondEmail' => $l_oUser->getSecondEmail(),
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

    public function addUser(array $p_aPost) : void
    {
        $l_sHashedPassword = hash_hmac('sha256', $_POST['password'], HtvConfig::get('secretkey'));

        $l_oPreparedStatement = HtvDb::getInstance()
            ->prepare(
                "INSERT INTO 
                            `users` (`username`, `password`, `firstname`, `lastname`, `date_of_birth`,
                            `address`, `postcode`, `residence`, `phonenumber`, `email`, `second_email`, `role`)
                            VALUES 
                            (:username, :password, :firstname, :lastname, :date_of_birth,
                            :address, :postcode, :residence, :phonenumber, :email, :second_email, :role)");
        $l_aBindings = array(
            'username' => $p_aPost['username'],
            'password' => $l_sHashedPassword,
            'firstname' => $p_aPost['firstname'],
            'lastname' => $p_aPost['lastname'],
            'date_of_birth' => date('Y-m-d', strtotime($p_aPost['date-of-birth'])),
            'address' => $p_aPost['address'],
            'postcode' => $p_aPost['postcode'],
            'residence' => $p_aPost['residence'],
            'phonenumber' => $p_aPost['phonenumber'],
            'email' => $p_aPost['email'],
            'second_email' => $p_aPost['second_email'],
            'role' => $p_aPost['permission']
        );
        $l_oPreparedStatement->execute($l_aBindings);

        header("Location: index.php?p=users");
    }

    public function deleteSubmittedAnswers(iQuiz $p_oQuiz, User $p_oUser = null)
    {
        $l_oDb = HtvDb::getInstance();
        $l_sQuery = "SELECT count(id) as `count` FROM `quiz_submitted_answers`
                    WHERE `quiz_id` = " . $p_oQuiz->getId();
        if(!empty($p_oUser)){
            $l_sQuery .= " AND `user_id` = " . $p_oUser->getId();
        }

        $l_oPreparedStatement = $l_oDb->prepare($l_sQuery);
        $l_oPreparedStatement->execute();
        $l_iCount = $l_oPreparedStatement->fetchObject();

        if($l_iCount->count > 0){
            $l_sQuery = "DELETE FROM `quiz_submitted_answers` WHERE `quiz_id` = " . $p_oQuiz->getId();
            if(!empty($p_oUser)){
                $l_sQuery .= " AND `user_id` = " . $p_oUser->getId();
            }
            $l_oPreparedStatement = $l_oDb->prepare($l_sQuery);
            $l_oPreparedStatement->execute();
        }
    }

    public function getAllAssignedQuiz(int $p_iUserId) : array
    {
        $l_oQuizController = new QuizController();
        $l_oHtvDb = HtvDb::getInstance();

        $l_oPreparedStatement = $l_oHtvDb->prepare("SELECT * FROM `assigned_quiz` WHERE `user_id` = " . $p_iUserId);
        $l_oPreparedStatement->execute();

        $l_aAssignedQuiz = $l_oPreparedStatement->fetchAll();
        $l_aAllQuiz = $l_oQuizController->getQuizOverviewProjector();
        $l_aFilteredArray = array();

        if(!empty($l_aAssignedQuiz)){
            foreach ($l_aAssignedQuiz as $l_aSingleAssignedQuiz){
                for($l_iIndex = 0; $l_iIndex < count($l_aAllQuiz); $l_iIndex++){
                    if($l_aSingleAssignedQuiz['quiz_id'] === $l_aAllQuiz[$l_iIndex]['id']){
                        $l_aFilteredArray[] = $l_aAllQuiz[$l_iIndex];
                    }
                }
            }
        }

        return $l_aFilteredArray;
    }

    public function getAllNotAssignedQuiz(int $p_iUserId) : array
    {
        $l_oHtvDb = HtvDb::getInstance();

        $l_aAssignedQuizes = $this->getAllAssignedQuiz($p_iUserId);

        $l_oPreparedStatement = $l_oHtvDb->prepare("SELECT `id`, `name` FROM `quiz`");
        $l_oPreparedStatement->execute();
        $l_aQuizIdArray = $l_oPreparedStatement->fetchAll();

        $l_aFilterArray = array();

        foreach($l_aQuizIdArray as $l_aQuizId){
            $l_aFilterArray[] =  array(
                'id' => $l_aQuizId['id'],
                'name' => $l_aQuizId['name']);
        }

        if(!empty($l_aAssignedQuizes)){
            foreach($l_aAssignedQuizes as $l_aAssignedQuiz){
                for($l_iIndex = 0; $l_iIndex < count($l_aQuizIdArray); $l_iIndex++){
                    if($l_aAssignedQuiz['id'] === $l_aQuizIdArray[$l_iIndex]['id']){
                        unset($l_aFilterArray[$l_iIndex]);
                    }
                }
            }
        }

        return $l_aFilterArray;

    }

    public function assignQuiz(array $p_aPost, int $p_iUserId)
    {
        $l_oHtvDb = HtvDb::getInstance();
        $l_oPreparedStatement = $l_oHtvDb->prepare(
        "INSERT INTO `assigned_quiz` (`user_id`, `quiz_id`) VALUES (:user_id, :quiz_id)"
        );
        $l_aBindings = array(
            'user_id' => $p_iUserId,
            'quiz_id' => (int)$p_aPost['assign-quiz']
        );
        $l_oPreparedStatement->execute($l_aBindings);
        header('Location: index.php?p=userpage&id=' . $p_iUserId);
    }
}