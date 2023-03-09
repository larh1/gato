<p align="center">
  <img width="400" height="100" src="https://user-images.githubusercontent.com/42705449/223857598-a5400df1-dd6f-46ed-ba18-f55c2c7ccd0c.png" alt="Tic Tac Toe">
</p>

Tic Tac Toe es una adaptación web del popular juego _Tres en Raya_ (también llamado Tres en línea, Juego del Gato, Ceros y Cruces) para dos jugadores, realizado con Laravel y Vue.

## Características

-   Participación de dos jugadores :video_game: :video_game:
-   Cambio de nombres de los jugadores :bust_in_silhouette:
-   Tablero de ganador por partida :trophy:
-   Pista para selección de celda :bulb:
-   Detección de empate :handshake:
-   Comprobante de victoria :scroll:
-   Vista para móviles :iphone:

## Instrucciones

1. El _jugador 1_ selecciona una celda dentro del tablero. Después, el turno pasa al jugador 2
2. El _jugador 2_ selecciona una celda libre y el turno vuelve al jugador 1
3. La partida continúa hasta que se llenen todas las celdas o uno de los jugadores hace una cadena de tres símbolos idénticos

La cadena puede ser horizontal, vertical o diagonal.

Quien gane 3 partidas será el ganador del juego, obteniendo el comprobante de victoria.

**!Evita que el otro jugador logre los 3 en raya!**

## Demostración

Pantalla principal

<p align="center">
  <img width="700" height="auto" src="https://user-images.githubusercontent.com/42705449/223858958-d2fd4023-3146-4a5a-93b2-fd7469400cb5.png" alt="Pantalla Principal">
</p>

Se puede cambiar el nombre de cada jugador, haciendo clic en el mismo. El nuevo nombre debe tener al menos 3 caracteres.

<p align="center">
  <img width="700" height="auto" src="https://user-images.githubusercontent.com/42705449/223861331-d7452261-bf87-430a-8f52-1becd2b40b79.png" alt="Cambio de nombre">
</p>

Al hacer clic en el botón de Ayuda se mostrarán las instrucciones del juego.

<p align="center">
  <img width="700" height="auto" src="https://user-images.githubusercontent.com/42705449/223861490-1e42aad0-b816-4991-aed9-e1a3b0a7fd38.png" alt="Ayuda">
</p>

Tras comenzar el juego, se mostrará el tablero del juego y el marcador de victorias.

<p align="center">
  <img width="700" height="auto" src="https://user-images.githubusercontent.com/42705449/223861883-ae5db94f-fa8b-468a-9437-93ac798015ed.png" alt="Pantalla Principal">
</p>

Cuando ningún jugador logre ganar una partida, se quedará en empate mostrando el mensaje correspondiente. Se debe reiniciar la partida hasta que un jugador logre ganarla.

<p align="center">
  <img width="700" height="auto" src="https://user-images.githubusercontent.com/42705449/223862045-ce0e1182-faf2-47fb-ba3c-6f08af91ad65.png" alt="Empate">
</p>

Quien gane 3 partidas será el ganador del juego, obteniendo el comprobante de victoria

<p align="center">
  <img width="700" height="auto" src="https://user-images.githubusercontent.com/42705449/223862268-c27b6b63-c9c1-483b-86ee-f2b4a70d66b7.png" alt="Ganador">
</p>

<p align="center">
  <img width="700" height="auto" src="https://user-images.githubusercontent.com/42705449/223862606-fa7691e4-6bbf-43c4-a2f7-1d46458b8f4b.png" alt="Comprobante">
</p>
<p align="center">
  Comprobante del ganador
</p>

## Instalación

1. Clonar repositorio

```
  git clone https://github.com/larh1/gato.git
```

2. Mover al directorio creado

```
  cd gato
```

3. Copiar archivo .env.example a .env

```
  cp .env.example .env
```

4. Modifcar datos del .env y poner los datos de la DB

```
DB_DATABASE=database_name
DB_USERNAME=database_user
DB_PASSWORD=P4ssW0rd
```

**Nota:** La base de datos debe existir. (Crearla en caso de que no exista)

5. Instalar dependencias

```
composer install
npm install
```

6. Crear tablas para registro de accesos

```
php artisan migrate
```

7. Crear APP_KEY

```
php artisan key:generate
```

8. Crear el directorio fonts dentro del Storage

```
mkdir storage/fonts
```

9. Compilar archvios necesarios

```
npm run dev
```

10. Lanzar servidor

```
php artisan serve
```

## Tecnologías usadas

-   UI: [Vue](https://vuejs.org)
-   Backend: [Laravel](https://laravel.com)
-   Iconos: [Fontawesome](https://fontawesome.com)
-   Fuente: [Nunito](https://fonts.googleapis.com)
-   Imágen: [Flaticon](https://www.flaticon.es/iconos-gratis/premio)
