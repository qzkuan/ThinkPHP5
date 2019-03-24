<?php

namespace app\sxjg\controller;
use think\Db;
use rongcloud\RongCloud;
class Frame01{
    public function getnewbook(){
        // $bindex=$_POST['bindex'];变量用'$bindex'
        $db=Db::name('books');
        /* 新书推荐1 */
/*      $bname1=$db->where(['Bindex'=>'TP001/001'])->value('Bname');
        $bauthor1=$db->where(['Bindex'=>'TP001/001'])->value('Bauthor');
        $bcover1=$db->where(['Bindex'=>'TP001/001'])->value('Bcover');*/
        $sql="select bid,bname,bcover,bauthor,bisbn from books order by Bid DESC limit 4";
        $result=$db->query($sql);
        return json_encode($result);

    }
    public function getpersonbook(){
        // $bindex=$_POST['bindex'];变量用'$bindex'
        $username=$_POST['username'];
        /* 新书推荐1 */
        // $sql="select bname,bcover,bauthor,btime,bisbn,bid from books order by Bid limit 4";
       $sql="SELECT * FROM recommend WHERE username='$username'";
        $result=Db::query($sql);
        $init1=0;
        $i1=0;
        $mid1=-1;
        $init2=0;
        $i2=0;
        $mid2=-1;
        $init3=0;
        $i3=0;
        $mid3=-1;
        for($i1;$i1<count($result[0])-1;$i1++){
            if($result[0][$i1]>$init1){
                $mid1=$i1;
                $init1=$result[0][$i1];
            }
            else{

            }
        }
        for($i2=0;$i2<count($result[0])-1;$i2++){
            if($i2==$mid1){
                continue;
            }
            else{
            if($result[0][$i2]>$init2){
                $mid2=$i2;
                $init2=$result[0][$i2];
            }
            else{

            }
        }
        }
        for($i3=0;$i3<count($result[0])-1;$i3++){
            if($i3==$mid1||$i3==$mid2){
                continue;
            }
            else{
            if($result[0][$i3]>$init3){
                $mid3=$i3;
                $init3=$result[0][$i3];
            }
            else{

            }
        }
        }
        if($mid1==-1){
        $sql1="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bclass='B' order by Bhot limit 2";
        $result1=Db::query($sql1);
        }
        else{
        $sql1="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bfactor=$mid1 order by Bhot limit 4";
        $result1=Db::query($sql1);
    }
    if($mid2==-1){
        $sql2="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bid=15 order by Bhot";
        $result2=Db::query($sql2);
    }
    else{
        $sql2="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bfactor=$mid2 order by Bhot limit 4";
        $result2=Db::query($sql2);
    }
    if($mid3==-1){
        $sql3="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bid=13 order by Bhot";
        $result3=Db::query($sql3);
    }
    else{
        $sql3="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bfactor=$mid3 order by Bhot limit 4";
        $result3=Db::query($sql3);
    }
        $result = array_merge($result1, $result2,$result3);
        return json_encode($result);
    }
    public function getmorenewbook(){
        $amount=$_POST['amount'];
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,btime,bisbn from books order by Bid DESC limit $amount";
        $result=$db->query($sql);
        return json_encode($result);
    }
    public function getmorepersonbook(){
        $username=$_POST['username'];
        /* 新书推荐1 */
        // $sql="select bname,bcover,bauthor,btime,bisbn,bid from books order by Bid limit 4";
       $sql="SELECT * FROM recommend WHERE username='$username'";
        $result=Db::query($sql);
        $init1=0;
        $i1=0;
        $mid1=-1;
        $init2=0;
        $i2=0;
        $mid2=-1;
        $init3=0;
        $i3=0;
        $mid3=-1;
        for($i1;$i1<count($result[0])-1;$i1++){
            if($result[0][$i1]>$init1){
                $mid1=$i1;
                $init1=$result[0][$i1];
            }
            else{

            }
        }
        for($i2=0;$i2<count($result[0])-1;$i2++){
            if($i2==$mid1){
                continue;
            }
            else{
            if($result[0][$i2]>$init2){
                $mid2=$i2;
                $init2=$result[0][$i2];
            }
            else{

            }
        }
        }
        for($i3=0;$i3<count($result[0])-1;$i3++){
            if($i3==$mid1||$i3==$mid2){
                continue;
            }
            else{
            if($result[0][$i3]>$init3){
                $mid3=$i3;
                $init3=$result[0][$i3];
            }
            else{

            }
        }
        }
        if($mid1==-1){
        $sql1="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,btime,bisbn from books WHERE bclass='B'  order by Bhot";
        $result1=Db::query($sql1);
        }
        else{
        $sql1="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,btime,bisbn from books WHERE bfactor=$mid1 order by Bhot";
        $result1=Db::query($sql1);
    }
        if($mid2==-1){
        $sql2="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,btime,bisbn from books WHERE bid=15 order by Bhot";
        $result2=Db::query($sql2);
        }
        else{
        $sql2="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,btime,bisbn from books WHERE bfactor=$mid2 order by Bhot";
        $result2=Db::query($sql2);
    }
        if($mid3==-1){
        $sql3="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,btime,bisbn from books WHERE bid=13 order by Bhot";
        $result3=Db::query($sql3);
        }
        else{
        $sql3="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,btime,bisbn from books WHERE bfactor=$mid3 order by Bhot";
        $result3=Db::query($sql3);
    }
        $result = array_merge($result1, $result2,$result3);
        return json_encode($result);
    }
    public function getbookdetail(){
        $bid=$_POST['bisbn'];
        $username=$_POST['username'];
        $db=Db::name('books');
        $sql="select bid,bname,bindex,bcover,bauthor,btime,bpublish,btheme,bamount,bisbn,bcontent,bplace,bbar,bclass,bfactor from books where bid='$bid'";
        $sql2="update books set bhot=bhot+1 where bid='$bid'";
        $result=$db->query($sql);
        $db->query($sql2);
        $bfactor=$result[0]['bfactor'];
        $sql3="update recommend set `$bfactor`=`$bfactor`+1 where username='$username'";
        Db::query($sql3);
        return json_encode($result);
    }
    public function getshareamount(){
        $bid=$_POST['bisbn'];
        $username=$_POST['username'];
        $db=Db::name('books');
        $sql="update books set Bshare=Bshare+1 where bid=$bid";
        $db->query($sql);
        //
        $sql2="select bid,bfactor from books where bid='$bid'";
        $result=$db->query($sql2);
        $bfactor=$result[0]['bfactor'];
        $sql3="update recommend set `$bfactor`=`$bfactor`+3 where username='$username'";
        Db::query($sql3);
        // return json_encode($result);
    }
    public function searchbook(){
        $binfo=$_POST['bname'];
        $username=$_POST['username'];
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bpublish,btheme,bamount,bisbn,bhot,bfactor from books where bname like '%$binfo%' OR bauthor like '%$binfo%' OR btime like '%$binfo%' OR bisbn='$binfo' OR btheme like '%$binfo%' OR bindex='$binfo' OR bbar='$binfo' OR bpublish like '%$binfo%' order by Bhot DESC limit 20";
        $result=$db->query($sql);
        $bfactor=$result[0]['bfactor'];
        $sql3="update recommend set `$bfactor`=`$bfactor`+2 where username='$username'";
        Db::query($sql3);
        return json_encode($result);
    }
    public function searchindex(){
        // $amount=$_POST['amount'];
        $db=Db::name('books');
        $sql="select bid,bhot,bname,bauthor,bisbn from books order by Bhot DESC limit 10";
        $result=$db->query($sql);
        return json_encode($result);
    }
    public function bookclass(){
        $binfo=$_POST['bclass'];
        $amount=$_POST['amount'];
        $db=Db::name('books');
        $sql="select bid,bclass,bname,bcover,bauthor,btime,bpublish,btheme,bamount,bisbn,bhot from books where bclass LIKE '%$binfo%' limit $amount";
        $result=$db->query($sql);
        return json_encode($result);
    }
    public function getborrowrank(){
        // $bindex=$_POST['bindex'];变量用'$bindex'
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bisbn,btheme,bpublish from books order by Bborrow DESC limit 3";
        $result=$db->query($sql);
        return json_encode($result);
    }
    public function getmoreborrowrank(){
        $amount=$_POST['amount'];
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bisbn,btheme,bpublish from books order by Bborrow DESC limit $amount";
        $result=$db->query($sql);
        return json_encode($result);
    }
    public function getsharerank(){
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bisbn,btheme,bpublish from books order by Bshare DESC limit 3";
        $result=$db->query($sql);
        return json_encode($result);
    }
    public function getmoresharerank(){
        $amount=$_POST['amount'];
        $db=Db::name('books');
        $sql="select bid,bname,bcover,bauthor,btime,bisbn,btheme,bpublish from books order by Bshare DESC limit $amount";
        $result=$db->query($sql);
        return json_encode($result);
    }
    public function getperiodical(){
        $amount=$_POST['amount'];
        $db=Db::name('periodical');
        $sql="select pid,pissn,pname,pauthor,ptime,pnum,pcontent,pcover from periodical limit $amount";
        $result=$db->query($sql);
        return json_encode($result);
    }
    public function getnewspaper(){
        $amount=$_POST['amount'];
        $db=Db::name('newspaper');
        $sql="select nid,nissn,nname,nauthor,ntime,ncontent,ncover from newspaper limit $amount";
        $result=$db->query($sql);
        return json_encode($result);
    }
    function scannerborrow(){
        $bbar=$_POST['bbar'];
        $db=Db::name('books');
        $sql="select bid,bname,bauthor,bisbn,bamount from books where bbar='$bbar'";
        $result=$db->query($sql);
        return json_encode($result);
    }
    function borrow(){
        $borrowdate=date("Y-m-d" ,time());
        $returndate=date("Y-m-d" ,strtotime('+30 day',time()));
        $bbar=$_POST['bbar'];
        $username=$_POST['username'];
        $bid=$_POST['bid'];
        $db=Db::name('books');
        $sql="update books set bamount='-1' where bbar='$bbar'";
        $db->query($sql);
        $db2=Db::name('borrow');
        $sql2="INSERT INTO borrow(username,Bid,borrowdate,returndate) VALUES('$username','$bid','$borrowdate','$returndate')";
        $db2->query($sql2);

        $sql3="select bid,bfactor from books where bid='$bid'";
        $result=$db->query($sql3);
        $bfactor=$result[0]['bfactor'];
        $sql4="update recommend set `$bfactor`=`$bfactor`+5 where username='$username'";
        Db::query($sql4);
        return json_encode($result);

    }
    public function getborrowbook(){
        $username=$_POST['username'];
        $sql1="select books.bid,bname,bindex,bcover,bauthor,btime,bpublish,btheme,bamount,bisbn,bcontent,bplace,bbar,bclass from books,borrow where username='$username' AND books.Bid=borrow.Bid order by borrow.borrowdate DESC";
        $sql2="select borrowdate,returndate FROM borrow WHERE username='$username' order by borrowdate DESC";
        $result1=Db::query($sql1);
        $result2=Db::query($sql2);
        $result = array_merge($result1, $result2);
        return json_encode($result);
    }
    public function collectbook(){
        $collectdate=date("Y-m-d" ,time());
        $bid=$_POST['bisbn'];
        $username=$_POST['username'];
        $db=Db::name('lovebook');
        $sql="INSERT INTO lovebook(username,Bid,collectdate) VALUES('$username','$bid','$collectdate')";
        $db->query($sql);

        $sql2="select bid,bfactor from books where bid='$bid'";
        $result=$db->query($sql2);
        $bfactor=$result[0]['bfactor'];
        $sql3="update recommend set `$bfactor`=`$bfactor`+4 where username='$username'";
        Db::query($sql3);
        return json_encode($result);
    }
    public function removecollectbook(){
        $bid=$_POST['bisbn'];
        $username=$_POST['username'];
        $db=Db::name('lovebook');
        $sql="DELETE FROM lovebook WHERE username='$username' AND bid='$bid'";
        $db->query($sql);

        $sql2="select bid,bfactor from books where bid='$bid'";
        $result=$db->query($sql2);
        $bfactor=$result[0]['bfactor'];
        $sql3="update recommend set `$bfactor`=`$bfactor`-4 where username='$username'";
        Db::query($sql3);
        return json_encode($result);
    }
    public function testcollectbook(){
        $bid=$_POST['bisbn'];
        $username=$_POST['username'];
        $db=Db::name('lovebook');
        $sql="select username FROM lovebook WHERE username='$username' AND bid='$bid'";
        if($db->query($sql)){
             $res['code'] ='1';
        }
        else{
            $res['code'] ='-1';
        }
        return json_encode($res);
    }
    public function getcollectbook(){
        $username=$_POST['username'];
        $sql1="select books.bid,bname,bindex,bcover,bauthor,btime,bpublish,btheme,bamount,bisbn,bcontent,bplace,bbar,bclass from books,lovebook where username='$username' AND books.Bid=lovebook.Bid order by lovebook.collectdate DESC";
        $sql2="select collectdate FROM lovebook WHERE username='$username' order by collectdate DESC";
        $result1=Db::query($sql1);
        $result2=Db::query($sql2);
        $result = array_merge($result1, $result2);
        return json_encode($result);
    }
    public function postpicture(){
            $username=$_POST['username'];
            $dir = './uploads/';
            // return $dir;
            $name = time() . ".jpg";
            $uploadfile = $dir . $name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $picture='http://122.112.247.111:8080/uploads/' . $name;
                $db=Db::name('user');
                $sql="UPDATE user SET picture='$picture' where username='$username'";
                $result=$db->query($sql);
                $res['code'] = 'http://122.112.247.111:8080/uploads/' . $name;
            } else {
                $res['code'] = '';
            }
        return json_encode($res);
        }
    public function fankuipicture(){
            $username=$_POST['username'];
            $dir = './fankui_books_picture/';
            // return $dir;
            $name = time() . ".jpg";
            $uploadfile = $dir . $name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                // $picture='http://122.112.247.111:8080/fankui_books_picture/' . $name;
                // $db=Db::name('user');
                // $sql="UPDATE user SET picture='$picture' where username='$username'";
                // $result=$db->query($sql);
                $res['code'] = 'http://122.112.247.111:8080/fankui_books_picture/' . $name;
            } else {
                $res['code'] = '';
            }
        return json_encode($res);
        }
    public function fankui_books(){
            $username=$_POST['username'];
            $binfo=$_POST['binfo'];
            $question=$_POST['question'];
            $pic_url=$_POST['pic_url'];
                $db=Db::name('fankui_books');
                $sql="INSERT INTO fankui_books(username,binfo,question,pic_url) VALUES('$username','$binfo','$question','$pic_url')";
            $result=$db->query($sql);
        return json_encode($result);
        }
    public function fankuipicture2(){
            $username=$_POST['username'];
            $dir = './fankui_users_picture/';
            // return $dir;
            $name = time() . ".jpg";
            $uploadfile = $dir . $name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                // $picture='http://122.112.247.111:8080/fankui_users_picture/' . $name;
                // $db=Db::name('user');
                // $sql="UPDATE user SET picture='$picture' where username='$username'";
                // $result=$db->query($sql);
                $res['code'] = 'http://122.112.247.111:8080/fankui_users_picture/' . $name;
            } else {
                $res['code'] = '';
            }
        return json_encode($res);
        }
    public function fankui_users(){
            $username=$_POST['username'];
            $userphone=$_POST['userphone'];
            $question=$_POST['question'];
            $phonenum=$_POST['phonenum'];
            $pic_url=$_POST['pic_url'];
                $db=Db::name('fankui_users');
                $sql="INSERT INTO fankui_users(username,userphone,question,pic_url,phonenum) VALUES('$username','$userphone','$question','$pic_url','$phonenum')";
            $result=$db->query($sql);
        return json_encode($result);
        }
    // public function register(){
    //     $username=$_POST['username'];
    //     $password=$_POST['password'];
    //     $nickname=$_POST['nickname'];
    //     $schoolnumber=$_POST['schoolnumber'];
    //     $schoolid=$_POST['schoolid'];
    //     $name=$_POST['name'];
    //     $db1=Db::name('userif');
    //     /* 新书推荐1 */
    //     // $schoolid=$db1->where(['schoolid'=>'TP001/001'])->value('Bname');
    //     // $schoolnumber=$db1->where(['schoolnumber'=>'TP001/001'])->value('Bauthor');
    //     // $name=$db1->where(['name'=>'TP001/001'])->value('Bcover');
    //     $sql1="select schoolid from userif where schoolid='$schoolid' and schoolnumber='$schoolnumber' and name='$name'";
    //     if($db1->query($sql1)){
    //     $db=Db::name('user');
    //     $sql="INSERT INTO user(username,password,nickname,schoolnumber,schoolid,name) VALUES('$username','$password','$nickname','$schoolnumber','$schoolid','$name') ";
    //     $result=$db->query($sql);
    //     $db2=Db::name('recommend');
    //     $sql2="INSERT INTO recommend(username) VALUES('$username')";
    //     $db2->query($sql2);
    //     $res['code'] ='1';
    //     }
    //     else{
    //     }
    //     return json_encode($res);
    // }
    // public function login(){
    //     $username=$_POST['username'];
    //     $password=$_POST['password'];
    //     $db1=Db::name('user');
    //     $sql1="select username from user where username='$username' and password='$password'";
    //     if($db1->query($sql1)){
    //         $res['code'] ='1';
    //     }
    //     else{
    //         $res['code'] ='-1';
    //     }
    //     return json_encode($res);
    // // }
    //             $picture='http://122.112.247.111:8080/uploads/register.jpg';
    public function register(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $nickname=$_POST['nickname'];
        $schoolnumber=$_POST['schoolnumber'];
        $schoolid=$_POST['schoolid'];
        $name=$_POST['name'];
        $picture='http://122.112.247.111:8080/uploads/register.jpg';
        $db1=Db::name('userif');

        /* 新书推荐1 */
        // $schoolid=$db1->where(['schoolid'=>'TP001/001'])->value('Bname');
        // $schoolnumber=$db1->where(['schoolnumber'=>'TP001/001'])->value('Bauthor');
        // $name=$db1->where(['name'=>'TP001/001'])->value('Bcover');
        $sql1="select schoolid from userif where schoolid='$schoolid' and schoolnumber='$schoolnumber' and name='$name'";

        if($db1->query($sql1)){
        $db2=Db::name('recommend');
        $sql2="INSERT INTO recommend(username) VALUES('$username')";
        $db2->query($sql2);
        $db=Db::name('user');
        $sql="INSERT INTO user(username,password,nickname,schoolnumber,schoolid,name,picture) VALUES('$username','$password','$nickname','$schoolnumber','$schoolid','$name','$picture') ";
        $result=$db->query($sql);
        // $res['code'] ='1';
        // }
        // else{
        //     $res['code']='2';

                // return json_encode($res);
       //  $sq3="select * from user where schoolid=$schoolid";
       //  $result3=$db->query($sql3);


        $appKey = 'tdrvipkstqd65';
        $appSecret = 'RXidIfQXmVUT0R';
        $RongCloud = new RongCloud($appKey,$appSecret);
        $picture1="select picture FROM user WHERE username='$username' ";
                //echo ("\n***************** user **************\n");
        // 获取 Token 方法
        $result1 = $RongCloud->user()->getToken('$username', '$nickname', '$picture1');
       // echo "getToken    ";
        // print_r($result);
        // echo "\n";
        // $result2=array($result1);
        // $result4=array_merge($result3,$result2);
         return $result1;
        }else{
         $res['code'] ='1';
         // $rest1=array($res);
             // $result2=$err;
         return json_encode($res);
        }

    }
    public function login(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $db1=Db::name('user');
        $sql="select schoolid from user where username='$username' and password='$password'";
        $sql1="select picture from user where username='$username' ";
        $sql2="select nickname from user where username='$username' ";

        $appKey = 'tdrvipkstqd65';
        $appSecret = 'RXidIfQXmVUT0R';
        $RongCloud = new RongCloud($appKey,$appSecret);
                //echo ("\n***************** user **************\n");
        // 获取 Token 方法
        $result1 = $RongCloud->user()->getToken('$username', '$sql2', '$sql1');
        // $result2=$sql1;
        // $res =1;
        if($db1->query($sql)){
            // $res['code'] ='1';
             // $result2=array($result1);
            return $result1;
        }
        else{
         $res['code'] ='1';
         // $rest1=array($res);
             // $result2=$err;
         return json_encode($res);
        }
        // return json_encode($result2);
    }
    public function updatepassword(){
        $username=$_POST['username'];
        $oldpassword=$_POST['oldpassword'];
        $password=$_POST['password'];
        $db1=Db::name('user');
        $sql1="select username from user where username='$username' and password='$oldpassword'";
        if($db1->query($sql1)){
        $db=Db::name('user');
        $sql="UPDATE user SET password='$password' where username='$username'";
        $result=$db->query($sql);
        $res['code'] ='1';
        }
        else{
        }
        return json_encode($res);
    }
    public function getuserinfo(){
        $username=$_POST['username'];
        $db=Db::name('user');
        $sql="select username,nickname,schoolnumber,schoolid,name,picture from user where username='$username'";
        $result=$db->query($sql);
        return json_encode($result);
    }

    public function getmyfriends(){
        $username=$_POST['username'];
        $db=Db::name('user');
        $sql="select username,picture,nickname from user where username !='$username' ";
        $result=$db->query($sql);
        return json_encode($result);


    }

    public function getuserinfos(){
        $username=$_POST['usernames'];
        $db=Db::name('user');
        $sql="select username,nickname,schoolnumber,schoolid,name,picture from user where username='$username'";
        $result=$db->query($sql);
        return json_encode($result);
    }

    public function zxmgetuserinfo(){
        $username=$_POST['username'];
        $db=Db::name('user');
        $sql="select username,nickname,schoolnumber,schoolid,name,picture from user where username ='$username'";
        $result=$db->query($sql);
        return json_encode($result);
    }
}
