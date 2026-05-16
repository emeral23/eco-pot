<?php
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Fungsi buat potong teks biar nggak kepanjangan di list blog
function limitText($text, $limit = 100) {
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit) . "...";
    }
    return $text;
}
?>