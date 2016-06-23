-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Juin 2016 à 14:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `slim-proj`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `total` float NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `total`, `date`, `status`) VALUES
(1, 1, 200, '02-02-2015 09:06:06', 2),
(2, 2, 450, '08-02-2016 09:06:50', 2),
(3, 1, 500, '02-02-2015 09:06:06', 2),
(4, 2, 350, '08-02-2016 09:06:50', 2),
(5, 1, 600, '02-04-2014 09:06:06', 1),
(6, 4, 350, '08-06-2016 09:06:50', 2),
(7, 3, 500, '02-09-2015 09:06:06', 1),
(8, 3, 3150, '08-06-2016 09:06:50', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `email`, `phone`) VALUES
(1, 'omar ', 'bouguima', 'omar@gmail.com', '+21621987651'),
(2, 'walid', 'Toukabri', 'walid@yahoo.com', '+21654987411'),
(3, 'mahdi', 'kawach', 'mahdi@gmail.com', '+21659847785'),
(4, 'mohamed ali', 'klay', 'mohamed@yahoo.fr', '+21654872189'),
(5, 'nadia', 'fileli', 'nadia@yahoo.com', '+21654875410');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
