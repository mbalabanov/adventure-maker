# Adventure Maker

 Editor for "choose your own adventure" games to run in the Mansion engine (JS) written in Laravel. Allows users to create and edit game scenarios, and export them as JSON files ready to use in the Mansion engine.

## Installation
This application uses Sail for local development.
1. Clone the repository
2. Run `composer install`
3. Run `npm install`
4. Run `cp .env.example .env` to create a .env file
5. Run `sail up -d` to start the containers
6. Run `sail artisan migrate` to create the database tables
7. Run `sail artisan db:seed` to create a user and two entries for an adventure
8. Run `npm run dev --watch` to compile the assets and watch for changes

You can then register a new user or login with the following credentials:
- Email: `test@ptstest.com`
- Password: `password`

## Testing

You can run the tests with `sail artisan test`

## Notes on Tests to Create

1. Create a user, check if user is now in the DB
2. Create three entries for an adventure, check if they are now in the DB
3. Export the adventure, check if the file exists and has right contents

