# wunderground2MQTT

wunderground2MQTT is a self-hosted Weather Underground to MQTT bridge. It's a simple PHP script that will post your weatherdata to MQTT.

### Why?
I own a weatherstation from Alecto and Ventus, but the WU API was stopped by IBM, I want my weather data please :)

# What you'll need

  - A bit of control over your local DNS
  - A server that runs PHP

What did I do?:
  - I run [pihole] with FTL
  - I changed to /etc/hosts file on the machine where [pihole] lives
  - The host I added is:
```sh
rtupdate.wunderground.com
```
  - Run Apache+PHP on a server I own

The URL must be:
```sh
http://[your ip]/weatherstation/updateweatherstation.php
```

It uses a modified version of karpy47/php-mqtt-client

Enjoy :)

License
----

MIT


**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [pihole]: <https://pi-hole.net/>
