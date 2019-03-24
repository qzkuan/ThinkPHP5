<?php

namespace app\sxjg\controller;
use think\Db;
class Frame02{
    public function login(){
        $username=$_POST['username'];
        $password=$_POST['password']; 
        $db1=Db::name('user');
        $sql1="select username from user where username='$username' and password='$password'";
        if($db1->query($sql1)){
            $res['code'] ='1';
        }
        else{
            $res['code'] ='-1';
        }
        return json_encode($res);  
    } 
    public function searchbook1(){
        $binfo=$_POST['bname'];
        $username=$_POST['username'];
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,bisbn,bhot,bfactor from books where bname like '%$binfo%' OR bauthor like '%$binfo%' OR btime like '%$binfo%' OR btheme like '%$binfo%' OR bpublish like '%$binfo%' order by Bhot";
        $result=$db->query($sql);
        return json_encode($result);
    } 
    public function searchbook2(){
        $binfo=$_POST['bisbn'];
        $username=$_POST['username'];
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,bisbn,bhot,bfactor from books where bisbn='$binfo' OR bbar='$binfo' OR bindex='$binfo'";
        $result=$db->query($sql);
        return json_encode($result);
    }   
    public function modifybook_admin(){
        $binfo=$_POST['bisbn'];
        $username=$_POST['username'];
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,bisbn,bhot,bfactor from books where bisbn='$binfo'";
        $result=$db->query($sql);
        return json_encode($result);   
    }         
    public function addbook(){
        $bname=$_POST['bname'];
        $bauthor=$_POST['bauthor'];
        $bpublish=$_POST['bpublish'];
        $bbar=$_POST['bbar'];
        $bindex=$_POST['bindex'];
        $bisbn=$_POST['bisbn'];
        $bclass=$_POST['bclass'];
        $btheme=$_POST['btheme'];
        $btime=$_POST['btime'];
        $bplace=$_POST['bplace'];
        $bcontent=$_POST['bcontent'];
        $bfactor=$_POST['bfactor'];
        $username=$_POST['username'];
        $db=Db::name('books');
        $sql="INSERT INTO books(bname,bauthor,bpublish,bbar,bindex,bisbn,bclass,btheme,btime,bplace,bcontent,bfactor) VALUES('$bname','$bauthor','$bpublish','$bbar','$bindex','$bisbn','$bclass','$btheme','$btime','$bplace','$bcontent','$bfactor')";
        $result=$db->query($sql);
        return json_encode($result);
    }
}
