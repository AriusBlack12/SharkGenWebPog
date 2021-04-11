-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2017 at 11:36 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arrowalt_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `18`
--

CREATE TABLE `18` (
  `id` int(11) NOT NULL,
  `alt` varchar(1000) DEFAULT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `18`
--

INSERT INTO `18` (`id`, `alt`, `status`) VALUES
(1, 'atul.akgec89@gmail.com:atul2211\r', 1),
(2, 'vradadeya@yahoo.com:vinay123\r', 1),
(3, 'krjaysukh@rediffmail.com:jay211080\r', 1),
(4, 'vishav_r4985@yahoo.com:vishav4985\r', 1),
(5, 'cashobhitm@gmail.com:24091975\r', 1),
(6, 'mmayank_jain8@rediffmail.com:mayankjain\r', 1),
(7, 'soni.prakash143@yahoo.com:soni80032\r', 1),
(8, 'monuhazaribag@gmail.com:9934158864\r', 1),
(9, 'swapnilkarekar008@yahoo.com:nandini\r', 1),
(10, 'mahalingam.mudaliar@gmail.com:dhiraj98\r', 1),
(11, 'niteshrathi2112@gmail.com:9893701886\r', 1),
(12, 'hitraj29@yahoo.com:saiharisai\r', 1),
(13, 'joncolohan@gmail.com:bluemans\r', 1),
(14, 'shalini_alok@rediffmail.com:neelam\r', 1),
(15, 'drvivek1985@gmail.com:10101983\r', 1),
(16, 'ajitsingh63@gmail.com:ajit1984\r', 1),
(17, 'skhowal@gmail.com:skhowal77\r', 1),
(18, 'guptashivmohan@yahoo.co.in:shiv8449c\r', 1),
(19, 'manojdiwakar13@gmail.com:420786\r', 1),
(20, 'sanjay.kumar2015@yahoo.co.in:neeraj24#\r', 1),
(21, 'kamlesh.panchal@btinternet.com:TEJAS12595\r', 1),
(22, 'dinanath89@in.com:9873262108\r', 1),
(23, 'yash_thakre@yahoo.com:221122\r', 1),
(24, 'madhav.anuj@gmail.com:anujsharma\r', 1),
(25, 'abansal0208@gmail.com:9837205795\r', 1),
(26, 'maddy.choudhary007@gmail.com:9812352506\r', 1),
(27, 'vikash37@hotmail.com:panasonic\r', 1),
(28, 'devs911@yahoo.co.in:caliber901\r', 1),
(29, 'gaurav_jj@hotmail.com:08011981\r', 1),
(30, 'suhas1885@gmail.com:shraddha\r', 1),
(31, 'pradeep.sharma.rss@gmail.com:Prem1202\r', 1),
(32, 'rahulbe20@yahoo.com:46664341\r', 1),
(33, 'anjuvijay2k6@gmail.com:ishika2k6\r', 1),
(34, 'rahul_rhl@rediffmail.com:balaji.51\r', 1),
(35, 'luv2u_s@yahoo.com:123456\r', 1),
(36, 'fruitywala@yahoo.com:purvi95\r', 1),
(37, 'blpc32@gmail.com:22356072\r', 1),
(38, 'manishtrpth0@gmail.com:07071993\r', 1),
(39, 'kalpesh_raval@rediffmail.com:2XYrcpz1\r', 1),
(40, 'rameshanshu@hotmail.com:hyderabad4\r', 1),
(41, 'gpt.1729@gmail.com:shrihans\r', 1),
(42, 'munshichintan@gmail.com:jenny123\r', 1),
(43, 'anirudhkaki@gmail.com:ars138\r', 1),
(44, 'msmukesh.solanki@gmail.com:jivansuman\r', 1),
(45, 'anmollamba18@gmail.com:gingin\r', 1),
(46, 'kmlsharma992@gmail.com:234234\r', 1),
(47, 'umangdixitajm@yahoo.com:ratsemit\r', 1),
(48, 'mancthomas@aol.com:london22\r', 1),
(49, 'luigi-ish@hotmail.com:cherely\r', 1),
(50, 'odavies81@hotmail.com:aelydon2\r', 1),
(51, 'suzypal@hotmail.co.uk:jasonluke\r', 1),
(52, 'makedoniza@aol.com:koukla\r', 1),
(53, 'bzh45000@hotmail.fr:010875\r', 1),
(54, 'kimberz-21@hotmail.co.uk:kimbers1986\r', 1),
(55, 'Knowsleyman1@hotmail.co.uk:monarch13\r', 1),
(56, 'wzm@gmx.net:februar\r', 1),
(57, 'cristhin66@hotmail.com:25455885z\r', 1),
(58, 'martini_armando@libero.it:rossella\r', 1),
(59, 'jackiedebrown@hotmail.com:motdepasse\r', 1),
(60, 'uzmashahzadi@hotmail.com:whereru\r', 1),
(61, 'jumojn@hotmail.com:albert12\r', 1),
(62, 'magua025@yahoo.fr:laureparis\r', 1),
(63, 'h.angermaier@googlemail.com:augustiner\r', 1),
(64, 'kk502@york.ac.uk:khazanchi\r', 1),
(65, 'starxxx@hotmail.co.jp:asasas\r', 1),
(66, 'cobra140@free.fr:140954\r', 1),
(67, 'craig_hamil@hotmail.co.uk:corsair\r', 1),
(68, 'bedford1982@live.co.uk:hollie\r', 1),
(69, 'tiestointhemix@hotmail.com:spiderman79\r', 1),
(70, 'feddy-frey@web.de:01762721\r', 1),
(71, 'j_inno@hotmail.co.uk:james123\r', 1),
(72, 'ti_nano@hotmail.fr:roulette\r', 1),
(73, 'bobfarrell27@hotmail.com:abbyellie\r', 1),
(74, 'lauren_alric@hotmail.fr:scotty\r', 1),
(75, 'k_ane4ka@yahoo.co.uk:andrej\r', 1),
(76, 'lobo_bueno_20@hotmail.com:arregui\r', 1),
(77, 'uzmamalik74@gmail.com:fahadmohid\r', 1),
(78, 'laura0711@hotmail.com:123hazel\r', 1),
(79, 'sweetplayer44@hotmail.de:jigolo88\r', 1),
(80, 'rasam3@hotmail.com:sanju267\r', 1),
(81, 'beccy_cran@hotmail.co.uk:3oakwoodclose\r', 1),
(82, 'cany43@hotmail.com:sommar4\r', 1),
(83, 'Samantha.Hornung@hotmail.de:Mondschein92\r', 1),
(84, 'oygur_ch@hotmail.com:rnhe5851\r', 1),
(85, 'jopfi22@hotmail.com:joacc19\r', 1),
(86, 'keevesy@aol.com:crownhouse\r', 1),
(87, 'GamerArtur@web.de:wsadah10\r', 1),
(88, 'nuttergage@yahoo.com:lucozade\r', 1),
(89, 'j.burprich@web.de:johann1\r', 1),
(90, 'jaynehipple@hotmail.com:billyboy\r', 1),
(91, 'j_smithson@sky.com:adamadam\r', 1),
(92, 'mickyjennings@hotmail.co.uk:liverpool\r', 1),
(93, 'izamimi@hotmail.fr:230705t\r', 1),
(94, 'jhacharan@gmail.com:jha12345\r', 1),
(95, 'gauravarian@gmail.com:penbird25\r', 1),
(96, 'nagdp@yahoo.com:nag1947\r', 1),
(97, 'rajeevbombay@gmail.com:sidhwalia\r', 1),
(98, 'jindal20042003@hotmail.com:232793deepak\r', 1),
(99, 'manojkr2410@gmail.com:789456\r', 1),
(100, 'rishabhchaturvedi87@gmail.com:rishabh123\r', 1),
(101, 'anshu.478@rediffmail.com:anshudev\r', 1),
(102, 'lokesh.mehta27@gmail.com:9891697520\r', 1),
(103, 'ENTERPRISES.RAKESH@GMAIL.COM:9413310884\r', 1),
(104, 'niatbikram@gmail.com:9937868745\r', 1),
(105, 'kirit126@hotmail.com:bhav0210\r', 1),
(106, 'jay4min2@aol.com:apple147\r', 1),
(107, 'kumardavinder@gmail.com:1sonipat\r', 1),
(108, 'mineshpatel1973@yahoo.co.in:mj123456\r', 1),
(109, 'mittal_anup@hotmail.com:24122004\r', 1),
(110, 'jogia57@yahoo.co.uk:devdarsh57\r', 1),
(111, 'yogendra_s1979@yahoo.co.in:123654\r', 1),
(112, 'raj_hns@rediffmail.com:computer\r', 1),
(113, 'vikas.panda91@gmail.com:22sept1991\r', 1),
(114, 'anuj8987@gmail.com:sardar\r', 1),
(115, 'shashanksameeraj@gmail.com:veerasonu\r', 1),
(116, 'gagankansal@yahoo.com:tetfemtec\r', 1),
(117, 'Golu323@yahoo.in:15071955\r', 1),
(118, 'baboo.rughoo@yahoo.fr:ashoka\r', 1),
(119, 'amitkantrastogi@gmail.com:9897312814\r', 1),
(120, 'harvir0880@gmail.com:singh0880\r', 1),
(121, 'rajat.saxena.007@gmail.com:mobile\r', 1),
(122, 'dhriti.dewan@yahoo.co.in:toshaanid\r', 1),
(123, 'khare05@yahoo.com:81868186\r', 1),
(124, 'joshi07@rediffmail.com:259649\r', 1),
(125, 'siddshub@gmail.com:Shubshup93\r', 1),
(126, 'praveen.236@rediffmail.com:9359226804\r', 1),
(127, 'nautanurag@yahoo.com:gypsy123\r', 1),
(128, 'aashu46@ymail.com:13091987\r', 1),
(129, 'dishachatha@ymail.com:JASPREET\r', 1),
(130, 'bharathjain06@gmail.com:shantilal\r', 1),
(131, 'kish51solanki@hotmail.com:togoforit\r', 1),
(132, 'manas.orissa@gmail.com:manas51074\r', 1),
(133, 'rpy1993@gmail.com:9044018556\r', 1),
(134, 'princeradhe@yahoo.com:namdev.55\r', 1),
(135, 'sanjeev06@gmail.com:sanju75\r', 1),
(136, 'sharma367@yahoo.co.in:05051971\r', 1),
(137, 'naikmp@gmail.com:mpn10670\r', 1),
(138, 'parmodbali@gmail.com:209481\r', 1),
(139, 'els.saunate@gmail.com:ganesha27\r', 1),
(140, 'ajjukalantri@gmail.com:ajk123\r', 1),
(141, 'heramg@yahoo.com:mahesh\r', 1),
(142, 'arpitxptl@yahoo.com:hemxptl\r', 1),
(143, 'upadhya.rajesh@gmail.com:raj9909\r', 1),
(144, 'arvind.mistry@talk21.com:12stones\r', 1),
(145, 'vishnukr1984@gmail.com:233468\r', 1),
(146, 'tonmoydey2009@gmail.com:dimple\r', 1),
(147, 'rakeshkumarmadaan@yahoo.co.in:madaan\r', 1),
(148, 'surbhisiya@gmail.com:03072008\r', 1),
(149, 'david.dixen@yahoo.co.in:jagUAR1!\r', 1),
(150, 'abhishekaayush@gmail.com:9210791626\r', 1),
(151, 'beekapuria@gmail.com:31101986\r', 1),
(152, 'mr.sanjeevmishra1984@gmail.com:29051984\r', 1),
(153, 'youmelife@gmail.com:dilsameer\r', 1),
(154, 'ashish170185@gmail.com:181188\r', 1),
(155, 'aparna.lahane@gmail.com:Nklmnl\r', 1),
(156, 'sanjeev.login@gmail.com:shaleen\r', 1),
(157, 'bkgupta1@gmail.com:rohitraj\r', 1),
(158, 'vishnuyasha@yahoo.co.in:kalkii\r', 1),
(159, 'nit.gautam@gmail.com:041085\r', 1),
(160, 'dineshkamothe@gmail.com:manju321\r', 1),
(161, 'satish_salian_1998@yahoo.com:satish1965\r', 1),
(162, 'Pawankumar376@gmail.com:22829079\r', 1),
(163, 'bmbhatt100@yahoo.com:bmb12345\r', 1),
(164, 'ashok_deep@yahoo.com:pnb68905\r', 1),
(165, 'padaki.jk@gmail.com:jknjpj01\r', 1),
(166, 'viz_singh21@yahoo.co.in:viz735249\r', 1),
(167, 'anjnamadhani@hotmail.com:kunaal\r', 1),
(168, 'malbaraiz-vely@live.fr:sanglimini\r', 1),
(169, 'shry2717@rediff.com:aug024\r', 1),
(170, 'dryogeshgpatel@gmail.com:satya1234\r', 1),
(171, 'kanchanshashi1978@yahoo.com:Shashi123\r', 1),
(172, 'rajnishdeora@yahoo.com:1lancer1m\r', 1),
(173, 'inder5600@yahoo.co.in:inder6520\r', 1),
(174, 'sohan653@gmail.com:sohan123\r', 1),
(175, 'kr_ajay61@yahoo.co.in:12345a\r', 1),
(176, 'nehal_d_shah@yahoo.co.in:easypass\r', 1),
(177, 'santoshchaubey7@gmail.com:Infosys123\r', 1),
(178, 'anchul.choursiya@gmail.com:jaimatadi9\r', 1),
(179, 'raazpundhir.a@gmail.com:9758083208\r', 1),
(180, 'vikastrivedi.2010@gmail.com:9039072673\r', 1),
(181, 'narayanan_isro@yahoo.co.in:myna4751\r', 1),
(182, 'anant6689@gmail.com:anant123\r', 1),
(183, 'ashish2208@gmail.com:venfield\r', 1),
(184, 'rakeshassociate@yahoo.co.in:rkag1370\r', 1),
(185, 'shreyanshyash@gmail.com:05082003\r', 1),
(186, 'sundeepm@live.com:hindustani\r', 1),
(187, 'ylhnet@streamyx.com:ylh0800\r', 1),
(188, 'jmarcos-arg@msn.com:jmarcos90\r', 1),
(189, 'bazrose1049@aol.com:patou312\r', 1),
(190, 'green_mosquito@hotmail.com:pearljam\r', 1),
(191, 'Laura_Jane_Manley@hotmail.com:hannah\r', 1),
(192, 'emkml185@aol.com:meland12\r', 1),
(193, 'exor_skmoore@hotmail.com:bitter\r', 1),
(194, 'kohtiengui@hotmail.com:pinegrove\r', 1),
(195, 'presto2k@hotmail.com:skaterboi\r', 1),
(196, 'larverikke@hotmail.com:Tosen100\r', 1),
(197, 'laurent70300@aol.com:fabian\r', 1),
(198, 'knuxles@hotmail.com:nukels5\r', 1),
(199, 'naamisingebruik@hotmail.com:8letters\r', 1),
(200, 'jmgm86_1@hotmail.com:200386\r', 1),
(201, 'arouj_javaid@hotmail.com:zindagy\r', 1),
(202, 'lorenzo91700@aol.com:041282\r', 1),
(203, 'ahmed_cherifi@hotmail.com:nacerabaali71\r', 1),
(204, 'evt24@hotmail.com:pollo00\r', 1),
(205, 'laura-jayne.mcdonald@sky.com:matt1208\r', 1),
(206, 'gseaforth@hotmail.com:thfc210259\r', 1),
(207, 'shilpilatawa@yahoo.com:shalimar\r', 1),
(208, 'chattylittleminx@hotmail.com:remember\r', 1),
(209, 'david@douglas-uk.com:girlsontop\r', 1),
(210, 'sheryl.foster8@googlemail.com:danielle\r', 1),
(211, 'dany_strike@hotmail.com:dany1111\r', 1),
(212, 'fernansegura1987@gmail.com:fer1987\r', 1),
(213, 'salsa@fsmail.net:gollum\r', 1),
(214, 'adam_jackman@hotmail.com:digitals\r', 1),
(215, 'satto001@hotmail.com:flannel1\r', 1),
(216, 'fastspin@btinternet.com:vaskina\r', 1),
(217, 'mide_k@hotmail.com:mide2950\r', 1),
(218, 'puffertrain@aol.com:black545110\r', 1),
(219, 'oshahov_19@yahoo.com:SRO6ahov\r', 1),
(220, 'grunder@gmx.net:130679\r', 1),
(221, 'jackyjalin@msn.com:planchon\r', 1),
(222, 'golimpiogo@hotmail.com:piopio\r', 1),
(223, 'geoff457@hotmail.com:copycat\r', 1),
(224, 'markedwards31@hotmail.com:25937052\r', 1),
(225, 'nikkismith79@hotmail.com:brunette\r', 1),
(226, 'gcglindop@aol.com:4r14dnb\r', 1),
(227, 'jawra@hotmail.com:2222\r', 1),
(228, 'j-pedro@live.com.pt:jpsn1998\r', 1),
(229, 'ismailbuga@yahoo.com:adanali\r', 1),
(230, 'g.mletham@supanet.com:terminator\r', 1),
(231, 'lfpowell@btconnect.com:cleopatra1\r', 1),
(232, 'samuel_pouch@hotmail.com:patrick7\r', 1),
(233, 'isis2012@hotmail.com:poisson\r', 1),
(234, 'cgaffey@hotmail.com:kingshead\r', 1),
(235, 'stealth123@hotmail.com:111111\r', 1),
(236, 'emjonesbentley@aol.com:bentley\r', 1),
(237, 'lisacook185@btinternet.com:welcome12\r', 1),
(238, 'pmusyokaus@yahoo.com:501501\r', 1),
(239, 'ninz16@hotmail.com:percy1\r', 1),
(240, 'gerd.neurode@gmx.net:FISCHE\r', 1),
(241, 'purdisamra@hotmail.com:handbags1\r', 1),
(242, 'drummer_girl_emz@hotmail.com:highhonours\r', 1),
(243, 'ashkhan75@hotmail.com:mak78612\r', 1),
(244, 'davidarora@sky.com:mohamed1\r', 1),
(245, 'itteongp@hotmail.com:300179p\r', 1),
(246, 'aristegi2001@hotmail.com:maradona\r', 1),
(247, 'ydefontain@aol.com:defontx\r', 1),
(248, 'gsgolus@hotmail.com:Chamber1s\r', 1),
(249, 'satoshi_0125@hotmail.com:cbb77820\r', 1),
(250, 'snodders@btinternet.com:23310818\r', 1),
(251, 'ledingue8@hotmail.com:pastrana199\r', 1),
(252, 'gstoehl.alexander@hotmail.com:dimmer\r', 1),
(253, 'dundeekev67@yahoo.com:derryboy67\r', 1),
(254, 'julia62jones@hotmail.com:vancouver\r', 1),
(255, 'shock_lw@hotmail.com:gngzny25\r', 1),
(256, 'kyko05@yahoo.com:vraimoi\r', 1),
(257, 'andy.j.smith@convergys.com:niamh110601\r', 1),
(258, 'garrys2007@hotmail.com:170340\r', 1),
(259, 'natleeobrien@aol.com:musician\r', 1),
(260, 'bhlawrence@talk21.com:reaper\r', 1),
(261, 'jjh151073@yahoo.com:escapade\r', 1),
(262, 'ohagan@onetel.com:barney\r', 1),
(263, 'sharonbursill@hotmail.com:CHILTERN\r', 1),
(264, 'danny.abunai@googlemail.com:sense1989\r', 1),
(265, 'josephmco@hotmail.com:craken\r', 1),
(266, 'emma@orange.net:Barney01\r', 1),
(267, 'laf_out_louder@hotmail.com:umberella\r', 1),
(268, 'pwahlbrink@gmail.com:Eldon1977\r', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banned`
--

CREATE TABLE `banned` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banned`
--

INSERT INTO `banned` (`id`, `username`, `ip`, `date`) VALUES
(13, 'geniso', '82.231.76.176', '2017-09-04 00:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `changepwd`
--

CREATE TABLE `changepwd` (
  `date` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `used` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `ip` varchar(15) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`ip`, `timestamp`) VALUES
('82.231.76.176', 1505597661);

-- --------------------------------------------------------

--
-- Table structure for table `connects`
--

CREATE TABLE `connects` (
  `bestview` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connects`
--

INSERT INTO `connects` (`bestview`, `date`) VALUES
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `generators`
--

CREATE TABLE `generators` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `color` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'blue'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `generators`
--

INSERT INTO `generators` (`id`, `name`, `color`) VALUES
(18, 'Example', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `username` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `os` varchar(30) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`username`, `ip`, `os`, `datetime`) VALUES
('admin', '82.231.76.176', 'Windows', '2017-09-16 23:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `color` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'red',
  `title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `message` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `hour` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `date` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `writer` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `color`, `title`, `message`, `hour`, `date`, `datetime`, `writer`) VALUES
(14, 'red', 'esfsef', 'esfsef', '20:05', '17-08-2017', '2017-08-17 20:05:56', 'admin'),
(15, 'red', 'Testse', 'testestse', '20:06', '17-08-2017', '2017-08-17 20:06:40', 'testesset'),
(16, 'green', 'Z-Gen', 'Thanks for purchase !', '03:40', '19-08-2017', '2017-08-19 03:40:20', 'H2M');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `color` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'normal',
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `price` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `length` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `generator` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `generations` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `haspriv` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'no',
  `privgenerations` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `exptime` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `color`, `name`, `price`, `length`, `generator`, `generations`, `haspriv`, `privgenerations`, `exptime`) VALUES
(11, 'red', 'Lifetime', '10.50', 'Lifetime', 'all', '100', 'yes', '', ''),
(2, 'orange', 'Orange', '4', '1 Month', 'all', '100', 'yes', '3', ''),
(16, 'normal', 'Violet', '1', '1 Day', 'all', '100', 'no', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `priv22`
--

CREATE TABLE `priv22` (
  `id` int(11) NOT NULL,
  `alt` varchar(1000) DEFAULT NULL,
  `status` int(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priv22`
--

INSERT INTO `priv22` (`id`, `alt`, `status`) VALUES
(1, 'Combo List 2\r', 1),
(2, '\r', 1),
(3, 'atul.akgec89@gmail.com:atul2211\r', 1),
(4, 'vradadeya@yahoo.com:vinay123\r', 1),
(5, 'krjaysukh@rediffmail.com:jay211080\r', 1),
(6, 'vishav_r4985@yahoo.com:vishav4985\r', 1),
(7, 'cashobhitm@gmail.com:24091975\r', 1),
(8, 'mmayank_jain8@rediffmail.com:mayankjain\r', 1),
(9, 'soni.prakash143@yahoo.com:soni80032\r', 1),
(10, 'monuhazaribag@gmail.com:9934158864\r', 1),
(11, 'swapnilkarekar008@yahoo.com:nandini\r', 1),
(12, 'mahalingam.mudaliar@gmail.com:dhiraj98\r', 1),
(13, 'niteshrathi2112@gmail.com:9893701886\r', 1),
(14, 'hitraj29@yahoo.com:saiharisai\r', 1),
(15, 'joncolohan@gmail.com:bluemans\r', 1),
(16, 'shalini_alok@rediffmail.com:neelam\r', 1),
(17, 'drvivek1985@gmail.com:10101983\r', 1),
(18, 'ajitsingh63@gmail.com:ajit1984\r', 1),
(19, 'skhowal@gmail.com:skhowal77\r', 1),
(20, 'guptashivmohan@yahoo.co.in:shiv8449c\r', 1),
(21, 'manojdiwakar13@gmail.com:420786\r', 1),
(22, 'sanjay.kumar2015@yahoo.co.in:neeraj24#\r', 1),
(23, 'kamlesh.panchal@btinternet.com:TEJAS12595\r', 1),
(24, 'dinanath89@in.com:9873262108\r', 1),
(25, 'yash_thakre@yahoo.com:221122\r', 1),
(26, 'madhav.anuj@gmail.com:anujsharma\r', 1),
(27, 'abansal0208@gmail.com:9837205795\r', 1),
(28, 'maddy.choudhary007@gmail.com:9812352506\r', 1),
(29, 'vikash37@hotmail.com:panasonic\r', 1),
(30, 'devs911@yahoo.co.in:caliber901\r', 1),
(31, 'gaurav_jj@hotmail.com:08011981\r', 1),
(32, 'suhas1885@gmail.com:shraddha\r', 1),
(33, 'pradeep.sharma.rss@gmail.com:Prem1202\r', 1),
(34, 'rahulbe20@yahoo.com:46664341\r', 1),
(35, 'anjuvijay2k6@gmail.com:ishika2k6\r', 1),
(36, 'rahul_rhl@rediffmail.com:balaji.51\r', 1),
(37, 'luv2u_s@yahoo.com:123456\r', 1),
(38, 'fruitywala@yahoo.com:purvi95\r', 1),
(39, 'blpc32@gmail.com:22356072\r', 1),
(40, 'manishtrpth0@gmail.com:07071993\r', 1),
(41, 'kalpesh_raval@rediffmail.com:2XYrcpz1\r', 1),
(42, 'rameshanshu@hotmail.com:hyderabad4\r', 1),
(43, 'gpt.1729@gmail.com:shrihans\r', 1),
(44, 'munshichintan@gmail.com:jenny123\r', 1),
(45, 'anirudhkaki@gmail.com:ars138\r', 1),
(46, 'msmukesh.solanki@gmail.com:jivansuman\r', 1),
(47, 'anmollamba18@gmail.com:gingin\r', 1),
(48, 'kmlsharma992@gmail.com:234234\r', 1),
(49, 'umangdixitajm@yahoo.com:ratsemit\r', 1),
(50, 'mancthomas@aol.com:london22\r', 1),
(51, 'luigi-ish@hotmail.com:cherely\r', 1),
(52, 'odavies81@hotmail.com:aelydon2\r', 1),
(53, 'suzypal@hotmail.co.uk:jasonluke\r', 1),
(54, 'makedoniza@aol.com:koukla\r', 1),
(55, 'bzh45000@hotmail.fr:010875\r', 1),
(56, 'kimberz-21@hotmail.co.uk:kimbers1986\r', 1),
(57, 'Knowsleyman1@hotmail.co.uk:monarch13\r', 1),
(58, 'wzm@gmx.net:februar\r', 1),
(59, 'cristhin66@hotmail.com:25455885z\r', 1),
(60, 'martini_armando@libero.it:rossella\r', 1),
(61, 'jackiedebrown@hotmail.com:motdepasse\r', 1),
(62, 'uzmashahzadi@hotmail.com:whereru\r', 1),
(63, 'jumojn@hotmail.com:albert12\r', 1),
(64, 'magua025@yahoo.fr:laureparis\r', 1),
(65, 'h.angermaier@googlemail.com:augustiner\r', 1),
(66, 'kk502@york.ac.uk:khazanchi\r', 1),
(67, 'starxxx@hotmail.co.jp:asasas\r', 1),
(68, 'cobra140@free.fr:140954\r', 1),
(69, 'craig_hamil@hotmail.co.uk:corsair\r', 1),
(70, 'bedford1982@live.co.uk:hollie\r', 1),
(71, 'tiestointhemix@hotmail.com:spiderman79\r', 1),
(72, 'feddy-frey@web.de:01762721\r', 1),
(73, 'j_inno@hotmail.co.uk:james123\r', 1),
(74, 'ti_nano@hotmail.fr:roulette\r', 1),
(75, 'bobfarrell27@hotmail.com:abbyellie\r', 1),
(76, 'lauren_alric@hotmail.fr:scotty\r', 1),
(77, 'k_ane4ka@yahoo.co.uk:andrej\r', 1),
(78, 'lobo_bueno_20@hotmail.com:arregui\r', 1),
(79, 'uzmamalik74@gmail.com:fahadmohid\r', 1),
(80, 'laura0711@hotmail.com:123hazel\r', 1),
(81, 'sweetplayer44@hotmail.de:jigolo88\r', 1),
(82, 'rasam3@hotmail.com:sanju267\r', 1),
(83, 'beccy_cran@hotmail.co.uk:3oakwoodclose\r', 1),
(84, 'cany43@hotmail.com:sommar4\r', 1),
(85, 'Samantha.Hornung@hotmail.de:Mondschein92\r', 1),
(86, 'oygur_ch@hotmail.com:rnhe5851\r', 1),
(87, 'jopfi22@hotmail.com:joacc19\r', 1),
(88, 'keevesy@aol.com:crownhouse\r', 1),
(89, 'GamerArtur@web.de:wsadah10\r', 1),
(90, 'nuttergage@yahoo.com:lucozade\r', 1),
(91, 'j.burprich@web.de:johann1\r', 1),
(92, 'jaynehipple@hotmail.com:billyboy\r', 1),
(93, 'j_smithson@sky.com:adamadam\r', 1),
(94, 'mickyjennings@hotmail.co.uk:liverpool\r', 1),
(95, 'izamimi@hotmail.fr:230705t\r', 1),
(96, 'jhacharan@gmail.com:jha12345\r', 1),
(97, 'gauravarian@gmail.com:penbird25\r', 1),
(98, 'nagdp@yahoo.com:nag1947\r', 1),
(99, 'rajeevbombay@gmail.com:sidhwalia\r', 1),
(100, 'jindal20042003@hotmail.com:232793deepak\r', 1),
(101, 'manojkr2410@gmail.com:789456\r', 1),
(102, 'rishabhchaturvedi87@gmail.com:rishabh123\r', 1),
(103, 'anshu.478@rediffmail.com:anshudev\r', 1),
(104, 'lokesh.mehta27@gmail.com:9891697520\r', 1),
(105, 'ENTERPRISES.RAKESH@GMAIL.COM:9413310884\r', 1),
(106, 'niatbikram@gmail.com:9937868745\r', 1),
(107, 'kirit126@hotmail.com:bhav0210\r', 1),
(108, 'jay4min2@aol.com:apple147\r', 1),
(109, 'kumardavinder@gmail.com:1sonipat\r', 1),
(110, 'mineshpatel1973@yahoo.co.in:mj123456\r', 1),
(111, 'mittal_anup@hotmail.com:24122004\r', 1),
(112, 'jogia57@yahoo.co.uk:devdarsh57\r', 1),
(113, 'yogendra_s1979@yahoo.co.in:123654\r', 1),
(114, 'raj_hns@rediffmail.com:computer\r', 1),
(115, 'vikas.panda91@gmail.com:22sept1991\r', 1),
(116, 'anuj8987@gmail.com:sardar\r', 1),
(117, 'shashanksameeraj@gmail.com:veerasonu\r', 1),
(118, 'gagankansal@yahoo.com:tetfemtec\r', 1),
(119, 'Golu323@yahoo.in:15071955\r', 1),
(120, 'baboo.rughoo@yahoo.fr:ashoka\r', 1),
(121, 'amitkantrastogi@gmail.com:9897312814\r', 1),
(122, 'harvir0880@gmail.com:singh0880\r', 1),
(123, 'rajat.saxena.007@gmail.com:mobile\r', 1),
(124, 'dhriti.dewan@yahoo.co.in:toshaanid\r', 1),
(125, 'khare05@yahoo.com:81868186\r', 1),
(126, 'joshi07@rediffmail.com:259649\r', 1),
(127, 'siddshub@gmail.com:Shubshup93\r', 1),
(128, 'praveen.236@rediffmail.com:9359226804\r', 1),
(129, 'nautanurag@yahoo.com:gypsy123\r', 1),
(130, 'aashu46@ymail.com:13091987\r', 1),
(131, 'dishachatha@ymail.com:JASPREET\r', 1),
(132, 'bharathjain06@gmail.com:shantilal\r', 1),
(133, 'kish51solanki@hotmail.com:togoforit\r', 1),
(134, 'manas.orissa@gmail.com:manas51074\r', 1),
(135, 'rpy1993@gmail.com:9044018556\r', 1),
(136, 'princeradhe@yahoo.com:namdev.55\r', 1),
(137, 'sanjeev06@gmail.com:sanju75\r', 1),
(138, 'sharma367@yahoo.co.in:05051971\r', 1),
(139, 'naikmp@gmail.com:mpn10670\r', 1),
(140, 'parmodbali@gmail.com:209481\r', 1),
(141, 'els.saunate@gmail.com:ganesha27\r', 1),
(142, 'ajjukalantri@gmail.com:ajk123\r', 1),
(143, 'heramg@yahoo.com:mahesh\r', 1),
(144, 'arpitxptl@yahoo.com:hemxptl\r', 1),
(145, 'upadhya.rajesh@gmail.com:raj9909\r', 1),
(146, 'arvind.mistry@talk21.com:12stones\r', 1),
(147, 'vishnukr1984@gmail.com:233468\r', 1),
(148, 'tonmoydey2009@gmail.com:dimple\r', 1),
(149, 'rakeshkumarmadaan@yahoo.co.in:madaan\r', 1),
(150, 'surbhisiya@gmail.com:03072008\r', 1),
(151, 'david.dixen@yahoo.co.in:jagUAR1!\r', 1),
(152, 'abhishekaayush@gmail.com:9210791626\r', 1),
(153, 'beekapuria@gmail.com:31101986\r', 1),
(154, 'mr.sanjeevmishra1984@gmail.com:29051984\r', 1),
(155, 'youmelife@gmail.com:dilsameer\r', 1),
(156, 'ashish170185@gmail.com:181188\r', 1),
(157, 'aparna.lahane@gmail.com:Nklmnl\r', 1),
(158, 'sanjeev.login@gmail.com:shaleen\r', 1),
(159, 'bkgupta1@gmail.com:rohitraj\r', 1),
(160, 'vishnuyasha@yahoo.co.in:kalkii\r', 1),
(161, 'nit.gautam@gmail.com:041085\r', 1),
(162, 'dineshkamothe@gmail.com:manju321\r', 1),
(163, 'satish_salian_1998@yahoo.com:satish1965\r', 1),
(164, 'Pawankumar376@gmail.com:22829079\r', 1),
(165, 'bmbhatt100@yahoo.com:bmb12345\r', 1),
(166, 'ashok_deep@yahoo.com:pnb68905\r', 1),
(167, 'padaki.jk@gmail.com:jknjpj01\r', 1),
(168, 'viz_singh21@yahoo.co.in:viz735249\r', 1),
(169, 'anjnamadhani@hotmail.com:kunaal\r', 1),
(170, 'malbaraiz-vely@live.fr:sanglimini\r', 1),
(171, 'shry2717@rediff.com:aug024\r', 1),
(172, 'dryogeshgpatel@gmail.com:satya1234\r', 1),
(173, 'kanchanshashi1978@yahoo.com:Shashi123\r', 1),
(174, 'rajnishdeora@yahoo.com:1lancer1m\r', 1),
(175, 'inder5600@yahoo.co.in:inder6520\r', 1),
(176, 'sohan653@gmail.com:sohan123\r', 1),
(177, 'kr_ajay61@yahoo.co.in:12345a\r', 1),
(178, 'nehal_d_shah@yahoo.co.in:easypass\r', 1),
(179, 'santoshchaubey7@gmail.com:Infosys123\r', 1),
(180, 'anchul.choursiya@gmail.com:jaimatadi9\r', 1),
(181, 'raazpundhir.a@gmail.com:9758083208\r', 1),
(182, 'vikastrivedi.2010@gmail.com:9039072673\r', 1),
(183, 'narayanan_isro@yahoo.co.in:myna4751\r', 1),
(184, 'anant6689@gmail.com:anant123\r', 1),
(185, 'ashish2208@gmail.com:venfield\r', 1),
(186, 'rakeshassociate@yahoo.co.in:rkag1370\r', 1),
(187, 'shreyanshyash@gmail.com:05082003\r', 1),
(188, 'sundeepm@live.com:hindustani\r', 1),
(189, 'ylhnet@streamyx.com:ylh0800\r', 1),
(190, 'jmarcos-arg@msn.com:jmarcos90\r', 1),
(191, 'bazrose1049@aol.com:patou312\r', 1),
(192, 'green_mosquito@hotmail.com:pearljam\r', 1),
(193, 'Laura_Jane_Manley@hotmail.com:hannah\r', 1),
(194, 'emkml185@aol.com:meland12\r', 1),
(195, 'exor_skmoore@hotmail.com:bitter\r', 1),
(196, 'kohtiengui@hotmail.com:pinegrove\r', 1),
(197, 'presto2k@hotmail.com:skaterboi\r', 1),
(198, 'larverikke@hotmail.com:Tosen100\r', 1),
(199, 'laurent70300@aol.com:fabian\r', 1),
(200, 'knuxles@hotmail.com:nukels5\r', 1),
(201, 'naamisingebruik@hotmail.com:8letters\r', 1),
(202, 'jmgm86_1@hotmail.com:200386\r', 1),
(203, 'arouj_javaid@hotmail.com:zindagy\r', 1),
(205, 'ahmed_cherifi@hotmail.com:nacerabaali71\r', 1),
(206, 'evt24@hotmail.com:pollo00\r', 1),
(207, 'laura-jayne.mcdonald@sky.com:matt1208\r', 1),
(208, 'gseaforth@hotmail.com:thfc210259\r', 1),
(209, 'shilpilatawa@yahoo.com:shalimar\r', 1),
(210, 'chattylittleminx@hotmail.com:remember\r', 1),
(211, 'david@douglas-uk.com:girlsontop\r', 1),
(212, 'sheryl.foster8@googlemail.com:danielle\r', 1),
(213, 'dany_strike@hotmail.com:dany1111\r', 1),
(214, 'fernansegura1987@gmail.com:fer1987\r', 1),
(215, 'salsa@fsmail.net:gollum\r', 1),
(216, 'adam_jackman@hotmail.com:digitals\r', 1),
(217, 'satto001@hotmail.com:flannel1\r', 1),
(218, 'fastspin@btinternet.com:vaskina\r', 1),
(219, 'mide_k@hotmail.com:mide2950\r', 1),
(220, 'puffertrain@aol.com:black545110\r', 1),
(221, 'oshahov_19@yahoo.com:SRO6ahov\r', 1),
(222, 'grunder@gmx.net:130679\r', 1),
(223, 'jackyjalin@msn.com:planchon\r', 1),
(224, 'golimpiogo@hotmail.com:piopio\r', 1),
(225, 'geoff457@hotmail.com:copycat\r', 1),
(226, 'markedwards31@hotmail.com:25937052\r', 1),
(227, 'nikkismith79@hotmail.com:brunette\r', 1),
(228, 'gcglindop@aol.com:4r14dnb\r', 1),
(229, 'jawra@hotmail.com:2222\r', 1),
(230, 'j-pedro@live.com.pt:jpsn1998\r', 1),
(231, 'ismailbuga@yahoo.com:adanali\r', 1),
(232, 'g.mletham@supanet.com:terminator\r', 1),
(233, 'lfpowell@btconnect.com:cleopatra1\r', 1),
(234, 'samuel_pouch@hotmail.com:patrick7\r', 1),
(235, 'isis2012@hotmail.com:poisson\r', 1),
(236, 'cgaffey@hotmail.com:kingshead\r', 1),
(237, 'stealth123@hotmail.com:111111\r', 1),
(238, 'emjonesbentley@aol.com:bentley\r', 1),
(239, 'lisacook185@btinternet.com:welcome12\r', 1),
(240, 'pmusyokaus@yahoo.com:501501\r', 1),
(241, 'ninz16@hotmail.com:percy1\r', 1),
(242, 'gerd.neurode@gmx.net:FISCHE\r', 1),
(243, 'purdisamra@hotmail.com:handbags1\r', 1),
(244, 'drummer_girl_emz@hotmail.com:highhonours\r', 1),
(245, 'ashkhan75@hotmail.com:mak78612\r', 1),
(246, 'davidarora@sky.com:mohamed1\r', 1),
(247, 'itteongp@hotmail.com:300179p\r', 1),
(248, 'aristegi2001@hotmail.com:maradona\r', 1),
(249, 'ydefontain@aol.com:defontx\r', 1),
(250, 'gsgolus@hotmail.com:Chamber1s\r', 1),
(251, 'satoshi_0125@hotmail.com:cbb77820\r', 1),
(252, 'snodders@btinternet.com:23310818\r', 1),
(253, 'ledingue8@hotmail.com:pastrana199\r', 1),
(254, 'gstoehl.alexander@hotmail.com:dimmer\r', 1),
(255, 'dundeekev67@yahoo.com:derryboy67\r', 1),
(256, 'julia62jones@hotmail.com:vancouver\r', 1),
(257, 'shock_lw@hotmail.com:gngzny25\r', 1),
(258, 'kyko05@yahoo.com:vraimoi\r', 1),
(259, 'andy.j.smith@convergys.com:niamh110601\r', 1),
(260, 'garrys2007@hotmail.com:170340\r', 1),
(261, 'natleeobrien@aol.com:musician\r', 1),
(262, 'bhlawrence@talk21.com:reaper\r', 1),
(263, 'jjh151073@yahoo.com:escapade\r', 1),
(264, 'ohagan@onetel.com:barney\r', 1),
(265, 'sharonbursill@hotmail.com:CHILTERN\r', 1),
(266, 'danny.abunai@googlemail.com:sense1989\r', 1),
(267, 'josephmco@hotmail.com:craken\r', 1),
(268, 'emma@orange.net:Barney01\r', 1),
(269, 'laf_out_louder@hotmail.com:umberella\r', 1),
(270, 'pwahlbrink@gmail.com:Eldon1977\r', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privgen`
--

CREATE TABLE `privgen` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `color` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'black'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `privgen`
--

INSERT INTO `privgen` (`id`, `name`, `color`) VALUES
(22, 'Example Private', 'black');

-- --------------------------------------------------------

--
-- Table structure for table `privstatistics`
--

CREATE TABLE `privstatistics` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `generated` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privstatistics`
--

INSERT INTO `privstatistics` (`id`, `username`, `generated`, `date`) VALUES
(13, 'geniso', 1, '2017-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `website` varchar(20) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `paypal` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `generations` varchar(100) NOT NULL,
  `value` varchar(1) NOT NULL DEFAULT '€'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`website`, `favicon`, `paypal`, `email`, `generations`, `value`) VALUES
('Name', 'https://lh3.googleusercontent.com/KM1tCpmCdZTvkhumwvKVa1K50IdqSaxRRUsqLPiN_bnxdxcoQ69Lmru-a_FpFFblgQr6=w300', 'yourpaypal@email.com', 'yourpersonnal@email.com', '0', '$');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `generated` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `username`, `generated`, `date`) VALUES
(25, 'geniso', 1, '2017-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `package` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `expire` varchar(100) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `txn_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `idticket` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `from` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `to` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subject` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `message` mediumtext COLLATE latin1_general_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `date` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `hour` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(3) NOT NULL,
  `date` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `idticket` varchar(100) NOT NULL,
  `isread` int(1) NOT NULL DEFAULT '0',
  `isadminread` int(11) NOT NULL DEFAULT '0',
  `isclose` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `skin` varchar(100) NOT NULL DEFAULT 'normal',
  `isbanned` int(1) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `generations` varchar(100) NOT NULL DEFAULT '0',
  `ip` varchar(40) NOT NULL,
  `doubleip` varchar(3) NOT NULL DEFAULT 'no',
  `rank` int(1) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `skin`, `isbanned`, `username`, `password`, `email`, `generations`, `ip`, `doubleip`, `rank`, `date`) VALUES
(15, 'blue', 0, 'admin', '$2y$10$oHTkTZCc5dFf5IMlgvf1yetO6/B68/ykL93R9wCDaIKvxDqp29M8i', 'prishtinalik@hotmail.fr', '0', '0.0.0.0', 'no', 5, '2017-09-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `18`
--
ALTER TABLE `18`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banned`
--
ALTER TABLE `banned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generators`
--
ALTER TABLE `generators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priv22`
--
ALTER TABLE `priv22`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privgen`
--
ALTER TABLE `privgen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privstatistics`
--
ALTER TABLE `privstatistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `18`
--
ALTER TABLE `18`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;
--
-- AUTO_INCREMENT for table `banned`
--
ALTER TABLE `banned`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `generators`
--
ALTER TABLE `generators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `priv22`
--
ALTER TABLE `priv22`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;
--
-- AUTO_INCREMENT for table `privgen`
--
ALTER TABLE `privgen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `privstatistics`
--
ALTER TABLE `privstatistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
