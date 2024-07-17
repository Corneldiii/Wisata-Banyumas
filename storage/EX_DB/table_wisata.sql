/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `table_wisata`;
CREATE TABLE `table_wisata` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_wisata` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_tiket` decimal(8,2) NOT NULL,
  `latitude` decimal(20,15) NOT NULL,
  `longitude` decimal(20,15) NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `table_wisata` (`id`, `nama_wisata`, `alamat`, `deskripsi`, `harga_tiket`, `latitude`, `longitude`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Baturraden Adventure Forest', 'Dusun II Pandak, Karangsalam, Baturraden, Kabupaten Banyumas', 'Baturraden Adventure Forest memiliki Udara sejuk dan cocok sekali untuk melepas penat, selain itu kamu juga tersedia outbound mulai dari ing slide, water adventure, tree trek adventure, mini circuit bike, terapy, canyon adventure, bungee trampoline, reppelling dan masih banyak lagi', '200000.00', '-7.306589387339000', '109.243613296871690', 'storage/img/index/wisata/1720766274.jpg', '2024-07-12 06:37:54', '2024-07-12 06:37:54');
INSERT INTO `table_wisata` (`id`, `nama_wisata`, `alamat`, `deskripsi`, `harga_tiket`, `latitude`, `longitude`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Curug Jenggala', 'Jl. Pangeran Limboro, Dusun III Kalipagu, Ketenger, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53152', 'Curug Jenggala adalah air terjun yang berlokasi di Ketenger, Baturaden, Banyumas. Air terjun ini memiliki ketinggian 30 meter dari permukaan tanah. Curug ini mempunyai tiga air terjun yang tingginya sejajar, dengan air terjun yang di tengah memiliki arus yang paling deras.', '15000.00', '-7.308820323285858', '109.208805337774990', 'storage/img/index/wisata/1720766345.jpg', '2024-07-12 06:39:05', '2024-07-12 06:39:05');
INSERT INTO `table_wisata` (`id`, `nama_wisata`, `alamat`, `deskripsi`, `harga_tiket`, `latitude`, `longitude`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Curug Bayan', 'Dusun II Pandak, Karangsalam, Baturraden, Kabupaten Banyumas', 'Curug Bayan merupakan salah satu objek wisata yang berada di desa Ketengger, kecamatan Baturaden, kabupaten Banyumas. Curug Bayan memiliki keunikan tersendiri karena terletak dibawah lereng gunung slamet dan memiliki suasana yang sejuk dan dingin.', '15000.00', '-7.325129084710706', '109.218582494354690', 'storage/img/index/wisata/1720766412.jpg', '2024-07-12 06:40:12', '2024-07-12 06:40:12');
INSERT INTO `table_wisata` (`id`, `nama_wisata`, `alamat`, `deskripsi`, `harga_tiket`, `latitude`, `longitude`, `foto`, `created_at`, `updated_at`) VALUES
(4, 'Bukit Bintang Baturaden', 'Jl. Pangeran Limboro, Dusun III Kalipagu, Ketenger, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53152', 'Bukit Bintang Baturraden merupakan salah satu tempat wisata di Kabupaten Banyumas atau lebih dikenal Purwokerto yang cocok untuk dijadikan tempat nongkrong santai bersama orang-orang tersayang saat liburan. Bukit Bintang Baturraden selalu menjadi pilihan tempat bagi wiatawan yang ingin melihat keindahan Kota Purwokerto di ketinggian.', '0.00', '-7.312352378947814', '109.230005072349670', 'storage/img/index/wisata/1720766470.jpg', '2024-07-12 06:41:10', '2024-07-12 06:41:10'),
(5, 'Hutan Pinus Limpakuwus', 'RT.5/RW.1, Sawah & Hutan, Limpakuwus, Kec. Sumbang, Kabupaten Banyumas, Jawa Tengah 53151', 'Objek wisata ini begitu sejuk, karena terletak di kaki Gunung Slamet. Pemandangan yang disuguhkan begitu mempesona, hijau dimana-mana dengan naungan langit yang biru. Pemandangan alam ini dapat menjadi objek foto yang memukau jika diambil dari angle yang tepat. Selain itu, objek wisata ini juga menyuguhkan berbagai wahana permainan. Yang mana dapat dinikmati mulai dari anak-anak hingga orang dewasa. Ditambah lagi, spot-spot foto yang dibuat dengan sangat baik', '20000.00', '-7.307061836443870', '109.243613296871690', 'storage/img/index/wisata/1720766525.jpg', '2024-07-12 06:42:05', '2024-07-12 06:42:05'),
(6, 'Telaga Sunyi', 'Sawah & Hutan, Limpakuwus, Kec. Sumbang, Kabupaten Banyumas, Jawa Tengah 53183', 'Letaknya jauh dari keramaian dengan suasana alam nan menawan, sejuk dan masih sangat alami. Air telaga ini sangat jernih dan berwarna biru kehijauan. Pemandangan alam hijau yang ada disekitarnya juga cocok sekali dijadikan spotfoto.', '15000.00', '-7.306898053786324', '109.243196212475600', 'storage/img/index/wisata/1720766608.jpg', '2024-07-12 06:43:28', '2024-07-12 06:43:28'),
(7, 'Curug Kembar', 'RT.05/RW.03, Dusun II, Kemutug Lor, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53151', 'm Memasuki Kawasan Curug Kembar, wisatawan akan dimanjakan dengan keindahan alam. Ada hamparan sawah dan pohon-pohon. Kicauan burung terdengar seakan menyambut kalian. Sambil menikmati keindahan alamnya, kita juga bisa bermain air di Curug Kembar. Airnya yang jernih dan sejuk bisa membuat segar kembali.', '10000.00', '-7.319908756338176', '109.238518752093900', 'storage/img/index/wisata/1720766739.jpg', '2024-07-12 06:45:39', '2024-07-12 06:45:39'),
(8, 'Curug Gomblang', 'Dusun III, Kalisalak, Kec. Kedungbanteng, Kabupaten Banyumas, Jawa Tengah 53152', 'Curug Gomblang, sebuah air terjun eksotis yang berada di kaki Gunung Slamet. Merupakan wisata Banyumas yang sangat digandrungi, khususnya para kawula muda yang haus akan konten keren berlatarkan alam terbuka.', '10000.00', '-7.323261964855418', '109.181324227102510', 'storage/img/index/wisata/1720766790.jpg', '2024-07-12 06:46:30', '2024-07-12 06:46:30'),
(9, 'Goa Sarabadak', 'Lokawisata Baturraden, Dusun III Kalipagu, Ketenger, Baturraden, Kabupaten Banyumas, Jawa Tengah', 'Goa ini menawarkan keindahan alam yang unik dengan adanya gua yang terbentuk dari endapan air belerang dan menjadi tempat pertemuan antara aliran air dingin dan panas. Formasi bebatuan berwarna kuning dari endapan air belerang ini menjadi daya tarik tersendiri yang mengesankan.', '3000.00', '-7.310236817237274', '109.217587673059820', 'storage/img/index/wisata/1720766909.jpg', '2024-07-12 06:48:29', '2024-07-12 06:48:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;