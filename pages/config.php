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
						<code><?php echo substr(config_get('path'), 0, -1).plugin_page( 'redirect'); ?></code>
                    </li>
                </ol>
            </div>
            <div>
                <form class="form-horizontal" role="form" method="post"
                      action="<?php echo plugin_page( 'config_update' ) ?>">
					<?php echo form_security_field( 'plugin_MantisOIDC_config_update' ) ?>
					<div class="form-group">
						<label for="oidaurl" class="col-sm-3 control-label">OpenID Auth URL</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="oidaurl" name="oidaurl" placeholder="OpenID Auth URL"
								   value="<?php echo plugin_config_get( 'openIDAuthURL' ); ?>">
						</div>
					</div>
                    <div class="form-group">
                        <label for="oidclientid" class="col-sm-3 control-label">OpenID Client ID</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="oidclientid" name="oidclientid" placeholder="OpenID Client ID"
                                   value="<?php echo plugin_config_get( 'openIDClientID' ); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="oidsecret" class="col-sm-3 control-label">OpenID Client Secret</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="oidsecret" name="oidsecret" placeholder="Client Secret"
                                   value="<?php echo plugin_config_get( 'openIDClientSecret' ); ?>">
                        </div>
                    </div>

					<div class="form-group">
						<label for="login_button_text" class="col-sm-3 control-label">Text for Login-Button</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" id="login_button_text" name="login_button_text" placeholder="Login Button Text"
								   value="<?php echo plugin_config_get( 'login_button_text' ); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="hide_credentials_login" class="col-sm-3 control-label">Hide Credentials Login</label>
						<div class="col-sm-7">
							<input type="checkbox" class="form-control" id="hide_credentials_login" name="hide_credentials_login"
								   value="hide_credentials_login" <?php if ("true" == plugin_config_get( 'hide_credentials_login' )) echo "checked"; ?>>
						</div>
					</div>

                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-8">
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
