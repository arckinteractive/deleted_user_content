<?php

namespace deleted_user_content;

/**
 * upgrade older versions to use plugin versioning
 */
function upgrade_20150321() {
	$version = (int) elgg_get_plugin_setting('version', PLUGIN_ID);
	if ($version >= PLUGIN_VERSION) { error_log('current');
		// plugin version is already current or higher
		return true;
	}
	
	elgg_set_plugin_setting('version', 20150321, PLUGIN_ID);
}