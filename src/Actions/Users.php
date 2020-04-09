<?php


namespace Eslavon\VkBotApi\Actions;


use Eslavon\VkBotApi\Request\VKApiRequest;

class Users
{
    private VKApiRequest $request;

    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    public function get(string $user_ids, string $fields = 'sex', string $name_case = 'nom')
    {
        $parameters = [
            'user_ids' => $user_ids,
            'fields' => $fields,
            'name_case' => $name_case
        ];
        return $this->request->post('users.get', $parameters);
    }

}