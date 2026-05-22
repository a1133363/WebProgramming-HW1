CREATE DATABASE IF NOT EXISTS `mail_sender` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `mail_sender`;

CREATE TABLE IF NOT EXISTS emails (
    `No` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (`No`),
    UNIQUE KEY unique_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

