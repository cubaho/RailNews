Postup:
V kořenu adresáře spustit příkazy
  1) docker-compose -f docker-compose.yaml up
  2) php -S localhost:8000 -t www

Poté se musí v konzoli databáze spustit soubory
  database/tables.sql
  database/data.sql

Databáze běží na mysql://localhost:3306 a heslo a uživatel je admin, admin viz config/neon.
