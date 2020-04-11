<?php


namespace Eslavon\VkBotApi\Helper;


use Eslavon\VkBotApi\Actions\Groups;
use Eslavon\VkBotApi\Request\VKApiRequest;

class Install
{
    private VKApiRequest $request;

    private Groups $groups;

    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    public function start(string $url, int $group_id, string $title)
    {
        $this->groups = new Groups($this->request);
        if ($this->getServer($url, $group_id) === false) {
           $result_add =  $this->groups->addCallbackServer($group_id, $url, $title, $this->generateSecretKey());
           $result_add = json_decode($result_add);
           $server_id = $result_add->response->server_id;
           $this->groups->setCallbackSettings($group_id,  $server_id, ["message_new" => true], '5.103');
           $this->groups->setSetting($group_id, true, true, false,false);
        }

    }

    private function getServer(string $url, int $group_id): bool
    {
        $server_data =  $this->groups->getCallbackServers($group_id);
        $server_data = json_decode($server_data);
        if ($server_data->response->count == 0) {
            return false;
        }
        foreach ($server_data->response->items as $key => $value) {
            if ($value->url == $url and $value->status == "ok") {
                return true;
            } else {
                return false;
            }
        }
    }

    private function generateSecretKey(): string
    {
        return "gksdlvvvsdfgsgsgsgsGEgsfsdfAEg";
    }
}