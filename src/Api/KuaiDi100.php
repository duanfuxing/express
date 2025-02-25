<?php

namespace duan617\Express\Api;

use Illuminate\Http\Client\RequestException;
use Psr\SimpleCache\InvalidArgumentException;

class KuaiDi100 extends BaseRequest
{

    /**
     * 实时快递单号查询
     * @param array $params
     * @return array
     * @throws InvalidArgumentException
     * @todo 请控制每一单查询频率至少在半小时以上，否则会造成锁单。
     */
    public function getPollQuery(array $params): array
    {
        return $this->httpPost('poll/query.do', $params);
    }

    /**
     * 快递订阅
     * @param array $params
     * @return array
     * @throws InvalidArgumentException
     * @todo 对于同一快递公司同一个快递单号，每月最大订阅次数为4次，超过4次的订阅在提交时会报重复订阅
     */
    public function saveInspectionInfo(array $params): array
    {
        return $this->httpPost('poll', $params);
    }

    /**
     * 快递查询地图轨迹
     * @param array $params
     * @return array
     * @throws InvalidArgumentException
     */
    public function getOrderInspectionResult(array $params): array
    {
        return $this->httpPost('poll/maptrack.do', $params);
    }

    /**
     * 地图轨迹推送
     * @param array $params
     * @return array
     * @throws InvalidArgumentException
     * @todo 对于同一快递公司同一个快递单号，每月最大订阅次数为4次，超过4次的订阅在提交时会报重复订阅。
     */
    public function shipping(array $params): array
    {
        return $this->httpPost('pollmap', $params);
    }
}
