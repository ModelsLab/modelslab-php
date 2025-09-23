<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\BackgroundRemoverSchema;

/**
 * Image Editing API for ModelsLab
 */
class ImageEditing extends BaseAPI
{
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        parent::__construct($client, $enterprise, $kwargs);
        
        if ($enterprise) {
            $this->baseUrl = $this->client->getBaseUrl() . 'v1/enterprise/image_editing/';
        } else {
            $this->baseUrl = $this->client->getBaseUrl() . 'v6/image_editing/';
        }
    }
    
    /**
     * Remove background and create mask
     */
    public function removeBgMask(BackgroundRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'removebg_mask';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Super resolution
     */
    public function superResolution(BackgroundRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'super_resolution';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Outpainting
     */
    public function outpainting(BackgroundRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'outpainting';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Inpainting
     */
    public function inpainting(BackgroundRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'inpainting';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Object removal
     */
    public function objectRemover(BackgroundRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'object_remover';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Face generation
     */
    public function facegen(BackgroundRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'facegen';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Headshot generation
     */
    public function headshot(BackgroundRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'headshot';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Fashion
     */
    public function fashion(BackgroundRemoverSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'fashion';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
