<?php


namespace duan617\Express\Tests;

use duan617\Express\Exceptions\InvalidArgumentException;
use duan617\Express\Express;
use duan617\Express\ExpressBird;
use duan617\Express\Express100;
use PHPUnit\Framework\TestCase;

class ExpressTest extends TestCase
{
    //快递鸟快递单号参数为空测试
    public function testExpressBirdTrackWithEmptyTrackingCode()
    {
        $express = new ExpressBird('mock-id', 'mock-key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('TrackingCode is required');

        $express->track();

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

    //快递鸟快递公司代码参数为空测试
    public function testExpressBirdTrackWithEmptyShippingCode()
    {
        $express = new ExpressBird('mock-id', 'mock-key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('ShippingCode is required');

        $express->track('888888888888');

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

    //快递鸟快递公司代码参数不支持测试
    public function testExpressBirdTrackWithInvalidShippingCode()
    {
        $express = new ExpressBird('mock-id', 'mock-key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Current ShippingCode is not support');

        $express->track('888888888888', 'test');

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

    //快递100快递单号参数为空测试
    public function testExpress100TrackWithEmptyTrackingCode()
    {
        $express = new Express100('mock-id', 'mock-key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('TrackingCode is required');

        $express->track();

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

    //快递100快递公司代码参数为空测试
    public function testExpress100TrackWithEmptyShippingCode()
    {
        $express = new Express100('mock-id', 'mock-key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('ShippingCode is required');

        $express->track('888888888888');

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

    //快递100快递公司代码参数不支持测试
    public function testExpress100TrackWithInvalidShippingCode()
    {
        $express = new Express100('mock-id', 'mock-key');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Current ShippingCode is not support');

        $express->track('888888888888', 'test');

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }
}
