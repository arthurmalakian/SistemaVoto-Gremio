
# SistemaVoto-Gremio

Esse sistema é voltado para o gerenciamento de votos para um gremio estudantil.

## Prerequisitos

Para poder rodar o sistema localmente vc precisará dos seguintes requisitos:

[Docker](https://www.docker.com/)

[Docker-compose](https://docs.docker.com/compose/install/)

[Composer](https://getcomposer.org/download/)

## Instalação

Navegue para a pasta do backend

```bash
  cd SistemaVoto-Gremio-Backend/
```

Copie o arquivo de ambiente

```bash
  cp .env.docker .env
```

Instale as dependencias do projeto

```bash
  composer install
```


Suba os containers do projeto pelo sail

```bash
   ./vendor/bin/sail up -d
```

Realize a migração das tabelas necessárias para o sistema

```bash
   ./vendor/bin/sail exec app php artisan migrate --seed
```

Gere um link simbolico entre a pasta storage e public

```bash
   ./vendor/bin/sail exec app php artisan storage:link
```

Navegue para a pasta do frontend

```bash
  cd ..
  cd sistemavoto-gremio-frontend/
```
Instale as depencias do frontend
```bash
   npm install
```

Rode o servidor node

```bash
   npm run serve
```
  
## WIP

Esse projeto é um trabalho em progresso.  

## Documentation

Documentação gerada com
[Laravel Request Docs](https://github.com/rakutentech/laravel-request-docs)

Uma vez que a API esteja rodando, você poderá acessar a documentação pelo endereço: [http://localhost/request-docs/](http://localhost/request-docs/)

