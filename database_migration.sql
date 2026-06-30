-- =====================================================================
-- MIGRASI DATABASE UNTUK MENDUKUNG KATEGORI PRODUK (POT & BRIKET)
-- =====================================================================

-- Tambahkan kolom kategori_produk ke table products
ALTER TABLE products ADD COLUMN kategori_produk VARCHAR(50) DEFAULT 'pot' AFTER id_product;

-- Update indeks untuk performa filtering kategori
ALTER TABLE products ADD INDEX idx_kategori (kategori_produk);

-- Verifikasi struktur table (jalankan ini di PHPMyAdmin atau command line):
-- DESCRIBE products;

-- =====================================================================
-- PENJELASAN PERUBAHAN:
-- =====================================================================
-- 1. kategori_produk: VARCHAR(50) untuk menyimpan tipe produk
--    - 'pot' untuk pot tanaman
--    - 'briket' untuk briket organik
--    - Dapat diperluas di masa depan
--
-- 2. DEFAULT 'pot': Produk existing otomatis kategorikan sebagai pot
--
-- 3. idx_kategori: Index untuk mempercepat query filtering by kategori
-- =====================================================================
