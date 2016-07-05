<div class="bjui-pageContent">
    <form action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/areas/add" class="pageForm" data-toggle="validate" data-reloadNavtab="ture" >
        <table class="table table-condensed table-hover">
            <tbody>
            <tr>
                <td>
                    <label for="name" class="control-label x85">区域名称：</label>
                    <input type="text" name="name" value="" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label form="year" class="control-label x85">经&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;度：</label>
                    <input type="text" name="longitude" value="" size="35" class="form-control input-nm" data-rule="required">
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">维&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;度：</label>
                    <input type="text" name="latitude" value="" size="35" class="form-control input-nm" data-rule="required" >
                    <span style="color:#ff0000;">*</span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name" class="control-label x85">缩放级别：</label>
                    <input type="text" name="zoom" value="15" size="35" class="form-control input-nm" data-toggle="spinner">
                </td>
            </tr>
            <tr>
                <td style="padding-top: 6px;padding-bottom: 6px;">
                    <label for="name" class="control-label x85">上级区域：</label>
                    <select name="parent_id"  data-toggle="selectpicker" >
                        <option value="0">顶级区域</option>
                        <?php
                        foreach($mainData as $item) {
                            ?>
                            <option value="<?php echo $item->id;?>"  ><?php echo $item->name;?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>

                    <br>
                    <br>
                    <span style="color:#ff0000;">提示：</span>
                    获取坐标，请访问<a href="http://s.suixingpay.com/static/baiduMap/baiduMap.jsp" target="_blank">百度地图拾取坐标系统</a>
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