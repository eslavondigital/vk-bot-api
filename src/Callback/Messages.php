<?php


namespace Eslavon\VkBotApi\Callback;


class Messages
{
    private int $date;

    private int $from_id;

    private int $id;

    private int $out;

    private int $peer_id;

    private string $text;

    private int $conversation_message_id;

    private array $fwd_messages;

    private bool $important;

    private int $random_id;

    private array $attachments;

    private string $payload;

    private bool $is_hidden;

    private int $admin_author_id;

    private int $update_time;

    private int $user_id;

    private string $allow_key;

    private string $state;

    public function __construct(string $json)
    {
        $data = json_decode($json);
        switch ($data->type) {
            case 'message_new';
                $this->date = $data->object->message->date;
                $this->from_id = $data->object->message->from_id;
                $this->id = $data->object->message->id;
                $this->out = $data->object->message->out;
                $this->peer_id = $data->object->message->peer_id;
                $this->text = $data->object->message->text;
                $this->conversation_message_id = $data->object->message->conversation_message_id;
                $this->fwd_messages = $data->object->message->fwd_messages;
                $this->important = $data->object->message->important;
                $this->random_id = $data->object->message->random_id;
                $this->attachments = $data->object->message->attachments;
                $this->payload = (isset($data->object->message->payload)) ? $data->object->message->payload : "";
                $this->is_hidden = $data->object->message->is_hidden;
                break;
            case 'message_reply';
            case 'message_edit';
                $this->date = $data->object->date;
                $this->from_id = $data->object->from_id;
                $this->id = $data->object->id;
                $this->out = $data->object->out;
                $this->peer_id = $data->object->peer_id;
                $this->text = $data->object->text;
                $this->conversation_message_id = $data->object->conversation_message_id;
                $this->fwd_messages = $data->object->fwd_messages;
                $this->important = $data->object->important;
                $this->random_id = $data->object->random_id;
                $this->attachments = $data->object->attachments;
                $this->payload = (isset($data->object->payload)) ? $data->object->payload : "";
                $this->is_hidden = $data->object->is_hidden;
                $this->admin_author_id = (isset($data->object->admin_author_id)) ? $data->object->admin_author_id : 0;
                $this->update_time = (isset($data->object->update_time)) ? $data->object->update_time : 0;
                break;
            case 'message_allow';
            case 'message_deny';
                $this->user_id = $data->object->user_id;
                $this->allow_key = (isset($data->object->key))? $data->object->key : "";
                break;
            case 'message_typing_state';
                $this->state = $data->object->state;
                $this->from_id = $data->object->from_id;
                break;

        }
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getFromId(): int
    {
        return $this->from_id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getOut(): int
    {
        return $this->out;
    }

    /**
     * @return int
     */
    public function getPeerId(): int
    {
        return $this->peer_id;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return int
     */
    public function getConversationMessageId(): int
    {
        return $this->conversation_message_id;
    }

    /**
     * @return array
     */
    public function getFwdMessages(): array
    {
        return $this->fwd_messages;
    }

    /**
     * @return bool
     */
    public function isImportant(): bool
    {
        return $this->important;
    }

    /**
     * @return int
     */
    public function getRandomId(): int
    {
        return $this->random_id;
    }

    /**
     * @return array
     */
    public function getAttachments(): array
    {
        return $this->attachments;
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->is_hidden;
    }

    /**
     * @return int
     */
    public function getAdminAuthorId(): int
    {
        return $this->admin_author_id;
    }

    /**
     * @return int
     */
    public function getUpdateTime(): int
    {
        return $this->update_time;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getAllowKey(): string
    {
        return $this->allow_key;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }


}