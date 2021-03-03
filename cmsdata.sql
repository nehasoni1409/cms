-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 04:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(54, 'HTML5'),
(55, 'CSS3'),
(56, 'JavaScript'),
(57, 'Bootstrap'),
(61, 'jQuery'),
(62, 'PHP'),
(63, 'ASP'),
(64, 'Laravel');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(4, 138, 'Prince Soni', 'prince27@gmail.com', 'this post is very good!', 'Approved', '2021-02-19'),
(5, 139, 'Anubha Agarwal', 'anubha02@gmail.com', 'css3', 'Approved', '2021-02-19'),
(6, 141, 'Prince Soni', 'prince27@gmail.com', 'co,,etnhttth', 'Approved', '2021-02-21'),
(7, 138, 'Shweta Soni', 'shweta.foxaisr@gmail.com', 'productive', 'Approved', '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(138, 54, 'HTML5', '', 'nehasoni', '2021-02-19', 'html.jpg', '<p><strong>HTML5</strong> is a markup language used for structuring and presenting content on the World Wide Web. It is the fifth and last major HTML version that is a World Wide Web Consortium<strong> </strong>recommendation.</p><ul><li>HTML stands for Hyper Text Markup Language</li><li>HTML is the standard markup language for creating Web pages</li><li>HTML describes the structure of a Web page</li><li>HTML consists of a series of elements</li><li>HTML elements tell the browser how to display the content</li><li>HTML elements label pieces of content such as \\\"this is a heading\\\", \\\"this is a paragraph\\\", \\\"this is a link\\\", etc.</li></ul>', 'html5', '4', 'published', 3),
(139, 55, 'CSS3', '', 'rico', '2021-02-19', 'css-illustration.png', '<p><strong>Cascading Style Sheets</strong> (<strong>CSS</strong>) is a style sheet language used for describing the presentation of a document written in a markup language such as .HTML CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.</p><ul><li>CSS stands for Cascading Style Sheets</li><li>CSS describes how HTML elements are to be displayed on screen, paper, or in other media</li><li>CSS saves a lot of work. It can control the layout of multiple web pages all at once</li><li>External stylesheets are stored in CSS files</li></ul>', 'css', '4', 'published', 6),
(140, 56, 'Javascript', '', 'suave', '2021-02-19', 'javascript-1567486564472.jpg', '<p>JavaScript is one of the core technologies of the World Wide Web. JavaScript enables interactive web pages and is an essential part of web applications. The vast majority of websites use it for client-side page behavior, and all major web browsers have a dedicated JavaScript engine to execute it.</p><p><strong>Javascript</strong> is one of the most widely used <strong>programming languages</strong> (Front-end as well as Back-end). It has it\'s presence in almost every area of software development. I\'m going to list few of them here.</p><p><strong>Client side validation</strong> - This is really important to verify any user input before submitting it to the server.</p><p><strong>Manipulating HTML Pages</strong> - Javascript helps in manipulating HTML page on the fly.</p><p><strong>User Notifications</strong> - You can use Javascript to raise dynamic pop-ups on the webpages to give different types of notifications to your website visitors.</p><p><strong>Back-end Data Loading</strong> - Javascript provides Ajax library which helps in loading back-end data while you are doing some other processing.</p><p><strong>Presentations</strong> - JavaScript also provides the facility of creating presentations which gives website look and feel.</p><p><strong>Server Applications</strong> - Node JS is built on Chrome\'s Javascript runtime for building fast and scalable network applications.</p>', 'javascript', '', 'published', 2),
(141, 57, 'Bootstrap', '', 'shwetasoni', '2021-02-19', 'bootstrap-illustration.png', '<p><strong>Bootstrap</strong> is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains CSS- and (optionally) JavaScript-based design templates for typography, forms, buttons, navigation, and other interface components.</p><ul><li><br>Bootstrap is a free front-end framework for faster and easier web development</li><li>Bootstrap includes HTML and CSS based design templates for typography, forms, buttons, tables, navigation, modals, image carousels and many other, as well as optional JavaScript plugins</li><li>Bootstrap also gives you the ability to easily create responsive designs</li></ul>', 'bootstrap', '', 'published', 3),
(142, 54, 'jQuery', '', 'rico', '2021-02-19', 'jquery-banner.png', '<p><strong>jQuery</strong> is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.[3] It is free, open-source software using the permissive MIT License.</p><p>jQuery is a lightweight, \"write less, do more\", JavaScript library.</p><p>The purpose of jQuery is to make it much easier to use JavaScript on your website.</p><p>jQuery takes a lot of common tasks that require many lines of JavaScript code to accomplish, and wraps them into methods that you can call with a single line of code.</p><p>jQuery also simplifies a lot of the complicated things from JavaScript, like AJAX calls and DOM manipulation.</p><p>The jQuery library contains the following features:</p><ul><li>HTML/DOM manipulation</li><li>CSS manipulation</li><li>HTML event methods</li><li>Effects and animations</li><li>AJAX</li><li>Utilities</li></ul>', 'jQuery', '4', 'published', 2),
(143, 62, 'PHP', '', 'rico', '2021-02-19', 'php-illustration.png', '<p>The <strong>PHP Hypertext Preprocessor (PHP)</strong> is a programming language that allows web developers to create dynamic content that interacts with databases. PHP is basically used for developing web based software applications.</p><ul><li>PHP is an acronym for \"PHP: Hypertext Preprocessor\"</li><li>PHP is a widely-used, open source scripting language</li><li>PHP scripts are executed on the server</li><li>PHP is free to download and use.</li><li>PHP files can contain text, HTML, CSS, JavaScript, and PHP code</li><li>PHP code is executed on the server, and the result is returned to the browser as plain HTML</li><li>PHP files have extension \".php\".</li></ul>', 'php', '4', 'published', 2),
(144, 54, 'ASP.NET', '', 'rico', '2021-02-19', 'image_60140ec0-ce46-4dbf-a14f-4210eab7f42c.png', '<p><strong>ASP.NET</strong> is an open-source,[2] server-side web-application framework designed for web development to produce dynamic web pages. It was developed by Microsoft to allow programmers to build dynamic web sites, applications and services.</p><p>It was first released in January 2002 with version 1.0 of the .NET Framework and is the successor to Microsoft\'s Active Server Pages (ASP) technology.</p><p>Web Pages is one of many programming models for creating ASP.NET web sites and web applications.</p><p>Web Pages provides an easy way to combine HTML, CSS, and server code:</p><ul><li>Easy to learn, understand, and use</li><li>Uses an SPA application model (Single Page Application)</li><li>Similar to PHP and Classic ASP</li><li>VB (Visual Basic) or C# (C sharp) scripting languages</li></ul>', 'asp.net', '4', 'published', 1),
(145, 64, 'Laravel', '', 'rico', '2021-02-19', 'Why_Laravel.jpg', '<p><strong>Laravel</strong> is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony.</p><p>Laravel offers you the following advantages, when you are designing a web application based on it ?</p><p>The web application becomes more scalable, owing to the Laravel framework.</p><p>Considerable time is saved in designing the web application, since Laravel reuses the components from other framework in developing web application.</p><p>It includes namespaces and interfaces, thus helps to organize and manage resources.</p>', 'php,laravel', '', 'published', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `token`) VALUES
(1, 'rico', '$2y$10$bBxEiaWq67T9wUy8qygfKuKrNYTriN6vghUEIgJr5TG1XUXE1WYrK', '', '', 'rico@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22', ''),
(2, 'suave', '$2y$12$jG3YUwNt3X39OB.YJd311O9akwOw17N4e1NQ79N2xrojC5NG3Na3S', '', '', 'edwin@codingfaculty.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(4, 'nehasoni', '$2y$10$61SI6.8qZwDXDNXIeoYIue5L1Ulg0chE0D6RrsheaERnJAGnY3puG', '', '', 'neha12@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22', '444685d0bcbabc4c7bef346d5f9e846adb6944bdd8b61390be650c97cefdb40e05521bd2a77aa34c1914d37e41a3bead7bff'),
(5, 'shwetasoni', '$2y$12$euc6oLLRNBQE9emGVWE6rOCrSbRIExW/7eZWT29VZbZTlG6/XwoWK', 'shweta', 'soni', 'psoni2553@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22', ''),
(6, 'sachin1509', 'sachin', 'sachin', 'agarwal', 'sachin1509@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22', ''),
(7, 'leela02', '$2y$10$qaqF/fHWOOyMXUbgBRsN7.OXnc0VO8EJJ3d8u91OX8zghas2JWQaC', '', '', 'leele02@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(44, '', 1447434996),
(45, 's47g806mg6788i92u5ogm6kqi4', 1447441570),
(46, '72clfovqk7vo2p8fiii26tkmr4', 1447461586),
(47, '3gs3q67k5ntpma8tbp2kuvof23', 1447691896),
(48, 'bouqd4fslhn2b1nv20k559col1', 1447796024),
(49, 'tign71tbpar4di74k13f8nr022', 1447867949),
(50, 'ju0s1j019d1qlc1q4tb703rgm3', 1447880891),
(51, 'tp6khbvgo4hdlfueekpmaefcu0', 1447952096),
(52, 'kv0klvlajm8j50d3uqt6go4bm6', 1448174347),
(53, 'qsdv073j4c3lqd6m0rtdpg3615', 1448296313),
(54, 'tmliedhtcgvi8r96l6qplehos4', 1448292854),
(55, 'vrumjbdrjrauucdhg6cta8hhn6', 1448800892),
(56, 'eb1ae8996caf679d187c1037ec9620b1', 1478098539),
(57, '40780dfe8631b764c435168775d44432', 1479443689),
(58, '6d9081fbf0106e9bfef3e77f6fa68f8a', 1481004509),
(59, 'b57212ad3e92b65c05d8ddcd1805a370', 1481382178),
(60, '3cf8d2b7eb470cb635a6102868ae9bd6', 1481397855),
(61, 'c7e0ac8eeeaaf5d3ac4329af9bf4b777', 1481685807),
(62, 'b50a5d9ab4b00848c009d472c63ae2cd', 1485830805),
(63, '3ef98f25d1b1762dd799f33b1a2b2657', 1499988384),
(64, '229f256600c1d05e81bd5036d941069a', 1499993069),
(65, '34aea21ebd8d1ae1b572236a4783cbad', 1500065466);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
