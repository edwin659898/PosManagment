<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('AlphaSoftwares&Hardware');
            $table->string('company_address')->default('Nairobi');
            $table->string('company_phone')->default('+254 714 572 978');
            $table->string('company_email')->default('edwinkiuma@gmail.com');
            $table->string('company_fax')->default('+254 714 572 978');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
