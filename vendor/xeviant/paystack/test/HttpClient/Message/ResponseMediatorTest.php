<?php
/**
 * This file is part of the Xeviant Paystack package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @version         2.0
 *
 * @author          Olatunbosun Egberinde
 * @license         MIT Licence
 * @copyright   (c) Olatunbosun Egberinde <bosunski@gmail.com>
 *
 * @link            https://github.com/bosunski/paystack
 */

namespace Xeviant\Paystack\Test\HttpClient;

use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;
use PHPUnit\Framework\TestCase;
use Xeviant\Paystack\Exception\ApiLimitExceededException;
use Xeviant\Paystack\HttpClient\Message\ResponseMediator;

class ResponseMediatorTest extends TestCase
{
    public function testGetContent()
    {
        $body = ['foo' => 'bax'];
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            stream_for(json_encode($body))
        );

        $this->assertEquals($body, ResponseMediator::getContent($response));
    }

    public function testGetContentNotJSON()
    {
        $body = 'foobar';
        $response = new Response(
            200,
            [],
            stream_for($body)
        );

        $this->assertEquals($body, ResponseMediator::getContent($response));
    }

    public function testGetContentInvalidJSON()
    {
        $body = 'foobar';
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            stream_for($body)
        );

        $this->assertEquals($body, ResponseMediator::getContent($response));
    }

    public function testGetHeader()
    {
        $header = 'application/json';
        $response = new Response(
            200,
            ['Content-Type' => $header]
        );

        $this->assertEquals($header, ResponseMediator::getHeader($response, 'content-type'));
    }

    public function testGetApiLimit()
    {
        $header = 5000;
        $response = new Response(
            429,
            ['X-RateLimit-Remaining' => $header]
        );

        $this->assertEquals($header, ResponseMediator::getApiLimit($response));
    }

    public function testExceptionIsThrownWhenApiLimitIsExceeded()
    {
        $this->expectException(ApiLimitExceededException::class);
        $header = 0;
        $response = new Response(
            429,
            ['X-RateLimit-Remaining' => $header]
        );
        ResponseMediator::getApiLimit($response);
    }
}
