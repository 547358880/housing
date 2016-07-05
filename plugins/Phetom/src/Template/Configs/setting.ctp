<style type="text/css">
    .uploadifybutton {
        color: #fff;
        border: none;
        background: url("<?php echo $this->request->base;?>/images/add.png") no-repeat center center;
        background-color: #27ae60;
    }
    .uploadify-queue {
        display: none;
    }
    .upload-img-box{
        margin: -110px auto 10px 90px;
        width: 180px;
        height: 100px;
        background: #dfdfdf;
        display: none;
        border: 1px #dfdfdf solid;
    }
    .uploadify{
        margin: -10px auto 10px 90px;
    }
    .notice{
        margin-left: 90px;
    }
</style>
<div class="bjui-pageContent">
    <form action="<?php echo $this->Url->build(["plugin" => $this->request->params['plugin'], "controller" => "Configs", "action" => "setting"]);?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <?php
        if(!empty($data)) {
            ?><input name="id" type="hidden" value="<?php echo $data->id;?>"><?php
        }
        ?>
        <fieldset>
            <legend>网站信息</legend>
            <table class="table table-condensed table-hover">
                <tbody>
                <tr>
                    <td style="border-top: none">
                        <label for="name" class="control-label x85">网站标题：</label>
                        <input type="text" name="title" value="<?php if(!empty($data)){echo $data->title;}?>" size="50" class="form-control input-nm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name" class="control-label x85">网站描述：</label>
                        <input type="text" name="description" value="<?php if(!empty($data)){echo $data->description;}?>" size="50" class="form-control input-nm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name" class="control-label x85">关&nbsp;&nbsp;键&nbsp;字：</label>
                        <input type="text" name="keywords" value="<?php if(!empty($data)){echo $data->keywords;}?>" size="50" class="form-control input-nm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="name" class="control-label x85">作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：</label>
                        <input type="text" name="author" value="<?php if(!empty($data)){echo $data->author;}?>" size="50" class="form-control input-nm">
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>
        <br>
        <fieldset>
            <legend>系统设置</legend>
            <table class="table table-condensed table-hover">
                <tbody>
                <tr>
                    <td style="border-top: none">
                        <label class="control-label x85">系统名称：</label>
                        <input type="text" name="name" value="<?php if(!empty($data)){echo $data->name;}?>" size="50" class="form-control input-nm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label x85">起始年份：</label>
                        <input type="text" name="startyear" value="<?php if(!empty($data)){echo $data->startyear;}else{echo date('Y');}?>" data-pattern="yyyy" data-toggle="datepicker" size="50" class="form-control input-nm">
                    </td>
                </tr>
                <tr>
                    <td style="border-top: none">
                        <label class="control-label x85">百度Key：</label>
                        <input type="text" name="baiduak" value="<?php if(!empty($data)){echo $data->baiduak;}?>" size="50" class="form-control input-nm">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="control-label x85">系统图标：</label>
                        <div class="uploadlogo" id="uploadlogoTo"></div>
                        <input type="hidden" name="logo" id="logo" value="<?php if(!empty($data)){if(!empty($data->logo)){echo $data->logo;}}?>">
                        <?php
                        if(!empty($data)) {
                            $filename = 'images/'.$data->logo;
                            if(!empty($data->logo) && is_file($filename)) {
                                ?>
                                <div class="upload-img-box" style="display: block;">
                                    <img src="<?php echo $this->request->base.'/'.$filename;?>" width=180 height=100>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="upload-img-box"></div>
                                <?php
                            }
                        }
                        ?>
                        <span class="notice">注意：请上传png格式,高度60px </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
    <script>
        $(function() {
            $('#uploadlogoTo').uploadify({
                'swf'      : '<?php echo $this->request->base;?>/uploadify/uploadify.swf',
                'uploader' : '<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/upload/logoImage/',
                'width' : 180,
                'height' : 100,
                'buttonText' : '',
                'fileTypeExts' : '',
                'fileObjName' : 'file',
                'buttonClass' : 'uploadifybutton',
                'removeTimeout' : 1,
                'onUploadSuccess' : uploadPicturecover
            });

            function uploadPicturecover(file, data){
                var data = $.parseJSON(data);
                if(data.statusCode == 200){
                    $("#logo").val(data.filename);
                    $('.upload-img-box').html('<img src="<?php echo $this->request->base;?>/'+data.filePath+'/'+data.filename+'" width=180 height=100>');
                    $('.upload-img-box').show();
                }
            }
        });
    </script>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close btn-no">关闭</button></li>
        <li><button type="submit" class="btn-blue">保存</button></li>
    </ul>
</div>