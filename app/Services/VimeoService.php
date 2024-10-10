<?php
namespace App\Services;

use Vimeo\Vimeo;
use Illuminate\Support\Facades\Http;
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

    public function getVideos(){
        $response = $this->vimeo->request('/me/videos');
        return $response['body']['data']; 
    }


    public function showVideos()
    {
        $videos = $this->vimeoService->getVideos();
        return view('videos.index', compact('videos')); 
    }

    public function deleteVideo($videoUri)
    {
        $videoId = basename($videoUri);
        return $this->vimeo->request("/videos/{$videoId}",[],'DELETE');
    }
    public function getVideoDuration($videoId)
    {
        $response = $this->vimeo->request("/videos/{$videoId}");

        if ($response['status'] === 200) {
            return $response['body']['duration']; 
        }

        return null; 
    }
}
