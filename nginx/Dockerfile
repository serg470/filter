FROM nginx:latest

COPY ./web/ /var/www/test
COPY ./site.conf /etc/nginx/conf.d/site.conf

RUN rm /etc/nginx/conf.d/default.conf
#    /etc/init.d/nginx reload
#    apt-get -qy update && apt-get -qy upgrade
#    apt-get install -qy apt-utils php7.0-cli php7.0-fpm php7.0-curl php7.0-gd php7.0-mysql php7.0-mbstring php-mysql zip unzip && \

