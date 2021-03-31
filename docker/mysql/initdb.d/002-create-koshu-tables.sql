--
-- テーブルの構造 `wp_custom_koshu`
--
DROP TABLE IF EXISTS `wp_custom_koshu`;
CREATE TABLE `wp_custom_koshu` (
  `id` int(11) NOT NULL,
  `pref` varchar(8) NOT NULL,
  `koshu` varchar(8) NOT NULL,
  -- koshu 夏期・春期・冬期
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
  `kosha` varchar(8) NOT NULL,
  `course` varchar(24) NOT NULL,
  `friend_check` tinyint(1) NOT NULL,
  `friend_kosha` varchar(8) NOT NULL,
  `friend_grade` varchar(4) NOT NULL,
  `friend_name` varchar(24) NOT NULL,
  `friend_school` varchar(16) NOT NULL,
  `other` varchar(1024) NOT NULL,
  `date` varchar(8) NOT NULL,
  `datetime` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `wp_custom_moshi`
--
ALTER TABLE `wp_custom_koshu`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `wp_custom_moshi`
--
ALTER TABLE `wp_custom_koshu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;