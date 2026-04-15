FROM nginx:alpine

RUN mkdir -p /var/log/nginx/

RUN touch /var/log/nginx/access.log

RUN touch /var/log/nginx/error.log

RUN mkdir -p /etc/nginx/sites-enabled/

RUN ln -s /etc/nginx/sites-available/laravelProjeck.local.conf /etc/nginx/sites-enabled/laravelProjeck.local.conf

CMD ["nginx", "-g", "daemon off;"]
