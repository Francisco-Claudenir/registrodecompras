<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/images/ctic_logo.png" width="400"></a></p>

---

# Base CTIC - 2023


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

- `docker exec -it uema-app chown -R www-data:www-data /var/www/storage`

> Obs: Por padrão o container da aplicação será "uema-app", caso mude no docker-compose.yml mude no comando acima também. 



---

Se ocorrer tudo certo a aplicação irá rodar em [http://localhost](http://localhost)

Acessar o PGAdmin [http://localhost:8080](http://localhost:8080)
