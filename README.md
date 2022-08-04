<p align="center">
    <h1 align="center">Symfony RabbitMq</h1>
    <h2 align="center">Консольное приложение для рассылки уведомлений по Email</h2>
    <h3 align="center">Пример работы с брокером очередей RabbitMQ с Symfony 5.4</h3>
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
  необходимо клонировать файл конфигурации .env в .env.local и отредактировать параметры `DATABASE_URL, MAILER_DSN, MAILER_FROM`.
  ~~~
    $ bin/console doctrine:migrations:migrate
  ~~~

2. [Установка RabbitMQ](https://losst.ru/ustanovka-rabbitmq-v-ubuntu-20-04):


3. Запуск consumer в приложении:
~~~
$ bin/console messenger:consume async -vv
~~~

4. Отправление рассылки сообщений:
~~~
    $ bin/console app:notification "тема письма" "текст сообщения"
~~~
