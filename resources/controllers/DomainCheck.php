<?php

class DomainCheck
{
    function __construct($domain_name)
    {
        $this->domain_name = $domain_name;
        $this->result = ['status' => false, 'message' => 'This domain is already registered.'];
    }

    function is_domain_available()
    {
        return checkdnsrr($this->domain_name, 'ANY') ? true : false;
    }

    function whois($domain_name)
    {
        $fp = fsockopen("whois.verisign-grs.com", 43);
        $out = "$domain_name\r\n";
        fwrite($fp, $out);
        $whois = '';
        while (!feof($fp)) $whois .= fgets($fp, 128);

        if (strpos($whois, 'No match for') !== false) {
            $domain_parts = explode('.', $domain_name);
            $domain_size = count($domain_parts) - 1;
            if ($domain_size < 2) return false;
            $new_domain = '';
            for ($i = 1; $i <= $domain_size; $i++) {
                $dot = '';
                if ($i < $domain_size) $dot = '.';
                $new_domain .= $domain_parts[$i] . $dot;
            }
            $this->whois($new_domain);
        } else {
            $this->result['whois'] = $whois;
        }
        return true;
    }

    function run()
    {
        $is_registered = $this->is_domain_available();
        if ($is_registered) {
            $this->whois($this->domain_name);
            return false;
        }

        $this->result['status'] = true;
        $this->result['message'] = 'This domain is available!';
        return true;
    }

    function get_result()
    {
        return $this->result;
    }
}