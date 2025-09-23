<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\CommunitySchema;

/**
 * Community API for ModelsLab
 */
class Community extends BaseAPI
{
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        parent::__construct($client, $enterprise, $kwargs);
        
        if ($enterprise) {
            $this->baseUrl = $this->client->getBaseUrl() . 'v1/enterprise/community/';
        } else {
            $this->baseUrl = $this->client->getBaseUrl() . 'v6/images/';
        }
    }
    
    /**
     * Generate using community models
     */
    public function generate(CommunitySchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'text2img';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
