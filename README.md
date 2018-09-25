# RandomBeerApp
Requirements to run the applicaiton:
* Docker and Docker Compose

## Install the Application

Run this command from the directory in which you want to install the application. First, clone the repository:

    git clone git@github.com:gabrieldagama/RandomBeerApp.git

Then, get inside the application folder and then inside docker folder, there you must run docker-compose up, please be aware that this project uses port 80:

    cd RandomBeerApp/docker && docker-compose up -d

Once the containers are running, you need to run the command below to populate the database:

    docker exec -it randombeerapp_php_1 php bin/cli.php deploy:sample-data

Now you can access the application in your browser: http://localhost/

If you prefer you can also use the postman collection to try and test the endpoints in isolation from the frontend.

Improvements:
* Improve logs, create logs configuration that would allow to enable and disable it as needed.
* Improve exception handling, create specific exceptions for specific issues.
* Improve abstraction between mongodb and repositories, current repositories are highly dependent in mongo class.
* Create more unit tests to increase coverage.
* Insert more controllers to handle other API operations, like update (PUT) and delete (DELETE).
* Improve frontend piece of the application.