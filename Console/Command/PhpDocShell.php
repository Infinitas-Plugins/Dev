<?php
/**
 * PhpDoc Shell
 *
 * @package Developer.Dev.Shell
 */

/**
 * PhpDoc Shell
 *
 * Shell for generating PhpDoc API
 *
 * @copyright Copyright (c) 2012 Carl Sutton ( dogmatic69 )
 * @link http://www.infinitas-cms.org
 * @package Developer.Dev.Console
 * @license http://www.opensource.org/licenses/mit-license.php The MIT License
 * @since 0.9a
 *
 * @author Carl Sutton <dogmatic69@infinitas-cms.org>
 */

class PhpDocShell extends AppShell {
/**
 * Generate the api docs
 */
	public function generate() {
		$command = $this->_command();
		$parsing = explode("\n", `$command`);
		$files = array();
		foreach($parsing as $k => $line) {
			if(substr($line, 0, 7) == 'Parsing') {
				$files[] = substr($line, 8);
				unset($parsing[$k]);
			}
		}

		$this->out(sprintf('Parsed %d files', count($files)));
		$this->out(implode("\n", $parsing));
	}

/**
 * Get the command for generating docs
 *
 * @return string
 */
	protected function _command() {
		$options = array(
			sprintf('--config %s', InfinitasPlugin::path('Dev') . 'Config' . DS . 'phpdoc.xml'),
			sprintf('--target %s', APP . 'webroot' . DS  . 'api'),
			sprintf('--directory %s', APP . 'Core'),
			//sprintf('--template %s', InfinitasPlugin::path('Dev') . 'webroot' . DS . 'infinitas')
		);

		return sprintf('%s %s', $this->_phpdoc(), implode(' ', $options));
	}

/**
 * Get the PhpDoc executable
 *
 * This will check for the PhpDoc executable and throw exception if not found
 *
 * @return string
 *
 * @throws CakeException
 */
	protected function _phpdoc() {
		$phpdoc = trim(`which phpdoc`);
		if(empty($phpdoc)) {
			throw new CakeException('PhpDoc not found');
		}

		return $phpdoc;
	}

}