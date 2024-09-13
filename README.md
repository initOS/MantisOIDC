Features
--------
1. Add OpenIDConnect support to login to MantisBT.
2. User must have an existing MantisBT account where the username matches the username in the OpenID system!
3. Signup / account creation scenario is not supported.

How to install
--------------
1. Copy MantisOIC folder into plugins folder.
2. run `composer install` in plugins/MantisOIC/pages/lib/OpenID-Connect-PHP to install dependencies
3. Open Mantis with browser.
4. Log in as administrator.
5. Go to Manage -> Manage Plugins.
6. Find *Mantis OpenID-Connect* in the list.
7. Click Install.

How to use
----------
1. Go Manage -> Manage Plugins -> Mantis OpenID-Connect and click the name to open the plugin's config page
2. Copy the highlighted redirect URL
3. Go to you OpenID authentication system and create a new client. Past the copied redirect URL
4. Enter the URL for your OpenID system with the endpoint for SSO
5. Copy client id and secret key to MantisOIC setting page.
6. Enter a name for the Login Button
7. Click the save button.

Notes
-----
1. Tested in MantisBT 2.25.2. Let me know if you are using other OpenID systems and your experiences with this plugin!
2. So far only tested with keycloak
3. When disabling the credentials input, curious users might still be able to login with username/password by sending a http POST request
4. Users are still able to directly open the lost password page `lost_pwd_page.php` and set their password within MantisBT. This will **NOT** affect the password in the OpenID system!
5. If there is trouble with authentication and you are locked out of the system without being able to enter credentials, go to the MantisBT database, find the table [mantis]_config_table, search for the value `plugin_MantisOIC_hide_credentials_login` and set its value to `false`. This should reenable the login via credentials.
6. Translations available for English and German. More languages can be added under `plugins/MantisOIC/lang`. Feel free to send a merge request with new languages added!

Supported Versions
------------------
- MantisBT 1.2.x - supported
- MantisBT 1.3.x - **not supported**
- MantisBT 2.6 and higher - supported


