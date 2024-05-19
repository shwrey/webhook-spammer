<?php 

$baslangic = 0;
$sayi = $_POST["adet"];
$mesaj = $_POST["mesaj"];
$webhook_url = $_POST["webhook_url"];
$random = $_POST["random"];
$username = $_POST["username"];
$renk = $_POST["renk"];
$embed = $_POST["embed"];
$baslik = $_POST["baslik"];
$title = $_POST["yazi"];
$foother = $_POST["foother"];
while($baslangic < $sayi) {

    if($random == 1){
        $rand = rand(0,9999);
        $rand = crc32($rand);

        $username = $rand;
    }

    $webhookurl = "$webhook_url";



$timestamp = date("c", strtotime("now"));
if ($embed == 1){


    $json_data = json_encode([
    
        "content" => "$mesaj",
        
       
        "username" => "$username",
    
       
        "avatar_url" => "https://media.discordapp.net/attachments/1233134813360427061/1241807060589609092/438267638_384942291212517_6494945157967387647_n.jpg?ex=664b8a72&is=664a38f2&hm=d01f5a6e1de3015f483072f411b5c3d176f321a68673da78bc7d2478534b1aad&=&format=webp&width=168&height=168",
    
        
        "tts" => false,
    
        
        //"file" => "",
            
        "embeds" => [
            [
                
                "title" => "$title",
    
                
                "type" => "rich",
    
                
                "url" => "",
    
               
                "timestamp" => $timestamp,
    
                
                "color" => hexdec( "$renk" ),
    
                
                "footer" => [
                    "text" => "$foother",
                    "icon_url" => "https://media.discordapp.net/attachments/1233134813360427061/1241807060589609092/438267638_384942291212517_6494945157967387647_n.jpg?ex=664b8a72&is=664a38f2&hm=d01f5a6e1de3015f483072f411b5c3d176f321a68673da78bc7d2478534b1aad&=&format=webp&width=168&height=168"
                ],
              
                "author" => [
                    "name" => "$baslik",
                    
                ]
    
            ]
        ]
    
       
    
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

}else{
$json_data = json_encode([
    
    "content" => "$mesaj",
    
   
    "username" => "$username",

   
    "avatar_url" => "https://media.discordapp.net/attachments/1233134813360427061/1241807060589609092/438267638_384942291212517_6494945157967387647_n.jpg?ex=664b8a72&is=664a38f2&hm=d01f5a6e1de3015f483072f411b5c3d176f321a68673da78bc7d2478534b1aad&=&format=webp&width=168&height=168",

    
    "tts" => false,

    
    //"file" => "",


   

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

}

$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);

curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
curl_close( $ch );
$baslangic++;

 }

 header('Location: index.php?mesaj='.$sayi.' mesaj gönderildi');


?>