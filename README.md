Site de promotion de l'EZ language
==========
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/4c050077-21b7-441e-b15b-56bed59cd8ea/big.png)](https://insight.sensiolabs.com/projects/4c050077-21b7-441e-b15b-56bed59cd8ea)

Le site a été réalisé en utilisant Symfony 2.8 et Bootstrap 3.
Nous utilisons Insight de Sensiolabs afin d'améliorer la qualité de notre code.

Le site est disponible en anglais et en français.
La version online est disponible [ici](http://ezlanguage.onetrickporo.com/fr/)

Projet crée le 18 Septembre 2016 par la promotion Master 2 SILI 2016-2017.

Notre équipe
------
###### Back-end
[<img alt="Kenny GUIOUGOU" src="https://avatars2.githubusercontent.com/u/16425377" width="140">](https://github.com/ShihoWasTaken) |  [<img alt="Adrien CASELLES" src="https://avatars0.githubusercontent.com/u/22172746" width="140">](https://github.com/adrien3) |
-------------------------------------|----------------------------------------|----------------------|
[Kenny GUIOUGOU    ShihoWasTaken](https://github.com/ShihoWasTaken) | [Adrien CASELLES    adrien3](https://github.com/adrien3) |

###### Front-end
[<img alt="Enzo CHEVALLIER" src="https://avatars1.githubusercontent.com/u/6780510" width="140">](https://github.com/Phobie53) |  [<img alt="Mathieu BOURBON" src="https://avatars2.githubusercontent.com/u/14941924" width="140">](https://github.com/Mathieubourbon) | [<img alt="Sara ZALARHE" src="https://avatars0.githubusercontent.com/u/17701146" width="140">](https://github.com/szalarhe) |  [<img alt="Hamza ROUINEB" src="https://avatars3.githubusercontent.com/u/17543310" width="140">](https://github.com/devlifealways) |  [<img alt="Hossam BENHOUD" src="https://avatars1.githubusercontent.com/u/11867755" width="140">](https://github.com/hbenhoud) |
-------------------------------------|----------------------------------------|----------------------|----------------------------------------|----------------------|----------------------|
[Enzo CHEVALLIER    Phobie53](https://github.com/Phobie53) | [Mathieu BOURBON    Mathieubourbon](https://github.com/Mathieubourbon) | [Sara ZALARHE    szalarhe](https://github.com/szalarhe) | [Hamza ROUINEB    devlifealways](https://github.com/devlifealways) | [Hossam BENHOUD    hbenhoud](https://github.com/hbenhoud) |

###### Traduction
[<img alt="Morgane TROYSI" src="https://avatars1.githubusercontent.com/u/15076317" width="140">](https://github.com/mtroysi) |  [<img alt="Fatima AMZIL" src="https://avatars1.githubusercontent.com/u/11032715" width="140">](https://github.com/famzil) |
-------------------------------------|----------------------------------------|----------------------|
[Morgane TROYSI    mtroysi](https://github.com/mtroysi) | [Fatima HAMZIL    famzil](https://github.com/famzil) |

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
