<?php

require 'amazon/aws-autoloader.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

echo `<style>* 
{ font-size:20px; }</style>`;

class PresignedURL
{
    private $s3Client;

    public function __construct()
    {
        $this->s3Client = new S3Client([
            'version' => 'latest',
            'region' => 'eu-north-1',  // Change this to your AWS region
            'credentials' => [
                'key' => 'xxx',      // Replace with your AWS access key
                'secret' => 'xxx',  // Replace with your AWS secret key
            ],
        ]);
    }

    public function run()
    {
        $expiration = new DateTime("+20 minutes");

        echo str_repeat("-", 40) . "\n";
        echo ("Welcome to the Amazon S3 presigned URL demo.\n");
        echo str_repeat("-", 40) . "\n";

        // Get user input for bucket and key
        $bucket = "ekin-bucket";
        $key = "images/1.jpg";
        echo str_repeat("-", 40) . "\n";

        try {
            // Generate the presigned URL
            $cmd = $this->s3Client->getCommand('GetObject', [
                'Bucket' => $bucket,
                'Key' => $key
            ]);

            $request = $this->s3Client->createPresignedRequest($cmd, $expiration);

            $presignedUrl = (string) $request->getUri();

            echo "Your presigned URL is: \n$presignedUrl\nand will be good for the next 20 minutes.\n";
            echo str_repeat("-", 40) . "\n";
            echo "Thanks for trying the Amazon S3 presigned URL demo.\n";

        } catch (AwsException $e) {
            echo str_repeat("-", 40) . "\n";
            echo "Something went wrong: " . $e->getMessage();
        }
    }
}

// Run the script
$runner = new PresignedURL();
$runner->run();