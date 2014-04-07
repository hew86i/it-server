-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2014 at 05:58 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it`
--
CREATE DATABASE IF NOT EXISTS `it` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `it`;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Administrator', '{"admin" :1}'),
(2, 'Standard user', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(20) NOT NULL,
  `joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `group`) VALUES
(5, 'goran12', 'e51dcb999c2ea3db4eb5e11132b78eb38f673d7905244726bc15ec0ad8b7cf60', 'е234SDES#$ asasd', 'Горан 21', '2014-03-01 09:41:04', 1),
(18, 'admin', '52c6cf4c8e13634385f89a5de835ed21601fffd2e794a800746dd01c2da7eb25', '#2234as#$E%^^!11aswd23AS@s', 'Admin Server', '2014-03-01 14:17:21', 5),
(19, 'josip', '85d03f022865ef2f9146e5ccbde83c96265cf99fa71b04019341c08bb057a42a', 'MUlxf7tm.hY6btdZnN4/KjyrIToY0VKy', 'Josip Тест', '2014-03-03 16:20:26', 1),
(22, 'blagojа', '20213a5b27be54da10a8487882cfd219dd506767d73a6666dedd2114d8e3e451', 'EE1XIAIgnj80MZWVijVDHHHZqrrI14Ed', 'Благоја Тричковски', '2014-03-15 11:41:31', 1),
(24, 'blagoja123', '2ca965d3e19260a5e7a2dfacc457b51ea55c401464efa52ecadc961aff03767d', '7j00OyDbL24Rc1TRlLAL96s02Ya9lNQy', 'Благоја Тричковски', '2014-03-15 11:44:03', 1),
(25, 'user_nov', 'dd7f1ac755597309ece6d4ac28cf69b98555505327c4433dda0612975819c729', 'RqVKScjiD4qGi8qzRyf7I/yTO.eFaLa8', 'ÐÐ¾Ð² Ñ˜ÑƒÑÐµÑ€', '2014-03-27 14:29:43', 1),
(26, 'svetle', '02b9dfaccec20c0231f80fb8b17137b72e842d0f5d44c4985c89343d253268ac', 'GGCaY1b6zGtqdoYIhySvy.VI0EYlim12', 'RTRTR', '2014-03-28 12:52:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

DROP TABLE IF EXISTS `users_session`;
CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

DROP TABLE IF EXISTS `view`;
CREATE TABLE IF NOT EXISTS `view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `user` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rank` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1' COMMENT '1=aktiven, 0=zavrsen 9=izbrisan i ne se prikazuva',
  `new` int(11) DEFAULT '1' COMMENT '1 = novo, 0 = ne se prikazuva',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`id`, `name`, `description`, `user`, `created`, `rank`, `status`, `new`) VALUES
(4, 'Тест Налог', 'Кирилица налог- нов ред администратор', 'admin', '2014-03-04 11:38:27', 1, 9, 0),
(5, 'Приоритет ', 'налог со приоритет\r\n-сдфаасдч\r\n-асдфадсфадф', 'admin', '2014-03-04 13:24:18', 1, 9, 0),
(6, 'Lorem', 'Mauris varius lectus non sem vestibulum dignissim. Nulla sed augue tempor, lobortis enim eu, auctor ligula. Nullam at auctor ante.', 'goran12', '2014-03-04 13:25:21', 1, 9, 0),
(10, 'без наслов', 'лорен ипсум адум нес. Ата ине коре бес дис ла ла да да - налог за сеее сесе сссс . и така натаму', 'admin', '2014-03-05 13:33:48', 0, 9, 0),
(21, 'So, any ideas? Thanks', 'EDIT: Thanks for your answers everybody! I took many of your opinions into account (so I won''t be commenting on each answer separately) and finally got it working like this:', 'admin', '2014-03-05 14:05:53', 0, 9, 0),
(23, '- Извадок од лорем ипсум -', 'Aenean gravida augue tellus, vitae accumsan leo luctus at. Pellentesque luctus fermentum velit, id lobortis odio blandit at. Cras vel sem turpis. Aenean commodo ante non euismod consequat. Proin varius augue ut libero tristique adipiscing. Maecenas interdum purus eget elementum semper. Integer vel porttitor est. Integer at odio nibh. Integer lacinia dolor augue, ut aliquam purus suscipit ut. Curabitur tincidunt quis nisl eu ullamcorper. Curabitur eget diam est. Fusce scelerisque laoreet malesuada. Donec massa diam, sagittis ac nibh commodo, posuere venenatis arcu. Ut ultrices, urna at bibendum laoreet, eros neque feugiat tortor, a volutpat elit est eget purus.', 'admin', '2014-03-05 14:07:27', 0, 9, 0),
(24, ' - ТЕХНИКА -', 'Да се дополни агрегатот за <strong>серверот</strong> со гориво', 'admin', '2014-03-05 14:08:44', 0, 9, 0),
(25, ' - Пратка - ', ' Да се испрати компјутерот HP-13 -ка во Прилеп 4 </br>\r\n(HP-то е врз агрегатот)', 'admin', '2014-03-05 14:10:31', 0, 9, 0),
(30, 'Компјутер 2 каса', 'Да се подеси 2 каса во Демир Хисар', 'admin', '2014-03-05 15:57:05', 0, 9, 0),
(31, 'asdf asd f', 'Zdravo viktor', 'admin', '2014-03-06 10:14:53', 0, 9, 0),
(37, 'Благоја Тричковски', '\r\nКако што велат старите: Нема невозможни работи, најважно е да се има желба. Оваа фраза како да е напишана за 23 годишниот Натран Хјуит. Тој успеа целосно да го смени своето тело благодарение на здравата исхрана и редовните вежби. Во моментот кога Натран цврсто решил да ослабне, тој тежел 146 килограми, после што ослабел неверојатни 76 килограми. Откако ослабе, Натран мораше да направи и пластична операција за да се отстрани вишокот кожа кој остана да виси после наглото слабеење.', 'admin', '2014-03-06 14:19:29', 0, 9, 0),
(41, 'Нов налог', 'со - Remove Копче', 'admin', '2014-03-15 11:28:20', 0, 9, 0),
(45, 'Најнов', 'со кирилица', 'admin', '2014-03-17 15:00:10', 0, 9, 0),
(46, 'sss', 'sss', 'admin', '2014-03-21 16:24:24', 0, 9, 0),
(47, 'asdfasdf', 'asdfasdf', 'admin', '2014-03-27 13:43:39', 0, 9, 0),
(48, 'ÐÐ°Ð½Ð¾Ð²', 'Ð—Ð° ÐºÐ¸Ñ€Ð¸Ð»Ð¸Ñ†Ð°\r\n', 'admin', '2014-03-27 13:44:05', 0, 9, 0),
(49, 'asdfasd', 'asdfasdf', 'user_nov', '2014-03-27 14:40:45', 0, 9, 0),
(50, ' asdf as', 'ASDFAS DFAS dfasdfÐÐ¡Ð”Ð¤ ÐÐ¡Ð”Ð¤ Ð°ÑÐ´Ñ„ Ð°', 'admin', '2014-03-27 15:32:07', 0, 9, 0),
(51, 'asdf ', 'asdf asd fasdjfk asdasdf asd fasdjfk asdasdf asd fasdjfk asdasdf asd fasdjfk asdasdf asd fasdjfk asdasdf asd fasdjfk asdasdf asd fasdjfk asdasdf asd fasdjfk asd', 'user_nov', '2014-03-27 15:32:33', 0, 9, 0),
(52, 'Ð‘ÐµÐ· Ð½Ð°ÑÐ»Ð¾Ð²', '<h1><q><cite>Ð”Ð¾Ð±Ð°Ñ€ Ð´ÐµÐ½ - <span style="color:#B22222"><strong>Ð˜Ð—Ð’Ð•Ð¡Ð¢Ð£Ð’ÐÐŠÐ•</strong></span>;</cite></q></h1>\r\n\r\n<ol>\r\n	<li>Ð½Ð¾Ð²Ð¾ Ð½ÐµÑˆÑ‚Ð¾</li>\r\n	<li>Ð¿Ð¾Ð½Ð¾Ð²Ð¾ Ð½ÐµÑˆÑ‚Ð¾</li>\r\n	<li>Ñ‚Ñ€ÐµÑ‚Ð¾ Ð½ÐµÑˆÑ‚Ð¾</li>\r\n	<li><strong>20 ÐµÐ²Ñ€Ð° Ð¸ Ð´Ð²Ðµ ÐºÑƒÑ‚Ð¸Ð¸ Ñ†Ð¸Ð³Ð°Ñ€Ð¸</strong></li>\r\n</ol>\r\n', 'admin', '2014-03-28 11:49:13', 0, 9, 0),
(53, 'Ð Ð Ð ', '<blockquote>\r\n<p>ÐÐ°Ñ˜Ð½Ð¾Ð²Ð¾ Ð°ÑÐ´Ñ„Ð°ÑÐ´Ñ„</p>\r\n</blockquote>\r\n\r\n<ol>\r\n	<li>&nbsp;Ð°ÑÐ´Ñ„Ð°ÑÐ´Ñ„ Ð°ÑÐ´Ñ„ Ð°ÑÐ´Ñ„ Ð°ÑÐ´Ñ„ Ð°ÑÐ´Ñ„</li>\r\n	<li><span style="color:#008000">Ð°ÑÐ´ Ñ„Ð°ÑÐ´Ñ„ Ð°ÑÐ´Ñ„ Ð°ÑÐ´</span></li>\r\n</ol>\r\n', 'admin', '2014-03-28 11:56:56', 0, 9, 1),
(54, 'asdfasdf', '<p>asdfasdfasdfasdfasd fas</p>\r\n\r\n<p>asdf asd<em>f asdf as<span style="color:#00FFFF">df asdf asdf asdf asdf sdf asdf</span></em></p>\r\n', 'admin', '2014-03-28 12:02:33', 0, 9, 1),
(55, 'asdfasd', '<h2 style="font-style:italic;">sasdfasdf&nbsp;<br />\r\n&nbsp;</h2>\r\n', 'svetle', '2014-03-28 12:53:13', 0, 9, 1),
(56, 'ÐˆÐ°ÑÐ½Ð¾ ÐºÐ°ÐºÐ¾ Ð´ÐµÐ½...', '<p>Ð• Ð½Ðµ Ðµ Ð±Ð°Ñˆ Ñ˜Ð°ÑÐ½Ð¾ . &#39;ssda &#39;</p>\r\n', 'admin', '2014-03-28 14:09:27', 0, 9, 1),
(57, 'ÐÐ” ÐÐ¦Ð', '<p>ASDFAS DFAS dfasdfÐÐ¡Ð”Ð¤ ÐÐ¡Ð”Ð¤ Ð°ÑÐ´Ñ„ Ð°</p>\r\n', 'admin', '2014-03-28 14:16:37', 0, 9, 1),
(58, 'ÐœÐ°Ð» Ð¿Ñ€Ð¸Ð¼ÐµÑ€', '&lt;p&gt;&lt;strong&gt;ÑÐ¾ Ð±Ð¾Ð»Ð´&lt;/strong&gt;&lt;/p&gt;\r\n', 'admin', '2014-03-28 14:39:42', 0, 9, 1),
(59, 'Ñ„Ð¾Ñ€Ñ‚Ðµ', '&lt;p&gt;&lt;em&gt;Ð´Ð°Ð´Ð° Ð´Ð°Ð´ Ð°Ð´&lt;/em&gt;&lt;/p&gt;\r\n', 'admin', '2014-03-28 14:45:24', 0, 9, 1),
(60, 'ssss', '&lt;p&gt;asdfasd&amp;#39;&amp;#39;&amp;#39;&amp;#39;&amp;#39;&lt;/p&gt;\r\n', 'admin', '2014-03-28 14:46:00', 0, 9, 1),
(61, 'sss', '&lt;p&gt;sdf asdf asdf as&amp;#39;as &amp;#39;as d&amp;#39;asdf&amp;nbsp;&lt;/p&gt;\r\n', 'admin', '2014-03-28 14:47:06', 0, 9, 1),
(62, 'sssd asdf', '<p>ss</p>\\r\\n', 'admin', '2014-03-28 14:50:58', 0, 9, 1),
(63, 'cccc', '<p>cccc</p>\\r\\n', 'admin', '2014-03-28 14:51:56', 0, 9, 1),
(64, 'ÐÐ” ÐÐ¦Ð', '<p><strong>a</strong></p>\r\n', 'admin', '2014-03-28 15:22:44', 0, 9, 1),
(65, 'aaa', '<p><strong>A</strong></p>\\r\\n', 'admin', '2014-03-28 15:26:38', 0, 9, 1),
(66, 'Ð¡Ð¼Ð°Ð»', '<p>Ñ†Ð¼Ð°Ð» Ð”Ð´ÑÐ´</p>\\r\\n', 'admin', '2014-03-28 15:32:04', 0, 9, 1),
(67, 'sssadfa', '<p>asdf asdf asdf as</p>\\r\\n', 'admin', '2014-03-28 15:36:24', 0, 9, 1),
(68, '123123123', '&lt;p&gt;sss&lt;/p&gt;', 'admin', '2014-03-29 09:49:12', 0, 9, 1),
(69, '333', '&lt;p&gt;333&lt;/p&gt;', 'admin', '2014-03-29 09:55:03', 0, 9, 1),
(70, 'ww', '&lt;p&gt;444&amp;nbsp;&lt;/p&gt;\\r\\n&lt;p&gt;44&lt;/p&gt;', 'admin', '2014-03-29 09:55:11', 0, 9, 1),
(71, 'ddd', '&lt;p&gt;ddd d&amp;nbsp;&lt;/p&gt;\\r\\n&lt;p&gt;dd&lt;/p&gt;', 'admin', '2014-03-29 09:56:29', 0, 9, 1),
(72, 'sasdf', 'asdf asdf&lt;br /&gt;asdf&amp;nbsp;', 'admin', '2014-03-29 10:14:53', 0, 9, 1),
(73, 'sasdf', 'dfasdf asdf as&lt;strong&gt;asdf asdf asd&lt;br /&gt;ss&lt;/strong&gt;', 'admin', '2014-03-29 10:15:08', 0, 9, 1),
(74, 'ÐÐ°Ñ˜Ð½Ð¾Ð²  Ð²Ð²Ð²Ð²', '&lt;span style=&quot;color: #ff00ff;&quot;&gt;asdf asdf asdf&lt;/span&gt;&lt;br /&gt;&lt;span style=&quot;color: #ff00ff;&quot;&gt;asdf asdf&amp;nbsp;&lt;/span&gt;', 'admin', '2014-03-29 10:15:44', 0, 9, 1),
(75, 'ÐÐ°Ñ˜Ð½Ð¾Ð²  Ð²Ð²Ð²Ð² 2', '&lt;ul&gt;\\r\\n&lt;li&gt;&lt;span style=&quot;color: #ff00ff;&quot;&gt;asdf asdf asdf&lt;/span&gt;&lt;/li&gt;\\r\\n&lt;li&gt;&lt;span style=&quot;color: #ff00ff;&quot;&gt;asdf asdf&amp;nbsp;&lt;br /&gt;&lt;br /&gt;&lt;/span&gt;&lt;/li&gt;\\r\\n&lt;/ul&gt;', 'admin', '2014-03-29 10:16:05', 0, 9, 1),
(76, 'ss', '&lt;p&gt;sss&lt;/p&gt;', 'admin', '2014-03-29 10:20:46', 0, 9, 1),
(77, 'ss', '&lt;p&gt;sss&lt;/p&gt;\r\n&lt;p&gt;ss&lt;/p&gt;', 'admin', '2014-03-29 10:20:52', 0, 9, 1),
(78, 'asdf asdf ', '&lt;p&gt;sad112 12&amp;nbsp&semi;&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;2&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;22&lt;&sol;p&gt;', 'admin', '2014-03-29 10:21:51', 0, 9, 1),
(79, 'asd fasd', '&lt;p&gt;sssasd fasdf asdf&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;asdf asdf asdf asdf asdf&lt;&sol;p&gt;', 'admin', '2014-03-29 11:21:54', 0, 9, 1),
(80, 'sdsd', '&lt;ol style&equals;&quot;list-style-type&colon; lower-alpha&semi;&quot;&gt;\r&NewLine;&lt;li&gt;sdf asdf asdf&lt;&sol;li&gt;\r&NewLine;&lt;li&gt;asdf asdf&amp;nbsp&semi;&lt;&sol;li&gt;\r&NewLine;&lt;li&gt;asdf asdf&lt;&sol;li&gt;\r&NewLine;&lt;&sol;ol&gt;\r&NewLine;&lt;p&gt;s asdf asdf asd &Acy;&Scy;&Dcy;&Fcy;&Acy;&Scy;&Dcy;&fcy; &acy;&scy;&dcy;&lt;&sol;p&gt;', 'admin', '2014-03-29 11:27:08', 0, 9, 1),
(81, 'ÑÐ´Ñ„ÑÐ´Ñ„ÑÐ´Ñ„', '&lt;ul&gt;\r&NewLine;&lt;li&gt;&scy;&scy;&scy;&scy;&lt;&sol;li&gt;\r&NewLine;&lt;li&gt;&scy;&scy;&scy;&lt;&sol;li&gt;\r&NewLine;&lt;&sol;ul&gt;\r&NewLine;&lt;p&gt;&amp;nbsp&semi;&lt;&sol;p&gt;', 'admin', '2014-03-29 11:29:03', 0, 9, 1),
(82, 'Ð³Ð´Ñ„', '&lt;ol&gt;\r&NewLine;&lt;li&gt;&dcy;&fcy;&gcy;&dcy;&scy;&fcy;&lt;&sol;li&gt;\r&NewLine;&lt;li&gt;&dcy;&fcy;&scy;&gcy;&dcy;&scy;&fcy;&lt;&sol;li&gt;\r&NewLine;&lt;&sol;ol&gt;\r&NewLine;&lt;p&gt;&dcy;&dcy;&lt;&sol;p&gt;', 'admin', '2014-03-29 11:29:20', 0, 9, 1),
(83, 'GET', '&lt;p&gt;&scy;&dcy;&fcy; &scy;&dcy;&scy;&dcy;&fcy; &acy;&scy;&dcy;&fcy;&lt;span style&equals;&quot;color&colon; &num;800080&semi;&quot;&gt;&scy;&dcy; &fcy;&acy;&scy;&dcy; &fcy;&lt;&sol;span&gt;&fcy;&scy;&acy;&dcy; &fcy;&acy;&scy;&dcy;&fcy;&amp;nbsp&semi;&lt;&sol;p&gt;\r&NewLine;&lt;ul&gt;\r&NewLine;&lt;li&gt;&scy;&dcy;&fcy; &acy;&scy;&lt;&sol;li&gt;\r&NewLine;&lt;li&gt;&scy;&acy;&dcy; &fcy;&lt;em&gt;&scy;&dcy; &fcy;&acy;&scy;&dcy;&fcy; &acy;&scy;&dcy;&lt;&sol;em&gt;&lt;&sol;li&gt;\r&NewLine;&lt;&sol;ul&gt;\r&NewLine;&lt;p&gt;&lt;em&gt;&scy;&dcy;&fcy; &acy;&scy;&dcy;&fcy;&lt;strong&gt;&acy;&scy;&dcy; &fcy;&acy;&scy;&dcy;&fcy;&amp;nbsp&semi;&lt;&sol;strong&gt;&lt;&sol;em&gt;&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;&amp;nbsp&semi;&lt;&sol;p&gt;', 'admin', '2014-03-29 11:29:51', 0, 9, 1),
(84, 'aaaaa', '&lt;p&gt;assdfasdf&lt;&sol;p&gt;', 'admin', '2014-03-29 13:49:43', 0, 9, 1),
(85, 'aaaaa', '&lt;p&gt;333&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;asdf&lt;&sol;p&gt;', 'admin', '2014-03-29 13:50:27', 0, 9, 1),
(86, 'sadf', '&lt;p&gt;asdf&lt;&sol;p&gt;', 'admin', '2014-03-29 13:51:58', 0, 9, 1),
(87, 'sadf', '&lt;p&gt;asdfd&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;dd&lt;&sol;p&gt;', 'admin', '2014-03-29 13:52:08', 0, 9, 1),
(88, 'Ð“ÑÑ', '&lt;p&gt;&scy;&dcy;&fcy;&acy;&scy;&dcy;&lt;br &sol;&gt;&dcy;&fcy;&acy;&scy;&dcy;&fcy;&acy;&scy;&dcy;&fcy;&lt;&sol;p&gt;', 'admin', '2014-03-29 13:54:35', 0, 9, 1),
(89, 'sdf asdf ', '&lt;p&gt;asdf asdf as&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;dfa asdf asdf&lt;&sol;p&gt;', 'admin', '2014-03-29 14:21:25', 0, 9, 1),
(90, 'asdf asdf ', '&lt;p&gt;asd fasdf asdf&lt;&sol;p&gt;\\r&NewLine;&lt;p&gt;asdf asd&lt;&sol;p&gt;', 'admin', '2014-03-29 14:26:10', 0, 9, 1),
(91, 'ÐŠÐŠÐŠ', '&lt;p&gt;asdfasdf asdf asd&lt;&sol;p&gt;\\r&NewLine;&lt;p&gt;as dfasdf asdf&lt;&sol;p&gt;', 'admin', '2014-03-29 14:27:29', 0, 1, 1),
(92, '@#eeewe ', '&lt;ul&gt;\\r&NewLine;&lt;li&gt;&Acy;&Scy;&Dcy;&acy;&scy;&dcy;&fcy; &acy;&scy;&dcy;&fcy;&lt;&sol;li&gt;\\r&NewLine;&lt;li&gt;&acy;&scy;&dcy;&fcy;&acy;&scy;&dcy;&fcy;&lt;&sol;li&gt;\\r&NewLine;&lt;&sol;ul&gt;\\r&NewLine;&lt;p&gt;&acy;&scy;&dcy;&fcy;&acy;&scy;&dcy;&fcy;&lt;&sol;p&gt;', 'admin', '2014-03-29 14:27:52', 0, 1, 1),
(93, 'YYY', '&lt;p&gt;sdf asdf&lt;&sol;p&gt;\\r&NewLine;&lt;p&gt;asdf asdf&amp;nbsp&semi;&lt;&sol;p&gt;\\r&NewLine;&lt;p&gt;as df&lt;strong&gt;asdf asdf asdf&lt;&sol;strong&gt;&lt;&sol;p&gt;', 'admin', '2014-03-29 14:28:52', 0, 9, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
