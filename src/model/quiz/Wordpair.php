<?php

declare(strict_types=1);

namespace App\Model\Quiz;

use App\Database\HtvDb;

class Wordpair implements iQuiz
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
                                          `questions_wordpair` 
                                     WHERE 
                                           `quiz_id` = ' . $this->m_iId);
            $l_oPreparedStatement->execute();

            return $l_oPreparedStatement->fetchAll();
        }
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