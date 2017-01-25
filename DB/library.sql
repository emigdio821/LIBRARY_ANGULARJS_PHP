-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2017 a las 03:54:25
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `library`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `author` varchar(512) NOT NULL,
  `category` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text NOT NULL,
  `borrowed` text NOT NULL,
  `user` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `category`, `description`, `created`, `modified`, `img`, `borrowed`, `user`) VALUES
(71, 'A Game of Thrones', 'George R. R. Martin', 'Fiction', 'A Game of Thrones is the first novel in A Song of Ice and Fire, a series of fantasy novels by American author George R. R. Martin.', '2017-01-24 08:32:02', '2017-01-24 07:32:02', 'https://upload.wikimedia.org/wikipedia/en/9/93/AGameOfThrones.jpg', 'Unavailable', ''),
(68, 'It', 'Stephen King', 'Horror', 'It is a 1986 horror novel by American author Stephen King. The story follows the exploits of seven children as they are terrorized by the eponymous being, which exploits the fears and phobias of its victims in order to disguise itself while hunting its prey.', '2017-01-24 08:21:18', '2017-01-24 07:21:18', 'https://upload.wikimedia.org/wikipedia/en/5/5a/It_cover.jpg', 'Unavailable', 'Emigdio Torres'),
(70, 'Metro 2033', 'Dmitry Glukhovsky', 'Apocalyptic', 'Metro 2033 is a post-apocalyptic science fiction novel by Russian author Dmitry Glukhovsky. It is set in the Moscow Metro, where the last survivors hide after a global nuclear holocaust. It was published in 2005 in Russia and on March 28, 2010 in the United States.', '2017-01-24 08:31:56', '2017-01-24 07:31:56', 'https://upload.wikimedia.org/wikipedia/en/0/04/Metro_2033_russian_book_front_cover.jpg', 'Unavailable', 'Emigdio Torres'),
(81, 'Ghost Story', 'Peter Straub', 'Horror', 'Ghost Story is a horror novel written by Peter Straub. It was published on January 1, 1979 by Coward, McCann and Geoghegan. The book was adapted into a film by the same name in 1981, minus the novel''s fifth protagonist character, Lewis Benedikt.', '2017-01-24 08:31:56', '2017-01-24 07:31:56', 'https://upload.wikimedia.org/wikipedia/en/0/0c/Ghost_Story_by_Peter_Straub.jpg', 'Available', ''),
(73, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 'Fantasy', 'Harry Potter and the Prisoner of Azkaban is the third novel in the Harry Potter series, written by J. K. Rowling. The book follows Harry Potter, a young wizard, in his third year at Hogwarts School of Witchcraft and Wizardry.', '2017-01-24 08:31:56', '2017-01-24 07:31:56', 'https://upload.wikimedia.org/wikipedia/en/a/a0/Harry_Potter_and_the_Prisoner_of_Azkaban.jpg', 'Unavailable', 'Emigdio Torres'),
(82, 'The Shining', 'Stephen King', 'Horror', 'The Shining is a horror novel by American author Stephen King. Published in 1977, it is King''s third published novel and first hardback bestseller: the success of the book firmly established King as a preeminent author in the horror genre.', '2017-01-24 08:31:56', '2017-01-24 07:31:56', 'https://upload.wikimedia.org/wikipedia/en/4/4c/Shiningnovel.jpg', 'Available', ''),
(80, 'The Maze Runner', 'James Dashner', 'Science Fiction', 'The Maze Runner is a 2009 young adult post-apocalyptic dystopian science fiction novel written by American author James Dashner and the first book, third chronologically, in The Maze Runner series.[2][3] The novel was published on October 7, 2009 by Delacorte Press, an imprint of Random House, and was made into a 2014 major motion picture by 20th Century Fox.', '2017-01-24 08:31:56', '2017-01-24 07:31:56', 'https://upload.wikimedia.org/wikipedia/en/d/db/The_Maze_Runner_cover.png', 'Available', ''),
(83, '''Salem''s Lot', 'Stephen King', 'Horror', '''Salem''s Lot is a 1975 horror fiction novel written by the American author Stephen King. It was his second published novel. The story involves a writer named Ben Mears who returns to the town of Jerusalem''s Lot (or ''Salem''s Lot for short) in Maine, where he had lived from the age of nine through thirteen, only to discover that the residents are becoming vampires.', '2017-01-23 00:00:00', '2017-01-24 07:31:56', 'https://upload.wikimedia.org/wikipedia/en/d/df/Salemslothardcover.jpg', 'Available', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
