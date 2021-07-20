#!/bin/bash

echo "\n\n\nNpm install:"
npm install

echo "\n\n\nCopy .env file:"
file="./.env.example"
if [ -f "$file" ]
then
	echo "$file found."
	cp $file ./.env
	echo ".env created"
else
	echo "$file not found."
	exit 1
fi

echo "\n\n\nRun migration:"
node ace migration:run

echo "\n\n\nStart node server:"
npm run dev
# adonis serve --dev --polling