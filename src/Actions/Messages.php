<?php


namespace Eslavon\VkBotApi\Actions;


use Eslavon\VkBotApi\Request\VKApiRequest;

class Messages
{
    private VKApiRequest $request;

    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    public function createChat(string $user_ids, string $title, int $group_id)
    {
        $parameters = [
            'user_ids' => $user_ids,
            'title' => $title,
            'group_id' => $group_id
        ];
        return $this->request->post('messages.createChat', $parameters);
    }

    public function delete(string $message_ids, bool $spam, int $group_id, bool $delete_for_all = false)
    {
        $parameters = [
            'message_ids' => $message_ids,
            'spam' => $spam,
            'group_id' => $group_id,
            'delete_for_all' => $delete_for_all
        ];
        return $this->request->post('messages.delete', $parameters);
    }

    public function deleteChatPhoto(int $chat_id, int $group_id)
    {
        $parameters = [
            'chat_id' => $chat_id,
            'group_id' => $group_id,
        ];
        return $this->request->post('messages.deleteChatPhoto', $parameters);
    }

    public function editChat(int $chat_id, string $title)
    {
        $parameters = [
            'chat_id' => $chat_id,
            'title' => $title,
        ];
        return $this->request->post('messages.editChat', $parameters);
    }

    public function send(array $parameters)
    {
        return $this->request->post('messages.send', $parameters);
    }

}