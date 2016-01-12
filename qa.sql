-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2016 at 03:25 AM
-- Server version: 5.5.47-MariaDB-1~trusty-log
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qa`
--

-- --------------------------------------------------------

--
-- Table structure for table `qa_answer`
--

CREATE TABLE `qa_answer` (
  `id_answer` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `description_answer` text NOT NULL,
  `answer_date` datetime NOT NULL,
  `answer_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_answer`
--

INSERT INTO `qa_answer` (`id_answer`, `user_id`, `question_id`, `description_answer`, `answer_date`, `answer_update`) VALUES
(1, 1, 1, '<br>\r\nCoba gunakan code ini<br>\r\n<pre>\r\n&lt;?php\r\n$db = new mysqli("localhost", "budiman", "budiman", "nama_database");\r\nif ($db->connect_error) {\r\n    die(\'Gagal terhubung dengan database: \' . $db->connect_error);\r\n    exit;\r\n}\r\n</pre>\r\nKesalahan pada pada <b>$db->conect_error</b>, seharusnya <b>$db->connect_error</b>', '2016-01-13 02:33:11', '2016-01-13 02:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `qa_category`
--

CREATE TABLE `qa_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_category`
--

INSERT INTO `qa_category` (`id_category`, `category_name`) VALUES
(1, 'Programming'),
(2, 'User Interface'),
(3, 'User Experience'),
(4, 'Analytics');

-- --------------------------------------------------------

--
-- Table structure for table `qa_comment`
--

CREATE TABLE `qa_comment` (
  `id_comment` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `comment_in` enum('Question','Answer') NOT NULL,
  `description_comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_comment`
--

INSERT INTO `qa_comment` (`id_comment`, `user_id`, `question_id`, `answer_id`, `comment_in`, `description_comment`, `comment_date`, `comment_update`) VALUES
(1, 2, NULL, 1, 'Answer', 'Terima kasih, sudah berjalan... dan tidak ada error lagi.', '2016-01-13 02:37:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qa_migrations`
--

CREATE TABLE `qa_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_migrations`
--

INSERT INTO `qa_migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `qa_question`
--

CREATE TABLE `qa_question` (
  `id_question` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description_question` text NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `question_date` datetime NOT NULL,
  `question_update` datetime DEFAULT NULL,
  `viewers` int(11) NOT NULL DEFAULT '0',
  `url_question` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_question`
--

INSERT INTO `qa_question` (`id_question`, `user_id`, `subject`, `category_id`, `description_question`, `answer_id`, `question_date`, `question_update`, `viewers`, `url_question`) VALUES
(1, 2, 'Koneksi Basis Data MySQL di PHP Menggunakan OOP', 1, 'Assalamualaikum wr. wb. <br>\r\n<br>\r\nSaya ingin mengajukan pertanyaan, bagaimana cara membuat koneksi PHP menggunakan OOP MySQLi? Saya sudah mencoba dengan code dibawah ini, namun masih terjadi error.<br>\r\n<br>\r\n<pre>\r\n&lt;?php\r\n$db = new mysqli("localhost", "budiman", "budiman", "nama_database");\r\nif ($db->conect_error) {\r\n    die(\'Gagal terhubung dengan database: \' . $db->connect_error);\r\n    exit;\r\n}\r\n</pre>\r\n<br>\r\nTerima kasih.', 1, '2016-01-13 01:42:31', '2016-01-13 02:27:29', 24, '1-koneksi-basis-data-mysql-di-php-menggunakan-oop'),
(2, 2, 'PHP Framework', 4, 'Apa sih PHP Framework yang bagus dan tepat dari segi performa, kecepatan, stabil dan yang paling unggul dari yang lainnya?', NULL, '2016-01-13 02:31:08', NULL, 4, '2-php-framework');

-- --------------------------------------------------------

--
-- Table structure for table `qa_question_tag`
--

CREATE TABLE `qa_question_tag` (
  `id_qt` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_question_tag`
--

INSERT INTO `qa_question_tag` (`id_qt`, `question_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `qa_role`
--

CREATE TABLE `qa_role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_role`
--

INSERT INTO `qa_role` (`id_role`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `qa_session`
--

CREATE TABLE `qa_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `qa_tag`
--

CREATE TABLE `qa_tag` (
  `id_tag` int(11) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_tag`
--

INSERT INTO `qa_tag` (`id_tag`, `tag_name`) VALUES
(1, 'PHP'),
(2, 'MySQL'),
(3, 'Linux'),
(4, 'Windows'),
(5, 'CSS'),
(6, 'HTML'),
(7, 'XML'),
(8, 'JavaScript'),
(9, 'AJAX'),
(10, 'jQuery'),
(11, 'JSON');

-- --------------------------------------------------------

--
-- Table structure for table `qa_user`
--

CREATE TABLE `qa_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `web` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `user_date` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_ip` varchar(50) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lost_password` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `activated_hash` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_user`
--

INSERT INTO `qa_user` (`id_user`, `username`, `password`, `activated`, `nama`, `email`, `bio`, `web`, `lokasi`, `role_id`, `user_date`, `last_login`, `last_ip`, `modified`, `lost_password`, `image`, `activated_hash`) VALUES
(1, 'sundi3yansyah', '$2a$08$7Fg0nazGSJoJVgO/2HQMXeIRpaTgvGKbljagMGFbnM88x7jNTeNsG', 1, 'sundi3yansyah', 'sundi3yansyah@questionanswer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, maiores!', 'questionanswer', 'Asia/Jakarta', 1, '2016-01-13 00:53:58', '2016-01-13 02:47:11', '127.0.0.1', '2016-01-12 19:47:11', NULL, NULL, NULL),
(2, 'budi', '$2a$08$pjI3gCnYDXI1nLiRNJv87uhoL6ovIeJ5ZI1s/DQ713x1oPl2dLiNm', 1, 'Budiman', 'saya@budi.man', 'Nama saya Budiman, saya orang yang berbudi perkerti.', 'budi.man', 'Indonesia', 2, '2016-01-13 01:19:50', '2016-01-13 02:36:01', '127.0.0.1', '2016-01-12 19:36:01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qa_vote`
--

CREATE TABLE `qa_vote` (
  `id_vote` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `vote_in` enum('Question','Answer') NOT NULL,
  `vote_date` datetime NOT NULL,
  `vote_update` datetime DEFAULT NULL,
  `vote_for` enum('Up','Down') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa_vote`
--

INSERT INTO `qa_vote` (`id_vote`, `user_id`, `question_id`, `answer_id`, `vote_in`, `vote_date`, `vote_update`, `vote_for`) VALUES
(1, 2, NULL, 1, 'Answer', '2016-01-13 02:36:15', NULL, 'Up');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qa_answer`
--
ALTER TABLE `qa_answer`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `qa_category`
--
ALTER TABLE `qa_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `qa_comment`
--
ALTER TABLE `qa_comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexes for table `qa_question`
--
ALTER TABLE `qa_question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexes for table `qa_question_tag`
--
ALTER TABLE `qa_question_tag`
  ADD PRIMARY KEY (`id_qt`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `qa_role`
--
ALTER TABLE `qa_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `qa_session`
--
ALTER TABLE `qa_session`
  ADD KEY `timestamp` (`timestamp`);

--
-- Indexes for table `qa_tag`
--
ALTER TABLE `qa_tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `qa_user`
--
ALTER TABLE `qa_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `qa_vote`
--
ALTER TABLE `qa_vote`
  ADD PRIMARY KEY (`id_vote`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qa_answer`
--
ALTER TABLE `qa_answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qa_category`
--
ALTER TABLE `qa_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `qa_comment`
--
ALTER TABLE `qa_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qa_question`
--
ALTER TABLE `qa_question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qa_question_tag`
--
ALTER TABLE `qa_question_tag`
  MODIFY `id_qt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `qa_role`
--
ALTER TABLE `qa_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qa_tag`
--
ALTER TABLE `qa_tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `qa_user`
--
ALTER TABLE `qa_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qa_vote`
--
ALTER TABLE `qa_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `qa_answer`
--
ALTER TABLE `qa_answer`
  ADD CONSTRAINT `qa_answer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `qa_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qa_answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `qa_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qa_comment`
--
ALTER TABLE `qa_comment`
  ADD CONSTRAINT `qa_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `qa_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qa_comment_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `qa_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qa_comment_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `qa_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qa_question`
--
ALTER TABLE `qa_question`
  ADD CONSTRAINT `qa_question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `qa_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qa_question_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `qa_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qa_question_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `qa_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qa_question_tag`
--
ALTER TABLE `qa_question_tag`
  ADD CONSTRAINT `qa_question_tag_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `qa_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qa_question_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `qa_tag` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qa_user`
--
ALTER TABLE `qa_user`
  ADD CONSTRAINT `qa_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `qa_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qa_vote`
--
ALTER TABLE `qa_vote`
  ADD CONSTRAINT `qa_vote_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `qa_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qa_vote_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `qa_question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qa_vote_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `qa_answer` (`id_answer`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
