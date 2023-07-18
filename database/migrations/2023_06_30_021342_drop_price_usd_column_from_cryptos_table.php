<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPriceUsdColumnFromCryptosTable extends Migration
{
    public function up()
    {
        Schema::table('cryptos', function (Blueprint $table) {
            $table->dropColumn('price_usd');
        });
    }

    public function down()
    {
        Schema::table('cryptos', function (Blueprint $table) {
            $table->decimal('price_usd')->after('price_eur');
        });
    }
}
