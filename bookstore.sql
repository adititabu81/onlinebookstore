-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 03:55 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` varchar(100) NOT NULL,
  `book_name` varchar(250) DEFAULT NULL,
  `inventory_amount` int(11) DEFAULT NULL,
  `book_price` float DEFAULT NULL,
  `book_category` varchar(200) DEFAULT NULL,
  `book_genre` varchar(200) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `publication` varchar(50) DEFAULT NULL,
  `book_language` varchar(50) DEFAULT NULL,
  `book_cover_photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `inventory_amount`, `book_price`, `book_category`, `book_genre`, `author`, `publication`, `book_language`, `book_cover_photo`) VALUES
('0061124958', 'Charlotte''s Web', 60, 6.29, 'paper Hardcover AudioCD', 'Children Classics', 'E. B White', 'HarperCollins', 'English', '61+3z1o4oUL._AC_SR201,266_.jpg'),
('0061565318', 'Bel Canto (P.S.)', 99, 11.95, 'paper Hardcover AudioCD', 'Literature  Fiction  Dramas  Plays  Regional Cultural', 'Ann Patchett', 'Harper Perennial Modern Classics', 'English', '51LOpWsGN5L._AC_SR201,266_.jpg'),
('0307389731', 'Love in the Time of Cholera (Oprah''s Book Club)', 50, 10.87, 'paper Hardcover AudioCD Kindle', ' Literature Fiction  Caribbean Latin American', 'Gabriel Garcia Marquez', 'Vintage', 'English', '91jkLH6yk0L._AC_SR201,266_.jpg'),
('0374531269', 'A Long Way Gone: Memoirs of a Boy Soldier', 90, 7.69, 'paper', 'History & Biographies & Memoirs & Politics & Social Sciences', 'Ishmael Beah', 'Sarah Crichton Books', 'English', '81tws0iLBFL._AC_SR201,266_.jpg'),
('037570504X', 'Breath, Eyes, Memory (Oprah''s Book Club)', 20, 0.65, 'paper', 'Travel Literature Fiction United States', 'Edwidge Danticat', 'Vintage', 'English', '41yQjfWGKPL._AC_SR201,266_.jpg'),
('0553380168', 'A Brief History of Time', 10, 10.69, 'paper', 'Science & Math &  Physics  Astronomy & Space Science', 'Stephen Hawking', 'Bantam', 'English', 'time.jpg'),
('1491962291', 'Hands-On Machine Learning with Scikit-Learn', 3, 24.9, 'audio', 'action', 'aditi', 'isi', 'english', 'book1.jpg'),
('1787125939 ', 'Python Machine Learning: Machine Learning and Deep Learning with Python, scikit-learn, and TensorFlow, 2nd Edition', 5, 35.99, 'paper', 'Computers & Technology', 'Sebastian Raschka', 'Packt Publishing', 'English', 'book2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books_transactions`
--

CREATE TABLE IF NOT EXISTS `books_transactions` (
  `amount` int(11) DEFAULT NULL,
  `order_id` varchar(50) NOT NULL,
  `book_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_name` varchar(45) DEFAULT NULL,
  `customer_password` varchar(100) DEFAULT NULL,
  `account_creation_date` datetime DEFAULT NULL,
  `customer_address` varchar(250) DEFAULT NULL,
  `customer_kind` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_email`, `customer_name`, `customer_password`, `account_creation_date`, `customer_address`, `customer_kind`) VALUES
(2, 'jic118@pitt.edu', NULL, '7477a112f44617c5ffc77584cd1aeff2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_business`
--

CREATE TABLE IF NOT EXISTS `customer_business` (
  `business_id` int(11) NOT NULL,
  `business_category` varchar(50) DEFAULT NULL,
  `gross_annual_income` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_home`
--

CREATE TABLE IF NOT EXISTS `customer_home` (
  `home_id` int(11) NOT NULL,
  `marriage_status` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `income` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` int(11) NOT NULL,
  `manager_name` varchar(50) DEFAULT NULL,
  `manager_password` varchar(50) DEFAULT NULL,
  `manager_address` varchar(200) DEFAULT NULL,
  `manager_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(50) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--

CREATE TABLE IF NOT EXISTS `salesperson` (
  `salesperson_id` int(11) NOT NULL,
  `salesperson_password` varchar(50) DEFAULT NULL,
  `salesperson_name` varchar(50) DEFAULT NULL,
  `salesperson_address` varchar(200) DEFAULT NULL,
  `salesperson_email` varchar(200) DEFAULT NULL,
  `salesperson_job_title` varchar(50) DEFAULT NULL,
  `salesperson_salary` float DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `store_id` int(11) NOT NULL,
  `store_address` varchar(200) DEFAULT NULL,
  `number_of_salesperson` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `order_id` varchar(50) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `salesperson_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `books_transactions`
--
ALTER TABLE `books_transactions`
  ADD PRIMARY KEY (`order_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_business`
--
ALTER TABLE `customer_business`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `customer_home`
--
ALTER TABLE `customer_home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`salesperson_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `salesperson_id` (`salesperson_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_business`
--
ALTER TABLE `customer_business`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_home`
--
ALTER TABLE `customer_home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salesperson`
--
ALTER TABLE `salesperson`
  MODIFY `salesperson_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_transactions`
--
ALTER TABLE `books_transactions`
  ADD CONSTRAINT `books_transactions_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `transactions` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_transactions_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD CONSTRAINT `salesperson_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`salesperson_id`) REFERENCES `salesperson` (`salesperson_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
