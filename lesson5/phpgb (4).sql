-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 05 2022 г., 00:46
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpgb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `id_good` int NOT NULL,
  `count` int NOT NULL DEFAULT '1',
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `idCategory` int NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`idCategory`, `description`) VALUES
(1, 'For women'),
(2, 'For men'),
(3, 'For kids'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `title` varchar(20) NOT NULL DEFAULT 'Заголовоктовара',
  `description` varchar(250) NOT NULL DEFAULT 'Описание товара',
  `count` int NOT NULL DEFAULT '1',
  `price` int NOT NULL,
  `photo` varchar(50) NOT NULL,
  `category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `count`, `price`, `photo`, `category`) VALUES
(1, 'Куртка', 'Очень крутая куртка , синяя, все дела.', 1, 200, 'product-card1.png', 2),
(2, 'Костюм', 'Описание товара', 5, 100, 'product-card2.png', 1),
(3, 'MANGO PEOPLE T-SHIRT', 'Такие вот шорты по худи. Вообще не сочитаются, но зачемто-то их сюда поставили. Пускай остаются...', 1, 300, 'product-card3.png', 2),
(4, 'Брюки', 'Описание товара', 2, 150, 'product-card4.png', 2),
(5, 'Педжак', 'Описание товара', 2, 150, 'product-card5.png', 1),
(6, 'Рубашка', 'Описание товара', 3, 40, 'product-card6.png', 1),
(7, 'Футболка', 'Описание товара', 2, 150, 'product-card7.png', 2),
(8, 'Бейсболка', 'Описание товара', 10, 100, 'product-card8.png', 2),
(9, 'Рубашка', 'Описание товара', 7, 354, 'product-card9.png', 2),
(10, 'Куртка ', 'Кожанная куртка \"Косуха\"', 4, 600, 'product-card10.png', 2),
(11, 'Рубашка', 'Описание товара', 2, 150, 'product-card11.png', 2),
(12, 'Рубашка', 'Описание товара', 3, 353, 'product-card12.png', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `lastpages`
--

CREATE TABLE `lastpages` (
  `id` int NOT NULL,
  `idUser` int NOT NULL,
  `lastPages` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lastpages`
--

INSERT INTO `lastpages` (`id`, `idUser`, `lastPages`, `date`) VALUES
(85, 25, '/user/cabinet', '2022-01-05 00:34:56'),
(86, 25, '/', '2022-01-05 00:35:32'),
(87, 25, '/user/cabinet', '2022-01-05 00:35:37'),
(88, 25, '/user/cabinet', '2022-01-05 00:36:31'),
(89, 25, '/user/cabinet', '2022-01-05 00:45:50');

-- --------------------------------------------------------

--
-- Структура таблицы `orderlist`
--

CREATE TABLE `orderlist` (
  `idOrder` int NOT NULL,
  `userid` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) NOT NULL DEFAULT 'in progress',
  `comment` varchar(300) DEFAULT NULL,
  `cartIdNum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderlist`
--

INSERT INTO `orderlist` (`idOrder`, `userid`, `date`, `status`, `comment`, `cartIdNum`) VALUES
(1, 24, '2021-12-09 12:00:41', 'in progress', 'in stock', 92),
(2, 24, '2021-12-09 12:49:55', 'Stopped', 'ddd', 92),
(4, 24, '2021-12-09 13:38:57', 'in progress', NULL, 92),
(5, 24, '2021-12-09 13:38:57', 'in progress', NULL, 93),
(6, 24, '2021-12-09 13:39:44', 'in progress', NULL, 94),
(7, 27, '2021-12-09 22:18:40', 'in progress', NULL, 97),
(8, 27, '2021-12-09 22:18:40', 'Canceled', 'no in stock', 98),
(9, 27, '2021-12-09 22:18:40', 'in progress', NULL, 99),
(10, 25, '2021-12-09 22:22:48', 'in progress', NULL, 100),
(11, 25, '2021-12-09 22:22:48', 'in progress', NULL, 101),
(12, 25, '2021-12-09 22:22:48', 'in progress', NULL, 102);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id_review` int NOT NULL,
  `good_id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` varchar(300) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id_review`, `good_id`, `user_id`, `text`, `data`) VALUES
(1, 1, 24, 'Отличный товар', '2021-11-30 21:57:44'),
(2, 2, 24, 'adasdadad', '2021-11-30 22:43:01'),
(3, 3, 24, 'Клавиша запала', '2021-11-30 22:43:15'),
(4, 2, 25, 'Знакомая гоаворила. что не плохой костюм!)))', '2021-11-30 22:43:46'),
(5, 1, 25, 'Да, купил такие же шорты, только красные и до пяток. Смотрятся , как красные штаны. Хожу на работу в таких', '2021-11-30 22:49:48'),
(6, 4, 24, 'Те самые желтые брюки Кин дза дза', '2021-12-04 22:49:11'),
(7, 1, 24, 'Отлично смотрится с колготками', '2021-12-04 22:49:11'),
(8, 9, 25, 'Да, купил такие же шорты, только красные и до пяток. Смотрятся , как красные штаны. Хожу на работу в таких', '2021-12-04 22:49:11');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `lastname` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`idUser`, `login`, `pass`, `lastname`, `firstname`, `sex`, `role`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '', 'admin'),
(24, 'diakudza@gmail.com', '202cb962ac59075b964b07152d234b70', 'Mikhail', 'Dyakov', 'famale', 'user'),
(25, 'test@test.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Testov', 'Test', 'male', 'user'),
(27, 'rumba@ru.ru', '077f6918b5d2260b0bff5868ead26fb6', '', '', 'male', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lastpages`
--
ALTER TABLE `lastpages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `orderlist_user_idUser_fk` (`userid`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD UNIQUE KEY `review_id_review_uindex` (`id_review`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `user_login_uindex` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `lastpages`
--
ALTER TABLE `lastpages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT для таблицы `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `idOrder` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orderlist`
--
ALTER TABLE `orderlist`
  ADD CONSTRAINT `orderlist_user_idUser_fk` FOREIGN KEY (`userid`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
