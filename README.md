# CSPosts

Este sistema foi desenvolvido utilizando laravel e serve como base para sistemas
single page application (SPA);

Para downlad do pacote:

```shell script
$ git clone git@github.com:devLopez/csplus-frontend-test.git
```

Após realizar a instalação das dependências devemos fazer os seguinte passos
```shell script
# Criamos um arquivo de environment
$ cp .env.example .env

# Executamos a instalação das dependências
$ composer install

# Criamos a chave do laravel
$ php artisan key:generate

# Criamos a chave do JWT
$ php artisan jwt:secret

# Criamos um banco de dados
$ touch database/database.sqlite

# Executamos as migrations
$ php artisan migrate --step

# Populamos o banco de dados com dados fake
# O seed não precisa ser executado mais de uma vez
$ php artisan db:seed

# Opcional, caso esteja instalando em um ambiente com Apache,
# não precisa executar este passo
# Executamos o servidor builtin do PHP
$ php artisan serve
```

#### Acessando a documentação
Para acessar a documentação, basta acessar o endereço definido na *virtualhost* do
apache (dominio.test ou qualquer outra coisa), ou se estiver utilizando o server
embutido do PHP, localhost:8000, /swagger para ter acesso à documentação de endpoints
da API.

Recomendo, em caso de utilização com windows, o servidor Laragon, que foi feito
especialmente para se trabalhar com Laravel neste sistema operacional

https://laragon.org/