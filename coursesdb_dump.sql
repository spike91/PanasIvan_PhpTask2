CREATE TABLE courses.tcourse
(
course_id serial not null,
course_code varchar(6) not null,
course_name varchar(50) not null,
course_description varchar(255),
constraint tcourse_pkey PRIMARY KEY (course_id)
);

CREATE TABLE courses.tstudent
(
  code_student character(6) NOT NULL,
  personal_id personal_id NOT NULL,
  firstname character varying(50) NOT NULL,
  lastname character varying(50) NOT NULL,
  phonenumber character varying(20),
  code_group character(6) NOT NULL,
  city character varying,
  email character varying(50),
  isactive boolean NOT NULL,
  languages text[] NOT NULL DEFAULT ARRAY['Eesti'::text],
  CONSTRAINT tstudent_pkey PRIMARY KEY (code_student),
  CONSTRAINT tstudent_personalid_key UNIQUE (personal_id),
  CONSTRAINT check_code CHECK (code_student ~ '[0-9]{6}'::text),
  CONSTRAINT check_personalid CHECK (personal_id::text ~ '[0-9]{11}'::text)
);

CREATE TABLE courses.tlanguage
(
  language_id serial NOT NULL,
  language_name varchar(50) NOT NULL,
  CONSTRAINT tlanguage_pkey PRIMARY KEY (language_id),
  CONSTRAINT tlanguage_language_name UNIQUE (language_name)
);

CREATE TABLE courses.tcourse_language
(
  course_id_fk int NOT NULL,
  language_id_fk int NOT NULL,
  CONSTRAINT tcourse_language_pkey PRIMARY KEY (language_id_fk, course_id_fk)
);

