<div class="bjui-pageHeader">
    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templates/add" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="300" data-target="roles" data-mask="true" data-icon="plus">添加工作流</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th align="center">序号</th>
            <th>名称</th>
            <th align="center">分类</th>
            <th align="center">创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        if(!empty($roles)) {
            foreach($roles as $item) {
                ?>
                <tr >
                    <td align="center"><?php echo $i;?></td>
                    <td><?php echo $item->name;?></td>
                    <td align="center"><?php echo $item->type;?></td>
                    <td align="center"><?php echo $item->created->format('Y-m-d H:i:s');?></td>
                    <td>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templates/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="300" data-id="dialog-mask" data-mask="true">编辑</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templates/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/templateDetails/index/<?php echo $item->id;?>" class="btn btn-blue" data-toggle="navtab" data-id="templatedetails" data-mask="true" data-fresh="true" data-title="<?php echo $item->name.' 流程设计';?>">流程设计</a>
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