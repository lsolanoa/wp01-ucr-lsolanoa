# Web Main Page - UCR Project

Created by @lsolanoa in collaboration with the [University of Costa Rica](https://www.ucr.ac.cr/).

[UCR Linguistics Department](https://filologia.ucr.ac.cr/departamentos/linguistica/) & [UCREA](http://www.ucrea.ucr.ac.cr/)

**Collaborators**

 - Luis Fernando Solano Aguilar
 - Dr. Adrián Vergara Heidke

**File Version**
1.0

**Code Version**
1.2

## Index

 1. Introduction
 2. Description
 3. Objectives

### 4. Schema

 #### *4.1. Data base Structure*

 File Name: [wb01-ucr-lsolano.sql](https://github.com/lsolanoa/wp01-ucr-lsolanoa/blob/senior-lsolanoa-db/sql/wp01-ucr-lsolanoa.sql)
 Version: 1.0
 [Data base Schema PNG by @lsolanoa](https://raw.githubusercontent.com/lsolanoa/wp01-ucr-lsolanoa/senior-lsolanoa-db/sql/Data%20Schema.PNG?token=AJNOR5JXKLVU6FLNOQRYI6DA5IB54)
 [Data base Schema PDF by @lsolanoa](https://github.com/lsolanoa/wp01-ucr-lsolanoa/blob/senior-lsolanoa-db/sql/Schema.pdf)
The following structure of the data base can be divided in 3 sections:
- Pages System: Post and Pages Information to show in the Web Page and managed by the Admin
- Web Structure: Organization of the elements in the Web Page managed by the Admin
- Independent tables: Miscellaneous data that needs to be storage.

 #### *4.2. Pages System*

Table 1 [pages] - Schema

| id_page | int AI PK | Article ID - Autoincrement |
|--|--|--|
| tile_page | text | Title of the article |
| desc_page | text | Short description
| cont_page | text | Contect of the artile in HTML format
| date_page | date | Date of the publication
| labels_page | text | Some labels separeded by ; |
| type_page | int | Type of the article: Post or Page |
| img_page | text | Banner inside of the article

Table 1 [pages] - SQL

    CREATE TABLE `pages`
    (
     `id_page`     int NOT NULL AUTO_INCREMENT ,
     `title_page`  text NOT NULL,
     `desc_page`   text NOT NULL,
     `cont_page`   text NOT NULL,
     `date_page`   date NOT NULL,
     `labels_page` text NOT NULL,
     `type_page`   int NOT NULL,
     `img_page`    text NOT NULL,
    PRIMARY KEY (`id_page`)
    );

Table 2 [files] - Schema

| id_file | int AI PK |File ID Autoincrement|
|--|--|--|
| id_page | text FK|Article ID - Index|
| file_name| text |Name of the file|
| type_file | text |File Format|

  Table 2 [files] - SQL

    CREATE TABLE `files`
    (
     `id_file`   int NOT NULL AUTO_INCREMENT,
     `id_page`   int NOT NULL ,
     `file_name` text NOT NULL ,
     `type_file` text NOT NULL ,

    PRIMARY KEY (`id_file`),
    KEY `fkIdx_44` (`id_page`),
    CONSTRAINT `FK_43` FOREIGN KEY `fkIdx_44` (`id_page`) REFERENCES `pages` (`id_page`)
    );

 #### *4.3. Web Structure*

Table 3 [nav] - Schema

| id_nav | int AI PK |Navigator ID Autoincrement|
|--|--|--|
| id_page | text FK|Article ID - Index|
| pos_nav| int|Order of the elements|
| struc_nav| text |Hierarchy of the elements|

  Table 3 [nav] - SQL

     CREATE TABLE `nav`
    (
     `id_nav`    int NOT NULL AUTO_INCREMENT ,
     `pos_nav`   int NOT NULL ,
     `struc_nav` text NOT NULL ,
     `id_page`   int NOT NULL ,

    PRIMARY KEY (`id_nav`),
    KEY `fkIdx_56` (`id_page`),
    CONSTRAINT `FK_55` FOREIGN KEY `fkIdx_56` (`id_page`) REFERENCES `pages` (`id_page`)
    );

Table 4 [slideshow] - Schema

| id_slide | int AI PK |Slide ID Autoincrement|
|--|--|--|
| id_page | text FK|Article ID - Index|

Table 4 [slideshow] - SQL

    CREATE TABLE `slideshow`
    (
     `id_slide` int NOT NULL AUTO_INCREMENT ,
     `id_page`  int NOT NULL ,

    PRIMARY KEY (`id_slide`),
    KEY `fkIdx_64` (`id_page`),
    CONSTRAINT `FK_63` FOREIGN KEY `fkIdx_64` (`id_page`) REFERENCES `pages` (`id_page`)
    );

Table 5 [imp] - Schema

| id_im´p | int AI PK |Important Element ID|
|--|--|--|
| icon_imp| text |Icon Element - FontAwesome Icon|
| pos_imp| int |Order of the elements|
| color_imp| text| Color Style HEX|
| id_page | text FK|Article ID - Index|

Table 5 [imp] - SQL

    CREATE TABLE `imp`
    (
     `id_imp`    int NOT NULL AUTO_INCREMENT ,
     `icon_imp`  text NOT NULL ,
     `pos_imp`   int NOT NULL ,
     `color_imp` text NOT NULL ,
     `id_page`   int NOT NULL ,

    PRIMARY KEY (`id_imp`),
    KEY `fkIdx_73` (`id_page`),
    CONSTRAINT `FK_72` FOREIGN KEY `fkIdx_73` (`id_page`) REFERENCES `pages` (`id_page`)
    );

Table 6 [timeline] - Schema

| id_time| int AI PK |Time Line Element ID Autoincrement|
|--|--|--|
| date_timeline| date|Date displayed in the timeline|
| id_page | text FK|Article ID - Index|

Table 6 [timeline] - SQL

    CREATE TABLE `timeline`
    (
     `id_timeline`   int NOT NULL AUTO_INCREMENT ,
     `date_timeline` date NOT NULL ,
     `id_page`       int NOT NULL ,

    PRIMARY KEY (`id_timeline`),
    KEY `fkIdx_80` (`id_page`),
    CONSTRAINT `FK_79` FOREIGN KEY `fkIdx_80` (`id_page`) REFERENCES `pages` (`id_page`)
    );

 #### *4.4. Independent tables*

Table 7 [links] - Schema

| id_link| int AI PK |Link ID Autoincrement|
|--|--|--|
| title_link| text |Name of the link|
| url_link| text |URL|

 Table 7 [links] - SQL

    CREATE TABLE `links`
    (
     `id_link`    int NOT NULL AUTO_INCREMENT ,
     `title_link` text NOT NULL ,
     `url_link`   text NOT NULL ,

    PRIMARY KEY (`id_link`)
    );

Table 8 [cont] - Schema

| id_cont| int AI PK |Contact Form ID Autoincrement|
|--|--|--|
| name_cont| text |User Name|
| email_cont| text |User Email|
| date_cont| date|Date Recorded|
| desc_cont| text |User Message|

 5. Installation Guide
 6. User Guide
 7. Conclusion
 8. Contact Information
