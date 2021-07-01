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

 Date: 01/07/2021 17:10:05
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Корпусная мебель', 'corps', 'К корпусной мебели относятся шкафы, комоды, стеллажи, горки, трюмо, тумбы, словом, предметы мебели, имеющие внутренний объём именно для хранения либо демонстрации вещей. Такая мебель может иметь вид отдельно стоящих предметов либо быть элементом модульной конструкции - стенка или составной шкаф.', '2021-04-18 19:38:59', '2021-04-25 18:05:02');
INSERT INTO `categories` VALUES (2, 'Мягкая мебель', 'soft', 'Эта мебельная группа предполагает чаще всего комплект, включающий диван, кресла, кровати и стулья. Основным свойством такой мебели является мягкость и комфорт.', '2021-04-18 19:52:36', '2021-04-25 18:05:10');
INSERT INTO `categories` VALUES (4, 'Прочее', 'other', 'Столы представлены огромным разнообразием, изготовлены из различных материалов, выполнены в различных стилях, кроме того, современные модели отличаются дизайном, способом раскладывания. Столы делают из дерева, стекла, металла, пластика.', '2021-04-18 19:53:39', '2021-04-25 18:05:23');

-- ----------------------------
-- Table structure for color_material
-- ----------------------------
DROP TABLE IF EXISTS `color_material`;
CREATE TABLE `color_material`  (
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  INDEX `color_material_color_id_foreign`(`color_id`) USING BTREE,
  INDEX `color_material_material_id_foreign`(`material_id`) USING BTREE,
  CONSTRAINT `color_material_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `color_material_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of color_material
-- ----------------------------
INSERT INTO `color_material` VALUES (1, 1);
INSERT INTO `color_material` VALUES (2, 1);
INSERT INTO `color_material` VALUES (3, 1);
INSERT INTO `color_material` VALUES (4, 1);
INSERT INTO `color_material` VALUES (5, 1);
INSERT INTO `color_material` VALUES (6, 1);
INSERT INTO `color_material` VALUES (7, 1);
INSERT INTO `color_material` VALUES (8, 2);
INSERT INTO `color_material` VALUES (9, 2);
INSERT INTO `color_material` VALUES (10, 2);
INSERT INTO `color_material` VALUES (11, 2);
INSERT INTO `color_material` VALUES (12, 2);

-- ----------------------------
-- Table structure for colors
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of colors
-- ----------------------------
INSERT INTO `colors` VALUES (1, 'H1277', 'colors/kfkwz2C1MylPI068s1R0RdnKi9qWuD3TgOvGt37J.jpg', 'H1277.jpg', '2021-05-26 12:48:03', '2021-05-26 12:48:03');
INSERT INTO `colors` VALUES (2, 'H1334', 'colors/9AhpkotEihwCaLPid6U1rZNsmhX8dKZHchpTFYP9.jpg', 'H1334.jpg', '2021-05-26 12:48:37', '2021-05-26 12:48:37');
INSERT INTO `colors` VALUES (3, 'H1377', 'colors/oOZujO31ZwU6Tr1rfwnJ08dPY4PqawUgw4K3lAXf.jpg', 'H1377.jpg', '2021-05-26 12:49:19', '2021-05-26 12:49:19');
INSERT INTO `colors` VALUES (4, 'H1511', 'colors/hkGrc0epWkwiHz9BqMsGucC2y7JoDlkyWXBlMuAM.jpg', 'H1511.jpg', '2021-05-26 12:49:27', '2021-05-26 12:49:27');
INSERT INTO `colors` VALUES (5, 'H1702', 'colors/XdaLIJCLCqfZgAnTyrcTDwFugE4OtXeaSWYuC7LB.jpg', 'H1702.jpg', '2021-05-26 12:49:36', '2021-05-26 12:49:36');
INSERT INTO `colors` VALUES (6, 'H1714', 'colors/VBrtdEfrvfoqsH5hWV2xmXdTvO4syz4f1f51DzvP.jpg', 'H1714.jpg', '2021-05-26 12:49:44', '2021-05-26 12:49:44');
INSERT INTO `colors` VALUES (7, 'H3325', 'colors/YkRbWu2KDY8vzlhi1ozUoEIgywUz9EQFWz9BVII5.jpg', 'H3325.jpg', '2021-05-26 12:49:54', '2021-05-26 12:49:54');
INSERT INTO `colors` VALUES (8, '0134', 'colors/kmcDfPDAjk5sklqbUZpxpUTeDCig0dEL9wdkHvMp.jpg', '0134.jpg', '2021-05-26 12:50:39', '2021-05-26 12:50:39');
INSERT INTO `colors` VALUES (9, '0182', 'colors/Fw1EK6qVTswMq5IOT8TeJT77lad5480OtBJv6xAo.jpg', '0182.jpg', '2021-05-26 12:50:56', '2021-05-26 12:50:56');
INSERT INTO `colors` VALUES (10, '1700', 'colors/1nadppQodPmd77iIZY2APok8CnI83X3rlVtaBuqp.jpg', '1700.jpg', '2021-05-26 12:51:03', '2021-05-26 12:51:03');
INSERT INTO `colors` VALUES (11, '0171', 'colors/fFTfdxruxGQCTsdaURqUKOzdaJD1eLpU5eLnH0ar.jpg', '0171.jpg', '2021-05-26 12:51:29', '2021-05-26 12:51:29');
INSERT INTO `colors` VALUES (12, 'K099', 'colors/kexL1C0yuYfxRWTDT7sgWviF7tiYmJi7Vt8Nba8Z.jpg', 'K099.jpg', '2021-05-26 12:51:41', '2021-05-26 12:51:41');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 2, '982365199553', NULL, NULL, NULL, NULL, 'ООО \"Юпитер\"', 'bageg13749@64ge.com', 'Гвардейская 5', '+7-777-777-10-10', '2021-04-27 11:55:18', '2021-05-30 07:06:00');
INSERT INTO `customers` VALUES (2, 1, '347061866200', 'Николай', 'Макаров', 'Викторович', NULL, NULL, 'sajevi4737@frnla.com', '8 март 4-16', '+7-777-123-32-21', '2021-04-27 12:28:40', '2021-05-27 17:02:56');
INSERT INTO `customers` VALUES (3, 1, '942944546297', 'Юрий', 'Нестеров', 'Игоревич', NULL, NULL, 'gifeyan410@brayy.com', '6 мкр 10-10', '+77019013005', '2021-04-27 18:27:15', '2021-05-27 10:03:21');
INSERT INTO `customers` VALUES (4, 2, '601579973170', NULL, NULL, NULL, NULL, 'АО \"Аргус\"', 'hifalov123@brayy.com', 'Пионерская 7', '+7-776-555-40-40', '2021-04-27 18:30:24', '2021-05-27 17:03:24');
INSERT INTO `customers` VALUES (5, 1, '842002341610', 'Айгуль', 'Оспанова', 'Олжасовна', NULL, NULL, 'larelin588@64ge.com', 'Мира 5-39', '+7-776-432-87-65', '2021-04-27 18:33:02', '2021-05-27 17:03:44');
INSERT INTO `customers` VALUES (6, 1, '843123167299', 'Кирилл', 'Чайкин', 'Ильич', NULL, NULL, 'bisil13547@brayy.com', 'Шубникова 8-59', '+7-776-081-53-08', '2021-05-14 19:26:49', '2021-05-27 17:04:05');

-- ----------------------------
-- Table structure for materials
-- ----------------------------
DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tom` tinyint(4) NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `L` double NULL DEFAULT NULL,
  `B` double NULL DEFAULT NULL,
  `H` double NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `measure` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materials
-- ----------------------------
INSERT INTO `materials` VALUES (1, 1, 'ЛДСП', 2800, 2070, 16, NULL, '2021-05-26 18:42:33', '2021-06-01 14:23:34', 'шт');
INSERT INTO `materials` VALUES (2, 2, 'Экокожа', NULL, NULL, NULL, NULL, '2021-05-26 18:42:55', '2021-06-01 14:23:40', 'м');
INSERT INTO `materials` VALUES (3, 3, 'Гвозди', NULL, NULL, NULL, NULL, '2021-05-26 18:44:45', '2021-06-01 14:23:45', 'шт');
INSERT INTO `materials` VALUES (5, 3, 'Шурупы', NULL, NULL, NULL, NULL, '2021-05-26 19:01:49', '2021-06-01 14:23:50', 'шт');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2021_04_16_184540_create_positions_table', 1);
INSERT INTO `migrations` VALUES (2, '2021_04_16_184654_create_workers_table', 1);
INSERT INTO `migrations` VALUES (3, '2021_04_16_184709_create_roles_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_04_16_184729_create_users_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_05_26_114705_create_customers_table', 2);
INSERT INTO `migrations` VALUES (6, '2021_05_26_115518_create_categories_table', 3);
INSERT INTO `migrations` VALUES (7, '2021_05_26_125844_create_materials_table', 4);
INSERT INTO `migrations` VALUES (8, '2021_05_26_125853_create_colors_table', 4);
INSERT INTO `migrations` VALUES (9, '2021_05_26_125902_create_color_material_table', 4);
INSERT INTO `migrations` VALUES (10, '2021_05_27_050906_create_products_table', 5);
INSERT INTO `migrations` VALUES (11, '2021_05_27_050914_create_tops_table', 5);
INSERT INTO `migrations` VALUES (12, '2021_05_27_093048_create_orders_table', 6);
INSERT INTO `migrations` VALUES (13, '2021_05_27_093107_create_order_top_table', 6);
INSERT INTO `migrations` VALUES (15, '2021_05_27_115524_create_suppliers_table', 7);
INSERT INTO `migrations` VALUES (25, '2021_05_28_054447_create_movements_table', 8);
INSERT INTO `migrations` VALUES (26, '2021_05_30_075723_create_moms_table', 8);
INSERT INTO `migrations` VALUES (27, '2021_06_01_042057_alter_table_materials', 8);
INSERT INTO `migrations` VALUES (38, '2021_06_02_054619_create_purchases_table', 9);
INSERT INTO `migrations` VALUES (39, '2021_06_02_054937_create_poms_table', 9);
INSERT INTO `migrations` VALUES (40, '2021_06_11_174800_create_permissions_table', 10);
INSERT INTO `migrations` VALUES (41, '2021_06_11_174814_create_permission_user_table', 10);
INSERT INTO `migrations` VALUES (44, '2021_06_21_103316_alter_table_purchases', 11);

-- ----------------------------
-- Table structure for moms
-- ----------------------------
DROP TABLE IF EXISTS `moms`;
CREATE TABLE `moms`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movement_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` int(11) NOT NULL,
  `color_id` int(11) NULL DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `count` int(11) NOT NULL DEFAULT 1,
  `measure` tinyint(4) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `moms_movement_id_foreign`(`movement_id`) USING BTREE,
  CONSTRAINT `moms_movement_id_foreign` FOREIGN KEY (`movement_id`) REFERENCES `movements` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of moms
-- ----------------------------
INSERT INTO `moms` VALUES (1, 2, 1, 1, 1580, 20, NULL, '2021-06-01 14:22:04', '2021-06-01 14:22:04');
INSERT INTO `moms` VALUES (2, 2, 1, 2, 1580, 20, NULL, '2021-06-01 14:22:17', '2021-06-01 14:22:17');
INSERT INTO `moms` VALUES (3, 2, 1, 3, 1580, 20, NULL, '2021-06-01 14:22:34', '2021-06-01 14:22:34');
INSERT INTO `moms` VALUES (4, 2, 1, 4, 1580, 20, NULL, '2021-06-01 14:22:49', '2021-06-01 14:22:49');
INSERT INTO `moms` VALUES (5, 2, 1, 5, 1580, 20, NULL, '2021-06-01 14:23:00', '2021-06-01 14:23:00');
INSERT INTO `moms` VALUES (6, 2, 1, 6, 1580, 20, NULL, '2021-06-01 14:29:10', '2021-06-01 14:29:10');
INSERT INTO `moms` VALUES (7, 2, 1, 7, 1580, 20, NULL, '2021-06-01 14:29:20', '2021-06-01 14:29:20');
INSERT INTO `moms` VALUES (8, 2, 3, NULL, 17, 100, NULL, '2021-06-01 14:29:42', '2021-06-01 14:29:42');
INSERT INTO `moms` VALUES (9, 2, 5, NULL, 19, 100, NULL, '2021-06-01 14:30:03', '2021-06-01 14:30:03');
INSERT INTO `moms` VALUES (10, 3, 1, 1, 1580, 2, NULL, '2021-06-01 14:30:54', '2021-06-01 14:30:54');
INSERT INTO `moms` VALUES (11, 3, 3, NULL, 17, 12, NULL, '2021-06-01 14:31:07', '2021-06-01 14:31:07');
INSERT INTO `moms` VALUES (12, 3, 5, NULL, 19, 8, NULL, '2021-06-01 14:31:17', '2021-06-01 14:31:17');
INSERT INTO `moms` VALUES (13, 4, 1, 2, 1580, 2, NULL, '2021-06-01 14:32:04', '2021-06-01 14:32:04');
INSERT INTO `moms` VALUES (14, 4, 3, NULL, 17, 12, NULL, '2021-06-01 14:32:16', '2021-06-01 14:32:16');
INSERT INTO `moms` VALUES (15, 4, 5, NULL, 19, 20, NULL, '2021-06-01 14:32:25', '2021-06-01 14:32:25');

-- ----------------------------
-- Table structure for movements
-- ----------------------------
DROP TABLE IF EXISTS `movements`;
CREATE TABLE `movements`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tot` tinyint(4) NOT NULL,
  `date_move` date NOT NULL,
  `worker_id` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of movements
-- ----------------------------
INSERT INTO `movements` VALUES (2, '210601160421', 1, '2021-05-17', NULL, 4, NULL, '2021-06-01 11:04:29', '2021-06-01 11:04:29');
INSERT INTO `movements` VALUES (3, '210601161016', 2, '2021-05-20', 5, 4, NULL, '2021-06-01 11:10:27', '2021-06-01 11:10:27');
INSERT INTO `movements` VALUES (4, '210601193128', 2, '2021-05-21', 5, 4, NULL, '2021-06-01 14:31:42', '2021-06-01 14:31:49');

-- ----------------------------
-- Table structure for order_top
-- ----------------------------
DROP TABLE IF EXISTS `order_top`;
CREATE TABLE `order_top`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `top_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_top_order_id_foreign`(`order_id`) USING BTREE,
  CONSTRAINT `order_top_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_top
-- ----------------------------
INSERT INTO `order_top` VALUES (4, 2, 17, 2, '2021-05-27 10:02:08', '2021-05-27 10:02:14');
INSERT INTO `order_top` VALUES (5, 3, 10, 5, '2021-05-27 17:04:27', '2021-05-27 17:04:27');
INSERT INTO `order_top` VALUES (6, 3, 9, 5, '2021-05-27 17:04:31', '2021-05-27 17:04:31');
INSERT INTO `order_top` VALUES (7, 4, 4, 1, '2021-05-27 17:12:27', '2021-05-27 17:12:27');
INSERT INTO `order_top` VALUES (8, 5, 2, 5, '2021-05-30 07:02:41', '2021-05-30 07:02:41');
INSERT INTO `order_top` VALUES (9, 5, 18, 1, '2021-05-30 07:02:56', '2021-05-30 07:02:56');
INSERT INTO `order_top` VALUES (11, 6, 15, 2, '2021-05-30 11:00:37', '2021-05-30 11:00:37');
INSERT INTO `order_top` VALUES (12, 6, 16, 2, '2021-05-30 11:00:42', '2021-05-30 11:00:57');
INSERT INTO `order_top` VALUES (13, 6, 10, 2, '2021-05-30 11:00:48', '2021-05-30 11:01:07');
INSERT INTO `order_top` VALUES (19, 9, 1, 1, '2021-06-12 16:08:37', '2021-06-12 16:08:37');
INSERT INTO `order_top` VALUES (20, 9, 17, 1, '2021-06-12 16:08:42', '2021-06-12 16:08:42');
INSERT INTO `order_top` VALUES (21, 9, 15, 2, '2021-06-12 16:08:48', '2021-06-12 16:08:48');
INSERT INTO `order_top` VALUES (22, 10, 18, 1, '2021-06-25 18:21:04', '2021-06-25 18:21:04');
INSERT INTO `order_top` VALUES (23, 11, 10, 10, '2021-06-25 18:22:21', '2021-06-25 18:22:21');
INSERT INTO `order_top` VALUES (24, 11, 3, 10, '2021-06-25 18:22:34', '2021-06-25 18:22:34');
INSERT INTO `order_top` VALUES (25, 11, 15, 10, '2021-06-25 18:22:49', '2021-06-25 18:22:49');
INSERT INTO `order_top` VALUES (26, 12, 5, 10, '2021-06-25 18:31:45', '2021-06-25 18:31:45');
INSERT INTO `order_top` VALUES (27, 12, 8, 10, '2021-06-25 18:31:51', '2021-06-25 18:31:51');
INSERT INTO `order_top` VALUES (28, 12, 12, 15, '2021-06-25 18:31:55', '2021-06-25 18:31:55');
INSERT INTO `order_top` VALUES (29, 13, 1, 1, '2021-06-27 11:28:26', '2021-06-27 11:28:26');
INSERT INTO `order_top` VALUES (30, 13, 15, 2, '2021-06-27 11:28:35', '2021-06-27 11:28:35');
INSERT INTO `order_top` VALUES (31, 14, 19, 2, '2021-06-27 11:29:25', '2021-06-27 11:29:25');
INSERT INTO `order_top` VALUES (32, 15, 12, 10, '2021-06-27 11:30:35', '2021-06-27 11:30:35');
INSERT INTO `order_top` VALUES (33, 15, 11, 10, '2021-06-27 11:30:40', '2021-06-27 11:30:40');
INSERT INTO `order_top` VALUES (34, 15, 9, 10, '2021-06-27 11:30:46', '2021-06-27 11:30:46');
INSERT INTO `order_top` VALUES (35, 16, 17, 10, '2021-06-27 11:31:36', '2021-06-27 11:31:36');
INSERT INTO `order_top` VALUES (36, 17, 21, 1, '2021-06-27 11:32:30', '2021-06-27 11:32:30');
INSERT INTO `order_top` VALUES (37, 17, 12, 1, '2021-06-27 11:32:34', '2021-06-27 11:32:34');
INSERT INTO `order_top` VALUES (38, 17, 3, 1, '2021-06-27 11:32:38', '2021-06-27 11:32:38');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date_on` date NULL DEFAULT NULL,
  `date_off` date NULL DEFAULT NULL,
  `customer_id` int(11) NULL DEFAULT NULL,
  `worker_id` int(11) NULL DEFAULT NULL,
  `pay` tinyint(4) NOT NULL DEFAULT 0,
  `depo` tinyint(4) NOT NULL DEFAULT 0,
  `debt` tinyint(4) NOT NULL DEFAULT 0,
  `total` double NOT NULL DEFAULT 0,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (2, '210527150216', '2021-01-27', '2021-02-11', 3, 4, 1, 1, 1, 28050, 2, NULL, '2021-05-27 10:02:08', '2021-06-23 04:54:21');
INSERT INTO `orders` VALUES (3, '210527220437', '2021-01-27', '2021-02-11', 1, 4, 1, 1, 1, 47150, 2, NULL, '2021-05-27 17:04:27', '2021-06-27 11:46:23');
INSERT INTO `orders` VALUES (4, '210527221230', '2021-01-27', '2021-02-10', 6, 4, 2, 1, 1, 5920, 2, NULL, '2021-05-27 17:12:27', '2021-06-27 11:46:29');
INSERT INTO `orders` VALUES (5, '210530120308', '2021-01-27', '2021-02-10', 1, 4, 1, 1, 1, 48100, 2, NULL, '2021-05-30 07:02:41', '2021-05-30 07:07:07');
INSERT INTO `orders` VALUES (6, '210530160135', '2021-02-16', '2021-03-03', 4, 4, 1, 1, 1, 33990, 2, NULL, '2021-05-30 11:00:23', '2021-05-30 11:01:53');
INSERT INTO `orders` VALUES (9, '210612220855', '2021-02-11', '2021-02-25', 3, 6, 1, 1, 1, 33120, 2, NULL, '2021-06-12 16:08:37', '2021-06-12 16:09:08');
INSERT INTO `orders` VALUES (10, '210625232112', '2021-02-11', '2021-02-25', 5, 6, 2, 1, 1, 14025, 2, NULL, '2021-06-25 18:21:04', '2021-06-25 18:22:03');
INSERT INTO `orders` VALUES (11, '210625232256', '2021-03-05', '2021-03-19', 4, 6, 1, 1, 1, 176700, 2, NULL, '2021-06-25 18:22:21', '2021-06-25 18:31:29');
INSERT INTO `orders` VALUES (12, '210625233201', '2021-04-07', '2021-04-22', 1, 4, 1, 1, 1, 200200, 2, NULL, '2021-06-25 18:31:45', '2021-06-25 18:32:15');
INSERT INTO `orders` VALUES (13, '210627162844', '2021-02-11', '2021-02-26', 6, 4, 2, 1, 1, 19095, 2, NULL, '2021-06-27 11:28:26', '2021-06-27 11:29:03');
INSERT INTO `orders` VALUES (14, '210627162929', '2021-02-09', '2021-02-24', 3, 4, 2, 1, 1, 25500, 2, NULL, '2021-06-27 11:29:25', '2021-06-27 11:29:50');
INSERT INTO `orders` VALUES (15, '210627163051', '2021-05-14', '2021-05-29', 1, 4, 1, 1, 1, 169950, 2, NULL, '2021-06-27 11:30:35', '2021-06-27 11:31:05');
INSERT INTO `orders` VALUES (16, '210627163140', '2021-06-02', '2021-06-17', 4, 4, 2, 1, 1, 140250, 2, NULL, '2021-06-27 11:31:36', '2021-06-27 11:31:57');
INSERT INTO `orders` VALUES (17, '210627163243', '2021-05-14', '2021-05-29', 5, 4, 2, 1, 1, 25705, 2, NULL, '2021-06-27 11:32:29', '2021-06-27 11:32:56');

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
-- Records of permission_user
-- ----------------------------
INSERT INTO `permission_user` VALUES (1, 5);
INSERT INTO `permission_user` VALUES (6, 5);
INSERT INTO `permission_user` VALUES (7, 5);
INSERT INTO `permission_user` VALUES (10, 5);
INSERT INTO `permission_user` VALUES (11, 5);
INSERT INTO `permission_user` VALUES (12, 5);
INSERT INTO `permission_user` VALUES (13, 5);
INSERT INTO `permission_user` VALUES (14, 5);
INSERT INTO `permission_user` VALUES (15, 5);
INSERT INTO `permission_user` VALUES (16, 5);
INSERT INTO `permission_user` VALUES (17, 5);
INSERT INTO `permission_user` VALUES (1, 6);
INSERT INTO `permission_user` VALUES (6, 6);
INSERT INTO `permission_user` VALUES (7, 6);
INSERT INTO `permission_user` VALUES (10, 6);
INSERT INTO `permission_user` VALUES (11, 6);
INSERT INTO `permission_user` VALUES (12, 6);
INSERT INTO `permission_user` VALUES (13, 6);
INSERT INTO `permission_user` VALUES (14, 6);
INSERT INTO `permission_user` VALUES (15, 6);
INSERT INTO `permission_user` VALUES (16, 6);
INSERT INTO `permission_user` VALUES (17, 6);
INSERT INTO `permission_user` VALUES (12, 4);
INSERT INTO `permission_user` VALUES (13, 4);
INSERT INTO `permission_user` VALUES (18, 4);
INSERT INTO `permission_user` VALUES (19, 4);
INSERT INTO `permission_user` VALUES (20, 4);
INSERT INTO `permission_user` VALUES (21, 4);
INSERT INTO `permission_user` VALUES (1, 1);
INSERT INTO `permission_user` VALUES (2, 1);
INSERT INTO `permission_user` VALUES (3, 1);
INSERT INTO `permission_user` VALUES (4, 1);
INSERT INTO `permission_user` VALUES (5, 1);
INSERT INTO `permission_user` VALUES (6, 1);
INSERT INTO `permission_user` VALUES (7, 1);
INSERT INTO `permission_user` VALUES (8, 1);
INSERT INTO `permission_user` VALUES (9, 1);
INSERT INTO `permission_user` VALUES (10, 1);
INSERT INTO `permission_user` VALUES (11, 1);
INSERT INTO `permission_user` VALUES (12, 1);
INSERT INTO `permission_user` VALUES (13, 1);
INSERT INTO `permission_user` VALUES (14, 1);
INSERT INTO `permission_user` VALUES (15, 1);
INSERT INTO `permission_user` VALUES (16, 1);
INSERT INTO `permission_user` VALUES (17, 1);
INSERT INTO `permission_user` VALUES (18, 1);
INSERT INTO `permission_user` VALUES (19, 1);
INSERT INTO `permission_user` VALUES (20, 1);
INSERT INTO `permission_user` VALUES (21, 1);
INSERT INTO `permission_user` VALUES (22, 1);
INSERT INTO `permission_user` VALUES (23, 1);
INSERT INTO `permission_user` VALUES (24, 1);
INSERT INTO `permission_user` VALUES (25, 1);
INSERT INTO `permission_user` VALUES (1, 3);
INSERT INTO `permission_user` VALUES (2, 3);
INSERT INTO `permission_user` VALUES (3, 3);
INSERT INTO `permission_user` VALUES (4, 3);
INSERT INTO `permission_user` VALUES (5, 3);
INSERT INTO `permission_user` VALUES (8, 3);
INSERT INTO `permission_user` VALUES (9, 3);
INSERT INTO `permission_user` VALUES (14, 3);
INSERT INTO `permission_user` VALUES (22, 3);
INSERT INTO `permission_user` VALUES (23, 3);
INSERT INTO `permission_user` VALUES (24, 3);
INSERT INTO `permission_user` VALUES (25, 3);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `info` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'Главная', 'home', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (2, 'Пользователи', 'user_read', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (3, 'Пользователи', 'user_full', '0', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (4, 'Сотрудники', 'emp_read', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (5, 'Сотрудники', 'emp_full', '0', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (6, 'Клиенты', 'cust_read', '1', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (7, 'Клиенты', 'cust_full', '1', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (8, 'Поставщики', 'sup_read', '1', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (9, 'Поставщики', 'sup_full', '1', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (10, 'Категории', 'cat_read', '1', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (11, 'Категории', 'cat_full', '1', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (12, 'Материалы', 'mat_read', '1', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (13, 'Материалы', 'mat_full', '1', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (14, 'Мебель', 'furn_read', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (15, 'Мебель', 'furn_full', '0', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (16, 'Заказы', 'order_read', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (17, 'Заказы', 'order_full', '0', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (18, 'Склад', 'store_read', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (19, 'Склад', 'store_full', '0', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (20, 'Ведомости', 'statement_read', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (21, 'Ведомости', 'statement_full', '0', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (22, 'Закупки', 'buy_read', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (23, 'Закупки', 'buy_full', '0', 'Редактирование', NULL, NULL);
INSERT INTO `permissions` VALUES (24, 'Отчеты', 'repo', '0', 'Просмотр', NULL, NULL);
INSERT INTO `permissions` VALUES (25, 'Графики', 'graph', '0', 'Просмотр', NULL, NULL);

-- ----------------------------
-- Table structure for poms
-- ----------------------------
DROP TABLE IF EXISTS `poms`;
CREATE TABLE `poms`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` int(11) NOT NULL,
  `color_id` int(11) NULL DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `poms_purchase_id_foreign`(`purchase_id`) USING BTREE,
  CONSTRAINT `poms_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of poms
-- ----------------------------
INSERT INTO `poms` VALUES (1, 1, 1, 1, 11, '2021-06-10 20:02:03', '2021-06-10 20:02:03');
INSERT INTO `poms` VALUES (2, 1, 1, 2, 11, '2021-06-10 20:02:05', '2021-06-10 20:02:05');
INSERT INTO `poms` VALUES (3, 1, 1, 3, 11, '2021-06-10 20:02:07', '2021-06-10 20:02:07');
INSERT INTO `poms` VALUES (5, 1, 1, 5, 11, '2021-06-10 20:02:11', '2021-06-10 20:02:11');
INSERT INTO `poms` VALUES (6, 1, 1, 6, 11, '2021-06-10 20:02:24', '2021-06-10 20:02:24');
INSERT INTO `poms` VALUES (7, 2, 1, 1, 10, '2021-06-10 20:02:39', '2021-06-10 20:02:39');
INSERT INTO `poms` VALUES (8, 2, 1, 7, 10, '2021-06-10 20:02:42', '2021-06-10 20:02:42');
INSERT INTO `poms` VALUES (9, 3, 1, 1, 10, '2021-06-11 16:04:24', '2021-06-11 16:04:24');
INSERT INTO `poms` VALUES (10, 3, 1, 2, 10, '2021-06-11 16:04:27', '2021-06-11 16:04:27');
INSERT INTO `poms` VALUES (11, 3, 1, 3, 11, '2021-06-11 16:04:29', '2021-06-11 16:04:29');
INSERT INTO `poms` VALUES (12, 4, 1, 1, 10, '2021-06-22 12:10:26', '2021-06-22 12:10:26');
INSERT INTO `poms` VALUES (13, 4, 1, 2, 10, '2021-06-22 12:10:30', '2021-06-22 12:10:30');
INSERT INTO `poms` VALUES (14, 4, 1, 6, 10, '2021-06-22 12:10:36', '2021-06-22 12:10:36');
INSERT INTO `poms` VALUES (15, 4, 1, 7, 10, '2021-06-22 12:10:42', '2021-06-22 12:10:42');
INSERT INTO `poms` VALUES (16, 5, 2, 8, 50, '2021-06-27 11:56:11', '2021-06-27 11:56:11');
INSERT INTO `poms` VALUES (17, 5, 2, 9, 50, '2021-06-27 11:56:16', '2021-06-27 11:56:16');
INSERT INTO `poms` VALUES (18, 5, 2, 10, 50, '2021-06-27 11:56:20', '2021-06-27 11:56:20');
INSERT INTO `poms` VALUES (19, 6, 1, 1, 10, '2021-06-27 11:57:23', '2021-06-27 11:57:23');
INSERT INTO `poms` VALUES (20, 6, 1, 2, 10, '2021-06-27 11:57:28', '2021-06-27 11:57:28');
INSERT INTO `poms` VALUES (21, 6, 1, 3, 10, '2021-06-27 11:57:32', '2021-06-27 11:57:32');

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
  `category_id` int(11) NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` int(11) NOT NULL,
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
INSERT INTO `products` VALUES (1, 1, '210509160612', 'Шкаф для одежды', 1, 800, 560, 2000, 6815, NULL, '2021-05-09 11:08:00', '2021-05-09 11:08:00');
INSERT INTO `products` VALUES (2, 1, '210509161800', 'Шкаф полузакрытый', 1, 800, 406, 2000, 5920, NULL, '2021-05-09 11:18:35', '2021-05-09 11:18:35');
INSERT INTO `products` VALUES (3, 1, '210509161844', 'Шкаф открытый', 1, 800, 406, 2000, 4890, NULL, '2021-05-09 11:19:05', '2021-05-09 11:19:05');
INSERT INTO `products` VALUES (4, 4, '210509162633', 'Стол компьютерный', 1, 1200, 704, 760, 4715, NULL, '2021-05-09 11:27:33', '2021-05-09 11:27:33');
INSERT INTO `products` VALUES (5, 4, '210509162744', 'Стол компьютерный', 1, 1304, 704, 760, 6140, NULL, '2021-05-09 11:28:13', '2021-05-09 11:28:13');
INSERT INTO `products` VALUES (6, 4, '210509162818', 'Стол компьютерный', 1, 1304, 704, 760, 6140, NULL, '2021-05-09 11:28:50', '2021-05-09 11:28:50');
INSERT INTO `products` VALUES (7, 2, '210509162926', 'Диван Лидер', 2, 2250, 600, 950, 14025, NULL, '2021-05-09 11:31:03', '2021-05-09 11:31:03');
INSERT INTO `products` VALUES (8, 2, '210509163115', 'Диван Некст', 2, 2250, 600, 850, 12750, NULL, '2021-05-09 11:32:04', '2021-05-09 11:32:04');

-- ----------------------------
-- Table structure for purchases
-- ----------------------------
DROP TABLE IF EXISTS `purchases`;
CREATE TABLE `purchases`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_p` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `supplier_id` int(11) NULL DEFAULT NULL,
  `pay` tinyint(4) NULL DEFAULT NULL,
  `depo` tinyint(4) NULL DEFAULT NULL,
  `debt` tinyint(4) NULL DEFAULT NULL,
  `total` double NULL DEFAULT NULL,
  `date_off` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of purchases
-- ----------------------------
INSERT INTO `purchases` VALUES (1, '210611020200', '2020-12-25', 4, 2, NULL, '2021-06-10 20:02:00', '2021-06-22 11:54:49', 1, 1, 1, 1, 120000, '2021-01-12');
INSERT INTO `purchases` VALUES (2, '210611020235', '2021-01-13', 4, 2, NULL, '2021-06-10 20:02:35', '2021-06-22 11:56:10', 1, 2, 1, 0, 105000, '2021-02-04');
INSERT INTO `purchases` VALUES (3, '210611021550', '2021-02-18', 4, 2, NULL, '2021-06-10 20:15:50', '2021-06-22 11:54:57', 1, 1, 1, 1, 150000, '2021-03-05');
INSERT INTO `purchases` VALUES (4, '210622171022', '2021-03-17', 4, 2, NULL, '2021-06-22 12:10:22', '2021-06-22 12:11:03', 1, 2, 1, 0, 157500, '2021-04-09');
INSERT INTO `purchases` VALUES (5, '210627165604', '2021-04-20', 4, 2, NULL, '2021-06-27 11:56:04', '2021-06-27 11:56:24', 1, 2, 1, 0, 160000, '2021-05-19');
INSERT INTO `purchases` VALUES (6, '210627165718', '2021-05-24', 4, 2, NULL, '2021-06-27 11:57:18', '2021-06-27 11:57:37', 1, 2, 1, 0, 113000, '2021-06-21');

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
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fio` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `index` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `suppliers_code_unique`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES (1, '521869706908', 'ИП Квадрат', 'Юрий', 'Гребенщиков', 'Борисович', 'Гребенщиков Ю.Б.', 'Россия', 'Воронеж', '394000', 'Монтажный пр.2', '+7 (473) 264 55 15', 'dapak13713@geekale.com', '2021-05-27 18:54:20', '2021-05-27 18:54:20');

-- ----------------------------
-- Table structure for tops
-- ----------------------------
DROP TABLE IF EXISTS `tops`;
CREATE TABLE `tops`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` int(11) NULL DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tops_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `tops_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tops
-- ----------------------------
INSERT INTO `tops` VALUES (1, 1, 4, 'products/T8brLG8YvT7jOLCJ8Wqacqs7xuvmWJTdYLQOaKpW.jpg', 'SHF222-VISHNYA.jpg', '2021-05-10 06:20:23', '2021-05-10 07:25:26');
INSERT INTO `tops` VALUES (2, 1, 6, 'products/8lfneLUL0T1j1uAYehEYNuRzls2Nl8HyWKX0bj1c.jpg', 'SHF222-NOCHE.jpg', '2021-05-10 07:26:23', '2021-05-27 09:18:07');
INSERT INTO `tops` VALUES (3, 1, 3, 'products/eciv8GvY5vL2UI8u4lmh5WskRU7Qg6tVmGyA7ztp.jpg', 'SHF222-SHIMO.jpg', '2021-05-10 07:27:53', '2021-05-27 09:18:13');
INSERT INTO `tops` VALUES (4, 2, 6, 'products/Q67hy5zjZSD8Ja8s09RtukJJ2w4RHSnVefEo9sP9.jpg', 'LF218-OREH.jpg', '2021-05-10 07:30:54', '2021-05-27 09:18:23');
INSERT INTO `tops` VALUES (5, 2, 3, 'products/G2QHWoBwCIRj36tYksPBiW09XyKo9aW5srU00smz.jpg', 'LF218-SHIMO.jpg', '2021-05-10 07:31:05', '2021-05-27 09:18:28');
INSERT INTO `tops` VALUES (6, 3, 6, 'products/PYHyQa4Vg6fwozvnNOkkb6nLnb79N2QDpQnmzhxJ.jpg', 'LF221-NOCHE.jpg', '2021-05-10 07:31:49', '2021-05-27 09:18:42');
INSERT INTO `tops` VALUES (7, 3, 3, 'products/Duu0KgF5KkjjltHcqVx4o8RY2jHYvUCZkswU26bQ.jpg', 'LF221-YASEN.jpg', '2021-05-10 07:31:59', '2021-05-27 09:18:47');
INSERT INTO `tops` VALUES (8, 3, 4, 'products/b4af2TL0kbuAxxPU9CyORRnJVF9DMWMzSeR0bEbR.jpg', 'LF221-OFSFORD.jpg', '2021-05-10 07:32:13', '2021-05-27 09:19:04');
INSERT INTO `tops` VALUES (9, 4, 4, 'products/rigDxEJG705CnCJTR2Psefy9BXttBPxB0LqKO5zn.jpg', 'SF214-OKSFORD.jpg', '2021-05-10 07:34:12', '2021-05-10 07:34:12');
INSERT INTO `tops` VALUES (10, 4, 7, 'products/YLG6iTChQTtLGXwxDlpVi8TeWFAYGNcpUXZrQwV7.jpg', 'SF214-YEASEN.jpg', '2021-05-10 07:34:43', '2021-05-27 09:19:46');
INSERT INTO `tops` VALUES (11, 5, 2, 'products/mWFNhIMAsSeXOU9LQKP3JTeCSz7YAgJVVzFnN9bz.jpg', 'SF228-BUK.jpg', '2021-05-10 07:35:03', '2021-05-27 09:20:07');
INSERT INTO `tops` VALUES (12, 5, 4, 'products/ijzTvvsuSwmpyseVoi9W0iyL2Z1CNGwvm3PFXJkc.jpg', 'SF228-OKSFORD.jpg', '2021-05-10 07:35:21', '2021-05-10 07:35:21');
INSERT INTO `tops` VALUES (13, 5, 3, 'products/7WCzewTeN73wi2tr4amSlxnjOnrn2WKoEnMwn71l.jpg', 'SF228-YASEN.jpg', '2021-05-10 07:35:56', '2021-05-27 09:20:23');
INSERT INTO `tops` VALUES (14, 6, 1, 'products/EpjvVKSqgOIW7d8xrh6KH98J6ZAtPb7AQ4wA3sSS.jpg', 'SF238-BUK.jpg', '2021-05-10 07:36:34', '2021-05-27 09:21:18');
INSERT INTO `tops` VALUES (15, 6, 6, 'products/wn5QMDpcmME3uh9esRNPezrOfw3T223fgwA8EvaB.jpg', 'SF238-NOCHE.jpg', '2021-05-10 07:36:51', '2021-05-27 09:21:05');
INSERT INTO `tops` VALUES (16, 6, 3, 'products/SZR6VlAvrxVrTkgLGgx8qHDGQYJU9ke6BJhirzYV.jpg', 'SF238-YEASEN.jpg', '2021-05-10 07:37:07', '2021-05-27 09:21:13');
INSERT INTO `tops` VALUES (17, 7, 11, 'products/hX3d0nvqG29xicwdJ2u9RL2hZOET92oEem2pWMOf.jpg', 'cap-gray.jpg', '2021-05-10 07:37:56', '2021-05-27 09:22:14');
INSERT INTO `tops` VALUES (18, 7, 9, 'products/JdmWdtdDMtwg2Ehn3R1ecB6zCCXzM8DiJB4IgVUC.jpg', 'cap-brown.jpg', '2021-05-10 07:43:02', '2021-05-27 09:21:38');
INSERT INTO `tops` VALUES (19, 8, 12, 'products/LHC34MSZrUFR80vQslVC2hOyi5nQVvi6gtFvamIT.jpg', 'next-ocean.jpg', '2021-05-10 07:43:22', '2021-05-27 09:21:51');
INSERT INTO `tops` VALUES (20, 8, 10, 'products/ifJsiO7Ezu2mJUXIeGl7VHMb7RWDMpyD6dBbA5Xl.jpg', 'next-gray.jpg', '2021-05-10 07:43:31', '2021-05-27 09:21:58');
INSERT INTO `tops` VALUES (21, 8, 8, 'products/WCpoKl0Jms5HBLXU8YZP5viAsIglKuXelu7nQ9DX.jpg', 'next-sunny.jpg', '2021-05-10 07:43:39', '2021-05-27 09:22:03');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'kibo13', '$2y$10$D97rW6JurFRxoNwL.gXpHOATH525JzEWXMG7Cc4NRzwruW8wYgOoe', 1, 1, NULL, '2021-04-15 12:04:43', '2021-04-15 12:04:43');
INSERT INTO `users` VALUES (3, 'КрасюковАА', '$2y$10$IzO49C3nXcC/pN5QZrk.Aeuhk6Df6.ByNcGY2xMujpHWIIR/DUUle', 2, 2, NULL, '2021-04-17 10:54:17', '2021-04-17 11:18:34');
INSERT INTO `users` VALUES (4, 'КупцоваВН', '$2y$10$O9oJpjUhJVVPvMz.i5apeOVCyjdxjqvRU.iH6dxaOhbkcn22ik.2y', 4, 3, NULL, '2021-04-17 11:21:19', '2021-04-17 11:21:19');
INSERT INTO `users` VALUES (5, 'ИвановСВ', '$2y$10$5yTRmYloloXQqZTsKfg8m.mzqa5/NyHlM8yiFFVpu5cOnE1bWRK/6', 3, 4, NULL, '2021-04-17 11:21:47', '2021-04-17 11:21:47');
INSERT INTO `users` VALUES (6, 'ЩукинЕС', '$2y$10$fYhouNDDw5Z1EDLeinTqh.oVQPyzsgyqqiYN4lF7nNbh4L/1CoHE6', 3, 6, NULL, '2021-06-12 16:06:37', '2021-06-12 16:06:37');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of workers
-- ----------------------------
INSERT INTO `workers` VALUES (1, 'sa', 'sa', 'sa', 'sa', 1, 0, 'sa', 'sa', NULL, NULL);
INSERT INTO `workers` VALUES (2, 'Александр', 'Красюков', 'Александрович', 'Красюков А.А.', 1, 1, 'Янгеля 7-23', '+7-776-878-01-01', NULL, '2021-04-17 09:06:10');
INSERT INTO `workers` VALUES (3, 'Валентина', 'Купцова', 'Николаевна', 'Купцова В.Н.', 2, 1, 'Глушко 14-10', '+7-701-677-40-31', '2021-04-16 17:32:53', '2021-04-17 09:31:56');
INSERT INTO `workers` VALUES (4, 'Сергей', 'Иванов', 'Васильевич', 'Иванов С.В.', 3, 1, 'Ниточкина 2-28', '+7-771-321-14-41', '2021-04-16 17:36:24', '2021-04-17 09:32:02');
INSERT INTO `workers` VALUES (5, 'Борис', 'Петров', 'Анатольевич', 'Петров Б.А.', 4, 0, 'Шубникова 4-45', '+7-771-878-67-81', '2021-04-16 17:37:29', '2021-04-17 09:32:13');
INSERT INTO `workers` VALUES (6, 'Егор', 'Щукин', 'Степанович', 'Щукин Е.С.', 3, 1, 'Комарова 11-17', '+7-707-321-21-31', '2021-06-12 15:59:47', '2021-06-12 15:59:47');

SET FOREIGN_KEY_CHECKS = 1;
