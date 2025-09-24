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

/**
 * Text to 3D schema
 */
class Text23D extends BaseSchema
{
    protected string $prompt;
    protected ?string $negativePrompt;
    protected ?string $modelId;
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
        $this->modelId = $data['model_id'] ?? 'threed';
        $this->width = $data['width'] ?? 512;
        $this->height = $data['height'] ?? 512;
        $this->numInferenceSteps = $data['num_inference_steps'] ?? null;
        $this->guidanceScale = $data['guidance_scale'] ?? null;
        $this->seed = $data['seed'] ?? null;
    }
}

/**
 * Image to 3D schema
 */
class Image23D extends BaseSchema
{
    protected string $prompt;
    protected $initImage;
    protected ?string $negativePrompt;
    protected ?string $modelId;
    protected ?int $width;
    protected ?int $height;
    protected ?int $numInferenceSteps;
    protected ?float $guidanceScale;
    protected ?int $seed;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->initImage = $data['init_image'] ?? null;
        $this->negativePrompt = $data['negative_prompt'] ?? null;
        $this->modelId = $data['model_id'] ?? 'threed';
        $this->width = $data['width'] ?? 512;
        $this->height = $data['height'] ?? 512;
        $this->numInferenceSteps = $data['num_inference_steps'] ?? null;
        $this->guidanceScale = $data['guidance_scale'] ?? null;
        $this->seed = $data['seed'] ?? null;
    }
}