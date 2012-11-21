
<?php
$out = __('No symlinks available %s',
	$this->Html->link(__('create some now'), array(
		'action' => 'symlink'
	))
);
if(!empty($links)) {
	foreach($links as $k => $link) {
		$links[$k] = str_replace(getcwd() . DS, 'WEBROOT/', $link);
	}

	$out = $this->Design->arrayToList($links);
}

echo $this->Design->dashboard($out, __d('dev', 'Symlinks <small>%d links found</small>', count($links)));