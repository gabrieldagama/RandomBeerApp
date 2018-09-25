<?php

namespace RandomBeerApp\Model\Api;

/**
 * Class ResponseBodyBuilder
 * @package RandomBeerApp\Model\Api
 */
class ResponseBodyBuilder
{
    /**
     * @var ResponseBody;
     */
    private $responseBody;

    /**
     * ResponseBodyBuilder constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Reset a new ResponseBody Object.
     */
    private function reset()
    {
        $this->responseBody = new ResponseBody();
    }

    /**
     * @return ResponseBody
     */
    public function build()
    {
        $builtObject = $this->responseBody;
        $this->reset();
        return $builtObject;
    }

    /**
     * @param bool $status
     */
    public function setStatus($status)
    {
        $this->responseBody->setStatus($status);
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->responseBody->setData($data);
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->responseBody->setMessage($message);
    }
}