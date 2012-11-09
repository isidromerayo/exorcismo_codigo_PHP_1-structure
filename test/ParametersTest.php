<?php

require_once dirname(__FILE__).'/../src/Parameters.php';

class TestableParameters extends Parameters {

	public static function reset() {
		self::$p = null;
	}

}

class ParametersTest extends PHPUnit_Framework_TestCase {

	public function setUp(
	) {
		$_GET = array(
			"a-get-var" => "a value",
			"another-get-var" => "another value"
		);
		$_POST = array(
			"a-post-var" => "and another value",
			"another-post-var" => "and one else"
		);
		$_SESSION = array(
			"a-session-var" => "another",
			"another-session-var" => "a different one"
		);
		TestableParameters::reset();
	}

	public function test_unknownVarsAreNull(
	) {
		$this->assertNull(TestableParameters::get("anUnkownVar"));
	}

}
