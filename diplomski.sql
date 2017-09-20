-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2016 at 04:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diplomski`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`),
  KEY `admins_activation_code_index` (`activation_code`),
  KEY `admins_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `remember_token`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin@change.me', '$2y$10$ePPwh8sfYYXfXwq/wzHq0OOflPCes6Zvpwyf3k3igJSAWsEWN0KKG', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'n1AHzk3P55UwsRxnlzOQZyQVa3jwUmTfkxEHGiBbPvqW2qf0sC5VKlWMngCX', NULL, NULL, '2015-11-09 23:47:48', '2015-11-09 23:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `doktor`
--

CREATE TABLE IF NOT EXISTS `doktor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jmbg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `doktor`
--

INSERT INTO `doktor` (`id`, `ime`, `prezime`, `jmbg`, `created_at`, `updated_at`) VALUES
(1, 'Adnan', 'Mujkić', '1234567891234', '2015-11-28 12:11:50', '2015-11-28 12:11:50'),
(2, 'Kemal', 'Kapić', '4567891234569', '2015-11-28 12:12:21', '2015-11-28 12:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `event_models`
--

CREATE TABLE IF NOT EXISTS `event_models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `allDay` tinyint(1) NOT NULL,
  `startTime` datetime NOT NULL,
  `end` datetime NOT NULL,
  `imeDoktora` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `event_models`
--

INSERT INTO `event_models` (`id`, `title`, `allDay`, `startTime`, `end`, `imeDoktora`, `created_at`, `updated_at`) VALUES
(13, 'Harun Bajrektarević', 0, '2015-12-01 12:00:00', '2015-12-01 12:00:00', 'Adnan Mujkić', '2015-12-09 16:31:50', '2015-12-09 16:31:50'),
(14, 'Harun Bajrektarević', 0, '2015-12-03 12:00:00', '2015-12-03 12:00:00', 'Kemal Kapić', '2015-12-09 16:32:48', '2015-12-09 16:32:48'),
(15, 'Harun Bajrektarević', 0, '2015-12-16 09:00:00', '2015-12-16 09:00:00', 'Adnan Mujkić', '2015-12-09 16:49:45', '2015-12-09 16:49:45'),
(16, 'Harun Bajrektarević', 0, '2015-12-20 08:20:00', '2015-12-20 08:20:00', 'Adnan Mujkić', '2015-12-09 16:51:35', '2015-12-09 16:51:35'),
(17, 'Harun Bajrektarević', 0, '2015-12-13 08:00:00', '2015-12-13 08:00:00', 'Adnan Mujkić', '2015-12-11 00:22:34', '2015-12-11 00:22:34'),
(18, 'Harun Bajrektarević', 0, '2015-12-16 08:00:00', '2015-12-16 08:00:00', 'Adnan Mujkić', '2015-12-11 07:57:56', '2015-12-11 07:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `evidencija`
--

CREATE TABLE IF NOT EXISTS `evidencija` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazivUstanove` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dijagnoza` text COLLATE utf8_unicode_ci,
  `lijek` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `napomena` text COLLATE utf8_unicode_ci,
  `data` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `evidencija`
--

INSERT INTO `evidencija` (`id`, `nazivUstanove`, `dijagnoza`, `lijek`, `napomena`, `data`, `created_at`, `updated_at`) VALUES
(25, 'JU Dom Zdravlja Bihać', 'Aripiprazole ativan buspar carbamazepine chlordiazepoxide clozapine desipramine doxepin fluvoxamine iloperidone lithium carbonate metadate cd molindone paroxetine mesylate pimozide protriptyline sarafem selegiline symbyax venlafaxine zyprexa. Atomoxetine chlordiazepoxide clonazepam clozapine diazepam emsam geodon klonopin librium marplan paroxetine mesylate ritalin sr tranylcypromine valium zyprexa zyprexia. Adderall anafranil fluoxetine fluvoxamine gabapentin guanfacine invega lisdexamfetamine dimesylate luvox marplan methamphetamine norpramin nortriptyline phenelzine protriptyline ritalin sr tranxene trileptal venlafaxine vivactil. Abilify emsam eskalith focalin geodon isocarboxazid lisdexamfetamine dimesylate maprotiline metadate cd pamelor perphenazine selegiline surmontil.\n', 'Anafranil atomoxetine aventyl', 'Kontrola za 7 dana', '24158.pdf', '2015-12-06 14:34:59', '2015-12-06'),
(33, 'JU Dom Zdravlja Bihać', 'Anafranil atomoxetine aventyl chlorpromazine clonazepam concerta desoxyn desvenlafaxine dextroamphetamine geodon lorazepam methylin protriptyline sarafem tofranil topamax trileptal zyprexa. Amphetamine buspar diazepam fluoxetine paliperidone paroxetine mesylate phenelzine remeron risperdal risperidone thorazine tofranil-pm tranylcypromine trifluoperazine xanax. Adderall xr alprazolam anafranil celexa chlordiazepoxide chlorpromazine clomipramine depakote dexmethylphenidate fanapt fluvoxamine gabapentin isocarboxazid lamotrigine loxitane metadate cd olanzapine pexeva phenelzine quetiapine remeron trifluoperazine vivactil wellbutrin zyprexa. Adderall aventyl celexa chlordiazepoxide desyrel diazepam doxepin elavil fluphenazine lexapro mirtazapine neurontin norpramin oxazepam pamelor paxil pexeva pimozide pristiq risperidone ritalin sr tranxene vivactil zyprexa.\n', 'orazepate clozaril desyrel dexmethylphenidate dextroamph', '', '52937.pdf', '2015-12-06 16:42:16', '2015-12-06'),
(34, 'JU Dom Zdravlja Bužim', 'Amoxapine citalopram diazepam effexor elavil focalin intuniv metadate cd neurontin pamelor risperidone sarafem tegretol tranxene tranylcypromine xanax. Alprazolam amitriptyline celexa citalopram clomipramine clozapine desyrel escitalopram eskalith haldol isocarboxazid lithium citrate metadate cd methylphenidate molindone nardil neurontin risperidone tegretol thioridazine trifluoperazine. Amitriptyline clomipramine desvenlafaxine desyrel fluphenazine focalin xr haldol intuniv klonopin librium lithium carbonate lorazepam luvox maprotiline navane neurontin norpramin orap pexeva risperdal stelazine topamax zoloft. Adderall alprazolam citalopram daytrana desyrel effexor geodon guanfacine isocarboxazid loxitane marplan paliperidone paxil pristiq protriptyline prozac ritalin sr thiothixene tranylcypromine.\n', 'B-Complex 2X dnevno u trajanju od 2 sedmice', '', '66210.pdf', '2015-12-06 16:42:53', '2015-12-06'),
(35, 'JU Dom Zdravlja Cazin', 'Test', 'Test', 'Test', '65058.pdf', '2015-12-09 10:31:12', '2015-12-09'),
(36, 'JU Dom Zdravlja Bihać', 'Test', 'Test3', 'Test5', '26204.pdf', '2015-12-09 10:33:34', '2015-12-09'),
(37, 'JU Dom Zdravlja Bihać', NULL, NULL, NULL, '36230.pdf', '2015-12-10 17:24:05', '2015-12-10'),
(38, 'JU Dom Zdravlja Bihać', NULL, NULL, NULL, '99275.pdf', '2015-12-10 17:32:37', '2015-12-10'),
(39, 'JU Dom Zdravlja Bihać', NULL, NULL, NULL, '80929.pdf', '2015-12-10 17:32:51', '2015-12-10'),
(40, 'JU Dom Zdravlja Bihać', NULL, NULL, NULL, '18736.pdf', '2015-12-10 17:34:54', '2015-12-10'),
(41, 'JU Dom Zdravlja Bihać', NULL, NULL, NULL, '71592.pdf', '2015-12-10 17:35:29', '2015-12-10'),
(42, 'JU Dom Zdravlja Bihać', NULL, NULL, NULL, '26000.pdf', '2015-12-10 17:36:14', '2015-12-10'),
(43, 'JU Dom Zdravlja Bihać', 'rrrrrrr', 'rrrrrrrr', 'rrrrrrrrrr', '55094.pdf', '2015-12-10 17:36:40', '2015-12-10'),
(44, 'JU Dom Zdravlja Bihać', 'aaaaaaaa', 'aaaaaaaaa', 'aaaaaaaa', '74888.pdf', '2015-12-10 17:37:52', '2015-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `korisnicis`
--

CREATE TABLE IF NOT EXISTS `korisnicis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imePrezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imeOca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datumRodjenja` timestamp NOT NULL,
  `mjestoPrebivalista` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statusZaposlenja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bracnoStanje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tezina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alergija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jmbg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vrstaOsiguranja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brojZdravstveneKnjizice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `krvnaGrupa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idDoktor` int(10) unsigned DEFAULT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idDoktor` (`idDoktor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `korisnicis`
--

INSERT INTO `korisnicis` (`id`, `imePrezime`, `imeOca`, `adresa`, `datumRodjenja`, `mjestoPrebivalista`, `statusZaposlenja`, `bracnoStanje`, `tezina`, `visina`, `alergija`, `jmbg`, `vrstaOsiguranja`, `brojZdravstveneKnjizice`, `email`, `krvnaGrupa`, `idDoktor`, `slika`, `created_at`, `updated_at`) VALUES
(1, 'Harun Bajrektarević', 'Hasan', 'Ulica Asima Bajrektarevića br. 2', '1991-10-27 23:00:00', 'Bužim', 'Nezaposlen', 'Neoženjen', '70', '186', '', '2810991111076', 'Aktivni osiguranik', 'HB111076', 'harun.bajrektarevic@gmail.com', 'B-', 1, 'harun-bajrektarevic.jpg', '2015-12-10 16:54:32', '2015-12-10 20:59:45'),
(3, 'Adis Dizdarević', 'Nijaz', 'Mrazovac bb', '1990-10-20 22:00:00', 'Bužim', 'Nezaposlen', 'Oženjen', '67', '188', '', '2110990111076', 'Aktivni osiguranik', 'AD111076', 'adis.dizdarevic@gmail.com', 'A+', 2, 'adis-dizdarevic.jpg', '2015-12-10 16:54:32', '2015-12-10 20:59:45'),
(6, 'Adnan Dželalagić', 'Hasan', 'Ostrožac bb', '1990-12-19 23:00:00', 'Cazin', 'Zaposlen', 'Neoženjen', '72', '181', '', '2012990111258', 'Aktivni osiguranik', 'AD11258', 'adnan.dzelalagic@gmail.com', 'AB+', 2, 'adnan-dzelalagic.jpg', '2015-12-10 16:54:32', '2015-12-10 20:59:45'),
(7, 'Adnan Mujkić', '', 'Otoka', '1989-11-06 23:00:00', 'Bosanska Otoka', 'Nezaposlen', 'Oženjen', '88', '186', '', '1234567892179', 'Aktivni osiguranik', 'AM2179', 'adnan.mujkic@gmail.com', '0-', 1, 'adnan-mujkic.jpg', '2015-12-10 16:54:32', '2015-12-10 20:59:45'),
(8, 'Kemal Kapić', '', 'Cazin', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'kemal.kapic@gmail.com', '', NULL, 'kemal-kapic.jpg', '2015-12-10 16:54:32', '2015-12-10 20:59:45'),
(9, 'Medicinsko Osoblje', '', '', '2015-12-11 01:43:24', '', '', '', '', '', '', '', '', '', 'osoblje.elektronski@gmail.com', '', NULL, 'osoblje.png', '2015-12-11 01:43:24', '2015-12-11 01:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici_evidencija`
--

CREATE TABLE IF NOT EXISTS `korisnici_evidencija` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idKorisnik` int(10) unsigned NOT NULL,
  `idEvidencija` int(10) unsigned NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEvidencija` (`idEvidencija`),
  KEY `idKorisnik` (`idKorisnik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=43 ;

--
-- Dumping data for table `korisnici_evidencija`
--

INSERT INTO `korisnici_evidencija` (`id`, `idKorisnik`, `idEvidencija`, `created_at`, `updated_at`) VALUES
(23, 1, 25, '2015-12-06', '2015-12-06'),
(31, 1, 33, '2015-12-06', '2015-12-06'),
(32, 3, 34, '2015-12-06', '2015-12-06'),
(33, 6, 35, '2015-12-09', '2015-12-09'),
(34, 6, 36, '2015-12-09', '2015-12-09'),
(35, 1, 37, '2015-12-10', '2015-12-10'),
(36, 6, 38, '2015-12-10', '2015-12-10'),
(37, 6, 39, '2015-12-10', '2015-12-10'),
(38, 3, 40, '2015-12-10', '2015-12-10'),
(39, 1, 41, '2015-12-10', '2015-12-10'),
(40, 1, 42, '2015-12-10', '2015-12-10'),
(41, 1, 43, '2015-12-10', '2015-12-10'),
(42, 1, 44, '2015-12-10', '2015-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `main` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `display`, `url`, `created_at`, `updated_at`, `main`) VALUES
(1, 'Links', 'Link', '2015-11-09 23:47:48', '2015-11-09 23:47:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_11_16_205658_create_admins_table', 2),
('2014_12_02_152920_create_password_reminders_table', 2),
('2015_02_20_130902_create_url_table', 2),
('2015_03_15_123956_edit_url_table', 2),
('2015_11_08_215059_create_tasks_table', 3),
('2015_11_17_184856_kreiraj_Korisnike', 3),
('2015_11_21_185411_Doktor', 3),
('2015_11_22_190959_evidencija', 3);

-- --------------------------------------------------------

--
-- Table structure for table `narudzba_za_nalaze`
--

CREATE TABLE IF NOT EXISTS `narudzba_za_nalaze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idKorisnik` int(11) NOT NULL,
  `idDoktor` int(11) NOT NULL,
  `datum` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `narudzba_za_nalaze`
--

INSERT INTO `narudzba_za_nalaze` (`id`, `idKorisnik`, `idDoktor`, `datum`, `updated_at`, `created_at`) VALUES
(11, 1, 1, '2015-12-11', '2015-12-11 00:03:22', '2015-12-11 00:03:22'),
(12, 1, 1, '2015-12-11', '2015-12-11 00:27:51', '2015-12-11 00:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `notifikacije`
--

CREATE TABLE IF NOT EXISTS `notifikacije` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imeKorisnika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `imeDoktora` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `notifikacije`
--

INSERT INTO `notifikacije` (`id`, `imeKorisnika`, `datum`, `status`, `imeDoktora`, `created_at`, `updated_at`) VALUES
(13, 'Harun Bajrektarević', '2015-12-01 12:00:00', 1, 'Adnan Mujkić', '2015-12-09 16:31:50', '2015-12-09 16:31:50'),
(14, 'Harun Bajrektarević', '2015-12-02 12:00:00', 0, 'Adnan Mujkić', '2015-12-09 16:31:52', '2015-12-09 16:31:52'),
(15, 'Harun Bajrektarević', '2015-12-03 12:00:00', 1, 'Kemal Kapić', '2015-12-09 16:32:48', '2015-12-09 16:32:48'),
(16, 'Harun Bajrektarević', '2015-12-04 12:00:00', 0, 'Kemal Kapić', '2015-12-09 16:32:50', '2015-12-09 16:32:50'),
(17, 'Harun Bajrektarević', '2015-12-13 08:00:00', 1, 'Adnan Mujkić', '2015-12-11 00:22:34', '2015-12-11 00:22:34'),
(18, 'Harun Bajrektarević', '2015-12-16 08:00:00', 1, 'Adnan Mujkić', '2015-12-11 07:57:56', '2015-12-11 07:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('harun.bajrektarevic@gmail.com', '78b711155c4936449a1f81878a3e9fc55651f7a020613dda2a143f189b6b5dbb', '2015-12-08 08:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `pregled_false`
--

CREATE TABLE IF NOT EXISTS `pregled_false` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imeDoktora` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `imePacijenta` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pregled_false`
--

INSERT INTO `pregled_false` (`id`, `imeDoktora`, `startDate`, `imePacijenta`, `created_at`, `updated_at`) VALUES
(1, 'dr. Adnan Mujkić', '2015-12-24 14:50:00', 'Harun Bajrektarević', '2015-12-11 00:18:09', '2015-12-11 00:18:09'),
(2, 'dr. Adnan Mujkić', '2015-12-06 02:00:00', 'Harun Bajrektarević', '2015-12-11 00:19:04', '2015-12-11 00:19:04'),
(3, 'dr. Adnan Mujkić', '2015-12-01 05:00:00', 'Harun Bajrektarević', '2015-12-11 00:19:12', '2015-12-11 00:19:12'),
(4, 'dr. Adnan Mujkić', '2015-12-13 04:20:00', 'Harun Bajrektarević', '2015-12-11 00:20:21', '2015-12-11 00:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `isDoktor` tinyint(1) NOT NULL DEFAULT '0',
  `isOsoblje` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isDoktor`, `isOsoblje`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Harun Bajrektarević', 'harun.bajrektarevic@gmail.com', '$2y$10$28z17nw.1kO7JegGbQsBB.71D47JmkYUk/xEGo/eawlieT7LGme7a', 0, 0, 'diD1FucsK2pi68kbZwX3citImkLA4Zy2WSMN57YiTzegfFc7fI7cjt2aWP40', '2015-11-10 21:39:34', '2016-02-25 07:19:19'),
(2, 'Hasan Bajrektarević', 'bajrektarevic.hasan@gmail.com', '$2y$10$1C1taiVTyZbBrN6iXREx0e6izxEhv3rJRcoejw67JAO1lJ0ugsZOW', 0, 0, '6qwC8aKgcRmJVuvYSURb70spPpNaqwCIoKkDp981cwfnOYPXjjkZV8GHYudC', '2015-11-10 22:14:36', '2015-11-28 22:05:42'),
(3, 'Adis Dizdarević', 'adis.dizdarevic@gmail.com', '$2y$10$nog7TtaTB45Zshsve6VMCOxSY3Z1IQYHiImRXUwalJjIJH0JYK2Tm', 0, 0, 'P9TvsZjb61C1E4skolJHFf3HySH9Qw09JBM4Oc9KbwQfMtoy7AinLVgYKTSt', '2015-11-28 19:45:10', '2015-12-06 12:48:53'),
(4, 'Adnan Mujkić', 'adnan.mujkic@gmail.com', '$2y$10$z0E7yFmBiGUQ/nV.RIc2WeHI1ohB415OAXYi/hOLCGusPf7j8Yge6', 1, 0, 'YNbZVdtpmZ6t29ioNAHKLKLkAk90f0VQ4zIk0rZObY55MVafvunz9uSxg4PQ', '2015-11-28 21:50:24', '2015-12-11 00:27:57'),
(6, 'Adnan Dželalagić', 'adnan.dzelalagic@gmail.com', '$2y$10$Bh1l7.ihBycDHXEb0FaG..WzGIK52Cs45pwR0490VWiRWF7hS2YMG', 0, 0, 'w2GbWxo4TNJnHEDdoTXV4BxexU7poDGAZPQeGoHaDIrg3zk0tm6BIajrfyzD', '2015-11-28 22:07:43', '2015-12-01 19:36:35'),
(8, 'Emir Velić', 'info.elektronski@gmail.com', '$2y$10$RZQabGe/dLU7gvEVS2PB5uqkCSdn.H8tQ6pQCatJ.BnXjT8/li4ny', 0, 0, NULL, '2015-12-09 10:54:00', '2015-12-09 10:54:00'),
(9, 'Kemal Kapić', 'kemal.kapic@gmail.com', '$2y$10$sd6so/EwpXpb6s2JNSoxBu35QTfR9bO3EgTrm//of9/nB0pVzvejq', 1, 0, 'NvtLN1SSPWTfZiwUR9EdIO9T2FV4RZnAIgn9qSlPQWepXO2UMUa4GYKz58Kg', '2015-12-09 15:42:59', '2015-12-10 20:32:14'),
(10, 'Medicinsko Osoblje', 'osoblje.elektronski@gmail.com', '$2y$10$TqP62xNJuFuTatT0R3x8UuTuUc34YUEgcH.HU8iIAjsafiibIMkoG', 0, 1, 'U1wJS0NgqNTENgIuPN8WrfCadQwLZ8NhsQITFs6dHUpzE44jo6KMZS8g7U09', '2015-12-11 00:36:59', '2015-12-11 06:43:24'),
(11, 'Mehmed Arnautović', 'mehmed.arnautovic@gmail.com', '$2y$10$oe9LNKUgNilRffnQJz37DO5ovJav5581JsSsrDSTdqdF9pbTO1XgW', 0, NULL, NULL, '2015-12-11 07:55:06', '2015-12-11 07:55:06');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnicis`
--
ALTER TABLE `korisnicis`
  ADD CONSTRAINT `idDoktor` FOREIGN KEY (`idDoktor`) REFERENCES `doktor` (`id`);

--
-- Constraints for table `korisnici_evidencija`
--
ALTER TABLE `korisnici_evidencija`
  ADD CONSTRAINT `idEvidencija` FOREIGN KEY (`idEvidencija`) REFERENCES `evidencija` (`id`),
  ADD CONSTRAINT `idKorisnik` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnicis` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
