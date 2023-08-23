<?php

use Dotenv\Dotenv;

use LINE\Clients\MessagingApi\Model\ReplyMessageRequest;
use LINE\Clients\MessagingApi\Model\TextMessage;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isMethod('GET')) {
    echo 'Hello World';
    exit;
}

$data = getBody();

$client = new \GuzzleHttp\Client();
$config = new \LINE\Clients\MessagingApi\Configuration();
$config->setAccessToken($_ENV['LINE_BOT_CHANNEL_ACCESS_TOKEN']);
$messagingApi = new \LINE\Clients\MessagingApi\Api\MessagingApiApi(
    client: $client,
    config: $config,
);

$request = new ReplyMessageRequest([
    'replyToken' => $data['events'][0]['replyToken'],
    'messages' => [new TextMessage([
        'type' => 'text',
        'text' => $data['events'][0]['message']['text'],
    ])]
]);

$response = $messagingApi->replyMessage($request);
