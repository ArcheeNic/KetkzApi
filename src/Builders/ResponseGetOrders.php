<?php
/**
 * Created by PhpStorm.
 * User: kasim
 * Date: 20.07.2018
 * Time: 16:40
 */

namespace KetkzApi\Builders;


class ResponseGetOrders extends BuilderAbstract
{
    public $id; // ketkz id
    public $phone; // номер телефона заказчика товара
    public $fio; // Имя клиента
    public $addr; // адрес - Область, район, населённые пункт, улица
    public $description; // комментарий к заказу
    public $date_delivery; // желательная дата доставки заказа,
    public $sale_option; // свойства товара
    public $kz_delivery; // тип доставки / без этого поля будет проставлена доставка почтой
    public $index; // индекс почтового отделения клиента
    public $ext_id; // ID заявки для синхронизации
    public $price; // стоимость товара

    /**
     * @var integer|string $status_kz Статусы посылки
     *          "0" "Обработка"
     *          "1" "Отложенная доставка"
     *          "2" "На доставку"
     *          "4" "Упакован на почте"
     *          "5" "Заберет"
     *          "6" "Упакован"
     *          "7" "Хранение"
     *          "8" "Упакован принят"
     *          "9" "Обратная доставка отправлена"
     *          "10" "Груз вручен"
     *          "11" "Груз в дороге"
     *          "13" "Получен"
     *          "15" "Располовинен"
     *          "14" "Нет товара"
     *          "16" "Проверен"
     *          "17" "Свежий"
     *          "18" "Автоответчик"
     *          "19" "Перезвонить"
     *          "20" "Сделать замену"
     *          "21" "Возврат денег"
     *          "22" "На контроль"
     *          "23" "Упакован добавочный"
     *          "24" "Частичный возврат"
     */
    public $status_kz;

    /**
     * @var $send_status - Статусы доставки
     *          "0" "Отправлен"
     *          "4" "Отказ"
     *          "5" "Оплачен"
     *          "6" "На отправку"
     *          "7" "Отклонено"
     */
    public $send_status;

    /**
     * @var string $offer Наименование товара
     *          при доп товаре, "brutalin – 2, oko_plus – 1, alkoprost - 5" (шаблон: {тех. название} - {количество},
     *          {тех. название} - {количество}, ... тех. название товаров согласовываются с менеджером тех. название
     *          товара не должно иметь пробелы и другие спец. символы
     */
    public $offer; //

    /**
     * @var string|integer $status Статусы подтверждения (переменная status)
     *
     *    "0" "новая"
     *    "1" "Подтвержден"
     *    "2" "Отменён"
     *    "3" "Перезвонить"
     *    "4" "Недозвон"
     *    "5" "Брак"
     *    "6" "Уже получил заказ"
     *    "7" "Черный список"
     *    "8" "Заказано у конкурентов"
     *    "10" "недозвон_ночь"
     *    "11" "Предварительно подтвержден"
     */
    public $status;

    public $package;
    public $date;
    public $deliv_desc;
    public $send_date;
    public $region;
    public $city;
    public $district;
    public $street;
    public $building;
    public $flat;
    public $other_data;
    public $kladr_id;
    public $fill_date;
    public $call_count;
    public $kz_code;
    public $deferred_date;
    public $return_date;
    public $credit;
    public $status_package;

    public function validate() { }
}