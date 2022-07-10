# Tang's Garden website

To run laravel you need to install _php_ and _composer_. If all that is done be sure to add a .env with all the right settings(check the .env.example for reference).

To get all settings right create an `.env` and set all things correctly(check `.env.example` for an example)

If you have installed it you need to run the following commands:

```bash
# ONCE
npm i # to install all npm packages
php artisan migrate:fresh # to ensure all databases are installed
php artisan db:seed # to seed the database

# DEVELOPMENT
php artisan serve # to run laravel
npm run watch # to update tailwind changes
```

After this you can create an account at the route of `/register`.
