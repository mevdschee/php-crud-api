<?php

namespace Tqdev\PhpCrudApi\OpenApi;

/**
 * Component keys and operation ids have to match "^[a-zA-Z0-9._-]+$", so the
 * table name is transliterated to ASCII and whatever is still not allowed is
 * replaced. That can make two table names collide, which is reported instead of
 * resolved, as any name this generates would be a guess at what the table should
 * have been called. The builders that name a component after a table share one
 * instance, so that a collision is found no matter which of them ran first.
 */
class OpenApiTableNames
{
    private $normalized = [];

    public function normalize(string $tableName): string
    {
        if (!isset($this->normalized[$tableName])) {
            $key = iconv('UTF-8', 'ASCII//TRANSLIT', $tableName);
            $key = (string) preg_replace('/[^a-zA-Z0-9._-]+/', '_', $key === false ? $tableName : $key);
            if ($key === '') {
                throw new \Exception("Table '$tableName' has no characters that are allowed in an OpenAPI component key, alias it using the 'mapping' setting");
            }
            $other = array_search($key, $this->normalized, true);
            if ($other !== false) {
                throw new \Exception("Tables '$other' and '$tableName' both become '$key' in the OpenAPI document, alias one of them using the 'mapping' setting");
            }
            $this->normalized[$tableName] = $key;
        }
        return $this->normalized[$tableName];
    }
}
