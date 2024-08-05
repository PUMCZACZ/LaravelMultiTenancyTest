<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

### Requirement for project:
- **PHP 8.2**
- **MySQL 8.3**
- **Composer 2.7.7**
- **Node**


## How to run project

- git clone repository.
- composer install.
- npm install.
- php artisan migrate:fresh --seed.
- php artisan key:generate


## How to test project

- **Run i two different terminals php artisan serve and npm run dev (or once npm run build)**

Basic tests have been implemented for the project, which can be run with the command: **php artisan test**

Or you can manually log in to the user account by taking the data from the users table, 
copy the generated email address and log in using the password for each account generated has a value: "password".

In the tenant view there is also a User -> Admin role switch , to be able to show that only the person with permission to view the table can see it.
Admin has permissions to view the table, while user does not.

## Changes done to architecture
The entire architecture of old and new was placed in app/Domains and divided according to domains,
for easier organization of code, accesses to given resources were restricted by Policy and by global scope on User.

New tenant and company tables have been added,

Relationship connections between them have been added according to the diagram:

### Relationships

- Company OneToMany Tenant <br>
- Company OneToMany User <br>
- Tenant OneToMany User

The roles were implemented differently, as the diagram indicated. 
Roles were created using a package from spattie with roles, 
the roles in this case are not directly on the user model,
but in the pivot table where the model has roles and the role has permissions,
this allows for much more flexible solutions to resource access problems.
So in this case, the role_id and permissions columns did not appear on the user model.

[Spatie roles](https://spatie.be/docs/laravel-permission/v6/introduction).

## Performance

Timing measurements were not possible to test because, the new architecture was expanded with new modules, 
rather than being improved.

