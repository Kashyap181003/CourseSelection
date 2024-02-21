CREATE TABLE courses (
  course_id VARCHAR(10) PRIMARY KEY,
  topic VARCHAR(255),
  number_of_attendees INT,
  modality VARCHAR(100),
  credits INT
) 

INSERT INTO courses (course_id, topic, number_of_attendees, modality, credits) VALUES
('CSIT101', 'Introduction to Computer Science', 30, 'In Person', 3),
('CSIT102', 'Fundamentals of Programming', 30, 'Online', 4),
('CSIT103', 'Basic Web Development', 35, 'In Person', 3),
('CSIT104', 'Introduction to Databases', 25, 'Online', 4),
('CSIT105', 'Computer Systems and Hardware', 30, 'In Person', 3),
('CSIT106', 'Foundations of Network Technology', 30, 'Online', 3),
('CSIT107', 'Principles of Software Engineering', 25, 'In Person', 4),
('CSIT108', 'Operating Systems Basics', 30, 'Online', 4),
('CSIT109', 'Data Structures and Algorithms', 35, 'In Person', 4),
('CSIT110', 'Cybersecurity Fundamentals', 25, 'In Person', 3),
('CSIT111', 'Digital Logic and Design', 30, 'In Person', 3),
('CSIT112', 'Object-Oriented Programming', 30, 'In Person', 4),
('CSIT113', 'Introduction to Cloud Computing', 25, 'In Person', 3),
('CSIT114', 'Human-Computer Interaction', 30, 'In Person', 3),
('CSIT115', 'Mobile Application Development', 25, 'In Person', 4),
('CSIT116', 'Introduction to Machine Learning', 30, 'In Person', 4),
('CSIT117', 'Computer Graphics and Visualization', 25, 'In Person', 3),
('CSIT118', 'Artificial Intelligence Basics', 30, 'Online', 4),
('CSIT119', 'Ethical Hacking and Network Security', 25, 'Online', 4),
('CSIT120', 'Big Data and Analytics', 30, 'In Person', 3);
