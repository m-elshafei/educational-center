>> Establishing an integrated educational center system

### Center Quick Start

1. Install `Composer` dependencies.
   
        composer install

2. Install `Npm` dependencies.
   
        npm install


3. Copy `.env.example` file and create duplicate. Use `cp` command for Linux or Max user.

        cp .env.example .env

    If you are using `Windows`, use `copy` instead of `cp`.
   
        copy .env.example .env
   

4. Create a new MySQL database and fill the database details `DB_DATABASE` in `.env` file.


5. The below command will create tables into database using Laravel migration and seeder.

        php artisan migrate:fresh --seed


6. Generate your application encryption key:

        php artisan key:generate


7. Start the localhost server:
    
        php artisan serve

8. Start the run the dev script:
    
        npm run dev


# This Project Run on :  

-  PHP v8.0.x 
-  Laravel v10.x 
