<p align="center">
<img src="public/logo.svg" alt="Logo Buzzvel" width="200" />
</p>

# Buzzvel Dev Team Test

## What can you do with this application? 
Generate QRCodes pictures with URL. Once generated, you can scan the QRCode which will contain the data entered.

## How will it work?
- Access the project homepage and you will be redirected to the `/generate` page, or you can just directly access `/generate`.
- In this form, you need to provide some data, such as your Name, your LinkedIn and Github URL to then generate the QRCode by clicking on the button `Generate Image`.
- After generating the QRCode, you can scan it and you will be directed to another page that will contain the previously informed data, as requested in the test.

## About the project
- Versioning of the project's code was done based on the [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/) standard.
- All QRCode generation data is being saved in the Postgres database. Only unique slugs are stored in the database.
- The `/entries` endpoint was defined to return all qrcode generation requests.
- In the root of the project, you can find an Insomnia file called `endpoints.json`, which contains the route that returns all entries.
- The application was deployed. You can access it through the link [buzzvel.gustakoch.com.br](https://buzzvel.gustakoch.com.br). 

## Running the project locally
This application was developed using Docker. Follow the steps below to correctly upload the local development environment.

1. Clone this repository in a folder on your computer using the `git clone` command on your terminal.
2. After cloning the project, enter the folder and execute the `docker-compose up -d` command to upload the application's containers.
3. Right after, access the web server container using the following command `docker exec -it webserver-buzzvel /bin/bash`.
4. Execute `composer install && composer env && composer key` to install the project's dependencies, copy the .env file and generate a new key for the Laravel project.
5. It is also necessary to grant permission to the **/storage** folder with the command `chmod -R 777 storage`.
6. The QRCodes images were saved on disk, inside the project, we will execute the `php artisan storage:link` command to create a simlink to the public folder.
7. Execute `php artisan migrate` to run the migrations and create the table in the database.
8. We are ready! Access [http://localhost](http://localhost) and generate some QRCodes.

**Postgres database access settings can be found in the `.env` file.**
