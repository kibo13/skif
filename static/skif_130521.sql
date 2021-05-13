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

 Date: 13/05/2021 14:05:42
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
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Корпусная мебель', 'corps', 'К корпусной мебели относятся шкафы, комоды, стеллажи, горки, трюмо, тумбы, словом, предметы мебели, имеющие внутренний объём именно для хранения либо демонстрации вещей. Такая мебель может иметь вид отдельно стоящих предметов либо быть элементом модульной конструкции - стенка или составной шкаф.', '2021-04-18 19:38:59', '2021-04-25 18:05:02');
INSERT INTO `categories` VALUES (2, 'Мягкая мебель', 'soft', 'Эта мебельная группа предполагает чаще всего комплект, включающий диван, кресла, кровати и стулья. Основным свойством такой мебели является мягкость и комфорт.', '2021-04-18 19:52:36', '2021-04-25 18:05:10');
INSERT INTO `categories` VALUES (4, 'Прочее', 'other', 'Столы представлены огромным разнообразием, изготовлены из различных материалов, выполнены в различных стилях, кроме того, современные модели отличаются дизайном, способом раскладывания. Столы делают из дерева, стекла, металла, пластика.', '2021-04-18 19:53:39', '2021-04-25 18:05:23');

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
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fabrics
-- ----------------------------
INSERT INTO `fabrics` VALUES (1, 'Синий', '#007bff', '2021-05-08 21:30:56', '2021-05-08 21:30:56');
INSERT INTO `fabrics` VALUES (2, 'Серый', '#bdd4e7', '2021-05-08 21:40:52', '2021-05-08 21:40:52');
INSERT INTO `fabrics` VALUES (3, 'Желтый', '#fbb034', '2021-05-08 21:48:53', '2021-05-08 21:48:53');
INSERT INTO `fabrics` VALUES (4, 'Баклажан', '#a4508b', '2021-05-08 21:49:55', '2021-05-08 21:49:55');
INSERT INTO `fabrics` VALUES (5, 'Оливковый', '#3bb78f', '2021-05-08 21:51:52', '2021-05-08 21:51:52');
INSERT INTO `fabrics` VALUES (6, 'Коричневый', '#a5571b', '2021-05-08 21:53:01', '2021-05-08 21:53:01');
INSERT INTO `fabrics` VALUES (7, 'Черный', '#434343', '2021-05-08 21:54:02', '2021-05-08 21:54:02');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2021_04_16_184540_create_positions_table', 1);
INSERT INTO `migrations` VALUES (2, '2021_04_16_184654_create_workers_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_04_16_184709_create_roles_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_04_16_184729_create_users_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_05_08_183751_create_categories_table', 2);
INSERT INTO `migrations` VALUES (6, '2021_05_08_183759_create_customers_table', 2);
INSERT INTO `migrations` VALUES (7, '2021_05_08_184213_create_plates_table', 3);
INSERT INTO `migrations` VALUES (8, '2021_05_08_184222_create_fabrics_table', 3);
INSERT INTO `migrations` VALUES (9, '2021_05_08_224008_create_products_table', 4);
INSERT INTO `migrations` VALUES (10, '2021_05_09_113420_create_types_table', 5);
INSERT INTO `migrations` VALUES (11, '2021_05_13_063952_update_categories_table', 6);
INSERT INTO `migrations` VALUES (12, '2021_05_13_064435_create_orders_table', 7);
INSERT INTO `migrations` VALUES (13, '2021_05_13_064447_create_order_type_table', 7);

-- ----------------------------
-- Table structure for order_type
-- ----------------------------
DROP TABLE IF EXISTS `order_type`;
CREATE TABLE `order_type`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_type_order_id_foreign`(`order_id`) USING BTREE,
  CONSTRAINT `order_type_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_type
-- ----------------------------
INSERT INTO `order_type` VALUES (3, 2, 3, 5, '2021-05-13 12:25:26', '2021-05-13 12:25:32');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (2, 0, '2021-05-13 12:25:25', '2021-05-13 12:25:25');

-- ----------------------------
-- Table structure for plates
-- ----------------------------
DROP TABLE IF EXISTS `plates`;
CREATE TABLE `plates`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of plates
-- ----------------------------
INSERT INTO `plates` VALUES (1, 'H1277', 'plates/15P7O2b3MwtukNuyfgEYFgXnJchYNrhpXLgXt2nN.jpg', 'H1277.jpg', '2021-05-08 19:19:11', '2021-05-08 19:19:11');
INSERT INTO `plates` VALUES (2, 'H1334', 'plates/37JF4TXX5RON8Enz6831dyrUOsqcXLS0jSeVARa6.jpg', 'H1334.jpg', '2021-05-08 19:19:36', '2021-05-08 19:19:36');
INSERT INTO `plates` VALUES (3, 'H1377', 'plates/jo20y9pNv2s4llU5OAyMcirVn7V0vJ7EwM2WfwYW.jpg', 'H1377.jpg', '2021-05-08 19:19:46', '2021-05-08 19:19:46');
INSERT INTO `plates` VALUES (4, 'H1511', 'plates/C9cZrbf3iOqqloGvTY6tc1siIDtjljLPLQ6YwsiL.jpg', 'H1511.jpg', '2021-05-08 19:19:54', '2021-05-08 19:19:54');
INSERT INTO `plates` VALUES (5, 'H1702', 'plates/hs8EgqDJLDpG4hbyunboonmdB4sOMK9aOKoUqwih.jpg', 'H1702.jpg', '2021-05-08 19:20:02', '2021-05-08 19:20:02');
INSERT INTO `plates` VALUES (6, 'H1714', 'plates/EZlAUYxSgWBih6WUDyq0mTrPSBoc26LyQ0OwOLfC.jpg', 'H1714.jpg', '2021-05-08 19:20:09', '2021-05-08 19:20:09');
INSERT INTO `plates` VALUES (7, 'H3325', 'plates/tyzcrKwBmeZGfNRBprh3Os71ZE3Ufx8irFRDHl5P.jpg', 'H3325.jpg', '2021-05-08 19:20:16', '2021-05-08 19:20:16');

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
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `L` double NOT NULL DEFAULT 0,
  `B` double NOT NULL DEFAULT 0,
  `H` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 1, '210509160612', 'Шкаф для одежды', 800, 560, 2000, 6815, NULL, '2021-05-09 11:08:00', '2021-05-09 11:08:00');
INSERT INTO `products` VALUES (2, 1, '210509161800', 'Шкаф полузакрытый', 800, 406, 2000, 5920, NULL, '2021-05-09 11:18:35', '2021-05-09 11:18:35');
INSERT INTO `products` VALUES (3, 1, '210509161844', 'Шкаф открытый', 800, 406, 2000, 4890, NULL, '2021-05-09 11:19:05', '2021-05-09 11:19:05');
INSERT INTO `products` VALUES (4, 4, '210509162633', 'Стол компьютерный', 1200, 704, 760, 4715, NULL, '2021-05-09 11:27:33', '2021-05-09 11:27:33');
INSERT INTO `products` VALUES (5, 4, '210509162744', 'Стол компьютерный', 1304, 704, 760, 6140, NULL, '2021-05-09 11:28:13', '2021-05-09 11:28:13');
INSERT INTO `products` VALUES (6, 4, '210509162818', 'Стол компьютерный', 1304, 704, 760, 6140, NULL, '2021-05-09 11:28:50', '2021-05-09 11:28:50');
INSERT INTO `products` VALUES (7, 2, '210509162926', 'Диван Лидер', 2250, 600, 950, 14025, NULL, '2021-05-09 11:31:03', '2021-05-09 11:31:03');
INSERT INTO `products` VALUES (8, 2, '210509163115', 'Диван Некст', 2250, 600, 850, 12750, NULL, '2021-05-09 11:32:04', '2021-05-09 11:32:04');

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
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `plate_id` int(11) NULL DEFAULT NULL,
  `fabric_id` int(11) NULL DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `types_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `types_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES (1, 1, 4, NULL, 'products/T8brLG8YvT7jOLCJ8Wqacqs7xuvmWJTdYLQOaKpW.jpg', 'SHF222-VISHNYA.jpg', '2021-05-10 06:20:23', '2021-05-10 07:25:26');
INSERT INTO `types` VALUES (2, 1, 6, NULL, 'products/8lfneLUL0T1j1uAYehEYNuRzls2Nl8HyWKX0bj1c.jpg', 'SHF222-NOCHE.jpg', '2021-05-10 07:26:23', '2021-05-10 07:26:23');
INSERT INTO `types` VALUES (3, 1, 3, NULL, 'products/eciv8GvY5vL2UI8u4lmh5WskRU7Qg6tVmGyA7ztp.jpg', 'SHF222-SHIMO.jpg', '2021-05-10 07:27:53', '2021-05-10 07:27:53');
INSERT INTO `types` VALUES (4, 2, 6, NULL, 'products/Q67hy5zjZSD8Ja8s09RtukJJ2w4RHSnVefEo9sP9.jpg', 'LF218-OREH.jpg', '2021-05-10 07:30:54', '2021-05-10 07:30:54');
INSERT INTO `types` VALUES (5, 2, 3, NULL, 'products/G2QHWoBwCIRj36tYksPBiW09XyKo9aW5srU00smz.jpg', 'LF218-SHIMO.jpg', '2021-05-10 07:31:05', '2021-05-10 07:31:05');
INSERT INTO `types` VALUES (6, 3, 6, NULL, 'products/PYHyQa4Vg6fwozvnNOkkb6nLnb79N2QDpQnmzhxJ.jpg', 'LF221-NOCHE.jpg', '2021-05-10 07:31:49', '2021-05-10 07:31:49');
INSERT INTO `types` VALUES (7, 3, 3, NULL, 'products/Duu0KgF5KkjjltHcqVx4o8RY2jHYvUCZkswU26bQ.jpg', 'LF221-YASEN.jpg', '2021-05-10 07:31:59', '2021-05-10 07:31:59');
INSERT INTO `types` VALUES (8, 3, 4, NULL, 'products/b4af2TL0kbuAxxPU9CyORRnJVF9DMWMzSeR0bEbR.jpg', 'LF221-OFSFORD.jpg', '2021-05-10 07:32:13', '2021-05-10 07:32:13');
INSERT INTO `types` VALUES (9, 4, 4, NULL, 'products/rigDxEJG705CnCJTR2Psefy9BXttBPxB0LqKO5zn.jpg', 'SF214-OKSFORD.jpg', '2021-05-10 07:34:12', '2021-05-10 07:34:12');
INSERT INTO `types` VALUES (10, 4, 6, NULL, 'products/YLG6iTChQTtLGXwxDlpVi8TeWFAYGNcpUXZrQwV7.jpg', 'SF214-YEASEN.jpg', '2021-05-10 07:34:43', '2021-05-10 07:34:43');
INSERT INTO `types` VALUES (11, 5, 2, NULL, 'products/mWFNhIMAsSeXOU9LQKP3JTeCSz7YAgJVVzFnN9bz.jpg', 'SF228-BUK.jpg', '2021-05-10 07:35:03', '2021-05-10 07:35:10');
INSERT INTO `types` VALUES (12, 5, 4, NULL, 'products/ijzTvvsuSwmpyseVoi9W0iyL2Z1CNGwvm3PFXJkc.jpg', 'SF228-OKSFORD.jpg', '2021-05-10 07:35:21', '2021-05-10 07:35:21');
INSERT INTO `types` VALUES (13, 5, 3, NULL, 'products/7WCzewTeN73wi2tr4amSlxnjOnrn2WKoEnMwn71l.jpg', 'SF228-YASEN.jpg', '2021-05-10 07:35:56', '2021-05-10 07:36:04');
INSERT INTO `types` VALUES (14, 6, 2, NULL, 'products/EpjvVKSqgOIW7d8xrh6KH98J6ZAtPb7AQ4wA3sSS.jpg', 'SF238-BUK.jpg', '2021-05-10 07:36:34', '2021-05-10 07:36:34');
INSERT INTO `types` VALUES (15, 6, 6, NULL, 'products/wn5QMDpcmME3uh9esRNPezrOfw3T223fgwA8EvaB.jpg', 'SF238-NOCHE.jpg', '2021-05-10 07:36:51', '2021-05-10 07:36:51');
INSERT INTO `types` VALUES (16, 6, 3, NULL, 'products/SZR6VlAvrxVrTkgLGgx8qHDGQYJU9ke6BJhirzYV.jpg', 'SF238-YEASEN.jpg', '2021-05-10 07:37:07', '2021-05-10 07:37:07');
INSERT INTO `types` VALUES (17, 7, NULL, 2, 'products/hX3d0nvqG29xicwdJ2u9RL2hZOET92oEem2pWMOf.jpg', 'cap-gray.jpg', '2021-05-10 07:37:56', '2021-05-10 07:37:56');
INSERT INTO `types` VALUES (18, 7, NULL, 6, 'products/JdmWdtdDMtwg2Ehn3R1ecB6zCCXzM8DiJB4IgVUC.jpg', 'cap-brown.jpg', '2021-05-10 07:43:02', '2021-05-10 07:43:02');
INSERT INTO `types` VALUES (19, 8, NULL, 1, 'products/LHC34MSZrUFR80vQslVC2hOyi5nQVvi6gtFvamIT.jpg', 'next-ocean.jpg', '2021-05-10 07:43:22', '2021-05-10 07:43:22');
INSERT INTO `types` VALUES (20, 8, NULL, 2, 'products/ifJsiO7Ezu2mJUXIeGl7VHMb7RWDMpyD6dBbA5Xl.jpg', 'next-gray.jpg', '2021-05-10 07:43:31', '2021-05-10 07:43:31');
INSERT INTO `types` VALUES (21, 8, NULL, 3, 'products/WCpoKl0Jms5HBLXU8YZP5viAsIglKuXelu7nQ9DX.jpg', 'next-sunny.jpg', '2021-05-10 07:43:39', '2021-05-10 07:43:39');

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
