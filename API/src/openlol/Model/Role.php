<?php

namespace Openlol\Model
{
	class Role
	{
		// Properties
		private $id;
		private $systemName;
		private $displayName;

		// Getters and Setters
	
		/**
		 * Get the value of id
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
