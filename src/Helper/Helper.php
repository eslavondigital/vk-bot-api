<?php


namespace Eslavon\VkBotApi\Helper;


use Eslavon\VkBotApi\Request\VKApiRequest;

class Helper
{
    private VKApiRequest $request;

    private Messages $messages;

    private Loader $loader;

    public function __construct(VKApiRequest $request)
    {
        $this->request = $request;
    }

    public function messages()
    {
        if (isset($this->messages) === false) {
            $this->messages = new Messages();
        }
        return $this->messages;
    }

    public function loader()
    {
        if (isset($this->loader) === false) {
            $this->loader = new Loader($this->request);
        }
        return $this->loader;
    }

}