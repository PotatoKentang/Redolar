<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateRequestsCommand extends Command
{
    protected $signature = 'generate:request';

    protected $description = 'Generate requests for all models';

    public function handle()
    {
        // Define your models here
        $models = ['Cart', 'Order', 'Chat', 'Account', 'Address', 'Review', 'Product', 'Shop'];
        $version = 'V1';

        $this->info('Generating requests for all models...');

        foreach ($models as $model) {
            $modelName = $model;
            $storeRequest = $version . '\Store' . $model . 'Request';
            $updateRequest = $version . '\Update' . $model . 'Request';

            $this->info("Generating $storeRequest...");
            Artisan::call('make:request', [
                'name' => $storeRequest,
            ]);

            $this->info("Generating $updateRequest...");
            Artisan::call('make:request', [
                'name' => $updateRequest,
            ]);

            $this->info("$storeRequest and $updateRequest generated successfully.");
        }

        $this->info('All requests generated successfully.');
    }
}
