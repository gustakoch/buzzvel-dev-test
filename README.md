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
- All QRCode generation data is being saved in the Postgres database.
- The `/entries` endpoint was defined to return all qrcode generation requests.

## Running the project locally
This application was developed using Docker. At the root of the project, there is a file called **docker-compose.yml** which contains the php-apache and postgres containers. Once inside the project folder, in the terminal, just run the `docker-compose up -d` command to upload the application's containers. The postgres database settings are the default and you can find them in the `.env-example` file.
