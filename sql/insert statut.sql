SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO `participationstatus` (`statutid`, `nom`, `description`) VALUES
('Abs', 'Absent', 'La personne invit� va �tre absente.'),
('Ann', 'Annuler', 'La r�union ou l\'invitation � �t� annuler.'),
('EnAt', 'En Attente', 'En attente d\'une r�ponse de la personne invit�.'),
('Hes', 'H�sitant', 'La personne invit� ne sait pas si elle va �tre pr�sente.'),
('Pres', 'Pr�sent', 'La personne invit� va �tre pr�sente.'),
('Term', 'Terminer', 'La r�union est terminer.');