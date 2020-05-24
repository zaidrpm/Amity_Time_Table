# Amity Time Table
This project consists of an extension which reads Time Table from amizone.net and stores in a json file.
A php script reads that json data and generates an html file.
Lastly a bash script executes that php script , uploads generated page to bitbucket pages server and removes all old json files.

A demo of this website can be found at- zaidrpm.bitbucket.io/Time-Table/test.html

Procedure:
	Install Extension Present in Extension directory in firefox.
	Setup a bitbucket pages server or github pages or gitlab pages.
	Clone your repository
	Copy all the scripts into that directory
	Now login to your amizone account and go to you time table page and click on update button to download Time_Table.json
	Run update.sh script. This script generates html page and uploads it to your repository using git and removes all old json files from Downloads folder.
