--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Drop everything
--

DROP TABLE IF EXISTS categories CASCADE;
DROP TABLE IF EXISTS comments CASCADE;
DROP TABLE IF EXISTS post_tags CASCADE;
DROP TABLE IF EXISTS posts CASCADE;
DROP TABLE IF EXISTS tags CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS countries CASCADE;
DROP TABLE IF EXISTS events CASCADE;
DROP VIEW IF EXISTS tag_usage;
DROP TABLE IF EXISTS products CASCADE;
DROP TABLE IF EXISTS barcodes CASCADE;
DROP TABLE IF EXISTS barcodes2 CASCADE;
DROP TABLE IF EXISTS "kunsthåndværk" CASCADE;
DROP TABLE IF EXISTS invisibles CASCADE;
DROP TABLE IF EXISTS nopk CASCADE;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE categories (
    id serial NOT NULL,
    name character varying(255) NOT NULL,
    icon bytea
);


--
-- Name: comments; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE comments (
    id bigserial NOT NULL,
    post_id integer NOT NULL,
    message character varying(255) NOT NULL,
    category_id integer NOT NULL    
);


--
-- Name: post_tags; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE post_tags (
    id serial NOT NULL,
    post_id integer NOT NULL,
    tag_id integer NOT NULL
);


--
-- Name: posts; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE posts (
    id serial NOT NULL,
    user_id integer NOT NULL,
    category_id integer NOT NULL,
    content character varying(255) NOT NULL
);


--
-- Name: tags; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE tags (
    id serial NOT NULL,
    name character varying(255) NOT NULL,
    is_important boolean NOT NULL
);


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE users (
    id serial NOT NULL,
    username character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    location geometry
);

--
-- Name: countries; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE countries (
    id serial NOT NULL,
    name character varying(255) NOT NULL,
    shape geometry NOT NULL
);

--
-- Name: events; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE events (
    id serial NOT NULL,
    name character varying(255) NOT NULL,
    datetime timestamp,
    visitors bigint
);

--
-- Name: tag_usage; Type: VIEW; Schema: public; Owner: postgres; Tablespace:
--

CREATE VIEW "tag_usage" AS select "name", count("name") AS "count" from "tags", "post_tags" where "tags"."id" = "post_tags"."tag_id" group by "name" order by "count" desc, "name";

--
-- Name: products; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE products (
    id serial NOT NULL,
    name character varying(255) NOT NULL,
    price decimal(10,2) NOT NULL,
    properties jsonb NOT NULL,
    created_at timestamp NOT NULL,
    deleted_at timestamp NULL
);

--
-- Name: barcodes; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE barcodes (
    id serial NOT NULL,
    product_id integer NOT NULL,
    hex character varying(255) NOT NULL,
    bin bytea NOT NULL,
    ip_address character varying(15)
);

--
-- Name: kunsthåndværk; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE "kunsthåndværk" (
  id character varying(36) NOT NULL,
  "Umlauts ä_ö_ü-COUNT" integer NOT NULL,
  user_id integer NOT NULL,
  invisible character varying(36)
);

--
-- Name: invisibles; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE "invisibles" (
  id character varying(36) NOT NULL
);

--
-- Name: nopk; Type: TABLE; Schema: public; Owner: postgres; Tablespace:
--

CREATE TABLE "nopk" (
  id character varying(36) NOT NULL
);

--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "categories" ("name", "icon") VALUES
('announcement',	NULL),
('article',	NULL),
('comment',	NULL);

--
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "comments" ("post_id", "message", "category_id") VALUES
(1,	'great', 3),
(1,	'fantastic', 3),
(2,	'thank you', 3),
(2,	'awesome', 3);

--
-- Data for Name: post_tags; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "post_tags" ("post_id", "tag_id") VALUES
(1,	1),
(1,	2),
(2,	1),
(2,	2);

--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "posts" ("user_id", "category_id", "content") VALUES
(1,	1,	'blog started'),
(1,	2,	'It works!');

--
-- Data for Name: tags; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "tags" ("name", "is_important") VALUES
('funny', false),
('important', true);

--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "users" ("username", "password", "location") VALUES
('user1',	'pass1',	NULL),
('user2',	'pass2',	NULL);

--
-- Data for Name: countries; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "countries" ("name", "shape") VALUES
('Left',	ST_GeomFromText('POLYGON ((30 10, 40 40, 20 40, 10 20, 30 10))')),
('Right',	ST_GeomFromText('POLYGON ((70 10, 80 40, 60 40, 50 20, 70 10))'));

--
-- Data for Name: events; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "events" ("name", "datetime", "visitors") VALUES
('Launch',	'2016-01-01 13:01:01',	0);

--
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "products" ("name", "price", "properties", "created_at") VALUES
('Calculator',	'23.01', '{"depth":false,"model":"TRX-120","width":100,"height":null}', '1970-01-01 01:01:01');

--
-- Data for Name: barcodes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "barcodes" ("product_id", "hex", "bin", "ip_address") VALUES
(1,	'00ff01', E'\\x00ff01',	'127.0.0.1');

--
-- Data for Name: kunsthåndværk; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "kunsthåndværk" ("id", "Umlauts ä_ö_ü-COUNT", "user_id", "invisible") VALUES
('e42c77c6-06a4-4502-816c-d112c7142e6d', 1, 1, NULL),
('e31ecfe6-591f-4660-9fbd-1a232083037f', 2, 2, NULL);

--
-- Data for Name: invisibles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "invisibles" ("id") VALUES
('e42c77c6-06a4-4502-816c-d112c7142e6d');

--
-- Data for Name: nopk; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO "nopk" ("id") VALUES
('e42c77c6-06a4-4502-816c-d112c7142e6d');

--
-- Name: categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: comments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);


--
-- Name: post_tags_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY post_tags
    ADD CONSTRAINT post_tags_pkey PRIMARY KEY (id);


--
-- Name: post_tags_post_id_tag_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY post_tags
    ADD CONSTRAINT post_tags_post_id_tag_id_key UNIQUE (post_id, tag_id);


--
-- Name: posts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id);


--
-- Name: tags_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY tags
    ADD CONSTRAINT tags_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);

--
-- Name: countries_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (id);


--
-- Name: events_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY events
    ADD CONSTRAINT events_pkey PRIMARY KEY (id);


--
-- Name: products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- Name: barcodes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY barcodes
    ADD CONSTRAINT barcodes_pkey PRIMARY KEY (id);

--
-- Name: kunsthåndværk_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY "kunsthåndværk"
    ADD CONSTRAINT "kunsthåndværk_pkey" PRIMARY KEY (id);

--
-- Name: invisibles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace:
--

ALTER TABLE ONLY "invisibles"
    ADD CONSTRAINT "invisibles_pkey" PRIMARY KEY (id);

--
-- Name: comments_post_id_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX comments_post_id_idx ON comments USING btree (post_id);

--
-- Name: comments_category_id_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX comments_category_id_idx ON comments USING btree (category_id);


--
-- Name: post_tags_post_id_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX post_tags_post_id_idx ON post_tags USING btree (post_id);


--
-- Name: post_tags_tag_id_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX post_tags_tag_id_idx ON post_tags USING btree (tag_id);


--
-- Name: posts_category_id_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX posts_category_id_idx ON posts USING btree (category_id);


--
-- Name: posts_user_id_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX posts_user_id_idx ON posts USING btree (user_id);


--
-- Name: barcodes_product_id_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX barcodes_product_id_idx ON barcodes USING btree (product_id);


--
-- Name: kunsthåndværk_Umlauts ä_ö_ü-COUNT_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX "kunsthåndværk_Umlauts ä_ö_ü-COUNT_idx" ON "kunsthåndværk" USING btree ("Umlauts ä_ö_ü-COUNT");


--
-- Name: kunsthåndværk_user_id_idx; Type: INDEX; Schema: public; Owner: postgres; Tablespace:
--

CREATE INDEX "kunsthåndværk_user_id_idx" ON "kunsthåndværk" USING btree (user_id);


--
-- Name: comments_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comments_post_id_fkey FOREIGN KEY (post_id) REFERENCES posts(id);


--
-- Name: comments_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comments_category_id_fkey FOREIGN KEY (category_id) REFERENCES categories(id);


--
-- Name: post_tags_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY post_tags
    ADD CONSTRAINT post_tags_post_id_fkey FOREIGN KEY (post_id) REFERENCES posts(id);


--
-- Name: post_tags_tag_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY post_tags
    ADD CONSTRAINT post_tags_tag_id_fkey FOREIGN KEY (tag_id) REFERENCES tags(id);


--
-- Name: posts_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY posts
    ADD CONSTRAINT posts_category_id_fkey FOREIGN KEY (category_id) REFERENCES categories(id);


--
-- Name: posts_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY posts
    ADD CONSTRAINT posts_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: barcodes_product_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY barcodes
    ADD CONSTRAINT barcodes_product_id_fkey FOREIGN KEY (product_id) REFERENCES products(id);


--
-- Name: kunsthåndværk_Umlauts ä_ö_ü-COUNT_uc; Type: UNIQUE CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "kunsthåndværk"
    ADD CONSTRAINT "kunsthåndværk_Umlauts ä_ö_ü-COUNT_uc" UNIQUE ("Umlauts ä_ö_ü-COUNT");

--
-- Name: kunsthåndværk_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "kunsthåndværk"
    ADD CONSTRAINT "kunsthåndværk_user_id_fkey" FOREIGN KEY (user_id) REFERENCES users(id);


--
-- PostgreSQL database dump complete
--
