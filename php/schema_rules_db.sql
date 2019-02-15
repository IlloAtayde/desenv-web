DROP DATABASE IF EXISTS iptables_rules_db;
CREATE DATABASE iptables_rules_db;
USE iptables_rules_db;

DROP TABLE IF EXISTS `rules`;
CREATE TABLE `rules` (
    `id` int NOT NULL AUTO_INCREMENT,
    `action` varchar(20) NOT NULL,
    `chain` varchar(20) NOT NULL,
    `protocol` varchar(20) NOT NULL,
    `ip_src` varchar(20) NOT NULL,
    `ip_src_mask` varchar(20) NOT NULL,
    `src_port` varchar(20),
    `ip_dst` varchar(20) NOT NULL,
    `ip_dst_mask` varchar(20) NOT NULL,
    `dst_port` varchar(20),
  PRIMARY KEY (`id`)
);


