--
-- テーブルの構造 `wp_custom_ipersonal`
--
DROP TABLE IF EXISTS `wp_custom_ipersonal`;
CREATE TABLE `wp_custom_ipersonal` (
  `id` int(11) NOT NULL,
  `pref` varchar(8) NOT NULL,
  `child_name` varchar(24) NOT NULL,
  `child_kana` varchar(24) NOT NULL,
  `gender` varchar(4) NOT NULL,
  `parent_name` varchar(24) NOT NULL,
  `parent_kana` varchar(24) NOT NULL,
  `school` varchar(16) NOT NULL,
  `grade` varchar(4) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `address1` varchar(40) NOT NULL,
  `address2` varchar(40) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `email` varchar(64) NOT NULL,
  `date` varchar(8) NOT NULL,
  `datetime` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `wp_custom_ipersonal`
--
ALTER TABLE `wp_custom_ipersonal`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `wp_custom_ipersonal`
--
ALTER TABLE `wp_custom_ipersonal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;