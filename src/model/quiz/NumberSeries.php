<?php

declare(strict_types=1);

namespace App\Model\Quiz;

use App\Database\HtvDb;

class NumberSeries extends Quiz implements IQuiz
{
    private $m_iId;
    private $m_sName;
    private $m_sType;
    private $m_iTime;
    private $m_iScore;
    private $m_aQuestions;

    public function fetchQuestionsToArray(): array
    {
        if(isset($this->m_iId)){
            $l_oPreparedStatement = HtvDb::getInstance()
                ->prepare('SELECT 
                                            * 
                                     FROM 
                                          `questions_numberseries` 
                                     WHERE 
                                           `quiz_id` = ' . $this->m_iId);
            $l_oPreparedStatement->execute();

            $l_aQuestions = $l_oPreparedStatement->fetchAll();

            $l_aQuestionsArray = array();

            foreach($l_aQuestions as $l_aQuestion){
                $l_aQuestionsArray[] = array(
                    'quizInfo' => $l_aQuestion,
                    'shuffled' => $this->shuffleAnswers($l_aQuestion)
                );
            }

            return $l_aQuestionsArray;
        }
    }

    public function deleteQuestions() : void
    {
        $l_oDb = HtvDb::getInstance();
        $l_oPreparedStatement = $l_oDb->prepare("SELECT count(id) as `count` FROM `questions_numberseries` WHERE `quiz_id` = " . $this->m_iId);
        $l_oPreparedStatement->execute();
        $l_iCount = $l_oPreparedStatement->fetchObject();

        if($l_iCount->count > 0){
            $l_oPreparedStatement = $l_oDb->prepare(
                'DELETE FROM `questions_numberseries` WHERE `quiz_id` = ' . $this->m_iId
            );
            $l_oPreparedStatement->execute();
        }
    }

    public function deleteAssignedQuiz() : void
    {
        parent::deleteAssigned($this);
    }

    public function deleteMe(): void
    {
        parent::deleteSelf($this);
    }

    private function shuffleAnswers(array $p_aQuestionArray): array
    {
        $l_aShuffledAnswersArray = array(
            $p_aQuestionArray['incorrect_num1'],
            $p_aQuestionArray['incorrect_num2'],
            $p_aQuestionArray['incorrect_num3'],
            $p_aQuestionArray['answer']
        );

        shuffle($l_aShuffledAnswersArray);

        return $l_aShuffledAnswersArray;
    }

    public function setId(int $p_iId) {$this->m_iId = $p_iId;}
    public function getId(): int {return $this->m_iId;}
    public function setName(string $p_sName) {$this->m_sName = $p_sName;}
    public function getName(): string {return $this->m_sName;}
    public function setType(int $p_iType) {$this->m_sType = $p_iType;}
    public function getType(): int {return $this->m_sType;}
    public function setTime(int $p_iTime) {$this->m_iTime = $p_iTime;}
    public function getTime(): int {return $this->m_iTime;}
    public function setScore(int $p_iScore) {$this->m_iScore = $p_iScore;}
    public function getScore(): int {return $this->m_iScore;}
    public function setQuestions(array $p_aQuestions) {$this->m_aQuestions = $p_aQuestions;}
    public function getQuestions(): array {return $this->m_aQuestions;}

}