-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2021 at 06:28 AM
-- Server version: 5.6.20-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum_histoire`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_user`
--

CREATE TABLE IF NOT EXISTS `forum_user` (
`id` int(11) NOT NULL,
  `lastReplyDate` datetime DEFAULT NULL,
  `avatar_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nb_post` int(11) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `forum_user`
--

INSERT INTO `forum_user` (`id`, `lastReplyDate`, `avatar_url`, `nb_post`, `banned`, `email_address`) VALUES
(1, '2021-02-04 12:30:13', NULL, 12, 0, NULL),
(3, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL),
(19, '2021-02-04 23:40:43', NULL, 1, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL),
(21, '2021-02-02 17:15:34', NULL, 2, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `user_forum_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nb_visite` int(11) NOT NULL,
  `dateInscrip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `liste_visiteur` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_forum_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nb_visite`, `dateInscrip`, `role`, `Status`, `image_name`, `image_size`, `updated_at`, `liste_visiteur`) VALUES
(1, 1, 'admin', 'admin', 'admin@zacc.fr', 'admin@zacc.fr', 1, NULL, '$2y$13$q2LLwIV62fDjXyv7icARGeieJ3K7Bi9MSTBSXrZstrIz9UOQJUsri', '2021-02-05 00:26:43', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 1, '2021-01-19 20:07:28', 'ROLE_ADMIN', 'inconnu', '601020ea432aa028828399.png', 1941, NULL, ''),
(3, 3, 'test', 'test', 'test@hotmail.com', 'test@hotmail.com', 1, NULL, '$2y$13$jaR/cYkvZgCRs76Lhwco5OiyAGPFWafeAHi43aEAGQm0c9zdwVjmq', NULL, NULL, NULL, 'a:0:{}', 1, '2021-01-25 09:32:49', NULL, 'inconnu', NULL, NULL, NULL, ''),
(5, 5, 'test2', 'test2', 'test@gmail.com', 'test@gmail.com', 1, NULL, '$2y$13$oh8zQ3QPvyvvE.O4T1aPte7.1Enf0SC17iaXBG/aj8WuwvTZ25YBi', NULL, NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-01-26 14:02:13', 'ROLE_USER', 'inconnu', '601020ea432aa028828399.png', 1941, '2021-01-26 14:02:18', 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(8, 8, 'test3', 'test3', 'test3@gmail.com', 'test3@gmail.com', 1, NULL, '$2y$13$xuKvwWKhcX9mtMU9pHy9gOEQlBqQaPiWnjRKzKXtYLeS2cZ9/lJxy', NULL, NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-01-26 14:03:29', 'YomiInter', 'inconnu', '60102132dd459991597412.png', 1941, '2021-01-26 14:03:30', 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(10, 10, 'test4', 'test4', 'test4@gmail.com', 'test4@gmail.com', 1, NULL, '$2y$13$Un0/NdjTMRq.8RrcdGDoGu/GYycYdNeYIpoL9JhcY5LSuOYYFXac2', '2021-02-04 23:46:50', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 1, '2021-01-26 14:05:32', 'ROLE_ADMIN', 'inconnu', NULL, NULL, NULL, 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(12, 12, 'test5', 'test5', 'test5@gmail.com', 'test5@gmail.com', 1, NULL, '$2y$13$asG/hRA8dSG/FKBrnuCIlOtiLOBqXeVFdPqc69A/pMbzD.4UrHWOC', NULL, NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-01-26 14:06:32', 'ROLE_USER', 'inconnu', NULL, NULL, NULL, 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(14, 14, 'test6', 'test6', 'test6@gmail.com', 'test6@gmail.com', 1, NULL, '$2y$13$H8M1h/OpAs1L7GnX/nu73OmGShiIkl5S83slYpYwqzKcQO9YU2hmW', NULL, NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-01-26 14:07:28', 'ROLE_USER', 'inconnu', NULL, NULL, NULL, 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(16, 16, 'test26', 'test26', 'test26@hotmail.com', 'test26@hotmail.com', 1, NULL, '$2y$13$889fc2MI2XnzD/aF0wyTy.JiA7g8HDSPMXhrIXBXHPKmKNfoRX5BC', '2021-01-26 14:15:20', NULL, NULL, 'a:0:{}', 1, '2021-01-26 14:13:37', 'ROLE_USER', 'inconnu', NULL, NULL, NULL, 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(17, 17, 'test60', 'test60', 'test60@gmail.com', 'test60@gmail.com', 1, NULL, '$2y$13$KD36rFz1iK3CuPG98DqJZ.vv4w4Oznj9.wHqBVYT8QzPYlAy1KZ.m', NULL, NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-01-27 14:38:00', 'ROLE_USER', 'inconnu', '60117aca8734c430222320.jpg', 6480, '2021-01-27 14:38:02', 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(18, 18, 'test70', 'test70', 'test70@gmail.com', 'test70@gmail.com', 1, NULL, '$2y$13$h3FacQRJktXaMW5FRM3AXu9nZJZGWxuyuneGVtdoss4uMoSAp2DXK', '2021-01-27 14:46:35', NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-01-27 14:41:13', 'ROLE_USER', 'inconnu', '60117b8aef010015757310.jpg', 375469, '2021-01-27 14:41:14', 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(19, 19, 'test20', 'test20', 'test20@gmail.com', 'test20@gmail.com', 1, NULL, '$2y$13$zkOgFexSAd5nN0PypHFW5.Im.nM56XtIGHW4nFU8WXwuMUkuBpxJ6', '2021-02-04 23:39:06', NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-01-27 18:03:38', 'ROLE_USER', 'inconnu', '6011aafbea2fc419464179.png', 4251, '2021-01-27 18:03:40', 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(21, 21, 'test29', 'test29', 'test29@gmail.com', 'test29@gmail.com', 1, NULL, '$2y$13$62x00I3bwAizisHvGiBJwuGIBQfIxpmb07UFJTVNVN81/DixdEiHS', '2021-02-02 17:11:51', NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-02-02 17:11:36', 'ROLE_USER', 'inconnu', NULL, NULL, NULL, 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}'),
(22, 22, 'test200', 'test200', 'test200@gmail.com', 'test200@gmail.com', 1, NULL, '$2y$13$tGqUr8hi89fEYFwug/k4ou8jEiJbNHhWdKsvxsmhxTWyHcAyDV0N6', '2021-02-03 06:04:23', NULL, NULL, 'a:2:{i:0;s:9:"ROLE_USER";i:1;s:9:"ROLE_USER";}', 1, '2021-02-03 06:03:54', 'ROLE_USER', 'inconnu', '601a3cccd64c2431822218.png', 6030, '2021-02-03 06:03:57', 'O:43:"Doctrine\\Common\\Collections\\ArrayCollection":1:{s:53:"\0Doctrine\\Common\\Collections\\ArrayCollection\0elements";a:0:{}}');

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_file`
--

CREATE TABLE IF NOT EXISTS `workingforum_file` (
`id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` bigint(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_forum`
--

CREATE TABLE IF NOT EXISTS `workingforum_forum` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `workingforum_forum`
--

INSERT INTO `workingforum_forum` (`id`, `name`, `slug`) VALUES
(1, 'Histoire', 'histoire'),
(2, 'Géographie', 'geographie');

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_post`
--

CREATE TABLE IF NOT EXISTS `workingforum_post` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `published` tinyint(1) NOT NULL,
  `cdate` datetime NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moderateReason` longtext COLLATE utf8_unicode_ci,
  `voteUp` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `workingforum_post`
--

INSERT INTO `workingforum_post` (`id`, `user_id`, `thread_id`, `content`, `published`, `cdate`, `ip`, `moderateReason`, `voteUp`) VALUES
(1, 1, 1, ':crying::crying::tongue::nerdy::nerdy::confused::bored:', 1, '2021-01-21 10:20:12', '127.0.0.1', NULL, NULL),
(2, 1, 2, 'sfdgfdg', 1, '2021-01-25 14:04:10', '127.0.0.1', NULL, NULL),
(3, 1, 2, '[quote=2]', 1, '2021-01-25 14:05:09', '127.0.0.1', NULL, 1),
(4, 1, 2, 'gfbgchg', 1, '2021-01-27 17:58:04', '127.0.0.1', NULL, 1),
(5, 1, 2, 'rtyr', 1, '2021-01-27 18:48:45', '127.0.0.1', NULL, NULL),
(6, 1, 2, 'ghjhgjghj', 1, '2021-01-28 08:18:45', '127.0.0.1', NULL, NULL),
(7, 1, 2, 'uuiuipoipio', 1, '2021-02-02 10:19:33', '127.0.0.1', NULL, NULL),
(8, 21, 3, 'kml!mlk;::;;;,', 1, '2021-02-02 17:12:21', '127.0.0.1', NULL, NULL),
(9, 21, 2, '[quote=2]n;', 1, '2021-02-02 17:15:34', '127.0.0.1', NULL, 1),
(10, 1, 2, 'test', 1, '2021-02-03 06:01:05', '127.0.0.1', NULL, NULL),
(11, 1, 4, 'Au XVIe si&egrave;cle, le Portugal continue les explorations (Cabral). Les autres grands navigateurs Christophe Colomb, Amerigo Vespucci (voir paragraphe et article d&eacute;taill&eacute; grandes d&eacute;couvertes&hellip;) permettent aux puissances ib&eacute;riques (Portugal et Espagne) d''&eacute;tendre leur puissance et de chercher de nouvelles voies maritimes pour les &eacute;pices, la principale route des &eacute;pices exploit&eacute;e par les Ottomans &eacute;tant coup&eacute;e depuis la chute de Constantinople.', 1, '2021-02-04 12:25:31', '127.0.0.1', NULL, NULL),
(12, 1, 5, 'Coinc&eacute; entre le golfe d&rsquo;Aden (au sud) et l&rsquo;Arabie Saoudite (au nord), le Y&eacute;men est en proie, depuis 2004, &agrave; une guerre civile meurtri&egrave;re d&rsquo;origine tribale opposant la minorit&eacute; za&iuml;dite du pays (une composante particuli&egrave;re du chiisme dite houthiste par r&eacute;f&eacute;rence au chef historique de la r&eacute;bellion, Hussein Badreddine al-Houthi) &agrave; la majorit&eacute; sunnite au pouvoir, qu&rsquo;incarne aujourd&rsquo;hui le pr&eacute;sident Mansour Hadi.\r\n\r\nEnd&eacute;mique depuis la fin de la monarchie qui, en 1962, a entra&icirc;n&eacute; la disparition de l&rsquo;imamat za&iuml;dite autonome qui existait au nord du pays, cette crise a pris un tour aigu, en 2015, avec l&rsquo;intervention de l&rsquo;Arabie Saoudite au c&ocirc;t&eacute; du pr&eacute;sident Hadi et le soutien sym&eacute;trique fourni aux houthis par l&rsquo;Iran', 1, '2021-02-04 12:27:05', '127.0.0.1', NULL, NULL),
(13, 1, 6, 'Le mot Paris est issu du latin Parisiis (au datif locatif pluriel), d&eacute;signation qui a supplant&eacute; Lutetia , suivant un processus g&eacute;n&eacute;ral observ&eacute; dans la Gaule du Bas Empire vers le IV e si&egrave;cle pour les capitales de civitas (cit&eacute;s gallo-romaines) : celles-ci furent d''abord appel&eacute;es de leur nom originel compl&eacute;t&eacute; du nom du peuple dont elles &eacute;taient la capitale, comme Lutecia des Parisii en l''occurrence.', 1, '2021-02-04 12:29:28', '127.0.0.1', NULL, NULL),
(14, 1, 4, 'Incroyable:thumbup::thumbup::thumbup::thumbup::thumbup::thumbup:', 1, '2021-02-04 12:30:13', '127.0.0.1', NULL, NULL),
(15, 19, 7, 'ceci est un test', 1, '2021-02-04 23:40:43', '127.0.0.1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_post_report`
--

CREATE TABLE IF NOT EXISTS `workingforum_post_report` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cdate` datetime NOT NULL,
  `processed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `workingforum_post_report`
--

INSERT INTO `workingforum_post_report` (`id`, `post_id`, `user_id`, `cdate`, `processed`) VALUES
(1, 2, 21, '2021-02-02 17:15:26', 1),
(2, 12, 1, '2021-02-04 12:27:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_post_vote`
--

CREATE TABLE IF NOT EXISTS `workingforum_post_vote` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `voteType` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `workingforum_post_vote`
--

INSERT INTO `workingforum_post_vote` (`id`, `post_id`, `thread_id`, `user_id`, `voteType`) VALUES
(1, 3, 2, 21, 1),
(2, 4, 2, 21, 1),
(3, 9, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_rules`
--

CREATE TABLE IF NOT EXISTS `workingforum_rules` (
`id` int(11) NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `workingforum_rules`
--

INSERT INTO `workingforum_rules` (`id`, `lang`, `content`) VALUES
(1, 'Français', '<strong>Respect</strong><br/>\nLes utilisateurs doivent traiter les autres utilisateurs, la modération et l''administration du Forum avec respect. Les commentaires irritants et irrespectueux ne sont pas tolérés. De même, les commentaires potentiellement faux ou pouvant porter préjudice à un individu ou une entité ne sont pas tolérés.\n\nIl est important de faire la différence entre un jugement/attaque personnelle et une opinion. Une utilisatrice est dans son droit de réfuter votre argumentaire en faisant preuve de respect et en exposant ses propres arguments pour appuyer son opinion, et ceci ne constitue pas nécessairement à un jugement ou une attaque personnelle. Veuillez vous référer à l''équipe de modération en cas de doute. Une règle de base à respecter dans ce cas est qu''il est permis d''exprimer votre désaccord avec une idée sans attaquer la personne.\n\n<strong>Pondération, civisme et courtoisie</strong><br/>\nParce que nous souhaitons que les échanges sur le Forum se fassent dans la bonne humeur et l''harmonie, nous demandons à nos utilisateurs de toujours faire preuve de pondération, de civisme et de courtoisie dans leurs publications. Bien qu''un Forum soit un milieu virtuel, il convient de toujours garder à l''esprit qu''il est aussi un espace public. Ne vous cachez pas derrière votre entité virtuelle, soyez comme vous seriez en personne.\n\nL''équipe de modération ne tolère pas l''acharnement envers un autre utilisateur, le cynisme/dérision, la condescendance, les jugements et préjugés.\n\n<strong>Consulter l’existant et respecter les sections</strong><br/>\nAvant de publier un message, naviguez dans les différentes sections du Forum afin de repérer la section appropriée. Merci de publier votre message dans une seule section.\n\nAvant de poser une question sur le Forum, veillez à rechercher dans les sujets déjà existants pour savoir si une question identique à la vôtre a déjà été posée et répondue, et ainsi éviter la redite.\n\nIl est à noter que votre message pourrait être déplacé par l''équipe de modération sans préavis si il se trouve dans la mauvaise section.\n\n<strong>Pas de messages ou de fils identiques</strong><br/>\nLa publication de multiples messages identiques ajoute une surcharge inutile au Forum et fait perdre du temps aux utilisateurs.\n\n<strong>Pas de publication de liens sans introduction</strong><br/>\nSi vous souhaitez publier un lien vers une information qui vous semble pertinente, veuillez ajouter un commentaire décrivant l’intérêt de ce lien. Les messages ne contenant qu’un/des liens ne seront pas tolérés.\n\nIl est également apprécié d''utiliser les paragraphes, la grammaire et la conjugaison appropriés qui rendront la lecture de vos messages plus agréable.\n\n<strong>Pas d’usage abusif de majuscules</strong><br/>\nMerci de ne pas faire un usage abusif des majuscules dans les titres ou les messages car cela diminue de beaucoup la lisibilité de l’ensemble du Forum.\n\nSi vous avez besoin d’aide à l’utilisation de notre Forum ou en cas de plainte à propos d’une décision de l’administration, veuillez nous contacter par messagerie à l’adresse forumadmin@alco.com.');

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_setting`
--

CREATE TABLE IF NOT EXISTS `workingforum_setting` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_subforum`
--

CREATE TABLE IF NOT EXISTS `workingforum_subforum` (
`id` int(11) NOT NULL,
  `forum_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nb_thread` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nb_post` int(11) DEFAULT NULL,
  `last_reply_date` datetime DEFAULT NULL,
  `allowed_roles` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `lastReplyUser` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `workingforum_subforum`
--

INSERT INTO `workingforum_subforum` (`id`, `forum_id`, `description`, `name`, `nb_thread`, `slug`, `nb_post`, `last_reply_date`, `allowed_roles`, `lastReplyUser`) VALUES
(1, 1, NULL, 'Renaissance', 2, 'comment', 10, '2021-02-04 12:30:13', 'a:1:{i:0;s:0:"";}', 1),
(2, 1, NULL, 'Moyen Age', 4, 'trdy', 4, '2021-02-04 23:40:43', 'a:1:{i:0;s:0:"";}', 19),
(3, 2, NULL, 'Monde', 1, 'sportif-de-haut-niveau', 1, '2021-02-04 12:27:05', 'a:1:{i:0;s:0:"";}', 1),
(4, 2, NULL, 'France', NULL, 'trdy', NULL, NULL, 'a:1:{i:0;s:0:"";}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_subscription`
--

CREATE TABLE IF NOT EXISTS `workingforum_subscription` (
`id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workingforum_thread`
--

CREATE TABLE IF NOT EXISTS `workingforum_thread` (
`id` int(11) NOT NULL,
  `subforum_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cdate` datetime NOT NULL,
  `nbReplies` int(11) NOT NULL,
  `lastReplyDate` datetime NOT NULL,
  `resolved` tinyint(1) DEFAULT NULL,
  `locked` tinyint(1) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sublabel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` tinyint(1) DEFAULT NULL,
  `lastReplyUser` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `workingforum_thread`
--

INSERT INTO `workingforum_thread` (`id`, `subforum_id`, `author_id`, `cdate`, `nbReplies`, `lastReplyDate`, `resolved`, `locked`, `label`, `sublabel`, `slug`, `pin`, `lastReplyUser`) VALUES
(1, 2, 1, '2021-01-21 10:20:12', 1, '2021-01-21 10:20:12', 1, 1, 'Kiwi Incroyable', 'les kiwi c''est trop bon', '1-kiwi-incroyable', 1, 1),
(2, 1, 1, '2021-01-25 14:04:10', 8, '2021-02-03 06:01:05', NULL, NULL, 'dggfddgssgd', 'gfsggfsdgd', '2-dggfddgssgd', 0, 1),
(3, 2, 21, '2021-02-02 17:12:21', 1, '2021-02-02 17:12:21', NULL, NULL, 'Raphael', 'La course a pied', '3-raphael', 0, 21),
(4, 1, 1, '2021-02-04 12:25:31', 2, '2021-02-04 12:30:13', NULL, NULL, 'Navigateurs', 'Christophe Colomb, Amerigo Vespucci', '4-navigateurs', 0, 1),
(5, 3, 1, '2021-02-04 12:27:05', 1, '2021-02-04 12:27:05', NULL, NULL, 'Afrique', 'situation géopolitique', '5-afrique', 0, 1),
(6, 2, 1, '2021-02-04 12:29:28', 1, '2021-02-04 12:29:28', NULL, NULL, 'Origine Paris', 'Parisii', '6-origine-paris', 0, 1),
(7, 2, 19, '2021-02-04 23:40:43', 1, '2021-02-04 23:40:43', NULL, NULL, 'Pepin le bref', 'test', '7-pepin-le-bref', 0, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum_user`
--
ALTER TABLE `forum_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`), ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`), ADD UNIQUE KEY `UNIQ_8D93D649C9415ED0` (`user_forum_id`);

--
-- Indexes for table `workingforum_file`
--
ALTER TABLE `workingforum_file`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_CA43646BB548B0F` (`path`), ADD KEY `IDX_CA43646B4B89032C` (`post_id`);

--
-- Indexes for table `workingforum_forum`
--
ALTER TABLE `workingforum_forum`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workingforum_post`
--
ALTER TABLE `workingforum_post`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_1C563EF6E2904019` (`thread_id`), ADD KEY `IDX_1C563EF6A76ED395` (`user_id`);

--
-- Indexes for table `workingforum_post_report`
--
ALTER TABLE `workingforum_post_report`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_A95E2B754B89032C` (`post_id`), ADD KEY `IDX_A95E2B75A76ED395` (`user_id`);

--
-- Indexes for table `workingforum_post_vote`
--
ALTER TABLE `workingforum_post_vote`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_5EF3D04F4B89032C` (`post_id`), ADD KEY `IDX_5EF3D04FE2904019` (`thread_id`), ADD KEY `IDX_5EF3D04FA76ED395` (`user_id`);

--
-- Indexes for table `workingforum_rules`
--
ALTER TABLE `workingforum_rules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workingforum_setting`
--
ALTER TABLE `workingforum_setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workingforum_subforum`
--
ALTER TABLE `workingforum_subforum`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_9EACE2E229CCBAD0` (`forum_id`), ADD KEY `IDX_9EACE2E21F7EE8A0` (`lastReplyUser`);

--
-- Indexes for table `workingforum_subscription`
--
ALTER TABLE `workingforum_subscription`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_54F96036E2904019` (`thread_id`), ADD KEY `IDX_54F96036A76ED395` (`user_id`);

--
-- Indexes for table `workingforum_thread`
--
ALTER TABLE `workingforum_thread`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_788E9ABA225C0759` (`subforum_id`), ADD KEY `IDX_788E9ABAF675F31B` (`author_id`), ADD KEY `IDX_788E9ABA1F7EE8A0` (`lastReplyUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_user`
--
ALTER TABLE `forum_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `workingforum_file`
--
ALTER TABLE `workingforum_file`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workingforum_forum`
--
ALTER TABLE `workingforum_forum`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `workingforum_post`
--
ALTER TABLE `workingforum_post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `workingforum_post_report`
--
ALTER TABLE `workingforum_post_report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `workingforum_post_vote`
--
ALTER TABLE `workingforum_post_vote`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `workingforum_rules`
--
ALTER TABLE `workingforum_rules`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `workingforum_setting`
--
ALTER TABLE `workingforum_setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workingforum_subforum`
--
ALTER TABLE `workingforum_subforum`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `workingforum_subscription`
--
ALTER TABLE `workingforum_subscription`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workingforum_thread`
--
ALTER TABLE `workingforum_thread`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `FK_8D93D649C9415ED0` FOREIGN KEY (`user_forum_id`) REFERENCES `forum_user` (`id`);

--
-- Constraints for table `workingforum_file`
--
ALTER TABLE `workingforum_file`
ADD CONSTRAINT `FK_CA43646B4B89032C` FOREIGN KEY (`post_id`) REFERENCES `workingforum_post` (`id`);

--
-- Constraints for table `workingforum_post`
--
ALTER TABLE `workingforum_post`
ADD CONSTRAINT `FK_1C563EF6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `forum_user` (`id`),
ADD CONSTRAINT `FK_1C563EF6E2904019` FOREIGN KEY (`thread_id`) REFERENCES `workingforum_thread` (`id`);

--
-- Constraints for table `workingforum_post_report`
--
ALTER TABLE `workingforum_post_report`
ADD CONSTRAINT `FK_A95E2B754B89032C` FOREIGN KEY (`post_id`) REFERENCES `workingforum_post` (`id`),
ADD CONSTRAINT `FK_A95E2B75A76ED395` FOREIGN KEY (`user_id`) REFERENCES `forum_user` (`id`);

--
-- Constraints for table `workingforum_post_vote`
--
ALTER TABLE `workingforum_post_vote`
ADD CONSTRAINT `FK_5EF3D04F4B89032C` FOREIGN KEY (`post_id`) REFERENCES `workingforum_post` (`id`),
ADD CONSTRAINT `FK_5EF3D04FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `forum_user` (`id`),
ADD CONSTRAINT `FK_5EF3D04FE2904019` FOREIGN KEY (`thread_id`) REFERENCES `workingforum_thread` (`id`);

--
-- Constraints for table `workingforum_subforum`
--
ALTER TABLE `workingforum_subforum`
ADD CONSTRAINT `FK_9EACE2E21F7EE8A0` FOREIGN KEY (`lastReplyUser`) REFERENCES `forum_user` (`id`),
ADD CONSTRAINT `FK_9EACE2E229CCBAD0` FOREIGN KEY (`forum_id`) REFERENCES `workingforum_forum` (`id`);

--
-- Constraints for table `workingforum_subscription`
--
ALTER TABLE `workingforum_subscription`
ADD CONSTRAINT `FK_54F96036A76ED395` FOREIGN KEY (`user_id`) REFERENCES `forum_user` (`id`),
ADD CONSTRAINT `FK_54F96036E2904019` FOREIGN KEY (`thread_id`) REFERENCES `workingforum_thread` (`id`);

--
-- Constraints for table `workingforum_thread`
--
ALTER TABLE `workingforum_thread`
ADD CONSTRAINT `FK_788E9ABA1F7EE8A0` FOREIGN KEY (`lastReplyUser`) REFERENCES `forum_user` (`id`),
ADD CONSTRAINT `FK_788E9ABA225C0759` FOREIGN KEY (`subforum_id`) REFERENCES `workingforum_subforum` (`id`),
ADD CONSTRAINT `FK_788E9ABAF675F31B` FOREIGN KEY (`author_id`) REFERENCES `forum_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
