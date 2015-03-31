CREATE TABLE IF NOT EXISTS `board` (
  `uploader` varchar(100) NOT NULL,
  `contents` varchar(300) NOT NULL,
  `uptime` datetime NOT NULL,
  `idx` int(11) NOT NULL
)
