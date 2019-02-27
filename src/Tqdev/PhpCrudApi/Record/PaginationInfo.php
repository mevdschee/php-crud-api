<?php
namespace Tqdev\PhpCrudApi\Record;

class PaginationInfo
{

    public $DEFAULT_PAGE_SIZE = 20;

    public function hasPage(array $params): bool
    {
        return isset($params['page']);
    }

    public function getPageOffset(array $params): int
    {
        $offset = 0;
        $pageSize = $this->getPageSize($params);
        if (isset($params['page'])) {
            foreach ($params['page'] as $page) {
                $parts = explode(',', $page, 2);
                $page = intval($parts[0]) - 1;
                $offset = $page * $pageSize;
            }
        }
        return $offset;
    }

    private function getPageSize(array $params): int
    {
        $pageSize = $this->DEFAULT_PAGE_SIZE;
        if (isset($params['page'])) {
            foreach ($params['page'] as $page) {
                $parts = explode(',', $page, 2);
                if (count($parts) > 1) {
                    $pageSize = intval($parts[1]);
                }
            }
        }
        return $pageSize;
    }

    public function getResultSize(array $params): int
    {
        $numberOfRows = -1;
        if (isset($params['size'])) {
            foreach ($params['size'] as $size) {
                $numberOfRows = intval($size);
            }
        }
        return $numberOfRows;
    }

    public function getPageLimit(array $params): int
    {
        $pageLimit = -1;
        if ($this->hasPage($params)) {
            $pageLimit = $this->getPageSize($params);
        }
        $resultSize = $this->getResultSize($params);
        if ($resultSize >= 0) {
            if ($pageLimit >= 0) {
                $pageLimit = min($pageLimit, $resultSize);
            } else {
                $pageLimit = $resultSize;
            }
        }
        return $pageLimit;
    }

}
