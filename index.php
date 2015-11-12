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
    <link rel="stylesheet" href="styles/styles.css" />

    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    

    <script type="text/javascript" src="http://myconsole.matdev.fr/mylog.dev-6.0.0-beta.js"></script>
    <script type="text/javascript">if(typeof log=='undefined'){log={time:function(){},size:function(){},key:function(){},loop:function(){},info:function(){},red:function(){},orange:function(){},yellow:function(){},green:function(){},Green:function(){},blue:function(){},violet:function(){},white:function(){},grey:function(){},black:function(){},show:function(){},important:function(){},alert:function(){},button:function(){},range:function(){}};};</script>

<style type="text/css">

.clients{
    padding: 5px;
    }
    .client{
        margin-bottom: 20px;
        }
    .taches{
        /*padding-left: 15px;*/
        }
    .task, .label{
        display: block;
        padding: 10px;
        margin-bottom: 4px;
        border-radius: 3px;
        cursor: pointer;
        background-color: #eee;
        font-family: 'HelveticaNeue-Light', "HelveticaNeue", Arial, sans-serif;
        font-size: 12px;
        }
    .task{
        /*padding: 10px 10px 10px 20px;*/
        }
    .label{
        font-family: "HelveticaNeue", Arial, sans-serif;
        font-size: 14px;
        background-color: #ddd;
        text-transform: uppercase;
        }

.detail{
    background-color: #eee;
    }
    .input{
        display: flex;
        padding: 15px;
        border-bottom: solid 1px #aaa;
    }
    .test{
        flex: auto;
    }

</style>
</head>
<body>

    <div id="test1"></div>
    <div id="test2"></div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>
    <!-- <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
    $(function(){



            $.ajax({
                type: 'POST',
                url: 'modules/core.php',
                data: {
                    module: 'works-list'
                }
            }).done(function(data) {

                /*try {
                    JSON.parse(data);
                    data = JSON.parse(data);
                } catch (e) {
                    log.loop( data, 'error' );
                    return;
                }*/

                // log.blue(data);

                $('#test1').html(data)

            }).fail(function(data) {
                log.green(data,"error");
            });


            $(document).on('click', '.task, .label', function(){

                var id, type;
                var id_task = parseInt( $(this).attr('data-task-id') );
                var id_client = parseInt( $(this).attr('data-client-id') );

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

                    $('#test2').html(data);

                }).fail(function(data) {
                    log.green(data,"error");
                });

            });
        

    });
    </script>
</body>
</html>





