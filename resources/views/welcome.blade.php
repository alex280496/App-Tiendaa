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

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Bienvido.</h1>
        <h4>Realiza tus pedidos en Linea y posterioe  se realiza la entrega de tus productos </h4>
        <br>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
          <i class="fa fa-play"></i> Ver como funciona la App
        </a>
      </div>
    </div>
  </div>
</div>
<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">Let&apos;s talk product</h2>
          <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
        </div>
      </div>
      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-info">
                <i class="material-icons">chat</i>
              </div>
              <h4 class="info-title">Free Chat</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-success">
                <i class="material-icons">verified_user</i>
              </div>
              <h4 class="info-title">Verified Users</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-danger">
                <i class="material-icons">fingerprint</i>
              </div>
              <h4 class="info-title">Fingerprint</h4>
              <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
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
    <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Work with us</h2>
          <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
          <form class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Name</label>
                  <input type="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Your Email</label>
                  <input type="email" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleMessage" class="bmd-label-floating">Your Message</label>
              <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">
                  Send Message
                </button>
              </div>
            </div>
          </form>
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
      local: ['hola','prueba1','prueba2','prueba3','absdr']
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
