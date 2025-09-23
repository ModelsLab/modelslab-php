<?php

namespace ModelsLab\Core;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use ModelsLab\Core\Response;

/**
 * HTTP Client for ModelsLab API
 */
class Client
{
    private string $apiKey;
    private string $baseUrl;
    private int $fetchRetry;
    private int $fetchTimeout;
    private GuzzleClient $httpClient;
    
    public function __construct(string $apiKey, array $options = [])
    {
        $this->apiKey = $this->loadApiKey($apiKey);
        $this->baseUrl = $options['base_url'] ?? 'https://modelslab.com/api/';
        $this->fetchRetry = $options['fetch_retry'] ?? 10;
        $this->fetchTimeout = $options['fetch_timeout'] ?? 2;
        
        $this->httpClient = new GuzzleClient([
            'timeout' => 30,
            'verify' => false, // Enable SSL verification for production
            'headers' => [
                'Content-Type' => 'application/json',
                'User-Agent' => 'ModelsLab-PHP-SDK/1.0.0'
            ]
        ]);
    }
    
    /**
     * Load API key from parameter or environment
     */
    private function loadApiKey(string $apiKey): string
    {
        if (empty($apiKey)) {
            $apiKey = getenv('MODELSLAB_API_KEY') ?: getenv('API_KEY');
            if (empty($apiKey)) {
                throw new \InvalidArgumentException('API key is required.');
            }
        }
        return $apiKey;
    }
    
    /**
     * Make a POST request to the API
     */
    public function post(string $endpoint, array $data = []): array
    {
        $payload = array_merge(['key' => $this->apiKey], $data);
        
        try {
            $response = $this->httpClient->post($endpoint, [
                'json' => $payload
            ]);
            
            $body = $response->getBody()->getContents();
            $decoded = json_decode($body, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException('Invalid JSON response: ' . json_last_error_msg());
            }
            
            return $decoded;
            
        } catch (RequestException $e) {
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 0;
            $body = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : 'Unknown error';
            throw new \RuntimeException("Request failed with status code {$statusCode}: {$body}", 0, $e);
        }
    }
    
    /**
     * Get API key
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
    
    /**
     * Get base URL
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
    
    /**
     * Get fetch retry count
     */
    public function getFetchRetry(): int
    {
        return $this->fetchRetry;
    }
    
    /**
     * Get fetch timeout
     */
    public function getFetchTimeout(): int
    {
        return $this->fetchTimeout;
    }
}
