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

    /**
     * Deletes a topic post in community discussions.
     *
     * @param int $group_id - community identifier, required
     * @param int $topic_id - discussion identifier, required
     * @param int $comment_id - ID of the comment in the discussion, required
     * @return string
     */
    public function deleteComment(int $group_id, int $topic_id, int $comment_id)
    {
        $parameters = [
            'group_id' => $group_id,
            'topic_id' => $topic_id,
            'comment_id' => $comment_id
        ];
        return $this->request->post('board.deleteComment', $parameters);
    }

    /**
     * Recovers deleted topic message in group discussions.
     *
     * @param int $group_id - community identifier, required
     * @param int $topic_id - discussion identifier, required
     * @param int $comment_id - ID of the comment in the discussion, required
     * @return string
     */
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