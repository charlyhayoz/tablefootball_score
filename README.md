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

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Best-README-Template</h3>

  <p align="center">
    An awesome README template to jumpstart your projects!
    <br />
    <a href="https://github.com/othneildrew/Best-README-Template"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/othneildrew/Best-README-Template">View Demo</a>
    ·
    <a href="https://github.com/othneildrew/Best-README-Template/issues/new?labels=bug&template=bug-report---.md">Report Bug</a>
    ·
    <a href="https://github.com/othneildrew/Best-README-Template/issues/new?labels=enhancement&template=feature-request---.md">Request Feature</a>
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
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

[![Product Name Screen Shot][product-screenshot]](https://example.com)

Are you a table football addict ? So maybe you find hard to keep scores of your multiple games. This project will help you to keep track, see statistics and even have some prediction with machine-learning.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

#### Front-end

- [![Angular][Angular.io]][Angular-url]
- [![Ionic][Ionic.io]][Ionic-url]

#### Back-end

- [![Laravel][Laravel.com]][Laravel-url]
  - With [knuckleswtf/scribe](https://scribe.knuckles.wtf/laravel) for the automatic documentation
  - With [php-ai/php-ml](https://php-ml.readthedocs.io/en/latest/) for the machine learning

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

[![Node.JS](https://img.shields.io/badge/Node.JS-5Fa04E?style=for-the-badge&logo=Node.js&logoColor=white)](https://nodejs.org/en)

[Node.JS](https://nodejs.org/en) will be use for managing the dependencies for the front-end. More precisely NPM.

The best way to install [Node.JS](https://nodejs.org/en) is to use [NVM](https://github.com/nvm-sh/nvm) that will permit you to manage multiple version of Node.js.

Install it simply with `curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash`

Then verify with `nvm -v` that the installation was correct.

If yes, you can install the latest long-term-version(LTS) of Node.js with `nvm install 20.16.0`

Then verify than Node.JS & NPM is correctly installed with `node -v` and `npm -v`

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)

[PHP](https://www.php.net/) will be used as the main language for the back-end.

For installing it, execute `sudo apt install php libapache2-mod-php`

[![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=php&logoColor=white)](https://getcomposer.org/download/)

[Composer](https://getcomposer.org/) will be use for managing the dependencies for the back-end.

For installing it, you need first to have PHP installed. Then download the installation file with `php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`

Execute it with `php composer-setup.php`

And finally we remove it `php -r "unlink('composer-setup.php');"`

The control that composer is installed correctly with `composer -V`

### Installation

1. Change the directory : `cd backend`
2. Install the dependencies : `composer install`
3. Set the env file from the .env.example : `cp .env.example .env`
4. Build the docker image and start it : `./vendor/bin/sail up -d`
5. Generate an application key : `./vendor/bin/sail artisan key:generate`
6. Generate symlink from assets to the public folder : `./vendor/bin/sail artisan storage:link`
7. Cache the .env file : `./vendor/bin/sail artisan config:cache`
8. Create the database structure and populate it with data : `./vendor/bin/sail artisan migrate:fresh --seed`
9. You can now access the whole application on your [localhost](http://localhost)

#### (Front-end)

The front-end is already builded in the public directory.

1. Change the directory : `cd frontend`
2. Install the Ionic CLI globally with : `npm install -g @ionic/cli`
3. Install the dependencies : `npm install`
4. Start the server with : `ionic serve`

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->

## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Frontend

#### Build the application

The application is builded in the public folder of the backend for an easy access.

For that first, build the application with `ng build --configuration production --base-href /app/`

The application is then builded in the `frontend/www` folder.

Then, copy all the file to the `backend/public/app` folder with the command : `cp -r www/* ../backend/public/app`

### Backend

#### Automatic documentation

The documentation is generated with [Scribe](https://scribe.knuckles.wtf/laravel).

Document each of your controller with the following model :
`/\*\*

- @group Game management
-
- APIs for managing games
  \*/`

And the document each of your function with the following model :
`
/**
     * Store a new game and return it. (Description)
     * @queryParam id integer required The id of the game
     * @bodyParam status string required The status of the game. (`finished`or`waiting`). Example: finished, waiting
     * @response {"status":"finished","updated_at":"2024-07-31T11:00:28.000000Z","created_at":"2024-07-31T11:00:28.000000Z","id":102}
     */
 `

And then, regenerate the documentation with : `./vendor/bin/sail artisan scribe:generate`

Your documentation will be then disponible on the endpoint `/docs`

#### Debug

##### Check data in Database

Use PHPMyAdmin

You can easily check data in the database with [http://localhost:8080/](http://localhost:8080/)

<!-- ROADMAP -->

## Roadmap

- [x] Add Changelog
- [x] Add back to top links
- [ ] Add Additional Templates w/ Examples
- [ ] Add "components" document to easily copy & paste sections of the readme
- [ ] Multi-language Support
  - [ ] Chinese
  - [ ] Spanish

See the [open issues](https://github.com/othneildrew/Best-README-Template/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTRIBUTING -->

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- LICENSE -->

## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

Your Name - [@your_twitter](https://twitter.com/your_username) - email@example.com

Project Link: [https://github.com/your_username/repo_name](https://github.com/your_username/repo_name)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- ACKNOWLEDGMENTS -->

## Acknowledgments

Use this space to list resources you find helpful and would like to give credit to. I've included a few of my favorites to kick things off!

- [Choose an Open Source License](https://choosealicense.com)
- [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
- [Malven's Flexbox Cheatsheet](https://flexbox.malven.co/)
- [Malven's Grid Cheatsheet](https://grid.malven.co/)
- [Img Shields](https://shields.io)
- [GitHub Pages](https://pages.github.com)
- [Font Awesome](https://fontawesome.com)
- [React Icons](https://react-icons.github.io/react-icons/search)

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png
[Ionic.io]: https://img.shields.io/badge/Ionic-V8-3880FF?style=for-the-badge&logo=ionic&logoColor=white
[Ionic-url]: https://ionic.io
[Angular.io]: https://img.shields.io/badge/Angular-V18-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-url]: https://angular.io/
[Laravel.com]: https://img.shields.io/badge/Laravel-V11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
