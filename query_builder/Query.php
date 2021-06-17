<?php

class Query {
    private string $query = "";

    private string $table_name;

    function __construct(string $table_name) {
        $this->table_name = $table_name;
    }

    public function getTableName(): string {
        return $this->table_name;
    }

    public function appendQuery(string $query) {
        $this->query .= $query;
    }

    public function generate(): string {
        return $this->query;
    }
}