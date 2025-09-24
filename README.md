# ModelsLab PHP SDK

A PHP SDK for the ModelsLab API, providing easy access to AI-powered image, video, audio, and 3D generation services.

## Installation

Install the SDK using Composer:

```bash
composer require modelslab/php
```

Or add it to your `composer.json`:

```json
{
    "require": {
        "modelslab/php": "^1.0.2"
    }
}
```

## Quick Start

### Text to Speech
```php
<?php
require_once 'vendor/autoload.php';

use ModelsLab\ModelsLab;
use ModelsLab\Schemas\Text2Speech;

$apiKey = 'your-api-key';
$modelslab = new ModelsLab($apiKey);

$tts = new Text2Speech([
    'prompt' => 'Hello from ModelsLab!',
    'voice_id' => 'madison',
    'language' => 'english'
]);

$response = $modelslab->audio()->textToSpeech($tts);
echo json_encode($response, JSON_PRETTY_PRINT);
```

### Text to Image
```php
<?php
require_once 'vendor/autoload.php';

use ModelsLab\ModelsLab;
use ModelsLab\Schemas\RealtimeText2ImageSchema;

$apiKey = 'your-api-key';
$modelslab = new ModelsLab($apiKey);

$image = new RealtimeText2ImageSchema([
    'prompt' => 'A beautiful landscape',
    'width' => 512,
    'height' => 512
]);

$response = $modelslab->realtime()->textToImage($image);
echo json_encode($response, JSON_PRETTY_PRINT);
```

### Text to Video
```php
<?php
require_once 'vendor/autoload.php';

use ModelsLab\ModelsLab;
use ModelsLab\Schemas\Text2Video;

$apiKey = 'your-api-key';
$modelslab = new ModelsLab($apiKey);

$video = new Text2Video([
    'prompt' => 'A cat playing with a ball',
    'model_id' => 'svd'
]);

$response = $modelslab->video()->textToVideo($video);
echo json_encode($response, JSON_PRETTY_PRINT);
```

### Deepfake Video Swap
```php
<?php
require_once 'vendor/autoload.php';

use ModelsLab\ModelsLab;
use ModelsLab\Schemas\DeepfakeSchema;

$apiKey = 'your-api-key';
$modelslab = new ModelsLab($apiKey);

$deepfake = new DeepfakeSchema([
    'init_image' => 'https://example.com/face.jpg',
    'init_video' => 'https://example.com/video.mp4',
    'output_format' => 'mp4'
]);

$response = $modelslab->deepfake()->singleVideoSwap($deepfake);
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
