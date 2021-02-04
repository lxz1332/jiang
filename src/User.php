<?php

namespace cwkj\jiang;

use think\Model;
use think\model\concern\SoftDelete; //软删除

class User extends Model {

    //自定义主键
    protected $pk = 'user_id';
    //开启自动写入创建时间和自动更新时间
    protected $autoWriteTimestamp = true; //开启自动写入创建时间
    protected $createTime = 'user_time_add'; //自定义创建时间
    protected $updateTime = 'user_time_update'; //自定义更新时间

    //开启软删除
    use SoftDelete;

    protected $deleteTime = 'delete_time';

    //获取用户信息
    public static function user_fenhong_list($group_id) {
        $map[] = ['user_status', '=', 1];
        $map[] = ['group_id', '=', $group_id];
        return self::where($map)->field('user_id')->select()->toArray();
    }

    //推荐关系查询
    public static function user_tuijian_find($user_id) {
        return self::where('user_id', $user_id)->field('user_id,user_tuijian,group_id,group2_id,user_status,is_baodan,user_money_tuan')->find();
    }

}
