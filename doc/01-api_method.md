# Implemented VK API Methods
Below is information about the vk.com methodological APIs implemented in the current version of the package.

**Full documentation on vk api methods**  <https://vk.com/dev/methods>

## Board
| API Method name      | Description                                          | Documentation                            |
|----------------------|------------------------------------------------------|------------------------------------------|
| board.deleteComment  | Deletes a topic post in community discussions.       | https://vk.com/dev/board.deleteComment |
| board.restoreComment | Recovers deleted topic message in group discussions. | https://vk.com/dev/board.restoreComment |

```php
<?php
/**
 * Deletes a topic post in community discussions.   
 * 
* @param int $group_id - community identifier, required
* @param int $topic_id - discussion identifier, required
* @param int $comment_id - ID of the comment in the discussion, required
* @return string
*/
$vk->board()->deleteComment($group_id, $topic_id, $comment_id);

/**
 * Recovers deleted topic message in group discussions.   
 * 
* @param int $group_id - community identifier, required
* @param int $topic_id - discussion identifier, required
* @param int $comment_id - ID of the comment in the discussion, required
* @return string
*/
$vk->board()->restoreComment($group_id, $topic_id, $comment_id);
```                                                                        
## Docs
| API Method name              | Description                                                                                                                                      | Documentation                                   |
|------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------|
| docs.getMessagesUploadServer | Gets the server address for downloading the document in a private message.                                                                       | https://vk.com/dev/docs.getMessagesUploadServer |
| docs.getWallUploadServer     | Returns the server address for downloading documents to the Sent folder, for subsequent sending the document to the wall or by personal message. | https://vk.com/dev/docs.getWallUploadServer     |
| docs.save                    | Saves the document after it is successfully uploaded to the server.                                                                              | https://vk.com/dev/docs.save                    |
| docs.search                  | Returns search results for documents.                                                                                                            | https://vk.com/dev/docs.search                  |
```php
<?php
/**
* Gets the server address for downloading the document in a private message.
*
* @param int $peer_id - destination identifier, required
* @param string $type - type of document. Default: 'doc'
* @return string
*/
$vk->docs()->getMessagesUploadServer($peer_id, $type);


/**
* Returns the server address for downloading documents to the Sent folder,
* for subsequent sending the document to the wall or by personal message.
*
* @param int $group_id - ID of the community into which you want to upload the document. Required.
* @return string
*/
$vk->docs()->getWallUploadServer($group_id);


/**
* Saves the document after it is successfully uploaded to the server.
*
* @param string $file - parameter returned as a result of uploading the file to the server. Required.
* @param string $title - document's name. Required.
* @param string $tags - tags for search. Default: 'eslavondigital'
* @return string
*/
$vk->docs()->save($file, $title, $tags);


/**
* Returns search results for documents.
*
* @param string $q - search query string.Required.
* @param bool $search_own - true: search among the user's own documents. Default: false
* @param int $count - the number of documents whose information needs to be returned. Default: 20
* @param int $offset - offset required to select a specific subset of documents. Default: 0
* @return string
*/
$vk->docs()->search($q, $search_own, $count, $offset);
``` 
## Groups

## Messages

## Photos

## Users
