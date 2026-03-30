<?php
// Bootstrap Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Run migration and seeding directly and force it
echo "Running cache clear...\n";
\Illuminate\Support\Facades\Artisan::call('optimize:clear');
echo "Running migrate:fresh --seed...\n";
\Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);

echo "Created users count: " . \App\Models\User::count() . "\n";
file_put_contents('migration_result.txt', \Illuminate\Support\Facades\Artisan::output());
echo "Done.\n";
