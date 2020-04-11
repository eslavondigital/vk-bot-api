<?php
require_once __DIR__.'../vendor/autoload.php';

use GuzzleHttp\Client;
use Eslavon\VkBotApi\VkBotApi;

$vk = new VkBotApi(new Client(), 'ACCESS TOKEN ' );
$result = $vk->helper()->install()->start('URL ',0, 'NAME BOT');


$event = $vk->callback()->run();

switch ($vk->callback()->getEventType()) {
    case "confirmation";
        echo $vk->groups()->getCallbackConfirmationCode($vk->callback()->getGroupId());
        break;
    case "message_new";
        echo "ok";
        $result = $vk->docs()->search($event->getText(), false, 10);
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
        break;
}
