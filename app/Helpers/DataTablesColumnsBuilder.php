<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\DB;

class DataTablesColumnsBuilder
{
    private array $excludedColumns = ['id'];
    private string $model;
    public array $results;

    public function __construct(string $model)
    {
        $this->model = $model;
        $this->buildColumns();
    }

    public function setSearchable(string $column): DataTablesColumnsBuilder
    {
        $this->results[$column]['searchable'] = true;
        return $this;
    }

    public function setOrderable(string $column): DataTablesColumnsBuilder
    {
        $this->results[$column]['orderable'] = true;
        return $this;
    }

    public function setName(string $column, string $name): DataTablesColumnsBuilder
    {
        $this->results[$column]['name'] = $name;
        return $this;
    }

    public function setData(string $column, string $name): DataTablesColumnsBuilder
    {
        $this->results[$column]['data'] = $name;
        return $this;
    }

    public function withActions(): DataTablesColumnsBuilder
    {
        $this->results['actions'] = [
            'name' => 'Actions',
            'data' => 'actions',
            'searchable' => false,
            'orderable' => false,
        ];
        return $this;
    }

    public function removeColumns(array $columns): DataTablesColumnsBuilder
    {
        $results = [];
        foreach ($this->results as $key => $value) {
            if (!in_array($key, $columns)) {
                $results[$key] = $value;
            }
        }
        $this->results = $results;
        return $this;
    }

    public function make(): array
    {
        return array_values($this->results);
    }

    private function buildColumns(): void
    {
        $this->results = [];
        if (!method_exists($this->model, 'getTable')) {
            throw new Exception('Method \'getTable()\' not found');
        }

        $tableName = (new $this->model)->getTable();
        $tableColumns = DB::getSchemaBuilder()->getColumnListing($tableName);
        $tableColumns = array_filter($tableColumns, fn ($value) => !in_array($value, $this->excludedColumns));
        $tableColumns = array_values($tableColumns);

        for ($i = 0; $i < count($tableColumns); $i++) {
            $this->results[$tableColumns[$i]] = [
                'name' => ucfirst($tableColumns[$i]),
                'data' => $tableColumns[$i],
                'searchable' => false,
                'orderable' => false,
            ];
        }
    }
}
