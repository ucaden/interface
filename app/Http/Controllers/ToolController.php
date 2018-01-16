<?php

namespace App\Http\Controllers;

class ToolController extends Controller
{
    public function syncFiles()
    {
        $syncList = array(
            'sourceAddr'=>'D:\phpStudy\WWW\verson2',
            'targetAddr'=>'D:\phpStudy\WWW\verson2-online2',
        );
        $syncSuccessList = array();
        $copyFalseList = array();

        if (isset($_POST['file_list']) && !empty($_POST['file_list'])) {
            $file_list = explode("\n", $_POST['file_list']);
            foreach ($file_list as $file_item) {
                $afterFileName = trim($file_item);
                if ($afterFileName=='') {
                    continue;
                }
                $afterFileName = str_replace('\\', '/', $afterFileName);
                $afterFileName = '/'.ltrim($afterFileName,'/');
                $sourceFullAddr = $syncList['sourceAddr'].$afterFileName;
                $targetFullAddr = $syncList['targetAddr'].$afterFileName;
                //检测文件是否存在
                if(!file_exists($sourceFullAddr)){
                    $copyFalseList[] = $sourceFullAddr;
                    continue;
                }
                //确定该文件夹存在
                $file_path = dirname($targetFullAddr);
                $file_path = iconv("UTF-8", "GBK", $file_path);
                if (! file_exists ( $file_path )) {
                    @mkdir($file_path,0755,true);
                }
                //提交到待同步的文件夹中
                if(!copy($sourceFullAddr, $targetFullAddr)){
                    echo $sourceFullAddr.' to '.$targetFullAddr.' is false';
                    exit;
                }else{
                    $syncSuccessList[] = $sourceFullAddr;
                }
            }
        }
       return view('tool.syncFiles');
    }
}