<?php

// Get entity statistics
$entity_stats = get_entity_statistics($vars['entity']->guid);

if ($entity_stats) {
	$rows = '';
	$even_odd = null;
	foreach ($entity_stats as $k => $entry) {
		foreach ($entry as $a => $b) {

			// This function controls the alternating class
			$even_odd = ( 'odd' != $even_odd ) ? 'odd' : 'even';

			if ($a == "__base__") {
				$a = elgg_echo("item:{$k}");
				if (empty($a)) {
					$a = $k;
				}
			} else {
				$a = elgg_echo("item:{$k}:{$a}");
				if (empty($a)) {
					$a = "$k $a";
				}
			}
			$rows .= <<< END
				<tr class="{$even_odd}">
					<td class="column-one"><b>{$a}:</b></td>
					<td>{$b}</td>
				</tr>
END;
		}
	}

	$title = elgg_echo('duc:label:statistics', array($vars['entity']->name));
	$content = "<table class=\"elgg-table-alt\">$rows</table>";

	echo elgg_view_module('info', $title, $content);
}
