<?php
/**
 * TODO :
 *  - Set header("Refresh: 0") on all pages that set post variables on the same page
 */

session_start();

require 'vendor/autoload.php';

const PAGES_BASE = "public/pages/";

use App\Controller\AssessmentController;
use App\Controller\UserController;
use App\Controller\QuizController;
use App\Authentication\Authentication;
use App\Controller\ResultsController;
use App\Controller\SettingsController;

$l_oDwoo = new Dwoo\Core();

if (!isset($_SESSION['username'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $l_oAuthentication = new Authentication();
        $l_oAuthentication->authenticate($_POST);
    } else {
        echo $l_oDwoo->get(PAGES_BASE . 'login.tpl');
    }
} else {
    if (isset($_GET['p'])) {
        switch ($_GET['p']) {
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
                echo $l_oDwoo->get(PAGES_BASE . 'usersoverview.tpl', $l_aUsers);
                break;
            case 'userpage' :
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $l_oUserController = new UserController();
                    $l_oUserController->assignQuiz($_POST, $_GET['id']);
                } else {
                    $l_oUserController = new UserController();
                    $l_oResultsController = new ResultsController();
                    $l_oAssessmentController = new AssessmentController();

                    $l_aUser = array('user' => $l_oUserController->getUserProjector($_GET['id']));
                    $l_aResults = $l_oResultsController->fetchResultsSingleStudent($_GET['id']);

                    $l_aAssignmentResult = $l_oAssessmentController->getAllResultsSingleStudents($_GET['id'], AssessmentController::ASSIGNMENT);
                    $l_aGroupResult = $l_oAssessmentController->getAllResultsSingleStudents($_GET['id'], AssessmentController::GROUP);
                    $l_aSportResult = $l_oAssessmentController->getAllResultsSingleStudents($_GET['id'], AssessmentController::SPORT);

                    $l_aAssignedQuiz = $l_oUserController->getAllAssignedQuiz($l_aUser['user']['id']);
                    $l_aNotAssignedQuiz = $l_oUserController->getAllNotAssignedQuiz($l_aUser['user']['id']);

                    $l_aData = array(
                        'user' => $l_aUser['user'],
                        'results' => $l_aResults,
                        'totalresult' => $l_oResultsController->fetchFinalResultQuiz($l_aResults),
                        'assignment' => empty($l_aAssignmentResult) ? $l_aAssignmentResult : $l_oAssessmentController->calculateFinalResultAssignment($l_aAssignmentResult[0]),
                        'group' => empty($l_aGroupResult) ? $l_aGroupResult : $l_oAssessmentController->calculateFinalResultGroup($l_aGroupResult[0]),
                        'sport' => empty($l_aSportResult) ? $l_aSportResult : $l_oAssessmentController->calculateFinalResultSport($l_aSportResult[0]),
                        'assignedQuiz' => $l_aAssignedQuiz,
                        'notAssignedQuiz' => $l_aNotAssignedQuiz
                    );

                    echo $l_oDwoo->get(PAGES_BASE . 'userpage.tpl', $l_aData);
                }
                break;
            case 'useradd' :
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $l_oUserController = new UserController();
                    $l_oUserController->addUser($_POST);
                } else {
                    echo $l_oDwoo->get(PAGES_BASE . 'useradd.tpl');
                }
                break;
            case 'quiz' :
                if($_SESSION['role'] === 'Admin'){
                    $l_oQuizController = new QuizController();
                    $l_aData = array('quizes' => $l_oQuizController->getQuizOverviewProjector());
                }else if($_SESSION['role'] === 'Student'){
                    $l_oUserController = new UserController();
                    $l_aData = array('quizes' => $l_oUserController->getAllAssignedQuiz($_SESSION['id']));
                }
                echo $l_oDwoo->get(PAGES_BASE . 'quizoverview.tpl', $l_aData);
                break;
            case 'quizaddinfo' :
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $l_oQuizController = new QuizController();
                    $l_oQuizController->addQuizInfo($_POST);
                }
                echo $l_oDwoo->get(PAGES_BASE . 'quizaddinfo.tpl');
                break;
            case 'quizaddquestions' :
                //TODO : Make all fields required for all quizes
                $l_oQuizController = new QuizController();
                $l_oQuiz = $l_oQuizController->getQuiz((int)$_GET['id']);
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $l_oQuizController->addQuizQuestions($l_oQuiz, $_POST);
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

                echo $l_oDwoo->get(PAGES_BASE . 'quizaddquestions.tpl', $l_aData);
                break;
            case 'quizpage' :
                $l_oQuizController = new QuizController();
                $l_oQuiz = $l_oQuizController->getQuiz((int)$_GET['id']);

                if ($_SERVER['REQUEST_METHOD'] === "POST") {
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
            case 'delete-quiz' :
                $l_iQuizId = $_GET['quiz-id'];
                $l_oQuizController = new QuizController();
                $l_oQuizController->deleteQuiz($l_iQuizId);
                break;
            case 'results' :
                $l_oResultsController = new ResultsController();
                $l_aData = $l_oResultsController->getResultOverviewStudents();
                echo $l_oDwoo->get(PAGES_BASE . 'results.tpl', $l_aData);
                break;
            case 'results-per-student' :
                $l_oResultsController = new ResultsController();
                $l_aQuizResults = $l_oResultsController->fetchResultsAllStudents();
                $l_aData = array(
                    'resultinfo' => $l_aQuizResults
                );

                echo $l_oDwoo->get(PAGES_BASE . 'resultsstudentoverview.tpl', $l_aData);
                break;
            case 'settings' :
                $l_oSettingsController = new SettingsController();

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $l_oSettingsController->postPercentageSettings($_POST);
                }
                $l_aData = array(
                    'percentagesettings' => $l_oSettingsController->fetchPercentageSettings()
                );

                echo $l_oDwoo->get(PAGES_BASE . 'settings.tpl', $l_aData);
                break;
            case 'assessment' :
                echo $l_oDwoo->get(PAGES_BASE . 'assessment.tpl');
                break;
            case 'assessment-users' :
                $l_sSubject = $_GET['subject'];
                $l_oAssessmentController = new AssessmentController();
                $l_aUsers = $l_oAssessmentController->getAllNotAssessed($l_sSubject);
                $l_aData = array(
                    'users' => $l_aUsers,
                    'subject' => $l_sSubject
                );
                echo $l_oDwoo->get(PAGES_BASE . 'assessment-users.tpl', $l_aData);
                break;
            case 'assessment-form' :
                $l_sSubject = $_GET['subject'];
                $l_iUserId = $_GET['id'];
                $l_oUserController = new UserController();
                $l_oAssessmentController = new AssessmentController();

                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $l_oAssessmentController->postAssessmentResults((int)$l_iUserId, $l_sSubject, $_POST);
                }

                $l_aData = array(
                    'subject' => $l_sSubject,
                    'user' => $l_oUserController->getUserProjector($l_iUserId)
                );

                echo $l_oDwoo->get(PAGES_BASE . 'assessment-form.tpl', $l_aData);
                break;
            case 'quizresults' :
                $l_iUserId = $_GET['user'];
                $l_iQuizId = $_GET['id'];

                $l_oQuizController = new QuizController();
                $l_oQuiz = $l_oQuizController->getQuiz($l_iQuizId);
                $l_oResultsController = new ResultsController();
                $l_aData = array(
                    'quizresults' =>$l_oResultsController->fetchQuizResults($l_oQuiz, $l_iUserId)
                );

                echo $l_oDwoo->get(PAGES_BASE . 'quizresults.tpl', $l_aData);
        }
    } else {
        echo $l_oDwoo->get(PAGES_BASE . 'dashboard.tpl');
    }
}
