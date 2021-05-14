# Fiesta Online Bundle
A Symfony 4+ Bundle for Fiesta Online web projects
## Basic Information
This bundle includes all most relevant Entities and Managers needed to create a basic Fiesta Online homepage.
## Installation for Symfony 4 & 5
The bundle is available via packagist to directly integrate into your application
1. Go into your root directory of your project
2. Run `composer require aeris/fiesta-online-bundle`
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
