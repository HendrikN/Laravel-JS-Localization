<?php namespace HendrikN\LaravelJsLocalization\Commands;

use Illuminate\Console\Command;
use HendrikN\LaravelJsLocalization\Generators\LangJsGenerator;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LangJsCommand extends Command
{
    protected $signature = 'lang:js {target?} {--c|--compress}';

    protected $description = 'Generate JS lang files.';

    public function handle(LangJsGenerator $generator)
    {
        $target = $this->argument('target') ?? public_path();
        $options = ['compress' => $this->option('compress')];

        if ($generator->generate($target, $options)) {
            return $this->info("Created: {$target}");
        }

        $this->error("Could not create: {$target}");
    }
}
