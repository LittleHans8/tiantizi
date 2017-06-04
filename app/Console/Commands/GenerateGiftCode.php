<?php

namespace App\Console\Commands;

use App\GiftCode;
use Illuminate\Console\Command;

class GenerateGiftCode extends Command
{
    const MONTH = 0;
    const QUARTER = 1;
    const SIX_MONTHS = 2;
    const YEAR = 3;

    const TINY_TRANSFER_VALUE = 10;
    const SMALL_TRANSFER_VALUE = 30;
    const MEDIUM_TRANSFER_VALUE = 100;
    const BIG_TRANSFER_VALUE = 200;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:code {--number=100} {--type=0} {--value=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate gift code into database';

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
     * @return mixed
     */
    public function handle()
    {
        $number = $this->option('number');
        $type =  $this->option('type');
        $transfer_value = $this->option('value');
        $codes = $this->generateCode($number, $type, $transfer_value);
        foreach ($codes as $code) {
            $this->line($code);
        }
    }

    public function generateCode($number = 1, $type = self::MONTH, $transfer_value = self::TINY_TRANSFER_VALUE)
    {
        $codes = array();
        for ($i = 1; $i <= $number; $i++) {
            $str_1 = uniqid("Luckytiantizi");
            $str_2 = str_random(8);
            $str_3 = str_random(12);
            $str_4 = str_random(3);
            $code = $str_1 . "|" . $str_2 . $str_3 . $str_4;
            array_push($codes, $code);
        }
        foreach ($codes as $code) {
            $gift = new GiftCode();
            $gift->code = $code;
            $gift->type = $type;
            $gift->transfer_value = $transfer_value;
            $gift->save();
        }
        return $codes;
    }
}
