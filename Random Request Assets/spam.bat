@echo off
:loop
curl "https://kick.com/CLIPENDPOINT" -H "User-Agent: Mozilla/5.0" -L --silent >NUL
goto loop