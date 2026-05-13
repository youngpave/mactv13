<?php
// Hedef kanal linki
$url = "https://dlhd.pk/stream/stream-62.php";

$ch = curl_init();

// Header (Başlık) ayarları - Kendimizi tamamen orijinal site gibi tanıtıyoruz
$headers = [
    "Origin: https://dlhd.pk",
    "Referer: https://dlhd.pk/",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36",
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8",
    "Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7",
    "Connection: keep-alive"
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Çerez (Cookie) Yönetimi - Oturumu canlı tutar
curl_setopt($ch, CURLOPT_COOKIEFILE, ""); // Gelen çerezleri oku
curl_setopt($ch, CURLOPT_COOKIEJAR, "");  // Çerezleri oturum boyunca sakla

$response = curl_exec($ch);
curl_close($ch);

// Yayıncı sitenin içindeki linkleri (JS, CSS, Resim) kendi üzerinden değil, 
// orijinal site üzerinden çekmesi için yolları düzeltiyoruz.
if ($response) {
    $base_url = "https://dlhd.pk/stream/";
    
    // Göreceli yolları tam URL'ye çeviriyoruz
    $response = str_replace('src="', 'src="' . $base_url, $response);
    $response = str_replace('href="', 'href="' . $base_url, $response);
    
    // Eğer içerikte başka yönlendirmeler varsa onları da temizlemiş oluruz
    echo $response;
} else {
    echo "Yayın şu an çekilemiyor, lütfen bağlantınızı kontrol edin.";
}
?>
