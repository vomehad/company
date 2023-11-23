## Запуск
### Создание зависимосей (vendor)
#### Требования
* `docker`
* `composer -V` - Composer version 2.6.5 2023-10-06 10:11:52
* `php -v` - PHP 8.2.10-2ubuntu1 (cli) (built: Sep  5 2023 14:37:47) (NTS)
* `php -m` - calendar
  Core
  ctype
  curl
  date
  dom
  exif
  FFI
  fileinfo
  filter
  ftp
  gettext
  hash
  iconv
  json
  libxml
  openssl
  pcntl
  pcre
  PDO
  Phar
  posix
  random
  readline
  Reflection
  session
  shmop
  SimpleXML
  sockets
  sodium
  SPL
  standard
  sysvmsg
  sysvsem
  sysvshm
  tokenizer
  xml
  xmlreader
  xmlwriter
  xsl
  Zend OPcache
  zip
  zlib
#### запуск
1. `cp .env.exampe .env`
2. `composer u`
3. `vendor/bin/sail up -d`
4. `vendor/bin/sail artisan migrate --seed`
5. `vendor/bin/sail artisan key:generate`
