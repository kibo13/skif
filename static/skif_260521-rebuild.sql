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

 Date: 26/05/2021 14:10:01
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
INSERT INTO `customers` VALUES (1, 2, '982365199553', NULL, NULL, NULL, NULL, 'ООО \"Юпитер\"', 'upiter@info.com', 'Гвардейская 5', '+7-777-777-10-10', '2021-04-27 11:55:18', '2021-04-27 17:16:38');
INSERT INTO `customers` VALUES (2, 1, '347061866200', 'Николай', 'Макаров', 'Викторович', NULL, NULL, 'makarov_v@gmail.com', '8 март 4-16', '+7-777-123-32-21', '2021-04-27 12:28:40', '2021-04-27 18:07:21');
INSERT INTO `customers` VALUES (3, 1, '942944546297', 'Юрий', 'Нестеров', 'Игоревич', NULL, NULL, 'nesterov1010@gmail.com', '6 мкр 10-10', '+77019013005', '2021-04-27 18:27:15', '2021-04-27 18:27:15');
INSERT INTO `customers` VALUES (4, 2, '601579973170', NULL, NULL, NULL, NULL, 'АО \"Аргус\"', 'argus@argus.ru', 'Пионерская 7', '+7-776-555-40-40', '2021-04-27 18:30:24', '2021-04-27 18:30:24');
INSERT INTO `customers` VALUES (5, 1, '842002341610', 'Айгуль', 'Оспанова', 'Олжасовна', NULL, NULL, 'ospanova_ao@mail.ru', 'Мира 5-39', '+7-776-432-87-65', '2021-04-27 18:33:02', '2021-04-27 18:33:02');
INSERT INTO `customers` VALUES (6, 1, '843123167299', 'Кирилл', 'Чайкин', 'Ильич', NULL, NULL, 'calaxip509@mxcdd.com', 'Шубникова 8-59', '+7-776-081-53-08', '2021-05-14 19:26:49', '2021-05-14 19:26:49');

-- ----------------------------
-- Table structure for materials
-- ----------------------------
DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` tinyint(4) NULL DEFAULT NULL,
  `L` double NULL DEFAULT NULL,
  `B` double NULL DEFAULT NULL,
  `H` double NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
