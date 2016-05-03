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

    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,900,700,300,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" /> -->
    <link rel="stylesheet" href="styles/icons.css" />
    <link rel="stylesheet" href="styles/styles.css" />

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    
    <!-- <script type="text/javascript" src="http://myconsole.matdev.fr/mylog.dev-6.0.0.js"></script> -->
    <script type="text/javascript" src="js/myconsole/mylog.dev-6.0.0.js"></script>
    <script type="text/javascript">if(typeof log=='undefined'){log={time:function(){},size:function(){},key:function(){},loop:function(){},info:function(){},red:function(){},orange:function(){},yellow:function(){},green:function(){},Green:function(){},blue:function(){},violet:function(){},white:function(){},grey:function(){},black:function(){},show:function(){},important:function(){},alert:function(){},button:function(){},range:function(){}};};</script>

</head>
<body>  
    <!-- <script src="node_modules/electron-open-link-in-browser/build/electron-open-link-in-browser.js"></script> -->

    <!-- <a href="http://google.fr" onClick="electronOpenLinkInBrowser();">okokko</a> -->

    <div id="header"></div>
    <div id="sidebar">
        <div class="detail"></div>
    </div>
    <div id="work-list"></div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>
    <!-- <script src="js/Sortable-master/Sortable.min.js"></script> -->
    <!-- <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
    <script type="text/javascript">
    $(function(){

        $(document).on('click', '.icon-down-open', function(){
            $(this).toggleClass('close');
            var $client = $(this).parents('.client');
            $client.toggleClass('hide')
            var $tasks = $('.taches', $client);
            // var $tasks = $('.task, .new-task', $client);

            if($client.hasClass('hide'))
                $tasks.slideUp(300);
            else
                $tasks.slideDown(300);
        });

        /*$(document).on('mouseenter', '.status-task-module > .status-task', function(){
            $(this).html('x');
        }).on('mouseleave', '.status-task', function(){
            $(this).html('');
        });*/



        /*log.button('pull github', function(){
            $.ajax({
                url: 'pull-gitub.php'
            }).done(function(data) {
                log.green(data);
            });
        });*/

        $.ajax({
            type: 'POST',
            url: 'modules/core.php',
            data: {
                module: 'works-list'
            }
        }).done(function(data) {

            $('#work-list').html(data);
            
            updateCount();

            /*var list = $('.taches')[0];
            Sortable.create(list, {
                animation: 150
            })*/

        }).fail(function(data) {
            log.green(data,"error");
        });


        $(document).on('click', '.task, .label', function(){

            $('.task, .label').removeClass('current');
            $(this).addClass('current');
            // log.Green('ok')
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

            // log.green(id, type)

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
                update_placeholder();


            }).fail(function(data) {
                log.green(data,"error");
            });

        });



// input
    // input select
        $(document).on('click', '.input-select', function(){
            var $this = $(this);
            var name = $(this).attr('name');
            var taskId = $(this).parents('.detail').attr('data-task-id');
            $select = $('>.select', this);
            if($('.select-all', this).length) return;
            $clone = $select.clone();

            $(this).append('<div class="select-all"></div>');
            $('.select-all', this).html( $clone ).find('.placeholder').remove();
            
            if( $this.attr('empty') ){
                $('.select-all', this).prepend('<div class="select" >'+$this.attr('empty')+'</div>')
            }
            
            $('.select-all .select').off('click');
            $('.select-all .select', this).click(function(){

                var val = $(this).attr('value');
                var $selectThis = $(this);

                updateTask(taskId, name, val, function(){

                    $select.removeClass('default');
                    $select.eq($selectThis.index()).addClass('default');
                    $('.select-all .select', $this).off('click');
                    $('.select-all', $this).remove();
            
                });

            }); 

        });

        $(document).click(function(e){
            if(!$(e.target).hasClass('input-select') && !$(e.target).parents('.input-select').length){
                $('.select-all .select').off('click');
                $('.select-all').remove();
            }
        });

    // placeholder 
        function update_placeholder(){

            // input text
            var $input = $('.input-text[placeholder]');
            $.each($input, function(){
                var $this = $(this);
                var placeholder = $this.attr('placeholder');
                var val = $this.text();
                if(!val) $this.html('<span class="placeholder">'+placeholder+'</span>');
            });

            // input select
            var $input = $('.input-select[placeholder]');
            $.each($input, function(){
                var $this = $(this);
                if(!$('.select', $this).hasClass('default')){
                    $this.prepend('<div class="select placeholder default" value="">Assigner à</div>');
                }else{
                    $this.prepend('<div class="select placeholder" value="">Assigner à</div>');
                }
            });

        }
        $(document).on('focus', '.input', function(){
            if($(this).hasClass('disable')) return;
            $('.placeholder', this).remove();
            // $(this).focus();
        });
        $(document).on('blur', '.input', function(){
            // $('.placeholder', this).remove();
            // $(this).focus();
            // test()
        });

// change status
        $(document).on('click', '.status-task', function(){
            var $parent = $(this).parent();
            $('.status-task-list').hide();
            $('.status-task-list', $parent).show();
        });

        $(document).click(function(e){
            if(!$(e.target).hasClass('status-task')){
                $('.status-task-list').hide();
                $('.status-task-module').removeClass('current');
            }
        });

        $(document).on('click', '.status-task-li', function(){

            var $this = $(this);
            var statusId = $this.attr('data-status-id');
            var statusLabel = $this.attr('data-status-label');
            var taskId = $this.parents('.status-task-module').attr('data-task-id');

            updateStatus(taskId, statusId, function(){
                $('.status-task-module[data-task-id="'+taskId+'"]>.status-task').attr('data-status-label', statusLabel);
                $('.task[data-task-id="'+taskId+'"]').attr('data-task-status', statusLabel);
                $('#sidebar>.detail').attr('data-task-status', statusLabel);
            });

        });

        /*$(document).on('change', 'select', function(){
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
        });*/

        $(document).on('click', '.new-task', function(){
            var $this = $(this);
            var id_client = $this.attr('data-client-id');

            $.ajax({
                type: 'POST',
                url: 'modules/core.php',
                data: {
                    module: 'new-task',
                    id_client : id_client
                }
            }).done(function(data) {

                $this.before(data);

            }).fail(function(data) {
                log.green(data,"error");
            });
        });

        $(document).on('blur', '.more-task .input-text', function(){
            update_placeholder();
            var $this = $(this);
            var id = $this.parents('.detail').attr('data-task-id');
            var name = $this.attr('name')
            var val = $this.html();
            if($('.placeholder', this).length) val='';
            $('.task[data-task-id="'+id+'"] .'+name).text(val);
            updateTask(id, name, val);
        });

        $(document).on('click', '.more-client .input-text', function(){
            log.Green('okok')
            return false;
        });

        $(document).on('click', '.icon-right-circled', function(){
            // const shell = require('electron').shell;
            // shell.openExternal('http://google.com');
            log.green('icon-right-circled')
            return false;
        });

        $(document).on('focus', '.icon-right-circled', function(){
            // const shell = require('electron').shell;
            // shell.openExternal('http://google.com');
            // log.green('icon-right-circled')
            return false;
        });

        /*$(document).on('blur', '.more-client .input-text', function(){
            return;
            var $this = $(this);
            var id = $this.parents('.detail').attr('data-client-id');
            var name = $this.attr('name')
            var val = $this.html();

            $('#client-'+id+' .'+name).text(val);

            updateClient(id, name, val);
        });*/

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


        function updateTask(id, name, val, callback){

            log.yellow({id:id,name:name,val:val}, 'updateTask()')

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

                if(callback) callback();
                // log.yellow(data);

            });
        };

        function updateStatus(id, val, callback){

            log.yellow({id:id,val:val}, 'updateStatus()')



            $.ajax({
                type: 'POST',
                url: 'modules/core.php',
                data: {
                    module: 'update-status',
                    id : id,
                    val : val
                }
            }).done(function(data) {

                log.green(data);

                if(callback) callback();
                // log.yellow(data);
                updateCount();

            });
        };



        function updateCount(){
            var $client = $('.client');
            $('.count').html('');
            for (var i = 0; i < $client.length; i++) {
                var $this = $($client[i]);
                var $count = $('.count', $this);
                var count_todo = $('.task[data-task-status="none"]', $this).length;
                var count_progress = $('.task[data-task-status="progress"]', $this).length;

                if(count_todo!=0)
                    $count.append('<span class="count-todo">'+count_todo+'</span>');
                if(count_progress!=0)
                    $count.append('<span class="count-progress">'+count_progress+'</span>');


            };
        }

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



// utilitaire

    function generate_json(array){

        var string = '';
        
        if( array instanceof Array ) {

            string += '[';

            var l = array.length-1
            for (var i = 0; i < l; i++) {
                string += generate_json(array[i]);
                if(i!==l) string += ',';
            };

            string += ']';

        }else if( array.constructor == Object ){

            string += '{';
        
            var i = 0;
            var l = Object.keys(array).length;
            for(var key in array){
                string += '"' + key + '":' + generate_json(array[key]);
                if(++i!==l) string += ',';
            };

            string += '}';

        }else{
            
            string += '"' + array.replace('"', '\\"') + '"';
            
        }

        return string;
    }

    // log.green( generate_json('y"yy') )
    // log.green( generate_json(['aa"a','b"bb','c"cc']) )
    // log.green( generate_json({aaa:'1"11',bbb:'22"2',ccc:'33"3'}) )

    // log.green( generate_json(['aa"a',['aa"a','bb"b'],{aaa:'11"1',bbb:'2"22'}]) )
    // log.green( generate_json({aaa:'1"11',bbb:['a"aa','"bbb'],ccc:{aaa:'111"',bbb:'22"2'}}) )


    });
    </script>
        
</body>
</html>





