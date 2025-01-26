<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## PROJETO DESAFIO LMS

## Configurações / Requisitos

-   **[nginx:alpine]**
-   **[mysql:8.0](https://www.mysql.com/)**
-   **[redis]**
-   **[Laravel:10](https://laravel.com/)**
-   **[PHP:8.1\*](https://www.php.net/manual/pt_BR/index.php)**
-   **[docker]**

## Instalar App Usando docker

```bash
$ git clone https://github.com/luizsantos85/capacitacao-tms.git

**observar as configurações de portas e usuario no arquivo docker-composer.yml

**Copiar o .env.example e gerar o .env, fazer as modificações das portas (se necessário) e usuario do DB

**Inicializar os containers
$ docker compose up -d

**será criada uma pasta .docker/mysql para os arquivos de banco de dados

**Acessar o container do laravel
$ docker compose exec app bash

**Instalar os packges do laravel
$ composer install

**Gerar a key do laravel
$ php artisan key:generate

**Gerar as migrations do banco
$ php artisan migrate

**acessar localhost:8000 para acessar o sistema
**Acessar phpmyadmin localhost:8080 (user: mesmo definido no env, senha: mesma definida no env)
```

## Instalar App diretamente na maquina Caso tenha um servidor local (Apache/Nginx)

```bash
$ git clone https://github.com/luizsantos85/capacitacao-tms.git

**Necessário ter o composer instalado

**Copiar o .env.example e gerar o .env, fazer as modificações das portas (se necessário) e usuario do DB

**Instalar os packges do laravel
$ composer install

**Gerar a key do laravel
$ php artisan key:generate

**Criar o banco de dados no mysql (desafio-lms)
**Gerar as migrations do banco
$ php artisan migrate

**Se mudar as configuracoes de cache para file no .env


**Rodar o projeto
$ php artisan serve

**acessar localhost:(porta selecionada) para acessar o sistema
```
