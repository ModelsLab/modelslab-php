<?php

namespace ModelsLab\Core\Apis;

use ModelsLab\Core\Client;
use ModelsLab\Schemas\Text2Audio;
use ModelsLab\Schemas\Text2Speech;
use ModelsLab\Schemas\Voice2Voice;
use ModelsLab\Schemas\VoiceCover;
use ModelsLab\Schemas\MusicGenSchema;
use ModelsLab\Schemas\LyricsGenerator;
use ModelsLab\Schemas\SongGenerator;
use ModelsLab\Schemas\Speech2Text;
use ModelsLab\Schemas\SFX;

/**
 * Audio API for ModelsLab
 */
class Audio extends BaseAPI
{
    public function __construct(Client $client, bool $enterprise = false, array $kwargs = [])
    {
        parent::__construct($client, $enterprise, $kwargs);
        
        if ($enterprise) {
            $this->baseUrl = $this->client->getBaseUrl() . 'v1/enterprise/voice/';
        } else {
            $this->baseUrl = $this->client->getBaseUrl() . 'v6/voice/';
        }
    }
    
    /**
     * Convert text to audio
     */
    public function textToAudio(Text2Audio $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'text_to_audio';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Convert text to speech
     */
    public function textToSpeech(Text2Speech $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'text_to_speech';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Convert voice to voice
     */
    public function voice2Voice(Voice2Voice $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'voice_to_voice';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Generate voice cover
     */
    public function voiceCover(VoiceCover $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'voice_cover';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Generate music
     */
    public function musicGen(MusicGenSchema $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'music_gen';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Generate lyrics
     */
    public function lyricsGen(LyricsGenerator $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'lyrics_generator';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Generate song
     */
    public function songGenerator(SongGenerator $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'song_generator';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Convert speech to text
     */
    public function speechToText(Speech2Text $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'speech_to_text';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
    
    /**
     * Generate sound effects
     */
    public function sfxGen(SFX $schema): array
    {
        $baseEndpoint = $this->baseUrl . 'sfx';
        $data = $schema->toArray();
        return $this->client->post($baseEndpoint, $data);
    }
}
