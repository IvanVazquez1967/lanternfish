<p align="center"><a href="https://adventofcode.com/2021/day/6" target="_blank"><img src="https://cdn.dribbble.com/users/6396772/screenshots/14767265/media/fdbae1feee133bdd26342ba7fc0093dc.png?compress=1&resize=400x300" width="400"></a></p>

# Lanternfish
<h3>Advent of Code - Day 6: Lanternfish<h3/>

This little tiny application has been developed to solve Adventofcode's Day 6 puzzle as a part of Purple's recruiting process.
It's not necessary to install nothing in your local environment but Docker, since this app runs inside a container.

- After clone, go to the root dir in your console and execute:

```bash
docker build -t composerImg .
```

- Run your container using the image you just built:

```bash
docker run -it -d -v $PWD:/app --name phpcomposerdev composerImg
```

- Run the App inside your container executing it:

```bash
docker exec -it phpcomposerdev bash
```

- Once you're in the container, execute this command to do the composer Autoload:

```php
composer dump
```

- And finally, do this to run the Lanternfishes App:

```php
php index.php
```


In order to run the unit tests, go out your container and in the root dir of the project execute PhpUnit with docker doing
```bash
docker run -v $PWD:/app --rm phpunit/phpunit test
```


Thank you Iain for this challenge, It was very fun! 😃👌💜
