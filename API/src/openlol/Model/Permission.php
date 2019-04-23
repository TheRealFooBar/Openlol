<?php

namespace Openlol\Model
{
	class Permission
	{
		// Properties
		/** 
		 * Primary Key of the Permission in the database.
		 * 
		 * @var int */
		private $id;

		/** 
		 * Unique string to identify the Permission.
		 * 
		 * Example: "PERM_CREATE_POST"
		 * 
		 * @var string */
		private $systemName;
		
		/** 
		 * Human-readable display name of the permission.
		 * 
		 * Example: "Create Posts"
		 * 
		 * @var string */
		private $displayName;

		/** 
		 * Human-readable description of the permission.
		 * 
		 * Example: "This permission allows a user to create a new post."
		 * 
		 * @var string */
		private $displayDescription;

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
		
		/**
		 * Get the value of displayName
		 * 
		 * @return string
		 */ 
		public function getDisplayDescription(): string
		{
			return $this->displayDescription;
		}

		/**
		 * Set the value of displayName
		 *
		 * @return  self
		 */ 
		public function setDisplayDescription($displayDescription): self
		{
			$this->displayDescription = $displayDescription;

			return $this;
		}
	}
}
