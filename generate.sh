#!/usr/bin/env bash

# downgrade the OpenAPI spec from 3.1 to 3.0
npm run downgrade-openapi

# generate the client
php vendor/bin/jane-openapi generate
