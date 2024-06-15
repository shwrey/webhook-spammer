<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharey Webhook Spammer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Sharey Webhook Spammer</h1>
        <form action="spam.php" method="post">
            <label for="webhook_url">Webhook URL:</label><br>
            <input type="text" id="webhook_url" name="webhook_url" required><br><br>
            
            <label for="message">Mesaj:</label><br>
            <textarea id="message" name="message" required></textarea><br><br>
            
            <label for="count">Kaç Defa:</label><br>
            <input type="number" id="count" name="count" required min="1"><br><br>
            
            <input type="submit" value="Spam Başlat">
        </form>
    </div>
</body>
</html>
