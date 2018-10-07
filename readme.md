#Motorbike

# create database
```
 CREATE TABLE `motorbikes` (
   `id` int(11) NOT NULL,
   `model` varchar(64) COLLATE utf8_persian_ci NOT NULL,
   `color` varchar(64) COLLATE utf8_persian_ci NOT NULL,
   `weight` float NOT NULL,
   `price` float NOT NULL,
   `image` varchar(512) COLLATE utf8_persian_ci NOT NULL,
   `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;
 

 ALTER TABLE `motorbikes`
   ADD PRIMARY KEY (`id`);
 

 ALTER TABLE `motorbikes`
   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

```

#notes

please before run set base path in helpers.php
