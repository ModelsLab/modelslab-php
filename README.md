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

// Text to Video
$response = $video->textToVideo($videoSchema);

// Image to Video
$response = $video->imageToVideo($imageToVideoSchema);

// Text to Video Ultra
$response = $video->textToVideoUltra($text2VideoUltraSchema);

// Watermark Remover - Remove watermarks from videos
$watermarkRemover = new WatermarkRemoverSchema([
    'key' => $apiKey,
    'init_video' => 'https://example.com/video.mp4'
]);
$response = $video->watermarkRemover($watermarkRemover);
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

// Interior Design
$response = $interior->makeInterior($interiorSchema);

// Room Decorator
$response = $interior->roomDecorator($roomDecoratorSchema);

// Floor Planning
$response = $interior->floorPlanning($floorPlanningSchema);

// Sketch Rendering
$response = $interior->sketchRendering($sketchRenderingSchema);

// Object Removal - Remove objects from room images
$objectRemoval = new ObjectRemovalSchema([
    'key' => $apiKey,
    'init_image' => 'https://example.com/room.jpg',
    'object_name' => 'chair',
    'base64' => false
]);
$response = $interior->objectRemoval($objectRemoval);

// Interior Mixer - Add objects from one image into another room
$interiorMixer = new InteriorMixerSchema([
    'key' => $apiKey,
    'init_image' => 'https://example.com/room.jpg',
    'object_image' => 'https://example.com/furniture.jpg',
    'prompt' => 'Add the furniture to the living room',
    'width' => 1280,
    'height' => 1280,
    'num_inference_steps' => 8,
    'base64' => false
]);
$response = $interior->interiorMixer($interiorMixer);
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

// Qwen Edit - Edit images using Qwen model
$qwenEdit = new QwenEditSchema([
    'key' => $apiKey,
    'prompt' => 'Add a sunset in the background',
    'init_image' => ['https://example.com/image1.jpg', 'https://example.com/image2.jpg'],
    'base64' => false
]);
$response = $imageEditing->qwenEdit($qwenEdit);

// Caption - Generate captions for images
$caption = new CaptionSchema([
    'key' => $apiKey,
    'init_image' => 'https://example.com/image.jpg',
    'length' => 'normal', // 'short', 'normal', or 'long'
    'base64' => false
]);
$response = $imageEditing->caption($caption);

// Other image editing methods
$response = $imageEditing->backgroundRemover($backgroundRemoverSchema);
$response = $imageEditing->superResolution($superResolutionSchema);
$response = $imageEditing->outpainting($outpaintingSchema);
$response = $imageEditing->inpainting($inpaintingSchema);
$response = $imageEditing->objectRemover($objectRemoverSchema);
$response = $imageEditing->facegen($facegenSchema);
$response = $imageEditing->headshot($headshotSchema);
$response = $imageEditing->fashion($fashionSchema);
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
