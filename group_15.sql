-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-13 05:44:56
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `group_15`
--
CREATE DATABASE IF NOT EXISTS `group_15` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `group_15`;
-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `acctno` int(2) NOT NULL,
  `account` varchar(10) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`acctno`, `account`, `pwd`, `email`) VALUES
(1, 'admin', 'admin123456', ''),
(2, 'member', 'member123456', ''),
(17, 'user_x_74', '77777', 'kkkk@gmail.com'),
(18, 'test', '12345', 'xxxxaaaa@gmail.com'),
(22, 'test000', '1111', '1111@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `cartno` int(3) NOT NULL,
  `account` varchar(50) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `cart`
--

INSERT INTO `cart` (`cartno`, `account`, `pid`, `name`, `price`, `qty`, `time`) VALUES
(49, 'test', 8, 'SONY MDR-XB55AP 重低音內耳式線控耳機', 1490, 2, '2022-06-11 17:43:12'),
(50, 'test', 2, '綠的GREEN 植系濃縮洗衣精-植萃抗菌 1.8L', 239, 2, '2022-06-11 19:01:52'),
(52, 'test', 6, '舒潔 萬用輕巧包抽取衛生紙(110抽x10包x10串/箱)', 999, 1, '2022-06-11 19:03:36'),
(53, 'userx', 12, '耐吉斯-超級無穀 熟齡養生貓 火雞肉 7.5kg', 1662, 1, '2022-06-11 19:51:16'),
(54, 'userx', 5, '五月花 絲滑柔三層抽取可沖衛生紙(110抽x8包x7袋/箱)', 829, 4, '2022-06-11 19:51:18'),
(55, 'test', 1, '一匙靈 抗菌EX 3倍濃縮科技潔淨洗衣精瓶裝 0.8L', 159, 1, '2022-06-12 21:27:59'),
(56, 'test', 6, '舒潔 萬用輕巧包抽取衛生紙(110抽x10包x10串/箱)', 999, 1, '2022-06-12 21:28:01'),
(58, 'userx', 7, 'Sennheiser IE 400 PRO 專業入耳式監聽耳機-霧黑色', 11900, 1, '2022-06-13 00:01:58'),
(59, 'test000', 10, '羅技 G413 機械式背光遊戲鍵盤-黑', 2490, 2, '2022-06-13 00:06:48'),
(61, 'test000', 9, 'iRocks K75M 背光機械式鍵盤-Cherry茶軸', 2890, 1, '2022-06-13 00:08:04');

-- --------------------------------------------------------

--
-- 資料表結構 `deliever`
--

CREATE TABLE `deliever` (
  `delieverno` int(10) NOT NULL,
  `account` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `deliever`
--

INSERT INTO `deliever` (`delieverno`, `account`, `name`, `price`, `qty`) VALUES
(1, 'test', '綠的GREEN 植系濃縮洗衣精-植萃抗菌 1.8L', 239, 2),
(2, 'test', 'SONY MDR-XB55AP 重低音內耳式線控耳機', 1490, 2),
(4, 'userx', '耐吉斯-超級無穀 熟齡養生貓 火雞肉 7.5kg', 1662, 1),
(5, 'userx', '五月花 絲滑柔三層抽取可沖衛生紙(110抽x8包x7袋/箱)', 829, 4),
(6, 'test000', '羅技 G413 機械式背光遊戲鍵盤-黑', 2490, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `message_board`
--

CREATE TABLE `message_board` (
  `msgno` int(3) NOT NULL,
  `account` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `message_board`
--

INSERT INTO `message_board` (`msgno`, `account`, `content`, `time`) VALUES
(5, 'test', 'jijiij', '2022-06-11 19:04:09'),
(6, 'test', '00000', '2022-06-12 22:10:45'),
(7, 'userx', '5555', '2022-06-13 00:01:21'),
(8, 'test000', '5454545', '2022-06-13 00:06:41');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `photo`, `description`, `stock`) VALUES
(1, '一匙靈 抗菌EX 3倍濃縮科技潔淨洗衣精瓶裝 0.8L', 159, 'images_db/P_1_1.png', '◆日本最新技術研發，3倍濃縮，一滴蘊含三滴極致洗淨力，可強力洗淨頑強污漬\r\n◆超越日曬等級除菌除臭力，洗淨99.999%細菌，從根源解決異味問題\r\n◆獨家專利革新「省力樂壓瓶」，一壓計量，一啵即淨，單手即可輕鬆使用\r\n◆含植物性洗淨成分，安心洗淨溫和不刺激\r\n◆含防霉、防螨成分', 3),
(2, '綠的GREEN 植系濃縮洗衣精-植萃抗菌 1.8L', 239, 'images_db/P_1_2.png', '◆添加尤加利精油抗菌成份\r\n◆日本專利植萃淨味成分，徹底去除衣物異味\r\n◆全植物來源界面活性劑(不含石化來源)\r\n◆2倍濃縮配方 (洗淨成分≧30%)，用量更省', 3),
(3, 'Persil 超濃縮強力洗淨高效能洗衣精5L', 549, 'images_db/P_1_3.png', '◆強力洗淨配方\r\n◆歐洲原裝進口\r\n◆全新冷水酵素配方\r\n◆獨家多種酵素，輕鬆去漬', 3),
(4, '春風 山茶花柔韌感抽取式衛生紙(110抽x12包x6串/箱)', 919, 'images_db/P_0_1.png', '◆添加山茶花精華，紙張柔軟強韌\r\n◆使用FSC國際驗證紙漿，用溫柔呵護地球\r\n◆嶄新設計與明亮色彩，豐富您的家居品味\r\n◆每一張衛生紙經特殊壓花處理，觸感柔軟細緻\r\n◆入馬桶好放心，易分散不堵塞', 2),
(5, '五月花 絲滑柔三層抽取可沖衛生紙(110抽x8包x7袋/箱)', 829, 'images_db/P_0_2.png', '◆面紙+衛生紙的完美結合\r\n◆如面紙般柔軟不起屑\r\n◆像衛生紙般安心丟馬桶\r\n◆三層抽取可沖面紙，絲滑柔，親膚細緻\r\n◆使用原生紙漿，高溫殺菌，不含螢光劑，不染色', 2),
(6, '舒潔 萬用輕巧包抽取衛生紙(110抽x10包x10串/箱)', 999, 'images_db/P_0_3.png', '◆尺寸：19cm X 13cm\r\n◆理想品牌最佳推薦\r\n◆萬用尺寸，隨處適用\r\n◆紙張大小剛剛好\r\n◆棉柔觸感', 2),
(7, 'Sennheiser IE 400 PRO 專業入耳式監聽耳機-霧黑色', 11900, 'images_db/P_2_1.png', '◆新開發的動態 7mm寬頻單體\r\n◆具有通透的中音域重現和清晰高頻\r\n◆符合人體工程學的微型外殼\r\n◆確保無雜訊和無失真的音效\r\n◆德國製造 宙宣總代理兩年保固', 5),
(8, 'SONY MDR-XB55AP 重低音內耳式線控耳機', 1490, 'images_db/P_2_2.png', '◆12mm 動態類型驅動單體\r\n◆全新外觀造型，提供更舒適服貼配戴感\r\n◆金屬質感繽紛四色設計\r\n◆全面支援 Android™、iPhone、Blackberry 系統智慧型手機', 5),
(9, 'iRocks K75M 背光機械式鍵盤-Cherry茶軸', 2890, 'images_db/P_3_1.png', '◆採用Cherry機械軸體\r\n◆易於清理的懸浮式結構\r\n◆強固的鋁合金面板與可調整腳架\r\n◆按鍵背光，多種特效及自訂模式\r\n◆側邊流光燈條，支援獨立動態燈效\r\n◆內建快捷鍵，輕鬆存取多媒體、郵件、全鍵鎖鍵及電腦螢幕快速鎖功能鍵等功能\r\n◆內建記憶體支援5組按鍵字串巨集，快速輸入更便利', 2),
(10, '羅技 G413 機械式背光遊戲鍵盤-黑', 2490, 'images_db/P_3_2.png', '◆Romer-G 鍵軸\r\n◆LED紅色背光	\r\n◆鋁鎂合金頂蓋、懸浮按鍵設計\r\n◆腳架可調高度\r\n◆底部線材收納設計\r\n◆USB轉接插孔\r\n◆FN搭配多媒體熱鍵\r\n◆26Keys Rollover無衝\r\n◆原廠遊戲軟體-可自訂巨集\r\n◆附額外遊戲專屬鍵帽&拔鍵器', 2),
(11, '法米納 天然處方罐 貓咪高營養照護配方 85g*12罐', 798, 'images_db/P_4_1.png', '◆充足的熱量、高生物利用率的蛋白質\r\n◆充足的必需胺基酸可幫助肌肉生長\r\n◆高含量的鋅元素可幫助傷口調理\r\n◆高生物利用率的蛋白質', 5),
(12, '耐吉斯-超級無穀 熟齡養生貓 火雞肉 7.5kg', 1662, 'images_db/P_4_2.png', '◆100%無穀 低敏再升級\r\n◆富含營養海藻、鮭魚油等超級食物\r\n◆不含副產品、人工香料色素\r\n◆強化骨骼、關節，保健新血管', 5),
(13, '法米納 天然海洋無穀主食罐 成犬用-鮭魚鱈魚 140g*6罐', 594, 'images_db/P_5_1.png', '◆不含BPA、膠質及任何人工防腐劑\r\n◆所有礦物質皆經過「螯合」作用，可提升5%~15%吸收率\r\n◆使用最高品質肉塊、魚排、雞蛋為主原料，不含內臟\r\n◆保存食材的美味及營養', 5),
(14, '耐吉斯-源野高蛋白 無穀全齡犬 鮭魚 6lb', 1662, 'images_db/P_5_2.png', '◆70%高動物性蛋白質\r\n◆穩定狗狗餐後血糖值，不易發胖\r\n◆添加鮭魚，抗氧、毛髮柔亮\r\n◆超值食物添加，健康加倍', 5),
(18, '好酷的耳機欸趕快來買給我來買喔', 10000, '', 'iamanapple', 2),
(19, '123', 123, 'test.png', '12313', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `purchase`
--

CREATE TABLE `purchase` (
  `pno` int(3) NOT NULL,
  `account` varchar(50) NOT NULL,
  `pid` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `purchase`
--

INSERT INTO `purchase` (`pno`, `account`, `pid`, `name`, `price`, `qty`, `time`) VALUES
(82, 'test', 8, 'SONY MDR-XB55AP 重低音內耳式線控耳機', 1490, 2, '2022-06-11 17:43:12'),
(85, 'test', 1, '一匙靈 抗菌EX 3倍濃縮科技潔淨洗衣精瓶裝 0.8L', 159, 1, '2022-06-12 21:27:59');

-- --------------------------------------------------------

--
-- 資料表結構 `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `wishlist`
--

INSERT INTO `wishlist` (`id`, `account`, `pid`, `name`, `price`) VALUES
(2, 'test', 6, '舒潔 萬用輕巧包抽取衛生紙(110抽x10包x10串/箱)', 999),
(3, 'userx', 1, '一匙靈 抗菌EX 3倍濃縮科技潔淨洗衣精瓶裝 0.8L', 159),
(4, 'userx', 9, 'iRocks K75M 背光機械式鍵盤-Cherry茶軸', 2890),
(5, 'test000', 2, '綠的GREEN 植系濃縮洗衣精-植萃抗菌 1.8L', 239),
(6, 'test000', 9, 'iRocks K75M 背光機械式鍵盤-Cherry茶軸', 2890);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acctno`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartno`);

--
-- 資料表索引 `deliever`
--
ALTER TABLE `deliever`
  ADD PRIMARY KEY (`delieverno`);

--
-- 資料表索引 `message_board`
--
ALTER TABLE `message_board`
  ADD PRIMARY KEY (`msgno`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`pno`);

--
-- 資料表索引 `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `account`
--
ALTER TABLE `account`
  MODIFY `acctno` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cart`
--
ALTER TABLE `cart`
  MODIFY `cartno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `deliever`
--
ALTER TABLE `deliever`
  MODIFY `delieverno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message_board`
--
ALTER TABLE `message_board`
  MODIFY `msgno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `purchase`
--
ALTER TABLE `purchase`
  MODIFY `pno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
