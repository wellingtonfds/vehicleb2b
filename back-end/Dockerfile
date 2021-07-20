FROM node:lts-alpine
# WORKDIR /usr/src/app

RUN apk update \
&& apk add --no-cache \
    bash \
    build-base \
    gcc \
    libtool \
    autoconf \
    automake \
    pkgconfig \
    nasm \
    lcms2-dev \
    libpng-dev libjpeg-turbo-dev giflib-dev tiff-dev \
    zlib-dev \
    && rm -rf /var/cache/apk/* 


WORKDIR /var/www
# update packages
RUN npm install -g npm
RUN npm i -g @adonisjs/cli
# Add package file
COPY package.json package-lock.json ./

# Install deps
RUN npm i

USER root
# Copy source
COPY . .

COPY ./docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh
# RUN chmod +x init.sh
EXPOSE 3333

# RUN npm run dev

# ENTRYPOINT [ "npm" ,"run" ,"dev" ]
# ENTRYPOINT [ "node" ,"ace" ,"serve" ]
ENTRYPOINT ["bash","docker-entrypoint.sh"]


