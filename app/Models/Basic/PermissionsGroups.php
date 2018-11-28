<?php

namespace App\Models\Basic;

use Illuminate\Database\Eloquent\Model;

class PermissionsGroups extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'sl_permissions_groups';

    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /*
     *  主键ID
     */
    protected $primaryKey = 'id';

    public static function getIns() {
        static $ins;

        if (empty($ins) || !($ins instanceof self)) {
            $ins = new self();
        }
        return $ins;
    }

    /**
     * 获取权限分组列表
     * @param $params
     * @param bool $count
     * @return mixed
     */
    public function getDataList($params, $count = false)
    {
        $where = $this::where(
            function($query) use($params){
                $query->where('is_deleted', 'N');

            });

        if ($count) {
            return $where->count();
        }

        //指定查询字段
        $fields = ( empty($params['fields']) ) ? ['*'] : $params['fields'];
        if (isset($params['start']) && !empty($params['length'])) {
            $list_data = $where->orderBy($this->primaryKey, 'asc')->offset($params['start'])->limit($params['length'])->get($fields);
        } else {
            $list_data = $where->orderBy($this->primaryKey, 'asc')->get($fields);
        }
        return $list_data;
    }

}
