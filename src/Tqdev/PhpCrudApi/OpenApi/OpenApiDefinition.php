<?php
namespace Tqdev\PhpCrudApi\OpenApi;

class OpenApiDefinition extends DefaultOpenApiDefinition
{
    private function set(String $path, String $value) /*: void*/
    {
        $parts = explode('/', trim($path, '/'));
        $current = &$this->root;
        while (count($parts) > 0) {
            $part = array_shift($parts);
            if (!isset($current[$part])) {
                $current[$part] = [];
            }
            $current = &$current[$part];
        }
        $current = $value;
    }

    public function setPaths(DatabaseDefinition $database) /*: void*/
    {
        $result = [];
        foreach ($database->getTables() as $table) {
            $path = sprintf('/records/%s', $table->getName());
            foreach (['get', 'post', 'put', 'patch', 'delete'] as $method) {
                $this->set("/paths/$path/$method/description", "$method operation");
            }
        }
    }

    private function fillParametersWithPrimaryKey(String $method, TableDefinition $table) /*: void*/
    {
        if ($table->getPk() != null) {
            $pathWithId = sprintf('/records/%s/{%s}', $table->getName(), $table->getPk()->getName());
            $this->set("/paths/$pathWithId/$method/responses/200/description", "$method operation");
        }
    }
}
