create database qav;
use qav;

CREATE TABLE videos (
      id             INT NOT NULL AUTO_INCREMENT,
      parentId       INT,
      bucket         VARCHAR(64) NOT NULL,
      fname          VARCHAR(128) NOT NULL,
      spec           VARCHAR(64),
      status         INT, 
      createTime     INT, 
      PRIMARY KEY    (id),
      UNIQUE INDEX (bucket, fname)
);

INSERT INTO videos(id, parentId, bucket, fname, spec, status, createTime) VALUES (123, 0, 'rwxf', '1.mp4', 'hls', 1, 1435380341);
