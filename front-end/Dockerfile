FROM node:14-alpine AS build
# WORKDIR /usr/src/app

WORKDIR /var/www
# update packages
RUN npm install -g npm

# RUN npm install -g @angular/cli
# Add package file
COPY package.json package-lock.json ./

# Install deps
RUN npm i

# Copy source
COPY . .

# RUN npm run start

ENTRYPOINT [ "npm" ,"run" ,"start" ]

EXPOSE 4200

