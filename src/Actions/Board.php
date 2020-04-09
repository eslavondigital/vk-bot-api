<?php


namespace Eslavon\VkBotApi\Actions;


use Eslavon\VkBotApi\Request\VKApiRequest;

class Board
{
    private VKApiRequest $request;

    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    public function deleteComment(int $group_id, int $topic_id, int $comment_id)
    {
        $parameters = [
            'group_id' => $group_id,
            'topic_id' => $topic_id,
            'comment_id' => $comment_id
        ];
        return $this->request->post('board.deleteComment', $parameters);
    }

    public function restoreComment(int $group_id, int $topic_id, int $comment_id)
    {
        $parameters = [
            'group_id' => $group_id,
            'topic_id' => $topic_id,
            'comment_id' => $comment_id
        ];
        return $this->request->post('board.restoreComment', $parameters);
    }
}