<?php

class Parameters {

	protected static $parameters = null;

	public static function get($parameter) {

		if (is_null(self::$parameters)) {

			$enviroment_variables = array_merge($_SESSION, $_GET, $_POST);
			self::$parameters = $enviroment_variables;

				return (strpos($parameter, ".") === false) ? ((isset($enviroment_variables[$parameter])) ? $enviroment_variables[$parameter] : null)
				: ((substr($parameter, 0, 3) == 'get')
					? $_GET[substr($parameter,4)]
					: ((substr($parameter, 0, 4) == 'post')
						? $_POST[substr($parameter,5)]
						: $_SESSION[substr($parameter,8)]));
		}

		return (strpos($parameter, ".") === false)
			? self::$parameters[$parameter]
			: ((substr($parameter, 0, 3) == 'get')
				? $_GET[substr($parameter,4)]
				: ((substr($parameter, 0, 4) == 'post')
					? $_POST[substr($parameter,5)]
					: $_SESSION[substr($parameter,8)]));
	}

}
