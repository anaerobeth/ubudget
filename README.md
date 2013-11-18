uBudget App
===========

Team Random entry to #KabantayNgBayan hackathon for Open Data Philippines (http://data.gov.ph) 
Our team (me, Liza and Geric) created the app for web, iOS and Android. This is the web stack of the app.

The web stack uses the following:

* Slim for routing
* RedBean for ORM
* Twitter Bootstrap 3 for UI

Installation
------------

* Export ubudget.sql to your database
* Modify config.php with your database information, application URL and ShareThis publisher ID
* Make sure that the .htaccess file has been copied

Using the API
-------------

You can pass parameters to the results API to get data from the app.

Get all the list of cities
GET /api/cities

Get all the sectors
GET /api/sectors

Get all the sector details
GET /api/sectors/:id

Get the total respondents and priorities rating
GET /api/survey/get/:keys(<gender>;<age>;<salary>;<cities>)



