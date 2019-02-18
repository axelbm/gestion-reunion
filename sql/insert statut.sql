SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO `participationstatus` (`statutid`, `nom`, `description`) VALUES
('Abs', 'Absent', 'La personne invitee va etre absente.'),
('Ann', 'Annuler', 'La reunion ou l\'invitation a ete annulee.'),
('EnAt', 'En Attente', 'En attente d\'une reponse de la personne invitee.'),
('Hes', 'Hesitant', 'La personne invitee ne sait pas si elle va etre presente.'),
('Pres', 'Present', 'La personne invitee va etre presente.'),
('Term', 'Terminee', 'La reunion est terminee.');