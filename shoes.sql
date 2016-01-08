--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 6.3.358.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 17.10.2015 6:19:06
-- Версия сервера: 5.6.25-log
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE shoesOld;

--
-- Описание для таблицы buyer
--
DROP TABLE IF EXISTS buyer;
CREATE TABLE buyer (
  id_buyer INT(11) NOT NULL AUTO_INCREMENT,
  surname CHAR(50) DEFAULT NULL,
  name CHAR(50) DEFAULT NULL,
  middlename CHAR(50) DEFAULT NULL,
  address CHAR(50) DEFAULT NULL,
  status INT(11) DEFAULT NULL,
  number CHAR(20) DEFAULT NULL,
  login CHAR(20) DEFAULT NULL,
  password CHAR(20) DEFAULT NULL,
  hours CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_buyer)
)
ENGINE = INNODB
AUTO_INCREMENT = 118
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы buyerin
--
DROP TABLE IF EXISTS buyerin;
CREATE TABLE buyerin (
  id_buyerin INT(11) NOT NULL AUTO_INCREMENT,
  login CHAR(20) DEFAULT NULL,
  password CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_buyerin)
)
ENGINE = INNODB
AUTO_INCREMENT = 22
AVG_ROW_LENGTH = 780
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы hours_import
--
DROP TABLE IF EXISTS hours_import;
CREATE TABLE hours_import (
  id_hours INT(11) NOT NULL,
  id_buyer INT(11) DEFAULT NULL,
  hours CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_hours)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы kindparent
--
DROP TABLE IF EXISTS kindparent;
CREATE TABLE kindparent (
  id_parent INT(11) NOT NULL AUTO_INCREMENT,
  kindparent CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_parent)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы list_pattern
--
DROP TABLE IF EXISTS list_pattern;
CREATE TABLE list_pattern (
  id_pattern INT(11) NOT NULL AUTO_INCREMENT,
  name_pattern CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_pattern)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы producer
--
DROP TABLE IF EXISTS producer;
CREATE TABLE producer (
  id_producer INT(11) NOT NULL AUTO_INCREMENT,
  producer CHAR(20) DEFAULT NULL,
  country CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_producer)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 4096
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы inkind
--
DROP TABLE IF EXISTS inkind;
CREATE TABLE inkind (
  id_inkind INT(11) NOT NULL AUTO_INCREMENT,
  id_parent INT(11) DEFAULT NULL,
  inkind CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_inkind),
  CONSTRAINT FK_inkind_kind_parent_id_parent FOREIGN KEY (id_parent)
    REFERENCES kindparent(id_parent) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 16
AVG_ROW_LENGTH = 1170
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы pattern_inkind
--
DROP TABLE IF EXISTS pattern_inkind;
CREATE TABLE pattern_inkind (
  id_pattern_inkind INT(11) NOT NULL AUTO_INCREMENT,
  id_inkind INT(11) DEFAULT NULL,
  id_pattern INT(11) DEFAULT NULL,
  PRIMARY KEY (id_pattern_inkind),
  CONSTRAINT FK_pattern_inkind_inkind_id_inkind FOREIGN KEY (id_inkind)
    REFERENCES inkind(id_inkind) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_pattern_inkind_list_pattern_id_pattern FOREIGN KEY (id_pattern)
    REFERENCES list_pattern(id_pattern) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы product
--
DROP TABLE IF EXISTS product;
CREATE TABLE product (
  id_product INT(11) NOT NULL AUTO_INCREMENT,
  name_product CHAR(20) DEFAULT NULL,
  id_inkind INT(11) DEFAULT NULL,
  cost INT(11) DEFAULT NULL,
  sum INT(11) DEFAULT NULL,
  id_producer INT(11) DEFAULT NULL,
  img TEXT DEFAULT NULL,
  PRIMARY KEY (id_product),
  CONSTRAINT FK_product FOREIGN KEY (id_inkind)
    REFERENCES inkind(id_inkind) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_product_producer_id_producer FOREIGN KEY (id_producer)
    REFERENCES producer(id_producer) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 49
AVG_ROW_LENGTH = 341
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы import
--
DROP TABLE IF EXISTS import;
CREATE TABLE import (
  id_import INT(20) NOT NULL AUTO_INCREMENT,
  id_product INT(20) DEFAULT NULL,
  id_buyer INT(20) DEFAULT NULL,
  PRIMARY KEY (id_import),
  CONSTRAINT FK_import_buyer_id_buyer FOREIGN KEY (id_buyer)
    REFERENCES buyer(id_buyer) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_import_product_id_product FOREIGN KEY (id_product)
    REFERENCES product(id_product) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 86
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Описание для таблицы pattern_product
--
DROP TABLE IF EXISTS pattern_product;
CREATE TABLE pattern_product (
  id_pattern_product INT(11) NOT NULL AUTO_INCREMENT,
  id_product INT(11) DEFAULT NULL,
  id_pattern_inkind INT(11) DEFAULT NULL,
  value CHAR(20) DEFAULT NULL,
  PRIMARY KEY (id_pattern_product),
  CONSTRAINT FK_pattern_product_pattern_inkind_id_pattern_inkind FOREIGN KEY (id_pattern_inkind)
    REFERENCES pattern_inkind(id_pattern_inkind) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_pattern_product_product_id_product FOREIGN KEY (id_product)
    REFERENCES product(id_product) ON DELETE NO ACTION ON UPDATE NO ACTION
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы buyer
--
INSERT INTO buyer VALUES
(85, 'Стануль', 'Елена', 'Дмитриевна', 'Александрова 19,98', NULL, '8029666300000', 'aa', 'aa', '1500'),
(86, 'Стануль', 'Елена', 'Дмитриевна', 'Александрова 19,98', NULL, '123', 'aa', 'aa', NULL),
(87, 'Стануль', 'Елена', 'Дмитриевна', 'Александрова,19-98', NULL, '80297773524', 'aa', 'aa', NULL),
(88, 'Петров', 'Михаил', 'Эдуардович', 'Александрова 19,98', NULL, '80293562414', 'aa', 'aa', NULL),
(89, 'Петров', 'Михаил', 'Эдуардович', 'Александрова 19,98', NULL, '80293562414', 'aa', 'aa', NULL),
(90, 'Шамров', 'Петр', 'Семенович', 'Семашко', NULL, '8033698700', 'zz', 'zz', '1200'),
(91, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL),
(92, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL),
(93, NULL, NULL, NULL, 'Семашко', NULL, NULL, NULL, NULL, '12'),
(94, NULL, NULL, NULL, 'УРУЧЬЕ', NULL, NULL, NULL, NULL, '1500'),
(95, NULL, NULL, NULL, 'Любимова', NULL, NULL, NULL, NULL, '1200'),
(96, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL),
(97, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL),
(98, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL),
(99, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL),
(100, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL),
(101, NULL, NULL, NULL, NULL, NULL, NULL, 'zz', 'zz', NULL),
(102, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(103, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(104, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(105, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(106, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(107, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(108, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(109, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(110, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(111, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(112, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(113, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(114, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(115, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(116, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL),
(117, NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'aa', NULL);

-- 
-- Вывод данных для таблицы buyerin
--
INSERT INTO buyerin VALUES
(1, 'aa', 'aa'),
(2, 'aa', 'aa'),
(3, 'aa', 'aa'),
(4, 'aa', 'aa'),
(5, 'aa', 'aa'),
(6, 'aa', 'aa'),
(7, 'aa', 'aa'),
(8, 'aa', 'aa'),
(9, 'aa', 'aa'),
(10, 'aa', 'aa'),
(11, 'aa', 'aa'),
(12, 'aa', 'aa'),
(13, 'aa', 'aa'),
(14, 'aa', 'aa'),
(15, 'aaa', 'ssss'),
(16, 'aa', 'aa'),
(17, 'aa', 'aa'),
(18, 'zz', 'zz'),
(19, 'zz', 'zz'),
(20, 'zz', 'zz'),
(21, 'zz', 'zz');

-- 
-- Вывод данных для таблицы hours_import
--

-- Таблица shoes.hours_import не содержит данных

-- 
-- Вывод данных для таблицы kindparent
--
INSERT INTO kindparent VALUES
(1, 'Женская'),
(2, 'Мужская'),
(3, 'Детская');

-- 
-- Вывод данных для таблицы list_pattern
--

-- Таблица shoes.list_pattern не содержит данных

-- 
-- Вывод данных для таблицы producer
--
INSERT INTO producer VALUES
(1, 'Rieker', 'Германия'),
(2, 'Wilmar', 'Италия'),
(3, 'Марко', 'Беларусь'),
(4, 'King boots', 'США'),
(5, 'Tamaris', 'Германия');

-- 
-- Вывод данных для таблицы inkind
--
INSERT INTO inkind VALUES
(1, 1, 'Туфли'),
(2, 1, 'Балетки'),
(3, 1, 'Ботинки'),
(5, 1, 'Сапоги'),
(6, 1, 'Босоножки'),
(7, 2, 'Туфли'),
(8, 2, 'Кроссовки'),
(9, 2, 'Мокасины'),
(10, 2, 'Сапоги'),
(11, 2, 'Кеды'),
(12, 3, 'Ботинки'),
(13, 3, 'Сапоги'),
(14, 3, 'Кроссовки'),
(15, 3, 'Резиновая обувь');

-- 
-- Вывод данных для таблицы pattern_inkind
--

-- Таблица shoes.pattern_inkind не содержит данных

-- 
-- Вывод данных для таблицы product
--
INSERT INTO product VALUES
(1, 'Туфли', 1, 20, 2, 1, 'http://localhost/shop/img/T1.jpg'),
(2, 'Балетки', 2, 35, 4, 3, 'http://localhost/shop/img/B1.jpg'),
(3, 'Сапоги', 5, 40, 1, 5, 'http://localhost/shop/img/S1.jpg'),
(4, 'Кроссовки', 8, 15, 3, 2, 'http://localhost/shop/img/KR1.jpg'),
(5, 'Кеды', 11, 13, 4, 4, 'http://localhost/shop/img/K1.jpg'),
(6, 'Сапоги', 13, 12, 5, 5, 'http://localhost/shop/img/DS1.jpg'),
(7, 'Резиновые сапоги', 15, 11, 1, 3, 'http://localhost/shop/img/DRS1.jpg'),
(8, 'Туфли', 1, 35, 1, 3, 'http://localhost/shop/img/T2.jpg'),
(9, 'Туфли', 1, 23, 2, 2, 'http://localhost/shop/img/T3.jpg'),
(10, 'Tуфли', 1, 13, 5, 4, 'http://localhost/shop/img/T4.jpg'),
(11, 'Tуфли', 1, 15, 4, 5, 'http://localhost/shop/img/T5.jpg'),
(12, 'Tуфли', 1, 16, 5, 4, 'http://localhost/shop/img/T6.jpg'),
(13, 'Tуфли', 1, 17, 4, 4, 'http://localhost/shop/img/T7.jpg'),
(14, 'Tуфли', 1, 18, 5, 3, 'http://localhost/shop/img/T8.jpg'),
(15, 'Tуфли', 1, 19, 4, 2, 'http://localhost/shop/img/T9.jpg'),
(16, 'Tуфли', 1, 20, 5, 1, 'http://localhost/shop/img/T10.jpg'),
(17, 'Tуфли', 1, 21, 7, 2, 'http://localhost/shop/img/T11.jpg'),
(18, 'Tуфли', 1, 22, 5, 3, 'http://localhost/shop/img/T12.jpg'),
(19, 'Tуфли', 1, 23, 7, 4, 'http://localhost/shop/img/T13.jpg'),
(20, 'Tуфли', 1, 24, 6, 5, 'http://localhost/shop/img/T14.jpg'),
(21, 'Tуфли', 1, 25, 7, 4, 'http://localhost/shop/img/T15.jpg'),
(22, 'Tуфли', 1, 26, 5, 2, 'http://localhost/shop/img/T16.jpg'),
(23, 'Tуфли', 1, 27, 7, 1, 'http://localhost/shop/img/T17.jpg'),
(24, 'Tуфли', 1, 28, 5, 2, 'http://localhost/shop/img/T18.jpg'),
(25, 'Tуфли', 1, 40, 7, 3, 'http://localhost/shop/img/T19.jpg'),
(26, 'Tуфли', 1, 15, 5, 3, 'http://localhost/shop/img/T20.jpg'),
(27, 'Tуфли', 1, 34, 7, 1, 'http://localhost/shop/img/T21.jpg'),
(28, 'Кроссовки', 8, 34, 2, 2, 'http://localhost/shop/img/KR2.jpg'),
(29, 'Кроссовки', 8, 45, 33, 2, 'http://localhost/shop/img/KR3.jpg'),
(30, 'Кроссовки', 8, 45, 33, 1, 'http://localhost/shop/img/KR4.jpg'),
(31, 'Кроссовки', 8, 33, 3, 3, 'http://localhost/shop/img/KR5.jpg'),
(32, 'Кроссовки', 8, 43, 3, 4, 'http://localhost/shop/img/KR6.jpg'),
(33, 'Кроссовки', 8, 2, 3, 5, 'http://localhost/shop/img/KR7.jpg'),
(34, 'Кроссовки', 8, 23, 3, 1, 'http://localhost/shop/img/KR8.jpg'),
(35, 'Кроссовки', 8, 44, 3, 2, 'http://localhost/shop/img/KR9.jpg'),
(36, 'Кроссовки', 8, 22, 1, 1, 'http://localhost/shop/img/KR10.jpg'),
(37, 'Ботинки', 12, 22, 2, 2, 'http://localhost/shop/img/DB1.jpg'),
(38, 'Ботинки', 12, 45, 1, 5, 'http://localhost/shop/img/DB2.jpg'),
(39, 'Ботинки', 12, 12, 2, 2, 'http://localhost/shop/img/DB3.jpg'),
(40, 'Ботинки', 12, 32, 4, 4, 'http://localhost/shop/img/DB4.jpg'),
(41, 'Ботинки', 12, 44, 4, 2, 'http://localhost/shop/img/DB5.jpg'),
(42, 'Ботинки', 12, 33, 5, 5, 'http://localhost/shop/img/DB6.jpg'),
(43, 'Ботинки', 12, 33, 5, 4, 'http://localhost/shop/img/DB7.jpg'),
(44, 'Ботинки', 12, 22, 6, 3, 'http://localhost/shop/img/DB8.jpg'),
(45, 'Ботинки', 12, 77, 6, 2, 'http://localhost/shop/img/DB9.jpg'),
(46, 'Ботинки', 12, 56, 5, 1, 'http://localhost/shop/img/DB10.jpg'),
(47, 'Ботинки', 12, 44, 4, 3, 'http://localhost/shop/img/DB11.jpg'),
(48, 'Ботинки', 12, 44, 5, 4, 'http://localhost/shop/img/DB12.jpg');

-- 
-- Вывод данных для таблицы import
--
INSERT INTO import VALUES
(78, 9, 90),
(79, 3, 90),
(80, 9, 90),
(81, 9, 90),
(82, 6, 90),
(83, 7, 90),
(84, 3, 90);

-- 
-- Вывод данных для таблицы pattern_product
--

-- Таблица shoes.pattern_product не содержит данных

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;