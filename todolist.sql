-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Şub 2020, 15:18:23
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.2

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
  `cevaplayan_id` int(11) NOT NULL DEFAULT 0,
  `cevap_detay` text NOT NULL,
  `cevaplama_zamanı` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `cevap`
--

INSERT INTO `cevap` (`id`, `soru_id`, `cevaplayan_id`, `cevap_detay`, `cevaplama_zamanı`) VALUES
(115, 18, 1, 'Güzel günler göreceğiz çocuklar\r\n', '2020-02-14 15:31:22'),
(116, 18, 1, 'Motorları maviliklere süreceğiz', '2020-02-14 15:31:33');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_mail` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_mail`, `kullanici_adsoyad`, `kullanici_password`) VALUES
(1, 'admin', 'Oğulcan Pabuccu', '123456'),
(2, 'user', 'Ahmet Mehmet', '123456'),
(3, 'kullanici1', 'Kadir İnanır', '123456'),
(4, 'huseyin', 'Hüseyin Ulan', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `soru`
--

CREATE TABLE `soru` (
  `id` int(11) NOT NULL,
  `soran` varchar(50) NOT NULL,
  `alici` varchar(50) NOT NULL,
  `onem` int(2) NOT NULL,
  `soru_zaman` varchar(500) DEFAULT NULL,
  `soruldugu_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `soru_konu` varchar(200) NOT NULL,
  `soru_detay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `soru`
--

INSERT INTO `soru` (`id`, `soran`, `alici`, `onem`, `soru_zaman`, `soruldugu_zaman`, `soru_konu`, `soru_detay`) VALUES
(17, 'admin', 'kullanici1', 1, '02/18/2020 17:34', '2020-02-11 14:34:58', 'dsa', 'dsaas'),
(18, 'admin', 'kullanici1', 1, '02/18/2020 17:35', '2020-02-11 14:35:29', 'dsa', 'das'),
(19, 'admin', 'huseyin', 1, '02/18/2020 17:43', '2020-02-11 14:43:25', 'konu', 'soru'),
(20, 'admin', 'huseyin', 1, '02/18/2020 17:43', '2020-02-11 14:43:27', 'konu', 'soru'),
(27, 'admin', 'kullanici1', 3, '02/26/2020 09:19', '2020-02-12 06:19:31', 'konuuu', 'hayat'),
(28, 'admin', 'user', 3, '02/11/2020 13:22', '2020-02-12 10:22:39', 'konuuu', 'sorularrr'),
(29, 'admin', 'kullanici1', 3, '02/18/2020 15:18', '2020-02-12 12:20:34', 'Oldumu Abi', 'Bence oldu abi alt tarafa da cevap alanını ekleyip cevap tablosu ile soru tablo id\'lerini eşleştirebilirsem tek sıkıntı görüntü olacak... ');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cevap`
--
ALTER TABLE `cevap`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `soru`
--
ALTER TABLE `soru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
