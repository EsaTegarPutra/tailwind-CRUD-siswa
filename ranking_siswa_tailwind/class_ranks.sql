-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 03 Sep 2023 pada 17.22
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class_ranks`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `scores`
--

CREATE TABLE `scores` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `scores`
--

INSERT INTO `scores` (`id`, `student_id`, `score`) VALUES
(3, 3, 90),
(4, 4, 85),
(6, 6, 90),
(7, 7, 80),
(8, 60, 80),
(9, 62, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `nis` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `name`, `nis`) VALUES
(3, 'Adystya Anandita', ''),
(4, 'Aisyah Salsabilah', ''),
(6, 'Aldo Ahmad Hirzi', ''),
(7, 'Ali Zainal Abidin Shahab', ''),
(60, 'Allya Bunga Lestari', ''),
(62, 'Anis Rahmawati', ''),
(63, 'esa', '1234'),
(64, '', ''),
(65, '', '1111'),
(66, '', '1233'),
(67, '', '1234'),
(68, '', '1235'),
(69, 'Esa Tegar Putra Utama', '1113'),
(70, 'Muhammad Fadlan Kamil', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(8, 'fadlan', 'idan', '$2y$10$ivOXcWT3.xmfd0yoIFj6POkyXGywtXgP0KOICjYxqcDCTc0b0Z7qa'),
(9, 'esa aja', 'esa', '$2y$10$Iykb6drm6YKPps2qu5wLieaifXC38lMc/92pHOfCsCAYZi66J0lyu'),
(10, 'akuesa', 'tegar', '$2y$10$VxolOh8WzgqdTv78/zB0NOepb3y2CMkwOBia0r8aJNNxc4jjPquom'),
(11, 'akuesa', 'tegar', '$2y$10$dKQUh2Kx4wf1K8yNrtf5oOj6qjxbpdvNpTiyLO9O80qwCd/9rbNDG'),
(12, 'a', 'a', '$2y$10$Sm02bXfc7Y9D9x.2AbntTOt0ibFyXmJsP5F/tip8wDio03aeNzlEW'),
(13, 'rr', 'rr', '$2y$10$k.9r2ysPxxDe9FYYZtPL.u41DxrNLjgnALecG3GZXfM9DS783QMgK');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
