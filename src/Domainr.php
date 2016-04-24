<?php

namespace JungleTeam\Domainr;

use GuzzleHttp\Client;

class Domainr
{
    protected $key;
    protected $client;

    public function __construct()
    {
        $this->key     = config("domainr.mashape-key");
        $this->client  = new Client([
            "base_uri" => config("domainr.api-url")
        ]);
    }

    public function search($query, $location = null, $registrar = null, $defaults = null)
    {
        $result = $this->client->request("GET", "/v2/search", [
            "query" => [
                "query" => $query,
                "location" => $location,
                "registrar" => $registrar,
                "defaults" => $defaults,
                "mashape-key" => $this->key,
            ],
            "allow_redirects" => false,
        ]);
        return json_decode($result->getBody()->getContents())->results;
    }

    public function register($domain, $registrar = null)
    {
        $result = $this->client->request('GET', "/v2/register", [
            "query" => [
                "domain" => $domain,
                "registrar" => $registrar,
                "mashape-key" => $this->key,
            ],
            "allow_redirects" => false,
        ]);
        return $result->getHeader("location")[0];
    }

    public function status($domain)
    {
        $result = $this->client->request("GET", "/v2/status", [
            "query" => [
                "domain" => $domain,
                "mashape-key" => $this->key,
            ],
            "allow_redirects" => false,
        ]);
        return json_decode($result->getBody()->getContents())->status;
    }


}