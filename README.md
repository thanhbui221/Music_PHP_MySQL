# Music review website

## Overview

This is my first project. This website was made during the summer before I went abroad for college. Previously, I had just learnt HTML, CSS, a little Javascript, and built some static websites, 😅. I realized that in order to construct dynamic webpages, I needed to work on the backend. So I learnt PHP and created this website. I just googled things I didn't know and learned from it while making the web. I recall viewing a plethora of courses/tutorials and feeling overwhelmed by the sheer volume of knowledge and tools available. Aside from all of the new programming skills I gained from this project, I also learnt that working with a new language or concept can be extremely frustrating without a solid foundation and basic understanding and knowledge. I didn't know about Git back then, thus I didn't upload this project to Github till lately (last month).

## Description

‘TipTop music’ - a retro music club and fanzine. The web is designed for music fans that aims to replicate the community experience of a paper magazine by incorporating social networking concepts such as allowing customers to share music reviews. The web is dynamic, compatible with the current version of xampp and can be portable. There are 3 users of the web: admin, member, and guest. Below is the ULM use case diagram.


![use_case drawio](https://user-images.githubusercontent.com/28446653/135593095-94df1252-4a79-45ff-81db-63532571c0a1.png)


There is logon form that will allow user ( club members) and admin to log onto and use certain parts of the web. 

Club member Functionality: If a user is logged on as member, he/she should be able to:
  - View a list of their own reviews and dates created.
  - Delete a review which they wrote
  - Add or Edit a review that they contributed. ( The changes are recorded in the database, using UPDATE SQL query)
 
 Administrator Functionality: If admin is logged on, he/she should be able to:
  - View a page that lists all the members, in alphabetical order by surname. It will also display 
  a summary of their reviews.
  - Create and Delete club members. The form used to create a new member always ensures that data are valid. Data validity is checed on the client-side and indicated without screen refrehses.

## Built With
 - HTML5
 - CSS
 - Bootstrap
 - PHP
 - SQL


## Getting Started

This project uses LAMP tech stack. I really proud of this project because I didn't use too many frameworks, only CSS Bootstrap. 

### Prerequisites
You can search how to install Xampp, and PHP online. 

### Setup

First, use phpmyadmin to add the database file, namely db_web.sql. You can let everything as default, no need to change root name and password. After that, you are ready to go.
Note: You can google how to use xampp to deploy local project. In the file info.txt, I already gave you two usernames and passwords as admin and member. 


## Usage

Some screenshots of the web are below:

![image](https://user-images.githubusercontent.com/28446653/135594693-f8215745-0530-40e8-ad5e-6574cd4c9106.png)
![image](https://user-images.githubusercontent.com/28446653/135594960-4c99e43a-abd3-4c62-9bdf-6dae46d47c7a.png)
![image](https://user-images.githubusercontent.com/28446653/135595001-8272f576-d669-4254-95c8-3817393cdec6.png)
![image](https://user-images.githubusercontent.com/28446653/135595062-2d60a51a-cd63-40ba-8453-e3f26db9f256.png)
![image](https://user-images.githubusercontent.com/28446653/135595100-90345d0c-fc63-46f1-9e57-c99224bff04f.png)
![image](https://user-images.githubusercontent.com/28446653/135595144-3046914e-fad6-4ad1-a3e1-6c5f40474395.png)
![image](https://user-images.githubusercontent.com/28446653/135595259-67e86fee-b70b-4d77-9513-86290b28ff84.png)

There are more things of the web that is ready for you to explore.


Note: 
- password is encrypted when saving into data. For simplicity there is no password reset facility. 
- PHP sessions are used to provide application security. It is not possible to access restricted pages one the owner has logged out.

## Improvements

Good things about this project:
- Its a dynamic full-stack website. Every data is queried and get from the database, not hardcoded onto the html.
- Use only 1 framework (CSS Bootstrap). Therefore, it works smoothly.
- Structure of page is standard, having 3 parts: header, body, and footer. 
- Logon functionality including authentication on both client-side and server-side.
- Password is stored encrypted.
- Use PHP session.
- Resist injection attacks, and cross site-scripting.
- All database queires are prepared statements. 

But of course, I still think I could do better. The web has many things to improve:
- It can be built with MVC architecture. 
- The CSS Bootstrap can be included in a more mordern way.
- The style can also be improved. 
- Can have password reset functionality.







