<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\RealtimeText2ImageSchema;

/**
 * Realtime API for ModelsLab
 */
class Realtime extends BaseAPI
{
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        parent::__construct($client, $enterprise, $kwargs);
        
        if ($enterprise) {
            $this->baseUrl = $this->client->getBaseUrl() . 'v1/enterprise/realtime/';
        } else {
            $this->baseUrl = $this->client->getBaseUrl() . 'v6/realtime/';
        }
    }
    
    /**
     * Generate realtime text to image
     */
    public function textToImage(RealtimeText2ImageSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'text2img';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
