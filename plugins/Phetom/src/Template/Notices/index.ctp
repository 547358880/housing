<div class="bjui-pageHeader">
    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/notices/add/<?php echo $item_id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-target="roles" data-mask="true" data-icon="plus">添加项目提醒</a>
        </div>

        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/notices/sendmessage/<?php echo $item_id;?>" class="btn btn-red" data-toggle="dialog" data-width="600" data-height="450" data-target="roles" data-mask="true" data-icon="envelope-o">发送短信</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th align="center">序号</th>
            <th>通知类型</th>
            <th>消息内容</th>
            <th align="center">发送时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        if(!empty($data)) {
            foreach($data as $item) {
                ?>
                <tr >
                    <td align="center"><?php echo $i;?></td>
                    <td><?php echo $typeData[$item->type];?></td>
                    <td ><?php echo $item->text;?></td>
                    <td align="center"><?php echo $item->created->format('Y-m-d H:i:s');?></td>
                    <td>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/notices/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="550" data-id="dialog-mask" data-mask="true">编辑</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/notices/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>
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
<div class="bjui-pageFooter">
    <div class="pages">
        <span>每页&nbsp;</span>
        <div class="selectPagesize">
            <select data-toggle="selectpicker" data-toggle-change="changepagesize">
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
        <span>&nbsp;条，共 <?php echo $this->Paginator->counter('{{count}}');?> 条</span>
    </div>
    <div class="pagination-box" data-toggle="pagination"
         data-total="<?php echo $this->Paginator->counter('{{count}}');?>"
         data-page-size="<?php echo $numPerPage; ?>"
         data-page-current="1">
    </div>
</div>