# Base_TCheckPro
Basde Template of TesteChkPro

Contact me:
 * Telegram: https://t.me/MrPopos2
 * 

## INCLUDE
* System Expire from USERS VIP✔
* Auto Change Level✔
* System Gen User✔

## CONFIG DB:

* www/config.php
* www/templates/conn.php
* www/include/conn_.php
* www/include/aCount.php
* www/include/accCount.php
* www/include/uCount.php


### Telegram: @MrPopos2

### Rules📌: 

📵 _Don't ask for help!_

📵 _Do not ask for apis!_

📵 _It's all here!_

### INFO📌
```
Config DB:
www/config.php (Config DB)
www/templates/conn.php (Test Class DB)
www/include/conn_.php (Conexión DB para algunos Scripts)

Chequeos:
www/check-user.php (Chequea que no haya otro usuario igual)
www/check-key.php (Chequea que la Key sea única)
www/check-ip.php (Chequea que la IP sea real)
www/check-email.php (Chequea que no se repiten los correos)

Panel:
www/panel.php (Panel ADM)
www/genAcc.php (Generador Cuenta)
www/include/accCount_.php (Muestra cuentas generadas)
www/include/accCount.php (Muestra cuentas generadas)
www/include/accsuspend.php (Muestra Cuentas bloqueadas)

Config User:
www/configuser.php (Configuración del Usuario)

Mensajes:
www/messages.php (Mensajes del Sistema)

Pruebas de Key:
www/testKey.php (Prueba de Keys)
www/js/genKey.js (Sirve para generar keys)
www/include/genKey.php (Sirve para generar keys)
www/include/keygen_.php (Sirve para mostrar las key generadas)

Perfil:
www/perfil.php (Ver Perfil)

Registro:
www/register.php (Registro)

Login:
www/index.php (Para ingresar)

Home:
www/home.php (Escritorio del usuario)
www/include/aCount.php (Cuenta los administradores y staff)
www/include/accCount.php (Cuenta las cuentas registradas totales)
www/include/uCount.php (Cuenta las cuentas registradas no staff o adm)

Logout:
www/logout.php (Salir de la cuenta)

Funciones:
www/func.php (Funciones que no se ocupan aún)
www/include/functions.php (Funciones que no se ocupan aún)
www/templates/funcionLevel.php (Muestra Rango de los Usuarios)
www/templates/funcion.php (Seguridad)

Templates:
www/templates/footer.php (Píe de Pagina)
www/templates/header.php (Cabecera)
www/templates/message.php (Plantilla Mensajes)
www/templates/include.php (Variables)

Hash:
www/key/genPass.php (Hashs)
www/include/genPass.php (Generador de Contraseñas Aleatorias)

Include:
www/include/autoDelete.php (Expira Suscricipción deja en level 0)
www/include/class_curl.php (Class para cUrls)
www/include/class_mail.php (Class para Correos)
www/include/iP.php (Muestra la IP real del usuario)
www/include/iP_t.php (Muestra la IP real del usuario + ubicación)
www/include/navegador.php (Muestra el navegador del usuario)
www/include/sistema.php (Muestra el sistema operativo del usuario)

Sistema:
www/CI/DBclass.php (Class de la Base de Datos)
www/CI/Script.php (Class de los generadores de Usuarios y Key)
www/CI/Task.php (Class para los mantenimientos)
www/CI/User.php (Class para los registro, actualizaciones e ingresos de cuentas)

Estilos & Otros:
www/vendor/* (CSS y JS del sistema)
www/styles/* (CSS Predeterminado)
www/css/* (CSS general)
www/fonts/* (Fonts de FontAwesome)
www/js/* (Estan los JS para los generador de Key, Cuentas, registro, etc)
www/js/config.php (Chequea DB)
```
### CHANGELOG

```
Esté sistema fue creado a base de Unc3ns0r3d en el 2018, actualmente se fue aumentando la seguridad y mejorando el sistema.
También se fue modificando el template para mejor diseño.

La base del sistema de Unc3ns0r3d se uso para muchos proyectos base, ahora se utilizara de forma sencilla y fácil uso.

Los cambios se limpian y se realizan a partir del año 2020. (Los changelogs anteriores han sido guardados).

[+] Versión 3.0 (Actual) 
-> Se arreglo y modifico el sistema de keys y usuarios.
-> Sistema BETA terminado en la versión 1.0 [Unc3ns0r3d].
-> Sistema 2.0 arreglado para adaptar diferentes tipos de templates.
-> Sistema 3.0 mejorada y seguridad mejorada.
-> Configuración de Usuario/Perfil agregado.


[Utilidades]
Panel para generar Usuarios
--- Key Aleatoria
--- Contraseña Aleatoria
--- Fecha Expiración
--- Creditos
--- Rango Usuarios
--- Generado por

Panel para Usuarios
--- Editar Email ( Requiere Verificar Correo )
--- Editar Contraseña ( Idem )
--- Editar Descripción
--- Editar Avatar

Información Usuarios
--- Usuario
--- Email
--- Tipo de Cuenta
--- Creditos
--- F. Creación
--- F. Expiración (Solo Suscriptores Nvl: 1/2/3)

01:00 22/01/2020 [CHANGELOG v3.01a]
[-] Se quitaron archivos basuras del sistema.
[+] Se modificaron las estadisticas del HOME & PANEL, mostrando en la lista de usuarios solo usuarios FREE/VIPS.
[+] Se modifico el contador de STAFF, ahora cuenta a los miembros con rango Staff & Admin.

22:16 22/01/2020 [CHANGELOG v3.01b]
[+] Cambios en el generador de usuarios:
* Se requiere de rellenar los campos para poder generar un usuario.
* Si el usuario que rellene el campo no es un administrador este no podra crear o generar usuarios.
* Se agrego el campo myIP para guardar las direcciones IP de los que generen usuarios.
* Se agrego al panel una lista de Usuarios Expirados.
* Se modifico la tarea de limpiar cuentas Expiradas (Baja el rango a las cuentas expiradas a Free).
--- Se ejecuta desde el boton al costado que aparece como "Ejecutar Tarea".

30/01/2020 [CHANGELOG v3.01c]
[+] Cambios en el Panel de Administradores/Staff:
* Se agrego un editor de usuarios.

[+] Se agrego más seguridad en algunos archivos que se podian acceder siendo usuario y no administrador.
* Archivos como panel.php & autoDelete.php estaban desprotegidos y se podia acceder cualquier siendo usuario.
* Para mejor seguridad se agrego header_panel.php para la parte de la administración de usuarios.

[+] Cambios en el Home.php
* Se agrego un reloj (America/Argentina/Buenos_Aires)

[+]Se agrego una herramienta.
*Encrypter herramienta para cifrar contraseñas o textos en diferentes Hash.
```

## ❗❗❗This project is in beta and there will be many bugs❗❗❗
### Created by JkDev🇦🇷 . All rights reserved
