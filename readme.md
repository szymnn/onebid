## Informacje ogólne
Projekt stworzony na potrzeby rekrutacji

## Technologie
Projekt stworzony z wykorzystnaiem:
* Symfony 5.4
* Bootstrap 5
* Docker
* PhpMyAdmin
* Apache 2

## Setup
W celu uruchomienia projektu, należy posiadać zainstalowany docker
* Posiadać zainstalowany docker [link](https://docs.docker.com/get-docker/)
* dla OS Windows, należy wybrac werjsę z [WSL 2](https://docs.docker.com/desktop/windows/wsl/)

Następnie należy wykonać z pozycji konsoli nastepujące polecenie

```
$ git clone https://github.com/szymnn/onebid.git
```
Zostanie pobrany projekt.
W następnej kolejności należy przejść do pobranego folederu, a tam wykonać z konsoli powershell, lub innej TTY
```
$ docker compose up
```
Teraz należy otworzyć nowe okno, lub w aktywnym oknie użyć kombinacji ```crtl + c```i wykonać ```$ docker compose up -d```
Kolejne komendy do wykonania to - "wejście na konterner" oraz zainstalowanie composera
```
$ docker exec -it onebid-php-1 bash
$ composer install
```
Po zakończeniu instalacji composera, strona jest gotowa do użycia pod adresem
```
$ localhost:8080
```