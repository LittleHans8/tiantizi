<?php

namespace App\Http\Middleware;

use App\Http\Utils\ApiStatus;
use Closure;

class SimpleApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //URL 参数中有 + 号会被自动替换成 空格" "，所有要将 APP_KEY 进行比较要替换回来
        $request_key = str_replace(" ", "+", $request->key);
        $app_key = env('APP_KEY', "plz generate your APP_KEY");
        // TODO 这里可以再加一层域名或IP地址的判断，如果数据中不存在该记录，同样可以拒绝请求
        $request_key == $app_key ? $response = $next($request) : $response = response(ApiStatus::status(0, "token is  invalid"),401);
        return $response;

    }
}
