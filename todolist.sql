-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 20 Şub 2020, 22:12:49
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `todolist`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cevap`
--

CREATE TABLE `cevap` (
  `id` int(11) NOT NULL,
  `soru_id` int(11) NOT NULL,
  `cevaplayan_id` int(11) NOT NULL DEFAULT '0',
  `cevap_detay` text NOT NULL,
  `cevaplama_zamani` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `cevap`
--

INSERT INTO `cevap` (`id`, `soru_id`, `cevaplayan_id`, `cevap_detay`, `cevaplama_zamani`) VALUES
(115, 18, 1, 'Güzel günler göreceğiz çocuklar\r\n', '2020-02-14 15:31:22'),
(116, 18, 1, 'Motorları maviliklere süreceğiz', '2020-02-14 15:31:33'),
(117, 19, 1, 'oldumu abe\r\n', '2020-02-17 13:43:18'),
(118, 27, 1, 'hayat bir zamanlar güzeldi', '2020-02-17 13:46:00'),
(119, 20, 1, 'güzel güzeell', '2020-02-17 13:46:26'),
(120, 18, 1, 'yapma bee', '2020-02-17 13:46:43'),
(121, 29, 1, 'duygularım darmadağın anlayamaaaazsın\r\n', '2020-02-17 13:50:22'),
(122, 29, 1, 'bendeki aşk sende olsa yaşayamazsın', '2020-02-17 13:50:43'),
(123, 28, 1, 'buradan bir atlı geçti\r\n', '2020-02-17 13:51:34'),
(124, 30, 2, 'hayat be', '2020-02-19 10:57:26'),
(125, 19, 2, 'olur olurrr', '2020-02-19 11:04:52'),
(126, 69, 4, 'oldumu lütfeenn brom benim', '2020-02-19 14:11:55'),
(127, 32, 1, 'merhaba kanka', '2020-02-19 14:16:27'),
(128, 53, 2, 'dsadas', '2020-02-19 17:11:02'),
(129, 53, 2, 'sdasa', '2020-02-19 17:11:12'),
(130, 17, 1, 'yapma bee', '2020-02-20 09:16:00'),
(131, 83, 1, 'hayret', '2020-02-20 09:33:03'),
(132, 84, 1, 'adam', '2020-02-20 11:40:13'),
(133, 53, 1, 'cevap', '2020-02-20 15:37:09'),
(134, 93, 1, 'cevap\r\n', '2020-02-20 22:46:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dosyalar`
--

CREATE TABLE `dosyalar` (
  `id` int(11) NOT NULL,
  `soru_id` int(11) NOT NULL,
  `dosya_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `dosyalar`
--

INSERT INTO `dosyalar` (`id`, `soru_id`, `dosya_url`) VALUES
(11, 103, 'images/upload/indir.jpg'),
(12, 104, '/images/upload/indir1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_mail` varchar(80) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `departman` varchar(200) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_mail`, `departman`, `kullanici_adsoyad`, `kullanici_password`) VALUES
(1, 'admin', '2', 'Oğulcan Pabuccu', '123456'),
(2, 'user', '2', 'Ahmet Mehmet', '123456'),
(3, 'kullanici1', '1', 'Kadir İnanır', '123456'),
(4, 'huseyin', '1', 'Hüseyin Ulan', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `soru`
--

CREATE TABLE `soru` (
  `id` int(11) NOT NULL,
  `soran` varchar(50) NOT NULL,
  `departman` varchar(200) NOT NULL,
  `alici` varchar(50) NOT NULL,
  `onem` int(2) NOT NULL,
  `soru_zaman` varchar(500) DEFAULT NULL,
  `soruldugu_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `soru_konu` varchar(200) NOT NULL,
  `soru_detay` text NOT NULL,
  `sonuc` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `soru`
--

INSERT INTO `soru` (`id`, `soran`, `departman`, `alici`, `onem`, `soru_zaman`, `soruldugu_zaman`, `soru_konu`, `soru_detay`, `sonuc`) VALUES
(92, 'Kadir İnanır', '1', 'Hüseyin Ulan', 2, '02/19/2020 16:18', '2020-02-20 13:19:03', 'konuuu', 'dsada', '0'),
(93, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/27/2020 16:19', '2020-02-20 13:19:53', 'konu2', 'agagagga', '0'),
(94, 'Kadir İnanır', '1', 'Hüseyin Ulan', 3, '02/27/2020 17:20', '2020-02-20 14:20:52', 'dsadas', 'dsadas', '0'),
(95, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/27/2020 17:33', '2020-02-20 14:33:38', 'olduumu hocam', 'olmuştur be', '1'),
(96, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 3, '02/21/2020 22:48', '2020-02-20 19:48:31', 'dşasfkjuasbdkljşlasdjas', 'dsasdas', '1'),
(97, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 3, '02/21/2020 22:49', '2020-02-20 19:49:51', 'dsadas', 'dsadas', '0'),
(98, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/27/2020 22:53', '2020-02-20 19:54:03', 'dsadas', 'dasdas', '0'),
(99, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 2, '02/27/2020 22:55', '2020-02-20 19:55:29', 'dasdas', 'dasdas', '0'),
(100, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 2, '02/20/2020 22:56', '2020-02-20 19:56:36', 'dasdas', 'dsadas', '0'),
(101, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/20/2020 22:56', '2020-02-20 19:57:14', 'dsadas', 'dsadsa', '0'),
(102, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/27/2020 22:58', '2020-02-20 19:58:34', 'dsa', 'dasdsa', '0'),
(103, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/21/2020 23:00', '2020-02-20 20:00:35', 'dsadas', 'dsadsa', '0'),
(104, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/27/2020 23:01', '2020-02-20 20:01:43', 'dsadas', 'dsdas', '0'),
(105, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/19/2020 01:04', '2020-02-20 22:04:43', 'dsada', 'dsads', '0'),
(106, 'Oğulcan Pabuccu', '2', 'Ahmet Mehmet', 1, '02/21/2020 01:04', '2020-02-20 22:05:03', 'dsada', 'dsadas', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cevap`
--
ALTER TABLE `cevap`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dosyalar`
--
ALTER TABLE `dosyalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `soru`
--
ALTER TABLE `soru`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cevap`
--
ALTER TABLE `cevap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- Tablo için AUTO_INCREMENT değeri `dosyalar`
--
ALTER TABLE `dosyalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `soru`
--
ALTER TABLE `soru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
