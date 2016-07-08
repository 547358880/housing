<style>
    .td-text{
        width: 50%;
    }
    #main{
        width: 100%;
        height: 400px;
        margin-top: 10px;
    }
</style>
<script src="<?php echo $this->request->base;?>/js/echarts.common.min.js"></script>
<div class="table">
    <div border="1" style="width: 100%;height: 40px;">
        <a class="td-text td-text02 <?php if ($type == 'jindu') echo 'td-01';?>" href="<?php echo $this->Url->build('/website/items/tongji/jindu');?>">项目进度</a>
        <a class="td-text td-text02 <?php if ($type == 'bili') echo 'td-01';?>" href="<?php echo $this->Url->build('/website/items/tongji/bili'); ?>">项目比例</a>
    </div>
</div>

<div id="main"></div>
<?php
    if ($type == 'jindu') {
        ?>
        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main'));
            option = {
                title : {
                    text: '项目进度图',
                    x:'center'
                },
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    data: ['征(<?php echo $countData[1];?>)','算(<?php echo $countData[2];?>)','建(<?php echo $countData[3];?>)','安(<?php echo $countData[4];?>)','管(<?php echo $countData[5];?>)']
                },
                series : [
                    {
                        name: '访问来源',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '60%'],
                        data:[
//                    {value:335, name:'征'},
//                    {value:310, name:'算'},
//                    {value:234, name:'建'},
//                    {value:135, name:'安'},
//                    {value:1548, name:'管'}
                            {value:<?php echo $countData[1];?>, name:'征(<?php echo $countData[1];?>)'},
                            {value:<?php echo $countData[2];?>, name:'算(<?php echo $countData[2];?>)'},
                            {value:<?php echo $countData[3];?>, name:'建(<?php echo $countData[3];?>)'},
                            {value:<?php echo $countData[4];?>, name:'安(<?php echo $countData[4];?>)'},
                            {value:<?php echo $countData[5];?>, name:'管(<?php echo $countData[5];?>)'}
                        ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            };
            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main'));

            // 指定图表的配置项和数据
            option = {
                tooltip : {
                    trigger: 'axis',
                    axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                        type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                    }
                },
                legend: {
                    data: ['征', '算','建','安','管']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis:  {
                    type: 'value'
                },
                yAxis: {
                    type: 'category',
                    //data: ['常青街道','包公街道','骆岗街道','大圩镇','淝河镇','义城街道','烟墩街道']
                    data: [<?php $str = ''; foreach($areaData as $item){$str .= '\''.$item->name.'\',';}  echo trim($str, ',');?>]
                },
                series: [
                    {
                        name: '征',
                        type: 'bar',
                        stack: '总量',
                        label: {
                            normal: {
                                show: true,
                                position: 'insideRight'
                            }
                        },
                        data: [<?php $i = 1; $str = ''; foreach($areaData as $item){$str .= $item->count[$i].',';}  echo trim($str, ',');?>]
                    },
                    {
                        name: '算',
                        type: 'bar',
                        stack: '总量',
                        label: {
                            normal: {
                                show: true,
                                position: 'insideRight'
                            }
                        },
                        data: [<?php $i = 2; $str = ''; foreach($areaData as $item){$str .= $item->count[$i].',';}  echo trim($str, ',');?>]
                    },
                    {
                        name: '建',
                        type: 'bar',
                        stack: '总量',
                        label: {
                            normal: {
                                show: true,
                                position: 'insideRight'
                            }
                        },
                        data: [<?php $i = 3; $str = ''; foreach($areaData as $item){$str .= $item->count[$i].',';}  echo trim($str, ',');?>]
                    },
                    {
                        name: '安',
                        type: 'bar',
                        stack: '总量',
                        label: {
                            normal: {
                                show: true,
                                position: 'insideRight'
                            }
                        },
                        data: [<?php $i = 4; $str = ''; foreach($areaData as $item){$str .= $item->count[$i].',';}  echo trim($str, ',');?>]
                    },
                    {
                        name: '管',
                        type: 'bar',
                        stack: '总量',
                        label: {
                            normal: {
                                show: true,
                                position: 'insideRight'
                            }
                        },
                        data: [<?php $i = 5; $str = ''; foreach($areaData as $item){$str .= $item->count[$i].',';}  echo trim($str, ',');?>]
                    }
                ]
            };

            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        </script>
        <?php
    }
?>