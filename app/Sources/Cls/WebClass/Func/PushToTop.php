<?php
namespace App\Sources\Cls\WebClass\Func;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PushToTop{
    public static function update_time($table, $id_posts){
        DB::table($table)->where('id', $id_posts)->update([
            'updated_at'    => Carbon::now('Asia/Ho_Chi_Minh')
        ]);
        return 0;
    }
}