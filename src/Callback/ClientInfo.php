<?php


namespace Eslavon\VkBotApi\Callback;


class ClientInfo
{
    private array $button_actions;

    private bool $keyboard;

    private bool $inline_keyboard;


    public function __construct(string $json)
    {
        $data = json_decode($json);
        $this->button_actions = $data->object->client_info->button_actions;
        $this->keyboard = $data->object->client_info->keyboard;
        $this->inline_keyboard = $data->object->client_info->inline_keyboard;
    }

    /**
     * @return array
     */
    public function getButtonActions(): array
    {
        return $this->button_actions;
    }

    /**
     * @return bool
     */
    public function isKeyboard(): bool
    {
        return $this->keyboard;
    }

    /**
     * @return bool
     */
    public function isInlineKeyboard(): bool
    {
        return $this->inline_keyboard;
    }

    /**
     * @return int
     */
    public function getLanguageId(): int
    {
        return $this->language_id;
    }
}