#!/bin/sh
echo "installing extension: mysqli"
docker-php-ext-install mysqli
echo "installing extension: mysqli..done"
echo "enabling extension: mysqli"
docker-php-ext-end mysqli
echo "enabling extension: mysqli..done"
