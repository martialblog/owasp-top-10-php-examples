# Insecure PHP Example

This example offers various security issues to explore.

## Insecure Webserver Configuration

The .env file is readable by everyone

    http://localhost:8080/.env

## Unencrypted Data Transport

The formular data is sent via unencrytped HTTP

    # Adjust the interface if necessary (-i eth0)
    # 0x47455420 == GET
    # 0x504F5354 == POST
    tcpdump -i eth0 -s 0 -A 'tcp[((tcp[12:1] & 0xf0) >> 2):4] = 0x504F5354'

## Session Hijacking

PHP Session can be hijacked

    # Adjust the interface if necessary (-i eth0)
    # 0x47455420 == GET
    tcpdump -i eth0 -s 0 -A 'tcp[((tcp[12:1] & 0xf0) >> 2):4] = 0x47455420'

## SQL Injection Possible

Due to the insecure PHP implementation SQL Injections are possible.

    Username: " or ""="
    Password: " or ""="

## Cross-Site Scripting Possible

Due to the insecure PHP implementation XSS is possible.

    <b onmouseover=alert('Gotcha!')>click me!</b>
    <script>alert(document.cookie);</script>

