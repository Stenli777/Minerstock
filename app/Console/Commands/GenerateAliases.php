<?php

namespace App\Console\Commands;

use App\Models\Asic;
use Illuminate\Console\Command;

class GenerateAliases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:aliases';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $asics = Asic::whereNull('alias')->orWhere('alias', '')->get();

        foreach ($asics as $asic) {

            $producer = $asic->producer;
            $name = $asic->name;

            $hash = implode($asic->shortHashrate());

            if($asic->weight_brutto == ''){
                $asic->weight_brutto = 0;
            }

            $asic->alias = str_replace('+','_plus',str_replace(['.',',',' ','/'],'_',strtolower("$producer $name $hash". "H/s")));

            $asic->save();
        }

        return 'Aliases successfully updated!';
    }
}
