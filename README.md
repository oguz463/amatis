# Installation

Clone the repository

    git clone https://github.com/oguz463/amatis.git

Switch to the repo folder

    cd amatis

Install all the dependencies using composer

    composer install

Install node modules using npm

    npm install && npm run dev

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations and seed the database (**Set the database connection in .env before migrating**)

    php artisan migrate --seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
