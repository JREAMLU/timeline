<?php

class TreeModel extends Db_Base {
    
    /**
     * 时间树列表
     */
    public function GetTreeList( $params = [] ) {
        $sql = <<<SQL
SELECT      tree_id, user_id, content, category, title, added_time, updated_time
FROM        tree
WHERE       user_id = :user_id
ORDER BY    tree_id DESC
SQL;

        $binding = [
            ':user_id' => $params['user_id']
        ];
        return $this->_db->query ( $sql, $binding );
    }
}