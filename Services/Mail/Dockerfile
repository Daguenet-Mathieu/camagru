FROM php:8.2-cli

RUN apt-get update && apt-get install -y msmtp gettext-base && rm -rf /var/lib/apt/lists/*
COPY Mail/srcs /app/

COPY Mail/msmtprc.template /etc/msmtprc.template
COPY Mail/entrypoint.sh /entrypoint.sh
COPY phpConfig/session.ini /usr/local/etc/php/conf.d/session.ini

RUN chmod +x /entrypoint.sh

RUN echo 'sendmail_path = /usr/bin/msmtp -t' >> /usr/local/etc/php/php.ini
ENTRYPOINT ["/entrypoint.sh"]
CMD ["php", "-S", "0.0.0.0:8081", "-t", "/app"]
