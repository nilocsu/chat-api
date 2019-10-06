<?php

namespace App\Http\Middleware;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;
/**
 * Class FavIconMiddleware
 *
 * @Bean()
 */
class CorsMiddleware implements MiddlewareInterface
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
        $response = $handler->handle($request);

        return $this->configResponse($response);
    }

    private function configResponse(ResponseInterface $response)
    {
        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers',
                'Origin, Content-Type, Cookie, Accept,X-Requested-With, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }
}