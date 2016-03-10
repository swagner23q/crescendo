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

CREATE TABLE `products` (
  `id` SERIAL PRIMARY KEY,
  `gender` VARCHAR(10),
  `type_id` INTEGER,
  `name` VARCHAR(255),
  `description` VARCHAR(255),
  `price` FLOAT,
  `img` VARCHAR(255)
);

INSERT INTO `products` (gender, type_id, name, description, price, img) VALUES

("Men", 1, "Black Shirt", "Best short sleeve button-up. Period.", 19.99, "/img/mensBlackShirt.jpg"),
("Men", 1, "Blue Shirt", "Best short sleeve button-up. Period.", 19.99, "/img/mensBlueShirt.jpg"),
("Men", 1, "White Shirt", "Best short sleeve button-up. Period.", 19.99, "/img/mensWhiteShirt.jpg"),
("Men", 1, "Red Shirt", "Best short sleeve button-up. Period.", 19.99, "/img/mensRedShirt.jpg"),

("Men", 2, "Black Pants", "These pants have the best fit, guarenteed.", 49.99, "/img/blackPants.jpg"),
("Men", 2, "Beige Pants", "These pants have the best fit, guarenteed.", 49.99, "/img/pantBeige.jpg"),
("Men", 2, "White Pants", "These pants have the best fit, guarenteed.", 49.99, "/img/pantOffWhite.jpg"),
("Men", 2, "Red Pants", "These pants have the best fit, guarenteed.", 49.99, "/img/mensredpants.jpg"),

("Men", 3, "Black Dress Shoes", "Stylin' shoes, dude.", 59.99, "/img/mensBlackDressShoes.jpg"),
("Men", 3, "Brown Boots", "Stylin' shoes, dude.", 69.99, "/img/mensBrownBoots.jpg"),
("Men", 3, "Black Sneakers", "Stylin' shoes, dude.", 27.99, "/img/blackSneaker.jpg"),
("Men", 3, "Blue Sneakers", "Stylin' shoes, dude.", 27.99, "/img/blueSneakers.jpg"),

("Men", 4, "Bomber Jacket", "This is basically the coolest jacket there is. Throw on your Aviators and take to the sky.", 59.99, "/img/mensBomber.jpg"),
("Men", 4, "Jean Jacket", "Everyone needs a stylin' jean jacket!", 38.99, "/img/mensJeanJacket.jpg"),
("Men", 4, "Rain Jacket", "Keep dry, look good.", 83.99, "/img/mensRainJacket.jpg"),
("Men", 4, "Insulated Down Jacket", "Puffy jackets are the best. It's like being gently hugged by the best sleeping bag in the world.", 99.99, "/img/menDownJAcket.jpg"),

("Men", 5, "Black Beanie", "Everyone loves a beanie. These are delightfully soft and durable.", 14.99, "/img/blackbeanie.jpg"),
("Men", 5, "Grey Beanie", "Everyone loves a beanie. These are delightfully soft and durable.", 14.99, "/img/greyBeanie.jpg"),
("Men", 5, "Red Beanie", "Everyone loves a beanie. These are delightfully soft and durable.", 14.99, "/img/redBeanie.jpg"),
("Men", 5, "Logo Beanie", "Everyone loves a beanie. These are delightfully soft and durable.", 14.99, "/img/logoBeanie.jpg"),


("Women", 1, "Black Shirt", "Soft and moisture wicking. A great choice for any adventure!", 19.99, "/img/womensBlackShirt.jpg"),
("Women", 1, "Blue Shirt", "Soft and moisture wicking. A great choice for any adventure!", 19.99, "/img/womensBlueShirt.jpg"),
("Women", 1, "Grey Shirt", "Soft and moisture wicking. A great choice for any adventure!", 19.99, "/img/womensGreyShirt.jpg"),
("Women", 1, "Red Shirt", "Soft and moisture wicking. A great choice for any adventure!", 19.99, "/img/womensRedShirt.jpg"),

("Women", 2, "Black Pants", "Techinical, outdoor pants for the adventurous ladies.", 49.99, "/img/womensBlackPants.jpg"),
("Women", 2, "Blue Jeans", "Great everyday wear! Everyone needs some denim in their life.", 49.99, "/img/womensJeans.jpg"),
("Women", 2, "Yoga Pants", "Comfy, stretchy yoga pants.", 49.99, "/img/womensYoga.jpg"),
("Women", 2, "Beige Pants", "They're pants, they're beige, they're everything you've ever wanted.", 49.99, "/img/womensBeigePants.jpg"),

("Women", 3, "Wedges", "A striking wrapped wedge shoe.", 59.99, "/img/womensWedges.jpg"),
("Women", 3, "Leather Boots", "Every girl needs a pair of kick ass boots.", 69.99, "/img/womensBoots.jpg"),
("Women", 3, "Black Sneakers", "Sneaky sneakers!", 27.99, "/img/blackSneaker.jpg"),
("Women", 3, "Blue Sneakers", "Sneaky Sneakers!", 27.99, "/img/blueSneakers.jpg"),

("Women", 4, "Fleece Jacket", "Cozy, stylin' sweater time!", 59.99, "/img/womensFleece.jpg"),
("Women", 4, "Jean Jacket", "Is it 2016? Is it 1994? Who cares! Buy this denim jacket.", 38.99, "/img/womensJeanJacket.jpg"),
("Women", 4, "Rain Jacket", "Keep the wind and rain out while looking good!", 83.99, "/img/womensRainJAcket.jpg"),
("Women", 4, "Insulated Jacket", "Puffy jackets are the best. It's like being gently hugged by the best sleeping bag in the world.", 99.99, "/img/womensPuffyJacket.jpg"),

("Women", 5, "Black Beanie", "Everyone loves a beanie. These are delightfully soft and durable.", 14.99, "/img/blackbeanie.jpg"),
("Women", 5, "Grey Beanie", "Everyone loves a beanie. These are delightfully soft and durable.", 14.99, "/img/greyBeanie.jpg"),
("Women", 5, "Red Beanie", "Everyone loves a beanie. These are delightfully soft and durable.", 14.99, "/img/redBeanie.jpg"),
("Women", 5, "Logo Beanie", "Everyone loves a beanie. These are delightfully soft and durable.", 14.99, "/img/logoBeanie.jpg");



/*

                                            Order Details table

*/

CREATE TABLE `order_details` (
  `id` SERIAL PRIMARY KEY,
  `order_id` INTEGER,
  `product_id` INTEGER,
  `qty` INTEGER
);
