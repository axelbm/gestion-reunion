SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO `participationstatus` (`statutid`, `nom`, `description`) VALUES
('Abs', 'Absent', 'La personne invité va être absente.'),
('Ann', 'Annuler', 'La réunion ou l\'invitation à été annuler.'),
('EnAt', 'En Attente', 'En attente d\'une réponse de la personne invité.'),
('Hes', 'Hésitant', 'La personne invité ne sait pas si elle va être présente.'),
('Pres', 'Présent', 'La personne invité va être présente.'),
('Term', 'Terminer', 'La réunion est terminer.');