<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script
  src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js"
  defer></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
<div class="container">
  <div class="main" x-data="init()">
    <h4 class="font-xxlarge">使用 Alpine.js 來尋找商品</h4>
    <div class="searchArea">
      <input
        class="inputText"
        type="text"
        placeholder="請輸入商品名稱"
        x-model="q"
      />
      <button class="bg-default" @click="search()">尋找商品</button>
    </div>
    <div>
      <template x-for="result in results">
        <div class="postCard">
          <div>
            <img x-bind:src="result.image" style="width: 50%; margin-left:80px;"/>
          </div>
          <div>
            <div class="postDetailItem">
              <span style="padding-right: 5px">商品名稱:</span
              ><span><b x-text="result.title">title</b></span>
            </div>
            <div class="postDetailItem">
              <span style="padding-right: 5px">商品價格:</span
              ><span><b x-text="result.price">price</b></span>
            </div>
            <div class="postDetailItem">
              <span style="padding-right: 5px">商品敘述:</span
              ><span><b x-text="result.description">description</b></span>
            </div>

          </div>
        </div>
      </template>
    </div>
  </div>
</div>
<script>
  function init() {
    return {
      results: [],
      q: "",
      search: function () {
        fetch(
          "http://localhost:8000/api/products/search?s=" +
            this.q
        )
          .then((response) => response.json())
          .then((response) => (this.results = response.data))
          .catch((err) => console.log(err));
      },
    };
  }
</script>

</body>
</html>