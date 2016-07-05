<?php
namespace Phetom\Controller;
class UploadController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('logoImage');
    }

    //上传信息内容图片
    public function contentImage() {
        $result = array();
        if (isset($this->request->data['file'])) {
            $filePath = 'files/content/';
            $result = $this->comm($filePath);
        } else {
            $result = array(
                'statusCode' => '300',
                'message' => '上传失败!',
                'filename' => ''
            );
        }
        die(json_encode($result));
    }

    /*
     * 上传图片公用方法
     * */
    public function comm($filePath = null) {
        $date = date('Ymd');
        $filePath = $filePath . $date;
        $uploadPath = WWW_ROOT . $filePath;
        $upload = new \FileUpload(array(
            'filePath' => $uploadPath
        ));

        $result = array();
        if ($upload->uploadFile($this->request->data['file']) == 0) {
            $fileName = $upload->getNewFileName();
            $result = array(
                'statusCode' => '200',
                'message' => '上传成功!',
                'filename' => $filePath.'/'.$fileName
            );
        }
        return $result;
    }

    //上传系统图标
    public function logoImage() {
        $result = array();
        if (isset($this->request->data['file'])) {
            $filePath = 'images';
            $uploadPath = WWW_ROOT . $filePath;
            $upload = new \FileUpload(array(
                'filePath' => $uploadPath,
            ));
            if ($upload->uploadFile($this->request->data['file']) == 0) {
                $fileName = $upload->getNewFileName();
                $result = array(
                    'statusCode' => '200',
                    'message' => '上传成功!',
                    'filename' => $fileName,
                    'filePath' => $filePath
                );
            }
        } else {
            $result = array(
                'statusCode' => '300',
                'message' => '上传失败!',
                'filename' => '',
                'filePath' => ''
            );
        }
        die(json_encode($result));
    }
}