
--
-- テーブルの構造 `wp_custom_moshi`
--
DROP TABLE IF EXISTS `wp_custom_moshi`;
CREATE TABLE `wp_custom_moshi` (
  `id` int(11) NOT NULL,
  `pref` varchar(8) NOT NULL,
  `moshi` varchar(8) NOT NULL,
  -- moshi 中学入試・高校入試
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
  `schedule` varchar(40) NOT NULL,
  `fee` int(11) NOT NULL,
  `wish1` varchar(16) NOT NULL,
  `wish2` varchar(16) NOT NULL,
  `wish3` varchar(16) NOT NULL,
  `return` varchar(4) NOT NULL,
  `payment` varchar(8) NOT NULL,
  `other` varchar(1024) NOT NULL,
  `amount` int(11) NOT NULL,
  `mbtran` varchar(25) NOT NULL,
  `bktrans` varchar(24) NOT NULL,
  `tranid` varchar(110) NOT NULL,
  `ddate` varchar(8) NOT NULL,
  `rsltcd` varchar(13) NOT NULL,
  `rsltdcd` varchar(8) NOT NULL,
  `date` varchar(8) NOT NULL,
  `datetime` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `wp_custom_moshi`
--
ALTER TABLE `wp_custom_moshi`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `wp_custom_moshi`
--
ALTER TABLE `wp_custom_moshi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;