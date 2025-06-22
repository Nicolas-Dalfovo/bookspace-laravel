# BookSpace - Catálogo Pessoal de Leitura

## Descrição

O **BookSpace** é uma aplicação web desenvolvida em Laravel que permite aos usuários gerenciar seu catálogo pessoal de livros. A aplicação oferece funcionalidades completas de CRUD (Create, Read, Update, Delete) para livros e categorias, além de recursos de busca, filtros e uma interface moderna e responsiva.

## Funcionalidades Implementadas

### ✅ Requisitos Atendidos

1. **Laravel + Banco de Dados (2 pt)**
   - Projeto desenvolvido em Laravel 10
   - Banco de dados SQLite configurado
   - Migrations e seeders implementados

2. **CRUD 2 Tabelas (2 pt)**
   - **Tabela Categories**: CRUD completo para categorias de livros
   - **Tabela Books**: CRUD completo para livros

3. **Relacionamento entre Tabelas (1 pt)**
   - Relacionamento One-to-Many entre Categories e Books
   - Cada livro pertence a uma categoria
   - Uma categoria pode ter vários livros

4. **Busca/Filtro (1 pt)**
   - Busca por título ou autor do livro
   - Filtro por categoria
   - Filtro por status de leitura (Quero Ler, Lendo, Lido)

5. **Menu de Navegação (1 pt)**
   - Navbar responsiva com Bootstrap
   - Links para Dashboard, Livros e Categorias
   - Dropdown para adicionar novos itens

6. **Layout Atraente (1 pt)**
   - Design moderno com gradientes e efeitos visuais
   - Bootstrap 5 integrado
   - Ícones Bootstrap Icons
   - Cards com hover effects
   - Layout responsivo

7. **Templates Blade (1 pt)**
   - Layout principal reutilizável (`layouts/app.blade.php`)
   - Partial para navbar (`partials/navbar.blade.php`)
   - Templates específicos para cada funcionalidade
   - Herança e reutilização de código

## Estrutura do Projeto

### Models
- **Category**: Modelo para categorias com relacionamento hasMany para books
- **Book**: Modelo para livros com relacionamento belongsTo para category

### Controllers
- **DashboardController**: Página inicial com estatísticas
- **CategoryController**: CRUD completo para categorias
- **BookController**: CRUD completo para livros com busca e filtros

### Views
- **Dashboard**: Página inicial com resumo e estatísticas
- **Categories**: Index, create, edit, show
- **Books**: Index, create, edit, show com funcionalidades de busca

### Banco de Dados

#### Tabela Categories
- `id`: Chave primária
- `name`: Nome da categoria (único)
- `description`: Descrição da categoria
- `timestamps`: Created_at e updated_at

#### Tabela Books
- `id`: Chave primária
- `title`: Título do livro
- `author`: Autor do livro
- `description`: Descrição/resumo do livro
- `cover_image_url`: URL da capa do livro
- `status`: Status de leitura (want_to_read, reading, read)
- `category_id`: Chave estrangeira para categories
- `timestamps`: Created_at e updated_at

## Funcionalidades Especiais

### Dashboard
- Estatísticas gerais (total de livros, categorias, livros lidos)
- Lista de livros sendo lidos atualmente
- Últimos livros adicionados
- Ações rápidas para adicionar novos itens

### Sistema de Status
- **Quero Ler**: Livros na lista de desejos
- **Lendo**: Livros em progresso
- **Lido**: Livros concluídos

### Busca e Filtros
- Busca textual por título ou autor
- Filtro por categoria
- Filtro por status de leitura
- Combinação de múltiplos filtros

### Interface Responsiva
- Design adaptável para desktop e mobile
- Cards com hover effects
- Gradientes e efeitos visuais modernos
- Navegação intuitiva

## Dados de Exemplo

A aplicação vem com dados de exemplo pré-carregados:

### Categorias
- Romance
- Ficção Científica
- Fantasia
- Mistério/Suspense
- Biografia
- Autoajuda
- Técnico/Programação
- História

### Livros
- O Senhor dos Anéis: A Sociedade do Anel (Fantasia)
- Duna (Ficção Científica)
- Clean Code (Técnico/Programação)
- O Assassinato no Expresso do Oriente (Mistério/Suspense)
- Steve Jobs (Biografia)
- Orgulho e Preconceito (Romance)
- Sapiens (História)
- Hábitos Atômicos (Autoajuda)

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

