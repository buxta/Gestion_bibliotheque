<?php 
	class SinglePDO extends PDO {
		private $_dsn    = DB;
		private $_dbuser = USER ;
		private $_dbpwd  = PWD ;
		public static $_instance;

		public function __construct() {
			return parent::__construct($this->_dsn, $this->_dbuser, $this->_dbpwd);
		}

		public static function getInstance() {
			if(self::$_instance == NULL) {
				self::$_instance = new SinglePDO();
			}
			return self::$_instance;
		}			
	}
?>