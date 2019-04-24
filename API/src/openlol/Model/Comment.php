<?php

namespace Openlol\Model
{
	class Comment
	{
		// Properties

		/**
		 * Primary Key of the Comment in the database.
		 * 
		 * @var int
		 */
		private $id;

		/**
		 * Reference to the Post, to which this Comment belongs.
		 * 
		 * @var Post
		 */
		private $post;

		/**
		 * Reference to the creator of the Post.
		 * 
		 * @var User
		 */
		private $creator;

		/**
		 * Reference to another Comment, to which this one replies.
		 * In all honesty, this is probably going to cause horrible bugs.
		 * 
		 * If null, this is a top-level comment.
		 * 
		 * @var ?Comment
		 */
		private $replyTo;

		/**
		 * String with local filesystem path to the image of the Comment.
		 * 
		 * If null, the comment has no image.
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
		 * Get the ID of the Comment.
		 *
		 * @return  int
		 */ 
		public function getId(): int
		{
			return $this->id;
		}

		/**
		 * Set the ID of the Comment.
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
		 * Get the Post this Comment belongs to.
		 *
		 * @return  Post
		 */ 
		public function getPost(): Post
		{
			return $this->post;
		}

		/**
		 * Set the Post this Comment belongs to.
		 *
		 * @param Post $post
		 *
		 * @return  self
		 */ 
		public function setPost(Post $post): self
		{
			$this->post = $post;

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
		 * Get the Comment to which this Comment replies to.
		 * If null, the Comment is a top-level Comment.
		 *
		 * @return ?Comment
		 */ 
		public function getReplyTo(): ?Comment
		{
			return $this->replyTo;
		}

		/**
		 * Get the Comment to which this Comment replies to.
		 * If null, the Comment is a top-level comment.
		 *
		 * @param ?Comment $parent
		 *
		 * @return  self
		 */ 
		public function setReplyTo(?Comment $parent): self
		{
			if ($parent === null) {
				// This is a top-level comment
			}
			else {
				if ($this->getPost() !== $parent->getPost()) {
					// The comment tries to reply to a comment in another post. This is not allowed.
					throw new Exception("Comment does not reply to Comment in same Post.");
					
				}
			}

			$this->replyTo = $parent;

			return $this;
		}

		/**
		 * Get the local filesystem path to the image of the Post.
		 *
		 * @return ?string
		 */ 
		public function getImage(): ?string
		{
			return $this->image;
		}

		/**
		 * Set the local filesystem path tp the image of the Post.
		 *
		 * @param ?string $image
		 *
		 * @return  self
		 */ 
		public function setImage(?string $image): self
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
