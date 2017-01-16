<?php

namespace Pmall\Blacklist;

use Auth;
use Closure;
use Illuminate\Contracts\Config\Repository as Config;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Blacklist
{
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Forbid access to a list of blacklisted users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $blacklist = $this->config->get('blacklist.emails');

        if (in_array(Auth::user()->email, $blacklist)) {

            throw new HttpException(503);

        }

        return $next($request);
    }
}
