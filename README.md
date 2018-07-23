# KETKZ API wrapper

## Install/Установка
`composer require archee-nic/ketkz-api`

## Start/Начало

1. Создаем транспорт реализующий TransportInterface
2. Вызываем в нужном нам месте

Пример:
```php
use KetkzApi;
// Иницилизируем API
$api = new KetkzApi($transport, 'uid', 'secret');
```

## Methods/Методы

### sendOrder - Отправка заказа
Передается объект RequestSendOrder

В ответ возвращается ResponseSendOrder

Пример отправки данных:
```php
// Готовим данные
$requestOrder          = new RequestSendOrder();
$requestOrder->phone   = '+7 777 777 77 77';
$requestOrder->country = 'kz';
$requestOrder->offer   = 'brutalin - 2';
$requestOrder->secret  = '1';

// получаем данные
$data = $api->sendOrder($requestOrder);
```

### getOrders - Получение статусов и данных по заказу
Передается массив с id заказов

> id заказа = id заказа в нашей системе который получен при отправке заказа в систему Ketkz

В ответ возвращается: ResponseGetOrdersFail - если ошибка и массив из ResponseSendOrder - если успешно

```php
// готовим id заказов
$ids=[1,2];

// получаем данные
$data = $api->getOrders($ids);
```
