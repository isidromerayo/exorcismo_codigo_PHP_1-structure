<?php

class Parameters {

	protected static $p = null;

	public static function get($p) {
		if (is_null(self::$p)) {
			$a = array_merge($_SESSION, $_GET, $_POST);
			self::$p = $a;
			return (strpos($p, ".") === false)
				? ((isset($a[$p])) ? $a[$p] : null)
				: ((substr($p, 0, 3) == 'get')
					? $_GET[substr($p,4)]
					: ((substr($p, 0, 4) == 'post')
						? $_POST[substr($p,5)]
						: $_SESSION[substr($p,8)]));
		}
		return (strpos($p, ".") === false)
			? self::$p[$p]
			: ((substr($p, 0, 3) == 'get')
				? $_GET[substr($p,4)]
				: ((substr($p, 0, 4) == 'post')
					? $_POST[substr($p,5)]
					: $_SESSION[substr($p,8)]));
	}

}
