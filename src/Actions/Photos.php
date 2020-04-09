<?php


namespace Eslavon\VkBotApi\Actions;


use Eslavon\VkBotApi\Request\VKApiRequest;

class Photos
{
    private VKApiRequest $request;

    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    public function getMessagesUploadServer(int $peer_id)
    {
        $parameters = [
            'peer_id' => $peer_id,
        ];
        return $this->request->post('photos.getMessagesUploadServer', $parameters);
    }

    public function saveMessagesPhoto(string $photo, int $server, string $hash)
    {
        $parameters = [
            'photo' => $photo,
            'server' => $server,
            'hash' => $hash
        ];
        return $this->request->post('photos.saveMessagesPhoto', $parameters);
    }
}