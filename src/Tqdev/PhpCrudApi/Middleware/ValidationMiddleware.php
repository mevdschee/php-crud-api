<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

class ValidationMiddleware extends Middleware {
	private $reflection;
	private $typesToValidate;

	public function __construct(Router $router, Responder $responder, array $properties, ReflectionService $reflection) {
		parent::__construct($router, $responder, $properties);
		$this->reflection = $reflection;
		$typesStr = $this->getProperty('types', 'all');
		if (is_null($typesStr)) {
			$typesStr = 'all';
		}
		if (strlen($typesStr) == 0) {
			$typesStr = 'none';
		}
		$this->typesToValidate = explode(',', $typesStr);
		if (is_null($this->typesToValidate) || count($this->typesToValidate) == 0) {
			$this->typesToValidate = ['all'];
		}
	}

	private function callHandler($handler, $record, string $operation, ReflectedTable $table) /*: ResponseInterface?*/ {
		$context = (array) $record;
		$details = array();
		$tableName = $table->getName();
		foreach ($context as $columnName => $value) {
			if ($table->hasColumn($columnName)) {
				$column = $table->getColumn($columnName);
				$valid = call_user_func($handler, $operation, $tableName, $column->serialize(), $value, $context);
				if ($valid || $valid == '') {
					$valid = $this->validateType($column->serialize(), $value);
				}
				if ($valid !== true && $valid !== '') {
					$details[$columnName] = $valid;
				}
			}
		}
		if (count($details) > 0) {
			return $this->responder->error(ErrorCode::INPUT_VALIDATION_FAILED, $tableName, $details);
		}
		return null;
	}

	private function validateType($column, $value) {
		if ($this->typesToValidate[0] == 'none') {
			return (true);
		}
		if ($this->typesToValidate[0] != 'all') {
			if (!in_array($column['type'], $this->typesToValidate)) {
				return (true);
			}
		}
		if (is_null($value)) {
			return ($column["nullable"] ? true : "cannot be null");
		}
		switch ($column['type']) {
		case 'integer':
			if (!is_numeric($value)) {
				return ('must be numeric');
			}

			if (strlen($value) > 20) {
				return ('exceeds range');
			}

			break;
		case 'bigint':
			if (!is_numeric($value)) {
				return ('must be numeric');
			}

			if (strlen($value) > 20) {
				return ('exceeds range');
			}

			break;
		case 'varchar':
			if (strlen($value) > $column['length']) {
				return ('too long');
			}

			break;
		case 'decimal':
			if (!is_float($value) && !is_numeric($value)) {
				return ('not a float');
			}

			break;
		case 'float':
			if (!is_float($value) && !is_numeric($value)) {
				return ('not a float');
			}

			break;
		case 'double':
			if (!is_float($value) && !is_numeric($value)) {
				return ('not a float');
			}

			break;
		case 'boolean':
			if ($value != 0 && $value != 1) {
				return ('not a valid boolean');
			}

			break;
		case 'date':
			$date_array = explode('-', $value);
			if (count($date_array) != 3) {
				return ('invalid date format use yyyy-mm-dd');
			}

			if (!@checkdate($date_array[1], $date_array[2], $date_array[0])) {
				return ('not a valid date');
			}

			break;
		case 'time':
			$time_array = explode(':', $value);
			if (count($time_array) != 3) {
				return ('invalid time format use hh:mm:ss');
			}

			foreach ($time_array as $t) {
				if (!is_numeric($t)) {
					return ('non-numeric time value');
				}
			}

			if ($time_array[1] < 0 || $time_array[2] < 0 || $time_array[0] < -838 || $time_array[1] > 59 || $time_array[2] > 59 || $time_array[0] > 838) {
				return ('not a valid time');
			}

			break;
		case 'timestamp':
			$split_timestamp = explode(' ', $value);
			if (count($split_timestamp) != 2) {
				return ('invalid timestamp format use yyyy-mm-dd hh:mm:ss');
			}

			$date_array = explode('-', $split_timestamp[0]);
			if (count($date_array) != 3) {
				return ('invalid date format use yyyy-mm-dd');
			}

			if (!@checkdate($date_array[1], $date_array[2], $date_array[0])) {
				return ('not a valid date');
			}

			$time_array = explode(':', $split_timestamp[1]);
			if (count($time_array) != 3) {
				return ('invalid time format use hh:mm:ss');
			}

			foreach ($time_array as $t) {
				if (!is_numeric($t)) {
					return ('non-numeric time value');
				}
			}

			if ($time_array[1] < 0 || $time_array[2] < 0 || $time_array[0] < 0 || $time_array[1] > 59 || $time_array[2] > 59 || $time_array[0] > 23) {
				return ('not a valid time');
			}

			break;
		case 'clob':
			break;
		case 'blob':
			break;
		case 'varbinary':
			if (((strlen($value) * 3 / 4) - substr_count(substr($value, -2), '=')) > $column['length']) {
				return ('too long');
			}

			break;
		case 'geometry':
			break;
		}
		return (true);
	}

	public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface{
		$operation = RequestUtils::getOperation($request);
		if (in_array($operation, ['create', 'update', 'increment'])) {
			$tableName = RequestUtils::getPathSegment($request, 2);
			if ($this->reflection->hasTable($tableName)) {
				$record = $request->getParsedBody();
				if ($record !== null) {
					$handler = $this->getProperty('handler', '');
					if ($handler !== '') {
						$table = $this->reflection->getTable($tableName);
						if (is_array($record)) {
							foreach ($record as $r) {
								$response = $this->callHandler($handler, $r, $operation, $table);
								if ($response !== null) {
									return $response;
								}
							}
						} else {
							$response = $this->callHandler($handler, $record, $operation, $table);
							if ($response !== null) {
								return $response;
							}
						}
					}
				}
			}
		}
		return $next->handle($request);
	}
}
