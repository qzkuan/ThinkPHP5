<?php
namespace app\sxjg\controller;
use think\Db;
use think\Request;
use think\Controller;
	class Shareurl extends Controller{
		public function shareurl(Request $request){
			// $bid=$request->param();
			$bid=input('bid');
			$db=Db::name('books');
        	$bname=$db->where(['Bid'=>$bid])->value('Bname');
        	$Bbar=$db->where(['Bid'=>$bid])->value('Bbar');
        	$bisbn=$db->where(['Bid'=>$bid])->value('bisbn');
        	$bindex=$db->where(['Bid'=>$bid])->value('bindex');
        	$bauthor=$db->where(['Bid'=>$bid])->value('bauthor');
        	$bpublish=$db->where(['Bid'=>$bid])->value('bpublish');
        	$btheme=$db->where(['Bid'=>$bid])->value('btheme');
        	$bclass=$db->where(['Bid'=>$bid])->value('bclass');
        	$bamount=$db->where(['Bid'=>$bid])->value('bamount');
        	$btime=$db->where(['Bid'=>$bid])->value('btime');
        	$bplace=$db->where(['Bid'=>$bid])->value('bplace');
        	$bcontent=$db->where(['Bid'=>$bid])->value('bcontent');
        	$bcover=$db->where(['Bid'=>$bid])->value('bcover');
        	if($bamount>0){
        		$bamount="可借";
        	}
        	else{
        		$bamount="已借完";
        	}
        	$this->assign('bname',$bname);
        	$this->assign('Bbar',$Bbar);
        	$this->assign('bisbn',$bisbn);
        	$this->assign('bindex',$bindex);
        	$this->assign('bauthor',$bauthor);
        	$this->assign('bpublish',$bpublish);
        	$this->assign('btheme',$btheme);
        	$this->assign('bclass',$bclass);
        	$this->assign('bamount',$bamount);
        	$this->assign('btime',$btime);
        	$this->assign('bplace',$bplace);
        	$this->assign('bcontent',$bcontent);
        	$this->assign('bcover',$bcover);
        	return view();
		}
	}