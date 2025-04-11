# Calculadora de Aspect Ratio em SOAP

## Instalação

Instale as dependências do NodeJS com o seguinte comando:
```bash
npm ci
```

## Execução
Após isto, inicie o servidor SOAP com o seguinte comando:
```bash
npm run server
```

Rode o servidor client com o seguinte comando:
```bash
npm run client
```

O servidor SOAP estará hospedado na porta 3000, e o client na porta 3001.

Teste a aplicação:
```bash
curl --location 'http://localhost:3001/aspect-ratio' \
--header 'Content-Type: application/json' \
--data '{
    "width": 1920,
    "height": 1080
}'
```