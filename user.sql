-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-03 08:55:45
-- 伺服器版本： 10.4.16-MariaDB
-- PHP 版本： 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(5) UNSIGNED NOT NULL,
  `userId` text CHARACTER SET utf8 NOT NULL,
  `displayName` text CHARACTER SET utf8 NOT NULL,
  `pictureUrl` text CHARACTER SET utf8 NOT NULL,
  `statusMessage` text CHARACTER SET utf8 DEFAULT NULL,
  `createT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `userId`, `displayName`, `pictureUrl`, `statusMessage`, `createT`) VALUES
(1, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', '我飄向南方 別問我家鄉', 0),
(9, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', '我飄向南方 別問我家鄉', 1606726277),
(10, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606727523),
(11, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606727688),
(12, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606727823),
(13, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606728265),
(14, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606728418),
(15, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606728514),
(16, '$user[userId]}', '$user[displayName]', '$user[pictureUrl]', NULL, 1606728661),
(17, '$user[userId]}', '$user[displayName]', '$user[pictureUrl]', NULL, 1606728690),
(18, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606729107),
(19, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606981845),
(20, 'Ufc3b1d52223f66a30bfdf31fdeb60b6a', '*紹齊S.C', 'https://profile.line-scdn.net/0hkm4BRWvnNEIJOxxcxWtLFTV-Oi9-FTIKcVl6ICpubXtxDXscPQ59I3tuOCV2CXIcZ1l6cSRpaiZ2', NULL, 1606982035);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
