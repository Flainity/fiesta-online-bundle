<?php


namespace Aeris\FiestaOnlineBundle\Manager;


use Aeris\FiestaOnlineBundle\Entity\Character\Character;
use Aeris\FiestaOnlineBundle\Entity\Character\CharacterClass;
use Aeris\FiestaOnlineBundle\Entity\Character\Item;
use Aeris\FiestaOnlineBundle\Entity\Ticket\CharacterClassList;
use Doctrine\Persistence\ManagerRegistry;


class CharacterManager
{
    private $doctrine;
    private $classList;

    /**
     * CharacterManager constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->classList = $doctrine->getManager('ticket')->getRepository(CharacterClassList::class)->findAll();
    }

    /**
     * Returns a Character array with the corresponding classes
     * @param int|null $accountId
     * @param bool $includeDeleted
     * @return array
     */
    public function getCharactersWithClasses(int $accountId = null, bool $includeDeleted = false): array
    {
        $characterManager = $this->doctrine->getManager('character');

        if ($accountId !== null)
            $characters = $characterManager->getRepository(Character::class)->findBy(['user_number' => $accountId, 'deleted' => $includeDeleted]);
        else
            $characters = $characterManager->getRepository(Character::class)->findAll();

        $classList = $this->doctrine->getManager('ticket')
            ->getRepository(CharacterClassList::class)->findAll();

        /** @var Character $character */
        foreach ($characters as $character)
        {
            /** @var CharacterClass $class */
            $class = $characterManager->getRepository(CharacterClass::class)->findOneBy(['id' => $character->getId()]);
            $class->setName($classList[$class->getClassId()]->getName());
            $class->setImage($classList[$class->getClassId()]->getImage());
            $character->setClass($class);
        }

        return $characters;
    }

    /**
     * Returns a list of characters
     * If needed as array for datatables
     * @param bool $asArray
     * @return array|Character[]
     */
    public function getAllCharacters(bool $asArray = false): array
    {
        /** @var Character[] $characters */
        $characters = $this->getCharactersWithClasses();

        if ($asArray)
        {
            $characterArray = [];
            foreach ($characters as $character)
            {
                $characterArray[] = [
                    'id' => $character->getId(),
                    'name' => $character->getName().';'.$character->getId(),
                    'level' => $character->getLevel(),
                    'class' => $character->getClass()->getName(),
                    'play_time' => $character->getPlayMinutes()
                ];
            }

            return $characterArray;
        }

        return $characters;
    }

    public function getCharacterById(int $characterId): Character
    {
        /** @var Character $character */
        $character = $this->doctrine->getManager('character')
            ->getRepository(Character::class)->findOneBy(['id' => $characterId]);

        return $this->buildCharacterObject($character);
    }

    public function getCharacterByName(string $characterName): Character
    {
        /** @var Character $character */
        $character = $this->doctrine->getManager('character')
            ->getRepository(Character::class)->findOneBy(['name' => $characterName]);

        return $this->buildCharacterObject($character);
    }

    public function hasItemInInventory(int $characterId, int $itemId): bool
    {
        return $this->doctrine->getManager('character')
            ->getRepository(Item::class)
                ->findOneBy(['owner' => $characterId, 'item_id' => $itemId, 'storage_type' => 9]) instanceof Item;
    }

    private function buildCharacterObject(Character $character): ?Character
    {
        /** @var CharacterClass $characterClass */
        $characterClass = $this->doctrine->getManager('character')
            ->getRepository(CharacterClass::class)->findOneBy(['id' => $character->getId()]);

        $characterClass->setName($this->classList[$characterClass->getClassId()]->getName());
        $characterClass->setImage($this->classList[$characterClass->getClassId()]->getImage());

        $character->setClass($characterClass);

        return $character;
    }
}