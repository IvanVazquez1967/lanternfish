FROM ivazquez1967/phpcomposer:1.0

COPY . /usr/src/app

WORKDIR /usr/src/app

CMD [ "php"]

