### Installation and usage 

Requirements:

* Php

Yeah, that's it! You don't need python or ruby. No package managers, no dependencies, no other nonsense.

If you have a stack Apache + Php + MySql like MAMP (or WAMP/LAMP, depends on your OS) on your computer - it's even better.

If you don't - it's not the big deal. 

#### Php only usage

Make sure that you have latest version of Php (5.4.0 or later).

1. Download "fakeimages" form github and unpack wherever it is comfortable for you.
2. Open terminal and navigate to the folder where you've unpacked the files.
3. Run command:
```
php -S localhost:8000
```

(You may use whatever port you want instead of 8000)

That's all. Now just use it in your "img" tags.

```
<img src="http://localhost:8000?w=350&h=100">
```

Parametrs:

* w - width
* h - height
* fc - font color (hex value)
* bg - background color (hex value)
* text - custom text instead of default dimensions 

```
<img src="http://localhost:8080?w=350&h=100&fc=e3e3e3&bg=999999&text=Slide1">
```
	
#### Using with stack

If you develop for backend or test ajax requests, you probably already have this environment installed and set up.

All you need in this case is to create a host (for example myawesomefakeimages.com) and point it to the folder where you've unpacked the files.

(Make sure that mod_rewrite module of Apache server is enabled)

Now your "img" tag will look like this:

```
<img src="http://myawesomefakeimages.com/350x100/">
```

Structure:
```
Url/dimensions/font_color_hex/background_color_hex/text=your_custom_text
```

```
<img src="http://myawesomefakeimages.com/350x100/e3e3e3/999999/text=Slide 1">
```