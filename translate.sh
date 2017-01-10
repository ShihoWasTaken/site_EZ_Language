#!/bin/bash

# On update les clés pour les fichiers de traduction
php app/console translation:update en --force --output-format=yml
php app/console translation:update fr --force --output-format=yml