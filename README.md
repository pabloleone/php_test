# Test Project

**You'll need to run the test on PHP 7+**


## Quick set up

 * Clone the project
 * Go to the root folder and execute composer install
 * Run the backend API using `php -S locahost:8001` (any port will work!)


## PSR

To check the code is passing the PSR code style standard you can execute the command `composer run-script psr` while in the root of the project.


## Comments

I refactored the frontend and backend until a point the code repects the DRY concept.

The browser or PHP timeout will be the longer the script could take to load.

I found some other tags that I haven't identified as risky such as quotes, so I preserve them in the case those are part of the information.

I followed Laravel concepts.

I only used libraries to check the PSR standard and Guzzle to reduce the time to write the API queries.
