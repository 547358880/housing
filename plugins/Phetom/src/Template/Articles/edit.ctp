<script type="text/javascript">
    function pic_upload_success(file, data) {
        var json = $.parseJSON(data)
        $(this).bjuiajax('ajaxDone', json)
        if (json[BJUI.keys.statusCode] == BJUI.statusCode.ok) {
            $('#j_custom_pic').val(json.filename).trigger('validate')
            $('#j_custom_span_pic').html('<img src="<?php echo $this->request->base;?>/'+ json.filename +'" width="190" height="114" />')
        }
    }
</script>
<style>
    #j_custom_span_pic img{
        padding: 4px;
        border: 1px #CCC solid;
        border-radius: 3px;
        text-align: center;
        margin-bottom: 15px;
    }
</style>
<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/articles/edit/<?php echo $data->id;?>" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <input name="id" type="hidden" value="<?php echo $data->id;?>">
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label class="control-label x85">标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;题：</label>
                    <input type="text" name="title" value="<?php echo $data->title;?>" size="65" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
                <td rowspan="7" align="center" width="30%">
                    <div style="display: inline-block; vertical-align: middle;">
                        <span id="j_custom_span_pic">
                            <?php
                            $file = $data->image;
                            if(!empty($file) && is_file($file)) {
                                ?>
                                <img src="<?php echo $this->request->base.'/'.$file;?>" width="190" height="114">
                                <?php
                            }
                            ?>
                        </span>
                        <div id="j_custom_pic_up" data-toggle="upload" data-uploader="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/upload/contentImage"
                             data-file-size-limit="1024000000"
                             data-file-type-exts="*.jpg;*.png;*.gif;*.mpg"
                             data-multi="true"
                             data-auto="true"
                             data-on-upload-success="pic_upload_success"
                             data-icon="cloud-upload">
                        </div>
                        <input type="hidden" name="image" value="<?php echo $data->image;?>" id="j_custom_pic">
                    </div>

                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label x85">简略标题：</label>
                    <input type="text" name="shorttitle" value="<?php echo $data->shorttitle;?>" size="25" class="form-control input-nm">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="control-label x85">标题颜色：</label>
                    <input type="text" name="color" id="j_custom_color" class="form-control input-nm" value="<?php echo $data->color;?>" data-toggle="colorpicker" data-bgcolor="true" size="14" >
                    <a href="javascript:;" title="清除颜色" data-toggle="clearcolor" data-target="#j_custom_color" class="btn btn-default">清除颜色</a>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 6px;padding-bottom: 6px;">
                    <label class="control-label x85">文章栏目：</label>
                    <select name="column_id" id="j_custom_column" data-toggle="selectpicker" data-width="250" data-rule="required">
                        <option value="">请选择</option>
                        <?php
                        foreach($columnData as $item) {
                            ?>
                            <option value="<?php echo $item->id;?>" <?php if($data->column_id == $item->id){echo 'selected';}?> <?php if($item->leaf == 1){echo 'disabled';}?>>
                                <?php
                                if($item->level > 1) {
                                    $line = '';
                                    for($i = 1; $i <= ($item->level-1); $i++){
                                        $line .= "&nbsp;&nbsp;&nbsp;|---";
                                    }
                                    $item->name = $line.$item->name;
                                    $line = '';
                                }
                                echo $item->name;
                                ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="control-label x85">文章属性：</label>
                    <input type="checkbox" name="iscommend" id="j_custom_iscommend" <?php if($data->iscommend == 1){echo 'checked';}?> data-toggle="icheck" value="1" data-label="推荐">&nbsp;&nbsp;
                    <input type="checkbox" name="ishot" id="j_custom_ishot" <?php if($data->ishot == 1){echo 'checked';}?>  data-toggle="icheck" value="1" data-label="热门">&nbsp;&nbsp;
                    <input type="checkbox" name="istop" id="j_custom_istop" <?php if($data->istop == 1){echo 'checked';}?>  data-toggle="icheck" value="1" data-label="置顶">&nbsp;&nbsp;
                    <input type="checkbox" name="isbold" id="j_custom_isbold" <?php if($data->isbold == 1){echo 'checked';}?>  data-toggle="icheck" value="1" data-label="加粗">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label x85">作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：</label>
                    <input type="text" name="author" value="<?php echo $data->author;?>" size="25" class="form-control input-nm">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="control-label x85">发布时间：</label>
                    <input type="text" name="pubdate" size="22" value="<?php echo date('Y-m-d H:i:s', strtotime($data->pubdate));?>" class="form-control input-nm" data-toggle="datepicker" data-pattern="yyyy-MM-dd HH:mm:ss">
                </td>
            </tr>
            <tr>
                <td>
                    <label class="control-label x85">来&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;源：</label>
                    <input type="text" name="source" value="<?php echo $data->source;?>" size="25" class="form-control input-nm">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="control-label x85">浏览次数：</label>
                    <input type="text" name="click" value="<?php echo $data->click;?>" size="22" class="form-control input-nm" data-rule="digits">
                </td>
            </tr>
            <tr>
                <td >
                    <label class="control-label x85">关&nbsp;键&nbsp;&nbsp;字：</label>
                    <input type="text" name="keywords" value="<?php echo $data->keywords;?>" size="65" class="form-control input-nm">
                </td>
            </tr>
            <tr>
                <td >
                    <label class="control-label x85">摘&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;要：</label>
                    <textarea name="description" cols="65" class="form-control" data-toggle="autoheight"><?php echo $data->description;?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="content" data-toggle="kindeditor" style="width: 100%;min-height: 450px;"><?php echo $data->content;?></textarea>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close btn-no">关闭</button></li>
        <li><button type="submit" class="btn-blue">保存</button></li>
    </ul>
</div>