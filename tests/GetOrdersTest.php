<?php namespace KetkzApi\Test;


use KetkzApi\Builders\RequestSendOrder;
use KetkzApi\Builders\ResponseGetOrdersFail;
use KetkzApi\KetkzApi;
use KetkzApi\TransportInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GetOrdersTest extends TestCase
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
    }

    /**
     * Test Success response
     * @test
     * @throws \Exception
     */
    public function testSuccess()
    {
        $this->transport->method('send')->willReturn('{"1438775":{"id":"1438775","phone":"79017777777","fio":"Test","addr":"\u0410\u043b\u043c\u0430\u0442\u0438\u043d\u0441\u043a\u0430\u044f \u043e\u0431\u043b\u0430\u0441\u0442\u044c, \u041a\u0430\u0440\u0430\u0441\u0430\u0439\u0441\u043a\u0438\u0439 \u0440\u0430\u0439\u043e\u043d, \u0428\u0430\u043c\u0430\u043b\u0433\u0430\u043d, \u041a\u0443\u0440\u043c\u0430\u043d\u0433\u0430\u043b\u0438\u0435\u0432\u0430, 45, 0","package":"1","price":"6400","date":"2018-07-20 19:27:24","description":"test","deliv_desc":"","send_date":"0000-00-00 00:00:00","status_kz":"\u0421\u0432\u0435\u0436\u0438\u0439","send_status":6,"offer":"brutalin - 2","index":"","region":"","city":"","district":"","street":"","building":"","flat":"","date_delivery":"2020-01-25 00:00:00","other_data":"","kladr_id":"0","status":1,"kz_delivery":"AKTAU","fill_date":"0000-00-00 00:00:00","call_count":"0","kz_code":"","ext_id":"123322","deferred_date":null,"return_date":"0000-00-00 00:00:00","sale_option":"test","credit":"500","status_package":17}}');

        $data = $this->api->getOrders([1]);

        // роверяем, что данные пришли
        $this->assertTrue(is_array($data));
    }

    /**
     * Test Fail response
     * @test
     * @throws \Exception
     */
    public function testFail()
    {
        $this->transport->method('send')->willReturn('{"result":{"success":"FALSE","message":"Incorrect hash"}}');

        $data = $this->api->getOrders([1]);

        $this->assertTrue($data instanceof ResponseGetOrdersFail);
    }
}