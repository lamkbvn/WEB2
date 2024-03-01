CREATE TABLE `users`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_role` INT NOT NULL,
    `user_name` VARCHAR(255) NOT NULL,
    `fullname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `phone_number` VARCHAR(255) NOT NULL,
    `create_at` DATE NOT NULL,
    `status` INT NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `pitch` DOUBLE(8, 2) NOT NULL,
    `lat` DOUBLE(8, 2) NOT NULL
);
CREATE TABLE `provincial`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name_procince` VARCHAR(255) NOT NULL
);
CREATE TABLE `image_product`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_product` INT NOT NULL,
    `id_user` INT NOT NULL,
    `image` BLOB NOT NULL
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
    `total_money` INT NOT NULL
);
CREATE TABLE `feedback_travelPlace`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `note` VARCHAR(255) NOT NULL,
    `create_at` DATE NOT NULL,
    `update_at` DATE NOT NULL,
    `num_star` INT NOT NULL
);
CREATE TABLE `discount`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `discount_name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `id_user` INT NOT NULL,
    `code` VARCHAR(255) NOT NULL,
    `percent` DOUBLE(8, 2) NOT NULL,
    `date_start` DATE NOT NULL,
    `date_end` DATE NOT NULL,
    `status` INT NOT NULL
);

CREATE TABLE `order_method`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `order_method_name` VARCHAR(255) NOT NULL,
    `note` VARCHAR(255) NOT NULL,
    `status` INT NOT NULL
);
CREATE TABLE `product`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_category` INT NOT NULL,
    `id_user` INT NOT NULL,
    `id_provincial` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `price` INT NOT NULL,
    `content` VARCHAR(255) NOT NULL,
    `id_discount` INT NOT NULL,
    `id_image` INT NOT NULL,
    `create_at` DATE NOT NULL,
    `update_at` DATE NOT NULL,
    `status` INT NOT NULL,
    `num_bought` INT NOT NULL,
    `id_hotel` INT NOT NULL,
    `star_feedback` DOUBLE(8, 2) NOT NULL
);
CREATE TABLE `feedback_hotel`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_hotel` INT NOT NULL,
    `id_user` INT NOT NULL,
    `note` VARCHAR(255) NOT NULL,
    `create_at` DATE NOT NULL,
    `update_at` DATE NOT NULL,
    `num_star` INT NOT NULL
);
CREATE TABLE `orders`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT NOT NULL,
    `order_method_id` INT NOT NULL,
    `fullname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone_number` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `note` VARCHAR(255) NOT NULL,
    `date_order` DATE NOT NULL,
    `total_money` INT NOT NULL,
    `status` INT NOT NULL
);
CREATE TABLE `category`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name_category` VARCHAR(255) NOT NULL
);
CREATE TABLE `role`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `role_name` VARCHAR(255) NOT NULL
);
CREATE TABLE `love_product`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT NOT NULL,
    `id_product` INT NOT NULL
);
CREATE TABLE `hotel`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_user` INT NOT NULL,
    `hotel_name` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `phonenumber` VARCHAR(255) NOT NULL,
    `status` INT NOT NULL,
    `num_book` INT NOT NULL,
    `star_feedback` DOUBLE(8, 2) NOT NULL
);
-- ALTER TABLE
--     `order_detail` ADD CONSTRAINT `order_detail_id_product_foreign` FOREIGN KEY(`id_product`) REFERENCES `product`(`id`);
-- ALTER TABLE
--     `love_product` ADD CONSTRAINT `love_product_id_product_foreign` FOREIGN KEY(`id_product`) REFERENCES `product`(`id`);
-- ALTER TABLE
--     `cart` ADD CONSTRAINT `cart_id_product_foreign` FOREIGN KEY(`id_product`) REFERENCES `product`(`id`);
-- ALTER TABLE
--     `orders` ADD CONSTRAINT `orders_order_method_id_foreign` FOREIGN KEY(`order_method_id`) REFERENCES `order_method`(`id`);
-- ALTER TABLE
--     `order_detail` ADD CONSTRAINT `order_detail_id_order_foreign` FOREIGN KEY(`id_order`) REFERENCES `orders`(`id`);
-- ALTER TABLE
--     `orders` ADD CONSTRAINT `orders_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
-- ALTER TABLE
--     `product` ADD CONSTRAINT `product_id_provincial_foreign` FOREIGN KEY(`id_provincial`) REFERENCES `provincial`(`id`);
-- ALTER TABLE
--     `image_product` ADD CONSTRAINT `image_product_id_product_foreign` FOREIGN KEY(`id_product`) REFERENCES `product`(`id`);
-- ALTER TABLE
--     `image_product` ADD CONSTRAINT `image_product_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
-- ALTER TABLE
--     `cart` ADD CONSTRAINT `cart_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
-- ALTER TABLE
--     `feedback_travelPlace` ADD CONSTRAINT `feedback_travelplace_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);
-- ALTER TABLE
--     `feedback_hotel` ADD CONSTRAINT `feedback_hotel_id_hotel_foreign` FOREIGN KEY(`id_hotel`) REFERENCES `hotel`(`id`);
-- ALTER TABLE
--     `product` ADD CONSTRAINT `product_id_hotel_foreign` FOREIGN KEY(`id_hotel`) REFERENCES `hotel`(`id`);
-- ALTER TABLE
--     `product` ADD CONSTRAINT `product_id_discount_foreign` FOREIGN KEY(`id_discount`) REFERENCES `discount`(`id`);
-- ALTER TABLE
--     `product` ADD CONSTRAINT `product_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
-- ALTER TABLE
--     `product` ADD CONSTRAINT `product_id_category_foreign` FOREIGN KEY(`id_category`) REFERENCES `category`(`id`);
-- ALTER TABLE
--     `hotel` ADD CONSTRAINT `hotel_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
-- ALTER TABLE
--     `love_product` ADD CONSTRAINT `love_product_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
-- ALTER TABLE
--     `feedback_hotel` ADD CONSTRAINT `feedback_hotel_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `users`(`id`);
-- ALTER TABLE
--     `users` ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY(`id_role`) REFERENCES `role`(`id`);