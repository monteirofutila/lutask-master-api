## Lutask Master API com CLI
API REST e interface de linha de comando que lhe permita manter uma lista de tarefas com atividades pendentes e finalizadas!

----

### Linguagem & Framework Usado:
1. PHP-8
1. Laravel-10.x

### Arquitetura Usada:
1. Laravel 10.x
1. Model Based Eloquent Query
1. Repository Pattern
1. Service layer
1. Sanctum Auth

### Como Executar:
1. Clonar o Projecto - 

```bash
git clone https://github.com/monteirofutila/lutask-master-api.git
```
1. Vá para o diretório do projeto por `cd lutask-master-api`
2. Crie o arquivo `.env` e copie o arquivo `.env.example` para o arquivo `.env`
3. Cria um Banco de Dados
4. Instalar os pacotes do composer - `composer install`.
5. Agora rodar as migrações e semeia o Banco de Dados para concluir toda a configuração do projeto executando este comando -
``` bash
php artisan migrate:refresh --seed
```
6. Rodar o servidor -
``` bash
php artisan serve
```

### Procedimentos
1. Primeiro criar uma conta de usuário
2. Login com as credencias fornecidas
