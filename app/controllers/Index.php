<?php
/**
 * 首页
 * @author JREAM.LU 2014.9.22
 */
class IndexController extends _BaseController {
    
    protected $layout = 'main_layout';
    
    public function indexAction() {
        
        $treeModel = new TreeModel();
        $treeList = $treeModel->TreeList();
        var_dump($treeList);die;
        
        $content = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;努力的过程中总会迷茫, 害怕, 要做的就是坚定自己的信念, 做自己认为对的决定, 即便错了又能怎样, 至少不会让自己后悔, <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;既然认定了目标,	就坚持, 坚持的道路总是寂寞、对结果未知的恐惧、不被认可、无法被认同和理解, 那就咬咬牙, 继续坚持,
        继续努力 ^_^ .
        <br />—— jream.lu';
        
        $timeline = [
            0 => [
                'category' => 'picture',
                'title' => '坚持',
                'content' => $content,
                'added_time' => '2015年9月26日 22:15:23',
            ],
        ];
        $this->getView ()->assign ( "timeline", $timeline );
        $this->getView ()->assign ( "title", Lang::goLang ( 'TITLE' ) );
    }
}