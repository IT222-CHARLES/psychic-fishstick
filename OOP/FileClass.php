<?php 
class File{
    private $fileName;

    private $handle;

    public function __construct($fileName, $mode = 'r'){
        $this->fileName = $fileName;
        $this->handle = fopen($fileName, $mode);
    }

    public function __destruct(){
        fclose($this->handle);
    }

    public function write($data){
        fwrite($this->handle, $data);
    }

    public function read(){
        return fread($this->handle, filesize($this->fileName));
    }
    public function delete(){
        if(file_exists($this->fileName)){
            unlink($this->fileName);
        }
    }

}
// $f = new File('test.txt', 'w');
// $f->write('Hello, World!');
// $f = new File('test.txt', 'r');
// echo $f->read();
// $f->delete();
$f = new File('image.jpg', 'r');
header('Content-Type: image/jpg');
echo $f->read();