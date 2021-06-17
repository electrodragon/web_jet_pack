<?php



class QueryBuilder {
    private string $query_type;

    private function __construct(string $query_type) {
        $this->query_type = $query_type;
    }

    public function withTableName(string $table_name) {
        if ($this->query_type === QueryType::INSERT) {
            return new InsertQuery($table_name);
        } else if ($this->query_type === QueryType::UPDATE) {
            return new UpdateQuery($table_name);
        } else if ($this->query_type === QueryType::SELECT) {
            return new SelectQuery($table_name);
        } else if ($this->query_type === QueryType::DELETE) {
            return new DeleteQuery($table_name);
        }
        return null;
    }

    public static function withQueryType(string $query_type): QueryBuilder {
        return new QueryBuilder($query_type);
    }
}
