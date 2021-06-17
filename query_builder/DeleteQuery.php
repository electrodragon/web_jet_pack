<?php

class DeleteQuery extends WhereApplicableQuery {
    function __construct(string $table_name) {
        parent::__construct($table_name);
        parent::appendQuery(QueryType::DELETE . " FROM " . parent::getTableName());
    }
}