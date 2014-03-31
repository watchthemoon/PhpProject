<?php
	class Db
	{
		private $m_sHost = "customjewels.nl";
		private $m_sUser = "ydesigns";
		private $m_sPassword = "3nnGqHQd";
		private $m_sDatabase = "ydesigns_php";
		public $conn;


		public function __construct()
		{
			$this->conn = new mysqli($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase);
		}
	}
?>