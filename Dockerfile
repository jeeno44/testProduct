FROM debian:bullseye

RUN apt-get update &&  \
    apt install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2 && \
    apt-get install nginx php8 php8.1-fpm postgesql

