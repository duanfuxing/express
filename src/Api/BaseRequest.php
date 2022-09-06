<?php

namespace duan617\Express\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;

class BaseRequest
{
    /**
     * @var array 配置参数
     */
    private $config;

    /**
     * @var string 接口地址
     */
    private $baseUrl = 'https://poll.kuaidi100.com/';

    /**
     * @var Client
     */
    private $client;

    public function __construct(array $config)
    {
        $this->config = $config;

        if (!isset($config['key']) || !$config['key']) {
            throw new \InvalidArgumentException('配置有误, 请填写key');
        }

        if (!isset($config['customer']) || !$config['customer']) {
            throw new \InvalidArgumentException('配置有误, 请填写customer');
        }
        $this->client = new Client();
    }

    /**
     * 发起GET请求
     *
     * @param string $url
     * @param array $params
     * @param bool $needSign
     *
     * @return array
     * @throws InvalidArgumentException
     *
     * @throws RequestException
     */
    public function httpGet(string $url, array $params = [], bool $needSign = true): array
    {
        return $this->request('get', $url, $params, $needSign);
    }

    /**
     * 发起POST请求
     *
     * @param string $url
     * @param array $params
     * @param bool $needSign
     *
     * @return array
     * @throws InvalidArgumentException
     *
     * @throws RequestException
     */
    public function httpPost(string $url, array $params = [], bool $needSign = true): array
    {
        return $this->request('post', $url, $params, $needSign);
    }

    /**
     * 发起HTTP请求
     *
     * @param string $method
     * @param string $url
     * @param array $params
     * @param bool $needSign
     *
     * @return array
     * @throws InvalidArgumentException
     *
     * @throws RequestException
     */
    private function request(string $method, string $url, array $params = [], bool $needSign = true): array
    {
        $options = [];
        if ($needSign) {
            $params = $this->generateParams($params);
        }
        $options['headers'] = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $key = $method == 'get' ? 'query' : 'form_params';
        $options[$key] = $params;

        $response = $this->client->request($method, $this->baseUrl . $url, $options);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * 组合请求参数.
     *
     * @param string $url
     * @param array $params
     *
     * @return array
     * @throws InvalidArgumentException
     *
     * @throws RequestException
     */
    protected function generateParams(array $params): array
    {
        // 请求参数
        $post_data = array();
        $post_data['customer'] = $this->config['customer'];
        $post_data['param'] = json_encode($params, JSON_UNESCAPED_UNICODE);
        $sign = md5($post_data['param'] . $this->config['key'] . $this->config['customer']);
        $post_data['sign'] = strtoupper($sign);

        return $post_data;
    }

    /**
     * 设置请求客户端
     * @param $client
     * @return $this
     */
    public function setHttpClient($client)
    {
        $this->client = $client;
        return $this;
    }
}
