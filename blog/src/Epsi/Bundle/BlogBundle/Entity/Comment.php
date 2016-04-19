<?php

namespace Epsi\Bundle\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Epsi\Bundle\BlogBundle\Entity\CommentRepository")
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var User
     *
     * @ORM\ManyToOne(
     *      targetEntity="Epsi\Bundle\BlogBundle\Entity\User",
     *      inversedBy="comments"
     * )
     */
    private $author;

    /**
     * @var Post
     *
     * @ORM\ManyToOne(
     *      targetEntity="Epsi\Bundle\BlogBundle\Entity\Post",
     *      inversedBy="comments"
     * )
     */
    private $post;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set author
     *
     * @param \Epsi\Bundle\BlogBundle\Entity\User $author
     * @return Comment
     */
    public function setAuthor(\Epsi\Bundle\BlogBundle\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Epsi\Bundle\BlogBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set post
     *
     * @param \Epsi\Bundle\BlogBundle\Entity\Post $post
     * @return Comment
     */
    public function setPost(\Epsi\Bundle\BlogBundle\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Epsi\Bundle\BlogBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }
}
