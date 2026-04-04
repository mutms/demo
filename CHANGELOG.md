# Change log

Plugin versioning is following semantic versioning standard.

The format of this change log follows the advice given at [Keep a CHANGELOG](https://keepachangelog.com).

## [Unreleased](https://github.com/mutms/demo/compare/v1.5...main) - 2026-04-xx

### Fixed

- Fixed changelog diff links

## [v1.5](https://github.com/mutms/demo/compare/v1.4...v1.5) - 2026-04-04

### Fixed

- Fixed custom ports

## [v1.4](https://github.com/mutms/demo/compare/v1.3...v1.4) - 2026-04-04

### Fixed

- Renamed `.env` file to `demo.env` to prevent unintended exposure of sensitive information via backup files
- Fixed permissions to not set files as executable in /dataroot/ and /database/ directories

### Added

- Added changelog file

## [v1.3](https://github.com/mutms/demo/compare/v1.2...v1.3) - 2026-03-31

# Added

- Added validation of restored .env files

# Fixed

- Prevented problems with permissions after restore
- Other bug fixes

## [v1.2](https://github.com/mutms/demo/compare/v1.1...v1.2) - 2026-03-31

# Added

- Added bin/backup and bin/restore script
- Localhost port and site names are now configurable

### Fixed

- Multiple bug fixes

## [v1.1](https://github.com/mutms/demo/compare/v1.0...v1.1) - 2026-03-30

### Changed

- General improvements and polishing

## v1.0 - 2026-03-30

### Added

- Initial release