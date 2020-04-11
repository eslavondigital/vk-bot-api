<?php
require_once __DIR__ . '../vendor/autoload.php';

use GuzzleHttp\Client;
use Eslavon\VkBotApi\VkBotApi;


echo "ok";

$vk = new VkBotApi(new Client(), '6b09ff759c99dd5c41d5fe017d70a1749a575178d7b4962ce66ec6a1b2b0c682e8bd6951ef3db3f3dfd19');
$json = file_get_contents(__DIR__ . '/test/event/messages/message_new.json');
$event = $vk->callback()->run($json);

switch ($vk->callback()->getEventType()) {
    case "message_new";
        if ($event->getPayload() == "") {
            $result = $vk->docs()->search($event->getText(), false, 10);
            var_dump($result);
            $data = json_decode($result);
            if ($data->response->count == 0) {
                $send_text = 'По вашему запросу «' . $event->getText() . '» ничего не найдено!';
            } else {
                foreach ($data->response->items as $key => $value) {
                    $attach = 'doc' . $value->owner_id . '_' . $value->id;
                    $vk->helper()->messages()->addAttachment($attach);
                }
                $send_text = 'Вот что я нашел по вашему запросу «' . $event->getText() . '»';
            }
            $vk->helper()->messages()->setMessage($send_text);
            $vk->helper()->messages()->setPeerId($event->getPeerId());
            $vk->messages()->send($vk->helper()->messages()->getParameters());
        }
}