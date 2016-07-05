<div class="bjui-pageHeader">
    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/areas/add" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-target="roles" data-mask="true" data-icon="plus">添加区域</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th align="center">区域ID</th>
            <th>名称</th>
            <th>经度</th>
            <th>维度</th>
            <th align="center">缩放级别</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!empty($data)) {
            foreach ($data as $item) {
                ?>
                <tr>
                    <td align="center"><?php echo $item->id;?></td>
                    <td>
                        <?php
                        if($item->parent_id > 0) {
                            $item->name = "&nbsp;&nbsp;&nbsp;|---".$item->name;
                        }
                        echo $item->name;
                        ?>
                    </td>
                    <td><?php echo $item->longitude;?></td>
                    <td><?php echo $item->latitude;?></td>
                    <td align="center"><?php echo $item->zoom;?></td>
                    <td>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/areas/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-id="dialog-mask" data-mask="true">编辑</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/areas/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>