<?php

namespace App\Models\Lh;

use Illuminate\Database\Eloquent\Model;

class ShoplooksUser extends Model
{
    protected $connection = 'mysql_linkhaitao_v2';

    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'link_shoplooks_user';

    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /*
     *  主键ID
     */
    protected $primaryKey = 'uid';


    public static function getIns() {
        static $ins;

        if (empty($ins) || !($ins instanceof self)) {
            $ins = new self();
        }
        return $ins;
    }

}
