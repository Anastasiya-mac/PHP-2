<?php

namespace models\repositories;

use models\repositories\Repository;

class ProductRepository extends Repository
{
    public function getTableName(): string {
        return 'products';
    }

    public function getRecordClassname(): string {
        return Product::class;
    }

    public function getByIds(array $ids) {
        $tablename = $this->getTableName();
        $where = implode(',', $ids);
        $sql = "SELECT * FROM {$tablename} WHERE id IN ({$where})";
        return $this->getQuery($sql);
    }
}