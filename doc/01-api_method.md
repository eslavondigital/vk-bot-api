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


## Groups

## Messages

## Photos

## Users
