<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YouTube Searcb</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div id="app">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">YouTube Search</h1>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-4 col-md-push-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Query"
                           aria-label="Search Query" aria-describedby="basic-addon2" v-model="searchQuery">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" v-on:click="getSearchResults()">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <search-result
                v-for="(result, key) in searchResults"
                :data="result" :key="key"></search-result>

        <div class="spinner" v-if="isLoading">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-center">
                <button v-on:click="getSearchResults()" v-if="searchResults.length > 0"
                        class="btn btn-default m-2">Show More
                </button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

</body>
</html>
