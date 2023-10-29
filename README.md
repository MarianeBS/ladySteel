PARA CONTINUAR DESENVOLVENDO:

- Instale o projeto
- Abra o CMD
- cd '<pasta_do_projeto>'
- composer install
- npm install
- NÃO É MAIS NECESSÁRIO CLONAR O .ENV.EXAMPLE, TIREI DO GIT IGNORE
- php artisan migrate:fresh --seed ou php artisan migrate --seed
- npm run dev
- php artisan serve
- acessar: http://127.0.0.1:8000
- Pronto

CASO DE ERRO NA HORA DE EXECUTAR O MIGRATE:
- Apague a base de dados 'ladysteel_bd' do seu localhost
- php artisan migrate --seed

COMANDOS ÚTEIS:
- php artisan key:generate - error 500
- php artisan make:Model -cmsr - criar model, controller, migration e seeder com estrutura de uma entidade
- php artisan cache:clear - limpar cache do laravel
