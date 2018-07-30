<?php namespace KetkzApi\Enums;


class SendStatusEnum
{
    const SENT        = 0; // "Отправлен"
    const FAILURE     = 4; // "Отказ"
    const PAID        = 5; // "Оплачен"
    const TO_SEND     = 6; // "На отправку"
    const DISAPPROVED = 7; // "Отклонено"
}