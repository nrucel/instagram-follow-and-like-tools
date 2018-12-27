-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 27 Ara 2018, 12:51:03
-- Sunucu sürümü: 10.2.20-MariaDB
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tnrucelcom49_i`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(255) NOT NULL,
  `igID` bigint(20) UNSIGNED NOT NULL,
  `adSoyad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `igFoto` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullaniciAdi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `takipEdilenSayisi` int(10) NOT NULL,
  `takipciSayisi` int(10) NOT NULL,
  `takipKredi` int(10) NOT NULL,
  `begeniKredi` int(10) NOT NULL,
  `yorumKredi` int(10) NOT NULL,
  `storyKredi` int(10) NOT NULL,
  `izlenmeKredi` int(10) NOT NULL,
  `saveKredi` int(10) NOT NULL,
  `yorumBegeniKredi` int(10) NOT NULL,
  `canliYayinKredi` int(10) NOT NULL,
  `sessID` varchar(12) CHARACTER SET utf8 NOT NULL,
  `ipAdres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `igID`, `adSoyad`, `igFoto`, `kullaniciAdi`, `takipEdilenSayisi`, `takipciSayisi`, `takipKredi`, `begeniKredi`, `yorumKredi`, `storyKredi`, `izlenmeKredi`, `saveKredi`, `yorumBegeniKredi`, `canliYayinKredi`, `sessID`, `ipAdres`) VALUES
(1, 9260881696, 'deniz alpuğan', 'https://scontent-cdg2-1.cdninstagram.com/vp/857fdff8f647f8dbfc5718582c95c1d7/5C95E7F4/t51.2885-19/s150x150/47101021_235961533966518_8925778623407849472_n.jpg', 'denizalpugan49', 1906, 1173, 18, 30, 30, 30, 30, 30, 30, 30, '927264612', '5.46.117.217');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `vipler`
--

CREATE TABLE `vipler` (
  `id` int(255) NOT NULL,
  `adSoyad` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sifre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `yetkili` int(1) NOT NULL DEFAULT 0,
  `kayitTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `vipeNot` text CHARACTER SET utf8 NOT NULL,
  `sessID` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `vipler`
--

INSERT INTO `vipler` (`id`, `adSoyad`, `sifre`, `email`, `yetkili`, `kayitTarihi`, `vipeNot`, `sessID`) VALUES
(1, 'Nurullah Çelik', 'nrcl', 'nurullahcelik@yandex.com', 1, '2018-12-27 09:50:44', '', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `vipler`
--
ALTER TABLE `vipler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `vipler`
--
ALTER TABLE `vipler`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
