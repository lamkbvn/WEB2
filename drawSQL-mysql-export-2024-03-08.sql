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
    `percent` DOUBLE(8, 2) NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `description ` VARCHAR(255) NOT NULL,
    `date_start` DATE NOT NULL,
    `date_end` DATE NOT NULL,
    `status` INT NOT NULL
);

CREATE TABLE `PhanQuyenLinhDong`(
    `id_role` INT UNSIGNED NOT NULL AUTO_INCREMENT,
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
CREATE TABLE `Account`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_name`VARCHAR(255) ,
    `password` VARCHAR(255) ,
    `id_role` INT NOT NULL,
    `status` INT NOT NULL,
    PRIMARY KEY(`id`)
);
ALTER TABLE
    `order_detail` ADD CONSTRAINT `order_detail_id_product_foreign` FOREIGN KEY(`id_product`) REFERENCES `product`(`id`);
ALTER TABLE
    `PhanQuyenLinhDong` ADD CONSTRAINT `phanquyenlinhdong_id_role_foreign` FOREIGN KEY(`id_role`) REFERENCES `role`(`id`);
ALTER TABLE
    `cart` ADD CONSTRAINT `cart_id_product_foreign` FOREIGN KEY(`id_product`) REFERENCES `product`(`id`);
ALTER TABLE
    `discountUser` ADD CONSTRAINT `discountuser_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `nguoiDung`(`id`);
ALTER TABLE
    `order_detail` ADD CONSTRAINT `order_detail_id_order_foreign` FOREIGN KEY(`id_order`) REFERENCES `orders`(`id`);
ALTER TABLE
    `orders` ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `nguoiDung`(`id`);
ALTER TABLE
    `product` ADD CONSTRAINT `product_id_provincial_foreign` FOREIGN KEY(`id_provincial`) REFERENCES `provincial`(`id`);
ALTER TABLE
    `image_product` ADD CONSTRAINT `image_product_id_product_foreign` FOREIGN KEY(`id_product`) REFERENCES `product`(`id`);
ALTER TABLE
    `product` ADD CONSTRAINT `product_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `Acount`(`id`);
ALTER TABLE
    `image_product` ADD CONSTRAINT `image_product_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `nguoiDung`(`id`);
ALTER TABLE
    `cart` ADD CONSTRAINT `cart_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `nguoiDung`(`id`);
ALTER TABLE
    `feedback` ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `nguoiDung`(`id`);
ALTER TABLE
    `Acount` ADD CONSTRAINT `acount_id_foreign` FOREIGN KEY(`id`) REFERENCES `nguoiDung`(`id`);
ALTER TABLE
    `PhanQuyenLinhDong` ADD CONSTRAINT `phanquyenlinhdong_id_chucnang_foreign` FOREIGN KEY(`id_chucNang`) REFERENCES `ChucNang`(`id`);
ALTER TABLE
    `product` ADD CONSTRAINT `product_id_category_foreign` FOREIGN KEY(`id_category`) REFERENCES `category`(`id`);
ALTER TABLE
    `orders` ADD CONSTRAINT `orders_id_nguoixacnhanorder_foreign` FOREIGN KEY(`id_nguoiXacNhanOrder`) REFERENCES `nguoiDung`(`id`);
ALTER TABLE
    `discountUser` ADD CONSTRAINT `discountuser_id_discount_foreign` FOREIGN KEY(`id_discount`) REFERENCES `discount`(`id`);
ALTER TABLE
    `orders` ADD CONSTRAINT `orders_id_discount_foreign` FOREIGN KEY(`id_discount`) REFERENCES `discount`(`id`);
ALTER TABLE
    `role` ADD CONSTRAINT `role_id_foreign` FOREIGN KEY(`id`) REFERENCES `nguoiDung`(`id`);