<?php namespace KetkzApi\Test;


use KetkzApi\Builders\RequestSendOrder;
use KetkzApi\Builders\ResponseSendOrder;
use KetkzApi\KetkzApi;
use KetkzApi\TransportInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class SendOrderTest extends TestCase
{
    /**
     * @var TransportInterface|MockObject
     */
    private $transport;
    /**
     * @var KetkzApi
     */
    private $api;

    /**
     * @var RequestSendOrder
     */
    private $requestOrder;

    /**
     * setUP function
     */
    public function setUp()
    {
        // готовим транспорт
        $this->transport = $this->getMockBuilder(TransportInterface::class)
            ->setMethods(['send', 'getHttpCode', 'getDebugInfo'])
            ->getMock();
        $this->transport->method('getHttpCode')->willReturn(200);

        // инициализируем API
        $this->api = new KetkzApi($this->transport, 'uid', 'secret');

        //готовим данные
        $requestOrder          = new RequestSendOrder();
        $requestOrder->phone   = '+7 777 777 77 77';
        $requestOrder->country = 'kz';
        $requestOrder->offer   = 'brutalin - 2';
        $requestOrder->secret  = '1';
        $this->requestOrder    = $requestOrder;
    }

    /**
     * Test Success response
     * @test
     * @throws \Exception
     */
    public function testSuccess()
    {

        $this->transport->method('send')->willReturn('{"result":{"success":"TRUE","message":"200 OK","id":"1234"}}');

        $data = $this->api->sendOrder($this->requestOrder);

        // роверяем, что данные пришли
        $this->assertTrue($data instanceof ResponseSendOrder);
    }

    /**
     * Test Fail response
     * @test
     * @throws \Exception
     */
    public function testFail()
    {
        $this->transport->method('send')->willReturn('{"result":{"success":"FALSE","message":"Incorrect hash"}}');

        $data = $this->api->sendOrder($this->requestOrder);

        $this->assertTrue($data instanceof ResponseSendOrder);
    }
}