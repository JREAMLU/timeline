<?php
/**
 * 首页
 * @author JREAM.LU 2014.9.22
 */
class IndexController extends _BaseController {
    
    protected $layout = 'main_layout';
    
    public function indexAction() {
        
        $params = [
            'user_id' => 1
        ];
        
        $treeModel = new TreeModel();
        $treeList = $treeModel->GetTreeList($params);
        
        $userModel = new UserModel();
        $user_setting = $userModel->GetUserSetting($params);
        
        //data handle
        foreach ($treeList as $key => $val) {
            $treeList[$key]['added_time'] = date('Y年m月d日 H:i:s', $val['added_time']);
        }
        
        $this->getView ()->assign ( "timeline", $treeList );
        $this->getView ()->assign ( "title", Lang::goLang ( 'TITLE' ) );
        $this->getView ()->assign ( "intro", $user_setting['intro'] );
    }
}