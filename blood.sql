-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2016 at 03:59 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `pass`) VALUES
(1, 'Admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `b_req`
--

CREATE TABLE `b_req` (
  `id` int(11) NOT NULL,
  `patient_name` text NOT NULL,
  `pblood_group` text NOT NULL,
  `p_age` int(11) NOT NULL,
  `need_blood` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `cont_number` int(20) NOT NULL,
  `hospital_name` text NOT NULL,
  `city` text NOT NULL,
  `location` text NOT NULL,
  `patient_address` text NOT NULL,
  `disease` text NOT NULL,
  `reqsubmission_date` date NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `b_req`
--

INSERT INTO `b_req` (`id`, `patient_name`, `pblood_group`, `p_age`, `need_blood`, `quantity`, `cont_number`, `hospital_name`, `city`, `location`, `patient_address`, `disease`, `reqsubmission_date`, `email`) VALUES
(1, 'Gadha', 'A-', 32, '2015-12-31', 2, 1670259077, 'janina', 'dont know', 'janina', 'sdsdsds', 'dsdsds', '2015-12-26', 'olivehasan99@gmail.com'),
(2, 'Gadha', 'B-', 32, '2015-12-31', 2, 1670259077, 'janina', 'dont know', 'janina', 'sdsd', 'dsdsd', '2015-12-26', 'olive.hasan.12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `donor_reg`
--

CREATE TABLE `donor_reg` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `blood_group` text NOT NULL,
  `weight` int(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobile_number` int(20) NOT NULL,
  `district` text NOT NULL,
  `city` text NOT NULL,
  `email` text NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `user_id` text NOT NULL,
  `pass` text NOT NULL,
  `ability` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_reg`
--

INSERT INTO `donor_reg` (`id`, `name`, `blood_group`, `weight`, `age`, `gender`, `date_of_birth`, `mobile_number`, `district`, `city`, `email`, `present_address`, `permanent_address`, `user_id`, `pass`, `ability`) VALUES
(1, 'olive hasan', 'O+', 63, 23, 'male', '0000-00-00', 1670259077, 'Khulna', 'khulna', 'olive.hasan.12@gmail.com', 'asasasasa', 'asasasas', 'olive', '123', 'available'),
(2, 'Akash Sharkar', 'A+', 65, 30, 'male', '1990-12-25', 1725896936, 'dhaka', 'foridpur', 'akash520@yahoo.com', 'sdhgdsgfhdgfhdsgfhdgf', 'dhgfhdgfhdfghdgfhdgf', 'akash12', '123', 'available'),
(3, 'Zakia Khatun', 'B+', 85, 52, 'female', '1992-08-30', 1725896936, 'rajshahi', 'rajshahi', 'zakia@yahoo.com', 'rajshahi', 'rajshahi', 'zakia12', '123', 'available'),
(4, 'Momo', 'AB-', 63, 32, 'female', '1992-08-30', 1725896936, 'dhaka', 'gopalgong', 'momo@gmail.com', 'jamalpur', 'jamalpur', 'momo45', '123', 'available'),
(5, 'Radha Krisno', 'A+', 63, 28, 'female', '1992-08-30', 1670259077, 'rajshahi', 'bogra', 'akash520@yahoo.com', 'fgfgfg', 'fgfdg', 'radha', '123', 'available'),
(6, 'krishno mondol', 'AB+', 65, 32, 'male', '1992-08-30', 1670259077, 'chittagong', 'comilla', 'naginchandro@gmail.com', 'sdsd', 'dsadsd', 'krishno', '123', 'available'),
(7, 'rahim mishra', 'O+', 70, 34, 'male', '1992-08-30', 1670259077, 'rajshahi', 'nawabganj', 'naginchandro@gmail.com', 'gfgf', 'fggf', 'rahim', '123', 'available'),
(8, 'lalu mia', 'AB+', 56, 23, 'male', '2016-02-02', 1670259077, 'dhaka', 'kishoegong', 'lalumia@yahoo.com', 'fgfdgfgf', 'dsadsafsa', 'lalu', '202cb962ac59075b964b07152d234b70', 'available'),
(9, 'tuly khatun1', 'B+', 456, 188888, 'female', '2016-04-28', 2147483647, 'sylhet', 'banner', 'lalumia4564564564', 'dsfdfsdfdsfds', 'dfdfdsfdsf', 'tuly1', '202cb962ac59075b964b07152d234b70', 'unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `member_reg`
--

CREATE TABLE `member_reg` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` int(20) NOT NULL,
  `present_add` text NOT NULL,
  `permanent_add` text NOT NULL,
  `blood_group` text NOT NULL,
  `weight` int(20) NOT NULL,
  `age` int(20) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `occupation` text NOT NULL,
  `why_join` text NOT NULL,
  `email` text NOT NULL,
  `user_id` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_reg`
--

INSERT INTO `member_reg` (`id`, `name`, `mobile`, `present_add`, `permanent_add`, `blood_group`, `weight`, `age`, `gender`, `dob`, `occupation`, `why_join`, `email`, `user_id`, `pass`) VALUES
(1, 'olive hasan', 1670259077, 'bcxbxc', 'xcvcxvc', 'O+', 63, 23, 'male', '1992-08-30', 'student', 'vxcbvcxbvxcb', 'olive.hasan.12@gmail.com', 'olive', '123'),
(3, 'member', 2147483647, '', '', 'AB-', 58, 30, 'Select', '2016-02-04', 'hcxjhxhcjhj', '', 'olivehasan99@gmail.com', 'member', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b_req`
--
ALTER TABLE `b_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor_reg`
--
ALTER TABLE `donor_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_reg`
--
ALTER TABLE `member_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `b_req`
--
ALTER TABLE `b_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `donor_reg`
--
ALTER TABLE `donor_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `member_reg`
--
ALTER TABLE `member_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
