# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.1.0

### Added

- Improved performance
- More tests for `UploadedFile` and `HttplugFactory`

### Removed

- Dead code

## 1.0.1

### Fixed

- Handle `fopen` failing in createStreamFromFile according to PSR-7.
- Reduce execution path to speed up performance. 
- Fixed typos.
- Code style.

## 1.0.0

### Added

- Support for final PSR-17 (HTTP factories). (`Psr17Factory`)
- Support for numeric header values. 
- Support for empty header values. 
- All classes are final
- `HttplugFactory` that implements factory interfaces from HTTPlug. 

### Changed

- `ServerRequest` does not extend `Request`.

### Removed

- The HTTPlug discovery strategy was removed since it is included in php-http/discovery 1.4.
- `UploadedFileFactory()` was removed in favor for `Psr17Factory`.  
- `ServerRequestFactory()` was removed in favor for `Psr17Factory`.  
- `StreamFactory`, `UriFactory`, abd `MessageFactory`. Use `HttplugFactory` instead.  
- `ServerRequestFactory::createServerRequestFromArray`, `ServerRequestFactory::createServerRequestFromArrays` and 
  `ServerRequestFactory::createServerRequestFromGlobals`. Please use the new `nyholm/psr7-server` instead. 

## 0.3.0

### Added

- Return types.
- Many `InvalidArgumentException`s are thrown when you use invalid arguments. 
- Integration tests for `UploadedFile` and `ServerRequest`.

### Changed

- We dropped PHP7.0 support. 
- PSR-17 factories have been marked as internal. They do not fall under our BC promise until PSR-17 is accepted.  
- `UploadedFileFactory::createUploadedFile` does not accept a string file path. 

## 0.2.3

No changelog before this release

