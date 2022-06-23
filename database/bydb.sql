/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.22-MariaDB : Database - 17758_khalil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`17758_khalil_ahmed` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `17758_khalil_ahmed`;

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `blog` */

insert  into `blog`(`blog_id`,`user_id`,`blog_title`,`post_per_page`,`blog_background_image`,`blog_status`,`created_at`,`updated_at`) values 
(24,52,'python programming',6,'new.jpg','Active','2022-05-24 05:12:25','2022-05-24 05:12:28');

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_title`,`category_description`,`category_status`,`created_at`,`updated_at`) values 
(32,'python programming','this is python programming','Active','2022-05-24 05:19:51','2022-05-24 05:19:53'),
(33,'Vue.js','What is Vue.js?','Active','2022-05-24 05:45:44','2022-05-24 02:45:44'),
(34,'php','php','Active','2022-05-24 05:48:09','2022-05-24 02:48:09'),
(35,'React','React','Active','2022-05-24 05:48:53','2022-05-24 02:48:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post` */

insert  into `post`(`post_id`,`blog_id`,`post_title`,`post_summary`,`post_description`,`featured_image`,`post_status`,`is_comment_allowed`,`created_at`,`updated_at`) values 
(32,NULL,'python','Python? Perhaps you’re already familiar with the language, but want to dig deeper to find out just how far this rabbit hole goes.','Whether you’re a developer with some knowledge of programming or are just now dipping your toes in these waters, you’ve made the right choice. Python is an easy-to-grasp language that is, at the same time, versatile enough for you to do some interesting things with.\r\n\r\nStill, the decision to learn how to use Python effectively is only the first step on this thrilling journey. Once that’s out of the way, it’s time to educate yourself.\r\n\r\nIt doesn’t matter whether you’re looking for basic tutorials or news on all the latest developments, you’ll need some quality sources to keep you posted on all things Python.\r\n\r\nTo make things extra easy for you, we’ve compiled a list of 10 reliable Python blogs—it’s as good a place to start as any!\r\nPlanet Python is probably one of the first sources you’ll ever consult for all your Python needs. The reason for this is quite simple—it’s immensely comprehensive.\r\n\r\nWith several posts a day on average, Planet Python’s incredible range is owed to the fact that it brings together recent Python-related posts from various other blogs. All the sources are reputable and the posts themselves have been carefully selected as well, resulting in a blog that gets you a good range of news and tutorials all across the board.\r\nNotable post\r\nWith a blog as diverse as Planet Python, selecting one post that will serve as an example of the site’s versatility is quite challenging, but if we were to choose a recent example, there’s ListenData’s Pandas Python Tutorial. It’s a good indication of how in-depth the tutorials linked on this blog can go.','hitesh-choudhary-D9Zow2REm8U-unsplash.jpg','Active',1,'2022-05-24 04:40:03','2022-05-24 04:40:03'),
(34,NULL,'python programming','4. Doug Hellmann—run by a prominent Python blogger With the Python Software Foundation blog, you’ll be on top of all the updates as they happen','Run by the creator of Python Module of the Week, this blog acts as more of a database for the many Python libraries available. Though the posts don’t come regularly, they’re always very robust rundowns of what can be found in the latest updates.\r\n\r\nOccasionally, you’ll be treated to longer posts written by Doug, which act more as an assortment of think pieces and guides related to Python.\r\nRun by the creator of Python Module of the Week, this blog acts as more of a database for the many Python libraries available. Though the posts don’t come regularly, they’re always very robust rundowns of what can be found in the latest updates.\r\n\r\nOccasionally, you’ll be treated to longer posts written by Doug, which act more as an assortment of think pieces and guides related to Python.\r\nRun by the creator of Python Module of the Week, this blog acts as more of a database for the many Python libraries available. Though the posts don’t come regularly, they’re always very robust rundowns of what can be found in the latest updates.\r\n\r\nOccasionally, you’ll be treated to longer posts written by Doug, which act more as an assortment of think pieces and guides related to Python.\r\nRun by the creator of Python Module of the Week, this blog acts as more of a database for the many Python libraries available. Though the posts don’t come regularly, they’re always very robust rundowns of what can be found in the latest updates.\r\n\r\nOccasionally, you’ll be treated to longer posts written by Doug, which act more as an assortment of think pieces and guides related to Python.','emile-perron-xrVDYZRGdw4-unsplash.jpg','Active',1,'2022-05-24 09:29:07','2022-05-24 04:43:20'),
(37,24,'8. Python Software Foundation—fresh ','Of course, if you really want to know exactly what is going on in the world of Python, your best bet is to start looking at the source.','Finxter is a blog with a wide variety of Python-related guides that is geared a bit more to the hot, hip, and trendy crowd. The guides are all quite bite-sized, but they give you very practical tips that are very easy to take in thanks to the format.\r\n\r\nNotable post\r\nAs an example of a very specific guide from the blog, here’s a detailed yet simple explanation of Python Endswith that is bound to leave you with some good, practical knowledge.\r\nFinxter is a blog with a wide variety of Python-related guides that is geared a bit more to the hot, hip, and trendy crowd. The guides are all quite bite-sized, but they give you very practical tips that are very easy to take in thanks to the format.\r\n\r\nNotable post\r\nAs an example of a very specific guide from the blog, here’s a detailed yet simple explanation of Python Endswith that is bound to leave you with some good, practical knowledge.\r\nFinxter is a blog with a wide variety of Python-related guides that is geared a bit more to the hot, hip, and trendy crowd. The guides are all quite bite-sized, but they give you very practical tips that are very easy to take in thanks to the format.\r\n\r\nNotable post\r\nAs an example of a very specific guide from the blog, here’s a detailed yet simple explanation of Python Endswith that is bound to leave you with some good, practical knowledge.\r\nFinxter is a blog with a wide variety of Python-related guides that is geared a bit more to the hot, hip, and trendy crowd. The guides are all quite bite-sized, but they give you very practical tips that are very easy to take in thanks to the format.\r\n\r\nNotable post\r\nAs an example of a very specific guide from the blog, here’s a detailed yet simple explanation of Python Endswith that is bound to leave you with some good, practical knowledge.Finxter is a blog with a wide variety of Python-related guides that is geared a bit more to the hot, hip, and trendy crowd. The guides are all quite bite-sized, but they give you very practical tips that are very easy to take in thanks to the format.\r\n\r\nNotable post\r\nAs an example of a very specific guide from the blog, here’s a detailed yet simple explanation of Python Endswith that is bound to leave you with some good, practical knowledge.Finxter is a blog with a wide variety of Python-related guides that is geared a bit more to the hot, hip, and trendy crowd. The guides are all quite bite-sized, but they give you very practical tips that are very easy to take in thanks to the format.\r\n\r\nNotable post\r\nAs an example of a very specific guide from the blog, here’s a detailed yet simple explanation of Python Endswith that is bound to leave you with some good, practical knowledge.','faisal-BI465ksrlWs-unsplash.jpg','Active',1,'2022-05-24 09:28:48','2022-05-24 05:17:25'),
(45,24,'What is Vue.js?','Evan You created Vue.js in 2014 after working for Google using AngularJS in several projects. His idea was to take the parts that he really liked about Angular,','There are two aspects that make Vue stand out: its two-way binding and the use of a virtual DOM. Having said that, what really makes Vue such a great solution is its progressive design, meaning you can move specific features of existing projects into Vue gradually. This gives you an advantage if you’ve already got something to work with and want to just give it a boost by switching to a new platform painlessly.\r\n\r\nAt first, Vue was only accessible in China, but it soon gained global recognition, and is now considered one of the best JavaScript frameworks, perfectly suited for SPAs, UIs, and various frontend applications. Current estimates say that over 1.5 million websites around the globe use Vue.\r\n\r\nAs such, it comes as no surprise that many giants like Nintendo, Grammarly, GitLab, Behance, and BuzzFeed use it in their custom software product development.There are two aspects that make Vue stand out: its two-way binding and the use of a virtual DOM. Having said that, what really makes Vue such a great solution is its progressive design, meaning you can move specific features of existing projects into Vue gradually. This gives you an advantage if you’ve already got something to work with and want to just give it a boost by switching to a new platform painlessly.\r\n\r\nAt first, Vue was only accessible in China, but it soon gained global recognition, and is now considered one of the best JavaScript frameworks, perfectly suited for SPAs, UIs, and various frontend applications. Current estimates say that over 1.5 million websites around the globe use Vue.\r\n\r\nAs such, it comes as no surprise that many giants like Nintendo, Grammarly, GitLab, Behance, and BuzzFeed use it in their custom software product development.There are two aspects that make Vue stand out: its two-way binding and the use of a virtual DOM. Having said that, what really makes Vue such a great solution is its progressive design, meaning you can move specific features of existing projects into Vue gradually. This gives you an advantage if you’ve already got something to work with and want to just give it a boost by switching to a new platform painlessly.\r\n\r\nAt first, Vue was only accessible in China, but it soon gained global recognition, and is now considered one of the best JavaScript frameworks, perfectly suited for SPAs, UIs, and various frontend applications. Current estimates say that over 1.5 million websites around the globe use Vue.\r\n\r\nAs such, it comes as no surprise that many giants like Nintendo, Grammarly, GitLab, Behance, and BuzzFeed use it in their custom software product development.There are two aspects that make Vue stand out: its two-way binding and the use of a virtual DOM. Having said that, what really makes Vue such a great solution is its progressive design, meaning you can move specific features of existing projects into Vue gradually. This gives you an advantage if you’ve already got something to work with and want to just give it a boost by switching to a new platform painlessly.\r\n\r\nAt first, Vue was only accessible in China, but it soon gained global recognition, and is now considered one of the best JavaScript frameworks, perfectly suited for SPAs, UIs, and various frontend applications. Current estimates say that over 1.5 million websites around the globe use Vue.\r\n\r\nAs such, it comes as no surprise that many giants like Nintendo, Grammarly, GitLab, Behance, and BuzzFeed use it in their custom software product development.','dean-pugh-C8NDn4xk9zs-unsplash.jpg','Active',1,'2022-05-24 05:46:59','2022-05-24 02:46:59'),
(47,24,'What is React?','Jordan Walke designed React in 2013 when he was working for Meta (formerly Facebook) and it is now being maintained by a community of individual developers and companies.','Jordan Walke designed React in 2013 when he was working for Meta (formerly Facebook) and it is now being maintained by a community of individual developers and companies.\r\n\r\nLike Vue, React is an open-source technology that is often used for creating SPAs and mobile apps. If a website has any interactive elements or a specific UI, chances are React was involved somewhere along the way.\r\n\r\nReact is consistently voted as one of the most loved JavaScript libraries, coming in at a very close second position in 2020 according to the most recent survey done by StackOverflow. In a time where speed is everything, React allows websites to be built quickly and efficiently, offering tremendous support in terms of SEO.\r\n\r\nPopular websites using React include Meta (Facebook) as well as Netflix, Twitter, and PayPal, so statistically speaking, it’s unlikely that you haven’t used a website made with React.Jordan Walke designed React in 2013 when he was working for Meta (formerly Facebook) and it is now being maintained by a community of individual developers and companies.\r\n\r\nLike Vue, React is an open-source technology that is often used for creating SPAs and mobile apps. If a website has any interactive elements or a specific UI, chances are React was involved somewhere along the way.\r\n\r\nReact is consistently voted as one of the most loved JavaScript libraries, coming in at a very close second position in 2020 according to the most recent survey done by StackOverflow. In a time where speed is everything, React allows websites to be built quickly and efficiently, offering tremendous support in terms of SEO.\r\n\r\nPopular websites using React include Meta (Facebook) as well as Netflix, Twitter, and PayPal, so statistically speaking, it’s unlikely that you haven’t used a website made with React.Jordan Walke designed React in 2013 when he was working for Meta (formerly Facebook) and it is now being maintained by a community of individual developers and companies.\r\n\r\nLike Vue, React is an open-source technology that is often used for creating SPAs and mobile apps. If a website has any interactive elements or a specific UI, chances are React was involved somewhere along the way.\r\n\r\nReact is consistently voted as one of the most loved JavaScript libraries, coming in at a very close second position in 2020 according to the most recent survey done by StackOverflow. In a time where speed is everything, React allows websites to be built quickly and efficiently, offering tremendous support in terms of SEO.\r\n\r\nPopular websites using React include Meta (Facebook) as well as Netflix, Twitter, and PayPal, so statistically speaking, it’s unlikely that you haven’t used a website made with React.Jordan Walke designed React in 2013 when he was working for Meta (formerly Facebook) and it is now being maintained by a community of individual developers and companies.\r\n\r\nLike Vue, React is an open-source technology that is often used for creating SPAs and mobile apps. If a website has any interactive elements or a specific UI, chances are React was involved somewhere along the way.\r\n\r\nReact is consistently voted as one of the most loved JavaScript libraries, coming in at a very close second position in 2020 according to the most recent survey done by StackOverflow. In a time where speed is everything, React allows websites to be built quickly and efficiently, offering tremendous support in terms of SEO.\r\n\r\nPopular websites using React include Meta (Facebook) as well as Netflix, Twitter, and PayPal, so statistically speaking, it’s unlikely that you haven’t used a website made with React.Jordan Walke designed React in 2013 when he was working for Meta (formerly Facebook) and it is now being maintained by a community of individual developers and companies.\r\n\r\nLike Vue, React is an open-source technology that is often used for creating SPAs and mobile apps. If a website has any interactive elements or a specific UI, chances are React was involved somewhere along the way.\r\n\r\nReact is consistently voted as one of the most loved JavaScript libraries, coming in at a very close second position in 2020 according to the most recent survey done by StackOverflow. In a time where speed is everything, React allows websites to be built quickly and efficiently, offering tremendous support in terms of SEO.\r\n\r\nPopular websites using React include Meta (Facebook) as well as Netflix, Twitter, and PayPal, so statistically speaking, it’s unlikely that you haven’t used a website made with React.','danial-igdery-FCHlYvR5gJI-unsplash.jpg','Active',1,'2022-05-24 05:50:18','2022-05-24 02:50:18'),
(48,24,'Why use React or Vue.js?','We’ve already covered the general descriptions of both technologies, so now let’s take a quick look at some of the key differences between those two JavaScript frameworks.','here are slight differences in the coding style between Vue and React. The former separates CSS, HTML, and JavaScript from one another. The components have life cycles, but overall those are much more intuitive than in React.\r\n\r\nReact, on the other hand, relies mostly on JSX, which entails adding HTML code to the JavaScript code. Everything gets the component treatment, so every little element has a life cycle of its own.\r\n\r\nDocumentation of React and Vue.js\r\nThe documentation aspect of Vue—an important element of any project—has always been praised. Compared to many other JavaScript frameworks, Vue has everything documented in an excellent way, explaining each part in minute detail. With great documentation in hand, implementing Vue.js into a project becomes really easy.\r\n\r\nAt the same time, React used to be quite heavily criticized for the unclear documentation it came with. Luckily, the creators took great measures to improve this aspect. Now, the documentation of React works much better and further updates are constantly being implemented to make things as easy as possible for its users.\r\n\r\nDesktop and mobile development with Vue.js and React\r\nBoth frameworks are mostly designed for creating desktop apps, but there are means of using them for mobile development. Vue utilizes Weex and NativeScript-Vue for this purpose, while React has its mobile equivalent in React Native.here are slight differences in the coding style between Vue and React. The former separates CSS, HTML, and JavaScript from one another. The components have life cycles, but overall those are much more intuitive than in React.\r\n\r\nReact, on the other hand, relies mostly on JSX, which entails adding HTML code to the JavaScript code. Everything gets the component treatment, so every little element has a life cycle of its own.\r\n\r\nDocumentation of React and Vue.js\r\nThe documentation aspect of Vue—an important element of any project—has always been praised. Compared to many other JavaScript frameworks, Vue has everything documented in an excellent way, explaining each part in minute detail. With great documentation in hand, implementing Vue.js into a project becomes really easy.\r\n\r\nAt the same time, React used to be quite heavily criticized for the unclear documentation it came with. Luckily, the creators took great measures to improve this aspect. Now, the documentation of React works much better and further updates are constantly being implemented to make things as easy as possible for its users.\r\n\r\nDesktop and mobile development with Vue.js and React\r\nBoth frameworks are mostly designed for creating desktop apps, but there are means of using them for mobile development. Vue utilizes Weex and NativeScript-Vue for this purpose, while React has its mobile equivalent in React Native.here are slight differences in the coding style between Vue and React. The former separates CSS, HTML, and JavaScript from one another. The components have life cycles, but overall those are much more intuitive than in React.\r\n\r\nReact, on the other hand, relies mostly on JSX, which entails adding HTML code to the JavaScript code. Everything gets the component treatment, so every little element has a life cycle of its own.\r\n\r\nDocumentation of React and Vue.js\r\nThe documentation aspect of Vue—an important element of any project—has always been praised. Compared to many other JavaScript frameworks, Vue has everything documented in an excellent way, explaining each part in minute detail. With great documentation in hand, implementing Vue.js into a project becomes really easy.\r\n\r\nAt the same time, React used to be quite heavily criticized for the unclear documentation it came with. Luckily, the creators took great measures to improve this aspect. Now, the documentation of React works much better and further updates are constantly being implemented to make things as easy as possible for its users.\r\n\r\nDesktop and mobile development with Vue.js and React\r\nBoth frameworks are mostly designed for creating desktop apps, but there are means of using them for mobile development. Vue utilizes Weex and NativeScript-Vue for this purpose, while React has its mobile equivalent in React Native.','caspar-camille-rubin-89xuP-XmyrA-unsplash.jpg','Active',1,'2022-05-24 09:27:14','2022-05-24 02:51:39'),
(51,24,'Popularity of React and Vue.js','Popularity of the framework really matters—the more people know of it, the more you can be sure there are other people out there who know aspects of it ','Popularity of the framework really matters—the more people know of it, the more you can be sure there are other people out there who know aspects of it you may be new to and have ready solutions for problems you didn’t even anticipate.\r\n\r\nBut that’s not all—the more popular a framework is, the more familiar it will be to your potential clients. If they know your website or app is built using something they’ve heard of, they’ll immediately see you as more trustworthy.\r\n\r\nIt goes without saying that both Vue and React are very popular. React currently seems to be in the lead, according to StackOverflow’s data. Paradoxically, since React’s community is so big and the framework is more complex, it might actually be harder to quickly find the answers to your questions concerning React than to those on Vue.\r\n\r\nOn the other hand, however, as a slightly less popular platform, Vue carries the risk of there simply being fewer developers that can help you out with your project.\r\n\r\nLearning curve with Vue.js and React\r\nThe important question you need to ask yourself when choosing a framework is: what’s the learning curve? You can have the most versatile technology in the world, but what if it’s going to take years to figure out? Luckily, neither React or Vue have a learning curve that could be considered steep.\r\n\r\nIf your developers have any experience with JavaScript, React should pose no problem. Experienced developers won’t have any difficulties with its architecture and the general workflow. This means that you can easily assemble and extend a team to handle your projects with people who will quickly learn the ropes.\r\n\r\nHaving said that, Vue actually is probably the easiest JavaScript framework out there. All you need to know beforehand are some JavaScript basics and rudimentary ES6 functions. Depending on how quickly you take in new things, learning everything there is to learn about Vue can take up to a week, but also as little as a couple of hours.\r\n\r\nHowever, there are two important factors you should take into consideration here.\r\n\r\nThe first one is the language barrier. While Vue is pretty widespread around the world nowadays, it was used for several years exclusively in China, so the majority of communication might still need to be translated.\r\n\r\nThe other problem is directly connected to Vue’s simplicity—its relative lack of additional features makes it harder to work on more complex projects.Popularity of the framework really matters—the more people know of it, the more you can be sure there are other people out there who know aspects of it you may be new to and have ready solutions for problems you didn’t even anticipate.\r\n\r\nBut that’s not all—the more popular a framework is, the more familiar it will be to your potential clients. If they know your website or app is built using something they’ve heard of, they’ll immediately see you as more trustworthy.\r\n\r\nIt goes without saying that both Vue and React are very popular. React currently seems to be in the lead, according to StackOverflow’s data. Paradoxically, since React’s community is so big and the framework is more complex, it might actually be harder to quickly find the answers to your questions concerning React than to those on Vue.\r\n\r\nOn the other hand, however, as a slightly less popular platform, Vue carries the risk of there simply being fewer developers that can help you out with your project.\r\n\r\nLearning curve with Vue.js and React\r\nThe important question you need to ask yourself when choosing a framework is: what’s the learning curve? You can have the most versatile technology in the world, but what if it’s going to take years to figure out? Luckily, neither React or Vue have a learning curve that could be considered steep.\r\n\r\nIf your developers have any experience with JavaScript, React should pose no problem. Experienced developers won’t have any difficulties with its architecture and the general workflow. This means that you can easily assemble and extend a team to handle your projects with people who will quickly learn the ropes.\r\n\r\nHaving said that, Vue actually is probably the easiest JavaScript framework out there. All you need to know beforehand are some JavaScript basics and rudimentary ES6 functions. Depending on how quickly you take in new things, learning everything there is to learn about Vue can take up to a week, but also as little as a couple of hours.\r\n\r\nHowever, there are two important factors you should take into consideration here.\r\n\r\nThe first one is the language barrier. While Vue is pretty widespread around the world nowadays, it was used for several years exclusively in China, so the majority of communication might still need to be translated.\r\n\r\nThe other problem is directly connected to Vue’s simplicity—its relative lack of additional features makes it harder to work on more complex projects.Popularity of the framework really matters—the more people know of it, the more you can be sure there are other people out there who know aspects of it you may be new to and have ready solutions for problems you didn’t even anticipate.\r\n\r\nBut that’s not all—the more popular a framework is, the more familiar it will be to your potential clients. If they know your website or app is built using something they’ve heard of, they’ll immediately see you as more trustworthy.\r\n\r\nIt goes without saying that both Vue and React are very popular. React currently seems to be in the lead, according to StackOverflow’s data. Paradoxically, since React’s community is so big and the framework is more complex, it might actually be harder to quickly find the answers to your questions concerning React than to those on Vue.\r\n\r\nOn the other hand, however, as a slightly less popular platform, Vue carries the risk of there simply being fewer developers that can help you out with your project.\r\n\r\nLearning curve with Vue.js and React\r\nThe important question you need to ask yourself when choosing a framework is: what’s the learning curve? You can have the most versatile technology in the world, but what if it’s going to take years to figure out? Luckily, neither React or Vue have a learning curve that could be considered steep.\r\n\r\nIf your developers have any experience with JavaScript, React should pose no problem. Experienced developers won’t have any difficulties with its architecture and the general workflow. This means that you can easily assemble and extend a team to handle your projects with people who will quickly learn the ropes.\r\n\r\nHaving said that, Vue actually is probably the easiest JavaScript framework out there. All you need to know beforehand are some JavaScript basics and rudimentary ES6 functions. Depending on how quickly you take in new things, learning everything there is to learn about Vue can take up to a week, but also as little as a couple of hours.\r\n\r\nHowever, there are two important factors you should take into consideration here.\r\n\r\nThe first one is the language barrier. While Vue is pretty widespread around the world nowadays, it was used for several years exclusively in China, so the majority of communication might still need to be translated.\r\n\r\nThe other problem is directly connected to Vue’s simplicity—its relative lack of additional features makes it harder to work on more complex projects.','michael-dziedzic-ga58UDNdh8A-unsplash.jpg','Active',1,'2022-05-24 05:55:08','2022-05-24 02:55:08'),
(52,24,'Summary of the React vs. Vue.js comparison','In the end, there is no definitive answer as to which framework is the better one. A lot depends on the particular needs of your project.','In the end, there is no definitive answer as to which framework is the better one. A lot depends on the particular needs of your project.\r\n\r\nBoth React and Vue have a lot to offer when it comes to building apps and websites, but the scope and the target of your product will mostly determine which technology will suit you best. Aspects like size, speed, performance, and budget will play an important role in picking the right framework for you.\r\n\r\nVue is the most accessible option available on the market. It’s incredibly lightweight, it comes with numerous templates, and pretty much anyone can learn it on the fly. It’s perfectly suited for smaller projects, especially if you need to deliver them really fast.\r\n\r\nThere’s no significant difference in terms of performance between Vue and React. That said, for large and complex undertakings, React is still the best choice. It’s got an incredible support network at your disposal, and while it does require a bit more knowledge than Vue to get started, there are plenty of experienced React developers out there, so you’ll never risk being short-staffed.\r\n\r\nFinal thoughts on the Vue.js and React frontend frameworks\r\nThank you for reading our comparison of Vue.js and React. We hope it has cleared up some key differences and characteristics that will help you make the optimal choice regarding the best JavaScript framework to use for you and your team.\r\n\r\nIf you’re interested in learning more about JavaScript frameworks, we have many other resources that can help:\r\n\r\nWhy Use React Native for Your Mobile App?\r\nReact vs. Angular: A Comparison of the JavaScript Library and the TypeScript Framework\r\nReact Native vs. Flutter: A Comparison of Pros and Cons\r\nReact Native vs. Ionic: A Comparison of Pros and Cons\r\nAt STX Next, we have 100+ JavaScript developers on board. This puts us in a unique position to help you build a high-quality frontend for your website, no matter the size or scope of your project. We can also support you with any other software development needs your business may have.\r\n\r\nAnd if you have any questions or concerns, feel free to reach out to us with all of them—we’d be happy to discuss each and every one with you!In the end, there is no definitive answer as to which framework is the better one. A lot depends on the particular needs of your project.\r\n\r\nBoth React and Vue have a lot to offer when it comes to building apps and websites, but the scope and the target of your product will mostly determine which technology will suit you best. Aspects like size, speed, performance, and budget will play an important role in picking the right framework for you.\r\n\r\nVue is the most accessible option available on the market. It’s incredibly lightweight, it comes with numerous templates, and pretty much anyone can learn it on the fly. It’s perfectly suited for smaller projects, especially if you need to deliver them really fast.\r\n\r\nThere’s no significant difference in terms of performance between Vue and React. That said, for large and complex undertakings, React is still the best choice. It’s got an incredible support network at your disposal, and while it does require a bit more knowledge than Vue to get started, there are plenty of experienced React developers out there, so you’ll never risk being short-staffed.\r\n\r\nFinal thoughts on the Vue.js and React frontend frameworks\r\nThank you for reading our comparison of Vue.js and React. We hope it has cleared up some key differences and characteristics that will help you make the optimal choice regarding the best JavaScript framework to use for you and your team.\r\n\r\nIf you’re interested in learning more about JavaScript frameworks, we have many other resources that can help:\r\n\r\nWhy Use React Native for Your Mobile App?\r\nReact vs. Angular: A Comparison of the JavaScript Library and the TypeScript Framework\r\nReact Native vs. Flutter: A Comparison of Pros and Cons\r\nReact Native vs. Ionic: A Comparison of Pros and Cons\r\nAt STX Next, we have 100+ JavaScript developers on board. This puts us in a unique position to help you build a high-quality frontend for your website, no matter the size or scope of your project. We can also support you with any other software development needs your business may have.\r\n\r\nAnd if you have any questions or concerns, feel free to reach out to us with all of them—we’d be happy to discuss each and every one with you!In the end, there is no definitive answer as to which framework is the better one. A lot depends on the particular needs of your project.\r\n\r\nBoth React and Vue have a lot to offer when it comes to building apps and websites, but the scope and the target of your product will mostly determine which technology will suit you best. Aspects like size, speed, performance, and budget will play an important role in picking the right framework for you.\r\n\r\nVue is the most accessible option available on the market. It’s incredibly lightweight, it comes with numerous templates, and pretty much anyone can learn it on the fly. It’s perfectly suited for smaller projects, especially if you need to deliver them really fast.\r\n\r\nThere’s no significant difference in terms of performance between Vue and React. That said, for large and complex undertakings, React is still the best choice. It’s got an incredible support network at your disposal, and while it does require a bit more knowledge than Vue to get started, there are plenty of experienced React developers out there, so you’ll never risk being short-staffed.\r\n\r\nFinal thoughts on the Vue.js and React frontend frameworks\r\nThank you for reading our comparison of Vue.js and React. We hope it has cleared up some key differences and characteristics that will help you make the optimal choice regarding the best JavaScript framework to use for you and your team.\r\n\r\nIf you’re interested in learning more about JavaScript frameworks, we have many other resources that can help:\r\n\r\nWhy Use React Native for Your Mobile App?\r\nReact vs. Angular: A Comparison of the JavaScript Library and the TypeScript Framework\r\nReact Native vs. Flutter: A Comparison of Pros and Cons\r\nReact Native vs. Ionic: A Comparison of Pros and Cons\r\nAt STX Next, we have 100+ JavaScript developers on board. This puts us in a unique position to help you build a high-quality frontend for your website, no matter the size or scope of your project. We can also support you with any other software development needs your business may have.\r\n\r\nAnd if you have any questions or concerns, feel free to reach out to us with all of them—we’d be happy to discuss each and every one with you!','xiaole-tao-Fo-HQUlRGkU-unsplash.jpg','Active',1,'2022-05-24 05:57:23','2022-05-24 02:57:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post_category` */

insert  into `post_category`(`post_category_id`,`post_id`,`category_id`,`created_at`,`updated_at`) values 
(6,32,32,'2022-05-24 05:21:48','2022-05-24 05:21:50'),
(10,32,32,'2022-05-24 05:21:48','2022-05-24 05:21:48');

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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`user_id`,`role_id`,`first_name`,`last_name`,`email`,`password`,`gender`,`date_of_birth`,`user_image`,`address`,`is_approved`,`is_active`,`created_at`,`updated_at`) values 
(52,1,'khalil','ahmed','panhwarkhalilahmed@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-03-06','profile.jpg','hyderabad sindh pakistan','Approved','Active','2022-05-24 04:36:17','2022-05-24 04:35:46'),
(82,2,'dildar','hussain','dildar@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-12-12','safeer.jpg','hyderabad sindh pakistan','Pending','Active','2022-05-24 11:41:28','2022-05-24 11:41:28'),
(90,2,'saleem','abdul','saleem@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-12-12','Screenshot (7).png','hyderabad sindh pakistan','Pending','Active','2022-05-24 11:52:39','2022-05-24 11:52:39'),
(92,2,'jawad','ahmed','jawad@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-12-12','Screenshot (6).png','hyderabad sindh pakistan','Pending','Active','2022-05-24 11:54:18','2022-05-24 11:54:18'),
(94,2,'sadam','hussain','sadam@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-12-11','Screenshot (7).png','hyderabad sindh pakistan','Pending','Active','2022-05-24 11:58:20','2022-05-24 11:58:20'),
(95,2,'waleed','ali','waleed@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-12-12','laravel2.jpg','hyderabad sindh pakistan','Pending','Active','2022-05-24 12:06:21','2022-05-24 12:06:21'),
(96,2,'wajad','ahmed','wajad@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-12-12','','hyderabad sindh pakistan','Approved','Active','2022-05-24 12:08:32','2022-05-24 12:08:32'),
(97,2,'wajid','ali','wajid@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-12-12','','hyderabad sindh pakistan','Approved','Active','2022-05-24 12:10:00','2022-05-24 12:10:00'),
(98,2,'sagar','ali','sagar@gmail.com','6a204bd89f3c8348afd5c77c717a097a','Male','2000-12-12','safeer.jpg','hyderabad sindh pakistan','Pending','Active','2022-05-24 12:22:26','2022-05-24 12:22:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_feedback` */

insert  into `user_feedback`(`feedback_id`,`user_id`,`user_name`,`user_email`,`feedback`,`created_at`,`updated_at`) values 
(6,52,'khalil','panhwarkhalilahmed@gmail.com','this is my feedback','2022-05-24 12:31:25','2022-05-24 12:31:25'),
(7,52,'khalil','panhwarkhalilahmed@gmail.com','this is my feedback','2022-05-24 12:33:00','2022-05-24 12:33:00'),
(8,52,'khalil','panhwarkhalilahmed@gmail.com','this is my feedback','2022-05-24 12:35:48','2022-05-24 12:35:48'),
(13,52,'khalil','panhwarkhalilahmed@gmail.com','asdfasdfsaf','2022-05-24 12:38:23','2022-05-24 12:38:23'),
(14,52,'khalil','panhwarkhalilahmed@gmail.com','asdfasdfasdf','2022-05-24 12:38:48','2022-05-24 12:38:48'),
(21,52,'khalil','panhwarkhalilahmed@gmail.com','asdfasdfd','2022-05-24 12:45:09','2022-05-24 12:45:09'),
(22,52,'khalil','panhwarkhalilahmed@gmail.com','this is new feedback','2022-05-24 12:45:31','2022-05-24 12:45:31'),
(23,52,'khalil','panhwarkhalilahmed@gmail.com','asdfsdf','2022-05-24 12:46:42','2022-05-24 12:46:42');

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
