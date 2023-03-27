<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## A propos du projet

"Gestion ecole" est le projet fin de module PHP-Laravel. utilise la version du php 8.1.13, laravel 10,

développé dans le cadre de la licence d'Ingénierie Logicielle et Systèmes d'Information (ILSI) de l'ENSA Kénitra.


## Useful commands:
after "clone":

    1 - composer install  ==> Télécharger le dossier vendor

    2 - cp .env.example .env ==> crée le fichier <span>.env</span>

    3 - php artisan key:generate ==> generate the APP_KEY

    4 - php artisan migrate ==> Créer les tables dans la base données, ajouter "--seed" pour insérer les informations.

    4.1 - Au niveau de phpMyAdmin en mode SQL exécuter les requêtes suivantes pour changer le moteur de stockage:
        ALTER TABLE `courses` ENGINE=InnoDB;
        ALTER TABLE `failed_jobs` ENGINE=InnoDB;
        ALTER TABLE `migrations` ENGINE=InnoDB;
        ALTER TABLE `password_reset_tokens` ENGINE=InnoDB;
        ALTER TABLE `personal_access_tokens` ENGINE=InnoDB;
        ALTER TABLE `roles` ENGINE=InnoDB;
        ALTER TABLE `users` ENGINE=InnoDB;

In case if using Breeze:
    
    Le projet inclus la bobliothéque "Breeze"

    1- npm install    
    2- npm run build
