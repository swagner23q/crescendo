--
-- Database: `crescendo`
--
CREATE DATABASE IF NOT EXISTS `crescendo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crescendo`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ship_type` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `gender`, `type_id`, `name`, `description`, `price`, `img`) VALUES
(1, 'Men', 1, 'Black Shirt', 'Best short sleeve button-up. Period.', 19.99, '/img/mensBlackShirt.jpg'),
(2, 'Men', 1, 'Blue Shirt', 'Best short sleeve button-up. Period.', 19.99, '/img/mensBlueShirt.jpg'),
(3, 'Men', 1, 'White Shirt', 'Best short sleeve button-up. Period.', 19.99, '/img/mensWhiteShirt.jpg'),
(4, 'Men', 1, 'Red Shirt', 'Best short sleeve button-up. Period.', 19.99, '/img/mensRedShirt.jpg'),
(5, 'Men', 2, 'Black Pants', 'These pants have the best fit, guarenteed.', 49.99, '/img/blackPants.jpg'),
(6, 'Men', 2, 'Beige Pants', 'These pants have the best fit, guarenteed.', 49.99, '/img/pantBeige.jpg'),
(7, 'Men', 2, 'White Pants', 'These pants have the best fit, guarenteed.', 49.99, '/img/pantOffWhite.jpg'),
(8, 'Men', 2, 'Red Pants', 'These pants have the best fit, guarenteed.', 49.99, '/img/mensredpants.jpg'),
(9, 'Men', 3, 'Black Dress Shoes', 'Stylin'' shoes, dude.', 59.99, '/img/mensBlackDressShoes.jpg'),
(10, 'Men', 3, 'Brown Boots', 'Stylin'' shoes, dude.', 69.99, '/img/mensBrownBoots.jpg'),
(11, 'Men', 3, 'Black Sneakers', 'Stylin'' shoes, dude.', 27.99, '/img/blackSneaker.jpg'),
(12, 'Men', 3, 'Blue Sneakers', 'Stylin'' shoes, dude.', 27.99, '/img/blueSneakers.jpg'),
(13, 'Men', 4, 'Bomber Jacket', 'This is basically the coolest jacket there is. Throw on your Aviators and take to the sky.', 59.99, '/img/mensBomber.jpg'),
(14, 'Men', 4, 'Jean Jacket', 'Everyone needs a stylin'' jean jacket!', 38.99, '/img/mensJeanJacket.jpg'),
(15, 'Men', 4, 'Rain Jacket', 'Keep dry, look good.', 83.99, '/img/mensRainJacket.jpg'),
(16, 'Men', 4, 'Insulated Down Jacket', 'Puffy jackets are the best. It''s like being gently hugged by the best sleeping bag in the world.', 99.99, '/img/mensDownJacket.jpg'),
(17, 'Men', 5, 'Black Beanie', 'Everyone loves a beanie. These are delightfully soft and durable.', 14.99, '/img/blackbeanie.jpg'),
(18, 'Men', 5, 'Grey Beanie', 'Everyone loves a beanie. These are delightfully soft and durable.', 14.99, '/img/greyBeanie.jpg'),
(19, 'Men', 5, 'Red Beanie', 'Everyone loves a beanie. These are delightfully soft and durable.', 14.99, '/img/redBeanie.jpg'),
(20, 'Men', 5, 'Logo Beanie', 'Everyone loves a beanie. These are delightfully soft and durable.', 14.99, '/img/logoBeanie.jpg'),
(21, 'Women', 1, 'Black Shirt', 'Soft and moisture wicking. A great choice for any adventure!', 19.99, '/img/womensBlackShirt.jpg'),
(22, 'Women', 1, 'Blue Shirt', 'Soft and moisture wicking. A great choice for any adventure!', 19.99, '/img/womensBlueShirt.jpg'),
(23, 'Women', 1, 'Grey Shirt', 'Soft and moisture wicking. A great choice for any adventure!', 19.99, '/img/womensGreyShirt.jpg'),
(24, 'Women', 1, 'Red Shirt', 'Soft and moisture wicking. A great choice for any adventure!', 19.99, '/img/womensRedShirt.jpg'),
(25, 'Women', 2, 'Black Pants', 'Techinical, outdoor pants for the adventurous ladies.', 49.99, '/img/womensBlackPants.jpg'),
(26, 'Women', 2, 'Blue Jeans', 'Great everyday wear! Everyone needs some denim in their life.', 49.99, '/img/womensJeans.jpg'),
(27, 'Women', 2, 'Yoga Pants', 'Comfy, stretchy yoga pants.', 49.99, '/img/womensYoga.jpg'),
(28, 'Women', 2, 'Beige Pants', 'They''re pants, they''re beige, they''re everything you''ve ever wanted.', 49.99, '/img/womensBeigePants.jpg'),
(29, 'Women', 3, 'Wedges', 'A striking wrapped wedge shoe.', 59.99, '/img/womensWedges.jpg'),
(30, 'Women', 3, 'Leather Boots', 'Every girl needs a pair of kick ass boots.', 69.99, '/img/womensBoots.jpg'),
(31, 'Women', 3, 'Black Sneakers', 'Sneaky sneakers!', 27.99, '/img/blackSneaker.jpg'),
(32, 'Women', 3, 'Blue Sneakers', 'Sneaky Sneakers!', 27.99, '/img/blueSneakers.jpg'),
(33, 'Women', 4, 'Fleece Jacket', 'Cozy, stylin'' sweater time!', 59.99, '/img/womensFleece.jpg'),
(34, 'Women', 4, 'Jean Jacket', 'Is it 2016? Is it 1994? Who cares! Buy this denim jacket.', 38.99, '/img/womensJeanJacket.jpg'),
(35, 'Women', 4, 'Rain Jacket', 'Keep the wind and rain out while looking good!', 83.99, '/img/womensRainJAcket.jpg'),
(36, 'Women', 4, 'Insulated Jacket', 'Puffy jackets are the best. It''s like being gently hugged by the best sleeping bag in the world.', 99.99, '/img/womensPuffyJacket.jpg'),
(37, 'Women', 5, 'Black Beanie', 'Everyone loves a beanie. These are delightfully soft and durable.', 14.99, '/img/blackbeanie.jpg'),
(38, 'Women', 5, 'Grey Beanie', 'Everyone loves a beanie. These are delightfully soft and durable.', 14.99, '/img/greyBeanie.jpg'),
(39, 'Women', 5, 'Red Beanie', 'Everyone loves a beanie. These are delightfully soft and durable.', 14.99, '/img/redBeanie.jpg'),
(40, 'Women', 5, 'Logo Beanie', 'Everyone loves a beanie. These are delightfully soft and durable.', 14.99, '/img/logoBeanie.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `type`) VALUES
(1, 'shirt'),
(2, 'pants'),
(3, 'shoes'),
(4, 'jacket'),
(5, 'beanies');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_types`
--

CREATE TABLE `shipping_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_types`
--

INSERT INTO `shipping_types` (`id`, `type`) VALUES
(1, 'Free Shipping'),
(2, 'Ground'),
(3, '2 Day'),
(4, 'Overnight');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ship_street` varchar(255) DEFAULT NULL,
  `ship_apt` varchar(255) DEFAULT NULL,
  `ship_city` varchar(255) DEFAULT NULL,
  `ship_state` varchar(255) DEFAULT NULL,
  `ship_postal` varchar(255) DEFAULT NULL,
  `bill_street` varchar(255) DEFAULT NULL,
  `bill_apt` varchar(255) DEFAULT NULL,
  `bill_city` varchar(255) DEFAULT NULL,
  `bill_state` varchar(255) DEFAULT NULL,
  `bill_postal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `shipping_types`
--
ALTER TABLE `shipping_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shipping_types`
--
ALTER TABLE `shipping_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
