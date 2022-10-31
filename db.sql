CREATE TABLE `brands` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `country` varchar(64) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGIN E= InnoDB;

CREATE TABLE `products` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `brand_id` int(255) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `type` varchar(24) DEFAULT NULL,
PRIMARY KEY (`id`),
KEY `brand_id` (`brand_id`),
CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`)
) ENGINE = InnoDB;

CREATE TABLE `orders` (
`id` int(255) NOT NULL AUTO_INCREMENT,
`phone` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
`address` varchar(255) NOT NULL,
`name` varchar(255) NOT NULL,
`etc` varchar(255) NOT NULL,
`order_ids` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `brands` (`id`, `name`, `country`) VALUES
(1, 'Ortiz-Lowe', 'Moldova’),
(2, 'Bode, Muller and Hickle', 'Estonia'),
(3, 'Schulist-Cummerata', 'Kuwait');

INSERT INTO `products` (`id`, `model`, `price`, `brand_id`, `image`, `type`) VALUES
(1, 'PP15 Small', 16100, 1, '/img/1.png', 'Детский'),
(2, 'HH69 Gor', 36183, 1, '/img/2.png', 'Горный'),
(3, 'WoPo X9', 66923, 1, '/img/3.png', 'Женский'),
(4, 'SS228 BIG', 46893, 2, '/img/4.png', 'Горный'),
(5, 'Explorer One', 25862, 2, '/img/5.png', 'Горный'),
(6, 'JenSky 2', 26183, 3, '/img/6.png', 'Женский');
