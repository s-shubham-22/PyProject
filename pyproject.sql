-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 06:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pyproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `email` varchar(255) NOT NULL,
  `sr_no` int(255) NOT NULL,
  `project_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `email` varchar(255) NOT NULL,
  `Q_id` int(2) NOT NULL,
  `Question` varchar(1000) NOT NULL,
  `Answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`email`, `Q_id`, `Question`, `Answer`) VALUES
('DEFAULT', 1, 'Is Python Good for Machine Learning?', 'Yes, Python is best for it.'),
('DEFAULT', 2, 'Define PIP?', 'PIP stands for Python Installer Package. As the name indicates, it is used for installing different python modules. It is a command-line tool providing a seamless interface for installing different python modules. It searches over the internet for the package and installs them into the working directory without the need for any interaction with the user. The syntax for this is:\r\n\r\npip install <package_name>\r\n'),
('DEFAULT', 3, 'What is NumPy?', 'NumPy is one of the most popular, easy-to-use, versatile, open-source, python-based, general-purpose package that is used for processing arrays. NumPy is short for NUMerical PYthon. This is very famous for its highly optimized tools that result in high performance and powerful N-Dimensional array processing feature that is designed explicitly to work on complex arrays. Due to its popularity and powerful performance and its flexibility to perform various operations like trigonometric operations, algebraic and statistical computations, it is most commonly used in performing scientific computations and various broadcasting functions.'),
('DEFAULT', 4, ' What is Flask?', 'Flask is a web microframework for Python with Jinja2 and Werkzeug as its dependencies.'),
('DEFAULT', 5, 'What is the lambda function?', 'An anonymous function is known as a lambda function. This function can have only one statement but can have any number of parameters.'),
('DEFAULT', 6, 'Difference between list and tuple?', 'Tuple is not mutable it can be hashed eg. key for dictionaries. On the other hand, lists are mutable.'),
('DEFAULT', 7, 'Which Python modules are mostly used?', 'os\r\nsys\r\nmath\r\nrandom\r\ndata time\r\nJSON'),
('DEFAULT', 8, 'What is pep 8?', 'Python Enhancement Proposal or pep 8 is a set of rules that specify how to format Python code for maximum readability.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(3) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Feedback` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `joinus`
--

CREATE TABLE `joinus` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `intrest` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joinus`
--

INSERT INTO `joinus` (`id`, `fname`, `lname`, `oname`, `email`, `pass`, `profession`, `intrest`, `token`) VALUES
(51, 'Nisarg ', 'Shah', 'Charotar University of Science and Technology', 'nisargshah1511@yahoo.com', '$2y$10$rVOLDF2N1sGQWNDYBFKxoueXBZmGFRx58RwIsJy5eHbpZef1WjYIC', 'Student', 'Artificial Inteligence', 'e591aa92c9609f0b9a48d872425df7'),
(52, 'Nisarg ', 'Shah', 'Charotar University of Science and Technology', 'nisargshah8b@gmail.com', '$2y$10$VS3XiCdIud0M8K4LmQ4KzeCuMVpsCGPvzwlu2s4HlPo5/Nn0WRE/S', 'Student', 'Artificial Inteligence', '9494466fc0a0df262dd2429a5bdfb7');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Pyid` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Hashtag1` varchar(200) NOT NULL,
  `Hashtag2` varchar(200) NOT NULL,
  `Hashtag3` varchar(200) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Rating` float NOT NULL,
  `Bookmark` int(11) NOT NULL,
  `DownloadLink` varchar(200) NOT NULL,
  `VideoLink` varchar(200) NOT NULL,
  `IMAGE` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Pyid`, `Title`, `Category`, `Hashtag1`, `Hashtag2`, `Hashtag3`, `Description`, `Rating`, `Bookmark`, `DownloadLink`, `VideoLink`, `IMAGE`) VALUES
(1, 'Music Player', 'Intermediate', 'Tkinter', 'GUI', 'Mutagen', 'We need an application that will allow us to play or listen to digital audio files.                                                                      \nMP3 player is the device to play MP3s and other digital audio files. The MP3 GUI program application attempts to emulate the physical MP3 Player.       \n', 4.5, 1, 'https://github.com/srinidhi14vaddy/MP3-Player-using-Tkinter-and-Mutagen-in-Python', 'https://www.youtube.com/watch?v=rn7rGtrZ3y4', './images/musicPlayer.png'),
(2, 'Captcha Generator', 'Intermediate', 'Tkinter', 'Captcha ', 'Python', 'A simple image captcha genrator', 4.5, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Captcha_Genrator', 'https://www.youtube.com/watch?v=tT0S37ZvsKs', './images/CaptchaGenrator.jpg'),
(3, 'JPG to PNG Converter', 'Intermediate', 'Tkinter', 'Pillow', 'GUI', 'This project contains a simply python script to change file extension from .jpeg to .png\r\n\r\nRequirements:\r\nPillow module\r\n\r\n>>pip install pillow', 4, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Convert_JPEG_to_PNG', 'https://www.youtube.com/watch?v=pOUdsJXycLw', './images/jpg2png.png'),
(4, 'Image to PDF Converter', 'Basic', 'OS', 'SYS', 'img2pdf', 'The Python script enables the user to convert Images into PDF files. However, you must note that the script can only work well for JPG file formats. You can use the converter for revamping JPG images into PDF format.\r\n\r\nRequirements\r\nimg2pdf module\r\n\r\nThe img2pdf is an external Python module which enables you to convert a JPG image into a PDF.\r\n\r\npip install img2pdf', 4.5, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Convert_a_image_to_pdf', 'https://www.youtube.com/watch?v=z3-LUYoWtEM', './images/IMG2PDF.png'),
(5, 'StopWatch', 'Basic', 'Datetime', 'Tkinter', 'Simple', '', 4, 1, 'https://github.com/Python-World/python-mini-projects/blob/master/projects/Create_a_simple_stopwatch/README.md', 'https://www.youtube.com/watch?v=On8dNuKo4Dw', './images/stopwatch.png'),
(6, 'Digital Clock', 'Intermediate', 'Tkinter', 'Time', 'GUI', 'This script create a digital clock as per the system\'s current time.\n\nLibrary Used\ntkinter\ntime\n\nTo install required external modules\nRun pip install tkinter', 4.5, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Digital_clock', '', './images/digitalClock.png'),
(7, 'Image Scraping', 'Intermediate', 'Selenium', 'BeautifulSoup', 'Web scarpping', 'Dowmload Chrome Drive From Chrome.\r\nRun scrap-img.py file py scrap-img.py\r\nEnter Path : E:\\webscraping\\chromedriver_win32\\chromedriver.exe\r\nEnter URL : https://dribbble.com/', 4, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Download_images_from_website', 'https://www.youtube.com/watch?v=NBuED2PivbY', './images/imagescraper.png'),
(8, 'Video Player', 'Intermediate', 'OpenCV', 'Pathlib', 'Python', 'EasyVideoPlayer script is a video player based on the terminal. It can find the video in a pc, change its working directory and play the video file.\n\nPrerequisites\ncv2, os, pathlib and ffpyplayer.player libraries are needed to run this script, all of which can be installed using \"pip3 install \'library name\'\".', 4.5, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/EasyVideoPlayer', '', './images/videoplayer.png'),
(9, 'Language Translator', 'Basic', 'TerminalBased', 'GoogleTrans', 'Python', 'ransalte one language to another language\n\nRequirements\nyou need to install below library using pip\n$ pip install googletrans\nDescription\nThere are 16 languages you can translate into.\nHow to run the script\nExecute python3 python translator.py\nAfter then you have choices to select language by their code\nEnter Sentence and you will get translated language\nLanguage options and their code\nCode	Language\nbn	Bangla\nen	English\nko	Koren\nfr	French\nde	German\nhi	Hindi', 4, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Language_translator', 'https://www.youtube.com/watch?v=IaIbK4Hft28', './images/languageTranslator.png'),
(10, 'QR code Generator', 'Basic', 'qrcode', 'URl', 'Python', 'This script take a link of any URL and generate a QR code corresponding to it.\n\nLibrary Used\nqrcode\n\nTo install required external modules\nRun pip install qrcode', 4.5, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Qr_code_generator', 'https://www.youtube.com/watch?v=yB85BQZX2c8', './images/qrcode.png'),
(11, 'Color Detection', 'Advanced', 'Numpy', 'OpenCV', 'Python', '', 4, 1, 'https://github.com/ttusharsurve567/OpenCV-Mini-Projects/tree/main/Color%20Detection', 'https://www.youtube.com/watch?v=kwX2wTML-6A', './images/colordetection.png'),
(12, 'Speech to Text Converter', 'Advanced', 'speechrecognition', 'pyaudio', 'python', 'This Python script converts the Speech input into Text using NLP (Natural Langauge Processing).\nRequirements\nInstallation Required :\nPython Speech Recognition module:\npip install speechrecognition\nPyAudio:\nUse the following command for linux users\nsudo apt-get install python3-pyaudio\nWindows users can install pyaudio by executing the following command in a terminal\npip install pyaudio                               \nPython pyttsx3 module:\npip install pyttsx3', 4.5, 1, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Speech_to_text', 'https://www.youtube.com/watch?v=p64--E_K--g', './images/SPEECH2TEXT.png'),
(13, 'Calculator', 'Basic', 'Tkinter', 'Basic', 'GUI', 'A small python program that creates a calculator app', 4.5, 0, 'https://github.com/Python-World/python-mini-projects/tree/master/projects/Create_calculator_app', 'https://www.youtube.com/watch?v=fbxsYcSccJE', './images/calculator.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `joinus`
--
ALTER TABLE `joinus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Pyid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `sr_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `joinus`
--
ALTER TABLE `joinus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `Pyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
