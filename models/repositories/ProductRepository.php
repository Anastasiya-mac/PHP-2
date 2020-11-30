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
}