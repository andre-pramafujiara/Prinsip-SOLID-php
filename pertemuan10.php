<?php

class Json 
{
    public static function from ($data) {
        return json_encode($data);
    }
}

class UserRequest
{
    protected static $rules = [
        'nama' => 'string',
        'email' => 'string',
        'dob' => 'string'
    ];

    public static function validate($data){
        foreach (static::$rules as $property => $type){
            if (gettype($data[$property]) != $type){
                throw new \Exception("User property {$property} must be of type {$type}" );
            }
        }
    }
}

class User 
{
    public $nama;
    public $email;
    public $dob;

    public function __construct($data) 
    {
        $this->nama = $data['nama'];
        $this->email = $data['email'];
        $this->dob = $data['dob'];
    }

}

$data = [
    'nama' => 'Andre Pramafujiara', 
    'email' => 'andre1900018204@webmail.uad.ac.id',
    'dob' => '2.3.2000'
];

class Usia{
    public static function now($data){
        $dob = new DateTime($data['dob']);
        $now = new Datetime("today");
       
        $thn = $now->diff($dob)->y;
        $bln = $now->diff($dob)->m;
        $hri = $now->diff($dob)->d;
        
        echo "Usia : ";
        echo $thn." tahun ".$bln." bulan ".$hri." hari" ;
       
    }
}

UserRequest::validate($data);
$user = new User($data);
print_r(Json::from($user));
echo '<br>';
print_r(Usia::now($data));
