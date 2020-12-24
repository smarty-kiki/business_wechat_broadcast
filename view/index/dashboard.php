<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="../../layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="../../layuiadmin/style/admin.css" media="all">
</head>
<body>

  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">

      <div class="layui-col-sm6 layui-col-md4">
        <div class="layui-card">
          <div class="layui-card-header">
            启用任务数
            <span class="layui-badge layui-bg-blue layuiadmin-badge">条</span>
          </div>
          <div class="layui-card-body layuiadmin-card-list">
            <p class="layuiadmin-big-font">{{ $valid_count }}</p>
          </div>
        </div>
      </div>
      <div class="layui-col-sm6 layui-col-md4">
        <div class="layui-card">
          <div class="layui-card-header">
            总任务数
            <span class="layui-badge layui-bg-cyan layuiadmin-badge">条</span>
          </div>
          <div class="layui-card-body layuiadmin-card-list">
            <p class="layuiadmin-big-font">{{ $total_count }}</p>
          </div>
        </div>
      </div>
      <div class="layui-col-sm6 layui-col-md4">
        <div class="layui-card">
          <div class="layui-card-header">
            总通知次数
            <span class="layui-badge layui-bg-green layuiadmin-badge">次</span>
          </div>
          <div class="layui-card-body layuiadmin-card-list">

            <p class="layuiadmin-big-font">{{ $total_log_count }}</p>
          </div>
        </div>
      </div>

      </div>
    </div>
  </div>

  <script src="../../layuiadmin/layui/layui.js"></script>
  <script>
  layui.config({
    base: '../../layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'sample']);
  </script>
</body>
</html>
