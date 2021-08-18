-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2021 at 05:06 PM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdfrav_beeratings`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `published` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `body`, `created_at`, `user_id`, `image`, `published`) VALUES
(10, 'History of the IPA', 'One of Craft beer\'s most famous style, where did it come from and why do we love its citrusy, hoppy goodness so much...', '2021-05-21 01:39:40', 1, '1621783994_1621643882_ipa.jpg', 1),
(11, 'Beginners Guide to Craft beer', 'Have you ever wanted to try craft beer and didnt know where to begin. Here is a quick guide to some styles to get you started....', '2021-05-21 02:14:26', 0, '1621784006_1621559685_craftbeer.jpg', 1),
(12, 'Our favourite beers of 2020', 'We have compiled our list of Beeratings favourite beers from 2020...', '2021-05-21 02:15:16', 0, '1621784019_Beeratingsslogangrey.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `address`, `products`, `amount_paid`, `user_id`) VALUES
(26, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Magic Rock - Cannonball IPAx1', '5.4', 0),
(27, 'liam', 'liampiddcapelleras@gmail.com', 'Pilrig Heights\r\n6/3', 'Vocation - Life & Death x1, <br>Mangoes on the Run x1', '7.09', 20),
(32, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'BrewDog Punk IPAx1', '4', 21),
(33, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'BrewDog Punk IPAx3, <br>Vocation - Life & Death x1', '9.1', 21),
(38, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Magic Rock - Cannonball IPAx1, <br>Vocation - Life & Death x1, <br>Mangoes on the Run x1', '9.99', 0),
(39, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Magic Rock - Cannonball IPAx1, <br>Vocation - Life & Death x1, <br>Mangoes on the Run x1', '9.99', 21),
(41, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Magic Rock - Cannonball IPAx1', '5.4', 0),
(42, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Magic Rock - Cannonball IPAx1, <br>Vocation - Life & Death x1', '7.5', 0),
(43, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Vocation - Life & Death x1', '4.6', 0),
(44, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Magic Rock - Cannonball IPAx1', '5.4', 0),
(45, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Vocation - Life & Death x1', '4.6', 0),
(46, 'steven', 'steven@email.com', 'stevens streeet', 'Vocation - Life & Death x3', '8.8', 0),
(48, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Mangoes on the Run x1', '4.99', 0),
(49, 'kirsty kirst', 'kirsty@gmail.com', '5 Ladle Drive', 'Mangoes on the Run x1, <br>Vocation - Life & Death x1', '7.09', 0),
(51, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Vocation - Life & Death x1', '4.6', 21),
(52, 'kirsty kirst', 'no@why.com', '', 'Vocation - Life & Death x1', '4.6', 38),
(53, 'Thomas Moore', 'thomasmoore1597@gmail.com', '1 Springfield Lea', 'Vocation - Life & Death x1', '2.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(250) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` varchar(250) NOT NULL,
  `abv` varchar(10) NOT NULL,
  `style` varchar(100) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `stock` int(200) NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_price`, `abv`, `style`, `product_description`, `stock`, `product_image`) VALUES
(1, 'BR1', 'BrewDog Punk IPA', '1.50', '5.6', 'Indian Pale Ale', 'Punk is the beer that kick-started it. This light, golden classic has been subverted with new world hops to create an explosion of flavor. Bursts of caramel and tropical fruit with an all-out riot of grapefruit, pineapple and lychee, precede a spiky bitter finish.', 500, '1621783821_punkIPA.png'),
(2, 'BR2', 'Magic Rock - Cannonball IPA', '2.90', '7.4', 'India Pale Ale', 'Cannonball is an India Pale Ale in the true tradition, high in alcohol and massively hopped to survive a long sea voyage. Weï¿½d donï¿½t want you to wait though, crack the cap and let the flavour explode on your palate. Tropically fruity, resinous hops compete against a sweet malty backbone, while a raspingbitterness builds to a mouth puckering crescendo.', 500, '1621783851_cannonballipa.png'),
(3, 'BR3', 'Vocation - Life & Death ', '2.10', '6.5', 'India Pale Ale', 'Three kilos of hops and forty kilos of barley selflessly give their lives to brew every barrel of this beer. Itï¿½s a lot to ask, but their reincarnation as this life-affirming IPA makes their sacrifice worthwhile.', 500, '1621783884_lifeanddeathbeer.png'),
(4, 'BR4', 'Salty Kiss', '2.40', '4.1', 'Goseberry Gose', 'Originally a collaboration brew with Kissmeyer Beer. A traditional German style Gose, flavoured with Fruit, Sea Buckthorn and Sea Salt. Tart, lightly sour, fruity and refreshing with a defined saltiness,..', 200, '1621783900_saltykiss.png'),
(13, 'BR5', 'Beeratings IPA', '2.10', '5.2', 'IPA', 'We have created our own range of fantastic beers. Here is one of our favourites the IPA. Triple hopped and delicious', 100, '1621783916_beeratingsIPA.png'),
(14, 'BR6', 'Beeratings Milk Stout', '1.80', '4.2', 'Milk Stout', 'One of the Beeratings own Brews. We give the fantasticly smooth Milk stout', 100, '1621783931_milkstout.png'),
(15, 'BR7', 'Beeratings Raspberry Gose', '3.10', '6.0', 'Sour Gose', 'Another contender in the Beeratings range. The sour raspberry gose. ', 100, '1621784517_beeratingsgose.png'),
(16, 'BR8', 'Beeratings Belgian Lager', '2.10', '6.0', 'Lager', 'A classic lager from our core range of Beeratings brews', 100, '1621784531_belgianlager.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `body`, `rating`, `image`) VALUES
(1, 'Brewdog Punk IPA', 'A company with not a very long history, but certainly an interesting one. It all started when....', 5, '1621783979_punkIPA.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(19, 1, 'tam', 'tam@email.com', '$2y$10$sp/zt5fKuwkp0sF55DDikObUCwKMVGrrhuPzXm1OuVFBQmC5v9wZu', '2021-05-21 01:08:26'),
(20, 0, 'liam', 'liampiddcapelleras@gmail.com', '$2y$10$ZYyO4hh3fEMBiCrXdtZk5OxhWeqpPUJ4H/ZALF0JFzmgbUWBAQVlC', '2021-05-21 21:12:06'),
(21, 0, 'tim', 'tim@email.com', '$2y$10$KtCfKk7FdL1pxCT.Gmab3eMOQDsyN7BFZPBWTjIK.oUfYmBVva9Ra', '2021-05-22 12:54:52'),
(23, 0, 'Kirsty W', 'kirstymwatson1@gmail.com', '$2y$10$0DG3WzhZVqUopAFZZ9kife8cmz5W2rrc58dX2cU6HEBFukacfcA.y', '2021-05-22 16:36:45'),
(25, 1, 'stephen', 'stephen@email.com', '$2y$10$WuTfim8PCr40wPbx36Hi0Oiewb8V/z6zDTpq9/vvVhHaZBe9LdfFe', '2021-05-22 18:58:06'),
(27, 0, 'Euan', 'euanmax@gmail.com', '$2y$10$/85389zQOG/c3RV0fPE9bOu8jNt1DimODcru1R0w1l23fwkPM7R4a', '2021-05-22 22:32:47'),
(35, 0, 'ben', 'ben@email.com', '$2y$10$YOkFTqv1d4ZHktKameNXxOdSeR0W.L2quVJihWqwVvGJQe4kNwZ/e', '2021-05-23 01:17:49'),
(36, 0, 'sammy', 'sam@email.com', '$2y$10$Y09pcukK8i1vJL3PoNh40ezOgJPcQthYIlRNmQNtSKxYOqqoYMTx2', '2021-05-23 01:20:27'),
(37, 0, 'kevin', 'kevin@gmail', '$2y$10$xD6XZ7h5VkaVx7o058hGweOdtQgn/A9KJCXv3yljnEJ8S7TNI0tPK', '2021-05-23 01:22:44'),
(38, 0, 'the_joe_schmoe', 'mojoeschmoe03@gmail.com', '$2y$10$DS7fTOAdZWhHk72K1QqPbu4HhpixEvyxwWGtU2l3U5kvaGEYFpWMi', '2021-05-23 12:44:53'),
(39, 1, 'admin', 'admin@beeratings.co.uk', '$2y$10$XE1zYQwTr3y9ZTQ58CJsm.W14lrQNSvVb5dsXKq7QNjjzSRAJGRe6', '2021-05-23 19:32:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
