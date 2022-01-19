-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 19 2022 г., 13:48
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
(245, 24, '/user/cabinet', '2022-01-19 13:43:48'),
(246, 24, '/cart', '2022-01-19 13:43:57'),
(247, 24, '/cart', '2022-01-19 13:44:05'),
(248, 24, '/user/cabinet', '2022-01-19 13:44:06');

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
  `cartIdNum` int NOT NULL,
  `adress` varchar(300) DEFAULT NULL,
  `sum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderlist`
--

INSERT INTO `orderlist` (`idOrder`, `userid`, `date`, `status`, `comment`, `cartIdNum`, `adress`, `sum`) VALUES
(13, 24, '2022-01-16 21:38:00', 'Canceled', 'aaaaaaaa', 129, NULL, 0),
(14, 24, '2022-01-16 21:38:35', 'Stopped', 'денег нет', 129, NULL, 0),
(18, 24, '2022-01-18 12:47:52', 'Stopped', 'no in stock', 135, NULL, 0),
(19, 24, '2022-01-18 12:56:49', 'in progress', NULL, 136, 'asdsadasd', 0),
(20, 24, '2022-01-18 13:09:10', 'in progress', NULL, 137, '1121221213123123123', 0),
(21, 24, '2022-01-18 13:45:51', 'in progress', NULL, 138, 'kitai', 200),
(22, 25, '2022-01-19 11:54:16', 'in progress', NULL, 139, 'Ростов-на-Дону, каяни 3', 400);

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
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
(27, 'rumba@ru.ru', '077f6918b5d2260b0bff5868ead26fb6', '', '', 'male', 'user'),
(28, 'test1@test.com', '202cb962ac59075b964b07152d234b70', 'Михаил', 'Дьяков', 'male', 'user'),
(29, 'kee@ede.eu', '81dc9bdb52d04dc20036dbd8313ed055', '222', 'ddd', 'male', 'user'),
(30, 'diakudzdda@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', 'Михаил', 'Дьяков', 'famale', 'user'),
(31, 'diakudza@gmail.com22', '4eae35f1b35977a00ebd8086c259d4c9', 'Михаил', 'Дьяков', 'male', 'user'),
(32, 'dsadsdza@gmail.com', '890658a1fe74a40385694b7e2a3b3daf', 'Mikhail', 'Dyakov', 'male', 'user');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT для таблицы `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `idOrder` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
