<?php

namespace ModelsLab\Schemas;

/**
 * Base video schema
 */
class VideoSchema extends BaseSchema
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

/**
 * Text to Video schema
 */
class Text2Video extends BaseSchema
{
    protected string $prompt;
    protected ?string $modelId;
    protected ?string $negativePrompt;
    protected ?int $width;
    protected ?int $height;
    protected ?int $numInferenceSteps;
    protected ?float $guidanceScale;
    protected ?int $seed;
    protected ?int $numFrames;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->modelId = $data['model_id'] ?? 'svd';
        $this->negativePrompt = $data['negative_prompt'] ?? null;
        $this->width = $data['width'] ?? 512;
        $this->height = $data['height'] ?? 512;
        $this->numInferenceSteps = $data['num_inference_steps'] ?? null;
        $this->guidanceScale = $data['guidance_scale'] ?? null;
        $this->seed = $data['seed'] ?? null;
        $this->numFrames = $data['num_frames'] ?? 25;
    }
}

/**
 * Image to Video schema
 */
class Image2Video extends BaseSchema
{
    protected string $prompt;
    protected $initImage;
    protected ?string $modelId;
    protected ?string $negativePrompt;
    protected ?int $width;
    protected ?int $height;
    protected ?int $numInferenceSteps;
    protected ?float $guidanceScale;
    protected ?int $seed;
    protected ?int $numFrames;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->initImage = $data['init_image'] ?? null;
        $this->modelId = $data['model_id'] ?? 'svd';
        $this->negativePrompt = $data['negative_prompt'] ?? null;
        $this->width = $data['width'] ?? 512;
        $this->height = $data['height'] ?? 512;
        $this->numInferenceSteps = $data['num_inference_steps'] ?? null;
        $this->guidanceScale = $data['guidance_scale'] ?? null;
        $this->seed = $data['seed'] ?? null;
        $this->numFrames = $data['num_frames'] ?? 25;
    }
}

/**
 * Text to Video Ultra schema
 */
class Text2VideoUltra extends BaseSchema
{
    protected string $prompt;
    protected ?string $negativePrompt;
    protected ?int $resolution;
    protected ?int $numFrames;
    protected ?int $numInferenceSteps;
    protected ?float $guidanceScale;
    protected ?int $seed;
    protected ?int $fps;
    protected ?bool $portrait;
    protected ?int $sampleShift;
    protected ?bool $temp;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->negativePrompt = $data['negative_prompt'] ?? null;
        $this->resolution = $data['resolution'] ?? 320;
        $this->numFrames = $data['num_frames'] ?? 92;
        $this->numInferenceSteps = $data['num_inference_steps'] ?? 8;
        $this->guidanceScale = $data['guidance_scale'] ?? 1.0;
        $this->seed = $data['seed'] ?? null;
        $this->fps = $data['fps'] ?? null;
        $this->portrait = $data['portrait'] ?? false;
        $this->sampleShift = $data['sample_shift'] ?? 3;
        $this->temp = $data['temp'] ?? false;
    }
}