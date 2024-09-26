<?php
namespace App\Services;

use Vimeo\Vimeo;

class VimeoService{

    protected $vimeo;

    public function __construct(){

        $client_id = env('VIMEO_CLIENT_ID');
        $client_secret = env('VIMEO_CLIENT_SECRET');
        $access_token = env('VIMEO_ACCESS_TOKEN');

        $this->vimeo = new Vimeo($client_id,$client_secret);
        $this->vimeo->setToken($access_token);


    }

    public function uploadVideo($videoFile){
        $response = $this->vimeo->upload($videoFile->getPathname());
        return $response;
    }

    public function deleteVideo($videoUri)
    {
        $videoId = basename($videoUri);
        return $this->vimeo->delete($videoId);
    }
}
