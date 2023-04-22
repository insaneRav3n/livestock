-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 08:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `breads`
--

CREATE TABLE `breads` (
  `bread_id` int(11) NOT NULL,
  `bread_name` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cow`
--

CREATE TABLE `cow` (
  `cow_id` int(11) NOT NULL,
  `cow_tag_no` varchar(33) NOT NULL,
  `cow_name` varchar(33) NOT NULL,
  `color` varchar(33) NOT NULL,
  `horn` varchar(255) NOT NULL,
  `bread` varchar(33) NOT NULL,
  `age` varchar(33) NOT NULL,
  `lac_avg` varchar(33) NOT NULL,
  `weight` varchar(33) NOT NULL,
  `gender` varchar(33) NOT NULL,
  `cow_image` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dod` varchar(255) NOT NULL,
  `c_weight` varchar(255) NOT NULL,
  `ftag` varchar(255) NOT NULL,
  `mtag` varchar(255) NOT NULL,
  `v_date` varchar(255) NOT NULL,
  `pur_d` varchar(255) NOT NULL,
  `sold` varchar(33) NOT NULL,
  `pgstat` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cowfs`
--

CREATE TABLE `cowfs` (
  `cowf_id` int(11) NOT NULL,
  `cowf_tag_no` varchar(33) NOT NULL,
  `cowf_name` varchar(33) NOT NULL,
  `color` varchar(33) NOT NULL,
  `bread` varchar(33) NOT NULL,
  `age` varchar(33) NOT NULL,
  `lac_avg` varchar(33) NOT NULL,
  `weight` varchar(33) NOT NULL,
  `gender` varchar(33) NOT NULL,
  `cowf_image` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `status` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(33) NOT NULL,
  `mobile_no` varchar(33) NOT NULL,
  `address` varchar(33) NOT NULL,
  `cnic` varchar(33) NOT NULL,
  `doctor_degree` varchar(33) NOT NULL,
  `img` text NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `type` varchar(33) NOT NULL DEFAULT 'doctor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(33) NOT NULL,
  `mobile_no` varchar(33) NOT NULL,
  `address` varchar(33) NOT NULL,
  `cnic` varchar(33) NOT NULL,
  `img` text NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `type` varchar(33) NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_name` varchar(33) NOT NULL,
  `expense_date` date NOT NULL,
  `expense_amount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feed`
--

CREATE TABLE `feed` (
  `feed_id` int(11) NOT NULL,
  `feed_cow` varchar(33) NOT NULL,
  `feed_food` varchar(255) NOT NULL,
  `feed_qty` varchar(255) NOT NULL,
  `feed_date` date NOT NULL,
  `feed_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food_plan`
--

CREATE TABLE `food_plan` (
  `food_id` int(11) NOT NULL,
  `food_cow` varchar(33) NOT NULL,
  `feed` varchar(33) NOT NULL,
  `food_qty` varchar(33) NOT NULL,
  `food_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `functions`
--

CREATE TABLE `functions` (
  `function_id` int(11) NOT NULL,
  `functions` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lectation`
--

CREATE TABLE `lectation` (
  `lectation_id` int(11) NOT NULL,
  `lectation_cow` varchar(33) NOT NULL,
  `lectation_name` varchar(33) NOT NULL,
  `lectation_date_from` date NOT NULL,
  `lectation_date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `user_name` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `type` varchar(33) NOT NULL,
  `trial_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `medical_id` int(11) NOT NULL,
  `cow` varchar(33) NOT NULL,
  `desease` varchar(33) NOT NULL,
  `medicine` varchar(33) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `qty_unit` varchar(33) NOT NULL,
  `doctor` varchar(33) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `vaccine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_cow` varchar(33) NOT NULL,
  `medicine_name` varchar(33) NOT NULL,
  `medicine_time` time NOT NULL,
  `medicine_qty` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `milking`
--

CREATE TABLE `milking` (
  `milking_id` int(11) NOT NULL,
  `cow` varchar(33) NOT NULL,
  `qty` varchar(33) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `milking_sale`
--

CREATE TABLE `milking_sale` (
  `milk_sale_id` int(11) NOT NULL,
  `milk_sale` varchar(33) NOT NULL,
  `supplier` varchar(33) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `milking_stock`
--

CREATE TABLE `milking_stock` (
  `stock_id` int(11) NOT NULL,
  `total_stock` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `modules_id` int(11) NOT NULL,
  `module_name` varchar(33) NOT NULL,
  `module_icon` text NOT NULL,
  `module_page` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission_control`
--

CREATE TABLE `permission_control` (
  `permission_id` int(11) NOT NULL,
  `user_type` varchar(33) NOT NULL,
  `module_id` int(11) NOT NULL,
  `functions_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy`
--

CREATE TABLE `pregnancy` (
  `pregnancy_id` int(11) NOT NULL,
  `pregnancy_cow` varchar(33) NOT NULL,
  `pregnancy_date_from` date NOT NULL,
  `pregnancy_date_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(33) NOT NULL,
  `size` varchar(33) NOT NULL,
  `product_color` varchar(33) NOT NULL,
  `unit` varchar(33) NOT NULL,
  `cost` varchar(33) NOT NULL,
  `sale_price` varchar(33) NOT NULL,
  `qty` varchar(33) NOT NULL,
  `picture` text NOT NULL,
  `fats` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_cow` varchar(33) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_amount` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `sale_cow` varchar(33) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_amount` varchar(33) NOT NULL,
  `sale_weight` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL,
  `user_group` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weight_log`
--

CREATE TABLE `weight_log` (
  `id` int(255) NOT NULL,
  `tag_no` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breads`
--
ALTER TABLE `breads`
  ADD PRIMARY KEY (`bread_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cow`
--
ALTER TABLE `cow`
  ADD PRIMARY KEY (`cow_id`);

--
-- Indexes for table `cowfs`
--
ALTER TABLE `cowfs`
  ADD PRIMARY KEY (`cowf_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `feed`
--
ALTER TABLE `feed`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `food_plan`
--
ALTER TABLE `food_plan`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `lectation`
--
ALTER TABLE `lectation`
  ADD PRIMARY KEY (`lectation_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `milking`
--
ALTER TABLE `milking`
  ADD PRIMARY KEY (`milking_id`);

--
-- Indexes for table `milking_sale`
--
ALTER TABLE `milking_sale`
  ADD PRIMARY KEY (`milk_sale_id`);

--
-- Indexes for table `milking_stock`
--
ALTER TABLE `milking_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`modules_id`);

--
-- Indexes for table `permission_control`
--
ALTER TABLE `permission_control`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `pregnancy`
--
ALTER TABLE `pregnancy`
  ADD PRIMARY KEY (`pregnancy_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD UNIQUE KEY `purchase_cow` (`purchase_cow`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`),
  ADD UNIQUE KEY `sale_cow` (`sale_cow`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `weight_log`
--
ALTER TABLE `weight_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breads`
--
ALTER TABLE `breads`
  MODIFY `bread_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cow`
--
ALTER TABLE `cow`
  MODIFY `cow_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cowfs`
--
ALTER TABLE `cowfs`
  MODIFY `cowf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed`
--
ALTER TABLE `feed`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_plan`
--
ALTER TABLE `food_plan`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `functions`
--
ALTER TABLE `functions`
  MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lectation`
--
ALTER TABLE `lectation`
  MODIFY `lectation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `medical_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milking`
--
ALTER TABLE `milking`
  MODIFY `milking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milking_sale`
--
ALTER TABLE `milking_sale`
  MODIFY `milk_sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milking_stock`
--
ALTER TABLE `milking_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `modules_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_control`
--
ALTER TABLE `permission_control`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnancy`
--
ALTER TABLE `pregnancy`
  MODIFY `pregnancy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weight_log`
--
ALTER TABLE `weight_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
