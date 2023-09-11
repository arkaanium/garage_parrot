CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `author` varchar(64) NOT NULL,
  `general_informations` text NOT NULL,
  `vehicle_power` text NOT NULL,
  `consumption` text NOT NULL,
  `warranty` int(11) NOT NULL,
  `options` text NOT NULL,
  `year` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `kilometers` int(11) NOT NULL,
  `creation_date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cars` ADD PRIMARY KEY (`id`);
ALTER TABLE `cars` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `annonce_id` int(11) NOT NULL,
  `author` varchar(64) NOT NULL,
  `upload_date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `images` ADD PRIMARY KEY (`id`);
ALTER TABLE `images` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `author` varchar(64) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `creation_date` varchar(64) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `messages` ADD PRIMARY KEY (`id`);
ALTER TABLE `messages` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `author` varchar(64) NOT NULL,
  `rate` int(11) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL,
  `creation_date` varchar(644) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `reviews` (`id`, `author`, `rate`, `subject`, `comment`, `status`, `creation_date`) VALUES
(1, 'Florent Damel', 5, 'Très bien', 'Je recommande', 1, '2023-09-09 17:31:33'),
(2, 'Stephane Markcl', 5, 'Ok', 'Très bien', 1, '2023-09-09 17:31:33'),
(3, 'Baptiste F', 5, 'Super equipe et bon suivi', 'Un super garage et une équipe à l\'écoute. Je recommande', 1, '2023-09-09 17:31:33'),
(4, 'Matéo Bardet', 5, 'Très bon garage, ravi', 'Très ravi de ce petit garage qui a su réparer ma voiture', 1, '2023-09-09 18:44:49');

ALTER TABLE `reviews` ADD PRIMARY KEY (`id`);
ALTER TABLE `reviews` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `services` text NOT NULL,
  `schedule` text NOT NULL,
  `update_date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `settings` ADD PRIMARY KEY (`id`);
ALTER TABLE `settings` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` varchar(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `creation_date` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `users` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;