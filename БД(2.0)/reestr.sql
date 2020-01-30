-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2020 г., 22:16
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
(11, 'Министерство финансов'),
(10, 'Налоговая'),
(12, 'Пельменьнадзор'),
(7, 'Пожарный надзор'),
(2, 'Росгидромет'),
(8, 'Роспотехнадзор'),
(1, 'Роспотребнадзор'),
(3, 'Росприроднадзор'),
(9, 'Ростехпотехнадзор'),
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
(23, 6, 8, '2020-01-06', '2020-01-31', 6),
(27, 10, 3, '2020-01-11', '2020-01-14', 3),
(26, 12, 2, '2020-01-10', '2020-01-15', 8),
(22, 12, 2, '2020-01-16', '2020-01-09', 7),
(21, 19, 1, '2020-09-01', '2020-01-12', 5),
(42, 20, 5, '2020-01-18', '2020-01-19', 6),
(29, 29, 2, '2020-01-10', '2020-01-09', 4),
(25, 30, 2, '2020-01-06', '2020-01-08', 9),
(40, 30, 5, '2020-01-04', '2020-01-04', 2),
(28, 30, 7, '1970-01-01', '2020-01-26', 8),
(41, 30, 12, '2020-01-01', '2020-01-02', 2),
(30, 31, 7, '2020-01-18', '2020-01-14', 2),
(33, 32, 5, '2020-01-08', '2020-01-15', 4),
(34, 32, 5, '2020-01-08', '2020-01-15', 5),
(31, 32, 8, '2020-01-08', '2020-01-15', 4),
(32, 32, 8, '2020-01-08', '2020-01-15', 4),
(36, 35, 10, '2020-01-18', '2020-01-10', 8),
(39, 44, 10, '2020-01-02', '2020-01-08', 2),
(43, 46, 12, '2020-01-01', '2020-01-04', 6);

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
(44, 'Bloody'),
(32, 'Radio Record'),
(35, 'Radio Record1'),
(34, 'Retro FM'),
(42, 'StealSeries'),
(43, 'StealSeries1'),
(19, 'Алиэкспресс'),
(36, 'Вкуснолюбов'),
(37, 'Вкуснолюбов1'),
(31, 'ЗАО Лунатики'),
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
(46, 'ОДО Пельмени'),
(8, 'ООО \"Solar\"'),
(1, 'ООО \"Ёжики\"'),
(41, 'ООО ZTE'),
(15, 'ООО Кабинеты'),
(11, 'ООО Росгосстрах'),
(7, 'ООО Роснефть'),
(45, 'ООО ФТС'),
(4, 'ООО\"Ветерок\"'),
(33, 'Простоквашино'),
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
  ADD PRIMARY KEY (`id_prov`),
  ADD KEY `FK_Contr` (`id_contr1`) USING BTREE,
  ADD KEY `FK_SMP` (`id_smp1`) USING BTREE,
  ADD KEY `FindPeriod` (`id_smp1`,`id_contr1`,`date_start`,`date_end`,`period_prov`);

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
  MODIFY `id_contr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `period`
--
ALTER TABLE `period`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `smp`
--
ALTER TABLE `smp`
  MODIFY `id_SMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `period`
--
ALTER TABLE `period`
  ADD CONSTRAINT `ID_Contr` FOREIGN KEY (`id_contr1`) REFERENCES `contr` (`id_contr`),
  ADD CONSTRAINT `period` FOREIGN KEY (`id_smp1`) REFERENCES `smp` (`id_SMP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
