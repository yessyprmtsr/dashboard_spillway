/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50734
 Source Host           : localhost:3306
 Source Schema         : aplikasi_yessy_iot

 Target Server Type    : MySQL
 Target Server Version : 50734
 File Encoding         : 65001

 Date: 19/01/2022 14:28:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ketinggian_air
-- ----------------------------
DROP TABLE IF EXISTS `ketinggian_air`;
CREATE TABLE `ketinggian_air`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sensor_id` bigint(20) UNSIGNED NOT NULL,
  `debit_ketinggian_air` float NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 421 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ketinggian_air
-- ----------------------------
INSERT INTO `ketinggian_air` VALUES (2, 1, 100, 'Normal', '2021-10-06 11:54:47', '2021-10-06 11:54:47');
INSERT INTO `ketinggian_air` VALUES (3, 4, 160, 'Tinggi', '2021-10-06 11:54:47', '2021-10-06 11:54:47');
INSERT INTO `ketinggian_air` VALUES (4, 1, 55, 'Normal', '2021-10-06 11:55:47', '2021-10-06 11:55:47');
INSERT INTO `ketinggian_air` VALUES (5, 4, 40, 'Normal', '2021-10-06 11:55:47', '2021-10-06 11:55:47');
INSERT INTO `ketinggian_air` VALUES (6, 1, 50, 'Normal', '2021-10-06 13:59:21', '2021-10-06 13:59:21');
INSERT INTO `ketinggian_air` VALUES (7, 4, 196, 'Tinggi', '2021-10-06 13:59:27', '2021-10-06 13:59:27');
INSERT INTO `ketinggian_air` VALUES (8, 1, 200, 'Tinggi', '2021-10-06 13:59:55', '2021-10-06 13:59:55');
INSERT INTO `ketinggian_air` VALUES (9, 4, 30, 'Normal', '2021-10-06 14:00:02', '2021-10-06 14:00:02');
INSERT INTO `ketinggian_air` VALUES (10, 1, 150, 'Tinggi', '2021-10-06 14:03:10', '2021-10-06 14:03:10');
INSERT INTO `ketinggian_air` VALUES (11, 4, 120, 'Tinggi', '2021-10-06 14:03:17', '2021-10-06 14:03:17');
INSERT INTO `ketinggian_air` VALUES (12, 8, 110, 'Normal', '2021-10-06 11:54:47', '2021-10-06 11:54:47');
INSERT INTO `ketinggian_air` VALUES (13, 9, 140, 'Tinggi', '2021-10-06 11:54:47', '2021-10-06 11:54:47');
INSERT INTO `ketinggian_air` VALUES (14, 8, 20, 'Normal', '2021-10-06 11:55:47', '2021-10-06 11:55:47');
INSERT INTO `ketinggian_air` VALUES (15, 9, 10, 'Normal', '2021-10-06 11:55:47', '2021-10-06 11:55:47');
INSERT INTO `ketinggian_air` VALUES (16, 8, 90, 'Normal', '2021-10-06 13:59:21', '2021-10-06 13:59:21');
INSERT INTO `ketinggian_air` VALUES (17, 9, 80, 'Tinggi', '2021-10-06 13:59:27', '2021-10-06 13:59:27');
INSERT INTO `ketinggian_air` VALUES (18, 8, 130, 'Tinggi', '2021-10-06 13:59:55', '2021-10-06 13:59:55');
INSERT INTO `ketinggian_air` VALUES (19, 9, 75, 'Normal', '2021-10-06 14:00:02', '2021-10-06 14:00:02');
INSERT INTO `ketinggian_air` VALUES (20, 8, 85, 'Tinggi', '2021-10-06 14:03:10', '2021-10-06 14:03:10');
INSERT INTO `ketinggian_air` VALUES (21, 9, 55, 'Tinggi', '2021-10-06 14:03:17', '2021-10-06 14:03:17');
INSERT INTO `ketinggian_air` VALUES (22, 6, 120, 'Tinggi', '2021-10-18 19:02:45', '2021-10-18 19:02:45');
INSERT INTO `ketinggian_air` VALUES (23, 1, 125, 'Tinggi', '2021-10-18 19:03:47', '2021-10-18 19:03:47');
INSERT INTO `ketinggian_air` VALUES (24, 1, 121, 'Tinggi', '2021-10-18 19:04:30', '2021-10-18 19:04:30');
INSERT INTO `ketinggian_air` VALUES (25, 1, 80, 'Normal', '2021-10-19 18:37:12', '2021-10-19 18:37:12');
INSERT INTO `ketinggian_air` VALUES (26, 2, 70, 'Normal', '2021-10-19 19:29:48', '2021-10-19 19:29:48');
INSERT INTO `ketinggian_air` VALUES (27, 1, 90, 'Normal', '2021-10-19 19:30:10', '2021-10-19 19:30:10');
INSERT INTO `ketinggian_air` VALUES (28, 4, 90, 'Normal', '2021-10-19 19:30:48', '2021-10-19 19:30:48');
INSERT INTO `ketinggian_air` VALUES (29, 4, 100, 'Normal', '2021-10-19 19:46:21', '2021-10-19 19:46:21');
INSERT INTO `ketinggian_air` VALUES (32, 9, 44, 'Normal', '2021-11-02 13:24:26', '2021-11-02 13:24:26');
INSERT INTO `ketinggian_air` VALUES (33, 9, 441, 'Tinggi', '2021-11-02 13:24:31', '2021-11-02 13:24:31');
INSERT INTO `ketinggian_air` VALUES (34, 9, 22, 'Normal', '2021-11-02 13:25:24', '2021-11-02 13:25:24');
INSERT INTO `ketinggian_air` VALUES (35, 9, 220, 'Tinggi', '2021-11-02 13:25:35', '2021-11-02 13:25:35');
INSERT INTO `ketinggian_air` VALUES (36, 8, 100, 'Normal', '2021-11-02 13:26:37', '2021-11-02 13:26:37');
INSERT INTO `ketinggian_air` VALUES (37, 8, 70, 'Normal', '2021-11-02 13:27:19', '2021-11-02 13:27:19');
INSERT INTO `ketinggian_air` VALUES (38, 8, 70, 'Normal', '2021-11-02 13:30:37', '2021-11-02 13:30:37');
INSERT INTO `ketinggian_air` VALUES (39, 8, 70, 'Normal', '2021-11-02 13:39:57', '2021-11-02 13:39:57');
INSERT INTO `ketinggian_air` VALUES (40, 4, 122, 'Tinggi', '2021-11-02 13:41:24', '2021-11-02 13:41:24');
INSERT INTO `ketinggian_air` VALUES (41, 4, 129, 'Tinggi', '2021-11-02 13:41:32', '2021-11-02 13:41:32');
INSERT INTO `ketinggian_air` VALUES (42, 4, 109, 'Tinggi', '2021-11-02 13:41:44', '2021-11-02 13:41:44');
INSERT INTO `ketinggian_air` VALUES (43, 4, 177, 'Tinggi', '2021-11-02 13:42:04', '2021-11-02 13:42:04');
INSERT INTO `ketinggian_air` VALUES (44, 8, 150, 'Tinggi', '2021-11-02 13:43:11', '2021-11-02 13:43:11');
INSERT INTO `ketinggian_air` VALUES (45, 9, 100, 'Normal', '2021-11-02 13:50:21', '2021-11-02 13:50:21');
INSERT INTO `ketinggian_air` VALUES (46, 1, 50, 'Normal', '2021-11-14 12:59:16', '2021-11-14 12:59:16');
INSERT INTO `ketinggian_air` VALUES (47, 1, 55, 'Normal', '2021-11-14 12:59:39', '2021-11-14 12:59:39');
INSERT INTO `ketinggian_air` VALUES (48, 2, 55, 'Normal', '2021-11-14 13:00:17', '2021-11-14 13:00:17');
INSERT INTO `ketinggian_air` VALUES (49, 2, 55, 'Normal', '2021-11-14 13:00:18', '2021-11-14 13:00:18');
INSERT INTO `ketinggian_air` VALUES (50, 2, 55, 'Normal', '2021-11-14 13:00:19', '2021-11-14 13:00:19');
INSERT INTO `ketinggian_air` VALUES (51, 2, 55, 'Normal', '2021-11-14 13:00:20', '2021-11-14 13:00:20');
INSERT INTO `ketinggian_air` VALUES (52, 2, 55, 'Normal', '2021-11-14 13:00:20', '2021-11-14 13:00:20');
INSERT INTO `ketinggian_air` VALUES (53, 2, 55, 'Normal', '2021-11-14 13:00:21', '2021-11-14 13:00:21');
INSERT INTO `ketinggian_air` VALUES (54, 2, 55, 'Normal', '2021-11-14 13:00:22', '2021-11-14 13:00:22');
INSERT INTO `ketinggian_air` VALUES (55, 2, 55, 'Normal', '2021-11-14 13:00:23', '2021-11-14 13:00:23');
INSERT INTO `ketinggian_air` VALUES (56, 4, 55, 'Normal', '2021-11-14 13:02:27', '2021-11-14 13:02:27');
INSERT INTO `ketinggian_air` VALUES (57, 2, 55, 'Normal', '2021-11-14 13:05:38', '2021-11-14 13:05:38');
INSERT INTO `ketinggian_air` VALUES (58, 2, 60, 'Normal', '2021-11-15 14:33:51', '2021-11-15 14:33:51');
INSERT INTO `ketinggian_air` VALUES (59, 1, 60, 'Normal', '2021-11-15 14:35:25', '2021-11-15 14:35:25');
INSERT INTO `ketinggian_air` VALUES (60, 1, 62, 'Normal', '2021-11-15 14:35:33', '2021-11-15 14:35:33');
INSERT INTO `ketinggian_air` VALUES (61, 4, 62, 'Normal', '2021-11-15 14:38:28', '2021-11-15 14:38:28');
INSERT INTO `ketinggian_air` VALUES (62, 4, 80, 'Normal', '2021-11-15 14:38:37', '2021-11-15 14:38:37');
INSERT INTO `ketinggian_air` VALUES (63, 4, 250, 'Tinggi', '2021-11-15 14:44:39', '2021-11-15 14:44:39');
INSERT INTO `ketinggian_air` VALUES (64, 1, 500, 'Tinggi', '2021-11-15 14:44:51', '2021-11-15 14:44:51');
INSERT INTO `ketinggian_air` VALUES (65, 8, 10, 'Normal', '2021-11-15 15:17:55', '2021-11-15 15:17:55');
INSERT INTO `ketinggian_air` VALUES (66, 8, 200, 'Tinggi', '2021-11-15 15:21:22', '2021-11-15 15:21:22');
INSERT INTO `ketinggian_air` VALUES (67, 8, 200, 'Tinggi', '2021-11-15 15:26:38', '2021-11-15 15:26:38');
INSERT INTO `ketinggian_air` VALUES (116, 4, 12, 'Normal', '2021-11-16 14:02:14', '2021-11-16 14:02:14');
INSERT INTO `ketinggian_air` VALUES (119, 1, 50, 'Normal', '2021-11-16 14:03:33', '2021-11-16 14:03:33');
INSERT INTO `ketinggian_air` VALUES (120, 4, 60, 'Normal', '2021-11-16 14:03:42', '2021-11-16 14:03:42');
INSERT INTO `ketinggian_air` VALUES (123, 1, 80, 'Normal', '2021-11-16 14:04:34', '2021-11-16 14:04:34');
INSERT INTO `ketinggian_air` VALUES (124, 1, 50, 'Normal', '2021-11-16 14:33:37', '2021-11-16 14:33:37');
INSERT INTO `ketinggian_air` VALUES (125, 4, 100, 'Normal', '2021-11-16 14:37:48', '2021-11-16 14:37:48');
INSERT INTO `ketinggian_air` VALUES (126, 1, 112, 'Tinggi', '2021-11-16 14:39:02', '2021-11-16 14:39:02');
INSERT INTO `ketinggian_air` VALUES (127, 1, 50, 'Normal', '2021-11-16 14:45:20', '2021-11-16 14:45:20');
INSERT INTO `ketinggian_air` VALUES (128, 4, 100, 'Normal', '2021-11-16 14:46:09', '2021-11-16 14:46:09');
INSERT INTO `ketinggian_air` VALUES (129, 4, 30, 'Normal', '2021-11-16 14:55:55', '2021-11-16 14:55:55');
INSERT INTO `ketinggian_air` VALUES (130, 4, 88, 'Normal', '2021-11-16 14:56:16', '2021-11-16 14:56:16');
INSERT INTO `ketinggian_air` VALUES (131, 4, 200, 'Tinggi', '2021-11-16 15:03:31', '2021-11-16 15:03:31');
INSERT INTO `ketinggian_air` VALUES (132, 1, 100, 'Normal', '2021-11-16 15:07:52', '2021-11-16 15:07:52');
INSERT INTO `ketinggian_air` VALUES (133, 1, 100, 'Normal', '2021-11-16 15:08:16', '2021-11-16 15:08:16');
INSERT INTO `ketinggian_air` VALUES (134, 4, 500, 'Tinggi', '2021-11-16 15:08:45', '2021-11-16 15:08:45');
INSERT INTO `ketinggian_air` VALUES (135, 1, 500, 'Tinggi', '2021-11-16 15:08:55', '2021-11-16 15:08:55');
INSERT INTO `ketinggian_air` VALUES (136, 1, 290, 'Tinggi', '2021-11-16 15:29:25', '2021-11-16 15:29:25');
INSERT INTO `ketinggian_air` VALUES (137, 1, 10, 'Normal', '2021-12-16 15:38:41', '2021-11-16 15:38:41');
INSERT INTO `ketinggian_air` VALUES (138, 4, 10, 'Normal', '2021-12-16 15:39:10', '2021-11-16 15:39:10');
INSERT INTO `ketinggian_air` VALUES (139, 1, 290, 'Tinggi', '2021-12-16 16:30:48', '2021-11-16 16:30:48');
INSERT INTO `ketinggian_air` VALUES (140, 4, 150, 'Tinggi', '2021-12-16 16:32:29', '2021-11-16 16:32:29');
INSERT INTO `ketinggian_air` VALUES (141, 1, 20, 'Normal', '2021-12-16 16:55:40', '2021-11-16 16:55:40');
INSERT INTO `ketinggian_air` VALUES (309, 1, 150, 'Tinggi', '2021-11-19 10:11:34', '2021-11-19 10:11:34');
INSERT INTO `ketinggian_air` VALUES (310, 1, 122, 'Tinggi', '2021-11-19 11:12:15', '2021-11-19 10:12:15');
INSERT INTO `ketinggian_air` VALUES (311, 1, 122, 'Tinggi', '2021-11-19 10:20:04', '2021-11-19 10:20:04');
INSERT INTO `ketinggian_air` VALUES (312, 1, 80, 'Tinggi', '2021-11-19 11:56:09', '2021-11-19 10:56:09');
INSERT INTO `ketinggian_air` VALUES (313, 1, 182, 'Tinggi', '2021-11-01 00:00:00', '2022-01-19 13:40:01');
INSERT INTO `ketinggian_air` VALUES (314, 1, 39, 'Normal', '2021-11-02 00:00:00', '2022-01-19 13:40:01');
INSERT INTO `ketinggian_air` VALUES (315, 1, 130, 'Tinggi', '2021-11-03 00:00:00', '2022-01-19 13:40:01');
INSERT INTO `ketinggian_air` VALUES (316, 1, 155, 'Tinggi', '2021-11-04 00:00:00', '2022-01-19 13:40:01');
INSERT INTO `ketinggian_air` VALUES (317, 1, 121, 'Tinggi', '2021-11-05 00:00:00', '2022-01-19 13:40:01');
INSERT INTO `ketinggian_air` VALUES (318, 1, 167, 'Tinggi', '2021-11-06 00:00:00', '2022-01-19 13:40:01');
INSERT INTO `ketinggian_air` VALUES (319, 1, 21, 'Normal', '2021-11-07 00:00:00', '2022-01-19 13:40:01');
INSERT INTO `ketinggian_air` VALUES (320, 1, 182, 'Tinggi', '2021-11-08 00:00:00', '2022-01-19 13:40:01');
INSERT INTO `ketinggian_air` VALUES (321, 1, 18, 'Normal', '2021-11-08 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (322, 1, 72, 'Normal', '2021-11-09 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (323, 1, 97, 'Normal', '2021-11-09 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (324, 1, 107, 'Tinggi', '2021-11-10 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (325, 1, 100, 'Tinggi', '2021-11-10 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (326, 1, 52, 'Normal', '2021-11-11 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (327, 1, 156, 'Tinggi', '2021-11-11 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (328, 1, 46, 'Normal', '2021-11-12 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (329, 1, 80, 'Normal', '2021-11-12 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (330, 1, 191, 'Tinggi', '2021-11-13 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (331, 1, 103, 'Tinggi', '2021-11-13 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (332, 1, 42, 'Normal', '2021-11-17 00:00:00', '2022-01-19 13:40:02');
INSERT INTO `ketinggian_air` VALUES (333, 1, 148, 'Tinggi', '2021-11-17 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (334, 1, 37, 'Normal', '2021-11-18 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (335, 1, 41, 'Normal', '2021-11-18 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (336, 1, 23, 'Normal', '2021-11-20 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (337, 1, 92, 'Normal', '2021-11-20 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (338, 1, 199, 'Tinggi', '2021-11-21 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (339, 1, 188, 'Tinggi', '2021-11-21 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (340, 1, 87, 'Normal', '2021-11-22 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (341, 1, 91, 'Normal', '2021-11-22 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (342, 1, 162, 'Tinggi', '2021-11-22 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (343, 1, 18, 'Normal', '2021-11-23 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (344, 1, 99, 'Normal', '2021-11-23 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (345, 1, 169, 'Tinggi', '2021-11-23 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (346, 1, 183, 'Tinggi', '2021-11-24 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (347, 1, 86, 'Normal', '2021-11-24 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (348, 1, 41, 'Normal', '2021-11-24 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (349, 1, 125, 'Tinggi', '2021-11-25 00:00:00', '2022-01-19 13:40:03');
INSERT INTO `ketinggian_air` VALUES (350, 1, 94, 'Normal', '2021-11-25 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (351, 1, 163, 'Tinggi', '2021-11-25 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (352, 1, 156, 'Tinggi', '2021-11-26 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (353, 1, 65, 'Normal', '2021-11-26 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (354, 1, 10, 'Normal', '2021-11-26 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (355, 1, 37, 'Normal', '2021-11-27 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (356, 1, 111, 'Tinggi', '2021-11-27 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (357, 1, 156, 'Tinggi', '2021-11-27 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (358, 1, 36, 'Normal', '2021-11-28 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (359, 1, 171, 'Tinggi', '2021-11-28 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (360, 1, 117, 'Tinggi', '2021-11-28 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (361, 1, 39, 'Normal', '2021-11-29 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (362, 1, 32, 'Normal', '2021-11-29 00:00:00', '2022-01-19 13:40:04');
INSERT INTO `ketinggian_air` VALUES (363, 1, 30, 'Normal', '2021-11-29 00:00:00', '2022-01-19 13:40:05');
INSERT INTO `ketinggian_air` VALUES (364, 1, 71, 'Normal', '2021-11-30 00:00:00', '2022-01-19 13:40:05');
INSERT INTO `ketinggian_air` VALUES (365, 1, 11, 'Normal', '2021-11-30 00:00:00', '2022-01-19 13:40:05');
INSERT INTO `ketinggian_air` VALUES (366, 1, 37, 'Normal', '2021-11-30 00:00:00', '2022-01-19 13:40:05');
INSERT INTO `ketinggian_air` VALUES (367, 2, 59, 'Normal', '2021-11-01 00:00:00', '2022-01-19 13:54:53');
INSERT INTO `ketinggian_air` VALUES (368, 2, 49, 'Normal', '2021-11-02 00:00:00', '2022-01-19 13:54:53');
INSERT INTO `ketinggian_air` VALUES (369, 2, 123, 'Tinggi', '2021-11-03 00:00:00', '2022-01-19 13:54:54');
INSERT INTO `ketinggian_air` VALUES (370, 2, 137, 'Tinggi', '2021-11-04 00:00:00', '2022-01-19 13:54:54');
INSERT INTO `ketinggian_air` VALUES (371, 2, 119, 'Tinggi', '2021-11-05 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (372, 2, 116, 'Tinggi', '2021-11-06 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (373, 2, 13, 'Normal', '2021-11-07 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (374, 2, 38, 'Normal', '2021-11-08 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (375, 2, 48, 'Normal', '2021-11-09 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (376, 2, 105, 'Tinggi', '2021-11-10 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (377, 2, 144, 'Tinggi', '2021-11-11 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (378, 2, 116, 'Tinggi', '2021-11-12 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (379, 2, 146, 'Tinggi', '2021-11-13 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (380, 2, 145, 'Tinggi', '2021-11-16 00:00:00', '2022-01-19 13:54:55');
INSERT INTO `ketinggian_air` VALUES (381, 2, 107, 'Tinggi', '2021-11-17 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (382, 2, 82, 'Tinggi', '2021-11-18 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (383, 2, 155, 'Tinggi', '2021-11-19 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (384, 2, 122, 'Tinggi', '2021-11-20 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (385, 2, 155, 'Tinggi', '2021-11-21 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (386, 2, 148, 'Tinggi', '2021-11-22 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (387, 2, 17, 'Normal', '2021-11-23 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (388, 2, 30, 'Normal', '2021-11-24 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (389, 2, 176, 'Tinggi', '2021-11-25 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (390, 2, 188, 'Tinggi', '2021-11-26 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (391, 2, 183, 'Tinggi', '2021-11-27 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (392, 2, 132, 'Tinggi', '2021-11-28 00:00:00', '2022-01-19 13:54:56');
INSERT INTO `ketinggian_air` VALUES (393, 2, 142, 'Tinggi', '2021-11-29 00:00:00', '2022-01-19 13:54:57');
INSERT INTO `ketinggian_air` VALUES (394, 2, 196, 'Tinggi', '2021-11-30 00:00:00', '2022-01-19 13:54:57');
INSERT INTO `ketinggian_air` VALUES (395, 4, 104, 'Tinggi', '2021-11-01 00:00:00', '2022-01-19 13:59:43');
INSERT INTO `ketinggian_air` VALUES (396, 4, 93, 'Tinggi', '2021-11-03 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (397, 4, 49, 'Normal', '2021-11-04 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (398, 4, 72, 'Normal', '2021-11-05 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (399, 4, 65, 'Normal', '2021-11-06 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (400, 4, 37, 'Normal', '2021-11-07 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (401, 4, 145, 'Tinggi', '2021-11-08 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (402, 4, 31, 'Normal', '2021-11-09 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (403, 4, 19, 'Normal', '2021-11-10 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (404, 4, 166, 'Tinggi', '2021-11-11 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (405, 4, 44, 'Normal', '2021-11-12 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (406, 4, 57, 'Normal', '2021-11-13 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (407, 4, 25, 'Normal', '2021-11-17 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (408, 4, 45, 'Normal', '2021-11-18 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (409, 4, 68, 'Normal', '2021-11-19 00:00:00', '2022-01-19 13:59:44');
INSERT INTO `ketinggian_air` VALUES (410, 4, 38, 'Normal', '2021-11-20 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (411, 4, 198, 'Tinggi', '2021-11-21 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (412, 4, 136, 'Tinggi', '2021-11-22 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (413, 4, 70, 'Normal', '2021-11-23 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (414, 4, 27, 'Normal', '2021-11-24 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (415, 4, 27, 'Normal', '2021-11-25 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (416, 4, 41, 'Normal', '2021-11-26 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (417, 4, 72, 'Normal', '2021-11-27 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (418, 4, 112, 'Tinggi', '2021-11-28 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (419, 4, 40, 'Normal', '2021-11-29 00:00:00', '2022-01-19 13:59:45');
INSERT INTO `ketinggian_air` VALUES (420, 4, 67, 'Normal', '2021-11-30 00:00:00', '2022-01-19 13:59:45');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_10_04_101937_create_ketinggian_airs_table', 2);
INSERT INTO `migrations` VALUES (5, '2021_10_04_102307_create_spillways_table', 2);
INSERT INTO `migrations` VALUES (6, '2021_10_04_102318_create_status_iots_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for spillway
-- ----------------------------
DROP TABLE IF EXISTS `spillway`;
CREATE TABLE `spillway`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `spillway_id` bigint(20) UNSIGNED NOT NULL,
  `kondisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of spillway
-- ----------------------------
INSERT INTO `spillway` VALUES (2, 5, 'A', 'Berhasil', '2021-10-06 14:49:27', '2021-10-06 14:49:27');
INSERT INTO `spillway` VALUES (3, 6, 'B', 'Berhasil', '2021-10-06 14:49:35', '2021-10-06 14:49:35');
INSERT INTO `spillway` VALUES (4, 5, 'B', 'Berhasil', '2021-10-06 14:53:21', '2021-10-06 14:53:21');
INSERT INTO `spillway` VALUES (5, 5, 'B', 'Gagal', '2021-10-18 19:13:58', '2021-10-18 19:13:58');
INSERT INTO `spillway` VALUES (6, 5, 'A', 'Berhasil', '2021-10-19 19:49:13', '2021-10-19 19:49:13');
INSERT INTO `spillway` VALUES (7, 5, 'B', 'Berhasil', '2021-11-16 10:28:22', '2021-11-16 10:28:22');
INSERT INTO `spillway` VALUES (8, 5, 'B', 'Berhasil', '2021-11-16 10:28:22', '2021-11-16 10:28:22');
INSERT INTO `spillway` VALUES (9, 5, 'B', 'Berhasil', '2021-11-16 10:31:39', '2021-11-16 10:31:39');
INSERT INTO `spillway` VALUES (10, 5, 'B', 'Berhasil', '2021-11-16 10:31:40', '2021-11-16 10:31:40');
INSERT INTO `spillway` VALUES (11, 5, 'B', 'Berhasil', '2021-11-16 10:31:42', '2021-11-16 10:31:42');
INSERT INTO `spillway` VALUES (12, 5, 'A', 'Berhasil', '2021-11-16 10:31:49', '2021-11-16 10:31:49');

-- ----------------------------
-- Table structure for status_iot
-- ----------------------------
DROP TABLE IF EXISTS `status_iot`;
CREATE TABLE `status_iot`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status_iot
-- ----------------------------
INSERT INTO `status_iot` VALUES (1, 'Sensor 1', 'Aktif', 'Ketinggian Air', '2021-10-04 15:49:02', '2021-10-04 16:17:05');
INSERT INTO `status_iot` VALUES (4, 'Sensor 2', 'Aktif', 'Ketinggian Air', '2021-10-06 11:42:04', '2021-10-06 11:42:04');
INSERT INTO `status_iot` VALUES (5, 'Spillway 1', 'Aktif', 'Spillway', '2021-10-06 11:42:31', '2021-10-06 11:42:31');
INSERT INTO `status_iot` VALUES (6, 'Spillway 2', 'Aktif', 'Spillway', '2021-10-06 11:42:43', '2021-10-06 11:42:43');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@gmail.com', NULL, '$2a$12$DExYpc6.gqk56asKA.TuPOaugSFsDZUZEuDpvQvCz7neqR7a8YZl6', NULL, '2021-10-03 22:44:25', '2021-10-03 22:44:25');

SET FOREIGN_KEY_CHECKS = 1;
