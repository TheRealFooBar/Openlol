<?php

namespace Openlol\Model
{
	class User
	{
		// Properties
		private $id;
		private $role;
		private $displayName;
		private $avatar;
		private $email;
		private $password;
		private $passwordAlgorithm;

		// Getters and Setters

		/**
		 * Get the value of id
		 */ 
		public function getId(): int
		{
			return $this->id;
		}

		/**
		 * Set the value of id
		 *
		 * @return  self
		 */ 
		public function setId($id): self
		{
			$this->id = $id;

			return $this;
		}

		/**
		 * Get the value of role
		 */ 
		public function getRole() : Role
		{
			return $this->role;
		}

		/**
		 * Set the value of role
		 *
		 * @return  self
		 */ 
		public function setRole(Role $role)
		{
			$this->role = $role;

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

		/**
		 * Get the value of avatar
		 */ 
		public function getAvatar(): string
		{
			return $this->avatar;
		}

		/**
		 * Set the value of avatar
		 *
		 * @return  self
		 */ 
		public function setAvatar($avatar): self
		{
			$this->avatar = $avatar;

			return $this;
		}

		/**
		 * Get the value of email
		 */ 
		public function getEmail(): string
		{
			return $this->email;
		}

		/**
		 * Set the value of email
		 *
		 * @return  self
		 */ 
		public function setEmail($email): self
		{
			$this->email = $email;

			return $this;
		}

		/**
		 * Get the value of password
		 */ 
		public function getPassword(): string
		{
			return $this->password;
		}

		/**
		 * Set the value of password
		 *
		 * @return  self
		 */ 
		public function setPassword($password): self
		{
			$this->password = $password;

			return $this;
		}

		/**
		 * Get the value of passwordAlgorithm
		 */ 
		public function getPasswordAlgorithm(): int
		{
			return $this->passwordAlgorithm;
		}

		/**
		 * Set the value of passwordAlgorithm
		 *
		 * @return  self
		 */ 
		public function setPasswordAlgorithm($passwordAlgorithm): self
		{
			$this->passwordAlgorithm = $passwordAlgorithm;

			return $this;
		}
	}
}