# Set up local MuTMS demo site using Docker or OrbStack

A self-contained local demo of [MuTMS](https://github.com/mutms/mutms), a multi-tenant management suite for Moodle LMS.

Windows is not currently supported. Contributions welcome.

## Requirements

- [Git](https://git-scm.com/)
- [Docker](https://docs.docker.com/get-docker/) or [OrbStack](https://orbstack.dev/)

## Quick start

Clone this repository and run the init script:

~~~bash
git clone https://github.com/mutms/demo
cd demo
bin/init
~~~

The script will:

- create the `site/`, `dataroot/`, and `database/` directories
- clone the MuTMS distribution based on the latest Moodle 5.1.x into `site/moodle/`
- add basic Moodle `config.php`
- start the Docker services
- install Composer dependencies
- initialise the Moodle database

Once complete, the site is available at **http://127.0.0.1:9501/**

**Admin credentials:** `admin` / `admin`

## Commands

| Command | Description |
|---|---|
| `bin/init` | First-time setup: clone, configure, and install |
| `bin/stop` | Stop the Docker services — use this when switching to another demo site |
| `bin/start` | Start the Docker services |
| `bin/destroy` | Remove Docker containers and images |

`bin/destroy` does not delete the `site/`, `dataroot/`, or `database/` directories. Remove those manually if you want a completely clean state.

## Directory layout

~~~
assets/          configuration files and helper scripts
bin/             management commands
database/        PostgreSQL data (created by bin/init)
dataroot/        Moodle data directory (created by bin/init)
site/            web root; Moodle codebase cloned here by bin/init
compose.yml      Docker Compose configuration
~~~
