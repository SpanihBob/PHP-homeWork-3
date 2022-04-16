<?php                   
class Point         //Этот код создает класс с именем Point 
{
public $x;          //с двумя открытыми свойствами $x и $y.
public $y;
function Show()
{
echo 'Vertex: ('.$this->x.','.$this->y.')
<br/>';
}

}
$p=new Point();     //После определения класса написана строка кода, создающая переменную $p типа этого класса, т.е. – объект.
$p->x=100;          //
$p->y=200;
$p->Show();
var_dump($p);
?>
<?php
class Point1
{
private $x;
private $y;
function __construct($x, $y)
{
$this->x=$x;
$this->y=$y;
}
function Show()
{
echo 'Vertex: ('.$this->x.','.$this->y.')<br/>';
}
}
$p=new Point1 (100,200);
$p->Show();
var_dump($p);
?>
<?php
class Rectangle
{
public $top;
public $left;
public $width;
public $height;
function Show()
{
echo 'Vertex: ('.$this->top.','.$this->left.') width:'.
$this->width.' height:'.$this->height.'<br/>';
}
}
$r=new Rectangle;
$r->Show();
var_dump($r);
?>