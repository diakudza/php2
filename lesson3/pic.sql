-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 24 2021 г., 18:59
-- Версия сервера: 5.6.37
-- Версия PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pic`
--

CREATE TABLE `pic` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `size` int(10) NOT NULL,
  `serverpath` varchar(200) NOT NULL,
  `counts` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pic`
--

INSERT INTO `pic` (`id`, `name`, `size`, `serverpath`, `counts`) VALUES
(16, '1560838551_1.jpg', 134916, 'D:MihaOSPaneluserdata	empphpA149.tmp', 0),
(17, '1560838578_8.jpg', 121646, 'D:MihaOSPaneluserdata	empphp312A.tmp', 2),
(18, '1560838591_2.jpg', 110409, 'D:MihaOSPaneluserdata	empphp440F.tmp', 0),
(19, '1560838603_7.jpg', 58540, 'D:MihaOSPaneluserdata	empphp7C3F.tmp', 7),
(20, '1560838613_5.jpg', 84693, 'D:MihaOSPaneluserdata	empphp9175.tmp', 0),
(21, '1560838613_5.jpg', 84693, 'D:MihaOSPaneluserdata	empphpA5EF.tmp', 0),
(22, '1560838615_3.jpg', 96611, 'D:MihaOSPaneluserdata	empphpC3CC.tmp', 0),
(23, '1560838633_9.jpg', 83029, 'D:MihaOSPaneluserdata	empphpDF1A.tmp', 0),
(24, '1560838636_4.jpg', 48248, 'D:MihaOSPaneluserdata	empphpF26D.tmp', 0),
(25, '1560838636_4.jpg', 48248, 'D:MihaOSPaneluserdata	empphp652D.tmp', 0),
(26, '1560838636_4.jpg', 48248, 'D:MihaOSPaneluserdata	empphpE3DE.tmp', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pic`
--
ALTER TABLE `pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
