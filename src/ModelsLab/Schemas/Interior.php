<?php

namespace ModelsLab\Schemas;

/**
 * Interior design schema
 */
class InteriorSchema extends BaseSchema
{
    protected string $prompt;
    protected ?string $negativePrompt;
    protected ?int $width;
    protected ?int $height;
    protected ?int $numInferenceSteps;
    protected ?float $guidanceScale;
    protected ?int $seed;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->negativePrompt = $data['negative_prompt'] ?? null;
        $this->width = $data['width'] ?? null;
        $this->height = $data['height'] ?? null;
        $this->numInferenceSteps = $data['num_inference_steps'] ?? null;
        $this->guidanceScale = $data['guidance_scale'] ?? null;
        $this->seed = $data['seed'] ?? null;
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
