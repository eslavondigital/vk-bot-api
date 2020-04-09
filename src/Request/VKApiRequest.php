<?php


namespace Eslavon\VkBotApi\Request;


class VKApiRequest
{
    private object $http_client;

    private array $required_parameters;

    private string $api_host;

    public function __construct(object $http_client, array $required_parameters, string $api_host)
    {
        $this->http_client = $http_client;
        $this->required_parameters = $required_parameters;
        $this->api_host = $api_host;
    }

    public function post(string $method, array $parameters)
    {
        $response =  $this->http_client->request('POST', 'https://api.vk.com/method/'.$method, [
            'form_params' => $parameters+$this->required_parameters
        ]);
        return $response->getBody()->getContents();
    }

    public function upload(string $path, string $upload_url)
    {
        $this->http_client = new \GuzzleHttp\Client;
        $resource = fopen($path, 'r');
        $response = $this->http_client->request(
            'POST',
            $upload_url,
            [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => $resource
                    ]
                ]
            ]
        );

        return $response->getBody()->getContents();
    }

}