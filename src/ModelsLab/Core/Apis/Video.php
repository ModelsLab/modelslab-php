<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\VideoSchema;
use ModelsLab\Schemas\Text2Video;
use ModelsLab\Schemas\Image2Video;
use ModelsLab\Schemas\Text2VideoUltra;
use ModelsLab\Schemas\WatermarkRemoverSchema;

/**
 * Video API for ModelsLab
 */
class Video extends BaseAPI
{
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        parent::__construct($client, $enterprise, $kwargs);
        
        if ($enterprise) {
            $this->baseUrl = $this->client->getBaseUrl() . 'v1/enterprise/video/';
        } else {
            $this->baseUrl = $this->client->getBaseUrl() . 'v6/video/';
        }
    }
    
    /**
     * Generate video from text
     */
    public function textToVideo(Text2Video $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'text2video';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Generate video from image
     */
    public function imageToVideo(Image2Video $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'img2video';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Generate video from text (Ultra)
     */
    public function textToVideoUltra(Text2VideoUltra $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'text2video_ultra';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }

    /**
     * Remove watermarks from videos
     */
    public function watermarkRemover(WatermarkRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'watermark_remover';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
