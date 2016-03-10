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


INSERT INTO `products` (gender, type_id, name, description, price, img) VALUES ("M", 1, "Blue Shirt", "This is a stylish shirt!", 1.99, "/img/blue_shirt.jpg"), ("F", 2, "Blue Jeans", "These jeans are awesome!", 2.99, "/img/blue_pants.jpg"), ("M", 4, "Black Shoes", "These are some neat kicks!", 3.99, "/img/black_shoes.jpg"), ("F", 3, "Red Jacket", "This jacket is totes warm", 4.99, "/img/red_jacket.jpg"), ("M", 6, "Black Beanie", "Best. Beanie. Ever.", 5.99, "/img/black_beanie.jpg");



/*

                                            Order Details table

*/

CREATE TABLE `order_details` (
  `id` SERIAL PRIMARY KEY,
  `order_id` INTEGER,
  `product_id` INTEGER,
  `qty` INTEGER
);
