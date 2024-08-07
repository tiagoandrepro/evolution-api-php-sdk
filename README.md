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

---

## Classe Abstrata: `EvolutionApi`

**Namespace:** `Tiagoandrepro\\EvolutionApi\\Api`

### Descrição
A classe `EvolutionApi` serve como base para as outras classes na API. Ela define métodos e propriedades essenciais, como o cliente HTTP e a chave de API.

### Propriedades

- **$client (HttpClientInterface):** O cliente HTTP utilizado para fazer as requisições.
- **$apiKey (string):** A chave de API utilizada para autenticação.

### Métodos

- **__construct(HttpClientInterface $client, string $apiKey):**
    - Construtor da classe que inicializa o cliente HTTP e a chave de API.

- **protected createRequest(string $method, string $url, array $options = []): RequestInterface**
    - Método protegido que cria uma requisição HTTP.
    - **Parâmetros:**
        - `method (string)`: O método HTTP (GET, POST, etc.).
        - `url (string)`: A URL para a qual a requisição será enviada.
        - `options (array)`: Opções adicionais para a requisição.
    - **Retorno:** Uma instância de `RequestInterface`.

---

## Classe: `Group`

**Extende:** `EvolutionApi`

### Descrição
A classe `Group` lida com operações relacionadas a grupos dentro da API.

### Métodos

- **fetchAllGroups(string $instanceName, bool $getParticipants = true): ResponseInterface**
    - Busca todos os grupos para uma instância específica, com a opção de incluir os participantes.
    - **Parâmetros:**
        - `instanceName (string)`: O nome da instância de onde os grupos serão buscados.
        - `getParticipants (bool)`: Define se os participantes devem ser incluídos na resposta (padrão: true).
    - **Retorno:** Uma instância de `ResponseInterface` contendo a resposta da API.

---

## Classe: `Instance`

**Extende:** `EvolutionApi`

### Descrição
A classe `Instance` é responsável por operações relacionadas a instâncias na API.

### Métodos

- **create(string $instanceName, string $token, bool $qrcode = true, bool $mobile = false, int $number = null, string $integration = 'WHATSAPP-BAILEYS'): ResponseInterface**
    - Cria uma nova instância com as configurações especificadas.
    - **Parâmetros:**
        - `instanceName (string)`: O nome da nova instância.
        - `token (string)`: O token associado à instância.
        - `qrcode (bool)`: Define se um QR code deve ser gerado (padrão: true).
        - `mobile (bool)`: Define se a instância é para um dispositivo móvel (padrão: false).
        - `number (int|null)`: O número associado à instância (opcional).
        - `integration (string)`: O tipo de integração (padrão: 'WHATSAPP-BAILEYS').
    - **Retorno:** Uma instância de `ResponseInterface` contendo a resposta da API.

---

## Classe: `Message`

**Extende:** `EvolutionApi`

### Descrição
A classe `Message` lida com o envio de mensagens dentro da API.

### Métodos

- **sendTextMessage(string $instanceName, string $number, string $message, array $options = [ 'delay' => 1200, 'presence' => 'composing', 'linkPreview' => true ]): ResponseInterface**
    - Envia uma mensagem de texto para um número específico.
    - **Parâmetros:**
        - `instanceName (string)`: O nome da instância que enviará a mensagem.
        - `number (string)`: O número de telefone que receberá a mensagem.
        - `message (string)`: O conteúdo da mensagem.
        - `options (array)`: Opções adicionais, como atraso (`delay`), presença (`presence`), e visualização de links (`linkPreview`).
    - **Retorno:** Uma instância de `ResponseInterface` contendo a resposta da API.
      """