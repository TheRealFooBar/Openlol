<?php

namespace Openlol\Model
{
	class Post
	{
		// Properties

		/**
		 * Primary Key of the Post in the database.
		 * 
		 * @var int
		 */
		private $id;

		/**
		 * Title of the Post.
		 * 
		 * @var string
		 */
		private $title;

		/**
		 * Reference to the creator of the Post.
		 * 
		 * @var User
		 */
		private $creator;

		/**
		 * String with local filesystem path to the image of the Post.
		 * 
		 * @var string
		 */
		private $image;

		/**
		 * UNIX Timestamp of the creation Date/Time of the Post.
		 * 
		 * If the machine running this is 32-bit, this will work fine until 2038.
		 * On a 64-bit machine, we should be fine until the year 219250468. Emperor preserve us.
		 * 
		 * @var int
		 */
		private $creationTimestamp;





		// Getters and Setters
	
		

		/**
		 * Get the ID of the Post.
		 *
		 * @return  int
		 */ 
		public function getId(): int
		{
			return $this->id;
		}

		/**
		 * Set the ID of the Post.
		 *
		 * @param  int  $id  		
		 *
		 * @return  self
		 */ 
		public function setId(int $id): self
		{
			$this->id = $id;

			return $this;
		}

		/**
		 * Get the title of the Post.
		 *
		 * @return  string
		 */ 
		public function getTitle(): string
		{
			return $this->title;
		}

		/**
		 * Set the title of the Post.
		 *
		 * @param  string  $title  		
		 *
		 * @return  self
		 */ 
		public function setTitle(string $title): self
		{
			$this->title = $title;

			return $this;
		}

		/**
		 * Get the Creator of the Post.
		 *
		 * @return  User
		 */ 
		public function getCreator(): User
		{
			return $this->creator;
		}

		/**
		 * Set the Creator of the Post.
		 *
		 * @param  User  $creator  		
		 *
		 * @return  self
		 */ 
		public function setCreator(User $creator): self
		{
			$this->creator = $creator;

			return $this;
		}

		/**
		 * Get the local filesystem path to the image of the Post.
		 *
		 * @return  string
		 */ 
		public function getImage(): string
		{
			return $this->image;
		}

		/**
		 * Set the local filesystem path tp the image of the Post.
		 *
		 * @param  string  $image  		
		 *
		 * @return  self
		 */ 
		public function setImage(string $image): string
		{
			$this->image = $image;

			return $this;
		}

		/**
		 * Get the UNIX timestamp of the creation of the Post.
		 *
		 * @return  int
		 */ 
		public function getCreationTimestamp(): int
		{
				return $this->creationTimestamp;
		}

		/**
		 * Set the UNIX timestamp of the creation of the Post.
		 *
		 * @param  int  $creationTimestamp  		
		 *
		 * @return  self
		 */ 
		public function setCreationTimestamp(int $creationTimestamp): self
		{
			$this->creationTimestamp = $creationTimestamp;

			return $this;
		}
	}
}
