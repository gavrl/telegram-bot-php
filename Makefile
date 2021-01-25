serve:
	php -S localhost:8080 -t public

expose:
	expose share localhost:8080 --subdomain=phbot

run:
	php -S localhost:8080 -t public &>/dev/null & expose share localhost:8080 --subdomain=phbot