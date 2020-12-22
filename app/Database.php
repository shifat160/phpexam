<?php
namespace exam\App;

$name = '';
$age = '';
$experience = '';
$contact = '';
$salary = '';

$update = false;

class Database {
    private $filePath = __DIR__.'/../storage/database';
    private $data = [];
    private $isOpened = false;

    public function __construct()
    {
        $this->readFile();
    }

    public function readFile()
    {
        $content = file_get_contents($this->filePath);
        $this->data = json_decode($content, true);
        return $this;
    }

    public function saveData($data)
    {
        $this->data[] = $data;
        $this->saveContent();
    }


    public function saveContent()
    {
        $content = json_encode($this->data, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $content);
        header("location: index.php");
    }

    public function getData()
    {
        return $this->data;
    }


    public function searchMember($name = '',$salary=''){
        $data = $this->data;
        $search = [];
        if(!empty($data)){
            foreach ($data as $key => $value) {
                if($value['name'] == $name || $value['salary'] == $salary){
                    $search[] = $value;
                }
            }
        }
        return $search;
    }

    public function sortMember($parameter = '', $type='asc'){
        $data = $this->data;
        if(!empty($data)){
            $size = count($data)-1;
            for ($i=0; $i<$size; $i++) {
                for ($j=0; $j<$size-$i; $j++) {
                    $k = $j+1;
                    if($type == 'asc'){
                        if ($data[$k][$parameter] > $data[$j][$parameter]) {
                            $temp = $data[$i];
                            $data[$i] = $data[$j];
                            $data[$j] = $temp;
                        }
                    }else{
                        if ($data[$k][$parameter] < $data[$j][$parameter]) {
                            $temp = $data[$i];
                            $data[$i] = $data[$j];
                            $data[$j] = $temp;
                        }
                    }
                    
                }
            }
        }
        return $data;
    }


    
}

?>