# Fiesta Online Bundle
A Symfony 4+ Bundle for Fiesta Online web projects
## Basic Information
This bundle includes all most relevant Entities and Managers needed to create a basic Fiesta Online homepage.
## Installation for Symfony 4 & 5
The bundle is available via packagist to directly integrate into your application
1. Go into your root directory of your project
2. Run `composer require aerisnet/fiesta-online-bundle`
3. To use the included Entities with your application, you have to refer to the bundle entities in your doctrine configuration. An example mapping can be found below
```php
dbal:
    connections:
        character:
            url: '%env(resolve:CHARACTER_URL)%'
            driver: 'pdo_sqlsrv'
            charset: UTF-8
...

orm:
    entity_managers:
        character:
            connection: character
            mappings:
                Character:
                type: annotation
                dir: '%kernel.project_dir%/vendor/aeris/fiesta-online-bundle/src/Entity/Character'
                prefix: 'Aeris\FiestaOnlineBundle\Entity\Character'
                alias: Character
```
## Examples
#### Account Manager
```php
public function indexAction(AccountManager $accountManager)
{
    /** 
     * @var User $user 
     * returns a User instance or null by the given Account ID
     */
    $user = $accountManager->getAccountById(5);
    ...
    
    /** 
     * @var User[] $user 
     * returns all accounts
     */
    $user = $accountManager->getAllAccounts();
    ...
    
    /**
     * @var User $user
     * returns a User instance with all characters belonging to the account as Proxy objects
     */
    $user = $accountManager->getAccountWithCharacters(5);
}
```
#### Character Manager
```php
public function indexAction(CharacterManager $characterManager)
{
    /** 
     * @var Character $character 
     * returns a Character instance or null by the given Character ID
     */
    $character = $characterManager->getCharacterById(123);
    ...
    
    /** 
     * @var Character $character 
     * returns a Character instance or null by the given Character Name
     */
    $character = $characterManager->getCharacterByName('Visionaire');
    ...
    
    /**
     * Check if a character has an item in their inventory
     * Parameters are Character ID and Item ID
     */
    $hasItem = $characterManager->hasItemInInventory($character->getId(), 385782);
}
```
