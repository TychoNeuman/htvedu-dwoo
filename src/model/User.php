<?php

declare(strict_types=1);

namespace App\Model;

class User
{
    private $m_iId;
    private $m_sUsername;
    private $m_sFirstName;
    private $m_sLastName;
    private $m_sDateOfBirth;
    private $m_sAddress;
    private $m_sPostCode;
    private $m_sResidence;
    private $m_sPassword;
    private $m_sPhoneNumber;
    private $m_sEmail;
    private $m_sSecondEmail;
    private $m_sRole;

    public function setId(int $p_iId) {$this->m_iId = $p_iId;}
    public function getId() : int {return $this->m_iId;}
    public function setUsername(string $p_sUsername) {$this->m_sUsername = $p_sUsername;}
    public function getUsername() : string {return $this->m_sUsername;}
    public function setFirstName(string $p_sFirstName) {$this->m_sFirstName = $p_sFirstName;}
    public function getFirstName() : string {return $this->m_sFirstName;}
    public function setLastName(string $p_sLastName) {$this->m_sLastName = $p_sLastName;}
    public function getLastName () : string {return $this->m_sLastName;}
    public function setDateOfBirth(string $p_sDateOfBirth) {$this->m_sDateOfBirth = $p_sDateOfBirth;}
    public function getDateOfBirth() : string {return $this->m_sDateOfBirth;}
    public function setAddress(string $p_sAddress) {$this->m_sAddress = $p_sAddress;}
    public function getAddress() : string {return $this->m_sAddress;}
    public function setPostcode(string $p_sPostcode) {$this->m_sPostCode = $p_sPostcode;}
    public function getPostcode () : string {return $this->m_sPostCode;}
    public function setResidence(string $p_sResidence) {$this->m_sResidence = $p_sResidence;}
    public function getResidence() : string {return $this->m_sResidence;}
    public function setPassword(string $p_sPassword) {$this->m_sPassword = $p_sPassword;}
    public function getPassword() : string {return $this->m_sPassword;}
    public function setPhoneNumber(string $p_sPhonenumber) {$this->m_sPhoneNumber = $p_sPhonenumber;}
    public function getPhoneNumber() : string {return $this->m_sPhoneNumber;}
    public function setEmail(string $p_sEmail) {$this->m_sEmail = $p_sEmail;}
    public function getEmail() : string {return $this->m_sEmail;}
    public function setSecondEmail(string $p_sSecondEmail) {$this->m_sSecondEmail = $p_sSecondEmail;}
    public function getSecondEmail() : string {return $this->m_sSecondEmail;}
    public function setRole(string $p_sRole) {$this->m_sRole = $p_sRole;}
    public function getRole() : string {return $this->m_sRole;}

}

