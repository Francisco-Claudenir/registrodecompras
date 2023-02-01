<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

---

## Base Uema - 2023


### Configurações Iniciais

- `cp .env.example .env` **( Copia e cria o arquivo de configuracao do laravel )**

### ACESSO AO BANCO LOCAL

* DB_CONNECTION=pgsql
* DB_HOST=postgres
* DB_PORT=5432
* DB_DATABASE=postgres
* DB_USERNAME=postgres
* DB_PASSWORD=postgres

- `docker-compose up -d`    **( Cria o container do docker )**
- `docker-compose run composer update` **( Atualiza a dependecia do php via composer )**
- `docker-compose run composer install` **( Instala a dependecia do php via composer )**
- `docker-compose run artisan key:generate` **( Gera a chave do sistema )**
