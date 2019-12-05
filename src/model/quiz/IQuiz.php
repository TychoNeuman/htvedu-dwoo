<?php

declare(strict_types=1);

namespace App\Model\Quiz;

interface IQuiz
{
    public function setId();
    public function getId();
    public function setName();
    public function getName();
    public function setType();
    public function getType();
    public function setTime();
    public function getTime();
    public function setScore();
    public function getScore();
    public function setQuestions();
    public function getQuestions();
}