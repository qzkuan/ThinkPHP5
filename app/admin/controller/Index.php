<?php
	namespace app\admin\controller;
	class Index{
		private $a;
		public function index(){
			$b='bbbbb';
			$this->a= $b;
			return $this->a;
		}
		public function index1(){
			$this->index();
			return $this->a; 
		}
	}