# APNIC

## Tasks:
1. Create/Use a Dockerised version of WordPress
2. Write code to consume this list: https://academy.apnic.net/wp-json/academy/virtual-labs
3. Display the list in point 2 on a WordPress page that uses a Frontend framework of your choice (React, Vue.js, Angular etc..) with the following functionality
Front end pagination
Drag and drop sorting
4. Put the code on Github under your account so that we can clone it, run it and see the page created in point 3. Please ensure you have a README.md that explains how to run your application.

## Clone Project
~~~
git clone git@github.com:alexisribault/APNIC.git
~~~

## Run Project
~~~
cd APNIC
~~~
~~~
docker-compose up -d
~~~

## Access website
here is the link where the website is running
~~~
http://localhost:8080/
~~~

## Login to wp-admin
username: alexis

password: hxT6QgGRdXEc%Fdr9k

## React Development
this part is only required if react needs changes

install node_modules on the child theme root:
~~~
cd wordpress/wp-content/themes/twentytwentychild && npm install
~~~
watch index.js file and build the react files to a build folder so that wordpress can read it

Under the child theme run
~~~
npm start
~~~

## Improvements: 
- add .env variables
- be more selective on what to push on github
- create a separate repository for the child theme
