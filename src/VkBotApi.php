<?php

namespace Eslavon\VkBotApi;


use Composer\Autoload\ClassLoader;
use Eslavon\VkBotApi\Actions\Board;
use Eslavon\VkBotApi\Actions\Docs;
use Eslavon\VkBotApi\Actions\Groups;
use Eslavon\VkBotApi\Actions\Messages;
use Eslavon\VkBotApi\Actions\Photos;
use Eslavon\VkBotApi\Actions\Users;
use Eslavon\VkBotApi\Helper\Helper;
use Eslavon\VkBotApi\Request\VKApiRequest;

class VkBotApi
{
    protected const API_HOST = 'https://api.vk.com/method';

    protected object $request;

    protected Board $board;

    protected Users $users;

    protected Docs $docs;

    protected Groups $groups;

    protected Messages $messages;

    protected Photos $photos;

    protected Helper $helper;





    public function __construct(object $http_client, string $access_token, string $version_api = '5.103', string $language = 'ru')
    {
        $required_parameters = array(
            "access_token" => $access_token,
            "v" => $version_api,
            "lang" => $language
        );
        $this->request = new VKApiRequest($http_client, $required_parameters, self::API_HOST);
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function board(): Board
    {
        if (isset($this->board) === false) {
            $this->board = new Board($this->request);
        }
        return $this->board;
    }

    public function docs(): Docs
    {
        if (isset($this->docs) === false) {
            $this->docs = new Docs($this->request);
        }
        return $this->docs;
    }

    public function groups(): Groups
    {
        if (isset($this->groups) === false) {
            $this->groups = new Groups($this->request);
        }
        return $this->groups;
    }

    public function messages(): Messages
    {
        if (isset($this->messages) === false) {
            $this->messages = new Messages($this->request);
        }
        return $this->messages;
    }

    public function photos(): Photos
    {
        if (isset($this->photos) === false) {
            $this->photos = new Photos($this->request);
        }
        return $this->photos;
    }

    public function users(): Users
    {
        if (isset($this->users) === false) {
            $this->users = new Users($this->request);
        }
        return $this->users;
    }

    public function helper(): Helper
    {
        if (isset($this->helper) === false) {
            $this->helper = new Helper($this->request);
        }
        return $this->helper;
    }






}