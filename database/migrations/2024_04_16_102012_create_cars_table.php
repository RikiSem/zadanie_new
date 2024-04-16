<?php

use App\Models\Cars;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $carsModels = [
        'Lada',
        'BMW',
        'Subaru',
        'Toyota'
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model')->nullable(false);
            $table->string('status')->nullable(false);
            $table->integer('comfort_lvl')->nullable(false);
            $table->timestamps();
        });

        $this->setCars();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }

    public function setCars()
    {
        for ($i = 0; $i <= count($this->carsModels); $i ++) {
            Cars::create([
                'model' => $this->carsModels[array_rand($this->carsModels)],
                'status' => rand(0, 1) === 1 ? 'free' : 'in_action',
                'comfort_lvl' => rand(1, 3),
            ]);
        }
    }
};
