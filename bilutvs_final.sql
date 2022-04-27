/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : bilutvs

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 22/09/2021 20:03:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Cổ Trang', 'co-trang');
INSERT INTO `categories` VALUES (2, 'Học Đường', 'hoc-duong');
INSERT INTO `categories` VALUES (3, 'Xuyên Không', 'xuyen-khong');
INSERT INTO `categories` VALUES (4, 'TVB', 'tvb');
INSERT INTO `categories` VALUES (5, 'Đam Mỹ - Bách Hợp', 'dam-my-bach-hop');
INSERT INTO `categories` VALUES (6, 'Phim 18+', 'phim-18');
INSERT INTO `categories` VALUES (7, 'Hành Động', 'hanh-dong');
INSERT INTO `categories` VALUES (8, 'Chiến Tranh', 'chien-tranh');
INSERT INTO `categories` VALUES (9, 'Khoa Học', 'khoa-hoc');
INSERT INTO `categories` VALUES (11, 'Thể Thao', 'the-thao');
INSERT INTO `categories` VALUES (12, 'Lịch Sử', 'lich-su');
INSERT INTO `categories` VALUES (14, 'Tài Liệu', 'tai-lieu');
INSERT INTO `categories` VALUES (17, 'Hoạt Hình', 'hoat-hinh');
INSERT INTO `categories` VALUES (18, 'Tâm Lý - Tình Cảm', 'tam-ly-tinh-cam');
INSERT INTO `categories` VALUES (19, 'Kinh Dị', 'kinh-di');

-- ----------------------------
-- Table structure for film_episode
-- ----------------------------
DROP TABLE IF EXISTS `film_episode`;
CREATE TABLE `film_episode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_film` int NULL DEFAULT NULL,
  `link_player` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `tap` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_EPISODE_FILM`(`id_film`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of film_episode
-- ----------------------------
INSERT INTO `film_episode` VALUES (1, 1, 'https://short.ink/_w5VXq7Yu', 1);
INSERT INTO `film_episode` VALUES (2, 1, 'https://short.ink/RuGq5mOA0w', 2);
INSERT INTO `film_episode` VALUES (3, 2, 'https://player.tuanpoly02.com//embed.php?data=q96F7jdq2QFdRiT+YaaFCmyZHueTDLBjrzenouLFBDs/+J0O4QRwjnlsO64Qaxhk4ULdxq05Qa227lptotFTwqVQYaSKTy2BRfXrokoPGJ2syZQMfbcS1i8wcjS9GiFXwdlIQTve+izPTHyAM9Ay4sLW457/wARgwmqGnkC1EjA4ubR+SNr0rorQUp3FmGOMPS6INNCkacwn/0NI/4MN6Ig=', 1);
INSERT INTO `film_episode` VALUES (4, 2, 'https://player.tuanpoly02.com//embed.php?data=q96F7jdq2QFdRiT+YaaFCmyZHueTDLBjrzenouLFBDs/+J0O4QRwjnlsO64Qaxhk4ULdxq05Qa227lptotFWzqtdb6GKSiONQPLjo08OGJ2syZQMfbcS1i8wcjS9GiFXwdlIQTve+izPTHyAM9Ay4sLW457/wARgwmqGnkC1EjA4ubR+SNr0rorQUp3FmGOMPS6INNCkacwn/0NI/4MN6Ig=', 2);
INSERT INTO `film_episode` VALUES (5, 3, 'https://short.ink/_LsMQqek0C', 1);
INSERT INTO `film_episode` VALUES (6, 4, 'https://short.ink/DqD82ni_G', 1);
INSERT INTO `film_episode` VALUES (7, 1, 'https://short.ink/n63PjJJXF', 3);
INSERT INTO `film_episode` VALUES (8, 1, 'https://short.ink/0t6NUQSWC', 4);
INSERT INTO `film_episode` VALUES (10, 8, 'https://short.ink/W2bgZUrlU', 1);
INSERT INTO `film_episode` VALUES (11, 8, 'https://short.ink/qez1XGoCS', 2);
INSERT INTO `film_episode` VALUES (12, 8, 'https://short.ink/C80rVvjxY', 3);
INSERT INTO `film_episode` VALUES (13, 8, 'https://short.ink/fzMddZVVy', 4);
INSERT INTO `film_episode` VALUES (14, 1, 'https://short.ink/XOmuj81Cr', 5);
INSERT INTO `film_episode` VALUES (15, 1, 'https://short.ink/oc8fEJgGU', 6);
INSERT INTO `film_episode` VALUES (16, 1, 'https://short.ink/3EoYguc7T', 7);
INSERT INTO `film_episode` VALUES (17, 1, 'https://short.ink/gcJ3dHsc8', 8);
INSERT INTO `film_episode` VALUES (18, 1, 'https://short.ink/7cuxqEB8NM', 9);
INSERT INTO `film_episode` VALUES (19, 1, 'https://short.ink/wPRUbxXBo', 10);
INSERT INTO `film_episode` VALUES (20, 1, 'https://short.ink/GTsA_1gFW', 11);
INSERT INTO `film_episode` VALUES (21, 4, 'https://short.ink/b01SdG5Ok', 2);
INSERT INTO `film_episode` VALUES (22, 4, 'https://short.ink/fFl0Vht4_', 3);
INSERT INTO `film_episode` VALUES (24, 10, 'https://short.ink/06TAV0FLV', 1);
INSERT INTO `film_episode` VALUES (25, 1, 'https://short.ink/wzZ1q9s_X', 12);
INSERT INTO `film_episode` VALUES (26, 1, 'https://short.ink/8UTrGMkzE8', 13);
INSERT INTO `film_episode` VALUES (27, 1, 'https://short.ink/c6_V8WzlAA', 14);
INSERT INTO `film_episode` VALUES (28, 1, 'https://short.ink/v5qtU4RDD', 15);
INSERT INTO `film_episode` VALUES (29, 1, 'https://short.ink/fNi6iDmnS', 16);
INSERT INTO `film_episode` VALUES (30, 1, 'https://short.ink/wVQE8f_Y7', 17);
INSERT INTO `film_episode` VALUES (31, 1, 'https://short.ink/_SVYRS4wE', 18);
INSERT INTO `film_episode` VALUES (32, 1, 'https://short.ink/9uxGrDeI5', 19);
INSERT INTO `film_episode` VALUES (33, 1, 'https://short.ink/JJVkv9ou1', 20);
INSERT INTO `film_episode` VALUES (34, 8, 'https://short.ink/IuvORvjju', 5);
INSERT INTO `film_episode` VALUES (35, 8, 'https://short.ink/fopyb8M7T', 6);
INSERT INTO `film_episode` VALUES (36, 8, 'https://short.ink/mZwPThOYr', 7);
INSERT INTO `film_episode` VALUES (37, 8, 'https://short.ink/WLDsam99z', 8);
INSERT INTO `film_episode` VALUES (38, 8, 'https://short.ink/6pBBWwy9w', 9);
INSERT INTO `film_episode` VALUES (39, 8, 'https://short.ink/gaXMiRAYt1', 10);
INSERT INTO `film_episode` VALUES (40, 8, 'https://short.ink/Ee_qHW7fU', 11);
INSERT INTO `film_episode` VALUES (41, 8, 'https://short.ink/U8_jF0b7c', 12);
INSERT INTO `film_episode` VALUES (42, 8, 'https://short.ink/gwUoSwjIx', 13);
INSERT INTO `film_episode` VALUES (43, 8, 'https://short.ink/Jz-1QihJp', 14);
INSERT INTO `film_episode` VALUES (44, 8, 'https://short.ink/bJT2KjiC6E', 15);
INSERT INTO `film_episode` VALUES (45, 8, 'https://short.ink/z-bWX6IFz', 16);
INSERT INTO `film_episode` VALUES (46, 8, 'https://short.ink/YBcl8T5Xr', 17);
INSERT INTO `film_episode` VALUES (47, 8, 'https://short.ink/xzLXo-CZ-K', 18);
INSERT INTO `film_episode` VALUES (48, 12, 'https://short.ink/DhSAWEAKW', 1);
INSERT INTO `film_episode` VALUES (49, 12, 'https://short.ink/OY8_t8oOL', 2);
INSERT INTO `film_episode` VALUES (50, 12, 'https://short.ink/Dp0BbMsa1', 3);
INSERT INTO `film_episode` VALUES (51, 12, 'https://short.ink/TaFM5Lz2X', 4);
INSERT INTO `film_episode` VALUES (52, 12, 'https://short.ink/k0JIgA4j6', 5);
INSERT INTO `film_episode` VALUES (53, 12, 'https://short.ink/_LbsasUJD', 6);
INSERT INTO `film_episode` VALUES (54, 3, 'https://short.ink/R6bq5nJ2l', 2);
INSERT INTO `film_episode` VALUES (55, 3, 'https://short.ink/Sxr3XO4ip', 3);
INSERT INTO `film_episode` VALUES (56, 3, 'https://short.ink/CX93V89Y1', 4);
INSERT INTO `film_episode` VALUES (57, 3, 'https://short.ink/PSGahEHSY', 5);
INSERT INTO `film_episode` VALUES (58, 13, 'https://short.ink/fqmf48StP', 1);
INSERT INTO `film_episode` VALUES (59, 15, 'https://short.ink/IffP7MNxd', 1);
INSERT INTO `film_episode` VALUES (60, 16, 'https://short.ink/uQs2Qg9ic', 1);
INSERT INTO `film_episode` VALUES (61, 17, 'https://short.ink/M6eGv7gHY', 1);
INSERT INTO `film_episode` VALUES (62, 19, 'https://short.ink/-7MP7oMCo', 1);
INSERT INTO `film_episode` VALUES (63, 20, 'https://short.ink/T97WefZHX', 1);
INSERT INTO `film_episode` VALUES (64, 21, 'https://short.ink/GEeRXCB-x', 1);
INSERT INTO `film_episode` VALUES (65, 22, 'https://short.ink/grjQxJYmR', 1);
INSERT INTO `film_episode` VALUES (66, 23, 'https://short.ink/EYdGDpbJ2A', 1);
INSERT INTO `film_episode` VALUES (67, 24, 'https://short.ink/1psII3QdJ', 1);
INSERT INTO `film_episode` VALUES (68, 25, 'https://short.ink/F8mgUOVVv', 1);
INSERT INTO `film_episode` VALUES (69, 26, 'https://short.ink/MFqiJSGNl', 1);
INSERT INTO `film_episode` VALUES (70, 27, 'https://short.ink/Ldb4usj1R', 1);
INSERT INTO `film_episode` VALUES (71, 28, 'https://short.ink/WODI_uujv', 1);
INSERT INTO `film_episode` VALUES (72, 29, 'https://short.ink/sSk99Qe2T', 1);
INSERT INTO `film_episode` VALUES (73, 30, 'https://short.ink/hL1EnLp4L', 1);
INSERT INTO `film_episode` VALUES (74, 32, 'https://short.ink/loKA2YFrr', 1);
INSERT INTO `film_episode` VALUES (75, 33, 'https://short.ink/T9NXIdskE', 1);
INSERT INTO `film_episode` VALUES (76, 34, 'https://short.ink/5b6L12v5m', 1);
INSERT INTO `film_episode` VALUES (77, 35, 'https://short.ink/CmDYyvdoK', 1);

-- ----------------------------
-- Table structure for films
-- ----------------------------
DROP TABLE IF EXISTS `films`;
CREATE TABLE `films`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `cate_id` int NULL DEFAULT NULL,
  `poster` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `real_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT 0,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `total_episode` int NULL DEFAULT NULL,
  `view` int NULL DEFAULT 0,
  `year` year NULL DEFAULT NULL,
  `nation_id` int NULL DEFAULT NULL,
  `type_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_FILM_CATE`(`cate_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of films
-- ----------------------------
INSERT INTO `films` VALUES (1, 'Dữ Quân Ca', 1, 'https://img.bilutv.cc/film/18375/poster.jpg?v=1628429432', 'https://img.bilutv.cc/film/18375/big.jpg?v=1628429432', 'Dữ Quân Ca lấy bối cảnh dưới thời vua Đường Văn Tông. Trong thời đại này, nhà vua và các quan viên trong triều gặp khó khăn khi mà các thái thái lộng quyền. Để thoát khỏi sự chi phối ấy cận thần Vương Nhai đã lên kế hoạch thủ tiêu tên thái giám Cừu Sĩ Lương để đoạt lại quyền lực. Thế nhưng, kế hoạch đã bị tên thái giám mưu mô xảo quyệt này nắm thóp khiến cả gia tộc Vương Nhai bị xử tử không chừa một ai ngoài hai cô cháu gái cao số. Kể từ đây sự hận thù trong Mộng Tỉnh Trường An bắt đầu diễn ra, cô em gái Trình Nhã Ngư (Trương Dư Hi đảm nhận) được tể tướng họ Ngư nhận nuôi đổi tên thành Ngư Băng Nhi. Còn người chị Trình Hề (Tập tuyết đóng) trở thành con nuôi của Cừu Sĩ Lương.Về sau, biến cố một lần nữa ập đến cả hai chị em khi mà hai bên gia tộc nhận nuôi đối đầu, ân oán trả thù kéo dài đến tận các đời vua kế tiếp. Nhưng khi đến đời vua Lý Viêm cũng là nam chính trong phim Dữ Quân Ca do Thành Nghị thủ vai đã đưa nàng Trình Nhã Ngư đến gặp anh để tạo nên câu chuyện tình yêu ngọt ngào giữa vòng xoáy chính trị khốc liệt. Hai người vượt qua bao khó khăn nguy hiểm, bất chấp tính mạng để giữ lấy tình yêu nhiệt thành của mình, nhưng trong thâm tâm của nữ chính Mộng Tình Trường An và người chị gái của mình vẫn không thể nào quên mối thù khắc cốt ghi tâm của tên cẩu tặc thái giám năm xưa sát hại cả gia tộc của họ.', 'Dream Of Chang\'an', 1, 'du-quan-ca', 49, 1864797, 2021, 2, 2);
INSERT INTO `films` VALUES (2, 'Penthouse: Cuộc Chiến Thượng Lưu Phần 3', 18, 'https://img.bilutv.cc/film/17767/poster.jpg', 'https://img.bilutv.cc/film/17767/big.jpg', 'Cuộc chiến thượng lưu - Penthouse ngày càng gay cấn khi các nhân vật mới bắt đầu xuất hiện, cùng với đó là sự biến mất bí ẩn của nữ chính Oh Yoon Hee. Theo như phía nhà sản xuất tiết lộ thì nhân vật Oh Yoon Hee vẫn xuất hiện ở phần 3, tuy nhiên việc nhân vật này còn sống hay không vẫn là một câu hỏi khiến nhiều người hoang mang.', 'The Penthouse: War in Life 3', 1, 'penthouse-cuoc-chien-thuong-luu-phan-3', 12, 900006, 2021, 3, 2);
INSERT INTO `films` VALUES (3, 'Em Là Niềm Kiêu Hãnh Của Anh', 18, 'https://img.bilutv.cc/film/16274/poster.jpg', 'https://img.bilutv.cc/film/16274/big.jpg?v=1628543077', 'Em Là Niềm Kiêu Hãnh Của Anh – You Are My Glory (2021) là phim chuyển thể từ tiểu thuyết cùng tên của nhà văn Cố Mạn. Câu chuyện chủ yếu xoay quanh nhân vật Kiều Tinh Tinh – một nghệ sỹ trong ngành giải trí. Sau khi nhận được một đại ngôn game thì phát hiện nhân vật của cô trong trò chơi này gặp phải nguy cơ sụp đổ. Vì thế, Kiều Tinh Tinh đã gấp gáp tìm cho mình một “đại thần” đến giúp đỡ. Trời xui đất khiến, Kiều Tinh Tinh lại tìm được Vu Đồ, một nhân tài mũi nhọn trong ngành nghiên cứu hàng không, cũng từng là “học thần” xuất chúng từng từ chối lời tỏ tình của Tinh Tinh đến những 2 lần. Liệu lần gặp lại này Kiều Tinh Tinh sẽ phải đối mặt với Vu Đồ thế nào? Còn Vu Đồ, anh ấy sẽ nghĩ sao về Kiều Tinh Tinh, có cho rằng cô là “đỉa đói” bám hoài không buông hay không? Người ta thường nói “quá tam ba bận”, lần này chắc không phải là Tinh Tinh lại mặt dày theo đuổi nam thần nữa chứ? Hay tình thế sẽ xoay chuyển?', 'You Are My Glory', 1, 'em-la-niem-kieu-hanh-cua-anh', 32, 100008, 2021, 2, 2);
INSERT INTO `films` VALUES (4, 'Trường An Như Cố', 1, 'https://img.bilutv.cc/film/18397/poster.jpg?v=1629296163', 'https://img.bilutv.cc/film/18397/big.jpg?v=1629010561', 'Trường An Như Cố / Cốt Cách Mỹ Nhân / Châu Sinh Như Cố (Chang An Memories 2021) là dự án phim dựa trên phần hậu truyện của cuốn tiểu thuyết ngôn tình Một Đời Một Kiếp nổi tiếng của Mặc Bảo Phi Bảo. Phim xoay quanh câu chuyện tình yêu nhưng không thể đến với nhau của Thôi Thời Nghi và Nam Chấn Vương Châu Sinh Thần, Châu Sinh Thần bị chết nơi sa trường còn Thời Nghi trở thành Thái tử phi.', 'Chang An Memories', 1, 'truong-an-nhu-co', 24, 600007, 2021, 2, 2);
INSERT INTO `films` VALUES (8, 'Bách Linh Đàm', 1, 'https://img.bilutv.cc/film/18433/poster.jpg', 'https://img.bilutv.cc/film/18433/big.jpg', 'Bách Linh Đàm là những câu chuyện tình cảm có liên quan đến bách quỷ bách linh đàm, mỗi nhân vật chính trong mỗi câu chuyện đều có tuyến tình cảm đặc sắc riêng. Chuyện phim bắt đầu từ việc Xuân Yêu (Quách Tuấn Thần thủ vai) bị trục xuất khỏi thiên đường vì phạm sai lầm và trở thành vua của tất cả quái vật trong hồ Trăm Tinh Linh. Trước đó anh vốn là một người bất tử được giao nhiệm vụ canh gác lũ quái vật ở Wangchuan. Mang tiếng là một vị vua nhưng Xuân Yêu thậm chí còn thua cả người bình thường', 'Bai Ling Tan', 1, 'bach-linh-dam', 32, 9, 2021, 2, 2);
INSERT INTO `films` VALUES (12, 'Trò Chơi Vương Quyền Phần 8', 7, 'https://img.bilutv.cc/film/18468/poster.jpg', 'https://img.bilutv.cc/film/18468/big.jpg', 'Trong phần 8 này, Jon và Daenerys đến Winterfell và gặp phải sự hoài nghi. Sam biết về số phận của gia đình mình. Cersei trao cho Euron phần thưởng mà anh ta nhắm tới. Theon đi theo tiếng gọi của trái tim anh. Trận chiến tại Winterfell đang đến gần. Jaime phải đối mặt với những hậu quả của quá khứ. Ban căng giữa Sansa và Daenerys đang leo thang...', 'Game of Thrones Season 8', 1, 'tro-choi-vuong-quyen-phan-8', 6, 5, 2019, 6, 2);
INSERT INTO `films` VALUES (13, 'Harry Potter Và Tên Tù Nhân Ngục Azkaban', 7, 'https://img.bilutv.cc/film/4512/poster.jpg', 'https://img.bilutv.cc/film/4512/big.jpg?v=1629038785', 'Harry Potter Và Tên Tù Nhân Ngục Azkaban lấy bối cảnh vào thời điểm khi năm học thứ 2 kết thúc Harry trở về nhà dì dượng, căn nhà trở thành địa ngục khi có sự xuất hiện của cô Marge. Bằng những lời lẽ thô bỉ, cô đã xúc phạm, làm tổn thương Harry và trong một phút nóng giận, cậu đã thổi phồng cô lên. Lo sợ bị trừng phạt, Harry chạy trốn ra khỏi căn nhà khủng khiếp ấy. Tuy nhiên, thật tình cờ trên chuyến xe bus hiệp sĩ cậu đã nghe nói về Sirius Black, tên phù thuỷ trốn khỏi ngục Azkaban. Harry được biết mục đích Sirius Black trốn ngục là để truy tìm cậu.', 'Harry Potter 3: Harry Potter and the Prisoner of Azkaban', 3, 'harry-potter-va-ten-tu-nhan-nguc-azkaban', 1, 2, 2004, 6, 1);
INSERT INTO `films` VALUES (14, 'Từng Một Lần Ta Yêu Nhau', 18, 'https://i3.wp.com/img.bilutv.cc/film/18394/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18394/big.jpg', 'Từng Một Lần Ta Yêu Nhau kể về Kaitoon - một nhân vật mà chắc là nhà nghèo gần nhất mẹ cái làng BL luôn rồi (Chỉ sau Đói của Ngày Hôm Ấy). Ẻm làm đủ mọi ngành nghề khác nhau, kiểu sinh ra để đi làm kiếm tiền á, nói chung là khổ không để đâu cho hết. Ẻm vướng vào một mối quan hệ rối rắm với 2 anh đẹp zai, một là đàn anh khóa trên tên Non, ngọt ngào ấm áp, hay giúp đỡ ẻm, đối nghịch với đó là một tên nhà giàu nhưng ăn chơi, cờ bạc cá độ tên Valen, thậm chí nợ đến mức đi cướp trúng ngay ẻm. Mà bọn mày biết rồi đấy, cột sống mà, người đẹp zai hiền lành ấm áp như anh Non chỉ sinh ra để làm nam phụ thôi =))) đ\' bao giờ được yêu đâu, thề =))) Mà yên tâm là sau này Valen sẽ thay đổi thôi, xem trailer thì thấy thế. Tuy nhiên chắc vẫn lấc cấc và hay gây chuyện nữa, trai hư luôn có một sức hút kỳ lạ mà =))) Mà vẫn tiếc anh Non ghê =))))', 'Love Area', 0, 'tung-mot-lan-ta-yeu-nhau', 10, 0, 2021, 5, 2);
INSERT INTO `films` VALUES (15, 'Hận Tình Hoán Phận', 7, 'https://i3.wp.com/img.bilutv.cc/film/18180/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18180/big.jpg', 'Hận Tình Hoán Phận kể về Wat là một ngôi sao hẹn hò cùng người mẫu nổi tiếng là Ginney. Tet là chàng phi công có bạn gái là bác sĩ Kulanji. Nhưng một ngày nọ, linh hồn của Wat và Tet hoán đổi cho nhau. Cuộc sống của hai người bị đảo lộn hoàn toàn. Họ sẽ đương đầu với những tình huống trớ trêu như thế nào? Liệu Ginney và Kulanji có nhận ra sự thật?', 'Keun Ruk Salub Chata', 1, 'han-tinh-hoan-phan', 20, 0, 2021, 5, 2);
INSERT INTO `films` VALUES (16, 'Trò Chơi Cân Não', 8, 'https://i3.wp.com/img.bilutv.cc/film/18212/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18212/big.jpg', 'Trò Chơi Cân Não là câu chuyên trở thành nghi can trong một vụ cướp, Thatthai phải tìm mọi cách để chứng minh mình vô tội. Anh tìm đến một người đàn ông cùng đội cộng sự đặc biệt để truy bắt những tên tội phạm thực sự.', 'The Mind Game', 1, 'tro-choi-can-nao', 20, 1, 2021, 5, 2);
INSERT INTO `films` VALUES (17, 'Chàng Hoàng Tử Trong Mơ (Phần 9)', 18, 'https://i3.wp.com/img.bilutv.cc/film/18329/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18329/big.jpg', 'Phim Chàng Hoàng Tử Trong Mơ phần 9 Sau tất cả, Cherry Milk cũng đã tìm được hoàng tử Serwae, một anh chàng Chàng trai xấu xa khoa Chính Trị cho mình.Firstclass, một chàng trai độc thân vui tính khoa Luật, yêu công lý và sự rõ ràng lại dính vào chuyện tình mờ ám với nàng Minute kiêu ngạo? Có lẽ là &quot;ghét của nào trời trao của nấy&quot;!', 'U Prince Series 9: Foxy Pilot', 1, 'chang-hoang-tu-trong-mo-phan-9', 10, 0, 2017, 5, 2);
INSERT INTO `films` VALUES (18, 'Tình Yêu Vô Hạn', 5, 'https://i3.wp.com/img.bilutv.cc/film/18392/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18392/big.jpg', 'Tình Yêu Vô Hạn kể về câu chuyện tình cảm của trùm mafia - thiếu gia Sky và chàng vệ sĩ Sun. Sau thời gian dài bên nhau, hai người lại có tình cảm và chính thức yêu nhau. Đây là bộ BL đầu tiên tại WeTV xoay quanh đề tài tình yêu của con trai Mafia và vệ sĩ, có lẽ cả hai sẽ phải vượt qua rất nhiều rào cản để đến được với nhau. Liệu tình yêu của cả 2 có đơm hoa kết trái?', 'Golden Blood', 0, 'tinh-yeu-vo-han', 8, 0, 2021, 5, 2);
INSERT INTO `films` VALUES (19, 'Bão Cát', 7, 'https://i3.wp.com/img.bilutv.cc/film/18107/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18107/big.jpg', 'Bão Cát bắt đầu từ vụ mất tích bí ẩn của người anh trai cùng cha khác mẹ của Naret (Film) khiến anh gặp lại mối tình đầu không thể nào quên của anh là Sai (Esther), khi hiện nay cô là người bạn thân thiết của anh trai anh. Bao thắc mắc về sự tan vỡ trong quá khứ lẫn những manh mối về sự mất tích của người anh luôn canh cánh trong lòng Naret. Khiến anh và Sai dấn thân vào hành trình tìm kiếm anh trai, đồng thời tìm ra kẻ chủ mưu đứng sau mọi chuyện.', 'Payu Sai', 1, 'bao-cat', 28, 0, 2021, 5, 2);
INSERT INTO `films` VALUES (20, 'Nàng Dâu Đại Gia', 17, 'https://i3.wp.com/img.bilutv.cc/film/18139/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18139/big.jpg', 'Nàng Dâu Đại Gia kể về ông trùm kinh doanh Tien điều hành nhà máy sản xuất vải lụa Decha Kun nổi tiếng ở Thái. Ông có bốn người con trai và luôn là người lên kế hoạch cho con mình từ việc học đến chuyện kết hôn mà không cần thông qua sự lựa chọn của các con. Tuy nhiên, người con trai út tên là Traiwit, vì không muốn theo các anh trai nối nghiệp gia đình nên anh chàng quyết định trở thành cảnh sát, rời khỏi nhà chuyển đến vùng Đông Bắc ở Thái làm việc. Tại đó anh gặp Fahsai, cô gái nhà quê luôn mang trong lòng hoài bão phát triển quê hương. Traiwit ban đầu không tiết lộ danh tính, vì vậy Fahsai nghĩ Traiwit đang cố tình lừa mọi người ở quê nhà, do đó cô không thích anh.Traiwit được chuyển về lại Bangkok, biết trước là sẽ gặp chuyện chẳng lành khi về tới nhà. Anh thuê Fahsai kết hôn giả với anh và giúp anh nghĩ cách chống lại bố mình. Anh đưa cô về nhà, sau đó cố gắng khiến bố anh chấp nhận những gì anh muốn. Khi về làm dâu dù được mẹ chồng thương yêu nhưng bố chồng lại không chấp nhận Fahsai. Ông tìm đủ mọi cách để đuổi cô ấy ra khỏi nhà với sự giúp đỡ của Orn Nisha, cô gái mà ông đã sắp đặt kết hôn với Traiwit. Fahsai luôn phải cố gắng giành được trái tim của bố chồng, trong khi cô và Traiwit bắt đầu có tình cảm thực sự với nhau.', 'Sapai Jao Sua', 1, 'nang-dau-dai-gia', 28, 0, 2021, 5, 2);
INSERT INTO `films` VALUES (21, 'Minh Châu Rực Rỡ', 18, 'https://i3.wp.com/img.bilutv.cc/film/18128/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18128/big.jpg', 'Minh Châu Rực Rỡ kể về Praomook (Bua Nalinthip) là một cô gái làm việc tại một hộp đêm để kiếm tiền trả nợ. Cô với Chalunthorn (Pon Nawasch) đã xảy ra mâu thuẫn vì anh ấy hiểu lầm cô, anh luôn cho rằng cô ấy là một cô gái xấu xa. Một ngày đẹp trời vận xui ám tình,cha mẹ Chalunthorn đã yêu cầu Praomook kết hôn với anh để xóa bỏ vận rủi cho chính anh. Cô chấp nhận lời cầu hôn chỉ để trả thù những hành động xem thường của anh dành cho mình. Nhưng để không kết hôn với cô, anh đã giả vờ mình là &quot;Gay&quot; để trốn tránh nhưng cô không tin. Cuối cùng lý trí không thắng được con tim, họ bắt đầu yêu nhau, nhưng những trở ngại cho tình yêu của họ cũng bắt đầu xuất hiện khi Treenucht - người yêu cũ của Chalunthorn muốn cố gắng dành lại anh. Ngoài ra còn có Maithong, đối thủ của gia đình Praomook và Chalunthorn xuất hiện.', 'Praomook', 1, 'minh-chau-ruc-ro', 28, 0, 2021, 5, 2);
INSERT INTO `films` VALUES (22, 'Dưới Bóng Mộc Miên', 18, 'https://i3.wp.com/img.bilutv.cc/film/18122/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18122/big.jpg', 'Dưới Bóng Mộc Miên xoay quanh câu chuyện kể về Malaai, vô tình được sắp đặt để kết hôn với Luang Wisarn, người sở hữu ngôi nhà Rom Ngiw mà không nhận ra rằng anh ta là người đồng tính. Đây là bắt đầu của câu chuyện tình yêu đầy bi kịch.', 'Reuan Rom Ngiw', 1, 'duoi-bong-moc-mien', 40, 0, 2021, 5, 2);
INSERT INTO `films` VALUES (23, ' Cô Gái Đến Từ Hư Vô (Phần 2)', 18, 'https://i3.wp.com/img.bilutv.cc/film/18121/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18121/big.jpg', 'Cô Gái Đến Từ Hư Vô (Phần 2) kể về Nanno đã trở lại, gieo rắc quả báo cho nhiều học sinh và giáo viên hơn nữa trong mùa mới của loạt phim hợp tuyển này – nhưng lần này, cô không chỉ có một mình.', 'Girl From Nowhere (Season 2)', 1, 'co-gai-den-tu-hu-vo-phan-2', 8, 1, 2021, 5, 2);
INSERT INTO `films` VALUES (24, 'Hành Trình Tìm Lại Tình Yêu', 18, 'https://i3.wp.com/img.bilutv.cc/film/18432/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18432/big.jpg', 'Hành Trình Tìm Lại Tình Yêu kể về cặp đôi đã chia tay nhưng một lần nữa đóng giả làm người yêu của nhau cùng tham gia chuyến du lịch để giành giải thưởng cho các cặp đôi, từ đó mở ra câu chuyện về tình yêu.', 'Check Out The Event', 1, 'hanh-trinh-tim-lai-tinh-yeu', 4, 0, 2021, 3, 2);
INSERT INTO `films` VALUES (25, 'Lãng Khách', 18, 'https://i3.wp.com/img.bilutv.cc/film/12997/poster.jpg?v=1630412495', 'https://i3.wp.com/img.bilutv.cc/film/12997/big.jpg?v=1630412495', 'Lãng Khách - Vagabond là bộ phim hành động kể về hai nhân vật vô tình biết được được những “bí mật đen” của quốc gia. Trong phim, Suzy sẽ vào vai nữ chính Go Hae Ri, một nhân viên tình báo thuộc Cơ quan Tình báo quốc gia. Bố của Go Hae Ri là Go Kang Chul, một Trung úy của Thủy quân lục chiến. Sau khi bố qua đời, Go Hae Ri quyết định trở thành nhân viên công vụ cấp bảy để gánh trách nhiệm chăm lo cho mọi người trong gia đình. Trong khi đó, Lee Seung Gi sẽ vào vai Cha Gun, một diễn viên đóng thế, vì một sự cố hàng không mà anh đã vô tình phát hiện ra những sự thật không mấy hay ho và bị cuốn vào vòng xoáy bí ẩn của Cục tình báo quốc gia NIS.', 'Vagabond', 1, 'lang-khach', 16, 0, 2019, 3, 2);
INSERT INTO `films` VALUES (26, 'Bầu Trời Rực Đỏ', 18, 'https://i3.wp.com/img.bilutv.cc/film/18453/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18453/big.jpg', 'Bầu Trời Rực Đỏ diễn ra trong bối cảnh thời đại Joseon. Phim xoay quanh nàng Hong Chun Gi (Kim Yoo Jung) - nữ họa sĩ đầu tiên và cũng là cuối cùng của triều đại này. Nàng sở hữu ngoại hình vô cùng xinh đẹp, tính cách tươi sáng cùng tài năng hội họa được thừa hưởng từ cha. Với nàng, hội họa là tất cả. Dù bị mù bẩm sinh nhưng nàng đã lấy lại được thị lực một cách thần kỳ. Cho đến một ngày, Hong Chun Gi gặp Ha Ram (Ahn Hyo Seop) - một viên chức tại Seowoongwan, chuyên phụ trách thiên văn, địa lý, khí tượng học và nghệ thuật bói toán. Ha Ram cũng bị mù từ nhỏ sau một tai nạn nhưng vẫn có thể đọc được thiên văn và các vì sao. Từ những cuộc gặp gỡ, 2 người đã nảy sinh tình cảm với nhau.', 'Lovers Of The Red Sky', 1, 'bau-troi-ruc-do', 16, 0, 2021, 3, 2);
INSERT INTO `films` VALUES (27, 'Sinh Nhật U Buồn', 2, 'https://i3.wp.com/img.bilutv.cc/film/18332/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18332/big.jpg', 'Blue Birthday nhân vật chính sẽ thăm lại quá khứ thông qua những bức ảnh bí ẩn do mối tình đầu của họ để lại, người đã chết vào đúng ngày sinh nhật của họ 10 năm trước. Ji Seojun (Hongseok thủ vai) chính là mối tình đầu của Oh Harin (Yeri đảm nhận). Vào ngày sinh nhật của Harin, Seojun đột ngột qua đời ngay lúc cô quyết định tỏ tình với anh. Sau khi trải qua khoảng thời gian đau buồn, Harin nhận việc tại một trung tâm chăm sóc động vật. Vào sinh nhật 10 năm sau, Harin tình cờ tìm thấy những bức ảnh do Seojun để lại và quay trở về ngày định mệnh của 10 năm trước. Dù luôn mang vẻ ngoài lạc quan và vui vẻ, Seojun lại ẩn giấu trong mình một mảng tối mà không ai chạm tới được. Harin là tia hi vọng duy nhất trong cuộc đời anh, và cứ thế anh nảy sinh tình cảm với cô. Thế nhưng, chưa kịp tỏ tình thì Seojun đã gặp phải cái chết đột ngột trong phòng nhiếp ảnh.', 'Blue Birthday', 1, 'sinh-nhat-u-buon', 15, 0, 2021, 3, 2);
INSERT INTO `films` VALUES (28, 'Điệu Cha-Cha-Cha Làng Biển', 18, 'https://i3.wp.com/img.bilutv.cc/film/18480/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18480/big.jpg', 'Điệu Cha-Cha-Cha Làng Biển kể về một nha sĩ từ thành phố lớn về ngôi làng ven biển thân tình mở phòng khám. Nơi đây cũng có một anh chàng đa năng mà trên mọi phương diện đều đối lập với cô.', 'Hometown Cha-Cha-Cha', 1, 'dieu-cha-cha-cha-lang-bien', 10, 0, 2021, 3, 2);
INSERT INTO `films` VALUES (29, 'Lạc Lối', 18, 'https://i3.wp.com/img.bilutv.cc/film/18479/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18479/big.jpg', 'Lạc Lối kể về câu chuyện của một cô gái 40 tuổi vô tích sự và chàng trai 27 tuổi lo sợ bản thân chẳng làm nên trò trống gì.', 'Lost', 1, 'lac-loi', 16, 0, 2021, 3, 2);
INSERT INTO `films` VALUES (30, 'Mouse: Kẻ Săn Người', 18, 'https://i3.wp.com/img.bilutv.cc/film/17962/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/17962/big.jpg', 'Kẻ Săn Người (Chuột Bạch mouse 2021) lấy bối cảnh tại thời điểm mà con người có thể xác định những kẻ rối loạn đa nhân cách thông qua xét nghiệm ADN khi vẫn còn là một bào thai. Phim xoay quanh cuộc truy đuổi giữa cảnh sát và tên sát nhân biến thái đang gây rúng động cả nước với sự tham gia diễn xuất của Lee Seung Gi, Lee Hee Joon, Park Joo Hyun, Kyung Soo Jin... Trong Mouse, Lee Seung Gi vào vai Jung Ba Reum, một cảnh sát tân binh xuất chúng, luôn tin vào công lý, ngay thẳng và nhân từ đến mức khó tin. Nhưng toàn bộ cuộc sống của anh nhanh chóng bị đảo lộn khi cuộc truy đuổi kẻ giết người hàng loạt bắt đầu...', 'Mouse', 1, 'mouse-ke-san-nguoi', 20, 0, 2021, 3, 2);
INSERT INTO `films` VALUES (31, 'Nhất Sinh Nhất Thế', 18, 'https://i3.wp.com/img.bilutv.cc/film/18485/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18485/big.jpg', 'Nhất Sinh Nhất Thế là phần hiện đại của tiểu thuyết, viết tiếp câu chyện tình yêu của Thời Nghi và Châu Sinh Thần. Phim kể về diễn viên lồng tiếng Thời Nghi, tính cách dịu dàng đáng yêu, tác phong làm việc chuyên nghiệp khiêm tốn, một ngày nọ ở sân bay vô tình gặp được giáo sư hóa học Châu Sinh Thần trở về từ nước ngoài, hai người vừa gặp như đã quen từ trước, sau thời gian tìm hiểu ngắn ngủi, đều để lại ấn tượng sâu sắc cho đối phương. Vì để cứu lấy sản nghiệp của gia tộc, Châu Sinh Thần đồng ý với điều kiện của mẹ mình, đính hôn rồi kế thừa sản nghiệp. Anh từ chối sự sắp đặt của người nhà, đưa ra lời yêu cầu đính hôn với Thời Nghi mà anh có hảo cảm. Thời Nghi trong lòng sớm đã nhận định anh, vui vẻ đồng ý.Trong quá trình tiếp xúc, hai người xảy ra phản ứng hóa học, hai trái tim dần dần kéo lại gần nhau. Châu Sinh Thần xảy ra xung đột cực lớn về mặt tư tưởng kinh doanh với các trưởng bối, đối mặt với hai bên tình thân và sự nghiệp đều khó xử, may mắn Thời Nghi luôn ở bên, cho anh sự ủng hộ và khích lệ vững chắc nhất, hai người sau cùng nắm tay bảo toàn được nghề thủ công truyền thống. Mưa gió đã qua, tình ý càng thêm sâu đậm. Ngay lúc này, Thời Nghi vì cứu Châu Sinh Thần mà bị kẻ gian hãm hại, thương tích nặng nề dẫn đến hôn mê bất tỉnh. Châu Sinh Thần đặt sự nghiệp xuống mà kề bên chăm sóc, sau cùng cũng đánh thức được vợ mình, hai người ước định đời này kiếp này bên nhau mãi không rời.', 'Một Đời Một Kiếp - Forever And Ever', 1, 'nhat-sinh-nhat-the', 37, 1, 2021, 2, 2);
INSERT INTO `films` VALUES (32, 'Nữ Nhi Nhà Họ Kiều', 18, 'https://i3.wp.com/img.bilutv.cc/film/18415/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18415/big.jpg?v=1629204386', 'Nữ Nhi Nhà Họ Kiều kể về gia đình nhà họ Kiều. Người mẹ của nhà họ Kiều lúc sinh người con thứ năm là Kiều Thất Thất thì qua đời, cha Kiều Tổ Vọng là một người vừa cộc cằn lại ích kỷ. Năm người con nhà họ Kiều gồm: Nhất Thành, Nhị Cường, Tam Lệ, Tứ Mỹ, Thất Thất vẫn luôn nỗ lực trong những ngày tháng gian khổ. Trải qua những đau khổ, cay đắng, cuối cùng gia đình nhà họ Kiều cũng luôn sát cánh bên nhau để đón nhận những hạnh phúc ấm áp. Trên bước đường trưởng thành của mỗi người, tuy có vấp ngã, có tổn thương nhưng họ đều cùng nhau nỗ lực và tiến về phía trước.', 'The Bond', 1, 'nu-nhi-nha-ho-kieu', 36, 0, 2021, 2, 2);
INSERT INTO `films` VALUES (33, 'Nữ Hoàng Trả Giá', 18, 'https://i3.wp.com/img.bilutv.cc/film/18477/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18477/big.jpg', 'Nữ Hoàng Trả Giá kể về cô gái Hạ Thiển (Ngô Cẩn Ngôn đóng) đang chuẩn bị đính hôn thì hôn phu của cô - Hà Chí Tuấn bỏ trốn. Trong lúc tâm trạng hụt hẫng và tồi tệ, cô đã đụng độ với ông chủ khách sạn Trường Thịnh, Thịnh Triết Ninh (Lâm Canh Tân đóng). Trong cuộc tranh luận, Hạ Thiển nhận thấy kỹ năng quan sát và phân tích chuyên sâu vấn đề của mình rất có lợi trong việc thương lượng trả giá. Và cô đã quyết định bắt đầu con đường trở thành một chuyên gia trả giá, thành lập công ty riêng. Công ty của cô phát triển lớn mạnh hơn với sự giúp đỡ của Thịnh Triết Ninh. Trong lúc này, anh bị rơi vào cái bẫy do các đối tác kinh doanh bày ra và bị đuổi ra khỏi khách sạn. Và Hà Chí Tuấn cũng xuất hiện trở lại trong cuộc đời của Hạ Thiển.', 'My Bargain Queen', 1, 'nu-hoang-tra-gia', 40, 0, 2021, 2, 2);
INSERT INTO `films` VALUES (34, 'Hãy Yêu Nhau Dưới Ánh Trăng Tròn', 18, 'https://i3.wp.com/img.bilutv.cc/film/18438/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18438/big.jpg', 'Hãy Yêu Nhau Dưới Trăng Tròn kể về cuộc sống và chuyện tình của Lôi Sơ Hạ trở nên khác hơn mọi ngày sau khi xuyên không vào một thế giới ảo. Chuyện phim bắt đầu từ việc Lôi Sơ Hạ (Cúc Tịnh Y đóng) bị ảnh hưởng bởi hiệu ứng đêm trăng siêu tròn, không những khiến cô mất trí trí nha mà còn khiến cuộc sống cô chấm dứt chuỗi ngày êm đềm, bình yên. Kể từ đêm đó không ai còn thấy Lôi Sơ Hạ nữa, cô đã bị lọt vào điện thoại của chàng trai Hứa Hiểu Đông (Trịnh Nghiệp đảm nhận). Đây cũng chính là câu chuyện tình yêu kỳ ảo của cặp đôi này, dù ban đầu cả hai không hề quen biết nhau và rất sốc khi biết chuyện không tưởng này lại xảy ra với bản thân họ. Nhưng điều kỳ diệu đã xuất hiện trong hoàn cảnh khó khăn này, nam chính Hứa Hiểu Đông cảm thấy rung động trước một cô gái ngọt ngào, luôn tràn đầy năng lượng nên đã quyết định mình như một vị cứu tinh, đưa cô thoát khỏi bóng tối của sự quên lãng để tìm thấy tình yêu phía trước.', 'Love Under The Full Moon', 1, 'hay-yeu-nhau-duoi-anh-trang-tron', 24, 0, 2021, 2, 2);
INSERT INTO `films` VALUES (35, 'Thẩm Phán Giả Mạo', 18, 'https://i3.wp.com/img.bilutv.cc/film/11575/poster.jpg?v=1630007511', 'https://i3.wp.com/img.bilutv.cc/film/11575/big.jpg?v=1629963480', 'Phim Thẩm Phán Giả Mạo Dear Judge là một bộ phim xoay quanh câu chuyện về hai anh em sinh đôi giống hệt nhau, Han Soo Ho và Han Kang Ho. Tuy ngoại hình hoàn toàn giống nhau, nhưng tính cách, đời sống riêng của họ hoàn toàn trái ngược. Trong khi, Han Soo Ho là một thẩm phán đáng kính làm tất cả mọi thứ trong sách, thì Han Kang Ho là một tên tội phạm đáng sợ đã từng phải ngồi tù. Khi Han Soo Ho đột nhiên biến mất, Han Kang Ho đã chiếm lấy vị trí của anh trai mình và sống một cuộc đời mới với tư cách là một thẩm phán.', 'Dear Judge', 1, 'tham-phan-gia-mao', 16, 1, 2018, 3, 2);
INSERT INTO `films` VALUES (36, 'Avatar 2', 7, 'https://i3.wp.com/img.bilutv.cc/film/4332/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/4332/big.jpg', 'Đây là câu chuyện về gia đình Sully và những gì họ làm để giữ cho gia đình luôn được ở cạnh nhau. Jake và Neytiri sẽ có gia đình riêng trong phần này, họ buộc phải rời khỏi nhà để ra ngoài khám phá những vùng khác nhau ở Pandora và dành phần lớn thời gian ở dưới nước. Tôi nghĩ đến việc tại sao bây giờ mọi người lại quan tâm đến giải trí nhiều hơn bao giờ hết? Tôi nghĩ rằng đó là cách để họ trốn thoát khỏi thế giới chúng ta đang ở, để thoát khỏi những áp lực khác mà họ gặp trong cuộc sống. Tôi nghĩ với Avatar, chúng ta có cơ hội cho phép mọi người trốn thoát đến một thế giới đáng kinh ngạc với những nhân vật đáng kinh ngạc mà họ sẽ theo dõi, theo cách tương tự như Peter Jackson đã làm với Lord of the Rings. Đây chính là những điều chúng tôi muốn mang lại.', 'Avatar 2', 2, 'avatar-2', 1, 0, 2021, 6, 1);
INSERT INTO `films` VALUES (37, 'Venom 2: Đối Mặt Tử Thù', 7, 'https://i3.wp.com/img.bilutv.cc/film/18416/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18416/big.jpg', 'Venom 2 “Đối Mặt Tử Thù” 2021 là phần tiếp theo đầy hành động của Venom năm 2018. Trong phần phim đầu tiên, nhà báo Eddie Brock ( Tom Hardy ) đã có được siêu năng lực phản diện sau khi vô tình trở thành vật chủ cho một sinh vật biểu tượng ngoài hành tinh, Venom 2, mục tiêu là chiếm lấy Trái đất. Một năm sau các sự kiện của phần phim đầu tiên, Brock đã đồng ý trở thành người dẫn chương trình cho Venom phần 2 được cải cách nhưng đang phải vật lộn với các siêu năng lực đi kèm với sự lựa chọn đó. Quay trở lại sự nghiệp nhà báo của mình, Brock gặp và phỏng vấn Cletus Kasady ( Woody Harrelson), một kẻ giết người hàng loạt bị giam giữ, người trở thành vật chủ của một symbiote ngoài hành tinh khác được gọi là Carnage. Hỗn loạn xảy ra khi Kasady (và Carnage cùng với anh ta) trốn thoát khỏi nhà tù. Giống như phần phim đầu tiên, bạn có thể mong đợi nhiều pha hành động, người ngoài hành tinh giống quái vật và bạo lực. Phim Venom 2021 Full HD Vietsub một lần nữa có sự tham gia của Tom Hardy trong vai Eddie Brock, một nhà báo có một sinh vật ngoài hành tinh sống bên trong anh ta. Cùng với nhau, họ là Venom. Lần này xung quanh Woody Harrelson cũng đóng vai chính sau khi nam diễn viên đóng vai kẻ giết người hàng loạt Cletus Kasady trong cảnh hậu tín dụng cho Venom 2 đầu tiên. Bộ phim mới sẽ chứng kiến ​​Kasady của Harrelson biến thành Carnage, một nhân vật phản diện được biết đến là phản diện chính của Venom trong truyện tranh. Andy Serkis chỉ đạo Venom 2: Let There be Carnage. Bộ phim của Columbia Pictures (liên kết với Marvel và Tencent Pictures) cũng có sự tham gia của Michelle Williams, Reid Scott và Naomie Harris trong vai nhân vật phản diện trong truyện tranh Shriek. Phim do Avi Arad, Matt Tolmach, Amy Pascal và Hutch Parker sản xuất. Mời các bạn cùng đón xem Venom phần 2 Full HD Vietsub tại website Phim Mới BiluTV. Team sẽ cập nhật bản Full HD Vietsub sớm nhất để mọi người cùng thưởng thức bản đẹp chất lượng cao nhanh nhất nhé. Chúc các bạn xem phim mới vui vẻ !!!\r\n\r\n', 'Venom: Let There Be Carnage', 2, 'venom-2-doi-mat-tu-thu', 1, 0, 2021, 6, 1);
INSERT INTO `films` VALUES (38, 'Cung Đàn Đẫm Lệ (Trại Nữ Tù Nhân)', 18, 'https://i3.wp.com/img.bilutv.cc/film/6901/poster.jpg?v=1629027370', 'https://i3.wp.com/img.bilutv.cc/film/6901/big.jpg?v=1629027370', 'Phim cung đàn đẫm lệ (trại nữ tù nhân) kể về một cô gái trẻ được gửi đến nhà tù vị thành viên vì cái chết của người cha dượng vũ phu. Ở đây, cô bước vào một thế giới đen tối với những mối quan hệ phức tạp, với ma túy, bệnh tâm thần...', 'Jailbait', 3, 'cung-dan-dam-le-trai-nu-tu-nhan', 1, 0, 2013, 6, 1);
INSERT INTO `films` VALUES (39, 'Đội Quân Người Chết', 7, 'https://i3.wp.com/img.bilutv.cc/film/18144/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18144/big.jpg?v=1629041791', 'Đội Quân Người Chết là câu chuyện khi zombie lan tràn ở Las Vegas, một nhóm lính đánh thuê quyết định chơi canh bạc cuối khi mạo hiểm tiến vào khu cách ly để thực hiện vụ trộm lớn nhất từ trước đến nay.', 'Army Of The Dead', 3, 'doi-quan-nguoi-chet', 1, 0, 2021, 6, 1);
INSERT INTO `films` VALUES (40, 'Quá Nhanh Quá Nguy Hiểm 9', 7, 'https://i3.wp.com/img.bilutv.cc/film/18157/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18157/big.jpg', 'Fast &amp; Furious 9: Huyền thoại tốc độ (F9) khi mà Dominic Toretto đang có một cuộc sống yên tĩnh ngoài lưới điện với Letty và con trai của anh ta, cậu bé Brian, nhưng họ biết rằng nguy hiểm luôn rình rập ngay phía chân trời yên bình của họ. Lần này, mối đe dọa đó sẽ buộc Dom phải đối mặt với tội lỗi trong quá khứ của mình nếu anh ấy định cứu những người anh ấy yêu thương nhất. Phi hành đoàn của anh ấy tham gia cùng nhau để ngăn chặn một âm mưu kinh hoàng thế giới được dẫn dắt bởi sát thủ lành nghề nhất và người lái xe hiệu suất cao nhất mà họ từng gặp: một người đàn ông cũng là người anh trai bị bỏ rơi của Dom, Jakob.', 'Fast & Furious 9: Huyền Thoại Tốc Độ', 3, 'qua-nhanh-qua-nguy-hiem-9', 1, 0, 2021, 6, 1);
INSERT INTO `films` VALUES (41, 'Chị Mười Ba: 3 Ngày Sinh Tử', 7, 'https://i3.wp.com/img.bilutv.cc/film/17726/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/17726/big.jpg', 'Chị Mười Ba (Chị 13) đưa Kẽm Gai, tay đàn em cũ vừa mới ra tù, lên Đà Lạt để làm việc cho tiệm Gara của mình. Tại đây, Kẽm Gai dường như đã tìm lại được sự bình yên và hạnh phúc. Tuy vậy, anh sớm trở thành đối tượng bị tình nghi giết hại Đức Mát - em trai của đại ca Thắng Khùng khét tiếng đất Đà Lạt - và phải trốn chạy. Với thời hạn chỉ ba ngày, liệu Chị Mười Ba có minh oan được cho Kẽm Gai và cứu anh em An Cư Nghĩa Đoàn khỏi mối đe doạ mới? Liệu có bí mật khủng khiếp nào khác đang được che giấu? Tất cả sẽ được hé lộ vào ngày 25/12/2020', 'Thập Tam Muội 2', 3, 'chi-muoi-ba-3-ngay-sinh-tu', 1, 0, 2020, 1, 1);
INSERT INTO `films` VALUES (42, 'Cuộc Chiến Mãng Xà 3: Xà Nhãn Báo Thù', 7, 'https://i3.wp.com/img.bilutv.cc/film/18419/poster.jpg', 'https://i3.wp.com/img.bilutv.cc/film/18419/big.jpg', 'G.I. JOE: Xà Nhãn Báo Thù - Snake Eyes: G.I. Joe Origins xoay quanh câu chuyện về anh chàng Snake Eyes, sau khi thành công giải cứu được người kế thừa, anh đã được vinh dự gia nhập và gia tộc tại Nhật Bản là Arashikage, tại đây anh được mọi người tại dây huấn luyện trở thành một chiến binh Ninja vĩ đại. Tuy nhiên, bí mật trong quá khứ của anh bỗng quay trở lại, do đó khiến cuộc sống của anh rơi vào nguy hiểm.', 'Snake Eyes: G.I. Joe Origins', 3, 'cuoc-chien-mang-xa-3-xa-nhan-bao-thu', 1, 0, 2021, 6, 1);

-- ----------------------------
-- Table structure for national
-- ----------------------------
DROP TABLE IF EXISTS `national`;
CREATE TABLE `national`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nation_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of national
-- ----------------------------
INSERT INTO `national` VALUES (1, 'Việt Nam', 'viet-nam');
INSERT INTO `national` VALUES (2, 'Trung Quốc', 'trung-quoc');
INSERT INTO `national` VALUES (3, 'Hàn Quốc', 'han-quoc');
INSERT INTO `national` VALUES (4, 'Nhật Bản', 'nhat-ban');
INSERT INTO `national` VALUES (5, 'Thái Lan', 'thai-lan');
INSERT INTO `national` VALUES (6, 'Mỹ', 'my');
INSERT INTO `national` VALUES (7, 'Pháp', 'phap');
INSERT INTO `national` VALUES (10, 'Tây Ban Nha', 'tay-ban-nha');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (0, 'Ẩn');
INSERT INTO `status` VALUES (1, 'Hiện');
INSERT INTO `status` VALUES (2, 'HD Trailer');
INSERT INTO `status` VALUES (3, 'Hoàn tất');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES (1, 'Phim Lẻ');
INSERT INTO `type` VALUES (2, 'Phim Bộ');
INSERT INTO `type` VALUES (3, 'Phim Chiếu Rạp');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `rule` int NULL DEFAULT NULL COMMENT '1 = admin, 0 =user',
  `status` int NULL DEFAULT NULL COMMENT '1 = active, 0 = inactive',
  `date_created` datetime NULL DEFAULT NULL,
  `url_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `name_display` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for website
-- ----------------------------
DROP TABLE IF EXISTS `website`;
CREATE TABLE `website`  (
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_vietnamese_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of website
-- ----------------------------
INSERT INTO `website` VALUES (NULL, NULL, '1');

SET FOREIGN_KEY_CHECKS = 1;
