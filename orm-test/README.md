# ORM test

You only need three things:

- Make a model
- Make a migration template (represents DB table)
- Run the migration

Now, let's start with the beggining:

1. The model

To create a model, please run the following:

`php artisan make:model <name>`

2. The migration template

To create the template, run the the following:

`php artisan make:migration <table name>`

3. Running the migration

Now to finish it off, run this:

`php artisan migrate`

4. (Bonus!) Making rollbacks

Just run: 

`php artisan migrate:rollback`

to drop the table