    CREATE DATABASE `ban_hang   ` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
    use ban_hang
    CREATE TABLE IF NOT EXISTS `category`(
        `id` INT PRIMARY KEY AUTO_INCREMENT,
        `name` VARCHAR(100) NOT NULL UNIQUE,
        `status` tinyint(1) DEFAULT '1',
        `created_at` timestamp DEFAULT current_timestamp(),
        `updated_at` date NULL
    ) ENGINE = InnoDB;