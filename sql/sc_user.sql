CREATE TABLE IF NOT EXISTS `sc_user` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(10) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `contact_no` text NOT NULL,
  `datetime_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;