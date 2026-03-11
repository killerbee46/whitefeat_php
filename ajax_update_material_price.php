<?php
function getGoldSilverRatesFenegosida()
{

    $cacheFile = __DIR__ . "/gold_silver_cache.json";
    $cacheDuration = 86400; // 24 hours

    // 1️⃣ Check cache first
    if (file_exists($cacheFile)) {
        $cacheData = json_decode(file_get_contents($cacheFile), true);

        if ($cacheData && (time() - $cacheData['timestamp'] < $cacheDuration)) {
            return $cacheData['data'];
        }
    }

    // 2️⃣ Scrape fresh data
    $url = "https://fenegosida.org/";

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64)",
        CURLOPT_HTTPHEADER => [
            "Accept: text/html",
            "Accept-Language: en-US,en;q=0.9"
        ],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 10
    ]);

    $html = curl_exec($ch);
    curl_close($ch);

    if (!$html) {
        return null;
    }

    libxml_use_internal_errors(true);

    $dom = new DOMDocument();
    $dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    $rows = $xpath->query("//table//tr");

    $gold = null;
    $silver = null;

    foreach ($rows as $row) {

        $text = trim(preg_replace('/\s+/', ' ', $row->textContent));

        if (stripos($text, "Hallmark") !== false && preg_match('/([\d,]+)/', $text, $m)) {
            $gold = (int) str_replace(",", "", $m[1]);
        }

        if (stripos($text, "Silver") !== false && preg_match('/([\d,]+)/', $text, $m)) {
            $silver = (int) str_replace(",", "", $m[1]);
        }
    }

    $result = [
        "gold_per_tola" => $gold,
        "silver_per_tola" => $silver
    ];

    // 3️⃣ Save cache
    file_put_contents($cacheFile, json_encode([
        "timestamp" => time(),
        "data" => $result
    ]));

    return $result;
}

?>