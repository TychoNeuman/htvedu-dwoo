<?php
session_start();

require 'vendor/autoload.php';

const PAGES_BASE = "public/pages/";

use App\Controller\UserController;
use App\Controller\QuizController;
use App\Authentication\Authentication;

$l_oDwoo = new Dwoo\Core();

if(!isset($_SESSION['username'])){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $l_oAuthentication = new Authentication();
        $l_oAuthentication->authenticate($_POST);
    }else{
        echo $l_oDwoo->get(PAGES_BASE . 'login.tpl');
    }
}else{
    if(isset($_GET['p'])){
        switch($_GET['p'])
        {
            case 'login' :
                echo $l_oDwoo->get(PAGES_BASE . 'login.tpl');
                break;
            case 'logout' :
                $l_oAuthentication = new Authentication();
                $l_oAuthentication->logOut();
                break;
            case 'dashboard' :
                echo $l_oDwoo->get(PAGES_BASE . 'dashboard.tpl');
                break;
            case 'users' :
                $l_oUserController = new UserController();
                $l_aUsers = array('users' => $l_oUserController->getUsersOverviewProjector());
                echo $l_oDwoo->get(PAGES_BASE .'usersoverview.tpl', $l_aUsers);
                break;
            case 'userpage' :
                $l_oUserController = new UserController();
                $l_aUser = array('user' => $l_oUserController->getUserProjector($_GET['id']));
                echo $l_oDwoo->get(PAGES_BASE . 'userpage.tpl', $l_aUser);
                break;
            case 'useradd' :
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $l_oUserController = new UserController();
                    $l_oUserController->addUser($_POST);
                }else{
                    echo $l_oDwoo->get(PAGES_BASE . 'useradd.tpl');
                }
                break;
            case 'quiz' :
                $l_oQuizController = new QuizController();
                $l_aData = array('quizes' => $l_oQuizController->getQuizOverviewProjector());
                echo $l_oDwoo->get(PAGES_BASE . 'quizoverview.tpl', $l_aData);
                break;
            case 'quizaddinfo' :
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $l_oQuizController = new QuizController();
                    $l_oQuizController->addQuizTitle($_POST);
                }
                echo $l_oDwoo->get(PAGES_BASE . 'quizaddinfo.tpl');
                break;
            case 'quizaddquestions' :
                $l_oQuizController = new QuizController();
                $l_aData = array(
                    'type' => $_GET['type'],
                    'quizinfo' => $l_oQuizController->getQuiz($_GET['id'])
                );
                // Go to the page to add questions
                echo $l_oDwoo->get(PAGES_BASE . 'quizaddquestions.tpl', $l_aData);
                break;
            case 'settings' :
                echo $l_oDwoo->get(PAGES_BASE . 'settings.tpl');
                break;
        }
    }else{
        echo $l_oDwoo->get(PAGES_BASE .'dashboard.tpl');
    }
}
