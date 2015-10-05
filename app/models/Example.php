<?php

class ExampleModel extends Db_Base {
	
	public function ShowList() {
		echo 'ShowList<br>';
		$data = array (
			'username' => 'admin', 
			'user_password' => '$H$9ajKm6EMPsM4a9YAPb/Ca4CLS2rmyh/' 
		);
		$usrinfo = $this->_db->selectFirst ( 'bbs_users', $data );
		var_dump ( $usrinfo );
		$this->_db->showQuery ();
	}
	
	public function Native() {
		//		$data ['name'] = 'OK2';
		//		$rs = $this->_db->insert ( 'bbs_test', $data );
		//		var_dump ( $rs );
		//		$this->_db->showQuery ();
		

		$where ['id'] = 1;
		$update ['name'] = 'YES1';
		$re = $this->_db->update ( 'bbs_test', $update, $where );
		var_dump ( $re );
		$this->_db->showQuery ();
	}
	
	public function Exe() {
	    /*
		$sql = "select * from bbs_test where id = :id";
		$bind [':id'] = '1';
		$rs = $this->_db->query ( $sql, $bind );
		var_dump ( $rs );
		*/
	    
	    $sql = "update bbs_test set name = :name where id = :id";
		$bind [':id'] = '1';
		$bind [':name'] = 'OK1';
		$this->_db->showQuery($sql, $bind);
		$rs = $this->_db->execute ( $sql, $bind );
		var_dump ( $rs );
	}

}