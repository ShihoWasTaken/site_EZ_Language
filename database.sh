#!/bin/bash

# On supprime la base
# On recrée la base
# On met à jour le schéma de la BDD
# On charge les fixtures

php app/console doctrine:database:drop --force
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load -n

php app/console fos:user:promote user ROLE_ADMIN
