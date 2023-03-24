@php
$title = 'Welcome';
class dataController {

public $name;
public $color;
public $des;

function __construct ($name, $color, $des) {
$this->name = $name;
$this->color = $color;
$this->des = $des;

}
// public function get_nouns(){

// return $this->name . " " . $this->color . " " . $this->des ;
// }
function __destruct(){

    echo '<span class="alert alert-danger mt-1 mb-1">All The Data Was Completed Mr. ' . $this->name . "</span>";
}
}
$hh = new dataController('Besho', 'Yellow', 'This is description');

@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="/css/boot.css">

</head>
<body>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
    </div>
    <h1>
B
    </h1>
</body>
</html>
