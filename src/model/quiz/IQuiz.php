<?php

declare(strict_types=1);

namespace App\Model\Quiz;

interface IQuiz
{
    public function setId(int $p_iId);
    public function getId() : int;
    public function setName(string $p_sName);
    public function getName() : string;
    public function setType(int $p_iType);
    public function getType() : int;
    public function setTime(int $p_iTime);
    public function getTime() : int;
    public function setScore(int $p_iScore);
    public function getScore() : int;
    public function setQuestions(array $p_aQuestions);
    public function getQuestions() : array;
}