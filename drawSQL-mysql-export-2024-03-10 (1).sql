CREATE TABLE `nguoiDung`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `fullname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone_number` VARCHAR(255) NOT NULL,
    `create_at` DATE NOT NULL,
    `status` INT NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `id_acount` INT NOT NULL
);
CREATE TABLE `provincial`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name_procince` VARCHAR(255) NOT NULL
);
CREATE TABLE `discountUser`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT NOT NULL,
    `id_discount` INT NOT NULL
);
CREATE TABLE `image_product`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_product` INT NOT NULL,
    `id_user` INT NOT NULL,
    `image` BLOB NOT NULL,
    `decription` VARCHAR(255) NOT NULL
);
CREATE TABLE `cart`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT NOT NULL,
    `id_product` INT NOT NULL,
    `amount` INT NOT NULL,
    `status` INT NOT NULL
);
CREATE TABLE `order_detail`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_order` INT NOT NULL,
    `id_product` INT NOT NULL,
    `price` INT NOT NULL,
    `amount` INT NOT NULL,
    `total_money` INT NOT NULL,
    `date_go` DATE NOT NULL
);
CREATE TABLE `feedback`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `note` VARCHAR(255) NOT NULL,
    `create_at` DATETIME NOT NULL,
    `update_at` DATE NOT NULL,
    `num_star` INT NOT NULL
);
CREATE TABLE `discount`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `discount_name` VARCHAR(255) NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `percent` DOUBLE(8, 2) NOT NULL,
    `date_start` DATE NOT NULL,
    `date_end` DATE NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `status` INT NOT NULL
);
CREATE TABLE `PhanQuyenLinhDong`(
    `id_role` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_chucNang` INT NOT NULL,
    `HD` VARCHAR(255) NOT NULL
);
CREATE TABLE `product`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_category` INT NOT NULL,
    `id_user` INT NOT NULL,
    `id_provincial` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `price` INT NOT NULL,
    `content` VARCHAR(255) NOT NULL,
    `create_at` DATE NOT NULL,
    `update_at` DATE NOT NULL,
    `status` INT NOT NULL,
    `num_bought` INT NOT NULL,
    `star_feedback` DOUBLE(8, 2) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `soLuongConLai` INT NOT NULL
);
CREATE TABLE `ChucNang`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `decription` INT NOT NULL
);
CREATE TABLE `role`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `decription` VARCHAR(255) NOT NULL
);
CREATE TABLE `orders`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT NOT NULL,
    `fullname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone_number` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `note` VARCHAR(255) NOT NULL,
    `date_order` DATE NOT NULL,
    `total_money` INT NOT NULL,
    `status` INT NOT NULL,
    `id_nguoiXacNhanOrder` INT NOT NULL,
    `id_discount` INT NOT NULL
);
CREATE TABLE `category`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name_category` VARCHAR(255) NOT NULL
);
CREATE TABLE `Acount`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_name` VARCHAR(255),
    `password` VARCHAR(255),
    `id_role` INT NOT NULL,
    `status` INT NOT NULL
);


INSERT INTO `product` (`id`, `id_category`, `id_user`, `id_provincial`, `title`, `price`, `content`, `create_at`, `update_at`, `status`, `num_bought`, `star_feedback`, `address`, `soLuongConLai`) VALUES
(1, 1, 5, 1, 'Tour Đảo Cô Tô', 1900000, 'Khám phá vẻ đẹp hoang sơ của Cô Tô', '2024-03-09', '2024-03-09', 1, 55, 4.40, 'Quảng Ninh', 30),
(2, 2, 8, 2, 'Hành trình Bà Rịa - Vũng Tàu', 2200000, 'Trải nghiệm vịnh biển và cảnh đẹp núi rừng', '2024-03-09', '2024-03-09', 1, 48, 4.70, 'Bà Rịa - Vũng Tàu', 25),
(3, 3, 14, 3, 'Du lịch Quy Nhơn', 1700000, 'Khám phá vùng đất của những bãi biển tuyệt vời', '2024-03-09', '2024-03-09', 1, 60, 4.20, 'Quy Nhơn, Bình Định', 35),
(4, 1, 6, 4, 'Tour Đồng Nai', 1500000, 'Khám phá địa điểm du lịch mới lạ tại Đồng Nai', '2024-03-09', '2024-03-09', 1, 45, 4.90, 'Đồng Nai', 28),
(5, 5, 10, 5, 'Hành trình Điện Biên', 2000000, 'Đặt chân đến vùng đất lịch sử Điện Biên', '2024-03-09', '2024-03-09', 1, 55, 4.60, 'Điện Biên', 32),
(6, 3, 13, 6, 'Du lịch Cần Thơ', 2200000, 'Thưởng thức ẩm thực đặc sản và cảnh đẹp sông nước', '2024-03-09', '2024-03-09', 1, 48, 4.80, 'Cần Thơ, An Giang', 27),
(7, 1, 17, 7, 'Tour Vũng Tàu', 1700000, 'Nghỉ dưỡng và thư giãn tại bãi biển Vũng Tàu', '2024-03-09', '2024-03-09', 1, 42, 4.30, 'Vũng Tàu, Bà Rịa - Vũng Tàu', 29),
(8, 2, 4, 8, 'Khám phá Ninh Bình', 1900000, 'Thưởng thức vẻ đẹp hùng vĩ của những cánh đồng lúa', '2024-03-09', '2024-03-09', 1, 38, 4.70, 'Ninh Bình', 31),
(9, 3, 12, 9, 'Du lịch Lạng Sơn', 2800000, 'Khám phá văn hóa và lịch sử của Lạng Sơn', '2024-03-09', '2024-03-09', 1, 52, 4.30, 'Lạng Sơn', 26),
(10, 1, 1, 10, 'Tour Yên Tử', 1600000, 'Hành trình linh thiêng tại chùa Yên Tử', '2024-03-09', '2024-03-09', 1, 58, 4.70, 'Quảng Ninh', 33),
(11, 5, 14, 11, 'Du lịch Hậu Giang', 2700000, 'Trải nghiệm cuộc sống ven sông sông nước tại Hậu Giang', '2024-03-09', '2024-03-09', 1, 47, 4.40, 'Hậu Giang', 30),
(12, 1, 7, 12, 'Tour Huế', 2000000, 'Khám phá di sản văn hóa Huế', '2024-03-09', '2024-03-09', 1, 44, 4.60, 'Huế, Thừa Thiên Huế', 29),
(13, 1, 16, 13, 'Du lịch Phan Thiết', 2400000, 'Thưởng thức bãi biển đẹp nhất Phan Thiết', '2024-03-09', '2024-03-09', 1, 51, 4.50, 'Phan Thiết, Bình Thuận', 27),
(14, 2, 8, 14, 'Hành trình Vĩnh Long', 1800000, 'Trải nghiệm cuộc sống ven sông Vĩnh Long', '2024-03-09', '2024-03-09', 1, 49, 4.80, 'Vĩnh Long', 30),
(15, 3, 11, 6, 'Khám phá Cần Thơ', 2100000, 'Thưởng thức vẻ đẹp sông nước và đặc sản miền Tây', '2024-03-09', '2024-03-09', 1, 46, 4.40, 'Cần Thơ, An Giang', 28),
(16, 4, 17, 16, 'Du lịch Cao Bằng', 1500000, 'Khám phá vùng đất đầy huyền bí của Cao Bằng', '2024-03-09', '2024-03-09', 1, 43, 4.90, 'Cao Bằng', 33),
(17, 1, 4, 17, 'Tour Tiền Giang', 1900000, 'Thăm quan và trải nghiệm ẩm thực tại Tiền Giang', '2024-03-09', '2024-03-09', 1, 37, 4.20, 'Tiền Giang', 31),
(18, 2, 13, 18, 'Hành trình Hà Giang', 2300000, 'Khám phá vùng đất cao nguyên đá Hà Giang', '2024-03-09', '2024-03-09', 1, 53, 4.30, 'Hà Giang', 29),
(19, 2, 2, 10, 'Du lịch Vịnh Hạ Long', 2600000, 'Nghỉ dưỡng tại vịnh Hạ Long huyền bí', '2024-03-09', '2024-03-09', 1, 59, 4.80, 'Quảng Ninh', 32),
(20, 1, 10, 20, 'Tour Cà Mau', 1700000, 'Trải nghiệm cảnh đẹp thiên nhiên tại Cà Mau', '2024-03-09', '2024-03-09', 1, 41, 4.10, 'Cà Mau', 27),
(21, 3, 7, 21, 'Du lịch Bến Tre', 1800000, 'Trải nghiệm cuộc sống ven sông Bến Tre', '2024-03-10', '2024-03-10', 1, 39, 4.60, 'Bến Tre', 28),
(22, 1, 16, 22, 'Tour Sapa', 2500000, 'Khám phá vẻ đẹp hùng vĩ của núi rừng Sapa', '2024-03-10', '2024-03-10', 1, 55, 4.80, 'Lào Cai', 32),
(23, 5, 9, 23, 'Hành trình Bạc Liêu', 2000000, 'Thưởng thức ẩm thực đặc sản tại Bạc Liêu', '2024-03-10', '2024-03-10', 1, 48, 4.20, 'Bạc Liêu', 29),
(24, 1, 3, 24, 'Tour Nha Trang', 2200000, 'Nghỉ dưỡng và thư giãn tại bãi biển Nha Trang', '2024-03-10', '2024-03-10', 1, 45, 4.90, 'Nha Trang, Khánh Hòa', 27),
(25, 2, 14, 25, 'Du lịch Long An', 1600000, 'Khám phá vùng đất lịch sử Long An', '2024-03-10', '2024-03-10', 1, 52, 4.70, 'Long An', 33),
(26, 3, 6, 6, 'Khám phá Đồng Tháp', 1900000, 'Thưởng thức vẻ đẹp sông nước và di tích lịch sử', '2024-03-10', '2024-03-10', 1, 44, 4.40, 'Đồng Tháp', 30),
(27, 4, 19, 27, 'Du lịch Lâm Đồng', 2400000, 'Khám phá vùng đất của hoa và mây đẹp nhất', '2024-03-10', '2024-03-10', 1, 51, 4.60, 'Lâm Đồng, Đà Lạt', 29),
(28, 1, 5, 28, 'Tour Thái Bình', 1800000, 'Trải nghiệm cuộc sống ven sông Thái Bình', '2024-03-10', '2024-03-10', 1, 49, 4.30, 'Thái Bình', 31),
(29, 3, 12, 29, 'Hành trình Hồ Chí Minh', 2800000, 'Khám phá lịch sử và văn hóa của TP.Hồ Chí Minh', '2024-03-10', '2024-03-10', 1, 53, 4.80, 'TP.Hồ Chí Minh', 27),
(30, 1, 1, 30, 'Tour Hải Dương', 1500000, 'Trải nghiệm cuộc sống và di tích lịch sử Hải Dương', '2024-03-10', '2024-03-10', 1, 37, 4.50, 'Hải Dương', 28),
(31, 3, 17, 31, 'Du lịch Ninh Thuận', 1900000, 'Thưởng thức nét đẹp tự nhiên của Ninh Thuận', '2024-03-10', '2024-03-10', 1, 46, 4.20, 'Ninh Thuận', 30),
(32, 4, 2, 32, 'Hành trình Hòa Bình', 2100000, 'Khám phá vùng núi Hòa Bình tươi tắn', '2024-03-10', '2024-03-10', 1, 43, 4.90, 'Hòa Bình', 32),
(33, 1, 15, 33, 'Tour Nam Định', 1700000, 'Trải nghiệm cuộc sống ven sông Nam Định', '2024-03-10', '2024-03-10', 1, 38, 4.60, 'Nam Định', 29),
(34, 2, 18, 34, 'Du lịch Gia Lai', 2200000, 'Khám phá văn hóa và địa điểm đẹp của Gia Lai', '2024-03-10', '2024-03-10', 1, 47, 4.80, 'Gia Lai', 26),
(35, 1, 11, 35, 'Tour Vĩnh Phúc', 2000000, 'Thăm quan và thưởng thức đặc sản Vĩnh Phúc', '2024-03-10', '2024-03-10', 1, 42, 4.30, 'Vĩnh Phúc', 33),
(36, 3, 4, 36, 'Du lịch Kon Tum', 1700000, 'Khám phá vẻ đẹp của Kon Tum đầy màu sắc', '2024-03-10', '2024-03-10', 1, 58, 4.70, 'Kon Tum', 30),
(37, 1, 13, 37, 'Tour Lào Cai', 2500000, 'Hành trình đến với vùng đất nổi tiếng của Lào Cai', '2024-03-10', '2024-03-10', 1, 47, 4.40, 'Lào Cai', 29),
(38, 5, 6, 38, 'Hành trình Bình Định', 1800000, 'Trải nghiệm văn hóa và ẩm thực Bình Định', '2024-03-10', '2024-03-10', 1, 41, 4.10, 'Bình Định', 27),
(39, 4, 8, 39, 'Du lịch Thừa Thiên Huế', 2600000, 'Khám phá di sản lịch sử của Thừa Thiên Huế', '2024-03-10', '2024-03-10', 1, 59, 4.50, 'Huế, Thừa Thiên Huế', 28),
(40, 1, 10, 40, 'Tour Hà Nam', 1700000, 'Trải nghiệm cuộc sống và văn hóa Hà Nam', '2024-03-10', '2024-03-10', 1, 41, 4.30, 'Hà Nam', 31);

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `amount`, `status`) VALUES
(1, 1, 1, 2, 1),
(2, 1, 2, 1, 1),
(3, 1, 3, 3, 1),
(4, 1, 4, 2, 1),
(5, 2, 5, 2, 1),
(6, 2, 6, 1, 1),
(7, 2, 7, 3, 1),
(8, 2, 8, 1, 1),
(9, 3, 9, 1, 1),
(10, 3, 10, 2, 1),
(11, 3, 11, 3, 1),
(12, 3, 12, 1, 1),
(13, 4, 13, 2, 1),
(14, 4, 14, 1, 1),
(15, 4, 15, 3, 1),
(16, 4, 16, 1, 1),
(17, 5, 17, 1, 1),
(18, 5, 18, 2, 1),
(19, 5, 19, 3, 1),
(20, 5, 20, 1, 1),
(21, 6, 21, 2, 1),
(22, 6, 22, 1, 1),
(23, 6, 23, 3, 1),
(24, 6, 24, 1, 1),
(25, 7, 25, 2, 1),
(26, 7, 26, 1, 1),
(27, 7, 27, 3, 1),
(28, 7, 28, 1, 1),
(29, 8, 29, 2, 1),
(30, 8, 30, 1, 1),
(31, 8, 31, 3, 1),
(32, 8, 32, 1, 1),
(33, 9, 33, 2, 1),
(34, 9, 34, 1, 1),
(35, 9, 35, 3, 1),
(36, 9, 36, 1, 1),
(37, 10, 37, 2, 1),
(38, 10, 38, 1, 1),
(39, 10, 39, 3, 1),
(40, 10, 40, 1, 1);

INSERT INTO `category` (`id`, `name_category`) VALUES
(1, 'Tour'),
(2, 'Du thuyền'),
(3, 'Hoạt động dưới nước'),
(4, 'Phiêu lưu và khám phá thiên nhiên'),
(5, 'Trải nghiệm văn hóa');

INSERT INTO `discount` (`id`, `discount_name`, `percent`, `code`, `description`, `date_start`, `date_end`, `status`) VALUES
(1, 'Khuyến mãi Mùa Hè', 10.50, 'SUMMER01', 'Ưu đãi đặc biệt cho kỳ nghỉ mùa hè', '2024-03-09', '2024-03-19', 1),
(2, 'Ưu đãi Đặt Trước', 15.00, 'EARLY02', 'Đặt trước và nhận được ưu đãi', '2024-03-09', '2024-03-24', 1),
(3, 'Nghỉ Đông Vui Vẻ', 12.80, 'WINTER03', 'Thưởng thức mùa đông với giá giảm', '2024-03-09', '2024-03-29', 1),
(4, 'Ưu đãi Cho Gia Đình', 20.00, 'FAMILY04', 'Ưu đãi cho đặt phòng của gia đình', '2024-03-09', '2024-04-03', 1),
(5, 'Du lịch Cuối Tuần', 8.70, 'WEEKEND05', 'Ưu đãi đặc biệt cho các chuyến đi cuối tuần', '2024-03-09', '2024-04-08', 1),
(6, 'Khuyến mãi Năm Mới', 18.30, 'NEWYEAR06', 'Chào đón năm mới với ưu đãi đặc biệt', '2024-03-09', '2024-04-13', 1),
(7, 'Ưu đãi Mùa Xuân', 14.60, 'SPRING07', 'Ưu đãi cho những kỳ nghỉ mùa xuân', '2024-03-09', '2024-04-18', 1),
(8, 'Ưu đãi Đặt Phòng Cuối Cùng', 10.00, 'LASTMIN08', 'Nhận ưu đãi cho đặt phòng vào phút cuối', '2024-03-09', '2024-04-23', 1),
(9, 'Khuyến mãi Kỷ Niệm', 25.20, 'ANNIV09', 'Chào mừng kỷ niệm với ưu đãi đặc biệt', '2024-03-09', '2024-04-28', 1),
(10, 'Quay lại Trường Học', 12.00, 'SCHOOL10', 'Ưu đãi cho mùa trở lại trường', '2024-03-09', '2024-05-03', 1),
(11, 'Nghỉ Mát Mùa Thu', 16.90, 'AUTUMN11', 'Ưu đãi cho kỳ nghỉ mùa thu', '2024-03-09', '2024-05-08', 1),
(12, 'Khuyến mãi Lễ Hội', 22.50, 'HOLIDAY12', 'Ưu đãi đặc biệt cho mùa lễ hội', '2024-03-09', '2024-05-13', 1),
(13, 'Ưu đãi Phục Sinh', 17.80, 'EASTER13', 'Ưu đãi theo chủ đề Phục Sinh cho mùa xuân', '2024-03-09', '2024-05-18', 1),
(14, 'Tuần Phiêu Lưu', 11.20, 'ADVEN14', 'Ưu đãi cho các chuyến phiêu lưu', '2024-03-09', '2024-05-23', 1),
(15, 'Kỳ Nghỉ Lãng Mạn', 14.00, 'ROMAN15', 'Ưu đãi cho kỳ nghỉ lãng mạn', '2024-03-09', '2024-05-28', 1),
(16, 'Mùa Hè Sôi Động', 9.50, 'SUMMER16', 'Đối mặt với cái nóng với ưu đãi mùa hè', '2024-03-09', '2024-06-02', 1),
(17, 'Nghỉ Mát Mùa Xuân', 13.30, 'SPRING17', 'Ưu đãi cho kỳ nghỉ mát mùa xuân', '2024-03-09', '2024-06-07', 1),
(18, 'Trải nghiệm Văn Hóa', 19.70, 'CULTURAL18', 'Ưu đãi cho các chuyến thăm văn hóa', '2024-03-09', '2024-06-12', 1),
(19, 'Trốn Thành Phố', 10.80, 'CITY19', 'Thưởng thức cuộc sống thành phố với giá giảm', '2024-03-09', '2024-06-17', 1),
(20, 'Sức Khỏe và Sự Sống', 15.50, 'WELLNES20', 'Ưu đãi cho kỳ nghỉ thư giãn và sức khỏe', '2024-03-09', '2024-06-22', 1);

INSERT INTO `discountuser` (`id`, `id_user`, `id_discount`) VALUES
(1, 1, 3),
(2, 1, 8),
(3, 1, 12),
(4, 1, 18),
(5, 2, 5),
(6, 2, 10),
(7, 2, 15),
(8, 2, 20),
(9, 3, 2),
(10, 3, 7),
(11, 3, 13),
(12, 3, 19),
(13, 4, 1),
(14, 4, 6),
(15, 4, 11),
(16, 4, 16),
(17, 5, 4),
(18, 5, 9),
(19, 5, 14),
(20, 5, 17);

INSERT INTO `feedback` (`id`, `user_id`, `product_id`, `note`, `create_at`, `update_at`, `num_star`) VALUES
(1, 1, 1, 'Sản phẩm tốt!', '2024-03-09 12:00:00', '2024-03-09', 4),
(2, 1, 2, 'Dịch vụ xuất sắc!', '2024-03-09 12:30:00', '2024-03-09', 5),
(3, 1, 3, 'Trải nghiệm trung bình.', '2024-03-09 13:00:00', '2024-03-09', 3),
(4, 1, 4, 'Tour tuyệt vời!', '2024-03-09 13:30:00', '2024-03-09', 5),
(5, 2, 5, 'Điểm đến tuyệt vời!', '2024-03-09 14:00:00', '2024-03-09', 4),
(6, 2, 6, 'Không hài lòng.', '2024-03-09 14:30:00', '2024-03-09', 2),
(7, 2, 7, 'Phong cảnh đẹp!', '2024-03-09 15:00:00', '2024-03-09', 5),
(8, 2, 8, 'Nên khuyến khích!', '2024-03-09 15:30:00', '2024-03-09', 4),
(9, 3, 9, 'Yêu thích trải nghiệm!', '2024-03-09 16:00:00', '2024-03-09', 5),
(10, 3, 10, 'Hành trình dễ chịu.', '2024-03-09 16:30:00', '2024-03-09', 3),
(11, 3, 11, 'Thất vọng.', '2024-03-09 17:00:00', '2024-03-09', 2),
(12, 3, 12, 'Tổ chức tốt!', '2024-03-09 17:30:00', '2024-03-09', 4),
(13, 4, 13, 'Chất lượng tốt, giá hợp lý.', '2024-03-09 18:00:00', '2024-03-09', 4),
(14, 4, 14, 'Dịch vụ chuyên nghiệp.', '2024-03-09 18:30:00', '2024-03-09', 5),
(15, 4, 15, 'Không gian thoải mái.', '2024-03-09 19:00:00', '2024-03-09', 3),
(16, 4, 16, 'Tour thú vị!', '2024-03-09 19:30:00', '2024-03-09', 5),
(17, 5, 17, 'Đồ ăn ngon, nhân viên thân thiện.', '2024-03-09 20:00:00', '2024-03-09', 4),
(18, 5, 18, 'Dễ dàng đặt tour online.', '2024-03-09 20:30:00', '2024-03-09', 2),
(19, 5, 19, 'Không gian đẹp, phục vụ tốt.', '2024-03-09 21:00:00', '2024-03-09', 5),
(20, 5, 20, 'Tour hấp dẫn.', '2024-03-09 21:30:00', '2024-03-09', 4),
(21, 6, 21, 'Điểm đến tuyệt vời!', '2024-03-09 22:00:00', '2024-03-09', 5),
(22, 6, 22, 'Dịch vụ ấn tượng.', '2024-03-09 22:30:00', '2024-03-09', 3),
(23, 6, 23, 'Trải nghiệm thú vị.', '2024-03-09 23:00:00', '2024-03-09', 2),
(24, 6, 24, 'Tour đáng nhớ!', '2024-03-09 23:30:00', '2024-03-09', 4),
(25, 7, 25, 'Thực phẩm ngon miệng.', '2024-03-10 00:00:00', '2024-03-10', 4),
(26, 7, 26, 'Dịch vụ chuyên nghiệp.', '2024-03-10 00:30:00', '2024-03-10', 5),
(27, 7, 27, 'Khám phá độc đáo.', '2024-03-10 01:00:00', '2024-03-10', 3),
(28, 7, 28, 'Tour thú vị!', '2024-03-10 01:30:00', '2024-03-10', 5),
(29, 8, 29, 'Khám phá văn hóa độc đáo.', '2024-03-10 02:00:00', '2024-03-10', 4),
(30, 8, 30, 'Dịch vụ tốt, giá hợp lý.', '2024-03-10 02:30:00', '2024-03-10', 2),
(31, 8, 31, 'Trải nghiệm thú vị.', '2024-03-10 03:00:00', '2024-03-10', 5),
(32, 8, 32, 'Tour tuyệt vời!', '2024-03-10 03:30:00', '2024-03-10', 4),
(33, 9, 33, 'Phong cảnh đẹp tuyệt vời.', '2024-03-10 04:00:00', '2024-03-10', 5),
(34, 9, 34, 'Dịch vụ chuyên nghiệp.', '2024-03-10 04:30:00', '2024-03-10', 3),
(35, 9, 35, 'Trải nghiệm thú vị.', '2024-03-10 05:00:00', '2024-03-10', 2),
(36, 9, 36, 'Tour đáng nhớ!', '2024-03-10 05:30:00', '2024-03-10', 4),
(37, 10, 37, 'Thực phẩm ngon miệng.', '2024-03-10 06:00:00', '2024-03-10', 4),
(38, 10, 38, 'Dịch vụ chuyên nghiệp.', '2024-03-10 06:30:00', '2024-03-10', 5),
(39, 10, 39, 'Khám phá độc đáo.', '2024-03-10 07:00:00', '2024-03-10', 3),
(40, 10, 40, 'Tour thú vị!', '2024-03-10 07:30:00', '2024-03-10', 5);

INSERT INTO `nguoidung` (`id`, `fullname`, `email`, `phone_number`, `create_at`, `status`, `address`, `id_acount`) VALUES
(1, 'lam phuc', 'nguyenvana@email.com', '123456789', '2023-01-01', 1, '123 Street, City', 1),
(2, 'Tran Thi B', 'tranthib@email.com', '987654321', '2023-02-15', 1, '456 Avenue, Town', 2),
(3, 'Le Van C', 'levanc@email.com', '555444333', '2023-03-20', 1, '789 Road, Village', 3),
(4, 'Pham Thi D', 'phamthid@email.com', '111222333', '2023-04-10', 1, '567 Lane, Suburb', 4),
(5, 'Hoang Van E', 'hoangvane@email.com', '999888777', '2023-05-05', 1, '432 Drive, District', 5),
(6, 'Nguyen Thi F', 'nguyenthif@email.com', '444555666', '2023-06-22', 1, '876 Crescent, City', 6),
(7, 'Tran Van G', 'tranvang@email.com', '777888999', '2023-07-18', 1, '654 Boulevard, Town', 7),
(8, 'Le Thi H', 'lethih@email.com', '222333444', '2023-08-30', 1, '987 Street, Village', 8),
(9, 'Pham Van I', 'phamvani@email.com', '666777888', '2023-09-12', 1, '321 Road, Suburb', 9),
(10, 'Hoang Thi K', 'hoangthik@email.com', '333222111', '2023-10-05', 1, '234 Lane, District', 10),
(11, 'Nguyen Van L', 'nguyenvanl@email.com', '888777666', '2023-11-11', 1, '789 Drive, City', 11),
(12, 'Tran Thi M', 'tranthim@email.com', '111222333', '2023-12-25', 1, '876 Avenue, Town', 12),
(13, 'Le Van N', 'levann@email.com', '555444333', '2024-01-07', 1, '345 Road, Village', 13),
(14, 'Pham Thi O', 'phamthio@email.com', '999888777', '2024-02-14', 1, '567 Lane, Suburb', 14),
(15, 'Hoang Van P', 'hoangvanp@email.com', '333444555', '2024-03-01', 1, '432 Crescent, District', 15),
(16, 'Nguyen Thi Q', 'nguyenthiq@email.com', '777888999', '2024-04-15', 1, '321 Street, City', 16),
(17, 'Tran Van R', 'tranvanr@email.com', '444555666', '2024-05-20', 1, '654 Boulevard, Town', 17),
(18, 'Le Thi S', 'lethis@email.com', '666777888', '2024-06-10', 1, '987 Road, Village', 18),
(19, 'Pham Van T', 'phamvant@email.com', '222333444', '2024-07-05', 1, '123 Lane, Suburb', 19),
(20, 'Hoang Thi U', 'hoangthiu@email.com', '888777666', '2024-08-18', 1, '876 Drive, District', 20);

INSERT INTO `provincial` (`id`, `name_procince`) VALUES
(1, 'Quảng Ninh'),
(2, 'Bà Rịa - Vũng Tàu'),
(3, 'Quy Nhơn, Bình Định'),
(4, 'Đồng Nai'),
(5, 'Điện Biên'),
(6, 'Cần Thơ, An Giang'),
(7, 'Vũng Tàu, Bà Rịa - Vũng Tàu'),
(8, 'Ninh Bình'),
(9, 'Lạng Sơn'),
(10, 'Hậu Giang'),
(11, 'Huế, Thừa Thiên Huế'),
(12, 'Phan Thiết, Bình Thuận'),
(13, 'Vĩnh Long'),
(14, 'Cao Bằng'),
(15, 'Tiền Giang'),
(16, 'Hà Giang'),
(17, 'Cà Mau'),
(18, 'Bến Tre'),
(19, 'Lào Cai'),
(20, 'Bạc Liêu'),
(21, 'Nha Trang, Khánh Hòa'),
(22, 'Long An'),
(23, 'Đồng Tháp'),
(24, 'Lâm Đồng, Đà Lạt'),
(25, 'Thái Bình'),
(26, 'TP.Hồ Chí Minh'),
(27, 'Hải Dương'),
(28, 'Ninh Thuận'),
(29, 'Hòa Bình'),
(30, 'Nam Định'),
(31, 'Gia Lai'),
(32, 'Vĩnh Phúc'),
(33, 'Kon Tum'),
(34, 'Bình Định'),
(35, 'Hà Nam');
