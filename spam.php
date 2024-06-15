<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $webhook_url = $_POST['webhook_url'];
    $message = $_POST['message'];
    $count = intval($_POST['count']);

    // Webhook URL'sinin geçerli olup olmadığını kontrol et
    if (filter_var($webhook_url, FILTER_VALIDATE_URL) === false) {
        die("Geçersiz Webhook URL'si");
    }

    for ($i = 0; $i < $count; $i++) {
        $payload = json_encode(["content" => $message]);

        $ch = curl_init($webhook_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($http_code != 204) {
            echo "Mesaj gönderme başarısız: HTTP $http_code<br>";
        }

        curl_close($ch);
    }

    echo "Mesajlar başarıyla gönderildi!";
} else {
    echo "Geçersiz istek yöntemi.";
}
?>
