<?php namespace KetkzApi;


use KetkzApi\Builders\RequestSendOrder;
use KetkzApi\Builders\ResponseGetOrders;
use KetkzApi\Builders\ResponseGetOrdersFail;
use KetkzApi\Builders\ResponseSendOrder;

class KetkzApi
{
    private $url = 'http://ketkz.com/api/';

    private $uid;

    private $secret;

    /**
     * @param mixed $url
     *
     * @return KetkzApi
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @var TransportInterface
     */
    private $transport;

    /**
     * KetkzApi constructor.
     *
     * @param TransportInterface $transport
     */
    public function __construct(TransportInterface $transport, string $uid, string $secret)
    {
        $this->transport = $transport;
        $this->uid       = $uid;
        $this->secret    = $secret;
    }

    /**
     * Получаем хэш для отправки данных
     *
     * @param string $data
     *
     * @return string
     */
    private function _makeHash(string $data)
    {
        return strlen($data).md5($this->uid);
    }

    /**
     * Получить строку url для API
     *
     * @param string $address
     * @param string $hash
     *
     * @return string
     */
    private function _makeUrl(string $address, string $hash)
    {
        return $this->url.$address.'?'.http_build_query([
                'hash'   => $hash,
                'uid'    => $this->uid,
                'secret' => $this->secret
            ]);
    }

    /**
     * @param RequestSendOrder $order
     *
     * @return integer
     * @throws ExceptionKetz
     */
    public function sendOrder(RequestSendOrder $order): ResponseSendOrder
    {
        $order->validate();
        $data   = json_encode((array)$order);
        $url    = $this->_makeUrl('send_order.php', $this->_makeHash($data));
        $result = $this->transport->send($url, ['data' => $data]);
        $result = json_decode($result, true);
        return new ResponseSendOrder($result['result']);
    }

    /**
     * @param integer[] $orders
     *
     * @return ResponseSendOrder[]|ResponseGetOrdersFail
     * @throws ExceptionKetz
     */
    public function getOrders(array $orders = [])
    {
        $orders = array_map(function ($order) {
            return ['id' => $order];
        }, $orders);
        $data   = json_encode((array)$orders);
        $url    = $this->_makeUrl('get_orders.php', $this->_makeHash($data));
        $result = $this->transport->send($url, ['data' => $data]);
        $result = json_decode($result, true);
        if (isset($result['result'])) {
            return new ResponseGetOrdersFail($result['result']);
        }
        $result = array_map(function ($item) {
            return new ResponseGetOrders($item);
        }, $result);
        return $result;
    }
}