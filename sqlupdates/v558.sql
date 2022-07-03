--
-- Table structure for table `seller_levels`
--

CREATE TABLE `seller_levels` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `commission` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` tinyint DEFAULT '1',
  `is_default` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seller_levels`
--
ALTER TABLE `seller_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seller_levels`
--
ALTER TABLE `seller_levels`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;
COMMIT;