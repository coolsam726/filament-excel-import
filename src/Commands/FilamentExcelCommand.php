<?php

namespace Coolsam\FilamentExcel\Commands;

use Illuminate\Console\Command;

class FilamentExcelCommand extends Command
{
    public $signature = 'excel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
