<?php

namespace interfaces;

interface ModelInterface
{
    static function getById(int $id);

    static function getAll();

    static function getTableName(): string;
}
