-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 08 juil. 2024 à 12:32
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `take_a_feariend`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `discount` tinyint(1) DEFAULT '0',
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `name`, `content`, `category`, `price`, `discount`, `images`) VALUES
(28, 'MousTigre', 'Le Moustique-Tigre est un excellent compagnon pour les aventures en plein air. Essayez de le promener en laisse et vous découvrirez un nouvel art de la chasse aux papillons et de la course effrénée après les lucioles. Et pour ceux qui cherchent un peu de mystère dans leur vie, rien de tel que d\'avoir un compagnon qui vous réveille avec un ronronnement suivi d\'une piqûre surprise. Bien sûr, quelques ajustements seront nécessaires. Comme installer des moustiquaires à toutes vos fenêtres et prévoir une réserve de crème anti-démangeaisons. Mais ne vous inquiétez pas, votre Moustique-Tigre est presque gérable, surtout si vous avez un faible pour les animaux de compagnie qui ajoutent un peu de suspense à votre quotidien.', 'animaux dangereux', 4200, 0, 'img/upload_animaux/4985493e5fcc6f380b8fc9bf2b604ed9.png'),
(29, 'ScorBuffle', 'Ce colosse à carapace adore les câlins... enfin, si vous aimez les câlins musclés et légèrement risqués. Et n\'oublions pas ses petites sautes d\'humeur : rien de tel qu\'un animal de compagnie qui peut transformer une promenade dans le jardin en parcours du combattant. Assurez-vous simplement de rester à bonne distance de sa queue et de ses cornes – après tout, l\'amour pique parfois un peu. Le Scorpion-Buffle est également excellent pour maintenir votre forme physique. Essayez de le promener en laisse et vous verrez, c\'est un exercice complet de cardio et de force. Et pour ceux qui cherchent un peu de piquant dans leur vie, rien de tel que de jouer à la balle avec une créature qui pourrait la percer d\'un coup de dard.', 'animaux dangereux', 5200, 1, 'img/upload_animaux/ccced5d73a352e024668be6a4cb36291.png'),
(30, 'Chagon', 'Pourquoi se contenter d\'un simple chat ronronnant quand vous pouvez avoir un minuscule dragon qui crache du feu ? Imaginez : un adorable félin avec des écailles scintillantes et des ailes miniatures qui apportent une nouvelle dimension à vos soirées Netflix et frissons. Le Chat-Dragon est l\'animal de compagnie idéal pour ceux qui aiment vivre sur le fil du rasoir. Vous pensiez que les griffes de chat étaient redoutables ? Attendez de voir ce que ces petites griffes peuvent faire quand elles sont accompagnées de flammes de dragon. Plus besoin d\'allumettes pour vos bougies, votre nouveau compagnon s\'en chargera avec un petit souffle charmant... qui pourrait aussi, accessoirement, incendier votre canapé.', 'animaux domestiques', 2300, 0, 'img/upload_animaux/9960633a22a5973e2216276bf48ba14a.png'),
(31, 'Croquin', 'Pourquoi opter pour un chat ronronnant ou un chien fidèle quand vous pouvez avoir une créature qui combine la rapidité meurtrière d\'un requin mako', 'animaux domestiques', 4000, 1, 'img/upload_animaux/55d214f51f6fda78f3cd76fd8502bb15.png'),
(32, 'Rhinorque', 'Le Rhino-Orque est l\'animal de compagnie ultime pour ceux qui ne se contentent pas de la banalité. Parfait pour la sécurité, il peut charger à travers les portes fermées tout en sifflant des mélodies apaisantes de baleine. Avec lui, votre maison devient instantanément un lieu où l\'extraordinaire devient ordinaire. Bien sûr, l\'adoption de ce magnifique hybride vient avec quelques petits défis. Par exemple, trouver un aquarium assez grand pour contenir ses balades aquatiques, ou un jardin qui peut résister à ses petites charges amicales. Sans oublier ses petits caprices alimentaires – il adore les barbecues de sardines et d\'herbe fraîchement coupée.', 'animaux dangereux', 13000, 0, 'img/upload_animaux/52bf1395ce81072bb588de3db1599cc6.png'),
(33, 'PittBOalls', 'Vous rêvez d\'un animal de sécurité à la fois effrayant et adorable pour garder un œil sur vos enfants ? Ne cherchez plus, nous avons l\'hybride parfait ', 'Happy tree Friends', 2100, 0, 'img/upload_animaux/9339d9dc77e4b53cf457a2357c0b142b.png'),
(35, 'The Megalodon', '\"Vous avez toujours rêvé d\'avoir un animal de compagnie qui impressionne autant vos amis que votre assurance habitation ? Adoptez le Mégalodon aujourd\'hui ! Avec sa taille imposante, il doublera vos efforts de nettoyage et triplera vos dépenses en nourriture. Les balades au parc ? Désormais, vous serez l\'attraction principale ! Et qui a besoin d\'une piscine quand vous avez un Mégalodon ? Plongez dans l\'expérience ultime de l\'adoption d\'un requin préhistorique - un choix qui fera de chaque jour une aventure et de chaque visite chez le dentiste un moment de pure terreur !\"\r\n\r\nNotez cependant que Take a FeaRIEND décline toute responsabilité en cas de disparition de vos voisins ou de nécessité soudaine d\'agrandir votre piscine.', 'animaux dangereux', 329990, 0, 'img/upload_animaux/9f8795d1a6d2458a533d7d307e24e742.png'),
(36, 'Poulpours', 'Rencontrez le Poulpours, la créature que vous n\'avez jamais su que vous ne vouliez pas.', 'animaux de sécurités', 4200, 0, 'img/upload_animaux/667407ac55e4f4.52943406.png'),
(38, 'The Fire Fox', 'Ce renard, aussi rusé que l\'équipe de développement de Mozilla, a une fourrure flamboyante qui rivalise avec les pages enflammées des internets. Il sait naviguer à travers les câbles et les forêts numériques avec une agilité déconcertante. Doté d\'un regard perçant, il vous fera croire qu\'il lit réellement le code source de votre vie. Son intelligence est à la hauteur de sa queue touffue et de son museau pointu. Il peut débusquer les bugs comme aucun autre et sait contourner les pièges des cookies plus vite que vous ne pouvez dire \"politique de confidentialité\". Méfiez-vous cependant, il a un sens de l\'humour aussi tranchant que ses griffes !', 'animaux de sécurités', 9990, 0, 'img/upload_animaux/5e5dba8b6cb5f0da09e73af223dce22f.png'),
(39, 'Petunia', 'Petunia n\'est pas un raton laveur ordinaire. Elle est un véritable tourbillon de propreté et d\'aventures inattendues. Avec elle, chaque jour est une nouvelle comédie! Que ce soit en essayant de se débarrasser d\'une tache invisible ou en transformant un petit accident en une scène digne d\'un film burlesque, Petunia sait comment rendre la vie excitante.\r\n\r\nNe vous laissez pas berner par son apparence innocente et son amour pour la propreté. Sous ce pelage bleu se cache un aimant à catastrophes hilarantes. Mais malgré ses mésaventures, Petunia reste incroyablement attachante et vous fera rire aux éclats avec ses maladresses et son insatiable quête de perfection.', 'Happy tree Friends', 120, 1, 'img/upload_animaux/4b365cde5b6d5dc660e4557553682f81.png'),
(40, 'Lumpy', 'Lumpy n\'est pas juste un élan. C\'est un festival ambulant de gaffes et de rires. Doté d\'un grand cœur et d\'un esprit simple, Lumpy transforme chaque moment de la vie en une aventure comique. Qu\'il s\'agisse de trébucher sur ses propres pattes ou de faire éclater une situation en un fiasco complet, Lumpy sait comment rendre la vie passionnante.\r\n\r\nSon look unique avec ses bois tordus et son sourire innocent fera fondre le cœur de n\'importe qui. Et même si ses maladresses peuvent parfois provoquer des éclats de rire incontrôlables, on ne peut s\'empêcher de l\'adorer pour son optimisme inébranlable et sa gentillesse sans limite.', 'Happy tree Friends', 100, 1, 'img/upload_animaux/baf40c9880b90120867fc1e72578ee3d.png'),
(41, 'Cuddles', 'Cuddles n\'est pas simplement un lapin; c\'est une boule de tendresse et d\'énergie prête à remplir votre maison de rires et d\'amour. Toujours prêt pour une aventure ou une séance de câlins, Cuddles est le parfait compagnon pour ceux qui cherchent à ajouter une dose de joie à leur vie.\r\n\r\nAvec ses grandes oreilles roses et son sourire éclatant, Cuddles ne manque jamais de faire tourner les têtes. Il adore sauter dans tous les sens, apportant une énergie contagieuse partout où il va. Mais ne vous laissez pas tromper par son côté espiègle, car une fois la folie passée, Cuddles est le roi des câlins et de la tendresse.', 'Happy tree Friends', 110, 1, 'img/upload_animaux/3b35a17981e068e1b0231d246db72716.png');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `animal_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `user_id`, `animal_id`, `quantity`) VALUES
(2, 2, 31, 2),
(3, 2, 33, 1),
(4, 4, 39, 2),
(6, 2, 38, 1),
(7, 2, 39, 1),
(8, 6, 38, 1),
(9, 6, 35, 1),
(10, 6, 31, 1),
(11, 6, 33, 1),
(12, 6, 29, 1),
(13, 6, 28, 1),
(14, 6, 30, 1),
(15, 2, 28, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `pass`, `roles`) VALUES
(2, 'test', 'Crash', 'Crashtest@msn.com', '$argon2id$v=19$m=65536,t=4,p=1$NC9FQzlyVmFxMVM2VUtqRw$EKe3DLfCIbd+kO9C2aeHS+tAXj8fNZWyi+vYLLLCZl8', 'user'),
(4, 'Yrautcnas', 'Keryoh', 'Yrautcnas@msn.com', '$argon2id$v=19$m=65536,t=4,p=1$SlhITDNlOTM2LjRRRXp3Tg$6spvoemjN4esJOtAeKM4nbAVp1ePAdZRwG52MlIV3FE', 'administrateur'),
(5, 'Grégory', 'Vartan', 'a@b.c', '$argon2id$v=19$m=65536,t=4,p=1$c0oyQ1VEOWZVVTdqMnIwaw$L5pbgOSzCPicr7pow6qBvdqAHtXP65n3CgMAnD2Ssig', 'administrateur'),
(6, 'test', 'beta', 'betatest@msn.com', '$argon2id$v=19$m=65536,t=4,p=1$ZXhMTnFXMi9HNGlkd3piMQ$EjIR+75Pk6rpWA5O9POTchEDq2l9LnkAmi/qOnhh23s', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animaux` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
