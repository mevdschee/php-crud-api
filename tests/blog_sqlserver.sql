IF (OBJECT_ID('FK_posts_users', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [posts] DROP CONSTRAINT [FK_posts_users]
END
GO
IF (OBJECT_ID('FK_posts_categories', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [posts] DROP CONSTRAINT [FK_posts_categories]
END
GO
IF (OBJECT_ID('FK_post_tags_tags', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [post_tags] DROP CONSTRAINT [FK_post_tags_tags]
END
GO
IF (OBJECT_ID('FK_post_tags_posts', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [post_tags] DROP CONSTRAINT [FK_post_tags_posts]
END
GO
IF (OBJECT_ID('FK_comments_posts', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [comments] DROP CONSTRAINT [FK_comments_posts]
END
GO
IF (OBJECT_ID('products', 'U') IS NOT NULL)
BEGIN
DROP TABLE [products]
END
GO
IF (OBJECT_ID('events', 'U') IS NOT NULL)
BEGIN
DROP TABLE [events]
END
GO
IF (OBJECT_ID('countries', 'U') IS NOT NULL)
BEGIN
DROP TABLE [countries]
END
GO
IF (OBJECT_ID('users', 'U') IS NOT NULL)
BEGIN
DROP TABLE [users]
END
GO
IF (OBJECT_ID('tags', 'U') IS NOT NULL)
BEGIN
DROP TABLE [tags]
END
GO
IF (OBJECT_ID('posts', 'U') IS NOT NULL)
BEGIN
DROP TABLE [posts]
END
GO
IF (OBJECT_ID('post_tags', 'U') IS NOT NULL)
BEGIN
DROP TABLE [post_tags]
END
GO
IF (OBJECT_ID('comments', 'U') IS NOT NULL)
BEGIN
DROP TABLE [comments]
END
GO
IF (OBJECT_ID('categories', 'U') IS NOT NULL)
BEGIN
DROP TABLE [categories]
END
GO
IF (OBJECT_ID('tag_usage', 'V') IS NOT NULL)
BEGIN
DROP VIEW [tag_usage]
END
GO
CREATE TABLE [categories](
	[id] [int] IDENTITY,
	[name] [nvarchar](max) NOT NULL,
	[icon] [varbinary](max) NULL,
PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [comments](
	[id] [int] IDENTITY,
	[post_id] [int] NOT NULL,
	[message] [nvarchar](max) NOT NULL,
PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [post_tags](
	[id] [int] IDENTITY,
	[post_id] [int] NOT NULL,
	[tag_id] [int] NOT NULL,
PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [posts](
	[id] [int] IDENTITY,
	[user_id] [int] NOT NULL,
	[category_id] [int] NOT NULL,
	[content] [nvarchar](max) NOT NULL,
PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [tags](
	[id] [int] IDENTITY,
	[name] [nvarchar](max) NOT NULL,
PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [users](
	[id] [int] IDENTITY,
	[username] [nvarchar](max) NOT NULL,
	[password] [nvarchar](max) NOT NULL,
	[location] [geometry] NULL,
 CONSTRAINT [PK_users] PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [countries](
	[id] [int] IDENTITY,
	[name] [nvarchar](max) NOT NULL,
	[shape] [geometry] NOT NULL,
 CONSTRAINT [PK_countries] PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [events](
	[id] [int] IDENTITY,
	[name] [nvarchar](max) NOT NULL,
	[datetime] [datetime2](3) NOT NULL,
 CONSTRAINT [PK_events] PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE VIEW [tag_usage]
AS
SELECT top 100 PERCENT name, COUNT(name) AS [count] FROM tags, post_tags WHERE tags.id = post_tags.tag_id GROUP BY name ORDER BY [count] DESC, name

GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [products](
	[id] [int] IDENTITY,
	[name] [nvarchar](max) NOT NULL,
	[price] [decimal](10,2) NOT NULL,
 CONSTRAINT [PK_products] PRIMARY KEY CLUSTERED
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET IDENTITY_INSERT [categories] ON
GO
INSERT [categories] ([id], [name], [icon]) VALUES (1, N'announcement', NULL)
GO
INSERT [categories] ([id], [name], [icon]) VALUES (2, N'article', NULL)
GO
SET IDENTITY_INSERT [categories] OFF
GO
SET IDENTITY_INSERT [comments] ON
GO
INSERT [comments] ([id], [post_id], [message]) VALUES (1, 1, N'great')
GO
INSERT [comments] ([id], [post_id], [message]) VALUES (2, 1, N'fantastic')
GO
INSERT [comments] ([id], [post_id], [message]) VALUES (3, 2, N'thank you')
GO
INSERT [comments] ([id], [post_id], [message]) VALUES (4, 2, N'awesome')
GO
SET IDENTITY_INSERT [comments] OFF
GO
SET IDENTITY_INSERT [post_tags] ON
GO
INSERT [post_tags] ([id], [post_id], [tag_id]) VALUES (1, 1, 1)
GO
INSERT [post_tags] ([id], [post_id], [tag_id]) VALUES (2, 1, 2)
GO
INSERT [post_tags] ([id], [post_id], [tag_id]) VALUES (3, 2, 1)
GO
INSERT [post_tags] ([id], [post_id], [tag_id]) VALUES (4, 2, 2)
GO
SET IDENTITY_INSERT [post_tags] OFF
GO
SET IDENTITY_INSERT [posts] ON
GO
INSERT [posts] ([id], [user_id], [category_id], [content]) VALUES (1, 1, 1, N'blog started')
GO
INSERT [posts] ([id], [user_id], [category_id], [content]) VALUES (2, 1, 2, N'It works!')
GO
SET IDENTITY_INSERT [posts] OFF
GO
SET IDENTITY_INSERT [tags] ON
GO
INSERT [tags] ([id], [name]) VALUES (1, N'funny')
GO
INSERT [tags] ([id], [name]) VALUES (2, N'important')
GO
SET IDENTITY_INSERT [tags] OFF
GO
SET IDENTITY_INSERT [users] ON
GO
INSERT [users] ([id], [username], [password], [location]) VALUES (1, N'user1', N'pass1', NULL)
GO
INSERT [users] ([id], [username], [password], [location]) VALUES (2, N'user2', N'pass2', NULL)
GO
SET IDENTITY_INSERT [users] OFF
GO
SET IDENTITY_INSERT [countries] ON
GO
INSERT [countries] ([id], [name], [shape]) VALUES (1, N'Left', N'POLYGON ((30 10, 40 40, 20 40, 10 20, 30 10))')
GO
INSERT [countries] ([id], [name], [shape]) VALUES (2, N'Right', N'POLYGON ((70 10, 80 40, 60 40, 50 20, 70 10))')
GO
SET IDENTITY_INSERT [countries] OFF
GO
SET IDENTITY_INSERT [events] ON
GO
INSERT [events] ([id], [name], [datetime]) VALUES (1, N'Launch', N'2016-01-01 13:01:01.111')
GO
SET IDENTITY_INSERT [events] OFF
GO
SET IDENTITY_INSERT [products] ON
GO
INSERT [products] ([id], [name], [price]) VALUES (1, N'Calculator', N'23.01')
GO
SET IDENTITY_INSERT [products] OFF
GO
ALTER TABLE [comments]  WITH CHECK ADD  CONSTRAINT [FK_comments_posts] FOREIGN KEY([post_id])
REFERENCES [posts] ([id])
GO
ALTER TABLE [comments] CHECK CONSTRAINT [FK_comments_posts]
GO
ALTER TABLE [post_tags]  WITH CHECK ADD  CONSTRAINT [FK_post_tags_posts] FOREIGN KEY([post_id])
REFERENCES [posts] ([id])
GO
ALTER TABLE [post_tags] CHECK CONSTRAINT [FK_post_tags_posts]
GO
ALTER TABLE [post_tags]  WITH CHECK ADD  CONSTRAINT [FK_post_tags_tags] FOREIGN KEY([tag_id])
REFERENCES [tags] ([id])
GO
ALTER TABLE [post_tags] CHECK CONSTRAINT [FK_post_tags_tags]
GO
ALTER TABLE [posts]  WITH CHECK ADD  CONSTRAINT [FK_posts_categories] FOREIGN KEY([category_id])
REFERENCES [categories] ([id])
GO
ALTER TABLE [posts] CHECK CONSTRAINT [FK_posts_categories]
GO
ALTER TABLE [posts]  WITH CHECK ADD  CONSTRAINT [FK_posts_users] FOREIGN KEY([user_id])
REFERENCES [users] ([id])
GO
ALTER TABLE [posts] CHECK CONSTRAINT [FK_posts_users]
GO
