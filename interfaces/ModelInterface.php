<?php

namespace interfaces;

interface ModelInterface
{
    function GetByID(int $id);

    function GetAll();

    function getTableName(): string;
}
