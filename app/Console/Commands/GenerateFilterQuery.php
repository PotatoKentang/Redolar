<?php

// namespace App\Console\Commands;

// use Illuminate\Console\Command;
// use Illuminate\Support\Facades\Artisan;

// class GenerateResourcesCommand extends Command
// {
//     protected $signature = 'generate:resource';

//     protected $description = 'Generate resource for all models';

//     public function handle()
//     {
//         // Define your models here
//         $models = ['Cart', 'Order', 'Chat', 'Account', 'Address', 'Review', 'Product', 'Shop'];
//         $version = 'V1';

//         foreach ($models as $model) {
//             $resourceName = $model . 'Resource';
//             $filterName = $model . 'Query';

//             $this->info("Generating $resourceName...");

//             // Generate the resource using the make:resource command
//             Artisan::call('make:resource', [
//                 'name' => $version . '/' . $resourceName,
//             ]);

//             $this->info("$resourceName generated successfully.");
//             $this->info("Generating $filterName...");

//         }
//     }
// }
