/*
 Navicat Premium Data Transfer

 Source Server         : ABC
 Source Server Type    : MySQL
 Source Server Version : 50564
 Source Host           : 103.143.206.38:3306
 Source Schema         : landing

 Target Server Type    : MySQL
 Target Server Version : 50564
 File Encoding         : 65001

 Date: 13/12/2019 09:41:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_10_11_092159_create_sliders_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_10_11_092526_create_services_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_10_15_085322_create_static_pages_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_06_102928_create_users_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_06_104246_laratrust_setup_tables', 1);
INSERT INTO `migrations` VALUES (6, '2019_12_06_110024_create_steps_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_12_06_110205_create_teams_table', 1);

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (1, 2);
INSERT INTO `permission_role` VALUES (2, 1);
INSERT INTO `permission_role` VALUES (2, 2);
INSERT INTO `permission_role` VALUES (3, 1);
INSERT INTO `permission_role` VALUES (3, 2);
INSERT INTO `permission_role` VALUES (4, 1);
INSERT INTO `permission_role` VALUES (4, 2);
INSERT INTO `permission_role` VALUES (5, 1);
INSERT INTO `permission_role` VALUES (6, 1);
INSERT INTO `permission_role` VALUES (7, 1);
INSERT INTO `permission_role` VALUES (8, 1);
INSERT INTO `permission_role` VALUES (9, 1);
INSERT INTO `permission_role` VALUES (9, 2);
INSERT INTO `permission_role` VALUES (9, 3);
INSERT INTO `permission_role` VALUES (10, 1);
INSERT INTO `permission_role` VALUES (10, 2);
INSERT INTO `permission_role` VALUES (10, 3);
INSERT INTO `permission_role` VALUES (11, 1);
INSERT INTO `permission_role` VALUES (12, 1);
INSERT INTO `permission_role` VALUES (13, 1);
INSERT INTO `permission_role` VALUES (14, 1);
INSERT INTO `permission_role` VALUES (15, 1);
INSERT INTO `permission_role` VALUES (16, 1);
INSERT INTO `permission_role` VALUES (17, 1);
INSERT INTO `permission_role` VALUES (18, 1);
INSERT INTO `permission_role` VALUES (19, 1);
INSERT INTO `permission_role` VALUES (20, 1);
INSERT INTO `permission_role` VALUES (21, 1);
INSERT INTO `permission_role` VALUES (22, 1);
INSERT INTO `permission_role` VALUES (23, 1);
INSERT INTO `permission_role` VALUES (24, 1);
INSERT INTO `permission_role` VALUES (25, 1);
INSERT INTO `permission_role` VALUES (26, 1);
INSERT INTO `permission_role` VALUES (27, 1);
INSERT INTO `permission_role` VALUES (28, 1);
INSERT INTO `permission_role` VALUES (29, 1);
INSERT INTO `permission_role` VALUES (30, 1);
INSERT INTO `permission_role` VALUES (31, 1);
INSERT INTO `permission_role` VALUES (32, 1);
INSERT INTO `permission_role` VALUES (33, 1);
INSERT INTO `permission_role` VALUES (34, 1);
INSERT INTO `permission_role` VALUES (35, 1);
INSERT INTO `permission_role` VALUES (36, 1);

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`, `permission_id`, `user_type`) USING BTREE,
  INDEX `permission_user_permission_id_foreign`(`permission_id`) USING BTREE,
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `module` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `action` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'users.create', 'Thêm mới Quản trị', 'Create Users', NULL, 'create', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (2, 'users.read', 'Xem Quản trị', 'Read Users', NULL, 'read', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (3, 'users.update', 'Cập nhật Quản trị', 'Update Users', NULL, 'update', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (4, 'users.delete', 'Xóa Quản trị', 'Delete Users', NULL, 'delete', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (5, 'acl.create', 'Thêm mới Acl', 'Create Acl', NULL, 'create', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (6, 'acl.read', 'Xem Acl', 'Read Acl', NULL, 'read', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (7, 'acl.update', 'Cập nhật Acl', 'Update Acl', NULL, 'update', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (8, 'acl.delete', 'Xóa Acl', 'Delete Acl', NULL, 'delete', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (9, 'profile.read', 'Xem Profile', 'Read Profile', NULL, 'read', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (10, 'profile.update', 'Cập nhật Profile', 'Update Profile', NULL, 'update', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (11, 'roles.read', 'Xem Vai trò', 'Read Roles', 'roles', 'read', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (12, 'roles.create', 'Thêm mới Vai trò', 'Create Roles', 'roles', 'create', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (13, 'roles.update', 'Cập nhật Vai trò', 'Update Roles', 'roles', 'update', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (14, 'roles.delete', 'Xóa Vai trò', 'Delete Roles', 'roles', 'delete', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (15, 'sliders.delete', 'Xóa Slider', 'Delete Sliders', 'sliders', 'delete', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (16, 'sliders.read', 'Xem Slider', 'Read Sliders', 'sliders', 'read', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (17, 'sliders.create', 'Thêm mới Slider', 'Create Sliders', 'sliders', 'create', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `permissions` VALUES (18, 'sliders.update', 'Cập nhật Slider', 'Update Sliders', 'sliders', 'update', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (19, 'services.delete', 'Xóa Dịch vụ', 'Delete Services', 'services', 'delete', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (20, 'services.approve', 'Duyệt Dịch vụ', 'Approve Services', 'services', 'approve', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (21, 'services.update', 'Cập nhật Dịch vụ', 'Update Services', 'services', 'update', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (22, 'services.read', 'Xem Dịch vụ', 'Read Services', 'services', 'read', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (23, 'services.create', 'Thêm mới Dịch vụ', 'Create Services', 'services', 'create', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (24, 'steps.delete', 'Xóa Các bước đăng kí', 'Delete Steps', 'steps', 'delete', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (25, 'steps.approve', 'Duyệt Các bước đăng kí', 'Approve Steps', 'steps', 'approve', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (26, 'steps.update', 'Cập nhật Các bước đăng kí', 'Update Steps', 'steps', 'update', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (27, 'steps.read', 'Xem Các bước đăng kí', 'Read Steps', 'steps', 'read', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (28, 'steps.create', 'Thêm mới Các bước đăng kí', 'Create Steps', 'steps', 'create', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (29, 'static_pages.delete', 'Xóa Trang tĩnh', 'Delete Static_pages', 'static_pages', 'delete', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (30, 'static_pages.read', 'Xem Trang tĩnh', 'Read Static_pages', 'static_pages', 'read', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (31, 'static_pages.create', 'Thêm mới Trang tĩnh', 'Create Static_pages', 'static_pages', 'create', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (32, 'static_pages.update', 'Cập nhật Trang tĩnh', 'Update Static_pages', 'static_pages', 'update', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (33, 'teams.delete', 'Xóa Ban điều hành', 'Delete Teams', 'teams', 'delete', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (34, 'teams.read', 'Xem Ban điều hành', 'Read Teams', 'teams', 'read', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (35, 'teams.create', 'Thêm mới Ban điều hành', 'Create Teams', 'teams', 'create', '2019-12-11 09:51:55', '2019-12-11 09:51:55');
INSERT INTO `permissions` VALUES (36, 'teams.update', 'Cập nhật Ban điều hành', 'Update Teams', 'teams', 'update', '2019-12-11 09:51:55', '2019-12-11 09:51:55');

-- ----------------------------
-- Table structure for prices
-- ----------------------------
DROP TABLE IF EXISTS `prices`;
CREATE TABLE `prices`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssd` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of prices
-- ----------------------------
INSERT INTO `prices` VALUES (1, '312K', 'TINY', '1v CPU', '1G RAM', '10GB SSD', '1 IP PUBLIC & UNLIMIT DATA', 6, 1, '2019-12-12 11:23:58', '2019-12-12 18:27:28');
INSERT INTO `prices` VALUES (2, '576K', 'SMALL', '2 vCPU', '4G RAM', '15GB SSD', '1 IP PUBLIC & UNLIMIT DATA', 5, 1, '2019-12-12 11:26:07', '2019-12-12 18:27:28');
INSERT INTO `prices` VALUES (3, '1128K', 'MEDIUM', '4 vCPU', '8G RAM', '50GB SSD', '1 IP PUBLIC & UNLIMIT DATA', 4, 1, '2019-12-12 11:27:01', '2019-12-12 18:27:28');
INSERT INTO `prices` VALUES (4, '1800K', 'MEDIUM+', '4 vCPU', '16G RAM', '50GB SSD', '1 IP PUBLIC & UNLIMIT DATA', 3, 1, '2019-12-12 18:25:35', '2019-12-12 18:27:28');
INSERT INTO `prices` VALUES (5, '2088K', 'LARGE', '8 vCPU', '16G RAM', '50GB SSD', '1 IP PUBLIC & UNLIMIT DATA', 2, 1, '2019-12-12 18:26:28', '2019-12-12 18:27:28');
INSERT INTO `prices` VALUES (6, '4128K', 'HUGE', '16 vCPU', '32G RAM', '100GB SSD', '1 IP PUBLIC & UNLIMIT DATA', 1, 1, '2019-12-12 18:27:28', '2019-12-12 18:27:28');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`, `user_type`) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1, 'App\\User');
INSERT INTO `role_user` VALUES (2, 2, 'App\\User');
INSERT INTO `role_user` VALUES (3, 3, 'App\\User');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'system', 'System', 'System', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `roles` VALUES (2, 'administrator', 'Administrator', 'Administrator', '2019-12-11 09:51:54', '2019-12-11 09:51:54');
INSERT INTO `roles` VALUES (3, 'user', 'User', 'User', '2019-12-11 09:51:54', '2019-12-11 09:51:54');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 'Triển khai siêu tốc', 'Dịch vụ được khởi tạo từ giao diện thân thiện với người dùng, thuận lợi để doanh nghiệp/cá nhân xây dựng hạ tầng dịch vụ của mình', 'fa fa-rocket', 6, 1, '2019-12-06 17:51:39', '2019-12-10 18:00:11', 'assets/media/images/services/1012/trien-khai-sieu-toc_1575967589.png');
INSERT INTO `services` VALUES (2, 'Quản lí dễ dàng', 'Hệ thống quản trị Automation thân thiện, tích hợp nhiều tính năng cho phép admin/user chủ động xây dựng hệ thống', 'fa fa-users', 5, 1, '2019-12-06 18:06:24', '2019-12-10 18:00:23', 'assets/media/images/services/1012/quan-li-de-dang_1575967580.png');
INSERT INTO `services` VALUES (3, 'An toàn bảo mật', 'EVG tự hào cung cấp một nền tảng cloud an toàn, bảo mật cho khách hàng dựa trên những công nghệ lưu trữ, dự phòng tối ưu nhất', 'fa fa-shield', 4, 1, '2019-12-06 18:07:41', '2019-12-10 18:00:34', 'assets/media/images/services/1012/an-toan-bao-mat_1575967556.png');
INSERT INTO `services` VALUES (4, 'Tiết kiệm chi phí', 'Tiết kiệm chi phí đầu tư ban đầu, chi trả theo thực tế sử dụng hàng tháng', '', 3, 1, '2019-12-10 17:58:50', '2019-12-10 17:59:56', 'assets/media/images/services/tiet-kiem-chi-phi-1575975530.png');
INSERT INTO `services` VALUES (5, 'Mở rộng linh hoạt', 'Giao diện quản trị thân thiện cho phép khởi tạo dịch vụ nhanh, mở rộng cấu hình không giới hạn', '', 2, 1, '2019-12-10 17:59:25', '2019-12-10 17:59:56', 'assets/media/images/services/mo-rong-linh-hoat-1575975565.png');
INSERT INTO `services` VALUES (6, 'Add-on phong phú', 'Các dịch vụ add-on phong phú hỗ trợ khách hàng trong triển khai, phát triển hệ thống', '', 1, 1, '2019-12-10 17:59:56', '2019-12-10 17:59:56', 'assets/media/images/services/add-on-phong-phu-1575975596.png');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (1, 'EVG-CLOUD', '<p>Được x&acirc;y dựng v&agrave; ph&aacute;t triển bởi đội ngũ nh&acirc;n sự gi&agrave;u kinh nghiệm, tr&ecirc;n nền hệ thống phần cứng hiện đại nhất<br />\r\ntừ DELL, HP, IBM&hellip; với giải ph&aacute;p c&ocirc;ng nghệ KVM đ&atilde; được Amazon, IBM, Alib&hellip;tin tưởng sử dụng.</p>\r\n\r\n<p><br /><br />\r\nEVG-CLOUD l&agrave; dịch vụ cho ph&eacute;p kh&aacute;ch h&agrave;ng khởi tạo theo nhu cầu h&agrave;ng loạt c&aacute;c loại t&agrave;i nguy&ecirc;n m&aacute;y chủ ảo<br />\r\nbao gồm bộ vi xử l&yacute; trung t&acirc;m (CPU), bộ nhớ tạm thời (RAM), dung lượng lưu trữ (Storage) v&agrave; hệ thống mạng<br />\r\n(Networks) m&agrave; kh&ocirc;ng cần phải đầu tư thiết bị phần cứng tại Data Center</p>', 2, 1, 'assets/media/images/sliders/0912/evg-cloud_1575859486.png', '<p>Hệ thống được ph&acirc;n bố tại c&aacute;c Data Center đạt chuẩn Tier 3 như FPT, Viettel, VNPT. Dịch vụ sử dụng ri&ecirc;ng hệ<br />\r\nthống kết nối c&aacute;p quốc tế ổn định, băng th&ocirc;ng cao l&ecirc;n tới 10Gbps; đảm bảo cam kết chất lượng (SLA) 99,99%.<br />\r\n<br />\r\nKh&aacute;ch h&agrave;ng dễ d&agrave;ng quản l&yacute; m&aacute;y chủ v&agrave; dịch vụ chỉ với v&agrave;i c&uacute; nhấp chuột; tất cả c&aacute;c nghiệp vụ quản trị, vận<br />\r\nh&agrave;nh đều được thực hiện th&ocirc;ng qua giao diện web portal</p>', 'assets/media/images/sliders/0612/sub_evg-cloud_1575624315.png', '2019-12-06 15:30:38', '2019-12-13 09:03:54');
INSERT INTO `sliders` VALUES (2, 'Lorem ipsum dolor sit amet, consectetur adipisicin', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat', 1, 0, 'assets/media/images/sliders/abc-1575868031.png', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>', 'assets/media/images/sliders/sub_abc-1575868032.png', '2019-12-09 12:07:12', '2019-12-10 18:08:41');

-- ----------------------------
-- Table structure for static_pages
-- ----------------------------
DROP TABLE IF EXISTS `static_pages`;
CREATE TABLE `static_pages`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of static_pages
-- ----------------------------
INSERT INTO `static_pages` VALUES (1, 'Chân trang', 'footer', '<p>© 2019 EVG .,JSC | <i class=\"fa fa-map-marker\"></i>&nbsp;Phòng  2702, Building A3, Ecolife Capitol, 58 Tố Hữu, Phường Trung Văn, Quận Nam Từ Liêm, Hà Nội</p>', 1, NULL, '2019-12-10 18:06:46', NULL);
INSERT INTO `static_pages` VALUES (3, 'Địa chỉ', 'address', '<i class=\"fa fa-home\"></i> Phòng  2702, Building A3, Ecolife Capitol, 58 Tố Hữu, Phường Trung Văn, Quận Nam Từ Liêm, Hà Nội', 0, NULL, '2019-12-11 10:43:45', NULL);
INSERT INTO `static_pages` VALUES (5, 'Số điện thoại', 'phone', '0985386150', 1, NULL, '2019-12-10 10:04:31', NULL);
INSERT INTO `static_pages` VALUES (6, 'Tên Website', 'website-title', 'EVG', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (7, 'Mô tả Website', 'website-description', 'EVG-CLOUD là dịch vụ cho phép khách hàng khởi tạo theo nhu cầu hàng loạt các loại tài nguyên máy chủ ảo bao gồm bộ vi xử lý trung tâm (CPU), bộ nhớ tạm thời (RAM), dung lượng lưu trữ (Storage) và hệ thống mạng (Networks) mà không cần phải đầu tư thiết bị phần cứng tại Data Center', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (10, 'Từ khoá SEO', 'seo-keywords', 'EVG-CLOUD', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (11, 'Mô tả SEO', 'seo-description', 'EVG-CLOUD là dịch vụ cho phép khách hàng khởi tạo theo nhu cầu hàng loạt các loại tài nguyên máy chủ ảo bao gồm bộ vi xử lý trung tâm (CPU), bộ nhớ tạm thời (RAM), dung lượng lưu trữ (Storage) và hệ thống mạng (Networks) mà không cần phải đầu tư thiết bị phần cứng tại Data Center', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (16, 'Ảnh các bước đăng kí', 'image', '<p><img alt=\"\" height=\"265\" src=\"https://landing.evgcorp.co/assets/media/images/img2.png\" width=\"490\" /></p>', 1, NULL, '2019-12-13 09:05:22', '1');
INSERT INTO `static_pages` VALUES (18, 'Hotline', 'hotline', '<i class=\"fa fa-phone\">  HOTLINE/ZALO:0985386150</i>', 1, NULL, '2019-12-11 10:44:10', NULL);
INSERT INTO `static_pages` VALUES (19, 'Tên miền chân trang', 'domain', 'https://landing.evgcorp.co', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (20, 'Zalo', 'zalo', 'ZALO:098 538 6150', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (21, 'Trải nghiệm EVG-CLOULD', 'experience', 'Trải nghiệm EVG-CLOULD bạn nhận ngay:', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (22, 'Tư vấn tối ưu dịch vụ', 'advisory', '<i class=\"ion ion-md-done-all fa-2x col-md-offset-2\"></i>  Tư vấn, tối ưu dịch vụ bởi các chuyên gia<br>\r\n<i class=\"ion ion-md-done-all fa-2x col-md-offset-2\"></i>  Hỗ trợ kĩ thuật 24/7<br>\r\n<i class=\"ion ion-md-done-all fa-2x col-md-offset-2\"></i>  Add-on dịch vụ phong phú<br>\r\n<i class=\"ion ion-md-done-all fa-2x col-md-offset-2\"></i>  Cấu hình thiết bị mạnh mẽ<br>\r\n <i class=\"ion ion-md-done-all fa-2x col-md-offset-2\"></i>  Tiên phong về công nghệ mới<br>', 1, NULL, '2019-12-13 09:13:25', NULL);
INSERT INTO `static_pages` VALUES (23, 'BẰNG KINH NGHIỆM VÀ SỰ THẤU HIỂU', 'succeed', '<div class=\"col-sm-3 col-xs-6\">\r\n                        <div class=\"services-post col-md-offset-3\">\r\n                            <div class=\"exp-icon col-sm-5\">\r\n                                <i class=\"fa fa-calendar fa-4x\"></i>\r\n                            </div>\r\n                            <div class=\"exp-icon col-sm-7 services-post-content\">\r\n                                <h2> > 6</h2>\r\n                                <div>Năm phát triển</div>\r\n                            </div>\r\n                        </div>\r\n                    </div> \r\n                    <div class=\"col-sm-3 col-xs-6\">\r\n                        <div class=\"services-post col-md-offset-3\">\r\n                            <div class=\"exp-icon col-sm-5\">\r\n                                <i class=\"fa fa-paper-plane fa-4x\"></i>\r\n                            </div>\r\n                            <div class=\"exp-icon col-sm-7 services-post-content\">\r\n                                <h2> > 2000</h2>\r\n                                <div>VM đã cung cấp</div>\r\n                            </div>\r\n                        </div>\r\n                    </div> \r\n                    <div class=\"col-sm-3 col-xs-6\">\r\n                        <div class=\"services-post col-md-offset-1\">\r\n                            <div class=\"exp-icon col-sm-5\">\r\n                                <i class=\"fa fa-heart-o fa-4x\"></i>\r\n                            </div>\r\n                            <div class=\"exp-icon col-sm-7 services-post-content\">\r\n                                <h2>99%</h2>\r\n                                <div>Hài lòng về dịch vụ</div>\r\n                            </div>\r\n                        </div>\r\n                    </div> \r\n                    <div class=\"col-sm-3 col-xs-6\">\r\n                        <div class=\"services-post col-md-offset-1\">\r\n                            <div class=\"exp-icon col-sm-5\">\r\n                                <i class=\"fa fa-hand-peace-o fa-4x\"></i>\r\n                            </div>\r\n                            <div class=\"exp-icon col-sm-7 services-post-content\">\r\n                                <h2>100%</h2>\r\n                                <div>Hài lòng về thái độ phục vụ</div>\r\n                            </div>\r\n                        </div>\r\n                    </div>', 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for steps
-- ----------------------------
DROP TABLE IF EXISTS `steps`;
CREATE TABLE `steps`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of steps
-- ----------------------------
INSERT INTO `steps` VALUES (1, 'Bước 1', 'http://cloud.evgcorp.net', 'fa fa-hand-o-up', 5, 1, '2019-12-08 23:41:40', '2019-12-10 18:01:59', 'assets/media/images/steps/1012/buoc-1_1575967635.png');
INSERT INTO `steps` VALUES (2, 'Bước 2', 'Lựa chọn cấu hình', 'fa fa-server', 4, 1, '2019-12-08 23:42:31', '2019-12-10 18:01:59', 'assets/media/images/steps/1012/buoc-2_1575967625.png');
INSERT INTO `steps` VALUES (3, 'Bước 3', 'Thanh toán cấu hình đã chọn', 'fa fa-dollar', 3, 1, '2019-12-08 23:43:17', '2019-12-10 18:01:59', 'assets/media/images/steps/1012/buoc-3_1575967616.png');
INSERT INTO `steps` VALUES (4, 'Bước 4', 'http://client.evgcorp.net', '', 2, 1, '2019-12-10 18:01:35', '2019-12-10 18:01:59', 'assets/media/images/steps/buoc-4-1575975695.png');
INSERT INTO `steps` VALUES (5, 'Bước 5', 'Yêu cầu hỗ trợ khi cần', '', 1, 1, '2019-12-10 18:01:59', '2019-12-10 18:01:59', 'assets/media/images/steps/buoc-5-1575975718.png');

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES (1, 'Nguyễn Cảnh Toàn', 'Technical Specialist', '9 năm kinh nghiệm nghiên cứu, khai thác hạ tầng, dịch vụ CLOUD. Có nhiều kinh nghiệm khai các dự án lớn liên quan đến dịch vụ EVG chủ trì', '0912/nguyen-canh-toan.png', 3, 1, '2019-12-09 00:33:04', '2019-12-10 18:07:36');
INSERT INTO `teams` VALUES (2, 'Võ Quang Thắng', 'Technical Specialist', 'Mô tả thông tin có giá trị, những điểm nổi bật, lời giới thiệu hấp dẫn về nhận sự của bạn, giúp khách hàng tin tưởng hơn vào sản phẩm dịch vụ mà bạn cung cấp', '0912/vo-quang-thang.png', 1, 1, '2019-12-09 00:39:41', '2019-12-10 18:08:00');
INSERT INTO `teams` VALUES (3, 'Nguyễn Huy Nam', 'Sale Manager', 'Mô tả thông tin có giá trị, những điểm nổi bật, lời giới thiệu hấp dẫn về nhận sự của bạn, giúp khách hàng tin tưởng hơn vào sản phẩm dịch vụ mà bạn cung cấp', '0912/nguyen-huy-nam.png', 2, 1, '2019-12-09 00:41:06', '2019-12-10 18:07:51');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activated` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'System', 'contact@bctech.vn', '$2y$10$t0bZMpyjCAH7cfSDoqtuKua.zPqbRDDr6mi9xa4hJNbLtbiEqML0y', '7Z2vj6jC2Z', 1, '2019-12-11 09:51:54', '2019-12-11 09:51:54', NULL);
INSERT INTO `users` VALUES (2, 'Administrator', 'administrator@bctech.vn', '$2y$10$IBicvkGljIZz4OYU5WbwBeslrHY71El5nVq5h4mhsmbym57NB1OgS', 'VWWpMXoAWi', 1, '2019-12-11 09:51:54', '2019-12-11 09:51:54', NULL);
INSERT INTO `users` VALUES (3, 'User', 'user@bctech.vn', '$2y$10$JsfTahjpDywaY4IHVSJxf.BYnRaCNdqG2B0/6JI6nLQrt5vvQ3o5S', 'OoZcGCANsZ', 1, '2019-12-11 09:51:54', '2019-12-11 09:51:54', NULL);

SET FOREIGN_KEY_CHECKS = 1;
