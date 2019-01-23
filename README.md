# jalapp
https://domisep.ovh

# Deployment
- First, replace ```localhost``` by ```db``` in models/db.php
- DB credentials are `root` and `toor`, edit if necessary in models/db.php
- Then, replace the email credentials in controllers/mail.php (smtp server, address, password)
- Then hit a simple ```$ docker-compose up -d```, et voilà...

# Dev
- Clone the git
- Dump the database (db name must be jala)
- DB info can be edited in in models/db.php
- Replace the email credentials in controllers/mail.php (smtp server, address, password)
- Install dependencies with ```$ composer install```
- Then, start the data crawler as a background recurrent task (homemade fake data for now): ```$ cd crawler && sh ./crawler.sh``` on a UNIX based system
- You can stop it with: ```$ ps -ef | grep crawler ``` and then ```$ sudo kill <pid-id> ```