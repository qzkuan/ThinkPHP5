<?php

namespace app\index\controller;
use think\Db;
use think\Controller;
use rongcloud\RongCloud;
class Index{


function gettoken(){
   // echo "我是郑兴民";
$appKey = 'kj7swf8okigg2';
$appSecret = '8KZvw4zW3LRsEM';
$jsonPath = "jsonsource/";
$RongCloud = new RongCloud($appKey,$appSecret);



    echo ("\n***************** user **************\n");
    // 获取 Token 方法
    $result = $RongCloud->user()->getToken('userId1', 'username', 'http://www.rongcloud.cn/images/logo.png');
    echo "getToken    ";
    print_r($result);
    echo "\n";
}
    public function picture(){
            // 获取系统时间
            // $result=date("Y-m-d H:i:s" ,time());
            // return json_encode($result);
            $dir = './uploads/';
            // return $dir;
            $name = time() . ".jpg";
            $uploadfile = $dir . $name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {

                $res['code'] = 'http://122.112.250.150:8080/uploads/' . $name;

            } else {
                $res['code'] = '1';
            }
        return json_encode($res);
        }
        // return json_encode($result);

    public function index(){
        $bid='14';
        $username='2';
        /* 新书推荐1 */
        // $sql="select bname,bcover,bauthor,btime,bisbn,bid from books order by Bid limit 4";
        $sql="SELECT * FROM factor WHERE username='$username'";
        $result=Db::query($sql);
        $init1=0;
        $i1=0;
        $mid1=0;
        $init2=0;
        $i2=0;
        $mid2=0;
        $init3=0;
        $i3=0;
        $mid3=0;
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
        $sql1="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bfactor=$mid1 order by Bhot";
        $result1=Db::query($sql1);
        $sql2="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bfactor=$mid2 order by Bhot";
        $result2=Db::query($sql2);
        $sql3="select bname,bcover,bauthor,btime,bisbn,bid from books WHERE bfactor=$mid3 order by Bhot";
        $result3=Db::query($sql3);
        $result = array_merge($result1, $result2,$result3);
        return json_encode($result);

        // $db=Db::name('person');
        // $res=$db->select();
        // echo json_encode($res);//输出JSON
        #删除
/*        $db=Db::name('person');
        $res=$db->where([
            'id'=>5
        ])->delete();
        dump($res);*/
        #更新
/*        #update 更新几个字段
        $db=Db::name('person');
        // $res=$db->where([
        //     'id'=>3
        // ])->update([
        //     'sex'=>'女'
        // ]);
        #setField 更新某一个字段 返回影响数据的行数
        $res=$db->where([
            'id'=>3
        ])->setField('sex','男');
        dump($res);*/
        #插入
        #insert 返回值是影响记录的行数 插入数
        #insertGetId 返回插入数据的自增id
        #insertAll 返回插入数据成功的行数
/*      $db=Db::name('person');
        $data=[];
        for($i=4;$i<6;$i++){
            $data[]=[
            'id'=>"{$i}",
            'name'=>"宽宽",
            'sex'=>"女",
            'age'=>"18"
            ];
        }
        $res=$db->insertAll($data);
        // $res=$db->insert([
        //     'id'=>'5',
        //     'name'=>'宽宽',
        //     'sex'=>'女',
        //     'age'=>'18'
        // ]);
        dump($res);*/
        #查询
/*        $res=Db::query("select * from person where id=?",[1]);
        dump($res);*/
/*        $res=Db::table('person')->where(['name'=>'邱邱'])->select();
        dump($res);
        $res=db('person')->where(['name'=>'邱邱'])->select();
        dump($res);*/
    }
}
/*use think\Request;
use think\Config;
use think\Controller;
use think\View;
class Index extends Controller{
    public function index(){
        $this->assign('key','value');   //Controller
        $this->view->key2='value2'; //Controller
        View::share('key3','value3');
        return view('index',[
                'user'=>'qzkuan'
            ],[
            'STATIC'=>'当前是static的替换内容'
            ]);
    }
}*/

/*class Index{
    public function index(Request $request){
        $res=[
        'code'=>200,
        'result'=>[
            'list'=>[1,2,3,4,5,6]
        ]
        ];
        Config::set('default_return_type','xml');
        return $res;
        dump($res);
    }
}*/

/*use think\Request;
class Index{
	public function index(Request $request){
		#获取浏览器输入框的值
		dump($request->domain());
		dump($request->pathinfo());
		dump($request->path());

		#请求类型
		dump($request->method());
		dump($request->isGet());
		dump($request->isPost());
		dump($request->isAjax());
	}
}*/

/*class Index
{
    public function index(Request $request)
    {
        dump($request);
    }
    public function info($id)
    {
    	echo url('index/index/info',['id'=>10]) . "<br>";
    	return "{$id}";
    }
    public function demo()
    {
    	return "demo";
    }
}*/