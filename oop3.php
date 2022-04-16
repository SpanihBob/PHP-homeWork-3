<?php
    abstract class Item             //создаем абстрактный класс, его можно только наследовать, но нельзя вызвать напрямую
    {
        protected $table;   //стол
        protected $chair;   //стул
        protected $PC;      //компьютер
        protected $wall;    //стена
        protected $window;  //окна 
        
        function __construct($table, $chair, $PC, $wall, $window)
        {
            $this->table=$table;
            $this->chair=$chair;
            $this->PC=$PC;
            $this->wall=$wall;
            $this->window=$window;
        }
        function item() 
        {
            echo 'in the class there: '.$this->table.' table,'.$this->chair.' chair, '.$this->PC.' PC,'.$this->wall.' wall, '.$this->window.' window<br/>';
        }
    }
    
    class Room extends Item
    {
        public $softPuffs;   //мягкие пуфы
        protected $figure;      //фигуры

        function __construct($table, $chair, $PC, $wall, $window, $softPuffs, $figure)
        {
            parent::__construct($table, $chair, $PC, $wall, $window);
            $this->softPuffs=$softPuffs;
            $this->figure=$figure;
        }
        
        function item() 
        {
            echo 'in the class there: '.$this->table.' table,'.$this->chair.' chair, '.$this->PC.
            ' PC,'.$this->wall.' wall, '.$this->window.' window <br/> and '.$this->softPuffs.' soft puffs <br/> and '.$this->figure.' figure<br/>';
        }
    }
    class Something extends Room
    {
        protected $something;

        function __construct($table, $chair, $PC, $wall, $window, $softPuffs, $figure, $something)
        {
            parent::__construct($table, $chair, $PC, $wall, $window, $softPuffs, $figure);
            $this -> something = $something;
        }
        
        function item() 
        {
            $a=$this->table + $this->chair + $this->PC + $this->softPuffs + $this->figure;
            echo 'in the class there: '.$a.' subject, '.$this->wall.' wall and '.$this->window.' windows<br/>';
        }
        
        public static function tratata() //1))делаем статичный метод для вызова функции без создания класса
        {
            echo '<b><i>тратата</i></b> <br>';
        }
    }

    class Calculations extends Room
    {
        public $items = array();

        function __construct($table, $chair, $PC, $wall, $window, $softPuffs, $figure)
        {
            parent::__construct($table, $chair, $PC, $wall, $window, $softPuffs, $figure); 
                    
        }

        function AddToArray() 
        {
            array_push($this->items, $this->table, $this->chair, $this->PC, $this->wall, $this->window, $this->softPuffs, $this->figure);
        }

        function printArray()
        {
            print_r($this->items);
        }

        function get()              //создаем фенкцию геттер
        {
            return $this->items;
        }
    }
    
    

    Something::tratata();//2))вызываем эту статичную функцию
    $newRoom = new Room(1,2,3,2,1,34,'дофигища');
    $newRoom -> item();
    $something = new Something(1,2,3,2,1,2,4,4);
    $something -> item();
    $arrNew = new Calculations(1,2,3,4,5,6,7);
    $arrNew -> AddToArray();
    // $arrNew -> printArray();

    $add = new Calculations(8,8,6,5,4,6,8);
    $add -> AddToArray();
    // $add -> printArray();
    $addArrNew = $arrNew -> get();  //вызываем из класса с помощью функции get необходимые данные
    $addArr = $add -> get();
    $myArray = [];


    array_push($myArray, $addArr);      //добавляем их в наш массив
    array_push($myArray, $addArrNew);
    print_r($myArray);
?>
