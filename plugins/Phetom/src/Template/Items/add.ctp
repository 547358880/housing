<style>
    #j_custom_span_pic img{
        display: block;
        padding: 4px;
        width: 150px;
        height: 150px;
        border: 1px #CCC solid;
        border-radius: 3px;
        text-align: center;
        margin-bottom: 15px;
    }
    .equipleft{
        float: left;
        margin-top: 0px;
    }
    .equipright{
        float: left;
        width: 690px;
        margin-left: 5px;
    }

    .equipright > .icheckbox_minimal-purple{
        margin-top: 10px;
    }
    .equipright > .ilabel {
        margin-top: 10px;
    }

    .bjui-upload > .queue > .item {
        display: none;
    }

    /*.commtdcss .table > thead > tr > th, .commtdcss .table > tbody > tr > th, .commtdcss .table > tfoot > tr > th, .commtdcss .table > thead > tr > td, .commtdcss .table > tbody > tr > td, .commtdcss .table > tfoot > tr > td {*/
        /*padding: 2px 3px;*/
        /*vertical-align: top;*/
    /*}*/

    /*.commtdcss .table > thead > tr > th, .commtdcss .table > tbody > tr > th, .commtdcss .table > tfoot > tr > th, .commtdcss .table > thead > tr > td, .commtdcss .table > tbody > tr > td, .commtdcss .table > tfoot > tr > td {*/
        /*!*border-top: none;*!*/
        /*padding-bottom: 10px;*/
        /*padding-top: 10px;*/
    /*}*/

    .buttonCss .btn{
        height: 30px;
    }

    #j_custom_uploadpic_up{
        margin-top: 10px;
    }
    .bjui-upload > .queue{
        display: none;
        padding: 0;
    }
    .piclist{
        display: inline-block;
    }
    .imgcss{
        margin: 0 7px 8px 8px;
    }
    .imgdiv{
        float: left;;
    }

    .commtdcss .icheckbox_minimal-purple, .iradio_minimal-purple{
        margin-top: 4px;
        margin-bottom: 4px;
    }
    .unitname{
        display: block;
        font-weight: bold;
        padding-bottom: 10px;
    }
    .ilabel{
        padding-top: 5px;
        padding-bottom: 5px;
    }

</style>
<script type="text/javascript">
    function pic_upload_success(file, data) {
        var json = $.parseJSON(data);

        $(this).bjuiajax('ajaxDone', json);
        if (json[BJUI.keys.statusCode] == BJUI.statusCode.ok) {
            $('#j_custom_pic').val(json.filename).trigger('validate');
            $('#j_custom_span_pic').html('<br><br><br><img src="<?php echo $this->request->base;?>/'+ json.filename +'" width="190" height="114" />');
        }
    }
</script>
<div class="bjui-pageContent commtdcss buttonCss">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/items/add" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <fieldset>
            <legend>基本信息</legend>
            <table class="table">
                <tbody>
                <tr>
                    <td colspan="2" width="75%" style="border: none;">
                        <label for="name" class="control-label x85">项目名称：</label>
                        <input type="text" name="name" value="" size="50" class="form-control input-nm" data-rule="required">
                        <span style="color:#ff0000;">*</span>
                    </td>
                    <td rowspan="5" align="center" style="border: none;">
                        <div style="display: inline-block; vertical-align: middle;">
                            <span id="j_custom_span_pic">
                                <br>
                                <br>
                                <br>
                                <img src="<?php echo $this->request->base;?>/images/item.png" width="150" height="150">
                            </span>
                            <div id="j_custom_pic_up" data-toggle="upload" data-uploader="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/upload/contentImage"
                                 data-file-size-limit="1024000000"
                                 data-file-type-exts="*.jpg;*.png;*.gif;*.mpg"
                                 data-multi="true"
                                 data-auto="true"
                                 data-on-upload-success="pic_upload_success"
                                 data-icon="cloud-upload"></div>
                            <input type="hidden" name="image" value="" id="j_custom_pic">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td >
                        <label class="control-label x85">项目面积：</label>
                        <input type="text" name="mianji" class="form-control input-nm" size="18" > ㎡
                    </td>
                    <td >
                        <label class="control-label x85">拆迁户数：</label>
                        <input type="text" name="households" class="form-control input-nm" size="18" data-rule="digits">
                    </td>
                </tr>
                <tr>
                    <td >
                        <label class="control-label x85">选择工作流：</label>
                        <select name="template_id" id="j_custom_ok" data-toggle="selectpicker" data-rule="required" data-width="180px">
                            <?php
                                foreach($templateData as $item) {
                                    ?>
                                    <option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                    <td >
                        <label class="control-label x85">开始日期：</label>
                        <input type="text" name="starttime" size="18" value="<?php echo date('Y-m-d');?>" class="form-control input-nm" data-toggle="datepicker" data-pattern="yyyy-MM-dd">
                    </td>
                </tr>
                <tr>
                    <td >
                        <label class="control-label x85">建设单位：</label>
                        <input type="text" name="construction" class="form-control input-nm" size="18">
                    </td>
                    <td >
                        <label class="control-label x85">建设周期：</label>
                        <input type="text" name="period" class="form-control input-nm" size="18">
                    </td>
                </tr>
                <tr>
                    <td >
                        <label class="control-label x85">经&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;度：</label>
                        <input type="text" name="longitude" class="form-control input-nm" size="18">
                    </td>
                    <td >
                        <label class="control-label x85">纬&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;度：</label>
                        <input type="text" name="latitude" class="form-control input-nm" size="18">
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 6px;padding-bottom: 10px;">
                        <label class="control-label x85">完成状态：</label>
                        <?php
                            $i = 1;
                            foreach($okData as $key => $val) {
                                ?>
                                <input type="radio" name="ok" id="j_custom_ok<?php echo $i;?>" value="<?php echo $key;?>" <?php if($i==1){echo 'checked';}?> data-toggle="icheck" data-label="<?php echo $val;?>">&nbsp;&nbsp;
                                <?php
                                $i++;
                            }
                        ?>
                    </td>
                    <td colspan="2">
                        <label class="control-label x85">项目状态：</label>
                        <?php
                            $i = 1;
                            foreach($stateData as $key => $val) {
                                ?>
                                <input type="radio" name="state" id="j_custom_state<?php echo $i;?>" value="<?php echo $key;?>" <?php if($i==1){echo 'checked';}?> data-toggle="icheck" data-label="<?php echo $val;?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                $i++;
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td style="padding-top: 6px;padding-bottom: 10px;" colspan="3">
                        <label class="control-label x85">延期状态：</label>
                        <?php
                        $i = 1;
                        foreach($timeOkData as $key => $val) {
                            ?>
                            <input type="radio" name="currentTime" id="j_custom_timeok<?php echo $i;?>" value="<?php echo $key;?>" <?php if($i==1){echo 'checked';}?> data-toggle="icheck" data-label="<?php echo $val;?>">&nbsp;&nbsp;
                            <?php
                            $i++;
                        }
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>
        <hr>
        <fieldset>
            <legend>选择街道</legend>
            <table class="table">
                <tbody>
                <tr>
                    <td style="border: none;">
                        <?php
                        if(!empty($areaData)) {
                            $i = 1;
                            foreach($areaData as $item) {
                                ?>
                                <input type="checkbox" data-toggle="icheck" id="j_form_area<?php echo $item->id;?>" name="areas[]" value="<?php echo $item->id;?>" data-label="<?php echo $item->name;?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                $i++;
                            }
                        }
                        ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>
        <fieldset>
            <legend>项目简介</legend>
            <textarea name="intro" cols="82" rows="2" data-toggle="autoheight"></textarea>
        </fieldset>
        <fieldset>
            <legend>项目备注</legend>
            <textarea name="remark" cols="82" rows="2" data-toggle="autoheight"></textarea>
        </fieldset>
        <fieldset>
            <legend>项目详情</legend>
            <textarea name="content" data-toggle="kindeditor" cols="82" data-minheight="50" rows="2" data-toggle="autoheight"></textarea>
        </fieldset>
    </form>
</div>
<div class="bjui-pageFooter">
    <ul>
        <li><button type="button" class="btn-close btn-no">关闭</button></li>
        <li><button type="submit" class="btn-blue">保存</button></li>
    </ul>
</div>