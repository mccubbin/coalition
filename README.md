Website name: Coalition

Instructions:
1) Unzip contents to a directory accessable to a webserver, like C:xampp\htdocs\
2) You should see the directory coalition01
3) Point your web server at the directory:
	a) xampp/apache/conf/extra/httpd-vhosts.conf add:
		<VirtualHost *:80>
			DocumentRoot "C:/xampp/htdocs/coalition01/public"
			ServerName coalition.test
		</VirtualHost>
	b) In Windows\System32\drivers\etc\hosts file add:
		127.0.0.1	coalition.test
	c) restart apache server
4) in a terminal window, and with mysql installed, run the following command:
		mysql -uroot -e "create database coalition"
5) Create fake users:
	a) start tinker:
	php artisan tinker
	b) run the UserFactory:
	factory(App\User::class, 20)->create()
6) Create fake tasks:
	a) Stay in tinker
	b) run the TaskFactory:
	factory(App\Task::class, 20)->create()
7) open a browser, and go to coalition.test/tasks
8) You will see that you will have to create an account to view the tasks
9) create an account with a username/password
10) github repo was also uploaded, accessable at https://github.com/mccubbin/coalition

11) Note that I only had time to do the very minimum, and did not add any of the drag and drop features because of time constraints. When we next speak, I will have added this to the project.

13) I hope you like my skills and experience, and that you will consider me for your Laravel developer position. :)


