<h1 align="center">SDK Gerencianet para Laravel</h1>

![SDK Gerencianet para PHP](https://media-exp1.licdn.com/dms/image/C4D1BAQH9taNIaZyh_Q/company-background_10000/0/1603126623964?e=2159024400&v=beta&t=coQC_AK70vTYL3NdvbeIaeYts8nKumNHjvvIGCmq5XA)

<p align="center">
  <span><b>Português</b></span>
</p>

---

SDK em Laravel para integração com a API da Gerencianet.
Para mais informações sobre parâmetros e valores, consulte a documentação da [Gerencianet](http://gerencianet.com.br).

Ir para:
* [Requisitos](#requisitos)
* [Testado com](#testado-com)
* [Instalação](#instalação)
* [Começando](#começando)
  * [Como obter as credenciais Client_Id e Client_Secret](#como-obter-as-credenciais-client_id-e-client_secret)
  * [Como gerar um certificado Pix](#como-gerar-um-certificado-pix)
  * [Como converter um certificado Pix](#como-converter-um-certificado-pix)
  * [Como cadastrar as chaves Pix](#como-cadastrar-as-chaves-pix)
* [Executar exemplos](#executar-exemplos)
* [Documentação Adicional](#documentação-adicional)
* [Licença](#licença)

---

## Requisitos
* SDK PHP disponibilizada pela Gerencianet. Disponível em: https://github.com/gerencianet/gn-api-sdk-php
* Laravel >= 8.0

## Testado com
```
PHP 7.3
Laravel 8.49
```

## Instalação
Com o Laravel instalado e funcionando, será necessário você instalar a [SDK de PHP](https://github.com/gerencianet/gn-api-sdk-php) em suas dependências. Para isso, você poderá:

Incluir a dependência em seu arquivo `composer.json`:
```
...
"require": {
  "gerencianet/gerencianet-sdk-php": "^4.0"
},
...
```
Após inserir a dependência no arquivo `composer.json` do Laravel, será necessário você executar o comando para instalar as mesmas: 
```
$ composer install
```
Ou baixe este pacote com [Composer](https://getcomposer.org/):
```
$ composer require gerencianet/gerencianet-sdk-php
```

Através dos passos acima, você verá que na pasta `vendor` de seu Laravel terá nossa SDK de PHP. Diante disso, para terminar a instalação, basta você fazer download do código desse repositório (Pastas `resources` e `routes`) e inserir as mesmas no seu Projeto Laravel. 


## Começando
Requer o módulo e os namespaces:
```php
API Boletos -> require __DIR__ . '/../../../../vendor/autoload.php';
API Pix     -> require __DIR__ . '/../../../../../vendor/autoload.php';

use Gerencianet\Gerencianet;
```

Embora as respostas dos serviços da web estejam no formato json, a SDK converterá qualquer resposta do servidor em array. O código deve estar dentro de um try-catch, e podem ser tratadas da seguinte forma:

```php
try {
  /* code */
} catch(GerencianetException $e) {
  /* Gerencianet's api errors will come here */
} catch(Exception $ex) {
  /* Other errors will come here */
}
```

Para começar, você deve configurar os parâmetros no arquivo `resources/views/examples/config.json`. Instancie as informações `client_id`, `client_secret` para autenticação e `sandbox` igual a *true*, se seu ambiente for Homologação, ou *false*, se for Produção. Se você usa cobrança Pix, informe no atributo `pix_cert` o diretório relativo (`resources/certs/`) e o nome do seu certificado no formato .pem.

Veja exemplos de configuração a seguir:

### Para ambiente de homologação
Instancie os parâmetros do módulo usando client_id, client_secret, sandbox igual a `true` e pix_cert como o nome do certificado de homologação:
```php
{
    "client_id": "client_id",
    "client_secret": "client_secret",
    "pix_cert": "../resources/certs/developmentCertificate.pem",
    "sandbox": true,
    "debug": false,
    "timeout": 30
}
```

### Para ambiente de produção
Instancie os parâmetros do módulo usando client_id, client_secret, sandbox igual a `false` e pix_cert como o nome do certificado de produção:
```php 
{
    "client_id": "client_id",
    "client_secret": "client_secret",
    "pix_cert": "../resources/certs/productionCertificate.pem",
    "sandbox": false,
    "debug": false,
    "timeout": 30
}
```

## Como obter as credenciais Client_Id e Client_Secret

**Crie uma nova aplicação para usar a API Pix:** Acesse o menu API (1)-> Minhas Aplicações -> Nova Aplicação(2) -> Ative API Pix (3) e escolha os escopos que deseja liberar em Produção e/ou Homologação (lembrando que estes podem ser alterados posteriormente) -> clique em Criar Nova aplicação(4).
![Crie uma nova aplicação para usar a API Pix](https://t-images.imgix.net/https%3A%2F%2Fapp-us-east-1.t-cdn.net%2F5fa37ea6b47fe9313cb4c9ca%2Fposts%2F603543ff4253cf5983339cf1%2F603543ff4253cf5983339cf1_88071.png?width=1240&w=1240&auto=format%2Ccompress&ixlib=js-2.3.1&s=2f24c7ea5674dbbea13773b3a0b1e95c)


**Alterar uma aplicação existente para usar a API Pix:** Acesse o menu API (1)-> Minhas Aplicações e escolha a sua aplicação (2) -> Editar(Botão laranja) -> Ative API Pix (3) e escolha os escopos que deseja liberar em Produção e/ou Homologação (lembrando que estes podem ser alterados posteriormente) -> clique em Atualizar aplicação (4).
![Alterar uma aplicação existente para usar a API Pix](https://app-us-east-1.t-cdn.net/5fa37ea6b47fe9313cb4c9ca/posts/603544082060b2e9b88bc717/603544082060b2e9b88bc717_22430.png)


## Como gerar um certificado Pix

Todas as requisições do Pix devem conter um certificado de segurança que será fornecido pela Gerencianet dentro da sua conta, no formato PFX(.p12). Essa exigência está descrita na íntegra no [manual de segurança do PIX](https://www.bcb.gov.br/estabilidadefinanceira/comunicacaodados).

**Para gerar seu certificado:** Acesse o menu API (1) -> Meus Certificados (2) e escolha o ambiente em que deseja o certificado: Produção ou Homologação -> clique em Novo Certificado (3).
![Para gerar seu certificado](https://app-us-east-1.t-cdn.net/5fa37ea6b47fe9313cb4c9ca/posts/603543f7d1778b2d725dea1e/603543f7d1778b2d725dea1e_85669.png)


## Como converter um certificado Pix

:warning: Para uso em PHP, o certificado deve ser convertido em formato `.pem`.

Você pode [baixar o conversor de certificados disponibilizado pela Gerencianet](https://pix.gerencianet.com.br/ferramentas/conversorGerencianet.exe). 

Ou utilize do exemplo abaixo, executando o comando OpenSSL para conversão.

### Comando OpenSSL
```
// Gerar certificado e chave em único arquivo
openssl pkcs12 -in certificado.p12 -out certificado.pem -nodes
```

## Como cadastrar as chaves Pix
O cadastro das chaves Pix pode ser feito através do aplicativo. Caso ainda não tenha nosso aplicativo instalado, clique em [Android](https://play.google.com/store/apps/details?id=br.com.gerencianet.app) ou [iOS](https://apps.apple.com/br/app/gerencianet/id1443363326), de acordo com o sistema operacional do seu smartphone, para fazer o download.

Para registrar suas chaves Pix por meio do aplicativo:
1. Acesse sua conta através do **app Gerencianet**.
2. No menu lateral, toque em **Pix** para iniciar seu registro.
3. Leia as informações que aparecem na tela e clique em **Registrar Chave**.
    Se este não for mais seu primeiro registro, toque em **Minhas Chaves** e depois no ícone (➕).
4. **Selecione os dados** que você vai cadastrar como Chave do Pix e toque em **avançar** – você deve escolher pelo menos 1 das 4 opções de chaves disponíveis (celular, e-mail, CPF e/ou chave aleatória).
5. Após cadastrar as chaves do Pix desejadas, clique em **concluir**.
6. **Pronto! Suas chaves já estão cadastradas com a gente.**


## Executar exemplos
Você pode executar usando qualquer servidor web, como Apache ou nginx, ou simplesmente iniciar um servidor laravel da seguinte forma:

```php
php artisan serve
```

Para abrir algum de nossos examples, basta digitar em seu navegador `localhost/nome_do_metodo_que_deseja` como `localhost/createCharge` ou `localhost/pixCreateImmediateCharge`. 
Obs.: Exemplos baseados na porta default do servidor (`port: 8000`). 

Ou abra qualquer exemplo em seu navegador.

:warning: Alguns exemplos requerem que você altere alguns parâmetros para funcionar, como `examples/charge/oneStepBillet.php` ou `examples/pix/charge/create.php` onde você deve alterar o parâmetro `id`.

## Documentação Adicional

A documentação completa com todos os endpoints e detalhes da API está disponível em https://dev.gerencianet.com.br/.

Se você ainda não tem uma conta digital da Gerencianet, [abra a sua agora](https://sistema.gerencianet.com.br/)!

## Licença
[MIT](LICENSE)
