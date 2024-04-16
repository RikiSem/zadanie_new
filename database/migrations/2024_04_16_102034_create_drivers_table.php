<?php

use App\Models\Drivers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $driversNames = [
        'Иван',
        'Максим',
        'Петр',
        'Никита',
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->unsignedBigInteger('car')->nullable(false);
            $table->foreign('car')->references('id')->on('cars');
            $table->timestamps();
        });

        $this->setDrivers();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }

    public function setDrivers()
    {
        for ($i = 0; $i <= count($this->driversNames); $i ++) {
            Drivers::create([
                'name' => $this->driversNames[array_rand($this->driversNames)],
                'car' => rand(1, 5),
            ]);
        }
    }
};
