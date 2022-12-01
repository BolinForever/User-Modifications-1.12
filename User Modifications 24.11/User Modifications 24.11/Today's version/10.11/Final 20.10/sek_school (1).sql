CREATE DATABASE sek_school;

USE sek_school;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
);
ALTER TABLE users
	ADD name varchar(30) NOT NULL DEFAULT 'Janusz',
	ADD surname varchar(50) NOT NULL DEFAULT 'Kowalski',
	ADD age int(2) NOT NULL DEFAULT '0';

CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `added_by` int(11) NOT NULL,
  FOREIGN KEY (added_by) REFERENCES users(id)
);

CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `class_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  FOREIGN KEY (added_by) REFERENCES users(id)
);

CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `class_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  FOREIGN KEY (added_by) REFERENCES users(id)
);

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `added_by` int(11) NOT NULL,
  FOREIGN KEY (added_by) REFERENCES users(id)
);

ALTER TABLE student ADD CONSTRAINT student_class FOREIGN KEY (class_id) REFERENCES class(id);
ALTER TABLE subject ADD CONSTRAINT class_subject FOREIGN KEY (class_id) REFERENCES class(id);
ALTER TABLE teacher ADD CONSTRAINT teacher_subject FOREIGN KEY (id) REFERENCES subject(id);