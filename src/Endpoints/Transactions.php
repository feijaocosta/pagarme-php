<?php

namespace PagarMe\Endpoints;

use PagarMe\Client;
use PagarMe\Routes;
use PagarMe\Endpoints\EndpointInterface;
use PagarMe\Endpoints\Endpoint;

class Transactions extends Endpoint
{
    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function create(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::transactions()->base(),
            ['json' => $payload]
        );
    }

    /**
     * @param array|null payload
     *
     * @return \ArrayObject
     */
    public function getList(array $payload = null)
    {
        return $this->client->request(
            self::GET,
            Routes::transactions()->base(),
            ['query' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function get(array $payload)
    {
        return $this->client->request(
            self::GET,
            Routes::transactions()->details($payload['id'])
        );
    }

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function capture(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::transactions()->capture($payload['id']),
            ['json' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function refund(array $payload)
    {
        return $this->client->request(
            self::POST,
            Routes::transactions()->refund($payload['id']),
            ['json' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function listPayables(array $payload)
    {
        return $this->client->request(
            self::GET,
            Routes::transactions()->payables($payload['id']),
            ['json' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function getPayable(array $payload)
    {
        return $this->client->request(
            self::GET,
            Routes::transactions()->payablesDetails(
                $payload['transaction_id'],
                $payload['payable_id']
            ),
            ['json' => $payload]
        );
    }

    /**
     * @param array $payload
     *
     * @return \ArrayObject
     */
    public function listOperations(array $payload)
    {
        return $this->client->request(
            self::GET,
            Routes::transactions()->operations($payload['id']),
            ['json' => $payload]
        );
    }
}
