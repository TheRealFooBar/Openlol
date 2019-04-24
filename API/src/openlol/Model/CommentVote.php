<?php

namespace Openlol\Model
{
	class CommentVote
	{
		// Properties

		/**
		 * Reference to the Comment to which the vote was cast.
		 * 
		 * @var Comment
		 */
		private $comment;

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
		 * Get the Comment which was voted on.
		 *
		 * @return Comment
		 */ 
		public function getComment(): Comment
		{
			return $this->comment;
		}

		/**
		 * Set the Comment which was voted on.
		 *
		 * @param $comment Comment
		 *
		 * @return self
		 */ 
		public function setComment(Comment $comment): self
		{
			$this->comment = $comment;

			return $this;
		}

		/**
		 * Get the User who voted on the Comment.
		 *
		 * @return  User
		 */ 
		public function getUser(): User
		{
			return $this->user;
		}

		/**
		 * Set the User who voted on the Comment.
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
