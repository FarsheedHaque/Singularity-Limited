-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 11:05 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singularity`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outlet_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `outlet_id`, `name`, `created_at`, `updated_at`) VALUES
(17, 5, '16614166724858.jpg', '2022-08-25 02:37:52', '2022-08-25 02:37:52'),
(18, 5, '16614166723530.jpg', '2022-08-25 02:37:52', '2022-08-25 02:37:52'),
(19, 6, '16614166941569.jpg', '2022-08-25 02:38:15', '2022-08-25 02:38:15'),
(20, 6, '16614166947299.jpg', '2022-08-25 02:38:15', '2022-08-25 02:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_08_24_113007_create_outlets_table', 2),
(18, '2022_08_24_133322_create_images_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('08730904177efde7d987f3fb998be8dc16516870b10bb5106dec59f1b72798489258513bb8350de6', 6, 1, 'authToken', '[]', 1, '2022-08-25 00:00:02', '2022-08-25 00:00:02', '2023-08-25 06:00:02'),
('08a72f597495fd5d87e7a126195d6071c5d0cb8a1da668f40d3db4ae94caa1371df7d4ac4c5e7526', 2, 1, 'authToken', '[]', 1, '2022-08-24 21:05:26', '2022-08-24 21:05:26', '2023-08-25 03:05:26'),
('0bc5c91173cab5a551cc5cbafc4b1bc6b21f7c2f2164d64da25eb53540e4e242b16b6681fc874068', 6, 1, 'authToken', '[]', 0, '2022-08-25 02:38:49', '2022-08-25 02:38:49', '2023-08-25 08:38:49'),
('0d5da7bc4186869215a25255febd7c70deb7c57f42ce70c1e176981530514d042e5703ef6bdf6ace', 2, 1, 'authToken', '[]', 1, '2022-08-24 22:40:16', '2022-08-24 22:40:16', '2023-08-25 04:40:16'),
('1e682247ec2b51dd63152a452a98ffca01c8585158ecd065e73dcb79c02f4571a0047daba23140f3', 1, 1, 'authToken', '[]', 1, '2022-08-24 20:53:48', '2022-08-24 20:53:48', '2023-08-25 02:53:48'),
('2c0723d19d9be649f9086645774e3c30b0ba82a81c515f417260d9f618bb3883b12d886e465d3a23', 1, 1, 'authToken', '[]', 1, '2022-08-25 00:42:24', '2022-08-25 00:42:24', '2023-08-25 06:42:24'),
('2d538d35373fc883c55a0a120f5f20929d147dc2a1cb80236213e2917462ff15c457c78a45431fa1', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:13:51', '2022-08-24 22:13:51', '2023-08-25 04:13:51'),
('394ca41653d465113bc8b41a97115f2c96e72beeb0b4182231b4b29729304b82577a84ab00b980a1', 6, 1, 'authToken', '[]', 1, '2022-08-24 23:21:52', '2022-08-24 23:21:52', '2023-08-25 05:21:52'),
('3a85a02e5ef11bff97a813e68819239ed2a5c44a112585d17f5e0d016e64da3d2218af1157d46f6a', 2, 1, 'authToken', '[]', 0, '2022-08-24 21:12:27', '2022-08-24 21:12:27', '2023-08-25 03:12:27'),
('3bb1dadc2ca3827eb3dc95dfe4fe8ffb56516fbaa7e5dee71fcad2aa99541e1ea9f4c689a49e896e', 1, 1, 'authToken', '[]', 1, '2022-08-24 23:11:39', '2022-08-24 23:11:39', '2023-08-25 05:11:39'),
('3cd8830d18498894e366328032a31729b1ec4ae3e33381808f6b1ca020949d34fc0c466ebec98aaf', 3, 1, 'authToken', '[]', 1, '2022-08-24 21:46:05', '2022-08-24 21:46:05', '2023-08-25 03:46:05'),
('40ef7879e596667e0b8a3d4459d417692372991a1966c56ec9ba5995fab49550307760d2f0cdf2b2', 1, 1, 'authToken', '[]', 1, '2022-08-24 21:58:17', '2022-08-24 21:58:17', '2023-08-25 03:58:17'),
('4814ec253cd4e3aa03809e5294013a823dacf6d3ea3a4e80728b75be3ff67e92b2d5ec60ca1ebaa2', 6, 1, 'authToken', '[]', 1, '2022-08-24 23:30:07', '2022-08-24 23:30:07', '2023-08-25 05:30:07'),
('579a366007a54a79e07bfed9da22987dcd1c313697385b17aa63b7630759877a0979673107cd25b2', 2, 1, 'authToken', '[]', 1, '2022-08-24 21:56:52', '2022-08-24 21:56:52', '2023-08-25 03:56:52'),
('619e415b0ce98f840d825c540101f0ab3f99ffd3c7a65f575930943dbc4d6c6bf5c9e23b79f0d27e', 1, 1, 'authToken', '[]', 0, '2022-08-24 20:25:27', '2022-08-24 20:25:27', '2023-08-25 02:25:27'),
('65d15b68dd7bb6053e86bded2de3341be3fe152c2ac299f6d295e14500c1eb3a5643baa9342f15fd', 1, 1, 'authToken', '[]', 1, '2022-08-25 00:09:55', '2022-08-25 00:09:55', '2023-08-25 06:09:55'),
('65f75e87728df4a92c0e465b2ebcbce67a81cc9b63a877305f01e488a021444ed85058d7d9f3d6e1', 1, 1, 'authToken', '[]', 1, '2022-08-25 01:21:17', '2022-08-25 01:21:17', '2023-08-25 07:21:17'),
('665dd826f95919f29ea73a19ed80524d1fdb8b913c94f3ff331122cc578d47ec8168b84cdc12f5f7', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:47:04', '2022-08-24 22:47:04', '2023-08-25 04:47:04'),
('6714ad7963ea9d4cc6ba6619db3aa6b1bc38d82f706b4d7fb14b24a40877a2b2db60365f594761a4', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:58:23', '2022-08-24 22:58:23', '2023-08-25 04:58:23'),
('69f64f716ce4f8afd1d2158b623502915c022c6b71e2e4148e7c562e5548b29c6f7e27a601ca298d', 1, 1, 'authToken', '[]', 1, '2022-08-24 23:32:06', '2022-08-24 23:32:06', '2023-08-25 05:32:06'),
('71682c0b7d5b772f4364d83b6ebb8d64454982cea38eda8406781678593a0a378ea933b8b25cbc52', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:13:11', '2022-08-24 22:13:11', '2023-08-25 04:13:11'),
('72ef3c865cfc61d1e06dc5cd26d88929a1230d0a4049ea24c1d013bf1440816baa8c2c21eafbd43e', 6, 1, 'authToken', '[]', 1, '2022-08-24 23:42:32', '2022-08-24 23:42:32', '2023-08-25 05:42:32'),
('780736266dd1753694e9a4b92ebd7146d8af8ec72b6634c7d738e9659a49c55982be278329585df2', 6, 1, 'authToken', '[]', 1, '2022-08-25 00:08:18', '2022-08-25 00:08:18', '2023-08-25 06:08:18'),
('7e6c11ede7d9401a25d9d94dd8bc88a7f4f7a36783d0e5727de6d2cdbc0070de719a34663285189a', 1, 1, 'authToken', '[]', 1, '2022-08-24 23:20:41', '2022-08-24 23:20:41', '2023-08-25 05:20:41'),
('837772329ad3874590115680ca34a4c6ea5b3acdc1a9d552c1ed2641ca2eabad6085ecbd020cfe04', 1, 1, 'authToken', '[]', 0, '2022-08-24 23:10:20', '2022-08-24 23:10:20', '2023-08-25 05:10:20'),
('84a1098ca14d382a30d2ecf301572d77ac1af6d0b3d2e2e984ec020054ca8ec86c388d3fc155dbb1', 2, 1, 'authToken', '[]', 1, '2022-08-24 22:59:04', '2022-08-24 22:59:04', '2023-08-25 04:59:04'),
('85907c45818e9372e3da4ed16f2ce954693aabbba3a19da848413b209a32069858ec7ea169802fed', 1, 1, 'authToken', '[]', 1, '2022-08-24 21:30:38', '2022-08-24 21:30:38', '2023-08-25 03:30:38'),
('85e6d7dd17c11307e19b3d933a8866e2a640f395bf7a0fe382fc3a9119f609de82cfffc8fd460f26', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:35:05', '2022-08-24 22:35:05', '2023-08-25 04:35:05'),
('8987af0ea19a13b0ab42bc458bae4e5b50e252cae0ce7653a61fae8bea3eec7fa6496cdc5788490e', 1, 1, 'authToken', '[]', 1, '2022-08-25 00:07:15', '2022-08-25 00:07:15', '2023-08-25 06:07:15'),
('941e6c994fbd9a126d2e0af4472871c45d82fe808f46a465c3e36fe9ef49ff382e3cd39c8230066d', 1, 1, 'authToken', '[]', 0, '2022-08-24 20:52:50', '2022-08-24 20:52:50', '2023-08-25 02:52:50'),
('97b7ed88d5cb4303f7595b676ca2c6abcdd87edca9d302909364953c3844bbec25a3da7eb4ef4ab4', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:19:07', '2022-08-24 22:19:07', '2023-08-25 04:19:07'),
('9bc411d20545468e8d27183de66f33c9272bae1bea635172d0c1fdae1550213dc55edf3d654c02fe', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:34:32', '2022-08-24 22:34:32', '2023-08-25 04:34:32'),
('9c01e6fb5f46719e143d4c0d769be4d587b77965d8e7229e1f55ae1af9ca6001ecb6c015df9548af', 2, 1, 'authToken', '[]', 1, '2022-08-24 22:17:21', '2022-08-24 22:17:21', '2023-08-25 04:17:21'),
('9d76a04851132151bb25a538eec7ec5e9b3c6e8f2f028994914417ac6adf4653655e8483b1ec2ac6', 1, 1, 'authToken', '[]', 0, '2022-08-24 20:51:52', '2022-08-24 20:51:52', '2023-08-25 02:51:52'),
('a1751734a9c1152326d21ca8ebf5b3c4609c770d34ff90d652417726abc1eb76319d2c757ae7543a', 2, 1, 'authToken', '[]', 1, '2022-08-24 22:03:34', '2022-08-24 22:03:34', '2023-08-25 04:03:34'),
('a6d2c701787ab5b9afeee49cd07c948ebd1975493adcd627295fdda8f8281032da958fa055be98c4', 1, 1, 'authToken', '[]', 1, '2022-08-24 23:49:50', '2022-08-24 23:49:50', '2023-08-25 05:49:50'),
('a805751147dddd58b631298b0e66268d6381e531138b2f6009a90c4c8cad10cea0ddd72a1a18368f', 3, 1, 'authToken', '[]', 1, '2022-08-24 21:42:25', '2022-08-24 21:42:25', '2023-08-25 03:42:25'),
('ada4a860e7d193d2f951e1d3375fab9c04b8b23752c948e793b51b031a69dfa4b94b7ac8a03c2786', 2, 1, 'authToken', '[]', 1, '2022-08-24 22:13:33', '2022-08-24 22:13:33', '2023-08-25 04:13:33'),
('b08c7b12ed5d53c83418c36b2428a3879a99f66ec170f4b130543b28649270b464a1faa40d103edc', 2, 1, 'authToken', '[]', 1, '2022-08-24 22:19:29', '2022-08-24 22:19:29', '2023-08-25 04:19:29'),
('bd62bc20c84a9182b5db33fb7658fd54cc9ab89a07df5a59ef83b64edd66a5ad9e8ce3b66cf38357', 2, 1, 'authToken', '[]', 1, '2022-08-24 22:32:18', '2022-08-24 22:32:18', '2023-08-25 04:32:18'),
('bf91185b4487201aef19ece0d01679dae7e77feadc5b0e418f266102cd6bfe029d39a660c93e6fdb', 6, 1, 'authToken', '[]', 0, '2022-08-24 23:35:18', '2022-08-24 23:35:18', '2023-08-25 05:35:18'),
('c0f1acca5b1a3022a2dae6d7ef3942393062ae004eaffaad8000b13f89ef582cba45c9ada43ea8c7', 1, 1, 'authToken', '[]', 1, '2022-08-24 18:04:19', '2022-08-24 18:04:19', '2023-08-25 00:04:19'),
('c47934c78a72c219f6268b567518f9efb167d81df9bb7df610777d1162e88e07c05629ae82483f46', 1, 1, 'authToken', '[]', 1, '2022-08-24 21:44:42', '2022-08-24 21:44:42', '2023-08-25 03:44:42'),
('c756129513a3170cced16526ccfae765e39df8afef2269a1c9a214001f420becd9b0b087933f57f4', 1, 1, 'authToken', '[]', 0, '2022-08-24 20:49:44', '2022-08-24 20:49:44', '2023-08-25 02:49:44'),
('cc7e88fff14cc7b67266dd6eda3a01b53c0ae27291e6b5d4aa1b17b18c4ffc7f4bbf8de4998c64b5', 5, 1, 'authToken', '[]', 1, '2022-08-24 23:19:47', '2022-08-24 23:19:47', '2023-08-25 05:19:47'),
('cf7c539c68cd98d61afcb7cae1e86204d50fb8e44c0dcaed7262027ad98d236cbc8092e44b5e0b7b', 6, 1, 'authToken', '[]', 1, '2022-08-25 01:08:49', '2022-08-25 01:08:49', '2023-08-25 07:08:49'),
('d0f9b651c93de66d16d3dca99a51345caf95484a4b9b8fbe748b68a9fd69eaf6d4cbd8a0fa4f94b8', 1, 1, 'authToken', '[]', 1, '2022-08-24 21:26:59', '2022-08-24 21:26:59', '2023-08-25 03:26:59'),
('d11dc56b3a622cfdb0dfce87f098d0373d0edea8bb57967f1cee0f4490614245c1f50d35178abe4f', 1, 1, 'authToken', '[]', 1, '2022-08-25 00:36:42', '2022-08-25 00:36:42', '2023-08-25 06:36:42'),
('dbec26bdd4ed89788514bf8b9fdcd39447d75f5c476746cc6eceed43919f04e1f5cac7204b46171c', 1, 1, 'authToken', '[]', 1, '2022-08-24 18:05:32', '2022-08-24 18:05:32', '2023-08-25 00:05:32'),
('ec85a8297924486707abc52b98020fdfcd6442fa1008614f3d433de8c52777ba48220e881e029ccd', 3, 1, 'authToken', '[]', 1, '2022-08-24 21:28:42', '2022-08-24 21:28:42', '2023-08-25 03:28:42'),
('f16555f564dec8bdab8cb2b7f27892659c2b56204566dacae63d2a9963015af80aecbffc5f73c6fb', 1, 1, 'authToken', '[]', 1, '2022-08-25 02:34:24', '2022-08-25 02:34:24', '2023-08-25 08:34:24'),
('fa4da2f8c2b6ec4d62224b2d9bd82bf35c1d61829c87693484a5c7c2c832e336d7d1e57b5fefedc1', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:31:46', '2022-08-24 22:31:46', '2023-08-25 04:31:46'),
('ffce3d8237cb0ece42c1e2c21d6f59283557cf330ff3c67ce0cc06ea772a337e066e56e91b181fd5', 1, 1, 'authToken', '[]', 0, '2022-08-24 20:52:13', '2022-08-24 20:52:13', '2023-08-25 02:52:13'),
('ffcfb9f790c5e7fb82990a91abe3de4c77c48da3119681c90618f3744ac600e3d75667b7083f8ffe', 1, 1, 'authToken', '[]', 1, '2022-08-24 22:40:37', '2022-08-24 22:40:37', '2023-08-25 04:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'aMUfBki4bRQGIkDNkHnCGLjXzumQowWtJTwXfaf8', NULL, 'http://localhost', 1, 0, 0, '2022-08-24 17:57:15', '2022-08-24 17:57:15'),
(2, NULL, 'Laravel Password Grant Client', 'kBhglJpKpV2A9udOgYlO8L0EL1B5wI1mdkVW3HqH', 'users', 'http://localhost', 0, 1, 0, '2022-08-24 17:57:15', '2022-08-24 17:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-24 17:57:15', '2022-08-24 17:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `name`, `phone`, `address`, `latitude`, `longitude`, `code`, `created_at`, `updated_at`) VALUES
(5, 'Outlet 1', 1710323262, 'Dhaka', '23.8103', '90.4125', '166141627071972', '2022-08-25 02:31:10', '2022-08-25 02:31:10'),
(6, 'Outlet 2', 1710323262, 'Chittagong', '22.3569', '91.7832', '166141630688285', '2022-08-25 02:31:46', '2022-08-25 02:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin ', 'admin@gmail.com', NULL, '$2y$10$NkL67JznJ5VoBGKy/p6UBOMezi0v7MZZ5bQVlrG8rkbn.r20eNojK', NULL, '2022-08-24 18:04:13', '2022-08-24 18:04:13', 'admin'),
(6, 'User 1', 'u1@gmail.com', NULL, '$2y$10$sOz70P7JlyeOF7sAHFpRmONW609LtvhpnP6yCamPKBDsQjsNsRApW', NULL, '2022-08-24 23:21:06', '2022-08-25 02:34:58', 'user'),
(7, 'User 2', 'u2@gmail.com', NULL, '$2y$10$.JZXFiQEmH0EC7S3wY7AaObLpvZu9VSe78zNXcoz/oOZUjGAVjtai', NULL, '2022-08-25 02:35:23', '2022-08-25 02:35:23', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `outlets_code_unique` (`code`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
