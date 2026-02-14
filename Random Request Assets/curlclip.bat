curl "https://kick.com/CLIPENDPOINT" ^
  -H "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8" ^
  -H "Accept-Encoding: gzip, deflate" ^
  -H "Accept-Language: tr,en;q=0.9" ^
  -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 OPR/122.0.0.0" ^
  -H "Cookie: cf_clearance=...; session_token=..." ^
  --compressed -L

========================================================================================================================================================================================

curl "https://kick.com/CLIPENDPOINT" ^
  -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 OPR/122.0.0.0" ^
  --compressed -L

========================================================================================================================================================================================

curl "https://kick.com/CLIPENDPOINT" -H "User-Agent: Mozilla/5.0" -L --silent >NUL

========================================================================================================================================================================================

@echo off
:loop
curl "https://kick.com/CLIPENDPOINT" -H "User-Agent: Mozilla/5.0" -L --silent >NUL
goto loop