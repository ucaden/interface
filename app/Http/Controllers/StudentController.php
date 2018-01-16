<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function test()
    {
        // $bool   = DB::insert('insert into student(`name`,`age`) values(?,?)',['sean',16]);

        // $num    = DB::update('update student set age = ? where name = ?', [20, 'sean']);

        // $num    = DB::delete('delete from student where age = ?',[20]);

        $student    = DB::select('select * from student where id > ?', [1]);
        echo "<pre>";
        var_dump($student);
    }

    /**
     * 查询构建器
     */
    public function query2(){
        DB::table('student')->insert([
            ['name' => '大兄', 'age'  => 25],
            ['name' => '明江', 'age'  => 19]
        ]);
    }

    /**
     * ORM
     */
    public function orm1()
    {
//        $students   = Student::all();
//        $students   = Student::find(1);
        /*$students   = Student::findOrFail(8);
        dd($students);*/
//        $students   = Student::get();
        /*Student::chunk(2, function($students){
            dd($students);

        });*/

        $num = Student::count();
        var_dump($num);

        $max    = Student::max('age');
        var_dump($max);

        $min    = Student::min('age');
        var_dump($min);
    }

    /**
     * orm 新增
     */
    public function orm2(){
        // 使用模型新增数据
//        $student    = new Student();
//        $student->name  = 'sean2';
//        $student->age   = '15';
//        $bool   = $student->save();
//        dd($bool);
//
//        $student    = Student::find(6);
//        echo $student->created_at;
        // 使用模型的Create方法新增数据
//        $student    = Student::Create(
//            ['name' => '春梦', 'age' => 29]
//        );
//
//        $student    = Student::firstOrCreate(
//            ['name' => '春梦姐']
//        );

        $student    = Student::firstOrNew(
            ['name' => '春梦妹']
        );
        var_dump($student);
    }

    /**
     * Controller之Request
     */
    public function testRequest1(Request $request){
        // 取值
        // echo  $request->input('name');
        // echo  $request->input('name','默认值');

        /* 判断是否有某参数
        if ($request->has('sex')){
            echo $request->input('name');
        }else{
            echo "无该参数";
        }*/

        // 获取所有值  array all() 返回值  数组
        $ret    = $request->all();
        var_dump($ret);

        // 判断请求类型  string method()  bool isMethod('GET') bool ajax()
        echo '<br>',$request->method(),'<br>';
        var_dump($request->isMethod('GET'));
        var_dump($request->isMethod('POST'));
        var_dump($request->ajax());
        // 判断路由 bool is() 例子 is('student/*')
        var_dump($request->is('student/*'));
        // 获取当前路由 string url()
        echo $request->url();
    }
    
    /**
     * session
     * HTTP request类的session()方法
     * 全局函数 session()
     * session类 Session facade
     */
    public function testSession1(Request $request){
        // 1.HTTP request session();
        // 保存数据 put()
        // $request->session()->put('key1','value1');
        // 读取数据 get()
        // echo $request->session()->get('key1');

        // 2. session()
        // session()->put('key2', 'value2');
        // echo session()->get('key2');

        // 3. Session facade
        // Session::put('key3', 'value3');
        // echo Session::get('key3');

        // 默认值
        // Session::get('key4', '默认值');

        // 以数组的形式保存session的值
        // Session::put(['key4' => 'value4']);
        // echo Session::get('key4', '默认值');

        // 如何把数据放到session数组中 push()
        // Session::push('key6', 'value5');
        // Session::push('key6',  'sean');
        // var_dump(Session::get('key6'));

        // 读取数据并删除
        // var_dump(Session::pull('key6', 'default'));

        // 取出所有的值 array all()
        // var_dump(Session::all());

        // 判断数据是否存在
        /*
        if (Session::has('key11')){
            echo 'key1存在';
        }else{
            echo 'key1不存在';
        }*/

        // 删除数据
        // dd(Session::all());
        // Session::forget('key2');
        // dd(Session::all());

        // 删除所有数据
//        Session::flush();
//        dd(Session::all());

        // 数据暂存
        // Session::flash('key-flash', 'value-flash');
        // echo Session::get('key-flash');
    }
    public function testSession2(Request $request){
        echo Session::get('message', '默认数据');
        // echo $request->url();
    }

    /**
     * Controller之response
     * 字符串
     * 视图
     * Json
     * 重定向
     */
    public function testResponse(){
//        // 响应json
//        $data = [
//            'errCode'   => 0,
//            'errMsg'    => 'success',
//            'data'      => ['name' => 'nick']
//        ];
//        return response()->json($data);
        // 4.重定向
        // url()
        // return redirect('student/testSession2');
        // return redirect('student/testSession2')->with('message', '我是数据');

        // action()
        // return redirect()->action('StudentController@testSession2')->with('message', '我是数据');

        // route()
        // return redirect()->route('testSession2')->with('message', '我是数据route');

        // 返回上一级页面
        return redirect()->back();
    }

    /**
     * 中间件的使用
     * 新建中间件
     * 注册中间件
     * 使用中间件
     * 中间件的前置和后置操作
     *
     */
    public function testMiddleware(){
        return '活动快要开始啦，敬请期待';
    }
    public function testMiddleware2(){
        return '互动进行中';
    }
    public function testMiddleware3(){
        return '活动快要结束啦';
    }
}