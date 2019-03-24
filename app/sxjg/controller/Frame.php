<?php

	namespace app\sxjg\controller;
use think\Db;
use think\Controller;
	class Frame extends Controller{
		public function frame01_recommand(){
			$db=Db::name('book');
			/* 新书推荐1 */
        	$bname1=$db->where(['Bindex'=>'TP001/001'])->value('Bname');
        	$bauthor1=$db->where(['Bindex'=>'TP001/001'])->value('Bauthor');
        	$bcover1=$db->where(['Bindex'=>'TP001/001'])->value('Bcover');
        	$this->assign('bname1',$bname1);
        	$this->assign('bauthor1',$bauthor1);
        	$this->assign('bcover1',$bcover1);
        	/* 新书推荐2 */
        	$bname2=$db->where(['Bindex'=>'TP001/002'])->value('Bname');
        	$bauthor2=$db->where(['Bindex'=>'TP001/002'])->value('Bauthor');
        	$bcover2=$db->where(['Bindex'=>'TP001/002'])->value('Bcover');
        	$this->assign('bname2',$bname2);
        	$this->assign('bauthor2',$bauthor2);
        	$this->assign('bcover2',$bcover2);
        	/* 新书推荐3 */
        	$bname3=$db->where(['Bindex'=>'TP001/003'])->value('Bname');
        	$bauthor3=$db->where(['Bindex'=>'TP001/003'])->value('Bauthor');
        	$bcover3=$db->where(['Bindex'=>'TP001/003'])->value('Bcover');
        	$this->assign('bname3',$bname3);
        	$this->assign('bauthor3',$bauthor3);
        	$this->assign('bcover3',$bcover3);
        	/* 新书推荐4 */
        	$bname4=$db->where(['Bindex'=>'TP001/004'])->value('Bname');
        	$bauthor4=$db->where(['Bindex'=>'TP001/004'])->value('Bauthor');
        	$bcover4=$db->where(['Bindex'=>'TP001/004'])->value('Bcover');
        	$this->assign('bname4',$bname4);
        	$this->assign('bauthor4',$bauthor4);
        	$this->assign('bcover4',$bcover4);
			return view();
		}
		public function moreNewbook(){
			return view();
		}
		public function moreNewbook_body(){
			return view();
		}
		public function bookdetail(){
			return view();
		}
		public function bookdetail_body(){
			return view();
		}
		public function morePersonbook(){
			return view();
		}
		public function morePersonbook_body(){
			return view();
		}
	}