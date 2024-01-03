<p align="center">Descrição projeto registros</p>

---

# Base Claudenir - 2024


## Configurações Iniciais para rodar com Docker + Postgres + Nginx
---

`cp .env.example .env` 

### Mudar o DB_HOST para o mesmo a seguir

````
DB_HOST=postgres
````
> Obs: As outras configurações do banco de dados fica a critério do desenvolvedor.
---
## Usar os comandos a seguir:

- `docker-compose up -d --build` 

- `docker-compose run --rm composer install`

- `docker-compose run --rm artisan key:generate` 

- `docker-compose run --rm artisan migrate` 

- `docker exec -it registros-app chown -R www-data:www-data /var/www/storage`

- `docker exec -it registros-app chmod -R 775 bootstrap storage`

> Obs: Por padrão o container da aplicação será "registros-app", caso mude no docker-compose.yml mude no comando acima também. 



---

Se ocorrer tudo certo a aplicação irá rodar em http://127.0.0.1:80

