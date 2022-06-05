<?php

class Member
{
    private string $_fname;
    private string $_lname;
    private int $_age;
    private string $_gender;
    private string $_phone;
    private string $_email;
    private string $_state;
    private string $_seeking;
    private string $_bio;

    private array $_tempin;
    private array $_tempout;

    /**
     * @param string $fname
     * @param string $lname
     * @param int $age
     * @param string $gender
     * @param string $phone
     * @param string $email
     */
    public function __construct(string $fname = '', string $lname = '', int
    $age = 55, string $gender = '', string $phone = '', string $email = '')
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
        $this->_email = $email;
    }

    /**
     * @return String
     */
    public function getFname(): string
    {
        return $this->_fname;
    }

    /**
     * @param String $fname
     */
    public function setFname(string $fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return String
     */
    public function getLname(): string
    {
        return $this->_lname;
    }

    /**
     * @param String $lname
     */
    public function setLname(string $lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->_age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->_age = $age;
    }

    /**
     * @return String
     */
    public function getGender(): string
    {
        return $this->_gender;
    }

    /**
     * @param String $gender
     */
    public function setGender(string $gender)
    {
        $this->_gender = $gender;
    }

    /**
     * @return String
     */
    public function getPhone(): string
    {
        return $this->_phone;
    }

    /**
     * @param String $phone
     */
    public function setPhone(string $phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email)
    {
        $this->_email = $email;
    }

    /**
     * @return String
     */
    public function getState(): string
    {
        return $this->_state;
    }

    /**
     * @param String $state
     */
    public function setState(string $state)
    {
        $this->_state = $state;
    }

    /**
     * @return String
     */
    public function getSeeking(): string
    {
        return $this->_seeking;
    }

    /**
     * @param String $seeking
     */
    public function setSeeking(string $seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * @return String
     */
    public function getBio(): string
    {
        return $this->_bio;
    }

    /**
     * @param String $bio
     */
    public function setBio(string $bio)
    {
        $this->_bio = $bio;
    }

    /**
     * @return array
     */
    public function getTempin(): array
    {
        return $this->_tempin;
    }

    /**
     * @param array $tempin
     */
    public function setTempin(array $tempin): void
    {
        $this->_tempin = $tempin;
    }

    /**
     * @return array
     */
    public function getTempout(): array
    {
        return $this->_tempout;
    }

    /**
     * @param array $tempout
     */
    public function setTempout(array $tempout): void
    {
        $this->_tempout = $tempout;
    }


}
