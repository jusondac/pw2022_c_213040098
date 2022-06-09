-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2022 at 02:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`) VALUES
(1, 'influenza'),
(2, 'Tuberkulosis (TBC)'),
(3, 'Muntaber'),
(4, 'Cacar Air'),
(5, 'Tifus'),
(6, 'Campak'),
(7, 'Pneumonia'),
(8, 'Belum Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `nama`, `usia`, `gambar`, `email`, `status_id`) VALUES
(18, 'Rejka', 21, '6290c67768073.jpg', 'permanarejka@gmail.com', 3),
(22, 'edward', 23, '6290eb7cd36ab.jpg', 'edward@gmail.com', 1),
(23, 'andreas', 28, '6291096056cd4.jpg', 'andreas@gmail.com', 2),
(24, 'steven wijaya', 29, '62913cce7735d.jpg', 'stwijaya@gmail.com', 1),
(25, 'Randall Stehr', 15, 'nophoto.png', 'candida@mohr.net', 1),
(26, 'Marth Casper', 17, 'nophoto.png', 'raymond@collier.net', 1),
(27, 'Gabriele Ledner', 18, 'nophoto.png', 'katelynn@gleason.co', 3),
(28, 'Jackie Adams', 26, 'nophoto.png', 'alethea_jaskolski@schamberger.co', 1),
(29, 'Ken White', 15, 'nophoto.png', 'jade@watsica-hammes.info', 2),
(30, 'Rubin Gislason', 25, 'nophoto.png', 'fermin_nader@smith.org', 1),
(31, 'Mary Bahringer DO', 30, 'nophoto.png', 'adella_koch@boyle.biz', 1),
(32, 'Opal Hermann', 20, 'nophoto.png', 'leandro.brown@schoen-cormier.biz', 2),
(33, 'Genevieve Langosh DO', 25, 'nophoto.png', 'dahlia.mueller@doyle-considine.name', 3),
(34, 'Fr. Isaac Schoen', 27, 'nophoto.png', 'maya@kertzmann-jones.biz', 3),
(35, 'Everett Windler', 21, 'nophoto.png', 'camilla@pfeffer.co', 3),
(36, 'Vernon Pfannerstill', 17, 'nophoto.png', 'sanjuanita@block.net', 2),
(37, 'Alberta Hamill', 15, 'nophoto.png', 'issac.harber@jacobs.io', 1),
(38, 'Wendell Hessel CPA', 18, 'nophoto.png', 'carson_langworth@shanahan-prosacco.info', 2),
(39, 'Clayton Morissette', 15, '629e258d09bc5.jpeg', 'perry@jaskolski.io', 3),
(40, 'Pres. Bennett Buckridge', 23, 'nophoto.png', 'herlinda.jenkins@larson.biz', 3),
(41, 'Jefferey Cormier', 20, 'nophoto.png', 'benedict@kub.biz', 2),
(42, 'Mae Kling', 20, 'nophoto.png', 'bridget_ruecker@wunsch.io', 1),
(43, 'Gov. Todd Brakus', 21, 'nophoto.png', 'willy@weimann-jast.com', 3),
(44, 'Ambrose Dach JD', 15, 'nophoto.png', 'dorinda.robel@halvorson.io', 2),
(45, 'Amb. Nicolas Ferry', 16, 'nophoto.png', 'mavis_kshlerin@adams.name', 2),
(46, 'Sean Green', 28, 'nophoto.png', 'nina_gibson@wolff-kutch.com', 1),
(47, 'Kent Konopelski', 28, 'nophoto.png', 'majorie_jerde@sipes.org', 2),
(48, 'Marcus Abernathy', 25, 'nophoto.png', 'ranee.walter@harris.com', 2),
(49, 'Tyrell Batz', 17, 'nophoto.png', 'nanci@dicki.net', 2),
(50, 'Heide Mosciski', 20, 'nophoto.png', 'annmarie@goldner-kulas.org', 3),
(51, 'Ambrose Beahan', 27, 'nophoto.png', 'raul_rowe@cole.info', 3),
(52, 'Cythia Metz', 22, 'nophoto.png', 'toshia.grady@watsica.org', 1),
(53, 'Kenton Kessler', 26, 'nophoto.png', 'suanne.braun@ohara-schowalter.com', 3),
(54, 'Amb. Carter Jakubowski', 20, 'nophoto.png', 'myles_berge@haag-crist.net', 2),
(55, 'Benedict Koelpin MD', 30, 'nophoto.png', 'preston_schultz@terry-shields.com', 1),
(56, 'Deandre Torp', 30, 'nophoto.png', 'kristel.douglas@legros.co', 1),
(57, 'Marcelene Monahan', 20, 'nophoto.png', 'jeanice@oconner.name', 1),
(58, 'Ezequiel Jaskolski', 17, 'nophoto.png', 'homer.gottlieb@labadie.info', 3),
(59, 'Noriko Bode PhD', 18, 'nophoto.png', 'ann.conn@ohara.info', 3),
(60, 'Ivonne Parker PhD', 26, 'nophoto.png', 'jarvis_rutherford@sauer.biz', 1),
(61, 'Lucienne Nikolaus', 17, 'nophoto.png', 'dallas@predovic.org', 3),
(62, 'Kristofer Hartmann', 15, 'nophoto.png', 'gerry@vonrueden-ratke.net', 1),
(63, 'Jamal Leuschke', 18, 'nophoto.png', 'genaro@bayer.name', 3),
(64, 'Hunter Reynolds', 18, 'nophoto.png', 'alice.feest@weissnat-blick.org', 3),
(65, 'Marquitta Tremblay', 18, 'nophoto.png', 'olympia@frami-willms.name', 1),
(66, 'Kazuko Powlowski', 28, 'nophoto.png', 'devin@kunze.name', 1),
(67, 'Elliott Mueller III', 20, 'nophoto.png', 'tony.konopelski@simonis-cartwright.com', 3),
(68, 'Shaunte Kautzer', 18, 'nophoto.png', 'jamie@lynch.io', 2),
(69, 'Donovan Rempel', 28, 'nophoto.png', 'delpha.langworth@simonis.biz', 2),
(70, 'Rozanne Weimann', 16, 'nophoto.png', 'karlene@wehner-funk.com', 2),
(71, 'Jeremy Adams DO', 27, 'nophoto.png', 'dustin_mills@becker-hane.com', 1),
(72, 'Liberty Gleichner', 16, 'nophoto.png', 'carlo@langworth-ruecker.com', 2),
(73, 'Lore Lind', 28, 'nophoto.png', 'johana@king.info', 3),
(74, 'Jewell Davis', 15, 'nophoto.png', 'almeta@rice.co', 2),
(75, 'Sulema Thiel V', 24, 'nophoto.png', 'lisha@bogisich.io', 2),
(76, 'Norberto Stoltenberg', 20, 'nophoto.png', 'houston_schuppe@corwin-schimmel.info', 2),
(77, 'Lieselotte Rowe', 27, 'nophoto.png', 'malika.leffler@denesik.com', 1),
(78, 'Amb. Donald Gibson', 29, 'nophoto.png', 'barrett.hand@hauck.com', 3),
(79, 'Ms. Cary Paucek', 20, 'nophoto.png', 'stephenie.kassulke@bashirian.name', 2),
(80, 'Caroline Zboncak', 16, 'nophoto.png', 'anastacia@labadie-lemke.biz', 2),
(81, 'Cyril Parisian', 21, 'nophoto.png', 'nelly@huel-monahan.net', 1),
(82, 'Nick Zulauf DO', 22, 'nophoto.png', 'jacinta.bergstrom@greenholt.org', 2),
(83, 'Mina D\'Amore', 29, 'nophoto.png', 'moses@larson.org', 2),
(84, 'Francisca Kulas', 18, 'nophoto.png', 'abram@funk.org', 3),
(85, 'Joshua Boehm', 15, 'nophoto.png', 'krysta.mccullough@johnson.com', 1),
(86, 'Aaron Willms', 21, 'nophoto.png', 'billy@glover.net', 2),
(87, 'Lincoln Smith', 26, 'nophoto.png', 'gabriel@haag.info', 3),
(88, 'Lynwood Kerluke', 16, 'nophoto.png', 'tommie_kutch@padberg-anderson.biz', 3),
(89, 'Dan Larkin', 19, 'nophoto.png', 'marti.abbott@kassulke.name', 2),
(90, 'Marisha Feeney', 17, 'nophoto.png', 'kelsey_ward@muller-roob.org', 1),
(91, 'Leonel Pacocha II', 17, 'nophoto.png', 'coreen_berge@thiel.co', 3),
(92, 'Bill Lueilwitz', 17, 'nophoto.png', 'todd@conroy.co', 2),
(93, 'Sheldon Vandervort', 15, 'nophoto.png', 'rea@franecki-pollich.io', 1),
(94, 'Chrystal Batz', 20, 'nophoto.png', 'fernande_cassin@predovic.biz', 2),
(95, 'Rocco Parker', 26, 'nophoto.png', 'gertrudis@runolfsdottir-cassin.com', 1),
(96, 'Fernando Mills', 25, 'nophoto.png', 'scott@brakus.co', 1),
(97, 'Renna Prosacco', 20, 'nophoto.png', 'charlie_mohr@hand.info', 3),
(98, 'Breanne Conn', 18, 'nophoto.png', 'antoine@windler.co', 3),
(99, 'Cammy Feil', 26, 'nophoto.png', 'wilford@stracke.net', 2),
(100, 'Alfreda Block', 29, 'nophoto.png', 'dorothea_yundt@gutmann-lockman.com', 2),
(101, 'Johnsie Torphy', 17, 'nophoto.png', 'merrill_kiehn@hammes.com', 1),
(102, 'Lemuel Beatty', 15, 'nophoto.png', 'jerrica@blick-hudson.info', 1),
(103, 'Fidel Pouros', 24, 'nophoto.png', 'noble.stracke@gutkowski.biz', 2),
(104, 'Gene Hartmann', 16, 'nophoto.png', 'tyson@torp.com', 2),
(105, 'Rep. Patrick Nolan', 22, 'nophoto.png', 'harry_wilkinson@prohaska-collier.info', 3),
(106, 'Larae Bartoletti', 22, 'nophoto.png', 'jonnie.bechtelar@jakubowski.net', 3),
(107, 'Ma Fritsch', 28, 'nophoto.png', 'dell_schmitt@schuster.io', 3),
(108, 'Wilburn Hudson', 22, 'nophoto.png', 'felice@borer.co', 1),
(109, 'Anastacia Hirthe', 21, 'nophoto.png', 'cristy_feeney@schuster-cummings.net', 1),
(110, 'Nathanial Kuhlman', 25, 'nophoto.png', 'chuck@bradtke.name', 1),
(111, 'Amb. Walker Harris', 18, 'nophoto.png', 'vincenzo@leannon.biz', 2),
(112, 'Enid Monahan IV', 21, 'nophoto.png', 'dong@predovic.co', 2),
(113, 'Kenny Schmeler', 28, 'nophoto.png', 'chong_sipes@mccullough-crooks.net', 1),
(114, 'Lucrecia Trantow', 25, 'nophoto.png', 'jospeh@becker.info', 2),
(115, 'Johnnie Nolan', 21, 'nophoto.png', 'jerald@hermann.io', 3),
(116, 'Mrs. Lelia Mraz', 28, 'nophoto.png', 'pierre@schoen.info', 3),
(117, 'Reynaldo Ferry', 19, 'nophoto.png', 'fatima@bogisich.net', 1),
(118, 'Mr. Keiko Doyle', 30, 'nophoto.png', 'dustin.russel@dibbert.biz', 1),
(119, 'Kathryn Ledner', 20, 'nophoto.png', 'toby@rodriguez.biz', 2),
(120, 'Dedra Torphy CPA', 16, 'nophoto.png', 'josiah.ritchie@metz-schuppe.co', 3),
(121, 'Moira Barton', 16, 'nophoto.png', 'val@hermann.name', 1),
(122, 'Sen. Marine Walker', 24, 'nophoto.png', 'dominic.little@zieme-pfeffer.name', 2),
(123, 'Elene Runolfsson', 27, 'nophoto.png', 'russel_schamberger@casper-green.name', 3),
(124, 'Ezequiel Huel', 18, 'nophoto.png', 'sima_rosenbaum@larson.name', 3),
(125, 'Steve', 23, '629713d8578b3.png', 'steve@gmail.com', 2),
(126, 'zidan', 21, '629e260b96dea.jpeg', 'zidan@gmail.com', 3),
(127, 'yoga', 21, '62a0a8ee8dc6c.jpg', 'yoga@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `patient_diseases`
--

CREATE TABLE `patient_diseases` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `diseases_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_diseases`
--

INSERT INTO `patient_diseases` (`id`, `patient_id`, `diseases_id`) VALUES
(38, 18, 1),
(39, 18, 2),
(40, 18, 3),
(41, 18, 7),
(42, 22, 1),
(43, 20, 1),
(44, 20, 3),
(45, 20, 6),
(46, 125, 1),
(47, 125, 4),
(48, 125, 2),
(49, 39, 1),
(51, 21, 1),
(52, 21, 3),
(53, 21, 5),
(54, 126, 1),
(55, 126, 3),
(56, 126, 6),
(57, 126, 2),
(58, 126, 7),
(68, 127, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'terluka'),
(2, 'Dalam Pengobatan'),
(3, 'Sembuh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'rejka', '$2y$10$MEhkStvPPTnGDeqxN79mYeoFMxhDrHiC2oaAU2sH4tweXs/R4YXcW', 2),
(2, 'elsa', '$2y$10$2.o5BcKNWe9f3AoxuX47B.Aq9ut11DqWCaw7AnuUv.WtzJOafP2Ou', 1),
(3, 'zidan', '$2y$10$mfAIgx/vSYv0RGE.Yua8C.gkf0yKppt543uA/zSILdC699pows2Rq', 2),
(4, 'yoga', '$2y$10$eqs2rAwRTtLI1QYvoSWLTu7henaffKzP7D6aONjM9nBkjb9xD36iS', 1),
(5, 'syahidan', '$2y$10$ob88hsot1YbkRam6VuikN.CpmM1RuMwD6hukRJRXqM8CQKFA3/4DK', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_diseases`
--
ALTER TABLE `patient_diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `patient_diseases`
--
ALTER TABLE `patient_diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
