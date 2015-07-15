create database qspace;
use qspace;
CREATE TABLE users (
      uid            INT NOT NULL AUTO_INCREMENT,
      uname          VARCHAR(128) NOT NULL,
      password       VARCHAR(128) NOT NULL,
      status         INT,   #1: active; 0: disabled。 
      type           INT,   #1: admin;  0: ordinary。 
      PRIMARY KEY (uid)  
);
INSERT INTO users (uid, uname, password, status, type) VALUES (123456, 'rwf', 'QixHIQJYZI7Zo', 1, 0);
INSERT INTO users (uid, uname, password, status, type) VALUES (123456, 'qn', 'QixHIQJYZI7Zo', 1, 1);

CREATE TABLE files_info (
      id             INT NOT NULL AUTO_INCREMENT,
      uid            INT NOT NULL,
      fname          VARCHAR(512) NOT NULL,
      fkey           VARCHAR(512) NOT NULL,
      createTime     INT, 
      description    VARCHAR(1024), 
      PRIMARY KEY (id),
      FOREIGN KEY (uid) REFERENCES users(uid),
      UNIQUE INDEX (id)
);

INSERT INTO files_info (uid, fname, fkey, createTime, description) VALUES (123456, 'mv', '1.png', 1436929394, 'this is a demo pic!');
