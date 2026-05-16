<?php
// Hedef premium m3u8 linki
$m3u8_url = "https://zomis.zempovlantis.online/premium63/index.m3u8";
$base_url = "https://zomis.zempovlantis.online/premium63/";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $m3u8_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Kimlik maskeleme
curl_setopt($ch, CURLOPT_REFERER, "https://zomis.zempovlantis.online/"); 
curl_setopt($ch, CURLOPT_USER_AGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36");

$output = curl_exec($ch);
curl_close($ch);

// Çıktı türünü canlı yayın m3u8 olarak ayarla
header("Content-Type: application/vnd.apple.mpegurl");

// EĞER İÇİNDEKİ PARÇALAR GÖRECELİ LİNK İSE BAŞINA ANA DOMAINI EKLİYORUZ
// Bu sayede player .ts dosyalarını senin lokalinde aramak yerine doğru adrese gidecek
if (strpos($output, "http") === false) {
    // Satır satır m3u8 içeriğini tara ve .ts linklerinin başına gerçek adresi çak
    $output = preg_replace('/(?<!http|https)([\w\.-]+\.ts)/', $base_url . '$1', $output);
}

echo $output;
?>
