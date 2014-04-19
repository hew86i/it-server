-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2014 at 03:40 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 19, 2014 at 10:20 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_temp` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `remember_token` text,
  `active` int(11) NOT NULL,
  `user_group` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `full_name`, `password`, `password_temp`, `code`, `remember_token`, `active`, `user_group`, `created_at`, `updated_at`) VALUES
(3, 'hew@sportlife.com.mk', 'hew1212', 'hew full', '$2y$10$I4GL4YxEPAixFjO8TV/yOue8V6FzUgFazswXuMN2FZj/We99EorsO', '', 'pPtesH7aLEu2hXessCLePVSVl7Bvyv2PpsMzxLgLFmyBqLs8Zw9SpBKfPNCe', NULL, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'h14030@gmail.com', 'admin', 'Администратор', '$2y$10$WJHL/WKBD8mIkrmgsZLwVOgVqZ/aKvcLLuBVcDhwHmkqzUS309aeW', '', '', 'ebgVI4lc58VDIyYDwG4JmkHWK24hnuQhxw5ThvP0GxlAkEnuhl4DVuOb8zKA', 1, 5, '2014-04-07 11:58:25', '2014-04-19 10:41:57'),
(15, 'josip@sportlife.mk', 'josip', 'Јосип Режак', '$2y$10$wPEqWc9seZ1sm1oD9EDnWubQWpIvDq3PUJrxFRgis1LMpXd8Ef4xu', '', '', 'pAtw2AaYHlerf1uJ1VzKGWXFJ6Q4QdTxirloXHJrRjWGvnv9cMHQ0OUiM8DD', 1, 1, '2014-04-08 10:58:00', '2014-04-19 10:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--
-- Creation: Apr 19, 2014 at 12:41 PM
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE IF NOT EXISTS `views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `user` varchar(20) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `rank` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1' COMMENT '1=aktiven, 0=zavrsen 9=izbrisan i ne se prikazuva',
  `new` int(11) DEFAULT '1' COMMENT '1 = novo, 0 = ne se prikazuva',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `name`, `description`, `user`, `users_id`, `created_at`, `updated_at`, `rank`, `status`, `new`) VALUES
(4, 'Тест Налог', 'Кирилица налог- нов ред администратор', 'admin', 0, '2013-04-16 11:46:05', '0000-00-00 00:00:00', 1, 1, 1),
(5, 'Приоритет ', 'налог со приоритет\r\n-сдфаасдч\r\n-асдфадсфадф', 'admin', 0, '2014-04-16 11:42:05', '0000-00-00 00:00:00', 1, 1, 1),
(6, 'Lorem', 'Mauris varius lectus non sem vestibulum dignissim. Nulla sed augue tempor, lobortis enim eu, auctor ligula. Nullam at auctor ante.', 'goran12', 0, '2014-04-14 12:46:05', '0000-00-00 00:00:00', 1, 1, 1),
(10, 'без наслов', 'лорен ипсум адум нес. Ата ине коре бес дис ла ла да да - налог за сеее сесе сссс . и така натаму', 'admin', 0, '2014-04-12 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(21, 'So, any ideas? Thanks', 'EDIT: Thanks for your answers everybody! I took many of your opinions into account (so I won''t be commenting on each answer separately) and finally got it working like this:', 'admin', 0, '2014-03-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(23, 'Извадок од лорем ипсум', 'Aenean gravida augue tellus, vitae accumsan leo luctus at. Pellentesque luctus fermentum velit, id lobortis odio blandit at. Cras vel sem turpis. Aenean commodo ante non euismod consequat. Proin varius augue ut libero tristique adipiscing. Maecenas interdum purus eget elementum semper. Integer vel porttitor est. Integer at odio nibh. Integer lacinia dolor augue, ut aliquam purus suscipit ut. Curabitur tincidunt quis nisl eu ullamcorper. Curabitur eget diam est. Fusce scelerisque laoreet malesuada. Donec massa diam, sagittis ac nibh commodo, posuere venenatis arcu. Ut ultrices, urna at bibendum laoreet, eros neque feugiat tortor, a volutpat elit est.', 'admin', 0, '2014-03-12 12:46:05', '2014-04-18 15:49:16', 0, 1, 1),
(31, 'Нема да го чита друг корисник', 'забрането за друг корисник', 'admin', 0, '2014-04-16 12:46:05', '2014-04-19 10:22:42', 0, 1, 1),
(37, 'Благоја Тричковски', '\r\nКако што велат старите: Нема невозможни работи, најважно е да се има желба. Оваа фраза како да е напишана за 23 годишниот Натран Хјуит. Тој успеа целосно да го смени своето тело благодарение на здравата исхрана и редовните вежби. Во моментот кога Натран цврсто решил да ослабне, тој тежел 146 килограми, после што ослабел неверојатни 76 килограми. Откако ослабе, Натран мораше да направи и пластична операција за да се отстрани вишокот кожа кој остана да виси после наглото слабеење.', 'admin', 0, '2013-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(41, 'Нов налог', 'со - Remove Копче', 'admin', 0, '2014-01-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(45, 'Најнов', 'со кирилица', 'admin', 0, '2014-04-16 09:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(47, 'asdfasdf', 'asdfasdf', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(73, 'sasdf', 'dfasdf asdf as&lt;strong&gt;asdf asdf asd&lt;br /&gt;ss&lt;/strong&gt;', 'admin', 0, '2014-04-16 12:46:05', '2014-04-18 15:44:38', 0, 9, 0),
(74, 'ÐÐ°Ñ˜Ð½Ð¾Ð²  Ð²Ð²Ð²Ð²', '&lt;span style=&quot;color: #ff00ff;&quot;&gt;asdf asdf asdf&lt;/span&gt;&lt;br /&gt;&lt;span style=&quot;color: #ff00ff;&quot;&gt;asdf asdf&amp;nbsp;&lt;/span&gt;', 'admin', 0, '2014-04-16 12:46:05', '2014-04-18 15:10:33', 0, 9, 0),
(75, 'ÐÐ°Ñ˜Ð½Ð¾Ð²  Ð²Ð²Ð²Ð² 2', '&lt;ul&gt;\\r\\n&lt;li&gt;&lt;span style=&quot;color: #ff00ff;&quot;&gt;asdf asdf asdf&lt;/span&gt;&lt;/li&gt;\\r\\n&lt;li&gt;&lt;span style=&quot;color: #ff00ff;&quot;&gt;asdf asdf&amp;nbsp;&lt;br /&gt;&lt;br /&gt;&lt;/span&gt;&lt;/li&gt;\\r\\n&lt;/ul&gt;', 'admin', 0, '2014-04-16 12:46:05', '2014-04-18 15:10:29', 0, 9, 0),
(76, 'ss', '&lt;p&gt;sss&lt;/p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(77, 'sadfasdf', '&lt;p&gt;sss&lt;/p&gt;\r\n&lt;p&gt;ss&lt;/p&gt;', 'admin', 0, '2014-04-16 12:46:05', '2014-04-18 16:00:19', 0, 1, 1),
(78, 'asdf asdf ', '&lt;p&gt;sad112 12&amp;nbsp&semi;&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;2&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;22&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(79, 'asd fasd', '&lt;p&gt;sssasd fasdf asdf&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;asdf asdf asdf asdf asdf&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(80, 'СДД', 'Во најмала рака - добро\r\nasdfs', 'admin', 0, '2014-04-16 12:46:05', '2014-04-19 09:14:32', 0, 1, 1),
(81, 'Да те тргнеме тебе а ?', 'нешто од тука ќе биде изменето.\r\nитн.\r\n-----------------------------', 'admin', 0, '2014-04-16 12:46:05', '2014-04-19 10:18:36', 0, 1, 1),
(82, 'Ð³Ð´Ñ„', '&lt;ol&gt;\r&NewLine;&lt;li&gt;&dcy;&fcy;&gcy;&dcy;&scy;&fcy;&lt;&sol;li&gt;\r&NewLine;&lt;li&gt;&dcy;&fcy;&scy;&gcy;&dcy;&scy;&fcy;&lt;&sol;li&gt;\r&NewLine;&lt;&sol;ol&gt;\r&NewLine;&lt;p&gt;&dcy;&dcy;&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(83, 'GET', '&lt;p&gt;&scy;&dcy;&fcy; &scy;&dcy;&scy;&dcy;&fcy; &acy;&scy;&dcy;&fcy;&lt;span style&equals;&quot;color&colon; &num;800080&semi;&quot;&gt;&scy;&dcy; &fcy;&acy;&scy;&dcy; &fcy;&lt;&sol;span&gt;&fcy;&scy;&acy;&dcy; &fcy;&acy;&scy;&dcy;&fcy;&amp;nbsp&semi;&lt;&sol;p&gt;\r&NewLine;&lt;ul&gt;\r&NewLine;&lt;li&gt;&scy;&dcy;&fcy; &acy;&scy;&lt;&sol;li&gt;\r&NewLine;&lt;li&gt;&scy;&acy;&dcy; &fcy;&lt;em&gt;&scy;&dcy; &fcy;&acy;&scy;&dcy;&fcy; &acy;&scy;&dcy;&lt;&sol;em&gt;&lt;&sol;li&gt;\r&NewLine;&lt;&sol;ul&gt;\r&NewLine;&lt;p&gt;&lt;em&gt;&scy;&dcy;&fcy; &acy;&scy;&dcy;&fcy;&lt;strong&gt;&acy;&scy;&dcy; &fcy;&acy;&scy;&dcy;&fcy;&amp;nbsp&semi;&lt;&sol;strong&gt;&lt;&sol;em&gt;&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;&amp;nbsp&semi;&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(84, 'aaaaa', '&lt;p&gt;assdfasdf&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(85, 'aaaaa', '&lt;p&gt;333&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;asdf&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(86, 'sadf', '&lt;p&gt;asdf&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(87, 'sadf', '&lt;p&gt;asdfd&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;dd&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(88, 'Ð“ÑÑ', '&lt;p&gt;&scy;&dcy;&fcy;&acy;&scy;&dcy;&lt;br &sol;&gt;&dcy;&fcy;&acy;&scy;&dcy;&fcy;&acy;&scy;&dcy;&fcy;&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(89, 'sdf asdf ', '&lt;p&gt;asdf asdf as&lt;&sol;p&gt;\r&NewLine;&lt;p&gt;dfa asdf asdf&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(90, 'asdf asdf ', '&lt;p&gt;asd fasdf asdf&lt;&sol;p&gt;\\r&NewLine;&lt;p&gt;asdf asd&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(91, 'ÐŠÐŠÐŠ', '&lt;p&gt;asdfasdf asdf asd&lt;&sol;p&gt;\\r&NewLine;&lt;p&gt;as dfasdf asdf&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(92, '@#eeewe ', 'рффф', 'admin', 0, '2014-04-16 12:46:05', '2014-04-19 08:12:44', 0, 1, 1),
(93, 'YYY', '&lt;p&gt;sdf asdf&lt;&sol;p&gt;\\r&NewLine;&lt;p&gt;asdf asdf&amp;nbsp&semi;&lt;&sol;p&gt;\\r&NewLine;&lt;p&gt;as df&lt;strong&gt;asdf asdf asdf&lt;&sol;strong&gt;&lt;&sol;p&gt;', 'admin', 0, '2014-04-16 12:46:05', '0000-00-00 00:00:00', 0, 1, 1),
(94, 'ADF', 'SDF', 'admin', 0, '2014-04-18 11:30:05', '2014-04-18 15:10:27', 0, 9, 0),
(96, 'Галилео Галилеј', 'Нов галилејо галилеј\r\n-----------------------------------\r\nЛиста\r\n * ново село\r\n * маџари 1\r\n * тетово 2\r\n_______________________\r\nдругите да се допишат', 'admin', 0, '2014-04-18 11:34:20', '2014-04-19 10:09:15', 0, 1, 1),
(97, 'asdfas', 'asdf\r\n----------\r\nасдфасдф', 'admin', 0, '2014-04-18 12:01:47', '2014-04-19 07:54:09', 0, 1, 1),
(98, 'asdf asd f', 'Zdravo viktor', 'admin', 0, '2014-04-18 14:57:45', '2014-04-18 15:10:40', 0, 9, 0),
(99, 'галилео галилеј', 'лорем асдфа сдфас дфф23 4љњефасдф ас\r\nасдф асдф асдф с', 'admin', 0, '2014-04-18 14:57:53', '2014-04-18 15:08:47', 0, 9, 1),
(100, 'asdfas', 'asdf', 'admin', 0, '2014-04-18 15:26:13', '2014-04-18 15:27:04', 0, 9, 0),
(101, 'asdfas', 'asdf', 'admin', 0, '2014-04-18 15:27:00', '2014-04-18 15:27:03', 0, 9, 0),
(102, 'asdfas', 'asdf', 'admin', 0, '2014-04-18 15:29:34', '2014-04-18 15:44:33', 0, 9, 0),
(103, 'asdfas', 'asdf', 'admin', 0, '2014-04-18 15:30:14', '2014-04-18 15:44:32', 0, 9, 0),
(104, 'asdfas', 'asdf', 'admin', 0, '2014-04-18 15:30:37', '2014-04-18 15:44:30', 0, 9, 0),
(105, 'asdfas', 'asdf', 'admin', 0, '2014-04-18 15:33:13', '2014-04-18 15:44:28', 0, 9, 0),
(106, 'Автобуска', 'асднфасдфасдфasdfasdf\r\nнов ред\r\n\r\nасдфасдфасдфасдф бла бла бла 123123\r\n--------------------------------------------------------\r\n12312312асдфас дфас\r\nасдф асдфasdfasd\r\nasdfasdf', 'admin', 0, '2014-04-18 15:34:17', '2014-04-19 09:15:26', 0, 1, 1),
(107, 'sadfas', 'asdfasdf------------\r\n------------------\r\n1.asdfas\r\n2.werwer', 'admin', 0, '2014-04-19 09:16:22', '2014-04-19 09:16:34', 0, 1, 1),
(108, 'Санитиран налог', '------------------------------\r\nпроба со хтмл елементи\r\n\r\n1.sdafasdf\r\n2.asdfasdfas\r\n', 'admin', 0, '2014-04-19 09:18:13', '2014-04-19 09:30:53', 0, 1, 1),
(109, 'Налог од јосип', 'Тест за јосип налог\r\n @admin ', '', 0, '2014-04-19 10:23:49', '2014-04-19 10:41:53', 0, 9, 0),
(110, 'nalog ', 'josip nalog\r\n------------------\r\nedited by administrator in practice', 'josip', 0, '2014-04-19 10:35:21', '2014-04-19 11:06:32', 0, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
