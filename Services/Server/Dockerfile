FROM nginx:latest

COPY scripts/default.conf /etc/nginx/conf.d/
COPY srcs /etc/nginx/srcs/
COPY camagru.crt /etc/nginx/ssl/camagru.crt
COPY camagru.key /etc/nginx/ssl/camagru.key