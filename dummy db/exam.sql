-- MySQL dump 10.13  Distrib 5.6.39, for Linux (x86_64)
--
-- Host: localhost    Database: exam
-- ------------------------------------------------------
-- Server version	5.6.39

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
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (133,46,'Phím 10',7),(134,46,'Phím ESC',7),(135,46,'Phím Enter ',7),(136,46,'Phím Delete',7),(137,47,'5',7),(138,47,'#VALUE!',7),(139,47,'#NAME!',7),(140,48,'Insert - Column   ',7),(141,48,'View - Column ',7),(142,48,'Format - Column   ',7),(143,48,'Table - Column ',7),(144,49,'Là một loại virus tin học chủ yếu lây lan vào ổ đĩa B: ',7),(145,49,'Là một loại virus tin học chủ yếu lây lan vào các bộ trữ điện ',7),(146,49,'Là loại viurs tin học chủ yếu lây lan vào các mẫu tin khởi động (Boot record )',7),(147,49,'Là loại virus tin học chủ yếu lây lan vào các tệp của WinWord và Excel ',7),(148,50,'Mở một hồ sơ mới',7),(149,50,'Đóng hồ sơ đang mở ',7),(150,50,'Mở một hồ sơ đã có   ',7),(151,50,'Lưu hồ sơ vào đĩa ',7),(152,51,'Ram',7),(153,51,'Bộ nhớ ngoài ',7),(154,51,'Chỉ nạp vào bộ nhớ trong khi chạy chương trình ứng dụng',7),(155,51,'Tất cả đều sai ',7),(156,52,'Ctrl – Z          ',7),(157,52,'Ctrl – X        ',7),(158,52,'Ctrl - V             ',7),(159,52,'Ctrl - Y ',7),(160,53,'Ctrl + A          ',7),(161,53,'Alt + A         ',7),(162,53,'Alt + F              ',7),(163,53,'Ctrl + F ',7),(164,54,'#VALUE!         ',7),(165,54,'Tin hoc  ',7),(166,54,'2008 ',7),(167,54,'Tin hoc2008 ',7),(168,55,'Mạng cục bộ, mạng diện rộng, mạng toàn cầu   ',7),(169,55,'Mạng cục bộ, mạng diện rộng, mạng toàn cục ',7),(170,55,'Mạng cục bộ, mạng toàn cục, mạng toàn cầu   ',7),(171,55,'Mạng diện rộng, mạng toàn cầu, mạng toàn cục ',7),(172,56,'Tạo tệp văn bản mới   ',7),(173,56,'Chức năng thay thế trong soạn thảo ',7),(174,56,'Định dạng chữ hoa   ',7),(175,56,'Chức năng thay thế trong soạn thảo ',7),(176,57,'Shift+Home   ',7),(177,57,'Alt+Home ',7),(178,57,'Ctrl+Home   ',7),(179,57,'Shift+Ctrl+Home ',7),(180,58,'Chọn đối tượng, rồi chọn File - Copy   ',7),(181,58,'Chọn đối tượng, rồi chọn File - Open ',7),(182,58,'Chọn đối tượng, rồi chọn File - Restore   ',7),(183,58,'Chọn đối tượng, rồi chọn File - Move To Folder... ',7),(184,59,'Dấu chấm hỏi (?)          ',7),(185,59,'Dấu bằng (= )          ',7),(186,59,'Dấu hai chấm (: )           ',7),(187,59,'Dấu đô la ($) ',7),(188,60,'Format - Slide Layout... ',7),(189,60,'View - Slide Layout... ',7),(190,60,'Insert - Slide Layout...   ',7),(191,60,'File - Slide Layout... ',7),(192,61,'Biểu đồ cột rất thích hợp để so sánh dữ liệu có trong nhiều cột ',7),(193,61,'Biểu đồ hình tròn rất thích hợp để mô tả tỉ lệ của giá trị dữ liệu so với tổng thể ',7),(194,61,'Biểu đồ đường gấp khúc dùng so sánh dữ liệu và dự đoán xu thế tăng hay giảm của dữ liệu ',7),(195,61,'Cả 3 câu đều đúng  ',7),(196,62,'Table - Cells   ',7),(197,62,'Table - Merge Cells ',7),(198,62,'Tools - Split Cells   ',7),(199,62,'Table - Split Cells ',7),(200,63,'Chương trình bảng tính bị nhiễm virus ',7),(201,63,'Công thức nhập sai và Excel thông báo lỗi',7),(202,63,'Hàng chứa ô đó có độ cao quá thấp nên không hiển thị hết chữ số ',7),(203,63,'Cột chứa ô đó có độ rộng quá hẹp nên không hiển thị hết chữ số ',7),(204,64,'File - Bullets and Numbering ',7),(205,64,'Tools - Bullets and Numbering ',7),(206,64,'Format - Bullets and Numbering   ',7),(207,64,'Edit - Bullets and Numbering ',7),(208,65,'Table - Merge Cells   ',7),(209,65,'Tools - Split Cells ',7),(210,65,'Tools - Merge Cells   ',7),(211,65,'Table - Split Cells ',7),(212,66,'My Computer hoặc Windows Explorer  ',7),(213,66,'My Computer hoặc Recycle Bin ',7),(214,66,'Windows Explorer hoặc Recycle Bin   ',7),(215,66,'My Computer hoăc My Network Places',7),(216,67,'Mạng cục bộ',7),(217,67,'Mạng diện rộng   ',7),(218,67,'Mạng toàn cầu          ',7),(219,67,'Một ý nghĩa khác ',7),(220,68,'3',7),(221,68,'HOC ',7),(222,68,'TIN',7),(223,68,'Tinhoc ',7),(224,69,'Xóa tệp văn bản   ',7),(225,69,'Chèn kí hiệu đặc biệt ',7),(226,69,'Lưu tệp văn bản vào đĩa   ',7),(227,69,'Tạo tệp văn bản mới ',7),(228,70,'Edit - New Slide ',7),(229,70,'File - New Slide ',7),(230,70,'Slide Show - New Slide   ',7),(231,70,'Insert - New Slide ',7),(232,71,'Cắt một đoạn văn bản ',7),(233,71,'Dán một đoạn văn bản từ Clipboard ',7),(234,71,'Sao chép một đoạn văn bản   ',7),(235,71,'Cắt và sao chép một đoạn văn bản ',7),(236,72,'2',7),(237,72,'3',7),(238,72,'4',7),(239,72,'5',7),(240,73,'View - Exit   ',7),(241,73,'Edit - Exit ',7),(242,73,'Window - Exit   ',7),(243,73,'File - Exit ',7),(244,74,'Control Windows   ',7),(245,74,'Control Panel ',7),(246,74,'Control System',7),(247,74,'Control Desktop ',7),(248,75,'Bấm phím Enter   ',7),(249,75,'Bấm phím Space ',7),(250,75,'Bấm phím mũi tên di chuyển   ',7),(251,75,'Bấm phím Tab ',7),(252,76,'Microsoft Office   ',7),(253,76,'Windows Explorer ',7),(254,76,'Control Panel   ',7),(255,76,'Windows Explorer ',7),(256,77,'Edit - New, sau đó chọn Folder   ',7),(257,77,'Tools - New, sau đó chọn Folder ',7),(258,77,'File - New, sau đó chọn Folder',7),(259,77,'Windows - New, sau đó chọn Folder ',7),(260,78,'Thanh công cụ định dạng   ',7),(261,78,'Thanh công cụ chuẩn ',7),(262,78,'Thanh công cụ vẽ   ',7),(263,78,'Thanh công cụ bảng và đường viền ',7),(264,79,'Insert - Header and Footer ',7),(265,79,'Tools - Header and Footer ',7),(266,79,'View - Header and Footer   ',7),(267,79,'Format - Header and Footer ',7),(268,80,'Giữ phím Ctrl và nháy chuột vào từng mục muốn chọn trong danh sách ',7),(269,80,'Giữ phím Alt và nháy chuột vào từng mục muốn chọn trong danh sách ',7),(270,80,'Nháy chuột ở mục đầu, ấn và giữ Shift nháy chuột ở mục cuối ',7),(271,80,'Giữ phím Tab và nháy chuột vào từng mục muốn chọn trong danh sách ',7),(272,81,'Format - Slide Design...   ',7),(273,81,'Tools - Slide Design... ',7),(274,81,'Insert - Slide Design...   ',7),(275,81,'Slide Show - Slide Design... ',7),(276,82,'Dữ liệu kiểu số sẽ mặc nhiên căn thẳng lề trái ',7),(277,82,'Dữ liệu kiểu kí tự sẽ mặc nhiên căn thẳng lề trái ',7),(278,82,'Dữ liệu kiểu thời gian sẽ mặc nhiên căn thẳng lề phải ',7),(279,82,'Dữ liệu kiểu ngày tháng sẽ mặc nhiên căn thẳng lề phải ',7),(280,83,'Thông qua người sử dụng, khi dùng tây ẩm ướt sử dụng máy tính ',7),(281,83,'Thông qua hệ thống điện - khi sử dụng nhiều máy tính cùng một lúc ',7),(282,83,'Thông qua môi trường không khí - khi đặt những máy tính quá gần nhau ',7),(283,83,'Các câu trên đều sai  ',7),(284,84,'5',7),(285,84,'#VALUE!   ',7),(286,84,'#DIV/0! ',7),(287,85,'B$1:D$10             ',7),(288,85,'$B1:$D10   ',7),(289,85,'B$1$:D$10$           ',7),(290,85,'$B$1:$D$10 ',7),(291,86,'Microsoft Equation   ',7),(292,86,'Ogranization Art ',7),(293,86,'Ogranization Chart   ',7),(294,86,'Word Art ',7),(295,87,'Phần mềm ứng dụng   ',7),(296,87,'Phần mềm hệ thống ',7),(297,87,'Phần mềm tiện ích   ',7),(298,87,'Tất cả đều đúng ',7),(299,88,'Chọn menu lệnh Edit - Copy   ',7),(300,88,'Bấm tổ hợp phím Ctrl - C  ',7),(301,88,'Cả 2 câu a. b. đều đúng   ',7),(302,88,'Cả 2 câu a. b. đều sai ',7),(303,89,'Centimeters',7),(304,89,'Đơn vị đo bắt buộc là Inches ',7),(305,89,'Đơn vị đo bắt buộc là Points ',7),(306,89,'Đơn vị đo bắt buộc là Picas ',7),(307,90,'#',7),(308,90,'<>',7),(309,90,'><',7),(310,90,'&',7),(311,91,'Tools - Insert Table   ',7),(312,91,'Insert - Insert Table ',7),(313,91,'Format - Insert Table   ',7),(314,91,'Table - Insert Table ',7),(315,92,'Portrait  ',7),(316,92,'Right  ',7),(317,92,'Left ',7),(318,92,'Landscape ',7),(319,93,'Tinhoc ',7),(320,93,'3 ',7),(321,93,'HOC',7),(322,93,'TIN ',7),(323,94,'Excel bắt buộc phải đánh số trang ở vị trí bên phải đầu mỗi trang ',7),(324,94,'Có thể khai báo đánh số trang in hoặc không ',7),(325,94,'Chỉ đánh số trang in nếu bảng tính gồm nhiều trang ',7),(326,94,'Vị trí của số trang luôn luôn ở góc dưới bên phải ',7),(327,95,'Tin hoc van phong   ',7),(328,95,'Tin hoc van phong ',7),(329,95,'TIN HOC VAN PHONG   ',7),(330,95,'Tin Hoc Van Phong ',7);
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
INSERT INTO `contest` VALUES (7,6,'Kiem tra tin hoc van phong','2018-05-05 00:00:00'),(8,5,'First examination','2018-04-25 00:00:00');
/*!40000 ALTER TABLE `contest` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (46,7,'Để kết thúc việc trình diễn trong PowerPoint, ta bấm:'),(47,7,'Trong bảng tính Excel, tại ô A2 có sẵn giá trị số 25 ; Tại ô B2 gõ vào công thức =SQRT(A2) thì nhận được kết quả:  '),(48,7,'Trong soạn thảo Word, muốn trình bày văn bản dạng cột (dạng thường thấy trên các trang báo và tạp chí), ta thực hiện: '),(49,7,'Bạn hiểu B-Virus là gì ?'),(50,7,'Trong soạn thảo Winword, công dụng của tổ hợp phím Ctrl - O là:'),(51,7,'Để máy tính có thể làm việc được, hệ điều hành cần nạp vào:'),(52,7,'Khi đang soạn thảo văn bản Word, muốn phục hồi thao tác vừa thực hiện thì bấm tổ hợp phím: '),(53,7,'Trong khi làm việc với Word, tổ hợp phím tắt nào cho phép chọn tất cả văn bản đang soạn thảo: '),(54,7,'Trong bảng tính Excel, tại ô A2 có sẵn giá trị chuỗi \"Tin hoc\" ;ô B2 có giá trị số 2008. Tại ô C2 gõ vào công thức =A2+B2 thì nhận được kết quả:    '),(55,7,'Dưới góc độ địa lí, mạng máy tính được phân biệt thành:'),(56,7,'Trong soạn thảo Winword, công dụng của tổ hợp phím Ctrl - H là :'),(57,7,'Khi đang làm việc với Excel, tổ hợp phím nào cho phép ngay lập tức đưa con trỏ về ô đầu tiên (ô A1) của bảng tính ?'),(58,7,'Khi đang làm việc vơi Windows, muốn khôi phục lại đối tượng đã xóa trong Recycle Bin, ta thực hiện: '),(59,7,'Trong khi làm việc với Excel, để nhập vào công thức tính toán cho một ô, trước hết ta phải gõ: '),(60,7,'Khi đang làm việc với PowerPoint, muốn thiết lập lại bố cục (trình bày về văn bản, hình ảnh, biểu đồ,...) của Slide, ta thực hiện : '),(61,7,'Phát biểu nào sau đây đúng? '),(62,7,'Trong chế độ tạo bảng (Table) của phần mềm Winword, muốn tách một ô thành nhiều ô, ta thực hiện: '),(63,7,'Trong bảng tính Exce, nếu trong một ô tính có các kí hiệu #####, điều đó có nghĩa là gì? '),(64,7,'Trong soạn thảo Winword, muốn định dạng văn bản theo kiểu danh sách, ta thực hiện: '),(65,7,'Trong chế độ tạo bảng (Table) của phần mềm Winword, để gộp nhiều ô thành một ô, ta thực hiện : Chọn các ô cần gộp, rồi chọn menu lệnh : '),(66,7,'Khi đang làm việc với Windows, muốn xem tổ chức các tệp và thư mục trên đĩa, ta có thể sử dụng : '),(67,7,'Trong mạng máy tính, thuật ngữ LAN có ý nghĩa gì? '),(68,7,'Trong Excel, tại ô A2 có giá trị là chuỗi TINHOC. Tại ô B2 gõ công thức =RIGHT(A2,3) thì nhận được kết quả ?'),(69,7,'Trong soạn thảo Winword, công dụng của tổ hợp phím Ctrl - S là: '),(70,7,'Khi đang làm việc với PowerPoint, để chèn thêm một Slide mới, ta thực hiện:'),(71,7,'Trong khi đang soạn thảo văn bản Word, tổ hợp phím Ctrl + V thường được sử dụng để : '),(72,7,'Trong kết nối mạng máy tính cục bộ. Cáp mạng gồm mấy loại?  '),(73,7,'Khi làm việc với Word xong, muốn thoát khỏi, ta thực hiện '),(74,7,'Trong Windows, để thiết đặt lại hệ thống, ta chọn chức năng: '),(75,7,'Trong soạn thảo văn bản Word, muốn tắt đánh dấu chọn khối văn bản (tô đen), ta thực hiện:  '),(76,7,'Em sử dụng chương trình nào của Windows để quản lí các tệp và thư mục?'),(77,7,'Trong Windows, muốn tạo một thư mục mới, ta thực hiện : '),(78,7,'Trên màn hình Word, tại dòng có chứa các hình : tờ giấy trắng, đĩa vi tính, máy in, ..., được gọi là: '),(79,7,'Trong soạn thảo Word, để chèn tiêu đề trang (đầu trang và chân trang), ta thực hiện: '),(80,7,'Trong windows, ở cửa sổ Explore, để chọn một lúc các file hoặc folder nằm liền kề nhau trong một danh sách ? '),(81,7,'Khi đang làm việc với PowerPonit, muốn thay đổi thiết kế của Slide, ta thực hiện '),(82,7,'Câu nào sau đây sai? Khi nhập dữ liệu vào bảng tính Excel thì: '),(83,7,'Bạn hiểu Virus tin học lây lan bằng cách nào? '),(84,7,'Trong bảng tính Excel, tại ô A2 có sẵn giá trị số không (0); Tại ô B2 gõ vào công thức =5/A2 thì nhận được kết quả:      '),(85,7,'Trong các dạng địa chỉ sau đây, địa chỉ nào là địa chỉ tuyệt đối? '),(86,7,'Trong WinWord, để soạn thảo một công thức toán học phức tạp, ta thường dùng công cụ : '),(87,7,'Hệ điều hành là : '),(88,7,'Trong Winword, để sao chép một đoạn văn bản vào Clipboard, ta đánh dấu đoạn văn ; sau đó : '),(89,7,'Trong WinWord, để thuận tiện hơn trong khi lựa chọn kích thước lề trái, lề phải, ...; ta có thể khai báo đơn vị đo : '),(90,7,'Trong bảng tính Excel, điều kiện trong hàm IF được phát biểu dưới dạng một phép so sánh. Khi cần so sánh khác nhau thì sử dụng kí hiệu nào? '),(91,7,'Trong soạn thảo Winword, để tạo một bảng (Table), ta thực hiện :'),(92,7,'Trong soạn thảo Word, muốn trình bày văn bản trong khổ giấy theo hướng ngang ta chọn mục : '),(93,7,'Trong Excel, tại ô A2 có giá trị là chuỗi TINHOC. Tại ô B2 gõ công thức =LEFT(A2,3) thì nhận được kết quả ? '),(94,7,'Để chuẩn bị in một bảng tính Excel ra giấy ? '),(95,7,'Trong bảng tính Excel, tại ô A2 có sẵn dữ liệu là dãy kí tự \"Tin hoc van phong\" ; Tại ô B2 gõ vào công thức =PROPER(A2) thì nhận được kết quả? ');
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
INSERT INTO `result` VALUES (7,46,134),(7,47,137),(7,48,142),(7,49,146),(7,50,150),(7,51,152),(7,52,156),(7,53,160),(7,54,164),(7,55,168),(7,56,175),(7,57,178),(7,58,182),(7,59,185),(7,60,188),(7,61,195),(7,62,199),(7,63,203),(7,64,206),(7,65,208),(7,66,212),(7,67,216),(7,68,221),(7,69,226),(7,70,231),(7,71,233),(7,72,237),(7,73,243),(7,74,245),(7,75,250),(7,76,255),(7,77,258),(7,78,261),(7,79,264),(7,80,270),(7,81,272),(7,82,276),(7,83,283),(7,84,286),(7,85,290),(7,86,291),(7,87,296),(7,88,301),(7,89,303),(7,90,308),(7,91,314),(7,92,318),(7,93,322),(7,94,324),(7,95,330);
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
INSERT INTO `user_log` VALUES (4,4,'5/9','2018-04-05 00:00:00'),(4,4,'6/9','2018-04-05 00:00:00'),(4,7,'40/50','2018-04-05 00:00:00');
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
INSERT INTO `user_record` VALUES (4,7,46,134),(4,7,47,137),(4,7,48,142),(4,7,49,146),(4,7,50,150),(4,7,51,152),(4,7,52,156),(4,7,53,160),(4,7,54,167),(4,7,55,168),(4,7,56,172),(4,7,57,178),(4,7,58,182),(4,7,59,185),(4,7,60,188),(4,7,61,195),(4,7,62,199),(4,7,63,201),(4,7,64,206),(4,7,65,208),(4,7,66,212),(4,7,67,216),(4,7,68,221),(4,7,69,226),(4,7,70,229),(4,7,71,233),(4,7,72,237),(4,7,73,243),(4,7,74,245),(4,7,75,250),(4,7,76,255),(4,7,77,256),(4,7,78,261),(4,7,79,264),(4,7,80,268),(4,7,81,275),(4,7,82,277),(4,7,83,283),(4,7,84,286),(4,7,85,287),(4,7,86,291),(4,7,87,296),(4,7,88,301),(4,7,89,303),(4,7,90,308),(4,7,91,314),(4,7,92,318),(4,7,93,322),(4,7,94,325),(4,7,95,330);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','admin@admin.com','$2y$10$lTqN3EFK/sVpKrGKqCXtOOoV3c2.CyVT.PmwI6GBsIdw20TMusCua','XVXyAvIatI2SVRrPUfr4z3JJQNA9DSWVTyOXN6rQxOogXKrdFcT0zjD5CE0T',NULL,'2018-03-24 09:59:54','2018-03-17 10:20:40',1,'Distric 7, Tan Phu Ward, HCMC','','1996-11-03 00:00:00'),(3,'root','root@root.com','$2y$10$n6xSG0E3AZhTeta0G64/7.tjbdkfC/XTCfCWc5T7cnztJWNU6HiOa','KPIiG2sY22xMtrQJHejBoB4fnCrvYQDsmSyR5lnwyrHc4Aqt2e4HTxdTaujE',NULL,'2018-03-30 09:30:17','2018-03-17 10:33:44',1,'Vinh Long City','','1996-03-11 00:00:00'),(4,'Son T. Luu','son.lt1103@gmail.com','$2y$10$32yZuN2/JndHETDyKRpKvOjZbbII73D4gjT7iDM4E3f3BAaZVbrze','BA6shU0DpA84QmQMjKBCfC6C3Hcpflj2Wj2alMdPWgFlG7Eanav3CC48UjlQ',NULL,'2018-04-01 13:37:31','2018-03-17 12:54:25',0,'','','1996-03-11 00:00:00'),(5,'Luu Thanh Son','sonlam1102@hotmail.com','$2y$10$o3uBK6CZL3K.RqXXdphm6efvjZxGgkpv2c29vJFcJzlR1FmySHkqu','rdDkU06oNGOsg9yO6tRXpjNkvbMZFQKnDaBM3yBspjoUN9XIdUM1cuOQbebD',NULL,'2018-04-02 06:59:26','2018-03-17 10:47:39',0,'Vinh Long City','','2003-03-02 00:00:00');
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

-- Dump completed on 2018-04-05  7:31:38
