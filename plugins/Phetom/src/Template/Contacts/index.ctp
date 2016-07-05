<div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/contacts/index" method="post">
        <input type="hidden" name="pageSize" value="<?php echo $numPerPage ?>">
        <input type="hidden" name="pageCurrent" value="1">
        <div class="bjui-searchBar">
            <label>姓名：</label>
            <input type="text" value="<?php if (isset($name)) echo $name; ?>" name="name" class="form-control" size="15">&nbsp;&nbsp;
            <label>电话:</label>
            <input type="text" value="<?php if (isset($tel)) echo $tel; ?>" name="tel" class="form-control" size="15">&nbsp;&nbsp;
            &nbsp;&nbsp;
            <button type="submit" class="btn-default" data-icon="search">查询</button>
            &nbsp;&nbsp;
            <a class="btn btn-orange" href="javascript:;" onclick="$(this).navtab('reloadForm', true);" data-icon="undo">清空查询</a>
        </div>
    </form>

    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/contacts/add" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-target="users" data-mask="true" data-icon="plus">添加联系人</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th align="center">序号</th>
            <th>姓名</th>
            <th>电话</th>
            <th align="center">添加时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
        foreach ($data as $item) {
            ?>
            <tr >
                <td align="center"><?php echo $i;?></td>
                <td><?php echo $item->name;?></td>
                <td><?php echo $item->tel;?></td>
                <td align="center"><?php echo date('Y-m-d H:i:s', strtotime($item->created));?></td>
                <td>
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/contacts/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-id="dialog-mask" data-mask="true">编辑</a>
                    <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/contacts/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>
                </td>
            </tr>
            <?php
            $i++;
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