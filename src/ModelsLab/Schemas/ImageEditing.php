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
