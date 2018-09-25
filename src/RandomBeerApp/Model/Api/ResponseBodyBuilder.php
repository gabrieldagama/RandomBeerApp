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
    public function build(): ResponseBody
    {
        $builtObject = $this->responseBody;
        $this->reset();
        return $builtObject;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status)
    {
        $this->responseBody->setStatus($status);
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->responseBody->setData($data);
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->responseBody->setMessage($message);
    }
}