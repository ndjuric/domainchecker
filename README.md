# Run
```bash
$ docker-compose up
```

# Structure
Application is split into API and frontend.  
Relevant domain checking logic is located in ./resources/controllers/DomainCheck.php

# API
```bash
curl -s -d '{"domain_name":"google.com"}' -H "Content-Type: application/json" -X POST http://localhost/api/check_domain
curl -s -d '{"domain_name":"goojasldjaslgle.com"}' -H "Content-Type: application/json" -X POST http://localhost/api/check_domain
```
