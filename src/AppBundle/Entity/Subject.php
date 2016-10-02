<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubjectRepository")
 * @ORM\Table()
 * @ORM\HasLifecycleCallbacks()
 */
class Subject
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     *
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $resolved;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $vote;

    /**
     * @ORM\OneToMany(targetEntity="Reply", mappedBy="subject", cascade={"remove"})
     * @ORM\OrderBy({"vote" = "DESC"})
     * @var ArrayCollection<Reply>
     */
    private $replies;

    public function __construct()
    {
        $this->resolved  = false;
        $this->vote = 0;
        $this->createdAt = new \DateTime;
        $this->updatedAt = new \DateTime;
        $this->replies = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
    * @return Reply[]
    **/
    public function getReplies()
    {
      return $this->replies;
    }

    public function getVote()
    {
        return $this->vote;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

        public function setVote($vote)
        {
            $this->vote = $vote;
        }
    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return boolean
     */
    public function isResolved()
    {
        return $this->resolved;
    }

    /**
     * @param boolean $resolved
     */
    public function setResolved($resolved)
    {
        $this->resolved = $resolved;
    }



    /**
     * @ORM\PreUpdate()
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime;
    }
}
