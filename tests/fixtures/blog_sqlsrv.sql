IF (OBJECT_ID('FK_barcodes_products', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [barcodes] DROP	CONSTRAINT [FK_barcodes_products]
END
GO

IF (OBJECT_ID('FK_posts_users', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [posts] DROP	CONSTRAINT [FK_posts_users]
END
GO

IF (OBJECT_ID('FK_posts_categories', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [posts] DROP	CONSTRAINT [FK_posts_categories]
END
GO

IF (OBJECT_ID('FK_post_tags_tags', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [post_tags] DROP	CONSTRAINT [FK_post_tags_tags]
END
GO

IF (OBJECT_ID('FK_post_tags_posts', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [post_tags] DROP	CONSTRAINT [FK_post_tags_posts]
END
GO

IF (OBJECT_ID('FK_comments_posts', 'F') IS NOT NULL)
BEGIN
ALTER TABLE [comments] DROP	CONSTRAINT [FK_comments_posts]
END
GO

IF (OBJECT_ID('barcodes2', 'U') IS NOT NULL)
BEGIN
DROP TABLE [barcodes2]
END
GO

IF (OBJECT_ID('barcodes', 'U') IS NOT NULL)
BEGIN
DROP TABLE [barcodes]
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

IF (OBJECT_ID('kunsthåndværk', 'U') IS NOT NULL)
BEGIN
DROP TABLE [kunsthåndværk]
END
GO

IF (OBJECT_ID('invisibles', 'U') IS NOT NULL)
BEGIN
DROP TABLE [kunsthåndværk]
END
GO

CREATE TABLE [categories](
	[id] [int] IDENTITY,
	[name] [nvarchar](255) NOT NULL,
	[icon] [varbinary](max) NULL,
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [comments](
	[id] [int] IDENTITY,
	[post_id] [int] NOT NULL,
	[message] [nvarchar](255) NOT NULL,
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [post_tags](
	[id] [int] IDENTITY,
	[post_id] [int] NOT NULL,
	[tag_id] [int] NOT NULL,
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [posts](
	[id] [int] IDENTITY,
	[user_id] [int] NOT NULL,
	[category_id] [int] NOT NULL,
	[content] [nvarchar](255) NOT NULL,
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [tags](
	[id] [int] IDENTITY,
	[name] [nvarchar](255) NOT NULL,
	[is_important] [bit] NOT NULL,
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [users](
	[id] [int] IDENTITY,
	[username] [nvarchar](255) NOT NULL,
	[password] [nvarchar](255) NOT NULL,
	[location] [geometry] NULL,
	CONSTRAINT [PK_users]
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [countries](
	[id] [int] IDENTITY,
	[name] [nvarchar](255) NOT NULL,
	[shape] [geometry] NOT NULL,
	CONSTRAINT [PK_countries]
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [events](
	[id] [int] IDENTITY,
	[name] [nvarchar](255) NOT NULL,
	[datetime] [datetime2](0) NOT NULL,
	[visitors] [int] NOT NULL,
	CONSTRAINT [PK_events]
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE VIEW [tag_usage]
AS
SELECT top 100 PERCENT name, COUNT(name) AS [count] FROM tags, post_tags WHERE tags.id = post_tags.tag_id GROUP BY name ORDER BY [count] DESC, name
GO

CREATE TABLE [products](
	[id] [int] IDENTITY,
	[name] [nvarchar](255) NOT NULL,
	[price] [decimal](10,2) NOT NULL,
	[properties] [xml] NOT NULL,
	[created_at] [datetime2](0) NOT NULL,
	[deleted_at] [datetime2](0) NULL,
	CONSTRAINT [PK_products]
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [barcodes](
	[id] [int] IDENTITY,
	[product_id] [int] NOT NULL,
	[hex] [nvarchar](255) NOT NULL,
	[bin] [varbinary](max) NOT NULL,
	CONSTRAINT [PK_barcodes]
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [kunsthåndværk](
	[id] [nvarchar](36),
	[Umlauts ä_ö_ü-COUNT] [int] NOT NULL,
	[invisible] [nvarchar](36),
	CONSTRAINT [PK_kunsthåndværk]
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

CREATE TABLE [invisibles](
	[id] [nvarchar](36),
	CONSTRAINT [PK_invisibles]
	PRIMARY KEY CLUSTERED([id] ASC)
)
GO

INSERT [categories] ([name], [icon]) VALUES (N'announcement', NULL)
GO
INSERT [categories] ([name], [icon]) VALUES (N'article', NULL)
GO

INSERT [comments] ([post_id], [message]) VALUES (1, N'great')
GO
INSERT [comments] ([post_id], [message]) VALUES (1, N'fantastic')
GO
INSERT [comments] ([post_id], [message]) VALUES (2, N'thank you')
GO
INSERT [comments] ([post_id], [message]) VALUES (2, N'awesome')
GO

INSERT [post_tags] ([post_id], [tag_id]) VALUES (1, 1)
GO
INSERT [post_tags] ([post_id], [tag_id]) VALUES (1, 2)
GO
INSERT [post_tags] ([post_id], [tag_id]) VALUES (2, 1)
GO
INSERT [post_tags] ([post_id], [tag_id]) VALUES (2, 2)
GO

INSERT [posts] ([user_id], [category_id], [content]) VALUES (1, 1, N'blog started')
GO
INSERT [posts] ([user_id], [category_id], [content]) VALUES (1, 2, N'It works!')
GO

INSERT [tags] ([name], [is_important]) VALUES (N'funny', 0)
GO
INSERT [tags] ([name], [is_important]) VALUES (N'important', 1)
GO

INSERT [users] ([username], [password], [location]) VALUES (N'user1', N'pass1', NULL)
GO
INSERT [users] ([username], [password], [location]) VALUES (N'user2', N'pass2', NULL)
GO

INSERT [countries] ([name], [shape]) VALUES (N'Left', N'POLYGON ((30 10, 40 40, 20 40, 10 20, 30 10))')
GO
INSERT [countries] ([name], [shape]) VALUES (N'Right', N'POLYGON ((70 10, 80 40, 60 40, 50 20, 70 10))')
GO

INSERT [events] ([name], [datetime], [visitors]) VALUES (N'Launch', N'2016-01-01 13:01:01', 0)
GO

INSERT [products] ([name], [price], [properties], [created_at]) VALUES (N'Calculator', N'23.01', N'<root type="object"><depth type="boolean">false</depth><model type="string">TRX-120</model><width type="number">100</width><height type="null" /></root>', '1970-01-01 01:01:01')
GO

INSERT [barcodes] ([product_id], [hex], [bin]) VALUES (1, N'00ff01', 0x00ff01)
GO

INSERT [kunsthåndværk] ([id], [Umlauts ä_ö_ü-COUNT], [invisible]) VALUES ('e42c77c6-06a4-4502-816c-d112c7142e6d', 1, NULL)
GO

INSERT [invisibles] ([id]) VALUES ('e42c77c6-06a4-4502-816c-d112c7142e6d')
GO

ALTER TABLE [comments]  WITH CHECK ADD 	CONSTRAINT [FK_comments_posts] FOREIGN KEY([post_id])
REFERENCES [posts] ([id])
GO
ALTER TABLE [comments] CHECK	CONSTRAINT [FK_comments_posts]
GO

ALTER TABLE [post_tags]  WITH CHECK ADD 	CONSTRAINT [FK_post_tags_posts] FOREIGN KEY([post_id])
REFERENCES [posts] ([id])
GO
ALTER TABLE [post_tags] CHECK	CONSTRAINT [FK_post_tags_posts]
GO

ALTER TABLE [post_tags]  WITH CHECK ADD 	CONSTRAINT [FK_post_tags_tags] FOREIGN KEY([tag_id])
REFERENCES [tags] ([id])
GO
ALTER TABLE [post_tags] CHECK	CONSTRAINT [FK_post_tags_tags]
GO

ALTER TABLE [posts]  WITH CHECK ADD 	CONSTRAINT [FK_posts_categories] FOREIGN KEY([category_id])
REFERENCES [categories] ([id])
GO
ALTER TABLE [posts] CHECK	CONSTRAINT [FK_posts_categories]
GO

ALTER TABLE [posts]  WITH CHECK ADD 	CONSTRAINT [FK_posts_users] FOREIGN KEY([user_id])
REFERENCES [users] ([id])
GO
ALTER TABLE [posts] CHECK	CONSTRAINT [FK_posts_users]
GO

ALTER TABLE [barcodes]  WITH CHECK ADD 	CONSTRAINT [FK_barcodes_products] FOREIGN KEY([product_id])
REFERENCES [products] ([id])
GO
ALTER TABLE [barcodes] CHECK	CONSTRAINT [FK_barcodes_products]
GO

ALTER TABLE [kunsthåndværk]  WITH CHECK ADD 	CONSTRAINT [UC_kunsthåndværk_Umlauts ä_ö_ü-COUNT] UNIQUE([Umlauts ä_ö_ü-COUNT])
GO
