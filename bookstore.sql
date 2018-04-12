-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 12:57 AM
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
-- Table structure for table `address_payment`
--

CREATE TABLE IF NOT EXISTS `address_payment` (
  `address_id` int(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(250) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int(10) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `card_number` int(11) NOT NULL,
  `expiration` varchar(20) NOT NULL,
  `cvv` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address_payment`
--

INSERT INTO `address_payment` (`address_id`, `first_name`, `last_name`, `email`, `address`, `country`, `state`, `zip`, `card_type`, `name_on_card`, `card_number`, `expiration`, `cvv`) VALUES
(12, 'Jing', 'Chen', 'jingchen9412@gmail.com', '5700 BUNKERHILL ST  APT 2104                                ', 'United States', 'PA', 15206, 'credit', 'CHEN JING', 123456, '04/28', 123);

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
  `book_cover_photo` varchar(200) DEFAULT NULL,
  `book_description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `inventory_amount`, `book_price`, `book_category`, `book_genre`, `author`, `publication`, `book_language`, `book_cover_photo`, `book_description`) VALUES
('0061124958', 'Charlotte''s Web', 60, 6.29, 'paper Hardcover AudioCD', 'Children Classics', 'E. B White', 'HarperCollins', 'English', '61+3z1o4oUL._AC_SR201,266_.jpg', 'The classic story of loyalty, trust, and sacrifice comes to life in this live-action adaptation. Fern is one of the only two living beings who sees that Wilbur is a special animal as she raises him, the runt of the litter, into a terrific and radiant pig. As Wilbur moves into a new barn, he begins a second profound friendship with the most unlikely of creatures -- a spider named Charlotte -- and their bond inspires the animals around them to come together as a family. When the word gets out that Wilburs days are numbered,it seems that only a miracle will save his life. A determined Charlotte -- who sees miracles in the ordinary - spins words into her web in an effort to convince the farmer that Wilbur is "some pig" and worth saving'),
('0061565318', 'Bel Canto (P.S.)', 99, 11.95, 'paper Hardcover AudioCD', 'Literature  Fiction  Dramas  Plays  Regional Cultural', 'Ann Patchett', 'Harper Perennial Modern Classics', 'English', '51LOpWsGN5L._AC_SR201,266_.jpg', 'Bel Canto is the fourth novel by American author Ann Patchett, published in 2001 by Perennial, \r\nan imprint of HarperCollins Publishers. It was awarded both the Orange Prize for Fiction and PEN/Faulkner Award for Fiction.'),
('0307389731', 'Love in the Time of Cholera (Oprah''s Book Club)', 50, 10.87, 'paper Hardcover AudioCD Kindle', ' Literature Fiction  Caribbean Latin American', 'Gabriel Garcia Marquez', 'Vintage', 'English', '91jkLH6yk0L._AC_SR201,266_.jpg', 'Love in the Time of Cholera is a novel by Colombian Nobel prize winning author Gabriel García Márquez. \r\nThe novel was first published in Spanish in 1985. Alfred A. Knopf published an English translation in 1988, \r\nand an English-language movie adaptation was released in 2007.'),
('0374531269', 'A Long Way Gone: Memoirs of a Boy Soldier', 90, 7.69, 'paper', 'History & Biographies & Memoirs & Politics & Social Sciences', 'Ishmael Beah', 'Sarah Crichton Books', 'English', '81tws0iLBFL._AC_SR201,266_.jpg', 'A Long Way Gone: Memoirs of a Boy Soldier is a memoir written by Ishmael Beah, an author from Sierra Leone. \r\nThe book is a firsthand account of Beah time as a child soldier during the civil war in Sierra Leone. \r\nBeah ran away from his village at the age of 12 after it was attacked by rebels, \r\nand he became forever separated from his immediate family. He wandered the \r\nwar-filled country and was forced to join an army unit who brainwashed him into using guns and drugs. \r\nBy 13, he had perpetuated and witnessed a great deal of violence. At the age of 16, however, \r\nUNICEF removed him from the unit and put him into a rehabilitation program. \r\nThere he was able to find his uncle that would adopt him. With the help of some of the staff he was able to\r\n return to a civilian life and get off drugs. He was then given an opportunity to teach others about child soldiers.\r\n He traveled the United States recounting his story.'),
('037570504X', 'Breath, Eyes, Memory (Oprah''s Book Club)', 20, 0.65, 'paper', 'Travel Literature Fiction United States', 'Edwidge Danticat', 'Vintage', 'English', '41yQjfWGKPL._AC_SR201,266_.jpg', 'Breath, Eyes, Memory is Edwidge Danticats acclaimed 1994 novel, and was chosen as an Oprah Book Club \r\nSelection in May 1998. The novel deals with questions of racial, linguistic and gender identity in interconnected ways'),
('0553380168', 'A Brief History of Time', 10, 10.69, 'paper', 'Science & Math &  Physics  Astronomy & Space Science', 'Stephen Hawking', 'Bantam', 'English', 'time.jpg', 'A Brief History of Time: From the Big Bang to Black Holes is a popular-science book on cosmology by British physicist Stephen Hawking. It was first published in 1988. Hawking wrote\r\n the book for nonspecialist readers with no prior knowledge of scientific theories.'),
('1491962291', 'Hands-On Machine Learning with Scikit-Learn', 3, 24.9, 'audio', 'action', 'aditi', 'isi', 'english', 'book1.jpg', 'Learn how to use Machine Learning in your projects using actual production-ready python frameworks, namely Python Scikit-Learn, TensorFlow and PyBrain.This book favors a practical approach using real-life production-ready tools,\r\n and it builds up instincts quickly using concrete examples and minimal theory.'),
('1787125939 ', 'Python Machine Learning: Machine Learning and Deep Learning with Python, scikit-learn, and TensorFlow, 2nd Edition', 5, 35.99, 'paper', 'Computers & Technology', 'Sebastian Raschka', 'Packt Publishing', 'English', 'book2.jpg', 'Learn how to use Machine Learning in your projects using actual \r\nproduction-ready python frameworks, namely Python Scikit-Learn, TensorFlow and PyBrain.This book favors a practical approach using real-life production-ready\r\n tools, and it builds up instincts quickly using concrete examples and minimal theory.');

-- --------------------------------------------------------

--
-- Table structure for table `books_transactions`
--

CREATE TABLE IF NOT EXISTS `books_transactions` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `book_id` varchar(100) NOT NULL,
  `quantity` int(32) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_transactions`
--

INSERT INTO `books_transactions` (`id`, `order_id`, `book_id`, `quantity`, `category`) VALUES
(9, '7f19c195a59f7ff17ffc615f1db87a76', '0061124958', 1, 'Hardcover'),
(10, '7f19c195a59f7ff17ffc615f1db87a76', '0374531269', 1, ''),
(11, 'eca91fbab2ad0209e4427bf083570c3f', '0061124958', 1, 'paper'),
(12, 'eca91fbab2ad0209e4427bf083570c3f', '0553380168', 1, 'paper'),
(13, 'eca91fbab2ad0209e4427bf083570c3f', '0307389731', 45, 'paper');

-- --------------------------------------------------------

--
-- Table structure for table `book_review`
--

CREATE TABLE IF NOT EXISTS `book_review` (
  `book_id` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `review` varchar(250) DEFAULT NULL,
  `star_rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_review`
--

INSERT INTO `book_review` (`book_id`, `customer_id`, `review`, `star_rating`) VALUES
('0307389731', 2, 'Good Read For Begineers', 3),
('1787125939', 2, 'Excellent!Good Indepth details in the book.', 5);

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
  `customer_address` int(32) DEFAULT NULL,
  `customer_kind` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_email`, `customer_name`, `customer_password`, `account_creation_date`, `customer_address`, `customer_kind`) VALUES
(2, 'jic118@pitt.edu', NULL, '7477a112f44617c5ffc77584cd1aeff2', NULL, 12, NULL),
(3, 'aditittanu81@gmail.com', NULL, '7b3ac52ab3ac137893783b2627fdfd8a', NULL, NULL, NULL);

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

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_name`, `manager_password`, `manager_address`, `manager_email`) VALUES
(1, 'James Patrick', 'qwerty1234', '144 North Dithridge Street ,Pittsburgh ,PA 15213', 'jap81@gmail.com'),
(2, 'John Tammy', 'poiyt1234', '135 North Craig Street,Pittsburgh ,PA 15213', 'jat141@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`salesperson_id`, `salesperson_password`, `salesperson_name`, `salesperson_address`, `salesperson_email`, `salesperson_job_title`, `salesperson_salary`, `store_id`) VALUES
(1, 'qwer453', 'Bob Dylan', 'University Pitt Store,Pittsburgh PA 15213', 'bob761@gmail.com', 'Supervisor', 30000, 1),
(2, '987point', 'Jim Carrey', 'University Pitt Store,Pittsburgh PA 15213', 'jimc@gmail.com', 'Junior Sales', 20000, 1);

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

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_address`, `number_of_salesperson`, `manager_id`) VALUES
(1, 'University Pitt Store,5th Venue,15260', 5, 1),
(2, 'Walmart, Pittsburgh,PA 15260', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `order_id` varchar(100) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `salesperson_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_cost_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`order_id`, `order_date`, `order_status`, `salesperson_id`, `customer_id`, `total_cost_price`) VALUES
('7f19c195a59f7ff17ffc615f1db87a76', '2018-04-12 12:43:44', 'Just Paid', NULL, 2, 13.98),
('eca91fbab2ad0209e4427bf083570c3f', '2018-04-12 12:53:46', 'Just Paid', NULL, 2, 506.13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_payment`
--
ALTER TABLE `address_payment`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `books_transactions`
--
ALTER TABLE `books_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_review`
--
ALTER TABLE `book_review`
  ADD PRIMARY KEY (`book_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_customer_address` (`customer_address`);

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
-- AUTO_INCREMENT for table `address_payment`
--
ALTER TABLE `address_payment`
  MODIFY `address_id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `books_transactions`
--
ALTER TABLE `books_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
  MODIFY `salesperson_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_review`
--
ALTER TABLE `book_review`
  ADD CONSTRAINT `book_review_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_review_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customer_address` FOREIGN KEY (`customer_address`) REFERENCES `address_payment` (`address_id`) ON DELETE SET NULL;

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
