-- Adminer 4.2.4 SQLite 3 dump

DROP TABLE IF EXISTS "categories";
CREATE TABLE "categories" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" text(255) NOT NULL,
  "icon" data NULL
);

INSERT INTO "categories" ("id", "name", "icon") VALUES (1,	'announcement',	NULL);
INSERT INTO "categories" ("id", "name", "icon") VALUES (2,	'article',	NULL);

DROP TABLE IF EXISTS "comments";
CREATE TABLE "comments" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "post_id" integer NOT NULL,
  "message" text NOT NULL,
  FOREIGN KEY ("post_id") REFERENCES "posts" ("id")
);

CREATE INDEX "comments_post_id" ON "comments" ("post_id");

INSERT INTO "comments" ("id", "post_id", "message") VALUES (1,	1,	'great');
INSERT INTO "comments" ("id", "post_id", "message") VALUES (2,	1,	'fantastic');
INSERT INTO "comments" ("id", "post_id", "message") VALUES (3,	2,	'thank you');
INSERT INTO "comments" ("id", "post_id", "message") VALUES (4,	2,	'awesome');

DROP TABLE IF EXISTS "post_tags";
CREATE TABLE "post_tags" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "post_id" integer NOT NULL,
  "tag_id" integer NOT NULL,
  FOREIGN KEY ("tag_id") REFERENCES "tags" ("id"),
  FOREIGN KEY ("post_id") REFERENCES "posts" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE UNIQUE INDEX "post_tags_post_id_tag_id" ON "post_tags" ("post_id", "tag_id");

INSERT INTO "post_tags" ("id", "post_id", "tag_id") VALUES (1,	1,	1);
INSERT INTO "post_tags" ("id", "post_id", "tag_id") VALUES (2,	1,	2);
INSERT INTO "post_tags" ("id", "post_id", "tag_id") VALUES (3,	2,	1);
INSERT INTO "post_tags" ("id", "post_id", "tag_id") VALUES (4,	2,	2);

DROP TABLE IF EXISTS "posts";
CREATE TABLE "posts" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "user_id" integer NOT NULL,
  "category_id" integer NOT NULL,
  "content" text NOT NULL,
  FOREIGN KEY ("user_id") REFERENCES "users" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT,
  FOREIGN KEY ("category_id") REFERENCES "categories" ("id") ON DELETE RESTRICT ON UPDATE RESTRICT
);

CREATE INDEX "posts_user_id" ON "posts" ("user_id");

CREATE INDEX "posts_category_id" ON "posts" ("category_id");

INSERT INTO "posts" ("id", "user_id", "category_id", "content") VALUES (1,	1,	1,	'blog started');
INSERT INTO "posts" ("id", "user_id", "category_id", "content") VALUES (2,	1,	2,	'It works!');

DROP TABLE IF EXISTS "tags";
CREATE TABLE `tags` (
  `id` integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  `name` text(255) NOT NULL
);

INSERT INTO "tags" ("id", "name") VALUES (1,	'funny');
INSERT INTO "tags" ("id", "name") VALUES (2,	'important');

DROP TABLE IF EXISTS "users";
CREATE TABLE `users` (
  `id` integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  `username` text(255) NOT NULL,
  `password` text(255) NOT NULL,
  `location` text(255) NULL
);

INSERT INTO "users" ("id", "username", "password", "location") VALUES (1,	'user1',	'pass1',	NULL);
INSERT INTO "users" ("id", "username", "password", "location") VALUES (2,	'user2',	'pass2',	NULL);

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  `name` text(255) NOT NULL,
  `shape` text(255) NOT NULL
);

INSERT INTO `countries` (`id`, `name`, `shape`) VALUES (1,	'Left',	'POLYGON ((30 10, 40 40, 20 40, 10 20, 30 10))');
INSERT INTO `countries` (`id`, `name`, `shape`) VALUES (2,	'Right',	'POLYGON ((70 10, 80 40, 60 40, 50 20, 70 10))');

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  `name` text(255) NOT NULL,
  `datetime` datetime NOT NULL
);

INSERT INTO `events` (`id`, `name`, `datetime`) VALUES (1,	'Launch',	'2016-01-01 13:01:01.111');

DROP VIEW IF EXISTS `tag_usage`;
CREATE VIEW `tag_usage` AS select `name`, count(`name`) AS `count` from `tags`, `post_tags` where `tags`.`id` = `post_tags`.`tag_id` group by `name` order by `count` desc, `name`;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  `name` text(255) NOT NULL,
  `price` text(12) NOT NULL
);

INSERT INTO `products` (`id`, `name`, `price`) VALUES (1,	'Calculator', '23.01');

--
