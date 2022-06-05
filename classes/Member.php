<?php

/**
 * Represents a Member
 */
class Member
{
    /**
     * First name
     * @var string
     */
    private string $_fname;

    /**
     * Last name
     * @var string
     */
    private string $_lname;

    /**
     * Age
     * @var int
     */
    private int $_age;

    /**
     * Users Gender
     * @var string
     */
    private string $_gender;

    /**
     * Users Phone
     * @var string
     */
    private string $_phone;

    /**
     * Users Email
     * @var string
     */
    private string $_email;

    /**
     * Users Home state
     * @var string
     */
    private string $_state;

    /**
     * Users seeking partners gender
     * @var string
     */
    private string $_seeking;

    /**
     * Users Bio
     * @var string
     */
    private string $_bio;


    /**
     * Member constructor
     * Represents a member
     *
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
     * gets Users First name
     * @return String
     */
    public function getFname(): string
    {
        return $this->_fname;
    }

    /**
     * sets Users First name
     * @param String $fname
     */
    public function setFname(string $fname)
    {
        $this->_fname = $fname;
    }

    /**
     * gets Users last name
     * @return String
     */
    public function getLname(): string
    {
        return $this->_lname;
    }

    /**
     * sets Users last name
     * @param String $lname
     */
    public function setLname(string $lname)
    {
        $this->_lname = $lname;
    }

    /**
     * gets Users age
     * @return int
     */
    public function getAge(): int
    {
        return $this->_age;
    }

    /**
     * sets Users age
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->_age = $age;
    }

    /**
     * gets user gender
     * @return String
     */
    public function getGender(): string
    {
        return $this->_gender;
    }

    /**
     * sets Users gender
     * @param String $gender
     */
    public function setGender(string $gender)
    {
        $this->_gender = $gender;
    }

    /**
     * gets Users phone number
     * @return String
     */
    public function getPhone(): string
    {
        return $this->_phone;
    }

    /**
     * sets Users phone number
     * @param String $phone
     */
    public function setPhone(string $phone)
    {
        $this->_phone = $phone;
    }

    /**
     * gets user email
     * @return String
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * sets Users email
     * @param String $email
     */
    public function setEmail(string $email)
    {
        $this->_email = $email;
    }

    /**
     * Gets Users home state
     * @return String
     */
    public function getState(): string
    {
        return $this->_state;
    }

    /**
     * sets Users home state
     * @param String $state
     */
    public function setState(string $state)
    {
        $this->_state = $state;
    }

    /**
     * Gets Users Seeking Gender
     * @return String
     */
    public function getSeeking(): string
    {
        return $this->_seeking;
    }

    /**
     * Sets Users Seeking Gender
     * @param String $seeking
     */
    public function setSeeking(string $seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * Gets Users Bio
     * @return String
     */
    public function getBio(): string
    {
        return $this->_bio;
    }

    /**
     * Sets Users Bio
     * @param String $bio
     */
    public function setBio(string $bio)
    {
        $this->_bio = $bio;
    }


}
