-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2017 年 04 月 02 日 10:15
-- 伺服器版本: 5.7.17-0ubuntu0.16.04.1
-- PHP 版本： 7.1.1-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `homestead`
--

-- --------------------------------------------------------

--
-- 資料表結構 `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(15, '茂榜廳', '2017-03-31 07:46:43', '2017-03-31 07:46:43'),
(16, 'SS101', '2017-03-31 07:46:43', '2017-03-31 07:46:43'),
(17, 'ST436', '2017-03-31 07:46:43', '2017-03-31 07:46:43'),
(18, 'LAN002', '2017-03-31 07:46:43', '2017-03-31 07:46:43'),
(19, 'C108', '2017-03-31 07:46:43', '2017-03-31 07:46:43'),
(20, '良鑑廳', '2017-03-31 07:46:43', '2017-03-31 07:46:43');

-- --------------------------------------------------------

--
-- 資料表結構 `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_base_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `professor` int(10) UNSIGNED NOT NULL,
  `classroom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `credit` int(10) UNSIGNED NOT NULL,
  `day` int(1) UNSIGNED NOT NULL,
  `enrollment_can` bit(1) NOT NULL DEFAULT b'1',
  `language` varchar(255) COLLATE utf8mb4_bin NOT NULL DEFAULT '中文',
  `mooc` double NOT NULL DEFAULT '0',
  `period` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `year` year(4) NOT NULL,
  `semester` int(1) NOT NULL,
  `enrollment_remain` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `enrollment_max` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 資料表的匯出資料 `courses`
--

INSERT INTO `courses` (`id`, `name`, `course_base_name`, `unit`, `professor`, `classroom`, `topic`, `credit`, `day`, `enrollment_can`, `language`, `mooc`, `period`, `year`, `semester`, `enrollment_remain`, `enrollment_max`, `created_at`, `updated_at`) VALUES
(4, '作業系統', '作業系統', '', 3, 'ST436', NULL, 0, 0, b'1', '中文', 0, '', 2016, 2, 0, 0, '2017-03-31 07:59:04', '2017-03-31 07:59:04');

-- --------------------------------------------------------

--
-- 資料表結構 `course_bases`
--

CREATE TABLE `course_bases` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 資料表的匯出資料 `course_bases`
--

INSERT INTO `course_bases` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, '離散數學', '2017-03-31 07:45:40', '2017-03-31 07:45:40'),
(9, '機率與統計', '2017-03-31 07:45:40', '2017-03-31 07:45:40'),
(10, '線性代數', '2017-03-31 07:45:40', '2017-03-31 07:45:40'),
(11, '計算機組織', '2017-03-31 07:45:40', '2017-03-31 07:45:40'),
(12, '演算法', '2017-03-31 07:45:40', '2017-03-31 07:45:40'),
(13, '生命與生活', '2017-03-31 07:45:40', '2017-03-31 07:45:40'),
(14, '作業系統', '2017-03-31 07:45:40', '2017-03-31 07:45:40'),
(15, '資料結構', '2017-03-31 07:45:40', '2017-03-31 07:45:40');

-- --------------------------------------------------------

--
-- 資料表結構 `course_credits`
--

CREATE TABLE `course_credits` (
  `id` int(10) UNSIGNED NOT NULL,
  `credit` int(2) UNSIGNED NOT NULL,
  `course_name` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 資料表的匯出資料 `course_credits`
--

INSERT INTO `course_credits` (`id`, `credit`, `course_name`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2017-03-31 08:21:42', '2017-03-31 08:21:42');

-- --------------------------------------------------------

--
-- 資料表結構 `course_days`
--

CREATE TABLE `course_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` int(1) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `id` int(10) UNSIGNED NOT NULL,
  `remaining_enroll` int(10) UNSIGNED NOT NULL,
  `max_enroll` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `course_languages`
--

CREATE TABLE `course_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `course_moocs`
--

CREATE TABLE `course_moocs` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_mooc` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `course_owners`
--

CREATE TABLE `course_owners` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `course_periods`
--

CREATE TABLE `course_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `period` int(3) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `course_professors`
--

CREATE TABLE `course_professors` (
  `id` int(10) UNSIGNED NOT NULL,
  `professor_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `course_types`
--

CREATE TABLE `course_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `his_apply_courses`
--

CREATE TABLE `his_apply_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `professor_name` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `his_take_courses`
--

CREATE TABLE `his_take_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `prerequisites`
--

CREATE TABLE `prerequisites` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `pre_course_base_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `professors`
--

CREATE TABLE `professors` (
  `id` int(10) UNSIGNED NOT NULL,
  `series` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `special_enrolls`
--

CREATE TABLE `special_enrolls` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `state` bit(1) NOT NULL DEFAULT b'0',
  `reason` varchar(225) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `series` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `year` year(4) NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `syllabuses`
--

CREATE TABLE `syllabuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `w1` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w2` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w3` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w4` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w5` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w6` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w7` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w8` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w9` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w10` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w11` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w12` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w13` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w14` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w15` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w16` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w17` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `w18` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `thresholds`
--

CREATE TABLE `thresholds` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_year` year(4) NOT NULL,
  `default_grade` int(2) UNSIGNED NOT NULL,
  `default_semester` int(1) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `subjection` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 資料表的匯出資料 `units`
--

INSERT INTO `units` (`id`, `name`, `subjection`, `created_at`, `updated_at`) VALUES
(7, '學校', '學校', '2017-03-31 07:29:09', '2017-03-31 07:29:09'),
(8, '工學院', '學校', '2017-03-31 07:30:25', '2017-03-31 07:30:25'),
(9, '資工系', '工學院', '2017-03-31 07:30:25', '2017-03-31 07:30:25'),
(10, '文學院', '學校', '2017-03-31 07:30:25', '2017-03-31 07:30:25'),
(11, '中文系', '文學院', '2017-03-31 07:30:25', '2017-03-31 07:30:25'),
(12, '歷史系', '文學院', '2017-03-31 07:30:25', '2017-03-31 07:30:25');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chang', 'chang@thu.edu.tw', '$2y$10$8vnJkve1mH7yehyk.txwJuLQbJOBtHP9Boem1HYY.Jpbz4o/uKeB6', 'student', 'FYKaqoUPJROqEiTVtx25L6hDCJ1AR4S9upb02IiQZpR8TiAdzaAkqPGyYYkG', '2017-04-02 00:02:22', '2017-04-02 00:02:22'),
(2, 'tsai', 'tsai@thu.edu.tw', '$2y$10$8mFhp3z5nscWqC6BoBLG3O2q8Ib4zZbjh0yyJ/5amxWhUIZF4PWg6', 'professor', 'L55aJm5sTiTqyNQclaQDKPAI6lyo6t4aywuWkiEDOj1OxBmjHUcCDKfCcbiq', '2017-04-02 01:13:05', '2017-04-02 01:13:05'),
(3, 'admin', 'admin@thu.edu.tw', '$2y$10$E8ZMAWw3K8JMvswuoygtL.xXqhHpWD9iYnXTVmR3Ox8clPcGaxkKq', 'authority', 'tE8ntkAgvrUoLoh49GWWLLNvSCz3ab2HXrrm03Yf7CcKB4tUeZRQC4Xo42eq', '2017-04-02 01:19:24', '2017-04-02 01:19:24');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- 資料表索引 `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_base_name` (`course_base_name`),
  ADD KEY `classroom` (`classroom`),
  ADD KEY `professor` (`professor`),
  ADD KEY `credit` (`credit`),
  ADD KEY `day` (`day`),
  ADD KEY `language` (`language`),
  ADD KEY `mooc` (`mooc`),
  ADD KEY `enrollment_can` (`enrollment_can`);

--
-- 資料表索引 `course_bases`
--
ALTER TABLE `course_bases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- 資料表索引 `course_credits`
--
ALTER TABLE `course_credits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_name` (`course_name`);

--
-- 資料表索引 `course_days`
--
ALTER TABLE `course_days`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course_languages`
--
ALTER TABLE `course_languages`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course_moocs`
--
ALTER TABLE `course_moocs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course_owners`
--
ALTER TABLE `course_owners`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course_periods`
--
ALTER TABLE `course_periods`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course_professors`
--
ALTER TABLE `course_professors`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `course_types`
--
ALTER TABLE `course_types`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `his_apply_courses`
--
ALTER TABLE `his_apply_courses`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `his_take_courses`
--
ALTER TABLE `his_take_courses`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `prerequisites`
--
ALTER TABLE `prerequisites`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `series` (`series`),
  ADD KEY `unit_name` (`unit_name`),
  ADD KEY `name` (`name`);

--
-- 資料表索引 `special_enrolls`
--
ALTER TABLE `special_enrolls`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `series` (`series`),
  ADD KEY `unit_name` (`unit_name`);

--
-- 資料表索引 `syllabuses`
--
ALTER TABLE `syllabuses`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `thresholds`
--
ALTER TABLE `thresholds`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `subjection` (`subjection`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用資料表 AUTO_INCREMENT `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `course_bases`
--
ALTER TABLE `course_bases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用資料表 AUTO_INCREMENT `course_credits`
--
ALTER TABLE `course_credits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `course_days`
--
ALTER TABLE `course_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `course_languages`
--
ALTER TABLE `course_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `course_moocs`
--
ALTER TABLE `course_moocs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `course_owners`
--
ALTER TABLE `course_owners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `course_periods`
--
ALTER TABLE `course_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `course_professors`
--
ALTER TABLE `course_professors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `course_types`
--
ALTER TABLE `course_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `his_apply_courses`
--
ALTER TABLE `his_apply_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `his_take_courses`
--
ALTER TABLE `his_take_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `prerequisites`
--
ALTER TABLE `prerequisites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `special_enrolls`
--
ALTER TABLE `special_enrolls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `syllabuses`
--
ALTER TABLE `syllabuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `thresholds`
--
ALTER TABLE `thresholds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`course_base_name`) REFERENCES `course_bases` (`name`);

--
-- 資料表的 Constraints `course_credits`
--
ALTER TABLE `course_credits`
  ADD CONSTRAINT `course_credits_ibfk_1` FOREIGN KEY (`course_name`) REFERENCES `courses` (`id`);

--
-- 資料表的 Constraints `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `professors_ibfk_1` FOREIGN KEY (`unit_name`) REFERENCES `units` (`name`),
  ADD CONSTRAINT `professors_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- 資料表的 Constraints `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`unit_name`) REFERENCES `units` (`name`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- 資料表的 Constraints `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`subjection`) REFERENCES `units` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
