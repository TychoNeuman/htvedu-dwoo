<?php

declare(strict_types=1);

namespace App\Model\Quiz;

class NumberSeries implements IQuiz
{
    private $m_iId;
    private $m_sName;
    private $m_sType;
    private $m_iTime;
    private $m_iScore;
    private $m_aQuestions;

    public function setId(int $p_iId)
    {
        $this->m_iId = $p_iId;
    }

    public function getId(): int
    {
        return $this->m_iId;
    }

    public function setName(string $p_sName)
    {
        $this->m_sName = $p_sName;
    }

    public function getName(): string
    {
        return $this->m_sName;
    }

    public function setType(int $p_iType)
    {
        // TODO: Implement setType() method.
    }

    public function getType(): int
    {
        // TODO: Implement getType() method.
    }

    public function setTime(int $p_iTime)
    {
        // TODO: Implement setTime() method.
    }

    public function getTime(): int
    {
        // TODO: Implement getTime() method.
    }

    public function setScore(int $p_iScore)
    {
        // TODO: Implement setScore() method.
    }

    public function getScore(): int
    {
        // TODO: Implement getScore() method.
    }

    public function setQuestions(array $p_aQuestions)
    {
        // TODO: Implement setQuestions() method.
    }

    public function getQuestions(): array
    {
        // TODO: Implement getQuestions() method.
    }
}