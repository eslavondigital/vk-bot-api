<?php


namespace Eslavon\VkBotApi\Callback;


use Eslavon\VkBotApi\Callback\Messages;

class CallbackApi
{
    private string $event_type;

    private int $group_id;

    private string $event_id;

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->group_id;
    }

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->event_id;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secret_key;
    }

    /**
     * @return ClientInfo
     */
    public function getClientInfo(): ClientInfo
    {
        return $this->client_info;
    }

    private string $secret_key;

    private ClientInfo $client_info;

    public function getEventType(): string
    {
        return $this->event_type;
    }

    public function getRawBody(): string
    {
        return file_get_contents('php://input');
    }

    public function run()
    {
        $json = $this->getRawBody();
        $data = json_decode($json);
        if (isset($data->object->client->info)) {
            $this->client_info = new ClientInfo($json);
        }
        $this->event_type = $data->type;
        $this->group_id = $data->group_id;
        $this->event_id = (isset($data->event_id))? $data->event_id: "";
        $this->secret_key = (isset($data->secret))? $data->secret: "";
        switch ($data->type) {
            case 'message_new';
            case 'message_reply';
            case 'message_edit';
            case 'message_allow';
            case 'message_deny';
            case 'message_typing_state';
                return new Messages($json);
                break;
            case 'group_join';
            case 'group_leave';
                return new Join($json);
                break;

        }
    }
}