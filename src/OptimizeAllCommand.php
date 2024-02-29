<?php

namespace OptimizeAll;

use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'optimize:all')]
class OptimizeAllCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'optimize:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache everything that needs to be cached';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->components->info('Caching everything that needs to be cached');

        collect($this->cacheCommands())
            ->each(fn ($task, $description) => $this->components->task($description, $task));

        $this->newLine();
    }

    private function cacheCommands(): array
    {
        $config = config('optimize-all-command');

        $commands = [];

        foreach ($config as $task => $settings) {
            if ($settings['run'] === false) {
                continue;
            }

            $commands[$task] = fn () => $this->callSilent($settings['command']) == 0;
        }

        return $commands;
    }
}
