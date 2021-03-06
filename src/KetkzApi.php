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
        $hash_str = strlen($data).md5($this->uid);
        return $hash = hash("sha256", $hash_str);
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
                'uid'  => $this->uid,
                's'    => $this->secret,
                'hash' => $hash,
            ]);
    }

    /**
     * @param string $uri
     * @param string $response
     *
     * @return array
     * @throws ExceptionKetz
     */
    private function _send(string $url, array $request): array
    {
        $response = $this->transport->send($url, $request);
        $resultDecoded = json_decode($response, true);
        if ($resultDecoded === null) {
            $request = json_encode($request);
            $message = <<<EOT
Неожиданный ответ от КЕТ.
-------------------------
URI: $url
Запрос: $request
Ответ: $response
EOT;

            throw new ExceptionKetz($message);
        }
        return $resultDecoded;
    }

    /**
     * @param RequestSendOrder $order
     *
     * @return integer
     * @throws ExceptionKetz
     */
    public function sendOrder(RequestSendOrder $order): ResponseSendOrder
    {
        if(!$order->secret) $order->secret = $this->secret;
        $order->validate();
        $data   = json_encode((array)$order);
        $url    = $this->_makeUrl('send_order.php', $this->_makeHash($data));

        $response  = $this->_send($url, ['data' => $data]);

        return new ResponseSendOrder($response['result']);
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

        $response  = $this->_send($url, ['data' => $data]);

        if (isset($response['result'])) {
            return new ResponseGetOrdersFail($response['result']);
        }

        $response = array_map(function ($item) {
            return new ResponseGetOrders($item);
        }, $response);
        return $response;
    }
}