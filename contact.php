<?php
$nomor_wa = "6281327297874";

$url_wa = "https://api.whatsapp.com/send?phone=" . $nomor_wa . "&text=" . urlencode($text_wa);

header("Location: " . $url_wa);
exit();
?>