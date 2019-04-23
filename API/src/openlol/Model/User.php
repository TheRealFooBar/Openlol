<?php

namespace Openlol\Model
{
	class User
	{
		// Properties

		/**
		 * Primary Key of the User in the database.
		 * 
		 * @var	int
		 * */
		private $id;

		/** 
		 * Reference to the Role of the User.
		 * 
		 * @var Role
		 * */
		private $role;

		/** 
		 * Visible Display Name of the User
		 * 
		 * @var string */
		private $displayName;

		/** 
		 * Link to the avatar of the User.
		 * If this is null, then a default avatar shall be used.
		 *  
		 * @var ?string */
		private $avatar;

		/** 
		 * E-Mail adress of the User.
		 * 
		 * @var string */
		private $email;

		/** 
		 * The encoded hash and salt of the User's password.
		 * As a Key Derivation Function, Argon2id was chosen.
		 * The User's password is *NEVER* stored in plain text.
		 * 
		 * @var string */
		private $password;

		/** 
		 * The version of the password alogorithm chosen.
		 * If this is less than the current algorithm, hash migration needs to occur.
		 * 
		 * @var string */
		private $passwordAlgorithm;

		// Getters and Setters

		/**
		 * Get the value of id
		 * 
		 * @return int
		 */ 
		public function getId(): int
		{
			return $this->id;
		}

		/**
		 * Set the value of id
		 *
		 * @return self
		 */ 
		public function setId($id): self
		{
			$this->id = $id;

			return $this;
		}

		/**
		 * Get the value of role
		 * 
		 * @return Role
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
		public function setRole(Role $role): self
		{
			$this->role = $role;

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
		 * Get the value of avatar
		 * 
		 * @return ?string
		 */ 
		public function getAvatar(): ?string
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
		 * 
		 * @return string
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
		 * 
		 * @return string
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
		 * 
		 * @return int
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