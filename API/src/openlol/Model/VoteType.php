<?php

namespace Openlol\Model
{

	// This is PHP at its best. You want to know how I would have done this shit in any other language?
	// With a fucking enum, like any other sane person would have either.
	// And it would have been so easy.
	// The code I would normally have written would look like this:
	//
	// enum VoteType
	// {
	//     Upvote = 1, Downvote = -1
	// }
	//
	// Guess what, that's all the magic. I would be able to define a set of values, but for some fucking reason, this is just too difficult for PHP to handle.
	// And keep in mind Java had enums since Java 1.5, C# had enums since version 1.0. THAT WAS IN 2002!
	// You want to know what I did in 2002? I was a stupid little kid and even I was able to make a list of stuff and tell you if something was part of that list or not.
	//
	// But PHP on the other hand was first written 1994, it's just as old as me. And again, it can't do fucking enumerations.
	// Even SPL_Types tried to do enumerations with their SplEnum class, but it only worked in PHP 5.4.
	// Never before, never after.
	// It's funny how even the official PHP website mentions that you should use SplEnum, but they don't mention it doesn't work with PHP 7.x.
	// Such a fucking shitshow.

	class VoteType
	{
		/**
		 * Private property which stores the Vote Type.
		 * 
		 * @var int
		 */
		private $__value;

		/**
		 * Represents an Upvote.
		 * 
		 * @var int
		 */
		const Upvote = 1;

		/**
		 * Represents a Downvote.
		 * 
		 * @var int
		 */
		const Downvote = -1;

		/**
		 * Constructs a new Vote Type.
		 * 
		 * Valid Parameters are:
		 * VoteType::Upvote
		 * VoteType::Downvote
		 */
		public function __construct($value)
		{
			if ($value !== VoteType::Upvote && $value !== VoteType::Downvote )
			{
				throw new \InvalidArgumentException("Invalid Value");
			}
			$this->__value = $value;
		}

		/**
		 * Returns the integer representation of the Vote.
		 * 
		 * @return int
		 */
		public function GetValue(): int
		{
			return $this->__value;
		}
	}
}