-- CREATE DATABASE IF NOT EXISTS `example`;

DROP TABLE IF EXISTS `Users`;
DROP TABLE IF EXISTS `Todo`;

CREATE TABLE Users (
    `id` int NOT NULL AUTO_INCREMENT,
    `username` varchar(255),
    `password` varchar(255),
    PRIMARY KEY (`id`)
);

CREATE TABLE Todo (
    `id` int NOT NULL AUTO_INCREMENT,
    `text` mediumtext,
    PRIMARY KEY (`id`)
);

INSERT INTO `Users` VALUES (1, 'janedoe', 'password');
