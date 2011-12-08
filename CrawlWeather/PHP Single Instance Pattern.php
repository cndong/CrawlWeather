<?php
	//单例模式的类Lock
	class Lock
	{
	    //静态属性$instance
	    static private $instance = NULL;
	    //一个普通的成员属性
	    private $switch = 0;
	    //getInstance静态成员方法
	    static function getInstance()
	    {
	        //如果对象实例还没有被创建，则创建一个新的实例
	        if (self::$instance == NULL)
	        {
	            self::$instance = new Lock();
	        }
	        //返回对象实例
	        return self::$instance;
	    }
	    //空构造函数
	    private function Lock()
	    {
	    }
	    //空克隆成员函数
	    private function __clone()
	    {	
	    }
	    //设置$switch的函数，如果$switch为0则将其设置成1，否则将其设置成0
	    function setLock()
	    {
	        if($this->switch==0)	//如果属性switch等于0，则将其设置为1
	        	$this->switch = 1;
	        else							//如果属性switch等于1，则将其设置为0
	        	$this->switch = 0;
	    }
	    //获取$switch状态
	    function getLock()
	    {
	        //返回switch属性
	        return $this->switch;
	    }
	}
	//调用单例，设置$switch
	Lock::getInstance()->setLock();
	//判断开关状态
	if(Lock::getInstance()->getLock() == 0)		//如果属性switch等于0，则输出开关状态为“关”
		echo "开关状态：关";
	else									//如果属性switch等于1，则输出开关状态为“开”
		echo "开关状态：开";


		
/*
Factory

工厂模式允许在运行时实例化对象。它之所以叫工厂模式是因为它由一个对象工厂来负责被调用。一个工厂通过接受类的名称来实例化一个对象。

The Factory pattern allows for the instantiation of objects at runtime. It is called a Factory Pattern since it is responsible for "manufacturing" an object. A Parameterized Factory receives the name of the class to instantiate as argument.

Example #1 Parameterized Factory Method

<?php
class Example
{
    // The parameterized factory method
    public static function factory($type)
     {
         if (include_once 'Drivers/' . $type . '.php') {
            $classname = 'Driver_' . $type;
             return new $classname;
         } else {
             throw new Exception ('Driver not found');
         }
     }
}
?>
Defining this method in a class allows drivers to be loaded on the fly. If the Example class was a database abstraction class, loading a MySQL and SQLite driver could be done as follows:

<?php
// Load a MySQL Driver
$mysql = Example::factory('MySQL');

// Load a SQLite Driver
$sqlite = Example::factory('SQLite');
?>
Singleton

单例模式支持那些需要只保存一个单独的实例的类。在数据库链接的时候通常采用这样的方式。实现这个模式有利于很轻松的创建出一个能被多个对象所调用的单例。

The Singleton pattern applies to situations in which there needs to be a single instance of a class. The most common example of this is a database connection. Implementing this pattern allows a programmer to make this single instance easily accessible by many other objects.

Example #2 Singleton Function

<?php
class Example
{
    // Hold an instance of the class
    private static $instance; //静态私有的类实例
    
    // A private constructor; prevents direct creation of object
    private function __construct() 
     {
         echo 'I am constructed';
     }

    // The singleton method
    public static function singleton() 
     {
         if (!isset(self::$instance)) { //如果没有设置静态私有类实例，创建之
            $c = __CLASS__;   //获得类名称
            self::$instance = new $c; 
         }

         return self::$instance;
     }
    
    // Example method
    public function bark()
     {
         echo 'Woof!';
     }

    // Prevent users to clone the instance
    public function __clone() //不允许被克隆
     {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
     }

}

?>
关键词：
1 私有静态成员变量
2 __CLASS__获取当前类名
3 公共静态方法获取单例
4 覆盖__clone()方法

----十个字：私有静态量，公共静态法--------
*/
?>
