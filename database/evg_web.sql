/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : evg_web

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 09/12/2019 10:18:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (2, 1);
INSERT INTO `permission_role` VALUES (3, 1);
INSERT INTO `permission_role` VALUES (4, 1);
INSERT INTO `permission_role` VALUES (5, 1);
INSERT INTO `permission_role` VALUES (6, 1);
INSERT INTO `permission_role` VALUES (7, 1);
INSERT INTO `permission_role` VALUES (8, 1);
INSERT INTO `permission_role` VALUES (9, 1);
INSERT INTO `permission_role` VALUES (10, 1);
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
INSERT INTO `permission_role` VALUES (37, 1);
INSERT INTO `permission_role` VALUES (38, 1);
INSERT INTO `permission_role` VALUES (39, 1);
INSERT INTO `permission_role` VALUES (40, 1);
INSERT INTO `permission_role` VALUES (41, 1);
INSERT INTO `permission_role` VALUES (42, 1);
INSERT INTO `permission_role` VALUES (43, 1);
INSERT INTO `permission_role` VALUES (44, 1);
INSERT INTO `permission_role` VALUES (45, 1);
INSERT INTO `permission_role` VALUES (46, 1);
INSERT INTO `permission_role` VALUES (47, 1);
INSERT INTO `permission_role` VALUES (48, 1);
INSERT INTO `permission_role` VALUES (49, 1);
INSERT INTO `permission_role` VALUES (50, 1);
INSERT INTO `permission_role` VALUES (51, 1);
INSERT INTO `permission_role` VALUES (52, 1);
INSERT INTO `permission_role` VALUES (53, 1);
INSERT INTO `permission_role` VALUES (1, 2);
INSERT INTO `permission_role` VALUES (2, 2);
INSERT INTO `permission_role` VALUES (3, 2);
INSERT INTO `permission_role` VALUES (4, 2);
INSERT INTO `permission_role` VALUES (9, 2);
INSERT INTO `permission_role` VALUES (10, 2);
INSERT INTO `permission_role` VALUES (9, 3);
INSERT INTO `permission_role` VALUES (10, 3);

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`, `permission_id`, `user_type`) USING BTREE,
  INDEX `permission_user_permission_id_foreign`(`permission_id`) USING BTREE,
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'users.create', 'Thêm mới Quản trị', 'Create Users', NULL, 'create', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (2, 'users.read', 'Xem Quản trị', 'Read Users', NULL, 'read', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (3, 'users.update', 'Cập nhật Quản trị', 'Update Users', NULL, 'update', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (4, 'users.delete', 'Xóa Quản trị', 'Delete Users', NULL, 'delete', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (5, 'acl.create', 'Thêm mới Acl', 'Create Acl', NULL, 'create', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (6, 'acl.read', 'Xem Acl', 'Read Acl', NULL, 'read', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (7, 'acl.update', 'Cập nhật Acl', 'Update Acl', NULL, 'update', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (8, 'acl.delete', 'Xóa Acl', 'Delete Acl', NULL, 'delete', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (9, 'profile.read', 'Xem Profile', 'Read Profile', NULL, 'read', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (10, 'profile.update', 'Cập nhật Profile', 'Update Profile', NULL, 'update', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (11, 'roles.read', 'Xem Vai trò', 'Read Roles', 'roles', 'read', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (12, 'roles.create', 'Thêm mới Vai trò', 'Create Roles', 'roles', 'create', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (13, 'roles.update', 'Cập nhật Vai trò', 'Update Roles', 'roles', 'update', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (14, 'roles.delete', 'Xóa Vai trò', 'Delete Roles', 'roles', 'delete', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (15, 'sliders.delete', 'Xóa Slider', 'Delete Sliders', 'sliders', 'delete', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (16, 'sliders.read', 'Xem Slider', 'Read Sliders', 'sliders', 'read', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (17, 'sliders.create', 'Thêm mới Slider', 'Create Sliders', 'sliders', 'create', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (18, 'sliders.update', 'Cập nhật Slider', 'Update Sliders', 'sliders', 'update', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (19, 'service_categories.delete', 'Xóa Danh mục dịch vụ', 'Delete Service_categories', 'service_categories', 'delete', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (20, 'service_categories.read', 'Xem Danh mục dịch vụ', 'Read Service_categories', 'service_categories', 'read', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (21, 'service_categories.create', 'Thêm mới Danh mục dịch vụ', 'Create Service_categories', 'service_categories', 'create', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (22, 'service_categories.update', 'Cập nhật Danh mục dịch vụ', 'Update Service_categories', 'service_categories', 'update', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (23, 'services.delete', 'Xóa Dịch vụ', 'Delete Services', 'services', 'delete', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (24, 'services.approve', 'Duyệt Dịch vụ', 'Approve Services', 'services', 'approve', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (25, 'services.update', 'Cập nhật Dịch vụ', 'Update Services', 'services', 'update', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (26, 'services.read', 'Xem Dịch vụ', 'Read Services', 'services', 'read', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (27, 'services.create', 'Thêm mới Dịch vụ', 'Create Services', 'services', 'create', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (28, 'news.approve', 'Duyệt Tin tức', 'Approve News', 'news', 'approve', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (29, 'news.publish', 'Publish Tin tức', 'Publish News', 'news', 'publish', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (30, 'news.read', 'Xem Tin tức', 'Read News', 'news', 'read', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (31, 'news.create', 'Thêm mới Tin tức', 'Create News', 'news', 'create', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `permissions` VALUES (32, 'news.update', 'Cập nhật Tin tức', 'Update News', 'news', 'update', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (33, 'news.delete', 'Xóa Tin tức', 'Delete News', 'news', 'delete', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (34, 'news_categories.delete', 'Xóa Danh mục tin', 'Delete News_categories', 'news_categories', 'delete', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (35, 'news_categories.read', 'Xem Danh mục tin', 'Read News_categories', 'news_categories', 'read', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (36, 'news_categories.create', 'Thêm mới Danh mục tin', 'Create News_categories', 'news_categories', 'create', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (37, 'news_categories.update', 'Cập nhật Danh mục tin', 'Update News_categories', 'news_categories', 'update', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (38, 'static_pages.delete', 'Xóa Trang tĩnh', 'Delete Static_pages', 'static_pages', 'delete', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (39, 'static_pages.read', 'Xem Trang tĩnh', 'Read Static_pages', 'static_pages', 'read', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (40, 'static_pages.create', 'Thêm mới Trang tĩnh', 'Create Static_pages', 'static_pages', 'create', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (41, 'static_pages.update', 'Cập nhật Trang tĩnh', 'Update Static_pages', 'static_pages', 'update', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (42, 'projects.update', 'Cập nhật Dự án', 'Update Projects', 'projects', 'update', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (43, 'projects.delete', 'Xóa Dự án', 'Delete Projects', 'projects', 'delete', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (44, 'projects.read', 'Xem Dự án', 'Read Projects', 'projects', 'read', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (45, 'projects.create', 'Thêm mới Dự án', 'Create Projects', 'projects', 'create', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (46, 'project_categories.delete', 'Xóa Danh mục dự án', 'Delete Project_categories', 'project_categories', 'delete', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (47, 'project_categories.read', 'Xem Danh mục dự án', 'Read Project_categories', 'project_categories', 'read', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (48, 'project_categories.create', 'Thêm mới Danh mục dự án', 'Create Project_categories', 'project_categories', 'create', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (49, 'project_categories.update', 'Cập nhật Danh mục dự án', 'Update Project_categories', 'project_categories', 'update', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (50, 'partners.read', 'Xem Đối tác', 'Read Partners', 'partners', 'read', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (51, 'partners.create', 'Thêm mới Đối tác', 'Create Partners', 'partners', 'create', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (52, 'partners.update', 'Cập nhật Đối tác', 'Update Partners', 'partners', 'update', '2019-12-06 13:57:20', '2019-12-06 13:57:20');
INSERT INTO `permissions` VALUES (53, 'partners.delete', 'Xóa Đối tác', 'Delete Partners', 'partners', 'delete', '2019-12-06 13:57:20', '2019-12-06 13:57:20');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`, `role_id`, `user_type`) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'system', 'System', 'System', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `roles` VALUES (2, 'administrator', 'Administrator', 'Administrator', '2019-12-06 13:57:19', '2019-12-06 13:57:19');
INSERT INTO `roles` VALUES (3, 'user', 'User', 'User', '2019-12-06 13:57:19', '2019-12-06 13:57:19');

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
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 'Triển khai siêu tốc', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'fa fa-rocket', 1, 1, '2019-12-06 17:51:39', '2019-12-08 23:07:23');
INSERT INTO `services` VALUES (2, 'Quản lí dễ dàng', 'Quản lí dễ dàng', 'fa fa-users', 2, 1, '2019-12-06 18:06:24', '2019-12-08 23:07:26');
INSERT INTO `services` VALUES (3, 'An toàn bảo mật', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'fa fa-shield', 3, 1, '2019-12-06 18:07:41', '2019-12-08 23:07:28');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (1, 'EVG-CLOUD', 'Được xây dựng và phát triển bởi đội ngũ nhân sự giàu kinh nghiệm, trên nền hệ thống phần cứng hiện đại nhất <br>  từ DELL, HP, IBM… với giải pháp công nghệ KVM đã được Amazon, IBM, Alibaba…tin tưởng sử dụng. <br><br>', 1, 1, 'assets/media/images/sliders/0912/evg-cloud_1575859486.png', 'EVG-CLOUD là dịch vụ cho phép khách hàng khởi tạo theo nhu cầu hàng loạt các loại tài nguyên máy chủ ảo<br>\r\n                         bao gồm bộ vi xử lý trung tâm (CPU), bộ nhớ tạm thời (RAM), dung lượng lưu trữ (Storage) và hệ thống mạng<br> (Networks) mà không cần phải đầu tư thiết bị phần cứng tại Data Center<br><br>\r\n\r\n                        Hệ thống được phân bố tại các Data Center đạt chuẩn Tier 3 như FPT, Viettel, VNPT. Dịch vụ sử dụng riêng hệ <br>thống kết nối cáp quốc tế ổn định, băng thông cao lên tới 10Gbps; đảm bảo cam kết chất lượng (SLA) 99,99%. <br><br>\r\n\r\n                        Khách hàng dễ dàng quản lý máy chủ  và dịch vụ chỉ với vài cú nhấp chuột; tất cả các nghiệp vụ quản trị, vận <br>hành đều được thực hiện thông qua giao diện web portal', 'assets/media/images/sliders/0612/sub_evg-cloud_1575624315.png', '2019-12-06 15:30:38', '2019-12-09 09:51:21');

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
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of static_pages
-- ----------------------------
INSERT INTO `static_pages` VALUES (1, 'Chân trang 1', 'footer', '<p>&#169; 2019 EVG .,JSC All Rights Reserved | <i class=\"fa fa-home\"></i>Cung cấp dịch vụ CLOUD tốt nhất | <i class=\"fa fa-map-marker\"></i> Số 58, Tố Hữu - Nam Từ Liêm - HN</p>', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (2, 'Chân trang 2', 'footer-2', '<ul class=\"social-icons\">\r\n                                    <li>\r\n                                        <a class=\"facebook\" href=\"https://cloud.evgcorp.net\" style=\"color: white;\">\r\n                                            <i class=\"fa fa-globe\"></i>https://cloud.evgcorp.net\r\n                                        </a>\r\n                                    </li>\r\n                                    <li>\r\n                                        <a class=\"facebook\" href=\"tel:0985386150\" style=\"color: white;\">\r\n                                            <i class=\"fa fa-phone\"></i>ZALO:098 538 6150\r\n                                        </a>\r\n                                    </li>\r\n                                </ul>', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (3, 'Địa chỉ', 'address', 'Địa chỉ : Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (5, 'Số điện thoại', 'phone', 'HOTLINE:0985386150', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (6, 'Tên Website', 'website-title', 'EVG-CLOUD', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (7, 'Mô tả Website', 'website-description', 'EVG-CLOUD là dịch vụ cho phép khách hàng khởi tạo theo nhu cầu hàng loạt các loại tài nguyên máy chủ ảo bao gồm bộ vi xử lý trung tâm (CPU), bộ nhớ tạm thời (RAM), dung lượng lưu trữ (Storage) và hệ thống mạng (Networks) mà không cần phải đầu tư thiết bị phần cứng tại Data Center', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (10, 'Từ khoá SEO', 'seo-keywords', 'EVG-CLOUD', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (11, 'Mô tả SEO', 'seo-description', 'EVG-CLOUD là dịch vụ cho phép khách hàng khởi tạo theo nhu cầu hàng loạt các loại tài nguyên máy chủ ảo bao gồm bộ vi xử lý trung tâm (CPU), bộ nhớ tạm thời (RAM), dung lượng lưu trữ (Storage) và hệ thống mạng (Networks) mà không cần phải đầu tư thiết bị phần cứng tại Data Center', 1, NULL, NULL, NULL);
INSERT INTO `static_pages` VALUES (16, 'Ảnh các bước đăng kí', 'image', '<p><img alt=\"\" src=\"http://evg_web.local:8088/assets/media/images/img2.png\" width=\"490\" /></p>', 1, NULL, '2019-12-09 02:10:55', NULL);
INSERT INTO `static_pages` VALUES (17, 'Mô tả các bước đăng kí', 'description', ' <h4 style=\"color: #d29103;margin-top: 30px;\">Trải nghiệm EVG-CLOULD bạn nhận ngay:</h4><br>\r\n                        <p><a href=\"https://cloud.evgcorp.net\"><i class=\"fa fa-hand-o-right\"></i> Tư vấn tối ưu dịch vụ bởi chuyên gia</a></p>', 1, NULL, '2019-12-09 02:07:45', NULL);

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
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of steps
-- ----------------------------
INSERT INTO `steps` VALUES (1, 'Bước 1', 'http://cloudevgroup.net', 'fa fa-hand-o-up', 3, 1, '2019-12-08 23:41:40', '2019-12-08 23:45:06');
INSERT INTO `steps` VALUES (2, 'Bước 2', 'Lựa chọn cấu hình', 'fa fa-server', 2, 1, '2019-12-08 23:42:31', '2019-12-08 23:45:06');
INSERT INTO `steps` VALUES (3, 'Bước 3', 'Thanh toán cấu hình đã chọn', 'fa fa-dollar', 1, 1, '2019-12-08 23:43:17', '2019-12-08 23:45:06');

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
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES (1, 'Nguyễn Cảnh Toàn', 'Technical Specialist', '9 năm kinh nghiệm nghiên cứu, khai thác hệ thống CLOUD', '0912/nguyen-canh-toan.png', 3, 1, '2019-12-09 00:33:04', '2019-12-09 00:58:15');
INSERT INTO `teams` VALUES (2, 'Võ Quang Thắng', 'Technical Specialist', 'Mô tả thông tin có giá trị, điểm nổi bật,  lời giới thiệu hấp dẫn về nhân sự của bạn', '0912/vo-quang-thang.png', 1, 1, '2019-12-09 00:39:41', '2019-12-09 00:58:15');
INSERT INTO `teams` VALUES (3, 'Nguyễn Huy Nam', 'Sale Manager', 'Mô tả thông tin', '0912/nguyen-huy-nam.png', 2, 1, '2019-12-09 00:41:06', '2019-12-09 00:58:15');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activated` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'System', 'contact@bctech.vn', '$2y$10$t0bZMpyjCAH7cfSDoqtuKua.zPqbRDDr6mi9xa4hJNbLtbiEqML0y', 'oKKPx8eal4', 1, '2019-12-06 13:57:19', '2019-12-06 13:57:19', NULL);
INSERT INTO `users` VALUES (2, 'Administrator', 'administrator@EVG', '$2y$10$I0rB.CZuVNNuVFG2djoKJOT.5NcFOwylwbqMYE28TBRNSjQ5Igwa6', 'm1XE4kpzvN', 1, '2019-12-06 13:57:19', '2019-12-06 13:57:19', NULL);
INSERT INTO `users` VALUES (3, 'User', 'user@EVG', '$2y$10$qNL8hOWUsXDJg.fx880j2OkNo.b61SkbDjRcqxRkQMnXn5jtN6UAy', 'cXLPT2lhpE', 1, '2019-12-06 13:57:19', '2019-12-06 13:57:19', NULL);

SET FOREIGN_KEY_CHECKS = 1;
