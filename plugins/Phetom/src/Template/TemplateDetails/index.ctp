<div class="bjui-pageHeader">
    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templateDetails/add/<?php echo $id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-target="roles" data-mask="true" data-icon="plus">添加流程</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th align="center">序号</th>
            <th>所属模板</th>
            <th>名称</th>
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
                    <td><?php echo $templateData->name;?></td>
                    <td>
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
                    </td>
                    <td align="center"><?php echo $item->level;?></td>
                    <td align="center"><?php echo $item->endtime.' 天';?></td>
                    <td>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templateDetails/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-id="dialog-mask" data-mask="true">编辑</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templateDetails/add/<?php echo $id;?>?id=<?php echo $item->id;?>" class="btn btn-blue" data-toggle="dialog" data-width="600" data-height="450" data-id="dialog-mask" data-mask="true">添加子流程</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templateDetails/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>
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