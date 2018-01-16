<?php
/**
 * Created by PhpStorm.
 * User: daiyi Server
 * Date: 2017/11/14
 * Time: 9:12
 */

namespace App\Http\Controllers;


use App\Member;
use Illuminate\Routing\Controller;

class MemberController extends Controller
{
    public function info($user_id){
//        return "member-info";
//        return route("memberinfo");

        return Member::getMember();
        #return view("member/info");
    }
}