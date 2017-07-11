-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 11 Juillet 2017 à 02:50
-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `appartoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `bonobo_friends`
--

CREATE TABLE `bonobo_friends` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `famille` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `race` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nourriture` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bonobo_friends_bonobo_user`
--

CREATE TABLE `bonobo_friends_bonobo_user` (
  `bonobo_friends_id` int(11) NOT NULL,
  `bonobo_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bonobo_friends`
--
ALTER TABLE `bonobo_friends`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bonobo_friends_bonobo_user`
--
ALTER TABLE `bonobo_friends_bonobo_user`
  ADD PRIMARY KEY (`bonobo_friends_id`,`bonobo_user_id`),
  ADD KEY `IDX_67939479D9F6E44F` (`bonobo_friends_id`),
  ADD KEY `IDX_6793947977089779` (`bonobo_user_id`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bonobo_friends`
--
ALTER TABLE `bonobo_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bonobo_friends_bonobo_user`
--
ALTER TABLE `bonobo_friends_bonobo_user`
  ADD CONSTRAINT `FK_6793947977089779` FOREIGN KEY (`bonobo_user_id`) REFERENCES `fos_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_67939479D9F6E44F` FOREIGN KEY (`bonobo_friends_id`) REFERENCES `bonobo_friends` (`id`) ON DELETE CASCADE;
