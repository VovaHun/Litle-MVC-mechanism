<?php


class Application {
	
	public function run(){
		$this->Loader();
	}
	
	public function Loader(){
		spl_autoload_register(['ClassLoader', 'autoload'], true, true);

		try{

            //$Routing = new file();
            //$Routing ->register('GET','/','HomeController:index');


			//Пример добавления каталога в автозагрузчик классов
			//ClassLoader::$dir[] = 'view';

			//Пример добавления класса MyClass к карте классов
			//ClassLoader::$addMap['MyClass'] = 'folder/MyClass.php';

		} catch (Exception $e){
			echo '<h2>Внимание! Обнаружена ошибка.</h2>'.
			'<h4>'.$e->getMessage().'</h4>'.
			'<pre>'.$e->getTraceAsString().'</pre>';
			exit;
		}
	}
	
}
