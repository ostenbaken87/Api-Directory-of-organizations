Инструкцию по разворачиванию:

1. git clone git@github.com:ostenbaken87/Api-Directory-of-organizations.git - склонировать проект
2. Создать .env файл из .env.example

Запустить по очереди следующие команды:

1. make init - соберет и запустит контейнеры
2. composer install - установите зависисмости
3. make keygen - сгенерирует ключ приложения
4. make migrate - накатит миграции
5. make fresh-seed - заполнит таблицы тестовыми данными

Перейти на страницу с документацией к API
1. http://localhost/api/documentation - док-ция swagger к api
2. Обязательный заголовок x-api-key = API_KEY для Authorize
3. API_KEY = ключ который вы пропишите в своем .env
