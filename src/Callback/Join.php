<?php


namespace Eslavon\VkBotApi\Callback;


class Join
{
    private int $peer_id;

    public function __construct(string $json)
    {
        $data = json_decode($json);
        switch ($data->type) {
            case 'group_join';
            case 'group_leave';
                $this->peer_id = $data->object->user_id;
                break;
        }
    }

    public function getPeerId(): int
    {
        return $this->peer_id;
    }
}