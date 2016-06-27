<?php
/**
 * Created by PhpStorm.
 * User: duakilodotnet
 * Date: 6/27/16
 * Time: 4:30 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
<title>Backend Assesment</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/vue/0.12.1/vue.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Backend TA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Dashboard</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">Product</a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="category">
            <div class="table-responsive" id="table-data">
                <ul id="list-category">
                    <li v-for="category in categories">
                        {{ category.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    new Vue({
        el: '#category',
        data: {
            categories: [],
            name: '',
            parent_id: ''
        },
        ready: function() {
            this.getMessages();
        },
        methods: {
            getMessages: function() {
                $.ajax({
                    context: this,
                    url: "/api/v1/category",
                    success: function (result) {
                        this.$set("categories", result)
                    }
                })
            },
            onCreate: function(e) {
                e.preventDefault()
                $.ajax({
                    context: this,
                    type: "POST",
                    data: {
                        name: this.name
                        parent_id: this.parent_id
                    },
                    url: "/api/v1/category",
                    success: function(result) {
                        this.categories.push(result);
                        this.name = ''
                        this.parent_id = ''
                    }
                })
            },
            onDelete: function (category) {
                $.ajax({
                    context: category,
                    type: "DELETE",
                    url: "/api/v1/category/" + category.id,
                })
                this.categories.$remove(category);
            }
        }
    })
</script>
</body>
</html>
