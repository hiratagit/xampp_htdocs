<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $data =  [
            ['name' => '山田たろう', 'mail' => 'yamada@gmail.com'],
            ['name' => '鈴木花子', 'mail' => 'suzuki@gmail.com'],
            ['name' => '斎藤洋子', 'mail' => 'saito@gmail.com'],
            ['name' => '山中信二', 'mail' => 'ymanaka@gmail.com'],
        ];

        $request->merge(['data'=>$data]);
        return $next($request);

        // $response = $next($request);
        // $content = $response->content();

        // $pattern = '/<middleware>(.*)<\/middleware>/i';
        // $replace = '<a href="https://$1">$1</a>';
        // $content = preg_replace($pattern, $replace, $content);
        // $response->setContent($content);
        // return $response;
    }
}
