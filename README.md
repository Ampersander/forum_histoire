Symfony Standard Edition
========================

**WARNING**: This distribution does not support Symfony 4. See the
[Installing & Setting up the Symfony Framework][15] page to find a replacement
that fits you best.

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

Php=7.3.21
Symfony= 3.4.37

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev env) - Adds code generation
    capabilities

  * [**WebServerBundle**][14] (in dev env) - Adds commands for running applications
    using the PHP built-in web server

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/3.4/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.4/doctrine.html
[8]:  https://symfony.com/doc/3.4/templating.html
[9]:  https://symfony.com/doc/3.4/security.html
[10]: https://symfony.com/doc/3.4/email.html
[11]: https://symfony.com/doc/3.4/logging.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
[14]: https://symfony.com/doc/current/setup/built_in_web_server.html
[15]: https://symfony.com/doc/current/setup.html

Functionalities
--------------

#Connection Multi-User Admin, Member and Visitor (In future Moderator)

The visitor have access of the entire forum but he can't post anything.
The member can post an create new Thread.
The administrator can manage user and forum by different Interface.

#Creation of account

A visitor can create a new account to have access of the forum.
They need to inform different data like the username, mail and the password.
The possibity to have an avatar is possible during process of the account creation.
In the current version, it is not possible to change the image after the creation.

#My account

All User can see the username, mail and the number of posts of their accounts.
Also they can modify the username, mail and the password.

#Search

The possibility to search a keyword in subForum subject had be implement.

#Admin Interface

Administration du Forum(Réglages)

In the main interface of administration we can see differents parameters uses by the Bundle of the forum. To modify parameters we need to access to the app/config/config.yaml file and change variable in yosimitso_working_forum:


Gestion des forums
The first interface permit to manage the forum with the creation of new forum Subject with their Sub forum subject. It is also possible in this interface to delete a forum Subject or to change their rule of access.

Gestion des utilisateurs

In this party we have 3 differents Interface to manage the entire forum.
The first one "Liste des utilisateurs web" permit to manage user of the forum. 
It is possible to delete or to see all users account.

In the second interface, it is the bundle EasyAdmin with his interface with that we see others data of the user account and manage them.

In the third interface, we can handle the signalement of post and see the history.

#Test

It is possible to install the extension to do the test, you need to import in the extension the file Test_Forum_Katalon.html

* [**KatalonRecorder**][13] Chrome xtension for tests

The others possibility is to use JUnit on Java to make tests.

[16]:  https://chrome.google.com/webstore/detail/katalon-recorder-selenium/ljdobmomdgdljniojadhoplhkpialdid

