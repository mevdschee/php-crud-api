<?php

namespace Tqdev\PhpCrudApi\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tqdev\PhpCrudApi\Column\ReflectionService;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedTable;
use Tqdev\PhpCrudApi\Column\Reflection\ReflectedColumn;
use Tqdev\PhpCrudApi\Config\Config;
use Tqdev\PhpCrudApi\Controller\Responder;
use Tqdev\PhpCrudApi\Middleware\Base\Middleware;
use Tqdev\PhpCrudApi\Middleware\Router\Router;
use Tqdev\PhpCrudApi\Record\ErrorCode;
use Tqdev\PhpCrudApi\RequestUtils;

class ValidationMiddleware extends Middleware
{
	private $reflection;

	public function __construct(Router $router, Responder $responder, Config $config, string $middleware, ReflectionService $reflection)
	{
		parent::__construct($router, $responder, $config, $middleware);
		$this->reflection = $reflection;
	}

	private function callHandler($handler, $record, string $operation, ReflectedTable $table) /*: ResponseInterface?*/
	{
		$context = (array) $record;
		$details = array();
		$tableName = $table->getName();
		foreach ($context as $columnName => $value) {
			if ($table->hasColumn($columnName)) {
				$column = $table->getColumn($columnName);
				$valid = call_user_func($handler, $operation, $tableName, $column->serialize(), $value, $context);
				if ($valid === true || $valid === '') {
					$valid = $this->validateType($table, $column, $value);
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

	private function validateType(ReflectedTable $table, ReflectedColumn $column, $value)
	{
		$tables = $this->getArrayProperty('tables', 'all');
		$types = $this->getArrayProperty('types', 'all');
		if (
			(in_array('all', $tables) || in_array($table->getName(), $tables)) &&
			(in_array('all', $types) || in_array($column->getType(), $types))
		) {
			if (is_null($value)) {
				return ($column->getNullable() ? true : "cannot be null");
			}
			if (is_string($value)) {
				// check for whitespace
				switch ($column->getType()) {
					case 'varchar':
					case 'clob':
						break;
					default:
						if (strlen(trim($value)) != strlen($value)) {
							return 'illegal whitespace';
						}
						break;
				}
				// try to parse
				switch ($column->getType()) {
					case 'integer':
					case 'bigint':
						if (
							filter_var($value, FILTER_SANITIZE_NUMBER_INT) !== $value ||
							filter_var($value, FILTER_VALIDATE_INT) === false
						) {
							return 'invalid integer';
						}
						break;
					case 'decimal':
						if (strpos($value, '.') !== false) {
							list($whole, $decimals) = explode('.', ltrim($value, '-'), 2);
						} else {
							list($whole, $decimals) = array(ltrim($value, '-'), '');
						}
						if (strlen($whole) > 0 && !ctype_digit($whole)) {
							return 'invalid decimal';
						}
						if (strlen($decimals) > 0 && !ctype_digit($decimals)) {
							return 'invalid decimal';
						}
						if (strlen($whole) > $column->getPrecision() - $column->getScale()) {
							return 'decimal too large';
						}
						if (strlen($decimals) > $column->getScale()) {
							return 'decimal too precise';
						}
						break;
					case 'float':
					case 'double':
						if (
							filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT) !== $value ||
							filter_var($value, FILTER_VALIDATE_FLOAT) === false
						) {
							return 'invalid float';
						}
						break;
					case 'boolean':
						if (!in_array(strtolower($value), array('true', 'false'))) {
							return 'invalid boolean';
						}
						break;
					case 'date':
						if (date_create_from_format('Y-m-d', $value) === false) {
							return 'invalid date';
						}
						break;
					case 'time':
						if (date_create_from_format('H:i:s', $value) === false) {
							return 'invalid time';
						}
						break;
					case 'timestamp':
						if (date_create_from_format('Y-m-d H:i:s', $value) === false) {
							return 'invalid timestamp';
						}
						break;
					case 'clob':
					case 'varchar':
						if ($column->hasLength() && mb_strlen($value, 'UTF-8') > $column->getLength()) {
							return 'string too long';
						}
						break;
					case 'blob':
					case 'varbinary':
						if (base64_decode($value, true) === false) {
							return 'invalid base64';
						}
						if ($column->hasLength() && strlen(base64_decode($value)) > $column->getLength()) {
							return 'string too long';
						}
						break;
					case 'geometry':
						// no checks yet
						break;
				}
			} else { // check non-string types
				switch ($column->getType()) {
					case 'integer':
					case 'bigint':
						if (!is_int($value)) {
							return 'invalid integer';
						}
						break;
					case 'float':
					case 'double':
						if (!is_float($value) && !is_int($value)) {
							return 'invalid float';
						}
						break;
					case 'boolean':
						if (!is_bool($value) && ($value !== 0) && ($value !== 1)) {
							return 'invalid boolean';
						}
						break;
					default:
						return 'invalid ' . $column->getType();
				}
			}
			// extra checks
			switch ($column->getType()) {
				case 'integer': // 4 byte signed
					$value = filter_var($value, FILTER_VALIDATE_INT);
					if ($value > 2147483647 || $value < -2147483648) {
						return 'invalid integer';
					}
					break;
			}
		}
		return (true);
	}

	public function process(ServerRequestInterface $request, RequestHandlerInterface $next): ResponseInterface
	{
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
