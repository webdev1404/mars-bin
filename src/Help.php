<?php

namespace Mars\Bin;

class Help extends Base
{    
    /**
     * {@inheritdoc}
     */
    public protected(set) array $actions = ['help'];

    /**
     * Execute the command
     */
    public function execute(string $command)
    {
        $this->showVersion();
        $this->showAvailableActions();
    }

    /**
     * Shows the version of the framework and PHP
     */
    protected function showVersion()
    {
        $php = phpversion();

        $this->app->cli->printNewline();
        $this->app->cli->print("Mars Framework {$this->app->version}", 'blue');
        $this->app->cli->print("PHP {$php}", 'blue');

        $this->app->cli->printNewline(2);
    }

    /**
     * Shows the available actions
     */
    protected function showAvailableActions()
    {
        global $available_actions; 
        
        $data = [];
        foreach ($available_actions as $action => $obj) {
            if ($action == 'help') {
                continue;
            }

            $title = $obj->title ?? get_class($obj);            
            $data[$title] = $this->getCommands($obj);
        }

        $this->app->cli->printListMulti($data, ['green']);
    }

    /**
     * Returns the available commands for the given object
     * @param BinInterface $obj The object
     * @return array The available commands
     */
    protected function getCommands(BinInterface $obj): array
    {
        $data_array = [];
        foreach ($obj->command_descriptions ?? [] as $cmd => $desc) {
            $data_array[] = [$cmd, $desc];
        }

        return $data_array;
    }

    /**
     * Shows the commands for the given object
     * @param BinInterface $obj The object
     */
    public function showCommands(BinInterface $obj)
    {
        $this->app->cli->print("Available commands:", 'header');
        $this->app->cli->printList($this->getCommands($obj), ['green']);
    }
}