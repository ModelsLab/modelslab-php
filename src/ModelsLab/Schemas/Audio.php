<?php

namespace ModelsLab\Schemas;

/**
 * Schema for text-to-audio conversion.
 */
class Text2Audio extends BaseSchema
{
    protected string $prompt;
    protected $initAudio;
    protected ?string $voiceId;
    protected ?string $language;
    protected ?float $speed;
    protected ?float $temp;
    protected ?string $base64;
    protected ?bool $stream;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->initAudio = $data['init_audio'] ?? null;
        $this->voiceId = $data['voice_id'] ?? null;
        $this->language = $data['language'] ?? null;
        $this->speed = $data['speed'] ?? null;
        $this->temp = $data['temp'] ?? null;
        $this->base64 = $data['base64'] ?? null;
        $this->stream = $data['stream'] ?? null;
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
 * Schema for text-to-speech conversion.
 */
class Text2Speech extends BaseSchema
{
    protected string $prompt;
    protected ?string $voiceId;
    protected ?string $language;
    protected ?float $speed;
    protected ?string $outputFormat;
    protected ?string $emotion;
    protected ?float $temp;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->voiceId = $data['voice_id'] ?? null;
        $this->language = $data['language'] ?? null;
        $this->speed = $data['speed'] ?? null;
        $this->outputFormat = $data['output_format'] ?? 'wav';
        $this->emotion = $data['emotion'] ?? null;
        $this->temp = $data['temp'] ?? null;
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
 * Schema for voice-to-voice conversion.
 */
class Voice2Voice extends BaseSchema
{
    protected $initAudio;
    protected $targetAudio;
    protected ?bool $base64;
    protected ?float $temp;
    protected ?bool $stream;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->initAudio = $data['init_audio'] ?? null;
        $this->targetAudio = $data['target_audio'] ?? null;
        $this->base64 = $data['base64'] ?? null;
        $this->temp = $data['temp'] ?? null;
        $this->stream = $data['stream'] ?? null;
    }
}

/**
 * Schema for voice cover.
 */
class VoiceCover extends BaseSchema
{
    protected $initAudio;
    protected ?string $modelId;
    protected ?string $pitch;
    protected ?string $algorithm;
    protected ?string $rate;
    protected ?string $seed;
    protected ?string $emotion;
    protected ?float $speed;
    protected ?float $radius;
    protected ?float $mix;
    protected ?int $hopLength;
    protected ?float $originality;
    protected ?int $leadVoiceVolumeDelta;
    protected ?int $backupVoiceVolumeDelta;
    protected ?int $instrumentVolumeDelta;
    protected ?float $reverbSize;
    protected ?float $wetness;
    protected ?float $dryness;
    protected ?float $damping;
    protected ?bool $base64;
    protected ?float $temp;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->initAudio = $data['init_audio'] ?? null;
        $this->modelId = $data['model_id'] ?? null;
        $this->pitch = $data['pitch'] ?? null;
        $this->algorithm = $data['algorithm'] ?? null;
        $this->rate = $data['rate'] ?? null;
        $this->seed = $data['seed'] ?? null;
        $this->emotion = $data['emotion'] ?? 'neutral';
        $this->speed = $data['speed'] ?? null;
        $this->radius = $data['radius'] ?? null;
        $this->mix = $data['mix'] ?? null;
        $this->hopLength = $data['hop_length'] ?? null;
        $this->originality = $data['originality'] ?? null;
        $this->leadVoiceVolumeDelta = $data['lead_voice_volume_delta'] ?? null;
        $this->backupVoiceVolumeDelta = $data['backup_voice_volume_delta'] ?? null;
        $this->instrumentVolumeDelta = $data['instrument_volume_delta'] ?? null;
        $this->reverbSize = $data['reverb_size'] ?? null;
        $this->wetness = $data['wetness'] ?? null;
        $this->dryness = $data['dryness'] ?? null;
        $this->damping = $data['damping'] ?? null;
        $this->base64 = $data['base64'] ?? null;
        $this->temp = $data['temp'] ?? null;
    }
}

/**
 * Schema for music generation.
 */
class MusicGenSchema extends BaseSchema
{
    protected string $prompt;
    protected $initAudio;
    protected ?string $outputFormat;
    protected ?string $bitrate;
    protected ?string $base64;
    protected ?float $temp;
    protected ?int $maxNewToken;
    protected ?int $samplingRate;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->initAudio = $data['init_audio'] ?? null;
        $this->outputFormat = $data['output_format'] ?? 'wav';
        $this->bitrate = $data['bitrate'] ?? '320k';
        $this->base64 = $data['base64'] ?? null;
        $this->temp = $data['temp'] ?? null;
        $this->maxNewToken = $data['max_new_token'] ?? null;
        $this->samplingRate = $data['sampling_rate'] ?? null;
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
 * Schema for lyrics generation.
 */
class LyricsGenerator extends BaseSchema
{
    protected string $prompt;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
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
 * Schema for song generation.
 */
class SongGenerator extends BaseSchema
{
    protected ?bool $lyricsGeneration;
    protected $initAudio;
    protected string $prompt;
    protected ?string $lyrics;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->lyricsGeneration = $data['lyrics_generation'] ?? null;
        $this->initAudio = $data['init_audio'] ?? null;
        $this->prompt = $data['prompt'] ?? '';
        $this->lyrics = $data['lyrics'] ?? null;
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
 * Schema for speech-to-text conversion.
 */
class Speech2Text extends BaseSchema
{
    protected string $audioUrl;
    protected ?string $inputLanguage;
    protected ?string $timestampLevel;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->audioUrl = $data['audio_url'] ?? '';
        $this->inputLanguage = $data['input_language'] ?? null;
        $this->timestampLevel = $data['timestamp_level'] ?? null;
    }
    
    public function getAudioUrl(): string
    {
        return $this->audioUrl;
    }
    
    public function setAudioUrl(string $audioUrl): self
    {
        $this->audioUrl = $audioUrl;
        return $this;
    }
}

/**
 * Schema for sound effect generation.
 */
class SFX extends BaseSchema
{
    protected string $prompt;
    protected ?int $duration;
    protected ?string $outputFormat;
    protected ?string $bitrate;
    protected ?bool $temp;
    
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        
        $this->prompt = $data['prompt'] ?? '';
        $this->duration = $data['duration'] ?? null;
        $this->outputFormat = $data['output_format'] ?? 'wav';
        $this->bitrate = $data['bitrate'] ?? '320k';
        $this->temp = $data['temp'] ?? null;
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
