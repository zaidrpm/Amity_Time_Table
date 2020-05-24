#!/bin/bash
cd /home/web/Time-Table
cp $(ls -v /home/zaid/Downloads/Time-Table* | tail -1) Time-Table.json
php -f gen.php > index.html
git add *
git commit -m "$(date)"
git push origin master
cd /home/zaid/Downloads/
v=$(ls -v Time-Table* | tail -1)
mv "$v" "Time_latest"
rm Time-Table*
mv "Time_latest" "Time-Table.json"
