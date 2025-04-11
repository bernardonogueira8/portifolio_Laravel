# Integração e Deploy com Coolify

Este projeto está configurado para deploy no Coolify, uma plataforma que facilita a entrega e o gerenciamento de aplicações. Certifique-se de configurar as variáveis de ambiente corretamente no Coolify antes de realizar o deploy.

## Tecnologias Usadas

-   **Laravel 11**: Framework PHP utilizado para a estrutura backend do sistema.
-   **Filament 3**: Pacote para geração de painéis administrativos rápidos e eficientes.
-   **PostgreSQL**: Banco de dados utilizado para armazenar as informações das unidades de saúde.

## Plugins Instalado

-   **[`bezhansalleh/filament-shield`](https://github.com/bezhanSalleh/filament-shield)**
    -   Gerenciamento de permissões e autenticação com controle baseado em funções (RBAC).
-   **[`joaopaulolndev/filament-edit-profile`](https://github.com/joaopaulolndev/filament-edit-profile)**

    -   Funcionalidade para edição de perfil de usuário no painel administrativo.

-   **[`leandrocfe/filament-apex-charts`](https://github.com/LeandroCFE/filament-apex-charts)**

    -   Integração de gráficos Apex Charts no painel do Filament para visualizações de dados.

-   **[`leandrocfe/filament-ptbr-form-fields`](https://github.com/LeandroCFE/filament-ptbr-form-fields)**

    -   Tradução e personalização de campos de formulário para português brasileiro.

-   **[`pxlrbt/filament-excel`](https://github.com/pxlrbt/filament-excel)**

    -   Exportação e importação de dados em arquivos Excel no painel administrativo.

-   **[`joshembling/image-optimizer`](https://github.com/Joshembling/image-optimizer)**

    -   Otimização de imagens enviadas ao sistema.

-   **[`rmsramos/activitylog`](https://github.com/spatie/laravel-activitylog)**
    -   Registro de logs de atividades do usuário.

## Requisitos

-   PHP 8.1 ou superior
-   Composer
-   Banco de dados PostgreSQL
-   Node.js e NPM (para compilar os assets com Laravel Mix)

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/Samuraiflamesf/Laravel-Filament_3-Coolify.git
    ```

2. Entre no diretório do projeto:

    ```bash
    cd portifolio_Laravel
    ```

3. Instale as dependências do PHP:

    ```bash
    composer install
    ```

4. Instale as dependências do NPM:

    ```bash
    npm install
    ```

5. Copie o arquivo `.env.example` para `.env` e configure suas credenciais de banco de dados e outras variáveis de ambiente:

    ```bash
    cp .env.example .env
    ```

6. Gere a chave da aplicação:

    ```bash
    php artisan key:generate
    ```

7. Execute as migrações para criar as tabelas necessárias no banco de dados:

    ```bash
    php artisan migrate
    php artisan storage:link
    ```

8. Compile os assets do frontend:

    ```bash
    npm run dev
    ```

9. Inicie o servidor local:

    ```bash
    php artisan serve
    ```

10. Acesse o sistema no navegador:

    ```
    http://localhost:8000
    ```

## Acesso ao Painel Administrativo

O painel administrativo é acessível via a rota `/admin`. Para criar um usuário administrador, siga os passos abaixo:

1. Crie um novo usuário administrador usando o Tinker do Laravel:

    ```bash
    php artisan tinker
    ```

2. No Tinker, execute o seguinte comando para criar um usuário:

    ```php
    \App\Models\User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'is_admin' => true,
    ]);
    ```

3. Agora, você pode acessar o painel em:

    ```
    http://localhost:8000/admin
    ```

## Personalização

Se você precisar alterar a rota do painel administrativo, edite o arquivo `config/filament.php` e ajuste o valor da chave `path`:

```php
'path' => 'admin',
```

## Contribuição

1. Faça um fork do repositório.
2. Crie uma branch para sua feature (git checkout -b feature/nova-feature).
3. Commit suas alterações (git commit -am 'Adiciona nova feature').
4. Faça o push para a branch (git push origin feature/nova-feature).
5. Abra um Pull Request.

## Licença

Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE para mais informações.
