<?php

namespace App\Http\Middleware;

class TestMiddleware
{
    /*
     // 前置操作
     public function handle($request, \Closure $next)
    {
         // 逻辑
        if (time() < strtotime('2017-11-25')){
            return redirect('testMiddleware');
        }

        return $next($request);
    }*/

    // 后置操作
    public function handle($request, \Closure $next)
    {
        $response   = $next($request);
        echo ($response);
        // 逻辑
        echo "我是后置操作";
    }
}