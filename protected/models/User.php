<?php
/**
 * Created by PhpStorm.
 * User: EJ
 * Date: 2015-08-24
 * Time: 20:44
 */

class User extends CActiveRecord{
    public $id;
    public $name;
    public $lastname;

    public static function model($className = __CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return 'user';
    }

    public function attributeLabels(){
        return array(
            'id' => 'ID',
            'name' => 'Imie',
            'lastname' => 'Nazwisko'
            );
    }

    public function rules(){
        return array(
           // array('name', 'required'),
            array('name', 'compare',
                'compareValue' => 'Jacek',
                'operator' => '!='),
           // array('name', 'filter', 'filter'=>array($this,'sanitize')),
            array('name', 'required', 'on' => 'regidster'),
            array('lastname', 'exist', 'attributeName'=>'name', 'className' => 'User'),


        );
    }

    public function sanitize($x){
        echo '<pre>';
        var_dump($x);exit;


    }

}