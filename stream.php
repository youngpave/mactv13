<?php
// Vermiş olduğun yeni premium m3u8 linki
$m3u8_url = "https://zomis.zempovlantis.online/premium63/index.m3u8";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $m3u8_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// 403 Engelini Aşan Kritik Kimlik Bilgileri
// İstek bu domainden geliyormuş gibi manipüle ediliyor
curl_setopt($ch, CURLOPT_REFERER, "https://zomis.zempovlantis.online/"); 
curl_setopt($ch, CURLOPT_USER_AGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36");

// Tarayıcıya bunun bir IPTV canlı yayın akışı olduğunu söylüyoruz
header("Content-Type: application/vnd.apple.mpegurl");

$output = curl_exec($ch);
curl_close($ch);

// Çekilen canlı yayın verisini kendi player'ımıza üflüyoruz
echo $output;
?>
