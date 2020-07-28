<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CModel extends Model
{
    public function setAttributeMap($array)
    {
        $keyArray = array_keys($array);

        foreach($keyArray as $key){
            if($key !== '_token' && $key !== 'id'){
                $this->setAttribute($key, $array[$key]);
            }
        }
    }

    public function setAttributeMapWithExcept($array, $arrayExcept)
    {
        $keyArray = array_keys($array);

        foreach($keyArray as $key){
            if($key !== '_token' && $key !== 'id' && !in_array($key , $arrayExcept)){
                $this->setAttribute($key, $array[$key]);
            }
        }
    }

    public function setAttributeMapWith($array, $arrayIn)
    {
        $keyArray = array_keys($array);

        foreach($keyArray as $key){
            if(in_array($key , $arrayIn)){
                $this->setAttribute($key, $array[$key]);
            }
        }
    }
}


