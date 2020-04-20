

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `www`;

use `www`;

CREATE TABLE `electives` (
  `id` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `lecturer` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `electives` (`id`, `title`, `description`, `lecturer`, `created_at`) VALUES
(1, 'Programming with Go', 'Let\'s learn Go', 'Nikolay Batchiyski', '2020-04-08 15:30:49'),
(2, 'AKDU', 'Let\'s Graduate', 'Svetlin Ivanov', '2020-04-08 15:30:49'),
(3, 'Web technologies', 'Let\'s learn the web', 'Milen Petrov', '2020-04-08 15:30:49'),
(4, 'WEB ', 'Very interesting course', 'Milen Petrov', '2020-04-08 15:57:29');


ALTER TABLE `electives`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `electives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;


