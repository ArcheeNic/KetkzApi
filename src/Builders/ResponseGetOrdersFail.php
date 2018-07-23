<?php
/**
 * Created by PhpStorm.
 * User: kasim
 * Date: 20.07.2018
 * Time: 16:29
 */

namespace KetkzApi\Builders;

class ResponseGetOrdersFail extends BuilderAbstract
{
    public $success;
    public $message;


    /**
     * ResponseSendOrder constructor.
     *
     * @param array $fields
     *
     * @throws ExceptionKetz
     */
    public function __construct(array $fields = [])
    {
        parent::__construct($fields);
        $this->validate();
    }

    public function validate()
    {
        if ($this->success === null) {
            throw new ExceptionKetz(__CLASS__.' field "success" is undefined');
        }
        if ($this->success!=='FALSE') {
            throw new ExceptionKetz(__CLASS__.' field "success" expects one of the following value "FALSE"');
        }
        if ($this->message === null) {
            throw new ExceptionKetz(__CLASS__.' field "message" is undefined');
        }
    }
}