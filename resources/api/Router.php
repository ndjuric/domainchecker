<?php

class Router extends API
{
    private $logger;

    public function __construct($request, $origin)
    {
        parent::__construct($request);
        $this->logger = new Logger();
        $this->logger->logToFile(false);
        $this->logger->logToFileVarDump(true);
        $this->logger->setLogfile('/tmp/router.log');
        $this->logger->logToStdout(false);
        // save tokens to memcached || ddos protection || access control per ip
    }

    /* endpoint: http://puppy.local/api/check_domain?id=some_id */
    protected function check_domain($body, $args)
    {
        switch ($this->method) {
            case "POST":
                if (!array_key_exists('domain_name', $body)) {
                    return ['status' => false, 'message' => 'Mandatory field missing.'];
                }
                $domain_name = $body['domain_name'];
                $domain_check = new DomainCheck($domain_name);
                $domain_check->run();
                return $domain_check->get_result();
            default:
                return $this->invalidMethod();
        }
    }
}
