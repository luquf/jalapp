# jalapp
APP A2

# Déployment
- First, replace ```localhost``` by ```db``` in models/db.php
- Then hit a simple ```$ docker-compose up -d```

# Dev
- First, start the data crawler as a background recurrent task (homemade fake data for now): ```$ cd crawler && sh ./crawler.sh```
- You can stop it with: ```$ ps -ef | grep crawler ``` and then ```$ sudo kill <pid-id> ```
