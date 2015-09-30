# μms Database

# -----------------
# Create User Table
# -----------------

CREATE TABLE `user` (
    uid int(11) AUTO_INCREMENT NOT null,
    username varchar(20) NOT null,
    email varchar(50) NOT null,
    password varchar(100) NOT null,
    groupid int(11) NOT null,

    PRIMARY KEY (uid),
    UNIQUE username(username),
    UNIQUE email(email)
) DEFAULT CHARSET = utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `userprofile` (
    uid int(11) NOT null,
    score int(11) NOT null,
    avatar text NOT null,

    PRIMARY KEY (uid),
    INDEX score(score)
) DEFAULT CHARSET = utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `userlog` (
    uid int(11) NOT null,
    type int(11) NOT null,
    logtime DATETIME NOT null,
    description varchar(50),

    PRIMARY KEY (uid),
    INDEX log(uid, type)
) DEFAULT CHARSET = utf8mb4 COLLATE utf8mb4_unicode_ci;

# Update

# ------------------
# Create Token Table
# ------------------

CREATE TABLE `usertoken` (
    tokenid int(11) NOT null AUTO_INCREMENT,
    PRIMARY KEY (tokenid),
    authdata BLOB,
    expire_at DATETIME
) DEFAULT CHARSET = utf8mb4 COLLATE utf8mb4_unicode_ci;
