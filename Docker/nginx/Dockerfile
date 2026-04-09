FROM nginx:alpine

RUN mkdir -p /var/log/nginx/

RUN touch /var/log/nginx/access.log

RUN touch /var/log/nginx/error.log

RUN mkdir -p /etc/nginx/sites-enabled/

RUN ln -s /etc/nginx/sites-available/laravel.local.conf /etc/nginx/sites-enabled/laravel.local.conf

CMD ["nginx", "-g", "daemon off;"]