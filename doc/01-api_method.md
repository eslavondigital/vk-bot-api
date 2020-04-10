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
| API Method name                    | Description                                                                               | Documentation                                         |
|------------------------------------|-------------------------------------------------------------------------------------------|-------------------------------------------------------|
| groups.addCallbackServer           | Adds a server for the Callback API to the community.                                      | https://vk.com/dev/groups.addCallbackServer           |
| groups.deleteCallbackServer        | Removes the server for the Callback API from the community.                               | https://vk.com/dev/groups.deleteCallbackServer        |
| groups.editCallbackServer          | Edits server data for the Callback API in the community.                                  | https://vk.com/dev/groups.editCallbackServer          |
| groups.enableOnline                | Includes online status in the community.                                                  | https://vk.com/dev/groups.enableOnline                |
| groups.disableOnline               | Turns off online status in the community.                                                 | https://vk.com/dev/groups.disableOnline               |
| groups.getOnlineStatus             | Gets information about the status of "online" in the community.                           | https://vk.com/dev/groups.getOnlineStatus             |
| groups.getCallbackConfirmationCode | Allows you to get the string necessary to confirm the server address in the Callback API. | https://vk.com/dev/groups.getCallbackConfirmationCode |
| groups.getCallbackServers          | Gets server information for the Callback API in the community.                            | https://vk.com/dev/groups.getCallbackServers          |
| groups.getCallbackSettings         | Lets you get the Callback API notification settings for the community.                    | https://vk.com/dev/groups.getCallbackSettings         |
| groups.setCallbackSettings         | Allows you to configure event notification settings in the Callback API.                  | https://vk.com/dev/groups.setCallbackSettings         |
| groups.getMembers                  | Gets a list of community members.                                                         | https://vk.com/dev/groups.getMembers                  |
| groups.isMember                    | Gets information about whether the user is a member of the community.                     | https://vk.com/dev/groups.isMember                    |
| groups.getBanned                   | Returns a list of banned users and communities in a community.                            | https://vk.com/dev/groups.getBanned                   |
| groups.getTokenPermissions         | Returns privilege settings for a community access key.                                    | https://vk.com/dev/groups.getTokenPermissions         |
## Messages
| API Method name          | Description                                       | Documentation                               |
|--------------------------|---------------------------------------------------|---------------------------------------------|
| messages.createChat      | Creates a conversation with several participants. | https://vk.com/dev/messages.createChat      |
| messages.delete          | Deletes the message.                              | https://vk.com/dev/messages.delete          |
| messages.deleteChatPhoto | Allows you to delete a multi-dialog photo.        | https://vk.com/dev/messages.deleteChatPhoto |
| messages.editChat        | Changes the name of the conversation.             | https://vk.com/dev/messages.editChat        |
| messages.send            | Sends a message.                                  | https://vk.com/dev/messages.send            |
## Photos
| API Method name                | Description                                                                                               | Documentation                                     |
|--------------------------------|-----------------------------------------------------------------------------------------------------------|---------------------------------------------------|
| photos.getMessagesUploadServer | Returns the server address for uploading the photo to a private message.                                  | https://vk.com/dev/photos.getMessagesUploadServer |
| photos.saveMessagesPhoto       | Saves the photo after successful upload to the URI obtained by the photos.getMessagesUploadServer method. | https://vk.com/dev/photos.saveMessagesPhoto       |
## Users
| API Method name | Description                        | Documentation                |
|-----------------|------------------------------------|------------------------------|
| users.get       | Returns advanced user information. | https://vk.com/dev/users.get |