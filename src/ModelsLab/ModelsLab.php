<?php

namespace ModelsLab;

use ModelsLab\Core\Client;
use ModelsLab\Core\Apis\Audio;
use ModelsLab\Core\Apis\Video;
use ModelsLab\Core\Apis\ThreeD;
use ModelsLab\Core\Apis\Interior;
use ModelsLab\Core\Apis\Realtime;
use ModelsLab\Core\Apis\Deepfake;
use ModelsLab\Core\Apis\Community;
use ModelsLab\Core\Apis\ImageEditing;

/**
 * Main ModelsLab SDK class
 */
class ModelsLab
{
    private Client $client;
    
    public function __construct(string $apiKey, array $options = [])
    {
        $this->client = new Client($apiKey, $options);
    }
    
    /**
     * Get the Audio API
     */
    public function audio(bool $enterprise = false): Audio
    {
        return new Audio($this->client, $enterprise);
    }
    
    /**
     * Get the Video API
     */
    public function video(bool $enterprise = false): Video
    {
        return new Video($this->client, $enterprise);
    }
    
    /**
     * Get the 3D API
     */
    public function threeD(bool $enterprise = false): ThreeD
    {
        return new ThreeD($this->client, $enterprise);
    }
    
    /**
     * Get the Interior API
     */
    public function interior(bool $enterprise = false): Interior
    {
        return new Interior($this->client, $enterprise);
    }
    
    /**
     * Get the Realtime API
     */
    public function realtime(bool $enterprise = false): Realtime
    {
        return new Realtime($this->client, $enterprise);
    }
    
    /**
     * Get the Deepfake API
     */
    public function deepfake(bool $enterprise = false): Deepfake
    {
        return new Deepfake($this->client, $enterprise);
    }
    
    /**
     * Get the Community API
     */
    public function community(bool $enterprise = false): Community
    {
        return new Community($this->client, $enterprise);
    }
    
    /**
     * Get the Image Editing API
     */
    public function imageEditing(bool $enterprise = false): ImageEditing
    {
        return new ImageEditing($this->client, $enterprise);
    }
    
    /**
     * Get the underlying client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
