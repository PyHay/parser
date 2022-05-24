# parser
построчный парсер лог файла на php 

запуск скрипта 
  ```
  php script.php [имя файла лога]
```
для теста запуск выглядит так 
  ```
 php script.php access.log
 ```
пример вывода 
 
 
```  stdClass Object
(
    [views] => 16
    [traffic] => 187990
    [urls] => 5
    [crawlers] => stdClass Object
        (
            [Googlebot] => 2
            [Bing] => 0
            [Baidu] => 0
            [Yandex] => 0
        )

    [statusCode] => stdClass Object
        (
            [200] => 14
            [301] => 2
        )

) 
