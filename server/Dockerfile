FROM ubuntu:latest

RUN apt-get update && apt-get install -y apache2 php php-mysql libapache2-mod-php && a2enmod authz_groupfile

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]