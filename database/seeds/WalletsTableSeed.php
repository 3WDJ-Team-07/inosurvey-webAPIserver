<?php

use Illuminate\Database\Seeder;
use App\Models\Users\Wallet;
class WalletsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
 $data = array(
     
            array(    
                'user_id' => 1,
                'public_key' => '0x418b396ffb5737ad30984fa488713ec087dd2a68',
                'private_key' => 'dd72dfd3c4ffe23c6e1f36280d2317ae340a1fcdc69582a47c4ec9494a88cb38',
        
                ),

            array(
                'user_id' => 2,
                'public_key' => ' 0xb63db2e294815ae8f63617213b6ae91599afc445',
                'private_key' => '1003407dacad47802488135ff2581bf297dccd3951abfe266f51074772381f95',  
            
                ),

            array(    
                'user_id' => 3,
                'public_key' => '0x8a893502903154a5e148c52c8dd5bef9222af7b2',
                'private_key' => '64cdf4090543e7651997d4f2472c96e8dacd1b0a32091086117bca8dd23f5b23',
                ),

            array(    
                'user_id' => 4,
                'public_key' => '0xd11b06e3215aaac2f5921cb350dac29515a71673',
                'private_key' => '08133c54b725347c0f677b42d907394b7a057670ae69b90bb422b23162414f71',
                ),

            array(
                'user_id' => 5,
                'public_key' => '0xf9c987d67c2b3da128ce783e704caafe2c72f42e',
                'private_key' => '35d12d29c54632f82caa3bbeb2f45c287b8772bac7fd92d505c036b0d6ed12e8',
                ),

            array(    
                'user_id' => 6,
                'public_key' => '0xb44a41467083c0b01a873a95a63b6e77cacea8cd',
                'private_key' => 'e0701a62d0ade1f99b7f9bda88b0d9c9e87ea557f96c89a29c5c8dfe1b295680',
                ),

            array(     
                'user_id' => 7,
                'public_key' => '0xb0ba04d75edfe160a8ac3df5028a08cf4013e095',
                'private_key' => 'b63ffba4e76efe454b38b4564646f673406d49ec094a460208678f68b4e68fe0',
                ),

            array(    
                'user_id' => 8,
                'public_key' => '0xf0a0eb79979a4691fa944d04c4ec9d32875f6003',
                'private_key' => 'c8a99185be46ed11888374102f115e733e42832607b406e24d858a9000978036',
                ),

            array(    
                'user_id' => 9,
                'public_key' => '0xd39f35b8c5f1ca51f0cfc0d9943de849531829b2',
                'private_key' => '5da3e6a1c4706dc22cd5295dc816cacbd62ab6521c43158243bf98740bd8c8a7',
                ),

            array(    
                'user_id' => 10,
                'public_key' => '0x1c6cefa2df11d643a687d847733da387fc32d034',
                'private_key' => '77bef3a74a295e2e8844e4e58ae387e0dc1277992c0e7110f0fd2a15d57ff12c',
                ),
        );
        
    foreach($data as $rs){ 
        Wallet::insert($rs);
     } 
    
    }
}
