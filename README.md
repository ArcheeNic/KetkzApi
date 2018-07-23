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
**Передается:** `объект RequestSendOrder`

**В ответ возвращается:** `объект ResponseSendOrder`

```php
// Пример отправки данных:
// ----------------------------

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
**Передается массив:** `массив integer` c  id заказов

> id заказа = id заказа в нашей системе который получен при отправке заказа в систему Ketkz

**В ответ возвращается:** `объект ResponseGetOrdersFail` - если ошибка или `массив из ResponseSendOrder` - если успешно

```php
// Пример отправки данных:
// ----------------------------

// готовим id заказов
$ids=[1,2];

// получаем данные
$data = $api->getOrders($ids);
```
