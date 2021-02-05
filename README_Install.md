# Projet_Forum_Histoire

#Instalation du projet

Tout d'abord assurez-vous que votre pc dispose de php 7.3.* ou moins, de composer.phar, et un serveur tel que Wamp ou Xamp (Possibilité de de mettre un .php-version pour forcer l'utilisation d'une certaine version de php)

1/ parameters.yml

Tout d'abord il faudra modifier ses champs dans votre fichier parameters.yml qui se trouve dans app/config/ 
 ````yaml
    database_host: 127.0.0.1
    database_port: null
    database_name: forum_histoire
    database_user: root
    database_password: null
````
2/  Mettre à jours la base de donnée 

pour mettre à jour la base de donnée il faudra ouvrir la console dans la racine de projet puis exécuter la command suivant :
````bash
    php bin/console doctrine:schema:update --force  
````

3/Remplir la base de donnée

Cette commande permet de crée un jus de donnée initiale de l'application il crée par défaut un utilisateur admin avec un mot de passe root 

````bash
    php bin/console doctrine:fixtures:load  

````
3(Bis)/Remplir la base de donnée

Il est aussi possible de récupérer la BDD qui va fournir plus de donnés sur la racine du projet
Le fichier s'appelle forum_histoire.sql, il faudra faire un import sur phpMyAdmin.


4/Installer l'API du forum

Pour installer l'API, il faudra copier le dossier api qui se trouve à la racine puis le mettre dans le www de votre Wamp ou Xamp. Une fois cela effectué arrêter votre serveur Apache pour activer le module rewrite_module afin que l'API REST soit fonctionnelle.

5/Vérifier le fonctionnement de l'API

Il suffit de mettre cette adresse afin de récupérer tout les users du forum
````text
    http://localhost/api/forum_user/ 

````

6/ lancer votre serveur :

````bash
    php bin/console server:start 
````



#Fin d'installation vous pouvez maintenant commencer naviguer sur le site 
