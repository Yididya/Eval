USE evaldb;

CREATE TABLE Answers
(
	id INTEGER NOT NULL  AUTO_INCREMENT PRIMARY,
	question_id INTEGER NOT NULL,
	classroom_id INTEGER NOT NULL,
	response BIGINT NOT NULL,
	Primary key (id)
) ENGINE=InnoDB;




CREATE TABLE Classroom ( id INTEGER NOT NULL AUTO_INCREMENT, 
	instructor_id INTEGER NOT NULL,
	 academic_year VARCHAR(9) NOT NULL, 
	 semester INTEGER NOT NULL, 
	 course_id INTEGER NOT NULL, 
	 program_id INTEGER NOT NULL,
	 primary key(id) 
	  ) ENGINE=InnoDB







 CREATE TABLE Course ( id INTEGER NOT NULL AUTO_INCREMENT,
  course_code VARCHAR(100) NOT NULL,
   credit_hr INTEGER UNSIGNED NOT NULL,
    ects INTEGER UNSIGNED NOT NULL,
     dept_id INTEGER NOT NULL,
      primary key (id) 
  )

CREATE TABLE Department
(
	id INTEGER UNSIGNED AUTO_INCREMENT NOT NULL,
	dept_name VARCHAR(100)  NOT NULL,
	dept_head VARCHAR(100) NOT NULL,
	dept_type ENUM('School','Center') NOT NULL,
	primary key (id)
) ;



CREATE TABLE Instructor
(
	id INTEGER NOT NULL  AUTO_INCREMENT,
	instructor_name VARCHAR(100) NOT NULL,
	dept_id INTEGER NOT NULL,
	title VARCHAR(100) NOT NULL,
	primary key(id)
) ;


CREATE TABLE Program
(
	id INTEGER NOT NULL UNSIGNED AUTO_INCREMENT,
	dept_id SMALLINT NOT NULL,
	name VARCHAR(200) NOT NULL,
	stream VARCHAR(200) NOT NULL,
	program_type ENUM('regular','extension','summer') NOT NULL,
	degree_program ENUM('Undergraduate','Graduate','PhD','Certificate') NOT NULL,
	primary key (id)
) ;



CREATE TABLE Question
(
	id INTEGER NOT NULL UNSIGNED AUTO_INCREMENT,
	question VARCHAR(100) NOT NULL,
	primary key (id)
) ;





CREATE TABLE Registration
(
	id INTEGER NOT NULL AUTO_INCREMENT,
	student_id INTEGER NOT NULL,
	classroom_id INTEGER NOT NULL,
	has_rated ENUM('Rated','Unrated') NOT NULL,
	primary key (id)
) ENGINE=InnoDB;



CREATE TABLE Student
(
	id INTEGER NOT NULL AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	year INTEGER  NOT NULL,
	program_id INTEGER NOT NULL,
	student_id VARCHAR(20) NOT NULL,
	primary key (id)
) ENGINE=InnoDB;


CREATE TABLE User
(
	id INTEGER NOT NULL AUTO_INCREMENT,
	reg_date DATE NOT NULL,
	user_name VARCHAR(100) NOT NULL,
	user_type ENUM('student','admin') NOT NULL,
	password VARCHAR(100) NOT NULL,
	primary key (id)

) ENGINE=InnoDB;







ALTER TABLE Answers ADD CONSTRAINT fk_Answers_ClassRoom
	FOREIGN KEY (classroom_id) REFERENCES Classroom (id)
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Answers ADD CONSTRAINT fk_Answers_Question
	FOREIGN KEY (question_id) REFERENCES Question (id)   ########### done
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Classroom ADD CONSTRAINT fk_ClassRoom_Course
	FOREIGN KEY (course_id) REFERENCES Course (id)             ###########Done
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Classroom ADD CONSTRAINT fk_ClassRoom_Instructor
	FOREIGN KEY (instructor_id) REFERENCES Instructor (id)			#####Done
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Classroom ADD CONSTRAINT fk_Classroom_Program
	FOREIGN KEY (program_id) REFERENCES Program (id)			#####done
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Course ADD CONSTRAINT fk_Course_Department
	FOREIGN KEY (dept_id) REFERENCES Department (id)
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Instructor ADD CONSTRAINT fk_Instructor_Department
	FOREIGN KEY (dept_id) REFERENCES Department (id)
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Program ADD CONSTRAINT fk_Program_Department
	FOREIGN KEY (dept_id) REFERENCES Department (id)        #######Done
	ON UPDATE CASCADE ON DELETE CASCADE;

############### 	Done
ALTER TABLE Registration ADD CONSTRAINT fk_Registration_ClassRoom     
	FOREIGN KEY (classroom_id) REFERENCES Classroom (id)
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Registration ADD CONSTRAINT fk_Registration_Student
	FOREIGN KEY (student_id) REFERENCES Student (id)
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Student ADD CONSTRAINT fk_Student_Program
	FOREIGN KEY (program_id) REFERENCES Program (id)
	ON UPDATE CASCADE ON DELETE CASCADE;


ALTER TABLE Student ADD CONSTRAINT fk_Student_User
	FOREIGN KEY (user_id) REFERENCES User (id)
	ON UPDATE CASCADE ON DELETE CASCADE;






