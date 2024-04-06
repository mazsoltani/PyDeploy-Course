<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Some API</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">    
        


        <style>
              body {
        background-color: #f4f4f4;
        color: #333;
    }
    .card {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
            </style>

    </head>

    <body>
     <div class="container mt-5">
        <h2 class="text-center mb-2" style="color: #395A7F;">Fruit Search</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('fruit') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="fruit" list="fruitname" class="form-control custom-select">
                        <datalist id="fruitname">
                           <option selected>Choose...</option>
                            <option value="Apple">Apple</option>
                            <option value="Banana">Banana</option>
                            <option value="Persimmon">Persimmon</option>
                            <option value="Strawberry">Strawberry</option>
                            <option value="Gooseberry">Gooseberry</option>
                            <option value="Tomato">Tomato</option>
                            <option value="Pear">Pear</option>
                            <option value="Durian">Durian</option>
                            <option value="Blackberry">Blackberry</option>
                            <option value="Lingonberry">Lingonberry</option>
                            <option value="Kiwi">Kiwi</option>
                            <option value="Lychee">Lychee</option>
                            <option value="Pineapple">Pineapple</option>
                            <option value="Fig">Fig</option>
                        </datalist>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </form>
            </div>
        </div>



        <h2 class="text-center mb-2 mt-5" style="color: #395A7F;">Number Search</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('number') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <input type="number" name="number" class="form-control" placeholder="Enter a name like '5'">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </form>
            </div>
        </div>


        <h2 class="text-center mb-2 mt-5"  style="color:#395A7F;">Quran</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('quran') }}" method="GET" class="mb-4">
                    @csrf
                
                    <button type="submit" class="btn btn-primary btn-block">Show</button>
                </form>
            </div>
        </div>


    </div>
    

        <div class="row justify-content-center">
            <div class="col-md-6">


        @if(isset($fruitData))
        <div class="mt-5">
            <h2 class="text-center">Results for {{ $fruit }}</h2>
            {{ dd($fruitData)}}
        @endif


        @if(isset($numberData))
            <div class="mt-5">
            <h2 class="text-center">Results for {{ $number }}</h2>
            {{ dd($numberData)}}
        @endif

        @if(isset($quranData))
        <div class="mt-5">
        <h2 class="text-center">list of Surahs in the Quran</h2>
        {{ dd($quranData)}}
    @endif


        </div>
    
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




    </body>
</html>
