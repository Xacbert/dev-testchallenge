CREATE TABLE `tailors` (
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `init_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB