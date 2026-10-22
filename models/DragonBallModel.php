<?php

require_once __DIR__ . '/../config/config.php';

class DragonBallModel
{
    public function getCharacters(): array
    {
        $url = DRAGON_BALL_API_URL . '/characters';

        $response = $this->makeRequest($url);

        if ($response === null) {
            return [];
        }

        if (
            !isset($response['items']) ||
            !is_array($response['items'])
        ) {
            return [];
        }

        return $response['items'];
    }

    public function getPagination(): array
    {
        $limit = 5;

        $url = DRAGON_BALL_API_URL . '/characters?limit=' . $limit . '&page=1';

        $response = $this->makeRequest($url);

        if ($response === null) {
            return [];
        }

        if (
            !isset($response['meta']) ||
            !is_array($response['meta'])
        ) {
            return [];
        }

        return $response['meta'];
    }

    public function getCharactersByPages(int $limit, int $page): array
    {
        $url = DRAGON_BALL_API_URL . '/characters?limit=' . $limit . '&page=' . $page;

        $response = $this->makeRequest($url);

        if ($response === null) {
            return [];
        }

        if (
            !isset($response['items']) ||
            !is_array($response['items'])
        ) {
            return [];
        }

        return $response['items'];
    }

    public function getCharacterById(int $id): ?array
    {
        $url = DRAGON_BALL_API_URL . '/characters/' . $id;

        $response = $this->makeRequest($url);

        if ($response === null) {
            return null;
        }

        if (
            isset($response['items']) &&
            is_array($response['items'])
        ) {
            if (isset($response['items'][0])) {
                return $response['items'][0];
            }

            return $response['items'];
        }

        if (isset($response['id'])) {
            return $response;
        }

        return null;
    }

    private function makeRequest(string $url): ?array
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($curl);

        if ($response === false) {
            curl_close($curl);
            return null;
        }

        $httpCode = curl_getinfo(
            $curl,
            CURLINFO_HTTP_CODE
        );

        curl_close($curl);

        if ($httpCode !== 200) {
            return null;
        }

        $data = json_decode($response, true);

        if (!is_array($data)) {
            return null;
        }

        return $data;
    }
}