FROM php:8.2-cli

COPY User/srcs /app/
COPY phpConfig/session.ini /usr/local/etc/php/conf.d/session.ini

CMD [ "php", "-S", "0.0.0.0:8081", "-t", "/app"]
