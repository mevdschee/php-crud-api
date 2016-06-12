-- Adminer 4.2.4 SQLite 3 dump

DROP TABLE IF EXISTS "categories";
CREATE TABLE "categories" (
  "id" integer NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" text(255) NOT NULL,
  "icon" blob NULL
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
  `password` text(255) NOT NULL
);

INSERT INTO "users" ("id", "username", "password") VALUES (1,	'user1',	'pass1');
INSERT INTO "users" ("id", "username", "password") VALUES (2,	'user2',	'pass2');

--
