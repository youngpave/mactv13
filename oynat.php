<?php
// 1. Hedef URL
$url = "https://dlhd.pk/stream/stream-62.php";

// 2. cURL Başlat
$ch = curl_init();

// 3. Tarayıcıyı ve Yönlendirmeyi Taklit Et (PC Chrome gibi davran)
$headers = [
    "Referer: https://dlhd.pk/", // Karşı siteye "Ben senin içinden geliyorum" diyoruz.
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36",
    "Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7"
];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Eğer link başka yere yönlenirse takip et.
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // SSL hatalarını görmezden gel (stabilite için).

// 4. İçeriği çek
$response = curl_exec($ch);
curl_close($ch);

// 5. İçeriği ekrana basmadan önce HTML içindeki "relative" linkleri düzeltelim
// Yayıncı site içindeki dosyalar (js, css) dlhd.pk üzerinde olduğu için yolları tam yazmalıyız.
$base_url = "https://dlhd.pk/stream/";
$response = str_replace('src="', 'src="'.$base_url, $response);
$response = str_replace('href="', 'href="'.$base_url, $response);

// 6. Ekrana Bas
echo $response;
?>
