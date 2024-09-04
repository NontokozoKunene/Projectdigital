
CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `pub_name` varchar(100) DEFAULT NULL,
  `beer_name` varchar(100) DEFAULT NULL,
  `quantity_sold` int(11) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `sales` (`id`, `pub_name`, `beer_name`, `quantity_sold`, `sale_date`, `created_at`) VALUES
(1, 'Pub 1', 'Beer A', 10, '2023-01-01', '2024-08-27 17:25:17');


ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);
COMMIT;

