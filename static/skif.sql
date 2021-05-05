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

 Date: 05/05/2021 23:27:43
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
-- Table structure for color_product
-- ----------------------------
DROP TABLE IF EXISTS `color_product`;
CREATE TABLE `color_product`  (
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  INDEX `color_product_color_id_foreign`(`color_id`) USING BTREE,
  INDEX `color_product_product_id_foreign`(`product_id`) USING BTREE,
  CONSTRAINT `color_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of color_product
-- ----------------------------
INSERT INTO `color_product` VALUES (4, 2);
INSERT INTO `color_product` VALUES (5, 2);
INSERT INTO `color_product` VALUES (4, 1);
INSERT INTO `color_product` VALUES (5, 1);
INSERT INTO `color_product` VALUES (4, 3);
INSERT INTO `color_product` VALUES (5, 3);
INSERT INTO `color_product` VALUES (4, 5);
INSERT INTO `color_product` VALUES (5, 5);
INSERT INTO `color_product` VALUES (4, 6);
INSERT INTO `color_product` VALUES (5, 6);
INSERT INTO `color_product` VALUES (1, 7);
INSERT INTO `color_product` VALUES (1, 8);
INSERT INTO `color_product` VALUES (1, 9);
INSERT INTO `color_product` VALUES (4, 4);
INSERT INTO `color_product` VALUES (5, 4);

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of colors
-- ----------------------------
INSERT INTO `colors` VALUES (1, 'H1277', 'colors/mwUKomVcwCcUEBaN6hGLuCAVTtmVx22OYhXrZSLQ.jpg', 'H1277.jpg', '2021-05-05 11:02:47', '2021-05-05 11:06:40');
INSERT INTO `colors` VALUES (2, 'H1334', 'colors/6JkyT0Ui2Yb3avWvTSY63qeB4pTQE6BK0YIoE3My.jpg', 'H1334.jpg', '2021-05-05 11:04:07', '2021-05-05 11:06:48');
INSERT INTO `colors` VALUES (4, 'H1511', 'colors/aRSUjMfLhIJ9kxgPkbGSpIh6b7jGarbop0oK6aI3.jpg', 'H1511.jpg', '2021-05-05 11:05:04', '2021-05-05 11:07:02');
INSERT INTO `colors` VALUES (5, 'H1636', 'colors/UM1XJWVTllBkuq92yfQxKzBD2FtInQjQFPuoi3Ke.jpg', 'H1636.jpg', '2021-05-05 11:05:23', '2021-05-05 11:07:10');
INSERT INTO `colors` VALUES (6, 'H3058', 'colors/gq8sUBBmzkOikh3Si6DqTXZT81yvk4a8lH9Pmxpq.jpg', 'H3058.jpg', '2021-05-05 11:05:56', '2021-05-05 11:05:56');
INSERT INTO `colors` VALUES (7, 'H3157', 'colors/qEET4s8Wilmm7Osi2yeU67ojYtyDq2HfW9PAMnHO.jpg', 'H3157.jpg', '2021-05-05 11:06:26', '2021-05-05 11:06:26');

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
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fabrics
-- ----------------------------
INSERT INTO `fabrics` VALUES (1, 'Натуральная кожа', 'Экологически чистый материал с превосходными потребительскими качествами. Используется для обивки мебели представительского класса.', '2021-05-05 10:26:51', '2021-05-05 10:28:27');
INSERT INTO `fabrics` VALUES (2, 'Искусственная кожа', 'Синтетический аналог кожи, не пропускающий влагу и устойчивый к воздействию механических нагрузок.', '2021-05-05 10:27:18', '2021-05-05 10:28:41');

-- ----------------------------
-- Table structure for materials
-- ----------------------------
DROP TABLE IF EXISTS `materials`;
CREATE TABLE `materials`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materials
-- ----------------------------
INSERT INTO `materials` VALUES (1, 'ЛДСП', 'Ламинированная древесно-стружечная плита', '2021-05-05 09:26:25', '2021-05-05 09:26:25');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `migrations` VALUES (10, '2021_05_05_085548_create_materials_table', 3);
INSERT INTO `migrations` VALUES (11, '2021_05_05_093701_create_fabrics_table', 3);
INSERT INTO `migrations` VALUES (12, '2021_05_05_102932_create_colors_table', 3);
INSERT INTO `migrations` VALUES (13, '2021_05_05_112412_create_customers_table', 4);
INSERT INTO `migrations` VALUES (16, '2021_05_05_113117_create_products_table', 5);
INSERT INTO `migrations` VALUES (17, '2021_05_05_113143_create_color_product_table', 5);

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
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_id` int(11) NULL DEFAULT NULL,
  `fabric_id` int(11) NULL DEFAULT NULL,
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
INSERT INTO `products` VALUES (1, 4, '210505211506', 'Стол компьютерный континент', 1, NULL, 1304, 704, 706, 6140, 'products/8sbO0y0HwNrDdry0HNdaQF2E8co1BEWG5qKqPiQH.jpg', 'SF257.jpg', NULL, '2021-05-05 16:15:21', '2021-05-05 16:28:18');
INSERT INTO `products` VALUES (2, 4, '210505211908', 'Стол криволинейный оптима', 1, NULL, 1300, 900, 760, 3480, 'products/e3Hv2SwGqRrzHYFJB2uASyZGsHlicLnBgkdgYvm3.jpg', 'SF238.jpg', NULL, '2021-05-05 16:19:38', '2021-05-05 16:24:55');
INSERT INTO `products` VALUES (3, 4, '210505212831', 'Стол компьютерный оптима', 1, NULL, 1304, 704, 760, 6050, 'products/FxM7eyabINiocpTJJShVgLjKfITlihTcpAqHIb9a.jpg', 'SF248.jpg', NULL, '2021-05-05 16:29:06', '2021-05-05 16:29:06');
INSERT INTO `products` VALUES (4, 1, '210505212921', 'Стеллаж угловой Оптима', 1, NULL, 406, 406, 2000, 3390, 'products/pkMRjhyClBs4v2JmSA7U3NbkX2IL8LcOjgT1QaNF.jpg', 'SHF222.jpg', NULL, '2021-05-05 16:30:04', '2021-05-05 16:30:04');
INSERT INTO `products` VALUES (5, 1, '210505213012', 'Шкаф полузакрытый Оптима', 1, NULL, 800, 406, 2000, 5860, 'products/ZuH7bIlr0t71E3cJ9ArRGFu8I8ETe4mS94iK50O4.jpg', 'LF202.jpg', NULL, '2021-05-05 16:30:54', '2021-05-05 16:30:54');
INSERT INTO `products` VALUES (6, 1, '210505213059', 'Шкаф для одежды Оптима', 1, NULL, 800, 560, 2000, 6760, 'products/DtYAIJIEwksWjAckES6VLmimG27JpuslWGUD0C5g.jpg', 'LF218.jpg', NULL, '2021-05-05 16:31:23', '2021-05-05 16:31:23');
INSERT INTO `products` VALUES (7, 2, '210505213130', 'Диван Интегра', 1, 1, 2100, 880, 820, 26500, 'products/BhcMm6F3jZolhvzNg2U16QDt77eq1YtDG91e6KWK.jpg', 'DI475.jpg', NULL, '2021-05-05 16:32:23', '2021-05-05 16:32:23');
INSERT INTO `products` VALUES (8, 2, '210505213229', 'Диван Клерк', 1, 1, 1900, 800, 800, 24750, 'products/t7IO5M90nSmWwt2fP1lKXJ5Ygywu2eenhez3aqoK.jpg', 'DI365.jpg', NULL, '2021-05-05 16:33:00', '2021-05-05 16:33:00');
INSERT INTO `products` VALUES (9, 2, '210505213305', 'Диван Алекто', 1, 2, 1730, 850, 700, 21300, 'products/FeKxJLo3xhWnunqLL7QdvuRJaYMv8sYwF20UsWH3.jpg', 'DI220.jpg', NULL, '2021-05-05 16:33:40', '2021-05-05 16:33:40');

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
