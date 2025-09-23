<?php

namespace ModelsLab\Utils;

/**
 * Image utility functions
 */
class ImageUtils
{
    /**
     * Read image from file path
     */
    public static function readImageFromFile(string $filePath): string
    {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException("File not found: {$filePath}");
        }
        
        $imageData = file_get_contents($filePath);
        if ($imageData === false) {
            throw new \RuntimeException("Failed to read file: {$filePath}");
        }
        
        return $imageData;
    }
    
    /**
     * Convert image to base64
     */
    public static function imageToBase64(string $imageData): string
    {
        return base64_encode($imageData);
    }
    
    /**
     * Convert base64 to image data
     */
    public static function base64ToImage(string $base64Data): string
    {
        return base64_decode($base64Data);
    }
    
    /**
     * Get image MIME type from file path
     */
    public static function getImageMimeType(string $filePath): string
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $filePath);
        finfo_close($finfo);
        
        return $mimeType;
    }
    
    /**
     * Validate image file
     */
    public static function validateImageFile(string $filePath): bool
    {
        if (!file_exists($filePath)) {
            return false;
        }
        
        $mimeType = self::getImageMimeType($filePath);
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        
        return in_array($mimeType, $allowedTypes);
    }
}
