FROM php:8.2-cli

COPY srcs /app/
# COPY php.ini /usr/local/etc/php/

CMD ["php", "-d", "upload_max_filesize=20M", "-d", "post_max_size=25M", "-d", "memory_limit=128M", "-S", "0.0.0.0:8081", "-t", "/app"]
# CMD [ "php", "-S", "0.0.0.0:8081", "-t", "/app"]