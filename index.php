<?php

/**
 * TODO :
 *  - Set header("Refresh: 0") on all pages that set post variables on the same page
 */


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
                    $l_oQuizController->addQuizInfo($_POST);
                }
                echo $l_oDwoo->get(PAGES_BASE . 'quizaddinfo.tpl');
                break;
            case 'quizaddquestions' :
                $l_oQuizController = new QuizController();
                $l_oQuiz = $l_oQuizController->getQuiz((int)$_GET['id']);
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $l_oQuizController->addQuizQuestions($l_oQuiz, $_POST);
                }
                $l_aData = array(
                    'type' => $l_oQuiz->getType(),
                    'quiztype' => $l_oQuizController->determineQuizType($l_oQuiz->getType()),
                    'quizname' => $l_oQuiz->getName(),
                    'quizscore' => $l_oQuiz->getScore(),
                    'quiztime' => $l_oQuiz->getTime(),
                    'questions' => $l_oQuiz->getQuestions()
                );
                echo $l_oDwoo->get(PAGES_BASE . 'quizaddquestions.tpl', $l_aData);
                break;
            case 'quizpage' :
                $l_oQuizController = new QuizController();
                $l_oQuiz = $l_oQuizController->getQuiz((int)$_GET['id']);
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $l_oUserController = new UserController();
                    $l_oQuizController->submitQuizAnswers($l_oQuiz, $_POST, $l_oUserController->getUser($_SESSION['id']));
                }
                $l_aData = array(
                    'type' => $l_oQuiz->getType(),
                    'quiztype' => $l_oQuizController->determineQuizType($l_oQuiz->getType()),
                    'quizname' => $l_oQuiz->getName(),
                    'quizscore' => $l_oQuiz->getScore(),
                    'quiztime' => $l_oQuiz->getTime(),
                    'questions' => $l_oQuiz->getQuestions(),
                    'index' => 1
                );
                echo $l_oDwoo->get(PAGES_BASE . 'quizpage.tpl', $l_aData);
                break;
            case 'settings' :
                echo $l_oDwoo->get(PAGES_BASE . 'settings.tpl');
                break;
        }
    }else{
        echo $l_oDwoo->get(PAGES_BASE .'dashboard.tpl');
    }
}
