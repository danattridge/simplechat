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