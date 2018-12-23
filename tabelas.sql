CREATE DATABASE freeBlog;
USE freeBlog;

CREATE TABLE FB_CATEGORY(
     category_id int not null auto_increment,
     category_name varchar(64) not null,
     primary key (category_id)
);

CREATE TABLE FB_POST(
     post_id int not null auto_increment,
     post_name varchar(64) not null, 
     post_content longtext not null,
     post_thumbnail longtext null,
     post_category int not null,
     post_url varchar(150) not null,
     post_publish_date datetime default CURRENT_TIMESTAMP not null ,
     foreign key (post_category) references FB_CATEGORY(category_id),
     primary key (post_id)
);

CREATE TABLE FB_CATEGORY_POST(
     post_id int not null,
     category_id int not null,
     category_url varchar(150) not null,
     foreign key (post_id) references FB_POST(post_id),
     foreign key (category_id) references FB_CATEGORY(category_id)
);

CREATE TABLE FB_PROJECTS(
     project_id int not null auto_increment,
     project_name varchar(64) not null,
     project_url varchar(150) not null,
     project_content longtext not null,
     project_featuredphoto longtext not null,
     project_deliverydate date not null,
     primary key (project_id)
);

CREATE TABLE FB_USER(
     user_id int not null auto_increment,
     user_name varchar(64) not null,
     user_email varchar(64) not null,
     user_thumbnail longtext null,
     user_password varchar(256) not null,
     user_type enum ('assinante','administrador') not null,
     primary key (user_id)
);

--Este é um usuário com a senha 123456 --

INSERT INTO FB_USER(
     user_name,
     user_email,
     user_password,
     user_type
) VALUES (
     'root',
     'root@root.com',
     '4a83854cf6f0112b4295bddd535a9b3fbe54a3f90e853b59d42e4bed553c55a4',
     'administrador'
)
     
