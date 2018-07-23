<?php namespace KetkzApi\Builders;

use KetkzApi\ExceptionKetz;

/**
 * Данные для отправки в SendOrder
 * Class RequestSendOrder
 *
 * @package KetkzApi\Builders
 */
class RequestSendOrder extends BuilderAbstract
{
    public $phone;          // номер телефона заказчика товара (* Обязательное поле)
    public $price;          // стоимость товара
    public $order_id;       // ID заявки для синхронизации
    public $name;           // Имя клиента
    public $country;        // двухбуквенный (ISO 3166-1 alpha-2) код страны в нижнем регистре (* Обязательное поле)
    public $index;          // индекс почтового отделения клиента
    public $addr;           // адрес - Область, район, населённые пункт, улица
    public $status;         // если заказ требует прозвона  => "5"
    public $kz_delivery;    // тип доставки / без этого поля будет проставлена доставка почтой
    public $offer;          // наименование товара (* Обязательное поле)
    public $secret;         // ключ API (* Обязательное поле)
    public $description;    // комментарий к заказу
    public $is_dvd;         // доставка заказа День в день
    public $date_delivery;  // желательная дата доставки заказа,
    public $sale_option;    // свойства товара

    /**
     * Проверяет данные на корректность
     *
     * @throws ExceptionKetz
     */
    public function validate()
    {
        if (!$this->phone) {
            throw new ExceptionKetz(__CLASS__.' required field "phone" is empty');
        }
        if (!$this->secret) {
            throw new ExceptionKetz(__CLASS__.' required field "secret" is empty');
        }
        if (!$this->secret) {
            throw new ExceptionKetz(__CLASS__.' required field "offer" is empty');
        }
    }
}