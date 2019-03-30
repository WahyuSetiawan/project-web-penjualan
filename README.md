start with docker : 

version: "3.2"
services:
  php:
    build: './php/'
    networks:
      - backend
    depends_on:
      - mariadb
    volumes:
      - ./public_html/:/var/www/html/
  apache:
    build: './apache/'
#    container_name : aplikasi_peternakan
    depends_on:
      - php
      - mariadb
    networks:
      - frontend
      - backend
    ports:
      - "80:80"
    volumes:
      - ./public_html/:/var/www/html/
  # mysql:
  #   image: mysql:5.6.40
  #   networks:
  #     - backend
  #   environment:
  #     - MYSQL_ROOT_PASSWORD=password
  #   ports:
  #     - 3306:3306
  #   volumes:
  #     - "./database_mysql/:/var/lib/mysql/:rw"
  mariadb: 
    image : mysql:8.0.2
    container_name: database_penjualan_testing
    environment:
      MYSQL_ROOT_PASSWORD: password
      MYSQL_DATABASE: penjualan
    ports:
      - "3306:3306"
    networks:
      - backend
    volumes:
      - "./my.conf:/etc/mysql/conf.d/config-file.cnf"
#      - "./data_mysql:/var/lib/mysql:rw"
  phpmyadmin1:
    image: bitnami/phpmyadmin:latest
    depends_on:
      - mariadb
    networks:
      - backend
    ports:
      - '8080:80'
      - '443:443'
    # volumes:
    #   - ./path/to/phpmyadmin-persistence:/bitnami
networks:
  frontend:
  backend: