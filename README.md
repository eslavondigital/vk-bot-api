# vk-bot-api
<p align="center">
<img src="https://img.shields.io/badge/PHP-%3E%3D7.4.2-%23green" alt="php version">
<img src="https://img.shields.io/github/v/tag/eslavondigital/vk-bot-api?label=version" alt="Latest Stable Version">
<img src="https://img.shields.io/github/license/eslavondigital/vk-bot-api" alt="License">
</p> 
The package is designed to organize convenient interaction with VK API when developing chatbots for the VK platform.

## Installation

Install the latest version with

```bash
$ composer require eslavondigital/vk-bot-api
```

## Basic Usage

```php
<?php
require_once __DIR__.'/vendor/autoload.php';

use Eslavon\VkBotApi\VkBotApi;

$http_client = new GuzzleHttp\Client();
$access_token = 'b519e3d2ee8a0b30436a39817186c7907561e8ad37cc15b55cb452c47e9901c617';
$version_api = "5.103";
$language = "ru";
$vk = new VkBotApi($http_client, $access_token, $version_api, $language);
$result = $vk->users()->get("251510315");
var_dump($result);

/**
 * { "response":
 *  [{
 *      "id":251510315,
 *      "first_name":"Виктор",
 *      "last_name":"Виноградов",
 *      "is_closed":false,
 *      "can_access_closed":true,
 *      "sex":2
 *  }]
 * }
 *  
 */
```


## Documentation
- [Implemented VK API Methods](doc/01-api_method.md)
- [Using helper](doc/02-using_helper.md)
- [Examples](doc/03-examples.md)

## Support Eslavon Digital Financially
Get supported Eslavon Digital and help fund the project.

**Yandex.Money:** 410016014512747

**QIWI:** https://qiwi.com/n/ESLAVON
