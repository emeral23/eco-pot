<?php
$nomor_wa = "6289654979214";

$url_wa = "https://api.whatsapp.com/send?phone=" . $nomor_wa . "&text=" . urlencode($text_wa);

header("Location: " . $url_wa);
exit();
?>