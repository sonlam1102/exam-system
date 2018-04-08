-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: exam
-- ------------------------------------------------------
-- Server version	5.7.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8,
  `contest_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contest_id` (`contest_id`),
  CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=503 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (133,46,'Phím 10',7),(134,46,'Phím ESC',7),(135,46,'Phím Enter ',7),(136,46,'Phím Delete',7),(137,47,'5',7),(138,47,'#VALUE!',7),(139,47,'#NAME!',7),(140,48,'Insert - Column   ',7),(141,48,'View - Column ',7),(142,48,'Format - Column   ',7),(143,48,'Table - Column ',7),(144,49,'Là một loại virus tin học chủ yếu lây lan vào ổ đĩa B: ',7),(145,49,'Là một loại virus tin học chủ yếu lây lan vào các bộ trữ điện ',7),(146,49,'Là loại viurs tin học chủ yếu lây lan vào các mẫu tin khởi động (Boot record )',7),(147,49,'Là loại virus tin học chủ yếu lây lan vào các tệp của WinWord và Excel ',7),(148,50,'Mở một hồ sơ mới',7),(149,50,'Đóng hồ sơ đang mở ',7),(150,50,'Mở một hồ sơ đã có   ',7),(151,50,'Lưu hồ sơ vào đĩa ',7),(152,51,'Ram',7),(153,51,'Bộ nhớ ngoài ',7),(154,51,'Chỉ nạp vào bộ nhớ trong khi chạy chương trình ứng dụng',7),(155,51,'Tất cả đều sai ',7),(156,52,'Ctrl – Z          ',7),(157,52,'Ctrl – X        ',7),(158,52,'Ctrl - V             ',7),(159,52,'Ctrl - Y ',7),(160,53,'Ctrl + A          ',7),(161,53,'Alt + A         ',7),(162,53,'Alt + F              ',7),(163,53,'Ctrl + F ',7),(164,54,'#VALUE!         ',7),(165,54,'Tin hoc  ',7),(166,54,'2008 ',7),(167,54,'Tin hoc2008 ',7),(168,55,'Mạng cục bộ, mạng diện rộng, mạng toàn cầu   ',7),(169,55,'Mạng cục bộ, mạng diện rộng, mạng toàn cục ',7),(170,55,'Mạng cục bộ, mạng toàn cục, mạng toàn cầu   ',7),(171,55,'Mạng diện rộng, mạng toàn cầu, mạng toàn cục ',7),(172,56,'Tạo tệp văn bản mới   ',7),(173,56,'Chức năng thay thế trong soạn thảo ',7),(174,56,'Định dạng chữ hoa   ',7),(175,56,'Chức năng thay thế trong soạn thảo ',7),(176,57,'Shift+Home   ',7),(177,57,'Alt+Home ',7),(178,57,'Ctrl+Home   ',7),(179,57,'Shift+Ctrl+Home ',7),(180,58,'Chọn đối tượng, rồi chọn File - Copy   ',7),(181,58,'Chọn đối tượng, rồi chọn File - Open ',7),(182,58,'Chọn đối tượng, rồi chọn File - Restore   ',7),(183,58,'Chọn đối tượng, rồi chọn File - Move To Folder... ',7),(184,59,'Dấu chấm hỏi (?)          ',7),(185,59,'Dấu bằng (= )          ',7),(186,59,'Dấu hai chấm (: )           ',7),(187,59,'Dấu đô la ($) ',7),(188,60,'Format - Slide Layout... ',7),(189,60,'View - Slide Layout... ',7),(190,60,'Insert - Slide Layout...   ',7),(191,60,'File - Slide Layout... ',7),(192,61,'Biểu đồ cột rất thích hợp để so sánh dữ liệu có trong nhiều cột ',7),(193,61,'Biểu đồ hình tròn rất thích hợp để mô tả tỉ lệ của giá trị dữ liệu so với tổng thể ',7),(194,61,'Biểu đồ đường gấp khúc dùng so sánh dữ liệu và dự đoán xu thế tăng hay giảm của dữ liệu ',7),(195,61,'Cả 3 câu đều đúng  ',7),(196,62,'Table - Cells   ',7),(197,62,'Table - Merge Cells ',7),(198,62,'Tools - Split Cells   ',7),(199,62,'Table - Split Cells ',7),(200,63,'Chương trình bảng tính bị nhiễm virus ',7),(201,63,'Công thức nhập sai và Excel thông báo lỗi',7),(202,63,'Hàng chứa ô đó có độ cao quá thấp nên không hiển thị hết chữ số ',7),(203,63,'Cột chứa ô đó có độ rộng quá hẹp nên không hiển thị hết chữ số ',7),(204,64,'File - Bullets and Numbering ',7),(205,64,'Tools - Bullets and Numbering ',7),(206,64,'Format - Bullets and Numbering   ',7),(207,64,'Edit - Bullets and Numbering ',7),(208,65,'Table - Merge Cells   ',7),(209,65,'Tools - Split Cells ',7),(210,65,'Tools - Merge Cells   ',7),(211,65,'Table - Split Cells ',7),(212,66,'My Computer hoặc Windows Explorer  ',7),(213,66,'My Computer hoặc Recycle Bin ',7),(214,66,'Windows Explorer hoặc Recycle Bin   ',7),(215,66,'My Computer hoăc My Network Places',7),(216,67,'Mạng cục bộ',7),(217,67,'Mạng diện rộng   ',7),(218,67,'Mạng toàn cầu          ',7),(219,67,'Một ý nghĩa khác ',7),(220,68,'3',7),(221,68,'HOC ',7),(222,68,'TIN',7),(223,68,'Tinhoc ',7),(224,69,'Xóa tệp văn bản   ',7),(225,69,'Chèn kí hiệu đặc biệt ',7),(226,69,'Lưu tệp văn bản vào đĩa   ',7),(227,69,'Tạo tệp văn bản mới ',7),(228,70,'Edit - New Slide ',7),(229,70,'File - New Slide ',7),(230,70,'Slide Show - New Slide   ',7),(231,70,'Insert - New Slide ',7),(232,71,'Cắt một đoạn văn bản ',7),(233,71,'Dán một đoạn văn bản từ Clipboard ',7),(234,71,'Sao chép một đoạn văn bản   ',7),(235,71,'Cắt và sao chép một đoạn văn bản ',7),(236,72,'2',7),(237,72,'3',7),(238,72,'4',7),(239,72,'5',7),(240,73,'View - Exit   ',7),(241,73,'Edit - Exit ',7),(242,73,'Window - Exit   ',7),(243,73,'File - Exit ',7),(244,74,'Control Windows   ',7),(245,74,'Control Panel ',7),(246,74,'Control System',7),(247,74,'Control Desktop ',7),(248,75,'Bấm phím Enter   ',7),(249,75,'Bấm phím Space ',7),(250,75,'Bấm phím mũi tên di chuyển   ',7),(251,75,'Bấm phím Tab ',7),(252,76,'Microsoft Office   ',7),(253,76,'Windows Explorer ',7),(254,76,'Control Panel   ',7),(255,76,'Windows Explorer ',7),(256,77,'Edit - New, sau đó chọn Folder   ',7),(257,77,'Tools - New, sau đó chọn Folder ',7),(258,77,'File - New, sau đó chọn Folder',7),(259,77,'Windows - New, sau đó chọn Folder ',7),(260,78,'Thanh công cụ định dạng   ',7),(261,78,'Thanh công cụ chuẩn ',7),(262,78,'Thanh công cụ vẽ   ',7),(263,78,'Thanh công cụ bảng và đường viền ',7),(264,79,'Insert - Header and Footer ',7),(265,79,'Tools - Header and Footer ',7),(266,79,'View - Header and Footer   ',7),(267,79,'Format - Header and Footer ',7),(268,80,'Giữ phím Ctrl và nháy chuột vào từng mục muốn chọn trong danh sách ',7),(269,80,'Giữ phím Alt và nháy chuột vào từng mục muốn chọn trong danh sách ',7),(270,80,'Nháy chuột ở mục đầu, ấn và giữ Shift nháy chuột ở mục cuối ',7),(271,80,'Giữ phím Tab và nháy chuột vào từng mục muốn chọn trong danh sách ',7),(272,81,'Format - Slide Design...   ',7),(273,81,'Tools - Slide Design... ',7),(274,81,'Insert - Slide Design...   ',7),(275,81,'Slide Show - Slide Design... ',7),(276,82,'Dữ liệu kiểu số sẽ mặc nhiên căn thẳng lề trái ',7),(277,82,'Dữ liệu kiểu kí tự sẽ mặc nhiên căn thẳng lề trái ',7),(278,82,'Dữ liệu kiểu thời gian sẽ mặc nhiên căn thẳng lề phải ',7),(279,82,'Dữ liệu kiểu ngày tháng sẽ mặc nhiên căn thẳng lề phải ',7),(280,83,'Thông qua người sử dụng, khi dùng tây ẩm ướt sử dụng máy tính ',7),(281,83,'Thông qua hệ thống điện - khi sử dụng nhiều máy tính cùng một lúc ',7),(282,83,'Thông qua môi trường không khí - khi đặt những máy tính quá gần nhau ',7),(283,83,'Các câu trên đều sai  ',7),(284,84,'5',7),(285,84,'#VALUE!   ',7),(286,84,'#DIV/0! ',7),(287,85,'B$1:D$10             ',7),(288,85,'$B1:$D10   ',7),(289,85,'B$1$:D$10$           ',7),(290,85,'$B$1:$D$10 ',7),(291,86,'Microsoft Equation   ',7),(292,86,'Ogranization Art ',7),(293,86,'Ogranization Chart   ',7),(294,86,'Word Art ',7),(295,87,'Phần mềm ứng dụng   ',7),(296,87,'Phần mềm hệ thống ',7),(297,87,'Phần mềm tiện ích   ',7),(298,87,'Tất cả đều đúng ',7),(299,88,'Chọn menu lệnh Edit - Copy   ',7),(300,88,'Bấm tổ hợp phím Ctrl - C  ',7),(301,88,'Cả 2 câu a. b. đều đúng   ',7),(302,88,'Cả 2 câu a. b. đều sai ',7),(303,89,'Centimeters',7),(304,89,'Đơn vị đo bắt buộc là Inches ',7),(305,89,'Đơn vị đo bắt buộc là Points ',7),(306,89,'Đơn vị đo bắt buộc là Picas ',7),(307,90,'#',7),(308,90,'<>',7),(309,90,'><',7),(310,90,'&',7),(311,91,'Tools - Insert Table   ',7),(312,91,'Insert - Insert Table ',7),(313,91,'Format - Insert Table   ',7),(314,91,'Table - Insert Table ',7),(315,92,'Portrait  ',7),(316,92,'Right  ',7),(317,92,'Left ',7),(318,92,'Landscape ',7),(319,93,'Tinhoc ',7),(320,93,'3 ',7),(321,93,'HOC',7),(322,93,'TIN ',7),(323,94,'Excel bắt buộc phải đánh số trang ở vị trí bên phải đầu mỗi trang ',7),(324,94,'Có thể khai báo đánh số trang in hoặc không ',7),(325,94,'Chỉ đánh số trang in nếu bảng tính gồm nhiều trang ',7),(326,94,'Vị trí của số trang luôn luôn ở góc dưới bên phải ',7),(327,95,'Tin hoc van phong   ',7),(328,95,'Tin hoc van phong ',7),(329,95,'TIN HOC VAN PHONG   ',7),(330,95,'Tin Hoc Van Phong ',7),(331,96,'problems',8),(332,96,'calculators',8),(333,96,'contests',8),(334,96,'engines',8),(335,97,'tow',8),(336,97,'grow',8),(337,97,'throw',8),(338,97,'shower',8),(339,98,'surface',8),(340,98,'place',8),(341,98,'face',8),(342,98,'pace',8),(343,99,'climb',8),(344,99,'comb',8),(345,99,'website',8),(346,99,'debt',8),(347,100,'plough',8),(348,100,'tough',8),(349,100,'enough',8),(350,100,'rough',8),(351,101,'follow',8),(352,101,'predict',8),(353,101,'priority',8),(354,101,'collapse',8),(355,102,'garbage',8),(356,102,'nature',8),(357,102,'pollute',8),(358,102,'benefit',8),(359,103,'answer',8),(360,103,'begin',8),(361,103,'refuse',8),(362,103,'complain',8),(363,104,'instrumental',8),(364,104,'communicate',8),(365,104,'mathematics',8),(366,104,'accidental',8),(367,105,'economics',8),(368,105,'capability',8),(369,105,'optimistic',8),(370,105,'passionate',8),(371,106,'playing',8),(372,106,'flying',8),(373,106,'doing',8),(374,106,'learning',8),(375,107,'sailor',8),(376,107,'driver',8),(377,107,'pilot',8),(378,107,'soldier',8),(379,108,'round',8),(380,108,'around',8),(381,108,'on',8),(382,108,'over',8),(383,109,'egg- shaped',8),(384,109,'shaped',8),(385,109,'eggs-shaped',8),(386,109,'shaped-eggs.',8),(387,110,'Fun',8),(388,110,'Funny',8),(389,110,'Funnily',8),(390,110,'Funniest',8),(391,111,'experient',8),(392,111,'experiment',8),(393,111,'experience',8),(394,111,'experienced',8),(395,112,'appear',8),(396,112,'appearance',8),(397,112,'appeared',8),(398,112,'appearing',8),(399,113,'imagine',8),(400,113,'imaginative',8),(401,113,'imaginative',8),(402,113,'imagination',8),(403,114,'entertain',8),(404,114,'entertainment',8),(405,114,'entertained',8),(406,114,'entertaining',8),(407,115,'camera',8),(408,115,'telescope',8),(409,115,'glasses',8),(410,115,'microscope',8),(411,116,'will',8),(412,116,'would',8),(413,116,'can',8),(414,116,'must',8),(415,117,'owed',8),(416,117,'owes',8),(417,117,'owned',8),(418,117,'owns',8),(419,118,'in',8),(420,118,'above',8),(421,118,'out',8),(422,118,'outer',8),(423,119,'will',8),(424,119,'might',8),(425,119,'is',8),(426,119,'was',8),(427,120,'will',8),(428,120,'are',8),(429,120,'would',8),(430,120,'were',8),(431,121,'as',8),(432,121,'if',8),(433,121,'unless',8),(434,121,'although',8),(435,122,'are',8),(436,122,'were',8),(437,122,'am',8),(438,122,'is',8),(439,123,'is/ would go',8),(440,123,'were/ would go',8),(441,123,'will be/ will go',8),(442,123,'were/ will go',8),(443,125,'decided',8),(444,125,'deciding',8),(445,125,'decides',8),(446,125,'decide',8),(447,126,'physics',8),(448,126,'physician',8),(449,126,'physical',8),(450,126,'physicist',8),(451,127,'homework',8),(452,127,'housework',8),(453,127,'aerobics',8),(454,127,'cooking',8),(455,128,'bad',8),(456,128,'perfect',8),(457,128,'sick',8),(458,128,'well',8),(459,129,'interest',8),(460,129,'interested',8),(461,129,'interesting',8),(462,129,'interests',8),(463,130,'orbit',8),(464,130,'class',8),(465,130,'place',8),(466,130,'world',8),(467,131,'feel',8),(468,131,'feeling',8),(469,131,'felt',8),(470,131,'felt',8),(471,132,'are',8),(472,132,'is',8),(473,132,'am',8),(474,132,'were',8),(475,133,'If I am rich, I can buy a car.',8),(476,133,'If I were rich, I can buy a car.',8),(477,133,'If I were rich, I could buy a car.',8),(478,133,'If I were rich, I will buy a car.',8),(479,134,'f you did not water these plants, they will die.',8),(480,134,'If you water these plants, they will die.',8),(481,134,'If you don’t water these plants, they will die',8),(482,134,'If you are watering these plants, they will die.',8),(483,135,'She may be working.',8),(484,135,'She can be working.',8),(485,135,'She must be working.',8),(486,135,'She will be working.',8),(487,136,'Nam is there.',8),(488,136,'Nam might be there.',8),(489,136,'Nam must be there.',8),(490,136,'Nam mightn’t be there.',8),(491,137,'If he were not short, he could play basketball.',8),(492,137,'If he is not short, he could play basketball.',8),(493,137,'If he were not short, he will play basketball.',8),(494,137,'If he were short, he could play basketball',8),(495,138,'If I had Nga’s address, I would meet her.',8),(496,138,'If I have Nga’s address, I would meet her.',8),(497,138,'I had Nga’s address, I will meet her.',8),(498,138,'B and C are correct.',8),(499,139,'Unless she lives far from school, she wouldn’t go to school late.',8),(500,139,'Unless she lived far from school, she would go to school late.',8),(501,139,'If she lived far from school, she wouldn’t go to school late.',8),(502,139,'If she didn’t live far from school, she wouldn’t go to school late.',8);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contest`
--

DROP TABLE IF EXISTS `contest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `contest_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contest`
--

LOCK TABLES `contest` WRITE;
/*!40000 ALTER TABLE `contest` DISABLE KEYS */;
INSERT INTO `contest` VALUES (7,6,'Kiem tra tin hoc van phong','2018-05-05 00:00:00'),(8,5,'First examination - Life on other planets (U10 - ENG.10)','2018-04-25 00:00:00');
/*!40000 ALTER TABLE `contest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (2,6,'Good system');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contest_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8,
  PRIMARY KEY (`id`),
  KEY `contest_id` (`contest_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`),
  CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`contest_id`) REFERENCES `contest` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (46,7,'Để kết thúc việc trình diễn trong PowerPoint, ta bấm:'),(47,7,'Trong bảng tính Excel, tại ô A2 có sẵn giá trị số 25 ; Tại ô B2 gõ vào công thức =SQRT(A2) thì nhận được kết quả:  '),(48,7,'Trong soạn thảo Word, muốn trình bày văn bản dạng cột (dạng thường thấy trên các trang báo và tạp chí), ta thực hiện: '),(49,7,'Bạn hiểu B-Virus là gì ?'),(50,7,'Trong soạn thảo Winword, công dụng của tổ hợp phím Ctrl - O là:'),(51,7,'Để máy tính có thể làm việc được, hệ điều hành cần nạp vào:'),(52,7,'Khi đang soạn thảo văn bản Word, muốn phục hồi thao tác vừa thực hiện thì bấm tổ hợp phím: '),(53,7,'Trong khi làm việc với Word, tổ hợp phím tắt nào cho phép chọn tất cả văn bản đang soạn thảo: '),(54,7,'Trong bảng tính Excel, tại ô A2 có sẵn giá trị chuỗi \"Tin hoc\" ;ô B2 có giá trị số 2008. Tại ô C2 gõ vào công thức =A2+B2 thì nhận được kết quả:    '),(55,7,'Dưới góc độ địa lí, mạng máy tính được phân biệt thành:'),(56,7,'Trong soạn thảo Winword, công dụng của tổ hợp phím Ctrl - H là :'),(57,7,'Khi đang làm việc với Excel, tổ hợp phím nào cho phép ngay lập tức đưa con trỏ về ô đầu tiên (ô A1) của bảng tính ?'),(58,7,'Khi đang làm việc vơi Windows, muốn khôi phục lại đối tượng đã xóa trong Recycle Bin, ta thực hiện: '),(59,7,'Trong khi làm việc với Excel, để nhập vào công thức tính toán cho một ô, trước hết ta phải gõ: '),(60,7,'Khi đang làm việc với PowerPoint, muốn thiết lập lại bố cục (trình bày về văn bản, hình ảnh, biểu đồ,...) của Slide, ta thực hiện : '),(61,7,'Phát biểu nào sau đây đúng? '),(62,7,'Trong chế độ tạo bảng (Table) của phần mềm Winword, muốn tách một ô thành nhiều ô, ta thực hiện: '),(63,7,'Trong bảng tính Exce, nếu trong một ô tính có các kí hiệu #####, điều đó có nghĩa là gì? '),(64,7,'Trong soạn thảo Winword, muốn định dạng văn bản theo kiểu danh sách, ta thực hiện: '),(65,7,'Trong chế độ tạo bảng (Table) của phần mềm Winword, để gộp nhiều ô thành một ô, ta thực hiện : Chọn các ô cần gộp, rồi chọn menu lệnh : '),(66,7,'Khi đang làm việc với Windows, muốn xem tổ chức các tệp và thư mục trên đĩa, ta có thể sử dụng : '),(67,7,'Trong mạng máy tính, thuật ngữ LAN có ý nghĩa gì? '),(68,7,'Trong Excel, tại ô A2 có giá trị là chuỗi TINHOC. Tại ô B2 gõ công thức =RIGHT(A2,3) thì nhận được kết quả ?'),(69,7,'Trong soạn thảo Winword, công dụng của tổ hợp phím Ctrl - S là: '),(70,7,'Khi đang làm việc với PowerPoint, để chèn thêm một Slide mới, ta thực hiện:'),(71,7,'Trong khi đang soạn thảo văn bản Word, tổ hợp phím Ctrl + V thường được sử dụng để : '),(72,7,'Trong kết nối mạng máy tính cục bộ. Cáp mạng gồm mấy loại?  '),(73,7,'Khi làm việc với Word xong, muốn thoát khỏi, ta thực hiện '),(74,7,'Trong Windows, để thiết đặt lại hệ thống, ta chọn chức năng: '),(75,7,'Trong soạn thảo văn bản Word, muốn tắt đánh dấu chọn khối văn bản (tô đen), ta thực hiện:  '),(76,7,'Em sử dụng chương trình nào của Windows để quản lí các tệp và thư mục?'),(77,7,'Trong Windows, muốn tạo một thư mục mới, ta thực hiện : '),(78,7,'Trên màn hình Word, tại dòng có chứa các hình : tờ giấy trắng, đĩa vi tính, máy in, ..., được gọi là: '),(79,7,'Trong soạn thảo Word, để chèn tiêu đề trang (đầu trang và chân trang), ta thực hiện: '),(80,7,'Trong windows, ở cửa sổ Explore, để chọn một lúc các file hoặc folder nằm liền kề nhau trong một danh sách ? '),(81,7,'Khi đang làm việc với PowerPonit, muốn thay đổi thiết kế của Slide, ta thực hiện '),(82,7,'Câu nào sau đây sai? Khi nhập dữ liệu vào bảng tính Excel thì: '),(83,7,'Bạn hiểu Virus tin học lây lan bằng cách nào? '),(84,7,'Trong bảng tính Excel, tại ô A2 có sẵn giá trị số không (0); Tại ô B2 gõ vào công thức =5/A2 thì nhận được kết quả:      '),(85,7,'Trong các dạng địa chỉ sau đây, địa chỉ nào là địa chỉ tuyệt đối? '),(86,7,'Trong WinWord, để soạn thảo một công thức toán học phức tạp, ta thường dùng công cụ : '),(87,7,'Hệ điều hành là : '),(88,7,'Trong Winword, để sao chép một đoạn văn bản vào Clipboard, ta đánh dấu đoạn văn ; sau đó : '),(89,7,'Trong WinWord, để thuận tiện hơn trong khi lựa chọn kích thước lề trái, lề phải, ...; ta có thể khai báo đơn vị đo : '),(90,7,'Trong bảng tính Excel, điều kiện trong hàm IF được phát biểu dưới dạng một phép so sánh. Khi cần so sánh khác nhau thì sử dụng kí hiệu nào? '),(91,7,'Trong soạn thảo Winword, để tạo một bảng (Table), ta thực hiện :'),(92,7,'Trong soạn thảo Word, muốn trình bày văn bản trong khổ giấy theo hướng ngang ta chọn mục : '),(93,7,'Trong Excel, tại ô A2 có giá trị là chuỗi TINHOC. Tại ô B2 gõ công thức =LEFT(A2,3) thì nhận được kết quả ? '),(94,7,'Để chuẩn bị in một bảng tính Excel ra giấy ? '),(95,7,'Trong bảng tính Excel, tại ô A2 có sẵn dữ liệu là dãy kí tự \"Tin hoc van phong\" ; Tại ô B2 gõ vào công thức =PROPER(A2) thì nhận được kết quả? '),(96,8,'/s/'),(97,8,'/o/'),(98,8,'/a/'),(99,8,'/b/'),(100,8,'/gh/'),(101,8,'Stress'),(102,8,'Stress'),(103,8,'Stress'),(104,8,'Stress'),(105,8,'Stress'),(106,8,'UFOs are strange ____objects.'),(107,8,'A person who flies a plane is called a _____.'),(108,8,'In 1952, there were more than 1,500 UFO sightings _______ the world.'),(109,8,'In 1964, he claimed he saw an/ a _____ object in one of his fields.'),(110,8,'Good evening, welcome to our Science For ______Program.'),(111,8,'He is an ___ pilot.'),(112,8,'Many reports in newspapers talked about the ___of UFOs.'),(113,8,'The story about UFOs caught the _____ of the whole class.'),(114,8,'Most of films are produced for ________.'),(115,8,'We can see the micro organism with a ____.'),(116,8,'If he were rich, he ____ travel around the world.'),(117,8,'Mai could play the piano beautifully if she ____ a piano.'),(118,8,'He said that he met a alien from ____ space.'),(119,8,'Scientists say that if people see a UFO, it ___be a spacecraft.'),(120,8,'Where ____ you go if you have a car?'),(121,8,'You will fail the exam, ____ you study harder.'),(122,8,'If I ___ a bird, I would be a dove.'),(123,8,'If today ___ Sunday, we ___ to the beach.'),(124,8,'Do you want to plan for some kind of exciting trip? Do you have a million dollars? Are you very healthy? Are you a good traveller? Do you want to go to nowhere? Then you can have a trip to space.\n\nIf you (26) __ to take the trip, you will have to get ready a few months before the flight. You must be in excellent (27) ___ condition. You should run a lot, swim every day, and do (28)__ and push-ups. You must get a letter from the doctor that shows you are in (29)__ health.\n\nOnce you get on the trip, you will be in a different world. You will see pictures of the Earth. You may also find your country and other (30)___ places. You will be able to see the oceans, the big rivers and the tall mountains.\n\nWhen you are in (31)__, you will not weigh anything. You will feel totally free and enjoy the wonderful (32)__ you have never had before. If you (33)__ on board now, you would experience those marvelous things.'),(125,8,'26'),(126,8,'27'),(127,8,'28'),(128,8,'29'),(129,8,'30'),(130,8,'31'),(131,8,'32'),(132,8,'33'),(133,8,'/ I am poor, so I can’t buy a car./'),(134,8,'/Water these plants or they will die./'),(135,8,'Where is Lan? - /Perhaps she is working. /'),(136,8,'/Nam will probably be there./'),(137,8,'He is too short to play basketball.'),(138,8,'I want to meet Nga, but I don’t have her address.'),(139,8,'She goes to school late because she lives very far from school.');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `result` (
  `contest_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  UNIQUE KEY `one_result` (`contest_id`,`question_id`,`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
INSERT INTO `result` VALUES (7,46,134),(7,47,137),(7,48,142),(7,49,146),(7,50,150),(7,51,152),(7,52,156),(7,53,160),(7,54,164),(7,55,168),(7,56,175),(7,57,178),(7,58,182),(7,59,185),(7,60,188),(7,61,195),(7,62,199),(7,63,203),(7,64,206),(7,65,208),(7,66,212),(7,67,216),(7,68,221),(7,69,226),(7,70,231),(7,71,233),(7,72,237),(7,73,243),(7,74,245),(7,75,250),(7,76,255),(7,77,258),(7,78,261),(7,79,264),(7,80,270),(7,81,272),(7,82,276),(7,83,283),(7,84,286),(7,85,290),(7,86,291),(7,87,296),(7,88,301),(7,89,303),(7,90,308),(7,91,314),(7,92,318),(7,93,322),(7,94,324),(7,95,330),(8,96,333),(8,97,338),(8,98,339),(8,99,345),(8,100,347),(8,101,351),(8,102,357),(8,103,359),(8,104,364),(8,105,370),(8,106,372),(8,107,377),(8,108,380),(8,109,383),(8,110,388),(8,111,394),(8,112,396),(8,113,402),(8,114,404),(8,115,410),(8,116,411),(8,117,418),(8,118,422),(8,119,424),(8,120,427),(8,121,433),(8,122,436),(8,123,440),(8,125,446),(8,126,449),(8,127,453),(8,128,456),(8,129,461),(8,130,463),(8,131,468),(8,132,471),(8,133,477),(8,134,481),(8,135,483),(8,136,488),(8,137,491),(8,138,498),(8,139,499);
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Toan'),(2,'Ly'),(3,'Hoa'),(4,'Van'),(5,'Anh Van'),(6,'Tin hoc');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subquestion`
--

DROP TABLE IF EXISTS `subquestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subquestion` (
  `question_id` int(11) DEFAULT NULL,
  `subquestion_id` int(11) DEFAULT NULL,
  UNIQUE KEY `question_id` (`question_id`,`subquestion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subquestion`
--

LOCK TABLES `subquestion` WRITE;
/*!40000 ALTER TABLE `subquestion` DISABLE KEYS */;
INSERT INTO `subquestion` VALUES (124,125),(124,126),(124,127),(124,128),(124,129),(124,130),(124,131),(124,132);
/*!40000 ALTER TABLE `subquestion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_log` (
  `user_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `result` text,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_log`
--

LOCK TABLES `user_log` WRITE;
/*!40000 ALTER TABLE `user_log` DISABLE KEYS */;
INSERT INTO `user_log` VALUES (4,4,'5/9','2018-04-05 00:00:00'),(4,4,'6/9','2018-04-05 00:00:00'),(4,7,'40/50','2018-04-05 00:00:00'),(6,8,'32/43','2018-04-07 00:00:00');
/*!40000 ALTER TABLE `user_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_record`
--

DROP TABLE IF EXISTS `user_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_record` (
  `user_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  UNIQUE KEY `user_id` (`user_id`,`contest_id`,`question_id`,`answer_id`),
  UNIQUE KEY `user_id_2` (`user_id`,`contest_id`,`question_id`,`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_record`
--

LOCK TABLES `user_record` WRITE;
/*!40000 ALTER TABLE `user_record` DISABLE KEYS */;
INSERT INTO `user_record` VALUES (4,7,46,134),(4,7,47,137),(4,7,48,142),(4,7,49,146),(4,7,50,150),(4,7,51,152),(4,7,52,156),(4,7,53,160),(4,7,54,167),(4,7,55,168),(4,7,56,172),(4,7,57,178),(4,7,58,182),(4,7,59,185),(4,7,60,188),(4,7,61,195),(4,7,62,199),(4,7,63,201),(4,7,64,206),(4,7,65,208),(4,7,66,212),(4,7,67,216),(4,7,68,221),(4,7,69,226),(4,7,70,229),(4,7,71,233),(4,7,72,237),(4,7,73,243),(4,7,74,245),(4,7,75,250),(4,7,76,255),(4,7,77,256),(4,7,78,261),(4,7,79,264),(4,7,80,268),(4,7,81,275),(4,7,82,277),(4,7,83,283),(4,7,84,286),(4,7,85,287),(4,7,86,291),(4,7,87,296),(4,7,88,301),(4,7,89,303),(4,7,90,308),(4,7,91,314),(4,7,92,318),(4,7,93,322),(4,7,94,325),(4,7,95,330),(6,8,96,331),(6,8,97,337),(6,8,98,339),(6,8,99,345),(6,8,100,349),(6,8,101,351),(6,8,102,357),(6,8,103,359),(6,8,104,364),(6,8,105,370),(6,8,106,372),(6,8,107,377),(6,8,108,380),(6,8,109,385),(6,8,110,388),(6,8,111,393),(6,8,112,396),(6,8,113,402),(6,8,114,404),(6,8,115,410),(6,8,117,418),(6,8,118,422),(6,8,119,424),(6,8,120,427),(6,8,121,433),(6,8,122,436),(6,8,123,441),(6,8,125,446),(6,8,126,449),(6,8,127,454),(6,8,128,456),(6,8,129,461),(6,8,130,463),(6,8,131,468),(6,8,132,471),(6,8,133,476),(6,8,134,479),(6,8,135,483),(6,8,136,488),(6,8,137,491),(6,8,138,498),(6,8,139,500);
/*!40000 ALTER TABLE `user_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `remember_token` text,
  `timestamp` time DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `address` text,
  `img` text,
  `birthday` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`(100))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin@admin.com','$2y$10$lTqN3EFK/sVpKrGKqCXtOOoV3c2.CyVT.PmwI6GBsIdw20TMusCua','XVXyAvIatI2SVRrPUfr4z3JJQNA9DSWVTyOXN6rQxOogXKrdFcT0zjD5CE0T',NULL,'2018-03-24 09:59:54','2018-03-17 10:20:40',1,'Distric 7, Tan Phu Ward, HCMC','','1996-11-03 00:00:00'),(3,'root','root@root.com','$2y$10$n6xSG0E3AZhTeta0G64/7.tjbdkfC/XTCfCWc5T7cnztJWNU6HiOa','HWC7U3vvkbL7ZmmO0BORguBmwcIWZRCB9RfiObyFFInY7rP3TWoh1fJrnQ5e',NULL,'2018-03-30 09:30:17','2018-03-17 10:33:44',1,'Vinh Long City','','1996-03-11 00:00:00'),(4,'Son T. Luu','son.lt1103@gmail.com','$2y$10$32yZuN2/JndHETDyKRpKvOjZbbII73D4gjT7iDM4E3f3BAaZVbrze','tPPwKI5V1t5ctCjzqX13qlVVbxRx00mER0BFI3StF9y1pyTWkQouKGLgCpV5',NULL,'2018-04-01 13:37:31','2018-03-17 12:54:25',0,'','','1996-03-11 00:00:00'),(5,'Luu Thanh Son','sonlam1102@hotmail.com','$2y$10$o3uBK6CZL3K.RqXXdphm6efvjZxGgkpv2c29vJFcJzlR1FmySHkqu','rdDkU06oNGOsg9yO6tRXpjNkvbMZFQKnDaBM3yBspjoUN9XIdUM1cuOQbebD',NULL,'2018-04-02 06:59:26','2018-03-17 10:47:39',0,'Vinh Long City','','2003-03-02 00:00:00'),(6,'Son Luu','sonlam1102@yahoo.com.vn','$2y$10$Vl8l1nbGlDVE0gtPxp6viu8lMyh1XaHrIJUfdX2RumtaSil64WoF.','XTG4SFPtJzYsOUGxubM23TZKSCjubLPOQ35SaWVgThPgJDnxSvk20FORwuF9',NULL,'2018-04-07 14:13:18','2018-04-07 14:13:18',0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-08  8:55:46
