<?php

use App\Http\Classes\PositionsAtWork;
use App\Models\Employees;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $names = [
        'Иван',
        'Сергей',
        'Игнат'
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('position')->nullable(false);
            $table->timestamps();
        });

        $this->setEmployees();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }

    public function setEmployees()
    {
        for ($i = 0; $i <= count($this->names); $i ++) {
            Employees::create([
                'name' => $this->names[array_rand($this->names)],
                'position' => PositionsAtWork::getPositions()[array_rand(PositionsAtWork::getPositions())],
            ]);
        }
    }
};
