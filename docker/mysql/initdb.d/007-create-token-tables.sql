--
-- テーブルの構造 `wp_custom_token`
--
DROP TABLE IF EXISTS `wp_custom_token`;
CREATE TABLE `wp_custom_token` (
  `email` varchar(64) NOT NULL,
  `token` varchar(128) NOT NULL,
  `expire_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

