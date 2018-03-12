<?php

class Home extends API
{

    private $logger;

    public function __construct($request, $origin)
    {
        parent::__construct($request, 'html');
        $this->logger = new Logger();
        $this->logger->logToFile(true);
        $this->logger->setLogfile('/tmp/index.log');
        $this->logger->logToStdout(false);
    }

    protected function index($body, $args)
    {
        if ($this->method !== "GET") {
            return $this->invalidMethod();
        }

        $id = '';
        if(array_key_exists('id', $body)) {
            $id = $body['id'];
        }

        $index = Config::$ASSETS['TEMPLATES'] . Config::$TEMPLATES['INDEX'];
        $template = new Template($index);

        return $template;
    }
}

