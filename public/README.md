

## About ToDo App

It is just to do list app

## Requirements

- [Docker](https://www.docker.com/) must be installed with Ubuntu distro
- Install [Git](https://git-scm.com/)

## Installment

Clone Repository
```
get clone https://github.com/xose-aka/3205_toDoAPP.git
```

Enter folder
```
cd 3205_toDoAPP
```

Build docker container and run
```
docker-compose up --build
docker exec -it laravel-app php artisan migrate
docker exec -it laravel-app php artisan db:seed
```

## Tasks done

- README.md and About pages returns `X-Robots-tag: noindex` with `noindex` middleware
- You can check if previous request cancel with button `Refresh to do list`
- App is multilingual
