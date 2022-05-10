<?php

namespace Tqdev\PhpCrudApi\Column\Reflection;

use Tqdev\PhpCrudApi\Database\GenericReflection;

class ReflectedColumn implements \JsonSerializable
{
    const DEFAULT_LENGTH = 255;
    const DEFAULT_PRECISION = 19;
    const DEFAULT_SCALE = 4;

    private $name;
    private $realName;
    private $type;
    private $length;
    private $precision;
    private $scale;
    private $nullable;
    private $pk;
    private $fk;

    public function __construct(string $name, string $realName, string $type, int $length, int $precision, int $scale, bool $nullable, bool $pk, string $fk)
    {
        $this->name = $name;
        $this->realName = $realName;
        $this->type = $type;
        $this->length = $length;
        $this->precision = $precision;
        $this->scale = $scale;
        $this->nullable = $nullable;
        $this->pk = $pk;
        $this->fk = $fk;
        $this->sanitize();
    }

    private static function parseColumnType(string $columnType, int &$length, int &$precision, int &$scale) /*: void*/
    {
        if (!$columnType) {
            return;
        }
        $pos = strpos($columnType, '(');
        if ($pos) {
            $dataSize = rtrim(substr($columnType, $pos + 1), ')');
            if ($length) {
                $length = (int) $dataSize;
            } else {
                $pos = strpos($dataSize, ',');
                if ($pos) {
                    $precision = (int) substr($dataSize, 0, $pos);
                    $scale = (int) substr($dataSize, $pos + 1);
                } else {
                    $precision = (int) $dataSize;
                    $scale = 0;
                }
            }
        }
    }

    private static function getDataSize(int $length, int $precision, int $scale): string
    {
        $dataSize = '';
        if ($length) {
            $dataSize = $length;
        } elseif ($precision) {
            if ($scale) {
                $dataSize = $precision . ',' . $scale;
            } else {
                $dataSize = $precision;
            }
        }
        return $dataSize;
    }

    public static function fromReflection(GenericReflection $reflection, array $columnResult): ReflectedColumn
    {
        $name = $columnResult['COLUMN_NAME'];
        $realName = $columnResult['COLUMN_REAL_NAME'];
        $dataType = $columnResult['DATA_TYPE'];
        $length = (int) $columnResult['CHARACTER_MAXIMUM_LENGTH'];
        $precision = (int) $columnResult['NUMERIC_PRECISION'];
        $scale = (int) $columnResult['NUMERIC_SCALE'];
        $columnType = $columnResult['COLUMN_TYPE'];
        self::parseColumnType($columnType, $length, $precision, $scale);
        $dataSize = self::getDataSize($length, $precision, $scale);
        $type = $reflection->toJdbcType($dataType, $dataSize);
        $nullable = in_array(strtoupper($columnResult['IS_NULLABLE']), ['TRUE', 'YES', 'T', 'Y', '1']);
        $pk = false;
        $fk = '';
        return new ReflectedColumn($name, $realName, $type, $length, $precision, $scale, $nullable, $pk, $fk);
    }

    public static function fromJson( /* object */$json): ReflectedColumn
    {
        $name = $json->alias ?? $json->name;
        $realName = $json->name;
        $type = $json->type;
        $length = isset($json->length) ? (int) $json->length : 0;
        $precision = isset($json->precision) ? (int) $json->precision : 0;
        $scale = isset($json->scale) ? (int) $json->scale : 0;
        $nullable = isset($json->nullable) ? (bool) $json->nullable : false;
        $pk = isset($json->pk) ? (bool) $json->pk : false;
        $fk = isset($json->fk) ? $json->fk : '';
        return new ReflectedColumn($name, $realName, $type, $length, $precision, $scale, $nullable, $pk, $fk);
    }

    private function sanitize()
    {
        $this->length = $this->hasLength() ? $this->getLength() : 0;
        $this->precision = $this->hasPrecision() ? $this->getPrecision() : 0;
        $this->scale = $this->hasScale() ? $this->getScale() : 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRealName(): string
    {
        return $this->realName;
    }

    public function getNullable(): bool
    {
        return $this->nullable;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLength(): int
    {
        return $this->length ?: self::DEFAULT_LENGTH;
    }

    public function getPrecision(): int
    {
        return $this->precision ?: self::DEFAULT_PRECISION;
    }

    public function getScale(): int
    {
        return $this->scale ?: self::DEFAULT_SCALE;
    }

    public function hasLength(): bool
    {
        return in_array($this->type, ['varchar', 'varbinary']);
    }

    public function hasPrecision(): bool
    {
        return $this->type == 'decimal';
    }

    public function hasScale(): bool
    {
        return $this->type == 'decimal';
    }

    public function isBinary(): bool
    {
        return in_array($this->type, ['blob', 'varbinary']);
    }

    public function isBoolean(): bool
    {
        return $this->type == 'boolean';
    }

    public function isGeometry(): bool
    {
        return $this->type == 'geometry';
    }

    public function isInteger(): bool
    {
        return in_array($this->type, ['integer', 'bigint', 'smallint', 'tinyint']);
    }

    public function isText(): bool
    {
        return in_array($this->type, ['varchar', 'clob']);
    }

    public function setPk($value) /*: void*/
    {
        $this->pk = $value;
    }

    public function getPk(): bool
    {
        return $this->pk;
    }

    public function setFk($value) /*: void*/
    {
        $this->fk = $value;
    }

    public function getFk(): string
    {
        return $this->fk;
    }

    public function serialize()
    {
        $json = [
            'name' => $this->realName,
            'alias' => $this->name != $this->realName ? $this->name : null,
            'type' => $this->type,
            'length' => $this->length,
            'precision' => $this->precision,
            'scale' => $this->scale,
            'nullable' => $this->nullable,
            'pk' => $this->pk,
            'fk' => $this->fk,
        ];
        return array_filter($json);
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->serialize();
    }
}
