### Optix - Test App  
<br>

Once Registerd and logged in there is a home view thats shows the users form and any comments that have been left.

From the Nav the User can access the list and then other users.

When Viewing another user comments can be left.

If logged in as Admin (user 201) Additional buttons are rendered to delete comments or ban users.

A banned user will 404 as do some of the admin functions if not authenticated.

A user can be set as admin by editing the users row (is_admin)

THe project is using docker compose, created via a generator to save time.


#### URL
```
https://optix.garyconstable.dev
```
#### htacess User / Pwd
```
optix
```

#### Admin Account
```
user: dev1@dev1.com
password: password
```

### Unit Tests
```
./vendor/phpunit/phpunit/phpunit tests/Unit/AdminServiceTest.php 
```
