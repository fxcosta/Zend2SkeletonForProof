-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.25 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para zf2new
CREATE DATABASE IF NOT EXISTS `zf2new` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `zf2new`;


-- Copiando estrutura para tabela zf2new.album
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `year` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zf2new.album: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` (`id`, `name`, `year`) VALUES
	(1, 'Mateus Das Zika da Porra Toda', '2015-05-12 00:00:00'),
	(2, 'Like a Prayer', '2015-12-12 00:00:00');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;


-- Copiando estrutura para tabela zf2new.author
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zf2new.author: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` (`id`, `name`, `email`) VALUES
	(1, 'Felix Costa', 'fx3costa@gmail.com'),
	(2, 'Mateus Sousa', 'mateus@gmail.com'),
	(3, 'Jhannifer', 'jhannifer@gmail.com'),
	(12, 'zendform', 'lol'),
	(13, 'laravel Ã© best', 'ehauehuea'),
	(17, 'In my Bed', 'now...'),
	(21, 'autor 1', '');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;


-- Copiando estrutura para tabela zf2new.author_book
CREATE TABLE IF NOT EXISTS `author_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookId` int(10) unsigned NOT NULL DEFAULT '0',
  `authorId` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__books` (`bookId`),
  KEY `FK__author` (`authorId`),
  CONSTRAINT `FK__author` FOREIGN KEY (`authorId`) REFERENCES `author` (`id`),
  CONSTRAINT `FK__books` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zf2new.author_book: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `author_book` DISABLE KEYS */;
INSERT INTO `author_book` (`id`, `bookId`, `authorId`) VALUES
	(1, 9, 2),
	(2, 11, 3),
	(3, 12, 12);
/*!40000 ALTER TABLE `author_book` ENABLE KEYS */;


-- Copiando estrutura para tabela zf2new.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zf2new.books: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `name`, `price`, `ISBN`) VALUES
	(1, 'Livro11111', '323,32', '3232'),
	(2, 'dsad', 'dsadsa', 'dsadsa'),
	(9, 'Usando filters', '323232', '23232'),
	(10, 'NovoLivro', '2132,323', '323232'),
	(11, 'NovoLivro', '2132,323', '323232'),
	(12, 'vero', '232', '32323');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


-- Copiando estrutura para tabela zf2new.book_category
CREATE TABLE IF NOT EXISTS `book_category` (
  `id` int(10) unsigned NOT NULL,
  `bookId` int(10) unsigned NOT NULL,
  `categoryId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__booksvv` (`bookId`),
  KEY `FK__categoryssss` (`categoryId`),
  CONSTRAINT `FK__booksvv` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`),
  CONSTRAINT `FK__categoryssss` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zf2new.book_category: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `book_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_category` ENABLE KEYS */;


-- Copiando estrutura para tabela zf2new.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zf2new.category: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `description`) VALUES
	(1, 'Suspense'),
	(2, 'Comédia');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Copiando estrutura para tabela zf2new.music
CREATE TABLE IF NOT EXISTS `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `duration` varchar(50) NOT NULL DEFAULT '0',
  `albumId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_music_album` (`albumId`),
  CONSTRAINT `FK_music_album` FOREIGN KEY (`albumId`) REFERENCES `album` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zf2new.music: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `music` DISABLE KEYS */;
INSERT INTO `music` (`id`, `name`, `duration`, `albumId`) VALUES
	(1, 'Pepeca do Mal', '3232', 2);
/*!40000 ALTER TABLE `music` ENABLE KEYS */;


-- Copiando estrutura para tabela zf2new.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela zf2new.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
