/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.24-MariaDB : Database - online_blogging_application
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`online_blogging_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `online_blogging_application`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blog_title` text DEFAULT NULL,
  `post_per_page` int(11) DEFAULT NULL,
  `blog_background_image` text DEFAULT NULL,
  `blog_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `blog` */

insert  into `blog`(`blog_id`,`user_id`,`blog_title`,`post_per_page`,`blog_background_image`,`blog_status`,`created_at`,`updated_at`) values 
(17,9,'php laravel',2,'laravel.png','Active','2022-05-24 12:15:15','2022-05-24 12:15:15'),
(18,9,'python',2,'blog1.jpg','Active','2022-05-24 00:19:22','2022-05-24 12:15:48'),
(19,9,'java',2,'safeer.jpg','Active','2022-05-24 12:19:32','2022-05-24 12:19:32');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `category_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_title`,`category_description`,`category_status`,`created_at`,`updated_at`) values 
(3,'web development','this is my first category added','Active','2022-05-22 02:58:14','2022-05-21 11:58:14'),
(4,'web development','this is my first category added','Active','2022-05-22 21:58:20','2022-05-21 11:58:41'),
(5,'web development','this is my first category added','Active','2022-05-22 23:11:32','2022-05-22 12:00:07'),
(31,'khalil','Developer','Active','2022-05-22 23:11:31','2022-05-22 08:11:05');

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_summary` text NOT NULL,
  `post_description` longtext NOT NULL,
  `featured_image` text DEFAULT NULL,
  `post_status` enum('Active','InActive') DEFAULT NULL,
  `is_comment_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post` */

insert  into `post`(`post_id`,`blog_id`,`post_title`,`post_summary`,`post_description`,`featured_image`,`post_status`,`is_comment_allowed`,`created_at`,`updated_at`) values 
(14,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','InActive',1,'2022-05-24 02:11:25','2022-05-20 09:14:44'),
(15,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-21 16:55:34','2022-05-20 09:16:45'),
(16,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-21 16:56:20','2022-05-20 09:17:45'),
(17,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','InActive',1,'2022-05-21 16:36:12','2022-05-20 09:18:05'),
(18,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-21 16:56:30','2022-05-20 09:18:41'),
(19,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-21 16:48:56','2022-05-20 09:18:53'),
(20,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-21 16:56:25','2022-05-20 09:20:04'),
(21,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-23 22:43:33','2022-05-20 09:20:23'),
(23,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-22 22:00:55','2022-05-20 09:21:03'),
(25,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-22 22:00:54','2022-05-20 10:11:33'),
(26,NULL,'PHP The Right Way','PHP The Right Way','PHP The Right Way is a collection of authoritative tutorials that introduce novice PHP developers to the language’s best practices. Articles are short but contain precisely the required knowledge with relevant details and no more; think Hemingway for PHP. The blog’s posts are polished without error and serve as references within references for the interested reader.\r\nO’Dell is a Director of Technology and has held leadership positions at different software companies. His self-named blog, dating back to 2009, is a collection of findings explored in his programming journey. There isn’t a vast archive of content, but it is also available in written and A/V formats and print. While most posts are relatively short, they are informative and should be useful to PHP devs. Colin’s longer-form articles allow his technical prowess to glimmer, and his posts are well-formulated with excellent command of language and grammar. While some reference links are included, Colin’s articles tend to lean on screenshots and code snippets. The blog is published every couple of months without a consistent schedule.','laravel2.jpg','Active',1,'2022-05-22 22:00:53','2022-05-20 10:13:01'),
(29,NULL,'title','summary','description','safeer.jpg','Active',1,'2022-05-22 23:39:28','2022-05-22 11:39:28'),
(30,NULL,'asdfasdf','asdfasdf','dasdfasdf','profile.jpg','Active',1,'2022-05-22 23:44:32','2022-05-22 11:44:32'),
(31,17,'oooooooooo','oooooooooo','loooooooooo','blog1.jpg','Active',1,'2022-05-24 03:03:33','2022-05-22 11:44:54');

/*Table structure for table `post_atachment` */

DROP TABLE IF EXISTS `post_atachment`;

CREATE TABLE `post_atachment` (
  `post_atachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `post_attachment_title` varchar(200) DEFAULT NULL,
  `post_attachment_path` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_atachment_id`),
  KEY `fk1` (`post_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `post_atachment` */

/*Table structure for table `post_category` */

DROP TABLE IF EXISTS `post_category`;

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_category_id`),
  KEY `post_id` (`post_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post_category` */

insert  into `post_category`(`post_category_id`,`post_id`,`category_id`,`created_at`,`updated_at`) values 
(1,14,3,'2022-05-23 00:55:57','2022-05-23 00:55:54'),
(2,15,4,'2022-05-23 00:56:00','2022-05-23 00:55:58'),
(3,16,5,'2022-05-23 00:56:23','2022-05-23 00:56:01'),
(4,17,5,'2022-05-23 02:05:11','2022-05-23 02:05:13');

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(50) NOT NULL,
  `is_active` enum('Active','InActive') DEFAULT 'Active',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role_type`,`is_active`) values 
(1,'admin','Active'),
(2,'user','Active');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `setting_key` varchar(100) DEFAULT NULL,
  `setting_value` varchar(100) DEFAULT NULL,
  `setting_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `setting` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_approved` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`user_id`,`role_id`,`first_name`,`last_name`,`email`,`password`,`gender`,`date_of_birth`,`user_image`,`address`,`is_approved`,`is_active`,`created_at`,`updated_at`) values 
(8,2,'jawad','Hyderabad sindh Pakistan','ahmedjawad@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2222-02-22','safeer.jpg','Hyderabad sindh Pakistan','Approved','Active','2022-05-24 04:16:47','2022-05-22 07:09:36'),
(9,1,'khalil','ahmed','panhwarahmed@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2222-02-22','profile.jpg','Hyderabad sindh Pakistan','Approved','Active','2022-05-23 23:01:12','2022-05-22 08:14:20'),
(10,2,'saad ali','ahmed','saad@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2222-02-23','','hyderabad sindh pakistan','Approved','Active','2022-05-19 13:22:38','2022-05-19 10:22:38'),
(11,2,'sameer','memon','sameer@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2222-02-22','jacky-chiu-_kf2Z44k7Ng-unsplash.jpg','hyderabad sindh pakistan','Approved','InActive','2022-05-21 01:02:11','2022-05-19 10:27:13'),
(12,2,'ali','khan','alikhan@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2222-02-22','altumcode-PNbDkQ2DDgM-unsplash.jpg','sehwan sindh pakistan','Pending','InActive','2022-05-19 10:48:52','2022-05-19 10:48:52'),
(13,2,'jameel','ahmed','jameel@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2222-02-22','valery-sysoev-LDAirERNzew-unsplash.jpg','hyderabad sindh pakistan','Pending','InActive','2022-05-20 12:56:07','2022-05-20 12:56:07'),
(14,2,'sadam','ahmd','sadam@gmail.com','12acd97a4e9f587fc2f0de2108b158c3','Male','3333-02-23','','hyderabad sindh pakistan','Pending','InActive','2022-05-20 12:57:59','2022-05-20 12:57:59'),
(15,2,'KHALIL','AHMED','khalil@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2222-02-22','','hyderabad sindh pakistan','Approved','InActive','2022-05-21 18:14:05','2022-05-20 12:58:47'),
(16,2,'asdfasdf','asdfasdf','adsf@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','1222-02-12','','asdfasdfasdfasdfasdfasdf','Pending','InActive','2022-05-20 01:00:22','2022-05-20 01:00:22'),
(17,2,'khalil','ahmed','khalilahmed@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2222-02-22','','Hyderabad asdfadfasdf','Pending','InActive','2022-05-20 01:01:24','2022-05-20 01:01:24'),
(18,2,'asdfasdf','asdfasdf','asdf@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','0000-00-00','','asdfasdfasdfasdfasdf','Pending','InActive','2022-05-20 01:03:46','2022-05-20 01:03:46'),
(19,2,'asdfasdf','asdfasdf','asdaasdff@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','0000-00-00','','asdfasdfasdfasdfsdfasdf','Pending','InActive','2022-05-20 01:04:39','2022-05-20 01:04:39'),
(20,2,'awais','raza','awais@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2321-12-31','','asdfasdfasdfasdfasdf','Pending','InActive','2022-05-20 01:06:42','2022-05-20 01:06:42'),
(21,2,'awais','ahmed','awaisjhatoo@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2211-12-12','profile5.jpg','hyderabad sindh pakistan','Approved','Active','2022-05-22 20:28:41','2022-05-22 08:28:18'),
(22,2,'po','op','opi909@gamial.com','827ccb0eea8a706c4c34a16891f84e7b','Male','2010-02-17','IMG_20210810_235157.jpg','Hyderabad','Approved','Active','2022-05-23 14:18:05','2022-05-23 02:16:29'),
(23,2,'abdul','samad','samad@gmail.com','33d403e86a266347fe3d264951eb0720','Male','2022-05-24','IMG_20210810_235157.jpg','hyderabad','Pending','Active','2022-05-23 02:25:33','2022-05-23 02:25:33'),
(32,2,'safeer','ahmed','safeer@gmail.com','912ec803b2ce49e4a541068d495ab570','Male','2000-12-12','IMG_20210810_235157.jpg','hyderabad sindh pakistan','Approved','Active','2022-05-23 21:58:40','2022-05-23 09:20:27'),
(47,2,'khalil','ahmed','panhwarkhalilahmed@gmail.com','912ec803b2ce49e4a541068d495ab570','Male','2222-12-12','IMG_20210810_235157.jpg','Hyderabad','Approved','InActive','2022-05-23 23:14:11','2022-05-23 10:30:41'),
(48,2,'faheem','Hyderabad','faheem@gmail.com','912ec803b2ce49e4a541068d495ab570','Male','1212-12-12','IMG_20210810_235157.jpg','Hyderabad','Pending','Active','2022-05-24 04:13:30','2022-05-23 11:18:16'),
(49,2,'fareed','fareed','fareed@gmail.com','912ec803b2ce49e4a541068d495ab570','Male','1212-01-31','IMG_20210810_235157.jpg','asdfasdfasdfasd','Pending','Active','2022-05-23 11:27:55','2022-05-23 11:27:55'),
(50,1,'sssss','fff','asdawasdf@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Female','2022-05-25','sIMG_20210810_235157.jpg','sasdfasdfasdfasdfasdfasdfsdf','Pending','Active','2022-05-24 04:00:59','2022-05-23 11:37:03');

/*Table structure for table `user_blog_following` */

DROP TABLE IF EXISTS `user_blog_following`;

CREATE TABLE `user_blog_following` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) DEFAULT NULL,
  `blog_following_id` int(11) DEFAULT NULL,
  `status` enum('Followed','Unfollowed') DEFAULT 'Followed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `blog_following_id` (`blog_following_id`),
  KEY `follower_id` (`follower_id`),
  CONSTRAINT `user_blog_following_ibfk_1` FOREIGN KEY (`blog_following_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_blog_following_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_blog_following` */

/*Table structure for table `user_feedback` */

DROP TABLE IF EXISTS `user_feedback`;

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_feedback` */

/*Table structure for table `user_post_comment` */

DROP TABLE IF EXISTS `user_post_comment`;

CREATE TABLE `user_post_comment` (
  `post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `user_post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_post_comment` */

insert  into `user_post_comment`(`post_comment_id`,`post_id`,`user_id`,`comment`,`is_active`,`created_at`) values 
(10,16,9,'this is my first comment\r\n','Active','2022-05-21 10:00:59'),
(11,20,9,'asdfasdfasdf','Active','2022-05-22 05:36:51'),
(12,26,8,'this is my first commment','InActive','2022-05-22 22:24:46'),
(13,31,9,'asldkfasdf','Active','2022-05-23 01:47:45'),
(14,31,9,'this is not approed comment','Active','2022-05-23 01:48:26'),
(15,31,9,'this is inActive Comment','InActive','2022-05-23 01:48:56'),
(16,31,9,'ths is 4th comment','InActive','2022-05-23 01:49:36'),
(17,31,9,'this is commetn tried','Active','2022-05-23 01:52:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
