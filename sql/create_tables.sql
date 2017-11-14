-- Generation Time: Nov 14, 2017 at 10:17 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `da_simplechat`
--

-- --------------------------------------------------------

--
-- Table structure for table `sc_user`
--

DROP TABLE IF EXISTS `sc_user`;
CREATE TABLE IF NOT EXISTS `sc_user` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contact_no` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `sc_message`
--

CREATE TABLE IF NOT EXISTS `sc_message` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `datetime_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datetime_seen` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
COMMIT;