<?php

require_once dirname(__FILE__).'/../src/Parameters.php';

class TestableParameters extends Parameters {

	public static function reset() {
		self::$parameters = null;
	}

}

class ParametersTest extends PHPUnit_Framework_TestCase {

	public function setUp(
	) {
		$_GET = array(
			"a-get-var" => "a value",
			"another-get-var" => "another value",
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

    public function test_knownVarsGetArentNull(
    ) {
        $this->assertEquals('a value',TestableParameters::get("a-get-var"));
    }

    public function test_knownVarsGetFromPostArentNull(
    ) {
        $this->assertEquals('and another value',TestableParameters::get("a-post-var"));
    }

    public function test_unknownVarsBeginGetWithPoint(
    ) {
        $this->assertEquals('a value',TestableParameters::get("get.a-get-var"));
    }

    public function test_unknownVarsBeginPostWithPoint(
    ) {
        $this->assertEquals('and another value',TestableParameters::get("post.a-post-var"));
    }

    public function test_knownVarsBeginSessionWithPoint(
    ) {
        $this->assertEquals('another',TestableParameters::get("session.a-session-var"));
    }

    public function test_unknownVarsTwoAsserts(
    ) {
        TestableParameters::get('demo');
        TestableParameters::get('get.a-get-var');
        TestableParameters::get('session.a-session-var');
        $this->assertEquals('and another value',TestableParameters::get("a-post-var"));
    }
    public function test_modifyGet()
    {
        $this->markTestIncomplete();
        TestableParameters::get('get.a-get-var');
        $_GET['a-get-var'] = 'efecto demo';
        $this->assertEquals('efecto demo',TestableParameters::get('a-get-var'));
    }
}
