-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 juin 2019 à 09:51
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `repport` int(11) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `repport`, `author`, `comment`, `comment_date`) VALUES
(58, 48, NULL, 'Pascal', '<p>Bravo pour ce d&eacute;but tr&egrave;s int&eacute;ressant</p>', '2019-05-18 10:55:04'),
(59, 49, NULL, 'Pascal', '<p>Cecapitaine &agrave; l\'air myst&eacute;rieux</p>', '2019-05-18 10:55:38'),
(60, 49, NULL, 'Véronique', '<p>Oui Pascal je trouve aussi</p>', '2019-05-18 10:55:58'),
(61, 49, NULL, 'Pascal', '<p>Bonne conitnuation</p>', '2019-05-18 10:56:16'),
(62, 50, NULL, 'Jean', '<p>Reykjawik est une tr&egrave;s jolie ville m&ecirc;me si le temps n\'y est pas toujours cl&eacute;ment</p>', '2019-05-18 10:56:53');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `pass`, `mail`) VALUES
(1, 'admin', '34e520a442a4d48559357d07e33a29df', 'jchevasson@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(47, 'Introduction', '<p><span style=\"color: #111111; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px;\">Mais mon oncle continua de plus belle, et m\'instruisit, malgr&eacute; moi, de choses que je ne tenais gu&egrave;re &agrave; savoir. - Les runes, reprit-il, &eacute;taient des caract&egrave;res d\'&eacute;criture usit&eacute;s autrefois en Islande, et, suivant la tradition, ils furent invent&eacute;s par Odin lui-m&ecirc;me ! Mais regarde donc, admire donc, impie, ces types qui sont sortis de l\'imagination d\'un dieu ! Ma foi, faute de r&eacute;plique, j\'allais me prosterner, genre de r&eacute;ponse qui doit plaire aux dieux comme aux rois, car elle a l\'avantage de ne jamais les embarrasser, quand un incident vint d&eacute;tourner le cours de la conversation. Ce fut l\'apparition d\'un parchemin crasseux qui glissa du bouquinet tomba &agrave; terre. Mon oncle se pr&eacute;cipita sur ce brimborion avec une avidit&eacute; facile &agrave; comprendra. Un vieux document, enferm&eacute; peut-&ecirc;tre depuis un temps imm&eacute;morial dans un vieux livre, ne pouvait manquer d\'avoir un haut prix &agrave; ses yeux. - Qu\'est-ce que cela ? s\'&eacute;cria-t-il. Et, en m&ecirc;me temps, il d&eacute;ployait soigneusement sur sa table un morceau de parchemin long de cinq pouces, large de trois, et sur lequel s\'allongeaient, en lignes transversales, des caract&egrave;res de grimoire</span></p>', '2019-03-25 12:31:33'),
(48, 'Decorum', '<div class=\"panel-body\" style=\"box-sizing: border-box; padding: 15px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; line-height: 30px; font-size: 18px; color: #111111;\">\r\n<div class=\"text-body js-readableMore  \" style=\"box-sizing: border-box; position: relative; overflow: hidden; padding-top: 15px; overflow-wrap: break-word;\">\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 5px;\">Toutes ces merveilles, je les contemplais en silence. les paroles me manquaient pour rendre mes sensations. Je croyais assister, dans quelque plan&egrave;te lointaine, Uranus ou Neptune, &agrave; des ph&eacute;nom&egrave;nes dont ma nature \"terrestielle\" n\'avait pas conscience. A des sensations nouvelles, il fallait des mots nouveaux, et mon imagination ne me les fournissait pas. Je regardais, je pensais, j\'admirais avec une stup&eacute;faction m&ecirc;l&eacute;e d\'une certaine quantit&eacute; d\'effroi.</p>\r\n</div>\r\n</div>\r\n<div class=\"panel-footer\" style=\"box-sizing: border-box; padding: 10px 15px; background-color: #f5f5f5; border-top: 1px solid #dddddd; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px;\">\r\n<div class=\"row\" style=\"box-sizing: border-box; margin-left: -15px; margin-right: -15px;\">\r\n<div class=\"col-xs-4 \" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-left: 15px; padding-right: 15px; float: left; width: 185.578px;\"><button class=\"btn btn-link js-text-edit\" style=\"color: #5a3d3e; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: 14px; line-height: 1.42857; font-family: inherit; margin: 0px; overflow: visible; cursor: pointer; vertical-align: middle; touch-action: manipulation; background-image: none; white-space: nowrap; padding: 6px 12px; border-radius: 0px; user-select: none; box-shadow: none; border: 1px solid transparent;\" data-type=\"extrait\" data-textid=\"9469203\" data-memberid=\"851625\">Mod/Suppr</button></div>\r\n<div class=\"col-xs-8 text-right\" style=\"box-sizing: border-box; text-align: right; position: relative; min-height: 1px; padding-left: 15px; padding-right: 15px; float: left; width: 371.156px;\">\r\n<div class=\"TextLikeBoth\" style=\"box-sizing: border-box;\">\r\n<div class=\"input-group like-group pull-right TextLike TextLikeOnlyLike\" style=\"box-sizing: border-box; position: relative; display: table; border-collapse: separate; float: right; width: 82px;\" data-textid=\"9469203\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '2019-04-09 09:07:34'),
(49, 'Le capitaine', '<p style=\"box-sizing: border-box; margin: 0px 0px 5px; color: #111111; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px;\">Repr&eacute;sentez-vous un homme grand, maigre, d&rsquo;une sant&eacute; de fer, et d&rsquo;un blond juv&eacute;nile qui lui &ocirc;tait dix bonnes ann&eacute;es de sa cinquantaine. Ses gros yeux roulaient sans cesse derri&egrave;re des lunettes consid&eacute;rables ; son nez, long et mince, ressemblait &agrave; une lame affil&eacute;e ; les m&eacute;chants pr&eacute;tendaient m&ecirc;me qu&rsquo;il &eacute;tait aimant&eacute; et qu&rsquo;il attirait la limaille de fer. Pure calomnie : il n&rsquo;attirait que le tabac, mais en grande abondance, pour ne point mentir.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 5px; color: #111111; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 5px; color: #111111; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px;\">Quand j&rsquo;aurai ajout&eacute; que mon oncle faisait des enjamb&eacute;es math&eacute;matiques d&rsquo;une demi-toise, et si je dis qu&rsquo;en marchant il tenait ses poings solidement ferm&eacute;s, signe d&rsquo;un temp&eacute;rament imp&eacute;tueux, on le conna&icirc;tra assez pour ne pas se montrer friand de sa compagnie.</p>', '2019-05-02 14:23:40'),
(50, 'Reykjawik', '<p style=\"box-sizing: border-box; margin: 0px 0px 5px; color: #111111; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px;\">Repr&eacute;sentez-vous un homme grand, maigre, d&rsquo;une sant&eacute; de fer, et d&rsquo;un blond juv&eacute;nile qui lui &ocirc;tait dix bonnes ann&eacute;es de sa cinquantaine. Ses gros yeux roulaient sans cesse derri&egrave;re des lunettes consid&eacute;rables ; son nez, long et mince, ressemblait &agrave; une lame affil&eacute;e ; les m&eacute;chants pr&eacute;tendaient m&ecirc;me qu&rsquo;il &eacute;tait aimant&eacute; et qu&rsquo;il attirait la limaille de fer. Pure calomnie : il n&rsquo;attirait que le tabac, mais en grande abondance, pour ne point mentir.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 5px; color: #111111; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 5px; color: #111111; font-family: \'Source Sans Pro\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px;\">Quand j&rsquo;aurai ajout&eacute; que mon oncle faisait des enjamb&eacute;es math&eacute;matiques d&rsquo;une demi-toise, et si je dis qu&rsquo;en marchant il tenait ses poings solidement ferm&eacute;s, signe d&rsquo;un temp&eacute;rament imp&eacute;tueux, on le conna&icirc;tra assez pour ne pas se montrer friand de sa compagnie.</p>', '2019-05-18 10:52:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
