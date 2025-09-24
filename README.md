# ModelsLab PHP SDK

A PHP SDK for the ModelsLab API, providing easy access to AI-powered image, video, audio, and 3D generation services.

## Installation

Install the SDK using Composer:

```bash
composer require modelslab/php-sdk
```

Or add it to your `composer.json`:

```json
{
    "require": {
        "modelslab/php-sdk": "^1.0.0"
    }
}
```

## Quick Start

```php
<?php

require_once 'vendor/autoload.php';

use ModelsLab\ModelsLab;
use ModelsLab\Schemas\Audio as AudioSchemas;

// Initialize the SDK
$apiKey = getenv('MODELSLAB_API_KEY') ?: 'your-api-key-here';
$modelslab = new ModelsLab($apiKey);

// Generate text to speech
$textToSpeechSchema = new AudioSchemas\Text2Speech([
    'prompt' => 'Hello, this is a test of the ModelsLab PHP SDK!',
    'voice_id' => 'madison',
    'language' => 'english',
    'output_format' => 'wav'
]);

$response = $modelslab->audio()->textToSpeech($textToSpeechSchema);
echo json_encode($response, JSON_PRETTY_PRINT);
```

## API Reference

### Audio API

The Audio API provides text-to-speech, music generation, and voice conversion capabilities.

```php
$audio = $modelslab->audio();

// Text to Speech
$response = $audio->textToSpeech($textToSpeechSchema);

// Music Generation
$response = $audio->musicGen($musicGenSchema);

// Voice to Voice
$response = $audio->voice2Voice($voice2VoiceSchema);

// Sound Effects
$response = $audio->sfxGen($sfxSchema);
```

### Video API

Generate videos from text prompts.

```php
$video = $modelslab->video();
$response = $video->textToVideo($videoSchema);
```

### 3D API

Generate 3D models from text descriptions.

```php
$threeD = $modelslab->threeD();
$response = $threeD->textTo3D($threeDSchema);
```

### Interior API

Generate interior design images.

```php
$interior = $modelslab->interior();
$response = $interior->interior($interiorSchema);
```

### Realtime API

Real-time image generation.

```php
$realtime = $modelslab->realtime();
$response = $realtime->textToImage($realtimeSchema);
```

### Deepfake API

Generate deepfake content.

```php
$deepfake = $modelslab->deepfake();
$response = $deepfake->generate($deepfakeSchema);
```

### Community API

Access community models.

```php
$community = $modelslab->community();
$response = $community->generate($communitySchema);
```

### Image Editing API

Edit and manipulate images.

```php
$imageEditing = $modelslab->imageEditing();
$response = $imageEditing->backgroundRemover($backgroundRemoverSchema);
```

## Configuration

### Environment Variables

You can set your API key using environment variables:

```bash
export MODELSLAB_API_KEY="your-actual-api-key"
```

Or use the `API_KEY` environment variable:

```bash
export API_KEY="your-actual-api-key"
```

### Client Options

```php
$modelslab = new ModelsLab($apiKey, [
    'base_url' => 'https://modelslab.com/api/',
    'fetch_retry' => 10,
    'fetch_timeout' => 2
]);
```

## Error Handling

The SDK throws exceptions for various error conditions:

```php
try {
    $response = $modelslab->audio()->textToSpeech($schema);
} catch (InvalidArgumentException $e) {
    // Invalid API key or parameters
    echo "Invalid argument: " . $e->getMessage();
} catch (RuntimeException $e) {
    // Network or API errors
    echo "Request failed: " . $e->getMessage();
}
```


## Environment Setup

1. Copy the environment example file:
```bash
cp env.example .env
```

2. Edit `.env` and add your API key:
```bash
MODELSLAB_API_KEY=your-actual-api-key
```

## Requirements

- PHP 7.4 or higher
- Guzzle HTTP client
- Composer for dependency management

## License

MIT License

## Support

For support and questions, please contact [support@modelslab.com](mailto:support@modelslab.com) or visit our [documentation](https://docs.modelslab.com).
