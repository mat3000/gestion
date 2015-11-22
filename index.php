<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js ie6 lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js ie7 lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js ie8 lt-ie9"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="fr_FR"><!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title></title>

    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <meta name="viewport" content="width = device-width, initial-scale = 1.0" />

    <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" /> -->
    <link rel="stylesheet" href="styles/icons.css" />
    <link rel="stylesheet" href="styles/styles.css" />

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    
    <script type="text/javascript" src="http://myconsole.matdev.fr/mylog.dev-6.0.0.js"></script>
    <script type="text/javascript">if(typeof log=='undefined'){log={time:function(){},size:function(){},key:function(){},loop:function(){},info:function(){},red:function(){},orange:function(){},yellow:function(){},green:function(){},Green:function(){},blue:function(){},violet:function(){},white:function(){},grey:function(){},black:function(){},show:function(){},important:function(){},alert:function(){},button:function(){},range:function(){}};};</script>

<style type="text/css">

</style>
</head>
<body>  

    <div id="header"></div>
    <div id="work-list"></div>
    <div id="sidebar">
        <div class="detail"></div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script> -->
    <!-- <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
    <script type="text/javascript">
    $(function(){

        log.button('pull github', function(){
            $.ajax({
                url: 'pull-gitub.php'
            }).done(function(data) {
                log.green(data);
            });
        });

        $.ajax({
            type: 'POST',
            url: 'modules/core.php',
            data: {
                module: 'works-list'
            }
        }).done(function(data) {

            $('#work-list').html(data)

        }).fail(function(data) {
            log.green(data,"error");
        });


        $(document).on('click', '.task, .label', function(){

            // return;

            var id, type;
            var id_task = parseInt( $(this).attr('data-task-id') );
            var id_client = parseInt( $(this).attr('data-client-id') );

            $('#work-list').css('padding-right', 300);
            $('#sidebar').css('right', 0);

            if(id_task){
                type = 'task';
                id = id_task;
            }else if(id_client){
                type = 'client';
                id = id_client;
            }else{
                return;
            }

            log.green(id, type)

            $.ajax({
                type: 'POST',
                url: 'modules/core.php',
                data: {
                    module: 'get-info',
                    type: type, // task or client
                    id : id
                }
            }).done(function(data) {

                $('#sidebar').html(data);

            }).fail(function(data) {
                log.green(data,"error");
            });

        });

        $(document).on('change', 'select', function(){
            var $task = $(this).parents('.task');
            var id = $task.attr('data-task-id');
            var name = this.name;
            var val = $(this).val();
            if(val==='trash'){
                updateTask(id, 'trash', 1);
                $task.remove();
                return;
            }
            $(this).parents('.task').removeClass('progress done preprod prod').addClass(val);
            updateTask(id, name, val);
        });

        $(document).on('click', '.new-task', function(){
            var $this = $(this);
            var id = $this.attr('data-client-id');
            $.ajax({
                type: 'POST',
                url: 'modules/core.php',
                data: {
                    module: 'new-task',
                    id : id
                }
            }).done(function(data) {

                $this.before(data);

            }).fail(function(data) {
                log.green(data,"error");
            });
        });

        $(document).on('blur', '.more-task .input-text', function(){
            var $this = $(this);
            var id = $this.parents('.detail').attr('data-task-id');
            var name = $this.attr('name')
            var val = $this.html();
            $('.task[data-task-id="'+id+'"] .'+name).text(val);
            updateTask(id, name, val);
        });

        $(document).on('blur', '.more-client .input-text', function(){
            var $this = $(this);
            var id = $this.parents('.detail').attr('data-client-id');
            var name = $this.attr('name')
            var val = $this.html();

            $('#client-'+id+' .'+name).text(val);

            updateClient(id, name, val);
        });

        $(document).on('click', '.more-client .input-button', function(){
            var $this = $(this);
            var id = $this.parents('.detail').attr('data-client-id');
            var name = $this.attr('name')
            var val = $this.text();

            if(name==='trash'){
                updateClient(id, 'trash', 1);
                $('#client-'+id).remove();
                return;
            }

            updateClient(id, name, val);
        });


        function updateTask(id, name, val){

            $.ajax({
                type: 'POST',
                url: 'modules/core.php',
                data: {
                    module: 'update-task',
                    id : id,
                    name : name,
                    val : val
                }
            }).done(function(data) {

                // log.Green(data);

            });
        };

        function updateClient(id, name, val, callback){

            $.ajax({
                type: 'POST',
                url: 'modules/core.php',
                data: {
                    module: 'update-client',
                    id : id,
                    name : name,
                    val : val
                }
            }).done(function(data) {

                // if(callback) callback();

                log.Green(data);

            });
        };


        $(document).on('click', '.new-client', function(){
            var $this = $(this);
            $.ajax({
                type: 'POST',
                url: 'modules/core.php',
                data: {
                    module: 'new-client'
                }
            }).done(function(data) {

                log.Green(data)

                $this.before(data);

            })
        }); 

    });
    </script>
        
</body>
</html>





