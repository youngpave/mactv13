<?php
// Hedef embed adresi
$targetUrl = "https://mediaprocdn.top/embed/player?config=0a562ec6-6d5a-4dea-af99-354f7593485d";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Hedef sunucunun beklediği Referer ve Origin başlıklarını kendi alan adından geliyor gibi ayarlıyoruz
curl_setopt($ch, CURLOPT_REFERER, "https://mediaprocdn.top/");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Origin: https://mediaprocdn.top",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
]);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURL_INFO_HTTP_CODE);
curl_close($ch);

if ($httpCode == 200) {
    // İçeriği ekrana güvenli bir şekilde metin olarak basıyoruz
    echo "<pre>" . htmlspecialchars($response) . "</pre>";
} else {
    echo "Akış Yüklenemedi, Hata Kodu: " . $httpCode;
}
?>
