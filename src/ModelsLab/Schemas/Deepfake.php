<?php

namespace ModelsLab\Schemas;

/**
 * Deepfake schema
 */
class DeepfakeSchema extends BaseSchema
{
    protected string $prompt;
    protected $initImage;
    protected $targetImage;
    protected $referenceImage;
    protected $initVideo;
    protected $outputFormat;
    protected ?bool $base64;
    protected ?bool $watermark;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->initImage = $data['init_image'] ?? null;
        $this->targetImage = $data['target_image'] ?? null;
        $this->referenceImage = $data['reference_image'] ?? null;
        $this->initVideo = $data['init_video'] ?? null;
        $this->outputFormat = $data['output_format'] ?? 'mp4';
        $this->base64 = $data['base64'] ?? null;
        $this->watermark = $data['watermark'] ?? null;
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
