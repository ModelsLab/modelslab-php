<?php

namespace ModelsLab\Schemas;

/**
 * Deepfake schema
 */
class DeepfakeSchema extends BaseSchema
{
    protected string $prompt;
    protected $image;
    protected ?bool $base64;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->image = $data['image'] ?? null;
        $this->base64 = $data['base64'] ?? null;
    }
    
    public function getPrompt(): string
    {
        return $this->prompt;
    }
    
    public function setPrompt(string $prompt): self
    {
        $this->prompt = $prompt;
        return $this;
    }
}
