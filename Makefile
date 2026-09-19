NAME = camagru

COMPOSE = docker compose
MEDIA_VOLUME = Services/volumes/volumemedia

.PHONY: all clean fclean re

all:
	mkdir -p $(MEDIA_VOLUME)
	$(COMPOSE) up --build -d

clean:
	$(COMPOSE) down

fclean:
	$(COMPOSE) down --rmi all --volumes
	rm -rf $(MEDIA_VOLUME)

re:
	$(MAKE) fclean
	$(MAKE) all

