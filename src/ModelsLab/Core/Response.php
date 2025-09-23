<?php

namespace ModelsLab\Core;

/**
 * Response schema for API responses
 */
class Response
{
    private ?array $data;
    private string $status;
    private ?string $message;
    private ?string $id;
    
    public function __construct(array $response)
    {
        $this->data = $response['data'] ?? null;
        $this->status = $response['status'] ?? 'unknown';
        $this->message = $response['message'] ?? null;
        $this->id = $response['id'] ?? null;
    }
    
    /**
     * Get response data
     */
    public function getData(): ?array
    {
        return $this->data;
    }
    
    /**
     * Get response status
     */
    public function getStatus(): string
    {
        return $this->status;
    }
    
    /**
     * Get response message
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
    
    /**
     * Get response ID
     */
    public function getId(): ?string
    {
        return $this->id;
    }
    
    /**
     * Check if response is successful
     */
    public function isSuccess(): bool
    {
        return $this->status === 'success';
    }
    
    /**
     * Convert to array
     */
    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'status' => $this->status,
            'message' => $this->message,
            'id' => $this->id
        ];
    }
}
