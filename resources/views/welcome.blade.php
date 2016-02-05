<!DOCTYPE html>
<html ng-app="LearnHub">

<head>
    <title>LearnHub</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">LearnHub <small>-- One stop learning portal</small></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container" style="margin-top:70px;" ng-controller="LearnhubController" ng-init='init()'>
        <div class="row">
            <div class="col-md-3 sidebar">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <strong>Category</strong>
                    </div>
                    <div class="box-body">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item" ng-repeat="value in categories">
                                <input type="checkbox" ng-model="category" ng-click="updateCategory(this)" value="@{{value.category}}" /> @{{ value.category}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <strong>Sort By</strong>
                    </div>
                    <div class="box-body">
                        <span class="pull-left"><input type="radio" class="sort" name="sort" ng-model="sort" value="rating" ng-click="sortByRating(this)"/> Rating</span>
                        <span class="pull-right"><input type="radio" class="sort" name="sort" ng-model="sort" value="price" ng-click="sortByPrice(this)"/> Price</span>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <strong>Total courses : @{{courses.length}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="search" ng-model="titleFilter" ng-change="searchByTitle(this)" placeholder="Search (by Title)" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <li class="item" ng-repeat="course in pages">
                                <div class="product-img">
                                    <img src="@{{course.image}}"></img>
                                    <div class="row">
                                        <div class="col-md-7 pull-left">
                                            <input type="number" class="rating" min=1 max=5 step=1 data-size="xs" value="@{{course.rating}}" readonly="true" />
                                        </div>
                                        <div class="col-md-5">
                                            <h4 style="padding-left:20px;"><a href="@{{course.url}}">link</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="javascript::;" class="product-title">
                                    @{{course.title}}
                                        <span class="label label-danger pull-right">@{{course.type}}</span>
                                    </a>
                                    <p class="text-muted">@{{course.description}}</p>
                                    <span class="text-muted pull-right"></i> @{{course.price}}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="row box box-default">
                        <div class="box-header">
                            <div class="col-md-1 col-md-offset-5">
                                <button class="form-control btn btn-primary" value="prev" ng-click="paginate(this.value)">Prev</button>
                            </div>
                            <div class="col-md-1">
                                <button class="form-control btn btn-primary" value="next" ng-click="paginate(this.value)">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
    <script type="text/javascript">
    $(function() {
        $(".rating").rating();
        $("div.caption").hide();
        $("div.clear-rating").hide();
    });
    </script>
</body>

</html>
