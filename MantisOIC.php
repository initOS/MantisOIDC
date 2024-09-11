<?php

class MantisOICPlugin extends MantisPlugin {

	var $cmv_pages;
	var $current_page;

	function register() {
		$this->name        = 'Mantis OpenID-Connect';
		$this->description = 'Add OpenID-Connect authentication to MantisBT. Fork of GoogleOauth plugin by Alleen Wang wchwch@gmail.com';
		$this->page        = 'config';

		$this->version  = '0.9';
		$this->requires = array(
			'MantisCore' => '2.0.0',
		);

		$this->author  = 'FSD-Christian-ADM';
		$this->contact = '13xisw13yl2@fsd-web.de';
		$this->url     = 'https://github.com/FSD-Christian-ADM/MantisOIC';
	}

	function init() {
		$this->cmv_pages    = array(
			'login_page.php',
			'login_password_page.php'
		);
		$this->current_page = basename( $_SERVER['PHP_SELF'] );
	}

	function hooks() {
		return array(
			'EVENT_LAYOUT_RESOURCES' => 'resources'
		);
	}

	function config() {
		return array(
			'clientId'     => '',
			'clientSecret' => '',
			'redirect_uri' => '', # is set once the config page is saved
		);
	}

	function resources() {
		if ( ! in_array( $this->current_page, $this->cmv_pages ) ) {
			return '';
		}

		return '
			<meta name="redirectUri" content="' . plugin_config_get( 'redirect_uri' ) . '" />
			<meta name="clientId" content="' . plugin_config_get( 'clientId' ) . '" />
			<meta name="oicStart" content="' . plugin_page( 'oicStart' ) . '" />
			<style>
			
			    #plugin_mantisoic_separator {
                  display: flex;
                  align-items: center;
                  text-align: center;
                  margin-block: 1rem;;
                  color: #889;
                }
                
                #plugin_mantisoic_separator::before,
                #plugin_mantisoic_separator::after {
                  content: "";
                  flex: 1;
                  border-bottom: 1px solid #889;
                }
                
                #plugin_mantisoic_separator:not(:empty)::before {
                  margin-right: .25em;
                }
                
                #plugin_mantisoic_separator:not(:empty)::after {
                  margin-left: .25em;
                }
			
							
				#plugin_mantisoic_login_button {				        
				        background-color: #008aaa;
				        color: white;
				        display:grid;				        
				        padding: 1rem;
				        padding-left: 2rem;
				        border-radius: 5rem;
				        place-items: center;
				        font-size: 110%;				        
				}
				
				#plugin_mantisoic_login_button::before {				
				    content:"'.plugin_config_get('login_button_text', plugin_lang_get('login_button_default')).'";
                }
                
                #plugin_mantisoic_login_button:hover {
                    text-decoration: none;
                    background-color: #006888;
                }
				
				
			</style>
			<script type="text/javascript">
			    var plugin_MantisOIC_seperator_text = "'. plugin_lang_get('seperator_text') .'"
            </script>
			<script type="text/javascript" src="'.plugin_file("plugin.js").'"></script>
		';
	}
}
