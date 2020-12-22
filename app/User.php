<?php
namespace exam\App;

//include 'Database.php';

class User
{
    private $name;
    private $age;
    private $experience;
    private $contact;
    private $salary;
    private $db;

    public function __construct($post)
    {
        $this->name = $post['name'];
        $this->age = $post['age'];
        $this->experience = $post['experience'];
        $this->contact = $post['contact'];
        $this->salary = $post['salary'];
        $this->db = new Database();
    }

    public function registration()
    {
        $this->db->saveData([
            'id' => uniqid(),
            'name' => $this->name,
            'age' => $this->age,
            'experience' => $this->experience,
            'contact' => $this->contact,
            'salary' => $this->salary
        ]);
    }

    

    public function sortEmployee(){

    }
}

?>