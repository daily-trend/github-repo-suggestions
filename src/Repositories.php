<?php
require_once __DIR__ . '/../vendor/autoload.php';  // Correct path to autoloader

use GuzzleHttp\Client;  // Guzzle HTTP client

class Repositories {
    private $client;
    private $githubApiUrl = 'https://api.github.com/'; // GitHub API base URL

    public function __construct() {
        // Initialize the Guzzle client
        $this->client = new Client([
            'base_uri' => $this->githubApiUrl,
            'timeout'  => 10.0,
        ]);
    }

    public function getRepositoriesByCategoryAndLanguage($category, $language)
    {
        // Sample GitHub API URL with filters for category and language
        $url = "https://api.github.com/search/repositories?q=language:$language+topic:$category&sort=stars&order=desc";

        // Initialize cURL to fetch data from GitHub API
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0'); // GitHub requires a user-agent

        $response = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response
        $repositories = json_decode($response, true);

        // Return the items (repositories)
        return $repositories['items'] ?? [];
    }
}
