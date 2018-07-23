<?php namespace KetkzApi\Builders;

use KetkzApi\ExceptionKetz;

/**
 * Ответ от SendOrder
 * Class ResponseSendOrder
 *
 * @package KetkzApi\Builders
 */
class ResponseSendOrder extends BuilderAbstract
{
    public $success;
    public $message;
    public $id;


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
        if (!in_array($this->success, ['TRUE', 'FALSE'])) {
            throw new ExceptionKetz(__CLASS__.' field "success" expects one of the following values: "TRUE","FALSE"');
        }
        if ($this->message === null) {
            throw new ExceptionKetz(__CLASS__.' field "message" is undefined');
        }
        if ($this->success === 'TRUE' && $this->id === null) {
            throw new ExceptionKetz(__CLASS__.' at the status of the answer "TRUE" - not received id');
        }
    }
}