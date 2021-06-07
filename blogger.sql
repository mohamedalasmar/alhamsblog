-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 01:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogger`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `img` varchar(300) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `subject`, `img`, `details`, `created_at`, `user_id`, `category_id`) VALUES
(1, 'من نحن', '103149364_700355240766742_1071417862451007695_n.jpg', ' شركة الهمص للتكنولوجيا المعلومات والتدريب  تقدم منظومة متكاملة من الخدمات ويهتم بتنمية قدرات الشباب بوجه خاص, معتمدة من وزارة التربية والتعليم والعديد من الجهات الاخرى ، مجهز بكافة الوسائل التدريبية اللازمة وذلك لتنفيذ كافة الدورات المهنية والحرفية والتقنية والإدارية ودورات التنمية البشرية.', '09-13-2020 12:45:38 am', 1, 3),
(2, 'رسالتنا', '103149364_700355240766742_1071417862451007695_n.jpg', ' إعداد و تأهيل الكوادر البشرية لمواكبة التحديات و المتغيرات العالمية, لتدعيم المجتمع الفلسطيني ببنية فكرية قادرة على الإبداع و الابتكار والتميز في جميع المجالات و التكيف مع المتغيرات المجتمعية، والارتقاء بمستوى أبناءنا التعليمي بكافة المراحل الدراسية. ', '09-13-2020 12:46:02 am', 1, 3),
(3, 'استراتيجياتنا', '103149364_700355240766742_1071417862451007695_n.jpg', ' انطلاقا من إيماننا بأن تدويل صناعة التدريب هي مفتاح هذا الوطن و تطوره فإننا مستمرين بعمل شراكات مع مؤسسات محلية وعربية و دولية لإعداد أفضل المناهج و تطويرها أولا بأول, ومحاولة توفير الدعم المادي و المعنوي إن أمكن لكل متدرب حتى يتمكن من مواصلة الطريق.', '09-13-2020 12:46:35 am', 1, 3),
(4, '#ابدأ_عملك_بمهنة_مربحة', '113769259_3200679949985706_7620613216640186599_n.jpg', 'والتحق في #دورة_صيانة_اللابتوب_المعتمدة\r\nحيث يتم تزويد المتدربين بالمهارات العملية والنظرية والخبرات الأعلى جوده ليصبحوا فنيي صيانة محترفين وعلى أعلى مستوى في مجال صيانة اللاب توب.                           ', '09-13-2020 12:48:10 am', 1, 2),
(5, 'خبر عاجل', '118982433_3342696299117403_1950531723600817155_n.png', '                            في ظل الأزمة التي حلت بقطاعنا الحبيب، ندعو بالسلامة للجميع 🤲🤲\r\nومن باب الحرص على المسيرة التعليمية نؤكد لجميع الطلبة أننا نتيح لكم التسجيل لدينا، على أن تؤجل رسوم الالتحاق فيما بعد.\r\n\r\n#للتعرف_على_دبلوماتنا_المهنية                                                       ', '09-13-2020 12:49:07 am', 1, 2),
(6, 'تقديم الإختبار النهائي لطلاب', '115750019_3207039442683090_394678583808727199_n.jpg', 'يتم الآن تقديم الإختبار النهائي لطلاب\r\n#دبلومة\r\n#صيانة_الهواتف_الذكية (160)ساعة\r\nتحت إشراف وزارة التربية والتعليم.\r\n\r\n#مركز_الهمص_للتدريب.                                                                                                            ', '09-13-2020 12:51:51 am', 1, 2),
(7, 'إدارة وسائل التواصل الاجتماعي', '1.JPG', 'نحن في شركة الهمس نفهم عملك وعلامتك التجارية أولاً                 ', '09-13-2020 01:03:22 am', 1, 1),
(9, 'التطوير و التصميم', '3.JPG', 'الشركة من الشركات الرائدة في مجال تطوير البرمجيات\r\n                            ', '09-13-2020 01:06:57 am', 1, 1),
(10, 'التسويق عبر الإنترنت', '2.JPG', ' تقدم شركة الهمس خدمة التسويق عبر الإنترنت؛  أنها أنجح طريقة لضمان التسويق                          ', '09-13-2020 01:09:56 am', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `b_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'خبر'),
(1, 'خدمة'),
(3, 'من نحن');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(400) NOT NULL,
  `details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Samia', 'samia@gmail.com', '$2y$10$YgZpaitEgBMhOz7g5NiBduYh7G7qQFAiiBeNpGGfADKLAjp1xYWUi'),
(2, 'ayman', 'ayman@gmail.com', '$2y$10$YgZpaitEgBMhOz7g5NiBduYh7G7qQFAiiBeNpGGfADKLAjp1xYWUi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`b_id`,`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD CONSTRAINT `blog_tag_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `blogs` (`id`),
  ADD CONSTRAINT `blog_tag_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;