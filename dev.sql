-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2023 at 09:25 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `aaapreregistrations`
--

CREATE TABLE `aaapreregistrations` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `fecha__hora` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo_id` varchar(255) DEFAULT NULL,
  `nmeros` varchar(255) DEFAULT NULL,
  `correo_electrnico` varchar(255) DEFAULT NULL,
  `comentario_o_mensaje` longtext DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_no` varchar(191) DEFAULT NULL,
  `batch_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `apply_date` date DEFAULT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `mother_name` varchar(191) DEFAULT NULL,
  `father_occupation` varchar(191) DEFAULT NULL,
  `mother_occupation` varchar(191) DEFAULT NULL,
  `father_photo` text DEFAULT NULL,
  `mother_photo` text DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `present_province` int(10) UNSIGNED DEFAULT NULL,
  `present_district` int(10) UNSIGNED DEFAULT NULL,
  `present_village` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_province` int(10) UNSIGNED DEFAULT NULL,
  `permanent_district` int(10) UNSIGNED DEFAULT NULL,
  `permanent_village` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `gender` int(11) NOT NULL COMMENT '1 Male, 2 Female & 3 Other',
  `dob` date NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `emergency_phone` varchar(191) DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL,
  `mother_tongue` varchar(191) DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `blood_group` int(11) DEFAULT NULL,
  `nationality` varchar(191) DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `passport_no` varchar(191) DEFAULT NULL,
  `school_name` text DEFAULT NULL,
  `school_exam_id` varchar(191) DEFAULT NULL,
  `school_graduation_field` varchar(191) DEFAULT NULL,
  `school_graduation_year` varchar(191) DEFAULT NULL,
  `school_graduation_point` varchar(191) DEFAULT NULL,
  `collage_name` text DEFAULT NULL,
  `collage_exam_id` varchar(191) DEFAULT NULL,
  `collage_graduation_field` varchar(191) DEFAULT NULL,
  `collage_graduation_year` varchar(191) DEFAULT NULL,
  `collage_graduation_point` varchar(191) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Rejected, 1 Pending, 2 Approve',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `registration_no`, `batch_id`, `program_id`, `apply_date`, `first_name`, `last_name`, `father_name`, `mother_name`, `father_occupation`, `mother_occupation`, `father_photo`, `mother_photo`, `country`, `present_province`, `present_district`, `present_village`, `present_address`, `permanent_province`, `permanent_district`, `permanent_village`, `permanent_address`, `gender`, `dob`, `email`, `phone`, `emergency_phone`, `religion`, `caste`, `mother_tongue`, `marital_status`, `blood_group`, `nationality`, `national_id`, `passport_no`, `school_name`, `school_exam_id`, `school_graduation_field`, `school_graduation_year`, `school_graduation_point`, `collage_name`, `collage_exam_id`, `collage_graduation_field`, `collage_graduation_year`, `collage_graduation_point`, `photo`, `signature`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '10000001', NULL, 4, '2023-02-13', 'Judah', 'Bryant', 'Ira Preston', 'Reuben Cooper', 'Explicabo Reiciendi', 'Earum aliquid vel au', NULL, NULL, NULL, 2, 7, NULL, 'Hic rem consequat A', 4, 12, NULL, 'Corrupti sapiente l', 2, '1982-02-08', 'haca@mailinator.com', '+1 (366) 959-1883', NULL, NULL, NULL, NULL, 1, 5, NULL, '21879584857', '878454545454', 'Penelope Mack', '5487854', NULL, '2004', '99.3', 'Genevieve Hammond', '6787877', NULL, '2006', '78.8', 'staff1_1664732856_1676308260.jpg', 'book_covers.jpg_1664732856_1676308260.jpg', 1, 1, NULL, '2023-02-13 11:11:00', '2023-02-13 11:11:00'),
(2, '10000002', NULL, 2, '2023-02-13', 'Jerome', 'Sellers', 'Laurel Evans', 'Carlos Hess', 'Id explicabo Repel', 'Adipisicing reiciend', NULL, NULL, NULL, 3, 11, NULL, 'Eius duis debitis no', 2, 7, NULL, 'Quasi magna id dolo', 1, '1998-01-21', 'loxut@mailinator.com', '+1 (431) 155-5046', NULL, NULL, NULL, NULL, 2, 4, NULL, '878654548', '258897878', 'Dorian Cortez', '356897', NULL, '2009', '68.3', 'Tobias Love', '899564', NULL, '2010', '67.8', 'staff2_1664711842_1676308347.jpg', 'book_cover2.jpg_1664711842_1676308347.jpg', 0, 1, 1, '2023-02-13 11:12:27', '2023-02-13 11:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `application_settings`
--

CREATE TABLE `application_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `title` text DEFAULT NULL,
  `header_left` text DEFAULT NULL,
  `header_center` text DEFAULT NULL,
  `header_right` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `footer_left` text DEFAULT NULL,
  `footer_center` text DEFAULT NULL,
  `footer_right` text DEFAULT NULL,
  `logo_left` text DEFAULT NULL,
  `logo_right` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_settings`
--

INSERT INTO `application_settings` (`id`, `slug`, `title`, `header_left`, `header_center`, `header_right`, `body`, `footer_left`, `footer_center`, `footer_right`, `logo_left`, `logo_right`, `background`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admission', 'Apply to admission on our university', NULL, NULL, NULL, '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\',</p>', NULL, NULL, NULL, 'logo_1664613886_1676307947.jpg', 'logo_1664613886_1676307947.jpg', NULL, 1, '2023-02-13 11:05:47', '2023-02-13 11:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `total_marks` decimal(5,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `assign_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `start_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `title`, `start_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '1er Grupo', '2018-10-01', 1, '2022-09-30 13:02:48', '2023-08-09 22:35:11'),
(2, '2do Grupo', '2019-10-01', 1, '2022-09-30 13:03:01', '2023-08-09 22:35:30'),
(3, '3er Grupo', '2020-10-01', 1, '2022-09-30 13:03:23', '2023-08-09 22:35:47'),
(4, '4to Grupo', '2021-10-01', 1, '2022-09-30 13:03:38', '2023-08-09 22:36:02'),
(5, '5to Grupo', '2022-10-01', 1, '2022-09-30 13:03:56', '2023-08-09 22:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `batch_program`
--

CREATE TABLE `batch_program` (
  `batch_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_program`
--

INSERT INTO `batch_program` (`batch_id`, `program_id`) VALUES
(1, 12),
(1, 11),
(1, 8),
(1, 10),
(1, 9),
(2, 12),
(2, 11),
(2, 8),
(2, 10),
(2, 9),
(3, 12),
(3, 11),
(3, 8),
(3, 10),
(3, 9),
(4, 12),
(4, 11),
(4, 8),
(4, 10),
(4, 9),
(5, 12),
(5, 11),
(5, 8),
(5, 10),
(5, 9),
(1, 13),
(2, 13),
(3, 13),
(4, 13),
(5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `isbn` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `author` varchar(191) DEFAULT NULL,
  `publisher` varchar(191) DEFAULT NULL,
  `edition` varchar(191) DEFAULT NULL,
  `publish_year` varchar(191) DEFAULT NULL,
  `language` varchar(191) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `section` varchar(191) DEFAULT NULL,
  `column` varchar(191) DEFAULT NULL,
  `row` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Lost, 1 Available, 2 Damage',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `title`, `isbn`, `code`, `author`, `publisher`, `edition`, `publish_year`, `language`, `price`, `quantity`, `section`, `column`, `row`, `description`, `note`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Corporis laboriosam', '978-3-16-148410-0', NULL, 'Devid', 'Iure quis est imped', 'Enim id voluptas del', '1970', 'English', 36.00, 132, '17', '5', '2', 'Dolor qui veritatis', 'Consectetur molestia', NULL, 1, 1, 1, '2022-10-01 12:38:52', '2022-10-27 13:26:56'),
(2, 3, 'Voluptatibus volupta', '1-56619-909-3', NULL, 'Jeff', 'Harum ad placeat es', 'Repellendus Et recu', '1978', 'English', 10.00, 702, '47', '8', '18', 'Et eiusmod animi si', 'Assumenda pariatur', 'book-cover2_1664653683.jpg', 1, 1, 1, '2022-10-01 12:41:00', '2022-10-27 13:26:39'),
(3, 1, 'Quod sed sed in in e', '978-3-16-146347-5', NULL, 'Alex', 'Tempora earum adipis', 'Eiusmod enim consequ', '1987', 'English', 14.00, 385, '7', '78', '52', 'Fuga Optio ea offi', 'In consectetur ea om', NULL, 1, 1, 1, '2022-10-01 12:45:56', '2022-10-27 13:26:28'),
(4, 4, 'Et qui aut nisi do a', '978-3-16-785410-9', NULL, 'Arman', 'Assumenda architecto', 'Ea aute excepturi eu', '1981', 'English', 10.00, 349, '78', '01', '14', 'Vel nisi ut et rem q', 'Voluptas ea suscipit', NULL, 1, 1, 1, '2022-10-01 13:07:42', '2022-10-27 13:26:11'),
(5, 2, 'A Story of Your Childhood', '1-566147-548-7', NULL, 'Saif', 'Rerum ab eum esse s', 'Dicta ut quaerat eaq', '2000', 'English', 17.00, 435, '17', '77', '47', 'Unde voluptatem ut u', 'Sequi veniam non se', NULL, 1, 1, 1, '2022-10-01 13:10:51', '2022-10-27 13:26:01'),
(6, 1, 'Et sequi sit obcaeca', '1-254147-457-9', NULL, 'Arman', 'Itaque ut in odio es', 'Eu cupidatat rem ips', '1982', 'English', 45.00, 758, '77', '14', '23', 'Quae irure aut conse', 'Numquam mollit aliqu', 'book-covers_1664653539.jpg', 1, 1, 1, '2022-10-01 13:45:39', '2022-10-27 13:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fiction Books', 'fiction-books', NULL, 1, '2022-09-30 14:13:20', '2022-09-30 14:13:20'),
(2, 'Crime & Mystery', 'crime-mystery', NULL, 1, '2022-09-30 14:13:35', '2022-09-30 14:13:35'),
(3, 'History', 'history', NULL, 1, '2022-09-30 14:13:50', '2022-09-30 14:13:50'),
(4, 'Magazine', 'magazine', NULL, 1, '2022-09-30 14:14:12', '2022-09-30 14:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `isbn` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `author` varchar(191) DEFAULT NULL,
  `publisher` varchar(191) DEFAULT NULL,
  `edition` varchar(191) DEFAULT NULL,
  `publish_year` varchar(191) DEFAULT NULL,
  `language` varchar(191) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `request_by` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Rejected, 1 Pending, 2 Progress, 3 Approved',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_requests`
--

INSERT INTO `book_requests` (`id`, `category_id`, `title`, `isbn`, `code`, `author`, `publisher`, `edition`, `publish_year`, `language`, `price`, `quantity`, `request_by`, `phone`, `email`, `description`, `note`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Repudiandae sunt qu', NULL, NULL, 'Nostrud provident e', 'Voluptatum sit exped', 'Quia consectetur est', '1990', 'Quas et impedit vol', NULL, 421, 'Rafael Britt', '+1 (695) 757-2712', 'nunanavy@mailinator.com', 'Asperiores elit ill', 'Reprehenderit illum', NULL, 1, 1, NULL, '2023-02-13 12:11:02', '2023-02-13 12:11:02'),
(2, 2, 'Quos asperiores ut a', NULL, NULL, 'Voluptate quia dolor', 'Doloribus reprehende', 'Anim eius ratione qu', '2010', 'Dolor tenetur exerci', NULL, 324, 'Caldwell Stanton', '+1 (877) 683-7177', 'norigaruzy@mailinator.com', 'Harum dicta sint et', 'Tempor doloremque do', NULL, 1, 1, NULL, '2023-02-13 12:11:18', '2023-02-13 12:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `starting_year` varchar(191) DEFAULT NULL,
  `ending_year` varchar(191) DEFAULT NULL,
  `credits` decimal(5,2) NOT NULL,
  `point` decimal(5,2) NOT NULL,
  `barcode` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `template_id`, `student_id`, `serial_no`, `date`, `starting_year`, `ending_year`, `credits`, `point`, `barcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '100001', '2022-10-02', '2022-01-01', '2022-12-01', 10.00, 3.80, '100001', 1, '2022-10-02 16:12:54', '2022-10-04 11:06:27'),
(2, 1, 3, '100002', '2022-10-04', '2022-01-01', '2022-12-01', 10.00, 4.50, '100002', 1, '2022-10-04 11:04:35', '2022-10-04 11:05:33'),
(3, 1, 15, '100003', '2023-08-10', '2023-07-17', '2023-11-24', 0.00, 0.00, '100003', 1, '2023-08-10 00:32:05', '2023-08-10 00:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_templates`
--

CREATE TABLE `certificate_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `header_left` text DEFAULT NULL,
  `header_center` text DEFAULT NULL,
  `header_right` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `footer_left` text DEFAULT NULL,
  `footer_center` text DEFAULT NULL,
  `footer_right` text DEFAULT NULL,
  `logo_left` text DEFAULT NULL,
  `logo_right` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `width` varchar(191) NOT NULL DEFAULT 'auto',
  `height` varchar(191) NOT NULL DEFAULT 'auto',
  `student_photo` tinyint(1) NOT NULL DEFAULT 0,
  `barcode` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificate_templates`
--

INSERT INTO `certificate_templates` (`id`, `title`, `header_left`, `header_center`, `header_right`, `body`, `footer_left`, `footer_center`, `footer_right`, `logo_left`, `logo_right`, `background`, `width`, `height`, `student_photo`, `barcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Provisional Certificate', NULL, NULL, NULL, 'This is to certify that  [first_name] [last_name] son / daughter of  [father_name] and [mother_name] passed [program] degree under [faculty] examination of the university held in [ending_year]. And that he/she was placed [cgpa] with grade of [grade]. \r\n\r\nHe/She completed the course of  [credits] credits and all of the requirements for the award of the Bachelor\'s degree.', 'Controller', 'Director', 'Register', 'logo_1664614758.jpg', NULL, 'background-border_1664614748.png', '800px', 'auto', 1, 1, 1, '2022-10-01 02:56:19', '2022-10-02 16:11:17'),
(2, 'Transfer Certificate', NULL, NULL, NULL, 'This is to certify that  [first_name] [last_name] son / daughter of  [father_name] and [mother_name] passed [program] degree under [faculty] examination of the university held in [ending_year]. And that he/she was placed [cgpa] with grade of [grade]. \r\n\r\nHe/She completed the course of  [credits] credits and all of the requirements for the award of the Bachelor\'s degree.', 'Controller', 'Director', 'Register', 'logo_1664614963.jpg', NULL, 'background-border_1664614963.png', '800px', 'auto', 1, 0, 1, '2022-10-01 03:02:43', '2022-10-02 16:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `class_rooms`
--

CREATE TABLE `class_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `floor` varchar(191) DEFAULT NULL,
  `capacity` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_rooms`
--

INSERT INTO `class_rooms` (`id`, `title`, `slug`, `floor`, `capacity`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '201A', '201a', '2nd Floor', NULL, 'Theory', NULL, 1, '2022-09-30 13:32:31', '2022-09-30 13:34:51'),
(2, '202B', '202b', '2nd Floor', NULL, 'Theory', NULL, 1, '2022-09-30 13:33:11', '2022-09-30 13:34:45'),
(3, '305A', '305a', '3rd Floor', '40', 'Lab', NULL, 1, '2022-09-30 13:34:10', '2022-09-30 13:34:10'),
(4, '306A', '306a', '3rd Floor', '60', 'Lab', NULL, 1, '2022-09-30 13:34:27', '2022-09-30 13:34:59'),
(5, '205B', '205b', '2nd Floor', NULL, 'Theory', NULL, 1, '2022-10-01 04:46:18', '2022-10-01 04:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `class_routines`
--

CREATE TABLE `class_routines` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_routines`
--

INSERT INTO `class_routines` (`id`, `teacher_id`, `subject_id`, `room_id`, `session_id`, `program_id`, `semester_id`, `section_id`, `start_time`, `end_time`, `day`, `status`, `created_at`, `updated_at`) VALUES
(37, 3, 42, 2, 4, 9, 1, 7, '11:00:00', '13:00:00', 5, 1, '2023-08-10 09:27:43', '2023-08-10 09:27:43'),
(38, 3, 39, 1, 4, 9, 1, 7, '07:00:00', '09:00:00', 3, 1, '2023-08-10 09:29:44', '2023-08-10 09:29:44'),
(39, 3, 68, 5, 4, 9, 1, 7, '08:00:00', '10:00:00', 4, 1, '2023-08-10 09:54:55', '2023-08-10 09:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `source_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `action_taken` text DEFAULT NULL,
  `assigned` varchar(191) DEFAULT NULL,
  `issue` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `type_id`, `source_id`, `name`, `father_name`, `phone`, `email`, `date`, `action_taken`, `assigned`, `issue`, `note`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 'Alika Lucas', 'Velma Flores', '+1 (919) 213-5151', 'firutesygi@mailinator.com', '2021-02-13', 'Ordered', 'Liz', 'Amet velit accusant', 'Fuga Aliqua Molest', NULL, 1, 1, 1, '2022-10-01 12:29:41', '2022-10-27 13:29:43'),
(2, 9, 3, 'Beverly Rich', 'Alyssa Pitts', '+1 (904) 655-2551', 'cidynyb@mailinator.com', '2020-08-02', 'Solved', 'Saif', 'Commodo corporis ips', 'Ullamco cupidatat qu', 'book-cover2_1664656121.jpg', 1, 1, 1, '2022-10-01 12:30:16', '2022-10-27 13:29:18'),
(3, 3, 1, 'Constance Stephens', 'Colorado Knight', '+1 (842) 238-6678', 'vavomul@mailinator.com', '2022-06-22', 'Suspend', '8', 'Eligendi totam quis', 'Quia est ut amet vo', NULL, 0, 1, 1, '2022-10-01 12:30:38', '2023-02-13 12:27:14'),
(4, 5, 2, 'Ezekiel Hooper', 'Mollie Browning', '+1 (859) 183-6191', 'furus@mailinator.com', '2020-03-23', 'Change', 'Alex', 'Iusto laboris ipsa', 'Delectus ex accusam', NULL, 1, 1, 1, '2022-10-01 12:31:10', '2022-10-27 13:28:34'),
(5, 9, 1, 'Kaden Reyes', 'Ruth Petty', '+1 (293) 256-2963', 'tabyxuge@mailinator.com', '2020-02-03', 'Solved', 'Andre', 'Saepe rerum nulla co', 'Aut sunt sunt ea qua', 'book-covers_1664656151.jpg', 1, 1, 1, '2022-10-01 12:31:21', '2022-10-27 13:28:21'),
(6, 5, 3, 'Barry Hull', 'Travis Fuller', '+1 (561) 218-6774', 'weripazu@mailinator.com', '2022-12-03', NULL, '9', 'Perferendis necessit', 'Autem quibusdam aut', NULL, 1, 1, 1, '2023-02-13 12:27:46', '2023-07-12 15:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `complain_sources`
--

CREATE TABLE `complain_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complain_sources`
--

INSERT INTO `complain_sources` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Staff', 'staff', NULL, 1, '2022-10-01 03:56:33', '2022-10-01 03:56:33'),
(2, 'Student', 'student', NULL, 1, '2022-10-01 03:56:40', '2022-10-01 03:56:40'),
(3, 'Parent', 'parent', NULL, 1, '2022-10-01 03:56:47', '2022-10-01 03:56:47'),
(4, 'Teacher', 'teacher', NULL, 1, '2022-10-01 03:56:58', '2022-10-01 03:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `complain_types`
--

CREATE TABLE `complain_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complain_types`
--

INSERT INTO `complain_types` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fees', 'fees', NULL, 1, '2022-10-01 03:53:14', '2022-10-01 03:53:14'),
(2, 'Study', 'study', NULL, 1, '2022-10-01 03:53:29', '2022-10-01 03:53:29'),
(3, 'Teacher', 'teacher', NULL, 1, '2022-10-01 03:53:37', '2022-10-01 03:53:37'),
(4, 'Sports', 'sports', NULL, 1, '2022-10-01 03:53:42', '2022-10-01 03:53:42'),
(5, 'Transport', 'transport', NULL, 1, '2022-10-01 03:53:51', '2022-10-01 03:53:51'),
(6, 'Hostel', 'hostel', NULL, 1, '2022-10-01 03:54:00', '2022-10-01 03:54:00'),
(7, 'Instrument', 'instrument', NULL, 1, '2022-10-01 03:54:55', '2022-10-01 03:54:55'),
(8, 'Exam', 'exam', NULL, 1, '2022-10-01 03:55:27', '2022-10-01 03:55:27'),
(9, 'Library', 'library', NULL, 1, '2022-10-01 03:55:41', '2022-10-01 03:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `contentables`
--

CREATE TABLE `contentables` (
  `content_id` bigint(20) NOT NULL,
  `contentable_id` bigint(20) NOT NULL,
  `contentable_type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contentables`
--

INSERT INTO `contentables` (`content_id`, `contentable_id`, `contentable_type`) VALUES
(1, 8, 'App\\Models\\Student'),
(1, 7, 'App\\Models\\Student'),
(3, 14, 'App\\Models\\Student'),
(3, 12, 'App\\Models\\Student'),
(3, 11, 'App\\Models\\Student'),
(3, 10, 'App\\Models\\Student');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `url` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `faculty_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `type_id`, `title`, `description`, `date`, `url`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 4, 1, 1, 2, 'Optical Physics 1st Class', NULL, '2022-10-03', NULL, 'book-covers_1664802778.jpg', 1, 1, NULL, '2022-10-03 07:12:58', '2022-10-03 07:12:58'),
(2, 2, 3, 4, 1, 0, 1, 'Full Syllabus 2022', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose</p>', '2022-10-03', NULL, 'book-cover2_1664802896.jpg', 1, 1, 1, '2022-10-03 07:14:56', '2022-10-03 14:56:00'),
(3, 2, 3, 4, 1, 0, 2, '2nd Class Of English', NULL, '2022-10-04', NULL, 'Provisional Certificate-100001_1664888967.pdf', 1, 1, NULL, '2022-10-04 07:09:27', '2022-10-04 07:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

CREATE TABLE `content_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_types`
--

INSERT INTO `content_types` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Syllabus', 'syllabus', NULL, 1, '2022-09-30 13:55:02', '2022-09-30 13:55:02'),
(2, 'Lecture Sheet', 'lecture-sheet', NULL, 1, '2022-09-30 13:55:07', '2022-09-30 13:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admission', 'admission', NULL, 1, '2022-09-30 14:02:55', '2022-09-30 14:02:55'),
(2, 'Finance', 'finance', NULL, 1, '2022-09-30 14:03:04', '2022-10-01 04:16:23'),
(3, 'Library', 'library', NULL, 1, '2022-09-30 14:03:14', '2022-09-30 14:03:14'),
(4, 'IT Support', 'it-support', NULL, 1, '2022-09-30 14:03:33', '2022-09-30 14:03:33'),
(5, 'Faculty', 'faculty', NULL, 1, '2022-09-30 14:03:44', '2022-09-30 14:03:44'),
(6, 'Sports', 'sports', NULL, 1, '2022-10-01 04:16:51', '2022-10-01 04:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Instructor', 'instructor', NULL, 1, '2022-09-30 14:04:24', '2022-09-30 14:04:24'),
(2, 'Admin', 'admin', NULL, 1, '2022-09-30 14:04:34', '2022-10-01 04:17:39'),
(3, 'Professor', 'professor', NULL, 1, '2022-09-30 14:04:45', '2022-09-30 14:04:45'),
(4, 'Accountant', 'accountant', NULL, 1, '2022-09-30 14:05:06', '2022-09-30 14:05:06'),
(5, 'Librarian', 'librarian', NULL, 1, '2022-09-30 14:05:17', '2022-09-30 14:05:17'),
(6, 'Receptionist', 'receptionist', NULL, 1, '2022-09-30 14:06:12', '2022-09-30 14:06:12'),
(7, 'Director', 'director', NULL, 1, '2022-10-01 04:17:59', '2022-10-01 04:17:59'),
(8, 'Chancellor', 'chancellor', NULL, 1, '2022-10-01 04:18:48', '2022-10-01 04:18:48'),
(9, 'Exam Controller', 'exam-controller', NULL, 1, '2022-10-01 04:19:03', '2022-10-01 04:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `different_table_name`
--

CREATE TABLE `different_table_name` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `fecha_de_inters` varchar(255) DEFAULT NULL,
  `nombres_y_apellidos` varchar(255) DEFAULT NULL,
  `tipos_de_documento` varchar(255) DEFAULT NULL,
  `numero_de_documento` varchar(255) DEFAULT NULL,
  `fecha_de_expedicin_del_documento` varchar(255) DEFAULT NULL,
  `direccin` varchar(255) DEFAULT NULL,
  `numero_celular_de_contacto` varchar(255) DEFAULT NULL,
  `programa_acadmico` varchar(255) DEFAULT NULL,
  `por_que_le_interesa_esta_programa_acadmico` longtext DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(14, 5, 'Cogua', NULL, 1, '2023-07-12 16:10:03', '2023-07-12 16:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `docables`
--

CREATE TABLE `docables` (
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `docable_type` varchar(191) NOT NULL,
  `docable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `docables`
--

INSERT INTO `docables` (`document_id`, `docable_type`, `docable_id`) VALUES
(1, 'App\\User', 4),
(2, 'App\\User', 7),
(3, 'App\\User', 9),
(4, 'App\\Models\\Student', 2),
(5, 'App\\Models\\Student', 4),
(6, 'App\\Models\\Student', 8),
(7, 'App\\Models\\Student', 9),
(8, 'App\\Models\\Student', 13),
(9, 'App\\Models\\Student', 14);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NID Copy', 'book-cover2.jpg_1664711842.jpg', 1, '2022-10-02 05:57:22', '2022-10-02 05:57:22'),
(2, 'Passport Copy', 'book-covers.jpg_1664732229.jpg', 1, '2022-10-02 11:37:09', '2022-10-02 11:37:09'),
(3, 'Experiance Cer', 'book-covers.jpg_1664732856.jpg', 1, '2022-10-02 11:47:36', '2022-10-02 11:47:36'),
(4, 'Marksheet', 'book-covers.jpg_1664734667.jpg', 1, '2022-10-02 12:17:47', '2022-10-02 12:17:47'),
(5, 'Marksheet', 'book-cover2.jpg_1664734905.jpg', 1, '2022-10-02 12:21:45', '2022-10-02 12:21:45'),
(6, 'Marksheet', 'book-covers.jpg_1664735357.jpg', 1, '2022-10-02 12:29:17', '2022-10-02 12:29:17'),
(7, 'Transfer Doc', 'background-border.png_1664835743.png', 1, '2022-10-03 16:22:23', '2022-10-03 16:22:23'),
(8, 'Marksheet', 'book-cover2.jpg_1664884572.jpg', 1, '2022-10-04 05:56:12', '2022-10-04 05:56:12'),
(9, 'Marksheet', 'book-covers.jpg_1664884807.jpg', 1, '2022-10-04 06:00:07', '2022-10-04 06:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `email_notifies`
--

CREATE TABLE `email_notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `receive_count` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_notifies`
--

INSERT INTO `email_notifies` (`id`, `faculty_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `subject`, `message`, `receive_count`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 4, 0, 0, 'Your Fees Due Date Is Very Close', 'This depends on when you enrol. Your fees are due 30 days from your starting date. For more information, please see Fees due dates.', 2, 1, 1, NULL, '2022-10-03 11:54:16', '2022-10-03 11:54:16'),
(2, 2, 3, 3, 1, 1, 'Ready for attend our special class on sunday!', 'Note: If any of these dates fall on a holiday or weekend, the due date for fee payment will be the first working day following the holiday/weekend.', 4, 1, 1, NULL, '2022-10-03 12:06:14', '2022-10-03 12:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_id` int(10) UNSIGNED DEFAULT NULL,
  `source_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `assigned` varchar(191) DEFAULT NULL,
  `number_of_students` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `reference_id`, `source_id`, `program_id`, `name`, `father_name`, `phone`, `email`, `address`, `purpose`, `note`, `date`, `follow_up_date`, `assigned`, `number_of_students`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 3, 'Kim Sandoval', NULL, '+1 (939) 845-9236', 'voxagikib@mailinator.com', 'Aspernatur doloremqu', 'Odit et in qui et nu', 'Harum et deleniti ac', '2022-10-01', '2022-12-07', '3', 1, 1, 1, 1, '2022-10-01 12:24:34', '2023-02-13 12:24:58'),
(2, 3, 1, 1, 'Jesse Sandoval', NULL, '+1 (752) 181-9433', 'morexy@mailinator.com', 'Eum velit ratione qu', 'Pariatur Facilis in', 'Enim esse quidem min', '2019-04-02', NULL, 'Architecto', 1, 0, 1, 1, '2022-10-01 12:25:14', '2022-10-01 12:27:18'),
(3, 5, 1, 1, 'Malachi Buckner', NULL, '+1 (774) 745-9417', 'wicodikico@mailinator.com', 'Laboriosam laudanti', 'Adipisicing aspernat', 'Sint vel animi tem', '2021-09-25', '2022-12-29', 'Arman', 1, 1, 1, 1, '2022-10-01 12:25:59', '2022-10-01 12:26:58'),
(4, 2, 4, 1, 'Ann Castro', NULL, '+1 (225) 849-6955', 'lela@mailinator.com', 'Molestias elit aut', 'Qui laborum Dicta n', 'Eum soluta quia est', '2020-12-13', NULL, 'Aperiam', 1, 1, 1, NULL, '2022-10-01 12:26:30', '2022-10-01 12:26:30'),
(5, 1, NULL, 4, 'Georgia Shepard', NULL, '+1 (907) 196-5628', 'gapi@mailinator.com', 'Fugiat sequi aut qu', 'Aut anim ipsa eaque', 'Et ex doloremque min', '2021-04-05', '2022-10-13', 'Saif', 1, 1, 1, 1, '2022-10-01 12:27:53', '2022-10-01 12:28:07'),
(6, 1, 1, 5, 'Coby Kline', NULL, '+1 (582) 879-4372', 'hoge@mailinator.com', 'Consequat Consequat', 'Asperiores quod null', 'Quod quas amet quid', '2023-02-13', '2023-04-10', '4', 1, 1, 1, NULL, '2023-02-13 12:25:51', '2023-02-13 12:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_references`
--

CREATE TABLE `enquiry_references` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry_references`
--

INSERT INTO `enquiry_references` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Staff', 'staff', NULL, 1, '2022-10-01 03:50:35', '2022-10-01 03:50:35'),
(2, 'Parent', 'parent', NULL, 1, '2022-10-01 03:50:46', '2022-10-01 03:50:46'),
(3, 'Student', 'student', NULL, 1, '2022-10-01 03:50:53', '2022-10-01 03:50:53'),
(4, 'Self', 'self', NULL, 1, '2022-10-01 03:51:01', '2022-10-01 03:51:01'),
(5, 'Promotional Partner', 'promotional-partner', NULL, 1, '2022-10-01 03:52:48', '2022-10-01 03:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_sources`
--

CREATE TABLE `enquiry_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry_sources`
--

INSERT INTO `enquiry_sources` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Front Office', 'front-office', NULL, 1, '2022-10-01 03:48:47', '2022-10-01 03:48:47'),
(2, 'Advertisement', 'advertisement', NULL, 1, '2022-10-01 03:48:55', '2022-10-01 03:48:55'),
(3, 'University Website', 'university-website', NULL, 1, '2022-10-01 03:49:10', '2022-10-01 03:50:15'),
(4, 'Google Ads', 'google-ads', NULL, 1, '2022-10-01 03:49:20', '2022-10-01 03:49:20'),
(5, 'Admission Campaign', 'admission-campaign', NULL, 1, '2022-10-01 03:49:28', '2022-10-01 03:49:28'),
(6, 'Social Media', 'social-media', NULL, 1, '2022-10-01 03:49:42', '2022-10-01 03:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_subjects`
--

CREATE TABLE `enroll_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enroll_subjects`
--

INSERT INTO `enroll_subjects` (`id`, `program_id`, `semester_id`, `section_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 9, 1, 7, 1, '2023-08-10 09:19:17', '2023-08-10 09:19:17'),
(10, 9, 2, 7, 1, '2023-08-10 09:20:45', '2023-08-10 09:20:45'),
(11, 9, 3, 7, 1, '2023-08-10 09:21:49', '2023-08-10 09:21:49'),
(12, 9, 4, 7, 1, '2023-08-10 09:23:45', '2023-08-10 09:23:45'),
(13, 9, 5, 7, 1, '2023-08-10 09:25:02', '2023-08-10 09:25:02'),
(14, 8, 1, 3, 1, '2023-08-10 10:56:34', '2023-08-10 10:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_subject_subject`
--

CREATE TABLE `enroll_subject_subject` (
  `enroll_subject_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enroll_subject_subject`
--

INSERT INTO `enroll_subject_subject` (`enroll_subject_id`, `subject_id`) VALUES
(9, 39),
(9, 40),
(9, 67),
(9, 68),
(9, 69),
(9, 41),
(9, 42),
(9, 43),
(9, 44),
(10, 70),
(10, 45),
(10, 46),
(10, 47),
(10, 48),
(10, 49),
(11, 71),
(11, 72),
(11, 50),
(11, 51),
(11, 52),
(11, 53),
(11, 54),
(12, 73),
(12, 74),
(12, 55),
(12, 56),
(12, 57),
(12, 58),
(12, 59),
(13, 60),
(13, 61),
(13, 62),
(13, 63),
(13, 64),
(13, 65),
(13, 66),
(14, 14),
(14, 15),
(14, 16),
(14, 17),
(14, 18),
(14, 19),
(14, 20);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `color` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eid Holiday', '2022-10-03', '2022-10-17', '#70c24a', 1, '2022-10-03 11:38:23', '2022-10-03 11:38:23'),
(2, 'Marry Crismach', '2022-11-03', '2022-11-10', '#4a5cc2', 1, '2022-10-03 11:39:06', '2022-10-03 11:39:06'),
(3, 'Durga Puja', '2022-10-27', '2022-11-01', '#c24a4e', 1, '2022-10-03 11:39:24', '2022-10-03 11:39:24'),
(4, 'Final Exam', '2022-11-23', '2022-12-03', '#c2b44a', 1, '2022-10-03 11:39:54', '2022-10-03 11:39:54'),
(5, 'Summer Vacation', '2022-11-22', '2022-12-06', '#4aaec2', 1, '2022-10-03 11:41:19', '2022-10-03 11:41:19'),
(6, 'New Year Vacation', '2022-12-24', '2023-01-08', '#c24ac2', 1, '2022-10-03 11:41:57', '2022-10-03 11:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_enroll_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `exam_type_id` int(10) UNSIGNED DEFAULT NULL,
  `attendance` int(11) NOT NULL DEFAULT 2 COMMENT '1-Present, 2-Absent',
  `marks` decimal(5,2) DEFAULT NULL,
  `achieve_marks` decimal(5,2) DEFAULT NULL,
  `contribution` decimal(5,2) NOT NULL DEFAULT 0.00,
  `note` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_routines`
--

CREATE TABLE `exam_routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_type_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_routine_room`
--

CREATE TABLE `exam_routine_room` (
  `exam_routine_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_routine_user`
--

CREATE TABLE `exam_routine_user` (
  `exam_routine_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `marks` decimal(5,2) NOT NULL,
  `contribution` decimal(5,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `title`, `marks`, `contribution`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Final Exam', 100.00, 50.00, NULL, 1, NULL, '2023-02-13 11:50:36'),
(2, 'Midterm Exam', 50.00, 20.00, NULL, 1, NULL, '2023-02-13 11:50:36'),
(3, 'Test Exam', 20.00, 0.00, NULL, 1, NULL, '2023-02-13 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `invoice_id` varchar(191) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `category_id`, `title`, `invoice_id`, `amount`, `date`, `payment_method`, `note`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beatae corporis sit', '874596', 954.00, '2020-07-07', NULL, 'Voluptas incidunt a', NULL, 1, 1, 1, '2022-10-01 13:22:35', '2022-10-01 13:24:33'),
(2, 4, 'Neque architecto aut', '89654', 841.00, '2020-08-09', NULL, 'Officiis dolor fugia', NULL, 1, 1, 1, '2022-10-01 13:22:50', '2022-10-01 13:24:17'),
(3, 3, 'Pizza for all Staffs', '987456', 544.00, '2021-05-08', NULL, 'Sint non ullamco eum', 'background-border_1664652223.png', 1, 1, 1, '2022-10-01 13:23:43', '2022-10-01 13:24:02'),
(4, 5, 'Voluptate qui ex cup', '98654', 740.00, '2022-01-22', NULL, 'Qui cumque in aut ma', NULL, 1, 1, NULL, '2022-10-01 13:25:03', '2022-10-01 13:25:03'),
(5, 1, 'Ut laboriosam eum e', '87459', 740.00, '2022-04-28', 4, 'Sequi perspiciatis', NULL, 1, 1, 1, '2022-10-01 13:25:25', '2023-02-13 12:06:11'),
(6, 2, 'Quia inventore ex co', '89456', 214.00, '2019-12-19', NULL, 'Sint dolorem sit si', 'background-border_1664652398.png', 1, 1, NULL, '2022-10-01 13:26:38', '2022-10-01 13:26:38'),
(7, 2, 'Tempor voluptates no', '57854', 961.00, '2023-02-10', 5, 'Et voluptas earum ad', NULL, 1, 1, 1, '2023-02-13 12:07:13', '2023-02-13 12:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electricity BIll', 'electricity-bill', NULL, 1, '2022-09-30 14:09:42', '2022-09-30 14:09:42'),
(2, 'Internet Bill', 'internet-bill', NULL, 1, '2022-09-30 14:10:08', '2022-09-30 14:10:08'),
(3, 'Snacks', 'snacks', NULL, 1, '2022-09-30 14:10:40', '2022-09-30 14:10:40'),
(4, 'Stationery Purchase', 'stationery-purchase', NULL, 1, '2022-10-01 04:11:52', '2022-10-01 04:11:52'),
(5, 'Flower', 'flower', NULL, 1, '2022-10-01 04:12:06', '2022-10-01 04:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `shortcode` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `title`, `slug`, `shortcode`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Programas académicos CTB', 'programas-academicos-ctb', 'PA', 1, '2023-07-13 21:47:54', '2023-08-03 20:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_enroll_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `fee_amount` double(10,2) NOT NULL,
  `fine_amount` double(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` double(10,2) NOT NULL DEFAULT 0.00,
  `paid_amount` double(10,2) NOT NULL,
  `assign_date` date NOT NULL,
  `due_date` date NOT NULL,
  `pay_date` date DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 Unpaid, 1 Paid',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `student_enroll_id`, `category_id`, `fee_amount`, `fine_amount`, `discount_amount`, `paid_amount`, `assign_date`, `due_date`, `pay_date`, `payment_method`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3500.00, 0.00, 300.00, 3200.00, '2022-10-03', '2022-10-13', '2022-10-04', 3, NULL, 1, 1, 1, '2022-10-03 12:31:20', '2022-10-04 09:22:54'),
(2, 2, 1, 3500.00, 0.00, 350.00, 3150.00, '2022-10-03', '2022-10-13', NULL, NULL, NULL, 0, 1, 1, '2022-10-03 12:31:20', '2022-10-04 09:22:16'),
(3, 3, 1, 3500.00, 0.00, 0.00, 0.00, '2022-10-03', '2022-10-13', NULL, NULL, NULL, 2, 1, 1, '2022-10-03 12:31:20', '2022-10-03 14:24:47'),
(4, 4, 1, 3500.00, 0.00, 300.00, 3200.00, '2022-10-03', '2022-10-13', '2022-10-04', 5, 'Online', 1, 1, 1, '2022-10-03 12:31:20', '2022-10-04 09:23:56'),
(5, 7, 1, 4500.00, 0.00, 450.00, 4050.00, '2022-10-03', '2022-10-03', '2022-10-03', 2, NULL, 1, NULL, 1, '2022-10-03 13:38:36', '2022-10-03 13:39:15'),
(6, 5, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(7, 6, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(8, 7, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(9, 8, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(10, 9, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(11, 10, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(12, 11, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(13, 12, 2, 2000.00, 0.00, 200.00, 1800.00, '2022-10-04', '2022-10-20', '2022-10-04', 4, NULL, 1, 1, 1, '2022-10-04 07:26:59', '2022-10-04 10:23:58'),
(14, 13, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(15, 14, 2, 2000.00, 0.00, 200.00, 1800.00, '2022-10-04', '2022-10-20', '2022-10-04', 1, NULL, 1, 1, 1, '2022-10-04 07:26:59', '2022-10-04 10:11:26'),
(16, 15, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(17, 16, 2, 2000.00, 0.00, 200.00, 1800.00, '2022-10-04', '2022-10-20', '2022-10-04', 3, NULL, 1, 1, 1, '2022-10-04 07:26:59', '2022-10-04 10:11:18'),
(18, 17, 2, 2000.00, 0.00, 0.00, 0.00, '2022-10-04', '2022-10-20', NULL, NULL, NULL, 0, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59'),
(19, 18, 2, 2000.00, 0.00, 200.00, 1800.00, '2022-10-04', '2022-10-20', '2022-10-04', 2, 'Testing', 1, 1, 1, '2022-10-04 07:26:59', '2022-10-04 09:21:36'),
(20, 5, 3, 2000.00, 0.00, 200.00, 1800.00, '2023-02-13', '2023-02-28', '2023-02-13', 1, 'Paid', 1, 1, 1, '2023-02-13 11:53:18', '2023-02-13 11:55:00'),
(21, 6, 3, 2000.00, 0.00, 0.00, 0.00, '2023-02-13', '2023-02-28', NULL, NULL, NULL, 0, 1, NULL, '2023-02-13 11:53:18', '2023-02-13 11:53:18'),
(22, 7, 3, 2000.00, 0.00, 0.00, 0.00, '2023-02-13', '2023-02-28', NULL, NULL, NULL, 0, 1, NULL, '2023-02-13 11:53:18', '2023-02-13 11:53:18'),
(23, 8, 3, 2000.00, 0.00, 200.00, 1800.00, '2023-02-13', '2023-02-28', '2023-02-13', 2, NULL, 1, 1, 1, '2023-02-13 11:53:18', '2023-02-13 11:54:05'),
(24, 17, 3, 2000.00, 0.00, 0.00, 0.00, '2023-02-13', '2023-02-28', NULL, NULL, NULL, 0, 1, NULL, '2023-02-13 11:53:18', '2023-02-13 11:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `fees_categories`
--

CREATE TABLE `fees_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_categories`
--

INSERT INTO `fees_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admission Fees', 'admission-fees', NULL, 1, NULL, '2022-10-01 04:21:10'),
(2, 'Semester Fees', 'semester-fees', NULL, 1, NULL, '2022-10-01 04:21:21'),
(3, 'Exam Fees', 'exam-fees', NULL, 1, NULL, '2022-10-01 04:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `fees_category_fees_discount`
--

CREATE TABLE `fees_category_fees_discount` (
  `fees_category_id` int(10) UNSIGNED NOT NULL,
  `fees_discount_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_category_fees_discount`
--

INSERT INTO `fees_category_fees_discount` (`fees_category_id`, `fees_discount_id`) VALUES
(3, 3),
(2, 3),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fees_category_fees_fine`
--

CREATE TABLE `fees_category_fees_fine` (
  `fees_category_id` int(10) UNSIGNED NOT NULL,
  `fees_fine_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_category_fees_fine`
--

INSERT INTO `fees_category_fees_fine` (`fees_category_id`, `fees_fine_id`) VALUES
(1, 1),
(3, 1),
(2, 1),
(1, 2),
(3, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fees_discounts`
--

CREATE TABLE `fees_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1 Fixed & 2 Percentange',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_discounts`
--

INSERT INTO `fees_discounts` (`id`, `title`, `start_date`, `end_date`, `amount`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Winter Discount', '2022-10-03', '2022-10-31', 300.00, 1, 1, '2022-10-03 13:14:13', '2022-10-04 08:50:10'),
(3, 'Covid-19 Discount', '2022-10-04', '2023-10-04', 10.00, 2, 1, '2022-10-04 08:48:04', '2022-10-04 08:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `fees_discount_status_type`
--

CREATE TABLE `fees_discount_status_type` (
  `fees_discount_id` int(10) UNSIGNED NOT NULL,
  `status_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_fines`
--

CREATE TABLE `fees_fines` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_day` int(11) NOT NULL,
  `end_day` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1 Fixed, 2 Percentage',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_fines`
--

INSERT INTO `fees_fines` (`id`, `start_day`, `end_day`, `amount`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 15.00, 2, 1, '2022-09-30 13:58:24', '2022-09-30 13:58:24'),
(2, 6, 30, 500.00, 1, 1, '2022-09-30 13:58:59', '2022-09-30 13:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `fees_masters`
--

CREATE TABLE `fees_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `assign_date` date NOT NULL,
  `due_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1 Fixed, 2 Per Credit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_masters`
--

INSERT INTO `fees_masters` (`id`, `category_id`, `faculty_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `amount`, `assign_date`, `due_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 2, 3, 3, 0, 0, 3500.00, '2022-10-03', '2022-10-13', 1, 1, NULL, '2022-10-03 12:31:20', '2022-10-03 12:31:20', 1),
(2, 2, 0, 0, 0, 0, 0, 2000.00, '2022-10-04', '2022-10-20', 1, 1, NULL, '2022-10-04 07:26:59', '2022-10-04 07:26:59', 1),
(3, 3, 2, 2, 0, 0, 0, 200.00, '2023-02-13', '2023-02-28', 1, 1, NULL, '2023-02-13 11:53:18', '2023-02-13 11:53:18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fees_master_student_enroll`
--

CREATE TABLE `fees_master_student_enroll` (
  `fees_master_id` bigint(20) UNSIGNED NOT NULL,
  `student_enroll_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `point` decimal(5,2) NOT NULL,
  `min_mark` decimal(5,2) NOT NULL,
  `max_mark` decimal(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `title`, `point`, `min_mark`, `max_mark`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A', 5.00, 80.00, 100.00, 1, NULL, NULL),
(2, 'B', 4.00, 70.00, 79.99, 1, NULL, NULL),
(3, 'C', 3.00, 60.00, 69.99, 1, NULL, NULL),
(4, 'D', 2.00, 50.00, 59.99, 1, NULL, '2022-10-02 15:21:33'),
(5, 'E', 1.00, 40.00, 49.99, 1, NULL, NULL),
(6, 'F', 0.00, 0.00, 39.99, 1, NULL, '2022-10-02 15:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1 Boys, 2 Girls, 3 Staff, 4 Combain',
  `capacity` varchar(191) DEFAULT NULL,
  `warden_name` varchar(191) DEFAULT NULL,
  `warden_contact` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `name`, `type`, `capacity`, `warden_name`, `warden_contact`, `address`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'City Garden', 3, '50', NULL, NULL, 'Ut non proident pra', NULL, 1, '2023-02-13 13:04:25', '2023-02-13 13:10:40'),
(2, 'House of Mystery', 1, '150', NULL, NULL, 'Excepteur dicta magn', NULL, 1, '2023-02-13 13:04:43', '2023-02-13 13:10:47'),
(3, 'Rose and Rings', 2, '120', NULL, NULL, 'Commodo fugit quia', NULL, 1, '2023-02-13 13:05:00', '2023-02-13 13:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_members`
--

CREATE TABLE `hostel_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hostelable_type` varchar(191) NOT NULL,
  `hostelable_id` bigint(20) UNSIGNED NOT NULL,
  `hostel_room_id` int(10) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Inactive, 1 Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_members`
--

INSERT INTO `hostel_members` (`id`, `hostelable_type`, `hostelable_id`, `hostel_room_id`, `start_date`, `end_date`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Student', 14, 2, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:12:29', '2023-02-13 13:12:29'),
(2, 'App\\Models\\Student', 12, 3, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:12:39', '2023-02-13 13:12:39'),
(3, 'App\\Models\\Student', 10, 2, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:12:45', '2023-02-13 13:12:45'),
(4, 'App\\Models\\Student', 9, 1, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:13:00', '2023-02-13 13:13:00'),
(5, 'App\\User', 8, 5, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:13:32', '2023-02-13 13:13:32'),
(6, 'App\\User', 3, 6, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:13:37', '2023-02-13 13:13:37'),
(7, 'App\\User', 2, 6, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:13:42', '2023-02-13 13:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_rooms`
--

CREATE TABLE `hostel_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `hostel_id` int(10) UNSIGNED NOT NULL,
  `room_type_id` int(10) UNSIGNED NOT NULL,
  `bed` int(11) NOT NULL DEFAULT 1,
  `fee` double(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_rooms`
--

INSERT INTO `hostel_rooms` (`id`, `name`, `hostel_id`, `room_type_id`, `bed`, `fee`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A1', 3, 1, 2, NULL, 'Ex atque consequatur', 1, '2023-02-13 13:06:01', '2023-02-13 13:06:01'),
(2, 'A2', 2, 4, 3, NULL, 'Et ut ut sint ex rat', 1, '2023-02-13 13:06:13', '2023-02-13 13:07:29'),
(3, 'A3', 3, 4, 3, NULL, 'Fugiat aut sit nost', 1, '2023-02-13 13:06:25', '2023-02-13 13:06:25'),
(4, 'A4', 2, 2, 3, NULL, 'Sit voluptate fugia', 1, '2023-02-13 13:06:40', '2023-02-13 13:06:56'),
(5, 'A5', 1, 4, 3, NULL, 'Eveniet eu consecte', 1, '2023-02-13 13:07:16', '2023-02-13 13:07:16'),
(6, 'A6', 1, 1, 2, NULL, 'Enim quis molestias', 1, '2023-02-13 13:07:50', '2023-02-13 13:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_room_types`
--

CREATE TABLE `hostel_room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `fee` double(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_room_types`
--

INSERT INTO `hostel_room_types` (`id`, `title`, `fee`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AC 2 Bed', 2500.00, NULL, 1, '2023-02-13 13:03:07', '2023-02-13 13:03:07'),
(2, 'AC 3 Bed', 2000.00, NULL, 1, '2023-02-13 13:03:17', '2023-02-13 13:03:17'),
(3, 'Non-AC 2 Bed', 1700.00, NULL, 1, '2023-02-13 13:03:41', '2023-02-13 13:03:41'),
(4, 'Non-AC 3 Bed', 1200.00, NULL, 1, '2023-02-13 13:03:54', '2023-02-13 13:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_settings`
--

CREATE TABLE `id_card_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `subtitle` varchar(191) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `website_url` varchar(191) DEFAULT NULL,
  `validity` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `student_photo` tinyint(1) NOT NULL DEFAULT 0,
  `signature` tinyint(1) NOT NULL DEFAULT 0,
  `barcode` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `id_card_settings`
--

INSERT INTO `id_card_settings` (`id`, `slug`, `title`, `subtitle`, `logo`, `background`, `website_url`, `validity`, `address`, `student_photo`, `signature`, `barcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'student-card', 'CORPORACION TECNOLÓGICA DE BOGOTA', 'CTB', NULL, NULL, NULL, '5', 'BOGOTÁ - COLOMBIA', 0, 0, 0, 1, '2022-09-30 12:16:48', '2023-07-12 15:53:52'),
(2, 'library-card', 'Our University Library Card', 'Our University Slogan', NULL, NULL, NULL, '5', 'Mirpur, Dhaka 1208', 0, 0, 0, 1, '2022-09-30 14:14:49', '2022-09-30 14:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `invoice_id` varchar(191) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `category_id`, `title`, `invoice_id`, `amount`, `date`, `payment_method`, `note`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sint reprehenderit', '789452', 758.00, '2021-02-25', NULL, 'Praesentium et nostr', 'background-border_1664651865.png', 1, 1, NULL, '2022-10-01 13:17:45', '2022-10-01 13:17:45'),
(2, 4, 'Rerum in ducimus es', '78147', 365.00, '2022-03-01', 1, 'Commodo enim maxime', NULL, 1, 1, 1, '2022-10-01 13:18:15', '2023-02-13 12:05:42'),
(3, 3, 'Velit iure velit qui', '78458', 254.00, '2020-07-19', NULL, 'Aliquid at sit inci', NULL, 1, 1, 1, '2022-10-01 13:18:33', '2022-10-01 13:18:49'),
(4, 5, 'Expedita voluptas pr', '758426', 905.00, '2022-05-19', 2, 'Esse laboris quis re', NULL, 1, 1, 1, '2022-10-01 13:19:17', '2023-02-13 12:05:34'),
(5, 6, 'Fugiat ad non digni', '458752', 548.00, '2022-05-30', 3, 'Quidem temporibus qu', 'background-border_1664651984.png', 1, 1, 1, '2022-10-01 13:19:44', '2023-02-13 12:05:26'),
(6, 3, 'Non in voluptatem A', '87458', 654.00, '2021-11-22', NULL, 'Ut deleniti voluptas', NULL, 1, 1, 1, '2022-10-01 13:20:24', '2022-10-01 13:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shop Rent', 'shop-rent', NULL, 1, '2022-09-30 14:07:22', '2022-09-30 14:07:22'),
(2, 'Hostel Fees', 'hostel-fees', NULL, 1, '2022-09-30 14:07:58', '2022-09-30 14:07:58'),
(3, 'Waste Sell', 'waste-sell', NULL, 1, '2022-09-30 14:09:14', '2022-09-30 14:09:14'),
(4, 'Donation', 'donation', NULL, 1, '2022-10-01 04:09:18', '2022-10-01 04:09:18'),
(5, 'Book Sell', 'book-sell', NULL, 1, '2022-10-01 04:10:13', '2022-10-01 04:10:13'),
(6, 'Uniform Sell', 'uniform-sell', NULL, 1, '2022-10-01 04:10:55', '2022-10-01 04:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `inscriptionform`
--

CREATE TABLE `inscriptionform` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `tipo_de_inscripcin` varchar(255) DEFAULT NULL,
  `modalidad` varchar(255) DEFAULT NULL,
  `metodologa` varchar(255) DEFAULT NULL,
  `programa_acadmico` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `ciudad_de_nacimiento` varchar(255) DEFAULT NULL,
  `tipo_de_sangre_y_rh` varchar(255) DEFAULT NULL,
  `estado_civil` varchar(255) DEFAULT NULL,
  `jornada` varchar(255) DEFAULT NULL,
  `fecha_de_nacimiento` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `alergias__a_alguna_sustancia_o_material` varchar(255) DEFAULT NULL,
  `cual` varchar(255) DEFAULT NULL,
  `direccin_de_residencia` varchar(255) DEFAULT NULL,
  `nombre_de_plantel_educativo_donde_termin_secundaria` varchar(255) DEFAULT NULL,
  `cod_area` varchar(255) DEFAULT NULL,
  `libreta_militar` varchar(255) DEFAULT NULL,
  `ttulo_obtenido` varchar(255) DEFAULT NULL,
  `eps` varchar(255) DEFAULT NULL,
  `nmero_de_snp_saber_11` varchar(255) DEFAULT NULL,
  `tipo_de_documento_con_el_que_presento_el_examen` varchar(255) DEFAULT NULL,
  `fecha_spn_saber_11` varchar(255) DEFAULT NULL,
  `puntaje_obtenido` varchar(255) DEFAULT NULL,
  `nmero_de_documento_con_el_que_presento_el_icfes` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccin_de_residencia_42` varchar(255) DEFAULT NULL,
  `tipo_de_relacin` varchar(255) DEFAULT NULL,
  `genero_41` varchar(255) DEFAULT NULL,
  `tipo_de_documento` varchar(255) DEFAULT NULL,
  `numero_de_documento` varchar(255) DEFAULT NULL,
  `telfono` varchar(255) DEFAULT NULL,
  `ciudad_de_trabajo` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `correo_electrnico` varchar(255) DEFAULT NULL,
  `sitio_de_trabajo` varchar(255) DEFAULT NULL,
  `profesin` varchar(255) DEFAULT NULL,
  `ocupacin` varchar(255) DEFAULT NULL,
  `telfono_del_trabajo` varchar(255) DEFAULT NULL,
  `nivel_de_estudio` varchar(255) DEFAULT NULL,
  `direccin_del_trabajo` varchar(255) DEFAULT NULL,
  `vos_a_vos` varchar(255) DEFAULT NULL,
  `ferias_universitarias` varchar(255) DEFAULT NULL,
  `comunidad_ctbista` varchar(255) DEFAULT NULL,
  `redes_sociales` varchar(255) DEFAULT NULL,
  `egresados` varchar(255) DEFAULT NULL,
  `estudiante_de_la_ctb` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `empresas` varchar(255) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  `metas_profesionales_mediano_plazo` longtext DEFAULT NULL,
  `metas_profesionales_largo_plazo` longtext DEFAULT NULL,
  `metas_personales_mediano_plazo` longtext DEFAULT NULL,
  `metas_personales_largo_plazo` longtext DEFAULT NULL,
  `cules_son_sus_fortalezas` longtext DEFAULT NULL,
  `cules_son_sus_debilidades` longtext DEFAULT NULL,
  `cmo_convertira_las_debilidades_descritas_en_fortalezas` longtext DEFAULT NULL,
  `hace_cunto_tiempo_termino_la_educacin_media` longtext DEFAULT NULL,
  `cules_son_las_materias_que_le_generaron__mayor_dificultad_en` longtext DEFAULT NULL,
  `cules_son_las_materias__que_ms_le_agradaban` longtext DEFAULT NULL,
  `qu_le_gusta_hacer_en_su_tiempo_libre` longtext DEFAULT NULL,
  `qu_le_motivo_para_elegir_esta_carrera_y_no_otra` longtext DEFAULT NULL,
  `cul_es_el_campo_de_accin_en_el_que_se_puede_desempear_y_que` longtext DEFAULT NULL,
  `qu_perspectivas_profesionales_tiene_o_en_qu_campo_de_esta_ra` longtext DEFAULT NULL,
  `cul_sera_su__aporte_para_la_sociedad_a_partir_de_la_carrera` longtext DEFAULT NULL,
  `qu_otras_instituciones_de_educacin_superior_ofrecen_la_carre` longtext DEFAULT NULL,
  `conoce_el_valor_de_la_carrera_y_que_fuentes_de_financiamient` longtext DEFAULT NULL,
  `cules_opciones_de_grado_para_optar_al_ttulo_de_tecnlogo_cono` longtext DEFAULT NULL,
  `por_qu_quiere_estudiar_en_la_ctb_y_que_es_lo_que_ms_le_inter` longtext DEFAULT NULL,
  `cules_son_sus_expectativas_al_ingresar_a_la_ctb` longtext DEFAULT NULL,
  `por_qu_deberamos__aceptarlo_en_la_ctb` longtext DEFAULT NULL,
  `cmo_contribuira_usted_al_crecimiento_de_la_institucin_desde` longtext DEFAULT NULL,
  `cul_es_la_cantidad_mensual_de_dinero_que_recibe_el_ncleo_fam` varchar(255) DEFAULT NULL,
  `tiene_personas_a_cargo_econmicamente` varchar(255) DEFAULT NULL,
  `los_ingresos_para_financiar_su_educacin_son` varchar(255) DEFAULT NULL,
  `si_usted_labora_cuntos_son_sus_ingresos_mensuales` varchar(255) DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inscriptionwp`
--

CREATE TABLE `inscriptionwp` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `inscription_type` varchar(255) DEFAULT NULL,
  `modalidad` varchar(255) DEFAULT NULL,
  `metodologa` varchar(255) DEFAULT NULL,
  `programa_acadmico` varchar(255) DEFAULT NULL,
  `jornada` varchar(255) DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue_returns`
--

CREATE TABLE `issue_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `penalty` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Lost, 1 Issued, 2 Returned',
  `issued_by` bigint(20) UNSIGNED DEFAULT NULL,
  `received_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issue_returns`
--

INSERT INTO `issue_returns` (`id`, `member_id`, `book_id`, `issue_date`, `due_date`, `return_date`, `penalty`, `status`, `issued_by`, `received_by`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '2022-10-03', '2022-10-13', '2022-10-03', NULL, 2, 1, 1, '2022-10-03 15:05:37', '2022-10-03 15:07:20'),
(2, 5, 3, '2022-10-03', '2023-01-12', NULL, NULL, 1, 1, NULL, '2022-10-03 15:06:13', '2022-10-03 15:06:13'),
(3, 14, 4, '2022-10-03', '2022-12-21', NULL, NULL, 1, 1, NULL, '2022-10-03 15:06:34', '2022-10-03 15:06:34'),
(4, 9, 1, '2022-10-03', '2022-12-13', NULL, NULL, 1, 1, NULL, '2022-10-03 15:06:58', '2022-10-03 15:06:58'),
(5, 21, 2, '2022-10-04', '2022-11-14', NULL, NULL, 1, 1, NULL, '2022-10-04 07:41:08', '2022-10-04 07:41:08'),
(6, 21, 5, '2022-10-04', '2022-10-14', '2022-10-04', NULL, 2, 1, 1, '2022-10-04 07:42:03', '2022-10-04 07:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `unit` varchar(191) DEFAULT NULL,
  `serial_number` varchar(191) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category_id`, `unit`, `serial_number`, `quantity`, `description`, `attach`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Acid', 1, 'Pound', NULL, 0, NULL, NULL, 1, '2023-02-13 13:26:53', '2023-02-13 13:29:35'),
(2, 'Volt Metar', 3, 'Digital', NULL, 0, NULL, NULL, 1, '2023-02-13 13:27:57', '2023-02-13 13:29:51'),
(3, 'Cricket Bat', 2, 'M Size', NULL, 0, NULL, NULL, 1, '2023-02-13 13:28:15', '2023-02-13 13:29:01'),
(4, 'Football', 2, '5 No', NULL, 0, NULL, NULL, 1, '2023-02-13 13:28:27', '2023-02-13 13:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chemistry Lab Equipment', 'chemistry-lab-equipment', NULL, 1, '2023-02-13 13:22:02', '2023-02-13 13:22:23'),
(2, 'Sports Equipment', 'sports-equipment', NULL, 1, '2023-02-13 13:22:10', '2023-02-13 13:22:31'),
(3, 'Electrical Lab Equipment', 'electrical-lab-equipment', NULL, 1, '2023-02-13 13:23:01', '2023-02-13 13:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `item_issues`
--

CREATE TABLE `item_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `penalty` decimal(10,2) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Lost, 1 Issued, 2 Returned',
  `issued_by` bigint(20) UNSIGNED DEFAULT NULL,
  `received_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_issues`
--

INSERT INTO `item_issues` (`id`, `item_id`, `user_id`, `quantity`, `issue_date`, `due_date`, `return_date`, `penalty`, `note`, `attach`, `status`, `issued_by`, `received_by`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, '2023-02-06', '2023-02-08', NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-02-13 13:34:54', '2023-02-13 13:34:54'),
(2, 4, 2, 1, '2023-02-13', '2023-02-13', '2023-02-13', NULL, NULL, NULL, 2, 1, 1, '2023-02-13 13:35:32', '2023-02-13 13:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `item_stocks`
--

CREATE TABLE `item_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) DEFAULT NULL,
  `date` date NOT NULL,
  `reference` varchar(191) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_stocks`
--

INSERT INTO `item_stocks` (`id`, `item_id`, `supplier_id`, `store_id`, `quantity`, `price`, `date`, `reference`, `payment_method`, `description`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 10, 650.00, '2022-10-10', NULL, 1, 'Quia et et aliquam q', NULL, 1, 1, NULL, '2023-02-13 13:30:33', '2023-02-13 13:30:33'),
(2, 4, 1, 1, 5, 350.00, '2023-01-19', NULL, 5, 'Laborum in tempore', NULL, 1, 1, NULL, '2023-02-13 13:31:19', '2023-02-13 13:31:19'),
(3, 1, 2, 2, 17, 230.00, '2023-01-21', NULL, 4, 'Cumque praesentium v', NULL, 1, 1, NULL, '2023-02-13 13:32:02', '2023-02-13 13:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `item_stores`
--

CREATE TABLE `item_stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `store_no` varchar(191) NOT NULL,
  `in_charge` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_stores`
--

INSERT INTO `item_stores` (`id`, `title`, `store_no`, `in_charge`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sports Store', '001', NULL, 'rurapovome@mailinator.com', '+1 (904) 944-3416', 'Building 1', 1, '2023-02-13 13:25:30', '2023-02-13 13:25:58'),
(2, 'Lab Store', '002', NULL, 'vofujyweh@mailinator.com', '+1 (603) 435-3949', 'Building 2', 1, '2023-02-13 13:25:51', '2023-02-13 13:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `item_suppliers`
--

CREATE TABLE `item_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_person` varchar(191) DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `contact_person_email` varchar(191) DEFAULT NULL,
  `contact_person_phone` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_suppliers`
--

INSERT INTO `item_suppliers` (`id`, `title`, `email`, `phone`, `address`, `contact_person`, `designation`, `contact_person_email`, `contact_person_phone`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DJ Sports Ltd', 'satudo@mailinator.com', '+1 (226) 353-9362', 'Enim nihil aperiam v', 'Habib', 'Manager', 'zenigigyqo@mailinator.com', '+1 (662) 469-3061', 'Molestias distinctio', 1, '2023-02-13 13:24:00', '2023-02-13 13:24:00'),
(2, 'SF Cemix', 'pezu@mailinator.com', '+1 (713) 437-2232', 'Id ex veniam in et', 'Saif', 'Executive', 'cusopiwu@mailinator.com', '+1 (819) 924-8146', 'Sed quis magnam elig', 1, '2023-02-13 13:24:49', '2023-02-13 13:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `direction` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 LTR, 1 RTL',
  `default` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 Not Default, 1 Default',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `description`, `direction`, `default`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', NULL, 0, 0, 1, '2022-09-30 12:00:47', '2023-07-27 17:54:15'),
(2, 'Español', 'es', NULL, 0, 1, 1, '2023-07-12 14:00:16', '2023-07-27 17:54:15'),
(3, 'Frances', 'Fr', NULL, 0, 0, 1, '2023-07-25 13:03:57', '2023-07-27 17:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review_by` bigint(20) UNSIGNED DEFAULT NULL,
  `apply_date` date NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `reason` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `pay_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 Paid & 2 Unpaid',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 Pending, 1 Approved and 2 Rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `type_id`, `user_id`, `review_by`, `apply_date`, `from_date`, `to_date`, `reason`, `attach`, `note`, `pay_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-10-02', '2022-10-02', '2022-10-08', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, 1, 2, '2022-10-02 12:00:39', '2022-10-02 12:02:46'),
(2, 2, 1, 1, '2022-10-02', '2022-10-20', '2022-10-24', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'book-covers_1664733674.jpg', NULL, 2, 1, '2022-10-02 12:01:14', '2022-10-02 12:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `limit` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `title`, `slug`, `limit`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Casual Leave', 'casual-leave', NULL, NULL, 1, NULL, NULL),
(2, 'Sick Leave', 'sick-leave', NULL, NULL, 1, NULL, NULL),
(3, 'Maternity Leave', 'maternity-leave', NULL, NULL, 1, NULL, NULL),
(4, 'Marriage Leave', 'marriage-leave', NULL, NULL, 1, NULL, NULL),
(5, 'Bereavement Leave', 'bereavement-leave', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `library_members`
--

CREATE TABLE `library_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `memberable_type` varchar(191) NOT NULL,
  `memberable_id` bigint(20) UNSIGNED NOT NULL,
  `library_id` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Inactive, 1 Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `library_members`
--

INSERT INTO `library_members` (`id`, `memberable_type`, `memberable_id`, `library_id`, `date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Student', 1, 'L1001', '2027-10-03', 1, 1, NULL, '2022-10-03 05:32:53', '2022-10-03 05:32:53'),
(2, 'App\\Models\\Student', 2, 'L1002', '2027-10-03', 0, 1, 1, '2022-10-03 05:33:11', '2022-10-03 05:42:05'),
(3, 'App\\Models\\Student', 3, 'L1003', '2027-10-03', 1, 1, NULL, '2022-10-03 05:33:18', '2022-10-03 05:33:18'),
(4, 'App\\Models\\Student', 5, 'L1004', '2027-10-03', 1, 1, NULL, '2022-10-03 05:33:48', '2022-10-03 05:33:48'),
(5, 'App\\Models\\Student', 6, 'L1005', '2027-10-03', 1, 1, NULL, '2022-10-03 05:33:57', '2022-10-03 05:33:57'),
(6, 'App\\Models\\Student', 8, 'L1006', '2027-10-03', 1, 1, NULL, '2022-10-03 05:35:11', '2022-10-03 05:35:11'),
(7, 'App\\User', 9, 'L1009', '2027-10-03', 1, 1, NULL, '2022-10-03 05:40:24', '2022-10-03 05:40:24'),
(8, 'App\\User', 8, 'L1010', '2027-10-03', 1, 1, NULL, '2022-10-03 05:40:39', '2022-10-03 05:40:39'),
(9, 'App\\User', 6, 'L1011', '2027-10-03', 1, 1, NULL, '2022-10-03 05:40:49', '2022-10-03 05:40:49'),
(10, 'App\\User', 5, 'L1012', '2027-10-03', 1, 1, NULL, '2022-10-03 05:40:59', '2022-10-03 05:40:59'),
(11, 'App\\User', 4, 'L1013', '2027-10-03', 0, 1, 1, '2022-10-03 05:41:09', '2022-10-03 05:41:49'),
(12, 'App\\User', 3, 'L1014', '2027-10-03', 1, 1, NULL, '2022-10-03 05:41:20', '2022-10-03 05:41:20'),
(13, 'App\\User', 1, 'L1015', '2027-10-03', 1, 1, NULL, '2022-10-03 05:41:29', '2022-10-03 05:41:29'),
(14, 'App\\Models\\OutsideUser', 1, 'L1016', '2027-10-03', 1, 1, NULL, '2022-10-03 05:44:53', '2022-10-03 05:44:53'),
(15, 'App\\Models\\OutsideUser', 2, 'L1017', '2027-10-03', 1, 1, NULL, '2022-10-03 05:45:41', '2022-10-03 05:45:41'),
(16, 'App\\Models\\OutsideUser', 3, 'L1018', '2027-10-03', 0, 1, 1, '2022-10-03 05:46:30', '2022-10-03 05:48:52'),
(17, 'App\\Models\\OutsideUser', 4, 'L1020', '2027-10-03', 1, 1, NULL, '2022-10-03 05:48:01', '2022-10-03 05:48:01'),
(18, 'App\\Models\\Student', 10, 'L1021', '2027-10-04', 1, 1, NULL, '2022-10-04 07:39:22', '2022-10-04 07:39:22'),
(19, 'App\\Models\\Student', 11, 'L1022', '2027-10-04', 1, 1, NULL, '2022-10-04 07:39:31', '2022-10-04 07:39:31'),
(20, 'App\\Models\\Student', 13, 'L1023', '2027-10-04', 0, 1, 1, '2022-10-04 07:39:42', '2022-10-04 07:39:45'),
(21, 'App\\Models\\Student', 14, 'L1024', '2027-10-04', 1, 1, NULL, '2022-10-04 07:39:52', '2022-10-04 07:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver` text DEFAULT NULL,
  `host` text DEFAULT NULL,
  `port` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `encryption` text DEFAULT NULL,
  `sender_email` text DEFAULT NULL,
  `sender_name` text DEFAULT NULL,
  `reply_email` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `driver`, `host`, `port`, `username`, `password`, `encryption`, `sender_email`, `sender_name`, `reply_email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'netlogyc@gmail.com', '465', 'netlogyc@gmail.com', 'pbqlrefiymtvxqc', 'ssl', 'netlogyc@gmail.com', 'NETLOGYC CORP', 'info@mail.com', 1, '2022-09-30 12:00:47', '2023-07-12 20:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `marksheet_settings`
--

CREATE TABLE `marksheet_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `header_left` text DEFAULT NULL,
  `header_center` text DEFAULT NULL,
  `header_right` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `footer_left` text DEFAULT NULL,
  `footer_center` text DEFAULT NULL,
  `footer_right` text DEFAULT NULL,
  `logo_left` text DEFAULT NULL,
  `logo_right` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `width` varchar(191) NOT NULL DEFAULT 'auto',
  `height` varchar(191) NOT NULL DEFAULT 'auto',
  `student_photo` tinyint(1) NOT NULL DEFAULT 0,
  `barcode` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marksheet_settings`
--

INSERT INTO `marksheet_settings` (`id`, `title`, `header_left`, `header_center`, `header_right`, `body`, `footer_left`, `footer_center`, `footer_right`, `logo_left`, `logo_right`, `background`, `width`, `height`, `student_photo`, `barcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Our University Academic Transcript', NULL, NULL, NULL, NULL, 'Controller', 'Director', 'Register', 'logo_1664613886.jpg', 'logo_1664613886.jpg', NULL, '800px', 'auto', 0, 0, 1, '2022-10-01 02:44:46', '2022-10-01 03:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_schedules`
--

CREATE TABLE `meeting_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `id_no` varchar(191) DEFAULT NULL,
  `token` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `persons` varchar(191) DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_schedules`
--

INSERT INTO `meeting_schedules` (`id`, `type_id`, `user_id`, `name`, `father_name`, `phone`, `email`, `address`, `purpose`, `note`, `id_no`, `token`, `date`, `in_time`, `out_time`, `persons`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Channing Hicks', 'Felix Conway', '+1 (169) 929-4323', 'webizigi@mailinator.com', 'Ut sed proident del', 'Fugit provident ip', 'Est quam amet nobi', '458787', 'Pass-100001', '2023-10-09', '17:29:00', '08:22:00', '1', NULL, 1, 1, NULL, '2023-02-13 12:30:58', '2023-02-13 12:30:58'),
(2, 2, 8, 'Elaine Guerra', 'Zeus Phelps', '+1 (274) 544-4761', 'zaja@mailinator.com', 'Aut neque saepe pari', 'Fuga Obcaecati haru', 'Est minim iste ea re', '54877', 'Pass-100002', '2023-02-13', '09:45:00', '02:04:00', '2', NULL, 1, 1, 1, '2023-02-13 12:31:57', '2023-02-13 12:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_types`
--

CREATE TABLE `meeting_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_types`
--

INSERT INTO `meeting_types` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Board Meeting', 'board-meeting', NULL, 1, '2023-02-13 12:23:18', '2023-02-13 12:23:18'),
(2, 'Parent Teacher Meeting', 'parent-teacher-meeting', NULL, 1, '2023-02-13 12:23:34', '2023-02-13 12:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_06_04_092405_create_faculties_table', 1),
(5, '2021_06_04_102314_create_programs_table', 1),
(6, '2021_06_04_114619_create_batches_table', 1),
(7, '2021_06_04_120154_create_sessions_table', 1),
(8, '2021_06_04_131456_create_semesters_table', 1),
(9, '2021_06_04_132856_create_sections_table', 1),
(10, '2021_06_04_141432_create_class_rooms_table', 1),
(11, '2021_06_05_121933_create_income_categories_table', 1),
(12, '2021_06_05_125236_create_incomes_table', 1),
(13, '2021_06_05_144224_create_expense_categories_table', 1),
(14, '2021_06_05_150317_create_expenses_table', 1),
(15, '2021_06_07_152605_create_subjects_table', 1),
(16, '2021_06_07_155306_create_enroll_subjects_table', 1),
(17, '2021_06_07_160042_create_enroll_subject_subject_table', 1),
(18, '2021_06_08_102053_create_program_subject_table', 1),
(19, '2021_06_08_105550_create_batch_program_table', 1),
(20, '2021_06_08_125338_create_program_semester_table', 1),
(21, '2021_06_08_125531_create_program_class_room_table', 1),
(22, '2021_06_08_180439_create_program_session_table', 1),
(23, '2021_06_08_182844_create_program_semester_sections_table', 1),
(24, '2021_06_09_133442_create_class_routines_table', 1),
(25, '2021_06_12_153215_create_departments_table', 1),
(26, '2021_06_12_155411_create_designations_table', 1),
(27, '2021_06_13_075755_create_leave_types_table', 1),
(28, '2021_06_13_125451_create_leaves_table', 1),
(29, '2021_06_13_173512_create_work_shift_types_table', 1),
(30, '2021_06_13_175400_create_tax_settings_table', 1),
(31, '2021_06_13_193417_create_user_program_table', 1),
(32, '2021_06_15_184223_create_staff_attendances_table', 1),
(33, '2021_06_16_180912_create_staff_hourly_attendances_table', 1),
(34, '2021_06_17_083411_create_payrolls_table', 1),
(35, '2021_06_22_185503_create_jobs_table', 1),
(36, '2021_07_07_081616_create_students_table', 1),
(37, '2021_07_07_182329_create_student_relatives_table', 1),
(38, '2021_07_07_190034_create_documents_table', 1),
(39, '2021_07_07_192727_create_docables_table', 1),
(40, '2021_07_08_054948_create_student_enrolls_table', 1),
(41, '2021_07_08_172152_create_student_transfers_table', 1),
(42, '2021_07_08_195650_create_transfer_creadits_table', 1),
(43, '2021_07_09_061940_create_status_types_table', 1),
(44, '2021_07_09_092958_create_status_type_student_table', 1),
(45, '2021_07_09_163443_create_student_enroll_subject_table', 1),
(46, '2021_07_09_173413_create_student_leaves_table', 1),
(47, '2021_07_09_194126_create_student_attendances_table', 1),
(48, '2021_07_17_160726_create_events_table', 1),
(49, '2021_07_18_074323_create_notice_categories_table', 1),
(50, '2021_07_18_080209_create_notices_table', 1),
(51, '2021_07_18_105550_create_noticeables_table', 1),
(52, '2021_07_19_182908_create_email_notifies_table', 1),
(53, '2021_07_19_200327_create_s_m_s_notifies_table', 1),
(54, '2021_09_01_070002_create_exam_types_table', 1),
(55, '2021_09_01_071547_create_result_contributions_table', 1),
(56, '2021_09_01_084615_create_grades_table', 1),
(57, '2021_09_02_184433_create_exams_table', 1),
(58, '2021_09_04_101915_create_subject_markings_table', 1),
(59, '2021_09_27_183257_create_certificate_templates_table', 1),
(60, '2021_10_01_163600_create_certificates_table', 1),
(61, '2021_10_15_182241_create_marksheet_settings_table', 1),
(62, '2022_01_21_142336_create_print_settings_table', 1),
(63, '2022_01_21_170648_create_visit_purposes_table', 1),
(64, '2022_01_21_171901_create_visitors_table', 1),
(65, '2022_01_21_185105_create_postal_exchange_types_table', 1),
(66, '2022_01_21_185152_create_postal_exchanges_table', 1),
(67, '2022_01_21_185201_create_phone_logs_table', 1),
(68, '2022_01_22_103339_create_complain_types_table', 1),
(69, '2022_01_22_103551_create_complain_sources_table', 1),
(70, '2022_01_22_103657_create_complains_table', 1),
(71, '2022_01_23_103439_create_enquiry_sources_table', 1),
(72, '2022_01_23_110653_create_enquiry_references_table', 1),
(73, '2022_01_23_114509_create_enquiries_table', 1),
(74, '2022_01_24_174515_create_assignments_table', 1),
(75, '2022_01_24_179252_create_student_assignments_table', 1),
(76, '2022_01_24_181419_create_content_types_table', 1),
(77, '2022_01_25_165931_create_contents_table', 1),
(78, '2022_01_26_105511_create_contentables_table', 1),
(79, '2022_01_27_100200_create_notifications_table', 1),
(80, '2022_01_28_131433_create_book_categories_table', 1),
(81, '2022_01_28_173902_create_books_table', 1),
(82, '2022_01_29_045003_create_outside_users_table', 1),
(83, '2022_01_29_045120_create_library_members_table', 1),
(84, '2022_01_29_093915_create_issue_returns_table', 1),
(85, '2022_01_31_061950_create_notes_table', 1),
(86, '2022_02_15_173515_create_fees_categories_table', 1),
(87, '2022_02_15_182124_create_fees_masters_table', 1),
(88, '2022_02_16_100327_create_fees_master_student_enroll', 1),
(89, '2022_02_26_184930_create_fees_fines_table', 1),
(90, '2022_02_26_191642_create_fees_category_fees_fine_table', 1),
(91, '2022_03_04_172257_create_fees_discounts_table', 1),
(92, '2022_03_05_132058_create_fees_category_fees_discount_table', 1),
(93, '2022_03_05_132541_create_fees_discount_status_type_table', 1),
(94, '2022_03_05_195051_create_fees_table', 1),
(95, '2022_03_05_203440_create_transactions_table', 1),
(96, '2022_03_10_131324_create_exam_routines_table', 1),
(97, '2022_03_10_131936_create_exam_routine_user_table', 1),
(98, '2022_03_10_132124_create_exam_routine_room_table', 1),
(99, '2022_03_31_074913_create_id_card_settings_table', 1),
(100, '2022_04_01_125726_create_settings_table', 1),
(101, '2022_04_01_210417_create_languages_table', 1),
(102, '2022_04_02_144303_create_permission_tables', 1),
(103, '2022_04_03_103141_create_mail_settings_table', 1),
(104, '2022_04_03_173021_create_s_m_s_settings_table', 1),
(105, '2022_04_03_174009_create_schedule_settings_table', 1),
(106, '2022_04_04_123222_create_provinces_table', 1),
(107, '2022_04_04_173222_create_districts_table', 1),
(108, '2021_06_17_183706_create_payroll_details_table', 2),
(109, '2021_07_04_172713_create_application_settings_table', 2),
(110, '2021_07_06_121630_create_applications_table', 2),
(111, '2022_01_23_192650_create_meeting_types_table', 2),
(112, '2022_01_23_202252_create_meeting_schedules_table', 2),
(113, '2022_01_28_195224_create_book_requests_table', 2),
(114, '2022_11_20_171503_create_item_categories_table', 2),
(115, '2022_11_20_182303_create_item_stores_table', 2),
(116, '2022_11_20_185841_create_item_suppliers_table', 2),
(117, '2022_11_21_190954_create_items_table', 2),
(118, '2022_11_21_194218_create_item_stocks_table', 2),
(119, '2022_11_21_200834_create_item_issues_table', 2),
(120, '2022_12_08_140339_create_hostel_room_types_table', 2),
(121, '2022_12_08_193208_create_hostels_table', 2),
(122, '2022_12_10_203126_create_hostel_rooms_table', 2),
(123, '2022_12_14_181050_create_hostel_members_table', 2),
(124, '2022_12_22_112935_create_transport_routes_table', 2),
(125, '2022_12_23_110116_create_transport_vehicles_table', 2),
(126, '2022_12_23_112400_create_transport_route_transport_vehicle_table', 2),
(127, '2022_12_24_121402_create_transport_members_table', 2),
(128, '2022_12_29_173356_add_fields_to_tables', 2),
(129, '2023_08_01_224205_add_columns_on_users_table', 3),
(130, '2023_08_02_173654_add_columns_on_subjects_table', 4),
(131, '2023_08_03_132651_create_preregistrations_table', 4),
(132, '2023_08_04_125405_add_columns_on_subjects_table2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 10),
(2, 'App\\User', 9),
(3, 'App\\User', 8),
(4, 'App\\User', 2),
(5, 'App\\User', 6),
(6, 'App\\User', 3),
(6, 'App\\User', 4),
(6, 'App\\User', 5),
(6, 'App\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `my_custom_table`
--

CREATE TABLE `my_custom_table` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `fecha__hora` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo_id` varchar(255) DEFAULT NULL,
  `nmeros` varchar(255) DEFAULT NULL,
  `correo_electrnico` varchar(255) DEFAULT NULL,
  `comentario_o_mensaje` longtext DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noteable_type` varchar(191) NOT NULL,
  `noteable_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `noteable_type`, `noteable_id`, `title`, `description`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 7, 'Ex maxime do expedit', 'Eligendi placeat ea', NULL, 1, 1, NULL, '2022-10-02 11:56:15', '2022-10-02 11:56:15'),
(2, 'App\\User', 9, 'Nemo libero maiores', 'Est nemo irure qui e', 'book-covers_1664733426.jpg', 1, 1, 1, '2022-10-02 11:56:20', '2022-10-02 11:57:06'),
(3, 'App\\User', 8, 'Dolorum voluptatem e', 'Mollitia at odit num', NULL, 1, 1, NULL, '2022-10-02 11:56:55', '2022-10-02 11:56:55'),
(4, 'App\\Models\\Student', 3, 'Dolor aut excepturi', 'Culpa labore fugit', NULL, 1, 1, NULL, '2022-10-02 12:40:45', '2022-10-02 12:40:45'),
(5, 'App\\Models\\Student', 6, 'Magna culpa distinc', 'At ullam magni autem', 'book-covers_1664736057.jpg', 1, 1, NULL, '2022-10-02 12:40:57', '2022-10-02 12:40:57'),
(6, 'App\\Models\\Student', 4, 'Et nulla sint ut no', 'Rerum sit nostrud l', NULL, 1, 1, NULL, '2022-10-02 12:41:02', '2022-10-02 12:41:02'),
(7, 'App\\Models\\Student', 1, 'Est magnam exercita', 'Aliquid deserunt asp', 'book-cover2_1664736079.jpg', 1, 1, NULL, '2022-10-02 12:41:19', '2022-10-02 12:41:19'),
(8, 'App\\Models\\Student', 13, 'Assumenda ad corpori', 'Qui ea impedit a ex', 'background-border_1664885966.png', 1, 1, NULL, '2022-10-04 06:19:26', '2022-10-04 06:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `noticeables`
--

CREATE TABLE `noticeables` (
  `notice_id` bigint(20) NOT NULL,
  `noticeable_id` bigint(20) NOT NULL,
  `noticeable_type` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `noticeables`
--

INSERT INTO `noticeables` (`notice_id`, `noticeable_id`, `noticeable_type`) VALUES
(1, 4, 'App\\Models\\Student'),
(1, 3, 'App\\Models\\Student'),
(1, 2, 'App\\Models\\Student'),
(1, 1, 'App\\Models\\Student'),
(2, 14, 'App\\Models\\Student'),
(2, 12, 'App\\Models\\Student'),
(2, 11, 'App\\Models\\Student'),
(2, 10, 'App\\Models\\Student');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `notice_no` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `faculty_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `category_id`, `notice_no`, `title`, `description`, `date`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 0, 0, 0, 4, '1001', 'Android Development Hackathon 2022', '<p>Hackathon Android App Innovation Challenge in will happen on Feb 20th 2022. ... To develop an innovative applications which can be helpful for society.</p>\r\n<p>&nbsp;</p>', '2022-10-03', 'book-covers_1664819413.jpg', 1, 1, 1, '2022-10-03 11:50:13', '2022-10-03 14:55:38'),
(2, 2, 3, 4, 1, 0, 2, '1004', 'Winter Vacation Pick On From Sunday', '<p>Winter Vacations for Sun and Scene Seekers: The Caribbean​​ The Caribbean has long drawn couples, families and friends for easy warm-weather getaways, thanks to</p>', '2022-10-04', 'Provisional Certificate-100001_1664890296.pdf', 1, 1, NULL, '2022-10-04 07:31:36', '2022-10-04 07:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `notice_categories`
--

CREATE TABLE `notice_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_categories`
--

INSERT INTO `notice_categories` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Exam', 'exam', NULL, 1, '2022-09-30 14:11:08', '2022-09-30 14:11:54'),
(2, 'Vacation', 'vacation', NULL, 1, '2022-09-30 14:11:23', '2022-09-30 14:12:05'),
(3, 'Festival', 'festival', NULL, 1, '2022-09-30 14:11:41', '2022-09-30 14:12:00'),
(4, 'Competitive Event', 'competitive-event', NULL, 1, '2022-10-01 04:08:04', '2022-10-01 04:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('011f54a5-007b-47ec-8ca0-ef8d4d02377e', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 12, '{\"id\":3,\"title\":\"2nd Class Of English\",\"type\":\"content\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('07aab651-5c90-4523-86b8-d27aae1056ec', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 1, '{\"id\":1,\"title\":\"Android Development Hackathon 2022\",\"type\":\"notice\"}', NULL, '2022-10-03 11:50:13', '2022-10-03 11:50:13'),
('11a62dee-3881-4ac4-8a3b-df96a73781de', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 10, '{\"id\":2,\"title\":\"Winter Vacation Pick On From Sunday\",\"type\":\"notice\"}', NULL, '2022-10-04 07:31:37', '2022-10-04 07:31:37'),
('141e4e0d-3663-43b1-a7be-dc7674e5928d', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 11, '{\"id\":3,\"title\":\"2nd Class Of English\",\"type\":\"content\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('15b99a58-fcc8-4de2-a8dc-f47df77d7134', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 3, '{\"id\":1,\"title\":\"Theory of relativity\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:10:03', '2022-10-03 11:10:03'),
('1664d794-1262-4ee9-aca5-c3ea560e4291', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 4, '{\"id\":1,\"title\":\"Android Development Hackathon 2022\",\"type\":\"notice\"}', NULL, '2022-10-03 11:50:13', '2022-10-03 11:50:13'),
('1e6faade-b601-4573-8611-252bd426a5e4', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 14, '{\"id\":3,\"title\":\"2nd Class Of English\",\"type\":\"content\"}', '2022-10-04 07:32:42', '2022-10-04 07:22:41', '2022-10-04 07:32:42'),
('27700e79-b1ef-4aea-84a5-dca35601e2c7', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 14, '{\"id\":5,\"title\":\"Rules of voice change\",\"type\":\"assignment\"}', '2022-10-04 07:32:47', '2022-10-04 07:22:41', '2022-10-04 07:32:47'),
('31bf7290-9e38-4131-9f5c-7a972e49616a', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 14, '{\"id\":2,\"title\":\"Winter Vacation Pick On From Sunday\",\"type\":\"notice\"}', '2022-10-04 07:32:02', '2022-10-04 07:31:37', '2022-10-04 07:32:02'),
('5b2538da-38e9-4a7a-9d5e-12a5b71bdf90', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 7, '{\"id\":1,\"title\":\"Optical Physics 1st Class\",\"type\":\"content\"}', NULL, '2022-10-03 07:12:59', '2022-10-03 07:12:59'),
('6ca44526-326d-40f7-80a2-cd99f3a77fcd', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 10, '{\"id\":3,\"title\":\"Rules of Article\",\"type\":\"assignment\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('70bf8a20-bd71-403e-bd84-006b6e524a66', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 1, '{\"id\":1,\"title\":\"Theory of relativity\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:10:03', '2022-10-03 11:10:03'),
('785f549e-c101-40f4-b4f8-134c2cd2a0fe', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 11, '{\"id\":3,\"title\":\"Rules of Article\",\"type\":\"assignment\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('839d685b-468a-459c-b7e1-8d4b74e7d5df', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 8, '{\"id\":2,\"title\":\"Measurement and Height\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:13:04', '2022-10-03 11:13:04'),
('93f6ddc6-d6a9-4e6d-b492-d417e1b9b2f7', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 4, '{\"id\":1,\"title\":\"Theory of relativity\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:10:03', '2022-10-03 11:10:03'),
('9ba811dd-0e6a-4070-b216-069614bc2b9d', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 10, '{\"id\":3,\"title\":\"2nd Class Of English\",\"type\":\"content\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('a3f21e8d-3610-40b8-a2e5-7b1a94bf90e6', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 10, '{\"id\":5,\"title\":\"Rules of voice change\",\"type\":\"assignment\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('a67fd579-3132-4fb3-9107-9108ecc310c8', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 12, '{\"id\":3,\"title\":\"Rules of Article\",\"type\":\"assignment\"}', '2022-10-04 07:23:16', '2022-10-04 07:22:41', '2022-10-04 07:23:16'),
('a9e0eaac-ddc8-44b7-9a05-c280aa5ce15e', 'App\\Notifications\\ContentNotification', 'App\\Models\\Student', 8, '{\"id\":1,\"title\":\"Optical Physics 1st Class\",\"type\":\"content\"}', NULL, '2022-10-03 07:12:59', '2022-10-03 07:12:59'),
('b131cbc5-8f6d-46af-85ba-99e114a468f7', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 3, '{\"id\":1,\"title\":\"Android Development Hackathon 2022\",\"type\":\"notice\"}', NULL, '2022-10-03 11:50:13', '2022-10-03 11:50:13'),
('c150c5b3-2d00-465e-bb7c-8fb0506f4cb7', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 12, '{\"id\":2,\"title\":\"Winter Vacation Pick On From Sunday\",\"type\":\"notice\"}', NULL, '2022-10-04 07:31:37', '2022-10-04 07:31:37'),
('c223bf63-bf78-4425-b70d-d7f0ed751ba9', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 12, '{\"id\":5,\"title\":\"Rules of voice change\",\"type\":\"assignment\"}', '2022-10-04 07:23:16', '2022-10-04 07:22:41', '2022-10-04 07:23:16'),
('cdd8fdc1-b992-4df9-a1d7-833bc22c1728', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 14, '{\"id\":3,\"title\":\"Rules of Article\",\"type\":\"assignment\"}', '2022-10-04 07:32:47', '2022-10-04 07:22:41', '2022-10-04 07:32:47'),
('d1693c75-da05-4cb0-a5fa-4e0e98eed4f4', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 2, '{\"id\":1,\"title\":\"Android Development Hackathon 2022\",\"type\":\"notice\"}', NULL, '2022-10-03 11:50:13', '2022-10-03 11:50:13'),
('d86483c2-2cac-4a32-a274-aa402c0c63d5', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 2, '{\"id\":1,\"title\":\"Theory of relativity\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:10:03', '2022-10-03 11:10:03'),
('edf49484-fd6d-4d28-9024-dab31f141b7a', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 7, '{\"id\":2,\"title\":\"Measurement and Height\",\"type\":\"assignment\"}', NULL, '2022-10-03 11:13:04', '2022-10-03 11:13:04'),
('f3bcc8a3-b372-4657-9f29-ea4438f455bc', 'App\\Notifications\\AssignmentNotification', 'App\\Models\\Student', 11, '{\"id\":5,\"title\":\"Rules of voice change\",\"type\":\"assignment\"}', NULL, '2022-10-04 07:22:41', '2022-10-04 07:22:41'),
('fa65ad88-4332-42ac-a773-796203413c68', 'App\\Notifications\\NoticeNotification', 'App\\Models\\Student', 11, '{\"id\":2,\"title\":\"Winter Vacation Pick On From Sunday\",\"type\":\"notice\"}', NULL, '2022-10-04 07:31:37', '2022-10-04 07:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `outside_users`
--

CREATE TABLE `outside_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `mother_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `present_province` int(10) UNSIGNED DEFAULT NULL,
  `present_district` int(10) UNSIGNED DEFAULT NULL,
  `present_village` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_province` int(10) UNSIGNED DEFAULT NULL,
  `permanent_district` int(10) UNSIGNED DEFAULT NULL,
  `permanent_village` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `education_level` varchar(191) DEFAULT NULL,
  `occupation` varchar(191) DEFAULT NULL,
  `gender` int(11) NOT NULL COMMENT '1 Male, 2 Female & 3 Other',
  `dob` date NOT NULL,
  `mother_tongue` varchar(191) DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `blood_group` int(11) DEFAULT NULL,
  `nationality` varchar(191) DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `passport_no` varchar(191) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Inactive, 1 Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `father_occupation` varchar(191) DEFAULT NULL,
  `mother_occupation` varchar(191) DEFAULT NULL,
  `father_photo` text DEFAULT NULL,
  `mother_photo` text DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outside_users`
--

INSERT INTO `outside_users` (`id`, `first_name`, `last_name`, `father_name`, `mother_name`, `email`, `phone`, `present_province`, `present_district`, `present_village`, `present_address`, `permanent_province`, `permanent_district`, `permanent_village`, `permanent_address`, `education_level`, `occupation`, `gender`, `dob`, `mother_tongue`, `marital_status`, `blood_group`, `nationality`, `national_id`, `passport_no`, `photo`, `signature`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `father_occupation`, `mother_occupation`, `father_photo`, `mother_photo`, `country`, `religion`, `caste`) VALUES
(1, 'Jason', 'Suarez', 'Cassady Houston', NULL, 'rodemy@mailinator.com', '+1 (133) 832-2324', 4, 3, 'Excepteur consequatu', 'Est ea elit ducimus', 2, 13, 'Nam quia consequat', 'Amet occaecat est e', NULL, 'Tempora incidunt', 1, '1999-02-06', NULL, 2, NULL, NULL, '4568798763153', '5468657354468', NULL, NULL, 1, 1, NULL, '2022-10-03 05:44:53', '2022-10-03 05:44:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Garth', 'Bernard', 'Colby Jacobs', NULL, 'wygicyb@mailinator.com', '+1 (548) 812-6473', 4, 3, 'Quasi dolores enim q', 'Sit harum alias mol', 1, 1, 'Quis aute duis dolor', 'Enim voluptas quia d', NULL, 'Quia impedit', 2, '1989-11-30', 'English', 4, NULL, NULL, '76554633543', '43865438', 'student_1664797541.jpg', NULL, 1, 1, NULL, '2022-10-03 05:45:41', '2022-10-03 05:45:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Neville', 'Frye', 'Medge Grimes', NULL, 'corojeja@mailinator.com', '+1 (204) 668-8836', 4, 3, 'Eius perspiciatis c', 'Delectus consequatu', 4, 4, 'Esse natus ut velit', 'Ducimus voluptate r', NULL, NULL, 2, '2014-03-07', 'Bangla', 4, NULL, NULL, '56789688', '876856876', NULL, NULL, 1, 1, NULL, '2022-10-03 05:46:30', '2022-10-03 05:46:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Vivien', 'Tyler', 'Holmes Walls', NULL, 'semat@mailinator.com', '+1 (686) 105-7363', 4, 5, 'Quae nisi quas in pr', 'Repudiandae veritati', 4, 5, 'Et aliquid qui excep', 'Explicabo Magnam un', NULL, 'Quo deleniti', 3, '1970-07-13', 'English', 1, NULL, NULL, '55489789441', '124897891', 'student_1664797681.jpg', NULL, 1, 1, NULL, '2022-10-03 05:48:01', '2022-10-03 05:48:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('carlos@netlogyc.com', '$2y$10$pXWQdZNUOF6pCATGDWDUTO4AWhxIEKsCxIdATY7ZGx/vG6V3Fx2sq', '2023-07-12 19:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `basic_salary` double(10,2) NOT NULL DEFAULT 0.00,
  `salary_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 Fixed & 2 Hourly',
  `total_earning` double(10,2) NOT NULL,
  `total_allowance` double(10,2) NOT NULL DEFAULT 0.00,
  `bonus` double(10,2) NOT NULL DEFAULT 0.00,
  `gross_salary` double(10,2) NOT NULL,
  `total_deduction` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL DEFAULT 0.00,
  `net_salary` double(10,2) NOT NULL,
  `salary_month` date NOT NULL,
  `pay_date` date DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 Unpaid, 1 Paid',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `user_id`, `basic_salary`, `salary_type`, `total_earning`, `total_allowance`, `bonus`, `gross_salary`, `total_deduction`, `tax`, `net_salary`, `salary_month`, `pay_date`, `payment_method`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 40000.00, 1, 15484.00, 2000.00, 0.00, 15984.00, 1500.00, 1099.00, 14886.00, '2022-10-01', '2023-02-13', 3, NULL, 1, 1, 1, '2022-10-03 15:35:22', '2023-02-13 12:02:40'),
(2, 6, 40000.00, 1, 20645.00, 3500.00, 0.00, 22945.00, 1200.00, 2692.00, 20254.00, '2022-10-01', NULL, NULL, NULL, 0, 1, NULL, '2022-10-03 15:35:34', '2023-02-13 12:00:30'),
(3, 7, 38000.00, 1, 14710.00, 5000.00, 0.00, 19410.00, 300.00, 1441.00, 17969.00, '2022-10-01', '2023-02-13', 5, NULL, 1, 1, 1, '2022-10-03 15:36:45', '2023-02-13 12:02:49'),
(4, 8, 35000.00, 1, 15806.00, 2500.00, 0.00, 17106.00, 1200.00, 1211.00, 15896.00, '2022-10-01', NULL, NULL, NULL, 0, 1, 1, '2022-10-03 15:37:27', '2023-02-13 12:01:32'),
(5, 3, 300.00, 2, 3000.00, 2500.00, 0.00, 4300.00, 1200.00, 0.00, 4300.00, '2022-10-01', '2023-02-13', 2, NULL, 1, 1, 1, '2022-10-03 15:44:50', '2023-02-13 12:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_details`
--

CREATE TABLE `payroll_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payroll_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Deduction, 1 Allowance',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_details`
--

INSERT INTO `payroll_details` (`id`, `payroll_id`, `title`, `amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Eid Bonus', 2000.00, 1, NULL, NULL, '2023-02-13 12:00:01', '2023-02-13 12:00:01'),
(2, 1, 'Lunch', 1500.00, 0, NULL, NULL, '2023-02-13 12:00:01', '2023-02-13 12:00:01'),
(3, 2, 'Eid Bonus', 3500.00, 1, NULL, NULL, '2023-02-13 12:00:30', '2023-02-13 12:00:30'),
(4, 2, 'Lunch', 1200.00, 0, NULL, NULL, '2023-02-13 12:00:30', '2023-02-13 12:00:30'),
(5, 3, 'Bonus', 5000.00, 1, NULL, NULL, '2023-02-13 12:00:59', '2023-02-13 12:00:59'),
(6, 3, 'Snaks', 300.00, 0, NULL, NULL, '2023-02-13 12:00:59', '2023-02-13 12:00:59'),
(7, 4, 'Transport', 2500.00, 1, NULL, NULL, '2023-02-13 12:01:32', '2023-02-13 12:01:32'),
(8, 4, 'Late', 1200.00, 0, NULL, NULL, '2023-02-13 12:01:32', '2023-02-13 12:01:32'),
(9, 5, 'Eid Bonus', 2500.00, 1, NULL, NULL, '2023-02-13 12:02:07', '2023-02-13 12:02:07'),
(10, 5, 'Lunch', 1200.00, 0, NULL, NULL, '2023-02-13 12:02:07', '2023-02-13 12:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `group` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group`, `title`, `guard_name`, `created_at`, `updated_at`) VALUES
(689, 'application-view', 'Application', 'View', 'web', NULL, NULL),
(690, 'application-create', 'Application', 'Admission', 'web', NULL, NULL),
(691, 'application-edit', 'Application', 'Action', 'web', NULL, NULL),
(692, 'application-delete', 'Application', 'Delete', 'web', NULL, NULL),
(693, 'student-view', 'Student', 'View', 'web', NULL, NULL),
(694, 'student-create', 'Student', 'Create', 'web', NULL, NULL),
(695, 'student-edit', 'Student', 'Edit', 'web', NULL, NULL),
(696, 'student-delete', 'Student', 'Delete', 'web', NULL, NULL),
(697, 'student-password-print', 'Student', 'Password Print', 'web', NULL, NULL),
(698, 'student-password-change', 'Student', 'Password Change', 'web', NULL, NULL),
(699, 'student-card', 'Student', 'ID Card', 'web', NULL, NULL),
(700, 'id-card-setting-view', 'ID Card', 'Setting', 'web', NULL, NULL),
(701, 'student-transfer-in-view', 'Student Transfer In', 'View', 'web', NULL, NULL),
(702, 'student-transfer-in-create', 'Student Transfer In', 'Transfer', 'web', NULL, NULL),
(703, 'student-transfer-in-edit', 'Student Transfer In', 'Edit', 'web', NULL, NULL),
(704, 'student-transfer-out-view', 'Student Transfer Out', 'View', 'web', NULL, NULL),
(705, 'student-transfer-out-create', 'Student Transfer Out', 'Transfer', 'web', NULL, NULL),
(706, 'student-transfer-out-edit', 'Student Transfer Out', 'Edit', 'web', NULL, NULL),
(707, 'status-type-view', 'Status Type', 'View', 'web', NULL, NULL),
(708, 'status-type-create', 'Status Type', 'Create', 'web', NULL, NULL),
(709, 'status-type-edit', 'Status Type', 'Edit', 'web', NULL, NULL),
(710, 'status-type-delete', 'Status Type', 'Delete', 'web', NULL, NULL),
(711, 'student-attendance-action', 'Student Attendance', 'Manage', 'web', NULL, NULL),
(712, 'student-attendance-report', 'Student Attendance', 'Report', 'web', NULL, NULL),
(713, 'student-leave-manage-view', 'Student Leave Manage', 'View', 'web', NULL, NULL),
(714, 'student-leave-manage-edit', 'Student Leave Manage', 'Action', 'web', NULL, NULL),
(715, 'student-leave-manage-delete', 'Student Leave Manage', 'Delete', 'web', NULL, NULL),
(716, 'student-note-view', 'Student Note', 'View', 'web', NULL, NULL),
(717, 'student-note-create', 'Student Note', 'Create', 'web', NULL, NULL),
(718, 'student-note-edit', 'Student Note', 'Edit', 'web', NULL, NULL),
(719, 'student-note-delete', 'Student Note', 'Delete', 'web', NULL, NULL),
(720, 'student-enroll-single', 'Student Enroll', 'Single Enroll', 'web', NULL, NULL),
(721, 'student-enroll-group', 'Student Enroll', 'Group Enroll', 'web', NULL, NULL),
(722, 'student-enroll-adddrop', 'Student Enroll', 'Course Add Drop', 'web', NULL, NULL),
(723, 'student-enroll-complete', 'Student Enroll', 'Course Complete', 'web', NULL, NULL),
(724, 'student-enroll-alumni', 'Student Enroll', 'Student Alumni', 'web', NULL, NULL),
(725, 'faculty-view', 'Faculty', 'View', 'web', NULL, NULL),
(726, 'faculty-create', 'Faculty', 'Create', 'web', NULL, NULL),
(727, 'faculty-edit', 'Faculty', 'Edit', 'web', NULL, NULL),
(728, 'faculty-delete', 'Faculty', 'Delete', 'web', NULL, NULL),
(729, 'program-view', 'Program', 'View', 'web', NULL, NULL),
(730, 'program-create', 'Program', 'Create', 'web', NULL, NULL),
(731, 'program-edit', 'Program', 'Edit', 'web', NULL, NULL),
(732, 'program-delete', 'Program', 'Delete', 'web', NULL, NULL),
(733, 'batch-view', 'Batch', 'View', 'web', NULL, NULL),
(734, 'batch-create', 'Batch', 'Create', 'web', NULL, NULL),
(735, 'batch-edit', 'Batch', 'Edit', 'web', NULL, NULL),
(736, 'batch-delete', 'Batch', 'Delete', 'web', NULL, NULL),
(737, 'session-view', 'Session', 'View', 'web', NULL, NULL),
(738, 'session-create', 'Session', 'Create', 'web', NULL, NULL),
(739, 'session-edit', 'Session', 'Edit', 'web', NULL, NULL),
(740, 'session-delete', 'Session', 'Delete', 'web', NULL, NULL),
(741, 'semester-view', 'Semester', 'View', 'web', NULL, NULL),
(742, 'semester-create', 'Semester', 'Create', 'web', NULL, NULL),
(743, 'semester-edit', 'Semester', 'Edit', 'web', NULL, NULL),
(744, 'semester-delete', 'Semester', 'Delete', 'web', NULL, NULL),
(745, 'section-view', 'Section', 'View', 'web', NULL, NULL),
(746, 'section-create', 'Section', 'Create', 'web', NULL, NULL),
(747, 'section-edit', 'Section', 'Edit', 'web', NULL, NULL),
(748, 'section-delete', 'Section', 'Delete', 'web', NULL, NULL),
(749, 'class-room-view', 'Class Room', 'View', 'web', NULL, NULL),
(750, 'class-room-create', 'Class Room', 'Create', 'web', NULL, NULL),
(751, 'class-room-edit', 'Class Room', 'Edit', 'web', NULL, NULL),
(752, 'class-room-delete', 'Class Room', 'Delete', 'web', NULL, NULL),
(753, 'subject-view', 'Course', 'View', 'web', NULL, NULL),
(754, 'subject-create', 'Course', 'Create', 'web', NULL, NULL),
(755, 'subject-edit', 'Course', 'Edit', 'web', NULL, NULL),
(756, 'subject-delete', 'Course', 'Delete', 'web', NULL, NULL),
(757, 'enroll-subject-view', 'Enroll Course', 'View', 'web', NULL, NULL),
(758, 'enroll-subject-create', 'Enroll Course', 'Create', 'web', NULL, NULL),
(759, 'enroll-subject-edit', 'Enroll Course', 'Edit', 'web', NULL, NULL),
(760, 'enroll-subject-delete', 'Enroll Course', 'Delete', 'web', NULL, NULL),
(761, 'class-routine-view', 'Class Routine', 'View', 'web', NULL, NULL),
(762, 'class-routine-create', 'Class Routine', 'Manage', 'web', NULL, NULL),
(763, 'class-routine-print', 'Class Routine', 'Print', 'web', NULL, NULL),
(764, 'exam-routine-view', 'Exam Routine', 'View', 'web', NULL, NULL),
(765, 'exam-routine-create', 'Exam Routine', 'Create', 'web', NULL, NULL),
(766, 'exam-routine-edit', 'Exam Routine', 'Edit', 'web', NULL, NULL),
(767, 'exam-routine-delete', 'Exam Routine', 'Delete', 'web', NULL, NULL),
(768, 'exam-routine-print', 'Exam Routine', 'Print', 'web', NULL, NULL),
(769, 'class-routine-teacher', 'Teacher Routine', 'View', 'web', NULL, NULL),
(770, 'routine-setting-class', 'Routine Setting', 'Class Routine', 'web', NULL, NULL),
(771, 'routine-setting-exam', 'Routine Setting', 'Exam Routine', 'web', NULL, NULL),
(772, 'exam-attendance', 'Exam', 'Attendance', 'web', NULL, NULL),
(773, 'exam-marking', 'Exam', 'Mark Ledger', 'web', NULL, NULL),
(774, 'exam-result', 'Exam', 'Result', 'web', NULL, NULL),
(775, 'subject-marking', 'Course Final', 'Mark Ledger', 'web', NULL, NULL),
(776, 'subject-result', 'Course Final', 'Result', 'web', NULL, NULL),
(777, 'grade-view', 'Grade', 'View', 'web', NULL, NULL),
(778, 'grade-create', 'Grade', 'Create', 'web', NULL, NULL),
(779, 'grade-edit', 'Grade', 'Edit', 'web', NULL, NULL),
(780, 'grade-delete', 'Grade', 'Delete', 'web', NULL, NULL),
(781, 'exam-type-view', 'Exam Type', 'View', 'web', NULL, NULL),
(782, 'exam-type-create', 'Exam Type', 'Create', 'web', NULL, NULL),
(783, 'exam-type-edit', 'Exam Type', 'Edit', 'web', NULL, NULL),
(784, 'exam-type-delete', 'Exam Type', 'Delete', 'web', NULL, NULL),
(785, 'admit-card-view', 'Admit Card', 'View', 'web', NULL, NULL),
(786, 'admit-card-print', 'Admit Card', 'Print', 'web', NULL, NULL),
(787, 'admit-card-download', 'Admit Card', 'Download', 'web', NULL, NULL),
(788, 'admit-setting-view', 'Admit Card', 'Setting', 'web', NULL, NULL),
(789, 'result-contribution-view', 'Contribution', 'Setting', 'web', NULL, NULL),
(790, 'assignment-view', 'Assignment', 'View', 'web', NULL, NULL),
(791, 'assignment-create', 'Assignment', 'Create', 'web', NULL, NULL),
(792, 'assignment-edit', 'Assignment', 'Edit', 'web', NULL, NULL),
(793, 'assignment-delete', 'Assignment', 'Delete', 'web', NULL, NULL),
(794, 'assignment-marking', 'Assignment', 'Mark Ledger', 'web', NULL, NULL),
(795, 'content-view', 'Content', 'View', 'web', NULL, NULL),
(796, 'content-create', 'Content', 'Create', 'web', NULL, NULL),
(797, 'content-edit', 'Content', 'Edit', 'web', NULL, NULL),
(798, 'content-delete', 'Content', 'Delete', 'web', NULL, NULL),
(799, 'content-type-view', 'Content Type', 'View', 'web', NULL, NULL),
(800, 'content-type-create', 'Content Type', 'Create', 'web', NULL, NULL),
(801, 'content-type-edit', 'Content Type', 'Edit', 'web', NULL, NULL),
(802, 'content-type-delete', 'Content Type', 'Delete', 'web', NULL, NULL),
(803, 'fees-student-due', 'Student Fees', 'Fees Due', 'web', NULL, NULL),
(804, 'fees-student-quick-assign', 'Student Fees', 'Quick Assign', 'web', NULL, NULL),
(805, 'fees-student-quick-received', 'Student Fees', 'Quick Received', 'web', NULL, NULL),
(806, 'fees-student-report', 'Student Fees', 'Report', 'web', NULL, NULL),
(807, 'fees-student-action', 'Student Fees', 'Action', 'web', NULL, NULL),
(808, 'fees-student-print', 'Student Fees', 'Print', 'web', NULL, NULL),
(809, 'fees-receipt-view', 'Fees Receipt', 'Setting', 'web', NULL, NULL),
(810, 'fees-master-view', 'Fees Master', 'View', 'web', NULL, NULL),
(811, 'fees-master-create', 'Fees Master', 'Manage', 'web', NULL, NULL),
(812, 'fees-category-view', 'Fees Type', 'View', 'web', NULL, NULL),
(813, 'fees-category-create', 'Fees Type', 'Create', 'web', NULL, NULL),
(814, 'fees-category-edit', 'Fees Type', 'Edit', 'web', NULL, NULL),
(815, 'fees-category-delete', 'Fees Type', 'Delete', 'web', NULL, NULL),
(816, 'fees-discount-view', 'Fees Discount', 'View', 'web', NULL, NULL),
(817, 'fees-discount-create', 'Fees Discount', 'Create', 'web', NULL, NULL),
(818, 'fees-discount-edit', 'Fees Discount', 'Edit', 'web', NULL, NULL),
(819, 'fees-discount-delete', 'Fees Discount', 'Delete', 'web', NULL, NULL),
(820, 'fees-fine-view', 'Fees Fine Setting', 'View', 'web', NULL, NULL),
(821, 'fees-fine-create', 'Fees Fine Setting', 'Create', 'web', NULL, NULL),
(822, 'fees-fine-edit', 'Fees Fine Setting', 'Edit', 'web', NULL, NULL),
(823, 'fees-fine-delete', 'Fees Fine Setting', 'Delete', 'web', NULL, NULL),
(824, 'user-view', 'Staff', 'View', 'web', NULL, NULL),
(825, 'user-create', 'Staff', 'Create', 'web', NULL, NULL),
(826, 'user-edit', 'Staff', 'Edit', 'web', NULL, NULL),
(827, 'user-delete', 'Staff', 'Delete', 'web', NULL, NULL),
(828, 'user-password-change', 'Staff', 'Password Change', 'web', NULL, NULL),
(829, 'staff-daily-attendance-action', 'Staff Daily Attendance', 'Manage', 'web', NULL, NULL),
(830, 'staff-daily-attendance-report', 'Staff Daily Attendance', 'Report', 'web', NULL, NULL),
(831, 'staff-hourly-attendance-action', 'Staff Hourly Attendance', 'Manage', 'web', NULL, NULL),
(832, 'staff-hourly-attendance-report', 'Staff Hourly Attendance', 'Report', 'web', NULL, NULL),
(833, 'staff-note-view', 'Staff Note', 'View', 'web', NULL, NULL),
(834, 'staff-note-create', 'Staff Note', 'Create', 'web', NULL, NULL),
(835, 'staff-note-edit', 'Staff Note', 'Edit', 'web', NULL, NULL),
(836, 'staff-note-delete', 'Staff Note', 'Delete', 'web', NULL, NULL),
(837, 'payroll-view', 'Payroll', 'View', 'web', NULL, NULL),
(838, 'payroll-action', 'Payroll', 'Action', 'web', NULL, NULL),
(839, 'payroll-report', 'Payroll', 'Report', 'web', NULL, NULL),
(840, 'payroll-print', 'Payroll', 'Print', 'web', NULL, NULL),
(841, 'pay-slip-setting-view', 'Pay Slip', 'Setting', 'web', NULL, NULL),
(842, 'staff-leave-manage-view', 'Staff Leave Manage', 'View', 'web', NULL, NULL),
(843, 'staff-leave-manage-edit', 'Staff Leave Manage', 'Action', 'web', NULL, NULL),
(844, 'staff-leave-manage-delete', 'Staff Leave Manage', 'Delete', 'web', NULL, NULL),
(845, 'staff-leave-view', 'Staff Leave', 'View', 'web', NULL, NULL),
(846, 'staff-leave-create', 'Staff Leave', 'Create', 'web', NULL, NULL),
(847, 'staff-leave-delete', 'Staff Leave', 'Delete', 'web', NULL, NULL),
(848, 'leave-type-view', 'Leave Type', 'View', 'web', NULL, NULL),
(849, 'leave-type-create', 'Leave Type', 'Create', 'web', NULL, NULL),
(850, 'leave-type-edit', 'Leave Type', 'Edit', 'web', NULL, NULL),
(851, 'leave-type-delete', 'Leave Type', 'Delete', 'web', NULL, NULL),
(852, 'work-shift-type-view', 'Work Shift Type', 'View', 'web', NULL, NULL),
(853, 'work-shift-type-create', 'Work Shift Type', 'Create', 'web', NULL, NULL),
(854, 'work-shift-type-edit', 'Work Shift Type', 'Edit', 'web', NULL, NULL),
(855, 'work-shift-type-delete', 'Work Shift Type', 'Delete', 'web', NULL, NULL),
(856, 'tax-setting-view', 'Tax Setting', 'View', 'web', NULL, NULL),
(857, 'tax-setting-create', 'Tax Setting', 'Create', 'web', NULL, NULL),
(858, 'tax-setting-edit', 'Tax Setting', 'Edit', 'web', NULL, NULL),
(859, 'tax-setting-delete', 'Tax Setting', 'Delete', 'web', NULL, NULL),
(860, 'designation-view', 'Designation', 'View', 'web', NULL, NULL),
(861, 'designation-create', 'Designation', 'Create', 'web', NULL, NULL),
(862, 'designation-edit', 'Designation', 'Edit', 'web', NULL, NULL),
(863, 'designation-delete', 'Designation', 'Delete', 'web', NULL, NULL),
(864, 'department-view', 'Department', 'View', 'web', NULL, NULL),
(865, 'department-create', 'Department', 'Create', 'web', NULL, NULL),
(866, 'department-edit', 'Department', 'Edit', 'web', NULL, NULL),
(867, 'department-delete', 'Department', 'Delete', 'web', NULL, NULL),
(868, 'income-view', 'Income', 'View', 'web', NULL, NULL),
(869, 'income-create', 'Income', 'Create', 'web', NULL, NULL),
(870, 'income-edit', 'Income', 'Edit', 'web', NULL, NULL),
(871, 'income-delete', 'Income', 'Delete', 'web', NULL, NULL),
(872, 'income-category-view', 'Income Category', 'View', 'web', NULL, NULL),
(873, 'income-category-create', 'Income Category', 'Create', 'web', NULL, NULL),
(874, 'income-category-edit', 'Income Category', 'Edit', 'web', NULL, NULL),
(875, 'income-category-delete', 'Income Category', 'Delete', 'web', NULL, NULL),
(876, 'expense-view', 'Expense', 'View', 'web', NULL, NULL),
(877, 'expense-create', 'Expense', 'Create', 'web', NULL, NULL),
(878, 'expense-edit', 'Expense', 'Edit', 'web', NULL, NULL),
(879, 'expense-delete', 'Expense', 'Delete', 'web', NULL, NULL),
(880, 'expense-category-view', 'Expense Category', 'View', 'web', NULL, NULL),
(881, 'expense-category-create', 'Expense Category', 'Create', 'web', NULL, NULL),
(882, 'expense-category-edit', 'Expense Category', 'Edit', 'web', NULL, NULL),
(883, 'expense-category-delete', 'Expense Category', 'Delete', 'web', NULL, NULL),
(884, 'outcome-view', 'Outcome Overview', 'View', 'web', NULL, NULL),
(885, 'email-notify-view', 'Email Notify', 'View', 'web', NULL, NULL),
(886, 'email-notify-create', 'Email Notify', 'Send', 'web', NULL, NULL),
(887, 'email-notify-delete', 'Email Notify', 'Delete', 'web', NULL, NULL),
(888, 'sms-notify-view', 'SMS Notify', 'View', 'web', NULL, NULL),
(889, 'sms-notify-create', 'SMS Notify', 'Send', 'web', NULL, NULL),
(890, 'sms-notify-delete', 'SMS Notify', 'Delete', 'web', NULL, NULL),
(891, 'event-view', 'Event', 'View', 'web', NULL, NULL),
(892, 'event-create', 'Event', 'Create', 'web', NULL, NULL),
(893, 'event-edit', 'Event', 'Edit', 'web', NULL, NULL),
(894, 'event-delete', 'Event', 'Delete', 'web', NULL, NULL),
(895, 'event-calendar', 'Event Calendar', 'View', 'web', NULL, NULL),
(896, 'notice-view', 'Notice', 'View', 'web', NULL, NULL),
(897, 'notice-create', 'Notice', 'Create', 'web', NULL, NULL),
(898, 'notice-edit', 'Notice', 'Edit', 'web', NULL, NULL),
(899, 'notice-delete', 'Notice', 'Delete', 'web', NULL, NULL),
(900, 'notice-category-view', 'Notice Category', 'View', 'web', NULL, NULL),
(901, 'notice-category-create', 'Notice Category', 'Create', 'web', NULL, NULL),
(902, 'notice-category-edit', 'Notice Category', 'Edit', 'web', NULL, NULL),
(903, 'notice-category-delete', 'Notice Category', 'Delete', 'web', NULL, NULL),
(904, 'book-issue-return-view', 'Book Issue Return', 'View', 'web', NULL, NULL),
(905, 'book-issue-return-action', 'Book Issue Return', 'Action', 'web', NULL, NULL),
(906, 'book-issue-return-delete', 'Book Issue Return', 'Delete', 'web', NULL, NULL),
(907, 'book-issue-return-over', 'Book Issue Return', 'Date Over', 'web', NULL, NULL),
(908, 'library-member-view', 'Library Member', 'View', 'web', NULL, NULL),
(909, 'library-member-create', 'Library Member', 'Create', 'web', NULL, NULL),
(910, 'library-member-edit', 'Library Member', 'Edit', 'web', NULL, NULL),
(911, 'library-member-delete', 'Library Member', 'Delete', 'web', NULL, NULL),
(912, 'library-member-card', 'Library Member', 'Card Print', 'web', NULL, NULL),
(913, 'library-card-setting-view', 'Library Card', 'Setting', 'web', NULL, NULL),
(914, 'book-view', 'Book', 'View', 'web', NULL, NULL),
(915, 'book-create', 'Book', 'Create', 'web', NULL, NULL),
(916, 'book-edit', 'Book', 'Edit', 'web', NULL, NULL),
(917, 'book-delete', 'Book', 'Delete', 'web', NULL, NULL),
(918, 'book-print', 'Book', 'Token Print', 'web', NULL, NULL),
(919, 'book-request-view', 'Book Request', 'View', 'web', NULL, NULL),
(920, 'book-request-create', 'Book Request', 'Create', 'web', NULL, NULL),
(921, 'book-request-edit', 'Book Request', 'Edit', 'web', NULL, NULL),
(922, 'book-request-delete', 'Book Request', 'Delete', 'web', NULL, NULL),
(923, 'book-category-view', 'Book Category', 'View', 'web', NULL, NULL),
(924, 'book-category-create', 'Book Category', 'Create', 'web', NULL, NULL),
(925, 'book-category-edit', 'Book Category', 'Edit', 'web', NULL, NULL),
(926, 'book-category-delete', 'Book Category', 'Delete', 'web', NULL, NULL),
(927, 'item-issue-view', 'Item Issue', 'View', 'web', NULL, NULL),
(928, 'item-issue-action', 'Item Issue', 'Action', 'web', NULL, NULL),
(929, 'item-issue-delete', 'Item Issue', 'Delete', 'web', NULL, NULL),
(930, 'item-stock-view', 'Item Stock', 'View', 'web', NULL, NULL),
(931, 'item-stock-create', 'Item Stock', 'Create', 'web', NULL, NULL),
(932, 'item-stock-edit', 'Item Stock', 'Edit', 'web', NULL, NULL),
(933, 'item-stock-delete', 'Item Stock', 'Delete', 'web', NULL, NULL),
(934, 'item-view', 'Item', 'View', 'web', NULL, NULL),
(935, 'item-create', 'Item', 'Create', 'web', NULL, NULL),
(936, 'item-edit', 'Item', 'Edit', 'web', NULL, NULL),
(937, 'item-delete', 'Item', 'Delete', 'web', NULL, NULL),
(938, 'item-store-view', 'Item Store', 'View', 'web', NULL, NULL),
(939, 'item-store-create', 'Item Store', 'Create', 'web', NULL, NULL),
(940, 'item-store-edit', 'Item Store', 'Edit', 'web', NULL, NULL),
(941, 'item-store-delete', 'Item Store', 'Delete', 'web', NULL, NULL),
(942, 'item-supplier-view', 'Item Supplier', 'View', 'web', NULL, NULL),
(943, 'item-supplier-create', 'Item Supplier', 'Create', 'web', NULL, NULL),
(944, 'item-supplier-edit', 'Item Supplier', 'Edit', 'web', NULL, NULL),
(945, 'item-supplier-delete', 'Item Supplier', 'Delete', 'web', NULL, NULL),
(946, 'item-category-view', 'Item Category', 'View', 'web', NULL, NULL),
(947, 'item-category-create', 'Item Category', 'Create', 'web', NULL, NULL),
(948, 'item-category-edit', 'Item Category', 'Edit', 'web', NULL, NULL),
(949, 'item-category-delete', 'Item Category', 'Delete', 'web', NULL, NULL),
(950, 'hostel-member-view', 'Hostel Member', 'View', 'web', NULL, NULL),
(951, 'hostel-member-create', 'Hostel Member', 'Manage', 'web', NULL, NULL),
(952, 'hostel-room-view', 'Hostel Room', 'View', 'web', NULL, NULL),
(953, 'hostel-room-create', 'Hostel Room', 'Create', 'web', NULL, NULL),
(954, 'hostel-room-edit', 'Hostel Room', 'Edit', 'web', NULL, NULL),
(955, 'hostel-room-delete', 'Hostel Room', 'Delete', 'web', NULL, NULL),
(956, 'hostel-view', 'Hostel', 'View', 'web', NULL, NULL),
(957, 'hostel-create', 'Hostel', 'Create', 'web', NULL, NULL),
(958, 'hostel-edit', 'Hostel', 'Edit', 'web', NULL, NULL),
(959, 'hostel-delete', 'Hostel', 'Delete', 'web', NULL, NULL),
(960, 'room-type-view', 'Room Type', 'View', 'web', NULL, NULL),
(961, 'room-type-create', 'Room Type', 'Create', 'web', NULL, NULL),
(962, 'room-type-edit', 'Room Type', 'Edit', 'web', NULL, NULL),
(963, 'room-type-delete', 'Room Type', 'Delete', 'web', NULL, NULL),
(964, 'transport-member-view', 'Transport Member', 'View', 'web', NULL, NULL),
(965, 'transport-member-create', 'Transport Member', 'Manage', 'web', NULL, NULL),
(966, 'transport-vehicle-view', 'Transport Vehicle', 'View', 'web', NULL, NULL),
(967, 'transport-vehicle-create', 'Transport Vehicle', 'Create', 'web', NULL, NULL),
(968, 'transport-vehicle-edit', 'Transport Vehicle', 'Edit', 'web', NULL, NULL),
(969, 'transport-vehicle-delete', 'Transport Vehicle', 'Delete', 'web', NULL, NULL),
(970, 'transport-route-view', 'Transport Route', 'View', 'web', NULL, NULL),
(971, 'transport-route-create', 'Transport Route', 'Create', 'web', NULL, NULL),
(972, 'transport-route-edit', 'Transport Route', 'Edit', 'web', NULL, NULL),
(973, 'transport-route-delete', 'Transport Route', 'Delete', 'web', NULL, NULL),
(974, 'visitor-view', 'Visitor', 'View', 'web', NULL, NULL),
(975, 'visitor-create', 'Visitor', 'Create', 'web', NULL, NULL),
(976, 'visitor-edit', 'Visitor', 'Edit', 'web', NULL, NULL),
(977, 'visitor-delete', 'Visitor', 'Delete', 'web', NULL, NULL),
(978, 'visitor-print', 'Visitor', 'Token Print', 'web', NULL, NULL),
(979, 'visit-purpose-view', 'Visit Purpose', 'View', 'web', NULL, NULL),
(980, 'visit-purpose-create', 'Visit Purpose', 'Create', 'web', NULL, NULL),
(981, 'visit-purpose-edit', 'Visit Purpose', 'Edit', 'web', NULL, NULL),
(982, 'visit-purpose-delete', 'Visit Purpose', 'Delete', 'web', NULL, NULL),
(983, 'visitor-token-setting-view', 'Visitor Token', 'Setting', 'web', NULL, NULL),
(984, 'phone-log-view', 'Phone Call Log', 'View', 'web', NULL, NULL),
(985, 'phone-log-create', 'Phone Call Log', 'Create', 'web', NULL, NULL),
(986, 'phone-log-edit', 'Phone Call Log', 'Edit', 'web', NULL, NULL),
(987, 'phone-log-delete', 'Phone Call Log', 'Delete', 'web', NULL, NULL),
(988, 'enquiry-view', 'Enquiry', 'View', 'web', NULL, NULL),
(989, 'enquiry-create', 'Enquiry', 'Create', 'web', NULL, NULL),
(990, 'enquiry-edit', 'Enquiry', 'Edit', 'web', NULL, NULL),
(991, 'enquiry-delete', 'Enquiry', 'Delete', 'web', NULL, NULL),
(992, 'enquiry-reference-view', 'Enquiry Reference', 'View', 'web', NULL, NULL),
(993, 'enquiry-reference-create', 'Enquiry Reference', 'Create', 'web', NULL, NULL),
(994, 'enquiry-reference-edit', 'Enquiry Reference', 'Edit', 'web', NULL, NULL),
(995, 'enquiry-reference-delete', 'Enquiry Reference', 'Delete', 'web', NULL, NULL),
(996, 'enquiry-source-view', 'Enquiry Source', 'View', 'web', NULL, NULL),
(997, 'enquiry-source-create', 'Enquiry Source', 'Create', 'web', NULL, NULL),
(998, 'enquiry-source-edit', 'Enquiry Source', 'Edit', 'web', NULL, NULL),
(999, 'enquiry-source-delete', 'Enquiry Source', 'Delete', 'web', NULL, NULL),
(1000, 'complain-view', 'Complain', 'View', 'web', NULL, NULL),
(1001, 'complain-create', 'Complain', 'Create', 'web', NULL, NULL),
(1002, 'complain-edit', 'Complain', 'Edit', 'web', NULL, NULL),
(1003, 'complain-delete', 'Complain', 'Delete', 'web', NULL, NULL),
(1004, 'complain-type-view', 'Complain Type', 'View', 'web', NULL, NULL),
(1005, 'complain-type-create', 'Complain Type', 'Create', 'web', NULL, NULL),
(1006, 'complain-type-edit', 'Complain Type', 'Edit', 'web', NULL, NULL),
(1007, 'complain-type-delete', 'Complain Type', 'Delete', 'web', NULL, NULL),
(1008, 'complain-source-view', 'Complain Source', 'View', 'web', NULL, NULL),
(1009, 'complain-source-create', 'Complain Source', 'Create', 'web', NULL, NULL),
(1010, 'complain-source-edit', 'Complain Source', 'Edit', 'web', NULL, NULL),
(1011, 'complain-source-delete', 'Complain Source', 'Delete', 'web', NULL, NULL),
(1012, 'postal-exchange-view', 'Postal Exchange', 'View', 'web', NULL, NULL),
(1013, 'postal-exchange-create', 'Postal Exchange', 'Create', 'web', NULL, NULL),
(1014, 'postal-exchange-edit', 'Postal Exchange', 'Edit', 'web', NULL, NULL),
(1015, 'postal-exchange-delete', 'Postal Exchange', 'Delete', 'web', NULL, NULL),
(1016, 'postal-type-view', 'Postal Type', 'View', 'web', NULL, NULL),
(1017, 'postal-type-create', 'Postal Type', 'Create', 'web', NULL, NULL),
(1018, 'postal-type-edit', 'Postal Type', 'Edit', 'web', NULL, NULL),
(1019, 'postal-type-delete', 'Postal Type', 'Delete', 'web', NULL, NULL),
(1020, 'meeting-view', 'Meeting Schedule', 'View', 'web', NULL, NULL),
(1021, 'meeting-create', 'Meeting Schedule', 'Create', 'web', NULL, NULL),
(1022, 'meeting-edit', 'Meeting Schedule', 'Edit', 'web', NULL, NULL),
(1023, 'meeting-delete', 'Meeting Schedule', 'Delete', 'web', NULL, NULL),
(1024, 'meeting-type-view', 'Meeting Type', 'View', 'web', NULL, NULL),
(1025, 'meeting-type-create', 'Meeting Type', 'Create', 'web', NULL, NULL),
(1026, 'meeting-type-edit', 'Meeting Type', 'Edit', 'web', NULL, NULL),
(1027, 'meeting-type-delete', 'Meeting Type', 'Delete', 'web', NULL, NULL),
(1028, 'marksheet-view', 'Marksheet', 'View', 'web', NULL, NULL),
(1029, 'marksheet-print', 'Marksheet', 'Print', 'web', NULL, NULL),
(1030, 'marksheet-download', 'Marksheet', 'Download', 'web', NULL, NULL),
(1031, 'marksheet-setting-view', 'Marksheet', 'Setting', 'web', NULL, NULL),
(1032, 'certificate-view', 'Certificate', 'View', 'web', NULL, NULL),
(1033, 'certificate-create', 'Certificate', 'Genarate', 'web', NULL, NULL),
(1034, 'certificate-edit', 'Certificate', 'Edit', 'web', NULL, NULL),
(1035, 'certificate-print', 'Certificate', 'Print', 'web', NULL, NULL),
(1036, 'certificate-download', 'Certificate', 'Download', 'web', NULL, NULL),
(1037, 'certificate-template-view', 'Certificate Template', 'View', 'web', NULL, NULL),
(1038, 'certificate-template-create', 'Certificate Template', 'Create', 'web', NULL, NULL),
(1039, 'certificate-template-edit', 'Certificate Template', 'Edit', 'web', NULL, NULL),
(1040, 'certificate-template-delete', 'Certificate Template', 'Delete', 'web', NULL, NULL),
(1041, 'province-view', 'State', 'View', 'web', NULL, NULL),
(1042, 'province-create', 'State', 'Create', 'web', NULL, NULL),
(1043, 'province-edit', 'State', 'Edit', 'web', NULL, NULL),
(1044, 'province-delete', 'State', 'Delete', 'web', NULL, NULL),
(1045, 'district-view', 'District', 'View', 'web', NULL, NULL),
(1046, 'district-create', 'District', 'Create', 'web', NULL, NULL),
(1047, 'district-edit', 'District', 'Edit', 'web', NULL, NULL),
(1048, 'district-delete', 'District', 'Delete', 'web', NULL, NULL),
(1049, 'language-view', 'Language', 'View', 'web', NULL, NULL),
(1050, 'language-create', 'Language', 'Create', 'web', NULL, NULL),
(1051, 'language-edit', 'Language', 'Edit', 'web', NULL, NULL),
(1052, 'language-delete', 'Language', 'Delete', 'web', NULL, NULL),
(1053, 'translations-view', 'Translation', 'View', 'web', NULL, NULL),
(1054, 'translations-create', 'Translation', 'Create', 'web', NULL, NULL),
(1055, 'translations-delete', 'Translation', 'Delete', 'web', NULL, NULL),
(1056, 'setting-view', 'General Setting', 'Manage', 'web', NULL, NULL),
(1057, 'mail-setting-view', 'Mail Setting', 'Manage', 'web', NULL, NULL),
(1058, 'sms-setting-view', 'SMS Setting', 'Manage', 'web', NULL, NULL),
(1059, 'application-setting-view', 'Application Setting', 'Manage', 'web', NULL, NULL),
(1060, 'bulk-import-export-view', 'Bulk Import Export', 'Manage', 'web', NULL, NULL),
(1061, 'profile-view', 'Profile', 'View', 'web', NULL, NULL),
(1062, 'profile-edit', 'Profile', 'Edit', 'web', NULL, NULL),
(1063, 'role-view', 'Role', 'View', 'web', NULL, NULL),
(1064, 'role-create', 'Role', 'Create', 'web', NULL, NULL),
(1065, 'role-edit', 'Role', 'Edit', 'web', NULL, NULL),
(1066, 'role-delete', 'Role', 'Delete', 'web', NULL, NULL),
(1067, 'profile-account', 'Profile', 'Account', 'web', NULL, NULL),
(1068, 'preregistration-show', 'Preregistration', 'Show', 'web', NULL, NULL),
(1069, 'preregistration-view', 'Preregistration', 'View', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_logs`
--

CREATE TABLE `phone_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `follow_up_date` date DEFAULT NULL,
  `call_duration` varchar(191) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `call_type` int(11) NOT NULL COMMENT '1 Income & 2 Outgoing',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_logs`
--

INSERT INTO `phone_logs` (`id`, `name`, `phone`, `date`, `follow_up_date`, `call_duration`, `start_time`, `end_time`, `purpose`, `note`, `call_type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Quon Sellers', '+1 (948) 556-2442', '2022-10-01', '2022-11-25', '2 min', NULL, NULL, 'Ratione excepturi qu', 'Minus maxime Nam mag', 1, 1, 1, NULL, '2022-10-01 12:17:13', '2022-10-01 12:17:13'),
(2, 'Tanya Grimes', '+1 (988) 107-4828', '2022-10-01', '2022-11-13', '3:50', NULL, NULL, 'Tempore sint est ne', 'Lorem omnis nostrum', 1, 1, 1, NULL, '2022-10-01 12:18:04', '2022-10-01 12:18:04'),
(3, 'Karyn Castillo', '+1 (923) 454-6055', '2021-12-18', '2022-10-09', '5 min', NULL, NULL, 'Et eos corrupti qui', 'Est eius doloremque', 1, 1, 1, NULL, '2022-10-01 12:18:59', '2022-10-01 12:18:59'),
(4, 'Quentin Alford', '+1 (628) 618-3668', '2022-07-20', '2022-11-18', '8:50', NULL, NULL, 'Velit omnis quas dis', 'Laboriosam et quide', 2, 1, 1, NULL, '2022-10-01 12:19:34', '2022-10-01 12:19:34'),
(5, 'Sasha Harper', '+1 (612) 725-1207', '2021-03-12', '2022-10-05', '6 min', NULL, NULL, 'Sint quas ullamco v', 'Architecto numquam q', 2, 1, 1, NULL, '2022-10-01 12:20:45', '2022-10-01 12:20:45'),
(6, 'Cleo Simpson', '+1 (305) 133-4681', '2022-05-28', NULL, NULL, NULL, NULL, 'Quos non maiores eos', 'Et obcaecati aut aut', 1, 1, 1, NULL, '2022-10-01 12:23:14', '2022-10-01 12:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `postal_exchanges`
--

CREATE TABLE `postal_exchanges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 Import & 2 Export',
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `reference` text DEFAULT NULL,
  `from` text DEFAULT NULL,
  `to` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postal_exchanges`
--

INSERT INTO `postal_exchanges` (`id`, `type`, `category_id`, `title`, `reference`, `from`, `to`, `note`, `date`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Sed reprehenderit e', 'Academic Building', 'Officiis et laboris', 'Numquam placeat rat', 'Ut dignissimos illum', '2019-08-03', 'background-border_1664649226.png', 1, 1, 1, '2022-10-01 12:33:46', '2022-10-27 13:32:56'),
(2, 1, 3, 'Proident provident', 'Govt', 'Commodo qui aut quis', 'Hic aperiam hic aper', 'Sit velit nisi asp', '2020-01-19', 'book-covers_1664656202.jpg', 1, 1, 1, '2022-10-01 12:34:05', '2022-10-27 13:32:01'),
(3, 2, 2, 'Velit sunt modi nihi', 'Sundarbon', 'Voluptate est dolori', 'Et dolor assumenda n', 'Enim in vel ad liber', '2021-01-11', NULL, 1, 1, 1, '2022-10-01 12:34:17', '2022-10-27 13:31:10'),
(4, 2, 3, 'Quod velit aliqua E', 'Saif Transport', 'Aute sint exercitati', 'Vitae ipsa ipsa co', 'Enim consectetur pr', '2022-06-28', NULL, 1, 1, 1, '2022-10-01 12:35:37', '2022-10-27 13:30:58'),
(5, 1, 2, 'Sed ut aut accusamus', 'Habib Vai', 'Architecto et ex qui', 'Qui eos dolorum ut', 'Voluptates quo tempo', '2022-03-31', 'book-cover2_1664656189.jpg', 1, 1, 1, '2022-10-01 12:35:51', '2022-10-27 13:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `postal_exchange_types`
--

CREATE TABLE `postal_exchange_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postal_exchange_types`
--

INSERT INTO `postal_exchange_types` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Examination Papers', 'examination-papers', NULL, 1, '2022-10-01 03:58:48', '2022-10-01 03:58:48'),
(2, 'Library Books', 'library-books', NULL, 1, '2022-10-01 03:58:57', '2022-10-01 03:58:57'),
(3, 'Lab Instruments', 'lab-instruments', NULL, 1, '2022-10-01 04:01:27', '2022-10-01 04:01:27'),
(4, 'Office Documents', 'office-documents', NULL, 1, '2022-10-01 04:02:19', '2022-10-01 04:02:19'),
(5, 'Sports Equipment', 'sports-equipment', NULL, 1, '2022-10-01 04:03:56', '2022-10-01 04:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `preregistrations`
--

CREATE TABLE `preregistrations` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `fecha_de_inters` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `tipos_de_documento` varchar(255) DEFAULT NULL,
  `numero_de_documento` varchar(255) DEFAULT NULL,
  `fecha_de_expedicion` varchar(255) DEFAULT NULL,
  `ciudad_de_expedicion` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `numero_celular_de_contacto` varchar(255) DEFAULT NULL,
  `correo_electrnico` varchar(255) DEFAULT NULL,
  `programa_acadmico` varchar(255) DEFAULT NULL,
  `por_que_le_interesa_esta_programa_acadmico` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preregistrations`
--

INSERT INTO `preregistrations` (`id`, `db4_status`, `fecha_de_inters`, `nombres`, `apellidos`, `tipos_de_documento`, `numero_de_documento`, `fecha_de_expedicion`, `ciudad_de_expedicion`, `departamento`, `numero_celular_de_contacto`, `correo_electrnico`, `programa_acadmico`, `por_que_le_interesa_esta_programa_acadmico`, `status`, `form_date`) VALUES
(1, 'unread', '08/02/2023', 'dsfvzfxg', 'sdfgsdfg', 'Tarjeta de identidad', '45645654', '08/23/2023', 'demo', 'AMAZONAS', '+573213005000', 'demo@demo.com', 'Tecnología en Química industrial - Presencial', 'ertuetryuetru', '', '2023-08-09 21:48:43'),
(2, 'unread', '12/01/2023', 'CARLOS ANDRES', 'CHACON ANDRADE', 'Cedula de ciudadanía', '80500499', '03/07/1997', 'COGUA', 'CUNDINAMARCA', '+573168104862', 'netlogyc@gmail.com', 'Tecnología en Dirección comercial - Presencial', 'prueba de sistema', '', '2023-08-09 22:26:48'),
(3, 'unread', '08/16/2023', 'Matias', 'Chacon montes', 'Tarjeta de identidad', '123456789', '08/01/2023', 'Zipaquira', 'CUNDINAMARCA', '+573005001234', 'matias@netlogyc.com', 'Técnico Profesional en Operación de Sonido y Grabación - Presencial', 'Demo', '', '2023-08-09 23:09:35'),
(4, 'unread', '08/03/2023', 'William Andres', 'Garnica Jula', 'Cedula de ciudadanía', '1076567545', '08/02/2000', 'Zipaquira', 'CUNDINAMARCA', '+573125786590', 'andres@gmail.com', 'Tecnología en Gestión de la Seguridad y Salud en el Trabajo - Virtual', 'oferta laboral', '', '2023-08-10 00:21:47'),
(5, 'unread', '08/10/2023', 'Diego', 'Rodriguez Sánchez', 'Tarjeta de identidad', '', '08/05/2020', 'Cajicá', 'CUNDINAMARCA', '+573101234567', 'diego@gmail.com', 'Tecnología en Dirección comercial - Presencial', 'aprender sobre ventas', '', '2023-08-10 00:25:04'),
(6, 'unread', '08/09/2023', 'Javier', 'Montes', 'Cedula de ciudadanía', '1234', '08/12/2022', 'Zipaquira', 'CUNDINAMARCA', '', 'javier@gmail.com', 'Tecnología en Dirección comercial - Presencial', 'a', '', '2023-08-10 02:52:07'),
(7, 'unread', '08/01/2023', 'NELSON', 'CLAVIJO', 'Cedula de ciudadanía', '987654321', '08/01/2000', 'BOGOTA', 'BOGOTA, D.C.', '+573005001234', 'nelson@ctb.edu.co', 'Tecnología en Química industrial - Presencial', 'estamos haciendo una prueba', '', '2023-08-10 14:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `print_settings`
--

CREATE TABLE `print_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `title` text DEFAULT NULL,
  `header_left` text DEFAULT NULL,
  `header_center` text DEFAULT NULL,
  `header_right` text DEFAULT NULL,
  `body` text DEFAULT NULL,
  `footer_left` text DEFAULT NULL,
  `footer_center` text DEFAULT NULL,
  `footer_right` text DEFAULT NULL,
  `logo_left` text DEFAULT NULL,
  `logo_right` text DEFAULT NULL,
  `background` text DEFAULT NULL,
  `width` varchar(191) NOT NULL DEFAULT 'auto',
  `height` varchar(191) NOT NULL DEFAULT 'auto',
  `student_photo` tinyint(1) NOT NULL DEFAULT 0,
  `barcode` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `print_settings`
--

INSERT INTO `print_settings` (`id`, `slug`, `title`, `header_left`, `header_center`, `header_right`, `body`, `footer_left`, `footer_center`, `footer_right`, `logo_left`, `logo_right`, `background`, `width`, `height`, `student_photo`, `barcode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'class-routine', 'CORPORACIÓN TECNOLÓGICA DE BOGOTÁ', NULL, NULL, NULL, '<p>Horarios Instituci&oacute;n Corporaci&oacute;n Tecnol&oacute;gica de Bogot&aacute;</p>', NULL, NULL, NULL, 'logon2_1691634534.png', 'logon2_1691634534.png', NULL, '1000px', 'auto', 0, 0, 1, '2022-09-30 13:44:31', '2023-08-10 00:29:37'),
(2, 'exam-routine', 'Horario de Exámenes Corporación Tecnológica de Bogotá', NULL, NULL, NULL, '<p>Horario de Ex&aacute;menes Corporaci&oacute;n Tecnol&oacute;gica de Bogot&aacute;</p>', NULL, NULL, NULL, 'logon2_1691634633.png', 'logon2_1691634633.png', NULL, '800px', 'auto', 0, 0, 1, '2022-09-30 13:45:22', '2023-08-10 00:30:33'),
(3, 'admit-card', 'Final Exam Admit Card', NULL, NULL, NULL, NULL, 'Exam Controller', NULL, 'Issued By', 'logo_1664567252.jpg', NULL, NULL, '600px', 'auto', 1, 0, 1, '2022-09-30 13:47:32', '2022-10-01 04:36:39'),
(4, 'fees-receipt', 'Our University Fees Receipt', NULL, NULL, NULL, NULL, 'Student Signature', NULL, 'Receiver Signature', 'logo_1664567807.jpg', 'logo_1664567807.jpg', NULL, '800px', 'auto', 0, 0, 1, '2022-09-30 13:56:47', '2022-10-01 04:26:02'),
(5, 'pay-slip', 'Our University Salary Pay Slip', NULL, NULL, NULL, NULL, 'Accountant', NULL, 'Receiver', NULL, 'logo_1664568033.jpg', NULL, '800px', 'auto', 0, 0, 1, '2022-09-30 14:00:33', '2022-10-01 04:14:05'),
(6, 'visitor-token', 'Visitor Token', NULL, NULL, NULL, NULL, 'Authority', NULL, 'Issues By', NULL, 'logo_1664617034.jpg', NULL, '600px', 'auto', 0, 1, 1, '2022-10-01 03:37:14', '2022-10-01 12:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `shortcode` varchar(191) DEFAULT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_get` varchar(191) DEFAULT NULL,
  `code_snies` double DEFAULT NULL,
  `validity_init` date DEFAULT NULL,
  `validity_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `faculty_id`, `title`, `slug`, `shortcode`, `registration`, `status`, `created_at`, `updated_at`, `title_get`, `code_snies`, `validity_init`, `validity_end`) VALUES
(8, 5, '19367 TECNICO PROFESIONAL EN OPERACION DE SONIDO Y GRABACION', '19367-tecnico-profesional-en-operacion-de-sonido-y-grabacion', 'TPSYG PENSUM TECNICO PROFESIONAL EN OPERACION DE SONIDO Y GRABACION NOCTURNO', 0, 1, '2023-07-14 19:43:44', '2023-08-03 20:46:38', 'TECNICO PROFESIONAL EN OPERACION DE SONIDO Y GRABACION', 109366, '2020-08-20', '2025-12-30'),
(9, 5, '2206 TECNOLOGIA EN REGENCIA DE FARMACIA', '2206-tecnologia-en-regencia-de-farmacia', 'TRFMD PENSUM DIURNO DE REGENCIA DE FARMACIA MODULOS I PERIODO 2017', 0, 1, '2023-07-31 17:29:14', '2023-08-03 20:54:46', 'TECNÓLOGO EN REGENCIA DE FARMACIA', 2206, '2017-01-23', '2025-12-31'),
(10, 5, '2205 TECNOLOGIA EN QUIMICA INDUSTRIAL', '2205-tecnologia-en-quimica-industrial', '1109A PENSUM DIURNO DE QUIMICA II PERIODO ACADEMICO DE 2011', 0, 1, '2023-08-02 21:32:26', '2023-08-03 20:51:44', 'TECNÓLOGO EN QUÍMICA INDUSTRIAL', 2205, '2011-06-01', '2025-12-01'),
(11, 5, '11051 TECNOLOGIA EN GESTION DE LA SEGURIDAD Y SALUD EN EL TRABAJO', '11051-tecnologia-en-gestion-de-la-seguridad-y-salud-en-el-trabajo', 'TGST PENSUM TECNOLOGIA EN GESTION DE LA SEGURIDAD Y SALUD EN EL TRABAJO', 0, 1, '2023-08-02 21:33:01', '2023-08-03 20:49:22', 'TECNÓLOGO EN GESTION DE LA SEGURIDAD Y SALUD EN EL TRABAJO', 110511, '2022-11-01', '2028-09-28'),
(12, 5, '0001 DEPARTAMENTO DE CIENCIAS BASICAS', '0001-departamento-de-ciencias-basicas', 'NIVF2 PENSUM NIVELACION UDCA TRF', 0, 1, '2023-08-03 20:57:33', '2023-08-03 20:57:33', 'TECNÓLOGO EN REGENCIA DE FARMACIA', 0, '2020-01-27', '2025-06-20'),
(13, 5, '11008 TECNOLOGIA EN DIRECCIÓN COMERCIAL', '11008-tecnologia-en-direccion-comercial', 'TDC PENSUM TECNOLOGIA EN DIRECCION COMERCIAL DIA', 0, 1, '2023-08-09 22:39:39', '2023-08-09 22:39:39', 'TECNÓLOGO EN DIRECCIÓN COMERCIAL', 110087, '2021-04-01', '2028-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `program_class_room`
--

CREATE TABLE `program_class_room` (
  `program_id` int(10) UNSIGNED NOT NULL,
  `class_room_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_semester`
--

CREATE TABLE `program_semester` (
  `program_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_semester`
--

INSERT INTO `program_semester` (`program_id`, `semester_id`) VALUES
(8, 11),
(8, 12),
(8, 13),
(12, 1),
(13, 1),
(11, 1),
(8, 1),
(10, 1),
(9, 1),
(12, 4),
(13, 4),
(11, 4),
(8, 4),
(10, 4),
(9, 4),
(12, 2),
(13, 2),
(11, 2),
(8, 2),
(10, 2),
(9, 2),
(12, 3),
(13, 3),
(11, 3),
(8, 3),
(10, 3),
(9, 3),
(12, 5),
(13, 5),
(11, 5),
(8, 5),
(10, 5),
(9, 5),
(12, 6),
(13, 6),
(11, 6),
(8, 6),
(10, 6),
(9, 6),
(12, 7),
(13, 7),
(11, 7),
(8, 7),
(10, 7),
(9, 7),
(12, 8),
(13, 8),
(11, 8),
(8, 8),
(10, 8),
(9, 8),
(12, 9),
(13, 9),
(11, 9),
(8, 9),
(10, 9),
(9, 9),
(12, 10),
(13, 10),
(11, 10),
(8, 10),
(10, 10),
(9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `program_semester_sections`
--

CREATE TABLE `program_semester_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_semester_sections`
--

INSERT INTO `program_semester_sections` (`id`, `program_id`, `semester_id`, `section_id`, `created_at`, `updated_at`) VALUES
(157, 12, 10, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(158, 12, 1, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(159, 12, 2, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(160, 12, 3, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(161, 12, 4, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(162, 12, 5, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(163, 12, 6, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(164, 12, 7, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(165, 12, 8, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(166, 12, 9, 1, '2023-08-09 23:58:18', '2023-08-09 23:58:18'),
(167, 13, 10, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(168, 13, 1, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(169, 13, 2, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(170, 13, 3, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(171, 13, 4, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(172, 13, 5, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(173, 13, 6, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(174, 13, 7, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(175, 13, 8, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(176, 13, 9, 2, '2023-08-09 23:58:34', '2023-08-09 23:58:34'),
(177, 8, 10, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(178, 8, 1, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(179, 8, 2, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(180, 8, 3, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(181, 8, 4, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(182, 8, 5, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(183, 8, 6, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(184, 8, 7, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(185, 8, 8, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(186, 8, 9, 3, '2023-08-09 23:58:56', '2023-08-09 23:58:56'),
(247, 11, 10, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(248, 11, 1, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(249, 11, 2, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(250, 11, 3, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(251, 11, 4, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(252, 11, 5, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(253, 11, 6, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(254, 11, 7, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(255, 11, 8, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(256, 11, 9, 5, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(257, 10, 10, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(258, 10, 1, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(259, 10, 2, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(260, 10, 3, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(261, 10, 4, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(262, 10, 5, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(263, 10, 6, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(264, 10, 7, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(265, 10, 8, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(266, 10, 9, 6, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(267, 9, 10, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(268, 9, 1, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(269, 9, 2, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(270, 9, 3, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(271, 9, 4, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(272, 9, 5, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(273, 9, 6, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(274, 9, 7, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(275, 9, 8, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46'),
(276, 9, 9, 7, '2023-08-10 00:01:46', '2023-08-10 00:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `program_session`
--

CREATE TABLE `program_session` (
  `program_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_session`
--

INSERT INTO `program_session` (`program_id`, `session_id`) VALUES
(12, 4),
(13, 4),
(11, 4),
(8, 4),
(10, 4),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `program_subject`
--

CREATE TABLE `program_subject` (
  `program_id` int(10) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_subject`
--

INSERT INTO `program_subject` (`program_id`, `subject_id`) VALUES
(8, 14),
(8, 15),
(8, 17),
(8, 18),
(8, 19),
(8, 20),
(8, 16),
(8, 21),
(8, 22),
(8, 23),
(8, 24),
(8, 25),
(8, 26),
(8, 27),
(8, 28),
(8, 29),
(8, 30),
(8, 31),
(8, 32),
(8, 33),
(8, 34),
(8, 35),
(8, 36),
(8, 37),
(8, 38),
(9, 39),
(9, 40),
(9, 41),
(9, 42),
(9, 43),
(9, 44),
(9, 45),
(9, 46),
(9, 47),
(9, 48),
(9, 49),
(9, 50),
(9, 51),
(9, 52),
(9, 53),
(9, 54),
(9, 55),
(9, 56),
(9, 57),
(9, 58),
(9, 59),
(9, 60),
(9, 61),
(9, 62),
(9, 63),
(9, 64),
(9, 65),
(9, 66),
(9, 67),
(9, 68),
(9, 69),
(9, 70),
(9, 71),
(9, 72),
(9, 73),
(9, 74),
(13, 75),
(13, 76);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Cundinamarca', 'cundinamarca', NULL, 1, '2023-07-12 16:09:49', '2023-07-12 16:09:49'),
(6, 'BOGOTA, D.C.', 'bogota-dc', NULL, 1, '2023-08-09 21:32:53', '2023-08-09 21:32:53'),
(7, 'BOLIVAR', 'bolivar', NULL, 1, '2023-08-09 21:33:11', '2023-08-09 21:33:11'),
(8, 'BOYACA', 'boyaca', NULL, 1, '2023-08-09 21:33:18', '2023-08-09 21:33:18'),
(9, 'CALDAS', 'caldas', NULL, 1, '2023-08-09 21:33:22', '2023-08-09 21:33:22'),
(10, 'CAQUETA', 'caqueta', NULL, 1, '2023-08-09 21:33:27', '2023-08-09 21:33:27'),
(11, 'CASANARE', 'casanare', NULL, 1, '2023-08-09 21:33:31', '2023-08-09 21:33:31'),
(12, 'CAUCA', 'cauca', NULL, 1, '2023-08-09 21:33:35', '2023-08-09 21:33:35'),
(13, 'CESAR', 'cesar', NULL, 1, '2023-08-09 21:33:40', '2023-08-09 21:33:40'),
(14, 'CHOCO', 'choco', NULL, 1, '2023-08-09 21:33:47', '2023-08-09 21:33:47'),
(15, 'CORDOBA', 'cordoba', NULL, 1, '2023-08-09 21:33:52', '2023-08-09 21:33:52'),
(16, 'GUAINIA', 'guainia', NULL, 1, '2023-08-09 21:33:55', '2023-08-09 21:33:55'),
(17, 'GUAVIARE', 'guaviare', NULL, 1, '2023-08-09 21:33:59', '2023-08-09 21:33:59'),
(18, 'HUILA', 'huila', NULL, 1, '2023-08-09 21:34:03', '2023-08-09 21:34:03'),
(19, 'LA GUAJIRA', 'la-guajira', NULL, 1, '2023-08-09 21:34:14', '2023-08-09 21:34:14'),
(20, 'MAGDALENA', 'magdalena', NULL, 1, '2023-08-09 21:34:19', '2023-08-09 21:34:19'),
(21, 'META', 'meta', NULL, 1, '2023-08-09 21:34:27', '2023-08-09 21:34:27'),
(22, 'NARIÑO', 'narino', NULL, 1, '2023-08-09 21:34:32', '2023-08-09 21:34:32'),
(23, 'NORTE DE SANTANDER', 'norte-de-santander', NULL, 1, '2023-08-09 21:34:37', '2023-08-09 21:34:37'),
(24, 'PUTUMAYO', 'putumayo', NULL, 1, '2023-08-09 21:34:43', '2023-08-09 21:34:43'),
(25, 'QUINDIO', 'quindio', NULL, 1, '2023-08-09 21:34:47', '2023-08-09 21:34:47'),
(26, 'RISARALDA', 'risaralda', NULL, 1, '2023-08-09 21:34:51', '2023-08-09 21:34:51'),
(27, 'SANTANDER', 'santander', NULL, 1, '2023-08-09 21:34:55', '2023-08-09 21:34:55'),
(28, 'SUCRE', 'sucre', NULL, 1, '2023-08-09 21:34:59', '2023-08-09 21:34:59'),
(29, 'TOLIMA', 'tolima', NULL, 1, '2023-08-09 21:35:03', '2023-08-09 21:35:03'),
(30, 'VALLE DEL CAUCA', 'valle-del-cauca', NULL, 1, '2023-08-09 21:35:06', '2023-08-09 21:35:06'),
(31, 'VAUPES', 'vaupes', NULL, 1, '2023-08-09 21:35:10', '2023-08-09 21:35:10'),
(32, 'VICHADA', 'vichada', NULL, 1, '2023-08-09 21:35:14', '2023-08-09 21:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `result_contributions`
--

CREATE TABLE `result_contributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendances` decimal(5,2) NOT NULL DEFAULT 0.00,
  `assignments` decimal(5,2) NOT NULL DEFAULT 0.00,
  `activities` decimal(5,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_contributions`
--

INSERT INTO `result_contributions` (`id`, `attendances`, `assignments`, `activities`, `status`, `created_at`, `updated_at`) VALUES
(1, 10.00, 10.00, 10.00, 1, NULL, '2023-02-13 11:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL DEFAULT 'web',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', 'web', '2022-09-30 12:00:46', '2022-09-30 12:00:46'),
(2, 'Admin', 'admin', 'web', NULL, NULL),
(3, 'Accountant', 'accountant', 'web', NULL, NULL),
(4, 'Librarian', 'librarian', 'web', NULL, NULL),
(5, 'Receptionist', 'receptionist', 'web', NULL, NULL),
(6, 'Teacher', 'teacher', 'web', NULL, NULL),
(7, 'Office Staff', 'office-staff', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(689, 1),
(689, 2),
(690, 1),
(690, 2),
(690, 6),
(691, 1),
(691, 2),
(693, 1),
(693, 2),
(693, 4),
(693, 6),
(694, 1),
(694, 2),
(695, 1),
(695, 2),
(696, 1),
(697, 2),
(698, 2),
(699, 2),
(700, 1),
(700, 2),
(701, 1),
(701, 2),
(702, 1),
(702, 2),
(703, 2),
(704, 1),
(704, 2),
(705, 1),
(705, 2),
(706, 2),
(707, 1),
(708, 1),
(709, 1),
(710, 1),
(711, 6),
(712, 6),
(713, 6),
(714, 6),
(716, 2),
(716, 6),
(717, 2),
(717, 6),
(718, 2),
(718, 6),
(720, 1),
(720, 2),
(721, 1),
(721, 2),
(722, 1),
(722, 2),
(723, 1),
(723, 2),
(724, 1),
(724, 2),
(725, 1),
(726, 1),
(727, 1),
(728, 1),
(729, 1),
(730, 1),
(731, 1),
(732, 1),
(733, 1),
(734, 1),
(735, 1),
(736, 1),
(737, 1),
(738, 1),
(739, 1),
(740, 1),
(741, 1),
(742, 1),
(743, 1),
(744, 1),
(745, 1),
(746, 1),
(747, 1),
(748, 1),
(749, 1),
(750, 1),
(751, 1),
(752, 1),
(753, 1),
(754, 1),
(755, 1),
(756, 1),
(757, 1),
(758, 1),
(759, 1),
(760, 1),
(761, 6),
(762, 6),
(763, 6),
(764, 6),
(765, 6),
(766, 6),
(767, 6),
(768, 6),
(769, 6),
(770, 2),
(771, 2),
(772, 6),
(773, 6),
(774, 6),
(775, 6),
(776, 6),
(777, 1),
(778, 1),
(779, 1),
(780, 1),
(781, 1),
(782, 1),
(783, 1),
(784, 1),
(785, 1),
(788, 1),
(789, 1),
(790, 1),
(790, 6),
(791, 1),
(791, 6),
(792, 1),
(792, 6),
(793, 1),
(794, 1),
(794, 6),
(795, 6),
(796, 6),
(797, 6),
(799, 1),
(800, 1),
(801, 1),
(802, 1),
(803, 3),
(804, 3),
(805, 3),
(806, 3),
(807, 3),
(808, 3),
(809, 1),
(810, 3),
(811, 3),
(812, 1),
(813, 1),
(814, 1),
(815, 1),
(816, 3),
(817, 3),
(818, 3),
(820, 1),
(821, 1),
(822, 1),
(823, 1),
(824, 2),
(825, 2),
(826, 2),
(828, 2),
(829, 2),
(830, 2),
(831, 2),
(832, 2),
(833, 2),
(834, 2),
(835, 2),
(837, 3),
(838, 3),
(839, 3),
(840, 3),
(841, 1),
(848, 1),
(849, 1),
(850, 1),
(851, 1),
(852, 1),
(853, 1),
(854, 1),
(855, 1),
(856, 1),
(857, 1),
(858, 1),
(859, 1),
(860, 1),
(861, 1),
(862, 1),
(863, 1),
(864, 1),
(865, 1),
(866, 1),
(867, 1),
(868, 3),
(869, 3),
(870, 3),
(876, 3),
(877, 3),
(878, 3),
(884, 3),
(885, 2),
(886, 2),
(888, 2),
(889, 2),
(891, 1),
(891, 2),
(892, 1),
(892, 2),
(893, 1),
(893, 2),
(895, 1),
(896, 1),
(897, 1),
(898, 1),
(900, 1),
(901, 1),
(902, 1),
(903, 1),
(904, 4),
(905, 4),
(907, 4),
(908, 4),
(909, 4),
(910, 4),
(912, 4),
(913, 1),
(914, 4),
(915, 4),
(916, 4),
(918, 4),
(919, 4),
(920, 4),
(921, 4),
(923, 4),
(924, 4),
(925, 4),
(927, 7),
(928, 7),
(930, 7),
(931, 7),
(932, 7),
(934, 1),
(935, 1),
(936, 1),
(937, 1),
(938, 1),
(939, 1),
(940, 1),
(941, 1),
(942, 1),
(943, 1),
(944, 1),
(945, 1),
(946, 1),
(947, 1),
(948, 1),
(949, 1),
(950, 7),
(951, 7),
(952, 1),
(953, 1),
(954, 1),
(955, 1),
(956, 1),
(957, 1),
(958, 1),
(959, 1),
(960, 1),
(961, 1),
(962, 1),
(963, 1),
(964, 7),
(965, 7),
(966, 1),
(967, 1),
(968, 1),
(969, 1),
(970, 1),
(971, 1),
(972, 1),
(973, 1),
(974, 5),
(975, 5),
(976, 5),
(978, 5),
(979, 1),
(980, 1),
(981, 1),
(982, 1),
(983, 1),
(984, 5),
(985, 5),
(986, 5),
(988, 1),
(988, 5),
(989, 1),
(989, 5),
(990, 1),
(990, 5),
(991, 1),
(1000, 1),
(1000, 5),
(1001, 1),
(1001, 5),
(1002, 1),
(1002, 5),
(1003, 1),
(1008, 1),
(1009, 1),
(1010, 1),
(1011, 1),
(1012, 5),
(1013, 5),
(1014, 5),
(1016, 1),
(1017, 1),
(1018, 1),
(1019, 1),
(1020, 1),
(1020, 5),
(1021, 5),
(1022, 5),
(1024, 1),
(1025, 1),
(1026, 1),
(1027, 1),
(1028, 1),
(1028, 2),
(1029, 2),
(1030, 2),
(1031, 1),
(1032, 1),
(1032, 2),
(1033, 1),
(1033, 2),
(1034, 2),
(1035, 2),
(1036, 1),
(1036, 2),
(1037, 1),
(1038, 1),
(1039, 1),
(1040, 1),
(1041, 1),
(1042, 1),
(1043, 1),
(1044, 1),
(1045, 1),
(1046, 1),
(1047, 1),
(1048, 1),
(1049, 1),
(1050, 1),
(1051, 1),
(1052, 1),
(1053, 1),
(1054, 1),
(1056, 1),
(1057, 1),
(1058, 1),
(1059, 1),
(1060, 1),
(1061, 1),
(1061, 2),
(1061, 3),
(1061, 6),
(1061, 7),
(1062, 1),
(1063, 1),
(1064, 1),
(1065, 1),
(1066, 1),
(1067, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_settings`
--

CREATE TABLE `schedule_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `day` int(11) NOT NULL,
  `time` time NOT NULL,
  `email` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 Inactive, 1 Active',
  `sms` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 Inactive, 1 Active',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `seat` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `seat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Section A', NULL, 1, '2022-09-30 13:27:34', '2022-09-30 13:28:09'),
(2, 'Section B', NULL, 1, '2022-09-30 13:29:15', '2022-09-30 13:29:15'),
(3, 'Section C', NULL, 1, '2022-09-30 13:30:12', '2022-09-30 13:30:12'),
(5, 'Sección D', NULL, 1, '2023-08-10 00:00:42', '2023-08-10 00:00:42'),
(6, 'Sección E', NULL, 1, '2023-08-10 00:01:20', '2023-08-10 00:01:20'),
(7, 'Sección F', NULL, 1, '2023-08-10 00:01:46', '2023-08-10 00:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `year` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `title`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, '1st Semester', '1', 1, '2022-09-30 13:22:04', '2022-09-30 13:22:04'),
(2, '2nd Semester', '1', 1, '2022-09-30 13:22:18', '2022-09-30 13:22:18'),
(3, '3rd Semester', '2', 1, '2022-09-30 13:22:32', '2022-09-30 13:22:32'),
(4, '4th Semester', '2', 1, '2022-09-30 13:22:48', '2022-09-30 13:22:48'),
(5, '5th Semester', '3', 1, '2022-09-30 13:23:03', '2022-09-30 13:23:03'),
(6, '6th Semester', '3', 1, '2022-09-30 13:23:13', '2022-09-30 13:23:13'),
(7, '7th Semester', '4', 1, '2022-09-30 13:23:24', '2022-09-30 13:23:24'),
(8, '8th Semester', '4', 1, '2022-09-30 13:23:32', '2022-09-30 13:23:32'),
(9, '9th Semester', '5', 1, '2022-09-30 13:24:02', '2022-09-30 13:24:02'),
(10, '10th Semester', '5', 1, '2022-09-30 13:24:55', '2022-09-30 13:24:55'),
(11, 'Nivel 1', '1', 0, '2023-07-14 20:36:14', '2023-08-09 23:02:56'),
(12, 'Nivel 2', '1', 0, '2023-07-14 20:36:31', '2023-08-09 23:03:06'),
(13, 'Nivel 3', '2', 0, '2023-07-14 20:36:44', '2023-08-09 23:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `current` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `title`, `start_date`, `end_date`, `current`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Periodo 2023-2', '2023-07-17', '2023-11-24', 0, 1, '2022-09-30 13:18:44', '2023-08-10 00:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `academy_code` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `logo_path` text DEFAULT NULL,
  `favicon_path` text DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `fax` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `language` varchar(191) DEFAULT NULL,
  `date_format` varchar(191) DEFAULT NULL,
  `time_format` varchar(191) DEFAULT NULL,
  `week_start` varchar(191) DEFAULT NULL,
  `time_zone` varchar(191) DEFAULT NULL,
  `currency` varchar(191) DEFAULT NULL,
  `currency_symbol` varchar(191) DEFAULT NULL,
  `decimal_place` int(11) NOT NULL DEFAULT 2,
  `copyright_text` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `academy_code`, `meta_title`, `meta_description`, `meta_keywords`, `logo_path`, `favicon_path`, `phone`, `email`, `fax`, `address`, `language`, `date_format`, `time_format`, `week_start`, `time_zone`, `currency`, `currency_symbol`, `decimal_place`, `copyright_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CORPORACIÓN TECNOLÓGICA DE BOGOTÁ', NULL, 'CTB DEV TEDUCA', NULL, NULL, 'LOGOCTB_03_1691619506.png', 'CTB_Favicon_1691619506.png', NULL, NULL, NULL, NULL, NULL, 'd-m-Y', 'h:i A', NULL, 'America/Bogota', 'COP', '$', 2, '<p>DEV: CORPORACI&Oacute;N TECNOL&Oacute;GICA DE BOGOT&Aacute;</p>', 1, '2022-09-30 12:00:47', '2023-08-09 20:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendances`
--

CREATE TABLE `staff_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date NOT NULL,
  `attendance` int(11) NOT NULL DEFAULT 0 COMMENT '1 Present, 2 Absent, 3 Leave, 4 Holiday',
  `note` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_attendances`
--

INSERT INTO `staff_attendances` (`id`, `user_id`, `start_time`, `end_time`, `date`, `attendance`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 9, NULL, NULL, '2022-10-03', 1, '', 1, NULL, '2022-10-03 15:09:56', '2022-10-03 15:16:33'),
(2, 8, NULL, NULL, '2022-10-03', 1, '', 1, NULL, '2022-10-03 15:09:56', '2022-10-03 15:16:33'),
(3, 7, NULL, NULL, '2022-10-03', 1, '', 1, NULL, '2022-10-03 15:09:56', '2022-10-03 15:16:33'),
(4, 6, NULL, NULL, '2022-10-03', 1, '', 1, NULL, '2022-10-03 15:09:56', '2022-10-03 15:16:33'),
(5, 5, NULL, NULL, '2022-10-03', 1, '', 1, NULL, '2022-10-03 15:09:56', '2022-10-03 15:16:33'),
(6, 2, NULL, NULL, '2022-10-03', 1, '', 1, NULL, '2022-10-03 15:09:56', '2022-10-03 15:16:33'),
(7, 1, NULL, NULL, '2022-10-03', 1, '', 1, NULL, '2022-10-03 15:09:56', '2022-10-03 15:16:33'),
(8, 9, NULL, NULL, '2022-10-05', 2, '', 1, NULL, '2022-10-03 15:10:12', '2022-10-03 15:10:12'),
(9, 8, NULL, NULL, '2022-10-05', 1, '', 1, NULL, '2022-10-03 15:10:12', '2022-10-03 15:10:12'),
(10, 7, NULL, NULL, '2022-10-05', 1, '', 1, NULL, '2022-10-03 15:10:12', '2022-10-03 15:10:12'),
(11, 6, NULL, NULL, '2022-10-05', 1, '', 1, NULL, '2022-10-03 15:10:12', '2022-10-03 15:10:12'),
(12, 5, NULL, NULL, '2022-10-05', 1, '', 1, NULL, '2022-10-03 15:10:12', '2022-10-03 15:10:12'),
(13, 2, NULL, NULL, '2022-10-05', 3, '', 1, NULL, '2022-10-03 15:10:12', '2022-10-03 15:10:12'),
(14, 1, NULL, NULL, '2022-10-05', 1, '', 1, NULL, '2022-10-03 15:10:12', '2022-10-03 15:10:12'),
(15, 9, NULL, NULL, '2022-10-09', 4, '', 1, NULL, '2022-10-03 15:10:34', '2022-10-03 15:10:34'),
(16, 8, NULL, NULL, '2022-10-09', 4, '', 1, NULL, '2022-10-03 15:10:34', '2022-10-03 15:10:34'),
(17, 7, NULL, NULL, '2022-10-09', 4, '', 1, NULL, '2022-10-03 15:10:34', '2022-10-03 15:10:34'),
(18, 6, NULL, NULL, '2022-10-09', 4, '', 1, NULL, '2022-10-03 15:10:34', '2022-10-03 15:10:34'),
(19, 5, NULL, NULL, '2022-10-09', 4, '', 1, NULL, '2022-10-03 15:10:34', '2022-10-03 15:10:34'),
(20, 2, NULL, NULL, '2022-10-09', 4, '', 1, NULL, '2022-10-03 15:10:34', '2022-10-03 15:10:34'),
(21, 1, NULL, NULL, '2022-10-09', 4, '', 1, NULL, '2022-10-03 15:10:34', '2022-10-03 15:10:34'),
(22, 9, NULL, NULL, '2022-10-11', 1, '', 1, NULL, '2022-10-03 15:10:50', '2022-10-03 15:10:50'),
(23, 8, NULL, NULL, '2022-10-11', 1, '', 1, NULL, '2022-10-03 15:10:50', '2022-10-03 15:10:50'),
(24, 7, NULL, NULL, '2022-10-11', 1, '', 1, NULL, '2022-10-03 15:10:50', '2022-10-03 15:10:50'),
(25, 6, NULL, NULL, '2022-10-11', 1, '', 1, NULL, '2022-10-03 15:10:50', '2022-10-03 15:10:50'),
(26, 5, NULL, NULL, '2022-10-11', 3, '', 1, NULL, '2022-10-03 15:10:50', '2022-10-03 15:10:50'),
(27, 2, NULL, NULL, '2022-10-11', 1, '', 1, NULL, '2022-10-03 15:10:50', '2022-10-03 15:10:50'),
(28, 1, NULL, NULL, '2022-10-11', 1, '', 1, NULL, '2022-10-03 15:10:50', '2022-10-03 15:10:50'),
(29, 9, NULL, NULL, '2022-10-13', 2, '', 1, NULL, '2022-10-03 15:11:07', '2022-10-03 15:11:07'),
(30, 8, NULL, NULL, '2022-10-13', 1, '', 1, NULL, '2022-10-03 15:11:07', '2022-10-03 15:11:07'),
(31, 7, NULL, NULL, '2022-10-13', 1, '', 1, NULL, '2022-10-03 15:11:07', '2022-10-03 15:11:07'),
(32, 6, NULL, NULL, '2022-10-13', 1, '', 1, NULL, '2022-10-03 15:11:07', '2022-10-03 15:11:07'),
(33, 5, NULL, NULL, '2022-10-13', 1, '', 1, NULL, '2022-10-03 15:11:07', '2022-10-03 15:11:07'),
(34, 2, NULL, NULL, '2022-10-13', 1, '', 1, NULL, '2022-10-03 15:11:07', '2022-10-03 15:11:07'),
(35, 1, NULL, NULL, '2022-10-13', 1, '', 1, NULL, '2022-10-03 15:11:07', '2022-10-03 15:11:07'),
(36, 9, NULL, NULL, '2022-10-15', 1, '', 1, NULL, '2022-10-03 15:11:23', '2022-10-03 15:11:23'),
(37, 8, NULL, NULL, '2022-10-15', 1, '', 1, NULL, '2022-10-03 15:11:23', '2022-10-03 15:11:23'),
(38, 7, NULL, NULL, '2022-10-15', 1, '', 1, NULL, '2022-10-03 15:11:23', '2022-10-03 15:11:23'),
(39, 6, NULL, NULL, '2022-10-15', 1, '', 1, NULL, '2022-10-03 15:11:23', '2022-10-03 15:11:23'),
(40, 5, NULL, NULL, '2022-10-15', 1, '', 1, NULL, '2022-10-03 15:11:23', '2022-10-03 15:11:23'),
(41, 2, NULL, NULL, '2022-10-15', 1, '', 1, NULL, '2022-10-03 15:11:23', '2022-10-03 15:11:23'),
(42, 1, NULL, NULL, '2022-10-15', 3, '', 1, NULL, '2022-10-03 15:11:23', '2022-10-03 15:11:23'),
(43, 9, NULL, NULL, '2022-10-17', 1, '', 1, NULL, '2022-10-03 15:11:39', '2022-10-03 15:11:39'),
(44, 8, NULL, NULL, '2022-10-17', 1, '', 1, NULL, '2022-10-03 15:11:39', '2022-10-03 15:11:39'),
(45, 7, NULL, NULL, '2022-10-17', 1, '', 1, NULL, '2022-10-03 15:11:39', '2022-10-03 15:11:39'),
(46, 6, NULL, NULL, '2022-10-17', 1, '', 1, NULL, '2022-10-03 15:11:39', '2022-10-03 15:11:39'),
(47, 5, NULL, NULL, '2022-10-17', 1, '', 1, NULL, '2022-10-03 15:11:39', '2022-10-03 15:11:39'),
(48, 2, NULL, NULL, '2022-10-17', 1, '', 1, NULL, '2022-10-03 15:11:39', '2022-10-03 15:11:39'),
(49, 1, NULL, NULL, '2022-10-17', 1, '', 1, NULL, '2022-10-03 15:11:39', '2022-10-03 15:11:39'),
(50, 9, NULL, NULL, '2022-10-19', 1, '', 1, NULL, '2022-10-03 15:11:55', '2022-10-03 15:11:55'),
(51, 8, NULL, NULL, '2022-10-19', 1, '', 1, NULL, '2022-10-03 15:11:55', '2022-10-03 15:11:55'),
(52, 7, NULL, NULL, '2022-10-19', 2, '', 1, NULL, '2022-10-03 15:11:55', '2022-10-03 15:11:55'),
(53, 6, NULL, NULL, '2022-10-19', 1, '', 1, NULL, '2022-10-03 15:11:55', '2022-10-03 15:11:55'),
(54, 5, NULL, NULL, '2022-10-19', 1, '', 1, NULL, '2022-10-03 15:11:55', '2022-10-03 15:11:55'),
(55, 2, NULL, NULL, '2022-10-19', 1, '', 1, NULL, '2022-10-03 15:11:55', '2022-10-03 15:11:55'),
(56, 1, NULL, NULL, '2022-10-19', 1, '', 1, NULL, '2022-10-03 15:11:55', '2022-10-03 15:11:55'),
(57, 9, NULL, NULL, '2022-10-21', 1, '', 1, NULL, '2022-10-03 15:12:06', '2022-10-03 15:12:06'),
(58, 8, NULL, NULL, '2022-10-21', 2, '', 1, NULL, '2022-10-03 15:12:06', '2022-10-03 15:12:06'),
(59, 7, NULL, NULL, '2022-10-21', 1, '', 1, NULL, '2022-10-03 15:12:06', '2022-10-03 15:12:06'),
(60, 6, NULL, NULL, '2022-10-21', 1, '', 1, NULL, '2022-10-03 15:12:06', '2022-10-03 15:12:06'),
(61, 5, NULL, NULL, '2022-10-21', 1, '', 1, NULL, '2022-10-03 15:12:06', '2022-10-03 15:12:06'),
(62, 2, NULL, NULL, '2022-10-21', 1, '', 1, NULL, '2022-10-03 15:12:06', '2022-10-03 15:12:06'),
(63, 1, NULL, NULL, '2022-10-21', 1, '', 1, NULL, '2022-10-03 15:12:06', '2022-10-03 15:12:06'),
(64, 9, NULL, NULL, '2022-10-23', 3, '', 1, NULL, '2022-10-03 15:12:19', '2022-10-03 15:12:19'),
(65, 8, NULL, NULL, '2022-10-23', 1, '', 1, NULL, '2022-10-03 15:12:19', '2022-10-03 15:12:19'),
(66, 7, NULL, NULL, '2022-10-23', 1, '', 1, NULL, '2022-10-03 15:12:19', '2022-10-03 15:12:19'),
(67, 6, NULL, NULL, '2022-10-23', 1, '', 1, NULL, '2022-10-03 15:12:19', '2022-10-03 15:12:19'),
(68, 5, NULL, NULL, '2022-10-23', 1, '', 1, NULL, '2022-10-03 15:12:19', '2022-10-03 15:12:19'),
(69, 2, NULL, NULL, '2022-10-23', 1, '', 1, NULL, '2022-10-03 15:12:19', '2022-10-03 15:12:19'),
(70, 1, NULL, NULL, '2022-10-23', 1, '', 1, NULL, '2022-10-03 15:12:19', '2022-10-03 15:12:19'),
(71, 9, NULL, NULL, '2022-10-25', 4, '', 1, NULL, '2022-10-03 15:12:31', '2022-10-03 15:12:31'),
(72, 8, NULL, NULL, '2022-10-25', 4, '', 1, NULL, '2022-10-03 15:12:31', '2022-10-03 15:12:31'),
(73, 7, NULL, NULL, '2022-10-25', 4, '', 1, NULL, '2022-10-03 15:12:31', '2022-10-03 15:12:31'),
(74, 6, NULL, NULL, '2022-10-25', 4, '', 1, NULL, '2022-10-03 15:12:31', '2022-10-03 15:12:31'),
(75, 5, NULL, NULL, '2022-10-25', 4, '', 1, NULL, '2022-10-03 15:12:31', '2022-10-03 15:12:31'),
(76, 2, NULL, NULL, '2022-10-25', 4, '', 1, NULL, '2022-10-03 15:12:31', '2022-10-03 15:12:31'),
(77, 1, NULL, NULL, '2022-10-25', 4, '', 1, NULL, '2022-10-03 15:12:31', '2022-10-03 15:12:31'),
(78, 9, NULL, NULL, '2022-10-27', 1, '', 1, NULL, '2022-10-03 15:12:44', '2022-10-03 15:12:44'),
(79, 8, NULL, NULL, '2022-10-27', 1, '', 1, NULL, '2022-10-03 15:12:44', '2022-10-03 15:12:44'),
(80, 7, NULL, NULL, '2022-10-27', 2, '', 1, NULL, '2022-10-03 15:12:44', '2022-10-03 15:12:44'),
(81, 6, NULL, NULL, '2022-10-27', 1, '', 1, NULL, '2022-10-03 15:12:44', '2022-10-03 15:12:44'),
(82, 5, NULL, NULL, '2022-10-27', 3, '', 1, NULL, '2022-10-03 15:12:44', '2022-10-03 15:12:44'),
(83, 2, NULL, NULL, '2022-10-27', 1, '', 1, NULL, '2022-10-03 15:12:44', '2022-10-03 15:12:44'),
(84, 1, NULL, NULL, '2022-10-27', 1, '', 1, NULL, '2022-10-03 15:12:44', '2022-10-03 15:12:44'),
(85, 9, NULL, NULL, '2022-10-29', 1, '', 1, NULL, '2022-10-03 15:12:58', '2022-10-03 15:12:58'),
(86, 8, NULL, NULL, '2022-10-29', 3, '', 1, NULL, '2022-10-03 15:12:58', '2022-10-03 15:12:58'),
(87, 7, NULL, NULL, '2022-10-29', 1, '', 1, NULL, '2022-10-03 15:12:58', '2022-10-03 15:12:58'),
(88, 6, NULL, NULL, '2022-10-29', 1, '', 1, NULL, '2022-10-03 15:12:58', '2022-10-03 15:12:58'),
(89, 5, NULL, NULL, '2022-10-29', 1, '', 1, NULL, '2022-10-03 15:12:58', '2022-10-03 15:12:58'),
(90, 2, NULL, NULL, '2022-10-29', 2, '', 1, NULL, '2022-10-03 15:12:58', '2022-10-03 15:12:58'),
(91, 1, NULL, NULL, '2022-10-29', 1, '', 1, NULL, '2022-10-03 15:12:58', '2022-10-03 15:12:58'),
(92, 9, NULL, NULL, '2022-10-31', 1, '', 1, NULL, '2022-10-03 15:13:25', '2022-10-03 15:13:25'),
(93, 8, NULL, NULL, '2022-10-31', 1, '', 1, NULL, '2022-10-03 15:13:25', '2022-10-03 15:13:25'),
(94, 7, NULL, NULL, '2022-10-31', 3, '', 1, NULL, '2022-10-03 15:13:25', '2022-10-03 15:13:25'),
(95, 6, NULL, NULL, '2022-10-31', 1, '', 1, NULL, '2022-10-03 15:13:25', '2022-10-03 15:13:25'),
(96, 5, NULL, NULL, '2022-10-31', 1, '', 1, NULL, '2022-10-03 15:13:25', '2022-10-03 15:13:25'),
(97, 2, NULL, NULL, '2022-10-31', 1, '', 1, NULL, '2022-10-03 15:13:25', '2022-10-03 15:13:25'),
(98, 1, NULL, NULL, '2022-10-31', 1, '', 1, NULL, '2022-10-03 15:13:25', '2022-10-03 15:13:25'),
(99, 9, NULL, NULL, '2022-10-01', 1, '', 1, NULL, '2022-10-03 15:13:42', '2022-10-03 15:16:40'),
(100, 8, NULL, NULL, '2022-10-01', 1, '', 1, NULL, '2022-10-03 15:13:42', '2022-10-03 15:16:40'),
(101, 7, NULL, NULL, '2022-10-01', 2, '', 1, NULL, '2022-10-03 15:13:42', '2022-10-03 15:16:40'),
(102, 6, NULL, NULL, '2022-10-01', 1, '', 1, NULL, '2022-10-03 15:13:42', '2022-10-03 15:16:40'),
(103, 5, NULL, NULL, '2022-10-01', 1, '', 1, NULL, '2022-10-03 15:13:42', '2022-10-03 15:16:40'),
(104, 2, NULL, NULL, '2022-10-01', 3, '', 1, NULL, '2022-10-03 15:13:42', '2022-10-03 15:16:40'),
(105, 1, NULL, NULL, '2022-10-01', 1, '', 1, NULL, '2022-10-03 15:13:42', '2022-10-03 15:16:40'),
(106, 9, NULL, NULL, '2022-10-07', 1, '', 1, NULL, '2022-10-03 15:14:19', '2022-10-03 15:14:19'),
(107, 8, NULL, NULL, '2022-10-07', 1, '', 1, NULL, '2022-10-03 15:14:19', '2022-10-03 15:14:19'),
(108, 7, NULL, NULL, '2022-10-07', 1, '', 1, NULL, '2022-10-03 15:14:19', '2022-10-03 15:14:19'),
(109, 6, NULL, NULL, '2022-10-07', 1, '', 1, NULL, '2022-10-03 15:14:19', '2022-10-03 15:14:19'),
(110, 5, NULL, NULL, '2022-10-07', 1, '', 1, NULL, '2022-10-03 15:14:19', '2022-10-03 15:14:19'),
(111, 2, NULL, NULL, '2022-10-07', 2, '', 1, NULL, '2022-10-03 15:14:19', '2022-10-03 15:14:19'),
(112, 1, NULL, NULL, '2022-10-07', 1, '', 1, NULL, '2022-10-03 15:14:19', '2022-10-03 15:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `staff_hourly_attendances`
--

CREATE TABLE `staff_hourly_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `date` date NOT NULL,
  `attendance` int(11) NOT NULL DEFAULT 0 COMMENT '1 Present, 2 Absent, 3 Leave, 4 Holiday',
  `note` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_types`
--

CREATE TABLE `status_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_types`
--

INSERT INTO `status_types` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Inscrito', 'inscrito', NULL, 1, '2023-08-22 15:33:37', '2023-08-22 15:33:37'),
(9, 'Inactivo', 'inactivo', NULL, 1, '2023-08-22 15:34:15', '2023-08-22 15:34:15'),
(10, 'Activo', 'activo', NULL, 1, '2023-08-22 15:34:21', '2023-08-22 15:34:21'),
(11, 'Egresado', 'egresado', NULL, 1, '2023-08-22 15:35:37', '2023-08-22 15:35:37'),
(12, 'Graduado', 'graduado', NULL, 1, '2023-08-22 15:35:43', '2023-08-22 15:35:43'),
(13, 'Traslado', 'traslado', NULL, 1, '2023-08-22 15:35:59', '2023-08-22 15:35:59'),
(14, 'Aplazado', 'aplazado', NULL, 1, '2023-08-22 15:36:08', '2023-08-22 15:36:08'),
(15, 'Condicional', 'condicional', NULL, 1, '2023-08-22 15:36:22', '2023-08-22 15:36:22'),
(16, 'Perdida de calidad de Estudiante', 'perdida-de-calidad-de-estudiante', NULL, 1, '2023-08-22 15:36:44', '2023-08-22 15:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `status_type_student`
--

CREATE TABLE `status_type_student` (
  `status_type_id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(191) NOT NULL,
  `registration_no` varchar(191) DEFAULT NULL,
  `batch_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `mother_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `password_text` longtext DEFAULT NULL,
  `present_province` int(10) UNSIGNED DEFAULT NULL,
  `present_district` int(10) UNSIGNED DEFAULT NULL,
  `present_village` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_province` int(10) UNSIGNED DEFAULT NULL,
  `permanent_district` int(10) UNSIGNED DEFAULT NULL,
  `permanent_village` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `gender` int(11) NOT NULL COMMENT '1 Male, 2 Female & 3 Other',
  `dob` date NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `emergency_phone` varchar(191) DEFAULT NULL,
  `mother_tongue` varchar(191) DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `blood_group` int(11) DEFAULT NULL,
  `nationality` varchar(191) DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `passport_no` varchar(191) DEFAULT NULL,
  `school_name` text DEFAULT NULL,
  `school_exam_id` varchar(191) DEFAULT NULL,
  `school_graduation_year` varchar(191) DEFAULT NULL,
  `school_graduation_point` varchar(191) DEFAULT NULL,
  `collage_name` text DEFAULT NULL,
  `collage_exam_id` varchar(191) DEFAULT NULL,
  `collage_graduation_year` varchar(191) DEFAULT NULL,
  `collage_graduation_point` varchar(191) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `login` tinyint(1) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Inactive, 1 Active, 2 Passed Out, 3 Transfer Out',
  `is_transfer` int(11) DEFAULT 0 COMMENT '0 Not Transfer, 1 Transfer In & 2 Transfer Out',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `father_occupation` varchar(191) DEFAULT NULL,
  `mother_occupation` varchar(191) DEFAULT NULL,
  `father_photo` text DEFAULT NULL,
  `mother_photo` text DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL,
  `school_graduation_field` varchar(191) DEFAULT NULL,
  `collage_graduation_field` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `registration_no`, `batch_id`, `program_id`, `admission_date`, `first_name`, `last_name`, `father_name`, `mother_name`, `email`, `email_verified_at`, `password`, `password_text`, `present_province`, `present_district`, `present_village`, `present_address`, `permanent_province`, `permanent_district`, `permanent_village`, `permanent_address`, `gender`, `dob`, `phone`, `emergency_phone`, `mother_tongue`, `marital_status`, `blood_group`, `nationality`, `national_id`, `passport_no`, `school_name`, `school_exam_id`, `school_graduation_year`, `school_graduation_point`, `collage_name`, `collage_exam_id`, `collage_graduation_year`, `collage_graduation_point`, `photo`, `signature`, `login`, `status`, `is_transfer`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `father_occupation`, `mother_occupation`, `father_photo`, `mother_photo`, `country`, `religion`, `caste`, `school_graduation_field`, `collage_graduation_field`) VALUES
(1, '1001', NULL, 4, 3, '2022-10-02', 'Aimee', 'Hendrix', 'Noble Navarro', 'Beatrice Gardner', 'vytumovib@mailinator.com', NULL, '$2y$10$gzar32PTg.Z2pAMIIYS8kuYj9lufoSLUyanQnIRjzWeyYucOl6J.W', 'eyJpdiI6Im9hRkp0bTVBbHhacnFKRE1qdmRuSmc9PSIsInZhbHVlIjoiTlRWbDg3REk3RFNBYlVXMzVZMXJTQT09IiwibWFjIjoiZjNiNWNlZWM3YThkNjU0ODdjZDc2ZmQ5MTc3YjEyZDEwYjFmNDFmNGRiYTNhNTExOTQzNjUzM2ZjZmYwMjg1NiIsInRhZyI6IiJ9', 1, 6, 'Dolore nihil expedit', 'Ab alias et exceptur', 4, 12, 'Illum inventore qua', 'Aut qui voluptas eli', 2, '2021-02-19', '+1 (119) 978-8885', NULL, NULL, 2, 6, NULL, '546198721365', '48431521679', 'Quintessa Dejesus', '45889658', '1991', '88', 'Mercedes Crane', '987135268', '1982', '99', 'student_1664734514.jpg', NULL, 1, 1, 0, NULL, 1, NULL, '2022-10-02 12:15:14', '2022-10-02 12:15:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1002', NULL, 4, 3, '2022-10-02', 'Lynn', 'Macias', 'Sandra Gomez', 'Bryar Mays', 'hewawo@mailinator.com', NULL, '$2y$10$LxGbLSQwT7Oe4Qre2XcqBuBskapMYQkU3hBrAC3G1pB5lHyCS2U0W', 'eyJpdiI6IjQrZERMQzlmSTJVTGxSUlVQY3hpbUE9PSIsInZhbHVlIjoiRE9VY0ZPKzk2RDU0elB5bEpSQ0xJdz09IiwibWFjIjoiOTMzYWQ0ZjJlNmM0NTk5ZGFmYjJmYjQ3MmJiYWYxYmI0NWU2ZGVjMWVjOWZkNWZjMDFjZDdiY2UzMDE0MGJkMSIsInRhZyI6IiJ9', 4, 4, 'Sunt cupidatat quisq', 'Recusandae Mollit e', 3, 8, 'Dolore mollit omnis', 'Quis eligendi vero d', 2, '2012-11-12', '+1 (325) 943-7187', NULL, NULL, 1, 7, NULL, '42346587687', '786876876', 'Rooney Payne', '142424', '2007', '42', 'Dara Monroe', '4242454', '1991', '77', NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2022-10-02 12:17:47', '2022-10-02 12:17:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '1003', NULL, 4, 3, '2022-10-02', 'Hayden', 'Delgado', 'Mechelle Morse', 'Steel Norris', 'qitisuxyj@mailinator.com', NULL, '$2y$10$uFgBIoBdiaip14.wLfyBvO9Tc9j6epfJjm9uEFlNZVEU1KYeNj1Oi', 'eyJpdiI6IlJqbUFUU0pqRGFEUUpOeVppY01LN1E9PSIsInZhbHVlIjoickt0VXFwelV0Z1NZQU03WWZ5dnVYZz09IiwibWFjIjoiMDhhMzY3MzNlNjhjODMyYzZiOWQ2ZmEyYWRhMWVmY2Q1ZTlhOWJlNDY0MWNiNWM0ZDRlMDQ1Mzg0NTc3ZDdmNCIsInRhZyI6IiJ9', 2, 7, 'Deserunt dolorem et', 'Est enim ab aliquip', 1, 1, 'Omnis rerum dolore n', 'Sint ut cillum numqu', 1, '1987-07-15', '+1 (316) 682-6975', NULL, NULL, 4, 1, NULL, '1245687979', '789876876', 'Uriel Ortega', '457578', '1971', '88', 'Eaton Haley', '4654645', '1979', '77', NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2022-10-02 12:20:00', '2022-10-02 12:20:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '1004', NULL, 4, 3, '2022-10-02', 'Abigail', 'Robles', 'Jolene Zimmerman', 'Sierra Valencia', 'ravihor@mailinator.com', NULL, '$2y$10$wg/Dys9rYeaqNUUkA.1WjO6lc1EvxaPEihHVn1gS7/LbXqnIKEm8i', 'eyJpdiI6IjVJYWdWVE1wd2xaQVFkcUNFcGxmUFE9PSIsInZhbHVlIjoicEt2REdnckhlbmg2TVhOUTBwaWNZUT09IiwibWFjIjoiYzI1YTVkZDcwYWU3Y2ZhMzgxYzM3N2I1ZGJlYmQ4NTg0YjUxMTY4YWM5OGFiM2Y3NGQyM2ZjMzQ5NTMwMWIyNSIsInRhZyI6IiJ9', 3, 9, 'Rerum aliqua Sunt u', 'Dolore quasi quia al', 1, 1, 'Commodi repellendus', 'Distinctio Qui aliq', 2, '2007-10-13', '+1 (288) 828-3796', NULL, NULL, 1, 3, NULL, '4687698', '8796879', 'Elvis Hawkins', '45678676', '1981', '55', 'Mona Berry', '87687687', '1993', '78', NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2022-10-02 12:21:45', '2022-10-02 12:21:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '1005', NULL, 4, 2, '2022-10-02', 'Brooke', 'Kelly', 'Kai Walker', 'Mikayla Mccoy', 'ficuqujoju@mailinator.com', NULL, '$2y$10$Rr41JBJspW2zslNgCWCRe.itQH8f8un16UOZaG/5.mBUCf.XtOn.6', 'eyJpdiI6IlZySFBkMllFVVFUUThhNm5DQWJETnc9PSIsInZhbHVlIjoidjNRcFNmOHhaMkJEMGI5VG91NTM3UT09IiwibWFjIjoiMDcwZWY1ZTdhMTliYzdmNjY1MTJjZTVmOGVhNjdkZDI4YzFhZjM2NTg2ZGU2MzU3NDI0ZjNlYWJiZTI4MDgzYyIsInRhZyI6IiJ9', 4, 12, 'Eius maiores ut iust', 'Fuga Minima quaerat', 2, 13, 'Enim reprehenderit d', 'Minim laudantium do', 1, '1988-01-23', '+1 (803) 438-3494', NULL, NULL, 5, 7, NULL, '4656878', '86876876', 'Olivia Rodgers', '56876543', '1988', '56', 'Camille Hewitt', '45656878', '1994', '86', 'student_1664734989.jpg', NULL, 1, 1, 0, NULL, 1, NULL, '2022-10-02 12:23:09', '2022-10-02 12:23:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '1006', NULL, 4, 2, '2022-10-02', 'Zelenia', 'Cantu', 'Quon Hood', 'Shelley Benson', 'qalaqys@mailinator.com', NULL, '$2y$10$Wp3G22i4x.Ow2AERJbrRke6Uzz6xOMIsxYLyiHSrHGpJc6/IWdA4e', 'eyJpdiI6IkdNNFFGSjlvSDFHM2JWMkVOUDhFcEE9PSIsInZhbHVlIjoiT0N2WkY3TTVPTC9SODJsRUt1WEkwZz09IiwibWFjIjoiYWJlMjlkZDNiM2FkOTJhYzc5MWU2Y2ZjMmU2MzBhYjM1NTZhZGI1OGVkZDczNTM0Zjg5ODA0MWY1M2IzNzY4MiIsInRhZyI6IiJ9', 3, 9, 'Dolor porro nobis lo', 'Vel praesentium in u', 2, 13, 'Voluptate ipsum omni', 'Sunt aliquam in et m', 1, '1979-06-03', '+1 (353) 316-1389', NULL, NULL, 3, 6, NULL, '44578787', '125787545', 'Hanna Curry', '34546565', '2010', '56', 'Keaton Haley', '567878764', '1985', '87', NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2022-10-02 12:26:33', '2022-10-02 12:26:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '1007', NULL, 5, 2, '2022-10-02', 'Kieran', 'Hahn', 'Kyle Mccray', 'Beau Hobbs', 'fiqixijeg@mailinator.com', NULL, '$2y$10$UYbKmXg4PFh7kz3Xd6iRPuAOHyyZ3VgKEtPdtCHp.x0RNaWpmNN.6', 'eyJpdiI6IjJUckxOa1BTY3ozc1IwV2x6RXR4UFE9PSIsInZhbHVlIjoiRmZPK3JJQW9XdmlRazduQ2tEQXdSQT09IiwibWFjIjoiYWU3YWUyOGE3ZDc5NGQ4N2I3NWIyMGU4ZmRmZTEwN2RhMTA1NjRhMGIyNTIxNjM4OTJmZGJlOTFiMGQyODI4YyIsInRhZyI6IiJ9', 3, 9, 'Aut reiciendis illum', 'Aspernatur reprehend', 4, 4, 'Tempore pariatur E', 'Quis aperiam provide', 3, '2006-08-15', '+1 (436) 556-7083', NULL, NULL, 3, 7, NULL, '57867989', '235436576', 'Hyacinth Wong', '2147483647', '2003', '77', 'Kennan Finch', '2147483647', '2002', '45', 'staff1_1664735260.jpg', NULL, 1, 1, 0, NULL, 1, 1, '2022-10-02 12:27:40', '2022-10-02 12:39:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '1008', NULL, 5, 2, '2022-10-02', 'Nyssa', 'Mcdonald', 'Lacota Campbell', 'Brenden Murphy', 'qekehohi@mailinator.com', NULL, '$2y$10$.f3iVO8Xc3e//cm8r9X0gu0laJGIi3VL47lPEo4yrpuPzLRDmoNhi', 'eyJpdiI6Ijc4QllvZWN6dEI3QUFFS1BtRW80Wnc9PSIsInZhbHVlIjoicnJZeFVvWnYxOTQ5L1d2Y2lPcFR0Zz09IiwibWFjIjoiMjJkNzNhY2E2NGU0ZTVlMWIxMWI3NmViM2M5MzdjOGI0NzYzNWRiMDM5OWI0MTYzZjcwYjM3ZmMyMTg3ZWUyNSIsInRhZyI6IiJ9', 4, 5, 'Qui rem dolorem sed', 'Vel consequuntur ea', 3, 10, 'Molestiae nihil dolo', 'Iure expedita itaque', 1, '2021-03-15', '+1 (144) 822-6816', NULL, NULL, 5, 6, NULL, '7875454756', '157867547', 'Hedwig Evans', '54867878', '2010', '89', 'Cailin Serrano', '2147483647', '2001', '45', NULL, NULL, 1, 1, 0, NULL, 1, 1, '2022-10-02 12:29:17', '2022-10-02 12:32:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '1009', NULL, 4, 3, '2022-10-03', 'Bevis', 'Horton', 'Kennan Watts', 'Rhiannon Kirkland', 'curixivuf@mailinator.com', NULL, '$2y$10$WDEeMmA9s7Ext/nOAFSCUeUfxWIPWf1RFHs9u/e6gYS3uN0INcpXS', 'eyJpdiI6ImFuWkc3VGgyUExZUkR6NWxQcEdMVGc9PSIsInZhbHVlIjoiWFBzNU83aHpMOGUyNEltV1dadGNQZz09IiwibWFjIjoiZmVmMzY0NjZkYzFlMjU4M2ZkNmUzZDBlNTlhOTNhOTM5MmMxNzEwOTQ5MTI3OWU3NDRiYWExNmVhMjFlZTY5YiIsInRhZyI6IiJ9', 3, 8, 'Ducimus aut nulla t', 'Aliquip non perspici', 4, 4, 'Maiores incididunt p', 'Dolor excepturi Nam', 2, '1995-11-27', '+1 (833) 984-7695', NULL, NULL, 1, 6, NULL, '457778778', '844687564', 'Bernard Houston', '75687686', '1977', '58', 'Wesley Henry', '78687989', '1984', '69', NULL, NULL, 1, 1, 1, NULL, 1, NULL, '2022-10-03 16:22:23', '2022-10-03 16:22:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '1010', NULL, 5, 3, '2022-10-04', 'Julie', 'Stafford', 'Nicholas Bauer', 'Heather Willis', 'dyvybozypi@mailinator.com', NULL, '$2y$10$UbHEVW9.otCd4f3VGjLDI.LPIV/3IOfKv97RFqhHPdNTVTTPi0Bu.', 'eyJpdiI6InVsMFdyb3l6Wk83ZUdzOVphbjNXQ3c9PSIsInZhbHVlIjoiSlRvbG82azFGTmx4Rzd0MmljZ2NLQT09IiwibWFjIjoiNDkxNzBhZGFiYWU2MjM3MTI1NWI0MWE4ZTgyZjFlMjkwMDg2YWJiZjlkMTNkMWVjZDNjM2U3YTkzZTg3MjlmNCIsInRhZyI6IiJ9', 1, 6, 'Reprehenderit obcae', 'Eum voluptatibus in', 1, 6, 'Repudiandae est mini', 'Beatae enim tempor e', 1, '2010-01-10', '+1 (389) 703-8218', NULL, NULL, 5, 7, NULL, '548678978', '2348587897', 'Oren Leon', '487878', '1978', '78', 'Lila Duke', '692489', '1995', '69', NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2022-10-04 05:51:47', '2022-10-04 05:51:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '1011', NULL, 5, 3, '2022-10-04', 'Austin', 'Ochoa', 'Ingrid Drake', 'Hollee Sexton', 'testudiante2@netlogyc.com', NULL, '$2y$10$yRX1PFsT83p7SpLjS24TxOIu09aRZ8zvNLQqLLsqEbUKDYhjmuwyK', 'eyJpdiI6IkxHWVNQZHJXYzdOVFJieXZ3TGxndUE9PSIsInZhbHVlIjoiRUR5bFRNa2E3TnNwd0l0OForanJFZz09IiwibWFjIjoiNjY3M2EyZTMxZjNlZjAxMDc0ZGNkMGY4NTk5ZTQzNTI4ZTgxNzA2Yzg0YTExNTM1Y2Q2MGQ0ZjdmZTZmMjZkMCIsInRhZyI6IiJ9', 2, 7, NULL, 'Assumenda itaque sit', 2, 13, NULL, 'Nemo excepturi eum q', 1, '2004-11-06', '+1 (884) 749-5351', NULL, NULL, 5, 5, NULL, '7875454', '01248787548', 'Ulric Lloyd', '21454545', '2000', '56', 'Giacomo Holman', '24587878', '2001', '64', 'student_1664884390.jpg', NULL, 1, 1, 0, NULL, 1, 1, '2022-10-04 05:53:10', '2023-07-26 21:09:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '1012', NULL, 5, 3, '2022-10-04', 'Carter', 'Donovan', 'Dalton Walters', 'Idona Mitchell', 'zipukamixi@mailinator.com', NULL, '$2y$10$Q/sOqBj0v/y58tDJmJzxeeFy97hsIRjiqtDDSoILXkXLuxjY0567e', 'eyJpdiI6IjlHeG45dVNNWldTdjVUazlRUXZCS3c9PSIsInZhbHVlIjoidkJLaUhwT3J6NWh3eitJK2JXVXRzUT09IiwibWFjIjoiMDFlYWU1YWJjN2NjMzVmOTIxMzA4ODJlNzA1ZTJlOWQ5MTIyYzYzNzdlYmYzZDY1MjNkOTQxN2Y4N2Y1NzY3MSIsInRhZyI6IiJ9', 4, 3, 'Cum ut eum vel aut q', 'Voluptatem fugiat et', 3, 8, 'Libero consectetur v', 'Aliquip esse volupta', 2, '1992-11-29', '+1 (558) 569-2348', NULL, NULL, 4, 4, NULL, '48754548784', '218754778784', 'Gil Henry', '24878854', '1987', '96', 'Xander Yang', '56978874', '1970', '47', NULL, NULL, 1, 1, 0, NULL, 1, 1, '2022-10-04 05:54:20', '2022-10-04 05:54:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '1013', NULL, 5, 2, '2022-10-04', 'Susan', 'Bond', 'Todd Barry', 'Maggie Logan', 'testudiante1@netlogyc.com', NULL, '$2y$10$f1t926PHmLSsR0R45HSGRe.lTaMS67BNF.ZEgU727NgXbaADqaatq', 'eyJpdiI6Ikl5VmRVNE1yeXBmRXRDeWhtWXZZVXc9PSIsInZhbHVlIjoiQTlGK0Z5QTFRQ2RxdFNqTkFZWEJNQT09IiwibWFjIjoiNTMyOTE3MzFjZjFkMGY1YTI5ODY2OGFiZDQzZWZlNjEwMDVjZGFlYjFjMWFiNzE2Y2JhMDFkYTAxN2JjN2UyMCIsInRhZyI6IiJ9', 2, 7, NULL, 'Esse officia molesti', 2, 13, NULL, 'Nisi est pariatur', 2, '1980-10-01', '+1 (566) 386-4189', NULL, NULL, 5, 8, NULL, '5478895457', '2156895548', 'Marah Schwartz', '178454777', '1972', '97', 'Benjamin Herman', '2147483647', '2002', '63', 'student_1664884572.jpg', NULL, 1, 1, 0, NULL, 1, 1, '2022-10-04 05:56:12', '2023-07-13 12:37:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '1014', NULL, 5, 3, '2022-10-04', 'Rylee', 'Pratt', 'Henry Pollard', 'Russell Rosa', 'carlos.andres.chacon@gmail.com', NULL, '$2y$10$cyU517mZqL56JHlS7UGlxumTgb5lUmO4JVgqzYNG.taiW5.XToil6', 'eyJpdiI6IjNzekIrZlF4RWZ2Q2dPREFOZjhUVVE9PSIsInZhbHVlIjoiQW5aYmZrZStKR2F3Nm9uekM3MHhGQT09IiwibWFjIjoiMmFhNzc4ZjE0NTZmM2I5ZmViOTNlNjExMDdmZWJmNGE3YTkwYjljMDAxZmViZjI5NTU2MTVjMjg3ODkyYjE4NSIsInRhZyI6IiJ9', 3, 10, NULL, 'Nihil fuga Tempore', 4, 4, NULL, 'Est illo officia do', 3, '1972-03-25', '+1 (611) 728-8917', NULL, NULL, 3, 1, NULL, '2458787', '2156787', 'Linus Rowland', '78545487', '1995', '96', 'Oliver Charles', '159887845', '2002', '78', 'staff1_1664884807.jpg', NULL, 1, 1, 0, 'SKD8lhKVv0vRDH7DITodddnJqWqAqKoaiNkTVdVL8nrUAXgthM6ihUUzuE83', 1, 1, '2022-10-04 06:00:07', '2023-07-12 15:47:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2', NULL, 1, 9, '2023-08-10', 'Andres', 'Garnica', 'William', 'Jineth', 'testudiante3@netlogyc.com', NULL, '$2y$10$Rf5MeAYKqywW.ClrXha2YeiHiAgOP7T0hPYILwVR5uINzaOf/41ji', 'eyJpdiI6IkdraHppYXZjSDhLT3JtUWgyWFIycXc9PSIsInZhbHVlIjoiTWpBSkRSUnRKSTFJWGVDbldabjFodz09IiwibWFjIjoiMzVlYjBmMzI2OTdjZmNlMmU0OGE0ODM1ZTU5NGZkNzk3NThlYjNkNTQxMGMzZjJmYTQ3ODdmOTMzMmU0ODdiMyIsInRhZyI6IiJ9', 0, 0, NULL, 'Cra 10 #5-16', 0, 0, NULL, NULL, 1, '2000-06-03', '7777777', NULL, NULL, 1, 1, NULL, '1234456', NULL, 'Colegio San Luis', '1234', '2010', 'Zipaquirá', 'Colegio San Luis', '5678', '2018', 'Zipaquirá', NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2023-08-10 00:09:19', '2023-08-10 09:03:48', 'Diseñador', 'Docente', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '3', NULL, 2, 8, '2023-07-07', 'Oscar', 'mendez', 'Javier', 'Diana', 'testudiante4@netlogyc.com', NULL, '$2y$10$OI.FrAsK2OP9IQ5Yoy.2deNIBYl79Zo0Vls3t5FY7klDjaieYOepK', 'eyJpdiI6ImxaQlVVbENreE9lZ05OSGlTbitaaEE9PSIsInZhbHVlIjoiU0czM2ZrRzVNNGpKeUJkV3hTSGJndz09IiwibWFjIjoiMmZmMGI1YTc1NmQ4NDk3Yzg1NjdjZGExNGQxZDJjOTExMWE4YzIyNjRjMjdlY2UwOTI0ZmFjNDYzMzM0MTdlNSIsInRhZyI6IiJ9', 5, NULL, NULL, NULL, 0, 0, NULL, NULL, 1, '2001-08-09', '3333333', NULL, NULL, 1, 7, NULL, '56768679', NULL, 'Colegio San Carlos', '12324', '2011', 'Cajicá', 'Colegio San Carlos', '5567', '2019', 'Cajicá', NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2023-08-10 00:20:05', '2023-08-10 09:01:52', 'Periodista', 'Ingeniera', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '4', NULL, 4, 11, '2023-06-10', 'María', 'Sanchez', 'Cesar', 'María', 'testudiante5@netlogyc.com', NULL, '$2y$10$qCJ.56.RbKhE7rUPNlliVeCQGkY7G8rcRxqumPKjbac4.H96k00cK', 'eyJpdiI6IlIwUEw1RHZCS056WWZla0IySWhNMUE9PSIsInZhbHVlIjoidlZCSlRXcGg0cUxVdzFBdnFMWGJzdz09IiwibWFjIjoiZGRhZjcwNDgzMTA3MGMwNzI2OTEzZWJiYTNmZjJkMGY1MmRmZGE4MzQxMzEwNzk5MzkxYzhlMmJkYmRhNDQ0OCIsInRhZyI6IiJ9', 0, 0, NULL, NULL, 0, 0, NULL, NULL, 2, '2004-07-09', '33333', NULL, NULL, 1, 7, NULL, '587686', NULL, 'Colegio San Mateo', '6456', '2013', 'Chia', 'Colegio San Mateo', '6756', '2020', 'Chia', NULL, NULL, 1, 1, 0, NULL, 1, NULL, '2023-08-10 00:25:18', '2023-08-10 00:25:18', 'Médico', 'Diseñadora', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_assignments`
--

CREATE TABLE `student_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_enroll_id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `marks` decimal(5,2) DEFAULT NULL,
  `attendance` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_enroll_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `attendance` int(11) NOT NULL DEFAULT 0 COMMENT '1 Present, 2 Absent, 3 Leave, 4 Holiday',
  `note` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_enrolls`
--

CREATE TABLE `student_enrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_enrolls`
--

INSERT INTO `student_enrolls` (`id`, `student_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(19, 15, 9, 4, 1, 7, 1, 1, NULL, '2023-08-10 00:09:19', '2023-08-10 00:09:19'),
(20, 16, 8, 4, 3, 3, 1, 1, NULL, '2023-08-10 00:20:05', '2023-08-10 00:20:05'),
(21, 17, 11, 4, 5, 5, 1, 1, NULL, '2023-08-10 00:25:18', '2023-08-10 00:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `student_enroll_subject`
--

CREATE TABLE `student_enroll_subject` (
  `student_enroll_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_enroll_subject`
--

INSERT INTO `student_enroll_subject` (`student_enroll_id`, `subject_id`) VALUES
(19, 39),
(19, 68),
(19, 42);

-- --------------------------------------------------------

--
-- Table structure for table `student_leaves`
--

CREATE TABLE `student_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `review_by` bigint(20) UNSIGNED DEFAULT NULL,
  `apply_date` date NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 Pending, 1 Approved and 2 Rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_leaves`
--

INSERT INTO `student_leaves` (`id`, `student_id`, `review_by`, `apply_date`, `from_date`, `to_date`, `subject`, `reason`, `attach`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 1, '2022-10-04', '2022-10-04', '2022-10-07', 'Sudden Headache', 'A thunderclap headache is an extremely severe headache that comes on rapidly. It\'s sometimes called a lone acute headache. It develops in 60 seconds or less and causes intense pain. Thunderclap headaches can be caused by bleeding in the brain after an arterial aneurysm rupture, stroke, or other injury.', 'background-border_1664887696.png', NULL, 1, '2022-10-04 06:48:16', '2022-10-04 06:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `student_relatives`
--

CREATE TABLE `student_relatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `relation` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `occupation` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_relatives`
--

INSERT INTO `student_relatives` (`id`, `student_id`, `relation`, `name`, `occupation`, `email`, `phone`, `created_at`, `updated_at`, `address`, `photo`) VALUES
(1, 1, 'Father', 'Scarlett Walton', 'Omnis sed fugiat eum', 'Curry and Eaton Plc', '+2564854475414', '2022-10-02 12:15:14', '2022-10-02 12:15:14', NULL, NULL),
(2, 2, 'Brother', 'Vernon Long', 'Ipsa praesentium te', 'Klein Dale Traders', '+45246876586', '2022-10-02 12:17:47', '2022-10-02 12:17:47', NULL, NULL),
(3, 3, 'Father', 'Janna Hooper', 'Molestias aut distin', 'Quinn Ryan Trading', 'Est dolore sed labo', '2022-10-02 12:20:00', '2022-10-02 12:20:00', NULL, NULL),
(4, 5, 'Uncle', 'Chloe Cleveland', 'Suscipit minima dolo', 'Forbes Weeks LLC', 'Culpa et quidem qui', '2022-10-02 12:23:09', '2022-10-02 12:23:09', NULL, NULL),
(5, 6, 'Uncle', 'Shad Aguirre', 'Qui iure voluptas qu', 'Mills Reynolds Inc', '+48548786786', '2022-10-02 12:26:33', '2022-10-02 12:26:33', NULL, NULL),
(8, 8, 'Brother', 'McKenzie Hardy', 'Ea in praesentium ma', 'Jacobson and Cochran Associates', '+854857584', '2022-10-02 12:32:31', '2022-10-02 12:32:31', NULL, NULL),
(9, 7, 'Brother', 'Quinn Nguyen', 'Dolor commodi volupt', 'Clayton Blake Traders', '+65845445', '2022-10-02 12:32:49', '2022-10-02 12:32:49', NULL, NULL),
(10, 9, 'Father', 'Maxwell Chang', 'Vel dolores nulla of', 'Lowery Cannon Traders', 'Ea deleniti voluptas', '2022-10-03 16:22:23', '2022-10-03 16:22:23', NULL, NULL),
(11, 10, 'Brother', 'Tashya Farley', 'Nesciunt quae provi', 'Castaneda and Alvarado Inc', 'Voluptatibus aute qu', '2022-10-04 05:51:47', '2022-10-04 05:51:47', NULL, NULL),
(14, 12, 'Father', 'Timothy Fischer', 'Sed non eu voluptas', 'Kinney and Sanford Trading', 'Mollit autem fugiat', '2022-10-04 05:54:43', '2022-10-04 05:54:43', NULL, NULL),
(19, 14, 'Father', 'Noel Baxter', 'Voluptates suscipit', NULL, 'Dolorum velit labor', '2023-07-12 15:47:52', '2023-07-12 15:47:52', '1', NULL),
(20, 13, 'Father', 'Aladdin Hahn', 'Temporibus est earum', NULL, 'Velit non ad eos qui', '2023-07-13 12:36:33', '2023-07-13 12:36:33', 'A', NULL),
(21, 11, 'Uncle', 'Haviva Callahan', 'At in sit magna occ', NULL, 'In odio consequuntur', '2023-07-26 21:09:49', '2023-07-26 21:09:49', 'a', NULL),
(22, 15, 'Padres', 'Jineth', 'Docente', NULL, '111111', '2023-08-10 00:09:19', '2023-08-10 00:09:19', 'a', NULL),
(23, 16, 'Padres', 'Diana', 'Ingeniera', NULL, '222222', '2023-08-10 00:20:05', '2023-08-10 00:20:05', 'b', NULL),
(24, 17, 'Padres', 'María', 'Diseñadora', NULL, '44444', '2023-08-10 00:25:18', '2023-08-10 00:25:18', 'c', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_transfers`
--

CREATE TABLE `student_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `transfer_id` varchar(191) NOT NULL,
  `university_name` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 Transfer In, 1 Transfer Out',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_transfers`
--

INSERT INTO `student_transfers` (`id`, `student_id`, `transfer_id`, `university_name`, `date`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 9, '75868576', 'Dhaka University', '2022-10-03', 'Will Say Something...', 0, 1, 1, '2022-10-03 16:22:23', '2022-10-03 16:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `credit_hour` varchar(191) NOT NULL,
  `subject_type` int(11) DEFAULT NULL,
  `class_type` int(11) DEFAULT NULL,
  `total_marks` decimal(5,2) DEFAULT NULL,
  `passing_marks` decimal(5,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `field_intensity` double DEFAULT NULL,
  `theoretical_unit` double DEFAULT NULL,
  `practical_unit` double DEFAULT NULL,
  `minimum_note` double DEFAULT NULL,
  `maximum_note` double DEFAULT NULL,
  `passing_grade` double DEFAULT NULL,
  `homologable` varchar(191) DEFAULT NULL,
  `minimum_grade_approved` double DEFAULT NULL,
  `field_start` date DEFAULT NULL,
  `field_ends` date DEFAULT NULL,
  `Qualification` varchar(191) DEFAULT NULL,
  `field_sufficiency` varchar(191) DEFAULT NULL,
  `field_modality` varchar(191) DEFAULT NULL,
  `Qualifying_minimum_note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `code`, `credit_hour`, `subject_type`, `class_type`, `total_marks`, `passing_marks`, `description`, `status`, `created_at`, `updated_at`, `field_intensity`, `theoretical_unit`, `practical_unit`, `minimum_note`, `maximum_note`, `passing_grade`, `homologable`, `minimum_grade_approved`, `field_start`, `field_ends`, `Qualification`, `field_sufficiency`, `field_modality`, `Qualifying_minimum_note`) VALUES
(14, 'PRINCIPIOS BASICOS DEL SONIDO', '11439', '3', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 19:50:07', '2023-08-10 10:45:12', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-21', '2030-08-19', 'NO', 'SI', 'Catedra', 0),
(15, 'OPERACION DE SONIDO EN VIVO I', '11440', '3', 1, 2, NULL, NULL, NULL, 1, '2023-07-14 19:51:06', '2023-08-10 10:44:38', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-21', '2030-08-10', 'NO', 'SI', 'Catedra', 0),
(16, 'TECNICAS DE MEZCLA I', '11441', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 19:52:17', '2023-08-10 10:46:17', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-21', '2030-08-10', 'NO', 'SI', 'Catedra', 0),
(17, 'GRABACION Y CONFIGURACION PRACTICA I', '11442', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 19:52:46', '2023-08-10 10:47:21', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-21', '2030-08-19', 'NO', 'SI', 'Catedra', 0),
(18, 'INGLES TECNICO', '11443', '2', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 19:53:15', '2023-08-10 10:48:29', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-21', '2030-08-19', 'NO', 'SI', 'Catedra', 0),
(19, 'ETICA', '11444', '2', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 19:53:50', '2023-08-10 10:50:08', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-21', '2030-08-19', 'NO', 'SI', 'Catedra', 0),
(20, 'CATEDRA INSTITUCIONAL', '11445', '1', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 19:54:22', '2023-08-10 10:51:25', 1, 1, 0, 0, 5, 3, 'SI', 3, '2020-08-21', '2030-08-19', 'NO', 'SI', 'Catedra', 0),
(21, 'ELECTIVA I TPSYG', '11446', '2', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 19:55:55', '2023-08-10 10:52:57', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-21', '2030-08-19', 'NO', 'SI', 'Catedra', 0),
(22, 'MIDI', '11447', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 19:57:07', '2023-08-10 20:16:03', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(23, 'OPERACION DE SONIDO EN VIVO II', '11448', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 19:57:35', '2023-08-10 20:19:46', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(24, 'TECNICAS DE MEZCLA II', '11449', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 19:58:09', '2023-08-10 20:23:47', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(25, 'GRABACION Y CONFIGURACION PRACTICA II', '11450', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 19:58:54', '2023-08-10 20:26:04', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(26, 'SISTEMAS DE GRABACION', '11451', '2', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 19:59:33', '2023-08-10 20:29:56', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(27, 'AUDIO-ESCRITURA MUSICAL', '11452', '2', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 19:59:57', '2023-08-10 20:31:46', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(28, 'COMUNICACION', '11453', '2', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 20:00:24', '2023-08-10 20:33:05', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(29, 'CONSTITUCION COLOMBIANA Y CATEDRA PARA LA PAZ', '11454', '1', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 20:01:04', '2023-08-10 20:39:00', 1, 1, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(30, 'ELECTIVA II TPSYG', '11455', '2', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 20:01:40', '2023-08-10 20:40:44', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(31, 'TALLER DE ELECTRICIDAD', '11456', '2', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 20:07:55', '2023-08-10 20:42:25', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(32, 'OPERACION DE SONIDO EN VIVO III', '11457', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 20:08:28', '2023-08-10 20:43:40', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(33, 'MEZCLA EN VIVO', '11458', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 20:08:56', '2023-08-10 20:45:57', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(34, 'DISEÑO Y ARMADO DE ESCENARIOS', '11459', '2', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 20:09:30', '2023-08-10 20:47:29', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(35, 'ENTRENAMIENTO AUDITIVO APLICADO AL SONIDO Y AL AUDIO', '11460', '2', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 20:10:11', '2023-08-10 20:51:54', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(36, 'SONIDO PARA RADIO, CINE Y TV', '11461', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 20:11:01', '2023-08-10 20:53:19', 4, 4, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(37, 'PROYECTO PROFESIONAL', '11462', '3', 1, 3, NULL, NULL, NULL, 1, '2023-07-14 20:11:47', '2023-08-10 21:03:05', 3, 3, 0, 0, 5, 3, 'SI', 3, '2020-01-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(38, 'EMPRENDIMIENTO', '11463', '2', 1, 1, NULL, NULL, NULL, 1, '2023-07-14 20:12:27', '2023-08-10 21:04:19', 2, 2, 0, 0, 5, 3, 'SI', 3, '2020-08-24', '2030-08-22', 'NO', 'SI', 'Catedra', 0),
(39, 'QUÍMICA GENERAL', '10128', '4', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 16:07:15', '2023-08-09 15:23:53', 10, 10, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(40, 'MATEMÁTICAS I', '10132', '3', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 16:08:21', '2023-08-09 19:08:45', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(41, 'MATEMÁTICAS II', '10233', '3', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:37:50', '2023-08-09 19:59:46', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(42, 'CATEDRA AMBIENTAL', '10268', '1', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:38:33', '2023-08-09 20:01:25', 3, 3, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(43, 'CONSTITUCIÓN POLÍTICA COLOMBIANA', '10269', '1', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:39:19', '2023-08-09 20:04:33', 2, 2, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(44, 'BIOFÍSICA', '20224', '1', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:40:02', '2023-08-09 20:06:46', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(45, 'QUÍMICA INORGÁNICA', '10228', '3', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:41:08', '2023-08-09 20:40:04', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(46, 'QUÍMICA GENERAL II', '10239', '4', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:41:51', '2023-08-09 20:42:14', 10, 10, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(47, 'QUÍMICA ANALÍTICA I', '10346', '3', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:42:21', '2023-08-09 20:44:44', 10, 10, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(48, 'QUÍMICA ORGÁNICA I', '10426', '3', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:42:47', '2023-08-09 20:46:38', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(49, 'SALUD PÚBLICA Y SEGURIDAD SOCIAL', '20631', '2', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:43:11', '2023-08-09 20:48:32', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(50, 'SEGURIDAD INDUSTRIAL Y SALUD OCUPACIONAL', '10270', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:46:38', '2023-08-09 20:56:54', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(51, 'QUÍMICA ORGÁNICA II', '10527', '4', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:47:21', '2023-08-09 20:58:17', 10, 10, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(52, 'ÉTICA PROFESIONAL', '10530', '1', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:47:57', '2023-08-09 20:59:39', 3, 3, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(53, 'BIOLOGÍA CELULAR', '20141', '4', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:48:23', '2023-08-09 21:01:19', 10, 10, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(54, 'METODOLOGÍA DE LA INVESTIGACIÓN', '20339', '3', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:49:04', '2023-08-09 21:02:36', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(55, 'ANÁLISIS INSTRUMENTAL', '10537', '3', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:49:53', '2023-08-09 21:11:30', 10, 10, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(56, 'ADMINISTRACIÓN DE FARMACIA', '20529', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:50:53', '2023-08-09 21:12:43', 4, 4, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(57, 'TECNOLOGÍA FARMACÉUTICA I', '20534', '4', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:51:26', '2023-08-09 21:14:02', 10, 10, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(58, 'FITOQUÍMICA', '20628', '4', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:51:54', '2023-08-09 21:15:09', 8, 8, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(59, 'LEGISLACIÓN FARMACÉUTICA', '20720', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:52:21', '2023-08-09 21:16:25', 4, 4, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(60, 'TOXICOLOGIA', '10137', '3', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:52:53', '2023-08-09 21:17:43', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(61, 'MICROBIOLOGÍA', '10635', '3', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:53:16', '2023-08-09 21:18:55', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(62, 'BIOQUÍMICA', '10735', '3', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:53:43', '2023-08-09 21:19:54', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(63, 'FARMACOLOGÍA', '20622', '3', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:54:12', '2023-08-09 21:21:08', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(64, 'CONTROL DE CALIDAD Y BPM', '20633', '2', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:54:35', '2023-08-09 21:22:25', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(65, 'FARMACIA MAGISTRAL', '20726', '3', 1, 3, NULL, NULL, NULL, 1, '2023-08-02 21:55:01', '2023-08-09 21:23:33', 4, 4, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(66, 'SERVICIO FARMACÉUTICO', '20727', '3', 1, 1, NULL, NULL, NULL, 1, '2023-08-02 21:55:27', '2023-08-09 21:24:56', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(67, 'COMUNICACIÓN', '10139', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-09 19:18:13', '2023-08-09 19:18:13', 4, 4, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(68, 'CÁTEDRA INSTITUCIONAL', '10141', '1', 1, 1, NULL, NULL, NULL, 1, '2023-08-09 19:22:58', '2023-08-09 19:22:58', 2, 2, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(69, 'FLEXIBLE I TRF', '10144', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-09 19:25:47', '2023-08-09 20:08:01', 4, 4, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'NO', 'Catedra', 0),
(70, 'FLEXIBLE II TRF', '10145', '3', 1, 3, NULL, NULL, NULL, 1, '2023-08-09 20:38:21', '2023-08-09 20:38:21', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(71, 'EMPRENDIMIENTO', '10022', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-09 20:53:17', '2023-08-09 20:53:17', 3, 3, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(72, 'FLEXIBLE III TRF', '10146', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-09 20:55:06', '2023-08-09 20:55:06', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(73, 'FLEXIBLE IV-A TRF', '10147', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-09 21:08:57', '2023-08-09 21:08:57', 4, 4, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(74, 'FLEXIBLE IV-B TRF', '10148', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-09 21:10:26', '2023-08-09 21:10:26', 7, 7, 0, 0, 5, 3, 'SI', 3.4, '2016-12-05', '2025-12-30', 'NO', 'SI', 'Catedra', 0),
(75, 'COMPETENCIAS COMUNICATIVAS', '11506', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-11 15:27:05', '2023-08-11 15:27:05', 2, 2, 0, 0, 5, 3, 'SI', 3, '2021-05-31', '2031-05-29', 'NO', 'SI', 'Catedra', 0),
(76, 'LENGUA EXTRANJERA I', '11507', '2', 1, 1, NULL, NULL, NULL, 1, '2023-08-11 15:28:40', '2023-08-11 15:28:40', 2, 2, 0, 0, 5, 3, 'SI', 3, '2021-05-31', '2031-05-29', 'NO', 'SI', 'Catedra', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_markings`
--

CREATE TABLE `subject_markings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_enroll_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `exam_marks` decimal(5,2) DEFAULT NULL,
  `attendances` decimal(5,2) DEFAULT NULL,
  `assignments` decimal(5,2) DEFAULT NULL,
  `activities` decimal(5,2) DEFAULT NULL,
  `total_marks` decimal(5,2) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `publish_time` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_m_s_notifies`
--

CREATE TABLE `s_m_s_notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED DEFAULT NULL,
  `program_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `semester_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `message` text NOT NULL,
  `receive_count` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_m_s_notifies`
--

INSERT INTO `s_m_s_notifies` (`id`, `faculty_id`, `program_id`, `session_id`, `semester_id`, `section_id`, `message`, `receive_count`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 0, 0, 0, 0, 0, 'This depends on when you enrol. Your fees are due 30 days from your starting date. For more information, please see Fees due dates.', 8, 1, 1, NULL, '2022-10-03 12:28:07', '2022-10-03 12:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `s_m_s_settings`
--

CREATE TABLE `s_m_s_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `nexmo_key` text DEFAULT NULL,
  `nexmo_secret` text DEFAULT NULL,
  `nexmo_sender_name` text DEFAULT NULL,
  `twilio_sid` text DEFAULT NULL,
  `twilio_auth_token` text DEFAULT NULL,
  `twilio_number` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 Twilio, 2 Nexmo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_m_s_settings`
--

INSERT INTO `s_m_s_settings` (`id`, `nexmo_key`, `nexmo_secret`, `nexmo_sender_name`, `twilio_sid`, `twilio_auth_token`, `twilio_number`, `status`, `created_at`, `updated_at`) VALUES
(1, '7e29c3ce', '6gK9ve4soFO6RP5d', 'ABC', 'AC8f4bfd69c98ad28c8f3a1dc8a8cca836', '4c880b6a9061a145d5c2a92de7e51cdf', '+14154461617', 1, '2022-09-30 12:00:47', '2022-09-30 12:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `tax_settings`
--

CREATE TABLE `tax_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_amount` decimal(10,2) NOT NULL,
  `max_amount` decimal(10,2) NOT NULL,
  `percentange` double(4,2) NOT NULL,
  `max_no_taxable_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_settings`
--

INSERT INTO `tax_settings` (`id`, `min_amount`, `max_amount`, `percentange`, `max_no_taxable_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 0.00, 5000.00, 0.00, 0.00, 1, NULL, NULL),
(2, 5001.00, 10000.00, 5.00, 5000.00, 1, NULL, NULL),
(3, 10001.00, 20000.00, 10.00, 5000.00, 1, NULL, '2022-10-01 05:22:30'),
(4, 20001.00, 50000.00, 15.00, 5000.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transactionable_id` bigint(20) NOT NULL,
  `transactionable_type` varchar(191) NOT NULL,
  `transaction_id` varchar(191) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 Creadit & 2 Debit',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transactionable_id`, `transactionable_type`, `transaction_id`, `amount`, `type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'App\\Models\\Student', 'H9Cpqn51xGm7mVpE', 3150.00, 1, 1, NULL, '2022-10-03 13:35:39', '2022-10-03 13:35:39'),
(2, 4, 'App\\Models\\Student', 'f5JWnxrigm6KyHgY', 3150.00, 1, 1, NULL, '2022-10-03 13:35:58', '2022-10-03 13:35:58'),
(3, 7, 'App\\Models\\Student', 'yo1FhMZ8dS3UqA8M', 4000.00, 1, 1, NULL, '2022-10-03 13:38:36', '2022-10-03 13:38:36'),
(4, 7, 'App\\Models\\Student', '31iN1HVqCYzslNU8', 4000.00, 2, 1, NULL, '2022-10-03 13:38:52', '2022-10-03 13:38:52'),
(5, 7, 'App\\Models\\Student', 'VPpGpvTamxJ8KZA6', 4050.00, 1, 1, NULL, '2022-10-03 13:39:15', '2022-10-03 13:39:15'),
(6, 7, 'App\\User', 'AOzKLAvS6WgUjcWW', 14189.00, 2, 1, NULL, '2022-10-03 15:36:52', '2022-10-03 15:36:52'),
(7, 8, 'App\\User', 'Za0r26eRfMei4lQa', 16526.00, 2, 1, NULL, '2022-10-03 15:37:35', '2022-10-03 15:37:35'),
(8, 3, 'App\\User', '8aSusUqJhjdRysWJ', 3000.00, 2, 1, NULL, '2022-10-03 15:45:04', '2022-10-03 15:45:04'),
(9, 14, 'App\\Models\\Student', '2kChl0YGtKwZCI4I', 1800.00, 1, 1, NULL, '2022-10-04 09:21:36', '2022-10-04 09:21:36'),
(10, 2, 'App\\Models\\Student', '9hAdG9i38LTJ0aPR', 3150.00, 2, 1, NULL, '2022-10-04 09:22:16', '2022-10-04 09:22:16'),
(11, 4, 'App\\Models\\Student', 'cIMb0tMlA9o2te2Z', 3150.00, 2, 1, NULL, '2022-10-04 09:22:29', '2022-10-04 09:22:29'),
(12, 1, 'App\\Models\\Student', 'kog5hZw38tMToRkE', 3200.00, 1, 1, NULL, '2022-10-04 09:22:54', '2022-10-04 09:22:54'),
(13, 4, 'App\\Models\\Student', 'UlYXx4aja6Ak3Wly', 3200.00, 1, 1, NULL, '2022-10-04 09:23:56', '2022-10-04 09:23:56'),
(14, 10, 'App\\Models\\Student', 'xfXmn8WO7BhybnAv', 1800.00, 1, 1, NULL, '2022-10-04 09:24:08', '2022-10-04 09:24:08'),
(15, 10, 'App\\Models\\Student', 'BUUHGkNA9Fun4Ift', 1800.00, 2, 1, NULL, '2022-10-04 10:10:50', '2022-10-04 10:10:50'),
(16, 12, 'App\\Models\\Student', 'BTXkfv9esWhw1A4Q', 1800.00, 1, 1, NULL, '2022-10-04 10:11:18', '2022-10-04 10:11:18'),
(17, 10, 'App\\Models\\Student', '7z16Tht5q9Xei6xZ', 1800.00, 1, 1, NULL, '2022-10-04 10:11:26', '2022-10-04 10:11:26'),
(18, 7, 'App\\User', 'KiwXkDl0MD2rfckr', 14189.00, 1, 1, NULL, '2022-10-04 10:22:13', '2022-10-04 10:22:13'),
(19, 7, 'App\\User', 'cj4IjjdIolJTJ3uK', 14189.00, 2, 1, NULL, '2022-10-04 10:22:30', '2022-10-04 10:22:30'),
(20, 4, 'App\\Models\\Student', 'XbscZanSZVsUZYMx', 1800.00, 1, 1, NULL, '2022-10-04 10:23:58', '2022-10-04 10:23:58'),
(21, 8, 'App\\Models\\Student', 'jWgYEu9vXOvpRWgP', 1800.00, 1, 1, NULL, '2023-02-13 11:54:05', '2023-02-13 11:54:05'),
(22, 5, 'App\\Models\\Student', 't58UYubvOVytQ6I2', 1800.00, 1, 1, NULL, '2023-02-13 11:55:00', '2023-02-13 11:55:00'),
(23, 7, 'App\\User', 'uFzvvWcKEPZQo1sJ', 14189.00, 1, 1, NULL, '2023-02-13 11:59:32', '2023-02-13 11:59:32'),
(24, 8, 'App\\User', 'R10BvOK5v7XdkJdm', 16526.00, 1, 1, NULL, '2023-02-13 11:59:36', '2023-02-13 11:59:36'),
(25, 3, 'App\\User', 'P6cFuywfB0TxDbiQ', 3000.00, 1, 1, NULL, '2023-02-13 12:01:45', '2023-02-13 12:01:45'),
(26, 3, 'App\\User', 'cSHqT2rl213GWXdd', 4300.00, 2, 1, NULL, '2023-02-13 12:02:24', '2023-02-13 12:02:24'),
(27, 2, 'App\\User', 'R9kMSPcqDHBQOTCb', 14886.00, 2, 1, NULL, '2023-02-13 12:02:40', '2023-02-13 12:02:40'),
(28, 7, 'App\\User', '6qQ4EuW9m9Xuduqm', 17969.00, 2, 1, NULL, '2023-02-13 12:02:49', '2023-02-13 12:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_creadits`
--

CREATE TABLE `transfer_creadits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `marks` decimal(10,2) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport_members`
--

CREATE TABLE `transport_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transportable_type` varchar(191) NOT NULL,
  `transportable_id` bigint(20) UNSIGNED NOT NULL,
  `transport_route_id` int(10) UNSIGNED NOT NULL,
  `transport_vehicle_id` int(10) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Inactive, 1 Active',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transport_members`
--

INSERT INTO `transport_members` (`id`, `transportable_type`, `transportable_id`, `transport_route_id`, `transport_vehicle_id`, `start_date`, `end_date`, `note`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Student', 11, 1, 1, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:00:43', '2023-02-13 13:00:43'),
(2, 'App\\Models\\Student', 8, 2, 1, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:00:52', '2023-02-13 13:00:52'),
(3, 'App\\Models\\Student', 14, 1, 3, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:01:03', '2023-02-13 13:01:03'),
(4, 'App\\Models\\Student', 10, 2, 2, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:01:11', '2023-02-13 13:01:11'),
(5, 'App\\User', 8, 1, 1, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:01:42', '2023-02-13 13:01:42'),
(6, 'App\\User', 7, 2, 2, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:01:48', '2023-02-13 13:01:48'),
(7, 'App\\User', 3, 1, 3, '2023-02-13', NULL, NULL, 1, 1, NULL, '2023-02-13 13:01:55', '2023-02-13 13:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `transport_routes`
--

CREATE TABLE `transport_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `fee` double(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transport_routes`
--

INSERT INTO `transport_routes` (`id`, `title`, `fee`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mirpur to Gulshan', 50.00, NULL, 1, '2023-02-13 12:59:12', '2023-02-13 12:59:12'),
(2, 'Mirpur to Uttora', 30.00, NULL, 1, '2023-02-13 12:59:32', '2023-02-13 12:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `transport_route_transport_vehicle`
--

CREATE TABLE `transport_route_transport_vehicle` (
  `transport_route_id` int(10) UNSIGNED NOT NULL,
  `transport_vehicle_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transport_route_transport_vehicle`
--

INSERT INTO `transport_route_transport_vehicle` (`transport_route_id`, `transport_vehicle_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transport_vehicles`
--

CREATE TABLE `transport_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `model` varchar(191) DEFAULT NULL,
  `capacity` varchar(191) DEFAULT NULL,
  `year_made` varchar(191) DEFAULT NULL,
  `driver_name` varchar(191) DEFAULT NULL,
  `driver_license` text DEFAULT NULL,
  `driver_contact` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transport_vehicles`
--

INSERT INTO `transport_vehicles` (`id`, `number`, `type`, `model`, `capacity`, `year_made`, `driver_name`, `driver_license`, `driver_contact`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, '635', 'Bus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-13 12:59:55', '2023-02-13 12:59:55'),
(2, '788', 'Bus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-13 13:00:10', '2023-02-13 13:00:10'),
(3, '856', 'Bus', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-13 13:00:20', '2023-02-13 13:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(191) NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `mother_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `password_text` longtext DEFAULT NULL,
  `gender` int(11) NOT NULL COMMENT '1 Male, 2 Female & 3 Other',
  `dob` date NOT NULL,
  `joining_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `emergency_phone` varchar(191) DEFAULT NULL,
  `mother_tongue` varchar(191) DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `blood_group` int(11) DEFAULT NULL,
  `nationality` varchar(191) DEFAULT NULL,
  `national_id` varchar(191) DEFAULT NULL,
  `passport_no` varchar(191) DEFAULT NULL,
  `present_province` int(10) UNSIGNED DEFAULT NULL,
  `present_district` int(10) UNSIGNED DEFAULT NULL,
  `present_village` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_province` int(10) UNSIGNED DEFAULT NULL,
  `permanent_district` int(10) UNSIGNED DEFAULT NULL,
  `permanent_village` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `education_level` varchar(191) DEFAULT NULL,
  `graduation_academy` varchar(191) DEFAULT NULL,
  `year_of_graduation` varchar(191) DEFAULT NULL,
  `graduation_field` varchar(191) DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `basic_salary` double(10,2) NOT NULL DEFAULT 0.00,
  `contract_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 Full Time & 2 Part Time',
  `work_shift` int(10) UNSIGNED DEFAULT NULL,
  `salary_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 Fixed & 2 Hourly',
  `bank_account_name` varchar(191) DEFAULT NULL,
  `bank_account_no` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `ifsc_code` varchar(191) DEFAULT NULL,
  `bank_brach` varchar(191) DEFAULT NULL,
  `tin_no` varchar(191) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `joining_letter` text DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `login` tinyint(1) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 Inactive, 1 Active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `epf_no` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `department_id`, `designation_id`, `first_name`, `last_name`, `father_name`, `mother_name`, `email`, `email_verified_at`, `password`, `password_text`, `gender`, `dob`, `joining_date`, `ending_date`, `phone`, `emergency_phone`, `mother_tongue`, `marital_status`, `blood_group`, `nationality`, `national_id`, `passport_no`, `present_province`, `present_district`, `present_village`, `present_address`, `permanent_province`, `permanent_district`, `permanent_village`, `permanent_address`, `education_level`, `graduation_academy`, `year_of_graduation`, `graduation_field`, `experience`, `note`, `basic_salary`, `contract_type`, `work_shift`, `salary_type`, `bank_account_name`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_brach`, `tin_no`, `photo`, `signature`, `resume`, `joining_letter`, `is_admin`, `login`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `religion`, `caste`, `country`, `epf_no`) VALUES
(1, '1001', 1, 2, 'Super', 'Admin', 'ABC', 'XYZ', 'carlos@netlogyc.com', NULL, '$2y$10$RdSog4xnJYQlAL8CfEkScu5fq6lAK6PAHhRLiWRqqm.5Vbx3tgLTG', 'eyJpdiI6InUzZjBGeHhJck82UHMyOU45Q3VZRVE9PSIsInZhbHVlIjoiaTlSVGtsOFRNbUNta3l5UHIvN01mQT09IiwibWFjIjoiY2JiMzk3MWQwYjczZDFhMmNjNDA5ODY3NDVhZjU0MGY1ZWM1ZjBkZTMzM2E5ZWQ3OGJhNjk4NjNkNjE2ODJmMyIsInRhZyI6IiJ9', 1, '2006-01-01', '2018-10-02', NULL, '0123456789', NULL, NULL, 2, 1, NULL, NULL, NULL, 1, 1, NULL, NULL, 1, 1, NULL, NULL, 'Minima voluptatem f', 'Et sunt esse non pro', '2001', 'Eum sed do omnis mai', 'Quo sunt hic except', 'Distinctio Esse do', 50000.00, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 'yRyNHgQem0us4qLWF9ttl3dJigsjKC7WR1GphbQzw9lowVc4gDEWrU8L4Bwd', NULL, 1, '2022-09-30 12:00:46', '2023-07-12 15:46:39', NULL, NULL, NULL, NULL),
(2, '1002', 3, 5, 'Laurel', 'Rivers', 'Britanney Leonard', 'Aubrey Russo', 'wademegiva@mailinator.com', NULL, '$2y$10$F51VaxrXH7fjXJALgFwmsOLXfp5015iVCBr1TuXI70rUQF04.mhSO', 'eyJpdiI6IjJiZkkvZ1NCUDR0ZFJxZDEydWpTZ1E9PSIsInZhbHVlIjoiOHJlSjlEeWRRdjBWMzJOQzhRQnc4UT09IiwibWFjIjoiYTM1NGNiZmEyMGNhOGRlZGU0YjM1OTlkYzg5ZjAxYzYwMTg4NTlmYmEyMmMzN2FlYTA4OWZlYjFhNDE0M2JhMiIsInRhZyI6IiJ9', 2, '1995-05-03', '2016-06-04', NULL, '+1 (382) 814-8571', '+1 (706) 309-2903', NULL, 1, 4, NULL, '548567878674564', '1215454574578', 3, 9, 'Omnis aut earum veli', 'Voluptatem Fugit a', 3, 11, 'Et non sunt tempore', 'Aperiam reprehenderi', 'Sint aut sed quos l', 'Non qui commodo quam', '2012', 'Sit dolores incidun', 'Earum ea atque expli', 'Maiores totam ex nul', 40000.00, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'staff1_1664711572.jpg', NULL, NULL, NULL, 0, 1, 1, NULL, 1, 1, '2022-10-02 05:52:52', '2022-10-03 14:49:29', NULL, NULL, NULL, NULL),
(3, '1003', 5, 3, 'Meredith', 'Hancock', 'Ariana Mckenzie', 'Carla Oneill', 'temaestro2@netlogyc.com', NULL, '$2y$10$xCY/I/jAoM2p6zl0RaOOa.gT.H5EjY7Rz3EvvxiC5h334mTrZycTy', 'eyJpdiI6Iit4ZUd5RVZlUG42RVd1bld5Y2RZUXc9PSIsInZhbHVlIjoiUHVKb3JHTE40Rkw2UksxOFJNRUo1UT09IiwibWFjIjoiYzU4MTdhMGU0ZjY0Y2Q5YjJkZGYxNzU2ZTkxZTI4MmMzNDBiMGQyZGNhZTJkMTI3OTBkZTQ3ODliZDk5ODZlMyIsInRhZyI6IiJ9', 1, '2000-10-03', '2015-12-31', NULL, '+1 (232) 685-4261', '+1 (347) 622-9076', NULL, 3, 3, NULL, 'Officia non cupidita', 'Omnis quia sed dolor', 0, 0, NULL, 'Necessitatibus sit', 0, 0, NULL, 'Neque id et officiis', NULL, NULL, NULL, NULL, NULL, NULL, 300.00, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 1, 1, '2022-10-02 05:55:46', '2023-08-10 00:41:37', NULL, NULL, NULL, NULL),
(4, '1004', 5, 1, 'Daphne', 'Padilla', 'Akeem Lester', 'Mallory Winters', 'foxykosen@mailinator.com', NULL, '$2y$10$LzfVRaZciCdgmYZRnvchmehBhCREFtz68CmhGYPORckO2FsYniMUW', 'eyJpdiI6ImVGNCtUcUVER3ZrT2RCZjBzZnhxQVE9PSIsInZhbHVlIjoiZldUR3RwZmVFWHFEc3dzeW1XNlIzZz09IiwibWFjIjoiOTMyODJlMjcxYzE2MzBiMzQ2Y2IxYmQ5OWFhMDlkYTE2NDZjZmVhNzcyOTZiZTRkZTI2OGFhNzVkOTgxMGY2NiIsInRhZyI6IiJ9', 1, '1977-11-04', '2010-03-08', NULL, '+1 (736) 196-8936', '+1 (856) 323-9264', NULL, 5, 2, NULL, '757867868576', '786876876876', 4, 5, 'Incidunt aperiam pa', 'Excepteur fugiat nec', 4, 4, 'Itaque magni maxime', 'Autem itaque quis do', 'Ipsa autem dolores', 'Velit elit hic sint', '2009', 'Qui quia culpa aspe', 'Commodi deserunt lab', 'Possimus minus ipsa', 500.00, 2, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'staff2_1664711842.jpg', NULL, NULL, NULL, 0, 1, 1, NULL, 1, 1, '2022-10-02 05:57:22', '2022-10-02 11:51:51', NULL, NULL, NULL, NULL),
(5, '1005', 5, 3, 'Emmanuel', 'Harmon', 'Thor Rosales', 'Desiree Crawford', 'wymawocowy@mailinator.com', NULL, '$2y$10$r1R9qzdjP0z02OP0Jneaq.eXfo4o3UKrtP8XMKENhjYJPn3bhjEY6', 'eyJpdiI6InBYNWFoZ3dadjd6L1Z3ZW9TTzczYmc9PSIsInZhbHVlIjoiVWVmeWtqRGdwQmYxQS9YaVJvaVV1QT09IiwibWFjIjoiOGRkZmM3MDU1ODkxNDc1Yjc5MDE5MTgyMDc2MmZkZDRkNTA1ZTg0ZDdhZjNkMTcwMTBkNmYxYjA0YjM3NmNiZiIsInRhZyI6IiJ9', 2, '1972-09-29', '2021-09-12', NULL, '+1 (363) 404-1739', '+1 (874) 534-7443', NULL, 3, 4, NULL, 'Ratione consequatur', 'Officia quaerat aliq', 2, 13, 'Beatae Nam praesenti', 'Qui corporis quia la', 1, 2, 'Qui vel consectetur', 'Nostrum deserunt eni', 'Non do mollit eos vo', 'Culpa unde quidem f', '1998', 'Dolore culpa proide', 'In fugiat sit id qu', 'Eaque reiciendis qui', 35000.00, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 1, 1, '2022-10-02 05:59:21', '2022-10-02 11:52:10', NULL, NULL, NULL, NULL),
(6, '1006', 1, 6, 'Sara', 'Boone', 'Vance Carroll', 'Vaughan Francis', 'myda@mailinator.com', NULL, '$2y$10$w2tfyISrZMeHcXrHaFw1aOufZeIATXxG1lXNnUZZQJR2FGnp49xX.', 'eyJpdiI6IjAxZWJ6SW9iR3pZTnU3aFRPYUUxRnc9PSIsInZhbHVlIjoiOGVQMWZNdmx2S2hOWUZpYlpFOXY4Zz09IiwibWFjIjoiMjFmMjRjM2I1OGE0NmE1YzRlM2Q4MzI1OGE3ZWZhZDdjYmU0ZTkzMjlmM2IxNTk5MTM4NTY1MTQ1NWE5YzQ5ZSIsInRhZyI6IiJ9', 1, '1976-02-11', '2016-09-13', NULL, '+1 (168) 535-3775', '+1 (254) 313-7114', NULL, 3, 5, NULL, 'Non nihil ex tempore', 'Enim sit voluptate', 2, 7, 'Duis voluptas minima', 'Nisi molestias error', 1, 2, 'Culpa aliquam et et', 'Ullamco laudantium', 'Ipsam sed qui dolore', 'Atque totam lorem co', '1976', 'Consequatur excepte', 'Debitis dolore magna', 'Vero voluptatem labo', 40000.00, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 1, 1, '2022-10-02 11:33:19', '2022-10-02 11:52:30', NULL, NULL, NULL, NULL),
(7, '1007', 5, 3, 'Zorita', 'Rivas', 'Paki Boyd', 'Deanna Arnold', 'temaestro1@netlogyc.com', NULL, '$2y$10$5i8I4LJNe7Ts/ttENVGfSupvDk2zNja1S/3rw8ZKP7RYYd3YRj/B2', 'eyJpdiI6IlEyaUlrZ2VienpCbWR3bmlxYmNaa0E9PSIsInZhbHVlIjoiUUNkUlR3ZWZpTUZlWmxEQ3g3RVBTQT09IiwibWFjIjoiYTgxNjY2ZDI2MTJhMTM5OGMwMzkyYzQ4Yjc3MzcyZjc5ODcyODIzZWU1NWM0ZTA5ZGY4NjU1YWYwNTdhNzU0MSIsInRhZyI6IiJ9', 1, '1997-06-13', '2021-10-31', NULL, '+1 (512) 822-9148', '+1 (231) 297-5927', NULL, 4, 8, NULL, 'Ut suscipit qui dolo', 'Commodi possimus cu', 4, 4, NULL, 'Deleniti quis fugiat', 4, 3, NULL, 'Eius repudiandae dol', 'Rerum accusamus sequ', 'Nam modi soluta volu', '1983', 'Enim fugiat obcaeca', 'Atque nostrum ipsum', 'Deserunt in totam es', 38000.00, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 1, 1, '2022-10-02 11:37:09', '2023-07-13 12:39:31', NULL, NULL, NULL, NULL),
(8, '1008', 2, 4, 'Kessie', 'Lee', 'Colleen Burt', 'Wesley Pittman', 'admteduca1@netlogyc.com', NULL, '$2y$10$adJaANcz9UVgXLzGL/38XeMPv/gOlEwfxcrGJWaA2yiNzeFByY3H2', 'eyJpdiI6IlpEeXFXVnJidWdiZjVXMDhrZTk4Q0E9PSIsInZhbHVlIjoiSnhZaFV5RTdZME1SL3lqZWs0YjdWdz09IiwibWFjIjoiOGU3ZWU0OGJiNDUwZDJkODE4NzY3ZjU2MzYxYTE2ZDZmNzA5YzhhMTIxNzkwMjc2ZGQxOTgyYjA0OTA3OTgwYiIsInRhZyI6IiJ9', 2, '1979-04-27', '2018-05-30', NULL, '+1 (492) 339-1114', '+1 (485) 738-3534', NULL, 3, 6, NULL, '58765568', '9841357', 1, 6, NULL, 'Commodo dolores eius', 4, 12, NULL, 'Quia ullamco quo bea', NULL, NULL, NULL, NULL, NULL, NULL, 35000.00, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 1, 1, '2022-10-02 11:45:51', '2023-07-13 12:49:56', NULL, NULL, NULL, NULL),
(9, '1009', 4, 2, 'Sophia', 'Hyde', 'Tucker Knapp', 'Halla Pugh', 'admteduca2@netlogyc.com', NULL, '$2y$10$0qiU3oPrynSFIk2FBpBdGea71Y8fNdx8cbXEivsOwmATdkQVceLyu', 'eyJpdiI6ImdJWjc0czFBTU9pZlR2R0FpSmtIeEE9PSIsInZhbHVlIjoidXlJdkhiS0hCak5xbE9CczZPbDZOZz09IiwibWFjIjoiZjRjMWVjMGEwNTBkMDFhNTZiMDM1YWFkZmY5M2U4OTBjZDIzYzdjYjk2MjIxOWEzZjAyYTEwNmUyNWVjMDRhYiIsInRhZyI6IiJ9', 2, '1989-02-26', '2022-09-23', NULL, '+1 (542) 196-8396', '+1 (139) 442-4078', NULL, 4, 6, NULL, '9874646', '4568765323', 2, 7, NULL, 'Tempora aspernatur i', 1, 6, NULL, 'Enim molestias enim', NULL, NULL, NULL, NULL, NULL, NULL, 30000.00, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'staff1_1664732856.jpg', NULL, NULL, NULL, 0, 1, 1, NULL, 1, 1, '2022-10-02 11:47:36', '2023-07-13 12:50:52', NULL, NULL, NULL, NULL),
(10, '001', 1, 2, 'administrador', 'dos', NULL, NULL, 'soporte@netlogyc.com', NULL, '$2y$10$kRSnv93RAbdyhp4MBj2YTeJGzTiMAKBZmnQh8hnFqKiRzDChNFmEC', 'eyJpdiI6ImpBZzEvNVdsMUhVU050ajBDbjFEQVE9PSIsInZhbHVlIjoibGM1UUlBNnM4UHQvWE13YUJ3bXJJUT09IiwibWFjIjoiYjI3NjJjYjlmZDU1ZmNlYzZlODY0NTM1NzE4NTExNzMxZmY4YWNjMmM2NzQzNjA5NTRjMGJhN2YzMzdjOGY4OCIsInRhZyI6IiJ9', 1, '2020-07-12', '2023-07-12', NULL, '654654', '654987', NULL, 1, 1, NULL, '654654654654', '9651651', 5, 14, NULL, 'sdfg', 5, 14, NULL, 'sdfgdsfgdf', 'sdfg', 'sdfg', '2000', 'sdfg', 'sdfgsdfg', 'sdfgsdfg', 1.00, 1, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 1, NULL, '2023-07-12 20:04:00', '2023-07-12 20:04:49', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_program`
--

CREATE TABLE `user_program` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purpose_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `visit_from` text DEFAULT NULL,
  `id_no` varchar(191) DEFAULT NULL,
  `token` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `persons` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `attach` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `purpose_id`, `department_id`, `name`, `father_name`, `phone`, `email`, `address`, `visit_from`, `id_no`, `token`, `date`, `in_time`, `out_time`, `persons`, `note`, `attach`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'Yoko Payne', 'Griffith Shaw', '+1 (466) 696-7792', 'koty@mailinator.com', NULL, 'Qui quis perferendis', NULL, 'Pass-100001', '2021-02-16', '00:00:00', '11:34:00', '1', 'Rem eu numquam dolor', NULL, 1, 1, NULL, '2022-10-01 11:49:03', '2022-10-01 11:49:03'),
(2, 3, 4, 'Ria Hodges', 'Lester Weber', '+1 (864) 185-6339', 'vubypa@mailinator.com', NULL, 'Voluptas id voluptas', NULL, 'Pass-100002', '2020-12-01', '00:00:00', '23:23:00', '1', 'Consequatur repellen', NULL, 1, 1, 1, '2022-10-01 11:49:30', '2022-10-01 11:50:04'),
(3, 4, 4, 'Astra Good', 'Cora Garrison', '+1 (873) 471-3381', 'dovejyjo@mailinator.com', NULL, 'Reiciendis id dolore', NULL, 'Pass-100003', '2022-01-21', '00:00:00', '03:35:00', '1', 'Qui saepe fuga Faci', 'logo_1664646638.jpg', 1, 1, 1, '2022-10-01 11:50:38', '2022-10-01 11:51:10'),
(4, 3, 3, 'Maile Chavez', 'Macy Harper', '+1 (703) 918-4114', 'zyxisiw@mailinator.com', NULL, 'Reprehenderit odio q', NULL, 'Pass-100004', '2022-10-01', '17:51:00', '19:55:00', '4', 'Odio id corrupti h', NULL, 1, 1, NULL, '2022-10-01 11:51:56', '2022-10-01 11:51:56'),
(5, 2, 3, 'Winifred Poole', 'Linus Guzman', '+1 (477) 757-3411', 'fysel@mailinator.com', NULL, 'A facere aut consequ', NULL, 'Pass-100005', '2020-09-16', '00:00:00', '08:55:00', '2', 'Similique totam esse', NULL, 1, 1, 1, '2022-10-01 11:52:20', '2022-10-01 11:52:42'),
(6, 4, 5, 'Lacey Mitchell', 'Zane Jefferson', '+1 (936) 186-6298', 'nywac@mailinator.com', NULL, 'Quis aute culpa aut', NULL, 'Pass-100006', '2021-10-01', '17:53:00', '16:11:00', '2', 'Vitae minima maiores', NULL, 1, 1, NULL, '2022-10-01 11:53:27', '2022-10-01 11:53:27'),
(7, 4, 1, 'Kirk Kline', 'Coby Rivas', '+1 (423) 673-6386', 'tife@mailinator.com', NULL, 'Porro aliquam sunt e', NULL, 'Pass-100007', '2020-08-20', '17:53:00', '03:57:00', '1', 'Placeat eiusmod qui', NULL, 1, 1, NULL, '2022-10-01 11:54:12', '2022-10-01 11:54:12'),
(8, 3, 2, 'Stewart Padilla', 'Cairo Stanton', '+1 (691) 309-1928', 'bavoc@mailinator.com', NULL, 'Cupiditate dolor pro', NULL, 'Pass-100008', '2021-05-22', '00:00:00', '10:47:00', '1', 'Eu eos lorem ab eos', NULL, 1, 1, NULL, '2022-10-01 11:54:40', '2022-10-01 11:54:40'),
(9, 4, 6, 'Jayme Holder', 'Barrett Mckee', '+1 (393) 487-6252', 'hixuter@mailinator.com', NULL, 'Maxime anim qui iust', NULL, 'Pass-100009', '2021-09-05', '00:00:00', '10:26:00', '1', 'Ex deserunt ea tenet', NULL, 1, 1, NULL, '2022-10-01 11:55:21', '2022-10-01 11:55:21'),
(10, 1, 3, 'Alexander Santana', 'Todd Clayton', '+1 (876) 649-1515', 'lypuhava@mailinator.com', NULL, 'Ab Nam eaque distinc', NULL, 'Pass-100010', '2022-06-12', '00:00:00', NULL, '1', 'Culpa sequi ad in ar', 'background-border_1664646980.png', 1, 1, NULL, '2022-10-01 11:56:20', '2022-10-01 11:56:20'),
(11, 1, 2, 'Neville Golden', 'Dane Holloway', '+1 (131) 631-6741', 'rumahorus@mailinator.com', NULL, 'Recusandae Vero eiu', NULL, 'Pass-100011', '2022-06-13', '00:00:00', NULL, '2', 'Repudiandae eaque sa', 'background-border_1664647025.png', 1, 1, NULL, '2022-10-01 11:57:05', '2022-10-01 11:57:05'),
(12, 4, 6, 'Keegan Mosley', 'Hu Blanchard', '+1 (869) 255-5927', 'xuhylal@mailinator.com', NULL, 'Quia beatae quibusda', NULL, 'Pass-100012', '2022-08-01', '17:57:00', '18:15:28', '1', 'Placeat itaque volu', NULL, 1, 1, 1, '2022-10-01 11:58:15', '2022-10-01 12:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `visit_purposes`
--

CREATE TABLE `visit_purposes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visit_purposes`
--

INSERT INTO `visit_purposes` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Invigilation', 'invigilation', NULL, 1, '2022-10-01 03:39:14', '2022-10-01 03:39:14'),
(2, 'Parent Meeting', 'parent-meeting', NULL, 1, '2022-10-01 03:39:30', '2022-10-01 03:39:30'),
(3, 'Enquiry', 'enquiry', NULL, 1, '2022-10-01 03:39:51', '2022-10-01 03:39:51'),
(4, 'Attend Event', 'attend-event', NULL, 1, '2022-10-01 04:05:36', '2022-10-01 04:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `work_shift_types`
--

CREATE TABLE `work_shift_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_shift_types`
--

INSERT INTO `work_shift_types` (`id`, `title`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Morning', 'morning', NULL, 1, NULL, NULL),
(2, 'Evening', 'evening', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wp_form_2485`
--

CREATE TABLE `wp_form_2485` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `fecha__hora` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo_id` varchar(255) DEFAULT NULL,
  `nmeros` varchar(255) DEFAULT NULL,
  `correo_electrnico` varchar(255) DEFAULT NULL,
  `comentario_o_mensaje` longtext DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_form_2524`
--

CREATE TABLE `wp_form_2524` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `correo_electrnico` varchar(255) DEFAULT NULL,
  `uno` varchar(255) DEFAULT NULL,
  `dos` varchar(255) DEFAULT NULL,
  `comentario_o_mensaje` longtext DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_form_2535`
--

CREATE TABLE `wp_form_2535` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `fecha_de_inters` varchar(255) DEFAULT NULL,
  `nombres_y_apellidos` varchar(255) DEFAULT NULL,
  `tipos_de_documento` varchar(255) DEFAULT NULL,
  `numero_de_documento` varchar(255) DEFAULT NULL,
  `fecha_de_expedicin_del_documento` varchar(255) DEFAULT NULL,
  `direccin` varchar(255) DEFAULT NULL,
  `numero_celular_de_contacto` varchar(255) DEFAULT NULL,
  `programa_acadmico` varchar(255) DEFAULT NULL,
  `por_que_le_interesa_esta_programa_acadmico` longtext DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_form_2549`
--

CREATE TABLE `wp_form_2549` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `tipo_de_inscripcin` varchar(255) DEFAULT NULL,
  `modalidad` varchar(255) DEFAULT NULL,
  `metodologa` varchar(255) DEFAULT NULL,
  `programa_acadmico` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `ciudad_de_nacimiento` varchar(255) DEFAULT NULL,
  `tipo_de_sangre_y_rh` varchar(255) DEFAULT NULL,
  `estado_civil` varchar(255) DEFAULT NULL,
  `jornada` varchar(255) DEFAULT NULL,
  `fecha_de_nacimiento` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `alergias__a_alguna_sustancia_o_material` varchar(255) DEFAULT NULL,
  `cual` varchar(255) DEFAULT NULL,
  `direccin_de_residencia` varchar(255) DEFAULT NULL,
  `nombre_de_plantel_educativo_donde_termin_secundaria` varchar(255) DEFAULT NULL,
  `cod_area` varchar(255) DEFAULT NULL,
  `libreta_militar` varchar(255) DEFAULT NULL,
  `ttulo_obtenido` varchar(255) DEFAULT NULL,
  `eps` varchar(255) DEFAULT NULL,
  `nmero_de_snp_saber_11` varchar(255) DEFAULT NULL,
  `tipo_de_documento_con_el_que_presento_el_examen` varchar(255) DEFAULT NULL,
  `fecha_spn_saber_11` varchar(255) DEFAULT NULL,
  `puntaje_obtenido` varchar(255) DEFAULT NULL,
  `nmero_de_documento_con_el_que_presento_el_icfes` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccin_de_residencia_42` varchar(255) DEFAULT NULL,
  `tipo_de_relacin` varchar(255) DEFAULT NULL,
  `genero_41` varchar(255) DEFAULT NULL,
  `tipo_de_documento` varchar(255) DEFAULT NULL,
  `numero_de_documento` varchar(255) DEFAULT NULL,
  `telfono` varchar(255) DEFAULT NULL,
  `ciudad_de_trabajo` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `correo_electrnico` varchar(255) DEFAULT NULL,
  `sitio_de_trabajo` varchar(255) DEFAULT NULL,
  `profesin` varchar(255) DEFAULT NULL,
  `ocupacin` varchar(255) DEFAULT NULL,
  `telfono_del_trabajo` varchar(255) DEFAULT NULL,
  `nivel_de_estudio` varchar(255) DEFAULT NULL,
  `direccin_del_trabajo` varchar(255) DEFAULT NULL,
  `vos_a_vos` varchar(255) DEFAULT NULL,
  `ferias_universitarias` varchar(255) DEFAULT NULL,
  `comunidad_ctbista` varchar(255) DEFAULT NULL,
  `redes_sociales` varchar(255) DEFAULT NULL,
  `egresados` varchar(255) DEFAULT NULL,
  `estudiante_de_la_ctb` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `empresas` varchar(255) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  `metas_profesionales_mediano_plazo` longtext DEFAULT NULL,
  `metas_profesionales_largo_plazo` longtext DEFAULT NULL,
  `metas_personales_mediano_plazo` longtext DEFAULT NULL,
  `metas_personales_largo_plazo` longtext DEFAULT NULL,
  `cules_son_sus_fortalezas` longtext DEFAULT NULL,
  `cules_son_sus_debilidades` longtext DEFAULT NULL,
  `cmo_convertira_las_debilidades_descritas_en_fortalezas` longtext DEFAULT NULL,
  `hace_cunto_tiempo_termino_la_educacin_media` longtext DEFAULT NULL,
  `cules_son_las_materias_que_le_generaron__mayor_dificultad_en` longtext DEFAULT NULL,
  `cules_son_las_materias__que_ms_le_agradaban` longtext DEFAULT NULL,
  `qu_le_gusta_hacer_en_su_tiempo_libre` longtext DEFAULT NULL,
  `qu_le_motivo_para_elegir_esta_carrera_y_no_otra` longtext DEFAULT NULL,
  `cul_es_el_campo_de_accin_en_el_que_se_puede_desempear_y_que` longtext DEFAULT NULL,
  `qu_perspectivas_profesionales_tiene_o_en_qu_campo_de_esta_ra` longtext DEFAULT NULL,
  `cul_sera_su__aporte_para_la_sociedad_a_partir_de_la_carrera` longtext DEFAULT NULL,
  `qu_otras_instituciones_de_educacin_superior_ofrecen_la_carre` longtext DEFAULT NULL,
  `conoce_el_valor_de_la_carrera_y_que_fuentes_de_financiamient` longtext DEFAULT NULL,
  `cules_opciones_de_grado_para_optar_al_ttulo_de_tecnlogo_cono` longtext DEFAULT NULL,
  `por_qu_quiere_estudiar_en_la_ctb_y_que_es_lo_que_ms_le_inter` longtext DEFAULT NULL,
  `cules_son_sus_expectativas_al_ingresar_a_la_ctb` longtext DEFAULT NULL,
  `por_qu_deberamos__aceptarlo_en_la_ctb` longtext DEFAULT NULL,
  `cmo_contribuira_usted_al_crecimiento_de_la_institucin_desde` longtext DEFAULT NULL,
  `cul_es_la_cantidad_mensual_de_dinero_que_recibe_el_ncleo_fam` varchar(255) DEFAULT NULL,
  `tiene_personas_a_cargo_econmicamente` varchar(255) DEFAULT NULL,
  `los_ingresos_para_financiar_su_educacin_son` varchar(255) DEFAULT NULL,
  `si_usted_labora_cuntos_son_sus_ingresos_mensuales` varchar(255) DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_form_2588`
--

CREATE TABLE `wp_form_2588` (
  `id` bigint(20) NOT NULL,
  `db4_status` varchar(30) NOT NULL,
  `tipo_de_inscripcin` varchar(255) DEFAULT NULL,
  `modalidad` varchar(255) DEFAULT NULL,
  `metodologa` varchar(255) DEFAULT NULL,
  `programa_acadmico` varchar(255) DEFAULT NULL,
  `jornada` varchar(255) DEFAULT NULL,
  `form_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_form_2588`
--

INSERT INTO `wp_form_2588` (`id`, `db4_status`, `tipo_de_inscripcin`, `modalidad`, `metodologa`, `programa_acadmico`, `jornada`, `form_date`) VALUES
(1, 'unread', 'Primer Semestre (Normal)', 'Pregrado', 'Presencial', 'Tecnología en Regencia de farmacia', 'Tecnología en Regencia de farmacia - Diurno', '2023-08-09 13:24:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aaapreregistrations`
--
ALTER TABLE `aaapreregistrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applications_email_unique` (`email`);

--
-- Indexes for table `application_settings`
--
ALTER TABLE `application_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `application_settings_slug_unique` (`slug`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignments_subject_id_foreign` (`subject_id`),
  ADD KEY `assignments_assign_by_foreign` (`assign_by`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `batches_title_unique` (`title`);

--
-- Indexes for table `batch_program`
--
ALTER TABLE `batch_program`
  ADD KEY `batch_program_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_program_program_id_foreign` (`program_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_isbn_unique` (`isbn`),
  ADD UNIQUE KEY `books_code_unique` (`code`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_categories_title_unique` (`title`),
  ADD UNIQUE KEY `book_categories_slug_unique` (`slug`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_requests_category_id_foreign` (`category_id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_template_id_foreign` (`template_id`),
  ADD KEY `certificates_student_id_foreign` (`student_id`);

--
-- Indexes for table `certificate_templates`
--
ALTER TABLE `certificate_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificate_templates_title_unique` (`title`);

--
-- Indexes for table `class_rooms`
--
ALTER TABLE `class_rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_rooms_title_unique` (`title`),
  ADD UNIQUE KEY `class_rooms_slug_unique` (`slug`);

--
-- Indexes for table `class_routines`
--
ALTER TABLE `class_routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_routines_teacher_id_foreign` (`teacher_id`),
  ADD KEY `class_routines_subject_id_foreign` (`subject_id`),
  ADD KEY `class_routines_room_id_foreign` (`room_id`),
  ADD KEY `class_routines_session_id_foreign` (`session_id`),
  ADD KEY `class_routines_program_id_foreign` (`program_id`),
  ADD KEY `class_routines_semester_id_foreign` (`semester_id`),
  ADD KEY `class_routines_section_id_foreign` (`section_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complains_type_id_foreign` (`type_id`),
  ADD KEY `complains_source_id_foreign` (`source_id`);

--
-- Indexes for table `complain_sources`
--
ALTER TABLE `complain_sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `complain_sources_title_unique` (`title`),
  ADD UNIQUE KEY `complain_sources_slug_unique` (`slug`);

--
-- Indexes for table `complain_types`
--
ALTER TABLE `complain_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `complain_types_title_unique` (`title`),
  ADD UNIQUE KEY `complain_types_slug_unique` (`slug`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_type_id_foreign` (`type_id`);

--
-- Indexes for table `content_types`
--
ALTER TABLE `content_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_types_title_unique` (`title`),
  ADD UNIQUE KEY `content_types_slug_unique` (`slug`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_title_unique` (`title`),
  ADD UNIQUE KEY `departments_slug_unique` (`slug`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_title_unique` (`title`),
  ADD UNIQUE KEY `designations_slug_unique` (`slug`);

--
-- Indexes for table `different_table_name`
--
ALTER TABLE `different_table_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Indexes for table `docables`
--
ALTER TABLE `docables`
  ADD UNIQUE KEY `docables_document_id_docable_id_docable_type_unique` (`document_id`,`docable_id`,`docable_type`),
  ADD KEY `docables_docable_type_docable_id_index` (`docable_type`,`docable_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_notifies`
--
ALTER TABLE `email_notifies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_reference_id_foreign` (`reference_id`),
  ADD KEY `enquiries_source_id_foreign` (`source_id`),
  ADD KEY `enquiries_program_id_foreign` (`program_id`);

--
-- Indexes for table `enquiry_references`
--
ALTER TABLE `enquiry_references`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enquiry_references_title_unique` (`title`),
  ADD UNIQUE KEY `enquiry_references_slug_unique` (`slug`);

--
-- Indexes for table `enquiry_sources`
--
ALTER TABLE `enquiry_sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enquiry_sources_title_unique` (`title`),
  ADD UNIQUE KEY `enquiry_sources_slug_unique` (`slug`);

--
-- Indexes for table `enroll_subjects`
--
ALTER TABLE `enroll_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enroll_subjects_program_id_foreign` (`program_id`),
  ADD KEY `enroll_subjects_semester_id_foreign` (`semester_id`),
  ADD KEY `enroll_subjects_section_id_foreign` (`section_id`);

--
-- Indexes for table `enroll_subject_subject`
--
ALTER TABLE `enroll_subject_subject`
  ADD KEY `enroll_subject_subject_enroll_subject_id_foreign` (`enroll_subject_id`),
  ADD KEY `enroll_subject_subject_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_student_enroll_id_foreign` (`student_enroll_id`),
  ADD KEY `exams_subject_id_foreign` (`subject_id`),
  ADD KEY `exams_exam_type_id_foreign` (`exam_type_id`);

--
-- Indexes for table `exam_routines`
--
ALTER TABLE `exam_routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_routines_exam_type_id_foreign` (`exam_type_id`),
  ADD KEY `exam_routines_session_id_foreign` (`session_id`),
  ADD KEY `exam_routines_program_id_foreign` (`program_id`),
  ADD KEY `exam_routines_semester_id_foreign` (`semester_id`),
  ADD KEY `exam_routines_section_id_foreign` (`section_id`),
  ADD KEY `exam_routines_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `exam_routine_room`
--
ALTER TABLE `exam_routine_room`
  ADD KEY `exam_routine_room_exam_routine_id_foreign` (`exam_routine_id`),
  ADD KEY `exam_routine_room_room_id_foreign` (`room_id`);

--
-- Indexes for table `exam_routine_user`
--
ALTER TABLE `exam_routine_user`
  ADD KEY `exam_routine_user_exam_routine_id_foreign` (`exam_routine_id`),
  ADD KEY `exam_routine_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_title_unique` (`title`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_category_id_foreign` (`category_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expense_categories_title_unique` (`title`),
  ADD UNIQUE KEY `expense_categories_slug_unique` (`slug`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_title_unique` (`title`),
  ADD UNIQUE KEY `faculties_slug_unique` (`slug`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_student_enroll_id_foreign` (`student_enroll_id`),
  ADD KEY `fees_category_id_foreign` (`category_id`);

--
-- Indexes for table `fees_categories`
--
ALTER TABLE `fees_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fees_categories_title_unique` (`title`),
  ADD UNIQUE KEY `fees_categories_slug_unique` (`slug`);

--
-- Indexes for table `fees_category_fees_discount`
--
ALTER TABLE `fees_category_fees_discount`
  ADD KEY `fees_category_fees_discount_fees_category_id_foreign` (`fees_category_id`),
  ADD KEY `fees_category_fees_discount_fees_discount_id_foreign` (`fees_discount_id`);

--
-- Indexes for table `fees_category_fees_fine`
--
ALTER TABLE `fees_category_fees_fine`
  ADD KEY `fees_category_fees_fine_fees_category_id_foreign` (`fees_category_id`),
  ADD KEY `fees_category_fees_fine_fees_fine_id_foreign` (`fees_fine_id`);

--
-- Indexes for table `fees_discounts`
--
ALTER TABLE `fees_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_discount_status_type`
--
ALTER TABLE `fees_discount_status_type`
  ADD KEY `fees_discount_status_type_fees_discount_id_foreign` (`fees_discount_id`),
  ADD KEY `fees_discount_status_type_status_type_id_foreign` (`status_type_id`);

--
-- Indexes for table `fees_fines`
--
ALTER TABLE `fees_fines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_masters`
--
ALTER TABLE `fees_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_masters_category_id_foreign` (`category_id`);

--
-- Indexes for table `fees_master_student_enroll`
--
ALTER TABLE `fees_master_student_enroll`
  ADD KEY `fees_master_student_enroll_fees_master_id_foreign` (`fees_master_id`),
  ADD KEY `fees_master_student_enroll_student_enroll_id_foreign` (`student_enroll_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grades_title_unique` (`title`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostels_name_unique` (`name`);

--
-- Indexes for table `hostel_members`
--
ALTER TABLE `hostel_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_members_hostelable_type_hostelable_id_index` (`hostelable_type`,`hostelable_id`),
  ADD KEY `hostel_members_hostel_room_id_foreign` (`hostel_room_id`);

--
-- Indexes for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_rooms_hostel_id_foreign` (`hostel_id`),
  ADD KEY `hostel_rooms_room_type_id_foreign` (`room_type_id`);

--
-- Indexes for table `hostel_room_types`
--
ALTER TABLE `hostel_room_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostel_room_types_title_unique` (`title`);

--
-- Indexes for table `id_card_settings`
--
ALTER TABLE `id_card_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_card_settings_slug_unique` (`slug`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_category_id_foreign` (`category_id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `income_categories_title_unique` (`title`),
  ADD UNIQUE KEY `income_categories_slug_unique` (`slug`);

--
-- Indexes for table `inscriptionform`
--
ALTER TABLE `inscriptionform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inscriptionwp`
--
ALTER TABLE `inscriptionwp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_returns`
--
ALTER TABLE `issue_returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_returns_member_id_foreign` (`member_id`),
  ADD KEY `issue_returns_book_id_foreign` (`book_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_name_unique` (`name`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_categories_title_unique` (`title`),
  ADD UNIQUE KEY `item_categories_slug_unique` (`slug`);

--
-- Indexes for table `item_issues`
--
ALTER TABLE `item_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_issues_item_id_foreign` (`item_id`),
  ADD KEY `item_issues_user_id_foreign` (`user_id`);

--
-- Indexes for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_stocks_item_id_foreign` (`item_id`),
  ADD KEY `item_stocks_store_id_foreign` (`store_id`);

--
-- Indexes for table `item_stores`
--
ALTER TABLE `item_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_stores_title_unique` (`title`),
  ADD UNIQUE KEY `item_stores_store_no_unique` (`store_no`);

--
-- Indexes for table `item_suppliers`
--
ALTER TABLE `item_suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_suppliers_title_unique` (`title`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_type_id_foreign` (`type_id`),
  ADD KEY `leaves_user_id_foreign` (`user_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_types_title_unique` (`title`),
  ADD UNIQUE KEY `leave_types_slug_unique` (`slug`);

--
-- Indexes for table `library_members`
--
ALTER TABLE `library_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_members_memberable_type_memberable_id_index` (`memberable_type`,`memberable_id`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marksheet_settings`
--
ALTER TABLE `marksheet_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marksheet_settings_title_unique` (`title`);

--
-- Indexes for table `meeting_schedules`
--
ALTER TABLE `meeting_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meeting_schedules_type_id_foreign` (`type_id`);

--
-- Indexes for table `meeting_types`
--
ALTER TABLE `meeting_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `meeting_types_title_unique` (`title`),
  ADD UNIQUE KEY `meeting_types_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `my_custom_table`
--
ALTER TABLE `my_custom_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_noteable_type_noteable_id_index` (`noteable_type`,`noteable_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notices_notice_no_unique` (`notice_no`),
  ADD KEY `notices_category_id_foreign` (`category_id`);

--
-- Indexes for table `notice_categories`
--
ALTER TABLE `notice_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notice_categories_title_unique` (`title`),
  ADD UNIQUE KEY `notice_categories_slug_unique` (`slug`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `outside_users`
--
ALTER TABLE `outside_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `outside_users_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_details`
--
ALTER TABLE `payroll_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_details_payroll_id_foreign` (`payroll_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_logs`
--
ALTER TABLE `phone_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postal_exchanges`
--
ALTER TABLE `postal_exchanges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postal_exchanges_category_id_foreign` (`category_id`);

--
-- Indexes for table `postal_exchange_types`
--
ALTER TABLE `postal_exchange_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `postal_exchange_types_title_unique` (`title`),
  ADD UNIQUE KEY `postal_exchange_types_slug_unique` (`slug`);

--
-- Indexes for table `preregistrations`
--
ALTER TABLE `preregistrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_settings`
--
ALTER TABLE `print_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `print_settings_slug_unique` (`slug`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_title_unique` (`title`),
  ADD UNIQUE KEY `programs_slug_unique` (`slug`),
  ADD KEY `programs_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `program_class_room`
--
ALTER TABLE `program_class_room`
  ADD KEY `program_class_room_program_id_foreign` (`program_id`),
  ADD KEY `program_class_room_class_room_id_foreign` (`class_room_id`);

--
-- Indexes for table `program_semester`
--
ALTER TABLE `program_semester`
  ADD KEY `program_semester_program_id_foreign` (`program_id`),
  ADD KEY `program_semester_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `program_semester_sections`
--
ALTER TABLE `program_semester_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_semester_sections_program_id_foreign` (`program_id`),
  ADD KEY `program_semester_sections_semester_id_foreign` (`semester_id`),
  ADD KEY `program_semester_sections_section_id_foreign` (`section_id`);

--
-- Indexes for table `program_session`
--
ALTER TABLE `program_session`
  ADD KEY `program_session_program_id_foreign` (`program_id`),
  ADD KEY `program_session_session_id_foreign` (`session_id`);

--
-- Indexes for table `program_subject`
--
ALTER TABLE `program_subject`
  ADD KEY `program_subject_program_id_foreign` (`program_id`),
  ADD KEY `program_subject_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provinces_title_unique` (`title`),
  ADD UNIQUE KEY `provinces_slug_unique` (`slug`);

--
-- Indexes for table `result_contributions`
--
ALTER TABLE `result_contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedule_settings`
--
ALTER TABLE `schedule_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedule_settings_slug_unique` (`slug`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sections_title_unique` (`title`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `semesters_title_unique` (`title`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_title_unique` (`title`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `staff_hourly_attendances`
--
ALTER TABLE `staff_hourly_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_hourly_attendances_user_id_foreign` (`user_id`),
  ADD KEY `staff_hourly_attendances_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `status_types`
--
ALTER TABLE `status_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_types_title_unique` (`title`),
  ADD UNIQUE KEY `status_types_slug_unique` (`slug`);

--
-- Indexes for table `status_type_student`
--
ALTER TABLE `status_type_student`
  ADD KEY `status_type_student_status_type_id_foreign` (`status_type_id`),
  ADD KEY `status_type_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_assignments_student_enroll_id_foreign` (`student_enroll_id`),
  ADD KEY `student_assignments_assignment_id_foreign` (`assignment_id`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_attendances_student_enroll_id_foreign` (`student_enroll_id`),
  ADD KEY `student_attendances_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `student_enrolls`
--
ALTER TABLE `student_enrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_enrolls_student_id_foreign` (`student_id`),
  ADD KEY `student_enrolls_program_id_foreign` (`program_id`),
  ADD KEY `student_enrolls_session_id_foreign` (`session_id`),
  ADD KEY `student_enrolls_semester_id_foreign` (`semester_id`),
  ADD KEY `student_enrolls_section_id_foreign` (`section_id`);

--
-- Indexes for table `student_enroll_subject`
--
ALTER TABLE `student_enroll_subject`
  ADD KEY `student_enroll_subject_student_enroll_id_foreign` (`student_enroll_id`),
  ADD KEY `student_enroll_subject_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `student_leaves`
--
ALTER TABLE `student_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_leaves_student_id_foreign` (`student_id`);

--
-- Indexes for table `student_relatives`
--
ALTER TABLE `student_relatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_relatives_student_id_foreign` (`student_id`);

--
-- Indexes for table `student_transfers`
--
ALTER TABLE `student_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_transfers_student_id_foreign` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_code_unique` (`code`);

--
-- Indexes for table `subject_markings`
--
ALTER TABLE `subject_markings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_markings_student_enroll_id_foreign` (`student_enroll_id`),
  ADD KEY `subject_markings_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `s_m_s_notifies`
--
ALTER TABLE `s_m_s_notifies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_m_s_settings`
--
ALTER TABLE `s_m_s_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_settings`
--
ALTER TABLE `tax_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `transfer_creadits`
--
ALTER TABLE `transfer_creadits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_creadits_student_id_foreign` (`student_id`),
  ADD KEY `transfer_creadits_program_id_foreign` (`program_id`),
  ADD KEY `transfer_creadits_session_id_foreign` (`session_id`),
  ADD KEY `transfer_creadits_semester_id_foreign` (`semester_id`),
  ADD KEY `transfer_creadits_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `transport_members`
--
ALTER TABLE `transport_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transport_members_transportable_type_transportable_id_index` (`transportable_type`,`transportable_id`),
  ADD KEY `transport_members_transport_route_id_foreign` (`transport_route_id`),
  ADD KEY `transport_members_transport_vehicle_id_foreign` (`transport_vehicle_id`);

--
-- Indexes for table `transport_routes`
--
ALTER TABLE `transport_routes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transport_routes_title_unique` (`title`);

--
-- Indexes for table `transport_route_transport_vehicle`
--
ALTER TABLE `transport_route_transport_vehicle`
  ADD KEY `transport_route_transport_vehicle_transport_route_id_foreign` (`transport_route_id`),
  ADD KEY `transport_route_transport_vehicle_transport_vehicle_id_foreign` (`transport_vehicle_id`);

--
-- Indexes for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_staff_id_unique` (`staff_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_program`
--
ALTER TABLE `user_program`
  ADD KEY `user_program_user_id_foreign` (`user_id`),
  ADD KEY `user_program_program_id_foreign` (`program_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_purpose_id_foreign` (`purpose_id`),
  ADD KEY `visitors_department_id_foreign` (`department_id`);

--
-- Indexes for table `visit_purposes`
--
ALTER TABLE `visit_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visit_purposes_title_unique` (`title`),
  ADD UNIQUE KEY `visit_purposes_slug_unique` (`slug`);

--
-- Indexes for table `work_shift_types`
--
ALTER TABLE `work_shift_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `work_shift_types_title_unique` (`title`),
  ADD UNIQUE KEY `work_shift_types_slug_unique` (`slug`);

--
-- Indexes for table `wp_form_2485`
--
ALTER TABLE `wp_form_2485`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_form_2524`
--
ALTER TABLE `wp_form_2524`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_form_2535`
--
ALTER TABLE `wp_form_2535`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_form_2549`
--
ALTER TABLE `wp_form_2549`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_form_2588`
--
ALTER TABLE `wp_form_2588`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aaapreregistrations`
--
ALTER TABLE `aaapreregistrations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_settings`
--
ALTER TABLE `application_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificate_templates`
--
ALTER TABLE `certificate_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_rooms`
--
ALTER TABLE `class_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_routines`
--
ALTER TABLE `class_routines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complain_sources`
--
ALTER TABLE `complain_sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complain_types`
--
ALTER TABLE `complain_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content_types`
--
ALTER TABLE `content_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `different_table_name`
--
ALTER TABLE `different_table_name`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_notifies`
--
ALTER TABLE `email_notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enquiry_references`
--
ALTER TABLE `enquiry_references`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enquiry_sources`
--
ALTER TABLE `enquiry_sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enroll_subjects`
--
ALTER TABLE `enroll_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `exam_routines`
--
ALTER TABLE `exam_routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fees_categories`
--
ALTER TABLE `fees_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees_discounts`
--
ALTER TABLE `fees_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees_fines`
--
ALTER TABLE `fees_fines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees_masters`
--
ALTER TABLE `fees_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hostel_members`
--
ALTER TABLE `hostel_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hostel_room_types`
--
ALTER TABLE `hostel_room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `id_card_settings`
--
ALTER TABLE `id_card_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inscriptionform`
--
ALTER TABLE `inscriptionform`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inscriptionwp`
--
ALTER TABLE `inscriptionwp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_returns`
--
ALTER TABLE `issue_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_issues`
--
ALTER TABLE `item_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_stocks`
--
ALTER TABLE `item_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item_stores`
--
ALTER TABLE `item_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_suppliers`
--
ALTER TABLE `item_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `library_members`
--
ALTER TABLE `library_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marksheet_settings`
--
ALTER TABLE `marksheet_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meeting_schedules`
--
ALTER TABLE `meeting_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meeting_types`
--
ALTER TABLE `meeting_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `my_custom_table`
--
ALTER TABLE `my_custom_table`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice_categories`
--
ALTER TABLE `notice_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `outside_users`
--
ALTER TABLE `outside_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payroll_details`
--
ALTER TABLE `payroll_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1070;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_logs`
--
ALTER TABLE `phone_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `postal_exchanges`
--
ALTER TABLE `postal_exchanges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `postal_exchange_types`
--
ALTER TABLE `postal_exchange_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `preregistrations`
--
ALTER TABLE `preregistrations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `print_settings`
--
ALTER TABLE `print_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `program_semester_sections`
--
ALTER TABLE `program_semester_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `result_contributions`
--
ALTER TABLE `result_contributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedule_settings`
--
ALTER TABLE `schedule_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `staff_hourly_attendances`
--
ALTER TABLE `staff_hourly_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `status_types`
--
ALTER TABLE `status_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_assignments`
--
ALTER TABLE `student_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `student_enrolls`
--
ALTER TABLE `student_enrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_leaves`
--
ALTER TABLE `student_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_relatives`
--
ALTER TABLE `student_relatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `student_transfers`
--
ALTER TABLE `student_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `subject_markings`
--
ALTER TABLE `subject_markings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `s_m_s_notifies`
--
ALTER TABLE `s_m_s_notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_m_s_settings`
--
ALTER TABLE `s_m_s_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_settings`
--
ALTER TABLE `tax_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `transfer_creadits`
--
ALTER TABLE `transfer_creadits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transport_members`
--
ALTER TABLE `transport_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transport_routes`
--
ALTER TABLE `transport_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transport_vehicles`
--
ALTER TABLE `transport_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `visit_purposes`
--
ALTER TABLE `visit_purposes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_shift_types`
--
ALTER TABLE `work_shift_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wp_form_2485`
--
ALTER TABLE `wp_form_2485`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_form_2524`
--
ALTER TABLE `wp_form_2524`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_form_2535`
--
ALTER TABLE `wp_form_2535`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_form_2549`
--
ALTER TABLE `wp_form_2549`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_form_2588`
--
ALTER TABLE `wp_form_2588`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_assign_by_foreign` FOREIGN KEY (`assign_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignments_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_program`
--
ALTER TABLE `batch_program`
  ADD CONSTRAINT `batch_program_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_program_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `book_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD CONSTRAINT `book_requests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `book_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `certificates_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `certificate_templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_routines`
--
ALTER TABLE `class_routines`
  ADD CONSTRAINT `class_routines_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_routines_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `class_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_routines_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_routines_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_routines_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_routines_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_routines_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `complains_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `complain_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `content_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `docables`
--
ALTER TABLE `docables`
  ADD CONSTRAINT `docables_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enroll_subjects`
--
ALTER TABLE `enroll_subjects`
  ADD CONSTRAINT `enroll_subjects_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enroll_subjects_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enroll_subjects_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enroll_subject_subject`
--
ALTER TABLE `enroll_subject_subject`
  ADD CONSTRAINT `enroll_subject_subject_enroll_subject_id_foreign` FOREIGN KEY (`enroll_subject_id`) REFERENCES `enroll_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enroll_subject_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_student_enroll_id_foreign` FOREIGN KEY (`student_enroll_id`) REFERENCES `student_enrolls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_routines`
--
ALTER TABLE `exam_routines`
  ADD CONSTRAINT `exam_routines_exam_type_id_foreign` FOREIGN KEY (`exam_type_id`) REFERENCES `exam_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_routines_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_routines_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_routines_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_routines_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_routines_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_routine_room`
--
ALTER TABLE `exam_routine_room`
  ADD CONSTRAINT `exam_routine_room_exam_routine_id_foreign` FOREIGN KEY (`exam_routine_id`) REFERENCES `exam_routines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_routine_room_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `class_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_routine_user`
--
ALTER TABLE `exam_routine_user`
  ADD CONSTRAINT `exam_routine_user_exam_routine_id_foreign` FOREIGN KEY (`exam_routine_id`) REFERENCES `exam_routines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_routine_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_category_fees_discount`
--
ALTER TABLE `fees_category_fees_discount`
  ADD CONSTRAINT `fees_category_fees_discount_fees_category_id_foreign` FOREIGN KEY (`fees_category_id`) REFERENCES `fees_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_category_fees_discount_fees_discount_id_foreign` FOREIGN KEY (`fees_discount_id`) REFERENCES `fees_discounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_category_fees_fine`
--
ALTER TABLE `fees_category_fees_fine`
  ADD CONSTRAINT `fees_category_fees_fine_fees_category_id_foreign` FOREIGN KEY (`fees_category_id`) REFERENCES `fees_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_category_fees_fine_fees_fine_id_foreign` FOREIGN KEY (`fees_fine_id`) REFERENCES `fees_fines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_discount_status_type`
--
ALTER TABLE `fees_discount_status_type`
  ADD CONSTRAINT `fees_discount_status_type_fees_discount_id_foreign` FOREIGN KEY (`fees_discount_id`) REFERENCES `fees_discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_discount_status_type_status_type_id_foreign` FOREIGN KEY (`status_type_id`) REFERENCES `status_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_master_student_enroll`
--
ALTER TABLE `fees_master_student_enroll`
  ADD CONSTRAINT `fees_master_student_enroll_fees_master_id_foreign` FOREIGN KEY (`fees_master_id`) REFERENCES `fees_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_master_student_enroll_student_enroll_id_foreign` FOREIGN KEY (`student_enroll_id`) REFERENCES `student_enrolls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hostel_members`
--
ALTER TABLE `hostel_members`
  ADD CONSTRAINT `hostel_members_hostel_room_id_foreign` FOREIGN KEY (`hostel_room_id`) REFERENCES `hostel_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hostel_rooms`
--
ALTER TABLE `hostel_rooms`
  ADD CONSTRAINT `hostel_rooms_hostel_id_foreign` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hostel_rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `hostel_room_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `income_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `issue_returns`
--
ALTER TABLE `issue_returns`
  ADD CONSTRAINT `issue_returns_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `issue_returns_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `library_members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_issues`
--
ALTER TABLE `item_issues`
  ADD CONSTRAINT `item_issues_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_issues_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD CONSTRAINT `item_stocks_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_stocks_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `item_stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meeting_schedules`
--
ALTER TABLE `meeting_schedules`
  ADD CONSTRAINT `meeting_schedules_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `meeting_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `notice_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payroll_details`
--
ALTER TABLE `payroll_details`
  ADD CONSTRAINT `payroll_details_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `payrolls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `postal_exchanges`
--
ALTER TABLE `postal_exchanges`
  ADD CONSTRAINT `postal_exchanges_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `postal_exchange_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_class_room`
--
ALTER TABLE `program_class_room`
  ADD CONSTRAINT `program_class_room_class_room_id_foreign` FOREIGN KEY (`class_room_id`) REFERENCES `class_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_class_room_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_semester`
--
ALTER TABLE `program_semester`
  ADD CONSTRAINT `program_semester_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_semester_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_semester_sections`
--
ALTER TABLE `program_semester_sections`
  ADD CONSTRAINT `program_semester_sections_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_semester_sections_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_semester_sections_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_session`
--
ALTER TABLE `program_session`
  ADD CONSTRAINT `program_session_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_session_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_subject`
--
ALTER TABLE `program_subject`
  ADD CONSTRAINT `program_subject_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_attendances`
--
ALTER TABLE `staff_attendances`
  ADD CONSTRAINT `staff_attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_hourly_attendances`
--
ALTER TABLE `staff_hourly_attendances`
  ADD CONSTRAINT `staff_hourly_attendances_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_hourly_attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `status_type_student`
--
ALTER TABLE `status_type_student`
  ADD CONSTRAINT `status_type_student_status_type_id_foreign` FOREIGN KEY (`status_type_id`) REFERENCES `status_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `status_type_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_assignments`
--
ALTER TABLE `student_assignments`
  ADD CONSTRAINT `student_assignments_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_assignments_student_enroll_id_foreign` FOREIGN KEY (`student_enroll_id`) REFERENCES `student_enrolls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD CONSTRAINT `student_attendances_student_enroll_id_foreign` FOREIGN KEY (`student_enroll_id`) REFERENCES `student_enrolls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_attendances_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_enrolls`
--
ALTER TABLE `student_enrolls`
  ADD CONSTRAINT `student_enrolls_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_enrolls_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_enrolls_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_enrolls_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_enrolls_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_enroll_subject`
--
ALTER TABLE `student_enroll_subject`
  ADD CONSTRAINT `student_enroll_subject_student_enroll_id_foreign` FOREIGN KEY (`student_enroll_id`) REFERENCES `student_enrolls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_enroll_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_leaves`
--
ALTER TABLE `student_leaves`
  ADD CONSTRAINT `student_leaves_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_relatives`
--
ALTER TABLE `student_relatives`
  ADD CONSTRAINT `student_relatives_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_transfers`
--
ALTER TABLE `student_transfers`
  ADD CONSTRAINT `student_transfers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_markings`
--
ALTER TABLE `subject_markings`
  ADD CONSTRAINT `subject_markings_student_enroll_id_foreign` FOREIGN KEY (`student_enroll_id`) REFERENCES `student_enrolls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_markings_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfer_creadits`
--
ALTER TABLE `transfer_creadits`
  ADD CONSTRAINT `transfer_creadits_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfer_creadits_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfer_creadits_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfer_creadits_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfer_creadits_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transport_members`
--
ALTER TABLE `transport_members`
  ADD CONSTRAINT `transport_members_transport_route_id_foreign` FOREIGN KEY (`transport_route_id`) REFERENCES `transport_routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transport_members_transport_vehicle_id_foreign` FOREIGN KEY (`transport_vehicle_id`) REFERENCES `transport_vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transport_route_transport_vehicle`
--
ALTER TABLE `transport_route_transport_vehicle`
  ADD CONSTRAINT `transport_route_transport_vehicle_transport_route_id_foreign` FOREIGN KEY (`transport_route_id`) REFERENCES `transport_routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transport_route_transport_vehicle_transport_vehicle_id_foreign` FOREIGN KEY (`transport_vehicle_id`) REFERENCES `transport_vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_program`
--
ALTER TABLE `user_program`
  ADD CONSTRAINT `user_program_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_program_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `visitors_purpose_id_foreign` FOREIGN KEY (`purpose_id`) REFERENCES `visit_purposes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
