-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 12:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photograph_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photograph_id`, `created`, `author`, `body`) VALUES
(1, 1, '2018-11-18 23:57:04', 'Umar', 'Funny picture...'),
(2, 1, '2018-11-19 01:26:02', 'Jago', 'Hmmm.... ):'),
(4, 2, '2018-11-19 01:30:34', 'Tom', 'Cool'),
(5, 3, '2018-11-19 01:33:07', 'Sade', 'The guy is a thug'),
(6, 5, '2018-11-20 13:34:52', 'Dr.OShi', 'oshi NI SHIT OSHI OSHI OSHI Idony like it att alll OSHI');

-- --------------------------------------------------------

--
-- Table structure for table `paginate`
--

CREATE TABLE `paginate` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paginate`
--

INSERT INTO `paginate` (`id`, `name`, `message`) VALUES
(1, 'Addison', 'Suspendisse id felis mi. Quisque blandit mattis nisl eu volutpat. Duis viverra lacus quis arcu mattis ac varius ligula convallis. Maecenas magna enim, molestie ac ultrices sed, convallis vel dolor. Vestibulum sed hendrerit massa. Integer consequat odio vitae est rutrum et egestas nibh sodales. Sed adipiscing nisl vel massa bibendum molestie.'),
(2, 'Aditya', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel libero ut mi elementum adipiscing ut sed lacus. Nulla eget tempor dolor. Aenean eget metus nisi, sed mattis lectus. Ut vitae pretium dolor. Ut nec dui vitae nisl suscipit volutpat vel eu sapien. Donec suscipit massa ut sapien faucibus pellentesque. Proin eu sapien diam. Nulla facilisi. Etiam adipiscing molestie sapien, sit amet viverra metus hendrerit ut. Vestibulum non laoreet arcu.'),
(3, 'Derrick', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eleifend dictum ligula, id vulputate tortor luctus id. Sed accumsan mollis venenatis. Integer auctor ante vitae ante facilisis bibendum. Fusce bibendum enim lacinia mauris pharetra facilisis. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(4, 'Jefferson', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(5, 'Deonte', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eleifend dictum ligula, id vulputate tortor luctus id. Sed accumsan mollis venenatis. Integer auctor ante vitae ante facilisis bibendum. Fusce bibendum enim lacinia mauris pharetra facilisis. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(6, 'Aden', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(7, 'Joey', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eleifend dictum ligula, id vulputate tortor luctus id. Sed accumsan mollis venenatis. Integer auctor ante vitae ante facilisis bibendum. Fusce bibendum enim lacinia mauris pharetra facilisis. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(8, 'Paul', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(9, 'Alex', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean eleifend dictum ligula, id vulputate tortor luctus id. Sed accumsan mollis venenatis. Integer auctor ante vitae ante facilisis bibendum. Fusce bibendum enim lacinia mauris pharetra facilisis. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(10, 'Devante', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(11, 'Derrick', 'Duis et gravida lacus. Ut scelerisque ante eu mi tristique dignissim. Maecenas nec augue non dolor tempor viverra eget non felis. Nam posuere laoreet tellus, at commodo massa auctor quis. Maecenas tempus volutpat posuere. Donec in adipiscing libero. Proin viverra, mi blandit scelerisque fringilla, turpis nunc ultrices turpis, vitae malesuada turpis orci non felis. Suspendisse interdum consectetur sem et accumsan. Proin eleifend laoreet ligula, a placerat lorem volutpat ut. Duis sagittis dapibus tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fa'),
(12, 'Jefferson', 'Etiam ac augue elementum enim ornare molestie. Vestibulum et hendrerit massa. Donec sit amet turpis elit, non pretium risus. Vivamus varius eros sagittis augue posuere pellentesque. Curabitur eu nunc vel erat ultricies eleifend et nec tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices, dolor in congue fermentum, nisi dolor sodales odio, ac sodales est mi vitae leo. mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(13, 'Deonte', 'Morbi ultrices, dolor in congue fermentum, nisi dolor sodales odio, ac sodales est mi vitae leo. Sed suscipit nibh eget tellus tempus gravida sed quis nibh. In euismod porta vehicula. Nulla aliquet, tortor eu tempus aliquet, massa enim placerat enim, et ornare libero ante sed orci. Aenean cursus nulla et lorem bibendum iaculis. Nam lobortis scelerisque vulputate. Sed in leo lorem, eu pharetra lectus. Nunc quis leo dui. Fusce nisi est, hendrerit interdum consequat mollis, vulputate quis est.Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(14, 'Aden', 'enean ut enim ligula, quis rhoncus tellus. Nullam quam tortor, mattis eu cursus nec, placerat a leo. Pellentesque lacinia eros quis justo varius aliquet. Sed quis lacus nec dolor sollicitudin porttitor. Suspendisse elementum, mi ut accumsan eleifend, leo mi auctor tellus, in tristique magna libero at augue. Donec in tellus metus. Curabitur eget metus lorem, at bibendum nisl.Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(15, 'Joey', 'Morbi non nisl sed lorem vehicula lobortis ut vel diam. In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra auctor velit, et faucibus ipsum volutpat a. Curabitur est sem, tempus a imperdiet et, convallis id erat. Proin ac nunc nulla. Praesent ac justo eget urna pretium molestie id a lacus. Curabitur a tortor urna,  Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(16, 'Oliver', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(17, 'Archibald', 'Sed non sapien lacus, non consectetur diam. Vestibulum erat neque, dapibus quis consectetur ut, aliquam et magna. Sed sodales iaculis justo et molestie. Etiam quis odio elementum elit convallis dignissim. Donec semper hendrerit nunc sed luctus. Suspendisse potenti. In placerat urna nulla. Suspendisse potenti. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(18, 'Derrick', 'Duis et gravida lacus. Ut scelerisque ante eu mi tristique dignissim. Maecenas nec augue non dolor tempor viverra eget non felis. Nam posuere laoreet tellus, at commodo massa auctor quis. Maecenas tempus volutpat posuere. Donec in adipiscing libero. Proin viverra, mi blandit scelerisque fringilla, turpis nunc ultrices turpis, vitae malesuada turpis orci non felis. Suspendisse interdum consectetur sem et accumsan. Proin eleifend laoreet ligula, a placerat lorem volutpat ut. Duis sagittis dapibus tempus. Pellentesque habitant morbi tristique senectus et netus et malesuada fa'),
(19, 'Jefferson', 'Etiam ac augue elementum enim ornare molestie. Vestibulum et hendrerit massa. Donec sit amet turpis elit, non pretium risus. Vivamus varius eros sagittis augue posuere pellentesque. Curabitur eu nunc vel erat ultricies eleifend et nec tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices, dolor in congue fermentum, nisi dolor sodales odio, ac sodales est mi vitae leo. mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(20, 'Deonte', 'Morbi ultrices, dolor in congue fermentum, nisi dolor sodales odio, ac sodales est mi vitae leo. Sed suscipit nibh eget tellus tempus gravida sed quis nibh. In euismod porta vehicula. Nulla aliquet, tortor eu tempus aliquet, massa enim placerat enim, et ornare libero ante sed orci. Aenean cursus nulla et lorem bibendum iaculis. Nam lobortis scelerisque vulputate. Sed in leo lorem, eu pharetra lectus. Nunc quis leo dui. Fusce nisi est, hendrerit interdum consequat mollis, vulputate quis est.Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(21, 'Aden', 'enean ut enim ligula, quis rhoncus tellus. Nullam quam tortor, mattis eu cursus nec, placerat a leo. Pellentesque lacinia eros quis justo varius aliquet. Sed quis lacus nec dolor sollicitudin porttitor. Suspendisse elementum, mi ut accumsan eleifend, leo mi auctor tellus, in tristique magna libero at augue. Donec in tellus metus. Curabitur eget metus lorem, at bibendum nisl.Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(22, 'Joey', 'Morbi non nisl sed lorem vehicula lobortis ut vel diam. In hac habitasse platea dictumst. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra auctor velit, et faucibus ipsum volutpat a. Curabitur est sem, tempus a imperdiet et, convallis id erat. Proin ac nunc nulla. Praesent ac justo eget urna pretium molestie id a lacus. Curabitur a tortor urna,  Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(23, 'Oliver', 'Sed faucibus, orci venenatis varius pellentesque, magna massa blandit nisi, id tempus erat tellus pulvinar nibh. Nulla eu rutrum dui. Ut gravida nulla feugiat risus egestas congue. Suspendisse pulvinar ornare urna eleifend tincidunt. Cras eros velit, mattis at lobortis cursus, pulvinar ut nisl. Ut blandit euismod dolor nec congue. Vestibulum euismod dictum tristique. Morbi sagittis auctor commodo. Pellentesque in odio et nulla tincidunt tristique. In tempor tempus eleifend..'),
(24, 'Archibald', 'Sed non sapien lacus, non consectetur diam. Vestibulum erat neque, dapibus quis consectetur ut, aliquam et magna. Sed sodales iaculis justo et molestie. Etiam quis odio elementum elit convallis dignissim. Donec semper hendrerit nunc sed luctus. Suspendisse potenti. In placerat urna nulla. Suspendisse potenti. Morbi semper libero vel justo pellentesque interdum. Curabitur urna ante, dapibus eu pulvinar quis, interdum quis odio.'),
(25, 'Chinmay', 'Nunc eget velit tortor, quis tincidunt nibh. Vestibulum eget est elit, a accumsan nunc. Aenean ac tortor justo, at pulvinar quam. Proin in enim quis libero vehicula iaculis sit amet eu ante. Phasellus diam justo, elementum eu rutrum sit amet, molestie vitae magna. Aliquam erat volutpat. Fusce scelerisque libero sit amet erat facilisis pretium.'),
(26, 'Addison', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In faucibus ligula interdum felis porta in ultrices purus auctor. Curabitur consectetur lacinia metus. Vivamus ultrices, lectus ac pharetra laoreet, tellus quam placerat erat, posuere laoreet diam elit at neque. Aliquam semper scelerisque mollis. Phasellus tempus laoreet molestie.'),
(27, 'Aditya', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed tortor sed turpis lobortis vestibulum blandit sit amet arcu. Curabitur tempus pretium faucibus. Phasellus in urna non velit cursus semper eu et dolor. Suspendisse nulla libero, ultricies id lacinia sit amet, sagittis sed neque. Donec volutpat congue velit vel ullamcorper. Quisque quis est leo, in semper nunc. Phasellus gravida placerat risus, nec commodo lectus adipiscing nec.'),
(28, 'Derrick', 'Etiam eu tortor eu nibh aliquet feugiat. Integer at dolor nec libero elementum faucibus quis ut ante. Fusce ut orci erat. Nulla facilisi. Aenean est justo, dignissim eu congue sed, tempor egestas orci. Suspendisse porttitor ligula tempus sapien facilisis vel tempus mi fringilla. Donec varius, dui ac semper fermentum, nunc risus interdum nisi, at ultricies dolor purus vel massa.'),
(29, 'Jefferson', 'Pellentesque facilisis mattis semper. Donec aliquam, quam non hendrerit pellentesque, urna quam placerat nunc, quis molestie leo risus nec ipsum. Vestibulum ut ligula malesuada justo adipiscing molestie nec in eros. Sed id sapien quis sapien rhoncus sollicitudin. Sed est metus, vehicula ut dictum at, semper eu lacus. Curabitur congue, ante vel commodo laoreet, enim purus venenatis velit, in tincidunt odio ante vitae sem. Sed ut massa et '),
(30, 'Deonte', 'purus blandit euismod eu sit amet lorem. Pellentesque tempor, erat quis vehicula vulputate, magna ante elementum tortor, ac feugiat lacus metus vitae ante. Vivamus tellus lorem, porta nec vestibulum ut, mollis sed augue. Sed sed condimentum leo. Curabitur tempor est scelerisque risus pulvinar varius. Mauris eros dui, dignissim at cursus sed, bibendum at elit. Donec gravida ornare sapien vel tempus.'),
(31, 'Aden', 'Etiam vulputate nisi in eros consequat non elementum justo consectetur. Etiam quis laoreet ante. Nulla eget nibh arcu. In gravida enim sit amet leo pretium commodo id at eros. Praesent vitae erat neque. Aenean non quam mauris. Etiam ut eros dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(32, 'Joey', 'Etiam imperdiet tortor in ipsum posuere eget pharetra velit dapibus. Nullam imperdiet molestie ligula a vulputate. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec venenatis ipsum et mi consectetur faucibus. Praesent elementum, mi sit amet sodales tincidunt, mi ipsum cursus lorem, sed feugiat ligula arcu id nibh. '),
(33, 'Paul', 'Curabitur venenatis purus lectus. In sed lacus iaculis dolor dignissim gravida congue vitae massa. Phasellus nec tellus in lacus cursus ornare ut quis lectus. Phasellus elementum, mi vel scelerisque varius, neque elit hendrerit elit, eget eleifend elit ipsum in ligula. Morbi in nunc diam, in viverra lectus. Sed interdum est a diam placerat ut sodales neque mollis. '),
(34, 'Alex', 'ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In tortor arcu, blandit id elementum et, ultricies in velit. Sed gravida magna a lacus accumsan sollicitudin nec in sem. Nullam tempus felis faucibus odio fringilla dapibus. Ut nec elit eget augue imperdiet pharetra et id quam. Mauris eget mauris est. '),
(35, 'Devante', 'Mauris mauris lacus, ultricies quis consectetur id, dictum quis odio. Nunc turpis erat, ultrices et porta eu, adipiscing eget felis. Sed suscipit convallis egestas. Sed id tortor in diam euismod facilisis sed vel libero.'),
(36, 'Derrick', 'DLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam malesuada quam at enim luctus nec tincidunt odio tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc ornare, tellus sed dapibus fermentum, leo mi lobortis nisi, a scelerisque nulla sem vitae ante.'),
(37, 'Jefferson', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse mollis gravida erat, eget dapibus est cursus at. Sed pulvinar bibendum leo, eget gravida lorem vestibulum pharetra. In hac habitasse platea dictumst. Nam at neque metus.'),
(38, 'Deonte', 'Integer a erat sit amet leo rutrum dictum at in sapien. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec vehicula justo. Mauris urna arcu, molestie a cursus at, fringilla non orci. Duis pellentesque porta massa, eu ultricies ipsum pharetra quis. Aliquam at nulla a nunc accumsan congue at et eros. Donec velit orci, tempor eget tempor id, aliquet in nisi.'),
(39, 'Aden', 'Phasellus fermentum elementum massa sit amet auctor. Suspendisse nec sapien felis. Ut rhoncus sapien a mauris porta interdum. In hac habitasse platea dictumst. Donec ac diam felis. Proin in dolor sem, ut luctus est. Aenean dictum libero sed tellus molestie eu porta elit porta. Proin mattis imperdiet aliquam.'),
(40, 'Joey', 'Duis placerat vulputate sapien ut vehicula. Pellentesque molestie ultricies orci, ac ornare nunc fermentum in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed mattis felis non nibh scelerisque vel luctus libero hendrerit. Nam sed nibh sapien. Donec at sapien quis massa luctus pharetra cursus id neque. '),
(41, 'Oliver', 'Suspendisse massa mauris, lobortis nec gravida non, lobortis ut risus. Nam ut libero et lorem hendrerit suscipit nec vitae neque. Aenean congue aliquet condimentum. Mauris massa odio, mattis at pellentesque at, fringilla ac sem. Vestibulum scelerisque dui ut eros ultrices non tristique nibh imperdiet. Ut faucibus luctus aliquet.'),
(42, 'Archibald', 'Sed ac blandit ligula. Morbi interdum tempus lectus, quis varius ligula facilisis et. Vivamus gravida diam ac enim mattis nec eleifend felis pulvinar. Aenean at velit felis, quis porttitor risus. Proin eros erat, consectetur varius dictum eu, ullamcorper ac tortor. '),
(43, 'Derrick', 'Etiam iaculis eros ut quam mattis cursus. Aliquam a nisi sem. Proin sapien mauris, porttitor id pretium ultricies, tincidunt at orci. Quisque adipiscing mi a leo aliquam eu cursus nisi vulputate. Aliquam id porttitor risus. Quisque in tempus est. Praesent eu arcu vitae lorem mollis vehicula facilisis sit amet nulla. Aenean nisl magna, consequat vitae fermentum sed, aliquam ac elit. Cras consectetur eleifend massa. Phasellus porta nibh at ligula sagittis ut ornare elit accumsan. '),
(44, 'Jefferson', 'Sed non nisl elit. Cras mollis ligula nec tortor pretium eu luctus dolor mollis. Aliquam erat volutpat. Cras malesuada, nulla sed vulputate accumsan, velit leo sagittis nulla, in commodo enim nisi at diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer dapibus egestas dolor'),
(45, 'Deonte', 'Sed lorem arcu, auctor vel egestas eu, ultricies vitae felis. Sed massa magna, placerat a blandit vel, suscipit quis urna. Sed malesuada dignissim eros, quis congue urna tempus sit amet. Morbi eu ligula ac leo tincidunt faucibus. Suspendisse vel lobortis diam. Quisque sodales pretium orci, et blandit lectus volutpat et. Curabitur non ipsum ligula, sit amet placerat nisi. Praesent eget tempus orci.'),
(46, 'Aden', 'Vivamus a augue sed neque varius lobortis vitae a mauris. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque lacinia odio libero, vel bibendum quam. Nunc mattis, orci id dignissim tempor, urna libero feugiat lorem, a dapibus nisi urna vitae libero. Nulla laoreet feugiat rhoncus. Sed tempus magna sed eros pellentesque in dictum erat vestibulum. Aliquam at magna nulla, quis varius ligula. '),
(47, 'Joey', 'Proin volutpat congue blandit. Etiam id risus turpis. Ut elit tortor, volutpat semper porttitor ut, adipiscing ut odio. Vivamus quis leo neque, sed pellentesque libero. Etiam sagittis placerat quam vel bibendum. Curabitur quis mollis felis.'),
(48, 'Oliver', 'Maecenas nec interdum nibh. Suspendisse facilisis semper tellus sed lacinia. Mauris tristique nulla non massa congue pretium. Donec vel sem a massa ultrices fermentum quis et neque. Pellentesque auctor auctor imperdiet. '),
(49, 'Archibald', 'Morbi elementum sem commodo massa ultrices convallis. Aenean condimentum iaculis leo at tristique. Nunc vel nisi at felis semper eleifend. Nam eleifend, sem ac vehicula pellentesque, massa elit ultrices dolor, sit amet interdum neque felis rutrum augue.'),
(50, 'Chinmay', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam metus mauris, vehicula sed ultricies vel, fermentum a purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec et justo et mauris tincidunt elementum at at dui. Phasellus vitae ipsum lorem, non interdum ante. Q'),
(51, 'Mercy', 'Nunc eu augue feugiat quam commodo iaculis. Aenean ut consequat neque, eu consequat felis. Aenean in tristique turpis, eget vestibulum purus. Cras sed bibendum eros. '),
(52, 'Mildred', 'Proin ac tellus ultricies, porta nibh ac, suscipit augue. Curabitur a massa magna. Integer venenatis ante ipsum. Pellentesque sed nibh sed eros pulvinar aliquet sed nec magna'),
(53, 'Minerva', 'estibulum ac ultrices metus. Donec at dignissim mi. Donec hendrerit vestibulum velit et consequat. Donec sed aliquet sem. Suspendisse et ante ac sem gravida tristique.'),
(54, 'Octavia', 'Quisque pulvinar sem sit amet finibus vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut aliquam eu turpis in iaculis'),
(55, 'Elmer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut justo at neque aliquam pretium. Suspendisse imperdiet, elit quis faucibus porta, magna justo tristique augue, nec facilisis velit metus ut quam.'),
(56, 'Phaedra', 'Nam placerat tristique enim, id tincidunt nisl commodo at. Sed convallis ac felis id sollicitudin. Mauris elementum pulvinar lectus vitae mollis. In hac habitasse platea dictumst.'),
(57, 'Pilar', 'Quisque tempus mattis risus quis tempor. Fusce ac libero sed ante lacinia hendrerit. '),
(58, 'Polly', 'Aliquam et pharetra diam. Etiam sed elementum ante, a vulputate erat. Proin fermentum orci quam, quis blandit quam elementum sit amet.'),
(59, 'Portia', 'Fusce tempus venenatis pulvinar. Curabitur condimentum sollicitudin ipsum, quis tempus dolor euismod sed. Aenean est quam, mollis ac sagittis quis, placerat in diam. Nulla facilisi.'),
(60, 'Prudence', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin eu rhoncus quam. Pellentesque gravida mi diam, ut finibus sem volutpat eu. Interdum et malesuada fames ac ante ipsum primis in faucibus. '),
(61, 'Roxanne', 'Donec rutrum metus nec tincidunt efficitur. Fusce faucibus rutrum euismod. Nullam suscipit imperdiet nulla sit amet fermentum.'),
(62, 'Sally', 'Maecenas ac nulla eu diam rutrum semper ut a velit. Vestibulum quis mi velit. Donec volutpat nisi a pretium laoreet. Nam a ullamcorper est. Cum sociis natoque penatibus et magnis dis parturient montes,'),
(63, 'Sheila', 'nascetur ridiculus mus. In nec fringilla nunc, vel dapibus purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. '),
(64, 'Susanna', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam erat volutpat. Proin consequat tempus commodo.'),
(65, 'Susannah', 'Nunc a ligula at odio consectetur consequat non ac neque. Phasellus vulputate rhoncus metus a imperdiet. Curabitur ultrices.'),
(66, 'Suzanne', 'Bibh vel congue ornare, sem lectus commodo orci, ac vestibulum mi ligula nec ligula.'),
(67, 'Annie', 'Cras sed est lobortis arcu fringilla consectetur. Aenean semper, sem id posuere malesuada, ipsum sapien egestas tortor, quis dictum ipsum nibh id diam. Ut venenatis nulla et orci mattis sodales.'),
(68, 'Beatrice', 'Nam id ullamcorper urna. Donec vitae nisl non ipsum gravida malesuada suscipit eget velit. Cras erat eros, imperdiet vel blandit a, elementum a erat.'),
(69, 'Bernard', 'urabitur bibendum turpis at lacus vulputate, a accumsan odio volutpat. Fusce facilisis sapien et nibh lobortis, nec dignissim augue finibus. Quisque id est in nisi luctus lobortis. Vivamus quis venenatis enim.'),
(70, 'Bernice', 'Sed sagittis aliquet odio, ac vulputate nulla feugiat nec. Phasellus ultrices ex vitae risus vestibulum vulputate. Mauris cursus tempus suscipit. Mauris tincidunt vulputate vehicula. Sed luctus congue ante, ut gravida ex mollis eget.'),
(71, 'Betty', 'Praesent eu nibh fermentum, lacinia purus vitae, ultricies arcu. Curabitur cursus, ex vitae tempor aliquet, nulla urna consectetur neque, ut auctor ante tellus nec nibh.'),
(72, 'Edith', 'Cras a pellentesque leo, nec elementum ipsum. Vivamus vestibulum sagittis est. '),
(73, 'Edna', 'Maecenas dignissim tempor augue, vel egestas quam sagittis ac. Mauris finibus ligula id auctor tristique. In eget risus scelerisque, gravida massa ut, pretium urna.'),
(74, 'Eleanor', 'Cras sed est lobortis arcu fringilla consectetur. Aenean semper, sem id posuere malesuada, ipsum sapien egestas tortor, quis dictum ipsum nibh id diam. Ut venenatis nulla et orci mattis sodales. ');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_transaction`
--

CREATE TABLE `paypal_transaction` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `complete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_users`
--

CREATE TABLE `paypal_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `member` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_users`
--

INSERT INTO `paypal_users` (`id`, `username`, `email`, `member`) VALUES
(1, 'Pharoouzy', 'pharoouzy@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photographs`
--

CREATE TABLE `photographs` (
  `id` int(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographs`
--

INSERT INTO `photographs` (`id`, `filename`, `type`, `size`, `caption`) VALUES
(1, 'IMG_20180306_131549.jpg', 'image/jpeg', 39038, 'Odunlade'),
(2, 'Angry_Birds-wallpaper-10911202.jpg', 'image/jpeg', 279923, 'Angry Birds'),
(3, 'IMG_20180306_131721.jpg', 'image/jpeg', 25258, 'Smile boy'),
(5, 'no-image.jpg', 'image/jpeg', 21305, 'No Image'),
(6, 'depr.jpg', 'image/jpeg', 82364, 'Thinking'),
(7, 'IMG_20180306_135154.jpg', 'image/jpeg', 76278, 'Kim'),
(8, 'rc26.png', 'image/png', 240114, 'Bad energy stay away cloth');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` varchar(10) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `dob` datetime NOT NULL,
  `level` int(3) NOT NULL,
  `department` varchar(255) NOT NULL,
  `cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `surname`, `lastname`, `dob`, `level`, `department`, `cgpa`) VALUES
('17/25PB007', 'Abdullahi', 'Abdullateef', '2001-12-13 00:00:00', 200, 'Science Education', 4.32),
('18/30GB037', 'Gold', 'Khalid', '2003-11-23 00:00:00', 100, 'Computer Engineering', 4.45),
('17/25PB021', 'Olatunji', 'Samson', '2001-10-23 00:00:00', 200, 'Science Education', 3.32),
('18/30GB021', 'Adekunle', 'Kabir', '2003-01-12 00:00:00', 100, 'Computer Engineering', 4.67);

-- --------------------------------------------------------

--
-- Table structure for table `uploading`
--

CREATE TABLE `uploading` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploading`
--

INSERT INTO `uploading` (`id`, `name`, `email`, `file_name`) VALUES
(1, 'Umar', 'umar@yahoo.com', '/assets/images/candidates/umar.jpg'),
(2, 'Umar24', 'umar@yahoo.com', 'umar24.jpg'),
(3, 'umar-farouq', 'umar12@yahoo.com', 'umar-farouq.jpg'),
(4, 'hjg', 'umar@yahoo.com', 'hjg.jpg'),
(5, 'zeedah', 'zeedah@gmail.com', 'zeedah.png'),
(6, 'zeedah2', 'zeedah@gmail.com', 'zeedah2.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'Pharoouzy', '92deb3f274aaee236194c05729bfa443', 'Umar-Farouq', 'Yusuf'),
(4, 'RicheyPro', '1234', 'Okoh', 'Micheal');

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `id` int(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`id`, `username`, `password`, `email`, `gender`, `dob`) VALUES
(7, 'Yusuf', '92deb3f274aaee236194c05729bfa443', 'yusufumarfarouq@yahoo.com', 'Male', '22-Jun-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photograph_id` (`photograph_id`);

--
-- Indexes for table `paginate`
--
ALTER TABLE `paginate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_transaction`
--
ALTER TABLE `paypal_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_users`
--
ALTER TABLE `paypal_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photographs`
--
ALTER TABLE `photographs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploading`
--
ALTER TABLE `uploading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paginate`
--
ALTER TABLE `paginate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `paypal_transaction`
--
ALTER TABLE `paypal_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_users`
--
ALTER TABLE `paypal_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photographs`
--
ALTER TABLE `photographs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uploading`
--
ALTER TABLE `uploading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
