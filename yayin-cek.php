<?php
// Yeni hedef DaddyLive yayın linki
$hedef_url = "https://dlhd.pk/stream/stream-62.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $hedef_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // SSL hatalarını engellemek için

// İŞTE O SİTEDEN GELİYORMUŞUZ GİBİ YAPTIĞIMIZ KISIM:
// DaddyLive'a "Ben senin kendi sitenden bir iç sayfayım" sinyali gönderiyoruz
curl_setopt($ch, CURLOPT_REFERER, "https://dlhd.pk/"); 
curl_setopt($ch, CURLOPT_USER_AGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36");

$kaynak_kod = curl_exec($ch);
curl_close($ch);

// Sunucudan gelen kodun içindeki o ekranda çıkan sinir bozucu reklam scriptlerini temizliyoruz
// Genellikle yayını kirleten pop-under veya overlay reklam ağlarının scriptlerini burada bloke ediyoruz
$temiz_kod = str_replace(
    ["atg.site", "adsco.re", "popads.net", "propellerads.com", "onclickads.net"], 
    ["gitti.site", "skor.re", "pop-yasak.net", "reklam-yok.com", "tiklama-yok.net"], 
    $kaynak_kod
);

// Temizlenmiş ve kandırılmış kodu ekrana basıyoruz
echo $temiz_kod;
?>
