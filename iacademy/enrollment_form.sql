-- -------------------------------------------------------------
-- TablePlus 2.10(268)
--
-- https://tableplus.com/
--
-- Database: heroku_95201e1feb4578d
-- Generation Time: 2020-01-13 14:24:41.0630
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `enrollment_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courses` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

INSERT INTO `enrollment_form` (`id`, `courses`, `fname`, `lname`, `email`, `phone`, `about`, `country`, `nationality`, `state`, `comments`) VALUES ('1', 'Web Design Course', 'zubbey', 'nathen', 'com.zubbey@hotmail.com', '09022993310', 'online', 'Nigeria', 'Ghana', 'Bayelsa State', 'i love africa'),
('11', 'Mobile App Development Short Course', 'Kenneth', 'Ossai', 'kenossai1@gmail.com', '+2349090066687', 'Postal', 'Nigeria', 'Nigeria', 'Delta State', ''),
('21', 'Social Media Marketing Course', 'Kenneth', 'Ossai', 'kenossai1@gmail.com', '+2349090066687', '', 'Nigeria', 'Nigeria', 'Abia State', ''),
('31', 'Digital Video Editing Course', 'zubbey', 'nathen', 'anotherchibike@gmail.com', '09022993310', '', '', '', 'Abia State', ''),
('41', 'Digital Video Editing Course', 'zubbey', 'nathen', 'thankgod@gmail.com', 'asdsd', '', 'Nigeria', 'Ghana', 'Imo State', '');


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;