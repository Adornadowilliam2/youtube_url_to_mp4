
# How to make mp3 and mp4 using python command

- first install the yt-dlp


```php
pip install yt-dlp 
or 
pip install -r requirements.txt

```

-then once it work you can input this two command base on what you want to do in your url you get 

```php
# for video mp4
yt-dlp -f mp4 https://youtu.be/K2GNBzWRXWE
# for audio music mp3
yt-dlp -x --audio-format mp3 https://youtu.be/K2GNBzWRXWE
```

# Also if there is an issue like i didnt turn into webm not mp3 here what to do

- in windows open your powershell type 

```php
winget install "FFmpeg (Essentials Build)"
winget install "FFmpeg (Shared)"
winget install ffmpeg

```
once it finish add this to path folder 

```php
C:\Users\ADORNADO\AppData\Local\Microsoft\WinGet\Links\
```

