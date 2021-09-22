# Music_PHP_MySQL

‘TipTop music’ - a retro music club and fanzine. 

I designed this website using only HTML5, CSS, Bootstrap, and PHP. No other frameworks involved.

The web site is dynamic, compatible with the current version of xampp and can be portable.

There are 3 users of the web: admin, user, and guest.

The guest can be able to see a list of music categories that are dynamically retrieved from the database. 
When one of the music categories is selected, a list of albums in that category is shown.

There is logon form that will allow user ( club members) and admin to log onto and use certain parts of the web/

Club member Functionality: If a user is logged on, he/she should be able to:
  - View a list of their own reviews and dates created.
  - Delete a review which they wrote
  - Add or Edit a review that they contributed. ( The changes are recorded in the database, using UPDATE SQL query)
 
 Administrator Functionality: If admin is logged on, he/she should be able to:
  - View a page that lists all the members, in alphabetical order by surname. It will also display 
  a summary of their reviews.
  - Create and Delete club members. The form used to create a new member always ensures that data are valid. Data validity is checed on the client-side and indicated without screen refrehses.

Note: 
- password is encrypted when saving into data. For simplicity there is no password reset facility. 
- PHP sessions are used to provide application security. It is not possible to access restricted pages one the owner has logged out.
