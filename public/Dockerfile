FROM debian

WORKDIR /home/jeen/sites/delete/testik/

RUN apt-get update

RUN apt-get install ca-certificates apt-transport-https software-properties-common wget curl lsb-release -y

RUN apt-get update

RUN apt-get install -y curl nginx php8.1 php8.1-cli php8.1-fpm
