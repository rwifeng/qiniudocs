create database qspace;
use qspace;
CREATE TABLE users (
      uid            INT NOT NULL AUTO_INCREMENT,
      uname          VARCHAR(128) NOT NULL,
      password       VARCHAR(128) NOT NULL,
      status         INT, 
      PRIMARY KEY (uid)
);

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

INSERT INTO users (uid, uname, password, status) VALUES (123456, 'rwf', 'feng', 1);
