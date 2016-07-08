<div class="bjui-pageHeader">
    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/add/<?php echo $item_id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-target="roles" data-mask="true" data-icon="plus">添加流程</a>
        </div>

        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/setcurrent/<?php echo $item_id;?>" class="btn btn-blue" data-toggle="dialog" data-width="600" data-height="450" data-target="roles" data-mask="true" data-icon="check">设置项目进度</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th align="center">序号</th>
            <th>流程名称</th>
            <th align="center">等级</th>
            <th align="center">截止时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!empty($data)) {
            $i = 1;
            foreach ($data as $item) {
                ?>
                <tr>
                    <td align="center"><?php echo $i;?></td>
                    <td>
                        <?php
                        if($item->level > 1) {
                            $line = '';
                            for($j = 1; $j <= ($item->level-1); $j++){
                                $line .= "&nbsp;&nbsp;&nbsp;|---";
                            }
                            $item->name = $line.$item->name;
                            $line = '';
                        }
                        echo $item->name;
                        ?>
                    </td>
                    <td align="center"><?php echo $item->level;?></td>
                    <td align="center"><?php echo date('Y-m-d', strtotime($item->endtime));?></td>
                    <td>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-id="dialog-mask" data-mask="true">编辑</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/add/<?php echo $item_id;?>?id=<?php echo $item->id;?>" class="btn btn-blue" data-toggle="dialog" data-width="600" data-height="450" data-id="dialog-mask" data-mask="true">添加子流程</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/flowDetails/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>
                    </td>
                </tr>
                <?php
                $i++;
            }
        }
        ?>
        </tbody>
    </table>
</div>