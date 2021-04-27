/*
 Navicat Premium Data Transfer

 Source Server         : kibo
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:8889
 Source Schema         : skif

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 27/04/2021 23:34:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Корпусная мебель', 'corps', 'К корпусной мебели относятся шкафы, комоды, стеллажи, горки, трюмо, тумбы, словом, предметы мебели, имеющие внутренний объём именно для хранения либо демонстрации вещей. Такая мебель может иметь вид отдельно стоящих предметов либо быть элементом модульной конструкции - стенка или составной шкаф.', 'categories/RkTGOMAAvApuBOU9yhB26ZiPOYwPY9jGhuHrlBhm.png', 'corps.png', '2021-04-18 19:38:59', '2021-04-25 18:05:02');
INSERT INTO `categories` VALUES (2, 'Мягкая мебель', 'soft', 'Эта мебельная группа предполагает чаще всего комплект, включающий диван, кресла, кровати и стулья. Основным свойством такой мебели является мягкость и комфорт.', 'categories/eHROm1ZGix8dGbrgw2uq56kq9r8SEB9dD65mvwzX.png', 'soft.png', '2021-04-18 19:52:36', '2021-04-25 18:05:10');
INSERT INTO `categories` VALUES (4, 'Прочее', 'other', 'Столы представлены огромным разнообразием, изготовлены из различных материалов, выполнены в различных стилях, кроме того, современные модели отличаются дизайном, способом раскладывания. Столы делают из дерева, стекла, металла, пластика.', 'categories/aUKxL55YmqBhE0JH9Pk6PiLERbrjxfslgAqWgyjN.png', 'other.png', '2021-04-18 19:53:39', '2021-04-25 18:05:23');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lastname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fio` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `customers_code_unique`(`code`) USING BTREE,
  UNIQUE INDEX `customers_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (5, 2, '982365199553', NULL, NULL, NULL, NULL, 'ООО \"Юпитер\"', 'upiter@info.com', 'Гвардейская 5', '+7-777-777-10-10', '2021-04-27 11:55:18', '2021-04-27 17:16:38');
INSERT INTO `customers` VALUES (7, 1, '347061866200', 'Николай', 'Макаров', 'Викторович', NULL, NULL, 'makarov_v@gmail.com', '8 март 4-16', '+7-777-123-32-21', '2021-04-27 12:28:40', '2021-04-27 18:07:21');
INSERT INTO `customers` VALUES (8, 1, '942944546297', 'Юрий', 'Нестеров', 'Игоревич', NULL, NULL, 'nesterov1010@gmail.com', '6 мкр 10-10', '+77019013005', '2021-04-27 18:27:15', '2021-04-27 18:27:15');
INSERT INTO `customers` VALUES (9, 2, '601579973170', NULL, NULL, NULL, NULL, 'АО \"Аргус\"', 'argus@argus.ru', 'Пионерская 7', '+7-776-555-40-40', '2021-04-27 18:30:24', '2021-04-27 18:30:24');
INSERT INTO `customers` VALUES (10, 1, '842002341610', 'Айгуль', 'Оспанова', 'Олжасовна', NULL, NULL, 'ospanova_ao@mail.ru', 'Мира 5-39', '+7-776-432-87-65', '2021-04-27 18:33:02', '2021-04-27 18:33:02');

-- ----------------------------
-- Table structure for fabrics
-- ----------------------------
DROP TABLE IF EXISTS `fabrics`;
CREATE TABLE `fabrics`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fabrics
-- ----------------------------
INSERT INTO `fabrics` VALUES (1, 'Жаккард', 5500, 'Прочные и износостойкие ткани, вырабатываемые из синтетических, хлопчатобумажных или смесовых волокон на жаккардовом станке.', '2021-04-24 17:23:24', '2021-04-24 19:22:24');
INSERT INTO `fabrics` VALUES (3, 'Гобелен', 5400, 'Ткань, схожая с жаккардом, но превосходящая его по плотности. Износостойкая и долговечная. Используется в производстве элитной мебели.', '2021-04-24 17:24:05', '2021-04-24 19:22:35');
INSERT INTO `fabrics` VALUES (4, 'Шенилл', 5200, 'Приятная на ощупь прочная ткань. Полностью гипоаллергенна. Современный шенилл имеет пропитку против пыли, влаги и маслянистых жидкостей.', '2021-04-24 17:24:39', '2021-04-24 19:22:42');
INSERT INTO `fabrics` VALUES (5, 'Флок', 4900, 'Недорогая практичная ткань с мелким ворсом для изготовления мебели «эконом» и «стандарт» класса.', '2021-04-24 17:24:56', '2021-04-24 19:22:51');
INSERT INTO `fabrics` VALUES (6, 'Велюр', 5000, 'Мягкая ткань для обивки недорогих диванов и кресел.', '2021-04-24 17:25:15', '2021-04-24 19:22:58');
INSERT INTO `fabrics` VALUES (7, 'Рогожка', 5100, 'Шенилл с грубым плетением из толстых нитей, используется для создания мебели в современном и эко стиле.', '2021-04-24 17:25:32', '2021-04-24 19:23:05');
INSERT INTO `fabrics` VALUES (8, 'Бархат', 5000, 'Ткань для обивки мебели класса «люкс». В мебельном производстве используются специальные износостойкие виды бархата.', '2021-04-24 17:25:49', '2021-04-24 19:23:16');
INSERT INTO `fabrics` VALUES (9, 'Натуральная кожа', 5700, 'Экологически чистый материал с превосходными потребительскими качествами. Используется для обивки мебели представительского класса.', '2021-04-24 17:26:03', '2021-04-24 19:23:23');
INSERT INTO `fabrics` VALUES (10, 'Искусственная кожа', 5000, 'Синтетический аналог кожи, не пропускающий влагу и устойчивый к воздействию механических нагрузок.', '2021-04-24 17:26:21', '2021-04-24 19:23:30');

-- ----------------------------
-- Table structure for materials
-- ----------------------------
DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `price` double NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materials
-- ----------------------------
INSERT INTO `materials` VALUES (4, 'H1115-1', 'materials/ZzRux5W2YdsuAGjsg7yeOFYI1Ta6088rcPaKEDyJ.jpg', 'H1115-1.jpg', 2300, '2021-04-24 18:05:04', '2021-04-24 18:05:04');
INSERT INTO `materials` VALUES (5, 'H1122-1', 'materials/hq6Pm3LmebQxcWVdv0eYGsLqLYBQuMzUtjUOQHCf.jpg', 'H1122-1.jpg', 2300, '2021-04-24 18:05:17', '2021-04-24 18:05:17');
INSERT INTO `materials` VALUES (6, 'H1123-1', 'materials/jVWEVi21dwb2yu8PBBNv3KYF1JMQywWMhOBVwee3.jpg', 'H1123-1.jpg', 2300, '2021-04-24 18:05:28', '2021-04-24 18:05:28');
INSERT INTO `materials` VALUES (7, 'H1137-1', 'materials/Xpj5PWTK0xNxqhqEVEBcSl0pPT82AEA1myPG5Kkk.jpg', 'H1137-1.jpg', 2300, '2021-04-24 18:05:40', '2021-04-24 18:05:40');
INSERT INTO `materials` VALUES (8, 'H1145-1', 'materials/xMzBXGvTXc6sKh71RXI6XxOVpdSK4phk1P3ng0QM.jpg', 'H1145-1.jpg', 2300, '2021-04-24 18:05:51', '2021-04-24 18:05:51');
INSERT INTO `materials` VALUES (9, 'H1146-1', 'materials/VtRSmQ2MHvYT4tjE3jKjGCEt7bPWBNRKmp2aKf1m.jpg', 'H1146-1.jpg', 2300, '2021-04-24 18:06:07', '2021-04-24 18:06:07');
INSERT INTO `materials` VALUES (10, 'H1150-1', 'materials/zNqG3bJHeEQYIzj63kdGPDJJV6xPS2va3j44YoOQ.jpg', 'H1150-1.jpg', 2300, '2021-04-24 18:06:37', '2021-04-24 18:06:37');
INSERT INTO `materials` VALUES (11, 'H1151', 'materials/t2EGf1K1kB8jRqdGo1ys52BsPGhMrGTCwQyFQtIK.jpg', 'H1151.jpg', 2300, '2021-04-24 18:06:52', '2021-04-24 18:06:52');
INSERT INTO `materials` VALUES (14, 'H1199', 'materials/8HtrI3dC4lAAJGhO1tj7Ojj6tXR41zrNNm6VJm7E.jpg', 'H1199.jpg', 2300, '2021-04-24 18:07:33', '2021-04-24 18:07:33');
INSERT INTO `materials` VALUES (15, 'H1210', 'materials/yry5kb2RsMIo75hduyuxtuRy9m2nvPY079cmjYOn.jpg', 'H1210.jpg', 2300, '2021-04-24 18:08:17', '2021-04-24 18:08:17');
INSERT INTO `materials` VALUES (16, 'H1212', 'materials/06pLDECJlgRa4lSrEeDyYu9G9hOSvbnNxPB8Qf0s.jpg', 'H1212.jpg', 2300, '2021-04-24 18:08:31', '2021-04-24 18:08:31');
INSERT INTO `materials` VALUES (17, 'H1250', 'materials/ugFzf35bhjcb8ILvU2G616DustZyX2hUsiT8Osp2.jpg', 'H1250.jpg', 2300, '2021-04-24 18:08:44', '2021-04-24 18:08:44');
INSERT INTO `materials` VALUES (18, 'H1253', 'materials/axVp0n5CR9fB80zW03l92os8wesWBLbjugeMpV2l.jpg', 'H1253.jpg', 2300, '2021-04-24 18:09:04', '2021-04-24 18:09:04');
INSERT INTO `materials` VALUES (21, 'H1334', 'materials/pxHxh94EFZbhrBHzxROQqk2Nvuovk124Xekr63A1.jpg', 'H1334.jpg', 2300, '2021-04-24 18:10:11', '2021-04-24 18:10:11');
INSERT INTO `materials` VALUES (23, 'H1377', 'materials/DQ1RR3KUYNfDeUaPC6VZeh8slklPK9tONOaOn2bW.jpg', 'H1377.jpg', 2300, '2021-04-24 18:11:10', '2021-04-24 18:11:10');
INSERT INTO `materials` VALUES (24, 'H1401', 'materials/sdWBv3GQoz2eR9XBeWVcr0AzcSpg2PAYgFWBUHM6.jpg', 'H1401.jpg', 2300, '2021-04-24 18:11:34', '2021-04-24 18:11:34');
INSERT INTO `materials` VALUES (25, 'H1582', 'materials/bsJ2P5giD76KnfYJFFomImYP1FbM95whsJ8753C3.jpg', 'H1582.jpg', 2300, '2021-04-24 18:11:49', '2021-04-24 18:11:49');
INSERT INTO `materials` VALUES (26, 'H1733', 'materials/WrCUIgukiSYXh2KgL8ISBECElUHvpWpWUhg1zSWG.jpg', 'H1733.jpg', 2300, '2021-04-24 18:12:03', '2021-04-24 18:12:03');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2021_04_16_184540_create_positions_table', 1);
INSERT INTO `migrations` VALUES (2, '2021_04_16_184654_create_workers_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_04_16_184709_create_roles_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_04_16_184729_create_users_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_04_16_184749_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_04_16_184808_create_permission_user_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_04_17_163938_create_categories_table', 2);
INSERT INTO `migrations` VALUES (21, '2021_04_24_170907_create_trees_table', 3);
INSERT INTO `migrations` VALUES (22, '2021_04_24_170951_create_materials_table', 3);
INSERT INTO `migrations` VALUES (23, '2021_04_24_171011_create_fabrics_table', 3);
INSERT INTO `migrations` VALUES (25, '2021_04_24_193139_create_products_table', 4);
INSERT INTO `migrations` VALUES (26, '2021_04_25_200157_create_customers_table', 5);

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user`  (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  INDEX `permission_user_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `permission_user_permission_id_foreign`(`permission_id`) USING BTREE,
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `info` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES (1, 'Директор', 55000, '2021-04-16 15:54:52', '2021-04-16 15:55:00');
INSERT INTO `positions` VALUES (2, 'Кладовщик', 40000, '2021-04-16 15:55:18', '2021-04-16 15:55:18');
INSERT INTO `positions` VALUES (3, 'Продавец', 35000, '2021-04-16 15:58:55', '2021-04-16 15:58:55');
INSERT INTO `positions` VALUES (4, 'Мастер', 30000, '2021-04-16 15:59:12', '2021-04-16 15:59:12');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `L` double NOT NULL DEFAULT 0,
  `B` double NOT NULL DEFAULT 0,
  `H` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 4, 'Стол компьютерный континент', 1304, 704, 760, 6140, 'products/lYHzt2o71W4ycCWMwymgXFJbjitbmYBHLpD8jTRQ.jpg', 'SF238.jpg', NULL, '2021-04-25 16:46:53', '2021-04-25 19:09:30');
INSERT INTO `products` VALUES (3, 4, 'Стол криволинейный оптима', 1300, 900, 760, 3480, 'products/7E02UMbMnqFXwJNK9CUzlinUFwi730UosSnfHHT9.jpg', 'SF257.jpg', NULL, '2021-04-25 19:10:44', '2021-04-25 19:10:44');
INSERT INTO `products` VALUES (4, 4, 'Стол компьютерный оптима', 1304, 704, 760, 6050, 'products/9EWfIzwHa2SqfLNdcEv4iHr8FwmrthVUgX3w8jq3.jpg', 'SF248.jpg', NULL, '2021-04-25 19:12:03', '2021-04-25 19:12:03');
INSERT INTO `products` VALUES (5, 2, 'Диван Интегра', 2100, 880, 820, 26500, 'products/PyCypq6WjHBjsdDE1FetIgArmwMRsFi5K6wl2NCu.jpg', 'DI365.jpg', NULL, '2021-04-25 19:16:58', '2021-04-25 19:20:36');
INSERT INTO `products` VALUES (6, 2, 'Диван Клерк', 1900, 800, 800, 24750, 'products/vt69afFOcXGFFttrTbanQDp3o6DAuqLqfvYNcpsb.jpg', 'DI475.jpg', NULL, '2021-04-25 19:19:51', '2021-04-25 19:19:51');
INSERT INTO `products` VALUES (7, 2, 'Диван Алекто', 1730, 850, 700, 21300, 'products/NM7RxenFBOn4sJfCTFnHNyHCV029ryd0GcLc0vD8.jpg', 'DI220.jpg', NULL, '2021-04-25 19:21:41', '2021-04-25 19:22:05');
INSERT INTO `products` VALUES (8, 1, 'Стеллаж угловой Оптима', 406, 406, 2000, 3390, 'products/luwgCxccjgit3EPv70kCkkHnVJFXEbl8X0oIE7Oj.jpg', 'LF202.jpg', NULL, '2021-04-25 19:24:36', '2021-04-25 19:24:36');
INSERT INTO `products` VALUES (9, 1, 'Шкаф полузакрытый Оптима', 800, 406, 2000, 5860, 'products/cGPiOkFyGg8V2U5mKBahSV8rLnEC9fBmQUBBwQg5.jpg', 'LF218.jpg', NULL, '2021-04-25 19:25:14', '2021-04-25 19:25:14');
INSERT INTO `products` VALUES (10, 1, 'Шкаф для одежды Оптима', 800, 560, 2000, 6760, 'products/JEkVWKXTmzVh4RFXInVReEE0drDJ0VgBVDhf3hhA.jpg', 'SHF222.jpg', NULL, '2021-04-25 19:25:41', '2021-04-25 19:25:41');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Админ', 'admin', NULL, NULL);
INSERT INTO `roles` VALUES (2, 'Директор', 'director', NULL, NULL);
INSERT INTO `roles` VALUES (3, 'Продавец', 'vendor', NULL, NULL);
INSERT INTO `roles` VALUES (4, 'Кладовщик', 'storeman', NULL, NULL);

-- ----------------------------
-- Table structure for trees
-- ----------------------------
DROP TABLE IF EXISTS `trees`;
CREATE TABLE `trees`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trees
-- ----------------------------
INSERT INTO `trees` VALUES (1, 'ЛДСП', 1500, 'Ламинированная древесно-стружечная плита', '2021-04-24 17:30:10', '2021-04-24 19:17:31');
INSERT INTO `trees` VALUES (2, 'МДФ', 1700, 'Древесноволокнистая плита средней плотности', '2021-04-24 17:30:43', '2021-04-24 19:17:38');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `worker_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_name_unique`(`name`) USING BTREE,
  INDEX `users_worker_id_foreign`(`worker_id`) USING BTREE,
  CONSTRAINT `users_worker_id_foreign` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'kibo13', '$2y$10$D97rW6JurFRxoNwL.gXpHOATH525JzEWXMG7Cc4NRzwruW8wYgOoe', 1, 1, NULL, '2021-04-15 12:04:43', '2021-04-15 12:04:43');
INSERT INTO `users` VALUES (3, 'КрасюковАА', '$2y$10$IzO49C3nXcC/pN5QZrk.Aeuhk6Df6.ByNcGY2xMujpHWIIR/DUUle', 2, 2, NULL, '2021-04-17 10:54:17', '2021-04-17 11:18:34');
INSERT INTO `users` VALUES (4, 'КупцоваВН', '$2y$10$O9oJpjUhJVVPvMz.i5apeOVCyjdxjqvRU.iH6dxaOhbkcn22ik.2y', 4, 3, NULL, '2021-04-17 11:21:19', '2021-04-17 11:21:19');
INSERT INTO `users` VALUES (5, 'ИвановСВ', '$2y$10$5yTRmYloloXQqZTsKfg8m.mzqa5/NyHlM8yiFFVpu5cOnE1bWRK/6', 3, 4, NULL, '2021-04-17 11:21:47', '2021-04-17 11:21:47');

-- ----------------------------
-- Table structure for workers
-- ----------------------------
DROP TABLE IF EXISTS `workers`;
CREATE TABLE `workers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fio` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `slug` tinyint(4) NULL DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of workers
-- ----------------------------
INSERT INTO `workers` VALUES (1, 'sa', 'sa', 'sa', 'sa', 1, 0, 'sa', 'sa', NULL, NULL);
INSERT INTO `workers` VALUES (2, 'Александр', 'Красюков', 'Александрович', 'Красюков А.А.', 1, 1, 'Янгеля 7-23', '+7-776-878-01-01', NULL, '2021-04-17 09:06:10');
INSERT INTO `workers` VALUES (3, 'Валентина', 'Купцова', 'Николаевна', 'Купцова В.Н.', 2, 1, 'Глушко 14-10', '+7-701-677-40-31', '2021-04-16 17:32:53', '2021-04-17 09:31:56');
INSERT INTO `workers` VALUES (4, 'Сергей', 'Иванов', 'Васильевич', 'Иванов С.В.', 3, 1, 'Ниточкина 2-28', '+7-771-321-14-41', '2021-04-16 17:36:24', '2021-04-17 09:32:02');
INSERT INTO `workers` VALUES (5, 'Борис', 'Петров', 'Анатольевич', 'Петров Б.А.', 4, 0, 'Шубникова 4-45', '+7-771-878-67-81', '2021-04-16 17:37:29', '2021-04-17 09:32:13');

SET FOREIGN_KEY_CHECKS = 1;
