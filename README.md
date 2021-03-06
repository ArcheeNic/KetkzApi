# KETKZ API wrapper

1. [Install/Установка](#install)
2. [Start/Начало](#start)
3. [Methods/Методы](#methods)
    1. [sendOrder - Отправка заказа](#sendOrder)
    2. [getOrders - Получение статусов и данных по заказу](#getOrders)
4. [Значения полей](#fields)
    1. [Тип доставки](#deliveries)
    2. [Статусы доставки (переменная send_status)](#send_status)
    3. [Статусы посылки (переменная status_kz)](#status_kz)
    4. [Статусы подтверждения (переменная status)](#status)

## <a name="install"></a> Install/Установка
`composer require archee-nic/ketkz-api`

## <a name="start"></a> Start/Начало

1. Создаем транспорт реализующий TransportInterface

```php
// Пример транспорта c использованием Curl\Curl:
// ----------------------------

class MyTransport implements \KetkzApi\TransportInterface
{

    private $curl;

    /**
     * MyTransport constructor.
     *
     * @throws ErrorException
     */
    public function __construct()
    {
        $this->curl = new \Curl\Curl();
    }

    /**
     * @param string $url
     * @param null   $postData
     * @param array  $options
     *
     * @return string
     * @throws ErrorException
     */
    public function send($url, $postData = null, $options = [])
    {
        $this->curl->post($url,$postData);
        return $this->curl->response;
    }

    public function getHttpCode()
    {
        return $this->curl->httpStatusCode;
    }

    public function getDebugInfo()
    {
        return ['info'=>$this->curl->getInfo()];
    }

}
```

2. Вызываем в нужном нам месте

Пример:
```php
use KetkzApi;
// Иницилизируем API
$api = new KetkzApi($transport, 'uid', 'secret');
```

## <a name="methods"></a> Methods/Методы

### <a name="sendOrder"></a> sendOrder - Отправка заказа
**Передается:** `объект RequestSendOrder`

**В ответ возвращается:** `объект ResponseSendOrder`

```php
// Пример отправки данных:
// ----------------------------

// Готовим данные
$requestOrder          = new RequestSendOrder();
$requestOrder->phone   = '79017777777';
$requestOrder->country = 'kz';
$requestOrder->offer   = 'brutalin - 2';
$requestOrder->secret  = '1';

// получаем данные
$data = $api->sendOrder($requestOrder);
```

### <a name="getOrders"></a> getOrders - Получение статусов и данных по заказу
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

## <a name="fields"></a> Значения полей
Все значения статусов представлены в [KetkzApi\Enums](./src/Enums)

### <a name="deliveries"></a> Тип доставки
Также представлен в Enum классе [KetkzApi\Enums\KzDeliveryEnum](./src/Enums/KzDeliveryEnum.php)
```
------ Казахстан
1    =>'AKSAI',
2    =>'AKTAU',
3    =>'AKTOBE',
4    =>'ALMATA',
5    =>'ASTANA-KURER',
6    =>'ATYRAU',
8    =>'Beineu',
9    =>'EKIBASTUZ',
10    =>'KARAGANDA',
11    =>'KOKSHETAU',
12    =>'KOSTANAI',
13    =>'KYLSARY',
14    =>'KYZYLORDA',
15    =>'PAVLODAR',
16    =>'PETROPAVLOVSK',
18    =>'RUDNYI',
19    =>'Saryagash',
20    =>'SATPAEV',
21    =>'SEMEI',
22    =>'SHIMKENT',
23    =>'TALDYKORGAN',
24    =>'TARAZ',
25    =>'TEMIRTAU',
26    =>'TURKESTAN',
27    =>'URALSK',
28    =>'UST-KAMENOGORSK',
29    =>'ZHANAOZEN',
30    =>'Zhetysai',
31    =>'ZHEZKAZGAN',
56    => 'KAPSHAGAI',
86    => 'Hromtau',
87    => 'Kandagash',
88    => 'Kaskelen',
89    => 'Uzynagash',
90    => 'Talgar',
91    => 'Balkhash',
93    => 'Kentau',
94    => 'Shieli',
95    => 'Zharkent',
96    => 'Zhanakorgan',
97    => 'Merke',

32 => 'Почта',
142 => 'Shamalgan',
143 => 'Esik',
144 => 'Toretam',

146 => 'Shu',
147 => 'Arys'

------ Киргизия
34 => 'Бишкек курьер',
35 => 'Каракол курьер',
36 => 'Ош курьер',
37 => 'Нарын курьер',
38 => 'Кызыл-Кия курьер',
39 => 'Баткен курьер',
40 => 'Талас курьер',
41 => 'Карабалта курьер',
42 => 'Токмок курьер',
43 => 'Джалал-Абад курьер',
44 => 'Узген',
45 => 'Сокулык Почта',
46 => 'Базаркоргон Почта',
47 => 'Кант Почта',
48 => 'Балыкчи курьер',
49 => 'Новопокровка Почта',
50 => 'Ивановка Почта',
51 => 'Ноокат Почта',
52 => 'Новопавловка курьер',
53 => 'Чолпон Почта',
54 => 'Бостари Почта',
55 => 'Беловодское Почта',
58 => 'Карасу курьер',

66 => 'Кемин Почта',

68 => 'Сузак Почта',
69 => 'Массы Почта',
70 => 'Кочкор ата Почта',
75 => 'Араван Почта',
79 => 'Сулюкта почта',
80 => 'Исфана курьер',
81 => 'Кочкорка почта',
82 => 'Таш-Кумыр курьер',
83 => 'Токтогул почта',
84 => 'Каракуль почта',
85 => 'Майлуу-Суу почта',


------ Армения
61 => 'Почта АРМ',
62 => 'Ереван курьер'

------ Россия
107 => 'Новосибирск',
108 => 'Омск',
135 => 'Бердск',
136 => 'Искитим',
137 => 'Куйбышев',
138 => 'Линево',
139 => 'Калачинск',
140 => 'Москаленки',
141 => 'Тара',
148 => 'Екатеринбург'
149 => 'Каменск-Уральский',
150 => 'Лесной',
151 => 'Новоуральск',
152 => 'Серов',
153 => 'Исилькуль'
```

### <a name="send_status"></a> Статусы доставки (переменная send_status)
Также представлен в Enum классе [KetkzApi\Enums\SendStatusEnum](./src/Enums/SendStatusEnum.php)
```
"0" "Отправлен"
"4" "Отказ"
"5" "Оплачен"
"6" "На отправку"
"7" "Отклонено"
```

### <a name="status_kz"></a> Статусы посылки (переменная status_kz)
Также представлен в Enum классе [KetkzApi\Enums\StatusKzEnum](./src/Enums/StatusKzEnum.php)
```
"0" "Обработка"
"1" "Отложенная доставка"
"2" "На доставку"
"4" "Упакован на почте"
"5" "Заберет"
"6" "Упакован"
"7" "Хранение"
"8" "Упакован принят"
"9" "Обратная доставка отправлена"
"10" "Груз вручен"
"11" "Груз в дороге"
"13" "Получен"
"15" "Располовинен"
"14" "Нет товара"
"16" "Проверен"
"17" "Свежий"
"18" "Автоответчик"
"19" "Перезвонить"
"20" "Сделать замену"
"21" "Возврат денег"
"22" "На контроль"
"23" "Упакован добавочный"
"24" "Частичный возврат"
```

### <a name="status"></a> Статусы подтверждения (переменная status)
Также представлен в Enum классе [KetkzApi\Enums\StatusEnum](./src/Enums/StatusEnum.php)
```
"0" "новая"
"1" "Подтвержден"
"2" "Отменён"
"3" "Перезвонить"
"4" "Недозвон"
"5" "Брак"
"6" "Уже получил заказ"
"7" "Черный список"
"8" "Заказано у конкурентов"
"10" "недозвон_ночь"
"11" "Предварительно подтвержден"
```