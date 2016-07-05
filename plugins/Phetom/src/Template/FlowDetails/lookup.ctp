<div class="bjui-pageContent tableContent">
    <table data-toggle="tablefixed" data-width="100%">
        <thead>
        <tr>
            <th width="15%" align="center">序号</th>
            <th width="35%">名称</th>
            <th width="20%" align="center">等级</th>
            <th width="30%" align="center">操作</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="center">1</td>
            <td>顶级流程</td>
            <td></td>
            <td align="center">
                <a href="javascript:;" data-toggle="lookupback" data-args="{id:'0', name:'顶级流程', level:'0'}" class="btn btn-blue" title="选择本项" data-icon="check">选择</a>
            </td>
        </tr>
        <?php
            $i=2;
            if (!empty($data)) {
                foreach ($data as $item) {
                    ?>
                    <tr>
                        <td align="center"><?php echo $i;?></td>
                        <td>
                            <?php
                            $name = $item->name;
                            if($item->level > 1) {
                                $line = '';
                                for($j = 1; $j <= ($item->level-1); $j++){
                                    $line .= "&nbsp;&nbsp;&nbsp;|---";
                                }
                                $name = $line.$name;
                                $line = '';
                            }
                            echo $name;
                            ?>
                        </td>
                        <td align="center"><?php echo $item->level;?></td>
                        <td align="center">
                            <a href="javascript:;" data-toggle="lookupback" data-args="{id:'<?php echo $item->id;?>', name:'<?php echo $item->name;?>', level:'<?php echo $item->level;?>'}" class="btn btn-blue" title="选择本项" data-icon="check">选择</a>
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