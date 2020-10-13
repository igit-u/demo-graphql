# GraphQL API using Lighthouse

Requirements:
* Laravel 6.0
* php 7.3
* GraphQL Server using Lighthouse
* GraphQL DevTools using GraphQL Playground

# How to build local env

### Set Up Docker

Please use the following repo.
https://github.com/FullSpeedInc/Consulting_Docker

### Set Up DB

```
docker exec -it consultingdocker_mysql_1 bash
mysql -uroot -p
admin
create database <database_name>;
exit
exit
```

### Set Up This Application

```
# Modify database settings etc.
cp .env.example .env
vim .env

composer install

php artisan migrate:fresh --seed

exit
```

### Set Up `/etc/hosts`

```
sudo vim /etc/hosts
"[Shift] + G" -> Shortcut to move the end of file.

# Demo Laravel GraphQL
127.0.0.1 demolaravelgraphql.local.test
```

## Test
GraphQL Playground URL
http://demolaravelgraphql.local.test/graphql-playground

### Query User By Id
```
{
  user(id: 1) {
    id
    name
  }
}
```

### Query all users
```
{
  users(first: 10) {
    data {
      id
      name
    }
    paginatorInfo {
      currentPage
      lastPage
    }
  }
}
```

### Create User
```
mutation {
  createUser(
    name: "Donald", 
    email: "donald@gmail.com",
    password: "test"
  ) {
    id
    name
  }
}
```

### Update User
```
mutation {
  updateUser(id: "102", name: "Hillary") {
    id
    name
  }
}
```

### Delete User
```
mutation {
  deleteUser(id: "102") {
    name
  }
}
```
