<?php

use App\Models\Person;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('person_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Person::class)
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('passport')->unique();
            $table->string('country');
            $table->string('address');
            $table->string('place_of_birth')->comment('tug`ilgan joyi');
            $table->string('organization')->comment('tashkilot');
            $table->string('position')->comment('lavozim');
            $table->string('activity')->comment('faoliyat');
            $table->enum('sex',['male','female']);
            $table->date('birthday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_profiles');
    }
};
