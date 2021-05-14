<?php

namespace Aeris\FiestaOnlineBundle\Entity\Ticket;

use Aeris\FiestaOnlineBundle\Entity\Account\User;
use Aeris\FiestaOnlineBundle\Repository\Ticket\TicketRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TicketRepository::class)
 * @ORM\Table(name="tTickets")
 */
class Ticket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="ticketID")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Subject::class, inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="catID", name="ticketCategory")
     */
    private $category;

    /**
     * @ORM\Column(type="integer", name="ticketAuthor")
     */
    private $author_id;

    /**
     * @var User $author
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=1000, name="ticketMessage")
     */
    private $message;

    /**
     * @ORM\Column(type="integer", name="ticketAcceptedBy", nullable=true)
     */
    private $editor_id;

    /**
     * @var User $editor
     */
    private $editor;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="statusID", name="ticketStatus")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=50, name="ticketDate")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255, name="ticketSubject")
     */
    private $subject;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Subject
    {
        return $this->category;
    }

    public function setCategory(?Subject $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    /**
     * @param int $author_id
     */
    public function setAuthorId(int $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     */
    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEditorId(): ?int
    {
        return $this->editor_id;
    }

    /**
     * @param int $editor_id
     */
    public function setEditorId(int $editor_id): void
    {
        $this->editor_id = $editor_id;
    }

    /**
     * @return User|null
     */
    public function getEditor(): ?User
    {
        return $this->editor;
    }

    /**
     * @param User $editor
     */
    public function setEditor(User $editor): void
    {
        $this->editor = $editor;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }
}
