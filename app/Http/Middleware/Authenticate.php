<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Xác định nơi để chuyển hướng nếu người dùng không được xác thực.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectToPath($request)
    {
        if (!$request->expectsJson()) {
            return route('admin.login');  // Đường dẫn mà người dùng sẽ được chuyển hướng
        }

        return null;
    }
}
