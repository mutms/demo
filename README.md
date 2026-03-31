# Set up local Moodle demo site using Docker

A self-contained local demo of [MuTMS](https://github.com/mutms/mutms/tree/MuTMS_51) or [Moodle LMS](https://github.com/moodle/moodle/tree/MOODLE_501_STABLE).

## Requirements

- macOS or Linux - Windows will be supported via WSL later in a separate project.
- [Docker](https://docs.docker.com/get-docker/) or [OrbStack](https://orbstack.dev/)
- [Git](https://git-scm.com/)

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

> **Tip:** To set up a vanilla Moodle 5.1.x site instead, run `bin/init-moodle` in place of `bin/init`. You can also place any other Moodle 5.1.x codebase in `site/moodle/` manually before running either init command.

## Backup and restore

To back up the current demo site:

~~~bash
bin/backup mybackup
~~~

This creates `backups/mybackup.tgz` containing the database, dataroot, and Moodle codebase.

To restore a backup:

~~~bash
bin/restore mybackup
~~~

This stops and removes the current site, restores the backup, and starts the site again.

To transfer a demo site to another computer, copy the `backups/` directory or individual `.tgz` files to the target machine, place them in the `backups/` directory of the demo checkout there, and run `bin/restore`.

## Commands

| Command           | Description                                                                    |
|-------------------|--------------------------------------------------------------------------------|
| `bin/init`        | First-time setup of MuTMS: clone, configure, and install                       |
| `bin/init-moodle` | Clones vanilla Moodle 5.1.x instead of MuTMS                                  |
| `bin/stop`        | Stop the Docker services — use this when switching to another demo site        |
| `bin/start`       | Start the Docker services                                                      |
| `bin/update`      | Upgrade to the latest minor release (usable only if codebase obtained via git) |
| `bin/destroy`     | Remove Docker containers and images                                            |
| `bin/backup`      | Backup entire demo site                                                        |
| `bin/restore`     | Restore demo site backup                                                       |

`bin/destroy` does not delete the `site/`, `dataroot/`, or `database/` directories. Remove those manually if you want a completely clean state.

## Directory layout

~~~
assets/                 configuration files and helper scripts
bin/                    management commands
backups/                demo site backups (created by bin/backup or uploaded manually)
database/               PostgreSQL data (created by init script)
dataroot/               Moodle data directory (created by init script)
site/moodle/            Moodle codebase directory (git clone by init script)
site/moodle/config.php  Moodle configuration file (copy of assets/config.php by init script)
compose.yml             Docker Compose configuration
~~~
