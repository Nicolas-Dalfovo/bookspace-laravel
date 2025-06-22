# BookSpace - Catálogo Pessoal de Leitura

## Como Executar

1. **Instalar dependências**:
   ```bash
   composer install
   ```

2. **Configurar ambiente**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configurar banco de dados**:
   ```bash
   touch database/database.sqlite
   ```

4. **Executar migrations e seeders**:
   ```bash
   php artisan migrate --seed
   ```

5. **Iniciar servidor**:
   ```bash
   php artisan serve
   ```

6. **Acessar aplicação**:
   - URL: http://localhost:8000

## Tecnologias Utilizadas

- **Backend**: Laravel 10, PHP 8.1
- **Frontend**: Blade Templates, Bootstrap 5, Bootstrap Icons
- **Banco de Dados**: SQLite
- **Estilização**: CSS customizado com gradientes e efeitos
- **Responsividade**: Bootstrap Grid System

## Arquitetura MVC

A aplicação segue rigorosamente o padrão MVC (Model-View-Controller):

- **Models**: Representam os dados e regras de negócio
- **Views**: Interface do usuário com templates Blade
- **Controllers**: Lógica de controle e intermediação

## Validações

- Validação de formulários no backend
- Campos obrigatórios marcados
- Validação de URLs para capas de livros
- Prevenção de exclusão de categorias com livros

## Conclusão

O BookSpace atende a todos os requisitos solicitados, oferecendo uma experiência completa de gerenciamento de catálogo pessoal de livros com interface moderna, funcionalidades robustas e código bem estruturado seguindo as melhores práticas do Laravel.

