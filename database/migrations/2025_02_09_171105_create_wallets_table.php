<?php

use App\Models\Group;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreignIdFor(Group::class)->nullable()->constrained();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('wallet_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Wallet::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->enum('action', ['open', 'close']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_operations');
        Schema::dropIfExists('wallets');
    }
};
