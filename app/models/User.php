<?php

class UserModel extends Db_Base {
    
    /**
     * 时间树列表
     */
    public function GetUserSetting( $params = [] ) {
        $sql = <<<SQL
SELECT      user_setting_id, user_id, intro, is_public, added_time, updated_time
FROM        user_setting
WHERE       user_id = :user_id
SQL;

        $binding = [
            ':user_id' => $params['user_id']
        ];
        return $this->_db->queryFirst ( $sql, $binding );
    }
}