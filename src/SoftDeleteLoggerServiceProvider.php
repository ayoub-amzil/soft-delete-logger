<?php

namespace AyoubAmzil\SoftDeleteLogger;

use Illuminate\Support\ServiceProvider;

class SoftDeleteLoggerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish migration
        $this->publishes([
            __DIR__ . '/../database/migrations/create_soft_delete_logs_table.php' =>
                database_path('migrations/' . date('Y_m_d_His', time()) . '_create_soft_delete_logs_table.php'),
        ], 'migrations');
    }

    public function register()
    {
        //
    }
}
