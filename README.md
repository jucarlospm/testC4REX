# C4REX Test - Juan Carlos Peña M.

## About the project
A small api rest that solves the C4REX test

## How to open the project
Located in the root folder, we execute the following command

    php -S localhost:8000 -t public

At the root of the project we can find each of the points solved through a simple graphic interface. (http://localhost:8000/)

## API Documentation
### Get the guests of all the Djs
    http://localhost:8000/api/guests
### Get the guests of a DJ
    http://localhost:8000/api/guests/{djName}
Where djName is the name of the DJ to filter

### Get list of the most liked DJs in the world
    http://localhost:8000/api/likedDjs
### Get people by location
    http://localhost:8000/api/guestsLocation

