<?php


namespace Aeris\FiestaOnlineBundle\Manager;


use Aeris\FiestaOnlineBundle\Entity\Account\User;
use Doctrine\Persistence\ManagerRegistry;

class AccountManager
{
    private $doctrine;
    private $characterManager;

    /**
     * AccountManager constructor.
     * @param ManagerRegistry $doctrine
     * @param CharacterManager $characterManager
     */
    public function __construct(ManagerRegistry $doctrine, CharacterManager $characterManager)
    {
        $this->doctrine = $doctrine;
        $this->characterManager = $characterManager;
    }

    /**
     * Returns an account object with all characters.
     * @param int $accountId
     * @return User|null
     */
    public function getAccountWithCharacters(int $accountId): ?User
    {
        /** @var User $account */
        $account = $this->doctrine->getManager()
            ->getRepository(User::class)->findOneBy(['id' => $accountId]);

        $characters = $this->characterManager->getCharactersWithClasses($accountId);

        $account->setCharacters($characters);

        return $account;
    }

    public function getAccountById(int $accountId): ?User
    {
        return $this->doctrine->getRepository(User::class)->findOneBy(['id' => $accountId]);
    }

    public function getAllAccounts(): array
    {
        return $this->doctrine->getRepository(User::class)->findAll();
    }
}