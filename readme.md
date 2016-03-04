# Abode

**Abode** is an open-source web service built on the **Laravel framework** for monitoring your household's IoT devices as well as allowing access to other residents (such as roommates or tenants). It is designed to support popular devices and to make collaborating with others easier.

### Download Abode
You can either clone or download the nightly version of Adobe via Github, or visit the versions tab for stable versions. Once downloaded, you will need to run the following commands in the root directory.

1. ```composer install```
2. ```composer update```
3. ```php artisan migrate```
4. ```mkdir cache```

You may need to set proper permissions for the newly created cache folder to allow the application to function properly.

### Contributing
**Abode** is still *very early* in it's development and will be seeing a lot of clean up before it's at any ready state. The framework is being built very roughly and without front-end control over what is displayed, household names, and so forth.

Have a suggestion, question, or feature request? *Feel free to make a new issue*.
