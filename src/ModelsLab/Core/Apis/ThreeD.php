<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\ThreeDSchema;

/**
 * 3D API for ModelsLab
 */
class ThreeD extends BaseAPI
{
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        parent::__construct($client, $enterprise, $kwargs);
        
        if ($enterprise) {
            $this->baseUrl = $this->client->getBaseUrl() . 'v1/enterprise/3d/';
        } else {
            $this->baseUrl = $this->client->getBaseUrl() . 'v6/3d/';
        }
    }
    
    /**
     * Generate 3D model from text
     */
    public function textTo3D(ThreeDSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'text_to_3d';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Generate 3D model from image
     */
    public function imageTo3D(ThreeDSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'image_to_3d';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
