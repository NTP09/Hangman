CREATE SEQUENCE words_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;

CREATE TABLE words (
  id integer NOT NULL DEFAULT nextval('words_id_seq'::regclass),
  word text NOT NULL,
  PRIMARY KEY (id)
);

CREATE SEQUENCE users_id_seq
  START WITH 1
  INCREMENT BY 1
  NO MINVALUE
  NO MAXVALUE
  CACHE 1;

CREATE TABLE users (
  id integer NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  username text NOT NULL,
  password text NOT NULL, 
  wins int NOT NULL,
  PRIMARY KEY (id)
);