<?php
App::uses('AllTestsBase', 'Test/Lib');

class AllDevTestsTest extends AllTestsBase {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Dev test');

		$path = CakePlugin::path('Dev') . 'Test' . DS . 'Case' . DS;
		$suite->addTestDirectoryRecursive($path);

		return $suite;
	}
}
