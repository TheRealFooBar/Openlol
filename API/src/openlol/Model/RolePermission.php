<?php

namespace Openlol\Model
{
	class RolePermission
	{
		// Properties
		/** 
		 * Reference to the Permission to give.
		 * 
		 * @var Permission */
		private $permission;

		/** 
		 * Reference to the Role the Permission is given to.
		 * 
		 * @var Role */
		private $role;

		// Getters and Setters

		/**
		 * Get reference to the Permission to give.
		 */ 
		public function getPermission(): Permission
		{
			return $this->permission;
		}

		/**
		 * Set reference to the Permission to give.
		 *
		 * @return  self
		 */ 
		public function setPermission($permission): self
		{
			$this->permission = $permission;

			return $this;
		}

		/**
		 * Get reference to the Role the Permission is given to.
		 */ 
		public function getRole(): Role
		{
			return $this->role;
		}

		/**
		 * Set reference to the Role the Permission is given to.
		 *
		 * @return  self
		 */ 
		public function setRole($role): self
		{
			$this->role = $role;

			return $this;
		}
	}
}
