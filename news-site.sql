-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 06:29 AM
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
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'Sports', 1),
(31, 'Programming Language', 0),
(32, 'Bollywood', 1),
(33, 'Hollywood', 0),
(34, 'Politics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(36, 'Python Programming language', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>What is Lorem Ipsum?</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vehicula egestas nulla, eget cursus erat. Curabitur et eleifend lectus, eu tempor urna. Sed ut lorem et libero molestie rhoncus. Maecenas quam velit, vulputate eget placerat vel, interdum vel tellus. Etiam tellus magna, hendrerit in eros sit amet, imperdiet venenatis est. Vivamus quis mauris tempus, sodales quam at, ultricies sapien. Sed sed arcu porta, cursus leo non, pharetra lorem. Nullam laoreet vulputate odio, id sagittis elit vulputate scelerisque. Etiam tempus convallis nulla, ut pellentesque nulla pellentesque ut.</p>\r\n\r\n<p><em><strong>Integer ut erat id metus semper</strong></em> porta. Vestibulum aliquam eget eros quis ornare. Etiam malesuada porttitor urna sagittis efficitur. Maecenas nibh leo, venenatis ac erat in, consectetur fringilla sapien. Donec quis orci lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque at nunc id metus posuere tempus quis eu dolor. Sed sit amet eros ut leo dictum dictum at lobortis nibh. Praesent sed condimentum dui. Vivamus scelerisque ex sit amet erat posuere euismod. Nullam id eleifend nisi, id interdum nibh. Cras nec dolor congue velit fermentum laoreet a vel magna. Etiam vestibulum ipsum bibendum, aliquam elit quis, interdum mauris. Ut ut augue ullamcorper, pellentesque lacus in, dignissim turpis.</p>\r\n\r\n<blockquote>\r\n<p><em><strong>Sed nunc tellus, interdum lobortis rutrum id</strong></em>, imperdiet id dolor. Maecenas aliquam non nisl vitae viverra. Curabitur sit amet sem a elit hendrerit semper id id orci. Vivamus suscipit dictum dui a fermentum. Morbi in maximus odio. Etiam consequat, lectus at consequat viverra, diam est dignissim magna, a fermentum lacus enim quis purus. Vivamus imperdiet ipsum nec lacinia ultrices. Nulla bibendum sodales lacus quis porttitor. Nunc pretium sapien felis, in ullamcorper metus interdum ut.</p>\r\n</blockquote>\r\n\r\n<h3><strong>Aenean eget nunc condimentum, </strong>viverra enim non, aliquam dui. Nam et eros dapibus, efficitur metus tincidunt, sagittis ex. Morbi diam elit, cursus in venenatis id, euismod eget quam. Aenean varius nec diam id aliquet. Phasellus quis est euismod, mattis turpis eleifend, tristique velit. Quisque sed tristique sem. Maecenas nec gravida nisi, vel volutpat sapien. Morbi tempor nec tellus sit amet pellentesque.</h3>\r\n\r\n<p>Fusce eu nibh sem. Nunc in mollis arcu. Cras odio ipsum, ornare in sapien et, efficitur posuere dui. Duis gravida risus ac mi sodales sollicitudin. Phasellus luctus lacus massa, et sollicitudin urna suscipit ac. Aliquam mi nunc, mollis vel elementum eget, pellentesque vel lectus. Donec pharetra, purus ac viverra elementum, nunc mi eleifend erat, et aliquam justo massa a justo. Suspendisse turpis diam, ultricies vel ante ac, facilisis pretium augue. Ut id lorem hendrerit, tincidunt magna a, dapibus ante. Quisque vel vulputate metus. Curabitur ac fringilla neque, et vehicula nibh. Nulla sodales ornare ligula at interdum. Nunc tincidunt tellus justo, vel dictum sem facilisis feugiat. Duis faucibus lobortis tortor, ut ullamcorper lectus. Sed maximus tellus tincidunt nunc semper, ac ultrices arcu mollis. Praesent commodo sed lorem at tincidunt.</p>\r\n\r\n<p>Pellentesque interdum ex ac elit interdum volutpat. Sed eros risus, semper at nibh quis, consectetur ultrices tortor. Morbi viverra pharetra ex, et molestie ipsum consequat vitae. Donec sed enim lacus. Nam sit amet orci consequat, iaculis magna a, finibus metus. Aenean condimentum risus sit amet nisl pellentesque, eu viverra orci lobortis. Praesent aliquet arcu a neque fermentum, sit amet sollicitudin ante rutrum. Quisque imperdiet tincidunt nisl, et dapibus turpis mollis non. Maecenas a enim dictum, tempor odio non, tempor sem. Cras pharetra tortor sed sem sagittis, sit amet ullamcorper arcu eleifend. Ut augue enim, venenatis at posuere at, fermentum et enim. Phasellus cursus aliquet arcu accumsan fringilla. Duis ac massa congue, rhoncus mi vitae, blandit risus.</p>\r\n\r\n<p>Morbi venenatis neque quis turpis ultricies molestie. Duis ac fermentum nisi. Duis sollicitudin neque eget ex laoreet condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla sit amet est mollis, lobortis orci et, efficitur odio. In sit amet laoreet metus, sit amet egestas elit. Cras quis malesuada ligula. Nulla bibendum, dui eu vehicula tincidunt, justo est rutrum felis, eget commodo velit risus ut mi. Nullam dignissim placerat blandit. Morbi sed ante nibh. Curabitur vitae quam non mauris imperdiet eleifend. Aenean et rhoncus arcu. Maecenas sit amet eros a lectus facilisis maximus. Ut in est metus.</p>\r\n\r\n<p>Sed consequat congue lacus vel mattis. Integer sit amet suscipit turpis. Ut aliquet elementum magna, sit amet elementum mi tincidunt in. Pellentesque in metus eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam maximus laoreet consectetur. Mauris accumsan tellus ac facilisis bibendum. Cras efficitur mollis molestie. Vivamus tortor lacus, accumsan quis neque quis, laoreet vulputate dui. Mauris aliquam sodales iaculis. Morbi felis libero, facilisis in bibendum quis, tincidunt ac orci. Fusce leo mi, vestibulum vitae venenatis non, placerat ac est. Suspendisse id quam iaculis nibh congue placerat non vitae nulla.</p>\r\n\r\n<p>Nunc vestibulum odio neque, vel faucibus arcu posuere feugiat. Nam venenatis sit amet quam non ultricies. Phasellus faucibus id ligula eu semper. Mauris id pretium ipsum. Maecenas eu consequat mi, et consectetur ligula. In quis quam sed neque porttitor sodales. Fusce id mi libero. In dolor mi, sodales ut tempus sit amet, faucibus vitae est. Nam lacinia viverra molestie. Aliquam semper sagittis interdum. Nullam scelerisque quis velit eu suscipit. Donec id convallis felis, sed lacinia arcu. Aenean blandit mattis justo, non lobortis magna mattis nec. Integer lectus dolor, pulvinar ut tellus varius, accumsan auctor magna. Etiam lectus risus, aliquet ut malesuada ut, blandit id ex.</p>\r\n\r\n<p>Nam vitae vehicula ligula. Praesent nisi est, efficitur quis purus ut, ullamcorper cursus augue. Nulla sagittis dictum ipsum, ut ultricies turpis placerat feugiat. Praesent ullamcorper id purus in sagittis. Sed bibendum lorem a elit elementum venenatis. Vivamus facilisis diam non diam euismod posuere. Quisque lacinia leo a pellentesque ullamcorper. Vestibulum id aliquet ante, ac rutrum nulla.</p>\r\n', '30', '30-Aug-21', 24, '1630326610-photo-1461749280684-dccba630e2f6.jpg'),
(37, 'After Mukul Roy, BJP MLA Tanmay Ghosh joins Trinamool Congress', '<p><strong>While Tanmay Ghosh did not give a direct reply on wh</strong>ether he will resign from the assembly to avoid action under anti-defection law, education minister Bratya Basu, who inducted him in the party, said, “Everything will be done according to rules”</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.hindustantimes.com/img/2021/08/30/550x309/34046188-0982-11ec-b7a3-060c0b7322b5_1630321662490.jpg\" style=\"height:309px; width:550px\" /></p>\r\n\r\n<p>The Bharatiya Janata Party’s (BJP) strength in the West Bengal assembly fell to 73 on Monday when Tanmay Ghosh, who won the Bishnupur seat in Bankura district in the March-April polls, joined the ruling Trinamool Congress (TMC).</p>\r\n\r\n<p> </p>\r\n\r\n<p>While Ghosh did not give a direct reply on whether he will resign from the assembly to avoid action under anti-defection law, education minister Bratya Basu, who inducted him in the party, said, “Everything will be done according to rules.”</p>\r\n\r\n<p>“I invite people’s representatives from all parties to join the TMC and be a part of the mammoth development and social welfare projects taken up by Mamata Banerjee. Her dedication and performance drew me towards the TMC,” Ghosh said.</p>\r\n\r\n<p> </p>\r\n\r\n<p>This is the second defection by an Opposition MLA since the polls earlier this year in which the BJP won 77 seats.</p>\r\n\r\n<p>Before Ghosh, Mukul Roy, who was a BJP national vice-president, returned to the TMC on June 11. But the legislator from Krishnanagar North has not resigned from the BJP till now and has been appointed the chairman of the assembly’s public accounts committee.The BJP has sought his disqualification under anti-defection law.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Earlier, two other BJP MLAs did not take oath but resigned to retain their Lok Sabha seats, bringing down the party’s tally in the 294-member assembly to 75.</p>\r\n\r\n<p>The TMC bagged 213 seats. Polls were held in 292 seats as two candidates died in Murshidabad district before the elections. The Left and Congress could not win any seat.</p>\r\n\r\n<p>“The BJP has no base at the grassroots level in Bengal. Everything is superficial. It could have never won 200 seats. The leaders were only making loud noises. Those who won, did so because of their own strength and charisma,” Ghosh said.</p>\r\n\r\n<p>Ghosh’s absence will make no difference to the BJP and the party will seek action against him under anti-defection law, said Bengal BJP’s chief spokesperson Samik Bhattacharya.</p>\r\n\r\n<p> </p>\r\n\r\n<p>“Not all people are capable of handling the pressure Opposition leaders have to face. Ghosh gave in. He came from the TMC before the polls. This has no significance for us,” said Bhattacharya.</p>\r\n\r\n                \r\n                \r\n                ', '34', '30-Aug-21', 24, '1630331028-nature3.jpg'),
(38, 'Covid third wave intensity expected to be 1/4 of second wave, say experts', 'Manindra Agrawal, an IIT-Kanpur scientist who is part of the three-member team of experts that have been tasked with predicting any surge in infections, said if no new virulent emerges, then the situation is unlikely to change.', '32', '30-Aug-21', 24, '1630331195-bollywood.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'shadab', 'ahmad', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
