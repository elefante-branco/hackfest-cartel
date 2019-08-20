## Deploy

O primeiro passo é instalar o composer.


```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

Depois, basta instalar os pacotes

```
composer install
```

E então configurar o banco pelo .env e inicializá-lo:

```
php artisan migrate --seed
```

Agora está tudo pronto para iniciar o servidor:

``` 
php artisan serve
```
