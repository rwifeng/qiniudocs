
# 登录

```
curl -v 101.71.89.52/login.php -d"uname=rwf&pwd=feng"
* Hostname was NOT found in DNS cache
*   Trying 101.71.89.52...
* Connected to 101.71.89.52 (101.71.89.52) port 80 (#0)
> POST /login.php HTTP/1.1
> User-Agent: curl/7.37.1
> Host: 101.71.89.52
> Accept: */*
> Content-Length: 18
> Content-Type: application/x-www-form-urlencoded
>
* upload completely sent off: 18 out of 18 bytes
< HTTP/1.1 200 OK
< Host: 101.71.89.52
< Connection: close
< X-Powered-By: PHP/5.5.9-1ubuntu4.9
< Set-Cookie: PHPSESSID=m0mcki7k83hddf7qbnoqeicm55; path=/
< Expires: Thu, 19 Nov 1981 08:52:00 GMT
< Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0
< Pragma: no-cache
< Content-type: text/html
<
* Closing connection 0
{"status":"ok","uname":"rwf"}%  

```


#获取上传token

```
curl -v  101.71.89.52/uptoken.php -H"Cookie: PHPSESSID=m0mcki7k83hddf7qbnoqeicm55"
* Hostname was NOT found in DNS cache
*   Trying 101.71.89.52...
* Connected to 101.71.89.52 (101.71.89.52) port 80 (#0)
> GET /uptoken.php HTTP/1.1
> User-Agent: curl/7.37.1
> Host: 101.71.89.52
> Accept: */*
> Cookie: PHPSESSID=m0mcki7k83hddf7qbnoqeicm55
>
< HTTP/1.1 200 OK
< Host: 101.71.89.52
< Connection: close
< X-Powered-By: PHP/5.5.9-1ubuntu4.9
< Expires: Thu, 19 Nov 1981 08:52:00 GMT
< Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0
< Pragma: no-cache
< Access-Control-Allow-Origin:*
< Content-type: text/html
<
* Closing connection 0
eSnBeEIyUqGGtidOTmsgQCwE23gjUDNJlsI6_mz9:LKyI0CM-rQYSco77pVe-W3nf9KA=:eyJzY29wZSI6ImRldnRlc3QiLCJkZWFkbGluZSI6MTQzNTQyMDg3NX0=
```



#回调

```
curl -v  101.71.89.52/callback.php  -d'{"uid":123456, "fname":"love.png", "fkey":"1.png", "desc":"sk fly"}' -H"Cookie: PHPSESSID=jba9ag2vl24llp523pd0o485f7; Content-Type:application/json"
* Hostname was NOT found in DNS cache
*   Trying 101.71.89.52...
* Connected to 101.71.89.52 (101.71.89.52) port 80 (#0)
> POST /callback.php HTTP/1.1
> User-Agent: curl/7.37.1
> Host: 101.71.89.52
> Accept: */*
> Cookie: PHPSESSID=jba9ag2vl24llp523pd0o485f7; Content-Type:application/json
> Content-Length: 67
> Content-Type: application/x-www-form-urlencoded
>
* upload completely sent off: 67 out of 67 bytes
< HTTP/1.1 200 OK
< Host: 101.71.89.52
< Connection: close
< X-Powered-By: PHP/5.5.9-1ubuntu4.9
< Content-Type: application/json
<
* Closing connection 0
{"ret":"success"}%

```

# 列取文件

```
curl -v  101.71.89.52/files.php  -H"Cookie: PHPSESSID=jba9ag2vl24llp523pd0o485f7"
* Hostname was NOT found in DNS cache
*   Trying 101.71.89.52...
* Connected to 101.71.89.52 (101.71.89.52) port 80 (#0)
> GET /files.php HTTP/1.1
> User-Agent: curl/7.37.1
> Host: 101.71.89.52
> Accept: */*
> Cookie: PHPSESSID=jba9ag2vl24llp523pd0o485f7
>
< HTTP/1.1 200 OK
< Host: 101.71.89.52
< Connection: close
< X-Powered-By: PHP/5.5.9-1ubuntu4.9
< Expires: Thu, 19 Nov 1981 08:52:00 GMT
< Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0
< Pragma: no-cache
< Content-type: text/html
<
* Closing connection 0
[{"id":"1","0":"1","uid":"123456","1":"123456","fname":"love.png","2":"love.png","fkey":"1.png","3":"1.png","createTime":"1435486395","4":"1435486395","description":"sk fly","5":"sk fly"}]
```
