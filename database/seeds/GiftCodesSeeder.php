<?php

use App\GiftCode;
use Illuminate\Database\Seeder;

class GiftCodesSeeder extends Seeder
{

    const MONTH = 0;
    const QUARTER = 1;
    const SIX_MONTHS = 2;
    const YEAR = 3;

    const TINY_TRANSFER_VALUE = 10;
    const SMALL_TRANSFER_VALUE = 20;
    const MEDIUM_TRANSFER_VALUE = 100;
    const BIG_TRANSFER_VALUE = 200;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->generateCode(10, self::MONTH, self::TINY_TRANSFER_VALUE);
        $this->generateCode(10, self::QUARTER, self::TINY_TRANSFER_VALUE);
        $this->generateCode(10, self::SIX_MONTHS, self::TINY_TRANSFER_VALUE);
        $this->generateCode(10, self::YEAR, self::TINY_TRANSFER_VALUE);

        $this->generateCode(10, self::MONTH, self::SMALL_TRANSFER_VALUE);
        $this->generateCode(10, self::QUARTER, self::SMALL_TRANSFER_VALUE);
        $this->generateCode(10, self::SIX_MONTHS, self::SMALL_TRANSFER_VALUE);
        $this->generateCode(10, self::YEAR, self::SMALL_TRANSFER_VALUE);

        $this->generateCode(10, self::MONTH, self::MEDIUM_TRANSFER_VALUE);
        $this->generateCode(10, self::QUARTER, self::MEDIUM_TRANSFER_VALUE);
        $this->generateCode(10, self::SIX_MONTHS, self::MEDIUM_TRANSFER_VALUE);
        $this->generateCode(10, self::YEAR, self::MEDIUM_TRANSFER_VALUE);

        $this->generateCode(10, self::MONTH, self::BIG_TRANSFER_VALUE);
        $this->generateCode(10, self::QUARTER, self::BIG_TRANSFER_VALUE);
        $this->generateCode(10, self::SIX_MONTHS, self::BIG_TRANSFER_VALUE);
        $this->generateCode(10, self::YEAR, self::BIG_TRANSFER_VALUE);

    }

    public function generateCode($number = 10, $type = self::MONTH, $transfer_value = self::TINY_TRANSFER_VALUE)
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
