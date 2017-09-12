--
-- Database: `scrolls-17`
--

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(10) UNSIGNED NOT NULL,
  `domain_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `domain_name`) VALUES
(1, 'Computer Science and Information Technology'),
(2, 'Electronics and Communication Technology'),
(3, 'Electrical and Electronics Technology'),
(4, 'Mechanical Engineering'),
(5, 'Civil Engineering'),
(6, 'Management Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `student_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accomodation` tinyint(1) NOT NULL,
  `college_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamlead` tinyint(1) NOT NULL DEFAULT '0',
  `team_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_09_01_064624_create_domains_table', 1),
(2, '2017_09_01_064641_create_topics_table', 2),
(3, '2017_09_10_102612_create_samplesynopsis_table', 3),
(4, '2017_09_01_064708_create_teams_table', 4),
(5, '2014_10_12_000000_create_members_table', 5),
(6, '2014_10_12_100000_create_password_resets_table', 5),
(7, '2017_09_03_064043_create_synopsis_table', 6),
(8, '2014_10_12_000000_create_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `samplesynopsis`
--

CREATE TABLE `samplesynopsis` (
  `id` int(10) UNSIGNED NOT NULL,
  `synopsis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `synopsis`
--

CREATE TABLE `synopsis` (
  `id` int(10) UNSIGNED NOT NULL,
  `synopsis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `domain_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noofmembers` int(11) NOT NULL,
  `teamid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortlisted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `domain_id`) VALUES
(1, 'Embedded Systems                                                                                                       ', 1),
(2, 'Augmented Reality                                                                                                     ', 1),
(3, 'Natural Language Processing', 1),
(4, 'Genetic Algorithms and Bio-Inspired Computing                                                         ', 1),
(5, 'Cloud Computing                                                                                                        ', 1),
(6, 'Semantic Web                                                                                                               ', 1),
(7, 'Mobile Computing and Data Intensive Computing                                                      ', 1),
(8, 'Soft Computing including multi-criteria Analysis                                                                ', 1),
(9, 'Cybernetics                                                                                                              ', 1),
(10, 'Nano Computing                                                                                                      ', 1),
(11, 'Quantum Computing                                                                                                ', 1),
(12, 'Big Data Analytics', 1),
(13, '5G Technology', 2),
(14, 'Mobile Satellite Communication', 2),
(15, 'Optoelectronics', 2),
(16, 'Nanotechnology', 2),
(17, 'VLSI', 2),
(18, 'Neural Networks', 2),
(19, 'Electronic Counter measures in Defense Systems & IFF Technologies', 2),
(20, 'Substrate Integrated Waveguides', 2),
(21, 'Speech Processing', 2),
(22, 'Antenna Design and Radar Technologies', 2),
(23, 'Intelligence Substation', 3),
(24, 'Smart Electrical Energy Metering', 3),
(25, 'Zero Energy Motors', 3),
(26, 'MRI Technology', 3),
(27, 'Wireless Power Transmission ', 3),
(28, 'Magnetic Motors', 3),
(29, 'Electromagnetic Anti-gravity Propulsion', 3),
(30, 'Power Quality Issues with Grid Connected    Wind Energy Systems', 3),
(31, 'Renewable Energy & Environment Protection', 3),
(32, 'Smart Grid Technology', 3),
(33, 'Super Conducting Rotating Machines', 3),
(34, 'Power Generation using Nano-carbon tubes', 4),
(35, 'Cryogenic Engines', 4),
(36, 'Application of CAD software (Catia, ProE) and designing software', 4),
(37, 'Automatic Transmission in Automobiles', 4),
(38, 'Hydraulic and pneumatic actuators', 4),
(39, 'Improvisation during the last two decades in passenger cars', 4),
(40, 'Nanotechnology', 4),
(41, 'Recent developments in materials for bio-           implants', 4),
(42, 'Kinematics/dynamics of Robotic  Manipulators', 4),
(43, 'Robotic Applications: Present & Future', 4),
(44, 'Additive Manufacturing', 4),
(45, 'TQM concepts for zero rejection', 4),
(46, 'Indian Railways: Safety considerations, bullet trains', 5),
(47, 'Infrastructure: Housing for all, smart housing', 5),
(48, 'Earthquake Engineering – Revised code IS: 1893, seismic risk assessment for  NCR region', 5),
(49, 'Smart cities', 5),
(50, 'Solid Waste Management', 5),
(51, 'Metro Rails DMRC and Metro for Bombay', 5),
(52, 'Flood Management: Storage Dams', 5),
(53, 'Save Drinking Water', 5),
(54, 'Creating Water Conservation', 5),
(55, 'Cleaning and rejuvenating Ganges', 5),
(56, 'Global Warming: Equity and global Climate Agreement, A step towards a clean Earth', 5),
(57, 'Application of Remote Sensing and GIS techniques', 5),
(58, 'BREXIT: Impact on Indian Economy', 6),
(59, 'Role of Skill Development in winning the war against unemployment', 6),
(60, 'Social Networking is the prime catalyst in shaping  the actions of Indian Youths', 6),
(61, 'India is the new China: A Distant Dream', 6),
(62, 'The Glass Ceiling: Reality or Myth?', 6),
(63, 'Poverty in Third World Countries is due to Prosperity in First World Countries', 6),
(64, 'Steal a Few Lakh and you’re a Criminal; Steal a Few  Hundred Crore and you become an Industrialist', 6),
(65, '100% FDI in Indian Defense Sector: Boon or Bane', 6),
(66, 'Rural Development is the right answer to our unemployment problem', 6),
(67, 'Ethics in business: An integral part or a passing fad?', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`),
  ADD KEY `members_team_id_foreign` (`team_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `samplesynopsis`
--
ALTER TABLE `samplesynopsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synopsis`
--
ALTER TABLE `synopsis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `synopsis_team_id_foreign` (`team_id`),
  ADD KEY `synopsis_domain_id_foreign` (`domain_id`),
  ADD KEY `synopsis_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_name` (`team_name`),
  ADD KEY `teams_topic_id_foreign` (`topic_id`),
  ADD KEY `teams_domain_id_foreign` (`domain_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_domain_id_foreign` (`domain_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `samplesynopsis`
--
ALTER TABLE `samplesynopsis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `synopsis`
--
ALTER TABLE `synopsis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Constraints for table `synopsis`
--
ALTER TABLE `synopsis`
  ADD CONSTRAINT `synopsis_domain_id_foreign` FOREIGN KEY (`domain_id`) REFERENCES `domains` (`id`),
  ADD CONSTRAINT `synopsis_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `synopsis_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_domain_id_foreign` FOREIGN KEY (`domain_id`) REFERENCES `domains` (`id`),
  ADD CONSTRAINT `teams_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_domain_id_foreign` FOREIGN KEY (`domain_id`) REFERENCES `domains` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
