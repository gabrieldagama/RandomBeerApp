# RandomBeerApp
Requirements to run the applicaiton:
* Docker and Docker Compose

## Install the Application

Run this command from the directory in which you want to install the application. First, clone the repository:

    git clone git@github.com:gabrieldagama/RandomBeerApp.git

Then, get inside the application folder and then inside docker folder, there you must run docker-compose up, please be aware that this project uses port 80:

    cd RandomBeerApp/docker && docker-compose up

Wait for composer to install the dependencies and once the containers are running, you can to run the command below in separate terminal to populate the database:

    docker exec -it randombeerapp_php_1 php bin/cli.php deploy:sample-data

(If the command above fails make sure that you run it with the php container name)

Now you can access the application in your browser: 

- http://localhost/app for the Vue.js app
- http://localhost/reactapp for the React app

If you prefer you can also use the postman collection to try and test the endpoints in isolation from the frontend.

Improvements:
* Improve logs functionality, that would help us to fix issues if needed.
* Improve exception handling, create specific exceptions for specific issues.
* Improve abstraction between mongodb and repositories, current repositories are highly dependent in mongo class.
* Create more unit tests to increase coverage.
* Insert more controllers to handle other API operations, like update (PUT) and delete (DELETE).
* Improve frontend piece of the application, creating some validations and handling erros.