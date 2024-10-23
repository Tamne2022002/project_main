<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportOrderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        //DB::table('import_invoices')->delete();
        
        DB::table('table_importorder')->insert(array (
            0 => 
            array (
                'id' => 2,
                'order_code' => '9EUOBAJSPIXQWFD0K8NT',
                'import_date' => '2024-07-04 12:17:00',
                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',
            ),
            1 => 
            array (
                'id' => 3,
                'order_code' => 'YWCVASORLPT6ZE98QFG0',
                'import_date' => '2024-07-04 12:32:00',
                'created_at' => '2024-07-04 12:47:37',
                'updated_at' => '2024-07-04 12:47:37',
            ),
            2 => 
            array (
                'id' => 4,
                'order_code' => 'USJLA2I4HTVWRB96XCEP',
                'import_date' => '2024-07-04 12:48:00',
                'created_at' => '2024-07-04 13:00:59',
                'updated_at' => '2024-07-04 13:00:59',
            ),
        ));
        
        
    }
}