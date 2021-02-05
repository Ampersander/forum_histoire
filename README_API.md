# Fonctionnement API



**1/ forum_user**

* GET
 ````txt
    http://localhost/api/forum_user/
    http://localhost/api/forum_user/{id}
````

**2/ forum**

* GET
 ````txt
     http://localhost/api/forum/
    http://localhost/api/forum/{id}
````
**3/ post**

* GET
 ````txt
     http://localhost/api/post/
    http://localhost/api/post/{id}
````
* POST
 ````txt
     http://localhost/api/post/
````
Content-type: application/x-www-form-urlencoded

Content: labelThread=

**4/ sub_forum**

* GET
 ````txt
     http://localhost/api/sub_forum/
    http://localhost/api/sub_forum/{id}
````
* POST
 ````txt
     http://localhost/api/post/
````
Content-type: application/x-www-form-urlencoded

Content: nameForum=

**5/ thread**

* GET
 ````txt
     http://localhost/api/thread/
    http://localhost/api/thread/{id}
````

* POST
 ````txt
     http://localhost/api/post/
````

Content-type: application/x-www-form-urlencoded

Content: nameSubforum=

# Test API

Le dossier api/tests contient des tests de l'API en curl.
