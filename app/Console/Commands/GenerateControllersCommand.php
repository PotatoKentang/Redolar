<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateControllersCommand extends Command
{
    protected $signature = 'generate:controllers';

    protected $description = 'Generate controllers for all models';

    public function handle()
    {
        // Define your models here
        $models = ['Cart', 'Order', 'Chat', 'Account', 'Address',"Review","Product","Shop"];
        $directory = 'Api';
        $version = 'V1';
        foreach ($models as $model) {
            $controllerName = $model . 'Controller';
            $modelName = $model;

            $this->info("Generating $controllerName...");

            // Generate the controller using the make:controller command
            Artisan::call('make:controller', [
                'name' => $directory.'/'.$version.'/'.$controllerName,
                '--model' => $modelName,
                '--resource' => true,
            ]);

            $this->info("$controllerName generated successfully.");
        }

        $this->info('All controllers generated successfully.');
    }
}
