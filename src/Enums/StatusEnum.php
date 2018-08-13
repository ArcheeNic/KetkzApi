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
        self::NEW                       => 'новая',
        self::CONFIRMED                 => 'Подтвержден',
        self::CANCELED                  => 'Отменён',
        self::CALL_BACK                 => 'Перезвонить',
        self::NEDOCHVON                 => 'Недозвон',
        self::MARRIAGE                  => 'Брак',
        self::ALREADY_RECEIVED_AN_ORDER => 'Уже получил заказ',
        self::BLACK_LIST                => 'Черный список',
        self::ORDERED_FROM_COMPETITORS  => 'Заказано у конкурентов',
        self::CALL_FAIL_OVERNIGHT       => 'недозвон_ночь',
        self::PRE_CONFIRMED             => 'Предварительно подтвержден',
    ];
}
