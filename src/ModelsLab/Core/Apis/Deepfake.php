<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\DeepfakeSchema;

/**
 * Deepfake API for ModelsLab
 */
class Deepfake extends BaseAPI
{
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        parent::__construct($client, $enterprise, $kwargs);
        
        if ($enterprise) {
            $this->baseUrl = $this->client->getBaseUrl() . 'v1/enterprise/deepfake/';
        } else {
            $this->baseUrl = $this->client->getBaseUrl() . 'v6/deepfake/';
        }
    }
    
    /**
     * Specific face swap
     */
    public function specificFaceSwap(DeepfakeSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'single_face_swap';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Multiple face swap
     */
    public function multipleFaceSwap(DeepfakeSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'multiple_face_swap';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Single video swap
     */
    public function singleVideoSwap(DeepfakeSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'single_video_swap';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Specific video swap
     */
    public function specificVideoSwap(DeepfakeSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'specific_video_swap';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
