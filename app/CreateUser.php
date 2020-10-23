<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class CreateUser extends Model
{
    protected $table = 'seg_users';
    protected $fillable = ['idspe','username', 'password', 'user_active','empresa_id'];
    protected $timestamp = false;

    /**
     * Altas, bajas, modificaciones en la tabla seg_users
     */
    public static function abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_user_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }
}
