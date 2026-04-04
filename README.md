# Set up local MuTMS or Moodle demo site using Docker

A self-contained local demo of [MuTMS](https://github.com/mutms/mutms/tree/MuTMS_51) or [Moodle LMS](https://github.com/moodle/moodle/tree/MOODLE_501_STABLE).

## Requirements

- [Docker Engine](https://docs.docker.com/engine/install/) or [OrbStack](https://orbstack.dev/) — Docker Desktop is not required.
- [Git](https://git-scm.com/) — pre-installed on macOS and most Linux distributions.

Windows is not currently supported. A separate project providing Windows support via WSL2 is planned.

## Quick start

Clone this repository and run the init script:

~~~bash
git clone https://github.com/mutms/demo mydemo
cd mydemo
bin/init
~~~

The script accepts optional parameters to configure the demo site:

~~~bash
bin/init [port] [shortname] [fullname]
~~~

For example:

~~~bash
bin/init 9502 acme "Acme Corporation"
~~~

If `fullname` is not provided, `shortname` is used instead. Parameters default to `9501`, `MuTMS`, and `MuTMS` respectively. The values are saved to `.env` and reused on subsequent runs.

The script will:

- create the `site/`, `dataroot/`, `database/`, and `backups/` directories
- clone the MuTMS distribution based on the latest Moodle 5.1.x into `site/moodle/`
- add basic Moodle `config.php`
- start the Docker services
- install Composer dependencies
- initialise the Moodle database using **MariaDB**
- configure the site URL and admin account

Once complete, the site is available at **http://127.0.0.1:9501/**

**Admin credentials:** `admin` / `admin`

> **Tip:** To set up a vanilla Moodle 5.1.x site instead, run `bin/init-moodle` in place of `bin/init`.  
> You can also place any other Moodle 5.1.x codebase in `site/moodle/` manually before running either init command.

## Backup and restore

### Sudo requirements

- **OrbStack users:** `bin/backup` and `bin/restore` can be run **without sudo**.  
  OrbStack runs Docker in a user-owned environment, so elevated privileges are not required.

- **Docker Engine users (Linux, macOS without OrbStack):**  
  `bin/backup` and `bin/restore` **must be run with sudo** because they access directories owned by root and manipulate Docker volumes directly.

If you run without sudo on a non-OrbStack system, the script will stop with a clear error message.

### Backup

~~~bash
sudo bin/backup mybackup
~~~

This creates `backups/mybackup.tgz` containing:

- the MariaDB database dump
- the Moodle dataroot
- the Moodle or MuTMS codebase
- the `demo.env` configuration file

### Restore

~~~bash
sudo bin/restore mybackup
~~~

This will:

- stop and remove the current demo site
- delete the existing `site/`, `dataroot/`, `database/`, and `demo.env`
- extract the backup
- restore the original port from the backup
- start the site again using MariaDB

The port is preserved intentionally because Moodle stores the site URL in the database.

### Moving a demo to another machine

Copy the `.tgz` file(s) into the `backups/` directory on the target machine and run:

~~~bash
sudo bin/restore mybackup
~~~

## Commands

| Command           | Description                                                                    |
|-------------------|--------------------------------------------------------------------------------|
| `bin/init`        | First-time setup of MuTMS: clone, configure, and install                       |
| `bin/init-moodle` | Clones vanilla Moodle 5.1.x instead of MuTMS                                   |
| `bin/stop`        | Stop the Docker services — use this to stop the demo site                      |
| `bin/start`       | Start the Docker services — start previously stopped demo site                 |
| `bin/update`      | Upgrade to the latest minor release (usable only if codebase obtained via git) |
| `bin/down`        | Remove Docker containers and images, all site data is kept                     |
| `bin/backup`      | Backup entire demo site — requires sudo unless using OrbStack                  |
| `bin/restore`     | Restore demo site backup — requires sudo unless using OrbStack                 |

`bin/down` does **not** delete the `site/`, `dataroot/`, or `database/` directories.  
Remove those manually if you want a completely clean state.

## Directory layout

~~~
demo.env                local configuration: port, shortname, fullname (created by init script)
assets/                 configuration files and helper scripts
backups/                demo site backups (created by bin/backup or uploaded manually)
compose.yml             Docker Compose configuration
bin/                    management commands
database/               MariaDB data directory (created by init script)
dataroot/               Moodle data directory (created by init script)
site/moodle/            Moodle or MuTMS codebase directory (git clone by init script)
site/moodle/config.php  Moodle configuration file (copy of assets/config.php by init script)
~~~
