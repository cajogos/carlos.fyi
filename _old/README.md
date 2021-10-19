# [carlos.fyi](https://carlos.fyi) Official Repository

Welcome to the official repository for my personal website https://carlos.fyi. Feel free to lurk around through the code and check if you found anything silly or any security flaws I might have missed.

There is a reason as to why I made this whole website open-source, and that is for the fact I am not ashamed to show how my code looks and I always look forward to improving on it. Also, to add to them GitHub commits, but don't tell anyone :)

## Technologies Used

I get asked this many times! What did you code your website in? So here's a rundown of technologies used for my site, well, at least the ones I can remember.

### Backend
I am running an [Ubuntu 16.04](http://releases.ubuntu.com/16.04/) server with an [Nginx web server](https://nginx.org/en/) on [PHP 7.0](http://php.net/). I also heavily rely on [Composer](https://getcomposer.org/) for my PHP dependencies.

#### Composer Dependencies
I would like to thank (yes, I am aware I am also thanking myself) the people below for making such great libraries which have helped me in the making of my website.

```json
{
	"require": {
		"smarty/smarty": "~3.1",
		"guzzlehttp/guzzle": "~6.0",
		"altorouter/altorouter": "1.1.0",
		"cajogos/php-temp-cache": "1.0.1"
	}
}
```

### Frontend

* For frontend I am using Smarty PHP to generate HTML templates and the CSS is written in pure CSS (may move to Sass in future).
* For the cool sliding menu effect I am using [Slideout.js](https://github.com/mango/slideout) which is awesome!
* I am also using [Bootstrap](http://getbootstrap.com/), [jQuery](https://jquery.com/) and [Font Awesome](http://fontawesome.io/) for all those web development needs.
* The [Bootswatch](https://bootswatch.com/) theme I am using is [Journal](https://bootswatch.com/journal/).
* Special thanks to the guys at [Formspree](https://formspree.io/) for providing us all with an easy to use fallback for the contact form.

## Can I contribute?

Erm, well... This is my personal website. Feel free to fork it and change it around to make it your own. However, remember to credit whenever possible :) Also, if you found a typo or spelling mistake you can either tweet at me [@Carlos_Tweets](https://twitter.com/carlos_tweets) or create a pull request, thank you!

> _You are awesome!_

**Carlos F.**
