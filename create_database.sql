CREATE TABLE gallery(
    idGallery int(11) AUTO_INCREMENT PRIMARY KEY not null,
    titleGallery LONGTEXT not null,
    projectGallery LONGTEXT not null,
    imgFullNameGallery LONGTEXT not null,
    orderGallery LONGTEXT not null
)

CREATE TABLE users(
    users_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    users_uid TINYTEXT not null,
    users_pwd LONGTEXT not null,
    users_email LONGTEXT not null,
    users_role TINYTEXT not null
)

-- Create database with terminal :
-- mysql -u database_username -p database_name < create_database.sql

