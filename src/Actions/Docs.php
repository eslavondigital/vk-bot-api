<?php


namespace Eslavon\VkBotApi\Actions;


use Eslavon\VkBotApi\Request\VKApiRequest;

/**
 * Class Docs
 * @package Eslavon\VkBotApi\Actions
 */
class Docs
{
    /**
     * Object VKApiRequest
     * @var VKApiRequest $request
     */
    private VKApiRequest $request;

    /**
     * Docs constructor.
     * @param VKApiRequest $request - Object VKApiRequest
     */
    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Gets the server address for downloading the document in a private message.
     *
     * @param int $peer_id - destination identifier, required
     * @param string $type - type of document. Default: doc
     * @return string
     */
    public function getMessagesUploadServer(int $peer_id, string $type = 'doc'): string
    {
        $parameters = [
            'peer_id' => $peer_id,
            'type' => $type
        ];
        return $this->request->post('docs.getMessagesUploadServer', $parameters);
    }

    /**
     * Returns the server address for downloading documents to the Sent folder,
     * for subsequent sending the document to the wall or by personal message.
     *
     * @param int $group_id
     * @return string
     */
    public function getWallUploadServer(int $group_id): string
    {
        $parameters = [
            'group_id' => $group_id
        ];
        return $this->request->post('docs.getWallUploadServer', $parameters);
    }

    /**
     * Saves the document after it is successfully uploaded to the server.
     *
     * @param string $file
     * @param string $title
     * @param string $tags
     * @return string
     */
    public function save(string $file, string $title, string $tags = 'eslavondigital'): string
    {
        $parameters = [
            'file' => $file,
            'title' => $title,
            'tags' => $tags
        ];
        return $this->request->post('docs.save', $parameters);
    }

    /**
     * Returns search results for documents.
     *
     * @param string $q
     * @param bool $search_own
     * @param int $count
     * @param int $offset
     * @return string
     */
    public function search( string $q, bool $search_own = false, int $count = 20, int $offset = 0): string
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