<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity()
* @ORM\Table()
*/

class Reply {

  /**
   * @ORM\Id()
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="integer")
   *
   * @var int
   */
  private $id;

  /**
   * @Assert\NotBlank()
   *@ORM\Column(type="text")
   *
   * @var string
   */
  private $comment;

  /**
   * @Assert\NotBlank()
   *@Assert\Email(checkHost =true)
   * @ORM\Column(type="text")
   *
   * @var string
   */
  private $authorEmail;

  /**
  * @Assert\NotBlank()
   * @ORM\Column(type="text")
   *
   * @var string
   */
  private $author;

  /**
   * @ORM\ManyToOne(targetEntity="Subject", inversedBy="replies")
   */
  private $subject;

  /**
   * @ORM\Column(type="integer")
   *
   * @var integer
   */
  private $vote;

  public function __construct()
  {
      $this->vote = 0;
  }

  /**
   * @return int
   */
  public function getId()
  {
      return $this->id;
  }


  /**
   * @return text
   */
  public function getComment()
  {
      return $this->comment;
  }

  /**
   * @return text
   */
  public function getAuthorEmail()
  {
      return $this->authorEmail;
  }

  /**
   * @return text
   */
  public function getAuthor()
  {
      return $this->author;
  }

  /**
   * @return Subject
   */
  public function getSubject()
  {
      return $this->subject;
  }

  /**
   * @param string $comment
   */
  public function setComment($comment)
  {
      $this->comment = $comment;
  }

  /**
   * @param string $author
   */
  public function setAuthor($author)
  {
      $this->author = $author;
  }

  /**
   * @param string $authorEmail
   */
  public function setAuthorEmail($authorEmail)
  {
      $this->authorEmail = $authorEmail;
  }


  /**
   * @param Subject $subject
   */
  public function setSubject(Subject $subject)
  {
    $this->subject = $subject;
  }

  public function getVote()
  {
      return $this->vote;
  }

  public function setVote($vote)
  {
      $this->vote = $vote;
  }
}
