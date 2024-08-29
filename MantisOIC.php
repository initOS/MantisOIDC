<?php

class MantisOICPlugin extends MantisPlugin {

	var $cmv_pages;
	var $current_page;

	function register() {
		$this->name        = 'Mantis OpenID-Connect';
		$this->description = 'Add OpenID-Connect authentication to MantisBT. Fork of GoogleOauth plugin by Alleen Wang wchwch@gmail.com';
		$this->page        = 'config';

		$this->version  = '1.0';
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
			<style>
			#plugin_googleoauth {
				margin-top:20px;
				padding-top:20px;
				border-top: 1px solid #CCC;
				text-align:right;
				}
				#plugin_googleoauth a {
						background: url('.plugin_file("google_signin.png").')  -0 -0;;
						text-indent: 100%;
						white-space: nowrap;
						overflow: hidden;
						display: inline-block;
						height: 46px;
						width: 191px;
						margin-right:25px;
				}
				#plugin_googleoauth a:hover {
						background: url('.plugin_file("google_signin.png").') -0 -46px;
						width: 191px;
						height: 46px;
				}
			</style>
			<script type="text/javascript" src="'.plugin_file("plugin.js").'"></script>
		';
	}
}
