<?php

declare(strict_types=1);

namespace App\Model;

class User
{
    private $m_iId;
    private $m_sUsername;
    private $m_sFirstLetter;
    private $m_sFirstName;
    private $m_sPrefix;
    private $m_sLastName;
    private $m_sDateOfBirth;
    private $m_sAddress;
    private $m_sPostCode;
    private $m_sPassword;
    private $m_sPhoneNumber;
    private $m_sEmail;
    private $m_sSecondEmail;
    private $m_sRole;

    public function setId(int $p_iId) {$this->m_iId = $p_iId;}
    public function getId() : int {return $this->m_iId;}
    public function setUsername(string $p_sUsername) {$this->m_sUsername = $p_sUsername;}
    public function getUsername() : string {return $this->m_sUsername;}
    public function setFirstLetter(string $p_sFirstLetter) {$this->m_sFirstLetter = $p_sFirstLetter;}
    public function getFirstLetter() : string {return $this->m_sFirstLetter;}
    public function setFirstName(string $p_sFirstName) {$this->m_sFirstName = $p_sFirstName;}
    public function getFirstName() : string {return $this->m_sFirstName;}
    public function setPrefix(string $p_sPrefix) {$this->m_sPrefix = $p_sPrefix;}
    public function getPrefix() : string {return $this->m_sPrefix;}
    public function setLastName(string $p_sLastName) {$this->m_sLastName = $p_sLastName;}
    public function getLastName () : string {return $this->m_sLastName;}

    public function setRole(string $p_sRole) {$this->m_sRole = $p_sRole;}
    public function getRole() : string {return $this->m_sRole;}

}

