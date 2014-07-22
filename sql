CREATE TABLE navigation (
    id serial PRIMARY KEY,
	name VARCHAR (255) NOT NULL,
	parent integer NOT NULL,
    table_constraint text
); 

CREATE TABLE navigation_links (
    id integer PRIMARY KEY,
	url VARCHAR (255) NOT NULL,
	CONSTRAINT navigation_links_fkey FOREIGN KEY (id)
      REFERENCES navigation (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

INSERT INTO navigation (name, parent)
VALUES
 ('אודות',0),
 ('חסד','0'),
 ('ועדות הישוב','0'),
 ('חברה','0'),
 ('עסקים','0'),
 ('תחבורה','0'),
 ('מבנה פיס','0'),
 ('מספר טלפונים','0'),
 ('דת','4'),
 ('חינוך','4');
 
 INSERT INTO navigation_links (id, url)
VALUES
(1,'google.com'),
(2,'example.com');

-- [would need to insert a url for each menu id]