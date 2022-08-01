<p align="center">
    <h1 align="center">Symfony RabbitMq</h1>
    <h2 align="center">Пример работы с брокером очередей RabbitMQ с Symfony 5.4</h2>
    <br>
</p>


ИНСТРУКЦИЯ
-------------------

1. Установка приложения:
  ~~~
    $ git clone git@github.com:PRodionovDev/SymfonyRabbitMq.git
    $ cd SymfonyRabbitMq
    $ composer install
  ~~~

2. [Установка RabbitMQ](https://losst.ru/ustanovka-rabbitmq-v-ubuntu-20-04):


3. Запуск consumer в приложении:
~~~
$ bin/console messenger:consume async -vv
~~~

4. Отправка тестового сообщения через контроллер:
~~~
URL: https://hostname/send
~~~
