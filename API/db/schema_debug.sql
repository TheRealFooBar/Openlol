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

Insert Into
	"Permission" (SystemName, DisplayName, DisplayDescription)
Values
	("PERM_CREATE_POST", "Can Create Post", "Allows a user to create a new post"),
	("PERM_DELETE_OTHER_POST", "Can Delete Other Posts", "Allows a user to delete posts created by other users"),
	("PERM_CHANGE_ROLE", "Can Change Roles", "Allows a user to change roles of other users");
	

Create Table "Role"
(
	ID			Integer	Primary Key Autoincrement,
	SystemName	Text	Not Null Unique,
	DisplayName	Text	Not Null
);

Insert Into
	"Role" (SystemName, DisplayName)
Values
	("ROLE_ADMIN", "Administrator"),
	("ROLE_MOD", "Moderator"),
	("ROLE_USER", "User");
	

Create Table "RolePermission"
(
	Role		Integer	Not Null References Role(ID),
	Permission	Integer	Not Null References Permission(ID),
	Primary Key (Role, Permission)
);

Insert Into
	"RolePermission" (Role, Permission)
	Select r.ID, p.ID
	From Role r
	Join Permission p On
		r.SystemName == 'ROLE_ADMIN'
		AND
		p.SystemName == 'PERM_CREATE_POST';
Insert Into
	"RolePermission" (Role, Permission)
	Select r.ID, p.ID
	From Role r
	Join Permission p On
		r.SystemName == 'ROLE_ADMIN'
		AND
		p.SystemName == 'PERM_DELETE_OTHER_POST';
Insert Into
	"RolePermission" (Role, Permission)
	Select r.ID, p.ID
	From Role r
	Join Permission p On
		r.SystemName == 'ROLE_ADMIN'
		AND
		p.SystemName == 'PERM_CHANGE_ROLE';
Insert Into
	"RolePermission" (Role, Permission)
	Select r.ID, p.ID
	From Role r
	Join Permission p On
		r.SystemName == 'ROLE_MOD'
		AND
		p.SystemName == 'PERM_CREATE_POST';
Insert Into
	"RolePermission" (Role, Permission)
	Select r.ID, p.ID
	From Role r
	Join Permission p On
		r.SystemName == 'ROLE_MOD'
		AND
		p.SystemName == 'PERM_DELETE_OTHER_POST';
Insert Into
	"RolePermission" (Role, Permission)
	Select r.ID, p.ID
	From Role r
	Join Permission p On
		r.SystemName == 'ROLE_USER'
		AND
		p.SystemName == 'PERM_CREATE_POST';


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

Insert or Fail Into
	"User" (DisplayName, Role, Avatar, Email, Password, PasswordAlgorithm)
Values
	("FooBar", (Select ID from Role where SystemName = 'ROLE_ADMIN'), null, "foobar@open.lol", "$argon2id$v=19$m=65536,t=20,p=4$c29tZXNhbHQ$xC/PTG8texJ/8OE46/4seC1jApCKURZu4KAGMfv4dBA", 1),
	("SomeMod", (Select ID from Role where SystemName = 'ROLE_MOD'), null, "somemod@email.com", "$argon2id$v=19$m=65536,t=20,p=4$c29tZXNhbHQ$NCd0+fyuu8ZEAP2E6iokn2JUxA8D+fAh6phTKgJXBEk", 1),
	("AnOpenlolUser", (Select ID from Role where SystemName = 'ROLE_USER'), null, "yeahBoiiii420@email.com", "$argon2id$v=19$m=65536,t=20,p=4$c29tZXNhbHQ$IpeZ35tyV3zuU5c4ACINKusm2HOK9h92Udg13AE/eGo", 1);


Create Table "Post"
(
	ID					Integer	Primary Key Autoincrement,
	Title				Text	Not Null,
	Creator				Integer	Not Null References User(ID),
	Image				Text	Not Null Unique,
	CreationTimestamp	Integer	Not Null Default (strftime('%s', 'now'))
);

Insert Into
	"Post" (Title, Creator, Image)
Values
	("Openlol is now open", (Select ID from User where DisplayName = 'FooBar'), "/dev/null/0"),
	("Pls obey rules", (Select ID from User where DisplayName = 'SomeMod'), "/dev/null/1"),
	("Gorepost 2599", (Select ID from User where DisplayName = 'AnOpenlolUser'), "/dev/null/2");


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

Insert Into
	"Comment" (Post, Creator, Content, Image)
VALUES
	(
		(Select p.ID from Post p join User u on p.Creator = u.ID where u.DisplayName = 'SomeMod' Limit 1),
		(Select ID From User where DisplayName = 'AnOpenlolUser'),
		"Haha, Mods gayyy!",
		NULL
	),
	(
		(Select p.ID from Post p join User u on p.Creator = u.ID where u.DisplayName = 'SomeMod' Limit 1),
		(Select ID From User where DisplayName = 'AnOpenlolUser'),
		NULL,
		"/dev/null/0"	
	);

Create Table "CommentVote"
(
	Comment	Integer	Not Null References Comment(ID),
	User	Integer Not Null References User(ID),
	Type	Integer	Not Null,
	Primary Key (Comment, User),
	Check (Type IN (1, -1))
);

Insert Into
	"CommentVote" (Comment, User, Type)
Values
	(
		(Select c.ID from Comment c Join User u on c.Creator = u.ID Where u.DisplayName = 'AnOpenlolUser' Limit 1),
		(Select ID from User where DisplayName = 'FooBar'),
		1
	),
	(
		(Select c.ID from Comment c Join User u on c.Creator = u.ID Where u.DisplayName = 'AnOpenlolUser' Limit 1),
		(Select ID from User where DisplayName = 'SomeMod'),
		-1
	),
	(
		(Select c.ID from Comment c Join User u on c.Creator = u.ID Where u.DisplayName = 'AnOpenlolUser' Limit 1),
		(Select ID from User where DisplayName = 'AnOpenlolUser'),
		1
	);

Create Table "PostVote"
(
	Post	Integer	Not Null References Post(ID),
	User	Integer Not Null References User(ID),
	Type	Integer	Not Null,
	Primary Key (Post, User),
	Check (Type IN (1, -1))
);

Insert Into
	"PostVote" (Post, User, Type)
Values
	(
		(Select p.ID from Post p Join User u on p.Creator = u.ID Where u.DisplayName = 'AnOpenlolUser' Limit 1),
		(Select ID from User where DisplayName = 'FooBar'),
		1
	),
	(
		(Select p.ID from Post p Join User u on p.Creator = u.ID Where u.DisplayName = 'AnOpenlolUser' Limit 1),
		(Select ID from User where DisplayName = 'SomeMod'),
		-1
	),
	(
		(Select p.ID from Post p Join User u on p.Creator = u.ID Where u.DisplayName = 'FooBar' Limit 1),
		(Select ID from User where DisplayName = 'FooBar'),
		1
	),
	(
		(Select p.ID from Post p Join User u on p.Creator = u.ID Where u.DisplayName = 'FooBar' Limit 1),
		(Select ID from User where DisplayName = 'SomeMod'),
		1
	),
	(
		(Select p.ID from Post p Join User u on p.Creator = u.ID Where u.DisplayName = 'FooBar' Limit 1),
		(Select ID from User where DisplayName = 'AnOpenlolUser'),
		1
	);