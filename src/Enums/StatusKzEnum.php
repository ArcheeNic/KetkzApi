<?php namespace KetkzApi\Enums;


class StatusKzEnum
{
    const TREATMENT            = 0; // "Обработка"
    const DELAYED_DELIVERY     = 1; // "Отложенная доставка"
    const FOR_DELIVERY         = 2; // "На доставку"
    const PACKED_IN_THE_MAIL   = 4; // "Упакован на почте"
    const WILL_TAKE_AWAY       = 5; // "Заберет"
    const PACKED               = 6; // "Упакован"
    const STORAGE              = 7; // "Хранение"
    const PACKAGED_ACCEPTED    = 8; // "Упакован принят"
    const RETURN_SHIPPING_SENT = 9; // "Обратная доставка отправлена"
    const CARGO_DELIVERED      = 10; //  "Груз вручен"
    const CARGO_ON_THE_ROAD    = 11; //  "Груз в дороге"
    const RECEIVED             = 13; //  "Получен"
    const RAZLILINEN           = 15; //  "Располовинен"
    const NO_PRODUCTS          = 14; //  "Нет товара"
    const VERIFIED             = 16; //  "Проверен"
    const FRESH                = 17; //  "Свежий"
    const AUTORESPONDER        = 18; //  "Автоответчик"
    const CALL_BACK            = 19; //  "Перезвонить"
    const MAKE_A_REPLACEMENT   = 20; //  "Сделать замену"
    const REFUND               = 21; //  "Возврат денег"
    const TO_CONTROL           = 22; //  "На контроль"
    const EXTRA_PACKAGED       = 23; //  "Упакован добавочный"
    const PARTIAL_RETURN       = 24; //  "Частичный возврат"
}


