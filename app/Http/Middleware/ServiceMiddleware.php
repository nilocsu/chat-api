<?php


namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Context\Context;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;

/**
 * the middleware of service
 *
 * @Bean()
 * @uses      ServiceMiddleware
 * @version   2017年12月10日
 * @author    stelin <phpcrazy@126.com>
 * @copyright Copyright 2010-2016 swoft software
 * @license   PHP Version 7.x {@link http://www.php.net/license/3_0.txt}
 */
class ServiceMiddleware implements MiddlewareInterface
{
    /**
     * Process an incoming server request.
     *
     * @param ServerRequestInterface|Request $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     * @inheritdoc
     * @throws SwoftException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        if ($request->getMethod() == 'OPTIONS') {

            return Context::mustGet()->getResponse()
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
                ->withStatus(200, '');
        }
        $response = $handler->handle($request);
        return $response;
    }
}