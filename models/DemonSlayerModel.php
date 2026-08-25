<?php

require_once __DIR__ . '/../config/config.php';

class DemonSlayerModel
{
    public function getCharacters(): array
    {
        $url = DEMON_SLAYER_API_URL . '/characters?limit=45';

        $response = $this->makeRequest($url);

        if ($response === null) {
            return [];
        }

        if (
            !isset($response['content']) ||
            !is_array($response['content'])
        ) {
            return [];
        }

        return $response['content'];
    }

    public function getCharacterById(int $id): ?array
    {
        $url = DEMON_SLAYER_API_URL . '/characters?id=' . $id;

        $response = $this->makeRequest($url);

        if ($response === null) {
            return null;
        }

        /*
         * Dependiendo de la respuesta de la API,
         * el personaje puede venir dentro de content.
         */
        if (
            isset($response['content']) &&
            is_array($response['content'])
        ) {
            if (isset($response['content'][0])) {
                return $response['content'][0];
            }

            return $response['content'];
        }

        /*
         * Algunas respuestas pueden devolver
         * directamente el objeto del personaje.
         */
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
