-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 08:10 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meteoor_dwoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment_assignment`
--

CREATE TABLE `assessment_assignment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade1` int(11) NOT NULL,
  `grade2` int(11) NOT NULL,
  `grade3` int(11) NOT NULL,
  `grade4` int(11) NOT NULL,
  `grade5` int(11) NOT NULL,
  `grade6` int(11) NOT NULL,
  `grade7` int(11) NOT NULL,
  `grade8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_assignment`
--

INSERT INTO `assessment_assignment` (`id`, `user_id`, `grade1`, `grade2`, `grade3`, `grade4`, `grade5`, `grade6`, `grade7`, `grade8`) VALUES
(1, 0, 1, 2, 3, 4, 4, 4, 4, 4),
(2, 11, 1, 3, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `assessment_group`
--

CREATE TABLE `assessment_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade1` varchar(255) NOT NULL,
  `grade2` varchar(255) NOT NULL,
  `grade3` varchar(255) NOT NULL,
  `grade4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_group`
--

INSERT INTO `assessment_group` (`id`, `user_id`, `grade1`, `grade2`, `grade3`, `grade4`) VALUES
(1, 11, '1', '2', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_sport`
--

CREATE TABLE `assessment_sport` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `km_time` int(11) NOT NULL,
  `km_grade` int(11) NOT NULL,
  `push_up_time` int(11) NOT NULL,
  `push_up_grade` int(11) NOT NULL,
  `sit_up_grade` int(11) NOT NULL,
  `sit_up_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_sport`
--

INSERT INTO `assessment_sport` (`id`, `user_id`, `km_time`, `km_grade`, `push_up_time`, `push_up_grade`, `sit_up_grade`, `sit_up_time`) VALUES
(1, 10, 1, 2, 3, 4, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `questions_letterpair`
--

CREATE TABLE `questions_letterpair` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `pair1a` varchar(255) NOT NULL,
  `pair1b` varchar(255) NOT NULL,
  `pair2a` varchar(255) NOT NULL,
  `pair2b` varchar(255) NOT NULL,
  `pair3a` varchar(255) NOT NULL,
  `pair3b` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `incorrect_answer1` varchar(255) NOT NULL,
  `incorrect_answer2` varchar(255) NOT NULL,
  `incorrect_answer3` varchar(255) NOT NULL,
  `incorrect_answer4` varchar(255) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions_numberseries`
--

CREATE TABLE `questions_numberseries` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `num1` int(11) NOT NULL,
  `num2` int(11) NOT NULL,
  `num3` int(11) NOT NULL,
  `num4` int(11) NOT NULL,
  `num5` int(11) NOT NULL,
  `num6` int(11) NOT NULL,
  `incorrect_num1` int(11) NOT NULL,
  `incorrect_num2` int(11) NOT NULL,
  `incorrect_num3` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions_wordpair`
--

CREATE TABLE `questions_wordpair` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `word1` varchar(255) NOT NULL,
  `word2` varchar(255) NOT NULL,
  `incorrect_answer1` varchar(255) NOT NULL,
  `incorrect_answer2` varchar(255) NOT NULL,
  `incorrect_answer3` varchar(255) NOT NULL,
  `incorrect_answer4` varchar(255) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_wordpair`
--

INSERT INTO `questions_wordpair` (`id`, `quiz_id`, `answer1`, `answer2`, `word1`, `word2`, `incorrect_answer1`, `incorrect_answer2`, `incorrect_answer3`, `incorrect_answer4`, `score`) VALUES
(1, 1, 'ding', 'jemoer', 'anderding', 'nogeending', 'puk bobbie', 'borre loulou', 'thera tycho', 'hallo hallo', 10),
(2, 2, 'hallo', 'gaat', 'thera', 'hoe', 'het met', 'puk en', 'met lou', 'lou borre', 100),
(3, 2, 'hier', 'een', 'komt', 'nog', 'vraag hoor', 'ik hoop', 'dat je', 'het juiste', 100),
(4, 3, 'Juiste antwoord', 'Juiste antwoord', 'Juiste antwoord', 'Juiste antwoord', '100 100', '100 100', '100 100', '100 100', 100);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `type`, `name`, `time`, `score`) VALUES
(1, 2, 'Woordpaar test', 10, 100),
(2, 2, 'Woordpaar2', 10, 100),
(3, 2, 'Woordpaar3', 10, 1990),
(4, 3, 'Letterpaar?', 10, 1990);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_submitted_answers`
--

CREATE TABLE `quiz_submitted_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_submitted_answers`
--

INSERT INTO `quiz_submitted_answers` (`id`, `user_id`, `quiz_id`, `question_id`, `answer`) VALUES
(1, 9, 1, 1, 'ding jemoer'),
(2, 9, 2, 2, 'puk en'),
(3, 9, 2, 3, 'ik hoop'),
(4, 9, 3, 4, 'Juiste antwoord Juiste antwoord');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_types`
--

CREATE TABLE `quiz_types` (
  `id` int(11) NOT NULL,
  `quiz_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_types`
--

INSERT INTO `quiz_types` (`id`, `quiz_type`) VALUES
(1, 'Cijferreeks'),
(2, 'Woordpaar'),
(3, 'Letterpaar');

-- --------------------------------------------------------

--
-- Table structure for table `settings_quiz_pass_percentage`
--

CREATE TABLE `settings_quiz_pass_percentage` (
  `id` int(11) NOT NULL,
  `quiz_type_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings_quiz_pass_percentage`
--

INSERT INTO `settings_quiz_pass_percentage` (`id`, `quiz_type_id`, `percentage`) VALUES
(1, 1, 60),
(2, 2, 60),
(3, 3, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `second_email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `date_of_birth`, `address`, `postcode`, `residence`, `password`, `phonenumber`, `email`, `second_email`, `role`) VALUES
(9, 'Matrimandir', 'Tycho', 'Neuman', '1990-10-10', 'Hallo', '1234EA', 'Sneek', '1dc9cf47856f1e3d05df0fbb6992e91f6f5462537a3988c10e6c5f3143b8d9ff', '923892', 'test@gmail.com', 'test@outlook.com', 'Admin'),
(10, 'Sport', 'Sport', 'Sport', '1990-10-10', 'Sport 123', '1234ab', 'Sport', '3759f0c3d5973e58fc492e37f68e18f92e839560c00922a0851d242dc45333c1', '1234567', 'Sport@Sport.nl', 'Sport@Sport.nl', 'Student'),
(11, 'Werkstuk', 'Werkstuk', 'Werkstuk', '1990-10-10', 'Werkstuk 123', '1234ab', 'Werkstuk', '3759f0c3d5973e58fc492e37f68e18f92e839560c00922a0851d242dc45333c1', '1234567', 'Werkstuk@Werkstuk.nl', 'Werkstuk@Werkstuk.nl', 'Student'),
(12, 'Testadmin', 'Testadmin', 'Testadmin', '1990-10-10', 'Testadmin 123', '1234ab', 'Testadmin', '3759f0c3d5973e58fc492e37f68e18f92e839560c00922a0851d242dc45333c1', '1234567', 'Testadmin@Testadmin.nl', 'Testadmin@Testadmin.nl', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment_assignment`
--
ALTER TABLE `assessment_assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_group`
--
ALTER TABLE `assessment_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_sport`
--
ALTER TABLE `assessment_sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_letterpair`
--
ALTER TABLE `questions_letterpair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_numberseries`
--
ALTER TABLE `questions_numberseries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_wordpair`
--
ALTER TABLE `questions_wordpair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_submitted_answers`
--
ALTER TABLE `quiz_submitted_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_types`
--
ALTER TABLE `quiz_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_quiz_pass_percentage`
--
ALTER TABLE `settings_quiz_pass_percentage`
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
-- AUTO_INCREMENT for table `assessment_assignment`
--
ALTER TABLE `assessment_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assessment_group`
--
ALTER TABLE `assessment_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assessment_sport`
--
ALTER TABLE `assessment_sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions_letterpair`
--
ALTER TABLE `questions_letterpair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions_numberseries`
--
ALTER TABLE `questions_numberseries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions_wordpair`
--
ALTER TABLE `questions_wordpair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_submitted_answers`
--
ALTER TABLE `quiz_submitted_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_types`
--
ALTER TABLE `quiz_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings_quiz_pass_percentage`
--
ALTER TABLE `settings_quiz_pass_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
