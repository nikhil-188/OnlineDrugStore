SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `med`

-- Table structure for table `medicines`

CREATE TABLE `medicines` (
  `med_serial` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `med_name` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `med_manufacturer` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `med_image` varchar(40) COLLATE latin1_general_ci DEFAULT NULL,
  `med_descr` longtext COLLATE latin1_general_ci DEFAULT NULL,
  `med_price` decimal(6,2) NOT NULL,
  `used_for_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) DEFAULT NULL
);


-- Table structure for table `cart`

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
);


-- data for table `cart`

INSERT INTO `cart` (`id`, `customerid`, `date`) VALUES
(23, 7, '2019-07-05 15:21:55');


-- Table structure for table `cartitems`

CREATE TABLE `cartitems` (
  `id` int(10) NOT NULL,
  `cartid` int(10) UNSIGNED NOT NULL,
  `productid` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
);


-- data for table `cartitems`


-- Table structure for table `type`


CREATE TABLE `type` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(60) COLLATE latin1_general_ci NOT NULL
);

-- data for table `type`



-- Table structure for table `customers`

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zipcode` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--  data for table `customers`


INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `password`, `address`, `city`, `zipcode`) VALUES
(1, 'nikhil', 'parasu', 'nikhil.parasu517@gmail.com', 'nikhil', 'Nellore', 'Nellore', '524004');



--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(40) COLLATE latin1_general_ci NOT NULL
);


--  data for table `expert`
INSERT INTO `expert` (`name`, `pass`) VALUES
('expert', 'expert');


-- Table structure for table `manager`


CREATE TABLE `manager` (
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(40) COLLATE latin1_general_ci NOT NULL
);


--  data for table `manager`

INSERT INTO `manager` (`name`, `pass`) VALUES
('manager', 'manager');



-- Table structure for table `used_for`

CREATE TABLE `used_for` (
  `used_for_id` int(10) UNSIGNED NOT NULL,
  `used_for_name` varchar(60) COLLATE latin1_general_ci NOT NULL
);


--  data for table `used_for`


ALTER TABLE `medicines`
  ADD PRIMARY KEY (`med_serial`);


ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);


ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `used_for`
  ADD PRIMARY KEY (`used_for_id`);


ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;


ALTER TABLE `cartitems`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;


ALTER TABLE `type`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `used_for`
  MODIFY `used_for_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;


