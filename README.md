# Ecommerce Simples

## Sobre

Um aplicação simples de um sistema ecommerce com integração com o pagbank


## Projeto

O projeto utiliza dos seguintes recursos:

    
*  **PHP** : utilizado o PHP 8.0.25
     
    * Download [última versão](https://www.php.net/downloads.php)


*  **Laravel Framework** : utilizado Laravel Framework 9.46.0
     
    * Download [última versão](https://laravel.com/docs/9.x/installation)
    
    
*  **MySQL** : utilizado Utilizando Distribuição 10.4.27-MariaDB
     
    * Download [última versão](https://dev.mysql.com/downloads/installer/)
    
    

## Clone e execução

Para utilizar o sistema é necessário seguir algumas etapas:

  1. Clonar o repositório na sua máquina local  e instalar as dependências.


```
git https://github.com/RToramaru/simple-ecommerce.git

cd simple-ecommerce

composer install


```
  
   2. Criar uma copia do arquivo .env.
    

```
copy .env.example .env

```

   3. Gere uma chave de criptografia de aplicativo.
    

```
php artisan key:generate

```

   4. Crie o banco de dados.
    
```
php artisan migrate

```

   5. Criar conta no PagSeguro através do link [PagSeguro](https://dev.pagseguro.uol.com.br/)
   
   
   6. Configurar o arquivo ``.env`` alterando os campos ``PAG_SEGURO_EMAIL`` e ``PAG_SEGURO_TOKEN``.
   disponíveis na conta do sandbox link  [sandbox](https://acesso.pagseguro.uol.com.br/sandbox) 
  

   7. Inicie o servidor.
    
```
php artisan serve 

```  


  
## Utilização

Para utilizar o sistema é necessário acessar o servidor disponibilizado.


## Demonstração





https://user-images.githubusercontent.com/42619833/215106131-62b3ee1e-a423-46f2-8b4c-6780592aaa4d.mp4




``@author Rafael Almeida``
