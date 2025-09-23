<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Core\Response;

/**
 * Base class for all APIs in the ModelsLab framework.
 * This class provides a common interface and shared functionality for all API classes.
 */
abstract class BaseAPI
{
    protected Client $client;
    protected bool $enterprise;
    protected string $baseUrl;
    protected array $kwargs;
    
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        $this->client = $client;
        $this->enterprise = $enterprise;
        $this->kwargs = $kwargs;
    }
    
    /**
     * Fetch result by ID with retry logic
     */
    public function fetch(string $id): array
    {
        $baseEndpoint = $this->baseUrl . 'fetch/' . $id;
        $response = null;
        
        for ($i = 0; $i < $this->client->getFetchRetry(); $i++) {
            $response = $this->client->post($baseEndpoint, [
                'key' => $this->client->getApiKey()
            ]);
            
            if ($response['status'] === 'success') {
                break;
            } else {
                sleep($this->client->getFetchTimeout());
            }
        }
        
        return $response;
    }
    
    /**
     * Get system details (enterprise only)
     */
    public function systemDetails(): array
    {
        if (!$this->enterprise) {
            throw new \ValueError('System details are only available for enterprise users.');
        }
        
        $baseEndpoint = $this->baseUrl . 'system_details';
        return $this->client->post($baseEndpoint, [
            'key' => $this->client->getApiKey()
        ]);
    }
    
    /**
     * Restart server (enterprise only)
     */
    public function restart(): array
    {
        if (!$this->enterprise) {
            throw new \ValueError('System details are only available for enterprise users.');
        }
        
        $baseEndpoint = $this->baseUrl . 'restart_server';
        return $this->client->post($baseEndpoint, [
            'key' => $this->client->getApiKey()
        ]);
    }
    
    /**
     * Update server (enterprise only)
     */
    public function update(): array
    {
        if (!$this->enterprise) {
            throw new \ValueError('System details are only available for enterprise users.');
        }
        
        $baseEndpoint = $this->baseUrl . 'update';
        return $this->client->post($baseEndpoint, [
            'key' => $this->client->getApiKey()
        ]);
    }
    
    /**
     * Clear cache (enterprise only)
     */
    public function clearCache(): array
    {
        if (!$this->enterprise) {
            throw new \ValueError('System details are only available for enterprise users.');
        }
        
        $baseEndpoint = $this->baseUrl . 'clear_cache';
        return $this->client->post($baseEndpoint, [
            'key' => $this->client->getApiKey()
        ]);
    }
    
    /**
     * Clear queue (enterprise only)
     */
    public function clearQueue(): array
    {
        if (!$this->enterprise) {
            throw new \ValueError('System details are only available for enterprise users.');
        }
        
        $baseEndpoint = $this->baseUrl . 'clear_queue';
        return $this->client->post($baseEndpoint, [
            'key' => $this->client->getApiKey()
        ]);
    }
}
