<?php

class TreeModel extends Db_Base {
    
    /**
     * 时间树列表
     */
    public function TreeList() {
        $sql = <<<SQL
SELECT  tree_id, user_id, content, category, title, added_time, update_time
FROM    tree
SQL;

        $rs = $this->_db->execute ( $sql );
        var_dump($rs);die;
    }
}