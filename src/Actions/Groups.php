<?php


namespace Eslavon\VkBotApi\Actions;


use Eslavon\VkBotApi\Request\VKApiRequest;

class Groups
{
    private VKApiRequest $request;

    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    public function addCallbackServer(int $group_id, string $url, string $title, string $secret_key)
    {
        $parameters = [
            'group_id' => $group_id,
            'url' => $url,
            'title' => $title,
            'secret_key' => $secret_key
        ];
        return $this->request->post('groups.addCallbackServer', $parameters);
    }

    public function deleteCallbackServer(int $group_id, int $server_id)
    {
        $parameters = [
            'group_id' => $group_id,
            'server_id' => $server_id
        ];
        return $this->request->post('groups.deleteCallbackServer', $parameters);
    }

    public function editCallbackServer(int $group_id, int $server_id,string $url, string $title, string $secret_key)
    {
        $parameters = [
            'group_id' => $group_id,
            'server_id' => $server_id,
            'url' => $url,
            'title' => $title,
            'secret_key' => $secret_key
        ];
        return $this->request->post('groups.editCallbackServer', $parameters);
    }

    public function enableOnline(int $group_id)
    {
        $parameters = [
            'group_id' => $group_id
        ];
        return $this->request->post('groups.enableOnline', $parameters);
    }

    public function disableOnline(int $group_id)
    {
        $parameters = [
            'group_id' => $group_id
        ];
        return $this->request->post('groups.disableOnline', $parameters);
    }

    public function getOnlineStatus(int $group_id)
    {
        $parameters = [
            'group_id' => $group_id
        ];
        return $this->request->post('groups.getOnlineStatus', $parameters);
    }

    public function getCallbackConfirmationCode(int $group_id)
    {
        $parameters = [
            'group_id' => $group_id
        ];
        return $this->request->post('groups.getCallbackConfirmationCode', $parameters);
    }

    public function getCallbackServers(int $group_id)
    {
        $parameters = [
            'group_id' => $group_id
        ];
        return $this->request->post('groups.getCallbackServers', $parameters);
    }

    public function getCallbackSettings(int $group_id, int $server_id)
    {
        $parameters = [
            'group_id' => $group_id,
            'server_id' => $server_id
        ];
        return $this->request->post('groups.getCallbackSettings', $parameters);
    }

    public function setCallbackSettings(int $group_id, int $server_id, array $flags, string $api_version = '5.103')
    {
        $parameters = [
            'group_id' => $group_id,
            'server_id' => $server_id,
            'api_version' => $api_version
        ];
        $parameters = $parameters+$flags;
        return $this->request->post('groups.setCallbackSettings', $parameters);
    }

    public function getMembers(int $group_id, string $sort = 'id_asc', int $offset = 0, int $count = 1000)
    {
        $parameters = [
            'group_id' => $group_id,
            'sort' => $sort,
            'offset' => $offset,
            'count' => $count
        ];
        return $this->request->post('groups.getMembers', $parameters);
    }

    public function isMember(int $group_id, int $user_id, bool $extended = false)
    {
        $parameters = [
            'group_id' => $group_id,
            'user_id' => $user_id,
            'extended' => $extended
        ];
        return $this->request->post('groups.isMember', $parameters);
    }

    public function getBanned(int $group_id, int $offset = 0, int $count = 20)
    {
        $parameters = [
            'group_id' => $group_id,
            'offset' => $offset,
            'count' => $count
        ];
        return $this->request->post('groups.getBanned', $parameters);
    }

    public function getTokenPermissions()
    {
        return $this->request->post('groups.getTokenPermissions', []);
    }

    public function setSettings(int $group_id, bool $messages, bool $bots_capabilities, bool $bots_start_button, bool $bots_add_to_chat)
    {
        $parameters = [
            'group_id' => $group_id,
            'messages' => $messages,
            'bots_capabilities' => $bots_capabilities,
            'bots_start_button' => $bots_start_button,
            'bots_add_to_chat' => $bots_add_to_chat
        ];
        return $this->request->post('groups.setSettings', $parameters);
    }
}