<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

$headerHeightOptions = array( 'Default', 'Small', 'Tiny' );
$skinOptions         = array( 'poser Default', 'Flat', 'MantisMan' );

layout_page_header( plugin_lang_get( 'title' ) );

layout_page_begin( 'manage_overview_page.php' );

print_manage_menu( 'manage_plugin_page.php' );
?>
    <div class="col-md-12 col-xs-12">
        <div class="space-10"></div>
        <div class="form-container">
            <h1><p class="text-center"><?php echo plugin_lang_get( "title" ) ?></p></h1>
            <div>
                Set-up Instructions:

                <ol>
                    <li>
                        Create a new client in your OpenIDConnect environment
                    </li>
                    <li>Use the following redirect URL<br>
						<code><?php echo substr(config_get('path'), 0, -1).plugin_page( 'redirect'); ?></code> <span>(Be aware that there might be more URLs if your MantisBT is available at multiple URLs. Add <b>ALL</b> of them to your OpenID-Client!)</span>
                    </li>
                </ol>
            </div>
            <div>
                <form class="form-horizontal" role="form" method="post"
                      action="<?php echo plugin_page( 'config_update' ) ?>">
					<?php echo form_security_field( 'plugin_MantisOIDC_config_update' ) ?>
					<div class="form-group">
						<label for="oidaurl" class="col-sm-3 control-label label-info label-white">OpenID Auth URL<br /><span class="smaller-75">The URL Endpoint for your authentication system</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="oidaurl" name="oidaurl" placeholder="OpenID Auth URL"
								   value="<?php echo plugin_config_get( 'openIDAuthURL', '' ); ?>">
						</div>
					</div>
                    <div class="form-group">
                        <label for="oidclientid" class="col-sm-3 control-label label-info label-white">OpenID Client ID<br /><span class="smaller-75">The Name fo the Client you configured in your OIDC system</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="oidclientid" name="oidclientid" placeholder="OpenID Client ID"
                                   value="<?php echo plugin_config_get( 'openIDClientID', '' ); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="oidsecret" class="col-sm-3 control-label label-info label-white">OpenID Client Secret<br /><span class="smaller-75">The Client's secret/password</span></label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="oidsecret" name="oidsecret" placeholder="Client Secret"
                                   value="<?php echo plugin_config_get( 'openIDClientSecret', '' ); ?>">
                        </div>
                    </div>

					<div class="form-group">
						<label for="oidc_role" class="col-sm-3 control-label label-info label-white">User Role<br /><span class="smaller-75">Role in you OIDC system a user has to have, to successfully login into MantisBT. Leave empty if every user is allowed to login (as long as they have an MantisBT account).</span></label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="oidc_role" name="oidc_role" placeholder="Client Secret"
								   value="<?php echo plugin_config_get( 'oidc_role', '' ); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="login_button_text" class="col-sm-3 control-label label-info label-white">Text for Login-Button<br /><span class="smaller-75">Text displayed on the Login-Button</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="login_button_text" name="login_button_text" placeholder="Login Button Text"
								   value="<?php echo plugin_config_get( 'login_button_text', '' ); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="hide_credentials_login" class="col-sm-3 control-label label-info label-white">Hide Credentials Login<br /><span class="smaller-75">MantisBT's default login mask will be hidden on login screen.</span></label>
						<div class="col-sm-7">
							<input type="checkbox" class="form-control" id="hide_credentials_login" name="hide_credentials_login"
								   value="hide_credentials_login" <?php if ("true" == plugin_config_get( 'hide_credentials_login', 'false' )) echo "checked"; ?>>
						</div>
					</div>

					<div class="form-group">
						<label for="auto_login" class="col-sm-3 control-label label-info label-white">Auto Login<br /><span class="smaller-75">Directly redirect to this plugin's login routine. No buttons have to be clicked.</span></label>
						<div class="col-sm-7">
							<input type="checkbox" class="form-control" id="auto_login" name="auto_login"
								   value="auto_login" <?php if ("true" == plugin_config_get( 'auto_login', 'false' )) echo "checked"; ?>>
						</div>
					</div>



                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-7">
                            <input id="submit" name="submit" type="submit"
                                   value="<?php echo plugin_lang_get( "save" ) ?>"
                                   class="btn btn-primary">
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>

<?php
layout_page_end();
