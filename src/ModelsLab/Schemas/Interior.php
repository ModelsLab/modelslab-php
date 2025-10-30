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

/**
 * Object Removal schema
 */
class ObjectRemovalSchema extends BaseSchema
{
    protected $init_image;
    protected string $object_name;
    protected ?bool $base64;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->init_image = $data['init_image'] ?? null;
        $this->object_name = $data['object_name'] ?? '';
        $this->base64 = $data['base64'] ?? false;
    }

    public function getInitImage()
    {
        return $this->init_image;
    }

    public function setInitImage($init_image): self
    {
        $this->init_image = $init_image;
        return $this;
    }

    public function getObjectName(): string
    {
        return $this->object_name;
    }

    public function setObjectName(string $object_name): self
    {
        $this->object_name = $object_name;
        return $this;
    }
}

/**
 * Interior Mixer schema
 */
class InteriorMixerSchema extends BaseSchema
{
    protected $init_image;
    protected $object_image;
    protected string $prompt;
    protected ?int $width;
    protected ?int $height;
    protected ?float $guidance_scale;
    protected ?int $num_inference_steps;
    protected ?bool $base64;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->init_image = $data['init_image'] ?? null;
        $this->object_image = $data['object_image'] ?? null;
        $this->prompt = $data['prompt'] ?? '';
        $this->width = $data['width'] ?? null;
        $this->height = $data['height'] ?? null;
        $this->guidance_scale = $data['guidance_scale'] ?? null;
        $this->num_inference_steps = $data['num_inference_steps'] ?? 8;
        $this->base64 = $data['base64'] ?? false;
    }

    public function getInitImage()
    {
        return $this->init_image;
    }

    public function setInitImage($init_image): self
    {
        $this->init_image = $init_image;
        return $this;
    }

    public function getObjectImage()
    {
        return $this->object_image;
    }

    public function setObjectImage($object_image): self
    {
        $this->object_image = $object_image;
        return $this;
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
