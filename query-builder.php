<style>


    table th, table td {
        border: 1px solid black;
        padding: 8px; 
        text-align: left; 
    }


</style>


<?php

class QueryBuilder extends Database
{
    protected $query;

    public function __construct()
    {
        parent::__construct(); 
        $this->query = ""; // Initialize the query
    }

    public function select($columns)
    {
        $selectedColumns = is_array($columns) ? implode(",", $columns) : $columns;
        $this->query .= "SELECT $selectedColumns "; // Use .= to append to the existing query

        return $this;
    }

    public function from($table)
    {
        $this->query .= "FROM $table "; 
        return $this;
    }

    public function group_by($column)
    {
        $group_column = is_array($column) ? implode(",", $column) : $column;
        $this->query .= "GROUP BY $group_column "; 
        return $this;
    }

    public function having($column, $operator, $quantity)
    {
        $this->query .= "HAVING $column $operator $quantity ";
        return $this;
    }
    
    public function where_in($column, array $values)
    {
        $in_values = implode(",", $values);
        $this->query .= "WHERE $column IN ($in_values)";
        return $this;
    }


    public function get()
    {
        $final_query = $this->query;
    
        $results = $this->fetch_all($final_query);
    ?>
        <table>
            <thead>
                <tr>
    <?php
        foreach ($results[0] as $column_name => $value) {
            echo "<th>$column_name</th>";
        }
    ?>
                </tr>
            </thead>
            <tbody>
    <?php
        // Loop through the remaining rows
        foreach ($results as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    ?>
            </tbody>
        </table>
    <?php
        return $this;
    }
    
}

?>
