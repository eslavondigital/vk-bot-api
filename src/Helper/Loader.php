<?php


namespace Eslavon\VkBotApi\Helper;


use Eslavon\VkBotApi\Actions\Docs;
use Eslavon\VkBotApi\Actions\Photos;
use Eslavon\VkBotApi\Request\VKApiRequest;

class Loader
{
    private VKApiRequest $request;

    public function __construct(VkApiRequest $request)
    {
        $this->request = $request;
    }

    public function uploadPhotosMessage(string $path, int $peer_id)
    {
        $photos = new Photos($this->request);
        $data_upload_url = $photos->getMessagesUploadServer($peer_id);
        $data_upload_url = json_decode($data_upload_url);
        $url = $data_upload_url->response->upload_url;
        $result =  $this->request->upload($path,$url);
        $result  = json_decode($result);
        $data_save_photo =  $photos->saveMessagesPhoto($result->photo, $result->server, $result->hash);
        $data_save_photo = json_decode($data_save_photo);
        $owner_id = $data_save_photo->response[0]->owner_id;
        $id = $data_save_photo->response[0]->id;
        $access_key = $data_save_photo->response[0]->access_key;
        return 'photo'.$owner_id.'_'.$id.'_'.$access_key;
    }

    public function uploadDocsMessages(string $path, int $peer_id, string $type = 'doc')
    {
        $docs  = new Docs($this->request);
        $data_upload_url = $docs->getMessagesUploadServer($peer_id,$type);
        $data_upload_url = json_decode($data_upload_url);
        $url =  $data_upload_url->response->upload_url;
        $result =  $this->request->upload($path,$url);
        $result  = json_decode($result);
        $data_save_docs = $docs->save($result->file,'namefile');
        $data_save_docs = json_decode($data_save_docs);
        $owner_id = $data_save_docs->response->$type->owner_id;
        $id = $data_save_docs->response->$type->id;
        return  $type.$owner_id.'_'.$id;

    }
}