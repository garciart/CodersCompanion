<?php
/**
 * User class.
 *
 * PHP version used: 7.3.12
 *
 * Styling guide: PSR-12: Extended Coding Style
 *     (https://www.php-fig.org/psr/psr-12/)
 *
 * @category Basics
 * @package  PHP
 * @author   Rob Garcia <rgarcia@rgprogramming.com>
 * @license  https://opensource.org/licenses/MIT The MIT License
 * @link     https://github.com/garciart/Basics
 */

namespace PHP;

// Include this file to access common functions and variables
require_once 'Common.php';

/**
 * User class.
 *
 * Properties: Explained below.
 * Methods: Constructor, getters, and setters only.
 */
class User
{
    /**
     *  Class properties.
     */
    private $_userID;
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_score;
    private $_creationDate;
    private $_comment;

    /**
     * Class constructor.
     *
     * @param integer $userID       The user's ID.
     * @param string  $firstName    The user's first name.
     * @param string  $lastName     The user's last name.
     * @param string  $email        The user's email address (used for user name).
     * @param float   $score        The user's score from 0.0 to 100.0.
     * @param string  $creationDate The date the user was added to the database.
     * @param string  $comment      Any additional comments.
     *
     * @return void
     */
    public function __construct(
        $userID, $firstName, $lastName, $email, $score, $creationDate, $comment) {
        $this->setUserID($userID);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setEmail($email);
        $this->setScore($score);
        $this->setCreationDate($creationDate);
        $this->_comment = $comment;
    }

    /**
     * User ID getter.
     *
     * @return integer The user ID property.
     */
    public function getUserID()
    {
        return $this->_userID;
    }

    /**
     * User ID setter.
     *
     * @param integer $userID The user's ID.
     *
     * @return void
     */
    public function setUserID($userID)
    {
        if (empty($userID)) {
            throw new \InvalidArgumentException(
                'User ID cannot be empty, 0, NULL, or FALSE.'
            );
        } else {
            $this->_userID = $userID;
        }
    }

    /**
     * First name getter.
     *
     * @return integer The first name property.
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /**
     * First name setter.
     *
     * @param integer $firstName The user's first name.
     *
     * @return void
     */
    public function setFirstName($firstName)
    {
        if (empty($firstName)) {
            throw new \InvalidArgumentException(
                'First name cannot be empty, 0, NULL, or FALSE.'
            );
        } else {
            $this->_firstName = $firstName;
        }
    }

    /**
     * Last name getter.
     *
     * @return integer The last name property.
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * Last name setter.
     *
     * @param integer $lastName The user's last name.
     *
     * @return void
     */
    public function setLastName($lastName)
    {
        if (empty($lastName)) {
            throw new \InvalidArgumentException(
                'Last name cannot be empty, 0, NULL, or FALSE.'
            );
        } else {
            $this->_lastName = $lastName;
        }
    }

    /**
     * Email getter.
     *
     * @return integer The email property.
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * Email setter.
     *
     * @param integer $userID The user's email address (used for user name).
     *
     * @return void
     */
    public function setEmail($email)
    {
        if (empty($email)) {
            throw new \InvalidArgumentException(
                'Email cannot be empty, 0, NULL, or FALSE.'
            );
        } else {
            $this->_email = $email;
        }
    }

    /**
     * Score getter.
     *
     * @return integer The score property.
     */
    public function getScore()
    {
        return $this->_score;
    }

    /**
     * Score setter.
     *
     * @param integer $score The user's score from 0.0 to 100.0.
     *
     * @return void
     */
    public function setScore($score)
    {
        if ($score == "" || $score == null || $score == false || $score == array()) {
            throw new \InvalidArgumentException(
                'Score cannot be empty, NULL, or FALSE.'
            );
        } else if ($score < 0.0 || $score > 100.0) {
            throw new \OutOfRangeException(
                'Score must be equal to or between 0.0 and 100.0'
            );
        } else {
            $this->_score = $score;
        }
    }

    /**
     * Creation date getter.
     *
     * @return integer The creation date property.
     */
    public function getCreationDate()
    {
        return $this->_creationDate;
    }

    /**
     * Creation date setter.
     *
     * @param integer $creationDate The date the user was added to the database.
     *
     * @return void
     */
    public function setCreationDate($creationDate)
    {
        if (empty($creationDate)) {
            throw new \InvalidArgumentException(
                'Creation date cannot be empty, 0, NULL, or FALSE.'
            );
        } else {
            $this->_creationDate = $creationDate;
        }
    }

    /**
     * Comment getter.
     *
     * @return integer The comment property.
     */
    public function getComment()
    {
        return $this->_comment;
    }

    /**
     * Comment setter.
     *
     * @param integer $comment Any additional comments.
     *
     * @return void
     */
    public function setComment($comment)
    {
        $this->_comment = $comment;
    }

}
