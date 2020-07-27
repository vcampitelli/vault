#!/usr/bin/env python3

import requests
import sys

VAULT_HOST=sys.argv[1]
APP_NAME=sys.argv[2]
APP_ENVIRONMENT=sys.argv[3]

response = requests.get(
    "%s/application/%s/credentials/%s" %
    (VAULT_HOST, APP_NAME, APP_ENVIRONMENT)
)

response.raise_for_status()

response = response.json()
if 'data' in response and 'credentials' in response['data']:
    credentials = response['data']['credentials']
    if credentials:
        for credential in credentials:
            print("%s=%s" % (credential['name'], credential['value']))
