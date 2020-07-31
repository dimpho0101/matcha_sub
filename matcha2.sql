SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `matcha2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `matcha2`;

CREATE TABLE `chat` (
  `id` int(255) NOT NULL,
  `user1` varchar(500) NOT NULL,
  `user2` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `distance` (
  `location1` varchar(255) NOT NULL,
  `location2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `interesttags` (
  `interest` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `interesttags` (`interest`, `userID`) VALUES
('books', 361),
('food', 360),
('food', 361),
('food', 362),
('sport', 361),
('travel', 360),
('travel', 361),
('travel', 362);

CREATE TABLE `likes` (
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `likes` (`user1`, `user2`) VALUES
(9, 10),
(360, 361);

CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `sexpref` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `area` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `popularity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `userprofile` (`id`, `gender`, `sexpref`, `age`, `bio`, `area`, `userId`, `popularity`) VALUES
(40, 'female', 'straight', 23, 'i am martin neh', 'sandton', 360, 25),
(41, 'male', 'straight', 25, 'heheheehehe', 'sandton', 361, 3),
(52, 'female', 'straight', 23, 'oijihinl', 'sandton', 362, 0),
(53, 'female', 'straight', 23, 'oijihinl', 'sandton', 362, 0);

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `notify` varchar(100) NOT NULL DEFAULT '1',
  `isActive` varchar(100) NOT NULL DEFAULT '0',
  `profileCompleted` int(11) NOT NULL DEFAULT 0,
  `onlineStatus` int(11) NOT NULL,
  `lastLogin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `token`, `notify`, `isActive`, `profileCompleted`, `onlineStatus`, `lastLogin`) VALUES
(300, 'Hilda', 'Nora', 'Wynn', 'orci.luctus@Nulla.net', 'Dexter', 'Flynn', '0', '1', 0, 1, '2020-10-31'),
(301, 'Katell', 'Gannon', 'Mann', 'et@nec.ca', 'Ferris', 'Vaughan', '0', '0', 1, 0, '2019-12-10'),
(302, 'Isaac', 'Faith', 'Ray', 'interdum@sedhendrerita.com', 'Burke', 'Honorato', '0', '0', 1, 0, '2019-12-06'),
(303, 'Marshall', 'Harlan', 'Erickson', 'sollicitudin@nequeSed.org', 'Graham', 'Tad', '0', '1', 1, 1, '2019-08-08'),
(304, 'Jane', 'Cairo', 'Moses', 'imperdiet.ullamcorper@nonenim.co.uk', 'Xavier', 'Caesar', '1', '0', 1, 0, '2019-09-15'),
(305, 'Ethan', 'Ryder', 'Carpenter', 'parturient.montes.nascetur@turpisnonenim.co.uk', 'Bert', 'Wyatt', '0', '1', 0, 0, '2020-03-22'),
(306, 'Dominique', 'Geraldine', 'Hughes', 'non.hendrerit.id@dictummagnaUt.ca', 'Yoshio', 'Hop', '0', '1', 0, 0, '2020-05-31'),
(307, 'Jocelyn', 'Summer', 'Carey', 'Nullam.feugiat.placerat@nequeNullamnisl.org', 'Hoyt', 'Ray', '1', '1', 1, 0, '2020-07-15'),
(308, 'Aretha', 'Irene', 'Fry', 'massa.Integer@lectus.edu', 'Xanthus', 'Jin', '0', '1', 0, 1, '2020-08-04'),
(309, 'Jordan', 'Roth', 'Barr', 'lectus.pede@arcu.edu', 'Avram', 'Omar', '0', '0', 1, 1, '2020-08-30'),
(310, 'Rhonda', 'Cassidy', 'Rivers', 'risus.Nulla.eget@Nuncmauris.ca', 'Russell', 'Baker', '1', '0', 1, 0, '2021-07-20'),
(311, 'Moana', 'Larissa', 'Riley', 'sagittis@Proinnonmassa.edu', 'Deacon', 'Hoyt', '1', '0', 1, 0, '2021-05-01'),
(312, 'Rhea', 'Darrel', 'Horne', 'neque.Nullam.nisl@disparturient.net', 'Jason', 'Wylie', '1', '1', 0, 1, '2020-11-16'),
(313, 'Duncan', 'Keelie', 'Moody', 'massa.Integer@ornareplacerat.org', 'Sean', 'Barry', '0', '1', 1, 1, '2020-03-31'),
(314, 'Driscoll', 'Stephanie', 'Mcleod', 'non.dui.nec@aliquet.com', 'Rashad', 'Peter', '0', '1', 1, 1, '2020-12-08'),
(315, 'Hiram', 'Lenore', 'Warner', 'nunc.nulla.vulputate@Suspendissealiquetmolestie.edu', 'Mohammad', 'Bruno', '0', '0', 0, 0, '2020-07-30'),
(316, 'Frances', 'Quincy', 'Sanford', 'rutrum@estvitae.org', 'Marshall', 'Hu', '1', '1', 1, 0, '2019-10-03'),
(317, 'Abdul', 'Alice', 'Baker', 'semper.auctor.Mauris@tacitisociosquad.edu', 'Cedric', 'Mark', '0', '0', 0, 0, '2020-12-28'),
(318, 'Drew', 'Jana', 'Luna', 'eget.venenatis.a@Aliquamnisl.ca', 'Armand', 'Caesar', '1', '0', 1, 0, '2020-01-19'),
(319, 'Sara', 'Alvin', 'Shepherd', 'et@natoque.org', 'Carter', 'Magee', '0', '0', 0, 1, '2020-07-21'),
(320, 'Shellie', 'Joelle', 'Kinney', 'quam.quis@turpisegestasAliquam.org', 'Kenyon', 'Keefe', '1', '1', 1, 1, '2019-10-31'),
(321, 'Silas', 'Bertha', 'Rich', 'egestas.hendrerit.neque@Vestibulum.edu', 'Harper', 'Ryan', '1', '1', 1, 1, '2020-07-01'),
(322, 'Hamilton', 'Nissim', 'Moss', 'erat@infaucibusorci.co.uk', 'Geoffrey', 'Garrett', '0', '1', 1, 0, '2020-11-01'),
(323, 'Adena', 'Emmanuel', 'Carver', 'egestas.rhoncus.Proin@dictumcursus.co.uk', 'Josiah', 'Wyatt', '0', '1', 1, 0, '2021-06-28'),
(324, 'Harriet', 'Odysseus', 'Barber', 'sodales.at@ut.net', 'Kibo', 'Nathan', '1', '1', 1, 1, '2020-05-23'),
(325, 'Whitney', 'Wyatt', 'Britt', 'Nullam@Sed.org', 'Oscar', 'Xander', '1', '1', 0, 1, '2020-10-24'),
(326, 'Pascale', 'Dale', 'Montoya', 'lacus.vestibulum.lorem@utquam.ca', 'Kareem', 'Forrest', '1', '0', 1, 0, '2021-02-09'),
(327, 'Maggie', 'Ginger', 'Vazquez', 'quis@fringillaestMauris.co.uk', 'Kieran', 'Duncan', '0', '0', 1, 1, '2020-01-12'),
(328, 'Diana', 'Briar', 'Glenn', 'volutpat@orci.ca', 'Alec', 'Arthur', '0', '1', 0, 0, '2020-10-20'),
(329, 'Mary', 'Emi', 'Hernandez', 'ullamcorper.eu@nec.org', 'Evan', 'Neil', '0', '1', 0, 1, '2020-01-20'),
(330, 'Iona', 'Whilemina', 'Phillips', 'adipiscing.enim.mi@sagittislobortismauris.co.uk', 'Nathaniel', 'Finn', '1', '1', 1, 0, '2020-03-19'),
(331, 'Kai', 'Colin', 'Ingram', 'ultricies.adipiscing@Crasdictumultricies.org', 'Marsden', 'Tad', '0', '1', 0, 0, '2020-12-28'),
(332, 'Ulla', 'Ifeoma', 'Chandler', 'vitae.semper@aarcu.net', 'Hamish', 'Adam', '0', '1', 1, 0, '2019-08-09'),
(333, 'Jarrod', 'Jessica', 'Dalton', 'sed@felis.co.uk', 'Chandler', 'Christian', '1', '0', 1, 0, '2020-04-25'),
(334, 'Magee', 'Cedric', 'Chaney', 'libero.Proin.mi@Morbi.org', 'Xanthus', 'Eaton', '0', '0', 1, 0, '2020-05-05'),
(335, 'Lucas', 'Fitzgerald', 'Fox', 'In@Integersem.org', 'Raphael', 'Blaze', '0', '0', 0, 0, '2019-12-11'),
(336, 'Nerea', 'Brittany', 'Baird', 'elit.pretium.et@Maecenasmalesuada.co.uk', 'Jasper', 'Caesar', '1', '1', 0, 1, '2020-03-13'),
(337, 'Colin', 'Declan', 'Sargent', 'ridiculus.mus@convallis.co.uk', 'Jackson', 'Rashad', '0', '0', 1, 1, '2020-07-31'),
(338, 'George', 'Guy', 'May', 'ultrices.posuere@Aenean.edu', 'Connor', 'Ishmael', '0', '1', 1, 0, '2020-01-23'),
(339, 'Lois', 'Deirdre', 'Potter', 'massa@Donec.ca', 'Dexter', 'Gabriel', '1', '0', 1, 1, '2019-11-13'),
(340, 'Lionel', 'Hilel', 'Blair', 'Mauris@Nunc.org', 'Owen', 'Timon', '0', '1', 1, 1, '2020-09-25'),
(341, 'Iliana', 'Zelda', 'Mejia', 'at@dolorQuisque.com', 'Avram', 'Keegan', '0', '0', 1, 1, '2021-04-15'),
(342, 'Cairo', 'Clark', 'Woodward', 'aptent@nonummyacfeugiat.co.uk', 'Fuller', 'Vance', '1', '0', 1, 0, '2020-12-31'),
(343, 'Yuri', 'John', 'Jennings', 'nec.metus@quistristiqueac.net', 'Jermaine', 'Brent', '0', '0', 0, 0, '2019-11-18'),
(344, 'Cade', 'Jackson', 'Stark', 'nibh@gravidaPraesenteu.ca', 'Jared', 'Armand', '0', '0', 0, 0, '2019-12-17'),
(345, 'Timothy', 'Sophia', 'Patrick', 'Nullam.lobortis@lacus.org', 'Phelan', 'Jerome', '0', '1', 0, 0, '2020-10-01'),
(346, 'Kermit', 'Griffith', 'Lynch', 'gravida.mauris.ut@ante.ca', 'Oren', 'Brock', '0', '1', 1, 0, '2019-11-17'),
(347, 'Avram', 'Nell', 'Faulkner', 'elementum@fringillacursus.co.uk', 'Josiah', 'Ulric', '0', '0', 0, 1, '2020-04-12'),
(348, 'Richard', 'Alyssa', 'Holloway', 'luctus@malesuada.ca', 'Felix', 'Colby', '1', '0', 0, 0, '2019-10-11'),
(349, 'Amery', 'Yvette', 'Bennett', 'tempor@anuncIn.org', 'Chandler', 'Graiden', '0', '0', 0, 0, '2020-05-16'),
(350, 'Demetrius', 'Joshua', 'Miles', 'libero@euenim.ca', 'Ashton', 'Damon', '1', '1', 0, 0, '2019-11-09'),
(351, 'Faith', 'Clayton', 'Winters', 'Etiam.imperdiet@fringilla.com', 'Yuli', 'Gage', '1', '0', 0, 1, '2020-10-22'),
(352, 'Rama', 'Constance', 'Chapman', 'ornare@diamdictumsapien.ca', 'Rahim', 'Yuli', '1', '1', 1, 0, '2021-02-01'),
(353, 'Sloane', 'Angelica', 'Newton', 'eget.ipsum.Donec@Morbiaccumsan.com', 'Raphael', 'Hasad', '0', '1', 1, 1, '2021-04-17'),
(354, 'Adele', 'Isabella', 'Hale', 'Cum.sociis@ipsumcursus.net', 'Dominic', 'Nigel', '1', '1', 0, 0, '2019-09-17'),
(355, 'Amos', 'Maia', 'Finley', 'Quisque.nonummy.ipsum@egestasSedpharetra.org', 'Matthew', 'Berk', '0', '1', 1, 0, '2019-10-24'),
(356, 'Ivor', 'Tallulah', 'Christian', 'lacinia@sollicitudin.net', 'Scott', 'Igor', '0', '1', 1, 1, '2020-06-04'),
(357, 'Talon', 'Yardley', 'Hurley', 'magnis.dis@aauctornon.co.uk', 'Demetrius', 'Henry', '0', '0', 0, 1, '2019-10-16'),
(358, 'Joel', 'Leonard', 'Obrien', 'Aliquam.ornare.libero@mattisCraseget.com', 'Marshall', 'Callum', '1', '0', 1, 1, '2020-12-04'),
(359, 'Flynn', 'Gloria', 'Finch', 'fermentum.convallis@eutemporerat.org', 'Harlan', 'Kasper', '1', '1', 1, 0, '2020-06-04'),
(360, 'diputu', 'Dimpho', 'Putu', 'dimphojessiica231@gmail.com', '$2y$05$mHdcFl7.h11vklCP2Q136eC.1kGmZbcetroAx95w8mx2oTmbj8rHC', '49fc6990c307225fabfaf54819a08da0', '1', '1', 1, 0, '2020/07/31'),
(361, 'tshepo', 'tshp', 'khumo', 'ate@ass.com', '$2y$05$g.1ZWnkLl21UlXtB6iMIUesWGH7KtFue3DRpseWc03Ick9zhqJWWq', '416ec6e4955abf9c3fa15610ae1bc90a', '1', '1', 1, 1, '2020/07/31'),
(362, 'stompi', 'stop', 'smoke', 'dimpho.jessiica@gmail.com', '$2y$05$2yjxgDv.5Bmc9W.b2uZo6OO7bo5sfDHtTrVVuNmPdx8o4Q86LRkhu', '079b0099cc6679a63569a272ee899280', '1', '1', 1, 0, '2020/07/31');

CREATE TABLE `user_images` (
  `img_id` int(10) NOT NULL,
  `imageType` varchar(255) NOT NULL,
  `imageData` mediumblob NOT NULL,
  `users_id` int(11) NOT NULL,
  `profilePicture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `viewstats` (
  `vs_id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `viewstats` (`vs_id`, `user1`, `user2`) VALUES
(31, 0, 0),
(23, 0, 360),
(22, 0, 361),
(32, 0, 362),
(1, 9, 10),
(8, 300, 301),
(6, 300, 302);


ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `interesttags`
  ADD UNIQUE KEY `interest` (`interest`,`userID`);

ALTER TABLE `likes`
  ADD UNIQUE KEY `user1` (`user1`,`user2`);

ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `firstname_2` (`firstname`,`lastname`);

ALTER TABLE `user_images`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `users_id` (`users_id`);

ALTER TABLE `viewstats`
  ADD PRIMARY KEY (`vs_id`),
  ADD UNIQUE KEY `user1` (`user1`,`user2`);


ALTER TABLE `chat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `userprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

ALTER TABLE `user_images`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE `viewstats`
  MODIFY `vs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;


ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

ALTER TABLE `user_images`
  ADD CONSTRAINT `user_images_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
