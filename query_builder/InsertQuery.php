<?php

class InsertQuery extends Query {
    function __construct(string $table_name) {
        parent::__construct($table_name);
        parent::appendQuery(QueryType::INSERT . ' INTO ' . parent::getTableName());
    }

    public function columns(array $cols): InsertQuery {
        parent::appendQuery(' (');
        for ($i = 0; $i < count($cols); $i++) {
            parent::appendQuery($cols[$i] . (count($cols) - $i == 1 ? '' : ','));
        }
        parent::appendQuery(') ');
        return $this;
    }

    public function values(array $values): InsertQuery {
        parent::appendQuery('VALUES (');
        for ($i = 0; $i < count($values); $i++) {
            parent::appendQuery('\'' . $values[$i] . '\'' . (count($values) - $i == 1 ? '' : ','));
        }
        parent::appendQuery(') ');
        return $this;
    }
}