<?php
    abstract class Item             //создаем абстрактный класс, его можно только наследовать, но нельзя вызвать напрямую
    {
        protected $table;   //стол
        protected $chair;   //стул
        protected $PC;      //компьютер
        protected $wall;    //стена
        protected $window;  //окна
        public $softPuffs;   //мягкие пуфы
        protected $figure;      //фигуры
        public $a; 
        
        function __construct($table, $chair, $PC, $wall, $window, $softPuffs, $figure)
        {
            $this->table=$table;
            $this->chair=$chair;
            $this->PC=$PC;
            $this->wall=$wall;
            $this->window=$window;
            $this->softPuffs=$softPuffs;
            $this->figure=$figure;
        }
        function item() 
        {
            echo 'in the class there: '.$this->table.' table,'.$this->chair.' chair, '.$this->PC.
            ' PC,'.$this->wall.' wall, '.$this->window.' window <br/> and '.$this->softPuffs.' soft puffs <br/> and '.$this->figure.' figure<br/>';
        }
    }
    
    class Calculations extends Item
    {
        public $items = array();

        function __construct($table, $chair, $PC, $wall, $window, $softPuffs, $figure)  //функция конструктор от родительского класса
        {
            parent::__construct($table, $chair, $PC, $wall, $window, $softPuffs, $figure);                     
        }

        function AddToArray()   //функция добавления переменных в массив
        {
            array_push($this->items, $this->table, $this->chair, $this->PC, $this->wall, $this->window, $this->softPuffs, $this->figure);
        }

        function newAdd($a)     //функция добавления значения в массив
        {
            array_push($this->items, $a);
        }

        function printArray()   //функция вывода на экран
        {
            print_r($this->items);
            echo '<br>';
        }

        function get()              //создаем функцию геттер
        {
            return $this->items;
        }

        function searchArr($value)
        {
            $key = array_search($value, $this->items);
            if($key)
            {
                echo 'индекс найденного значения ' .$key;
            }   
            else
            {
                echo 'нет такого значения';
            }            
            echo '<br>';
        }

        function delete($value)
        {
            $key = array_search($value, $this->items);
            if($key)
            {
                unset($this->items[$key]);
            }   
            else
            {
                echo 'нет такого значения';
            }            
        }
    }

    $add = new Calculations(8,8,6,55,431,6,8);
    $add -> AddToArray();
    $add -> printArray();
   
    $add -> newAdd(1);
    $add -> printArray();
    $add -> searchArr(55);//ищем индекс числа 55
    $add -> delete(55);
    $add -> printArray();
    $add -> delete(431);
    $add -> delete(433231);
    $add -> printArray();
    $add -> searchArr(55333);//ищем индекс числа 55
?>
