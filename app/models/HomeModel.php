<?php
class HomeModel{
    public function getEmployeeList(){
        global $conn;

        $sql = "SELECT * from employees";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();

        return $result;
    }

    public function addNewEmployee($name, $address, $salary){
        global $conn;

        $sql = "INSERT INTO employees(name, address, salary) VALUES(?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $address, $salary);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function deleteEmployee($id){
        global $conn;

        $sql = "DELETE FROM employees WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function updateEmployee($id, $name, $address, $salary){
        global $conn;

        $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $address, $salary, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

}
