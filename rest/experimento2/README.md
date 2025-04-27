# CRUD de listas de compras

## Instalação

### Requisitos
- PHP 8^;
- [Composer](https://getcomposer.org/download/);
- Docker + Docker Compose

1. Duplique o arquivo `.env.example` na raíz e renomeie ele para `.env`;
2. Navegue para o diretório `./app` e instale as dependências do Laravel:
```bash
composer install
```
3. Volte para a raíz e duplique o arquivo `docker-compose.yml.example` e renomeie-o para `docker-compose.yml`
4. Inicie os containeres:
```bash
docker compose up -d --build
```
5. Acesse a aplicação http://localhost:9000

Obs. Para ver as rotas disponíveis, utilize o comando route:list no container app:
```bash
docker compose exec app php artisan route:list
```