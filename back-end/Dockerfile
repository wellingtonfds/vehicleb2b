FROM node:lts-alpine

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
# Add package file
COPY package.json package-lock.json ./

# Install deps

USER root
# Copy source
COPY . .

COPY ./docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh
# RUN chmod +x init.sh
EXPOSE 3333

ENTRYPOINT ["bash","docker-entrypoint.sh"]


