#!/bin/sh
envsubst < /etc/msmtprc.template > /etc/msmtprc
exec "$@"
