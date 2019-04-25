<?php

namespace Openlol\Backend
{
	class DatabaseController
	{
		private $db;

		function GetDB(): \PDO
		{
			if ($this->db !== null)
			{
				return $this->db;
			}
			else {
				return $this->CreateDB();
			}
		}

		private function CreateDB()
		{
			$this->db = new \PDO("sqlite:db/openlol.sqlite3");
			
			return $this->db;
		}

	}
}