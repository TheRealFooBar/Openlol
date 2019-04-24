<?php

namespace Openlol\Model
{
	class PostVote
	{
		// Properties

		/**
		 * Reference to the Post to which the vote was cast.
		 * 
		 * @var Post
		 */
		private $post;

		/**
		 * Reference to the User whom cast the vote.
		 * 
		 * @var User
		 */
		private $user;


		/**
		 * Value of the Vote.
		 * 
		 * @var VoteType
		 */
		private $type;

		// Getters and Setters

		/**
		 * Get the Post which was voted on.
		 *
		 * @return Post
		 */ 
		public function getPost(): Post
		{
			return $this->post;
		}

		/**
		 * Set the Post which was voted on.
		 *
		 * @param $post Post
		 *
		 * @return self
		 */ 
		public function setPost(Post $post): self
		{
			$this->post = $post;

			return $this;
		}

		/**
		 * Get the User who voted on the Post.
		 *
		 * @return  User
		 */ 
		public function getUser(): User
		{
			return $this->user;
		}

		/**
		 * Set the User who voted on the Post.
		 *
		 * @param  User  $user	
		 *
		 * @return  self
		 */ 
		public function setUser(User $User): self
		{
			$this->user = $user;

			return $this;
		}

		/**
		 * Get the type of Vote.
		 *
		 * @return VoteType
		 */ 
		public function getType(): VoteType
		{
			return $this->type;
		}

		/**
		 * Set the type of Vote.
		 *
		 * @param VoteType $type
		 *
		 * @return  self
		 */ 
		public function setType(VoteType $type)
		{
				$this->type = $type;

				return $this;
		}
	}
}
