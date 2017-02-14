Site de promotion de l'EZ language
==========
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/4c050077-21b7-441e-b15b-56bed59cd8ea/big.png)](https://insight.sensiolabs.com/projects/4c050077-21b7-441e-b15b-56bed59cd8ea)

Le site a été réalisé en utilisant Symfony 2.8 et Bootstrap 3.
Nous utilisons Insight de Sensiolabs afin d'améliorer la qualité de notre code.

Le site est disponible en anglais et en français.
La version online est disponible [ici](http://ezlanguage.onetrickporo.com/fr/)

Projet crée le 18 Septembre 2016.

Developers
------
###### Back-end
* Kenny GUIOUGOU  - ShihoWasTaken
* Adrien CASELLES - adrien3

###### Front-end
* Enzo CHEVALLIER - Phobie53
* Mathieu BOURBON - Mathieubourbon
* Sara ZALARHE    - szalarhe

### Installation en envioremment de développement

Installer composer (voir la  [documentation officielle](https://getcomposer.org/download/))

```sh
$ git clone https://github.com/ezlanguage/website.git
$ cd website
$ composer install # Installation des dépendances
```

Voir si la configuration de l'environnement remplit les prérequis de Symfony :
```sh
$ php app/check.php
```

### Déploiement

Le déploiement est automatisé à l'aide du fichier deploy.rb et utilisera les paramètres du fichier parameters_prod.yml (et non parameters.yml qui corresponds à la configuration de dev).

Installer Capistrano :
```sh
$ gem install capistrano -v 2.15.9 # Version utilisée par notre équipe
```
Ensuite se placer à la racine du projet.

Modifier le fichier de configuration du déploiement (deploy.rb), et modifier l'utilisateur et le serveur cible.
```sh
$ nano app/config/deploy.rb
```

Modifier le fichier de configuration de la base de données de production (parameters_prod.yml).
Attention à ne pas commit ce fichier s'il contient le mot de passe de la base de données ou du mailer.
```sh
$ nano app/config/parameters_prod.yml
```

Premier déploiement (structure et fichier de configuration)
Il faudra refaire cette commande si des fichiers partagés sont ajoutés ou si la configuration (Base de données ou serveur de mail) change.
```sh
$ cap deploy:setup
```

Déploiement normal (après la 1ère fois)
```sh
$ cap deploy
```
