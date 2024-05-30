<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainModel extends Model
{
    function getData1($tableName)
    {
        $data=DB::table($tableName)->first();
        return $data;
    }
    function getDatas($tableName)
    {
        $data=DB::table($tableName)->get();
        return $data;
    }
    function getDataCount($tableName)
    {
        $data=DB::table($tableName)->count();
        return $data;
    }
    function getDataWhere($tableName,$where)
    {
        $data=DB::table($tableName)->where($where)->first();
        return $data;
    }
    function getDatasWhere($tableName,$where)
    {
        $data=DB::table($tableName)->where($where)->get();
        return $data;
    }

    function insert($tableName,$data)
    {
        $result=DB::table($tableName)->insert($data);
        return $result;
    }

    function updateWhere($tableName,$data,$where)
    {
        $result=DB::table($tableName)->where($where)->update($data);
        return $result;
    }

    function insertCustomer($tableName, $data)
    {
        if (is_array(reset($data))) {
            // Multiple rows insert
            $result = DB::table($tableName)->insert($data);
        } else {
            // Single row insert
            $result = DB::table($tableName)->insertGetId($data);
        }
        return $result;
    }

    function insertSupplier($tableName, $data)
    {
        if (is_array(reset($data))) {
            // Multiple rows insert
            $result = DB::table($tableName)->insert($data);
        } else {
            // Single row insert
            $result = DB::table($tableName)->insertGetId($data);
        }
        return $result;
    }

    function updateWhereloop($tableName,$data,$where,$cd_id)
    {
        $result='';
        // dd($cd_id[0][0]);
        for($i=0;$i<count($data);$i++)
        {
            $where2=[
                'id'=>$cd_id[0][$i]
            ];
            $result=DB::table($tableName)->where($where)->where($where2)->update($data[$i]);
            // dd($result);
        }
        // dd($result);
        return $result;
    }

    function dltWhere($tableName,$where)
    {
        DB::table($tableName)->where($where)->delete();
    }

    function getLastData($tableName,$where)
    {
        $result = DB::table($tableName)->latest($where)->first();
        return $result;
    }
}
?>