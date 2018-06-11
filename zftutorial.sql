-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Iun 2018 la 13:00
-- Versiune server: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zftutorial`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `album`
--

INSERT INTO `album` (`id`, `artist`, `title`) VALUES
(8, 'Bruce Springsteen', 'Wrecking Ball (Deluxe)'),
(9, 'Lana Del Rey', 'Born To Diee'),
(10, 'Gotye', 'Making Mirrors'),
(11, 'eerr', 'eerr'),
(13, 'Gardos', 'In padure'),
(14, 'SOS', 'Altar'),
(19, 'Fetele cochetele', 'Loredana'),
(20, 'Baniciu', 'Frunze'),
(21, 'Gyuri Pascu', 'Morcov'),
(22, 'Mr President', 'coco jumbo'),
(23, 'Gyuri Pascu', 'Instalatorul');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `drivers`
--

CREATE TABLE `drivers` (
  `id_driver` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `category` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `drivers`
--

INSERT INTO `drivers` (`id_driver`, `name`, `age`, `category`) VALUES
(1, 'Ioan Timofte', 33, 'e'),
(2, 'Bogdan Mironescu ', 44, 'c');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `random_bytes` varchar(255) NOT NULL,
  `password_salt` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `random_bytes`, `password_salt`, `name`) VALUES
(67, 'mirel', '$2y$10$4zbxz2ixFrH9RjARYr6F3ONFVP4x602Tzfs0ZZ7/DZRauKaONmPDK', '', '', 'mirel'),
(71, 'ionel', '$2y$10$vxcx5L4iagC6bLHhj0H6zupNFWUXHKr3BYVrZHqRAIrDQ7GA/GVf2', '«l3n¯’¸íY ëé	‘ùAõæu=n}û8Ùÿj', '', 'ionel'),
(72, 'gigel', '$2y$10$/38Av.rvXZJKyFfVy5muRuNVXSDgZkE6e9aX8MO/mNVtTSk8t1B32', ' ñ¶‰˜­ezJðšyó¼CFú„™ã<‰ý‹Øn×', '', 'Gigiel'),
(73, 'georgel', '$2y$10$isfmfATi57rF0LOkhroIduv6YzOS45aHLgaK.4BVzRP8gIAxAgJ2q', '¬;œŒÅŽÚD3‹P¦^	Ž~¸UŠ–àÅ!jýCeFuÉ', '', 'Georgel'),
(74, 'marcel', '$2y$10$RdDkwPfL0tGfgSxnH8CzbunagXwG2jncj51f0u6uXXdPMGKdx.5Ei', 'SŽyLhíÜÍš;‡ÂP2göd( Xåç¼piºó', '98dce43855693a3701a3a94433a8bb47', 'marcel'),
(75, 'ionelus', '$2y$10$9VGXx0/zUnGjHcgzR0nKce/.xEZXVpOIffApBYCM9q8T3K6CM1MiG', 'ø©6î._>“å½‡)ŸƒÄ(ò7®^õ##', 'e71925f24eea195397c37003d058fd4a', 'Ionelus'),
(76, 'razvan', '$2y$10$aSn7CcoLU8RQNdoowWiqHujcgUFtVvgvMJDYrhn.rUvG5Mps2381m', '`b}™µ¡s€Ù^îñ=qW3Ë€š¦ÞŸ÷¤\\‘', 'd6b5cd331c9a0cde88904e6dbadb4e48', 'Razvan'),
(77, 'ramona', '$2y$10$jfbZUKeasoXYyxNUG58WFeW3d/70iONELFeQ9CEXB7TJTXeLcUEYC', 't/þá%×š“ëžÎ¥,ÜdÖ`ÂXÆ¨œj•o-‡‡Ü', '69a74d639ff215dfae03c61e73587131', 'Ramona'),
(78, 'hoini', '$2y$10$7ctcLLEbWndKVCXlf1/QAe.kxS4OfcqR4XL5EOtRnqwB1jL/jcD2S', 'ßþÀ©³:[\nqNŒãd§žh‡±^–œÚ}d÷~žê', '0bea6cfd101548eb4c4dff4eeb28f6ac', 'hoini'),
(79, 'ovidiu', '$2y$10$pFqnsl52QW3ewlojsjMZquF5GXa8Iv60/Qe.EGCQ2Mj6MPLuDrMeG', '°ŽÆîâ]€r§]u×Û).ûþ‡›*Š0´yùö', '46d99066420261cfbfedc8e1e702aab0', 'ovidiu'),
(80, 'mircea', '$2y$10$FElO2.2ur/EZTHu2hALowORjbp/p5jUKblSTwfmUhjQp.jc9Echbi', '×€ØÎµu°p™êå›y{8_0S@ÓÝ\0®³¡Ø', '8dd5774bb3851b4c2c0da62fe924aca5', 'Mircea'),
(81, 'petre', '$2y$10$cns0usWuoGVP2QBf26F3kemLk1XnP6OaondickAnEfa1Wm29migo.', 'Š¶•uÔŒkLx¾Èèy®Þr3†Ò-ilÒ,', 'eda86dafbe399c07cae42710d6b00d50', 'Petre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_driver` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
