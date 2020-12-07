# Introduction 
Prepares an nginx, mysql and php container app. Note that this deployment is *highly insecure* and only for use in closed environment for testing purposes.

---

# Built With
* https://hub.docker.com/_/nginx
* https://hub.docker.com/_/mysql
* https://hub.docker.com/_/php


---
# About the project

Presents a login window and accepts username and password fields. form is submitted with auth.php which checks supplied credentials in sql-database.



* mysql:
Mysql instance that automatically initiates with with a preconfigured database and a table of users & passwords. See sql0/init.sql


User | Password
--- | ---
Hubert J. Farnsworth | professor
Philip J. Fry | fry
John A. Zoidberg | zoidberg
Hermes Conrad | hermes
Turanga Leela | leela
Bender Bending Rodriguez | bender
Amy Wong | amy

List of users and password can be changed in /sql0/init.sql-file .


* php
Is installed from nginx:alpine on docker hub. After starting the container, it will automatically install mysqli extensions and enable them


* nginx
Provides a NGINX web-server with connection to sql0 via php0.



## Installation
Use attached docker-compose.yaml file.


### License
Distributed under the MIT License. See LICENSE for more information.

