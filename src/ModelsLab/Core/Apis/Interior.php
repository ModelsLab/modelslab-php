<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\InteriorSchema;

/**
 * Interior API for ModelsLab
 */
class Interior extends BaseAPI
{
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        parent::__construct($client, $enterprise, $kwargs);
        
        if ($enterprise) {
            $this->baseUrl = $this->client->getBaseUrl() . 'v1/enterprise/interior/';
        } else {
            $this->baseUrl = $this->client->getBaseUrl() . 'v6/interior/';
        }
    }
    
    /**
     * Generate interior design
     */
    public function makeInterior(InteriorSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'make';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Room decorator
     */
    public function roomDecorator(InteriorSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'room_decorator';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Floor planning
     */
    public function floorPlanning(InteriorSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'floor_planning';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Sketch rendering
     */
    public function sketchRendering(InteriorSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'sketch_rendering';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
