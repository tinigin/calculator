<?php

namespace Tinigin\Calculator\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCalculator extends Command
{
    protected $signature = 'calculator:install';

    protected $description = 'Install the Calculator';

    public function handle()
    {
        $this->info('Installing Calculator...');

        $this->info('Publishing configuration...');

        if (! $this->configExists('calculator.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed Calculator');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Tinigin\Calculator\CalculatorServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
