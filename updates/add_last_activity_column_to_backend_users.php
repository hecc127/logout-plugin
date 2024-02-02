<?php

namespace Renatio\Logout\Updates;

use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;
use Renatio\Logout\Models\Settings;

/**
 * Class AddLastActivityColumnToBackendUsers
 * @package Renatio\Logout\Updates
 */
class AddLastActivityColumnToBackendUsers extends Migration
{

    /**
     * @return void
     */
    public function up()
    {
        Schema::table('backend_users', function ($table) {
            $table->datetime('last_activity')->after('last_login')->nullable();
        });

        $settings = Settings::instance();

        $settings->resetDefault();
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::table('backend_users', function ($table) {
            $table->dropColumn('last_activity');
        });
    }

}