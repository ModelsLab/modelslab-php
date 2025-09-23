<?php

namespace ModelsLab\Schemas;

/**
 * 3D schema
 */
class ThreeDSchema extends BaseSchema
{
    protected string $prompt;
    protected ?string $negativePrompt;
    protected ?int $width;
    protected ?int $height;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->negativePrompt = $data['negative_prompt'] ?? null;
        $this->width = $data['width'] ?? null;
        $this->height = $data['height'] ?? null;
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
