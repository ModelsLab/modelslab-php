<?php

namespace ModelsLab\Schemas;

/**
 * Base schema for all models in the application.
 */
abstract class BaseSchema
{
    protected ?string $webhook;
    protected ?string $trackId;
    
    public function __construct(array $data = [])
    {
        $this->webhook = $data['webhook'] ?? null;
        $this->trackId = $data['track_id'] ?? null;
    }
    
    /**
     * Get webhook URL
     */
    public function getWebhook(): ?string
    {
        return $this->webhook;
    }
    
    /**
     * Set webhook URL
     */
    public function setWebhook(?string $webhook): self
    {
        $this->webhook = $webhook;
        return $this;
    }
    
    /**
     * Get track ID
     */
    public function getTrackId(): ?string
    {
        return $this->trackId;
    }
    
    /**
     * Set track ID
     */
    public function setTrackId(?string $trackId): self
    {
        $this->trackId = $trackId;
        return $this;
    }
    
    /**
     * Convert to array for API requests
     */
    public function toArray(): array
    {
        $data = [];
        
        // Get all properties of the class
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PROTECTED);
        
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $value = $this->$propertyName;
            
            if ($value !== null) {
                // Convert snake_case to snake_case for API compatibility
                $apiKey = $this->camelToSnake($propertyName);
                $data[$apiKey] = $value;
            }
        }
        
        return $data;
    }
    
    /**
     * Convert camelCase to snake_case
     */
    private function camelToSnake(string $string): string
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string));
    }
}
