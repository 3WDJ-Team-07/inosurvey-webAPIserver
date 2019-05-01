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
                'public_key' => '0x545f7815Cab8648eeF514C8F4f3c5E7264b8FD72',
                'private_key' => '22ff8b0809bcc80d8d2dc693cc61f881373e1e496b5c4342e873d7ececaafff6',
        
                ),

            array(
                'user_id' => 2,
                'public_key' => '0x607c6Ba436C97742C893E39768f465940Eb87CEA',
                'private_key' => 'b3597bcc157a480277e7868589d931f12c1ec015f593d0cbdbd6437b7ad67b4b',  
            
                ),

            array(    
                'user_id' => 3,
                'public_key' => '0x76F863f2b7519F058E45C48F890451BA657e5070',
                'private_key' => '84197a6adbdfcb468ebb9876c8bf40c1a1a0dbfc1af221b8a25f1b723c171909',
                ),

            array(    
                'user_id' => 4,
                'public_key' => '0x1c0831E9DD36E0273c26424232771589d88540Dc',
                'private_key' => 'a6e74e9c06f2faeb6440de4691fdf07350f1fae6e1c426c0d68046a834180b78',
                ),

            array(
                'user_id' => 5,
                'public_key' => '0xdDf12B9ac4Fc0b886440819E75B9691dD533746e',
                'private_key' => '8578542f8832b1cde022e1d935cfec33b0774f1804b7459dae1c2912869214b4',
                ),

            array(    
                'user_id' => 6,
                'public_key' => '0xd8571Ee1CC85090dde9306DE5b2DC5aa044BF593',
                'private_key' => '834424a728966cddc4426decab7b5b52647f34008ac44b614dd893772c4d0673',
                ),

            array(     
                'user_id' => 7,
                'public_key' => '0x12b2B837BfE830044cDb9EdD8177e33B56ebC561',
                'private_key' => '62238f0b58219356bf4b6494297fe518b69f515711a2af9fb32ebf8ba3e574ee',
                ),

            array(    
                'user_id' => 8,
                'public_key' => '0x380e2B4799a5B008dE1995B21f778c05d31dB22d',
                'private_key' => '9e4334429a2c40c162271dc653d706d54b6cb58aa52e4067df1cad089b405f96',
                ),

            array(    
                'user_id' => 9,
                'public_key' => '0xDBfe41A042BfC07753a9Aa222897d2414374199A',
                'private_key' => '2facff11deb129208b069466994e5f967980513539df6a10a89428b4e02c0c61',
                ),

            array(    
                'user_id' => 10,
                'public_key' => '0x16C8802088e732B543b36cb4DfFDB7261f089f4e',
                'private_key' => 'a64e257279dfb0b88e4ccff418d51f2fbbe6758b3e004f90249a965c1537c3c9',
                ),
        );
        
    foreach($data as $rs){ 
        Wallet::insert($rs);
     } 
    
    }
}
