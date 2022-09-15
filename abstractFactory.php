<?php

class Application {

    protected $connection;
    protected $record;
    protected $queryBuilder;

    public function __construct(DBFactoryInterface $DBFactory)
    {
        $this->connection = $DBFactory->createConnection();
        $this->record = $DBFactory->createRecord();
        $this->queryBuilder = $DBFactory->createQueryBuilder();

    }

    public function run()
    {

    }
}

interface ConnectionInterface {}
interface RecordInterface {}
interface QueryBuilderInterface {}


class MySQLConnection implements ConnectionInterface {}

class MySQLRecord implements RecordInterface {}

class MySQLQueryBuilderInterface implements QueryBuilderInterface {}


class PostgreSQLConnection implements ConnectionInterface {}

class PostgreSQLRecord implements RecordInterface {}

class PostgreSQLQueryBuilderInterface implements QueryBuilderInterface {}


class OracleConnection implements ConnectionInterface {}

class OracleRecord implements RecordInterface {}

class OracleQueryBuilderInterface implements QueryBuilderInterface {}


interface DBFactoryInterface {

    public function createConnection(): ConnectionInterface;
    public function createRecord(): RecordInterface;
    public function createQueryBuilder(): QueryBuilderInterface;
}

class MySQLFactory implements DBFactoryInterface {

    public function createConnection(): ConnectionInterface
    {
        return new MySQLConnection();
    }

    public function createRecord(): RecordInterface
    {
        return new MySQLRecord();
    }

    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new MySQLQueryBuilderInterface();
    }
}

class PostgreSQLFactory implements DBFactoryInterface {

    public function createConnection(): ConnectionInterface
    {
        return new PostgreSQLConnection();
    }

    public function createRecord(): RecordInterface
    {
        return new PostgreSQLRecord();
    }

    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new PostgreSQLQueryBuilderInterface();
    }
}

class OracleFactory implements DBFactoryInterface {

    public function createConnection(): ConnectionInterface
    {
        return new OracleConnection();
    }

    public function createRecord(): RecordInterface
    {
        return new OracleRecord();
    }

    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new OracleQueryBuilderInterface();
    }
}

$application = new Application(
    new MySQLFactory()
);