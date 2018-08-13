<?php namespace KetkzApi\Enums;


class StatusKzEnum extends Enum
{
    const TREATMENT            = 0; //   "Обработка"
    const DELAYED_DELIVERY     = 1; //   "Отложенная доставка"
    const FOR_DELIVERY         = 2; //   "На доставку"
    const PACKED_IN_THE_MAIL   = 4; //   "Упакован на почте"
    const WILL_TAKE_AWAY       = 5; //   "Заберет"
    const PACKED               = 6; //   "Упакован"
    const STORAGE              = 7; //   "Хранение"
    const PACKAGED_ACCEPTED    = 8; //   "Упакован принят"
    const RETURN_SHIPPING_SENT = 9; //   "Обратная доставка отправлена"
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


    static $statusNames
        = [
            self::TREATMENT            => 'Обработка',
            self::DELAYED_DELIVERY     => 'Отложенная доставка',
            self::FOR_DELIVERY         => 'На доставку',
            self::PACKED_IN_THE_MAIL   => 'Упакован на почте',
            self::WILL_TAKE_AWAY       => 'Заберет',
            self::PACKED               => 'Упакован',
            self::STORAGE              => 'Хранение',
            self::PACKAGED_ACCEPTED    => 'Упакован принят',
            self::RETURN_SHIPPING_SENT => 'Обратная доставка отправлена',
            self::CARGO_DELIVERED      => 'Груз вручен',
            self::CARGO_ON_THE_ROAD    => 'Груз в дороге',
            self::RECEIVED             => 'Получен',
            self::RAZLILINEN           => 'Располовинен',
            self::NO_PRODUCTS          => 'Нет товара',
            self::VERIFIED             => 'Проверен',
            self::FRESH                => 'Свежий',
            self::AUTORESPONDER        => 'Автоответчик',
            self::CALL_BACK            => 'Перезвонить',
            self::MAKE_A_REPLACEMENT   => 'Сделать замену',
            self::REFUND               => 'Возврат денег',
            self::TO_CONTROL           => 'На контроль',
            self::EXTRA_PACKAGED       => 'Упакован добавочный',
            self::PARTIAL_RETURN       => 'Частичный возврат',
        ];

}


