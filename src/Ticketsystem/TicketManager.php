<?php


namespace Aeris\FiestaOnlineBundle\Ticketsystem;


use Aeris\FiestaOnlineBundle\Entity\Account\User;
use Aeris\FiestaOnlineBundle\Entity\Ticket\Status;
use Aeris\FiestaOnlineBundle\Entity\Ticket\Subject;
use Aeris\FiestaOnlineBundle\Entity\Ticket\Ticket;
use Doctrine\Persistence\ManagerRegistry;

class TicketManager
{
    private $doctrine;

    /**
     * TicketManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param bool $asArray
     * @return Ticket[]
     */
    public function getAllTickets(bool $asArray = false): array
    {
        $tickets = $this->doctrine->getManager('ticket')->getRepository(Ticket::class)->findBy([], ['created_at' => 'DESC']);
        return $this->setAdditionalTicketInfo($tickets, $asArray);
    }

    /**
     * @param int $ticketId
     * @return Ticket|null
     */
    public function getTicketById(int $ticketId): ?Ticket
    {
        return $this->doctrine->getManager('ticket')->getRepository(Ticket::class)->findOneBy(['id' => $ticketId]);
    }

    /**
     * @param int $userId
     * @param bool $asArray
     * @return Ticket[]|null
     */
    public function getTicketsByUserId(int $userId, bool $asArray = false): ?array
    {
        $tickets = $this->doctrine->getManager('ticket')->getRepository(Ticket::class)->findBy(['author_id' => $userId]);
        return $this->setAdditionalTicketInfo($tickets, $asArray);
    }

    /**
     * @return Subject[]|null
     */
    public function getAllCategories(): ?array
    {
        return $this->doctrine->getManager('ticket')->getRepository(Subject::class)->findAll();
    }

    /**
     * @param int $categoryId
     * @return Subject|null
     */
    public function getCategoryById(int $categoryId): ?Subject
    {
        return $this->doctrine->getManager('ticket')->getRepository(Subject::class)->findOneBy(['id' => $categoryId]);
    }

    /**
     * @return Status|null
     */
    public function getInitialStatus(): ?Status
    {
        return $this->doctrine->getManager('ticket')->getRepository(Status::class)->findOneBy(['id' => 0]);
    }

    private function setAdditionalTicketInfo($tickets, bool $asArray = false)
    {
        $users = $this->doctrine->getManager('default')->getRepository(User::class)->findAllIndexed();

        foreach ($tickets as $ticket)
        {
            $ticket->setAuthor($users[$ticket->getAuthorId()]);
            $ticket->setEditor($users[$ticket->getEditorId()]);
        }

        if ($asArray)
        {
            $ticketsArray = [];

            foreach ($tickets as $ticket) {
                $ticketsArray[] = [
                    'id' => $ticket->getId(),
                    'subject' => $ticket->getSubject(),
                    'author' => $ticket->getAuthor()->getUsername(),
                    'editor' => $ticket->getEditor()->getUsername(),
                    'status' => $ticket->getStatus()->getName().';'.$ticket->getStatus()->getType(),
                    'category' => $ticket->getCategory()->getName()
                ];
            }

            return $ticketsArray;
        }

        return $tickets;
    }
}