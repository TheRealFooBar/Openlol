-- Enable foreign key pragma
-- This ensures that foreign key constraints are actually enforced
PRAGMA foreign_keys = ON;

-- Drop all tables in reverse order.
-- This means tables nobody depends on need to be dropped first.

Drop Table if exists "PostVote";
Drop Table if exists "CommentVote";
Drop Table if exists "Comment";
Drop Table if exists "Post";
Drop Table if exists "User";
Drop Table if exists "RolePermission";
Drop Table if exists "Role";
Drop Table if exists "Permission";

-- Create all tables in correct order.
-- This means tables that depend on nobody need to be created first.

Create Table "Permission"
(
	ID					Integer Primary Key Autoincrement,
	SystemName			Text	Not Null Unique,
	DisplayName			Text	Not Null,
	DisplayDescription	Text
);

Create Table "Role"
(ö
	ID			Integer	Primary Key Autoincrement,
	SystemName	Text	Not Null Unique,
	DisplayName	Text	Not Null
);

Create Table "RolePermission"
(
	Role		Integer	Not Null References Role(ID),
	Permission	Integer	Not Null References Permission(ID),
	Primary Key (Role, Permission)
);

Create Table "User"
(
	ID					Integer	Primary Key Autoincrement,
	DisplayName			Text	Not Null Unique,
	Role				Integer	Not Null References Role(ID),
	Avatar				Text,
	Email				Text	Not Null Unique,
	Password			Text	Not Null,
	PasswordAlgorithm	Integer Not Null
);

Create Table "Post"
(
	ID					Integer	Primary Key Autoincrement,
	Title				Text	Not Null,
	Creator				Integer	Not Null References User(ID),
	Image				Text	Not Null Unique,
	CreationTimestamp	Integer	Not Null Default (strftime('%s', 'now'))
);

Create Table "Comment"
(
	ID					Integer Primary Key Autoincrement,
	Post				Integer	Not Null References Post(ID),
	Creator				Integer	Not Null References User(ID),
	ReplyTo				Integer	References Comment(ID),
	Image				Text,
	Content				Text,
	CreationTimestamp	Integer	Not Null Default (strftime('%s', 'now')),
	CHECK ( NOT (Image IS NULL AND Content IS NULL))
);

Create Table "CommentVote"
(
	Comment	Integer	Not Null References Comment(ID),
	User	Integer Not Null References User(ID),
	Type	Integer	Not Null,
	Primary Key (Comment, User),
	Check (Type IN (1, -1))
);

Create Table "PostVote"
(
	Post	Integer	Not Null References Post(ID),
	User	Integer Not Null References User(ID),
	Type	Integer	Not Null,
	Primary Key (Post, User),
	Check (Type IN (1, -1))
);