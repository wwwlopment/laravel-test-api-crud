start:
	docker-compose up -d
stop:
	docker-compose down
stop-remove:
	docker-compose down --remove-orphans
app:
	docker exec -it api_crud_app /bin/bash
restart:
	docker-compose -f docker-compose.yml stop
	docker-compose -f docker-compose.yml up -d
build:
	docker-compose build
rebuild:
	docker-compose up -d --build --force-recreate app
	docker-compose up -d