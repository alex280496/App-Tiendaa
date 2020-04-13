@extends('layouts.app')
@section('body-class','landing-page sidebar-collapse')
@section('styles')
<style>
  .team.row.col-md-4{
    margin-bottom: 3em;
  }
  .clearfix{
    clear:both;
  }
  .tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 322px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
</style>
@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/welcome.jpg')}}')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Bienvenido.</h1>
        <h4>Realiza pedidos de tus productos en Linea, el adminsitrador se comunicara contigo y te hara llegar los productos </h4>
        <br>
        <div class="avatar">
          <img src="{{asset('/img/iconowelcome.png')}}" alt="">
          <img src="{{asset('/img/iconcart.png')}}" alt="" height="100">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Hablemos del Producto</h2>
          <h5 class="description">Bienvenido nuevamente a la mejor aplicacion para realizar tus pedidos. A continuacion puedes visualizar todas las categorias disponibles. Todas nuestars categorias disponen de una extensa gama de productos a precios muy accessibles.</h5>
        </div>
      </div>
      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
             <img src="{{asset('/img/category.svg')}}" alt="" height="100">
              <h4 class="info-title">Categorias</h4>
              <p>Accede a todas nuestras categorias con los mejores produtos disponibles  .</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <img src="{{asset('/img/product.svg')}}" alt="" height="100">
              <h4 class="info-title">Productos</h4>
              <p>Cada categoria correspondiente dispone de una gran variedad de productos al mejor precio del mercado.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <img src="{{asset('/img/cart.svg')}}" alt="" height="100">
              <h4 class="info-title">Carrito de Compras</h4>
              <p>Una vez seleccionado los productos a tu gusto puedes realizar un pedido al administardor  .</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section text-center">
      <h2 class="title">Categorias Disponibles</h2>

      <form class="form-inline float-right" action="{{url('/search')}}" method="get">
        <input type="text" placeholder="Que producto buscas?" class="form-control" name="query" id="search">
        <button class="btn btn-primary btn-just-icon" type="submit">
        	<i class="material-icons">search</i>
        </button>
      </form>
      <div class="clearfix">

      </div>
      <div class="team">
        <div class="row">
          @foreach($categories as $category)
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{$category->featured_image_url}}" alt="Imagen representativa de la categoria {{$category->name}}" class="img-raised rounded-circle img-fluid">
                </div>
                <h4 class="card-title">
                  <a href="{{url('/categories/'.$category->id)}}">{{$category->name}}</a>
                  <br>
                </h4>
                <div class="card-body">
                  <p>{{$category->description}}</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  <script src="{{asset('/js/typeahead.bundle.min.js')}}"></script>
  <script>
    $(function(){
      //
      var products = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.whitespace,
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      // `states` is an array of state names defined in "The Basics"
      prefetch:'{{url("/products/json")}}'
    });
      //inicializar typeahead sobre nuestro input de busqueda
      $('#search').typeahead({
        hin:true,
        highlight:true,
        minLenght:1
      },{
        name:'products',
        source:products
      })
    });
  </script>
@endsection
