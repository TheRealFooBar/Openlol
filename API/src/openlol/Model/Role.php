<?php

namespace Openlol\Model
{
	class Role
	{
		// Properties

		/**
		 * Primary Key of the Role in the database.
		 * 
		 * @var int
		 */
		private $id;

		/**
		 * Unique string to identify the Role.
		 * 
		 * @var string
		 */
		private $systemName;

		/**
		 * Human-readable display name of the Role.
		 * 
		 * @var string
		 */
		private $displayName;

		// Getters and Setters
	
		/**
		 * Get the value of id
		 * 
		 * @return int
		 */ 
		public function GetId(): int 
		{
			return $this->id;
		}

		/**
		 * Set the value of id
		 *
		 * @return  self
		 */ 
		public function SetId(int $id): self
		{
			$this->id = $id;
			return $this;
		}
	

		/**
		 * Get the value of systemName
		 * 
		 * @return string
		 */ 
		public function getSystemName(): string
		{
			return $this->systemName;
		}

		/**
		 * Set the value of systemName
		 *
		 * @return  self
		 */ 
		public function setSystemName($systemName): self
		{
			$this->systemName = $systemName;

			return $this;
		}

		/**
		 * Get the value of displayName
		 * 
		 * @return string
		 */ 
		public function getDisplayName(): string
		{
			return $this->displayName;
		}

		/**
		 * Set the value of displayName
		 *
		 * @return  self
		 */ 
		public function setDisplayName($displayName): self
		{
			$this->displayName = $displayName;

			return $this;
		}
	}
}
