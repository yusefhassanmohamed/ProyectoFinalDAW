#!/bin/bash
#
# SCRIPT DE DESPLIEGUE DE PROYECTO
#
# Yusef Hassan Mohamed
#

# Variables de entorno

USERDB="debianDB"
PASSDB="debianDB"
HOST=$(hostname -I)
WWW="/var/www/html/"
# Nombre del fichero de los datos en el proyecto 
DATOS="Handyman.sql"
BBDD="handyman"

# Se toman los parámetros como USER y PASS de la BBDD
if [ $# = 2 ];
then
   USERDB=$1
   PASSDB=$2
fi

# Copiamos el contenido de la carpeta proyecto a la página html
cp -r ../Codigo/ $WWW

# Restauramos los datos de ejemplo a la BBDD
mysqladmin -u $USERDB -p$USERDB create $BBDD
mysql -u $USERDB -p$USERDB $BBDD < ../DataBase/$DATOS

# Mostramos url de carga
echo "http://$HOST/Codigo/handyman/index.php"
