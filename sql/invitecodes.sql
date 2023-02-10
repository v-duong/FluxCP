CREATE TABLE IF NOT EXISTS `invite_codes` (
  `index` int(11) unsigned NOT NULL AUTO_INCREMENT UNIQUE,
  `code` varchar(32) NOT NULL default '' UNIQUE,
  `createdBy` int(11) unsigned NOT NULL default '0',
  `usedBy` int(11) unsigned NOT NULL default '0',
  `expirationTime` datetime,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM;