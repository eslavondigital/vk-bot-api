<?php


namespace Eslavon\VkBotApi\Actions;


use Eslavon\VkBotApi\Request\VKApiRequest;

class Docs
{
    private VKApiRequest $request;

    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    public function getMessagesUploadServer(int $peer_id, string $type = "doc")
    {
        $parameters = [
            'peer_id' => $peer_id,
            'type' => $type
        ];
        return $this->request->post('docs.getMessagesUploadServer', $parameters);
    }

    public function getWallUploadServer(int $group_id)
    {
        $parameters = [
            'group_id' => $group_id
        ];
        return $this->request->post('docs.getWallUploadServer', $parameters);
    }

    public function save(string $file, string $title, string $tags = 'eslavondigital')
    {
        $parameters = [
            'file' => $file,
            'title' => $title,
            'tags' => $tags
        ];
        return $this->request->post('docs.save', $parameters);
    }

    public function search( string $q, bool $search_own = false, int $count = 20, int $offset = 0)
    {
        $parameters = [
            'q' => $q,
            'search_own' => $search_own,
            'count' => $count,
            'offset' => $offset
        ];
        return $this->request->post('docs.search', $parameters);
    }
}