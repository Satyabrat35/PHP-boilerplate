<?php
require_once '../application/config/config.php';
error_reporting(E_ERROR | E_PARSE);

$url = 'https://api.openai.com/v1/chat/completions';
$auth_header = 'Authorization: Bearer ' . CHAT_GPT_API;

if(isset($_POST, $_POST['search']))
{
    $query = $_POST['search'];
} else {
    $query = 'How is the weather ?';
}

$data = array(
    "model" => "gpt-3.5-turbo",
    "messages" => array(
        array(
            "role" => "user",
            "content" => $query
        )
    ),
    "max_tokens" => 48,
    "temperature" => 0
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $auth_header));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));


$response = curl_exec($ch);

if(curl_errno($ch))
{
    echo 'Error: ' . curl_error($ch);
}
curl_close($ch);
$result = json_decode($response, true);

//echo $response;
//var_dump($result->choices[0]->message->content);
echo $result['choices'][0]['message']['content'];

