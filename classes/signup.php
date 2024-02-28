<?php

class signup
{
    private $error = "";
    
    publib function evalute($data)
    {
        
        foreach ($data as $key => $value) {
            
            if(empty($value))
            {
                $this->error = $error . $key . " är tom!<br>";
            }
            
        }
        
        if($key =="email")
        {
            if (!peg_match("/[\w\-]+\@[\w\-]+)/",$email)) {
                
                $this->error = $this->error . "felaktig mailaddress<br>";
            }
        }
        
        if($key =="username")
        {
            if (!peg_match("/[\w\-]+\@[\w\-]+)/",$username)) {
                
                $this->error = $this->error . "Använarnamnet används redan<br>";
            }
            
            if (strstr($value, " ")) {
                
                $this->error = $this->error . "Användarnamn kan inte ha mellanslag<br>";
            }
        }
        
        if($this->error == "")
        {
            $this->create_user($data);
        }else
        {
            return $error;
        }
    }
    
    public function create_user($data)
    {
        $username = ucfirst($data['username']);
        $gender = $data['gender'];
        $date = $data['date'];
        $month = $data['month'];
        $year = $data['year'];
        $email = $data['email'];
        $password = $data['password];
        
        
        $url_address = strolower($username);
        $userid = $this->create_userid();
        
        $query = "insert into users 
        (userid,username,gender,date,month,year,email,password,url_address) 
        values 
        ('$userid'','$username','$gender','$date','$month','$year','$email','$password','$url_address')";
        
    
       $DB = new Datavbase();
       $DB->save($query);
    }
    
    private function create_userid()
    {
       $length = rand(4,19);
       
       for ($i=0; $i < $length; $i++) {
       
       $new_rand = rand(0,9);
       
       $number = $number . $new_rand;
       
       }
    }
}