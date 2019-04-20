git clone git@github.com:php-fig/http-message.git
mkdir -p Psr/Http/Message
cp -R http-message/src/* Psr/Http/Message
rm -Rf http-message

git clone git@github.com:php-fig/http-factory.git
mkdir -p Psr/Http/Message
cp -R http-factory/src/* Psr/Http/Message
rm -Rf http-factory

git clone git@github.com:php-fig/http-server-handler
mkdir -p Psr/Http/Server
cp -R http-server-handler/src/* Psr/Http/Server
rm -Rf http-server-handler

git clone git@github.com:php-fig/http-server-middleware
mkdir -p Psr/Http/Server
cp -R http-server-middleware/src/* Psr/Http/Server
rm -Rf http-server-middleware

git clone git@github.com:Nyholm/psr7.git
mkdir -p Nyholm/Psr7
cp -R psr7/src/* Nyholm/Psr7
rm -Rf psr7
rm Nyholm/Psr7/Factory/HttplugFactory.php

git clone git@github.com:Nyholm/psr7-server.git
mkdir -p Nyholm/Psr7Server
cp -R psr7-server/src/* Nyholm/Psr7Server
rm -Rf psr7-server
