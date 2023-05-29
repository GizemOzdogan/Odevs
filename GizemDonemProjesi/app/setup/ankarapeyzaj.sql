

-- Proje detaylari icin insert cumleleri eklenecek

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `groups` (
  `gid` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `groups` (`gid`, `name`, `permissions`) VALUES
(1, 'Standard User', ''),
(2, 'Administrator', '{\"admin\": 1,\r\n\"moderator\" :1}');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined` datetime NOT NULL,
  `groups` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `groups`
  ADD PRIMARY KEY (`gid`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `groups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;


CREATE TABLE `product`
(
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `price` decimal(10,2) NOT NULL,
    `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `product` (`id`, `name`, `short_description`,`price`,`image_name`) VALUES
(1, 'Bonsai Ağacı', 'Bonsai, yaşayan ağaçlara duyulan saygıyı ve bu ağaçların yaşamasını konu alan bir sanattır.', 100, 'bonzai.jpg'),
(2, 'Kadife Çiçeği', 'Güneş almayı seven bir bitki olmasından ötürü Akdeniz Bölgesinde rahat yetişir.', 50, 'KadifeÇiçeği.jpg'),
(3, 'Kaktüs', 'Kaktüs, birçok çeşide sahip bir bitkidir. Dekoratif ve ekonomiktir. Bakımı diğer bitkilere göre kolaydır.', 30, 'kaktüs.jpg'),
(4, 'Mavi Ortanca', 'Genellikle yaz aylarında rengarenk ve büyük gösterişli çiçek açar. Hazirandan başlayıp Ekime kadar çiçekli kalabilir.', 40, 'MaviOrtanca.jpg'),
(5, 'Anemon Çiçeği', 'Bu çiçekler,ilkbaharın başından ortasına kadar çiçek açar ve beyazdan kırmızıya ve mora kadar çeşitli renklerde gelir.', 20, 'anemone.jpg.webp'),
(6, 'Açelya', 'Pembe, beyaz, mor ve diğer güzel tonları içeren bir dizi renkte gelirler. Bu bitki bahçenize güzel bir katkı sağlayabilir.', 30, 'azalea.jpg'),
(7, 'Begonya', 'Begonya, büyümesi kolay bir çiçektir. Birçok farklı şekil, boyut ve renkte gelirler. Çok yıllık bir bitkidir.', 40, 'begonia.jpg.webp'),
(8, 'Kalendula Çiçeği', 'Sarı ve turuncu renk paletine sahip bitki kesme çiçek olarak satılır. Canlılığını uzun süre korur.', 50, 'calendula.jpg.webp'),
(9, 'Zambak', 'Çeşitli renklerde mevcutturlar, klasik beyaz, zarif bir hediye veya evinize şıklık katar.', 60, 'calla-lily-white.jpg.webp'),
(10, 'Tavşankulağı', 'Tavşankulağı, kalp şeklindeki yaprakları nedeniyle popülerdir. İkonik pembe renkle eşsiz bir görünümü vardır.', 70, 'cyclamen.jpg.webp'),
(11, 'Papatya', 'Kolay yetişen, zarif ve ikonik bir çiçektir. Pembeden sarıya farklı renklerde bulunur.', 80, 'daisy.jpg.webp'),
(12, 'Sümbül', 'Eşsiz renk ve kokusuyla dekoratif ve kullanışlıdır. Birçok rengi bulunur.', '90', 'hyacinth.jpg');

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


Create table `product_detail`
(
    `id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `growth_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `growth_climate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `watering` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `lifetime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `decorative_purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `product_detail` 
(`id`,`product_id`,`description`,`growth_duration`,`growth_climate`,`watering`,`height`,`lifetime`,`color`,`purpose`,`decorative_purpose`) 
VALUES
(1,1,
'Bonsai, yaşayan ağaçlara duyulan saygıyı ve bu ağaçların yaşamasını konu alan bir sanattır. Bonsailer minyatür olmalarına rağmen çevremizde gördüğümüz ağaçlardan hiçbir farkları yoktur. Özenle seçilen ağaç dalları, budanarak ve ilgiyle yetiştirilerek minyatür ağaç görünümü kazanır.',
'8 Ay',
'Nemli toprak, bol ışık ve doğal koşullara dikkat edilmelidir.',
'İki Günde bir',
'15 cm - 20 cm',
'1 Ay - 3 Yıl',
'Yeşil',
'Dekoratif, Sağlık, Kozmetik Sektörlerinde kullanılmaktadır.',
'Sarı çiçeklerin yanında çok uyumlu bir şekilde kullanılabilir.');


ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `product_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



Create table `product_image`
(
    `id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `product_image` 
(`id`,`product_id`,`image_url`) 
VALUES 
(1,1,'BonsaiAğacı/5017.jpg'),
(2,1,'BonsaiAğacı/71Y4cJ1NmjS.AC_UF1000,1000_QL80.jpg'),
(3,1,'BonsaiAğacı/bonsai-agaci-kc927779-1-1.webp'),
(4,1,'BonsaiAğacı/bonsai-agaci-kc927779-1-1.webp'),
(5,2,'kadifecicek/th-1081882034.png'),
(6,2,'kadifecicek/th-2511035984.png'),
(7,2,'kadifecicek/th-1586210085.png'),
(8,3,'cactus/th-4052822301.png'),
(9,3,'cactus/th-4001005412.png'),
(10,3,'cactus/th-330328137.png'),
(11,4,'mavi_ort/th-1586398175.png'),
(12,4,'mavi_ort/th-3041293167.png'),
(13,4,'mavi_ort/th-1570836188.png'),
(14,5,'anemon/anemon1.png'),
(15,5,'anemon/th-719886012.png'),
(16,5,'anemon/th-1472426588.png'),
(17,6,'acelya/th-2434062030.png'),
(18,6,'acelya/th-2293265552.png'),
(19,6,'acelya/th-1139043926.png'),
(20,7,'begonya/th-795224014.png'),
(21,7,'begonya/th-1490309014.png'),
(22,7,'begonya/th-4081800196.png'),
(23,8,'calendula/th-4151696322.png'),
(24,8,'calendula/th-451752828.png'),
(25,8,'calendula/th-1978502444.png'),
(26,9,'zambak/th-2122600130.png'),
(27,9,'zambak/th-4199331108.png'),
(28,9,'zambak/th-3322353509.png'),
(29,10,'tavsank/th-1404556114.png'),
(30,10,'tavsank/th-1472875018.png'),
(31,10,'tavsank/th-165824450.png'),
(32,11,'papatya/th-2853854802.png'),
(33,11,'papatya/th-2444643430.png'),
(34,11,'papatya/th-2836646082.png'),
(35,12,'sumbul/th-3922147350.png'),
(36,12,'sumbul/th-3743737988.png'),
(37,12,'sumbul/th-379311360.png');


ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  

Create table `project`
(
    `id` int(11) NOT NULL,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `project` (`id`,`name`,`short_description`, `image_name`)
VALUES
(1,'Avcılar Vatan Kavşağı','Avcılar Vatan Kavşağı peyzaj çalışması, dekoratif çiçekler...','proje1.jpg'),
(2,'Halıcıoğlu','Halıcıoğlu peyzaj çalışması, dekoratif çiçekler...','proje2.jpg'),
(3,'Gülhane Parkı','Gülhane Parkı peyzaj çalışması, dekoratif çiçekler...','proje3.jpg'),
(4,'Barış Parkı','Barış Parkı peyzaj çalışması, dekoratif çiçekler...','proje4.jpg'),
(5,'Çoban Çeşme Kavşağı','Çoban Çeşme Kavşağı peyzaj çalışması dekoratif çiçekler, ağaçlandırma...','proje5.jpg'),
(6,'Dragos Sosyal Tesis','Dragos Sosyal Tesis peyzaj çalışması, dekoratif çiçekler, ağaçlandırma...','proje6.jpg'),
(7,'Gözdağı Korusu','Gözdağı Korusu peyzaj çalışması, dekoratif çiçekler...','proje7.jpg'),
(8,'Anıtpark','Anıtpark Projesi peyzaj çalışması, dekoratif çiçekler...','proje8.jpg'),
(9,'Havaalanı Yolu Orta Refüj','Havaalanı Yolu Orta Refüj peyzaj çalışması, dekoratif çiçekler...','proje9.jpg'),
(10,'Emirgan Korusu','Emirgan Korusu peyzaj çalışması, dekoratif çiçekler...','proje10.jpg'),
(11,'Arnavutköy Parkı','Arnavutköy Parkı peyzaj çalışması dekoratif çiçekler...','proje11.jpg'),
(12,'Küçükçekmece Yeşilyurt Arası','Küçükçekmece Yeşilyurt arası peyzaj çalışması...','proje12.jpg');


ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


Create table `project_detail`
(
    `id` int(11) NOT NULL,
    `project_id` int(11) NOT NULL,
    `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `project_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `project_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `usage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `t_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `f_region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `project_detail` (`id`,`project_id`,`description`,`project_duration`,`project_date`,`usage`,`t_region`,`f_region`,`customer`)
VALUES
(1, 1, 
'Avcılar Vatan Kavşağı peyzaj çalışması, dekoratif çiçekler, ağaçlandırma çalışması.',
'1 Ay', 
'2020-01-01',
'Pembe, Beyaz Orkide, Kayın Ağacı',
'80 Metrekare', 
'290 Metrekare',
'Avcılar Belediyesi');




ALTER TABLE `project_detail`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `project_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


Create table `project_image`
(
    `id` int(11) NOT NULL,
    `project_id` int(11) NOT NULL,
    `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `project_image` (`id`,`project_id`,`image_url`)
VALUES
(1,1,'AvcilarKavsagi/1.jpg'),
(2,1,'AvcilarKavsagi/2.jpg'),
(3,1,'AvcilarKavsagi/3.jpg'),
(4,1,'AvcilarKavsagi/3.jpg'),
(5,2,'Halicioglu/1.jpg'),
(6,2,'Halicioglu/2.jpg'),
(7,2,'Halicioglu/3.jpg'),
(8,2,'Halicioglu/4.jpg'),
(10,3,'GulhaneParki/1.jpg'),
(11,3,'GulhaneParki/2.jpg'),
(12,3,'GulhaneParki/3.jpg'),
(13,3,'GulhaneParki/4.jpg'),
(14,3,'GulhaneParki/5.jpg'),
(15,4,'BarisParki/1.jpg'),
(16,4,'BarisParki/2.jpg'),
(17,4,'BarisParki/3.jpg'),
(18,4,'BarisParki/4.jpg'),
(19,4,'BarisParki/5.jpg'),
(20,5,'CobanCesme/1.jpg'),
(21,5,'CobanCesme/2.jpg'),
(22,6,'Dragos/1.jpg'),
(23,6,'Dragos/2.jpg'),
(24,6,'Dragos/3.jpg'),
(25,6,'Dragos/4.jpg'),
(26,7,'GozdagiKorusu/1.jpg'),
(27,7,'GozdagiKorusu/2.jpg'),
(28,7,'GozdagiKorusu/3.jpg'),
(29,7,'GozdagiKorusu/4.jpg'),
(30,8,'Anitpark/1.jpg'),
(31,8,'Anitpark/2.jpg'),
(32,8,'Anitpark/3.jpg'),
(33,9,'Havaalani/1.jpg'),
(34,9,'Havaalani/2.jpg'),
(35,9,'Havaalani/3.jpg'),
(36,10,'EmirganKorusu/1.jpg'),
(37,10,'EmirganKorusu/2.jpg'),
(38,10,'EmirganKorusu/3.jpg'),
(39,10,'EmirganKorusu/4.jpg'),
(40,11,'Arnavutkoy/1.jpg'),
(41,11,'proje11.jpg'),
(42,12,'Kucukcekmece/1.jpg'),
(43,12,'Kucukcekmece/2.jpg'),
(44,12,'Kucukcekmece/3.jpg'),
(45,12,'Kucukcekmece/4.jpg');


ALTER TABLE `project_image`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `project_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


Create table `contact_requests`
(
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- Order Status Enum 
-- 0 - Pending
-- 1 - Shipped
-- 2 - Delivered
-- 3 - Cancelled

Create table `app_order` 
(
    `id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `status` int(11) NOT NULL,
    `total_price` decimal(10,2) NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `app_order`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `app_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


Create table `app_order_items`
(
    `id` int(11) NOT NULL,
    `order_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `price` decimal(10,2) NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `app_order_items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `app_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
