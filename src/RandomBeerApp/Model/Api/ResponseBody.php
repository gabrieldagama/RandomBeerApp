<?php

namespace RandomBeerApp\Model\Api;

/**
 * Class ResponseBody
 * @package RandomBeerApp\Model\Api
 */
class ResponseBody
{
    /**
     * @var bool
     */
    private $status;

    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $message;

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status)
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }
}