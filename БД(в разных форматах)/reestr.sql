-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 08 2020 г., 23:31
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `reestr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contr`
--

CREATE TABLE `contr` (
  `id_contr` int(11) NOT NULL,
  `Name_contr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contr`
--

INSERT INTO `contr` (`id_contr`, `Name_contr`) VALUES
(5, 'Леснадзор'),
(7, 'Пожарный надзор'),
(2, 'Росгидромет'),
(1, 'Роспотребнадзор'),
(3, 'Росприроднадзор'),
(4, 'Рыбнадзор');

-- --------------------------------------------------------

--
-- Структура таблицы `period`
--

CREATE TABLE `period` (
  `id_prov` int(11) NOT NULL,
  `id_smp1` int(11) NOT NULL,
  `id_contr1` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `period_prov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `period`
--

INSERT INTO `period` (`id_prov`, `id_smp1`, `id_contr1`, `date_start`, `date_end`, `period_prov`) VALUES
(8, 7, 2, '2003-12-20', '2003-12-20', 4),
(12, 1, 2, '2019-09-12', '2019-09-12', 3),
(14, 7, 1, '1970-01-01', '1970-01-01', 3),
(19, 7, 1, '1970-01-01', '1970-01-01', 3),
(21, 19, 1, '2020-01-09', '2020-01-12', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `smp`
--

CREATE TABLE `smp` (
  `id_SMP` int(11) NOT NULL,
  `Name_SMP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `smp`
--

INSERT INTO `smp` (`id_SMP`, `Name_SMP`) VALUES
(30, 'AlpenGold'),
(19, 'Алиэкспресс'),
(22, 'ЗАО Тинькофф'),
(12, 'ИП Иванов'),
(14, 'ИП Измайлов'),
(28, 'ИП Муравей'),
(21, 'ИП Садовник'),
(13, 'ИП Сычёв'),
(20, 'Корсар'),
(24, 'Лайк'),
(17, 'Лунтик'),
(23, 'Милитари'),
(27, 'МФЦ'),
(26, 'НПИ'),
(6, 'ОАО \"Газпром\"'),
(2, 'ОАО \"ДомСтрой\"'),
(3, 'ОАО \"Колосок\"'),
(10, 'ОАО Вымпелком'),
(9, 'ОАО Ростелеком'),
(18, 'ОАО Сбербанк'),
(5, 'ОАО ЧАЙКА'),
(8, 'ООО \"Solar\"'),
(1, 'ООО \"Ёжики\"'),
(15, 'ООО Кабинеты'),
(11, 'ООО Росгосстрах'),
(7, 'ООО Роснефть'),
(4, 'ООО\"Ветерок\"'),
(29, 'Рошен');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contr`
--
ALTER TABLE `contr`
  ADD PRIMARY KEY (`id_contr`),
  ADD UNIQUE KEY `Name_contr` (`Name_contr`);

--
-- Индексы таблицы `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id_prov`);

--
-- Индексы таблицы `smp`
--
ALTER TABLE `smp`
  ADD PRIMARY KEY (`id_SMP`),
  ADD UNIQUE KEY `Name_SMP` (`Name_SMP`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contr`
--
ALTER TABLE `contr`
  MODIFY `id_contr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `period`
--
ALTER TABLE `period`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `smp`
--
ALTER TABLE `smp`
  MODIFY `id_SMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
