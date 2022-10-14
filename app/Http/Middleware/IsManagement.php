<?php

namespace App\Http\Middleware;

use App\Repositories\UserRepository;
use Closure;

class IsManagement
{
    public function handle($request, Closure $next)
    {
        $email = $request->get('email');

        if ((new UserRepository())->checkIfManagementByEmail($email)) {
            return $next($request);
        }

        return redirect('login');
    }
}
