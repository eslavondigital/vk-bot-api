<?php


namespace Eslavon\VkBotApi\Helper;


class Messages
{
    private int $user_id;

    private int $peer_id;

    private string $domain;

    private int $chat_id;

    private int $random_id;

    private string $message;

    private string $attachment;

    private float $lat;

    private float $long;

    private int $reply_to;

    private string $forward_messages;

    private int $sticker_id;

    private Keyboard $keyboard;

    private string $payload;

    private bool $dont_parse_links;

    private bool $disable_mentions;

    private string $intent;


    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getPeerId(): int
    {
        return $this->peer_id;
    }

    public function setPeerId(int $peer_id): void
    {
        $this->peer_id = $peer_id;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    public function getChatId(): int
    {
        return $this->chat_id;
    }

    public function setChatId(int $chat_id): void
    {
        $this->chat_id = $chat_id;
    }

    public function getRandomId(): int
    {
        return $this->random_id;
    }

    public function setRandomId(): void
    {
        $this->random_id = mt_rand(PHP_INT_MIN, PHP_INT_MAX);
    }


    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getAttachment(): string
    {
        return $this->attachment;
    }

    public function setAttachment(string $attachment): void
    {
        $this->attachment = $attachment;
    }

    public function addAttachment(string $add_attachment)
    {
        $this->attachment = (isset($this->attachment)) ? $this->attachment.",".$add_attachment : $add_attachment;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): void
    {
        $this->lat = $lat;
    }

    public function getLong(): float
    {
        return $this->long;
    }

    public function setLong(float $long): void
    {
        $this->long = $long;
    }

    public function getLocation(): array
    {
        return ["lat" => $this->getLat(), "long" => $this->getLong()];
    }

    public function setLocation(array $location)
    {
        $this->setLat($location["lat"]);
        $this->setLong($location["long"]);
    }

    public function getReplyTo(): int
    {
        return $this->reply_to;
    }

    public function setReplyTo(int $reply_to): void
    {
        $this->reply_to = $reply_to;
    }

    public function getForwardMessages(): string
    {
        return $this->forward_messages;
    }

    public function setForwardMessages(string $forward_messages): void
    {
        $this->forward_messages = $forward_messages;
    }

    public function getStickerId(): int
    {
        return $this->sticker_id;
    }

    public function setStickerId(int $sticker_id): void
    {
        $this->sticker_id = $sticker_id;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }

    public function isDontParseLinks(): bool
    {
        return $this->dont_parse_links;
    }

    public function setDontParseLinks(bool $dont_parse_links): void
    {
        $this->dont_parse_links = $dont_parse_links;
    }

    public function isDisableMentions(): bool
    {
        return $this->disable_mentions;
    }

    public function setDisableMentions(bool $disable_mentions): void
    {
        $this->disable_mentions = $disable_mentions;
    }

    public function getIntent(): string
    {
        return $this->intent;
    }

    public function setIntent(string $intent): void
    {
        $this->intent = $intent;
    }

    public function keyboard(): Keyboard
    {
        if (isset($this->keyboard) === false) {
            $this->keyboard = new Keyboard();
        }
        return $this->keyboard;
    }


    public function getParameters(): array
    {
        if (isset($this->domain)) {
            $parameters["domain"] = $this->domain;
        } elseif (isset($this->user_id)) {
            $parameters["user_id"] = $this->user_id;
        } else {
            $parameters["peer_id"] = $this->peer_id;
        }

        if (isset($this->message)) {
            $parameters["message"] = $this->message;
        }

        if (isset($this->attachment)) {
            $parameters["attachment"] = $this->attachment;
        }

        if (isset($this->lat) and isset($this->long)) {
            $parameters["lat"] = $this->lat;
            $parameters["long"] = $this->long;
        }

        if (isset($this->random_id) === false) {
            $this->setRandomId();
        }
        $parameters["random_id"] = $this->random_id;

        if (isset($this->reply_to)) {
            $parameters["reply_to"] = $this->reply_to;
        }

        if (isset($this->sticker_id)) {
            $parameters["stiker_id"] = $this->sticker_id;
        }

        if (isset($this->forward_messages)) {
            $parameters["forward_messages"] = $this->forward_messages;
        }

        if (isset($this->payload)) {
            $parameters["payload"] = $this->payload;
        }

        if (isset($this->dont_parse_links)) {
            $parameters["dont_parse_link"] = $this->dont_parse_links;
        }

        if (isset($this->disable_mentions)) {
            $parameters["disable_mentions"] = $this->disable_mentions;
        }

        if (isset($this->intent)) {
            $parameters["intent"] = $this->intent;
        }

        if (isset($this->keyboard)) {
            $parameters["keyboard"] = $this->keyboard->getKeyboard();
        }
        return $parameters;
    }
}