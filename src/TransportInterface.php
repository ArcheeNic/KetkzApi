<?php namespace KetkzApi;

/**
 * Любой способ работы обмена данными должен реализовывать этот интерфейс.
 * Interface TransportInterface
 *
 * @package KetkzApi
 */
interface TransportInterface
{
    /**
     * Отправить HTTP-запрос
     *
     * @param  string       $url
     * @param  array|string $postData
     * @param  array        $options
     *
     * @return string
     */
    public function send($url, $postData = null, $options = []);

    /**
     * HTTP-код ответа
     *
     * @return int
     */
    public function getHttpCode();

    /**
     * Массив отладочной информации (url, post data, код ответа, текст ответа)
     *
     * @return array
     */
    public function getDebugInfo();
}