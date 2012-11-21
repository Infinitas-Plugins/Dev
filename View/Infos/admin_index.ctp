<?php
	$devIcons = array(
		array(
			'name' => 'Xhprof',
			'description' => 'Profile requests and see where things can be improved',
			'icon' => '/xhprof/img/icon.png',
			'author' => 'Infinitas',
			'dashboard' => array('plugin' => 'xhprof', 'controller' => 'xhprofs', 'action' => 'index'),
		),
		array(
			'name' => 'Dummy Data',
			'description' => 'Generate random test data that makes sence',
			'icon' => '/dummy/img/icon.png',
			'author' => 'Infinitas',
			'dashboard' => array('plugin' => 'dummy', 'controller' => 'dummy_tables', 'action' => 'index'),
		)
	);
	$actions = array(
		$this->Html->link(
			__('List Symlinks'),
			array('action' => 'symlink', 'show' => 1, '?' => 'width=500'),
			array('class' => 'thickbox')
		),
		$this->Html->link(
			__('Create Symlinks'),
			array('action' => 'symlink')
		),
		$this->Html->link(
			__('Remove Symlinks'),
			array('action' => 'symlink', 'remove' => 1)
		)
	);

$devIcons = $this->Design->arrayToList(current((array)$this->Menu->builDashboardLinks($devIcons, 'dev_icons')), array(
	'ul' => 'icons'
));

echo $this->Design->dashboard($devIcons . $this->Design->arrayToList($actions, 'field-sort', true), __d('dev', 'Developer Tools'), array(
	'class' => 'dashboard span6',
));