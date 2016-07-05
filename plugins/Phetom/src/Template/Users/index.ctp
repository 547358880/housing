<div class="bjui-pageHeader">
    <form id="pagerForm" data-toggle="ajaxsearch" action="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/users/index" method="post">
        <input type="hidden" name="pageSize" value="<?php echo $numPerPage ?>">
        <input type="hidden" name="pageCurrent" value="1">
        <div class="bjui-searchBar">
            <label>用户名：</label>
            <input type="text" value="<?php if (isset($username)) echo $username; ?>" name="username" class="form-control" size="15">&nbsp;&nbsp;
            <label>管理员组:</label>
            <select name="role_id" data-toggle="selectpicker" class="show-tick" style="display: none;">
                <option value="">全部</option>
                <?php
                foreach($roleData as $item) {
                    ?>
                    <option value="<?php echo $item->id;?>"  <?php if(isset($role_id) && $role_id == $item->id){echo "selected";} ?> ><?php echo $item->name;?></option>
                    <?php
                }
                ?>
            </select>
            &nbsp;&nbsp;
            <button type="submit" class="btn-default" data-icon="search">查询</button>
            &nbsp;&nbsp;
            <a class="btn btn-orange" href="javascript:;" onclick="$(this).navtab('reloadForm', true);" data-icon="undo">清空查询</a>
        </div>
    </form>

    <div class="datagrid-toolbar">
        <div class="btn-group" role="group">
            <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/users/add" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-target="users" data-mask="true" data-icon="plus">添加用户</a>
        </div>
    </div>
</div>

<div class="bjui-pageContent tableContent">
    <table class="table table-bordered table-hover table-striped table-top" data-width="100%" data-layout-h="0" data-nowrap="true" data-selected-multi="true">
        <thead>
        <tr>
            <th align="center">序号</th>
            <th>用户名</th>
            <th>管理员组</th>
            <th>昵称</th>
            <th align="center">性别</th>
            <th>联系电话</th>
            <th>电子邮件</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1;
            foreach ($data as $item) {
                ?>
                <tr >
                    <td align="center"><?php echo $i;?></td>
                    <td><?php echo $item->username;?></td>
                    <td><?php echo $item->role->name?></td>
                    <td><?php echo $item->nicheng;?></td>
                    <td align="center"><?php if($item->sex ==1 ){echo "男";}else{echo "女";}?></td>
                    <td><?php echo $item->tel;?></td>
                    <td><?php echo $item->email;?></td>
                    <td>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/users/edit/<?php echo $item->id;?>" class="btn btn-green" data-toggle="dialog" data-width="600" data-height="450" data-id="dialog-mask" data-mask="true">编辑</a>
                        <a href="<?php echo $this->request->base.'/'.strtolower($this->request->params['plugin']);?>/users/delete/<?php echo $item->id;?>" class="btn btn-red" data-toggle="doajax" data-confirm-msg="确定要删除该行信息吗">删除</a>
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