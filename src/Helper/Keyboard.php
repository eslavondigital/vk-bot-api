<?php


namespace Eslavon\VkBotApi\Helper;


class Keyboard
{
    private bool $one_time;
    private bool $inline;
    private array $buttons;

    public function __construct()
    {
        $this->one_time = false;
        $this->inline = false;
        $this->buttons = [[]];
    }

    public function getOneTime(): bool
    {
        return $this->one_time;
    }

    public function setOneTime(bool $one_time)
    {
        $this->one_time = $one_time;
    }

    public function getInline(): bool
    {
        return $this->inline;
    }

    public function setInline(bool $inline)
    {
        $this->inline = $inline;
    }
    public function getButtons(): array
    {
        return $this->buttons;
    }
    public function setButtons(array $buttons)
    {
        $this->buttons = $buttons;
    }


    public function getKeyboard(): string
    {
        $keyboard = [];
        $x = 0;
        foreach ($this->buttons as $buttons) {
            $y = 0;
            foreach ($buttons as $button) {
                $keyboard[$x][$y]["action"]["type"] = $button[3];
                if ($button[3] == "text") {
                    $keyboard[$x][$y]["action"]["label"] = $button[1];
                    $keyboard[$x][$y]["color"] = $button[2];
                } elseif ($button[3] == "vkpay") {
                    $keyboard[$x][$y]["action"]["hash"] = $button[4];
                } elseif ($button[3] == "open_app") {
                    $keyboard[$x][$y]["action"]["label"] = $button[1];
                    $keyboard[$x][$y]["action"]["app_id"] = $button[4];
                    $keyboard[$x][$y]["action"]["owner_id"] = $button[5];
                    $keyboard[$x][$y]["action"]["hash"] = $button[6];
                } elseif ($button[3] == "open_link") {
                    $keyboard[$x][$y]["action"]["label"] = $button[1];
                    $keyboard[$x][$y]["action"]["link"] = $button[4];
                }
                $keyboard[$x][$y]["action"]["payload"] = '{"command": "'.$button[0].'"}';
                $y++;
            }
            $x++;
        }
        if ($this->one_time === true and $this->inline === true) {
            $this->one_time = false;
        }
        $array_keyboard = ["one_time" => $this->one_time,"buttons" => $keyboard,"inline"=> $this->inline];
        return json_encode($array_keyboard, JSON_UNESCAPED_UNICODE);
    }

}