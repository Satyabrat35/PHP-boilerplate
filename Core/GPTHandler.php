<?php
require_once '../application/config/config.php';

$url = 'https://api.openai.com/v1/engines/davinci-codex/completions';
$auth_header = 'Authorization: Bearer ' . CHAT_GPT_API;

$data = array(
    'prompt' => 'Hello,',
    'max_tokens' => 5,
    'n' => 1
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

echo $result['choices'][0]['text'];

