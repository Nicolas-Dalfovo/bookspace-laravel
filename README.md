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
