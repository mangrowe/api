FROM wyveo/nginx-php-fpm:latest
COPY nginx.conf /etc/nginx/conf.d/default.conf
RUN ln -s public html
WORKDIR /usr/share/nginx/
COPY . /usr/share/nginx
RUN chmod -R 755 /usr/share/nginx/storage/*
RUN chmod -R 755 /usr/share/nginx/public/*