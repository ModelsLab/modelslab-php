<?php

namespace ModelsLab\Schemas;

/**
 * Community schema
 */
class CommunitySchema extends BaseSchema
{
    protected string $prompt;
    protected ?string $model;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->model = $data['model'] ?? null;
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
