<?php
require '../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;


/**
 * Upload an image to AWS S3 and return the uploaded file URL or filename.
 *
 * @param array $file The $_FILES['image'] array
 * @return string|false The S3 file URL on success, or false on failure
 */
function uploadImageToS3($file)
{
    // --- AWS Configuration ---
    include "../../envVars/s3.php";

    // --- Validate File ---
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        error_log("S3 Upload failed: Invalid file input");
        return false;
    }

    // --- Initialize AWS S3 Client ---
    $s3 = new S3Client([
        'region' => $region,
        'version' => 'latest',
        'credentials' => [
            'key' => $key,
            'secret' => $secret,
        ],
    ]);

    // --- Prepare File Info ---
    $originalName = basename($file['name']);
    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    $uniqueName = uniqid('img_', true) . '.' . $extension;  // Avoid filename clashes
    $filePath = $file['tmp_name'];
    $mimeType = mime_content_type($filePath);

    try {
        // --- Upload File ---
        $result = $s3->putObject([
            'Bucket' => $bucketName,
            'Key' => 'product_images/thumb/' . $uniqueName,
            'SourceFile' => $filePath,
            // 'ACL' => 'public-read', // optional: remove if private
            'ContentType' => $mimeType
        ]);

        // Return S3 URL or filename
        return $uniqueName; 

    } catch (AwsException $e) {
        error_log("S3 Upload error: " . $e->getMessage());
        return false;
    }
}
?>