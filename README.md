# Set up local Moodle demo site using Docker or OrbStack

A self-contained local demo of [MuTMS](https://github.com/mutms/mutms/tree/MuTMS_51) or [Moodle LMS](https://moodle.org/).

## Requirements

- macOS or Linux - Windows is not currently supported, contributions welcome.
- [Docker](https://docs.docker.com/get-docker/) or [OrbStack](https://orbstack.dev/)

## Quick start with Git

If you have [Git](https://git-scm.com/) available then clone this repository and run the init script:

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

> **Tip:** To set up a vanilla Moodle 5.1.x site instead, run `bin/init-moodle` in place of `bin/init`. You can also place any other Moodle 5.1.x codebase in `site/moodle/` manually before running either init command.

## Manual installation without Git

If you do not have git binary then you can:

1. download this package from the [releases page](https://github.com/mutms/demo/releases)
2. extract demo package into `demo` directory
3. download [MuTMS 5.1 release package](https://github.com/mutms/mutms/releases) or [Moodle 5.1 release package](https://download.moodle.org/releases/latest/)
4. extract release package into `demo/site/moodle` directory
5. open Command line shell, go to `demo` directory, and run `bin/init` command

Once complete, the site is available at **http://127.0.0.1:9501/**

**Admin credentials:** `admin` / `admin`

## Installing additional plugins

Additional plugins can be installed from the [Moodle Plugins Database](https://moodle.org/plugins/) via **http://127.0.0.1:9501/admin/tool/installaddon/index.php**, the same way as on any standard Moodle site.

## Commands

| Command           | Description                                                                    |
|-------------------|--------------------------------------------------------------------------------|
| `bin/init`        | First-time setup of MuTMS: clone, configure, and install                       |
| `bin/init-moodle` | Clones vanilla Moodle 5.1.x instead of MuTMS                                   |
| `bin/stop`        | Stop the Docker services — use this when switching to another demo site        |
| `bin/start`       | Start the Docker services                                                      |
| `bin/update`      | Upgrade to the latest minor release (usable only if codebase obtained via git) |
| `bin/destroy`     | Remove Docker containers and images                                            |

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

## Full package with already installed demo

If you have an already installed demo site with sample data, you can zip the entire `demo` directory and pass it to anybody else.
If they have Docker or OrbStack they only need to extract it and run `bin/start` — no installation steps required.
