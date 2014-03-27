-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Jeu 27 Mars 2014 à 10:39
-- Version du serveur: 5.5.32
-- Version de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`) VALUES
(1),
(2),
(3);

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`id`, `code`, `libelle`) VALUES
(1, 'CGO', 'BTS Comptabilité'),
(2, 'SIO', 'BTS Services informatique aux organisations'),
(7, 'AM', 'Assistant Manager'),
(9, 'AM', 'Assistant Manager'),
(10, 'AM', 'Assistant Manager');

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `code`, `section_id`, `discr`, `nom`, `prenom`, `adresse`, `tel`, `mail`) VALUES
(1, '125', 7, 'etudiant', 'Lucie', 'Heck', '56 avenue aristide briand 14800 Touques', '0636569874', 'Heck@gmail.com'),
(2, '124', 9, 'etudiant', 'Jean', 'Durand', '18 rue de la paix 7500 Paris', '0256987456', 'Durand@gmail.com'),
(3, '123', 10, 'etudiant', 'Phillipe', 'Michel', '14 avenue de la republique 14000 Caen', '062125698', 'Michel@gmail.com');
