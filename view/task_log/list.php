<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>任务执行日志</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
</head>
<body>

  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">任务执行日志</div>
          <div class="layui-card-body">
            <table class="layui-hide" id="task_log-table" lay-filter="task_log-table"></table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="/layuiadmin/layui/layui.js"></script>  
  <script>
  layui.config({
      base: '/layuiadmin/'
  }).extend({
    index: 'lib/index'
  }).use(['index', 'table'], function() {
    var admin = layui.admin
    ,table = layui.table;
  
    table.render({
       elem: '#task_log-table'
      ,url: '/task_logs/ajax'
      ,toolbar: '#task_log-table-toolbar'
      ,height: 'full-100'
      ,cellMinWidth: 80
      ,page: false
      ,cols: [[{"field":"id","title":"ID","sort":true},{"field":"result","title":"名称","sort":true,"align":"center"},{"field":"task_display","title":"任务","sort":true},{"field":"snap_task_robot_url","title":"任务机器人URL","sort":true,"align":"center"},{"field":"snap_task_message","title":"任务要发送的消息","sort":true,"align":"center"},{"field":"create_time","title":"添加时间","sort":true},{"field":"update_time","title":"修改时间","sort":true},{"fixed":"right","title":"操作","toolbar":"#task_log-table-bar","width":150}]]
    });

    table.on('toolbar(task_log-table)', function(obj) {
      switch (obj.event) {
        case 'add':
            window.location.href = '/task_logs/add';
        break;
      };
    });

    table.on('tool(task_log-table)', function(obj) {
      var data = obj.data;
      if (obj.event === 'del') {
          layer.confirm('确定删除任务执行日志['+data.id+']么', function(i) {
              layui.jquery.post('/task_logs/delete/'+data.id, null, function (res) {
                  if (res.code) {
                      layer.close(i);
                      layer.msg(res.msg);
                  } else {
                      table.reload('task_log-table');
                      layer.close(i);
                  }
              }, 'json');
        });
      } else if (obj.event === 'update') {
          window.location.href = '/task_logs/update/'+data.id;
      }
    });
    
  });
  </script>
</body>
</html>
