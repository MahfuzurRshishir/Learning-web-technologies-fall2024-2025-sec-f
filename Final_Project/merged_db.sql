-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 12:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merged_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anik_applicants`
--

CREATE TABLE `anik_applicants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anik_applications`
--

CREATE TABLE `anik_applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `applied_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anik_applications`
--

INSERT INTO `anik_applications` (`id`, `job_id`, `applicant_id`, `applied_at`) VALUES
(1, 1, 3, '2025-01-05 04:17:16'),
(2, 1, 9, '2025-01-05 23:11:12'),
(3, 2, 3, '2025-01-06 00:42:12'),
(4, 6, 3, '2025-01-06 00:42:16'),
(5, 5, 12, '2025-01-22 01:51:11'),
(6, 10, 3, '2025-01-22 08:12:18'),
(7, 1, 13, '2025-01-23 02:05:01'),
(8, 2, 13, '2025-01-23 02:05:03'),
(9, 5, 13, '2025-01-23 02:05:04'),
(10, 6, 13, '2025-01-23 02:05:04'),
(11, 7, 13, '2025-01-23 02:05:05'),
(12, 8, 13, '2025-01-23 02:05:06'),
(13, 10, 13, '2025-01-23 02:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `anik_jobs`
--

CREATE TABLE `anik_jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `location` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anik_jobs`
--

INSERT INTO `anik_jobs` (`id`, `title`, `description`, `employee_id`, `created_at`, `location`, `status`) VALUES
(1, 'Superviser', 'aaaaaaaa...aa..a.a..a.a.a.', 5, '2025-01-05 04:16:52', '', 'approved'),
(2, 'helping man', 'jojoijoijojkoijo', 5, '2025-01-05 08:55:01', '', 'approved'),
(5, 'cleaner', 'holhojjoljkjbj', 5, '2025-01-05 09:34:43', 'Khulna', 'approved'),
(6, 'teacher', 'aajhkhjkla', 5, '2025-01-05 10:23:21', 'Dhaka', 'approved'),
(7, 'HR', 'ohasdlhb,d,asm', 5, '2025-01-19 09:28:56', 'Mymensingh', 'approved'),
(8, 'CEO', 'ksdjhadsc,cdsjiofad', 5, '2025-01-19 09:43:44', 'Dhaka', 'approved'),
(10, 'Faculty', 'vdfuvbkglsn;m', 5, '2025-01-22 08:10:39', 'Sylhet', 'approved'),
(11, 'Sir', 'bla bla bla bla', 5, '2025-01-23 02:06:20', 'Rangpur', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `anik_posts`
--

CREATE TABLE `anik_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `posted_by` int(11) NOT NULL,
  `status` enum('active','banned') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anik_resumes`
--

CREATE TABLE `anik_resumes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `objective` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `work_experience` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `certifications` text DEFAULT NULL,
  `languages` text DEFAULT NULL,
  `projects` text DEFAULT NULL,
  `references` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anik_resumes`
--

INSERT INTO `anik_resumes` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `profile_picture`, `objective`, `education`, `work_experience`, `skills`, `certifications`, `languages`, `projects`, `references`, `created_at`, `updated_at`) VALUES
(1, 3, 'aaa', 'aa@gamil.com', '1212321', '1232132', '470051842_8926461377431586_6302607261897444135_n-2.jpg', 'dewap[s', 'ca;oc', 'cas;l', 'afc;ld', 'acdsv;', 'af;lv', 'dfcs', 'asvdm;', '2025-01-05 11:26:56', '2025-01-05 11:26:56'),
(2, 3, 'aaaaa', 'aaa@f.com', '123454', 'hkkjhnm', '470051842_8926461377431586_6302607261897444135_n-2.jpg', 'lknlkjnk', 'jlkmbvgh', 'jknm,./,m', 'mn,n,m;/', 'kljn,k,nl', 'kjbnk,n,', 'lkklmlm', 'ljlmlmlm', '2025-01-05 11:27:47', '2025-01-05 11:27:47'),
(3, 3, 'aaaaa', 'aaa@f.com', '123454', 'hkkjhnm', '470051842_8926461377431586_6302607261897444135_n-2.jpg', 'lknlkjnk', 'jlkmbvgh', 'jknm,./,m', 'mn,n,m;/', 'kljn,k,nl', 'kjbnk,n,', 'lkklmlm', 'ljlmlmlm', '2025-01-05 11:31:39', '2025-01-05 11:31:39'),
(4, 3, 'aaa', 'aa@gamil.com', '1212321', '1232132', '470051842_8926461377431586_6302607261897444135_n-2.jpg', 'dewap[s', 'ca;oc', 'cas;l', 'afc;ld', 'acdsv;', 'af;lv', 'dfcs', 'asvdm;', '2025-01-05 11:39:32', '2025-01-05 11:39:32'),
(5, 3, 'jlk', 'jbj@gmail.com', '123456', 'ghjknlz', '470051842_8926461377431586_6302607261897444135_n-2.jpg', 'zxak', 'jio', 'xpos', 'sxk;xas', 'asxopksxa', 'xaskp;xsa', 'axspokaoxs', 'axs;sa;,', '2025-01-05 11:40:02', '2025-01-05 11:40:02'),
(6, 3, 'jlk', 'jbj@gmail.com', '123456', 'ghjknlz', '470051842_8926461377431586_6302607261897444135_n-2.jpg', 'zxak', 'jio', 'xpos', 'sxk;xas', 'asxopksxa', 'xaskp;xsa', 'axspokaoxs', 'axs;sa;,', '2025-01-05 11:41:20', '2025-01-05 11:41:20'),
(7, 3, 'hiilk', 'dd@mai.lk', '1234567', 'lkhjvbn', '470051842_8926461377431586_6302607261897444135_n-2.jpg', '', '', '', '', '', '', '', '', '2025-01-05 13:04:52', '2025-01-05 13:04:52'),
(8, 3, 'hiilk', 'dd@mai.lk', '1234567', 'lkhjvbn', '470051842_8926461377431586_6302607261897444135_n-2.jpg', '', '', '', '', '', '', '', '', '2025-01-05 13:04:54', '2025-01-05 13:04:54'),
(9, 3, 'hiilk', 'dd@mai.lk', '1234567', 'lkhjvbn', '470051842_8926461377431586_6302607261897444135_n-2.jpg', '', '', '', '', '', '', '', '', '2025-01-05 13:05:09', '2025-01-05 13:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `anik_saved_jobs`
--

CREATE TABLE `anik_saved_jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `saved_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anik_saved_jobs`
--

INSERT INTO `anik_saved_jobs` (`id`, `user_id`, `post_id`, `saved_at`) VALUES
(10, 9, 5, '2025-01-06 05:11:15'),
(15, 3, 5, '2025-01-21 14:24:50'),
(16, 12, 5, '2025-01-22 07:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `anik_skill_tests`
--

CREATE TABLE `anik_skill_tests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sector` varchar(100) DEFAULT NULL,
  `test_result` varchar(100) DEFAULT NULL,
  `test_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anik_users`
--

CREATE TABLE `anik_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','moderator','employee','applicant') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `banned` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anik_users`
--

INSERT INTO `anik_users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `banned`) VALUES
(3, 'a', 'a@gmail.com', '$2y$10$sLtZVxYDWEI8X4zCfU4ENu7IxUpew2B3XJ43HlVQJG9rvQP8BD3JS', 'applicant', '2025-01-05 09:59:28', 0),
(4, 'a', 'aaa@gmail.com', '$2y$10$a4RdlKyVgXqjHyMopWQFXe4GyTsT1oRU/pc1lnVBXJCj73RKPT/oK', 'applicant', '2025-01-05 10:01:45', 0),
(5, 'k', 'k@gmail.com', '$2y$10$cM.r.PmjtoBJHu1E4f4ZnOdqmUMinR1UCN0RM7S5XNfCAKuqotB66', 'employee', '2025-01-05 10:16:29', 0),
(7, 'anik', 'man@gmail.com', '123', 'moderator', '2025-01-05 15:56:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `f_contactsupport`
--

CREATE TABLE `f_contactsupport` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_contactsupport`
--

INSERT INTO `f_contactsupport` (`id`, `name`, `email`, `message`, `created`) VALUES
(1, 'xyz', 'xyz@gmail.com', 'asdf', '2025-01-05 15:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `f_notifications`
--

CREATE TABLE `f_notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `recipient_email` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_notifications`
--

INSERT INTO `f_notifications` (`id`, `type`, `title`, `message`, `recipient_email`, `created_at`) VALUES
(1, 'profile', 'fgxdfws', 'sdsafdws', NULL, '2025-01-05 17:00:15'),
(2, 'individual', 'sdssa', 'sdsad', 'abc@gmail.com', '2025-01-05 17:00:27'),
(3, 'general', 'sdasd', 'sdsads', NULL, '2025-01-05 17:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `f_reviews`
--

CREATE TABLE `f_reviews` (
  `id` int(11) NOT NULL,
  `review_type` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_reviews`
--

INSERT INTO `f_reviews` (`id`, `review_type`, `title`, `rating`, `review`) VALUES
(1, 0, 'manager', 4, 'good'),
(2, 0, 'manager', 2, 'ddd'),
(3, 0, '', 3, 'dd'),
(4, 0, 'SE', 4, 'dd'),
(5, 0, 'SEo', 4, 'dsfds'),
(6, 0, 'SE', 4, 'fg'),
(7, 0, 'SE', 2, 'jgfh');

-- --------------------------------------------------------

--
-- Table structure for table `f_users`
--

CREATE TABLE `f_users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_users`
--

INSERT INTO `f_users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'abc', 'abc@gmail.com', '$2y$10$76UeaLN22He9fSnHDoPYyO67xzddEVaVOtornrOa3HdTRfBsCa7aC', 0),
(2, 'xyz', 'xyz@gmail.com', '$2y$10$P1cbu6nvSWSptYdRRTmIquiA7LIgs0zzGIZPI6NvgstT5V/aUThEe', 0),
(3, 'abir', 'abir@gmail.com', '$2y$10$..9rNZIKFlekb3KzpNiHg.uD.zDNWoc5vPJO351TyauoMMUkMBeO.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nowshin_about_us`
--

CREATE TABLE `nowshin_about_us` (
  `id` int(11) NOT NULL,
  `section` enum('about','terms','privacy') NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nowshin_about_us`
--

INSERT INTO `nowshin_about_us` (`id`, `section`, `content`) VALUES
(1, 'about', 'This is a job market platform connecting employees with potential job seekers.'),
(2, 'terms', 'All users must adhere to the terms and conditions outlined here.'),
(3, 'privacy', 'We value your privacy and will not share your data without your consent.');

-- --------------------------------------------------------

--
-- Table structure for table `nowshin_applications`
--

CREATE TABLE `nowshin_applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nowshin_applications`
--

INSERT INTO `nowshin_applications` (`id`, `job_id`, `user_id`, `resume_path`, `status`, `applied_at`) VALUES
(3, 1, 3, '../uploads/resumes/mL_presentation (1).pptx', 'pending', '2022-01-05 22:03:14'),
(4, 3, 4, '../uploads/resumes/Human Facial Expression (updated).docx', 'pending', '2022-01-19 23:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `nowshin_career_resources`
--

CREATE TABLE `nowshin_career_resources` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nowshin_career_resources`
--

INSERT INTO `nowshin_career_resources` (`id`, `title`, `content`) VALUES
(1, 'Interview Tips', 'Prepare thoroughly, research the company, and practice common interview questions.'),
(2, 'Resume Writing Tips', 'Focus on clarity, highlight achievements, and keep it concise.'),
(3, 'Career Advice', 'Networking and continuous learning are keys to career growth.');

-- --------------------------------------------------------

--
-- Table structure for table `nowshin_jobs`
--

CREATE TABLE `nowshin_jobs` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nowshin_jobs`
--

INSERT INTO `nowshin_jobs` (`id`, `employee_id`, `title`, `description`, `file_path`, `posted_at`, `updated_at`) VALUES
(1, 1, 'Web Developer', 'Looking for an experienced web developer to join our team. Knowledge of PHP and JavaScript is required.', '\"\\\\Mac\\Home\\Documents\\C#\\C SHARP_Project_presentation.pptx\"', '2022-01-19 16:57:48', '2022-01-19 16:59:27'),
(2, 2, 'Data Analyst', 'Seeking a data analyst proficient in Python and SQL to analyze and interpret data for our clients.', '\"\\\\Mac\\Home\\Downloads\\22-46697-1-mes-assign-1.pdf\"', '2022-01-19 16:57:48', '2022-01-19 16:58:52'),
(3, 1, 'Designer,OTOBI Limited', 'Lcation dhaka', '', '2021-01-19 19:35:02', '2021-01-19 19:35:02'),
(4, 1, 'dcmndc', 'cdsncbihvd', '../uploads/mL_presentation (1).pptx', '2022-01-19 20:32:12', '2022-01-19 20:32:12'),
(5, 8, 'Designer,OTOBI Limited', 'design', '', '2022-01-22 13:06:32', '2022-01-22 13:06:32'),
(6, 2, 'engineer', 'remote job in australia', '', '2022-01-24 09:37:05', '2022-01-24 09:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `nowshin_site_content`
--

CREATE TABLE `nowshin_site_content` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nowshin_site_content`
--

INSERT INTO `nowshin_site_content` (`id`, `type`, `content`) VALUES
(1, 'about_us', '<p>Welcome to our job portal. We connect talent with opportunities.</p>'),
(2, 'career_resources', '<ul><li>Interview Tips</li><li>Resume Writing Tips</li><li>Career Advice</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `nowshin_users`
--

CREATE TABLE `nowshin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('employee','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nowshin_users`
--

INSERT INTO `nowshin_users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Alice Johnson', 'alice@example.com', 'password123', 'employee', '2022-01-19 16:56:51'),
(2, 'Bob Smith', 'bob@example.com', 'fariha1234', 'employee', '2022-01-19 16:56:51'),
(3, 'Charlie Brown', 'charlie@example.com', '123password', 'user', '2022-01-19 16:56:51'),
(4, 'Diana Prince', 'diana@example.com', '123password', 'user', '2022-01-19 16:56:51'),
(6, 'fariha', 'fa@gmail.com', 'fariha1234', 'user', '2025-01-19 22:24:08'),
(7, 'nowshin', 'n@gmail.com', 'sggs12', 'user', '2022-01-19 22:48:37'),
(8, 'nsadia', 'sadia@gmail.com', 'sadia123', 'employee', '2022-01-22 13:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `shish_applications`
--

CREATE TABLE `shish_applications` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resume_path` varchar(255) NOT NULL DEFAULT '',
  `application_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shish_applications`
--

INSERT INTO `shish_applications` (`id`, `job_id`, `user_id`, `resume_path`, `application_date`) VALUES
(1, 1, 100, '', '2022-01-20 11:27:51'),
(2, 2, 100, '', '2022-01-24 01:52:08'),
(3, 3, 100, '../uploads/resumes/mL_presentation (1).pdf', '2022-01-24 01:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `shish_courses`
--

CREATE TABLE `shish_courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `publisher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shish_courses`
--

INSERT INTO `shish_courses` (`id`, `title`, `description`, `start_date`, `end_date`, `publisher_id`) VALUES
(3, 'Web Design', '3 months online', '2022-01-01', '2022-03-24', 102),
(4, 'English 2', 'public speaking online', '2022-02-10', '2022-06-10', 101),
(5, 'marketing', 'online course', '2022-01-27', '2022-03-25', 102),
(6, 'Researcher', 'it will conduct online', '2022-02-01', '2022-06-01', 101);

-- --------------------------------------------------------

--
-- Table structure for table `shish_course_applications`
--

CREATE TABLE `shish_course_applications` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `application_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shish_course_applications`
--

INSERT INTO `shish_course_applications` (`id`, `course_id`, `user_id`, `application_date`) VALUES
(1, 4, 100, '2022-01-23 22:41:46'),
(2, 5, 100, '2022-01-23 22:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `shish_jobs`
--

CREATE TABLE `shish_jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `min_salary` decimal(10,2) DEFAULT NULL,
  `max_salary` decimal(10,2) DEFAULT NULL,
  `employer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shish_jobs`
--

INSERT INTO `shish_jobs` (`id`, `title`, `description`, `location`, `min_salary`, `max_salary`, `employer_id`) VALUES
(1, 'worker', 'buahs', 'Dhaka', 50.00, 100.00, 101),
(2, 'wweb developer', 'remote', 'australia', 10000.00, 50000.00, 101),
(3, 'Designer,OTOBI Limited', 'saxghafdxas', 'Dhaka', 50.00, 100.00, 101),
(4, 'Manager', 'Brac bank', 'Rajshahi', 50000.00, 60000.00, 102);

-- --------------------------------------------------------

--
-- Table structure for table `shish_notifications`
--

CREATE TABLE `shish_notifications` (
  `id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `type` enum('job_posted','job_applied') NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shish_notifications`
--

INSERT INTO `shish_notifications` (`id`, `recipient_id`, `type`, `message`, `is_read`, `created_at`) VALUES
(1, 101, 'job_applied', 'A user has applied for your job: wweb developer', 0, '2022-01-24 01:52:08'),
(2, 101, 'job_applied', 'A user has applied for your job: Designer,OTOBI Limited', 0, '2022-01-24 01:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `shish_salaries`
--

CREATE TABLE `shish_salaries` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `min_salary` decimal(10,2) DEFAULT NULL,
  `max_salary` decimal(10,2) DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shish_salaries`
--

INSERT INTO `shish_salaries` (`id`, `job_title`, `location`, `min_salary`, `max_salary`, `employee_id`) VALUES
(1, 'worker', 'Dhaka', 50.00, 100.00, 101),
(2, 'Assistant Professor', 'Dhaka', 50000.00, 80000.00, 102),
(3, 'Uber Driver', 'Dhaka', 20000.00, 40000.00, 102);

-- --------------------------------------------------------

--
-- Table structure for table `shish_users`
--

CREATE TABLE `shish_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('User','Employee') NOT NULL,
  `profilepicpath` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shish_users`
--

INSERT INTO `shish_users` (`id`, `username`, `fullname`, `email`, `password`, `usertype`, `profilepicpath`, `gender`, `phone`, `address`) VALUES
(100, 'shishir1', 'Mahfuzur Rahman', 'mohammadshishir7@gmail.com', '**mrs09', 'User', '../uploads/profile_pics/100_ranbir_pic.jpg', 'Male', '12345678901', 'kuril,dhaka'),
(101, 'fariha1', 'nowshin', 'hulululu706@gmail.com', '**mrs09', 'Employee', '../uploads/profile_pics/101_girl2.jpeg', 'Female', '00987654321', 'meherpur,bangladesh'),
(102, 'sami123', 'al sadat', 'haomaokhao99@gmail.com', '**mrs09', 'Employee', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anik_applicants`
--
ALTER TABLE `anik_applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `anik_applications`
--
ALTER TABLE `anik_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `anik_jobs`
--
ALTER TABLE `anik_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `anik_posts`
--
ALTER TABLE `anik_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posted_by` (`posted_by`);

--
-- Indexes for table `anik_resumes`
--
ALTER TABLE `anik_resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `anik_saved_jobs`
--
ALTER TABLE `anik_saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `anik_skill_tests`
--
ALTER TABLE `anik_skill_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `anik_users`
--
ALTER TABLE `anik_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `f_contactsupport`
--
ALTER TABLE `f_contactsupport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_notifications`
--
ALTER TABLE `f_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_reviews`
--
ALTER TABLE `f_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_users`
--
ALTER TABLE `f_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `nowshin_about_us`
--
ALTER TABLE `nowshin_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nowshin_applications`
--
ALTER TABLE `nowshin_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nowshin_career_resources`
--
ALTER TABLE `nowshin_career_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nowshin_jobs`
--
ALTER TABLE `nowshin_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `nowshin_site_content`
--
ALTER TABLE `nowshin_site_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nowshin_users`
--
ALTER TABLE `nowshin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `shish_applications`
--
ALTER TABLE `shish_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shish_courses`
--
ALTER TABLE `shish_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `shish_course_applications`
--
ALTER TABLE `shish_course_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shish_jobs`
--
ALTER TABLE `shish_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `shish_notifications`
--
ALTER TABLE `shish_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `shish_salaries`
--
ALTER TABLE `shish_salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `shish_users`
--
ALTER TABLE `shish_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anik_applicants`
--
ALTER TABLE `anik_applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anik_applications`
--
ALTER TABLE `anik_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `anik_jobs`
--
ALTER TABLE `anik_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `anik_posts`
--
ALTER TABLE `anik_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anik_resumes`
--
ALTER TABLE `anik_resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `anik_saved_jobs`
--
ALTER TABLE `anik_saved_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `anik_skill_tests`
--
ALTER TABLE `anik_skill_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anik_users`
--
ALTER TABLE `anik_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `f_contactsupport`
--
ALTER TABLE `f_contactsupport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `f_notifications`
--
ALTER TABLE `f_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `f_reviews`
--
ALTER TABLE `f_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `f_users`
--
ALTER TABLE `f_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nowshin_about_us`
--
ALTER TABLE `nowshin_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nowshin_applications`
--
ALTER TABLE `nowshin_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nowshin_career_resources`
--
ALTER TABLE `nowshin_career_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nowshin_jobs`
--
ALTER TABLE `nowshin_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nowshin_site_content`
--
ALTER TABLE `nowshin_site_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nowshin_users`
--
ALTER TABLE `nowshin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shish_applications`
--
ALTER TABLE `shish_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shish_courses`
--
ALTER TABLE `shish_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shish_course_applications`
--
ALTER TABLE `shish_course_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shish_jobs`
--
ALTER TABLE `shish_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shish_notifications`
--
ALTER TABLE `shish_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shish_salaries`
--
ALTER TABLE `shish_salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shish_users`
--
ALTER TABLE `shish_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anik_resumes`
--
ALTER TABLE `anik_resumes`
  ADD CONSTRAINT `anik_resumes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `anik_users` (`id`);

--
-- Constraints for table `anik_skill_tests`
--
ALTER TABLE `anik_skill_tests`
  ADD CONSTRAINT `anik_skill_tests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `anik_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
