<?php
class ClientResource extends JsonResource
{
    public function __construct($data = null, $status = 200, $headers = [], $options = 0)
        {
            $headers = ['Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'];
            $options = JSON_UNESCAPED_UNICODE;
            $this->encodingOptions = $options;

            parent::__construct($data, $status, $headers);
        }
    }
?>