<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/styles.css?v=1.1">
    <link rel="stylesheet" href="Styles/argon-dashboard.css?v=1" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" type="text/css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container inner-header flex">
        <div class="row">
            <div class="col-12">
                <form action="">
                    <div class="container">
                        <div class="row buscadorsin">
                            <div class="search-camp col-lg-8 col-md-8 col-sm-8" id="datepicker">
                                <input type="text" class="form-control form-evento" placeholder="¿Cuando quieres tu evento?">
                                <ion-icon name="location-outline"></ion-icon>
                                <span input-group-append></span>
                            </div>
                            <div class="search-camp col-sm-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('#datepicker input').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            clearBtn: true,
            language: "es"
            });
        })
    </script>
    
</body>
</html>