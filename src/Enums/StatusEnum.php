<?php namespace KetkzApi\Enums;


class StatusEnum extends Enum
{
    const NEW                       = "0"; // "новая"
    const CONFIRMED                 = "1"; // "Подтвержден"
    const CANCELED                  = "2"; // "Отменён"
    const CALL_BACK                 = "3"; // "Перезвонить"
    const NEDOCHVON                 = "4"; // "Недозвон"
    const MARRIAGE                  = "5"; // "Брак"
    const ALREADY_RECEIVED_AN_ORDER = "6"; // "Уже получил заказ"
    const BLACK_LIST                = "7"; // "Черный список"
    const ORDERED_FROM_COMPETITORS  = "8"; // "Заказано у конкурентов"
    const CALL_FAIL_OVERNIGHT       = "10"; //  "недозвон_ночь"
    const PRE_CONFIRMED             = "11"; //  "Предварительно подтвержден"

    static $statusNames = [
        'новая'                      => self::NEW,
        'Подтвержден'                => self::CONFIRMED,
        'Отменён'                    => self::CANCELED,
        'Перезвонить'                => self::CALL_BACK,
        'Недозвон'                   => self::NEDOCHVON,
        'Брак'                       => self::MARRIAGE,
        'Уже получил заказ'          => self::ALREADY_RECEIVED_AN_ORDER,
        'Черный список'              => self::BLACK_LIST,
        'Заказано у конкурентов'     => self::ORDERED_FROM_COMPETITORS,
        'недозвон_ночь'              => self::CALL_FAIL_OVERNIGHT,
        'Предварительно подтвержден' => self::PRE_CONFIRMED,
    ];
}
