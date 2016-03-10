CREATE DATABASE crescendo;

/*

                                            Users table

*/

CREATE TABLE `users` (
`id` SERIAL PRIMARY KEY,
`f_name` VARCHAR(255),
`l_name` VARCHAR(255),
`email` VARCHAR(255),
`phone` VARCHAR(255),
`password` VARCHAR(255),
`ship_street` VARCHAR(255),
`ship_apt` VARCHAR(255),
`ship_city` VARCHAR(255),
`ship_state` VARCHAR(255),
`ship_postal` VARCHAR(255),
`bill_street` VARCHAR(255),
`bill_apt` VARCHAR(255),
`bill_city` VARCHAR(255),
`bill_state` VARCHAR(255),
`bill_postal` VARCHAR(255)
);

INSERT INTO `users` (`f_name`, `l_name`, `email`, `phone`, `password`, `ship_street`, `ship_apt`, `ship_city`, `ship_state`, `ship_postal`, `bill_street`, `bill_apt`, `bill_city`, `bill_state`, `bill_postal`) VALUES ("Jason", "Awbrey", "jason.s.awbrey@gmail.com", "503-939-9407", "password", "123 Test Street", "APT 32", "Portland", "OR", "97212", "123 Test Streeet", "APT 32", "Portland", "OR", "97212")




/*

                                            Orders table

*/


CREATE TABLE `orders` (
  `id` SERIAL PRIMARY KEY,
  `user_id` INTEGER,
  `ship_type` INT,
  `date` DATE
);



/*

                                            Shipping Types table

*/
CREATE TABLE `shipping_types` (
    `id` SERIAL PRIMARY KEY,
    `type` VARCHAR(255)
);

INSERT INTO shipping_types (type) VALUES ("Free Shipping"), ("Ground"), ("2 Day"), ("Overnight");


/*

                                            Product Types table

*/

CREATE TABLE `product_types` (
  `id` SERIAL PRIMARY KEY,
  `type` VARCHAR(255)
);

INSERT INTO `product_types` (type) VALUES ("shirt"), ("pants"), ("shoes"), ("jacket"), ("beanies");



/*

                                            Products table

*/

DROP TABLE `products`;

CREATE TABLE `products` (
  `id` SERIAL PRIMARY KEY,
  `gender` VARCHAR(2),
  `type_id` INTEGER,
  `name` VARCHAR(255),
  `description` VARCHAR(255),
  `price` FLOAT,
  `img` VARCHAR(255)
);

INSERT INTO `products` (gender, type_id, name, description, price, img) VALUES
-- Mens
("M", 1, "Black Shirt", "This is a stylish shirt!", 19.99, "/img/blue_shirt.jpg"),
("M", 1, "Blue Shirt", "This is a stylish shirt!", 19.99, "/img/blue_shirt.jpg"),
("M", 1, "White Shirt", "This is a stylish shirt!", 19.99, "/img/blue_shirt.jpg"),
("M", 1, "Red Shirt", "This is a stylish shirt!", 19.99, "/img/blue_shirt.jpg"),

("M", 2, "Black Pants", "This is a stylish shirt!", 49.99, "/img/blue_shirt.jpg"),
("M", 2, "Blue Jeans", "This is a stylish shirt!", 49.99, "/img/blue_shirt.jpg"),
("M", 2, "White Pants", "This is a stylish shirt!", 49.99, "/img/blue_shirt.jpg"),
("M", 2, "Red Pants", "This is a stylish shirt!", 49.99, "/img/blue_shirt.jpg"),

("M", 3, "Black Dress Shoes", "This is a stylish shirt!", 59.99, "/img/blue_shirt.jpg"),
("M", 3, "Brown Boots", "This is a stylish shirt!", 69.99, "/img/blue_shirt.jpg"),
("M", 3, "Black Sneakers", "This is a stylish shirt!", 27.99, "/img/blue_shirt.jpg"),
("M", 3, "Blue Sneakers", "This is a stylish shirt!", 27.99, "/img/blue_shirt.jpg"),

("M", 4, "Bomber Jacket", "This is a stylish shirt!", 59.99, "/img/blue_shirt.jpg"),
("M", 4, "Jean Jacket", "This is a stylish shirt!", 38.99, "/img/blue_shirt.jpg"),
("M", 4, "Rain Jacket", "This is a stylish shirt!", 83.99, "/img/blue_shirt.jpg"),
("M", 4, "Insulated Down Jacket", "This is a stylish shirt!", 99.99, "/img/blue_shirt.jpg"),

("M", 5, "Black Beanie", "This is a stylish shirt!", 14.99, "/img/blue_shirt.jpg"),
("M", 5, "Grey Beanie", "This is a stylish shirt!", 14.99, "/img/blue_shirt.jpg"),
("M", 5, "Red Beanie", "This is a stylish shirt!", 14.99, "/img/blue_shirt.jpg"),
("M", 5, "Logo Beanie", "This is a stylish shirt!", 14.99, "/img/blue_shirt.jpg"),

-- Womens
("F", 1, "Black Shirt", "This is a stylish shirt!", 19.99, "/img/blue_shirt.jpg"),
("F", 1, "Blue Shirt", "This is a stylish shirt!", 19.99, "/img/blue_shirt.jpg"),
("F", 1, "White Shirt", "This is a stylish shirt!", 19.99, "/img/blue_shirt.jpg"),
("F", 1, "Red Shirt", "This is a stylish shirt!", 19.99, "/img/blue_shirt.jpg"),

("F", 2, "Black Pants", "This is a stylish shirt!", 49.99, "/img/blue_shirt.jpg"),
("F", 2, "Blue Jeans", "This is a stylish shirt!", 49.99, "/img/blue_shirt.jpg"),
("F", 2, "White Pants", "This is a stylish shirt!", 49.99, "/img/blue_shirt.jpg"),
("F", 2, "Red Pants", "This is a stylish shirt!", 49.99, "/img/blue_shirt.jpg"),

("F", 3, "Black Dress Shoes", "This is a stylish shirt!", 59.99, "/img/blue_shirt.jpg"),
("F", 3, "Brown Boots", "This is a stylish shirt!", 69.99, "/img/blue_shirt.jpg"),
("F", 3, "Black Sneakers", "This is a stylish shirt!", 27.99, "/img/blue_shirt.jpg"),
("F", 3, "Blue Sneakers", "This is a stylish shirt!", 27.99, "/img/blue_shirt.jpg"),

("F", 4, "Bomber Jacket", "This is a stylish shirt!", 59.99, "/img/blue_shirt.jpg"),
("F", 4, "Jean Jacket", "This is a stylish shirt!", 38.99, "/img/blue_shirt.jpg"),
("F", 4, "Rain Jacket", "This is a stylish shirt!", 83.99, "/img/blue_shirt.jpg"),
("F", 4, "Insulated Down Jacket", "This is a stylish shirt!", 99.99, "/img/blue_shirt.jpg"),

("F", 5, "Black Beanie", "This is a stylish shirt!", 14.99, "/img/blue_shirt.jpg"),
("F", 5, "Grey Beanie", "This is a stylish shirt!", 14.99, "/img/blue_shirt.jpg"),
("F", 5, "Red Beanie", "This is a stylish shirt!", 14.99, "/img/blue_shirt.jpg"),
("F", 5, "Logo Beanie", "This is a stylish shirt!", 14.99, "/img/blue_shirt.jpg");

/*

                                            Order Details table

*/

CREATE TABLE `order_details` (
  `id` SERIAL PRIMARY KEY,
  `order_id` INTEGER,
  `product_id` INTEGER,
  `qty` INTEGER
);
