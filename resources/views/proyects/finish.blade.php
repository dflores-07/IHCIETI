@extends('layouts.system')
<!--**
 * Created by PhpStorm.
 * User: anwarsarmiento
 * Email: asarmiento@sistemasamigables.com
 * Date: 26/5/17
 * Time: 02:53
 *-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="text-center row"><h2>Bienvenid@ : {{$profile->name}}</h2></div>
    		<div class="text-center row"><img src="http://mipymes.hondurastartup.com/wp-content	/uploads/2017/05/logotipo.png" width="350" height="150"></div>
    			<div class="text-center row"><h3>Tu numero de proyecto es : {{$profile->idproject}}</h3></div>
    	<div class="text-center row"><h4>Hemos enviado un mensaje de confirmación a tu correo electrónico..</h4></div>
                
            </div>
        </div>
    </div>
</div>
@endsection