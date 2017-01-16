<?php

namespace Pmall\Blacklist;

use Illuminate\Support\ServiceProvider;

class BlacklistServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/blacklist.php' => config_path('blacklist.php'),
        ]);
    }
}
