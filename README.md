# Documentação da API `EvolutionApi`


# Instalação do Pacote `EvolutionApi`

## Pré-requisitos

- Certifique-se de ter o [Composer](https://getcomposer.org/) instalado em seu ambiente de desenvolvimento.

## Instalação via Composer

Execute o comando abaixo no terminal para adicionar o pacote ao seu projeto:

```bash
composer require tiagoandrepro/evolution-api-php-sdk
```

# Exemplo de Uso da `EvolutionApi`

Abaixo está um exemplo de como utilizar a `EvolutionApi` para enviar uma mensagem de texto:

```php
<?php

use Tiagoandrepro\\EvolutionApi\\Api\\EvolutionApiClient;
use Tiagoandrepro\\EvolutionApi\\Http\\GuzzleHttpClientAdapter;

// Configuração da URI base e chave de API
$baseUri = 'http://127.0.0.1:8989';
$apiKey = 'B6D711FCDE4D4FD5936544120E713976';

// Inicializando o cliente HTTP com a URI base
$client = new GuzzleHttpClientAdapter($baseUri);

// Criando uma instância do cliente da API com o cliente HTTP e a chave de API
$apiClient = new EvolutionApiClient($client, $apiKey);

// Enviando uma mensagem de texto
$response = $apiClient->message()->sendTextMessage('exampleInstance', '5511954562325', 'Sample Text');

// Tratamento da resposta
if ($response->getStatusCode() == 200) {
    echo "Mensagem enviada com sucesso!";
} else {
    echo "Erro ao enviar mensagem!";
}
```
## Explicação do Código

### Configuração da URI base e chave de API:
- **baseUri**: Define a URI base para o servidor da API.
- **apiKey**: Chave de API usada para autenticação nas requisições.

### Inicializando o Cliente HTTP:
O cliente HTTP é inicializado utilizando a classe `GuzzleHttpClientAdapter` com a URI base configurada.

### Criando uma Instância do Cliente da API:
Uma instância de `EvolutionApiClient` é criada passando o cliente HTTP e a chave de API como parâmetros.

### Enviando uma Mensagem de Texto:
O método `sendTextMessage` da classe `Message` é utilizado para enviar uma mensagem de texto para um número específico.

### Parâmetros:
- **exampleInstance**: Nome da instância de onde a mensagem será enviada.
- **5511954562325**: Número de telefone no formato E.164.
- **Sample Text**: Conteúdo da mensagem a ser enviada.

### Tratamento da Resposta:
O código verifica o status da resposta para determinar se a mensagem foi enviada com sucesso ou se houve algum erro.
