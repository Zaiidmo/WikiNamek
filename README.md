# Wikinamek

Welcome to WikiNamek, an innovative content management application crafted to provide an outstanding user experience in the creation, management, and sharing of wikis. With a sophisticated content management system seamlessly integrated with a user-friendly front office, WikiNamek establishes itself as a collaborative platform where users can collaborate effortlessly in a simple yet engaging manner.

## Installation

To set up Wikinamek, follow these steps:

1. **Configure Development Environment:**
   - Use Laragon as the preferred development environment. You can download it [here](https://laragon.org/index.html).

2. **Clone Repository:**
   - Clone the Wikinamek repository using the following command:
     ```bash
     git clone https://github.com/Zaiidmo/Wikinamek
     ```

3. **Install Dependencies:**
   - Install Node.js and Composer.
   - Open the command prompt from the project directory and run the following commands:
     ```bash
     npm install
     composer update
     composer dump-autoload
     ```

## Color Reference

| Color | Hex |
| ------ | --- |
| Gray (Dark Mode Background) | #111827 |
| Gray (Light Mode Background) | #D1D5DB |
| Black (Navigation Bars) | #C0C3C9 |


## Mock Up

<!-- - Access the Figma model for Wikinamek [here](https://www.figma.com/your-figma-model-link). -->

## Wikinamek Features

- Light/dark mode toggle
- Cross-platform compatibility
- Authentication system
- User roles
- Email confirmation for contact


## Roadmap

1. Design phase, including use cases and class diagrams.
2. Jira planning for development milestones.
3. Mock-up creation.
4. Development phase.



## Tech Stack

**Client:** HTML, JavaScript, TailwindCSS

**Server:** PHP, MySQL

## Run Locally

1. Clone the project:
   ```bash
   git clone https://github.com/Zaiidmo/Wikinamek
   Go to the project directory

```bash
2.  cd Wikinamek
```

3. Install npm dependencies

```bash
  npm install
```
4. Install composer dependencies

```bash
  composer update
```

5. Start autoload

```bash
  composer dump-autoload
```

## What do you need to do

- Create a .env file in the public directory and you will change all the credentials to match those in your database

```env
HOST = host_name
USER = phpMyAdmin username
PASSWORD = phpmydmin password
DATABASE = db_name
```
## SQL code

- You'll find the SQL QUERY CODE in the Database Folder 
To import it, use PHPMyAdmin or any other MySQL Manager.

## Author

- [@Zaiid-Moumni](https://github.com/Zaiidmo/)