#!/usr/bin/env bash

# downgrade the OpenAPI spec from 3.1 to 3.0
yarn run openapi-down-convert -i api-specification/openapi/openapi.yaml -o openapi.yaml

# generate the client
php vendor/bin/jane-openapi generate
