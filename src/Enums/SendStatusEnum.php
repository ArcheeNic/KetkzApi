<?php namespace KetkzApi\Enums;


class SendStatusEnum extends Enum
{
    const SENT        = 0; // "Отправлен"
    const FAILURE     = 4; // "Отказ"
    const PAID        = 5; // "Оплачен"
    const TO_SEND     = 6; // "На отправку"
    const DISAPPROVED = 7; // "Отклонено"

    static $statusNames = [
        'Отправлен'   => self::SENT,
        'Отказ'       => self::FAILURE,
        'Оплачен'     => self::PAID,
        'На отправку' => self::TO_SEND,
        'Отклонено'   => self::DISAPPROVED,
    ];
}