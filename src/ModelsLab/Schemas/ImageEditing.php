<?php

namespace ModelsLab\Schemas;

/**
 * Image editing schema
 */
class BackgroundRemoverSchema extends BaseSchema
{
    protected $image;
    protected ?bool $base64;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->image = $data['image'] ?? null;
        $this->base64 = $data['base64'] ?? null;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;
        return $this;
    }
}

/**
 * Qwen Edit schema
 */
class QwenEditSchema extends BaseSchema
{
    protected $prompt;
    protected $init_image;
    protected ?bool $base64;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->prompt = $data['prompt'] ?? null;
        $this->init_image = $data['init_image'] ?? null;
        $this->base64 = $data['base64'] ?? false;
    }

    public function getPrompt()
    {
        return $this->prompt;
    }

    public function setPrompt($prompt): self
    {
        $this->prompt = $prompt;
        return $this;
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
}

/**
 * Caption schema
 */
class CaptionSchema extends BaseSchema
{
    protected $init_image;
    protected ?string $length;
    protected ?bool $base64;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        $this->init_image = $data['init_image'] ?? null;
        $this->length = $data['length'] ?? 'normal';
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

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length): self
    {
        $this->length = $length;
        return $this;
    }
}
