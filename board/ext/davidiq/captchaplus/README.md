# CAPTCHA+

Through the use of permissions, you can require CAPTCHA for:
* Posting new topics or replies to existing topics
  * The forum permission is: _Can post without CAPTCHA_
* Sending PMs
  * The user permission is: _Can send private messages without CAPTCHA_
* Contact Admin
  * The user permission is: _Can contact admin without CAPTCHA_

Setting these for a user or group to **Never** will require them to fill out the CAPTCHA for said action.

## Installation

_phpBB version 3.3.x and higher required_

Copy the extension to phpBB/ext/davidiq/captchaplus

Go to "ACP" > "Customise" > "Extensions" and enable the "CAPTCHA+" extension.

## Tests and Continuous Integration

We use Travis-CI as a continuous integration server and phpunit for our unit testing. See more information on the [phpBB Developer Docs](https://area51.phpbb.com/docs/dev/master/testing/index.html).
To run the tests locally, you need to install phpBB from its Git repository. Afterwards run the following command from the phpBB Git repository's root:

Windows:

    phpBB\vendor\bin\phpunit.bat -c phpBB\ext\davidiq\captchaplus\phpunit.xml.dist

others:

    phpBB/vendor/bin/phpunit -c phpBB/ext/davidiq/captchaplus/phpunit.xml.dist

## License

[GNU General Public License v2](license.txt)
