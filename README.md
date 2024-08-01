<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->

<a id="readme-top"></a>

<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

[![Angular][Angular.io]][Angular-url]
[![Ionic][Ionic.io]][Ionic-url]
[![Laravel][Laravel.com]][Laravel-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">Table football scorer</h3>

</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <a href="#gallery">Gallery</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

[![Video of presentation](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/videoImage.png?raw=true)](https://youtu.be/LFZM726dNMA)

Are you a table football addict ? So maybe you find hard to keep scores of your multiple games. This project will help you to keep track of games, players and see statistics.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Gallery

### Video

[![Video of presentation](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/videoImage.png?raw=true)](https://youtu.be/LFZM726dNMA)

### Image

#### Games tab

![Games tabs](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/games.png?raw=true)

#### Add game

![Add game](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/newGame.png?raw=true)

#### Edit game

![Edit game](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/editGame.png?raw=true)

#### Statistics tab

![Statistics tab](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/statistics.png?raw=true)

#### Players tab

![Player tab](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/players.png?raw=true)

#### Responsive mode / mobile mode

![Responsive demo](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/responsive.png?raw=true)

#### Documentation

![Documentation](https://github.com/charlyhayoz/tablefootball_score/blob/main/screenshots/documentation.png?raw=true)

### Built With

#### Front-end

- [![Angular][Angular.io]][Angular-url]
- [![Ionic][Ionic.io]][Ionic-url]

#### Back-end

- [![Laravel][Laravel.com]][Laravel-url]
  - With [knuckleswtf/scribe](https://scribe.knuckles.wtf/laravel) for the automatic documentation

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

#### Required

[![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=Docker&logoColor=white)](https://www.docker.com/)

Docker will be used by the backend with multiples images.

Follow the documentation here for installing Docker : [https://docs.docker.com/engine/install/](https://docs.docker.com/engine/install/).

#### Optional

[![Node.JS](https://img.shields.io/badge/Node.JS-5Fa04E?style=for-the-badge&logo=Node.js&logoColor=white)](https://nodejs.org/en)

[Node.JS](https://nodejs.org/en) will be use for managing the dependencies for the front-end. More precisely NPM. It's optional as the front-end is already builded.

The best way to install [Node.JS](https://nodejs.org/en) is to use [NVM](https://github.com/nvm-sh/nvm) that will permit you to manage multiple version of Node.js.

Install it simply with `curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash`

Then verify with `nvm -v` that the installation was correct.

If yes, you can install the latest long-term-version(LTS) of Node.js with `nvm install 20.16.0`

Don't forget to activate this version with : `nvm use 20.16.0`

Then verify than Node.JS & NPM is correctly installed with `node -v` and `npm -v`

### Installation

1. Change the directory : `cd backend`
2. Install the dependencies by starting a mini docker environment :
   ```
   docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
   ```
3. Set the env file from the .env.example : `cp .env.example .env`
4. Build the docker image and start it : `./vendor/bin/sail up -d`
5. Generate an application key : `./vendor/bin/sail artisan key:generate`
6. Generate symlink from assets to the public folder : `./vendor/bin/sail artisan storage:link`
7. Cache the .env file : `./vendor/bin/sail artisan config:cache`
8. Create the database structure and populate it with data : `./vendor/bin/sail artisan migrate:fresh --seed`
9. You can now access the whole application on your [localhost](http://localhost) as the frontend is prebuilded
10. The API documentation is accessible on [localhost/docs](http://localhost/docs)

#### Front-end in standalone

In case if you want to execute the frontend in standalone or for development purpose

1. Change the directory : `cd frontend`
2. Install the Ionic CLI globally with : `npm install -g @ionic/cli` (Dont forget to have the right version of node.js selected on nvm `nvm use 20.16.0`)
3. Install the dependencies : `npm install --legacy-peer-deps`
4. Start the front-end server with : `ionic serve`

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->

## Usage

How to develop further the project ?

### Frontend

#### Build the application

The application is builded in the public folder of the backend for an easy access.

For that first go in the frontend directory `cd frontend`, build the application with `ng build --configuration production --base-href /app/`

The application is then builded in the `frontend/www` folder.

Then, copy all the file from it to `backend/public/app` folder with the command : `cp -r www/* ../backend/public/app`

#### Creating new page

You can easily create new page with `ionic g page pages/the_name_of_your_page`

#### Creating new service

You can easily create new page with `ionic g service services/the_name_of_your_service`

### Backend

#### Database

##### Fresh migration

With seeding (auto-population) : `sail artisan migrate:fresh --seed`
Without seeding: `sail artisan migrate:fresh`

##### Add a migration

Create your migration : `sail artisan make:migration your_migration_name`
Execute the migration : `sail artisan migrate`
Rollback the last migration : `sail artisan migrate:rollback --step=1`

##### Check data in Database

Docker create automatically a image with PHPMyAdmin for debugging.

You can easily check data in the database with [http://localhost:8080/](http://localhost:8080/)

#### Creating assets

##### Models

Empty model : `sail artisan make:model name_model`

##### Controllers

Blank controller : `sail artisan make:controller name_controller`
Invokable controller : `sail artisan make:controller name_controller --invokable`
REST controller : `sail artisan make:controller name_controller --model=your_model --resource`

##### Policy

Policy is very important for controlling the access in your controller to a resource

`sail artisan make:policy NamePolicy --model=your_model`

#### Automatic documentation

The documentation is generated with [Scribe](https://scribe.knuckles.wtf/laravel).

Document each of your controller at the top with the following model :

```
/**
- @group Game management
-
- APIs for managing games
*/
```

And then, document inside the controller each of your function with the following model :

```
/**
* Store a new game and return it. (Description)
* @queryParam id integer required The id of the game
* @bodyParam status string required The status of the game. (`finished`or`waiting`). Example: finished, waiting
* @response {"status":"finished","updated_at":"2024-07-31T11:00:28.000000Z","created_at":"2024-07-31T11:00:28.000000Z","id":102}
*/
```

And then, regenerate the documentation with : `./vendor/bin/sail artisan scribe:generate`

Your documentation will be then available on the endpoint [http://localhost/docs](http://localhost/docs)

<!-- ROADMAP -->

## Roadmap

- [ ] Add translation on the front-end
- [ ] Add machine learning for prediction on the back-end
- [ ] Add login (Users are already created)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## License

Distributed under the Apache License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

Charly Hayoz: [charlyhayoz.ch](https://charlyhayoz.ch)

Project Link: [https://github.com/charlyhayoz/tablefootball_score](https://github.com/charlyhayoz/tablefootball_score)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- ACKNOWLEDGMENTS -->

## Acknowledgments

Some resources useful for this project

- [API documentation (local)](http://localhost/docs)
- [Laravel documentation](https://laravel.com/docs/11.x/readme)
- [Scribe documentation](https://scribe.knuckles.wtf/laravel/)
- [Ionic documentation](https://ionicframework.com/docs)
- [Ionic Icons](https://ionic.io/ionicons)
- [Img Shields](https://shields.io)
- [GitHub Pages](https://pages.github.com)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/charlyhayoz/
[Ionic.io]: https://img.shields.io/badge/Ionic-V8-3880FF?style=for-the-badge&logo=ionic&logoColor=white
[Ionic-url]: https://ionic.io
[Angular.io]: https://img.shields.io/badge/Angular-V18-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Laravel.com]: https://img.shields.io/badge/Laravel-V11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
