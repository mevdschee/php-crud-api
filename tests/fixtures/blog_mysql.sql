-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categories` (`name`, `icon`) VALUES
('announcement',	NULL),
('article',	NULL),
('comment',	NULL);

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `comments_post_id_fkey` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `comments_category_id_fkey` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `comments` (`post_id`, `message`, `category_id`) VALUES
(1,	'great', 3),
(1,	'fantastic', 3),
(2,	'thank you', 3),
(2,	'awesome', 3);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_category_id_fkey` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `posts_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `posts` (`user_id`, `category_id`, `content`) VALUES
(1,	1,	'blog started'),
(1,	2,	'It works!');

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE `post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `post_tags_post_id_fkey` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `post_tags_tag_id_fkey` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `post_tags` (`post_id`, `tag_id`) VALUES
(1,	1),
(1,	2),
(2,	1),
(2,	2);

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_important` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tags` (`name`, `is_important`) VALUES
('funny', 0),
('important', 1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` point,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `password`, `location`) VALUES
('user1',	'pass1', NULL),
('user2',	'$2y$10$cg7/nswxVZ0cmVIsMB/pVOh1OfcHScBJGq7Xu4KF9dFEQgRZ8HWe.', NULL);

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shape` geometry NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `countries` (`name`, `shape`) VALUES
('Left',	ST_GeomFromText('POLYGON ((30 10, 40 40, 20 40, 10 20, 30 10))')),
('Right',	ST_GeomFromText('POLYGON ((70 10, 80 40, 60 40, 50 20, 70 10))')),
('Point', ST_GeomFromText('POINT (30 10)')),
('Line', ST_GeomFromText('LINESTRING (30 10, 10 30, 40 40)')),
('Poly1', ST_GeomFromText('POLYGON ((30 10, 40 40, 20 40, 10 20, 30 10))')),
('Poly2', ST_GeomFromText('POLYGON ((35 10, 45 45, 15 40, 10 20, 35 10),(20 30, 35 35, 30 20, 20 30))')),
('Mpoint', ST_GeomFromText('MULTIPOINT (10 40, 40 30, 20 20, 30 10)')),
('Mline', ST_GeomFromText('MULTILINESTRING ((10 10, 20 20, 10 40),(40 40, 30 30, 40 20, 30 10))')),
('Mpoly1', ST_GeomFromText('MULTIPOLYGON (((30 20, 45 40, 10 40, 30 20)),((15 5, 40 10, 10 20, 5 10, 15 5)))')),
('Mpoly2', ST_GeomFromText('MULTIPOLYGON (((40 40, 20 45, 45 30, 40 40)),((20 35, 10 30, 10 10, 30 5, 45 20, 20 35),(30 20, 20 15, 20 25, 30 20)))')),
('Gcoll', ST_GeomFromText('GEOMETRYCOLLECTION(POINT(4 6),LINESTRING(4 6,7 10))'));

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `datetime` datetime,
  `visitors` bigint(20),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `events` (`name`, `datetime`, `visitors`) VALUES
('Launch', '2016-01-01 13:01:01', 0);

DROP VIEW IF EXISTS `tag_usage`;
CREATE VIEW `tag_usage` AS select `name`, count(`name`) AS `count` from `tags`, `post_tags` where `tags`.`id` = `post_tags`.`tag_id` group by `name` order by `count` desc, `name`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `properties` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `products` (`name`, `price`, `properties`, `created_at`) VALUES
('Calculator', '23.01', '{"depth":false,"model":"TRX-120","width":100,"height":null}', '1970-01-01 01:01:01');

DROP TABLE IF EXISTS `barcodes2`;
DROP TABLE IF EXISTS `barcodes`;
CREATE TABLE `barcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `hex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `bin` blob NOT NULL,
  `ip_address` varchar(15),
  PRIMARY KEY (`id`),
  CONSTRAINT `barcodes_product_id_fkey` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `barcodes` (`product_id`, `hex`, `bin`, `ip_address`) VALUES
(1, '00ff01', UNHEX('00ff01'), '127.0.0.1');

DROP TABLE IF EXISTS `kunsthåndværk`;
CREATE TABLE `kunsthåndværk` (
  `id` varchar(36) NOT NULL,
  `Umlauts ä_ö_ü-COUNT` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invisible` varchar(36),
  PRIMARY KEY (`id`),
  CONSTRAINT `kunsthåndværk_Umlauts ä_ö_ü-COUNT_fkey` UNIQUE (`Umlauts ä_ö_ü-COUNT`),
  CONSTRAINT `kunsthåndværk_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `kunsthåndværk` (`id`, `Umlauts ä_ö_ü-COUNT`, `user_id`, `invisible`) VALUES
('e42c77c6-06a4-4502-816c-d112c7142e6d', 1, 1, NULL),
('e31ecfe6-591f-4660-9fbd-1a232083037f', 2, 2, NULL);

DROP TABLE IF EXISTS `invisibles`;
CREATE TABLE `invisibles` (
  `id` varchar(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `invisibles` (`id`) VALUES
('e42c77c6-06a4-4502-816c-d112c7142e6d');

DROP TABLE IF EXISTS `nopk`;
CREATE TABLE `nopk` (
  `id` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `nopk` (`id`) VALUES
('e42c77c6-06a4-4502-816c-d112c7142e6d');

SET foreign_key_checks = 1;

-- 2016-11-05 13:11:47
