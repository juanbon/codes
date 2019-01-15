-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: sql101.eshost.com.ar
-- Tiempo de generación: 17-12-2018 a las 09:13:25
-- Versión del servidor: 5.6.21-69.0
-- Versión de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `blocked3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` text,
  `status` int(11) DEFAULT NULL,
  `original` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=900 ;



INSERT INTO `blocked3` (`id`, `fb_id`, `status`, `original`, `created_at`, `updated_at`) VALUES
(1, '525222313', 1, 'cancelados de ianm manuel', NULL, NULL),
(2, '789492261', 1, 'cancelados de ianm manuel', NULL, NULL),
(3, '1011587562', 1, 'cancelados de ianm manuel', NULL, NULL),
(4, '1017826711', 1, 'cancelados de ianm manuel', NULL, NULL),
(5, '1055942382', 1, 'cancelados de ianm manuel', NULL, NULL),
(6, '1082213165', 1, 'cancelados de ianm manuel', NULL, NULL),
(7, '1109407283', 1, 'cancelados de ianm manuel', NULL, NULL),
(8, '1137834449', 1, 'cancelados de ianm manuel', NULL, NULL),
(9, '1142349901', 1, 'cancelados de ianm manuel', NULL, NULL),
(899, '100028872278068', 1, 'cancelados de ianm manuel', NULL, NULL);

