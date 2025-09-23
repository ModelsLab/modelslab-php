<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\VideoSchema;

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
    public function textToVideo(VideoSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'text2video';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
